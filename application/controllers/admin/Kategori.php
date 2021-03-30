<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Kategori extends CI_Controller

{

	public function __construct()

	{

		parent::__construct();

		$this->load->library('form_validation');

		$this->load->model('Models');

		belumlogin();
	}

	public function index()

	{

		$data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>

		$this->session->userdata('Id_User')])->row_array();

		$data['kategori'] = $this->db->get('kategoriproduk')->result_array();

		// var_dump($data['produk']);die;

		$this->load->view('admin/kategori/data', $data);
	}



	public function add()

	{

		$this->form_validation->set_rules('namaKategori', 'Nama Kategori', 'required|is_unique[kategoriproduk.kategori]');

		if ($this->form_validation->run() == false) {



			$data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>
			$this->session->userdata('Id_User')])->row_array();

			$this->load->view('admin/kategori/add', $data);
		} else {

			$data = [
				'kategori' => $this->input->post('namaKategori')
			];

				if ($this->db->insert('kategoriproduk', $data)) {

					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">

					  Data Kategori Berhasil Ditambahkan.

					</div>');

					redirect('admin/kategori');
				} else {

					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Gagal Menambahkan Kategori</div>');

					redirect('admin/kategori');
				}
			
		}
	}

	

	public function unggahGambar($id)

	{



		$countfiles = count($_FILES['files']['name']);



		for ($i = 0; $i < $countfiles; $i++) {



			if (!empty($_FILES['files']['name'][$i])) {



				// Define new $_FILES array - $_FILES['file']

				$_FILES['file']['name'] = $_FILES['files']['name'][$i];

				$_FILES['file']['type'] = $_FILES['files']['type'][$i];

				$_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];

				$_FILES['file']['error'] = $_FILES['files']['error'][$i];

				$_FILES['file']['size'] = $_FILES['files']['size'][$i];



				// Set preference

				$config['upload_path'] = './uploads/Rumah';

				$config['allowed_types'] = 'jpg|jpeg|png|gif';

				$config['max_size'] = '5000'; // max_size in kb

				$config['file_name'] = $_FILES['files']['name'][$i];



				//Load upload library

				$this->load->library('upload', $config);

				$this->upload->initialize($config);

				$arr = array('msg' => 'terjadi kesalahan tidak diduga, ulangi kembali', 'success' => false);

				// File upload

				if ($this->upload->do_upload('file')) {

					$data = $this->upload->data();

					$insert = [

						'Id_Galeri' => $this->Models->randomkode(32),

						'Id_Rumah' => $id,

						'Galeri' => $data['file_name'],



					];

					$save = $this->db->insert('galeri', $insert);

					if ($save) {

						$arr = array('msg' => 'Foto Berhasil Diunggah', 'success' => true);

						// $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">

						// Gambar Berhasil Ditambah

						// </div>');

						// redirect('Data_Rumah');

					} else {

						$arr = array('msg' => 'terjadi kesalahan tidak diduga saat insert database , ulangi kembali ', 'success' => false);

						// $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">

						// terjadi kesalahan

						// </div>');

						// redirect('Data_Rumah');



					}
				}
			}
		}

		echo json_encode($arr);
	}

	public function edit($id)

	{

		$this->form_validation->set_rules('namaKategori', 'Nama Kategori', 'required|is_unique[kategoriproduk.kategori]');
		if ($this->form_validation->run() == false) {

			$data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>

			$this->session->userdata('Id_User')])->row_array();
			$data['kategori'] =$this->db->get_where('kategoriproduk', ['idkategori' => $id])->row_array();

			$this->load->view('admin/kategori/edit', $data);
		} else {

			//update data
			$data = [
				'kategori' => $this->input->post('namaKategori')
			];
			// var_dump($data);die;
			$this->db->set($data);
			$this->db->where(['idkategori' => $id]);
			$update = $this->db->update('kategoriproduk');
			

		if($update){
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">

			Data Berhasil Diubah !

			</div>');

			redirect('admin/kategori');
		}else{
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">

			Data Gagal Diubah !

			</div>');

			redirect('admin/kategori');
		}

		}
	}

	

	public function hapus($id)

	{

		$hapus = $this->db->delete('kategoriproduk', ['idkategori' => $id]);

		if ($hapus) {


			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">

			Data Berhasil Dihapus

			</div>');

			redirect('admin/kategori');
		} else {

			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">

													Data Gagal Dihapus

							</div>');

			redirect('admin/kategori');
		}
	}

}
