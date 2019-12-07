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
        $data['senin'] = $this->pm->join_tentor($id, 'senin');
        $data['selasa'] = $this->pm->join_tentor($id, 'selasa');
        $data['rabu'] = $this->pm->join_tentor($id, 'rabu');
        $this->template->load('template', 'tentor/jadwal', $data);
    }
}
