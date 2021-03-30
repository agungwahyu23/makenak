<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_Profile extends CI_Controller
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
    $q = $data['Pengguna']['Id_User'];
    $data['akun'] = $this->db->query("SELECT * FROM pengguna WHERE Id_User = '$q'")->row();
    $this->load->view('admin/akun/data', $data);
    // echo json_encode($data['akun']);
  }
  public function post()
  {
    $data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>
    $this->session->userdata('Id_User')])->row_array();
    $q = $data['Pengguna']['Id_User'];
    $data = array(
      'Nama' => $this->input->post('name'),
      'Email' => $this->input->post('email'),
      'Password' => md5($this->input->post('password')),
      'Pekerjaan' => $this->input->post('pekerjaan'),
      'Alamat' => $this->input->post('alamat'),
      'No_Hp' => $this->input->post('no_hp'),
    );

    $this->db->where('Id_User', $q);
    $update = $this->db->update('pengguna', $data);
    if ($update) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      Berhasil Update Data
    </div>');
      redirect('admin/User_Profile');
    } else {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
      Gagal Update Data
    </div>');
      redirect('admin/User_Profile');
    }
  }
}
