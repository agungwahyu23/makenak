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

        $this->load->view('user/akun/dashboard', $data);;
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

        $user = $this->session->userdata('idCustomer');

        $data['proses'] = $this->db->join('detailtransaksi', 'detailtransaksi.idTransaksi = transaksi.idTransaksi')->join('produk', 'produk.id = detailtransaksi.idProduk')->get_where('transaksi', ['transaksi.status' => 2, 'idUser' => $user])->result_array();

        $this->load->view('user/akun/proses', $data);
    }

    public function dikirim()
    {
        $data['deskripsi'] = $this->db->query("SELECT * FROM profile WHERE Id_Profile = '1'")->result_array();
        $this->load->view('user/akun/kirim', $data);

        $this->load->view('user/akun/kirim');
    }

    public function checkout()
    {
        $data['deskripsi'] = $this->db->query("SELECT * FROM profile WHERE Id_Profile = '1'")->result_array();

        $user = $this->session->userdata('idCustomer');

        $data['user'] = $this->db->get_where('pengguna', ['Id_User' => $user, 'Pekerjaan' => 'User'])->row_array();
        $data['keranjang'] = $this->db->get_where('transaksi', ['idUser' => $user, 'Status' => 0])->row_array();
        $data['provinsi'] = $this->db->get('provinces')->result_array();

        $this->load->view('user/akun/checkout', $data);
    }

    public function hapusKeranjang($id)
    {
        if ($id) {
            $this->db->delete('detailtransaksi', ['idDetailTransaksi' => $id]);
            redirect('Dashboard/keranjang');
        } else {
            redirect('Dashboard/keranjang');
        }
    }

}
