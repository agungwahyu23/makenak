<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function index()
	{
		$this->load->view('user/Masuk');
	}

	public function Daftar()
	{
		$this->load->view('user/Daftar');
	}
}
