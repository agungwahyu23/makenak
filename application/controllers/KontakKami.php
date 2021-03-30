<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KontakKami extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Models');
	}
	public function index()
	{
		$data['deskripsi'] = $this->db->query("SELECT * FROM profile WHERE Id_Profile = '1'")->result_array();
		$this->load->view('user/kontak_kami', $data);
	}
	public function send()
	{
		$data = [
			'Id_Masukkan' => $this->Models->randomkode(32),
			'FullName' => $this->input->post('name'),
			'Email' =>  $this->input->post('email'),
			'Subject' => $this->input->post('subject'),
			'Deskripsi' => $this->input->post('description'),
			'CreatedDate' => date("Y-m-d H:i:s"),
		];

		// echo $data;
		$this->db->insert('Masukkan', $data);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
  	Terimakasih Telah mengirimkan Masukkan
 	 </div>');
		redirect('KontakKami');
	}
}
