<?php

/**
 * @property $db
 */

class Pengguna_model extends CI_Model
{

	public function getUserGrowthData()
	{
		// Query untuk mengambil data pertumbuhan pengguna menggunakan Query Builder
		$this->db->select("DATE_FORMAT(created_at, '%b') as month, COUNT(*) as count");
		$this->db->from('pengguna');
		$this->db->group_by("DATE_FORMAT(created_at, '%b')");
		$query = $this->db->get();

		// Ambil hasil query dalam bentuk array
		return $query->result_array();
	}

	public function get_by_id($id_pengguna)
	{
		return $this->db->get_where('pengguna', array('id_pengguna' => $id_pengguna))->row_array();
	}

	public function jumlah_penguna()
	{
		return $this->db->get('pengguna')->num_rows();
	}

	public function insert($data)
	{
		return $this->db->insert('pengguna', $data);
	}

	public function update($id_pengguna, $data)
	{
		$this->db->where('id_pengguna', $id_pengguna);
		return $this->db->update('pengguna', $data);
	}

	public function delete($id_pengguna)
	{
		$this->db->where('id_pengguna', $id_pengguna);
		return $this->db->delete('pengguna');
	}

	function make_query(): void
	{
		$this->db->select('pengguna.*')
			->from("pengguna");
		if (isset($_POST["search"]["value"])) {
			$this->db->like("username", $_POST["search"]["value"]);
		}
		if (isset($_POST["order"])) {
			$this->db->order_by($_POST['order']['0']['column'], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_pengguna', 'DESC');
		}
	}

	public function make_datatables()
	{
		$this->make_query();
		if (isset($_POST["length"]) && $_POST["length"] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
		$query = $this->db->get();
		return $query->num_rows();
	}

	function get_filtered_data()
	{
		$this->make_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	function get_all_data()
	{
		$this->db->select("*");
		$this->db->from("pengguna");
		return $this->db->count_all_results();
	}
}
