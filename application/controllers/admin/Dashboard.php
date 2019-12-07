<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belum_login();
    }

    public function index()
    {
        $this->db->where('level', 'tentor');
        $data['tentor'] = $this->db->get('tb_users')->num_rows();

        $data['siswa'] = $this->db->get('tb_pendaftaran')->num_rows();
        $data['rombel'] = $this->db->get('tb_rombel')->num_rows();

        $this->template->load('template', 'admin/index', $data);
    }
}
