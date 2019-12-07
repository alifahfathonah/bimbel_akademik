<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bimbel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belum_login();
        $this->load->model('Bimbel_model');
    }

    public function index()
    {
        $data['bimbel'] = $this->Bimbel_model->get_where('id', '1')->row_array();
        $this->template->load('template', 'admin/bimbel', $data);
    }

    public function edit()
    {
        $post = $this->input->post(null, true);
        $this->Bimbel_model->edit($post);
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('sukses', 'Data Berhasil diubah');
            redirect('admin/bimbel');
        }
    }
}
