<?php
class Editor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
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

	$this->form_validation->set_rules('pealkiri', 'Pealkiri', 'required');
	$this->form_validation->set_rules('lat_coord', 'Pikkuskraad', 'required');
	$this->form_validation->set_rules('lon_coord', 'Laiuskraad', 'required');
	$this->form_validation->set_rules('tekst', 'Tekst', 'required');
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
		$this->load->view('templates/success');
	}
	}
}
