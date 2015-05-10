<?php
class Editor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
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

	$this->form_validation->set_rules('pealkiri', 'Pealkiri', 'required');
	$this->form_validation->set_rules('teema', 'Teema', 'required');
	$this->form_validation->set_rules('lat_coord', 'Pikkuskraad', 'required');
	$this->form_validation->set_rules('lon_coord', 'Laiuskraad', 'required');
	$this->form_validation->set_rules('tekst', 'Tekst', 'required');
	$this->form_validation->set_rules('pilt', 'Pilt', 'required');
	$this->form_validation->set_rules('eelvaade', 'Eelvaade', 'required');
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
}
