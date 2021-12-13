<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_petugas extends CI_Model
{

    public function m_register()
    {

        $data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'nama' => $this->input->post('nama'),
            'password' => get_hash($this->input->post('password'))
        );

        return $this->db->insert('petugas', $data);
    }

    public function m_cek_mail()
    {

        return $this->db->get_where('petugas', array('email' => $this->input->post('email')));
    }

}

/* End of file M_petugas.php */
/* Location: ./application/models/M_petugas.php */