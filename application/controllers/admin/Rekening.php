<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Rekening extends CI_Controller

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

		$data['rekening'] = $this->db->get('rekening')->result_array();

		// var_dump($data['produk']);die;

		$this->load->view('admin/rekening/data', $data);
	}

	

	public function edit($id)

	{

		$this->form_validation->set_rules('namaBank', 'Nama Bank', 'required');
		$this->form_validation->set_rules('namaTabungan', 'Nama Tabungan', 'required');
		$this->form_validation->set_rules('nomorRekening', 'Nomor Rekening', 'required|numeric');
		if ($this->form_validation->run() == false) {

			$data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>

			$this->session->userdata('Id_User')])->row_array();
			$data['rekening'] =$this->db->get_where('rekening', ['idRekening' => $id])->row_array();

			$this->load->view('admin/rekening/edit', $data);
		} else {

			//update data
			$data = [
				'namaBank' => $this->input->post('namaBank'), 
				'namaTabungan' => $this->input->post('namaTabungan'), 
				'nomorRekening' => $this->input->post('nomorRekening'), 
			];
			// var_dump($data);die;
			$this->db->set($data);
			$this->db->where(['idRekening' => $id]);
			$update = $this->db->update('rekening');
			

		if($update){
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">

			Data Berhasil Diubah !

			</div>');

			redirect('admin/rekening');
		}else{
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">

			Data Gagal Diubah !

			</div>');

			redirect('admin/rekening');
		}

		}
	}

	

}
