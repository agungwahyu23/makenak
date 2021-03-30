<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkout extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Models');
	}
	public function index()
	{
		$metode = $_GET['metode'];
		$idrumah = $_GET['idrumah'];
		$datablok = $this->db->query("SELECT * FROM blok_rumah WHERE Id_Blok = '$idrumah'")->row_array();
		$id_rumah = $datablok['Id_Rumah'];
		$blokrumah = $datablok['Id_Kode_Rumah'];
		$data['rumah'] = $this->db->query("SELECT * FROM rumah WHERE Id_Rumah = '$id_rumah'")->result_array();
		$data['blokrumah'] = $this->db->query("SELECT * FROM kode_rumah WHERE Id_Kode = '$blokrumah'")->result_array();
		$data['deskripsi'] = $this->db->query("SELECT * FROM profile WHERE Id_Profile = '1'")->result_array();
		$data['bank'] = $this->db->query("SELECT * FROM bank")->result_array();
		$this->load->view('user/checkout', $data);
	}
	public function Post()
	{
		$config['allowed_types'] = 'jpg|png|gif|jpeg';
		$config['max_size'] = '7748';
		$config['upload_path'] = './uploads/Files';
		$key = $this->Models->randomkode(32);
		$no_telp_wa = $this->input->post('no_telp_wa');
		$metode = $this->input->post('metode');
		$nama_lengkap = $this->input->post('nama_lengkap');
		$nomor_telepon = $this->input->post('nomor_telepon');
		$alamat = $this->input->post('alamat');
		$types = $this->input->post('types');
		$bl = $this->input->post('bl');
		$date = date('Y-m-d H:i:s');
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
		$kd = $this->input->post('idrumah');
		if ($this->upload->do_upload('foto_ktp')) {
			$a = $this->upload->data();
			if ($this->upload->do_upload('foto_bukti')) {
				$b = $this->upload->data();
				$insert = array(
					'Id_Transaksi' => $key,
					'Id_Blok' => $kd,
					'Nama_Lengkap' => $nama_lengkap,
					'Email' => $this->input->post('email'),
					'No_Telp' => $nomor_telepon,
					'Alamat' => $alamat,
					'Pekerjaan' => $this->input->post('pekerjaan'),
					'Foto_KTP' =>  	$a['file_name'],
					'Id_Bank' => $this->input->post('bank'),
					'Foto_Bukti_TF' => 	$b['file_name'],
					'Pembayaran' => $metode,
					'Status' => 1,
					'Baru' => 1,
					'CreatedDate' => date('Y-m-d H:i:s'),
				);
				$this->Models->insert('transaksi_rumah', $insert);
				// $this->db->set('status', 2);
				// $this->db->where('Id_Blok', $kd);
				// $this->db->update('Blok_Rumah');
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					Terimakasih Telah Melakukan Pembayaran
				</div>');
				if ($types == '36') {
					$url_order = "https://api.whatsapp.com/send?phone=$no_telp_wa&text=Halo%20Kak%2C%0ASaya%20Telah%20Melakukan%20Pembayaran%20Dengan%20Data%20Berikut%3A%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0ANama%20Lengkap%20%3A%20$nama_lengkap%0ANomor%20Telepon%20%3A%20$nomor_telepon%0AAlamat%20%3A%20$alamat%0ATipe%20Bangunan%20%3A%20$types%2B%0ABlok%20Bangunan%20%3A%20$bl%0AMetode%20Pembayaran%20%3A%20$metode%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0ATanggal%20Pemesenan%20%3A%20$date%0APemesanan%20melalui%20www.RiverPrawn.com%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0ATerima%20Kasih";
					redirect($url_order);
				} else {

					$url_order = "https://api.whatsapp.com/send?phone=$no_telp_wa&text=Halo%20Kak%2C%0ASaya%20Telah%20Melakukan%20Pembayaran%20Dengan%20Data%20Berikut%3A%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0ANama%20Lengkap%20%3A%20$nama_lengkap%0ANomor%20Telepon%20%3A%20$nomor_telepon%0AAlamat%20%3A%20$alamat%0ATipe%20Bangunan%20%3A%20$types%0ABlok%20Bangunan%20%3A%20$bl%0AMetode%20Pembayaran%20%3A%20$metode%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0ATanggal%20Pemesenan%20%3A%20$date%0APemesanan%20melalui%20www.RiverPrawn.com%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0ATerima%20Kasih";
					redirect($url_order);
				}
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Terjadi Kesalahan</div>');
				redirect('Perumahan');
			}
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">'
				. $this->upload->display_errors() .
				'</div>');
			redirect('Perumahan');
		}
	}
}
