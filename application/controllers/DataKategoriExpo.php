<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataKategoriExpo extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kategoriexpo');
    }

    public function index()
    {

        if ($this->session->userdata('is_login') == FALSE) {
            redirect('/Petugas/login/', 'refresh');
        }

        $data['title'] = 'Data Kategori Expo';

        $this->load->view('petugas/layout/header', $data);
        $this->load->view('petugas/layout/sidebar');
        $this->load->view('petugas/datakategoriexpo/index', $data);
        $this->load->view('petugas/layout/footer');
        $this->load->view('petugas/datakategoriexpo/script');
    }

    public function get_kategori()
    {
        if (!$this->input->is_ajax_request()) {
            show_404(); // Jika tidak akses melalui ajax request
        } else {
            $column_order   = ['', 'id_kategori']; // Order berdasarkan columns pada table siswa
            $column_search  = ['nama', 'username', 'email']; // Pencarian berdasarkan columns nama siswa
            $order          = ['id_kategori' => 'ASC']; // Sorting berdasarkan nama siswa menggunakan ASC
            $list           = $this->M_kategoriexpo->get_datatables('kategori_expo', $column_order, $column_search, $order); // Memanggil siswa model untuk menampilkannya ke datatables
            $data           = [];
            $no             = $_POST['start'];
            foreach ($list as $key => $lists) {
                $no++;
                $data[$key][]  = $no;
                $data[$key][]  = $lists->nama;
                $data[$key][]  = '<a href="javascript:;" class="btn btn-warning btn-sm" onclick="edit(' . $lists->id_kategori . ')">Edit</a> <a href="javascript:;" class="btn btn-danger btn-sm" onclick="hapus(' . $lists->id_kategori . ')">Hapus</a>';
            }

            // Output menggunakan JSON
            $output = [
                "draw"              => $_POST['draw'],
                "recordsTotal"      => $this->M_kategoriexpo->count_all('kategori_expo'),
                "recordsFiltered"   => $this->M_kategoriexpo->count_filtered('kategori_expo', $column_order, $column_search, $order),
                "data"              => $data,
            ];

            $this->output->set_content_type('application/json')->set_output(json_encode($output));
        }
    }

    public function save_kategori()
    {
        if (!$this->input->is_ajax_request()) {
            show_404();
        } else {
            $simpan = $this->M_kategoriexpo->save_kategori();
            if ($simpan) {
                $this->outputs['status']    = true;
                $this->outputs['message']   = "Data berhasil disimpan !";
            }

            $this->output->set_content_type('application/json')->set_output(json_encode($this->outputs));
        }
    }

    public function edit_kategori()
    {
        if (!$this->input->is_ajax_request()) {
            show_404();
        } else {
            $kategori = $this->M_kategoriexpo->get_kategori_by_id();
            if ($kategori->num_rows() > 0) {
                $this->outputs['data'] = $kategori->row();
                $this->outputs['status']  = true;
            }

            $this->output->set_content_type('application/json')->set_output(json_encode($this->outputs));
        }
    }

    public function update_kategori()
    {
        if (!$this->input->is_ajax_request()) {
            show_404();
        } else {
            $update = $this->M_kategoriexpo->update_kategori();
            if ($update) {
                $this->outputs['status']  = true;
                $this->outputs['message'] = "Data berhasil diupdate !";
            }

            $this->output->set_content_type('application/json')->set_output(json_encode($this->outputs));
        }
    }

    public function delete_kategori()
    {
        if (!$this->input->is_ajax_request()) {
            show_404();
        } else {
            $delete = $this->M_kategoriexpo->delete_kategori();
            if ($delete) {
                $this->outputs['status']  = true;
                $this->outputs['message'] = "Data berhasil dihapus !";
            }

            $this->output->set_content_type('application/json')->set_output(json_encode($this->outputs));
        }
    }
}

/* End of file Petugas.php */
/* Location: ./application/controllers/Petugas.php */