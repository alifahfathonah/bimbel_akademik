<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function get_where($param = null, $value = null, $param2 = null, $value2 = null)
    {
        $this->db->select('*');
        if ($param != null) {
            $this->db->where($param, $value);
        }
        if ($param2 != null) {
            $this->db->where_not_in($param2, $value2);
        }
        return $this->db->get('tb_users');
    }

    public function add($post)
    {
        $data = [
            'nama' => $post['nama'],
            'jekel' => $post['jekel'],
            'alamat' => $post['alamat'],
            'no_hp' => $post['no'],
            'tgl_lahir' => $post['tgl_lahir'],
            'foto' => empty($_FILES['foto']['name']) ? 'default.jpg' : $this->uploadImage(),
            'username' => $post['username'],
            'password' => md5($post['password']),
            'level' => $post['level'],
            'active' => $post['active'],
        ];
        $this->db->insert('tb_users', $data);
    }

    private function uploadImage()
    {
        $config['upload_path'] = './assets/img/foto/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']     = '2048';
        $config['file_name']  = round(microtime(true) * 1000);

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('foto')) {
            return $this->upload->data('file_name');
        } else {
            echo $this->upload->display_errors();
        }
    }

    public function edit($post)
    {
        $param = [
            'nama' => $post['nama'],
            'jekel' => $post['jekel'],
            'alamat' => $post['alamat'],
            'no_hp' => $post['no'],
            'tgl_lahir' => $post['tgl_lahir'],
            // 'foto' => empty($_FILES['foto']['name']) ? 'default.png' : $this->uploadImage(),
            'username' => $post['username'],
            // 'password' => md5($post['password']),
            'level' => $post['level'],
            'active' => $post['active'],
        ];
        $imageName = $_FILES['foto']['name'];
        $id = $post['id'];
        if (!empty($imageName)) {
            $param['foto'] = $this->uploadImage();
            $old = $this->get_where('id', $id)->row_array();
            $old2 = $old['foto'];
            if ($old2 != 'default.png') {
                unlink(FCPATH . 'assets/img/foto/' . $old2);
            }
        } else {
            $param['foto'] = $post['old_image'];
        }

        $this->db->set($param);
        $this->db->where('id', $id);
        $this->db->update('tb_users');
    }
}
