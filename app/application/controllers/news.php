<?php

require_once 'base_controller.php';
class News extends base_controller {

	public function __construct()
	{
		parent::__construct();
		//$this->load->helper('url');
		//$this->load->library('pagination');

		$this->load->model('news_model');
	}

	public function index()
	{
		$data['title'] = 'Postimees 2 uudised';

		//$config['base_url'] = site_url();
		//$config['total_rows'] = count($this->news_model->get_news());
		//$config['per_page'] = 5;
		//$config["uri_segment"] = 3;
        //$choice = $config["total_rows"] / $config["per_page"];
        //$config["num_links"] = floor($choice);

        ////config for bootstrap pagination class integration
        //$config['full_tag_open'] = '<ul class="pagination">';
        //$config['full_tag_close'] = '</ul>';
        //$config['first_link'] = false;
        //$config['last_link'] = false;
        //$config['first_tag_open'] = '<li>';
        //$config['first_tag_close'] = '</li>';
        //$config['prev_link'] = '&laquo';
        //$config['prev_tag_open'] = '<li class="prev">';
        //$config['prev_tag_close'] = '</li>';
        //$config['next_link'] = '&raquo';
        //$config['next_tag_open'] = '<li>';
        //$config['next_tag_close'] = '</li>';
        //$config['last_tag_open'] = '<li>';
        //$config['last_tag_close'] = '</li>';
        //$config['cur_tag_open'] = '<li class="active"><a href="#">';
        //$config['cur_tag_close'] = '</a></li>';
        //$config['num_tag_open'] = '<li>';
        //$config['num_tag_close'] = '</li>';

		//$this->pagination->initialize($config);

		//$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		//$data['pagination'] = $this->pagination->create_links();
		//$data['uudis'] = $this->news_model->get_limited_news($config["per_page"], $data['page']);

		$data['uudis'] = $this->news_model->get_news();
		$data['news_stats'] = $this->news_model->get_commentCount();

		$this->load->view('templates/header', $data);
		$this->load->view('news/index', $data);
		$this->load->view('templates/sidebar', $data);
		//$this->load->view('templates/pagination');
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
