<?php
class Editor_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function set_news()
	{
	$this->load->helper('url');

	$id = url_title($this->input->post('uudise_ID'), 'dash', TRUE);

	$data = array(
		'uudise_teema_ID' => $this->input->post('teema'),
		'autori_ID' => $this->input->post('autor'),
		'uudise_PEALKIRI' => $this->input->post('pealkiri'),
		'uudise_EELVAADE' => $this->input->post('eelvaade'),
		'uudise_TEKST' => $this->input->post('tekst'),
		'uudise_KUUPAEV' => $this->input->post('date'),
		'uudise_LAT_COORD' => $this->input->post('lat_coord'),
		'uudise_LON_COORD' => $this->input->post('lon_coord')
	);

	return $this->db->insert('uudis', $data);
	}
}
