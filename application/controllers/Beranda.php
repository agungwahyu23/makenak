<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Beranda extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Models');
	}

	public function index()
	{
		$data['deskripsi'] = $this->db->query("SELECT * FROM profile WHERE Id_Profile = '1'")->result_array();
		$data['produkBeranda'] = $this->db->join('satuanProduk', 'satuanProduk.idSatuan = produk.idSatuan')->get_where('produk', ['status' => 1], 4)->result_array();
		$datanya = [
			'tanggal' => date('Y-m-d'),
		];
		// var_dump($this->session->userdata());die;
		$this->db->insert('pengunjung', $datanya);

		$this->load->view('user/beranda', $data);
	}
}
