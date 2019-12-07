<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belum_login();
        $this->load->model('Nilai_model', 'nm');
    }

    public function index()
    {
        $id = $this->fungsi->user_login()->id;
        $data['cek'] = $this->nm->get($id)->result_array();
        $this->template->load('template', 'tentor/nilai', $data);
    }

    public function input()
    {
        $id = $this->fungsi->user_login()->id;
        $data['rombel'] = $this->nm->join($id);
        $this->template->load('template', 'tentor/input', $data);
    }

    public function load_siswa()
    {
        $rombel = $this->input->post('rombel');
        // echo $this->nm->load($rombel);
        $rombel_nilai = $this->nm->load($rombel)->result_array();
        $jumlah = $this->nm->load($rombel)->num_rows();

        $html = $this->load->view('tentor/view', ['rombel_nilai' => $rombel_nilai, 'jumlah' => $jumlah], true);
        $callback = ['html' => $html];
        echo json_encode($callback);
    }

    public function input_nilai()
    {
        $post = $this->input->post(null, true);
        $this->nm->input($post);
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('sukses', 'Data Berhasil disimpan');
            redirect('tentor/nilai');
        }
    }

    public function add_nilai()
    {
        $iterasi = $this->input->post('iterasi');
        for ($i = 0; $i < $iterasi; $i++) {
            $var_bayar = "id_bayar" . $i;
            $var_nilai = "nilai" . $i;

            $bayar = $this->input->post($var_bayar);
            $nilai = $this->input->post($var_nilai);

            $this->nm->add($bayar, $nilai);
        }
        if ($this->db->affected_rows() == 1) {
            $this->session->set_flashdata('sukses', 'Data Berhasil disimpan');
            redirect('tentor/nilai');
        }
    }

    public function select_siswa()
    {
        $id = $this->input->post('rombelId');
        $data = $this->nm->select($id);
        echo json_encode($data);
    }

    public function load_nilai()
    {
        $id = $this->input->post('siswaId');
        $siswa = $this->nm->load_nilai($id)->result_array();
        $siswaPer1 = $this->nm->load_nilai($id)->row_array();

        $html = $this->load->view('tentor/siswa', ['siswa' => $siswa, 'siswaPer1' => $siswaPer1], true);
        $callback = ['html' => $html];
        echo json_encode($callback);
    }
}
