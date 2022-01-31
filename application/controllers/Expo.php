<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Expo extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_tamu');
        $this->load->model('M_expo');
    }

    public function index()
    {
        $data['kategori'] = $this->M_tamu->query("SELECT * FROM kategori_expo")->result_array();
        $data['tamu'] = $this->M_tamu->query("SELECT id_expo, nama, no_hp, sekolah, date_format(tanggal, '%d/%m/%Y') tanggal, date_format(tanggal, '%H:%i:%s') jam FROM `expo` WHERE date(tanggal) = CURDATE() ORDER BY `tanggal` ASC")->result();

        $this->load->view('landing/header');
        $this->load->view('expo/index', $data);
        $this->load->view('landing/footer');
    }

    public function expo_proses()
    {

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required');
        $this->form_validation->set_rules('sekolah', 'Sekolah', 'required');
        $this->form_validation->set_rules('id_kategori', 'Kategori Expo', 'required');

        if ($this->form_validation->run() == TRUE) {

            if ($this->M_expo->m_register()) {

                $this->session->set_flashdata('pesan_tamu', 'Berhasil diinput!');
                redirect('expo/#tamu', 'refresh');
            } else {

                $this->session->set_flashdata('pesan_tamu', 'Gagal diinput!');
                redirect('expo/#tamu', 'refresh');
            }
        } else {

            $this->load->view('expo/index');
        }
    }

}
