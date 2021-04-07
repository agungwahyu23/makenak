<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()

    {

        parent::__construct();

        // $this->load->library('form_validation');

        $this->load->model('Models');
    }

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


        $this->form_validation->set_rules('idTransaksi', 'Id Transaksi', 'required');
        // $this->form_validation->set_rules('idDetailTransaksi', 'Id Detail Transaksi', 'required');
        $this->form_validation->set_rules('nama', 'Nama Lengkap Penerima', 'required');
        $this->form_validation->set_rules('email', 'Email Penerima', 'required');
        $this->form_validation->set_rules('noWa', 'Nomor WhatsApp Penerima', 'required|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat Lengkap Penerima', 'required');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
        $this->form_validation->set_rules('kabKota', 'Kabupaten / Kota', 'required');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
        $this->form_validation->set_rules('desa', 'Desa', 'required');
        $this->form_validation->set_rules('ongkir', 'Ongkos Kirim', 'required|numeric');
        $this->form_validation->set_rules('namaPengirim', 'Nama Pengirim', 'required');
        $this->form_validation->set_rules('namaBank', 'Nama Pengirim', 'required');
        // $this->form_validation->set_rules('bukti', 'Bukti Pembayaran', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('user/akun/checkout', $data);
        } else {
            // var_dump('huhu');die;
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $noWa = $this->input->post('noWa');
            $alamat = $this->input->post('alamat');
            $provinsi = $this->input->post('provinsi');
            $kabKota = $this->input->post('kabKota');
            $kecamatan = $this->input->post('kecamatan');
            $desa = $this->input->post('desa');
            $ongkir = $this->input->post('ongkir');
            $namaPengirim = $this->input->post('namaPengirim');
            $namabank = $this->input->post('namaBank');
            // $bukti = $this->input->post('bukti');
            $idTransaksi = $this->input->post('idTransaksi');
            // $idDetailTransaksi = $this->input->post('idDetailTransaksi');


            $config['allowed_types'] = 'jpg|png|gif|jpeg';

            $config['max_size'] = '7748';

            $config['upload_path'] = './img/BuktiPembayaran';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('bukti')) {
                $foto = $this->upload->data('file_name');
                $idDataPenerima = $this->Models->randomkode(32);

                $dataTransaksi = [

                    'idDataPenerima' => $idDataPenerima,
                    'status' => 1,
                    'tanggalTransaksi' => date("Y-m-d H:i:s"),
                    'namaPengirim' => $namaPengirim,
                    'namaBank' => $namabank,
                    'ongkir' => $ongkir,
                    'buktiTransfer' => $foto
                ];

                $dataPenerima = [
                    'idDataPenerima' => $idDataPenerima,
                    'idTransaksi' => $idTransaksi,
                    'namaPenerima' => $nama,
                    'emailPenerima' => $email,
                    'wa' => $noWa,
                    'alamatPenerima' => $alamat,
                    'desa' => $desa,
                    'kecamatan' => $kecamatan,
                    'kabupaten' => $kabKota,
                    'provinsi' => $provinsi
                ];

                $this->db->set($dataTransaksi);
                $this->db->where(['idTransaksi' => $idTransaksi]);
                $this->db->update('transaksi');

                $this->db->insert('datapenerima', $dataPenerima);

                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">

					  Pesanan Anda Berhasil Dikirim.

					</div>');

                redirect('Dashboard');

                // if ($this->db->insert('produk', $data)) {

                //     $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">

				// 	  Data Produk Berhasil Ditambahkan.

				// 	</div>');

                //     redirect('admin/Produk');
                // } else {

                //     $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Gagal Menambahkan Produk</div>');

                //     redirect('admin/Produk');
                // }
            } else {

                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'

                    . $this->upload->display_errors() .

                    '</div>');

                redirect('Dashboard/checkout');
            }
        }
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
