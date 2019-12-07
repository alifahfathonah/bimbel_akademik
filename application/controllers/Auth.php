<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $rules = $this->Auth_model->rules_login;
        $this->form_validation->set_rules($rules);
        $this->form_validation->set_message('required', '%s belum diisi');
        $this->form_validation->set_error_delimiters('<div style="font-size: 12px;" class="text-danger mt-2">', '</div>');

        if ($this->form_validation->run() == false) {
            $this->template->load('template_login', 'login');
        } else {
            $post = $this->input->post(null, true);
            $this->Auth_model->login($post);
        }
    }

    public function logout()
    {
        $unset = ['id', 'level', 'nama'];
        $this->session->unset_userdata($unset);
        redirect('auth');
    }
}
