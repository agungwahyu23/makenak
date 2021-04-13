<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //load libary pagination
        $this->load->library('pagination');
        $this->load->model('Models');
        //load the department_model
        $this->load->model('models');
    }

    public function index()
    {
        $data['deskripsi'] = $this->db->query("SELECT * FROM profile WHERE Id_Profile = '1'")->result_array();

        if ($this->input->post('cari')) {
            $cari = $this->input->post('cari');
            $this->db->like('namaProduk', $cari);
            $total = $this->db->join('satuanProduk', 'satuanProduk.idSatuan = produk.idSatuan')->get_where('produk', ['status' => 1])->num_rows();
        } else {
            //ambil data total
            $total = $this->db->count_all('produk');
            $cari = null;
        }

        $this->load->library('pagination'); // Load librari paginationnya


        //konfigurasi pagination
        $config['base_url']                = base_url() . 'produk/index/';
        $config['total_rows']            =  $total;
        $config['use_page_numbers']        = TRUE;
        $config['per_page']                = 12;
        $config['uri_segment']            = 3;
        $config['num_links']            = 5;

        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only"></span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $config['first_url']            = base_url() . 'produk/index';

        $this->pagination->initialize($config); // Set konfigurasi paginationnya
        $page         = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * $config['per_page'] : 0;

        if ($cari) {
            $this->db->like('namaProduk', $cari);
            $data['product'] = $this->db->join('satuanProduk', 'satuanProduk.idSatuan = produk.idSatuan')->get_where('produk', ['status' => 1], $config['per_page'], $page)->result_array();
        } else {
            $data['product'] = $this->db->join('satuanProduk', 'satuanProduk.idSatuan = produk.idSatuan')->get_where('produk', ['status' => 1], $config['per_page'], $page)->result_array();
        }

        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('user/produk',    $data);
    }

    public function Beli($id)
    {
        $user = $this->session->userdata('idCustomer');
        if ($user) {
            $produk = $this->db->get_where('produk', ['id' => $id])->row_array();
            if ($produk['stok'] !== 0) {
                $idKeranjang = $this->db->get_where('transaksi', ['status' => 0, 'idUser' => $user])->row_array();
                $jumlahBeli = 1;
                if ($idKeranjang) {
                    $idTransaksi = $idKeranjang['idTransaksi'];
                    // var_dump($idTransaksi);die;
                    $cekProduk = $this->db->get_where('detailtransaksi', ['idTransaksi' => $idTransaksi, 'idProduk' => $id])->row_array();
                    // var_dump($cekProduk['jumlahBeli']);die;

                    if ($cekProduk) {
                        $updateJumlah = $jumlahBeli + $cekProduk['jumlahBeli'];
                        if ($updateJumlah >= ($produk['isiDus'] * 10)) { //harga 10 dus
                            $this->db->set([
                                'jumlahBeli' => $updateJumlah,
                                'hargaSatuan' => $produk['harga10Dus'],
                                'totalharga' => $updateJumlah * $produk['harga10Dus'],
                                'dus' => $updateJumlah / $produk['isiDus'],
                            ]);
                            $this->db->where(['idDetailTransaksi' => $cekProduk['idDetailTransaksi']]);
                            $this->db->update('detailtransaksi');
                            redirect('Dashboard/keranjang');
                        } else if ($updateJumlah >= $produk['isiDus']) { //harga 1 Dus
                            $this->db->set([
                                'jumlahBeli' => $updateJumlah,
                                'hargaSatuan' => $produk['harga1Dus'],
                                'totalharga' => $updateJumlah * $produk['harga1Dus'],
                                'dus' => $updateJumlah / $produk['isiDus'],
                            ]);
                            $this->db->where(['idDetailTransaksi' => $cekProduk['idDetailTransaksi']]);
                            $this->db->update('detailtransaksi');
                            redirect('Dashboard/keranjang');
                        } else if ($updateJumlah >= 50) {
                            $this->db->set([
                                'jumlahBeli' => $updateJumlah,
                                'hargaSatuan' => $produk['harga50Pcs'],
                                'totalharga' => $updateJumlah * $produk['harga50Pcs'],
                                'dus' => $updateJumlah / $produk['isiDus'],
                            ]);
                            $this->db->where(['idDetailTransaksi' => $cekProduk['idDetailTransaksi']]);
                            $this->db->update('detailtransaksi');
                            redirect('Dashboard/keranjang');
                        } else if ($updateJumlah < 50) {
                            $this->db->set([
                                'jumlahBeli' => $updateJumlah,
                                'hargaSatuan' => $produk['harga'],
                                'totalharga' => $updateJumlah * $produk['harga'],
                                'dus' => $updateJumlah / $produk['isiDus'],
                            ]);
                            $this->db->where(['idDetailTransaksi' => $cekProduk['idDetailTransaksi']]);
                            $this->db->update('detailtransaksi');
                            redirect('Dashboard/keranjang');
                        }
                    } else {
                        if ($jumlahBeli >= ($produk['isiDus'] * 10)) { //Harga 10Dus

                            $detailKeranjang = [
                                'idDetailTransaksi' => $this->Models->randomkode(32),
                                'idTransaksi' => $idTransaksi,
                                'idProduk' => $id,
                                'jumlahBeli' => $jumlahBeli,
                                'hargaSatuan' => $produk['harga10Dus'],
                                'totalharga' => $jumlahBeli * $produk['harga10Dus'],
                                'dus' => $jumlahBeli / $produk['isiDus'],
                            ];

                            $this->db->insert('detailtransaksi', $detailKeranjang);
                            redirect('Dashboard/keranjang');
                        } else if ($jumlahBeli >= $produk['isiDus']) { //harga 1 Dus
                            $detailKeranjang = [
                                'idDetailTransaksi' => $this->Models->randomkode(32),
                                'idTransaksi' => $idTransaksi,
                                'idProduk' => $id,
                                'jumlahBeli' => $jumlahBeli,
                                'hargaSatuan' => $produk['harga1Dus'],
                                'totalharga' => $jumlahBeli * $produk['harga1Dus'],
                                'dus' => $jumlahBeli / $produk['isiDus'],
                            ];

                            $this->db->insert('detailtransaksi', $detailKeranjang);
                            redirect('Dashboard/keranjang');
                        } else if ($jumlahBeli >= 50) { //harga 50 Pcs
                            $detailKeranjang = [
                                'idDetailTransaksi' => $this->Models->randomkode(32),
                                'idTransaksi' => $idTransaksi,
                                'idProduk' => $id,
                                'jumlahBeli' => $jumlahBeli,
                                'hargaSatuan' => $produk['harga50Pcs'],
                                'totalharga' => $jumlahBeli * $produk['harga50Pcs'],
                                'dus' => $jumlahBeli / $produk['isiDus'],
                            ];

                            $this->db->insert('detailtransaksi', $detailKeranjang);
                            redirect('Dashboard/keranjang');
                        } else if ($jumlahBeli < 50) { //harga Ecer
                            $detailKeranjang = [
                                'idDetailTransaksi' => $this->Models->randomkode(32),
                                'idTransaksi' => $idTransaksi,
                                'idProduk' => $id,
                                'jumlahBeli' => $jumlahBeli,
                                'hargaSatuan' => $produk['harga'],
                                'totalharga' => $jumlahBeli * $produk['harga'],
                                'dus' => $jumlahBeli / $produk['isiDus'],
                            ];

                            $this->db->insert('detailtransaksi', $detailKeranjang);
                            redirect('Dashboard/keranjang');
                        }
                    }
                } else {
                    if ($jumlahBeli >= ($produk['isiDus'] * 10)) { //harga 10 dus
                        $idDetailTransaksi = $this->Models->randomkode(32);
                        $idTransaksi = $this->Models->randomkode(32);
                        $detailKeranjang = [
                            'idDetailTransaksi' => $idDetailTransaksi,
                            'idTransaksi' => $idTransaksi,
                            'idProduk' => $id,
                            'jumlahBeli' => $jumlahBeli,
                            'hargaSatuan' => $produk['harga10Dus'],
                            'totalharga' => $jumlahBeli * $produk['harga10Dus'],
                            'dus' => $jumlahBeli / $produk['isiDus'],
                        ];

                        $this->db->insert('detailtransaksi', $detailKeranjang);


                        $dataTransaksi = [
                            'idTransaksi' => $idTransaksi,
                            'idUser' => $user,
                            'status' => 0,
                        ];
                        $this->db->insert('transaksi', $dataTransaksi);
                        redirect('Dashboard/keranjang');
                    } else if ($jumlahBeli >= $produk['isiDus']) { //harga 1 dus
                        $idDetailTransaksi = $this->Models->randomkode(32);
                        $idTransaksi = $this->Models->randomkode(32);
                        $detailKeranjang = [
                            'idDetailTransaksi' => $idDetailTransaksi,
                            'idTransaksi' => $idTransaksi,
                            'idProduk' => $id,
                            'jumlahBeli' => $jumlahBeli,
                            'hargaSatuan' => $produk['harga1Dus'],
                            'totalharga' => $jumlahBeli * $produk['harga1Dus'],
                            'dus' => $jumlahBeli / $produk['isiDus'],
                        ];

                        $this->db->insert('detailtransaksi', $detailKeranjang);


                        $dataTransaksi = [
                            'idTransaksi' => $idTransaksi,
                            'idUser' => $user,
                            'status' => 0,
                        ];
                        $this->db->insert('transaksi', $dataTransaksi);
                        redirect('Dashboard/keranjang');
                    } else if ($jumlahBeli >= 50) { // harga 50 Pcs
                        $idDetailTransaksi = $this->Models->randomkode(32);
                        $idTransaksi = $this->Models->randomkode(32);
                        $detailKeranjang = [
                            'idDetailTransaksi' => $idDetailTransaksi,
                            'idTransaksi' => $idTransaksi,
                            'idProduk' => $id,
                            'jumlahBeli' => $jumlahBeli,
                            'hargaSatuan' => $produk['harga50Pcs'],
                            'totalharga' => $jumlahBeli * $produk['harga50Pcs'],
                            'dus' => $jumlahBeli / $produk['isiDus'],
                        ];

                        $this->db->insert('detailtransaksi', $detailKeranjang);


                        $dataTransaksi = [
                            'idTransaksi' => $idTransaksi,
                            'idUser' => $user,
                            'status' => 0,
                        ];
                        $this->db->insert('transaksi', $dataTransaksi);
                        redirect('Dashboard/keranjang');
                    } else if ($jumlahBeli < 50) { // harga ecer
                        $idDetailTransaksi = $this->Models->randomkode(32);
                        $idTransaksi = $this->Models->randomkode(32);
                        $detailKeranjang = [
                            'idDetailTransaksi' => $idDetailTransaksi,
                            'idTransaksi' => $idTransaksi,
                            'idProduk' => $id,
                            'jumlahBeli' => $jumlahBeli,
                            'hargaSatuan' => $produk['harga'],
                            'totalharga' => $jumlahBeli * $produk['harga'],
                            'dus' => $jumlahBeli / $produk['isiDus'],
                        ];

                        $this->db->insert('detailtransaksi', $detailKeranjang);


                        $dataTransaksi = [
                            'idTransaksi' => $idTransaksi,
                            'idUser' => $user,
                            'status' => 0,
                        ];
                        $this->db->insert('transaksi', $dataTransaksi);
                        redirect('Dashboard/keranjang');
                    }
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Produk ' . $produk['namaProduk'] . ' tidak tersedia atau stok kosong. silahkan hubungi admin untuk menanyakan ketersediaan produk.</div>');
                redirect('Dashboard/keranjang');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Silahkan Login terlebih Dahulu</div>');
            redirect('Auth');
        }
    }


    public function DetailProduk($id = null)
    {
        if ($id) {
            $data['deskripsi'] = $this->db->query("SELECT * FROM profile WHERE Id_Profile = '1'")->result_array();
            $data['detailProduk'] = $this->db->join('satuanProduk', 'satuanProduk.idSatuan = produk.idSatuan')->get_where('produk', ['id' => $id])->row_array();

            $this->db->order_by('rand()');
            $data['produkBeranda'] = $this->db->get('produk', 4)->result_array();

            $produk = $this->db->get_where('produk', ['id' => $id])->row_array();
            $user = $this->session->userdata('idCustomer');

            $this->form_validation->set_rules('jumlah', 'Jumlah Beli', 'required|numeric');
            $jumlahBeli = $this->input->post('jumlah');
            if ($this->form_validation->run() == false) {
                $this->load->view('user/detail_produk',    $data);
            } else {
                if ($user) {
                    $idKeranjang = $this->db->get_where('transaksi', ['status' => 0, 'idUser' => $user])->row_array();
                    $stok = $this->db->get_where('produk', ['id' => $id])->row_array();
                    if ($stok['stok'] < $jumlahBeli) {
                        $this->session->set_flashdata('message', '<div class="alert text-center alert-danger" role="alert">Jumlah Pembelian Tidak Boleh Melebihi Stok Produk</div>');
                        redirect('Produk/DetailProduk/' . $id . '');
                    } else {
                        $cekProduk1 = $this->db->get_where('detailtransaksi', ['idTransaksi' => $idKeranjang['idTransaksi'], 'idProduk' => $id])->row_array();

                        if ($idKeranjang) {
                            $idTransaksi = $idKeranjang['idTransaksi'];
                            $cekProduk = $this->db->get_where('detailtransaksi', ['idTransaksi' => $idTransaksi, 'idProduk' => $id])->row_array();

                            if ($cekProduk) {
                                $updateJumlah = $jumlahBeli + $cekProduk['jumlahBeli'];


                                if ($id == 44) { // jika usus crispi
                                    if ($updateJumlah >= ($produk['isiDus'] * 10)) { //harga 10 Dus
                                        $this->db->set([
                                            'jumlahBeli' => $updateJumlah,
                                            'hargaSatuan' => $produk['harga10Dus'],
                                            'totalharga' => $updateJumlah * $produk['harga10Dus'],
                                            'dus' => $updateJumlah / $produk['isiDus'],
                                        ]);
                                        $this->db->where(['idDetailTransaksi' => $cekProduk['idDetailTransaksi']]);
                                        $this->db->update('detailtransaksi');
                                        redirect('Dashboard/keranjang');
                                    } else if ($updateJumlah >= ($produk['isiDus'] * 5)) { //harga 5 Dus / 50 Bal
                                        $this->db->set([
                                            'jumlahBeli' => $updateJumlah,
                                            'hargaSatuan' => $produk['harga50Pcs'],
                                            'totalharga' => $updateJumlah * $produk['harga50Pcs'],
                                            'dus' => $updateJumlah / $produk['isiDus'],
                                        ]);
                                        $this->db->where(['idDetailTransaksi' => $cekProduk['idDetailTransaksi']]);
                                        $this->db->update('detailtransaksi');
                                        redirect('Dashboard/keranjang');
                                    } else if ($updateJumlah >= ($produk['isiDus'] * 1)) {
                                        $this->db->set([
                                            'jumlahBeli' => $updateJumlah,
                                            'hargaSatuan' => $produk['harga1Dus'],
                                            'totalharga' => $updateJumlah * $produk['harga1Dus'],
                                            'dus' => $updateJumlah / $produk['isiDus'],
                                        ]);
                                        $this->db->where(['idDetailTransaksi' => $cekProduk['idDetailTransaksi']]);
                                        $this->db->update('detailtransaksi');
                                        redirect('Dashboard/keranjang');
                                    } else if ($updateJumlah >= 1) {
                                        $this->db->set([
                                            'jumlahBeli' => $updateJumlah,
                                            'hargaSatuan' => $produk['harga'],
                                            'totalharga' => $updateJumlah * $produk['harga'],
                                            'dus' => $updateJumlah / $produk['isiDus'],
                                        ]);
                                        $this->db->where(['idDetailTransaksi' => $cekProduk['idDetailTransaksi']]);
                                        $this->db->update('detailtransaksi');
                                        redirect('Dashboard/keranjang');
                                    }
                                }

                                if ($updateJumlah >= ($produk['isiDus'] * 10)) { //harga 10 dus
                                    $this->db->set([
                                        'jumlahBeli' => $updateJumlah,
                                        'hargaSatuan' => $produk['harga10Dus'],
                                        'totalharga' => $updateJumlah * $produk['harga10Dus'],
                                        'dus' => $updateJumlah / $produk['isiDus'],
                                    ]);
                                    $this->db->where(['idDetailTransaksi' => $cekProduk['idDetailTransaksi']]);
                                    $this->db->update('detailtransaksi');
                                    redirect('Dashboard/keranjang');
                                } else if ($updateJumlah >= $produk['isiDus']) { //harga 1 Dus
                                    $this->db->set([
                                        'jumlahBeli' => $updateJumlah,
                                        'hargaSatuan' => $produk['harga1Dus'],
                                        'totalharga' => $updateJumlah * $produk['harga1Dus'],
                                        'dus' => $updateJumlah / $produk['isiDus'],
                                    ]);
                                    $this->db->where(['idDetailTransaksi' => $cekProduk['idDetailTransaksi']]);
                                    $this->db->update('detailtransaksi');
                                    redirect('Dashboard/keranjang');
                                } else if ($updateJumlah >= 50) {
                                    $this->db->set([
                                        'jumlahBeli' => $updateJumlah,
                                        'hargaSatuan' => $produk['harga50Pcs'],
                                        'totalharga' => $updateJumlah * $produk['harga50Pcs'],
                                        'dus' => $updateJumlah / $produk['isiDus'],
                                    ]);
                                    $this->db->where(['idDetailTransaksi' => $cekProduk['idDetailTransaksi']]);
                                    $this->db->update('detailtransaksi');
                                    redirect('Dashboard/keranjang');
                                } else if ($updateJumlah < 50) {
                                    $this->db->set([
                                        'jumlahBeli' => $updateJumlah,
                                        'hargaSatuan' => $produk['harga'],
                                        'totalharga' => $updateJumlah * $produk['harga'],
                                        'dus' => $updateJumlah / $produk['isiDus'],
                                    ]);
                                    $this->db->where(['idDetailTransaksi' => $cekProduk['idDetailTransaksi']]);
                                    $this->db->update('detailtransaksi');
                                    redirect('Dashboard/keranjang');
                                }
                            } else {

                                if ($id == 44) { // jika usus crispi
                                    if ($jumlahBeli >= ($produk['isiDus'] * 10)) { //harga 10 Dus
                                        $detailKeranjang = [
                                            'idDetailTransaksi' => $this->Models->randomkode(32),
                                            'idTransaksi' => $idTransaksi,
                                            'idProduk' => $id,
                                            'jumlahBeli' => $jumlahBeli,
                                            'hargaSatuan' => $produk['harga10Dus'],
                                            'totalharga' => $jumlahBeli * $produk['harga10Dus'],
                                            'dus' => $jumlahBeli / $produk['isiDus'],
                                        ];

                                        $this->db->insert('detailtransaksi', $detailKeranjang);
                                        redirect('Dashboard/keranjang');
                                    } else if ($jumlahBeli >= ($produk['isiDus'] * 5)) { //harga 5 dus/50bal
                                        $detailKeranjang = [
                                            'idDetailTransaksi' => $this->Models->randomkode(32),
                                            'idTransaksi' => $idTransaksi,
                                            'idProduk' => $id,
                                            'jumlahBeli' => $jumlahBeli,
                                            'hargaSatuan' => $produk['harga50Pcs'],
                                            'totalharga' => $jumlahBeli * $produk['harga50Pcs'],
                                            'dus' => $jumlahBeli / $produk['isiDus'],
                                        ];

                                        $this->db->insert('detailtransaksi', $detailKeranjang);
                                        redirect('Dashboard/keranjang');
                                    } else if ($jumlahBeli >= ($produk['isiDus'] * 1)) { //1 Dus
                                        $detailKeranjang = [
                                            'idDetailTransaksi' => $this->Models->randomkode(32),
                                            'idTransaksi' => $idTransaksi,
                                            'idProduk' => $id,
                                            'jumlahBeli' => $jumlahBeli,
                                            'hargaSatuan' => $produk['harga1Dus'],
                                            'totalharga' => $jumlahBeli * $produk['harga1Dus'],
                                            'dus' => $jumlahBeli / $produk['isiDus'],
                                        ];

                                        $this->db->insert('detailtransaksi', $detailKeranjang);
                                        redirect('Dashboard/keranjang');
                                    } else if($jumlahBeli >= 1){
                                        $detailKeranjang = [
                                            'idDetailTransaksi' => $this->Models->randomkode(32),
                                            'idTransaksi' => $idTransaksi,
                                            'idProduk' => $id,
                                            'jumlahBeli' => $jumlahBeli,
                                            'hargaSatuan' => $produk['harga'],
                                            'totalharga' => $jumlahBeli * $produk['harga'],
                                            'dus' => $jumlahBeli / $produk['isiDus'],
                                        ];

                                        $this->db->insert('detailtransaksi', $detailKeranjang);
                                        redirect('Dashboard/keranjang');
                                    }
                                }


                                if ($jumlahBeli >= ($produk['isiDus'] * 10)) { //Harga 10Dus

                                    $detailKeranjang = [
                                        'idDetailTransaksi' => $this->Models->randomkode(32),
                                        'idTransaksi' => $idTransaksi,
                                        'idProduk' => $id,
                                        'jumlahBeli' => $jumlahBeli,
                                        'hargaSatuan' => $produk['harga10Dus'],
                                        'totalharga' => $jumlahBeli * $produk['harga10Dus'],
                                        'dus' => $jumlahBeli / $produk['isiDus'],
                                    ];

                                    $this->db->insert('detailtransaksi', $detailKeranjang);
                                    redirect('Dashboard/keranjang');
                                } else if ($jumlahBeli >= $produk['isiDus']) { //harga 1 Dus
                                    $detailKeranjang = [
                                        'idDetailTransaksi' => $this->Models->randomkode(32),
                                        'idTransaksi' => $idTransaksi,
                                        'idProduk' => $id,
                                        'jumlahBeli' => $jumlahBeli,
                                        'hargaSatuan' => $produk['harga1Dus'],
                                        'totalharga' => $jumlahBeli * $produk['harga1Dus'],
                                        'dus' => $jumlahBeli / $produk['isiDus'],
                                    ];

                                    $this->db->insert('detailtransaksi', $detailKeranjang);
                                    redirect('Dashboard/keranjang');
                                } else if ($jumlahBeli >= 50) { //harga 50 Pcs
                                    $detailKeranjang = [
                                        'idDetailTransaksi' => $this->Models->randomkode(32),
                                        'idTransaksi' => $idTransaksi,
                                        'idProduk' => $id,
                                        'jumlahBeli' => $jumlahBeli,
                                        'hargaSatuan' => $produk['harga50Pcs'],
                                        'totalharga' => $jumlahBeli * $produk['harga50Pcs'],
                                        'dus' => $jumlahBeli / $produk['isiDus'],
                                    ];

                                    $this->db->insert('detailtransaksi', $detailKeranjang);
                                    redirect('Dashboard/keranjang');
                                } else if ($jumlahBeli < 50) { //harga Ecer
                                    $detailKeranjang = [
                                        'idDetailTransaksi' => $this->Models->randomkode(32),
                                        'idTransaksi' => $idTransaksi,
                                        'idProduk' => $id,
                                        'jumlahBeli' => $jumlahBeli,
                                        'hargaSatuan' => $produk['harga'],
                                        'totalharga' => $jumlahBeli * $produk['harga'],
                                        'dus' => $jumlahBeli / $produk['isiDus'],
                                    ];

                                    $this->db->insert('detailtransaksi', $detailKeranjang);
                                    redirect('Dashboard/keranjang');
                                }
                            }
                        } else {

                            if ($id == 44) { // jika usus crispi
                                if ($jumlahBeli >= ($produk['isiDus'] * 10)) { //harga 10 Dus
                                    $idDetailTransaksi = $this->Models->randomkode(32);
                                    $idTransaksi = $this->Models->randomkode(32);
                                    $detailKeranjang = [
                                        'idDetailTransaksi' => $idDetailTransaksi,
                                        'idTransaksi' => $idTransaksi,
                                        'idProduk' => $id,
                                        'jumlahBeli' => $jumlahBeli,
                                        'hargaSatuan' => $produk['harga10Dus'],
                                        'totalharga' => $jumlahBeli * $produk['harga10Dus'],
                                        'dus' => $jumlahBeli / $produk['isiDus'],
                                    ];

                                    $this->db->insert('detailtransaksi', $detailKeranjang);


                                    $dataTransaksi = [
                                        'idTransaksi' => $idTransaksi,
                                        'idUser' => $user,
                                        'status' => 0,
                                    ];
                                    $this->db->insert('transaksi', $dataTransaksi);
                                    redirect('Dashboard/keranjang');
                                } else if ($jumlahBeli >= ($produk['isiDus'] * 5)) {
                                    $idDetailTransaksi = $this->Models->randomkode(32);
                                    $idTransaksi = $this->Models->randomkode(32);
                                    $detailKeranjang = [
                                        'idDetailTransaksi' => $idDetailTransaksi,
                                        'idTransaksi' => $idTransaksi,
                                        'idProduk' => $id,
                                        'jumlahBeli' => $jumlahBeli,
                                        'hargaSatuan' => $produk['harga50Pcs'],
                                        'totalharga' => $jumlahBeli * $produk['harga50Pcs'],
                                        'dus' => $jumlahBeli / $produk['isiDus'],
                                    ];

                                    $this->db->insert('detailtransaksi', $detailKeranjang);


                                    $dataTransaksi = [
                                        'idTransaksi' => $idTransaksi,
                                        'idUser' => $user,
                                        'status' => 0,
                                    ];
                                    $this->db->insert('transaksi', $dataTransaksi);
                                    redirect('Dashboard/keranjang');
                                } else if ($jumlahBeli >= ($produk['isiDus'] * 1)) {
                                    $idDetailTransaksi = $this->Models->randomkode(32);
                                    $idTransaksi = $this->Models->randomkode(32);
                                    $detailKeranjang = [
                                        'idDetailTransaksi' => $idDetailTransaksi,
                                        'idTransaksi' => $idTransaksi,
                                        'idProduk' => $id,
                                        'jumlahBeli' => $jumlahBeli,
                                        'hargaSatuan' => $produk['harga1Dus'],
                                        'totalharga' => $jumlahBeli * $produk['harga1Dus'],
                                        'dus' => $jumlahBeli / $produk['isiDus'],
                                    ];

                                    $this->db->insert('detailtransaksi', $detailKeranjang);


                                    $dataTransaksi = [
                                        'idTransaksi' => $idTransaksi,
                                        'idUser' => $user,
                                        'status' => 0,
                                    ];
                                    $this->db->insert('transaksi', $dataTransaksi);
                                    redirect('Dashboard/keranjang');
                                }else if($jumlahBeli >= 1){
                                    $idDetailTransaksi = $this->Models->randomkode(32);
                                    $idTransaksi = $this->Models->randomkode(32);
                                    $detailKeranjang = [
                                        'idDetailTransaksi' => $idDetailTransaksi,
                                        'idTransaksi' => $idTransaksi,
                                        'idProduk' => $id,
                                        'jumlahBeli' => $jumlahBeli,
                                        'hargaSatuan' => $produk['harga'],
                                        'totalharga' => $jumlahBeli * $produk['harga'],
                                        'dus' => $jumlahBeli / $produk['isiDus'],
                                    ];

                                    $this->db->insert('detailtransaksi', $detailKeranjang);


                                    $dataTransaksi = [
                                        'idTransaksi' => $idTransaksi,
                                        'idUser' => $user,
                                        'status' => 0,
                                    ];
                                    $this->db->insert('transaksi', $dataTransaksi);
                                    redirect('Dashboard/keranjang');
                                }
                            }

                            if ($jumlahBeli >= ($produk['isiDus'] * 10)) { //harga 10 dus
                                $idDetailTransaksi = $this->Models->randomkode(32);
                                $idTransaksi = $this->Models->randomkode(32);
                                $detailKeranjang = [
                                    'idDetailTransaksi' => $idDetailTransaksi,
                                    'idTransaksi' => $idTransaksi,
                                    'idProduk' => $id,
                                    'jumlahBeli' => $jumlahBeli,
                                    'hargaSatuan' => $produk['harga10Dus'],
                                    'totalharga' => $jumlahBeli * $produk['harga10Dus'],
                                    'dus' => $jumlahBeli / $produk['isiDus'],
                                ];

                                $this->db->insert('detailtransaksi', $detailKeranjang);


                                $dataTransaksi = [
                                    'idTransaksi' => $idTransaksi,
                                    'idUser' => $user,
                                    'status' => 0,
                                ];
                                $this->db->insert('transaksi', $dataTransaksi);
                                redirect('Dashboard/keranjang');
                            } else if ($jumlahBeli >= $produk['isiDus']) { //harga 1 dus
                                $idDetailTransaksi = $this->Models->randomkode(32);
                                $idTransaksi = $this->Models->randomkode(32);
                                $detailKeranjang = [
                                    'idDetailTransaksi' => $idDetailTransaksi,
                                    'idTransaksi' => $idTransaksi,
                                    'idProduk' => $id,
                                    'jumlahBeli' => $jumlahBeli,
                                    'hargaSatuan' => $produk['harga1Dus'],
                                    'totalharga' => $jumlahBeli * $produk['harga1Dus'],
                                    'dus' => $jumlahBeli / $produk['isiDus'],
                                ];

                                $this->db->insert('detailtransaksi', $detailKeranjang);


                                $dataTransaksi = [
                                    'idTransaksi' => $idTransaksi,
                                    'idUser' => $user,
                                    'status' => 0,
                                ];
                                $this->db->insert('transaksi', $dataTransaksi);
                                redirect('Dashboard/keranjang');
                            } else if ($jumlahBeli >= 50) { // harga 50 Pcs
                                $idDetailTransaksi = $this->Models->randomkode(32);
                                $idTransaksi = $this->Models->randomkode(32);
                                $detailKeranjang = [
                                    'idDetailTransaksi' => $idDetailTransaksi,
                                    'idTransaksi' => $idTransaksi,
                                    'idProduk' => $id,
                                    'jumlahBeli' => $jumlahBeli,
                                    'hargaSatuan' => $produk['harga50Pcs'],
                                    'totalharga' => $jumlahBeli * $produk['harga50Pcs'],
                                    'dus' => $jumlahBeli / $produk['isiDus'],
                                ];

                                $this->db->insert('detailtransaksi', $detailKeranjang);


                                $dataTransaksi = [
                                    'idTransaksi' => $idTransaksi,
                                    'idUser' => $user,
                                    'status' => 0,
                                ];
                                $this->db->insert('transaksi', $dataTransaksi);
                                redirect('Dashboard/keranjang');
                            } else if ($jumlahBeli < 50) { // harga ecer
                                $idDetailTransaksi = $this->Models->randomkode(32);
                                $idTransaksi = $this->Models->randomkode(32);
                                $detailKeranjang = [
                                    'idDetailTransaksi' => $idDetailTransaksi,
                                    'idTransaksi' => $idTransaksi,
                                    'idProduk' => $id,
                                    'jumlahBeli' => $jumlahBeli,
                                    'hargaSatuan' => $produk['harga'],
                                    'totalharga' => $jumlahBeli * $produk['harga'],
                                    'dus' => $jumlahBeli / $produk['isiDus'],
                                ];

                                $this->db->insert('detailtransaksi', $detailKeranjang);


                                $dataTransaksi = [
                                    'idTransaksi' => $idTransaksi,
                                    'idUser' => $user,
                                    'status' => 0,
                                ];
                                $this->db->insert('transaksi', $dataTransaksi);
                                redirect('Dashboard/keranjang');
                            }
                        }
                    }
                } else {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger mb-3" role="alert">Silahkan Login Terlebih Dahulu</div>'
                    );
                    redirect(base_url('Auth'));
                }
            }
        } else {
            redirect(base_url());
        }
    }
}
