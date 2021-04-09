<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/login');
		} else {
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));

			//lakukan pengecekan apakah email terdaftar
			$user = $this->db->get_where('pengguna', ['Email' => $email])->row_array();

			if ($user) {
				if($user['Pekerjaan'] === 'User'){
					$this->session->set_flashdata(
						'message',
						'<div class="alert alert-danger mb-3" role="alert">Email Not Registered</div>'
					);
					redirect('admin/Login');
				}else{
					if ($password === $user['Password']) {
						$data = [
							'Id_User' => $user['Id_User'],
							'Nama' => $user['Nama'],
							'Email' => $user['Email'],
						];
						$this->session->set_userdata($data);
						// echo json_encode($data);
						redirect('admin/Dashboard');
					} else {
						$this->session->set_flashdata(
							'message',
							'<div class="alert alert-danger mb-3" role="alert">Wrong Password!</div>'
						);
						redirect('admin/Login');
					}
				}
			} else {
				$this->session->set_flashdata(
					'message',
					'<div class="alert alert-danger mb-3" role="alert">Email Not Registered</div>'
				);
				redirect('admin/Login');
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('Id_User');
		$this->session->unset_userdata('Nama');
		$this->session->unset_userdata('Email');
		$this->session->set_flashdata(
			'message',
			'<div class="alert alert-success" role="alert">Logout Sucessfull!</div>'
		);
		redirect('admin/Login');
	}
}
