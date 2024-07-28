<?php

/**
 * @property $db
 */
class Auth_model extends CI_Model
{
	public function get_all_users()
	{
		return $this->db->get('pengguna')->result();
	}

	public function get_user_by_username($username)
	{
		return $this->db->get_where('pengguna', array('username' => $username))->row_array();
	}

	public function insert($data)
	{
		return $this->db->insert('pengguna', $data);
	}
}
