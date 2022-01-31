<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_expo extends CI_Model
{

    public function m_register()
    {

        $data = array(
            'nama' => $this->input->post('nama'),
            'no_hp' => $this->input->post('no_hp'),
            'sekolah' => $this->input->post('sekolah'),
            'id_kategori' => $this->input->post('id_kategori'),
        );

        return $this->db->insert('expo', $data);
    }

}

/* End of file M_petugas.php */
/* Location: ./application/models/M_petugas.php */