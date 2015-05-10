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
		'uudise_PILT' => $this->input->post('pilt'),
		'uudise_KUUPAEV' => $this->input->post('date'),
		'uudise_LAT_COORD' => $this->input->post('lat_coord'),
		'uudise_LON_COORD' => $this->input->post('lon_coord')
	);

	return $this->db->insert('uudis', $data);
	}

	public function get_teema()
	{
		$this->db->select('teema_ID');
        $this->db->select('teema_NIMI');
        $this->db->from('teema');
        $query = $this->db->get();
        $result = $query->result();

		$teema_id = array('-SELECT-');
        $teema_nimi = array('-SELECT-');

        for ($i = 0; $i < count($result); $i++)
        {
            array_push($teema_id, $result[$i]->teema_ID);
            array_push($teema_nimi, $result[$i]->teema_NIMI);
        }
        return $teema_result = array_combine($teema_id, $teema_nimi);
     }


    //fetch employee record by employee no
	function get_news_record($id)
    {
        $this->db->where('uudise_ID', $id);
        $this->db->from('uudis');
        $query = $this->db->get();
        return $query->result();
    }
}
