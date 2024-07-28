<?php

/**
 * @property $Pelatihan_model
 * @property $form_validation
 * @property $input
 * @property $session
 * @property $upload
 */

class Pelatihan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('is_admin') == 1) {
			redirect(base_url('Auth'));
		}
		$this->load->model('Pelatihan_model');
		$this->load->library('upload');
	}

	/**
	 * @return void
	 */

	public function index(): void
	{
		$this->load->view('backend/pelatihan/pelatihan');
	}

	/**
	 * @return void
	 */

	public function view_insert(): void
	{
		$this->load->view('backend/pelatihan/insert');
	}

	/**
	 * @return void
	 */

	public function insert(): void
	{
		// Validasi input
		$this->form_validation->set_rules('jenis_kontent', 'Jenis Konten', 'required');
		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('materi', 'Materi', 'required');

		if (!$this->form_validation->run()) {
			$this->session->set_flashdata('gagal', validation_errors());
			redirect('backend/pelatihan');
		} else {
			$config['upload_path'] = './upload/thumbnail/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = 2048;

			$this->upload->initialize($config);

			if (!$this->upload->do_upload('thumbnail')) {
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('gagal', $error['error']);
			} else {
				$data_upload = $this->upload->data();
				// Proses Konten Summernote
				$konten = $this->input->post('materi');
				$konten = $this->prosesKontenSummernote($konten);

				$data = array(
					'thumbnail' => $data_upload['file_name'],
					'judul' => $this->input->post('judul'),
					'jenis_konten' => $this->input->post('jenis_kontent'),
					'isi' => $konten,
				);

				if ($this->Pelatihan_model->insert($data)) {
					$this->session->set_flashdata('sukses', 'Data berhasil disimpan.');
				} else {
					$this->session->set_flashdata('gagal', 'Gagal menyimpan data.');
				}
			}
			redirect(base_url('backend/pelatihan'));
		}
	}

	/**
	 * @param $konten
	 * @return array|string|null
	 */

	public function prosesKontenSummernote($konten)
	{
		$konten = preg_replace_callback('/<img src="data:image\/([^;]+);base64,([^"]+)"([^>]+)>/', function ($matches) {
			$imageData = base64_decode($matches[2]);
			$filename = uniqid() . '.' . $matches[1]; // Generate nama file unik
			$filepath = 'upload/thumbnail/' . $filename; // Path penyimpanan gambar
			file_put_contents($filepath, $imageData);
			return '<img src="' . base_url($filepath) . '" ' . $matches[3] . '>';
		}, $konten);
		return $konten;
	}


	/**
	 * @param $id_kontent
	 * @return void
	 */

	public function detail_kontent($id_kontent): void
	{
		$data = [
			'konten' => $this->Pelatihan_model->detail($id_kontent),
		];
		$this->load->view('backend/pelatihan/detail', $data);
	}

	/**
	 * @param $id_konten
	 * @return void
	 */

	public function edit($id_konten): void
	{
		$data = [
			'konten' => $this->Pelatihan_model->detail($id_konten),
		];
		$this->load->view('backend/pelatihan/edit', $data);
	}

	/**
	 * @param $id_konten
	 * @return void
	 */

	public function update($id_konten): void
	{
		// Validasi input
		$this->form_validation->set_rules('jenis_kontent', 'Jenis Konten', 'required');
		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('materi', 'Materi', 'required');

		if (!$this->form_validation->run()) {
			$this->session->set_flashdata('gagal', validation_errors());
			redirect('backend/pelatihan');
		} else {
			$config['upload_path'] = './upload/thumbnail/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = 2048;

			$this->upload->initialize($config);

			if (!$this->upload->do_upload('thumbnail')) {
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('gagal', $error['error']);
			} else {
				$data_upload = $this->upload->data();
				// Proses Konten Summernote
				$konten = $this->input->post('materi');
				$konten = $this->prosesKontenSummernote($konten);

				$data = array(
					'thumbnail' => $data_upload['file_name'],
					'judul' => $this->input->post('judul'),
					'jenis_konten' => $this->input->post('jenis_kontent'),
					'isi' => $konten,
				);

				if ($this->Pelatihan_model->update($id_konten, $data)) {
					$this->session->set_flashdata('sukses', 'Data berhasil update.');
				} else {
					$this->session->set_flashdata('gagal', 'Gagal update data.');
				}
			}
			redirect(base_url('backend/pelatihan'));
		}
	}

	/**
	 * @param $id_konten
	 * @return void
	 */
	public function delete($id_konten): void
	{
		$delete = $this->Pelatihan_model->delete($id_konten);

		if ($delete) {
			$this->session->set_flashdata('sukses', 'Data Konten Berhasil Dihapus');
		} else {
			$this->session->set_flashdata('gagal', 'Data Konten Gagal Dihapus');
		}
		redirect(base_url('backend/pelatihan'));
	}

	/**
	 * @return void
	 */

	public function get_data_konten(): void
	{
		$fetch_data = $this->Pelatihan_model->make_datatables();
		if (is_array($fetch_data)) {
			$data = array();
			$no = 1;
			foreach ($fetch_data as $row) {
				$sub_array = array();
				$sub_array[] = $no++;
				$sub_array[] = '<img src="' . base_url('upload/thumbnail/' . $row->thumbnail) . '" alt="' . $row->thumbnail . '" width="100">';
				$sub_array[] = $row->judul;
				$sub_array[] = $row->jenis_konten;
				$sub_array[] = '<a href="' . site_url('pelatihan/detail/' . $row->id_konten) . '">Klik untuk melihat konten</a>';
				$sub_array[] = '<a href="' . site_url('backend/edit_pelatihan/' . $row->id_konten) . '" class="btn btn-info btn-xs update"><i class="fa fa-edit"></i></a>
                     <a href="' . site_url('pelatihan/delete/' . $row->id_konten) . '" onclick="return confirm(\'Apakah anda yakin? data pada tabel terkait akan ikut terhapus\')" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></a>';
				$data[] = $sub_array;
			}
			$output = array(
				"draw" => isset($_POST["draw"]) ? intval($_POST["draw"]) : 0,
				"recordsTotal" => $this->Pelatihan_model->get_all_data(),
				"recordsFiltered" => $this->Pelatihan_model->get_filtered_data(),
				"data" => $data
			);
			echo json_encode($output);
		} else {
			echo "Error: Fetch data is not an array.";
		}
	}
}
