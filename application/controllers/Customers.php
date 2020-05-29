<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        session_false();
        $this->load->model('customers_model', 'customers');
    }
    public function index()
    {
        $data['customers'] = $this->customers->get()->result();
        $this->template->load('template/template', 'customers/index', $data);
    }
    public function addcustomers()
    {
        $customers = new stdClass();
        $customers->id_customers = null;
        $customers->name = null;
        $customers->gender = null;
        $customers->phone = null;
        $customers->address = null;
        $data = [
            'page' => 'add',
            'value' => $customers
        ];
        $this->template->load('template/template', 'customers/add', $data);
    }
    public function updatecustomers($id)
    {
        $query = $this->customers->get($id)->row();
        $data = array(
            'page' => 'update',
            'value' => $query
        );
        $this->template->load('template/template', 'customers/add', $data);
    }
    public function proccess()
    {
        //set rulesnya dulu
        if (isset($_POST['add'])) {
            $this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces|min_length[5]|is_unique[customers.name]');
        } elseif (isset($_POST['update'])) {
            $this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces|min_length[5]|callback_customers_name');
        }

        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required|min_length[10]|is_natural', ['min_length' => 'Minimal harus 10 karakter']);
        $this->form_validation->set_rules('address', 'Address', 'required');

        //set pesan kesalahan untuk form yang tidak memenuhi rulesnya

        $this->form_validation->set_message('required', '{field} Harus di isi');
        $this->form_validation->set_message('min_length', '{field} karakter Min. 5');
        $this->form_validation->set_message('is_unique', '{field} sudah ada');
        $this->form_validation->set_message('is_natural', '{field} Harus berisi angka');
        $this->form_validation->set_message('alpha_numeric_spaces', '{field} hanya boleh huruf angka dan spasi');

        //set error delimiters

        $this->form_validation->set_error_delimiters('<span class="text-danger text-monospace">', '</span>');

        if ($this->form_validation->run() == false) {
            if (isset($_POST['add'])) {
                $page = 'add';
            } elseif (isset($_POST['update'])) {
                $page = 'update';
            } else {
                redirect('customers');
            }
            $data = array(
                'page' => $page
            );

            $this->template->load('template/template', 'customers/add', $data);
        } else {
            $post = $this->input->post();
            if (isset($_POST['add'])) {
                $query = $this->customers->add($post);
                if ($query > 0) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> Success!</h5>
                    Berhasil menambah data baru.
                  </div>');
                    redirect('customers');
                }
            } elseif (isset($_POST['update'])) {
                $query = $this->customers->update($post);
                if ($query > 0) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> Success!</h5>
                    Berhasil mengubah data.
                  </div>');
                    redirect('customers');
                }
            }
        }
    }
    public function customers_name()
    {
        $post = $this->input->post();
        $query = $this->db->query("SELECT * FROM customers WHERE name = '$post[name]' AND id_customers != '$post[id]'");

        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('customers_name', '{field} sudah ada');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    public function hapusCustomers()
    {
        $id = $this->input->post('id');
        $query = $this->customers->delete($id);
        echo json_encode($query);
    }
}
