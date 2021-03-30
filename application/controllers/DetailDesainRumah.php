<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DetailDesainRumah extends CI_Controller
{
	public function index($id)
	{
		$data['deskripsi'] = $this->db->query("SELECT * FROM profile WHERE Id_Profile = '1'")->result_array();
		$data['tampil'] = $this->db->query("SELECT * FROM desain_rumah, kategori_desain_rumah WHERE kategori_desain_rumah.id_kategori_rumah = desain_rumah.id_kategori_rumah AND desain_rumah.id_desain_rumah = '$id'")->result_array();
		$data['lain'] = $this->db->query("SELECT * FROM desain_rumah, kategori_desain_rumah WHERE desain_rumah.id_kategori_rumah = kategori_desain_rumah.id_kategori_rumah AND desain_rumah.id_kategori_rumah = (SELECT id_kategori_rumah FROM desain_rumah WHERE id_desain_rumah = '$id') AND desain_rumah.id_desain_rumah NOT LIKE '$id' AND desain_rumah.status = '1' LIMIT 3")->result_array();
		$this->load->view('user/detail_desain_rumah', $data);
	}
}
