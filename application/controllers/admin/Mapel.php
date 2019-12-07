<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mapel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belum_login();
        $this->load->model('Mapel_model');
    }

    public function index()
    {
        $data['mapel'] = $this->Mapel_model->get_where()->result_array();
        $this->template->load('template', 'admin/mapel', $data);
    }

    public function add_mapel()
    {
        $post = $this->input->post(null, true);
        $this->Mapel_model->add($post);
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('sukses', 'Data Berhasil ditambahkan');
            redirect('admin/mapel');
        }
    }

    public function edit_mapel()
    {
        $post = $this->input->post(null, true);
        $this->Mapel_model->edit($post);
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('sukses', 'Data Berhasil diubah');
            redirect('admin/mapel');
        }
    }

    public function delete_mapel()
    {
        $id = $this->uri->segment(4);
        $this->db->where('id', $id);
        $this->db->delete('tb_mapel');
        redirect('admin/mapel');
    }
}
