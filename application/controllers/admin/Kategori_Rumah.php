<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_Rumah extends CI_Controller
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
        $data['data'] = $this->db->query("SELECT * FROM kategori_desain_rumah WHERE Status = '1'")->result_array();
        $this->load->view('admin/kategori_rumah/data', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('name', 'Nama_Kategori', 'required|trim');
        if ($this->form_validation->run() == false) {

            $data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>
            $this->session->userdata('Id_User')])->row_array();
            $this->load->view('admin/kategori_rumah/add',   $data);
        } else {
            $data = [
                'id_kategori_rumah' => $this->Models->randomkode(32),
                'nama_kategori' => $this->input->post('name'),
                'status' => 1,
            ];

            // echo $data;
            $this->db->insert('kategori_desain_rumah', $data);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
         Kategori Desain Rumah Berhasil Di Tambahkan
      </div>');
            redirect('admin/Kategori_Rumah');
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('name', 'Nama_Kategori', 'required|trim');
        if ($this->form_validation->run() == false) {

            $data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>
            $this->session->userdata('Id_User')])->row_array();
            $data['data'] = $this->db->query("SELECT * FROM kategori_desain_rumah WHERE id_kategori_rumah = '$id'")->result_array();
            $this->load->view('admin/kategori_rumah/edit', $data);
        } else {
            $data = [
                'nama_kategori' => $this->input->post('name'),
            ];
            $update = $this->Models->update($data, "id_kategori_rumah", "kategori_desain_rumah", $id);
            // echo $data;
            if ($update) {

                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
           Kategori Desain Rumah Berhasil Di Ubah
        </div>');
                redirect('admin/Kategori_Rumah');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Kategori Desain Rumah Gagal Di Ubah
         </div>');
                redirect('admin/Kategori_Rumah');
            }
        }
    }

    //     public function detail($id)
    //     {
    //         $data['Pengguna'] = $this->db->get_where('Pengguna', ['Id_User' =>
    //         $this->session->userdata('Id_User')])->row_array();
    //         $data['data'] = $this->db->query("SELECT * FROM Pengguna WHERE Id_User = '$id'")->result_array();
    //         $this->load->view('admin/admin/detail', $data);
    //     }

    public function hapus($id)
    {
        $data = [
            'status' => '2',
        ];
        $update = $this->Models->update($data, "id_kategori_rumah", "kategori_desain_rumah", $id);
        // echo $data;
        if ($update) {

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
       Kategori Desain Rumah Berhasil Di Hapus
    </div>');
            redirect('admin/Kategori_Rumah');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Kategori Desain Rumah Gagal Di Hapus
     </div>');
            redirect('admin/Kategori_Rumah');
        }
    }
}
