<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_model extends CI_Model
{
    public function join($id)
    {
        $query = "SELECT b.id, b.nama_rombel FROM tb_jadwal a INNER JOIN tb_rombel b ON a.id_rombel=b.id WHERE a.id_user=$id GROUP BY b.nama_rombel";
        return $this->db->query($query)->result_array();
    }

    public function load($id)
    {
        $bln = date('m');
        if ($bln == 1) {
            $blnIni = 'Januari';
        } else if ($bln == 2) {
            $blnIni = 'Februari';
        } else if ($bln == 3) {
            $blnIni = 'Maret';
        } else if ($bln == 4) {
            $blnIni = 'April';
        } else if ($bln == 5) {
            $blnIni = 'Mei';
        } else if ($bln == 6) {
            $blnIni = 'Juni';
        } else if ($bln == 7) {
            $blnIni = 'Juli';
        } else if ($bln == 8) {
            $blnIni = 'Agustus';
        } else if ($bln == 9) {
            $blnIni = 'September';
        } else if ($bln == 10) {
            $blnIni = 'Oktober';
        } else if ($bln == 11) {
            $blnIni = 'November';
        } else if ($bln == 12) {
            $blnIni = 'Desember';
        }

        $query = "SELECT a.id_bayar, c.nama, a.bulan FROM tb_pembayaran a INNER JOIN tb_pendaftaran b ON a.id_daftar=b.id INNER JOIN tb_users c ON b.id_user=c.id WHERE b.id_rombel=$id AND a.bulan LIKE '%$blnIni%'";
        return $this->db->query($query);
    }

    public function input($post)
    {
        $data2 = [
            'nilai' => $post['nilai'],
        ];

        $this->db->set($data2);
        $this->db->where('id_bayar', $post['id_bayar'],);
        $this->db->update('tb_pembayaran');
    }

    public function add($id_bayar, $nilai)
    {
        $this->db->where('id_bayar', $id_bayar);
        $this->db->update('tb_pembayaran', array('nilai' => $nilai));
    }

    public function get($id)
    {
        $query = "SELECT a.id_rombel, b.nama_rombel FROM tb_jadwal a INNER JOIN tb_rombel b ON a.id_rombel=b.id WHERE id_user=$id";
        return $this->db->query($query);
    }

    public function select($id)
    {
        $query = "SELECT a.id_user, b.nama FROM tb_pendaftaran a INNER JOIN tb_users b ON a.id_user=b.id WHERE a.id_rombel=$id";
        return $this->db->query($query)->result_array();
    }

    public function load_nilai($id)
    {
        $query = "SELECT a.bulan, c.nama, a.nilai FROM tb_pembayaran a INNER JOIN tb_pendaftaran b ON a.id_daftar=b.id INNER JOIN tb_users c ON b.id_user=c.id WHERE b.id_user=$id";
        return $this->db->query($query);
    }
}
