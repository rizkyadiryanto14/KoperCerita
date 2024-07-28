<?php
/**
 * @property $Aksara_model
 */

class Aksara extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Aksara_model');
	}

	/**
	 * @return void
	 */

	public function index(): void
	{
		$data = [
			'aksara' => $this->Aksara_model->get_aksara_data()
		];
		$this->load->view('user/aksara', $data);
	}
}
