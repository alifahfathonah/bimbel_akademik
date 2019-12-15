<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran_model extends CI_Model
{
    public function get_where($param = null, $value = null)
    {
        $this->db->select('*');
        if ($param != null) {
            $this->db->where($param, $value);
        }
        return $this->db->get('tb_users');
    }

    public function join()
    {
        $query = "SELECT a.id as id_user, a.active, b.id as id_daftar, a.nama, c.id as id_rombel, a.jekel, a.alamat, a.no_hp, a.tgl_lahir, c.nama_rombel, b.tgl_daftar FROM tb_users a INNER JOIN tb_pendaftaran b ON a.id=b.id_user INNER JOIN tb_rombel c ON b.id_rombel=c.id";

        return $this->db->query($query)->result_array();
    }

    public function add($post)
    {
        $username = explode(' ', $post['nama']);
        $password = explode('-', $post['tgl_lahir']);

        $data = [
            'nama' => $post['nama'],
            'jekel' => $post['jekel'],
            'alamat' => $post['alamat'],
            'no_hp' => $post['no'],
            'tgl_lahir' => $post['tgl_lahir'],
            'foto' => 'default.jpg',
            'username' => $username[0],
            'password' => md5($password[0] . $password[1] . $password[2]),
            'level' => 'siswa',
            'active' => $post['active'],
        ];

        $this->db->insert('tb_users', $data);
        $id_user = $this->db->insert_id();

        $data2 = [
            'id_user' => $id_user,
            'id_rombel' => $post['rombel'],
            'tgl_daftar' => date('Y-m-d')
        ];
        $this->db->insert('tb_pendaftaran', $data2);
        // $id_daftar = $this->db->insert_id();

        // $bulan_array = ['Januari', 'February', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        // for ($x = 0; $x < 12; $x++) {
        //     $bulan = $bulan_array[$x] . " " . date('Y');
        //     $this->db->insert('tb_pembayaran', [
        //         'id_daftar' => $id_daftar,
        //         'bulan' => $bulan,
        //         'jumlah' => $post['jumlah']
        //     ]);
        // }
    }

    public function edit($post)
    {
        $username = explode(' ', $post['nama']);
        $password = explode('-', $post['tgl_lahir']);

        $data = [
            'nama' => $post['nama'],
            'jekel' => $post['jekel'],
            'alamat' => $post['alamat'],
            'no_hp' => $post['no'],
            'tgl_lahir' => $post['tgl_lahir'],
            'username' => $username[0],
            'password' => md5($password[0] . $password[1] . $password[2]),
            'level' => 'siswa',
            'active' => $post['status'] == 'lunas' ? 'yes' : 'no',
        ];

        $this->db->set($data);
        $this->db->where('id', $post['id_user']);
        $this->db->update('tb_users');
        // $id_user = $this->db->insert_id();

        $data2 = [
            'id_user' => $post['id_user'],
            'id_rombel' => $post['rombel'],
        ];

        $this->db->set($data2);
        $this->db->where('id', $post['id_daftar']);
        $this->db->update('tb_pendaftaran');
    }
}
