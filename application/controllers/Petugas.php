<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_petugas');
    }

    public function index()
    {

        if ($this->session->userdata('is_login') == FALSE) {
            redirect('/Petugas/login/', 'refresh');
        }

        $data['title'] = 'Dashboard';

        $data['grafik_penjualan'] = $this->M_petugas->query("SELECT COUNT(id_tamu) as total, DATE_FORMAT(tanggal,'%M-%y') as bulan FROM `tamu` GROUP BY month(tanggal) ORDER BY tanggal ASC")->result();

        $this->load->view('petugas/layout/header', $data);
        $this->load->view('petugas/layout/sidebar');
        $this->load->view('petugas/index', $data);
        $this->load->view('petugas/layout/footer');
        $this->load->view('petugas/script', $data);
    }

    public function login()
    {

        if ($this->session->userdata('is_login') == TRUE) {
            redirect('Petugas/index', 'refresh');
        }
        
        $data['title'] = 'Login';

        $this->load->view('petugas/login/index', $data);
    }

    public function register()
    {

        if ($this->session->userdata('is_login') == TRUE) {
            redirect('Petugas/index', 'refresh');
        }

        $data['title'] = 'Register';

        $this->load->view('petugas/register/index', $data);
    }

    public function register_proses()
    {

        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[22]');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|min_length[3]|max_length[45]|is_unique[petugas.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[12]');

        if ($this->form_validation->run() == TRUE) {

            if ($this->M_petugas->m_register()) {

                $this->session->set_flashdata('pesan', 'Register berhasil, silahkan  Sign In.');
                redirect('/Petugas/login/', 'refresh');
            } else {

                $this->session->set_flashdata('pesan', 'Register user gagal!');
                redirect('/Petugas/register/', 'refresh');
            }
        } else {

            $this->load->view('petugas/register/index');
        }
    }

    public function login_proses()
    {

        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|min_length[3]|max_length[45]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[12]');

        if ($this->form_validation->run() == TRUE) {

            if ($this->M_petugas->m_cek_mail()->num_rows() == 1) {

                $db = $this->M_petugas->m_cek_mail()->row();
                if (hash_verified($this->input->post('password'), $db->password)) {

                    $data_login = array(
                        'is_login' => TRUE,
                        'id_petugas' => $db->id_petugas,
                        'email'  => $db->email,
                        'username'   => $db->username,
                        'nama'   => $db->nama,
                    );

                    $this->session->set_userdata($data_login);
                    redirect('Petugas/index', 'refresh');
                } else {

                    $this->session->set_flashdata('pesan', 'Login gagal: password salah!');
                    redirect('Petugas/login/index', 'refresh');
                }
            } else { // jika email tidak terdaftar!

                $this->session->set_flashdata('pesan', 'Login gagal: email salah!');
                redirect('Petugas/login/index', 'refresh');
            }
        } else {

            $this->load->view('petugas/login/index');
        }
    }

    public function logout()
    {

        $this->session->unset_userdata('is_login');
        $this->session->unset_userdata('id_petugas');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('nama');

        session_destroy();
        //$this->session->set_flashdata('pesan', 'Sign Out Berhasil!');
        redirect('Petugas/login/index', 'refresh');
    }
}

/* End of file Petugas.php */
/* Location: ./application/controllers/Petugas.php */