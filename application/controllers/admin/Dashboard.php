<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		belumlogin();
	}
	public function index()
	{
		$data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>
		$this->session->userdata('Id_User')])->row_array();
		
		// data Transaksi Masuk
		$data['totalPesananMasuk'] = $this->db->get_where('transaksi', ['status' => 1])->num_rows();
		$data['totalPesananDikemas'] = $this->db->get_where('transaksi', ['status' => 2])->num_rows();
		$data['totalTransaksiSelesai'] = $this->db->get_where('transaksi', ['status' => 3])->num_rows();
		$data['totalTransaksiDitolak'] = $this->db->get_where('transaksi', ['status' => 4])->num_rows();

		// data produk terlaris
		// $data['produkTerlaris'] = $this->db->query("SELECT detailtransaksi.idProduk, detailtransaksi.jumlahBeli, 
		// SUM(detailtransaksi.jumlahBeli) AS jumlahBeli
		// FROM detailtransaksi LEFT JOIN produk
		// ON detailtransaksi.idProduk = produk.id
		// GROUP BY detailtransaksi.jumlahBeli DESC LIMIT 10")->result_array();
		$data['produkTerlaris'] = $this->db->query("SELECT produk.id, produk.namaProduk, SUM(detailtransaksi.jumlahBeli) AS jumlahBeli
		FROM produk JOIN detailtransaksi
		ON produk.id = detailtransaksi.idProduk
		GROUP BY detailTransaksi.jumlahBeli DESC LIMIT 10")->result_array();

		// SUM(jumlahBeli) jumlahBeli FROM detailtransaksi GROUP BY idProduk ORDER BY jumlahBeli DESC LIMIT 3

		// var_dump($data['produkTerlaris']);die;




		$totalTransaksi = $this->db->query("SELECT * FROM transaksi_rumah")->num_rows();
		$transaksiSelesai = $this->db->query("SELECT * FROM transaksi_rumah WHERE Status = 2")->num_rows();
		$transaksiBerlangsung = $this->db->query("SELECT * FROM transaksi_rumah WHERE Status = 4")->num_rows();
		$transaksiMenunggu = $this->db->query("SELECT * FROM transaksi_rumah WHERE Status = 1")->num_rows();
		$data45tersedia = $this->db->query("SELECT blok_rumah.Id_Rumah, blok_rumah.status, rumah.Tipe FROM blok_rumah, rumah WHERE blok_rumah.Id_Rumah = rumah.Id_Rumah AND rumah.Tipe = '45' AND blok_rumah.status = 1")->num_rows();
		$data45terbooking = $this->db->query("SELECT blok_rumah.Id_Rumah, blok_rumah.status, rumah.Tipe FROM blok_rumah, rumah WHERE blok_rumah.Id_Rumah = rumah.Id_Rumah AND rumah.Tipe = '45' AND blok_rumah.status = 2")->num_rows();
		$data45terjual = $this->db->query("SELECT blok_rumah.Id_Rumah, blok_rumah.status, rumah.Tipe FROM blok_rumah, rumah WHERE blok_rumah.Id_Rumah = rumah.Id_Rumah AND rumah.Tipe = '45' AND blok_rumah.status = 3")->num_rows();
		$data36tersedia = $this->db->query("SELECT blok_rumah.Id_Rumah, blok_rumah.status, rumah.Tipe FROM blok_rumah, rumah WHERE blok_rumah.Id_Rumah = rumah.Id_Rumah AND rumah.Tipe = '36' AND blok_rumah.status = 1")->num_rows();
		$data36terbooking = $this->db->query("SELECT blok_rumah.Id_Rumah, blok_rumah.status, rumah.Tipe FROM blok_rumah, rumah WHERE blok_rumah.Id_Rumah = rumah.Id_Rumah AND rumah.Tipe = '36' AND blok_rumah.status = 2")->num_rows();
		$data36terjual = $this->db->query("SELECT blok_rumah.Id_Rumah, blok_rumah.status, rumah.Tipe FROM blok_rumah, rumah WHERE blok_rumah.Id_Rumah = rumah.Id_Rumah AND rumah.Tipe = '36' AND blok_rumah.status = 3")->num_rows();
		$data40tersedia = $this->db->query("SELECT blok_rumah.Id_Rumah, blok_rumah.status, rumah.Tipe FROM blok_rumah, rumah WHERE blok_rumah.Id_Rumah = rumah.Id_Rumah AND rumah.Tipe = '40' AND blok_rumah.status = 1")->num_rows();
		$data40terbooking = $this->db->query("SELECT blok_rumah.Id_Rumah, blok_rumah.status, rumah.Tipe FROM blok_rumah, rumah WHERE blok_rumah.Id_Rumah = rumah.Id_Rumah AND rumah.Tipe = '40' AND blok_rumah.status = 2")->num_rows();
		$data40terjual = $this->db->query("SELECT blok_rumah.Id_Rumah, blok_rumah.status, rumah.Tipe FROM blok_rumah, rumah WHERE blok_rumah.Id_Rumah = rumah.Id_Rumah AND rumah.Tipe = '40' AND blok_rumah.status = 3")->num_rows();
		$dataRukotersedia = $this->db->query("SELECT blok_rumah.Id_Rumah, blok_rumah.status, rumah.Tipe FROM blok_rumah, rumah WHERE blok_rumah.Id_Rumah = rumah.Id_Rumah AND rumah.Tipe = 'Ruko' AND blok_rumah.status = 1")->num_rows();
		$dataRukoterbooking = $this->db->query("SELECT blok_rumah.Id_Rumah, blok_rumah.status, rumah.Tipe FROM blok_rumah, rumah WHERE blok_rumah.Id_Rumah = rumah.Id_Rumah AND rumah.Tipe = 'Ruko' AND blok_rumah.status = 2")->num_rows();
		$dataRukoterjual = $this->db->query("SELECT blok_rumah.Id_Rumah, blok_rumah.status, rumah.Tipe FROM blok_rumah, rumah WHERE blok_rumah.Id_Rumah = rumah.Id_Rumah AND rumah.Tipe = 'Ruko' AND blok_rumah.status = 3")->num_rows();
		// echo json_encode($data45);
		// $data36 = $this->db->query("SELECT blok_rumah.Id_Rumah, blok_rumah.status, rumah.Tipe FROM blok_rumah, rumah WHERE blok_rumah.Id_Rumah = rumah.Id_Rumah AND rumah.Tipe = '36'")->result_array();
		$data['data45tersedia'] = $data45tersedia;
		$data['data45terbooking'] = $data45terbooking;
		$data['data45terjual'] = $data45terjual;
		$data['data36tersedia'] = $data36tersedia;
		$data['data36terbooking'] = $data36terbooking;
		$data['data36terjual'] = $data36terjual;
		$data['data40tersedia'] = $data40tersedia;
		$data['data40terbooking'] = $data40terbooking;
		$data['data40terjual'] = $data40terjual;
		$data['dataRukotersedia'] = $dataRukotersedia;
		$data['dataRukoterbooking'] = $dataRukoterbooking;
		$data['dataRukoterjual'] = $dataRukoterjual;
		// $data['totalResult'] = $totalRecords;
		$data['totalTransaksi'] = $totalTransaksi;
		$data['transaksiSelesai'] = $transaksiSelesai;
		$data['transaksiBerlangsung'] = $transaksiBerlangsung;
		$data['transaksiMenunggu'] = $transaksiMenunggu;
		// $pengunjung =  $this->db->query("SELECT * FROM pengunjung")->result_array();

		$pengunjung =  $this->db->query("SELECT COUNT(id_pengunjung) as count,MONTHNAME(tanggal) as month_name FROM pengunjung WHERE YEAR(tanggal) = '" . date('Y') . "' GROUP BY YEAR(tanggal), MONTH(tanggal)")->result_array();

		foreach ($pengunjung as $p) {
			$data['tanggal'][] = $p['month_name'];
			$data['jumlah'][] = (int)$p['count'];
		}
		$data['grafik'] = json_encode($data);
		$this->load->view('admin/dashboard', $data);
	}
}
