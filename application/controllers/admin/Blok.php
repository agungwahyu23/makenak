<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blok extends CI_Controller
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
        $data['data'] = $this->db->query("SELECT * FROM kode_rumah")->result_array();
        $this->load->view('admin/blok/data', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('name', 'Kode Blok', 'required|trim');
        if ($this->form_validation->run() == false) {

            $data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>
            $this->session->userdata('Id_User')])->row_array();
            $this->load->view('admin/blok/add',   $data);
        } else {
            $data = [
                'Kode_Rumah' => $this->input->post('name'),
            ];

            // echo $data;
            $this->db->insert('kode_rumah', $data);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
         Blok Rumah Berhasil Di Tambahkan
      </div>');
            redirect('admin/Blok');
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('name', 'Kode Blok', 'required|trim');
        if ($this->form_validation->run() == false) {

            $data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>
            $this->session->userdata('Id_User')])->row_array();
            $data['data'] = $this->db->query("SELECT * FROM kode_rumah WHERE Id_Kode = '$id'")->result_array();
            $this->load->view('admin/blok/edit', $data);
        } else {
            $data = [
                'Kode_Rumah' => $this->input->post('name'),
            ];
            $update = $this->Models->update($data, "Id_Kode", "kode_rumah", $id);
            // echo $data;
            if ($update) {

                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
           Blok Berhasil Di Ubah
        </div>');
                redirect('admin/Blok');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Blok Gagal Di Ubah
         </div>');
                redirect('admin/Blok');
            }
        }
    }

    public function hapus($id)
    {
        $hapusku = $this->Models->hapusdata("Id_kode", "kode_rumah", $id);
        // echo $data;
        if ($hapusku) {

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
       Blok Berhasil Di Hapus
    </div>');
            redirect('admin/Blok');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Blok Gagal Di Hapus
     </div>');
            redirect('admin/Blok');
        }
    }
}
