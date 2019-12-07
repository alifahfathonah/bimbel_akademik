<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belum_login();
        $this->load->model('Penjadwalan_model', 'pm');
    }

    public function index()
    {
        $id = $this->fungsi->user_login()->id;
        $rombel = $this->pm->get('tb_pendaftaran', 'id_user', $id)->row_array();
        $data['senin'] = $this->pm->join_siswa($rombel['id_rombel'], 'senin');
        $data['selasa'] = $this->pm->join_siswa($rombel['id_rombel'], 'selasa');
        $data['rabu'] = $this->pm->join_siswa($rombel['id_rombel'], 'rabu');
        $this->template->load('template', 'siswa/jadwal', $data);
    }
}
