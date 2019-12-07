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
        $data['bimbel'] = $this->db->get_where('tb_data_bimbel', ['id' => '1'])->row_array();
        $this->template->load('template', 'siswa/index', $data);
    }
}
