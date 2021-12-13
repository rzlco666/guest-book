<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataPetugas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_petugas');
    }

    public function index()
    {

        if ($this->session->userdata('is_login') == FALSE) {
            redirect('/petugas/login/', 'refresh');
        }

        $data['title'] = 'Data Petugas';

        $this->load->view('petugas/layout/header', $data);
        $this->load->view('petugas/layout/sidebar');
        $this->load->view('petugas/datapetugas/index', $data);
        $this->load->view('petugas/layout/footer');
        $this->load->view('petugas/datapetugas/script');
    }

    public function get_petugas()
    {
        if (!$this->input->is_ajax_request()) {
            show_404(); // Jika tidak akses melalui ajax request
        } else {
            $column_order   = ['', 'id_petugas']; // Order berdasarkan columns pada table siswa
            $column_search  = ['nama', 'username', 'email']; // Pencarian berdasarkan columns nama siswa
            $order          = ['id_petugas' => 'ASC']; // Sorting berdasarkan nama siswa menggunakan ASC
            $list           = $this->m_petugas->get_datatables('petugas', $column_order, $column_search, $order); // Memanggil siswa model untuk menampilkannya ke datatables
            $data           = [];
            $no             = $_POST['start'];
            foreach ($list as $key => $lists) {
                $no++;
                $data[$key][]  = $no;
                $data[$key][]  = $lists->nama;
                $data[$key][]  = $lists->username;
                $data[$key][]  = $lists->email;
                $data[$key][]  = '<a href="javascript:;" class="btn btn-warning btn-sm" onclick="edit(' . $lists->id_petugas . ')">Edit</a> <a href="javascript:;" class="btn btn-danger btn-sm" onclick="hapus(' . $lists->id_petugas . ')">Hapus</a>';
            }

            // Output menggunakan JSON
            $output = [
                "draw"              => $_POST['draw'],
                "recordsTotal"      => $this->m_petugas->count_all('petugas'),
                "recordsFiltered"   => $this->m_petugas->count_filtered('petugas', $column_order, $column_search, $order),
                "data"              => $data,
            ];

            echo json_encode($output);
        }
    }

    public function save_petugas()
    {
        if (!$this->input->is_ajax_request()) {
            show_404();
        } else {
            $simpan = $this->m_petugas->save_petugas();
            if ($simpan) {
                $this->outputs['status']    = true;
                $this->outputs['message']   = "Data berhasil disimpan !";
            }

            echo json_encode($this->outputs);
        }
    }

    public function edit_petugas()
    {
        if (!$this->input->is_ajax_request()) {
            show_404();
        } else {
            $petugas = $this->m_petugas->get_petugas_by_id();
            if ($petugas->num_rows() > 0) {
                $this->outputs['data'] = $petugas->row();
                $this->outputs['status']  = true;
            }

            echo json_encode($this->outputs);
        }
    }

    public function update_petugas()
    {
        if (!$this->input->is_ajax_request()) {
            show_404();
        } else {
            $update = $this->m_petugas->update_petugas();
            if ($update) {
                $this->outputs['status']  = true;
                $this->outputs['message'] = "Data berhasil diupdate !";
            }

            echo json_encode($this->outputs);
        }
    }

    public function delete_petugas()
    {
        if (!$this->input->is_ajax_request()) {
            show_404();
        } else {
            $delete = $this->m_petugas->delete_petugas();
            if ($delete) {
                $this->outputs['status']  = true;
                $this->outputs['message'] = "Data berhasil dihapus !";
            }

            echo json_encode($this->outputs);
        }
    }
}

/* End of file Petugas.php */
/* Location: ./application/controllers/Petugas.php */