<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Ongkir extends CI_Controller

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

		$data['kategori'] = $this->db->get('dataongkir')->result_array();

		// var_dump($data['produk']);die;

		$this->load->view('admin/ongkir/data', $data);
	}



	public function add()

	{

		$this->form_validation->set_rules('provinsi', 'Provinsi', 'required|is_unique[dataongkir.provinsi]');
		$this->form_validation->set_rules('harga', 'Ongkos Kirim', 'required|numeric');

		if ($this->form_validation->run() == false) {

			$data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>
			$this->session->userdata('Id_User')])->row_array();

			$this->load->view('admin/ongkir/add', $data);
		} else {

			$data = [
				'provinsi' => $this->input->post('provinsi'),
				'harga' => $this->input->post('harga')
			];

				if ($this->db->insert('dataongkir', $data)) {

					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">

					  Data Ongkos Kirim Berhasil Ditambahkan.

					</div>');

					redirect('admin/Ongkir');
				} else {

					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Gagal Menambahkan Kategori</div>');

					redirect('admin/Ongkir');
				}
			
		}
	}

	

	
	public function edit($id)

	{

		$this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
		$this->form_validation->set_rules('harga', 'Ongkos Kirim', 'required|numeric');
		if ($this->form_validation->run() == false) {

			$data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>

			$this->session->userdata('Id_User')])->row_array();
			$data['ongkir'] =$this->db->get_where('dataongkir', ['id' => $id])->row_array();

			$this->load->view('admin/ongkir/edit', $data);
		} else {

			//update data
			$data = [
				'provinsi' => $this->input->post('provinsi'),
				'harga' => $this->input->post('harga')
			];
			// var_dump($data);die;
			$this->db->set($data);
			$this->db->where(['id' => $id]);
			$update = $this->db->update('dataongkir');
			

		if($update){
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">

			Data Berhasil Diubah !

			</div>');

			redirect('admin/ongkir');
		}else{
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">

			Data Gagal Diubah !

			</div>');

			redirect('admin/ongkir');
		}

		}
	}

	

	public function hapus($id)

	{

		$hapus = $this->db->delete('dataongkir', ['id' => $id]);

		if ($hapus) {


			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">

			Data Berhasil Dihapus

			</div>');

			redirect('admin/Ongkir');
		} else {

			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">

													Data Gagal Dihapus

							</div>');

			redirect('admin/Ongkir');
		}
	}

}
