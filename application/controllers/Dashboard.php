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
        if (!$this->session->userdata('idCustomer')) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger mb-3" role="alert">Silahkan Login Terlebih Dahulu</div>'
            );
            redirect('Auth');
        } else {
            $data['deskripsi'] = $this->db->query("SELECT * FROM profile WHERE Id_Profile = '1'")->result_array();

            $user = $this->session->userdata('idCustomer');
            $data['transaksiMenunggu'] = $this->db->get_where('transaksi', ['status' => 1, 'idUser' => $user])->num_rows();
            $data['transaksiDiproses'] = $this->db->get_where('transaksi', ['status' => 2, 'idUser' => $user])->num_rows();
            $data['transaksiDikirim'] = $this->db->get_where('transaksi', ['status' => 3, 'idUser' => $user])->num_rows();

            $this->load->view('user/akun/dashboard', $data);;
        }
    }

    public function keranjang()
    {
        if (!$this->session->userdata('idCustomer')) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger mb-3" role="alert">Silahkan Login Terlebih Dahulu</div>'
            );
            redirect('Auth');
        } else {
            $data['deskripsi'] = $this->db->query("SELECT * FROM profile WHERE Id_Profile = '1'")->result_array();
            $user = $this->session->userdata('idCustomer');

            $data['keranjang'] = $this->db->join('detailtransaksi', 'detailtransaksi.idTransaksi = transaksi.idTransaksi')->join('produk', 'produk.id = detailtransaksi.idProduk')->get_where('transaksi', ['transaksi.status' => 0, 'idUser' => $user])->result_array();

            // var_dump($data['keranjang']);die;

            $this->load->view('user/akun/keranjang', $data);
        }
    }



    public function keranjangUpdate()
    {
        $id = $this->input->post('id[]');
        $jumlahBeli = $this->input->post('jumlahBeli[]');
        $i = 1;
        foreach ($jumlahBeli as $updateJumlah) {
            if ($updateJumlah) {

                echo $id[$i];

                $updateJumlah = $jumlahBeli[$i];

                $produk = $this->db->join('produk', 'produk.id = detailtransaksi.idProduk')->get_where('detailtransaksi', ['idDetailTransaksi' => $id[$i]])->row_array();

                if ($produk['stok'] > $updateJumlah) {
                    if ($produk['id'] == 44) {
                        // var_dump($updateJumlah);die;
                        if ($updateJumlah >= 100) { //harga 1 dus
                            $this->db->set([
                                'jumlahBeli' => $updateJumlah,
                                'hargaSatuan' => $produk['harga1Dus'],
                                'totalharga' => $updateJumlah * $produk['harga1Dus'],
                                'dus' => $updateJumlah / $produk['isiDus'],
                            ]);
                            $this->db->where(['idDetailTransaksi' => $produk['idDetailTransaksi']]);
                            $this->db->update('detailtransaksi');
                            $i++;
                        } else if ($updateJumlah >= 50) {
                            $this->db->set([
                                'jumlahBeli' => $updateJumlah,
                                'hargaSatuan' => $produk['harga50Pcs'],
                                'totalharga' => $updateJumlah * $produk['harga50Pcs'],
                                'dus' => $updateJumlah / $produk['isiDus'],
                            ]);
                            $this->db->where(['idDetailTransaksi' => $produk['idDetailTransaksi']]);
                            $this->db->update('detailtransaksi');
                            $i++;
                        } else if ($updateJumlah >= 1) {
                            $this->db->set([
                                'jumlahBeli' => $updateJumlah,
                                'hargaSatuan' => $produk['harga'],
                                'totalharga' => $updateJumlah * $produk['harga'],
                                'dus' => $updateJumlah / $produk['isiDus'],
                            ]);
                            $this->db->where(['idDetailTransaksi' => $produk['idDetailTransaksi']]);
                            $this->db->update('detailtransaksi');
                            $i++;
                        }
                    } else {

                        if ($updateJumlah >= ($produk['isiDus'] * 10)) { //harga 10 dus
                            $this->db->set([
                                'jumlahBeli' => $updateJumlah,
                                'hargaSatuan' => $produk['harga10Dus'],
                                'totalharga' => $updateJumlah * $produk['harga10Dus'],
                                'dus' => $updateJumlah / $produk['isiDus'],
                            ]);
                            $this->db->where(['idDetailTransaksi' => $produk['idDetailTransaksi']]);
                            $this->db->update('detailtransaksi');
                            $i++;
                        } else if ($updateJumlah >= $produk['isiDus']) { //harga 1 Dus
                            $this->db->set([
                                'jumlahBeli' => $updateJumlah,
                                'hargaSatuan' => $produk['harga1Dus'],
                                'totalharga' => $updateJumlah * $produk['harga1Dus'],
                                'dus' => $updateJumlah / $produk['isiDus'],
                            ]);
                            $this->db->where(['idDetailTransaksi' => $produk['idDetailTransaksi']]);
                            $this->db->update('detailtransaksi');
                            $i++;
                        } else if ($updateJumlah >= 50) {
                            $this->db->set([
                                'jumlahBeli' => $updateJumlah,
                                'hargaSatuan' => $produk['harga50Pcs'],
                                'totalharga' => $updateJumlah * $produk['harga50Pcs'],
                                'dus' => $updateJumlah / $produk['isiDus'],
                            ]);
                            $this->db->where(['idDetailTransaksi' => $produk['idDetailTransaksi']]);
                            $this->db->update('detailtransaksi');
                            $i++;
                        } else if ($updateJumlah < 50) {
                            $this->db->set([
                                'jumlahBeli' => $updateJumlah,
                                'hargaSatuan' => $produk['harga'],
                                'totalharga' => $updateJumlah * $produk['harga'],
                                'dus' => $updateJumlah / $produk['isiDus'],
                            ]);
                            $this->db->where(['idDetailTransaksi' => $produk['idDetailTransaksi']]);
                            $this->db->update('detailtransaksi');
                            $i++;
                        }
                    }
                } else {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger text-center mb-3" role="alert">Stok '. $produk['namaProduk'] .' Tidak Mencukupi</div>'
                    );
                    redirect('Dashboard/keranjang');
                }



                // $i++;
            }
        }
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success text-center mb-3" role="alert">Keranjang Berhasil Diubah</div>'
        );
        redirect('Dashboard/keranjang');
    }

    public function konfirmasi()
    {
        if (!$this->session->userdata('idCustomer')) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger mb-3" role="alert">Silahkan Login Terlebih Dahulu</div>'
            );
            redirect('Auth');
        } else {
            $data['deskripsi'] = $this->db->query("SELECT * FROM profile WHERE Id_Profile = '1'")->result_array();
            $user = $this->session->userdata('idCustomer');

            $data['konfirmasi'] = $this->db->join('detailtransaksi', 'detailtransaksi.idTransaksi = transaksi.idTransaksi')->join('produk', 'produk.id = detailtransaksi.idProduk')->get_where('transaksi', ['transaksi.status' => '1', 'idUser' => $user])->result_array();

            $this->load->view('user/akun/menunggukonfirmasi', $data);
        }
    }

    public function proses()
    {
        if (!$this->session->userdata('idCustomer')) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger mb-3" role="alert">Silahkan Login Terlebih Dahulu</div>'
            );
            redirect('Auth');
        } else {
            $data['deskripsi'] = $this->db->query("SELECT * FROM profile WHERE Id_Profile = '1'")->result_array();

            $user = $this->session->userdata('idCustomer');

            $data['proses'] = $this->db->join('detailtransaksi', 'detailtransaksi.idTransaksi = transaksi.idTransaksi')->join('produk', 'produk.id = detailtransaksi.idProduk')->get_where('transaksi', ['transaksi.status' => 2, 'idUser' => $user])->result_array();

            $this->load->view('user/akun/proses', $data);
        }
    }

    public function dikirim()
    {
        if (!$this->session->userdata('idCustomer')) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger mb-3" role="alert">Silahkan Login Terlebih Dahulu</div>'
            );
            redirect('Auth');
        } else {
            $user = $this->session->userdata('idCustomer');
            $data['deskripsi'] = $this->db->query("SELECT * FROM profile WHERE Id_Profile = '1'")->result_array();

            $data['dikirim'] = $this->db->join('detailtransaksi', 'detailtransaksi.idTransaksi = transaksi.idTransaksi')->join('produk', 'produk.id = detailtransaksi.idProduk')->get_where('transaksi', ['transaksi.status' => 3, 'idUser' => $user])->result_array();

            $this->load->view('user/akun/kirim', $data);
        }
    }

    public function validasi()
    {
        $user = $this->session->userdata('idCustomer');

        $data = $this->db->join('detailtransaksi', 'detailtransaksi.idTransaksi = transaksi.idTransaksi')->join('produk', 'produk.id = detailtransaksi.idProduk')->get_where('transaksi', ['idUser' => $user, 'transaksi.Status' => 0])->result_array();

        $idTransaksi = $data[0]['idTransaksi'];

        $totalBeli = $this->db->query("SELECT SUM(dus) as totalDus FROM detailTransaksi WHERE idTransaksi = '$idTransaksi'")->result_array();

        // var_dump($totalBeli[0]['totalDus']);die;
        // var_dump(intval($totalBeli[0]['totalDus']));die;

        $jumlah = $this->db->join('detailtransaksi', 'detailtransaksi.idTransaksi = transaksi.idTransaksi')->get_where('transaksi', ['idUser' => $user, 'Status' => 0])->num_rows();
        $wa = $this->db->get('profile')->row_array();
        $link = 'https://api.whatsapp.com/send?phone=';


        if ($totalBeli[0]['totalDus'] > 30) {
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">

					  Untuk Pemesanan Di Atas 30 Dus, Silahkan Melakukan Transaksi Melalui WA Admin Mak Enak Berikut.<br>
                        <a class="btn btn-success" href="' . $link . '' . $wa['wa2'] . '">Pesan Sekarang</a>

					</div>');

            redirect('Dashboard/keranjang');
        }

        // for ($i = 0; $i < $jumlah; $i++) {
        //     if ($data[$i]['jumlahBeli'] > ($data[$i]['isiDus'] * 30)) {
        //         $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">

        // 			  Untuk Pemesanan Di Atas 30 Dus, Silahkan Melakukan Transaksi Melalui WA Admin Mak Enak Berikut.<br>
        //                 <a class="btn btn-success" href="' . $link . '' . $wa['wa2'] . '">Pesan Sekarang</a>

        // 			</div>');

        //         redirect('Dashboard/keranjang');
        //     }
        // }

        for ($i = 0; $i < $jumlah; $i++) {
            if ($data[$i]['stok'] == 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert">
                        Stok ' . $data[$i]['namaProduk'] . ' telah habis, silahkan hubungi admin untuk menanyakan ketersediaan stok. <br>
                        <a class="btn btn-success" href="' . $link . '' . $wa['wa2'] . '">Hubungi Admin</a>
					</div>');

                redirect('Dashboard/keranjang');
            } else {
                if ($data[$i]['jumlahBeli'] > $data[$i]['stok']) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" text-center" role="alert">
                            Stok ' . $data[$i]['namaProduk'] . ' tidak mencukupi, silahkan hubungi admin untuk menanyakan ketersediaan stok. <br>
                            <a class="btn btn-success" href="' . $link . '' . $wa['wa2'] . '">Hubungi Admin</a>
                        </div>');

                    redirect('Dashboard/keranjang');
                }
            }
        }

        redirect('Dashboard/checkout');
    }

    public function dataDetail()
    {
        $id = $this->input->post('idDetail');

        $data['wa'] = $this->db->get('profile')->result();
        $data['detail'] = $this->db->join('produk', 'produk.id = detailtransaksi.idProduk')->get_where('detailtransaksi', ['idDetailTransaksi' => $id])->result();
        echo json_encode($data);
    }

    public function checkout()
    {
        $data['deskripsi'] = $this->db->query("SELECT * FROM profile WHERE Id_Profile = '1'")->result_array();

        $data['bca'] = $this->db->get_where('rekening', ['idRekening' => 1])->row_array();
        $data['bni'] = $this->db->get_where('rekening', ['idRekening' => 2])->row_array();
        $data['bri'] = $this->db->get_where('rekening', ['idRekening' => 4])->row_array();
        $data['mandiri'] = $this->db->get_where('rekening', ['idRekening' => 3])->row_array();
        $user = $this->session->userdata('idCustomer');



        $data['user'] = $this->db->get_where('pengguna', ['Id_User' => $user, 'Pekerjaan' => 'User'])->row_array();
        $data['keranjang'] = $this->db->get_where('transaksi', ['idUser' => $user, 'Status' => 0])->row_array();
        $data['provinsi'] = $this->db->get('provinces')->result_array();


        $idT = $data['keranjang']['idTransaksi'];
        $data['totalBayar'] = $this->db->query("SELECT SUM(totalHarga) as totalBayar FROM detailTransaksi WHERE idTransaksi = '$idT'")->row_array();

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

            $cekdetail = $this->db->join('detailtransaksi', 'detailtransaksi.idTransaksi = transaksi.idTransaksi')->join('produk', 'produk.id = detailtransaksi.idProduk')->get_where('transaksi', ['idUser' => $user, 'transaksi.Status' => 0])->result_array();

            $wa = $this->db->get('profile')->row_array();
            $link = 'https://api.whatsapp.com/send?phone=';

            $jumlah = $this->db->join('detailtransaksi', 'detailtransaksi.idTransaksi = transaksi.idTransaksi')->get_where('transaksi', ['idUser' => $user, 'Status' => 0])->num_rows();

            for ($i = 0; $i < $jumlah; $i++) {
                if ($cekdetail[$i]['jumlahBeli'] > $cekdetail[$i]['stok']) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger text-center" text-center" role="alert">
                            Stok ' . $cekdetail[$i]['namaProduk'] . ' tidak mencukupi atau telah habis, silahkan hubungi admin untuk menanyakan detail lebih lanjut. <br>
                            <a class="btn btn-success" href="' . $link . '' . $wa['wa2'] . '">Hubungi Admin</a>
                        </div>');

                    redirect('Dashboard/keranjang');
                }
            }

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
            $idTransaksi = $this->input->post('idTransaksi');
            $totalBayar = $this->input->post('totalBayar1');


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
                    'buktiTransfer' => $foto,
                    'totalBayar' => $totalBayar,
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

                $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">

					  Pesanan Anda Berhasil Dikirim, Mohon Tunggu Konfirmasi Dari Admin.

					</div>');

                redirect('Dashboard/konfirmasi');

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
