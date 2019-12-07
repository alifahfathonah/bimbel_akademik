<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjadwalan_model extends CI_Model
{
    public function get($tabel, $param = null, $key = null, $param2 = null, $key2 = null)
    {
        $this->db->select('*');
        if ($param != null) {
            $this->db->where($param, $key);
        }
        if ($param2 != null) {
            $this->db->where($param2, $key2);
        }
        return $this->db->get($tabel);
    }

    public function join()
    {
        $qr = "SELECT a.id, a.hari, b.nama, c.nama_rombel, d.nama_ruang FROM tb_jadwal a INNER JOIN tb_users b ON a.id_user=b.id INNER JOIN tb_rombel c ON a.id_rombel=c.id INNER JOIN tb_ruang d ON a.id_ruang=d.id";
        return $this->db->query($qr)->result_array();
    }

    public function join_where($id)
    {
        $qr = "SELECT a.id, a.hari, b.nama, c.nama_rombel, d.nama_ruang, f.nama_mapel FROM tb_jadwal a INNER JOIN tb_users b ON a.id_user=b.id INNER JOIN tb_rombel c ON a.id_rombel=c.id INNER JOIN tb_ruang d ON a.id_ruang=d.id LEFT JOIN tb_detail_jadwal e ON a.id=e.id_jadwal LEFT JOIN tb_mapel f ON e.id_mapel=f.id WHERE a.id = $id";
        return $this->db->query($qr);
    }

    public function join_tentor($id, $hari)
    {
        $qr = "SELECT f.nama_rombel, b.hari, e.nama_ruang, g.nama_mapel FROM tb_jadwal b INNER JOIN tb_detail_jadwal c ON b.id=c.id_jadwal INNER JOIN tb_ruang e ON b.id_ruang=e.id INNER JOIN tb_rombel f ON b.id_rombel=f.id INNER JOIN tb_mapel g ON c.id_mapel=g.id WHERE b.id_user = $id AND b.hari= '$hari'";
        return $this->db->query($qr)->result_array();
    }

    public function join_siswa($id, $hari)
    {
        $qr = "SELECT f.nama_rombel, b.hari, e.nama_ruang, g.nama_mapel FROM tb_jadwal b INNER JOIN tb_detail_jadwal c ON b.id=c.id_jadwal INNER JOIN tb_ruang e ON b.id_ruang=e.id INNER JOIN tb_rombel f ON b.id_rombel=f.id INNER JOIN tb_mapel g ON c.id_mapel=g.id WHERE f.id = $id AND b.hari= '$hari'";
        return $this->db->query($qr)->result_array();
    }

    public function load($post)
    {
        $data = [
            'id_user' => $post['tentor'],
            'id_rombel' => $post['rombel'],
            'id_ruang' => $post['ruang'],
            'hari' => $post['hari'],
        ];
        return $this->db->insert('tb_jadwal', $data);
    }

    public function add($post)
    {
        $jadwals = $post['jadwal'];
        $jumlah_dipilih = count($jadwals);

        for ($x = 0; $x < $jumlah_dipilih; $x++) {
            $this->db->insert('tb_detail_jadwal', [
                'id_jadwal' => $post['id_jadwal'],
                'id_mapel' => $jadwals[$x]
            ]);
        }
    }
}
