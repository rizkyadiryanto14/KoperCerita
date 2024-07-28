<?php

/**
 * @property $db
 */

class History_model extends CI_Model
{
	public function get_all_data()
	{
		return $this->db->get('history')->result();
	}

	public function insert($data)
	{
		return $this->db->insert('history', $data);
	}

	public function getReadKontenCount($id_pengguna)
	{
		$this->db->where('id_pengguna', $id_pengguna);
		return $this->db->count_all_results('history');
	}
}
