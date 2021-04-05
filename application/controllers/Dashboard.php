<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        $data['deskripsi'] = $this->db->query("SELECT * FROM profile WHERE Id_Profile = '1'")->result_array();

        $user = $this->session->userdata('idCustomer');
        $data['transaksiMenunggu'] = $this->db->get_where('transaksi', ['status' => 1, 'idUser' => $user])->num_rows();
        $data['transaksiDiproses'] = $this->db->get_where('transaksi', ['status' => 2, 'idUser' => $user])->num_rows();
        $data['transaksiDikirim'] = $this->db->get_where('transaksi', ['status' => 3, 'idUser' => $user])->num_rows();

        $this->load->view('user/akun/dashboard', $data);
        ;
    }

    public function keranjang()
    {
        
        $this->load->view('user/akun/keranjang');
        
    }

    public function konfirmasi()
    {
        $data['deskripsi'] = $this->db->query("SELECT * FROM profile WHERE Id_Profile = '1'")->result_array();
        $user = $this->session->userdata('idCustomer');

        $data['konfirmasi'] = $this->db->join('detailtransaksi', 'detailtransaksi.idTransaksi = transaksi.idTransaksi')->join('produk', 'produk.id = detailtransaksi.idProduk')->get_where('transaksi', ['transaksi.status' => '1', 'idUser' => $user])->result_array();

        $this->load->view('user/akun/menunggukonfirmasi', $data);
    }

    public function proses()
    {
        $this->load->view('user/akun/proses');
    }

    public function dikirim()
    {
        $this->load->view('user/akun/kirim');
    }
}
?>