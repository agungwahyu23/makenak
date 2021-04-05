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
        $data['deskripsi'] = $this->db->query("SELECT * FROM profile WHERE Id_Profile = '1'")->result_array();
        $user = $this->session->userdata('idCustomer');

        $data['keranjang'] = $this->db->join('detailtransaksi', 'detailtransaksi.idTransaksi = transaksi.idTransaksi')->join('produk', 'produk.id = detailtransaksi.idProduk')->get_where('transaksi', ['transaksi.status' => 0, 'idUser' => $user])->result_array();

        // var_dump($data['keranjang']);die;

        $this->load->view('user/akun/keranjang', $data);
        
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
        $data['deskripsi'] = $this->db->query("SELECT * FROM profile WHERE Id_Profile = '1'")->result_array();
        $this->load->view('user/akun/proses', $data);
    }

    public function dikirim()
    {
        $data['deskripsi'] = $this->db->query("SELECT * FROM profile WHERE Id_Profile = '1'")->result_array();
        $this->load->view('user/akun/kirim', $data);

        $this->load->view('user/akun/kirim');
    }
}
?>