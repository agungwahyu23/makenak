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

		$data['pesanan'] = $this->db->get_where('transaksi', ['status' => 1])->result_array();

		// var_dump($data['pesanan']);die;

		$this->load->view('admin/transaksi/index', $data);
	}


	public function detailPemesanan($id)
	{
		$data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>
		$this->session->userdata('Id_User')])->row_array();

		$data['provinsi'] = $this->db->join('provinces', 'provinces.id = datapenerima.provinsi')->get_where('datapenerima', ['datapenerima.idTransaksi' => $id])->row_array();

		$data['dataPenerima'] = $this->db->join('datapenerima', 'datapenerima.idDataPenerima = transaksi.idDataPenerima')->join('regencies', 'regencies.id = datapenerima.kabupaten')->get_where('transaksi', ['transaksi.idTransaksi' => $id])->row_array();

		$data['detailPemesanan'] = $this->db->join('detailtransaksi', 'detailtransaksi.idTransaksi = transaksi.idTransaksi')->join('produk', 'produk.id = detailtransaksi.idProduk')->get_where('transaksi', ['transaksi.idTransaksi' => $id, 'transaksi.status' => 1])->result_array();



		// var_dump($data['detailPemesanan']);die;
		$this->load->view('admin/transaksi/detail', $data);
	}

	public function pesananDiterima($id)
	{
		$data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>
		$this->session->userdata('Id_User')])->row_array();

		$pesanan = $this->db->get_where('transaksi', ['idTransaksi' => $id])->row_array();

		if ($pesanan) {
			$this->db->set(['status' => '2']);
			$this->db->where(['idTransaksi' => $id]);
			$update = $this->db->update('transaksi');

			if ($update) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        	Data Pemesanan Berhasil Diterima!
     		</div>');
				redirect('admin/Transaksi');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
        	Data Pemesanan Gagal Diterima!
     		</div>');
				redirect('admin/Transaksi');
			}
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
        	Data Pemesanan Tidak Ditemukan!
     		</div>');
			redirect('admin/Transaksi');
		}
	}


	public function pesananDitolak($id)
	{
		$data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>
		$this->session->userdata('Id_User')])->row_array();

		$pesanan = $this->db->get_where('transaksi', ['idTransaksi' => $id])->row_array();

		if ($pesanan) {

			
			$this->db->where(['idTransaksi' => $id]);
			$this->db->delete('detailtransaksi');
			
			$this->db->where(['idTransaksi' => $id]);
			$update = $this->db->delete('transaksi');

			if ($update) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        	Data Pemesanan Berhasil Ditolak!
     		</div>');
				redirect('admin/Transaksi');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
        	Data Pemesanan Gagal Ditolak!
     		</div>');
				redirect('admin/Transaksi');
			}
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
        	Data Pemesanan Tidak Ditemukan!
     		</div>');
			redirect('admin/Transaksi');
		}
	}


	public function dikemas()
	{
		$data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>
		$this->session->userdata('Id_User')])->row_array();

		$this->db->order_by('tanggalTransaksi', 'ASC');
		$this->db->join('datapenerima', 'datapenerima.idDataPenerima = transaksi.idDataPenerima');
		$data['dikemas'] = $this->db->get_where('transaksi', ['status' => 2])->result_array();

		// var_dump($data['pesanan']);die;

		$this->load->view('admin/transaksi/dikemas', $data);
	}

	public function detailDikemas($id = '')
	{
		$idTransaksi = $this->input->post('idTransaksi');
		// $this->form_validation->set_rules('resi', 'Resi', 'required');
		$this->form_validation->set_rules('idTransaksi', 'idTransaksi', 'required');

		if ($this->form_validation->run() == false) {

			$data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>
			$this->session->userdata('Id_User')])->row_array();

			$data['provinsi'] = $this->db->join('provinces', 'provinces.id = datapenerima.provinsi')->get_where('datapenerima', ['datapenerima.idTransaksi' => $id])->row_array();

			$data['dataPenerima'] = $this->db->join('datapenerima', 'datapenerima.idDataPenerima = transaksi.idDataPenerima')->join('regencies', 'regencies.id = datapenerima.kabupaten')->get_where('transaksi', ['transaksi.idTransaksi' => $id])->row_array();

			$data['detailPemesanan'] = $this->db->join('detailtransaksi', 'detailtransaksi.idTransaksi = transaksi.idTransaksi')->join('produk', 'produk.id = detailtransaksi.idProduk')->get_where('transaksi', ['transaksi.idTransaksi' => $id, 'transaksi.status' => 2])->result_array();

			$this->load->view('admin/transaksi/detailDikemas', $data);
		} else {
			$config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '7748';
            $config['upload_path'] = './img/resi/';

            $this->load->library('upload', $config);

			if ($this->upload->do_upload('resi')) {
                $resi = $this->upload->data('file_name');

				$dataTransaksi = [
                    // 'idDataPenerima' => $idDataPenerima,
                    'status' => 3,
                    'resi' => $resi,
                ];

				$this->db->set($dataTransaksi);
                $this->db->where(['idTransaksi' => $idTransaksi]);
                $this->db->update('transaksi');

				$this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">

					  Pesanan Anda Berhasil Dikirim, Mohon Tunggu Konfirmasi Dari Admin.

					</div>');

                redirect('admin/Transaksi/dikemas');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'

                    . $this->upload->display_errors() .

                    '</div>');

                redirect('admin/Transaksi/dikemas');
            }
				
			

			// $resi = $this->input->post('resi');
			// $pesanan = $this->db->get_where('transaksi', ['idTransaksi' => $id])->row_array();

			// if ($pesanan) {
			// 	$this->db->set([
			// 		'status' => '3',
			// 		'resi' => $resi
			// 	]);
			// 	$this->db->where(['idTransaksi' => $id]);
			// 	$update = $this->db->update('transaksi');

			// 	if ($update) {
			// 		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
			// 		Barang Selesai Dikemas!
			// 		 </div>');
			// 		redirect('admin/Transaksi/dikemas');
			// 	} else {
			// 		$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
			// 		Terjadi Kesalahan, Silahkan Ulangi Kembali!
			// 		 </div>');
			// 		redirect('admin/Transaksi/dikemas');
			// 	}
			// } else {
			// 	$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
			// 	Data Pemesanan Tidak Ditemukan!
			// 	 </div>');
			// 	redirect('admin/Transaksi/dikemas');
			// }
		}
	}

	// public function detail($id)
	// {
	// 	$data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>
	// 	$this->session->userdata('Id_User')])->row_array();
	// 	$this->db->set('Baru', 2);
	// 	$this->db->where('Id_Transaksi', $id);
	// 	$this->db->update('transaksi_rumah');
	// 	$data['data'] = $this->db->query("SELECT transaksi_rumah.* , kode_rumah.Kode_Rumah , rumah.Tipe , rumah.Harga , rumah.Banner , bank.* , blok_rumah.Id_Blok FROM transaksi_rumah , blok_rumah , rumah , kode_rumah , bank WHERE transaksi_rumah.Id_Bank = bank.Id_Bank AND transaksi_rumah.Id_Blok = blok_rumah.Id_Blok AND blok_rumah.Id_Rumah = rumah.Id_Rumah AND blok_rumah.Id_Kode_Rumah = kode_rumah.Id_Kode AND transaksi_rumah.Id_Transaksi = '$id'")->result_array();
	// 	$this->load->view('admin/transaksi/detail', $data);
	// }
	public function selesai()
	{
		$data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>
		$this->session->userdata('Id_User')])->row_array();

		$data['selesai'] = $this->db->get_where('transaksi', ['status' => 3])->result_array();

		// var_dump($data['pesanan']);die;

		$this->load->view('admin/transaksi/selesai', $data);
	}

	public function detailSelesai($id)
	{
		$data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>
		$this->session->userdata('Id_User')])->row_array();

		$data['provinsi'] = $this->db->join('provinces', 'provinces.id = datapenerima.provinsi')->get_where('datapenerima', ['datapenerima.idTransaksi' => $id])->row_array();

		$data['dataPenerima'] = $this->db->join('datapenerima', 'datapenerima.idDataPenerima = transaksi.idDataPenerima')->join('regencies', 'regencies.id = datapenerima.kabupaten')->get_where('transaksi', ['transaksi.idTransaksi' => $id])->row_array();

		$data['detailPemesanan'] = $this->db->join('detailtransaksi', 'detailtransaksi.idTransaksi = transaksi.idTransaksi')->join('produk', 'produk.id = detailtransaksi.idProduk')->get_where('transaksi', ['transaksi.idTransaksi' => $id, 'transaksi.status' => 3])->result_array();



		// var_dump($data['detailPemesanan']);die;
		$this->load->view('admin/transaksi/detailSelesai', $data);
	}

	public function ditolak()
	{
		$data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>
		$this->session->userdata('Id_User')])->row_array();

		$data['ditolak'] = $this->db->get_where('transaksi', ['status' => 4])->result_array();

		// var_dump($data['pesanan']);die;

		$this->load->view('admin/transaksi/ditolak', $data);
	}

	public function detailDitolak($id)
	{
		$data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>
		$this->session->userdata('Id_User')])->row_array();

		$data['provinsi'] = $this->db->join('provinces', 'provinces.id = datapenerima.provinsi')->get_where('datapenerima', ['datapenerima.idTransaksi' => $id])->row_array();

		$data['dataPenerima'] = $this->db->join('datapenerima', 'datapenerima.idDataPenerima = transaksi.idDataPenerima')->join('regencies', 'regencies.id = datapenerima.kabupaten')->get_where('transaksi', ['transaksi.idTransaksi' => $id])->row_array();

		$data['detailPemesanan'] = $this->db->join('detailtransaksi', 'detailtransaksi.idTransaksi = transaksi.idTransaksi')->join('produk', 'produk.id = detailtransaksi.idProduk')->get_where('transaksi', ['transaksi.idTransaksi' => $id, 'transaksi.status' => 4])->result_array();

		$this->load->view('admin/transaksi/detailDitolak', $data);
	}

	public function platinum()
	{
		$data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>
		$this->session->userdata('Id_User')])->row_array();

		// $data['platinum'] = $this->db->join('datapenerima', 'datapenerima.idDataPenerima = transaksi.idDataPenerima')->join('provinces', 'provinces.id = datapenerima.provinsi')->get_where('transaksi', ['transaksi.status' => 3, 'provinsi' => 35])->result_array();
		// $data['platinum'] = $this->db->get_where('transaksi', ['status' => 3])->result_array();

		$data['platinum'] = $this->db->query('SELECT * FROM transaksi JOIN datapenerima ON transaksi.idDataPenerima=datapenerima.idDataPenerima JOIN regencies ON regencies.id=datapenerima.kabupaten JOIN provinces ON provinces.id=datapenerima.provinsi WHERE datapenerima.provinsi=35 && datapenerima.kabupaten!=999 && datapenerima.kabupaten!=3509')->result_array();

		// var_dump($data['pesanan']);die;

		$this->load->view('admin/laporan/platinum', $data);
	}
	
	public function paxel()
	{
		$data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>
		$this->session->userdata('Id_User')])->row_array();

		// $data['paxel'] = $this->db->join('datapenerima', 'datapenerima.idDataPenerima = transaksi.idDataPenerima')->join('regencies', 'regencies.id = datapenerima.kabupaten')->get_where('transaksi', ['transaksi.status' => 3, 'kabupaten' => 3509])->result_array();
		//$data['platinum'] = $this->db->get_where('transaksi', ['status' => 3])->result_array();
		$data['paxel'] = $this->db->query('SELECT * FROM transaksi JOIN datapenerima ON transaksi.idDataPenerima=datapenerima.idDataPenerima JOIN regencies ON regencies.id=datapenerima.kabupaten WHERE datapenerima.kabupaten=999')->result_array();

		// var_dump($data['pesanan']);die;

		$this->load->view('admin/laporan/paxel', $data);
	}
	
	public function oneex()
	{
		$data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>
		$this->session->userdata('Id_User')])->row_array();

		//$data['oneex'] = $this->db->join('datapenerima', 'datapenerima.idDataPenerima = transaksi.idDataPenerima')->join('provinces', 'provinces.id = datapenerima.provinsi')->get_where('transaksi', ['transaksi.status' => 3, 'datapenerima.provinsi' => $kode_prov])->result_array();

		
		$data['oneex'] = $this->db->query('SELECT * FROM transaksi JOIN datapenerima ON transaksi.idDataPenerima=datapenerima.idDataPenerima JOIN provinces ON provinces.id=datapenerima.provinsi WHERE datapenerima.provinsi != 35')->result_array();
		
		
		// $data['oneex'] = $this->db->get_where('transaksi', ['status' => 3])->result_array();
		// $data['prov'] = $this->db->get_where('datapenerima', ['provinsi' => 32])->result_array();

		//   var_dump($data['prov']);die;

		$this->load->view('admin/laporan/oneex', $data);
	}

	public function getExport()
	{

		$timestamp = time();
		$id = $this->uri->segment(4);
		$filename = 'export_transaksi_' . date('Y-m-d') . '.xls';

		header("Content-Type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=\"$filename\"");
		header('Cache-Control: max-age=0');

		// $data['data'] = $this->db->query("SELECT transaksi_rumah.* , kode_rumah.Kode_Rumah , rumah.Tipe , rumah.Harga , rumah.Banner , bank.* , blok_rumah.Id_Blok FROM transaksi_rumah , blok_rumah , rumah , kode_rumah , bank WHERE transaksi_rumah.Id_Bank = bank.Id_Bank AND transaksi_rumah.Id_Blok = blok_rumah.Id_Blok AND blok_rumah.Id_Rumah = rumah.Id_Rumah AND blok_rumah.Id_Kode_Rumah = kode_rumah.Id_Kode")->result_array();

		$data['data'] = $this->db->join('detailtransaksi', 'detailtransaksi.idTransaksi = transaksi.idTransaksi')->join('dataPenerima', 'dataPenerima.idTransaksi = transaksi.idTransaksi')->join('produk', 'produk.id = detailtransaksi.idProduk')->get_where('transaksi', ['transaksi.status' => 3])->result_array();

		// var_dump($data['data']);die;


		$this->load->view('admin/export', $data);
	}
}
