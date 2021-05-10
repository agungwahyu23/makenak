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
		// $this->db->join('detailtransaksi', 'detailtransaksi.idProduk = produk.id');
		// $this->db->join('transaksi', 'transaksi.status = 3');
		// $data['produkTerlaris'] =  $this->db->select('produk.namaProduk, detailtransaksi.jumlahBeli','(SELECT produk.namaProduk SUM(detailtransaksi.jumlahBeli) FROM detailtransaksi WHERE detailtransaksi.idProduk = produk.id) AS totalBeli', TRUE);
		
		
		
		// $this->db->join('produk', 'produk.id = detailtransaksi.idProduk');
		$this->db->join('transaksi', 'transaksi.idTransaksi = detailtransaksi.idTransaksi');
		$data['produkTerlaris'] = $this->db->select('transaksi.idTransaksi, idProduk, namaProduk, SUM(jumlahBeli) as jumlahBeli')
                 ->from('detailtransaksi')->where('transaksi.status', '3')
				 ->join('produk', 'produk.id = detailtransaksi.idProduk', 'LEFT')
                 ->order_by('jumlahBeli','desc')
                 ->limit(10)
                 ->group_by('idProduk')
                 ->get()->result_array();
		// $data['produkTerlaris'] = $this->db->get('produk', 10)->result_array();
		// var_dump($data['produkTerlaris']);die;
		

		$pengunjung =  $this->db->query("SELECT COUNT(id_pengunjung) as count,MONTHNAME(tanggal) as month_name FROM pengunjung WHERE YEAR(tanggal) = '" . date('Y') . "' GROUP BY YEAR(tanggal), MONTH(tanggal)")->result_array();

		foreach ($pengunjung as $p) {
			$data['tanggal'][] = $p['month_name'];
			$data['jumlah'][] = (int)$p['count'];
		}
		$data['grafik'] = json_encode($data);
		$this->load->view('admin/dashboard', $data);
	}
}
