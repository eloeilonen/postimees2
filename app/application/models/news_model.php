<?php
class News_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_news($id = FALSE)
	{
	if ($id === FALSE)
	{
		$this->db->order_by('uudise_KUUPAEV', 'DESC');
		$query = $this->db->get('uudis');
		return $query->result_array();
	}

	$query = $this->db->get_where('uudis', array('uudise_ID' => $id));
	return $query->row_array();
	}

	public function get_author($id)
	{
		$query = $this->db->query('select kasutaja.kasutaja_EESNIMI, kasutaja.kasutaja_PERENIMI, kasutaja.kasutaja_EMAIL from uudis inner join kasutaja where uudis.autori_ID = kasutaja.kasutaja_id and uudis.uudise_ID = '.$id.';');
		return $query->row_array();
	}

	public function get_commentCount($id = FALSE)
	{
		if ($id === FALSE)
		{
			$query = $this->db->query('select uudis.uudise_ID, uudis.uudise_PEALKIRI, count(kommentaar.kommentaari_uudise_ID) as count from uudis inner join kommentaar where uudis.uudise_ID = kommentaar.kommentaari_uudise_ID group by uudis.uudise_ID order by count desc;');
			return $query->result_array();
		}
	}
}
