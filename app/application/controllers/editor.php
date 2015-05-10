<?php

require_once 'base_controller.php';
class Editor extends base_controller {

	public function __construct()
	{
		parent::__construct();
        $this->checkAuth();
		$this->load->model('editor_model');
	}

	public function index()
	{
		$data['title'] = 'Toimetaja toimingud';

		$this->load->view('templates/header', $data);
		$this->load->view('editor/index');
		$this->load->view('templates/footer');
	}

	public function create()
	{
	$this->load->helper('form');
	$this->load->library('form_validation');

	$data['title'] = 'Lisa uudis';

	$data['teema'] = $this->editor_model->get_teema();

	$this->form_validation->set_rules('pealkiri', 'Pealkiri', 'trim|required|xss_clean');
	$this->form_validation->set_rules('teema', 'Teema', 'callback_combo_check');
	$this->form_validation->set_rules('lat_coord', 'Pikkuskraad', 'required');
	$this->form_validation->set_rules('lon_coord', 'Laiuskraad', 'required');
	$this->form_validation->set_rules('tekst', 'Tekst', 'trim|required|xss_clean');
	$this->form_validation->set_rules('pilt', 'Pilt', 'required');
	$this->form_validation->set_rules('eelvaade', 'Eelvaade', 'trim|required|xss_clean');
	$this->form_validation->set_rules('date', 'Kuupäev', 'required');
	$this->form_validation->set_rules('autor', 'Autor', 'required');

	if ($this->form_validation->run() === FALSE)
	{
		$this->load->view('templates/header', $data);
		$this->load->view('editor/create');
		$this->load->view('templates/footer');

	}
	else
	{
		$this->editor_model->set_news();
		$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Uudis lisatud!!!</div>');
        redirect('editor/create');
	}
	}

	function combo_check($str)
	{
		if ($str == '-SELECT-')
		{
			$this->form_validation->set_message('combo_check', 'Valid %s Teema is required');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	public function update($id)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['uudise_id'] = $id;
		$data['teema'] = $this->editor_model->get_teema();

		$data['newsrecord'] = $this->editor_model->get_news_record($id);

		$this->form_validation->set_rules('pealkiri', 'Pealkiri', 'trim|required|xss_clean');
		$this->form_validation->set_rules('teema', 'Teema', 'callback_combo_check');
		$this->form_validation->set_rules('lat_coord', 'Pikkuskraad', 'required');
		$this->form_validation->set_rules('lon_coord', 'Laiuskraad', 'required');
		$this->form_validation->set_rules('tekst', 'Tekst', 'trim|required|xss_clean');
		$this->form_validation->set_rules('pilt', 'Pilt', 'required');
		$this->form_validation->set_rules('eelvaade', 'Eelvaade', 'trim|required|xss_clean');
		$this->form_validation->set_rules('date', 'Kuupäev', 'required');
		$this->form_validation->set_rules('autor', 'Autor', 'required');

		if ($this->form_validation->run() == FALSE)
        {
			$data['title'] = 'Muuda uudist';

			$this->load->view('templates/header', $data);
            $this->load->view('editor/update', $data);
            $this->load->view('templates/footer');
        }

		else
        {
            //pass validation
            $data = array(
                'uudise_PEALKIRI' => $this->input->post('pealkiri'),
                'uudise_teema_ID' => $this->input->post('teema'),
                'uudise_LAT_COORD' => $this->input->post('lat_coord'),
				'uudise_LON_COORD' => $this->input->post('lon_coord'),
                'uudise_TEKST' => $this->input->post('tekst'),
                'uudise_PILT' => $this->input->post('pilt'),
                'uudise_EELVAADE' => $this->input->post('eelvaade'),
                'uudise_KUUPAEV' => @date('Y-m-d', @strtotime($this->input->post('date'))),
                'autori_ID' => $this->input->post('autor'),
            );

            //update employee record
            $this->db->where('uudise_ID', $id);
            $this->db->update('uudis', $data);

            //display success message
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Uudis edukalt uuendatud!</div>');
            redirect('editor/update/' . $id);
        }
	}
}
