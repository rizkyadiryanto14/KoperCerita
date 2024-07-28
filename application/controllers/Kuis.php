<?php

/**
 * @property $Kuis_model
 * @property $session
 * @property $Pelatihan_model
 * @property $input
 * @property $form_validation
 * @property $Aksara_model
 */

class Kuis extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('is_admin') == 1) {
			redirect(base_url('Auth'));
		}
		$this->load->library('form_validation');
		$this->load->model('Kuis_model');
		$this->load->model('Pelatihan_model');
		$this->load->model('Aksara_model');
	}

	/**
	 * @return void
	 */

	public function index(): void
	{
		$this->load->view('backend/kuis/kuis');
	}

	/**
	 * @return void
	 */

	public function insert_kuis(): void
	{
		$data = [
			'pelatihan' => $this->Pelatihan_model->get_pelatihan()
		];
		$this->load->view('backend/kuis/insert', $data);
	}


	/**
	 * @return void
	 */

	public function insert(): void
	{
		$this->form_validation->set_rules('id_konten', 'Konten', 'required');
		$this->form_validation->set_rules('jenis_pertanyaan', 'Jenis Pertanyaan', 'required');
		$this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');
		$this->form_validation->set_rules('point', 'Point', 'required');
		$this->form_validation->set_rules('jawaban', 'Jawaban', 'required');

		if (!$this->form_validation->run()) {
			$error_messages = validation_errors();
			// Menyimpan pesan error ke session flashdata
			$this->session->set_flashdata('gagal', $error_messages);
			redirect(base_url('backend/kuis'));
		} else {
			$data = array(
				'id_konten' => $this->input->post('id_konten'),
				'jenis_pertanyaan' => $this->input->post('jenis_pertanyaan'),
				'opsi_jawaban' => $this->input->post('opsi_jawaban'),
				'pertanyaan' => $this->input->post('pertanyaan'),
				'point'	=> $this->input->post('point'),
				'jawaban' => $this->input->post('jawaban')
			);
			$insert_kuis = $this->Kuis_model->insert($data);
			if ($insert_kuis) {
				$this->session->set_flashdata('sukses', 'Data Kuis Berhasil Ditambahkan');
			} else {
				$this->session->set_flashdata('gagal', 'Data Kuis Gagal Ditambahkan');
			}
			redirect('backend/kuis');
		}
	}

	/**
	 * @param $id_kuis
	 * @return void
	 */
	public function update($id_kuis): void
	{
		$this->form_validation->set_rules('id_konten', 'Konten', 'required');
		$this->form_validation->set_rules('jenis_pertanyaan', 'Jenis Pertanyaan', 'required');
		$this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');
		$this->form_validation->set_rules('point', 'Point', 'required');
		$this->form_validation->set_rules('jawaban', 'Jawaban', 'required');

		if (!$this->form_validation->run()) {
			$error_messages = validation_errors();
			$this->session->set_flashdata('gagal', $error_messages);
			redirect(base_url('backend/kuis'));
		} else {
			$data = array(
				'id_konten' => $this->input->post('id_konten'),
				'jenis_pertanyaan' => $this->input->post('jenis_pertanyaan'),
				'opsi_jawaban' => $this->input->post('opsi_jawaban'),
				'pertanyaan' => $this->input->post('pertanyaan'),
				'point'		=> $this->input->post('point'),
				'jawaban' => $this->input->post('jawaban')
			);

			$update_kuis = $this->Kuis_model->update($id_kuis, $data);
			if ($update_kuis) {
				$this->session->set_flashdata('sukses', 'Data Kuis Berhasil Diupdate');
			} else {
				$this->session->set_flashdata('gagal', 'Data Kuis Gagal Diupdate');
			}
			redirect('backend/kuis');
		}
	}

	/**
	 * @param $id_kuis
	 * @return void
	 */
	public function update_kuis($id_kuis): void
	{
		$data = [
			'pelatihan' => $this->Pelatihan_model->get_pelatihan(),
			'kuis' => $this->Kuis_model->get_by_id($id_kuis)
		];
		$this->load->view('backend/kuis/update', $data);
	}

	/**
	 * @param $id_kuis
	 * @return void
	 */

	public function delete($id_kuis): void
	{
		$data = $this->Kuis_model->delete($id_kuis);
		if ($data) {
			$this->session->set_flashdata('sukses', 'Data Kuis Berhasil Dihapus');
		} else {
			$this->session->set_flashdata('gagal', 'Data Kuis Gagal Dihapus');
		}
		redirect(base_url('backend/kuis'));
	}

	public function get_data_kuis(): void
	{
		$fetch_data = $this->Kuis_model->make_datatables();
		if (is_array($fetch_data)) {
			$data = array();
			$no = 1;
			foreach ($fetch_data as $row) {
				$sub_array = array();
				$sub_array[] = $no++;
				$sub_array[] = $row->judul;
				$sub_array[] = $row->pertanyaan;
				if ($row->opsi_jawaban != '') {
					$sub_array[] = $row->opsi_jawaban;
				} else {
					$sub_array[] = 'Tidak Ada';
				}
				$sub_array[] = $row->point;
				$sub_array[] = $row->jawaban;
				$sub_array[] = '<a href="' . site_url('kuis/update_kuis/' . $row->id_kuis) . '" class="btn btn-info btn-xs update"><i class="fa fa-edit"></i></a>
                     <a href="' . site_url('kuis/delete/' . $row->id_kuis) . '" onclick="return confirm(\'Apakah anda yakin? data pada tabel terkait akan ikut terhapus\')" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></a>';
				$data[] = $sub_array;
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
