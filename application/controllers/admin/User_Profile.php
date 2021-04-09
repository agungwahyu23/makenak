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
    $this->load->view('admin/akun/data', $data);
  }


  public function post()
  {
    $data = array(
      'Nama' => $this->input->post('name'),
      'Alamat' => $this->input->post('alamat'),
      'No_Hp' => $this->input->post('no_hp'),
    );
    $user = $this->session->userdata('Id_User');
    $this->db->where('Id_User', $user);
    $update = $this->db->update('pengguna', $data);
    if ($update) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      Berhasil Mengubah Data
    </div>');
      redirect('admin/User_Profile');
    } else {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
      Gagal Mengubah Data
    </div>');
      redirect('admin/User_Profile');
    }
  }

  public function gantiEmail()
  {
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[pengguna.Email]');
    $this->form_validation->set_rules('password', 'Password', 'required');

    $data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>
    $this->session->userdata('Id_User')])->row_array();

    $id = $this->session->userdata('Id_User');
    $passwordSekarang = $data['Pengguna']['Password'];

    if ($this->form_validation->run() == false) {
      $this->load->view('admin/akun/gantiEmail', $data);
    } else {
      $email = $this->input->post('email');
      $password = md5($this->input->post('password'));

      if ($password == $passwordSekarang) {
        $this->db->where('Id_User', $id);
        $update = $this->db->update('pengguna', ['Email' => $email]);

        if ($update) {
          $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
          Berhasil Mengubah Email
        </div>');
          redirect('admin/User_Profile/gantiEmail');
        } else {
          $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
          Gagal Mengubah Email
        </div>');
          redirect('admin/User_Profile/gantiEmail');
        }
      } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
          Password yang anda masukan salah
        </div>');
        redirect('admin/User_Profile/gantiEmail');
      }
    }
  }

  public function gantiPassword()
  {
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('passwordBaru', 'Password Baru', 'required');
    $this->form_validation->set_rules('konfirmasiPassword', 'Konfirmasi Password', 'required|matches[passwordBaru]');

    $data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>
    $this->session->userdata('Id_User')])->row_array();

    $id = $this->session->userdata('Id_User');
    $passwordSekarang = $data['Pengguna']['Password'];

    if ($this->form_validation->run() == false) {
      $this->load->view('admin/akun/gantiPassword', $data);
    } else {
      $passwordBaru = $this->input->post('passwordBaru');
      $password = md5($this->input->post('password'));

      if ($password == $passwordSekarang) {
        $this->db->where('Id_User', $id);
        $update = $this->db->update('pengguna', ['Password' => md5($passwordBaru)]);

        if ($update) {
          $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
          Berhasil Mengubah Password
        </div>');
          redirect('admin/User_Profile/gantiPassword');
        } else {
          $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
          Gagal Mengubah Password
        </div>');
          redirect('admin/User_Profile/gantiPassword');
        }
      } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
          Password yang anda masukan salah
        </div>');
        redirect('admin/User_Profile/gantiPassword');
      }
    }
  }
}
