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

	public function get_limited_news($limit, $start)
	{
		$this->db->limit($limit, $start);
		$results = $this->get_news();
		return $results;
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

	public function get_viewCount($id = FALSE)
	{
		if ($id === FALSE)
		{
			$query = $this->db->query('select uudise_ID, uudise_PEALKIRI, uudise_vaatamised from uudis where uudise_vaatamised > 0 order by uudise_vaatamised desc limit 10;');
			return $query->result_array();
		}
	}

	public function delete_news($id)
	{
		$this->db->where('uudise_ID', $id);
		$this->db->delete('uudis');
		$this->db->where('kommentaari_uudise_ID', $id);
		$this->db->delete('kommentaar');
	}

	public function set_comment()
	{
		$data = array(
			'kommentaari_uudise_ID' => $this->input->post('id'),
			'kommenteerija_NIMI' => $this->input->post('nimi'),
			'kommenteerija_EMAIL' => $this->input->post('email'),
			'kommentaari_TEKST' => $this->input->post('kommentaar'),
			'kommentaari_KUUPAEV' => $this->input->post('date')
		);

		$uudiskirjad = $this->input->post("uudiskirjad");
		$email = $this->input->post('email');

		if ($uudiskirjad)
		{
			if (count($this->get_email($email)) === 0)
			{
				$this->set_kirjatellija();
			}
		}

		return $this->db->insert('kommentaar', $data);
	}

	public function get_comments($id)
	{
		$this->db->order_by('kommentaari_KUUPAEV', 'DESC');
		$query = $this->db->get_where('kommentaar', array('kommentaari_uudise_ID' => $id));
		return $query->result_array();
	}

	public function set_kirjatellija()
	{
		$data = array(
		'tellija_EMAIL' => $this->input->post('email'),
		'tellija_NIMI' => $this->input->post('nimi')
		);

		return $this->db->insert('uudiskirja_tellijad', $data);
	}

	public function get_email($email)
	{
		$query = $this->db->get_where('uudiskirja_tellijad', array('tellija_EMAIL' => $email));
		return $query->result_array();
	}

}
