<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public $rules_login = array(
        'username' => array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'trim|required'
        ),
        'password' => array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required'
        )
    );

    public function login($post)
    {
        $cek_user = $this->db->get_where('tb_users', ['username' => $post['username']])->row_array();

        if ($cek_user) {
            if ($cek_user['password'] == md5($post['password'])) {
                if ($cek_user['active'] == 'yes') {
                    $this->session->set_userdata([
                        'id' => $cek_user['id'],
                        'level' => $cek_user['level'],
                        'nama' => $cek_user['nama']
                    ]);
                    if ($cek_user['level'] == 'admin') {
                        redirect('admin/dashboard');
                    } else if ($cek_user['level'] == 'tentor') {
                        redirect('tentor/dashboard');
                    } else {
                        redirect('siswa/dashboard');
                    }
                } else {
                    $this->session->set_flashdata('gagal', 'Akun anda sudah tidak aktif');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('gagal', 'Password anda salah');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('gagal', 'Pengguna tidak ada');
            redirect('auth');
        }
    }
}
