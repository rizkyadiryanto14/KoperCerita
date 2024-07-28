<?php

/**
 * @property $Kuis_model
 * @property $session
 * @property $input
 */

class Kuis extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kuis_model');
	}

	/**
	 * @return void
	 */

	public function index(): void
	{
		$this->load->view('user/kuis');
	}

	/**
	 * @param $id_kuis
	 * @return void
	 */

	public function skoring($id_kuis): void
	{
		$data = [];
		for ($i = 1; $i <= $data; $i++) {
			$jawaban = $this->input->post('jawaban');
		}
	}

	/**
	 * @param $id_konten
	 * @return void
	 */

	public function detail_kuis($id_konten): void
	{
		$data = [
			'kuis' => $this->Kuis_model->get_by_id_kontent($id_konten)
		];

		$this->load->view('user/detail_kuis', $data);
	}

	public function get_data_kuis(): void
	{
		$fetch_data = $this->Kuis_model->make_datatables();
		if (is_array($fetch_data)) {
			$data = array();
			$no = 1;
			$unique_ids = array();  // To keep track of unique IDs

			foreach ($fetch_data as $row) {
				if (!in_array($row->id_konten, $unique_ids)) {
					$unique_ids[] = $row->id_konten;  // Add ID to the list to track
					$sub_array = array();
					$sub_array[] = $no++;
					$sub_array[] = "<a href='" . base_url('users/detail_kuis/' . $row->id_konten) . "'>$row->judul</a>";
					$data[] = $sub_array;
				}
			}

			$output = array(
				"draw" => isset($_POST["draw"]) ? intval($_POST["draw"]) : 0,
				"recordsTotal" => $this->Kuis_model->get_all_data(),
				"recordsFiltered" => $this->Kuis_model->get_filtered_data(),
				"data" => $data
			);
			echo json_encode($output);
		} else {
			echo "Error: Fetch data is not an array.";
		}
	}
}
