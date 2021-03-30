<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Models');
		belumlogin();
	}
	public function index()
	{
		$data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>
		$this->session->userdata('Id_User')])->row_array();
		$data['data'] = $this->db->query("SELECT * FROM pengguna WHERE Status = '2'")->result_array();
		$this->load->view('admin/user/data',	$data);
	}

	// public function add()
	// {

	// 	$this->load->view('admin/user/add');
	// }

	public function edit($id)
	{
		$this->form_validation->set_rules('name', 'Nama_Pengguna', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		if ($this->form_validation->run() == false) {

			$data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>
			$this->session->userdata('Id_User')])->row_array();
			$data['kd'] = $this->Models->randomkode(32);
			$data['data'] = $this->db->query("SELECT * FROM pengguna WHERE Id_User = '$id'")->result_array();
			$this->load->view('admin/user/edit', $data);
		} else {
			$data = [
				'Id_User' => $this->Models->randomkode(32),
				'Nama' => $this->input->post('name'),
				'Email' =>  $this->input->post('email'),
				'Password' => md5($this->input->post('password')),
				'Pekerjaan' => $this->input->post('pekerjaan'),
				'Alamat' => $this->input->post('alamat'),
				'No_Hp' => $this->input->post('no_hp'),
			];
			$update = $this->Models->update($data, "Id_User", "pengguna", $id);
			// echo $data;
			if ($update) {

				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
       Akun Berhasil Di Ubah
    </div>');
				redirect('admin/User');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Akun Gagal Di Ubah
     </div>');
				redirect('admin/User');
			}
		}
	}
	public function detail($id)
	{
		$data['data'] = $this->db->query("SELECT * FROM pengguna WHERE Id_User = '$id'")->result_array();
		$this->load->view('admin/user/detail', $data);
	}
	public function hapus($id)
	{
		$hapusku = $this->Models->hapusdata("Id_User", "pengguna", $id);
		if ($hapusku) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					Data Berhasil Dihapus
			</div>');
			redirect('admin/User');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
													Data Gagal Dihapus
							</div>');
			redirect('admin/User');
		}
	}
	public function Aktifkan($id)
	{
		$this->db->set('is_valid', 1);
		$this->db->where('Id_User', $id);
		$this->db->update('pengguna');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success mb-3" role="alert">
				Akun User Aktif
		</div>');
		redirect('admin/User');
	}
	public function Off($id)
	{
		$this->db->set('is_valid', 0);
		$this->db->where('Id_User', $id);
		$this->db->update('pengguna');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger mb-3 mt-3" role="alert">
		Akun User Berhasil Di Off
		</div>');
		redirect('admin/User');
	}
}
