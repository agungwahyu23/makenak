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
        $idProv = $this->input->post('idProv');
        $data['wilayah'] = $this->db->get_where('regencies', ['id' => $idKab])->result();
        $data['ongkir'] = $this->db->get_where('dataongkir', ['provinsi' => $idProv])->result();
        $data['ongkirJember'] = $this->db->get_where('dataongkir', ['id' => 9])->result();
        $data['transaksi'] = $this->db->get_where('transaksi', ['idUser' => $user, 'status' => 0])->result();

        // $idTransaksi = $data['transaksi'][0]['idTransaksi'];

        $data['produk'] = $this->db->join('produk', 'produk.id = detailtransaksi.idProduk')->get_where('detailtransaksi', ['idTransaksi' => $data['transaksi'][0]->idTransaksi])->result();
        echo json_encode($data);
    }
}