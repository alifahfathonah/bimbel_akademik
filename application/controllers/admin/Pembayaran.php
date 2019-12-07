<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belum_login();
        $this->load->model('Pembayaran_model', 'pm');
    }

    public function index()
    {
        $this->template->load('template', 'admin/bayar');
    }

    public function search()
    {
        $key = $this->input->get('keyword');
        $data['siswa'] = $this->pm->cari($key)->row_array();
        $data['spp'] = $this->pm->cari2($key)->result_array();

        $this->template->load('template', 'admin/view', $data);
    }

    public function getData()
    {
        $nama = $this->input->post('keyword');
        $q = $this->pm->cari($nama)->result_array();
        echo json_encode($q);
    }

    public function bayar()
    {
        $id = $this->uri->segment(4);
        $nama = $this->uri->segment(5);
        $this->pm->update_bayar($id);
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('sukses', 'Data Berhasil diubah');
            redirect("admin/pembayaran/search?keyword=$nama");
        }
    }
}
