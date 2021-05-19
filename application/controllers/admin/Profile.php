<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
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

    $this->form_validation->set_rules('nama', 'Nama Kantor', 'required');
    if ($this->form_validation->run() == false) {
      $data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>
      $this->session->userdata('Id_User')])->row_array();
      $data['data'] = $this->db->query("SELECT * FROM profile WHERE Id_Profile = 1")->result_array();
      $this->load->view('admin/profile/data', $data);
    } else {
      $update = $this->Models->update(array(
        'Nama_Kantor' => $this->input->post("nama"),
        'Alamat_Kantor' => $this->input->post("alamat"),
        'Email' => $this->input->post("email"),
        'wa1' => $this->input->post("wa1"),
        'wa2' => $this->input->post("wa2"),
        'wa3' => $this->input->post("wa3"),
        'wa4' => $this->input->post("wa4"),
        'Instagram1' => $this->input->post("ig1"),
        'Instagram2' => $this->input->post("ig2"),
        'fb' => $this->input->post("fb"),
        'Deskripsi' => $this->input->post("deskripsi"),
      ), "Id_Profile", "profile", 1);
      if ($update) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
						Berhasil Mengubah Data!
						</div>');
        redirect('admin/Profile');
      } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
				Gagal Mengubah Data!
				</div>');
        redirect('admin/Profile');
      }
    }
  }

  public function uploadVideo()
  {
    $data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>
		$this->session->userdata('Id_User')])->row_array();

    $this->load->view('admin/profile/data_video', $data);
  }
}
