<?php

/**
 * @property $session
 * @property $Pelatihan_model
 * @property $Kuis_model
 * @property $Pengguna_model
 * @property $Aksara_model
 */

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('is_admin') == 1) {
			redirect(base_url('Auth'));
		}
		$this->load->model('Pelatihan_model');
		$this->load->model('Kuis_model');
		$this->load->model('Pengguna_model');
		$this->load->model('Aksara_model');
	}

	/**
	 * @return void
	 */

	public function index(): void
	{
		$userGrowthData = $this->Pengguna_model->getUserGrowthData();

		$data = [
			'pelatihan' => $this->Pelatihan_model->get_all_data(),
			'kuis' => $this->Kuis_model->get_all_data(),
			'pengguna' => $this->Pengguna_model->get_all_data(),
			'aksara' => $this->Aksara_model->get_all_data(),
			'userGrowthData' => json_encode($userGrowthData)
		];

		$this->load->view('backend/dashboard', $data);
	}
}
