<?php

/**
 * @property $Pengguna_model
 * @property $session
 * @property $form_validation
 * @property $input
 */

class Pengguna extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('is_admin') == 1) {
			redirect(base_url('Auth'));
		}
		$this->load->model('Pengguna_model');
	}

	/**
	 * @return void
	 */

	public function index(): void
	{
		$this->load->view('backend/pengguna/pengguna');
	}

	/**
	 * @return void
	 */

	public function insert_pengguna(): void
	{
		$this->load->view('backend/pengguna/insert');
	}

	/**
	 * @return void
	 */

	public function insert(): void
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rule('password', 'password', 'require');

		$data = [
			'username' => $this->input->post('username'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'level' => $this->input->post('level')
		];

		$update = $this->Pengguna_model->insert($data);

		if ($update) {
			$this->session->set_flashdata('sukses', 'Data Pengguna Berhasil Ditambahkan');
		} else {
			$this->session->set_flashdata('gagal', 'Data Pengguna Gagal Ditambahkan');
		}
		redirect(base_url('backend/pengguna'));
	}

	/**
	 * @param $id_pengguna
	 * @return void
	 */

	public function edit($id_pengguna): void
	{
		$data = [
			'list_pengguna' => $this->Pengguna_model->get_by_id($id_pengguna)
		];
		$this->load->view('backend/pengguna/edit', $data);
	}

	/**
	 * @param $id_pengguna
	 * @return void
	 */

	public function update($id_pengguna): void
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rule('password', 'password', 'require');

		$data = [
			'username' => $this->input->post('username'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'level' => $this->input->post('level')
		];
		$update = $this->Pengguna_model->update($id_pengguna, $data);

		if ($update) {
			$this->session->set_flashdata('sukses', 'Data Pengguna Berhasil Update');
		} else {
			$this->session->set_flashdata('gagal', 'Data Pengguna Gagal Update');
		}
		redirect(base_url('backend/pengguna'));
	}

	/**
	 * @param $id_pengguna
	 * @return void
	 */

	public function delete($id_pengguna): void
	{
		$data = $this->Pengguna_model->delete($id_pengguna);
		if ($data) {
			$this->session->set_flashdata('sukses', 'Data pengguna berhasil dihapus');
		} else {
			$this->session->set_flashdata('gagal', 'Data pengguna gagal dihapus');
		}
		redirect(base_url('backend/pengguna'));
	}

	public function get_data_pengguna(): void
	{
		$fetch_data = $this->Pengguna_model->make_datatables();
		if (is_array($fetch_data)) {
			$data = array();
			$no = 1;
			foreach ($fetch_data as $row) {
				$sub_array = array();
				$sub_array[] = $no++;
				$sub_array[] = $row->email;
				$sub_array[] = $row->username;
				$sub_array[] = ($row->level == 1) ? 'Admin' : 'User';
				$sub_array[] = '<a href="' . site_url('pengguna/edit/' . $row->id_pengguna) . '" class="btn btn-info btn-xs update"><i class="fa fa-edit"></i></a>
                     <a href="' . site_url('pengguna/delete/' . $row->id_pengguna) . '" onclick="return confirm(\'Apakah anda yakin?\')" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></a>';
				$data[] = $sub_array;
			}
			$output = array(
				"draw" => isset($_POST["draw"]) ? intval($_POST["draw"]) : 0,
				"recordsTotal" => $this->Pengguna_model->get_all_data(),
				"recordsFiltered" => $this->Pengguna_model->get_filtered_data(),
				"data" => $data
			);
			echo json_encode($output);
		} else {
			echo "Error: Fetch data is not an array.";
		}
	}
}
