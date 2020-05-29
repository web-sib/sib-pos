<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model', 'user');
        session_true();
    }
    public function login()
    {
        $this->load->view('auth/login');
    }
    public function process()
    {
        $post = $this->input->post(null, true);
        if (isset($post['login'])) {
            $query = $this->user->login($post);
            if ($query->num_rows() > 0) {
                //hasil yang dikembalikan berupa object
                $result = $query->row();
                $params = array(
                    'user_id' => $result->id_user,
                    'level' => $result->level
                );
                $this->session->set_userdata($params);
                echo "<script>
                        alert('login berhasil');
                        window.location = '" . base_url('admin/index') . "'
                </script>";
            } else {
                echo "<script>
                        alert('login gagal');
                        window.location = '" . base_url('auth/login') . "'
                </script>";
            }
        }
    }
}
