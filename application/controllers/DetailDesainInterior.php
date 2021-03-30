<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DetailDesainInterior extends CI_Controller
{
	public function index($id)
	{
		$data['deskripsi'] = $this->db->query("SELECT * FROM profile WHERE Id_Profile = '1'")->result_array();
		$data['tampil'] = $this->db->query("SELECT * FROM desain_interior, kategori_desain_interior WHERE kategori_desain_interior.id_kategori_interior = desain_interior.id_kategori_interior AND desain_interior.id_desain_interior = '$id'")->result_array();
		$data['lain'] = $this->db->query("SELECT * FROM desain_interior, kategori_desain_interior WHERE desain_interior.id_kategori_interior = kategori_desain_interior.id_kategori_interior AND desain_interior.id_kategori_interior = (SELECT id_kategori_interior FROM desain_interior WHERE id_desain_interior = '$id') AND desain_interior.id_desain_interior NOT LIKE '$id' AND desain_interior.status = '1' LIMIT 3")->result_array();
		$this->load->view('user/detail_desain_interior', $data);
	}
}
