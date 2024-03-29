<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_tamu');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['kategori'] = $this->M_tamu->query("SELECT * FROM kategori")->result_array();
		$data['tamu'] = $this->M_tamu->query("SELECT id_tamu, nama, no_hp, alamat, keperluan, date_format(tanggal, '%d/%m/%Y') tanggal, date_format(tanggal, '%H:%i:%s') jam FROM `tamu` WHERE date(tanggal) = CURDATE() ORDER BY `tanggal` ASC")->result();

		$this->load->view('landing/header');
		$this->load->view('landing/index', $data);
		$this->load->view('landing/footer');
	}

	public function tracer()
	{

		$this->load->view('landing/header');
		$this->load->view('landing/tracer');
		$this->load->view('landing/footer');
	}

	public function tamu_proses()
	{

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('no_hp', 'No HP', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat/Institusi', 'required');
		$this->form_validation->set_rules('id_kategori', 'Kategori', 'required');
		$this->form_validation->set_rules('keperluan', 'Keperluan', 'required');

		$check = $this->input->post('id_kategori');

		if ($this->form_validation->run() == TRUE) {

			if ($this->M_tamu->m_register()) {

				if ($check == 6) {

					$this->session->set_flashdata('pesan_tamu', 'Buku tamu berhasil diinput!');
					redirect('/Welcome/tracer', 'refresh');
				} else {

					$this->session->set_flashdata('pesan_tamu', 'Buku tamu berhasil diinput!');
					redirect('/#tamu', 'refresh');
				}
			} else {

				$this->session->set_flashdata('pesan_tamu', 'Buku tamu gagal diinput!');
				redirect('/#tamu', 'refresh');
			}
		} else {

			$this->load->view('landing/index');
		}
	}
}
