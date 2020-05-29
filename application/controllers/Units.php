<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Units extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        session_false();
        $this->load->model('units_model', 'units');
    }
    public function index()
    {
        $data['units'] = $this->units->get()->result();
        $this->template->load('template/template', 'units/index', $data);
    }
    public function addUnits()
    {
        $units = new stdClass();
        $units->id_units = null;
        $units->name = null;
        $data = [
            'page' => 'add',
            'value' => $units
        ];
        $this->template->load('template/template', 'units/add', $data);
    }
    public function updateUnits($id)
    {
        $query = $this->units->get($id)->row();
        $data = array(
            'page' => 'update',
            'value' => $query
        );
        $this->template->load('template/template', 'units/add', $data);
    }
    public function proccess()
    {
        //set rulesnya dulu
        if (isset($_POST['add'])) {
            $this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces|min_length[5]|is_unique[units.name]');
        } elseif (isset($_POST['update'])) {
            $this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces|min_length[5]|callback_units_name');
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
                redirect('units');
            }
            $data = array(
                'page' => $page
            );

            $this->template->load('template/template', 'units/add', $data);
        } else {
            $post = $this->input->post();
            if (isset($_POST['add'])) {
                $query = $this->units->add($post);
                if ($query > 0) {
                    echo "<script>alert('berhasil menambahkan'); window.location = '" . base_url('units') . "'</script>";
                }
            } elseif (isset($_POST['update'])) {
                $query = $this->units->update($post);
                if ($query > 0) {
                    echo "<script>alert('berhasil mengubah data'); window.location = '" . base_url('units') . "'</script>";
                }
            }
        }
    }
    public function units_name()
    {
        $post = $this->input->post();
        $query = $this->db->query("SELECT * FROM units WHERE name = '$post[name]' AND id_units != '$post[id]'");

        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('units_name', '{field} sudah ada');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    public function hapusUnits()
    {
        $id = $this->input->post('id');
        $query = $this->units->delete($id);
        $error = $this->db->error();
        if ($error['code'] !=  0) {
            echo json_encode('Data tidak bisa di hapus(masih ada relasi dengan Item)');
        } else {
            echo json_encode($error);
        }
    }
}
