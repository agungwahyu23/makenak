<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Produk extends CI_Controller

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

		$data['produk'] = $this->db->get('produk')->result_array();

		// var_dump($data['produk']);die;

		$this->load->view('admin/produk/data', $data);
	}



	public function add()

	{

		$this->form_validation->set_rules('namaProduk', 'Nama Produk', 'required|is_unique[produk.namaProduk]');
		$this->form_validation->set_rules('kategoriProduk', 'Kategori Produk', 'required');
		$this->form_validation->set_rules('komposisiProduk', 'Komposisi Produk', 'required');
		$this->form_validation->set_rules('nettoProduk', 'Netto Produk', 'required|numeric');
		$this->form_validation->set_rules('hargaProduk', 'Harga Produk', 'required|numeric');
		$this->form_validation->set_rules('deskripsiProduk', 'Deskripsi Produk', 'required|max_length[500]');

		if ($this->form_validation->run() == false) {



			$data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>
			$this->session->userdata('Id_User')])->row_array();

			$data['kategori'] = $this->db->get('kategoriproduk')->result_array();

			$this->load->view('admin/produk/add', $data);
		} else {


			$config['allowed_types'] = 'jpg|png|gif|jpeg';

			$config['max_size'] = '7748';

			$config['upload_path'] = './img/Produk';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('gambarProduk')) {

				$foto_namaBaru = $this->upload->data('file_name');

				$data = array(

					'namaProduk' => $this->input->post('namaProduk'),
					'netto' => $this->input->post('nettoProduk'),
					'idKategori' => $this->input->post('kategoriProduk'),
					'komposisi' => $this->input->post('komposisiProduk'),
					'harga' => $this->input->post('hargaProduk'),
					'deskripsi' => $this->input->post('deskripsiProduk'),
					'gambar' => $foto_namaBaru,
					'status' => 1


				);

				if ($this->db->insert('produk', $data)) {

					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">

					  Data Produk Berhasil Ditambahkan.

					</div>');

					redirect('admin/Produk');
				} else {

					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Gagal Menambahkan Produk</div>');

					redirect('admin/Produk');
				}
			} else {

				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">'

					. $this->upload->display_errors() .

					'</div>');

				redirect('admin/Produk');
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

		$this->form_validation->set_rules('namaProduk', 'Nama Produk', 'required');
		$this->form_validation->set_rules('kategoriProduk', 'Kategori Produk', 'required');
		$this->form_validation->set_rules('nettoProduk', 'Netto Produk', 'required|numeric');
		$this->form_validation->set_rules('hargaProduk', 'Harga Produk', 'required|numeric');
		$this->form_validation->set_rules('statusProduk', 'Status Produk', 'required|numeric');
		$this->form_validation->set_rules('deskripsiProduk', 'Deskripsi Produk', 'required|max_length[500]');

		if ($this->form_validation->run() == false) {

			$data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>

			$this->session->userdata('Id_User')])->row_array();

			$data['produk'] = $this->db->get_where('produk', ['id' => $id])->row_array();
			$data['sub'] = $this->db->query("SELECT * FROM produk, kategoriproduk WHERE produk.idKategori = kategoriproduk.idkategori AND produk.id = '$id'")->result();
			$data['kategori'] = $this->db->get('kategoriProduk')->result_array();

			// var_dump($data['kategori']);die;
			// var_dump($data['sub']);die;

			$this->load->view('admin/produk/edit', $data);
		} else {

			//update data
			$data = [
				'namaProduk' => $this->input->post('namaProduk'),
				'netto' => $this->input->post('nettoProduk'),
				'idKategori' => $this->input->post('kategoriProduk'),
				'harga' => $this->input->post('hargaProduk'),
				'deskripsi' => $this->input->post('deskripsiProduk'),
				'status' => $this->input->post('statusProduk')
			];
			// var_dump($data);die;
			$this->db->set($data);
			$this->db->where(['id' => $id]);
			$update = $this->db->update('produk');



			if ($update) {

				$ubahfoto = $_FILES['gambarProduk']['name'];



				if ($ubahfoto) {

					$config['allowed_types'] = 'jpg|jpeg|png|gif';

					$config['max_size'] = '2048';

					$config['upload_path'] = './img/Produk/';



					$this->load->library('upload', $config);



					if ($this->upload->do_upload('gambarProduk')) {

						$data = $this->db->get_where('produk', ['id' => $id])->row_array();

						$fotolama = $data['gambar'];

						if ($fotolama) {

							unlink(FCPATH . './img/Produk/' . $fotolama);
						}

						$fotobaru = $this->upload->data('file_name');

						$this->db->set('gambar', $fotobaru);

						$this->db->where('id', $id);

						$this->db->update('produk');

						$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">

						Berhasil Mengubah Data!

						</div>');

						redirect('admin/Produk');
					} else {

						$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">'

							. $this->upload->display_errors() .

							'</div>');

						// redirect('user/editprofile');

						redirect('admin/Produk');
					}
				} else {



					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">

					Berhasil Mengubah Data!

					</div>');

					redirect('admin/Produk');
				}
			} else {

				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">

				Gagal Mengubah Data!

				</div>');

				redirect('admin/Produk');
			}
		}
	}

	

	public function hapus($id)

	{

		$hapus = $this->db->delete('produk', ['id' => $id]);

		if ($hapus) {


			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">

			Data Berhasil Dihapus

			</div>');

			redirect('admin/Produk');
		} else {

			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">

													Data Gagal Dihapus

							</div>');

			redirect('admin/Produk');
		}
	}

}
