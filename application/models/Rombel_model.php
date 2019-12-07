<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rombel_model extends CI_Model
{
    public function get_where($param = null, $value = null)
    {
        $this->db->select('*');
        if ($param != null) {
            $this->db->where($param, $value);
        }
        return $this->db->get('tb_rombel');
    }

    public function add($post)
    {
        $data = [
            'nama_rombel' => $post['nama'],
            'kelas' => $post['kelas'],
            'kuota' => $post['kuota'],
        ];
        $this->db->insert('tb_rombel', $data);
    }

    public function edit($post)
    {
        $param = [
            'nama_rombel' => $post['nama'],
            'kelas' => $post['kelas'],
            'kuota' => $post['kuota'],
        ];

        $this->db->set($param);
        $this->db->where('id', $post['id']);
        $this->db->update('tb_rombel');
    }
}
