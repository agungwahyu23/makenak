<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        $data['deskripsi'] = $this->db->query("SELECT * FROM profile WHERE Id_Profile = '1'")->result_array();
        $this->load->view('user/akun/dashboard', $data);
        ;
    }

    public function keranjang()
    {
        
        $this->load->view('user/akun/keranjang', $data);
        
    }

    public function konfirmasi()
    {
        $data['deskripsi'] = $this->db->query("SELECT * FROM profile WHERE Id_Profile = '1'")->result_array();
        $this->load->view('user/akun/menunggukonfirmasi', $data);
    }

    public function proses()
    {
        $data['deskripsi'] = $this->db->query("SELECT * FROM profile WHERE Id_Profile = '1'")->result_array();
        $this->load->view('user/akun/proses', $data);
    }

    public function dikirim()
    {
        $data['deskripsi'] = $this->db->query("SELECT * FROM profile WHERE Id_Profile = '1'")->result_array();
        $this->load->view('user/akun/kirim', $data);
    }
}
?>