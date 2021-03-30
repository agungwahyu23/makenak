<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ComingSoon extends CI_Controller
{
	public function index()
	{
		$data['deskripsi'] = $this->db->query("SELECT * FROM profile WHERE Id_Profile = '1'")->result_array();
		$this->load->view('user/coming_soon', $data);
	}
}
