<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mapel_model extends CI_Model
{
    public function get_where($param = null, $value = null)
    {
        $this->db->select('*');
        if ($param != null) {
            $this->db->where($param, $value);
        }
        return $this->db->get('tb_mapel');
    }

    public function add($post)
    {
        $data = [
            'kode_mapel' => $post['kode'],
            'nama_mapel' => $post['nama'],
        ];
        $this->db->insert('tb_mapel', $data);
    }

    public function edit($post)
    {
        $param = [
            'kode_mapel' => $post['kode'],
            'nama_mapel' => $post['nama'],
        ];

        $this->db->set($param);
        $this->db->where('id', $post['id']);
        $this->db->update('tb_mapel');
    }
}
