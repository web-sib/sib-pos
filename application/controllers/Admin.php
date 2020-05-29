<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        session_false();
        $this->load->model('User_model', 'user');
        $this->load->model('Sale_model', 'sale');
    }

    public function index()
    {
        $this->sale->cekMon();
        $data['chart'] = $this->sale->getChart()->result();
        $this->template->load('template/template', 'admin/dashboard', $data);
    }

    public function logout()
    {
        $params = array('user_id', 'level');
        $this->session->unset_userdata($params);
        redirect('auth/login');
    }
}
