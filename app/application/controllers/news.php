<?php

require_once 'base_controller.php';
class News extends base_controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->load->model('news_model');
	}

	public function index()
	{
		$data['title'] = 'Postimees 2 uudised';

		$data['uudis'] = $this->news_model->get_news();
		$data['news_stats'] = $this->news_model->get_commentCount();

		$this->load->view('templates/cache_header', $data);
		$this->load->view('news/index', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/footer');
	}

	public function view($id)
	{
		$data['news_item'] = $this->news_model->get_news($id);
		$data['news_author'] = $this->news_model->get_author($id);
		$data['news_stats'] = $this->news_model->get_commentCount();
		$data['comment'] = $this->news_model->get_comments($id);

		if (empty($data['news_item']))
		{
			show_404();
		}

		$data['title'] = $data['news_item']['uudise_PEALKIRI'];

		$this->load->view('templates/cache_header', $data);
		$this->load->view('news/view', $data);
		$this->load->view('news/comment', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/footer');
	}

	public function json()
	{
		$result = $this->news_model->get_news();
		echo json_encode($result);
	}

	public function delete($id)
	{
		$this->news_model->delete_news($id);
		redirect(base_url());
	}

	public function comment()
	{
	$this->form_validation->set_rules('nimi', 'Nimi', 'required|xss_clean');
	$this->form_validation->set_rules('email', 'Email', 'required|xss_clean');
	$this->form_validation->set_rules('kommentaar', 'Kommentaar', 'required');

	if ($this->form_validation->run() === FALSE)
	{
		echo "kommentaari lisamine ebaõnnestus";
	}
	else
	{
		$this->news_model->set_comment();
		$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Kommentaar lisatud!!!</div>');
		echo "Kommentaar lisatud!!!";
	}
	}
}
?>
