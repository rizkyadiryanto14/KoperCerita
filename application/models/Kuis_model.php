<?php

/**
 * @property $db
 */

class Kuis_model extends CI_Model
{

	public function insert($data)
	{
		return $this->db->insert('kuis', $data);
	}

	public function get_by_id($id_kuis)
	{
		return $this->db->get_where('kuis', ['id_kuis' => $id_kuis])->row_array();
	}

	public function update($id_kuis, $data)
	{
		$this->db->where('id_kuis', $id_kuis);
		return $this->db->update('kuis', $data);
	}

	public function delete($id_kuis)
	{
		$this->db->where('id_kuis', $id_kuis);
		return $this->db->delete('kuis');
	}

	public function get_by_id_kontent($id_konten)
	{
		$this->db->select('*');
		$this->db->from('kuis');
		$this->db->where('id_konten', $id_konten);
		return $this->db->get()->result();
	}

	function make_query(): void
	{
		$this->db->select('kuis.*, konten.judul')
			->from("kuis")
			->join("konten", "kuis.id_konten = konten.id_konten");
		if (isset($_POST["search"]["value"])) {
			$this->db->like("konten.judul", $_POST["search"]["value"]);
		}
		if (isset($_POST["order"])) {
			$this->db->order_by($_POST['order']['0']['column'], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('pertanyaan', 'DESC');
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
		$this->db->from("kuis");
		return $this->db->count_all_results();
	}
}
