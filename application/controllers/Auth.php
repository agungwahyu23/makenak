<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Models');
	}
	public function index()
	{
		if ($this->session->userdata('idCustomer')) {
			redirect(base_url());
		} else {

			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');

			if ($this->form_validation->run() == false) {
				$this->load->view('user/Masuk');
			} else {

				$email = $this->input->post('email');
				$password = md5($this->input->post('password'));

				//lakukan pengecekan apakah email terdaftar
				$user = $this->db->get_where('pengguna', ['Email' => $email, 'Pekerjaan' => 'User'])->row_array();

				if ($user) {
					if ($password === $user['Password']) {
						$data = [
							'idCustomer' => $user['Id_User'],
							'namaCustomer' => $user['Nama'],
							'EmailCustomer' => $user['Email'],
						];
						$this->session->set_userdata($data);
						$this->session->set_flashdata(
							'message',
							'<div class="alert alert-danger mb-3" role="alert">Selamat datang di Mak Enak</div>'
						);
						redirect('Dashboard'); //arahkan ke halaman pengguna
					} else {
						$this->session->set_flashdata(
							'message',
							'<div class="alert alert-danger mb-3" role="alert">Password Salah!</div>'
						);
						redirect('Auth'); //kembali ke halaman login
					}
				} else {
					$this->session->set_flashdata(
						'message',
						'<div class="alert alert-danger mb-3" role="alert">Email Tidak Terdaftar</div>'
					);
					redirect('Auth'); //kembali ke halaman login
				}
			}
		}
	}

	public function akun()
	{
		
		redirect('Dashboard');
		
	}

	public function daftar()
	{
		if ($this->session->userdata('idCustomer')) {
			redirect(base_url());
		} else {

			$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[pengguna.Email]');
			$this->form_validation->set_rules('noWa', 'Nomor Telepon / WhatsApp', 'required|numeric|min_length[11]');
			$this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
			$this->form_validation->set_rules('konfirmasiPassword', 'Konfirmasi Password', 'required|min_length[5]|matches[password]');


			if ($this->form_validation->run() == false) {

				$this->load->view('user/Daftar');
			} else {
				$data = [
					'Id_User' => $this->Models->randomkode(32),
					'Nama' => $this->input->post('nama'),
					'Email' => $this->input->post('email'),
					'Password' => md5($this->input->post('password')),
					'Pekerjaan' => 'User',
					'Alamat' => $this->input->post('provinsi'),
					'No_Hp' => $this->input->post('noWa'),
					'CreatedDate' => date("Y-m-d H:i:s"),
					'Status' => 1,
					'is_valid' => 1,
				];

				// var_dump($data);die;

				$this->db->insert('pengguna', $data);

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
     	 	Akun Berhasil Terdaftar, Silahkan Login Untuk Melanjutkan.
      		</div>');
				redirect('Auth');
			}
		}
	}

	public function Keluar()
	{
		$this->session->unset_userdata('idCustomer');
		$this->session->unset_userdata('namaCustomer');
		$this->session->unset_userdata('EmailCustomer');
		$this->session->set_flashdata(
			'message',
			'<div class="alert alert-success" role="alert">Berhasil Keluar!</div>'
		);
		redirect(base_url());
	}
}
