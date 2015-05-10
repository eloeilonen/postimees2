<?php

require_once 'base_controller.php';
class News extends base_controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');
	}

	public function index()
	{
		$data['title'] = 'Postimees 2 uudised';
		$data['uudis'] = $this->news_model->get_news();
		$data['news_stats'] = $this->news_model->get_commentCount();

		$this->load->view('templates/header', $data);
		$this->load->view('news/index', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/footer');
	}

	public function view($id)
	{
		$data['news_item'] = $this->news_model->get_news($id);
		$data['news_author'] = $this->news_model->get_author($id);
		$data['news_stats'] = $this->news_model->get_commentCount();

		if (empty($data['news_item']))
		{
			show_404();
		}

		$data['title'] = $data['news_item']['uudise_PEALKIRI'];

		$this->load->view('templates/header', $data);
		$this->load->view('news/view', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/footer');
	}

	public function json()
	{
		$result = $this->news_model->get_news();
		echo json_encode($result);
	}
}
?>
