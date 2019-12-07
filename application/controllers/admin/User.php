<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belum_login();
        $this->load->model('User_model');
    }

    public function index()
    {
        $data['user'] = $this->User_model->get_where(null, null, 'level', 'siswa')->result_array();
        $this->template->load('template', 'admin/user', $data);
    }

    public function add_user()
    {
        $post = $this->input->post(null, true);
        $this->User_model->add($post);
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('sukses', 'Data Berhasil ditambahkan');
            redirect('admin/user');
        }
    }

    public function edit_user()
    {
        $post = $this->input->post(null, true);
        $this->User_model->edit($post);
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('sukses', 'Data Berhasil diubah');
            redirect('admin/user');
        }
    }

    public function delete_user()
    {
        $id = $this->uri->segment(4);
        $old = $this->User_model->get_where('id', $id)->row_array();
        $old2 = $old['foto'];
        if ($old2 != 'default.png') {
            unlink(FCPATH . 'assets/img/foto/' . $old2);
        }
        $this->db->where('id', $id);
        $this->db->delete('tb_users');
        redirect('admin/user');
    }
}
