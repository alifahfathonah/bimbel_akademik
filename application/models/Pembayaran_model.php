<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran_model extends CI_Model
{
    public function cari($keyword)
    {
        $query = "SELECT c.id, c.nama, c.alamat, d.nama_rombel FROM tb_pembayaran a INNER JOIN tb_pendaftaran b ON a.id_daftar=b.id INNER JOIN tb_users c ON b.id_user=c.id INNER JOIN tb_rombel d ON b.id_rombel=d.id WHERE nama LIKE '%$keyword%' GROUP BY c.id";

        $result = $this->db->query($query); // Tampilkan data siswa berdasarkan keyword

        return $result;
    }

    public function cari2($keyword)
    {
        $query = "SELECT a.bulan, a.tgl_bayar, a.jumlah, a.keterangan, a.id_bayar FROM tb_pembayaran a INNER JOIN tb_pendaftaran b ON a.id_daftar=b.id INNER JOIN tb_users c ON b.id_user=c.id INNER JOIN tb_rombel d ON b.id_rombel=d.id WHERE nama LIKE '%$keyword%'";

        $results = $this->db->query($query); // Tampilkan data siswa berdasarkan keyword

        return $results;
    }

    public function update_bayar($post)
    {
        $data = [
            'tgl_bayar' => date('Y-m-d'),
            'keterangan' => 'Lunas'
        ];

        $this->db->set($data);
        $this->db->where('id_bayar', $post);
        $this->db->update('tb_pembayaran');
    }
}
