<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bimbel_model extends CI_Model
{
    public function get_where($param = null, $value = null)
    {
        $this->db->select('*');
        if ($param != null) {
            $this->db->where($param, $value);
        }
        return $this->db->get('tb_data_bimbel');
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
            'nama_bimbel' => $post['nama'],
            'visi' => $post['visi'],
            'misi' => $post['misi'],
        ];
        $imageName = $_FILES['foto']['name'];
        if (!empty($imageName)) {
            $param['gambar'] = $this->uploadImage();
            $old = $this->get_where('id', '1')->row_array();
            $old2 = $old['gambar'];
            if ($old2 != 'default.png') {
                unlink(FCPATH . 'assets/img/foto/' . $old2);
            }
        } else {
            $param['gambar'] = $post['old_image'];
        }

        $this->db->set($param);
        $this->db->where('id', '1');
        $this->db->update('tb_data_bimbel');
    }
}
