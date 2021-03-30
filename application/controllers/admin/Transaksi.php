<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
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
		$data['data'] = $this->db->query("SELECT transaksi_rumah.* , kode_rumah.Kode_Rumah , rumah.Tipe FROM transaksi_rumah , blok_rumah , rumah , kode_rumah WHERE transaksi_rumah.Id_Blok = blok_rumah.Id_Blok AND blok_rumah.Id_Rumah = rumah.Id_Rumah AND blok_rumah.Id_Kode_Rumah = kode_rumah.Id_Kode ORDER BY transaksi_rumah.CreatedDate DESC")->result_array();
		$this->load->view('admin/transaksi/data', $data);
	}
	public function detail($id)
	{
		$data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>
		$this->session->userdata('Id_User')])->row_array();
		$this->db->set('Baru', 2);
		$this->db->where('Id_Transaksi', $id);
		$this->db->update('transaksi_rumah');
		$data['data'] = $this->db->query("SELECT transaksi_rumah.* , kode_rumah.Kode_Rumah , rumah.Tipe , rumah.Harga , rumah.Banner , bank.* , blok_rumah.Id_Blok FROM transaksi_rumah , blok_rumah , rumah , kode_rumah , bank WHERE transaksi_rumah.Id_Bank = bank.Id_Bank AND transaksi_rumah.Id_Blok = blok_rumah.Id_Blok AND blok_rumah.Id_Rumah = rumah.Id_Rumah AND blok_rumah.Id_Kode_Rumah = kode_rumah.Id_Kode AND transaksi_rumah.Id_Transaksi = '$id'")->result_array();
		$this->load->view('admin/transaksi/detail', $data);
	}
	public function Selesai($id)
	{
		//ubah di db
		$this->db->set('Status', 2);
		$this->db->where('Id_Transaksi', $id);
		$this->db->update('transaksi_rumah');
		//ubah di status blok rumah
		$data = $this->db->query("SELECT * FROM transaksi_rumah WHERE Id_Transaksi = '$id'")->row_array();
		$idblok = $data['Id_Blok'];
		// echo json_encode($idblok);
		$this->db->set('status', 3);
		$this->db->where('Id_Blok', $idblok);
		$this->db->update('blok_rumah');

		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Transaksi Berhasil Diselesaikan
     </div>');
		redirect('admin/Transaksi');
	}
	public function Berlangsung($id)
	{
		//ubah di db
		$this->db->set('Status', 4);
		$this->db->where('Id_Transaksi', $id);
		$this->db->update('transaksi_rumah');
		//ubah di status blok rumah
		$data = $this->db->query("SELECT * FROM transaksi_rumah WHERE Id_Transaksi = '$id'")->row_array();
		$idblok = $data['Id_Blok'];
		// echo json_encode($idblok);
		$this->db->set('status', 2);
		$this->db->where('Id_Blok', $idblok);
		$this->db->update('blok_rumah');

		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Transaksi Berhasil Diterima
     </div>');
		redirect('admin/Transaksi');
	}
	public function Tolak($id)
	{
		$this->db->set('Status', 3);
		$this->db->where('Id_Transaksi', $id);
		$this->db->update('transaksi_rumah');
		//ubah di status blok rumah
		$data = $this->db->query("SELECT * FROM transaksi_rumah WHERE Id_Transaksi = '$id'")->row_array();
		$idblok = $data['Id_Blok'];
		// echo json_encode($idblok);
		$this->db->set('status', 1);
		$this->db->where('Id_Blok', $idblok);
		$this->db->update('blok_rumah');

		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Transaksi Berhasil DiTolak
     </div>');
		redirect('admin/Transaksi');
	}
	public function getExport()
	{
		$timestamp = time();
		$id = $this->uri->segment(4);
		$filename = 'export_transaksi_' . date('Y-m-d') . '.xls';

		header("Content-Type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=\"$filename\"");
		header('Cache-Control: max-age=0');

		$data['data'] = $this->db->query("SELECT transaksi_rumah.* , kode_rumah.Kode_Rumah , rumah.Tipe , rumah.Harga , rumah.Banner , bank.* , blok_rumah.Id_Blok FROM transaksi_rumah , blok_rumah , rumah , kode_rumah , bank WHERE transaksi_rumah.Id_Bank = bank.Id_Bank AND transaksi_rumah.Id_Blok = blok_rumah.Id_Blok AND blok_rumah.Id_Rumah = rumah.Id_Rumah AND blok_rumah.Id_Kode_Rumah = kode_rumah.Id_Kode")->result_array();
		$this->load->view('admin/export', $data);
	}
}
