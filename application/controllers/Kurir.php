<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kurir extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kurir_model', 'kurir');
    }
    public function index()
    {
        $data['kurirs'] = $this->kurir->get()->result();
        $this->template->load('template/template', 'kurir/init', $data);
    }
    public function addKurir()
    {
        $kode = $this->kurir->kodeRender();
        $kurir = new stdClass();
        $kurir->id_kurir = null;
        $kurir->kode = null;
        $kurir->name = null;
        $kurir->gender = null;
        $kurir->phone = null;
        $kurir->address = null;

        $data = [
            'value' => $kurir,
            'page' => 'add',
            'kode' => $kode
        ];

        $this->template->load('template/template', 'kurir/add', $data);
    }
    public function updateKurir($id)
    {
        $query = $this->kurir->get($id)->row();
        $data = array(
            'page' => 'update',
            'value' => $query
        );
        $this->template->load('template/template', 'kurir/add', $data);
    }
    public function proccess()
    {
        //set rulesnya dulu
        if (isset($_POST['add'])) {
            $this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces|min_length[5]|is_unique[kurir.name]');
            $this->form_validation->set_rules('kode', 'Kode', 'required|is_unique[kurir.kode]');
        } elseif (isset($_POST['update'])) {
            $this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces|min_length[5]|callback_kurir_name');
            $this->form_validation->set_rules('kode', 'Kode', 'required|callback_kurir_name');
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
                $kode = $this->kurir->kodeRender();
                $page = 'add';
            } elseif (isset($_POST['update'])) {
                $page = 'update';
            } else {
                redirect('kurir');
            }
            $data = array(
                'kode' => $kode ?? null,
                'page' => $page
            );

            $this->template->load('template/template', 'kurir/add', $data);
        } else {
            $post = $this->input->post();
            if (isset($_POST['add'])) {
                $query = $this->kurir->add($post);
                if ($query > 0) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> Success!</h5>
                    Berhasil menambah data baru.
                  </div>');
                    redirect('kurir');
                } else {
                    var_dump($query);
                    die;
                }
            } elseif (isset($_POST['update'])) {
                $query = $this->kurir->update($post);
                if ($query > 0) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> Success!</h5>
                    Berhasil mengubah data.
                  </div>');
                    redirect('kurir');
                }
            }
        }
    }
    public function kurir_name()
    {
        $post = $this->input->post();
        $query = $this->db->query("SELECT * FROM kurir WHERE name = '$post[name]' AND id_kurir != '$post[id]'");

        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('kurir_name', '{field} sudah ada');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    public function kode_name()
    {
        $post = $this->input->post();
        $query = $this->db->query("SELECT * FROM kurir WHERE name = '$post[name]' AND kode != '$post[kode]'");

        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('kode_name', '{field} sudah ada');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    public function hapusKurir()
    {
        $id = $this->input->post('id');
        $query = $this->kurir->delete($id);
        if ($query > 0) {
            echo json_encode($query);
        }
    }
    public function status()
    {
        $data['kurirs'] = $this->kurir->get()->result();
        $this->template->load('template/template', 'kurir/status', $data);
    }
    public function nonactive()
    {
        $kode = $this->input->post('kode');
        $query = $this->kurir->nonActive($kode);
        echo json_encode($query);
    }
}
