<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_tamu extends CI_Model
{

    private $table = 'tamu';

    public function m_register()
    {

        $data = array(
            'nama' => $this->input->post('nama'),
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat'),
            'keperluan' => $this->input->post('keperluan'),
        );

        return $this->db->insert('tamu', $data);
    }

    public function getAll(){
        $this->db->order_by('tanggal','desc');        
        return $this->db->get($this->table)->result();
    }

    public function query($query)
    {
        return $this->db->query($query);
    }

    public function hapus($id_tamu){
        return $this->db->delete($this->table, array('id_tamu' => $id_tamu));
    }

    /* public function save_petugas()
    {
        $data = [
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'nama' => $this->input->post('nama'),
            'password' => get_hash($this->input->post('password'))
        ];

        $this->db->insert($this->table, $data);
        return $this->db->affected_rows();
    }

    public function update_petugas()
    {
        $data = [
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'nama' => $this->input->post('nama'),
            'password' => get_hash($this->input->post('password'))
        ];

        return $this->db->update($this->table, $data, [
            'id_petugas' => $this->input->post('id_petugas')
        ]);
    }

    public function delete_petugas()
    {
        return $this->db->delete($this->table, [
            'id_petugas' => $this->input->post('id_petugas')
        ]);
    }

    public function get_petugas_by_id()
    {
        $data = [
            'id_petugas' => $this->input->get('id_petugas')
        ];

        return $this->db->get_where($this->table, $data);
    }

    private function _get_datatables_query($table, $column_order, $column_search, $order)
    {
        $this->db->from($table);

        $i = 0;

        foreach ($column_search as $item) {
            if ($_POST['search']['value']) {

                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {


            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($order)) {
            $order = $order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables($table, $column_order, $column_search, $order, $data = null)
    {
        $this->_get_datatables_query($table, $column_order, $column_search, $order);
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        if (!empty($data)) {
            $this->db->where($data);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered($table, $column_order, $column_search, $order, $data = null)
    {
        $this->_get_datatables_query($table, $column_order, $column_search, $order);
        if (!empty($data)) {
            $this->db->where($data);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all($table, $data = null)
    {
        if (!empty($data)) {
            $this->db->where($data);
        }

        $this->db->from($table);
        return $this->db->count_all_results();
    } */
}

/* End of file M_petugas.php */
/* Location: ./application/models/M_petugas.php */