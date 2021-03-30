<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Partners extends CI_Controller
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
    $data['data'] = $this->db->query("SELECT * FROM partners")->result_array();
    $this->load->view('admin/partners/data', $data);
  }

  public function add()
  {
    $this->form_validation->set_rules('name', 'Nama Partners', 'required|trim');

    if ($this->form_validation->run() == false) {
      $data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>
      $this->session->userdata('Id_User')])->row_array();
      $data['kd'] = $this->Models->randomkode(32);
      $this->load->view('admin/partners/add',   $data);
    } else {
      $config['allowed_types'] = 'jpg|png|gif|jpeg';
      $config['max_size'] = '7748';
      $config['upload_path'] = './uploads/Partners';
      $this->load->library('upload', $config);
      if ($this->upload->do_upload('logo')) {
        $foto_namaBaru = $this->upload->data('file_name');
        $insert = array(
          'Id_Partners' => $this->Models->randomkode(32),
          'Nama_Partners' => $this->input->post('name'),
          'Logo' => $foto_namaBaru,
          'CreatedDate' => date('Y-m-d H:i:s'),
        );
        if ($this->Models->insert('partners', $insert)) {
          $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					  Data Partners
					</div>');
          redirect('admin/Partners');
        } else {
          $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Gagal Karena Tanpa Gambar</div>');
          redirect('admin/Partners');
        }
      } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">'
          . $this->upload->display_errors() .
          '</div>');
        redirect('admin/Partners');
      }
    }
  }

  // public function edit($id)
  // {
  //   $this->form_validation->set_rules('name', 'Nama_Pengguna', 'required|trim');
  //   $this->form_validation->set_rules('password', 'Password', 'required|trim');
  //   if ($this->form_validation->run() == false) {

  //     // $data['Pengguna'] = $this->db->get_where('pengguna', ['id_pengguna' =>
  //     // $this->session->userdata('id_pengguna')])->row_array();
  //     $data['kd'] = $this->Models->randomkode(32);
  //     $data['data'] = $this->db->query("SELECT * FROM Pengguna WHERE Id_User = '$id'")->result_array();
  //     $this->load->view('admin/admin/edit', $data);
  //   } else {
  //     $data = [
  //       'Id_User' => $this->Models->randomkode(32),
  //       'Nama' => $this->input->post('name'),
  //       'Email' =>  $this->input->post('email'),
  //       'Password' => md5($this->input->post('password')),
  //       'Pekerjaan' => $this->input->post('pekerjaan'),
  //       'Alamat' => $this->input->post('alamat'),
  //       'No_Hp' => $this->input->post('no_hp'),
  //     ];
  //     $update = $this->Models->update($data, "Id_User", "Pengguna", $id);
  //     // echo $data;
  //     if ($update) {

  //       $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
  //      Akun Berhasil Di Ubah
  //   </div>');
  //       redirect('admin/Admin');
  //     } else {
  //       $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
  //       Akun Gagal Di Ubah
  //    </div>');
  //       redirect('admin/Admin');
  //     }
  //   }
  // }
  // public function detail($id)
  // {
  //   $data['data'] = $this->db->query("SELECT * FROM Pengguna WHERE Id_User = '$id'")->result_array();
  //   $this->load->view('admin/admin/detail', $data);
  // }
  public function hapus($id)
  {
    $hapusku = $this->Models->hapusdata("Id_Partners", "partners", $id);
    if ($hapusku) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					Data Berhasil Dihapus
			</div>');
      redirect('admin/Partners');
    } else {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
													Data Gagal Dihapus
							</div>');
      redirect('admin/Partners');
    }
  }
}
