<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absensi_model extends CI_Model
{
    public function join_tentor($id)
    {
        $qr = "SELECT f.id, f.nama_rombel, b.hari, e.nama_ruang, g.nama_mapel FROM tb_jadwal b INNER JOIN tb_detail_jadwal c ON b.id=c.id_jadwal INNER JOIN tb_ruang e ON b.id_ruang=e.id INNER JOIN tb_rombel f ON b.id_rombel=f.id INNER JOIN tb_mapel g ON c.id_mapel=g.id WHERE b.id_user = $id";
        return $this->db->query($qr);
    }

    public function tampil_siswa($rombel)
    {
        return $this->db->query("SELECT a.id, b.nama FROM tb_pendaftaran a INNER JOIN tb_users b ON a.id_user=b.id WHERE a.id_rombel=$rombel");
    }

    public function add($id, $tgl, $hari, $absen)
    {
        $data = [
            'id_daftar' => $id,
            'tgl_absen' => $tgl,
            'hari' => $hari,
            'keterangan' => $absen
        ];
        $this->db->insert('tb_absensi', $data);
    }

    public function rekap($id_rombel)
    {
        $query = "SELECT tb_pendaftaran.id, tb_pendaftaran.id_user, tb_users.nama,
                    IFNULL((SELECT COUNT(tb_absensi.keterangan)
                    FROM tb_absensi
                    WHERE tb_absensi.keterangan = 'hadir'
                    AND tb_pendaftaran.id = tb_absensi.id_daftar
                    AND tb_absensi.id_daftar IN (SELECT tb_pendaftaran.id
                                    FROM tb_pendaftaran
                                    WHERE tb_pendaftaran.id_rombel = '$id_rombel'
                                    ORDER BY tb_pendaftaran.id ASC)
                    GROUP BY tb_absensi.id_daftar
                    ORDER BY tb_absensi.id_daftar ASC), 0) AS hadir,
                    IFNULL((SELECT COUNT(tb_absensi.keterangan)
                    FROM tb_absensi
                    WHERE tb_absensi.keterangan = 'tidak'
                    AND tb_pendaftaran.id = tb_absensi.id_daftar
                    AND tb_absensi.id_daftar IN (SELECT tb_pendaftaran.id
                                    FROM tb_pendaftaran
                                    WHERE tb_pendaftaran.id_rombel = '$id_rombel'
                                    ORDER BY tb_pendaftaran.id ASC)
                    GROUP BY tb_absensi.id_daftar
                    ORDER BY tb_absensi.id_daftar ASC), 0) AS tidak_hadir
                FROM tb_pendaftaran, tb_users
                WHERE tb_pendaftaran.id_rombel = '$id_rombel' 
                AND tb_pendaftaran.id_user = tb_users.id 
                GROUP BY tb_pendaftaran.id
                ORDER BY tb_pendaftaran.id ASC";

        return $this->db->query($query);
    }
}
