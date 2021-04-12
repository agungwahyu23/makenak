<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Satuan extends CI_Controller

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

		$data['satuan'] = $this->db->get('satuanProduk')->result_array();

		// var_dump($data['produk']);die;

		$this->load->view('admin/satuan/data', $data);
	}



	public function add()

	{

		$this->form_validation->set_rules('namaSatuan', 'Nama Satuan', 'required|is_unique[satuanProduk.namaSatuan]');

		if ($this->form_validation->run() == false) {

			$data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>
			$this->session->userdata('Id_User')])->row_array();

			$this->load->view('admin/satuan/add', $data);
		} else {

			$data = [
				'namaSatuan' => $this->input->post('namaSatuan')
			];

				if ($this->db->insert('satuanProduk', $data)) {

					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">

					  Data Satuan Produk Berhasil Ditambahkan.

					</div>');

					redirect('admin/Satuan');
				} else {

					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Gagal Menambahkan Satuan produk</div>');

					redirect('admin/Satuan');
				}
			
		}
	}


	public function edit($id)

	{

		$this->form_validation->set_rules('namaSatuan', 'Nama Satuan', 'required|is_unique[satuanProduk.namaSatuan]');
		if ($this->form_validation->run() == false) {

			$data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>

			$this->session->userdata('Id_User')])->row_array();
			$data['satuan'] =$this->db->get_where('satuanProduk', ['idSatuan' => $id])->row_array();

			$this->load->view('admin/satuan/edit', $data);
		} else {

			//update data
			$data = [
				'namaSatuan' => $this->input->post('namaSatuan')
			];
			// var_dump($data);die;
			$this->db->set($data);
			$this->db->where(['idSatuan' => $id]);
			$update = $this->db->update('satuanProduk');
			

		if($update){
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">

			Data Berhasil Diubah !

			</div>');

			redirect('admin/Satuan');
		}else{
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">

			Data Gagal Diubah !

			</div>');

			redirect('admin/Satuan');
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
