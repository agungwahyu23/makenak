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


  public function upload()
  {
    $uploadVideo = $_FILES['video']['name'];
    
    
    
    if ($uploadVideo) {
      
      $config['allowed_types'] = 'mp4|3gp|flv';
      
      $config['max_size'] = '15000';
      
      $config['upload_path'] = './img/';
      
      
      
      $this->load->library('upload', $config);
      
      
      
      if ($this->upload->do_upload('video')) {
        // var_dump($uploadVideo);die; 

        $data = $this->db->get('profile')->row_array();

        $videolama = $data['video'];

        if ($videolama) {

          unlink(FCPATH . './img/' . $videolama);
        }
        $videobaru = $this->upload->data('file_name');

        // var_dump($videobaru);die;

        // $config['image_library']    = 'gd2';
        // $config['source_image']     = './img/Produk/' . $videobaru;
        // //lokasi folder gbr
        // $config['new_image']    = './img/Produk/';
        // $config['create_thumb']     = TRUE;
        // $config['maintain_ratio']   = TRUE;
        // $config['quality']          = '100%';
        // $config['width']            = 383;
        // $config['height']           = 259;
        // $config['thumb_marker']     = '';

        // $this->load->library('image_lib', $config);
        // $this->image_lib->resize();



        $this->db->set('video', $videobaru);

        $this->db->where('Id_Profile', 1);

        $this->db->update('profile');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">

          Berhasil Mengupload Video!

          </div>');

        redirect('admin/Profile/uploadVideo');
      } else {

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">'

          . $this->upload->display_errors() .

          '</div>');

        // redirect('user/editprofile');

        redirect('admin/Profile/uploadVideo');
      }
    } else {



      // $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">

      // Berhasil Mengubah Data!

      // </div>');

      redirect('admin/Profile/uploadVideo');
    }
  }
}
