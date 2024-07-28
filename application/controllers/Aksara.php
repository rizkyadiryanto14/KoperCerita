<?php

/**
 * @property $Aksara_model
 * @property $input
 * @property $form_validation
 * @property $upload
 * @property $session
 */

class Aksara extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('is_admin') == 1) {
			redirect(base_url('Auth'));
		}
		$this->load->model('Aksara_model');
	}

	/**
	 * @return void
	 */

	public function index(): void
	{
		$this->load->view('backend/aksara/aksara');
	}

	/**
	 * @return void
	 */

	public function insert_aksara(): void
	{
		$this->load->view('backend/aksara/insert');
	}

	/**
	 * @param $id_aksara
	 * @return void
	 */

	public function delete($id_aksara): void
	{
		$delete = $this->Aksara_model->delete($id_aksara);
		if ($delete) {
			$this->session->set_flashdata('sukses', 'Data Aksara Berhasil Dihapus');
		} else {
			$this->session->set_flashdata('gagal', 'Data Aksara Gagal Dihapus');
		}
		redirect(base_url('aksara'));
	}

	public function insert(): void
	{
		$this->form_validation->set_rules('nama_aksara', 'Nama Aksara', 'required|trim');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim');

		if (!$this->form_validation->run()) {
			$this->session->set_flashdata('gagal', validation_errors());
		} else {
			$data = [
				'nama_aksara' => $this->input->post('nama_aksara'),
				'penjelasan' => $this->input->post('keterangan'),
			];
			if (!empty($_FILES['simbol']['name'])) {
				$config['upload_path'] = './upload/simbol/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = 2048;

				$this->load->library('upload', $config);
				if ($this->upload->do_upload('simbol')) {
					$data['simbol'] = $this->upload->data('file_name');
				} else {
					$this->session->set_flashdata('gagal', $this->upload->display_errors());
					redirect(base_url('aksara'));
				}
			}
			// Simpan data ke database
			$this->Aksara_model->insert($data);
			$this->session->set_flashdata('sukses', 'Data aksara berhasil ditambahkan');
		}
		redirect(base_url('aksara'));
	}

	/**
	 * @param $id_aksara
	 * @return void
	 */

	public function edit($id_aksara): void
	{
		$data = [
			'list_aksara' => $this->Aksara_model->get_by_id($id_aksara)
		];
		$this->load->view('backend/aksara/edit', $data);
	}

	/**
	 * @param $id_aksara
	 * @return void
	 */

	public function update($id_aksara): void
	{
		$this->form_validation->set_rules('nama_aksara', 'Nama Aksara', 'required|trim');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim');

		if (!$this->form_validation->run()) {
			$this->session->set_flashdata('gagal', validation_errors());
			redirect(base_url('aksara'));
		} else {
			$data = [
				'nama_aksara' => $this->input->post('nama_aksara'),
				'penjelasan' => $this->input->post('keterangan'),
			];
			if (!empty($_FILES['simbol']['name'])) {
				$config['upload_path'] = './upload/simbol/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = 2048;

				$this->load->library('upload', $config);
				if ($this->upload->do_upload('simbol')) {
					$data['simbol'] = $this->upload->data('file_name');
				} else {
					$this->session->set_flashdata('gagal', $this->upload->display_errors());
					redirect(base_url('aksara'));
				}
			}
			$this->Aksara_model->update($id_aksara, $data);
			$this->session->set_flashdata('sukses', 'Data aksara berhasil ditambahkan');
			redirect(base_url('aksara'));
		}
	}

	public function get_data_aksara(): void
	{
		$fetch_data = $this->Aksara_model->make_datatables();
		if (is_array($fetch_data)) {
			$data = array();
			$no = 1;
			foreach ($fetch_data as $row) {
				$sub_array = array();
				$sub_array[] = $no++;
				$sub_array[] = $row->nama_aksara;
				$sub_array[] = '<img src="' . base_url('upload/simbol/' . $row->simbol) . '" alt="' . $row->nama_aksara . '" width="50">';
				$sub_array[] = $row->penjelasan;
				$sub_array[] = '<a href="' . site_url('aksara/edit/' . $row->id_aksara) . '" class="btn btn-info btn-xs update"><i class="fa fa-edit"></i></a>
                     <a href="' . site_url('aksara/delete/' . $row->id_aksara) . '" onclick="return confirm(\'Apakah anda yakin?\')" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></a>';
				$data[] = $sub_array;
			}
			$output = array(
				"draw" => isset($_POST["draw"]) ? intval($_POST["draw"]) : 0,
				"recordsTotal" => $this->Aksara_model->get_all_data(),
				"recordsFiltered" => $this->Aksara_model->get_filtered_data(),
				"data" => $data
			);
			echo json_encode($output);
		} else {
			echo "Error: Fetch data is not an array.";
		}
	}
}
