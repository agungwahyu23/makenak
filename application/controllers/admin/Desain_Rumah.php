<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Desain_Rumah extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Models');
		belumlogin();
	}
	public function index()
	{
		$data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>
		$this->session->userdata('Id_User')])->row_array();
		$data['data'] = $this->db->query("SELECT * FROM desain_rumah WHERE status = '1' ORDER BY create_at DESC")->result_array();
		$this->load->view('admin/desain_rumah/data', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('nama', 'Nama Desain', 'required');
		if ($this->form_validation->run() == false) {

			$data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>
			$this->session->userdata('Id_User')])->row_array();
			$data['kategori'] = $this->db->get_where('kategori_desain_rumah', array('status' => '1'))->result_array();
			$data['kd'] = $this->Models->randomkode(32);
			$this->load->view('admin/desain_rumah/add', $data);
		} else {
			$kd = $this->input->post('id_desain_rumah');
			$config['allowed_types'] = 'jpg|png|gif|jpeg';
			$config['max_size'] = '7748';
			$config['upload_path'] = './uploads/Desain_Rumah';
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('banner')) {
				$foto_namaBaru = $this->upload->data('file_name');
				$insert = array(
					'id_desain_rumah' => $kd,
					'id_kategori_rumah' => $this->input->post('kategori'),
					'nama' => $this->input->post('nama'),
					'deskripsi' =>  $this->input->post('deskripsi'),
					'foto' => $foto_namaBaru,
					'create_at' => date('Y-m-d H:i:s'),
					'status' => 1,
				);
				if ($this->Models->insert('desain_rumah', $insert)) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					  Data Desain Rumah Berhasil Ditambahkan
					</div>');
					redirect('admin/Desain_Rumah');
				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Gagal Karena Tanpa Gambar</div>');
					redirect('admin/Desain_Rumah');
				}
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">'
					. $this->upload->display_errors() .
					'</div>');
				redirect('admin/Desain_Rumah');
			}
		}
	}

	public function edit($id)
	{
		$this->form_validation->set_rules('nama', 'Nama Desain', 'required');
		if ($this->form_validation->run() == false) {
			$data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>
			$this->session->userdata('Id_User')])->row_array();
			$data['data'] = $this->db->query("SELECT * FROM desain_rumah, kategori_desain_rumah WHERE desain_rumah.id_kategori_rumah = kategori_desain_rumah.id_kategori_rumah AND desain_rumah.id_desain_rumah = '$id' AND desain_rumah.status = '1'")->result_array();
			$data['kategori'] = $this->db->get_where('kategori_desain_rumah', array('status' => '1'))->result_array();
			$this->load->view('admin/desain_rumah/edit', $data);
		} else {
			$update = $this->Models->update(array(
				'nama' => $this->input->post('nama'),
				'id_kategori_rumah' => $this->input->post('kategori'),
				'deskripsi' =>  $this->input->post('deskripsi'),
			), "id_desain_rumah", "desain_rumah", $id);

			if ($update) {
				$ubahfoto = $_FILES['banner']['name'];

				if ($ubahfoto) {
					$config['allowed_types'] = 'jpg|jpeg|png|gif';
					$config['max_size'] = '2048';
					$config['upload_path'] = './uploads/Desain_Rumah/';

					$this->load->library('upload', $config);

					if ($this->upload->do_upload('banner')) {
						$user = $this->db->get_where('desain_rumah', ['id_desain_rumah' => $id])->row_array();
						$fotolama = $user['foto'];
						if ($fotolama) {
							unlink(FCPATH . '/uploads/Desain_Rumah/' . $fotolama);
						}
						$fotobaru = $this->upload->data('file_name');
						$this->db->set('foto', $fotobaru);
						$this->db->where('id_desain_rumah', $id);
						$this->db->update('desain_rumah');
						$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
						Berhasil Mengubah Data!
						</div>');
						redirect('admin/Desain_Rumah');
					} else {
						$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">'
							. $this->upload->display_errors() .
							'</div>');
						// redirect('user/editprofile');
						redirect('admin/Desain_Rumah');
					}
				} else {

					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					Berhasil Mengubah Data!
					</div>');
					redirect('admin/Desain_Rumah');
				}
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
				Gagal Mengubah Data!
				</div>');
				redirect('admin/Desain_Rumah');
			}
		}
	}
	public function detail($id)
	{
		$data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>
		$this->session->userdata('Id_User')])->row_array();
		$data['data'] = $this->db->query("SELECT * FROM desain_rumah, kategori_desain_rumah WHERE desain_rumah.id_kategori_rumah = kategori_desain_rumah.id_kategori_rumah AND desain_rumah.id_desain_rumah = '$id' AND desain_rumah.status = '1'")->result_array();
		$this->load->view('admin/desain_rumah/detail_desain_rumah', $data);
	}
	public function hapus($id)
	{
		$data = [
			'status' => '2',
		];
		$update = $this->Models->update($data, "id_desain_rumah", "desain_rumah", $id);
		// echo $data;
		if ($update) {

			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Desain Rumah Berhasil Di Hapus
    </div>');
			redirect('admin/Desain_Rumah');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Desain Rumah Gagal Di Hapus
     </div>');
			redirect('admin/Desain_Rumah');
		}
	}
}
