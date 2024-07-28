<?php
/**
 * @property $Pelatihan_model
 * @property $session
 * @property $History_model
 * @property $Kuis_model
 */

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pelatihan_model');
		$this->load->model('History_model');
		$this->load->model('Kuis_model');
	}

	/**
	 * @return void
	 */

	public function index(): void
	{
		$id_pengguna = $this->session->userdata('id_pengguna');
		$totalkonten = $this->Pelatihan_model->getTotalKonten();
		$readkontent = $this->History_model->getReadKontenCount($id_pengguna);

		$progress = ($totalkonten > 0) ? ($readkontent / $totalkonten) * 100 : 0;
		$progress = min($progress, 100); // Pastikan progress tidak lebih dari 100%

		$data = [
			'pelatihan' => $this->Pelatihan_model->get_pelatihan(),
			'jumlah_latihan' => $this->Pelatihan_model->get_all_data(),
			'kuis' => $this->Kuis_model->get_all_data(),
			'progress' => $progress
		];

		$this->load->view('user/dashboard', $data);
	}
}
