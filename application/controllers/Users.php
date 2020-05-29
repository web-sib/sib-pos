<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        session_false();
        $this->load->model('User_model', 'user');
        check_role();
    }
    public function index()
    {
        $data['users'] = $this->user->get();
        $this->template->load('template/template', 'users/index', $data);
    }

    public function addUser()
    {
        $this->load->library('form_validation');

        //set rulesnya dulu
        $this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[user.user]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required|matches[password]');
        $this->form_validation->set_rules('level', 'Level', 'required');

        //set pesan kesalahan untuk form yang tidak memenuhi rulesnya

        $this->form_validation->set_message('required', '{field} Harus di isi');
        $this->form_validation->set_message('min_length', '{field} karakter Min. 5');
        $this->form_validation->set_message('matches', '{field} tidak cocok');
        $this->form_validation->set_message('is_unique', '{field} Sudah ada');

        //set error delimiters

        $this->form_validation->set_error_delimiters('<span class="text-danger text-monospace">', '</span>');

        if ($this->form_validation->run() == false) {
            $this->template->load('template/template', 'users/addUser');
        } else {
            $post = $this->input->post();
            $query = $this->user->insert_user($post);
            if ($query > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5>
                Berhasil menambah User baru.
              </div>');
                redirect('users');
            }
        }
    }

    public function edit_user($id = null)
    {
        $this->load->library('form_validation');

        //set rulesnya dulu
        $this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|callback_username_check');
        if ($this->input->post('newpassword') or $this->input->post('password_confirm')) :
            $this->form_validation->set_rules('newpassword', 'New Password', 'required|min_length[5]');
            $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required|matches[newpassword]');
        endif;
        $this->form_validation->set_rules('level', 'Level', 'required');

        //set pesan kesalahan untuk form yang tidak memenuhi rulesnya

        $this->form_validation->set_message('required', '{field} Harus di isi');
        $this->form_validation->set_message('min_length', '{field} karakter Min. 5');
        $this->form_validation->set_message('matches', '{field} tidak cocok');
        $this->form_validation->set_message('is_unique', '{field} Sudah ada');

        //membuat set error delimiter
        $this->form_validation->set_error_delimiters('<span class="text-danger text-monospace">', '</span>');

        if ($id == null) {
            redirect('users/index');
        }

        if ($this->form_validation->run() == false) {
            $query = $this->user->get($id)->row();
            $data['user'] = $query;
            $this->template->load('template/template', 'users/edit_user', $data);
        } else {
            if ($newpassword = $this->input->post('newpassword') != null) {
                $newpassword = $this->input->post('newpassword');
            } else {
                $newpassword = null;
            }
            $post = $this->input->post(null, TRUE);
            $query = $this->user->edit_user($post, $newpassword);

            if ($query > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5>
                Berhasil mengubah data user.
              </div>');
                redirect('users');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-info"></i> Info!</h5>
                Tidak ada data yang dirubah.
              </div>');
                redirect('users');
            }
        }
    }

    public function username_check()
    {
        $post = $this->input->post();
        $query = $this->db->query("SELECT * FROM user WHERE user = '$post[username]' AND id_user != '$post[id]'");

        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('username_check', '{field} sudah ada');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function hapus_user()
    {
        $id = $this->input->post('id');
        if ($id == null) {
            redirect('users/index');
        }

        $query = $this->user->delete($id);
        if ($query > 0) {
            echo json_encode($query);
        }
    }
}
