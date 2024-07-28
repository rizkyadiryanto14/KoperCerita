<?php

/**
 * @property $session
 */

class Laporan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('is_admin') == 1) {
			redirect(base_url('Auth'));
		}
	}

	/**
	 * @return void
	 */

	public function index(): void
	{
		$this->load->view('backend/laporan/laporan');
	}
}
