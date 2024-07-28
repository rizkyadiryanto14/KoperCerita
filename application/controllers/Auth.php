<?php
/**
 * @property $session
 * @property $input
 * @property $Auth_model
 * @property $form_validation
 * @property $output
 */

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model');
	}

	/**
	 * @return void
	 */

	public function index(): void
	{
		$this->load->view('auth/login');
	}

	/**
	 * @return void
	 */

	public function register_view(): void
	{
		$this->load->view('auth/register');
	}

	/**
	 * @return void
	 */

	public function login(): void
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if (!$this->form_validation->run()) {
			$this->session->set_flashdata('error', validation_errors());
			redirect(base_url('login'));
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$user = $this->Auth_model->get_user_by_username($username);

			// Pengecekan pengguna
			if (!$user) {
				$this->session->set_flashdata('gagal', 'User tidak ditemukan');
				redirect(base_url('Auth'));
			} else {
				// Verifikasi password menggunakan password_verify
				if (password_verify($password, $user['password'])) {
					$session_data = [
						'id_pengguna' => $user['id_pengguna'],
						'username' => $user['username'],
						'level' => $user['level'],
						'is_admin' => $user['is_admin'] // Tambahkan informasi is_admin
					];
					$this->session->set_userdata($session_data);

					// Pengalihan berdasarkan level pengguna
//					if ($user['is_admin'] == 1) {
//						redirect(base_url('backend/dashboard')); // Ganti dengan halaman admin
//					} else {
//						redirect(base_url('user/dashboard'));   // Ganti dengan halaman user
//					}
					$this->load->view('welcome_message');
				} else {
					$this->session->set_flashdata('gagal', 'Username atau password salah');
					redirect(base_url('Auth'));
				}
			}
		}
	}


	/**
	 * @return void
	 */
	public function redirect_dashboard(): void
	{
		// Cek role pengguna
		$role = $this->session->userdata('is_admin');
		if ($role == '1') {
			redirect(base_url('backend/dashboard'));
		} else if ($role == '0') {
			redirect(base_url('user/dashboard'));
		} else {
			redirect(base_url('Auth'));
		}
	}

	/**
	 * @return void
	 */
	public function register_process(): void
	{
		$data = [
			'email' => $this->input->post('email'),
			'username' => $this->input->post('username'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'level' => 2
		];

		$insert = $this->Auth_model->insert($data);

		if ($insert) {
			$this->session->set_flashdata('sukses', 'Data User Berhasil Ditambahkan');
		} else {
			$this->session->set_flashdata('gagal', 'Data User Gagal Ditambahkan');
		}
		redirect(base_url('Auth'));
	}

	/**
	 * @return void
	 */

	public function logout(): void
	{
		$this->session->sess_destroy();
		redirect(base_url('Auth'));

	}
}
