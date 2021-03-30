<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SignIn extends CI_Controller
{
	public function index()
	{
		$this->load->view('user/sign_in');
	}
}
