<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Interior extends CI_Controller
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
		$data['data'] = $this->db->query("SELECT * FROM desain_interior WHERE status = '1' ORDER BY create_at DESC")->result_array();
		$this->load->view('admin/interior/data', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('nama', 'Nama Desain', 'required');
		if ($this->form_validation->run() == false) {

			$data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>
			$this->session->userdata('Id_User')])->row_array();
			$data['kategori'] = $this->db->get_where('kategori_desain_interior', array('status' => '1'))->result_array();
			$data['kd'] = $this->Models->randomkode(32);
			$this->load->view('admin/interior/add', $data);
		} else {
			$kd = $this->input->post('id_desain_interior');
			$config['allowed_types'] = 'jpg|png|gif|jpeg';
			$config['max_size'] = '7748';
			$config['upload_path'] = './uploads/Desain_Interior';
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('banner')) {
				$foto_namaBaru = $this->upload->data('file_name');
				$insert = array(
					'id_desain_interior' => $kd,
					'id_kategori_interior' => $this->input->post('kategori'),
					'nama' => $this->input->post('nama'),
					'Deskripsi' =>  $this->input->post('deskripsi'),
					'foto' => $foto_namaBaru,
					'create_at' => date('Y-m-d H:i:s'),
					'status' => 1,
				);
				if ($this->Models->insert('desain_interior', $insert)) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					  Data Desain Interior Berhasil Ditambahkan
					</div>');
					redirect('admin/Interior');
				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Gagal Karena Tanpa Gambar</div>');
					redirect('admin/Interior');
				}
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">'
					. $this->upload->display_errors() .
					'</div>');
				redirect('admin/Interior');
			}
		}
	}

	public function edit($id)
	{
		$this->form_validation->set_rules('nama', 'Nama Desain', 'required');
		if ($this->form_validation->run() == false) {
			$data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>
			$this->session->userdata('Id_User')])->row_array();
			$data['data'] = $this->db->query("SELECT * FROM desain_interior, kategori_desain_interior WHERE desain_interior.id_kategori_interior = kategori_desain_interior.id_kategori_interior AND desain_interior.id_desain_interior = '$id' AND desain_interior.status = '1'")->result_array();
			$data['kategori'] = $this->db->get_where('kategori_desain_interior', array('status' => '1'))->result_array();
			$this->load->view('admin/interior/edit', $data);
		} else {
			$update = $this->Models->update(array(
				'nama' => $this->input->post('nama'),
				'id_kategori_interior' => $this->input->post('kategori'),
				'deskripsi' =>  $this->input->post('deskripsi'),
			), "id_desain_interior", "desain_interior", $id);

			if ($update) {
				$ubahfoto = $_FILES['banner']['name'];

				if ($ubahfoto) {
					$config['allowed_types'] = 'jpg|jpeg|png|gif';
					$config['max_size'] = '2048';
					$config['upload_path'] = './uploads/Desain_Interior/';

					$this->load->library('upload', $config);

					if ($this->upload->do_upload('banner')) {
						$user = $this->db->get_where('desain_interior', ['id_desain_interior' => $id])->row_array();
						$fotolama = $user['foto'];
						if ($fotolama) {
							unlink(FCPATH . '/uploads/Desain_Interior/' . $fotolama);
						}
						$fotobaru = $this->upload->data('file_name');
						$this->db->set('foto', $fotobaru);
						$this->db->where('id_desain_interior', $id);
						$this->db->update('desain_interior');
						$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
						Berhasil Mengubah Data!
						</div>');
						redirect('admin/Interior');
					} else {
						$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">'
							. $this->upload->display_errors() .
							'</div>');
						// redirect('user/editprofile');
						redirect('admin/Interior');
					}
				} else {

					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					Berhasil Mengubah Data!
					</div>');
					redirect('admin/Interior');
				}
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
				Gagal Mengubah Data!
				</div>');
				redirect('admin/Interior');
			}
		}
	}
	public function detail($id)
	{
		$data['Pengguna'] = $this->db->get_where('pengguna', ['Id_User' =>
		$this->session->userdata('Id_User')])->row_array();
		$data['data'] = $this->db->query("SELECT * FROM desain_interior, kategori_desain_interior WHERE desain_interior.id_kategori_interior = kategori_desain_interior.id_kategori_interior AND desain_interior.id_desain_interior = '$id' AND desain_interior.status = '1'")->result_array();
		$this->load->view('admin/interior/detail_interior', $data);
	}
	public function hapus($id)
	{
		$data = [
			'status' => '2',
		];
		$update = $this->Models->update($data, "id_desain_interior", "desain_interior", $id);
		// echo $data;
		if ($update) {

			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Desain Interior Berhasil Di Hapus
    </div>');
			redirect('admin/Interior');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Desain Interior Gagal Di Hapus
     </div>');
			redirect('admin/Interior');
		}
	}
}
