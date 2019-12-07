<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absensi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belum_login();
        $this->load->model('Absensi_model', 'am');
        $this->load->model('Penjadwalan_model', 'pm');
    }

    public function index()
    {
        $id = $this->fungsi->user_login()->id;
        $data_rombel =  $this->am->join_tentor($id)->row_array();
        $data['rombel'] = $data_rombel;
        $data['rekap'] = $this->am->rekap($data_rombel['id'])->result_array();
        $this->template->load('template', 'tentor/rekap', $data);
    }

    public function entry()
    {
        $id = $this->fungsi->user_login()->id;
        $data_rombel =  $this->am->join_tentor($id)->row_array();
        $data['rombel'] = $data_rombel;
        $data['siswa'] = $this->am->tampil_siswa($data_rombel['id'])->result_array();
        $this->template->load('template', 'tentor/absensi', $data);
    }

    public function tambah_absen()
    {
        $iterasi = $this->input->post('iterasi');
        $hari = $this->input->post('hari');
        $tgl = $this->input->post('tgl');
        for ($i = 0; $i < $iterasi; $i++) {
            $id_urut = "id" . $i;
            $absen_urut = "absen" . $i;

            $absen = $this->input->post($absen_urut);
            $id = $this->input->post($id_urut);

            $this->am->add($id, $tgl, $hari, $absen);
        }
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('sukses', 'Data Berhasil disimpan');
            redirect('tentor/absensi');
        }
    }
}
