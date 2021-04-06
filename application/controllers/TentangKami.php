<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TentangKami extends CI_Controller
{
	public function index()
	{
		$data['deskripsi'] = $this->db->query("SELECT * FROM profile WHERE Id_Profile = '1'")->result_array();

		$data['tentangKami'] = $this->db->get('companyprofile')->row_array();
		$this->load->view('user/tentang_kami', 	$data);
	}
}
