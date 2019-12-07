<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rombel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belum_login();
        $this->load->model('Rombel_model');
    }

    public function index()
    {
        $data['rombel'] = $this->Rombel_model->get_where()->result_array();
        $this->template->load('template', 'admin/rombel', $data);
    }

    public function add_rombel()
    {
        $post = $this->input->post(null, true);
        $this->Rombel_model->add($post);
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('sukses', 'Data Berhasil ditambahkan');
            redirect('admin/rombel');
        }
    }

    public function edit_rombel()
    {
        $post = $this->input->post(null, true);
        $this->Rombel_model->edit($post);
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('sukses', 'Data Berhasil diubah');
            redirect('admin/rombel');
        }
    }

    public function delete_rombel()
    {
        $id = $this->uri->segment(4);
        $this->db->where('id', $id);
        $this->db->delete('tb_rombel');
        redirect('admin/rombel');
    }
}
