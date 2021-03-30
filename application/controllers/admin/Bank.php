<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bank extends CI_Controller
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
    $data['data'] = $this->db->query("SELECT * FROM bank ")->result_array();
    $this->load->view('admin/bank/data', $data);
  }

  public function add()
  {
    $this->form_validation->set_rules('bank', 'Bank', 'required|trim');
    if ($this->form_validation->run() == false) {

      $data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>
      $this->session->userdata('Id_User')])->row_array();
      $data['kd'] = $this->Models->randomkode(32);
      $this->load->view('admin/bank/add',   $data);
    } else {
      $data = [
        'Nama_Bank' => $this->input->post('bank'),
        'Nama_Pemilik' =>  $this->input->post('name'),
        'Nomor_Rekening' => $this->input->post('nomor'),
        'createdDate' => date("Y-m-d H:i:s"),
      ];

      // echo $data;
      $this->db->insert('bank', $data);

      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
     Akun Berhasil Di Tambahkan
  </div>');
      redirect('admin/Bank');
    }
  }

  public function edit($id)
  {
    $this->form_validation->set_rules('bank', 'Bank', 'required|trim');
    if ($this->form_validation->run() == false) {

      $data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>
      $this->session->userdata('Id_User')])->row_array();
      $data['kd'] = $this->Models->randomkode(32);
      $data['data'] = $this->db->query("SELECT * FROM bank WHERE Id_Bank = '$id'")->result_array();
      $this->load->view('admin/bank/edit', $data);
    } else {
      $data = [
        'Nama_Bank' => $this->input->post('bank'),
        'Nama_Pemilik' =>  $this->input->post('name'),
        'Nomor_Rekening' => $this->input->post('nomor'),
      ];
      $update = $this->Models->update($data, "Id_Bank", "bank", $id);
      // echo $data;
      if ($update) {

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
       Akun Berhasil Di Ubah
    </div>');
        redirect('admin/Bank');
      } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Akun Gagal Di Ubah
     </div>');
        redirect('admin/Bank');
      }
    }
  }

  public function hapus($id)
  {
    $hapusku = $this->Models->hapusdata("Id_Bank", "bank", $id);
    if ($hapusku) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					Data Berhasil Dihapus
			</div>');
      redirect('admin/Bank');
    } else {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
													Data Gagal Dihapus
							</div>');
      redirect('admin/Bank');
    }
  }
}
