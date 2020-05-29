<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Categories extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        session_false();
        $this->load->model('categories_model', 'categories');
    }
    public function index()
    {
        $data['categories'] = $this->categories->get()->result();
        $this->template->load('template/template', 'categories/index', $data);
    }
    public function addCategories()
    {
        $categories = new stdClass();
        $categories->id_categories = null;
        $categories->name = null;
        $data = array(
            'page' => 'add',
            'value' => $categories
        );

        $this->template->load('template/template', 'categories/add', $data);
    }
    public function updateCategories($id)
    {
        $query = $this->categories->get($id)->row();
        $data = array(
            'page' => 'update',
            'value' => $query
        );
        $this->template->load('template/template', 'categories/add', $data);
    }
    public function proccess()
    {
        //set rulesnya dulu
        if (isset($_POST['add'])) {
            $this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces|min_length[5]|is_unique[categories.name]');
        } elseif (isset($_POST['update'])) {
            $this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces|min_length[5]|callback_categories_name');
        }

        //set pesan kesalahan untuk form yang tidak memenuhi rulesnya

        $this->form_validation->set_message('required', '{field} Harus di isi');
        $this->form_validation->set_message('min_length', '{field} karakter Min. 5');
        $this->form_validation->set_message('is_unique', '{field} sudah ada');

        //set error delimiters

        $this->form_validation->set_error_delimiters('<span class="text-danger text-monospace">', '</span>');

        if ($this->form_validation->run() == false) {
            if (isset($_POST['add'])) {
                $page = 'add';
            } elseif (isset($_POST['update'])) {
                $page = 'update';
            } else {
                redirect('categories');
            }
            $data = array(
                'page' => $page
            );

            $this->template->load('template/template', 'categories/add', $data);
        } else {
            $post = $this->input->post();
            if (isset($_POST['add'])) {
                $query = $this->categories->add($post);
                if ($query > 0) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> Success!</h5>
                    Berhasil menambah data baru.
                  </div>');
                    redirect('categories');
                }
            } elseif (isset($_POST['update'])) {
                $query = $this->categories->update($post);
                if ($query > 0) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> Success!</h5>
                    Berhasil mengubah data.
                  </div>');
                    redirect('categories');
                }
            }
        }
    }
    public function categories_name()
    {
        $post = $this->input->post();
        $query = $this->db->query("SELECT * FROM categories WHERE name = '$post[name]' AND id_categories != '$post[id]'");

        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('categories_name', '{field} sudah ada');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    public function hapusCategories()
    {
        $id = $this->input->post('id');
        $query = $this->categories->delete($id);
        $error = $this->db->error();
        if ($error['code'] !=  0) {
            echo json_encode('Data tidak bisa di hapus(masih ada relasi dengan Item)');
        } else {
            echo json_encode($error);
        }
    }
}
