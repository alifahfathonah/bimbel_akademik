<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ruang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belum_login();
        $this->load->model('Ruang_model');
    }

    public function index()
    {
        $data['ruang'] = $this->Ruang_model->get_where()->result_array();
        $this->template->load('template', 'admin/ruang', $data);
    }

    public function add_ruang()
    {
        $post = $this->input->post(null, true);
        $this->Ruang_model->add($post);
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('sukses', 'Data Berhasil ditambahkan');
            redirect('admin/ruang');
        }
    }

    public function edit_ruang()
    {
        $post = $this->input->post(null, true);
        $this->Ruang_model->edit($post);
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('sukses', 'Data Berhasil diubah');
            redirect('admin/ruang');
        }
    }

    public function delete_ruang()
    {
        $id = $this->uri->segment(4);
        $this->db->where('id', $id);
        $this->db->delete('tb_ruang');
        redirect('admin/ruang');
    }
}
