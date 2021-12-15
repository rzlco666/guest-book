<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataTamu extends CI_Controller
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

        $data['title'] = 'Data Tamu';
        $data['tamu'] = $this->M_tamu->query("SELECT 
            t.id_tamu, t.nama, t.no_hp, t.alamat,
            k.nama kategori,
            t.keperluan, 
            date_format(t.tanggal, '%d/%m/%Y') tanggal, 
            date_format(t.tanggal, '%H:%i:%s') jam 
        FROM `tamu` t
        JOIN `kategori` k ON k.id_kategori = t.id_kategori 
        ORDER BY t.tanggal DESC")->result();

        $this->load->view('petugas/layout/header', $data);
        $this->load->view('petugas/layout/sidebar');
        $this->load->view('petugas/datatamu/index', $data);
        $this->load->view('petugas/layout/footer');
        $this->load->view('petugas/datatamu/script');
    }

    public function hapusdata($id_tamu = null)
    {
        if (!isset($id_tamu)) show_404();

        if ($this->M_tamu->hapus($id_tamu)) {
            redirect('/DataTamu', 'refresh');
        }
    }
}
