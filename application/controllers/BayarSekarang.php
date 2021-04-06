<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BayarSekarang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Models');
    }

    public function index(){
        $data['deskripsi'] = $this->db->query("SELECT * FROM profile WHERE Id_Profile = '1'")->result_array();
        $this->load->view('user/BayarSekarang', $data);
    }
}
