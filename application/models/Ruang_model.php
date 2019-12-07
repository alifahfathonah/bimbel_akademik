<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ruang_model extends CI_Model
{
    public function get_where($param = null, $value = null)
    {
        $this->db->select('*');
        if ($param != null) {
            $this->db->where($param, $value);
        }
        return $this->db->get('tb_ruang');
    }

    public function add($post)
    {
        $data = [
            'nama_ruang' => $post['nama'],
        ];
        $this->db->insert('tb_ruang', $data);
    }

    public function edit($post)
    {
        $param = [
            'nama_ruang' => $post['nama'],
        ];

        $this->db->set($param);
        $this->db->where('id', $post['id']);
        $this->db->update('tb_ruang');
    }
}
