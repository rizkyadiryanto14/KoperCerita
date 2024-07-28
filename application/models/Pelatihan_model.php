<?php

/**
 * @property $db
 */

class Pelatihan_model extends CI_Model
{

	public function getTotalKonten()
	{
		return $this->db->count_all('konten');
	}

	public function get_pelatihan()
	{
		return $this->db->get('konten')->result();
	}

	public function insert($data)
	{
		return $this->db->insert('konten', $data);
	}

	public function detail($id_kontent)
	{
		return $this->db->get_where('konten', array('id_konten' => $id_kontent))->row_array();
	}

	public function update($id_konten, $data)
	{
		$this->db->where('id_konten', $id_konten);
		return $this->db->update('konten', $data);
	}

	public function delete($id_konten)
	{
		// Mulai transaksi
		$this->db->trans_start();

		// Hapus data terkait di tabel kuis
		$this->db->where('id_konten', $id_konten);
		$this->db->delete('kuis');

		// Hapus data terkait di tabel history
		$this->db->where('id_konten', $id_konten);
		$this->db->delete('history');

		// Hapus data di tabel konten
		$this->db->where('id_konten', $id_konten);
		$this->db->delete('konten');

		// Selesaikan transaksi
		$this->db->trans_complete();

		// Periksa status transaksi
		if ($this->db->trans_status() === FALSE) {
			// Jika terjadi kesalahan, rollback dan kembalikan false
			return FALSE;
		} else {
			// Jika berhasil, commit dan kembalikan true
			return TRUE;
		}
	}


	function make_query(): void
	{
		$this->db->select('konten.*')
			->from("konten");
		if (isset($_POST["search"]["value"])) {
			$this->db->like("judul", $_POST["search"]["value"]);
		}
		if (isset($_POST["order"])) {
			$this->db->order_by($_POST['order']['0']['column'], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_konten', 'DESC');
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
		$this->db->from("konten");
		return $this->db->count_all_results();
	}
}
