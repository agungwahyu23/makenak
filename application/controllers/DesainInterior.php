<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DesainInterior extends CI_Controller
{
	public function index()
	{
		if (!empty($_GET['kategori'])) {
			$a = $_GET['kategori'];
			$total = $this->db->query("SELECT * FROM desain_interior, kategori_desain_interior WHERE kategori_desain_interior.id_kategori_interior = desain_interior.id_kategori_interior AND desain_interior.id_kategori_interior = '$a' AND desain_interior.status = '1'")->num_rows();
			$data['totalResult'] = $total;
			$data['deskripsi'] = $this->db->query("SELECT * FROM profile WHERE Id_Profile = '1'")->result_array();
			$data['desain'] = $this->db->query("SELECT * FROM kategori_desain_interior WHERE status = '1'")->result_array();
			$data['tampil'] = $this->db->query("SELECT * FROM desain_interior, kategori_desain_interior WHERE kategori_desain_interior.id_kategori_interior = desain_interior.id_kategori_interior AND desain_interior.id_kategori_interior = '$a' AND desain_interior.status = '1'")->result_array();
			$this->load->view('user/desain_interior', $data);
		} else {
			$data['deskripsi'] = $this->db->query("SELECT * FROM profile WHERE Id_Profile = '1'")->result_array();
			$data['desain'] = $this->db->query("SELECT * FROM kategori_desain_interior WHERE status = '1'")->result_array();
			$data['dataawal'] = $this->db->query("SELECT * FROM desain_interior, kategori_desain_interior WHERE kategori_desain_interior.id_kategori_interior = desain_interior.id_kategori_interior AND desain_interior.status = '1'")->result_array();
			$this->load->view('user/desain_interior', $data);
		}
	}
}
