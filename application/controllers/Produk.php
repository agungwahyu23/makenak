<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
	public function index()
	{
		$data['deskripsi'] = $this->db->query("SELECT * FROM profile WHERE Id_Profile = '1'")->result_array();
		// $data['detailProduk'] = $this->db->get_where('produk', ['id' => $id])->row_array();
		$this->load->view('user/detail_produk',	$data);
	}
	public function DetailProduk($id = null)
	{
		if ($id) {
			$data['deskripsi'] = $this->db->query("SELECT * FROM profile WHERE Id_Profile = '1'")->result_array();
			$data['detailProduk'] = $this->db->get_where('produk', ['id' => $id])->row_array();
			$this->load->view('user/detail_produk',	$data);
		}else{
			redirect(base_url());
		}
	}
}
