<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DesainRumah extends CI_Controller
{
	public function index()
	{
		if (!empty($_GET['kategori'])) {
			$a = $_GET['kategori'];
			$total = $this->db->query("SELECT * FROM desain_rumah, kategori_desain_rumah WHERE desain_rumah.id_kategori_rumah = kategori_desain_rumah.id_kategori_rumah AND desain_rumah.id_kategori_rumah ='$a' AND desain_rumah.status = '1'")->num_rows();
			$data['totalResult'] = $total;
			$data['tampil'] = $this->db->query("SELECT * FROM desain_rumah, kategori_desain_rumah WHERE desain_rumah.id_kategori_rumah = kategori_desain_rumah.id_kategori_rumah AND desain_rumah.id_kategori_rumah ='$a' AND desain_rumah.status = '1'")->result_array();
			$data['deskripsi'] = $this->db->query("SELECT * FROM profile WHERE Id_Profile = '1'")->result_array();
			$data['desain'] = $this->db->query("SELECT * FROM kategori_desain_rumah WHERE status = '1'")->result_array();
			$this->load->view('user/desain_rumah', $data);
		} else {
			$data['deskripsi'] = $this->db->query("SELECT * FROM profile WHERE Id_Profile = '1'")->result_array();
			$data['desain'] = $this->db->query("SELECT * FROM kategori_desain_rumah WHERE status = '1'")->result_array();
			$data['dataawal'] = $this->db->query("SELECT * FROM desain_rumah, kategori_desain_rumah WHERE desain_rumah.id_kategori_rumah = kategori_desain_rumah.id_kategori_rumah AND desain_rumah.status = '1'")->result_array();
			$this->load->view('user/desain_rumah', $data);
		}
	}
}
