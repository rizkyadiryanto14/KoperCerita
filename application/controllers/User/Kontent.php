<?php

/**
 * @property $Pelatihan_model
 * @property $session
 * @property $History_model
 */

class Kontent extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pelatihan_model');
		$this->load->model('History_model');
	}

	/**
	 * @return void
	 */

	public function index(): void
	{
		$data = [
			'pelatihan' => $this->Pelatihan_model->get_pelatihan()
		];
		$this->load->view('user/kontent', $data);
	}

	public function detail_kontent($id_kontent): void
	{
		$data = [
			'id_pengguna' => $this->session->userdata('id_pengguna'),
			'id_konten' => $id_kontent,
			'waktu' => date('Y-m-d H:i:s')
		];

		$this->History_model->insert($data);

		$data = [
			'konten' => $this->Pelatihan_model->detail($id_kontent),
			'pelatihan' => $this->Pelatihan_model->get_pelatihan()
		];
		$this->load->view('user/detail_konten', $data);
	}
}
