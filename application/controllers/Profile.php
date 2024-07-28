<?php
/**
 * @property $Pengguna_model
 * @property $session
 */

class Profile extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pengguna_model');
	}

	/**
	 * @return void
	 */
	public function index(): void
	{
		$data = [
			'profile_admin' => $this->Pengguna_model->get_by_id($this->session->userdata('id_pengguna'))
		];
		$this->load->view('backend/profile', $data);
	}
}
