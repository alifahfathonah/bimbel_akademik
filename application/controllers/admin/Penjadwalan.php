<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjadwalan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belum_login();
        $this->load->model('Penjadwalan_model', 'pm');
    }

    public function index()
    {
        $data['jadwal'] = $this->pm->join();
        // $data['mapel_terpilih'] = $this->pm->join_where()->result_array();
        $this->template->load('template', 'admin/jadwal', $data);
    }

    public function pilih()
    {
        $data['rombel'] = $this->pm->get('tb_rombel')->result_array();
        $data['mapel'] = $this->pm->get('tb_mapel')->result_array();
        $data['ruang'] = $this->pm->get('tb_ruang')->result_array();
        $data['tentor'] = $this->pm->get('tb_users', 'level', 'tentor', 'active', 'yes')->result_array();
        $this->template->load('template', 'admin/pilih_jadwal', $data);
    }

    public function mapel($id)
    {
        $data['jadwal'] = $this->pm->join_where($id)->row_array();
        $data['mapel'] = $this->pm->get('tb_mapel')->result_array();
        $this->template->load('template', 'admin/pilih_mapel', $data);
    }

    public function ubah_mapel($id)
    {
        $data['jadwal'] = $this->pm->join_where($id)->row_array();
        $data['mapel'] = $this->pm->join_where($id)->result_array();
        $data['master_mapel'] = $this->pm->get('tb_mapel')->result_array();
        $this->template->load('template', 'admin/ubah_mapel', $data);
    }

    public function add_jadwal()
    {
        $post = $this->input->post(null, true);

        $cek = $this->pm->get('tb_jadwal', 'hari', $post['hari'], 'id_rombel', $post['rombel'])->num_rows();
        if ($cek == 0) {
            $data = [
                'id_user' => $post['tentor'],
                'id_rombel' => $post['rombel'],
                'id_ruang' => $post['ruang'],
                'hari' => $post['hari'],
            ];
            $this->db->insert('tb_jadwal', $data);
            $id_user = $this->db->insert_id();
            redirect('admin/penjadwalan/mapel/' . $id_user);
        } else {
            $pesan = 'Maaf Jadwal sudah ada. ';
            $this->session->set_flashdata('gagal_load', $pesan);
            redirect('admin/penjadwalan/pilih');
        }
    }

    public function add_mapel()
    {
        $post = $this->input->post(null, true);
        $this->pm->add($post);
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('sukses', 'Data Berhasil ditambahkan');
            redirect('admin/penjadwalan');
        }
    }
}
