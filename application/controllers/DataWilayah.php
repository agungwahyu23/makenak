<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataWilayah extends CI_Controller
{
    public function index()
    {
        $id_prov = $this->input->post('id_prov');
        $data = $this->db->get_where('regencies', ['province_id' => $id_prov])->result();
        echo json_encode($data);
    }

    public function Ongkir()
    {
        $user = $this->session->userdata('idCustomer');
        $idKab = $this->input->post('idKab');
        $data['wilayah'] = $this->db->get_where('regencies', ['id' => $idKab])->result();
        $data['transaksi'] = $this->db->get_where('transaksi', ['idUser' => $user, 'status' => 0])->result();
        echo json_encode($data);
    }
}
