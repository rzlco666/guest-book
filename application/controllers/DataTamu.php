<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataTamu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_tamu');
    }

    public function index()
    {

        if ($this->session->userdata('is_login') == FALSE) {
            redirect('/petugas/login/', 'refresh');
        }

        $data['title'] = 'Data Tamu';
        $data['tamu'] = $this->m_tamu->query("SELECT id_tamu, nama, no_hp, alamat, keperluan, date_format(tanggal, '%d/%m/%Y') tanggal, date_format(tanggal, '%H:%i:%s') jam FROM `tamu` ORDER BY `tanggal` DESC")->result();

        $this->load->view('petugas/layout/header', $data);
        $this->load->view('petugas/layout/sidebar');
        $this->load->view('petugas/datatamu/index', $data);
        $this->load->view('petugas/layout/footer');
        $this->load->view('petugas/datatamu/script');
    }

    public function hapusdata($id_tamu = null)
    {
        if (!isset($id_tamu)) show_404();

        if ($this->m_tamu->hapus($id_tamu)) {
            redirect('/datatamu', 'refresh');
        }
    }
}
