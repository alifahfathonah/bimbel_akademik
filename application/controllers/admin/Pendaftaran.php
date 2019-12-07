<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belum_login();
        $this->load->model('Pendaftaran_model');
        $this->load->model('Rombel_model');
    }

    public function index()
    {
        $data['siswa'] = $this->Pendaftaran_model->join();
        $data['rombel'] = $this->Rombel_model->get_where()->result_array();
        $this->template->load('template', 'admin/pendaftaran', $data);
    }

    public function add_siswa()
    {
        $post = $this->input->post(null, true);
        $this->Pendaftaran_model->add($post);
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('sukses', 'Data Berhasil ditambahkan');
            redirect('admin/pendaftaran');
        }
    }

    public function edit_siswa()
    {
        $post = $this->input->post(null, true);
        $this->Pendaftaran_model->edit($post);
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('sukses', 'Data Berhasil diubah');
            redirect('admin/pendaftaran');
        }
    }

    public function delete_siswa()
    {
        $id = $this->uri->segment(4);
        $this->db->where('id', $id);
        $this->db->delete('tb_siswas');
        redirect('admin/pendaftaran');
    }

    public function cek_kuota()
    {
        $rombel = $this->input->post('rombel');
        $jumlah = $this->db->query("SELECT COUNT(id) as kuota FROM tb_pendaftaran WHERE id_rombel = $rombel")->row_array();

        $jumlah = $jumlah['kuota'];

        $hasil = $this->db->query("SELECT (kuota - $jumlah) as hasilnya FROM tb_rombel WHERE id = $rombel")->row_array();
        $hasil = $hasil['hasilnya'];
        $callback = ['html' => $hasil];
        echo json_encode($callback);
    }
}
