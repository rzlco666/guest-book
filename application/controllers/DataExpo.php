<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataExpo extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_tamu');
    }

    public function index()
    {

        if ($this->session->userdata('is_login') == FALSE) {
            redirect('/Petugas/login/', 'refresh');
        }

        $data['title'] = 'Data EXPO';
        $data['tamu'] = $this->M_tamu->query("SELECT 
            t.id_expo, t.nama, t.no_hp, t.sekolah,
            k.nama kategori,
            date_format(t.tanggal, '%d/%m/%Y') tanggal, 
            date_format(t.tanggal, '%H:%i:%s') jam 
        FROM `expo` t
        JOIN `kategori_expo` k ON k.id_kategori = t.id_kategori 
        ORDER BY t.tanggal DESC")->result();

        $this->load->view('petugas/layout/header', $data);
        $this->load->view('petugas/layout/sidebar');
        $this->load->view('petugas/dataexpo/index', $data);
        $this->load->view('petugas/layout/footer');
        $this->load->view('petugas/dataexpo/script');
    }

    public function hapusdata($id_expo = null)
    {
        if (!isset($id_expo)) show_404();

        if ($this->M_tamu->hapusexpo($id_expo)) {
            redirect('/DataExpo', 'refresh');
        }
    }
}
