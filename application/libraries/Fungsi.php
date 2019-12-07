<?php

class Fungsi
{
    function user_login()
    {
        $ci = get_instance();
        $ci->load->model('user_model');
        $sesi = $ci->session->userdata('id');
        $hasil = $ci->user_model->get_where('id', $sesi)->row();
        return $hasil;
    }

    function pelanggan_login()
    {
        $ci = get_instance();
        $ci->load->model('pelanggan_model');
        $sesi = $ci->session->userdata('id_pelanggan');
        $hasil = $ci->pelanggan_model->get('tb_pendaftaran', 'id_pelanggan', $sesi, 'id_pelanggan')->row();
        return $hasil;
    }
}
