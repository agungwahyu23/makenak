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
        // $data['product'] = $this->db->get('produk', $limit, $start)->result_array();
        // $data['detailProduk'] = $this->db->get_where('produk', ['id' => $id])->row_array();

        // //konfigurasi pagination
        // $config['base_url'] = site_url('produk/index'); //site url
        // $config['total_rows'] = $this->db->count_all('produk'); //total row
        // $config['per_page'] = 4;  //show record per halaman
        // $config["uri_segment"] = 3;  // uri parameter
        // $choice = $config["total_rows"] / $config["per_page"];
        // $config["num_links"] = floor($choice);

        // // Membuat Style pagination untuk BootStrap v4
        // $config['first_link']       = 'First';
        // $config['last_link']        = 'Last';
        // $config['next_link']        = 'Next';
        // $config['prev_link']        = 'Prev';
        // $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        // $config['full_tag_close']   = '</ul></nav></div>';
        // $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        // $config['num_tag_close']    = '</span></li>';
        // $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        // $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        // $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        // $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        // $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        // $config['prev_tagl_close']  = '</span>Next</li>';
        // $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        // $config['first_tagl_close'] = '</span></li>';
        // $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        // $config['last_tagl_close']  = '</span></li>';

        // $this->pagination->initialize($config);
        // $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        // //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        // $data['data'] = $this->models->get_produk_list($config["per_page"], $data['page']);           

        // $data['pagination'] = $this->pagination->create_links();


        // $this->load->model('Models');

        //ambil data total
        $total = $this->db->query("SELECT COUNT(*) FROM produk WHERE status='1'");

        //pagi
        $this->load->library('pagination'); // Load librari paginationnya

        //konfigurasi pagination
        $config['base_url']                = base_url() . 'produk/index/';
        $config['total_rows']            = $this->db->count_all('produk'); //$total;
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
        //$produk 	= $this->models->get_produk_list($config['per_page'],$page);
        $data['product'] = $this->db->get('produk', $config['per_page'], $page)->result_array();

        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('user/produk',    $data);
    }


    public function DetailProduk($id = null)
    {
        if ($id) {
            $data['deskripsi'] = $this->db->query("SELECT * FROM profile WHERE Id_Profile = '1'")->result_array();
            $data['detailProduk'] = $this->db->get_where('produk', ['id' => $id])->row_array();

            $produk = $this->db->get_where('produk', ['id' => $id])->row_array();
            $user = $this->session->userdata('idCustomer');

            $this->form_validation->set_rules('jumlah', 'Jumlah Beli', 'required|numeric');
            $jumlahBeli = $this->input->post('jumlah');
            if ($this->form_validation->run() == false) {
                $this->load->view('user/detail_produk',    $data);
            } else {
                if ($user) {
                    $idKeranjang = $this->db->get_where('transaksi', ['status' => 0, 'idUser' => $user])->row_array();

                    if ($idKeranjang) {
                        $idTransaksi = $idKeranjang['idTransaksi'];
                        $cekProduk = $this->db->get_where('detailtransaksi', ['idTransaksi' => $idTransaksi, 'idProduk' => $id])->row_array();

                        if ($cekProduk) {
                            $updateJumlah = $jumlahBeli + $cekProduk['jumlahBeli'];
                            if ($updateJumlah >= ($produk['isiDus'] * 10)) { //harga 10 dus
                                $this->db->set([
                                    'jumlahBeli' => $updateJumlah,
                                    'hargaSatuan' => $produk['harga10Dus'],
                                    'totalharga' => $updateJumlah * $produk['harga10Dus'],
                                ]);
                                $this->db->where(['idDetailTransaksi' => $cekProduk['idDetailTransaksi']]);
                                $this->db->update('detailtransaksi');
                                redirect('Dashboard/keranjang');
                            } else if ($updateJumlah >= $produk['isiDus']) { //harga 1 Dus
                                $this->db->set([
                                    'jumlahBeli' => $updateJumlah,
                                    'hargaSatuan' => $produk['harga1Dus'],
                                    'totalharga' => $updateJumlah * $produk['harga1Dus'],
                                ]);
                                $this->db->where(['idDetailTransaksi' => $cekProduk['idDetailTransaksi']]);
                                $this->db->update('detailtransaksi');
                                redirect('Dashboard/keranjang');
                            } else if ($updateJumlah >= 50) {
                                $this->db->set([
                                    'jumlahBeli' => $updateJumlah,
                                    'hargaSatuan' => $produk['harga50Pcs'],
                                    'totalharga' => $updateJumlah * $produk['harga50Pcs'],
                                ]);
                                $this->db->where(['idDetailTransaksi' => $cekProduk['idDetailTransaksi']]);
                                $this->db->update('detailtransaksi');
                                redirect('Dashboard/keranjang');
                            } else if ($updateJumlah < 50) {
                                $this->db->set([
                                    'jumlahBeli' => $updateJumlah,
                                    'hargaSatuan' => $produk['harga'],
                                    'totalharga' => $updateJumlah * $produk['harga'],
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
                            ];

                            $this->db->insert('detailtransaksi', $detailKeranjang);


                            $dataTransaksi = [
                                'idTransaksi' => $idTransaksi,
                                'idUser' => $user,
                                'status' => 0,
                            ];
                            $this->db->insert('transaksi', $dataTransaksi);
                            redirect('Dashboard/keranjang');
                        }else if($jumlahBeli >= $produk['isiDus']){//harga 1 dus
                            $idDetailTransaksi = $this->Models->randomkode(32);
                            $idTransaksi = $this->Models->randomkode(32);
                            $detailKeranjang = [
                                'idDetailTransaksi' => $idDetailTransaksi,
                                'idTransaksi' => $idTransaksi,
                                'idProduk' => $id,
                                'jumlahBeli' => $jumlahBeli,
                                'hargaSatuan' => $produk['harga1Dus'],
                                'totalharga' => $jumlahBeli * $produk['harga1Dus'],
                            ];

                            $this->db->insert('detailtransaksi', $detailKeranjang);


                            $dataTransaksi = [
                                'idTransaksi' => $idTransaksi,
                                'idUser' => $user,
                                'status' => 0,
                            ];
                            $this->db->insert('transaksi', $dataTransaksi);
                            redirect('Dashboard/keranjang');
                            
                        }else if($jumlahBeli >= 50){ // harga 50 Pcs
                            $idDetailTransaksi = $this->Models->randomkode(32);
                            $idTransaksi = $this->Models->randomkode(32);
                            $detailKeranjang = [
                                'idDetailTransaksi' => $idDetailTransaksi,
                                'idTransaksi' => $idTransaksi,
                                'idProduk' => $id,
                                'jumlahBeli' => $jumlahBeli,
                                'hargaSatuan' => $produk['harga50Pcs'],
                                'totalharga' => $jumlahBeli * $produk['harga50Pcs'],
                            ];

                            $this->db->insert('detailtransaksi', $detailKeranjang);


                            $dataTransaksi = [
                                'idTransaksi' => $idTransaksi,
                                'idUser' => $user,
                                'status' => 0,
                            ];
                            $this->db->insert('transaksi', $dataTransaksi);
                            redirect('Dashboard/keranjang');
                        }else if ($jumlahBeli < 50){// harga ecer
                            $idDetailTransaksi = $this->Models->randomkode(32);
                            $idTransaksi = $this->Models->randomkode(32);
                            $detailKeranjang = [
                                'idDetailTransaksi' => $idDetailTransaksi,
                                'idTransaksi' => $idTransaksi,
                                'idProduk' => $id,
                                'jumlahBeli' => $jumlahBeli,
                                'hargaSatuan' => $produk['harga'],
                                'totalharga' => $jumlahBeli * $produk['harga'],
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
