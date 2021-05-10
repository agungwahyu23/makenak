<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
    $data['data'] = $this->db->query("SELECT * FROM pengguna WHERE Status = '1' && Pekerjaan != 'User'")->result_array();
    $this->load->view('admin/admin/data', $data);
  }
  
  public function pelanggan()
  {
    $data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>
    $this->session->userdata('Id_User')])->row_array();
    $data['data'] = $this->db->query("SELECT * FROM pengguna WHERE Status = '1' && Pekerjaan = 'User'")->result_array();
    $this->load->view('admin/admin/pelanggan', $data);
  }

  public function add()
  {
    $this->form_validation->set_rules('name', 'Nama_Pengguna', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[pengguna.Email]');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
    $this->form_validation->set_rules('pekerjaan', 'Bagian', 'required');
    $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required|min_length[10]|numeric');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
    if ($this->form_validation->run() == false) {

      $data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>
      $this->session->userdata('Id_User')])->row_array();
      $data['kd'] = $this->Models->randomkode(32);
      $this->load->view('admin/admin/add',   $data);
    } else {
      $data = [
        'Id_User' => $this->Models->randomkode(32),
        'Nama' => $this->input->post('name'),
        'Email' =>  $this->input->post('email'),
        'Password' => md5($this->input->post('password')),
        'Pekerjaan' => $this->input->post('pekerjaan'),
        'Alamat' => $this->input->post('alamat'),
        'No_Hp' => $this->input->post('no_hp'),
        'CreatedDate' => date("Y-m-d H:i:s"),
        'Status' => 1,
        'is_valid' => 1,
      ];

      // echo $data;
      $this->db->insert('pengguna', $data);

      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      Akun Berhasil Di Tambahkan
      </div>');
      redirect('admin/Admin');
    }
  }

  public function edit($id)
  {
    $this->form_validation->set_rules('isValid', 'Status', 'required');
    if ($this->form_validation->run() == false) {

      $data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>
      $this->session->userdata('Id_User')])->row_array();
      $data['kd'] = $this->Models->randomkode(32);
      $data['data'] = $this->db->query("SELECT * FROM pengguna WHERE Id_User = '$id'")->result_array();
      $this->load->view('admin/admin/edit', $data);
    } else {
      $data = [
        'is_Valid' => $this->input->post('isValid'),
      ];


      $update = $this->Models->update($data, "Id_User", "pengguna", $id);
      // echo $data;
      if ($update) {

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
       Akun Berhasil Di Ubah
    </div>');
        redirect('admin/Admin');
      } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Akun Gagal Di Ubah
     </div>');
        redirect('admin/Admin');
      }
    }
  }

  public function detail($id)
  {
    $data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>
    $this->session->userdata('Id_User')])->row_array();
    $data['data'] = $this->db->query("SELECT * FROM pengguna WHERE Id_User = '$id'")->result_array();
    $this->load->view('admin/admin/detail', $data);
  }

  public function hapus($id)
  {
    $hapusku = $this->Models->hapusdata("Id_User", "pengguna", $id);
    if ($hapusku) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					Data Berhasil Dihapus
			</div>');
      redirect('admin/Admin');
    } else {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
													Data Gagal Dihapus
							</div>');
      redirect('admin/Admin');
    }
  }
}
