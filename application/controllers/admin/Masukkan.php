<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masukkan extends CI_Controller
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
    $data['data'] = $this->db->query("SELECT * FROM masukkan")->result_array();
    $this->load->view('admin/masukkan/data', $data);
  }
  public function hapus($id)
  {
    $hapusku = $this->Models->hapusdata("Id_Masukkan", "masukkan", $id);
    if ($hapusku) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					Data Berhasil Dihapus
			</div>');
      redirect('admin/Masukkan');
    } else {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
													Data Gagal Dihapus
							</div>');
      redirect('admin/Masukkan');
    }
  }
  public function detail($id)
  {
    $data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>
    $this->session->userdata('Id_User')])->row_array();
    $data['data'] = $this->db->query("SELECT * FROM masukkan WHERE Id_Masukkan = '$id'")->result_array();
    $this->load->view('admin/masukkan/detail', $data);
  }
}
