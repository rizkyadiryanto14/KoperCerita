<?php

/**
 * @property $db
 */

class Aksara_model extends CI_Model
{
	public function get_aksara_data()
	{
		return $this->db->get('aksara')->result();
	}

	public function insert($data)
	{
		return $this->db->insert('aksara', $data);
	}

	public function update($id_aksara, $data)
	{
		$this->db->where('id_aksara', $id_aksara);
		return $this->db->update('aksara', $data);
	}

	public function get_by_id($id_aksara)
	{
		return $this->db->get_where('aksara', array('id_aksara' => $id_aksara))->row_array();
	}

	public function delete($id_aksara)
	{
		$this->db->where('id_aksara', $id_aksara);
		return $this->db->delete('aksara');
	}

	function make_query(): void
	{
		$this->db->select('aksara.*')
			->from("aksara");
		if (isset($_POST["search"]["value"])) {
			$this->db->like("nama_aksara", $_POST["search"]["value"]);
		}
		if (isset($_POST["order"])) {
			$this->db->order_by($_POST['order']['0']['column'], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_aksara', 'ASC');
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
		$this->db->from("aksara");
		return $this->db->count_all_results();
	}
}
