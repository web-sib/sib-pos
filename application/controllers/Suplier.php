<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        session_false();
        $this->load->model('suplier_model', 'suplier');
    }
    public function index()
    {
        $data['supliers'] = $this->suplier->get()->result();
        $this->template->load('template/template', 'suplier/index', $data);
    }
    public function hapus_suplier()
    {
        $id = $this->input->post('id');
        $query = $this->suplier->hapus($id);
        $error = $this->db->error();
        if ($error['code'] !=  0) {
            echo json_encode('Data tidak bisa di hapus(masih ada relasi dengan stock)');
        } else {
            echo json_encode($error);
        }
    }
    public function addSuplier()
    {
        //membuat sebuah object kosong dan di isi data kosng
        $supliers = new stdClass();
        $supliers->id_suplier = null;
        $supliers->name = null;
        $supliers->phone = null;
        $supliers->address = null;
        $supliers->description = null;

        $data = array(
            'page' => 'add',
            'value' => $supliers
        );

        $this->template->load('template/template', 'suplier/addSuplier', $data);
    }
    public function updateSuplier($id)
    {
        $query = $this->suplier->get($id)->row();
        $data = array(
            'page' => 'update',
            'value' => $query
        );
        $this->template->load('template/template', 'suplier/addSuplier', $data);
    }
    public function proccess()
    {
        //set rulesnya dulu
        $this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('phone', 'Number Phone', 'required|max_length[20]');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('description', 'Description', 'min_length[5]');

        //set pesan kesalahan untuk form yang tidak memenuhi rulesnya

        $this->form_validation->set_message('required', '{field} Harus di isi');
        $this->form_validation->set_message('min_length', '{field} karakter Min. 5');

        //set error delimiters

        $this->form_validation->set_error_delimiters('<span class="text-danger text-monospace">', '</span>');

        if ($this->form_validation->run() == false) {
            if (isset($_POST['update'])) {
                $data = array(
                    'page' => 'update',
                );
            } elseif (isset($_POST['add'])) {
                $data = array(
                    'page' => 'add',
                );
            } else {
                redirect('suplier');
            }
            $this->template->load('template/template', 'suplier/addSuplier', $data);
        } else {
            $post = $this->input->post();
            if (isset($_POST['add'])) {
                $query = $this->suplier->add($post);
                if ($query > 0) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> Success!</h5>
                    Berhasil menambah data baru.
                  </div>');
                    redirect('suplier');
                }
            } elseif (isset($_POST['update'])) {
                $query = $this->suplier->update($post);
                if ($query > 0) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> Success!</h5>
                    Berhasil mengubah data.
                  </div>');
                    redirect('suplier');
                }
            }
        }
    }
}
