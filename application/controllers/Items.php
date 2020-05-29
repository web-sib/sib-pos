<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Items extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        session_false();
        $this->load->model('items_model', 'items');
        $this->load->model('categories_model', 'categories');
        $this->load->model('units_model', 'units');
    }
    public function index()
    {
        $data['items'] = $this->items->getJoin()->result();
        $this->template->load('template/template', 'items/index', $data);
    }
    public function hapus_Items()
    {
        $id = $this->input->post('id');

        $check = $this->items->get($id)->row();
        if ($check->image != null) {
            $location_path = './uploads/product/' . $check->image;
            unlink($location_path);
        }
        $query = $this->items->hapus($id);
        if ($query > 0) {
            echo json_encode($query);
        }
    }
    public function addItems()
    {
        //membuat sebuah object kosong dan di isi data kosng

        $categories[null] = '-- pilih --';
        $query_categories = $this->categories->get()->result();

        foreach ($query_categories as $key => $data) :
            $categories[$data->id_categories] = $data->name;
        endforeach;

        $units[null] = '-- pilih --';
        $query_units = $this->units->get()->result();

        foreach ($query_units as $key => $data) :
            $units[$data->id_units] = $data->name;
        endforeach;

        $items = new stdClass();
        $items->id_items = null;
        $items->barcode = null;
        $items->name = null;
        $items->price = null;
        $items->image = null;

        $data = array(
            'page' => 'add',
            'value' => $items,
            'categories' => $categories,
            'units' => $units,
            'selected' => null,
            'selecteds' => null
        );

        $this->template->load('template/template', 'items/add', $data);
    }
    public function updateitems($id)
    {
        $query = $this->items->get($id)->row();
        //membuat sebuah object kosong dan di isi data kosng

        $categories[null] = '-- pilih --';
        $query_categories = $this->categories->get()->result();

        foreach ($query_categories as $key => $data) :
            $categories[$data->id_categories] = $data->name;
        endforeach;

        $units[null] = '-- pilih --';
        $query_units = $this->units->get()->result();

        foreach ($query_units as $key => $data) :
            $units[$data->id_units] = $data->name;
        endforeach;

        $items = new stdClass();
        $items->id_items = $query->id_items;
        $items->barcode = $query->barcode;
        $items->name = $query->name;
        $items->price = $query->price;
        $items->stock = $query->stock;
        $items->image = $query->image;

        $data = array(
            'page' => 'update',
            'value' => $items,
            'categories' => $categories,
            'units' => $units,
            'selected' => $query->id_categories,
            'selecteds' => $query->id_units
        );
        $this->template->load('template/template', 'items/add', $data);
    }
    public function proccess()
    {
        //set rulesnya dulu
        $this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces|min_length[3]');
        if (isset($_POST['add'])) {
            $this->form_validation->set_rules('barcode', 'barcode', 'required|alpha_numeric|is_unique[items.barcode]');
        } elseif (isset($_POST['update'])) {
            $this->form_validation->set_rules('barcode', 'barcode', 'required|alpha_numeric|callback_barcode_check');
        }
        $this->form_validation->set_rules('categories', 'Categories', 'required');
        $this->form_validation->set_rules('units', 'Units', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required|is_natural');

        //set pesan kesalahan untuk form yang tidak memenuhi rulesnya

        $this->form_validation->set_message('required', '{field} Harus di isi');
        $this->form_validation->set_message('min_length', '{field} karakter Min. 3');
        $this->form_validation->set_message('alpha_numeric', '{field} Hanya boleh huruf dan angka');
        $this->form_validation->set_message('alpha_numeri_spaces', '{field} Hanya boleh huruf angka dan spasi');
        $this->form_validation->set_message('is_natural', '{field} Harus angka');
        $this->form_validation->set_message('is_unique', '{field} barcode sudah ada');

        //set error delimiters

        $this->form_validation->set_error_delimiters('<span class="text-danger text-monospace">', '</span>');

        if ($this->form_validation->run() == false) {
            if (isset($_POST['update'])) {
                $post = $this->input->post();

                if ($this->input->post('categories') != '') {
                    $queryWhere_categories = $this->categories->get($this->input->post('categories'))->row();
                    $value = $queryWhere_categories->id_categories;
                    $categories[$value] = $queryWhere_categories->name;
                    $categories[null] = '-- pilih --';
                } else {
                    $value = null;
                    $categories[$value] = '-- pilih --';
                }
                $query_categories = $this->categories->get()->result();


                foreach ($query_categories as $key => $data) :
                    $categories[$data->id_categories] = $data->name;
                endforeach;

                if ($this->input->post('units') != '') {
                    $queryWhere_units = $this->units->get($this->input->post('units'))->row();
                    $value2 = $queryWhere_units->id_units;
                    $units[$value2] = $queryWhere_units->name;
                    $units[null] = '-- pilih --';
                } else {
                    $value2 = null;
                    $units[$value2] = '-- pilih --';
                }
                $query_units = $this->units->get()->result();

                foreach ($query_units as $key => $data) :
                    $units[$data->id_units] = $data->name;
                endforeach;

                $query = $this->items->get($post['id'])->row();
                $items = new stdClass();
                $items->image = $query->image;
                $data = array(
                    'page' => 'update',
                    'categories' => $categories,
                    'units' => $units,
                    'value' => $items,
                    'selected' => $value,
                    'selecteds' => $value2
                );
            } elseif (isset($_POST['add'])) {

                if ($this->input->post('categories') != '') {
                    $queryWhere_categories = $this->categories->get($this->input->post('categories'))->row();
                    $value = $queryWhere_categories->id_categories;
                    $categories[$value] = $queryWhere_categories->name;
                } else {
                    $value = null;
                    $categories[$value] = '-- pilih --';
                }
                $query_categories = $this->categories->get()->result();


                foreach ($query_categories as $key => $data) :
                    $categories[$data->id_categories] = $data->name;
                endforeach;

                if ($this->input->post('units') != '') {
                    $queryWhere_units = $this->units->get($this->input->post('units'))->row();
                    $value2 = $queryWhere_units->id_units;
                    $units[$value2] = $queryWhere_units->name;
                } else {
                    $value2 = null;
                    $units[$value2] = '-- pilih --';
                }
                $query_units = $this->units->get()->result();

                foreach ($query_units as $key => $data) :
                    $units[$data->id_units] = $data->name;
                endforeach;
                $data = array(
                    'page' => 'add',
                    'categories' => $categories,
                    'units' => $units,
                    'selected' => $value,
                    'selecteds' => $value2
                );
            } else {
                redirect('items');
            }
            $this->template->load('template/template', 'items/add', $data);
        } else {
            $post = $this->input->post();
            if (isset($_POST['add'])) {
                $config['upload_path']          = './uploads/product';
                $config['allowed_types']        = 'jpg|png|jpeg';
                $config['max_size']             = 2048;
                $config['file_name']            = 'item -' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
                $this->load->library('upload', $config);

                if (@$_FILES['image']['name'] != null) {
                    if ($this->upload->do_upload('image')) {
                        $post['image'] = $this->upload->data('file_name');
                        $query = $this->items->add($post);
                        if ($query > 0) {
                            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-check"></i> Success!</h5>
                            Berhasil menambah data baru.
                          </div>');
                            redirect('items');
                        }
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-ban"></i> Failed!</h5>
                        ' . $this->upload->display_errors() . '
                      </div>');
                        redirect('items');
                    }
                } else {
                    $post['image'] = null;
                    $query = $this->items->add($post);
                    if ($query > 0) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i> Success!</h5>
                        Berhasil menambah data baru.
                      </div>');
                        redirect('items');
                    }
                }
            } elseif (isset($_POST['update'])) {
                $post = $this->input->post();
                $config['upload_path']          = './uploads/product';
                $config['allowed_types']        = 'jpg|png|jpeg';
                $config['max_size']             = 2048;
                $config['file_name']            = 'item -' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
                $this->load->library('upload', $config);
                if (@$_FILES['image']['name'] != null) {
                    $check = $this->items->get($post['id'])->row();
                    if ($check->image != null) {
                        $location_path = './uploads/product/' . $check->image;
                        unlink($location_path);
                        if ($this->upload->do_upload('image')) {
                            $post['image'] = $this->upload->data('file_name');
                            $query = $this->items->update($post);
                            if ($query > 0) {
                                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5><i class="icon fas fa-check"></i> Success!</h5>
                                    Berhasil mengubah data.
                                </div>');
                                redirect('items');
                            }
                        } else {
                            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-ban"></i> Failed!</h5>
                            ' . $this->upload->display_errors() . '
                          </div>');
                            redirect('items');
                        }
                    } else {
                        if ($this->upload->do_upload('image')) {
                            $post['image'] = $this->upload->data('file_name');
                            $query = $this->items->update($post);
                            if ($query > 0) {
                                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5><i class="icon fas fa-check"></i> Success!</h5>
                                    Berhasil mengubah data.
                                </div>');
                                redirect('items');
                            }
                        } else {
                            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-ban"></i> Failed!</h5>
                            ' . $this->upload->display_errors() . '
                          </div>');
                            redirect('items');
                        }
                    }
                } else {
                    $query = $this->items->update($post);
                    if ($query > 0) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i> Success!</h5>
                        Berhasil mengubah data.
                      </div>');
                        redirect('items');
                    }
                }
            }
        }
    }

    public function barcode_check()
    {
        $post = $this->input->post();
        $query = $this->db->query("SELECT * FROM items WHERE barcode = '$post[barcode]' AND id_items != '$post[id]'");

        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('barcode_check', '{field} sudah ada');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function view_barcode($code)
    {
        $data['code'] = $code;
        $this->template->load('template/template', 'barcode_qrcode/view', $data);
    }

    public function previewBarcode($barcode)
    {
        $data['code'] = $barcode;
        $html = $this->load->view('print/barcode', $data, true);
        $this->data->print($html, 'barcode-' . $barcode . '-' . date('ymd'), 'A4', 'potrait');
    }
    public function previewQrcode($barcode)
    {
        $data['code'] = $barcode;
        $html = $this->load->view('print/Qrcode', $data, true);
        $this->data->print($html, 'qrcode-' . $barcode . '-' . date('ymd'), 'A4', 'potrait');
    }
}
