<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stock extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        session_false();
        $this->load->model('Items_model', 'item');
        $this->load->model('Stock_model', 'stock');
        $this->load->model('suplier_model', 'suplier');
    }
    public function stockDataIn()
    {
        $query = $this->stock->getJoin()->result();
        $data = [
            'stock' => $query
        ];
        $this->template->load('template/template', 'stock/stockDataIn', $data);
    }
    public function stockAddIn()
    {
        $items = $this->item->getJoin()->result();
        $suplier = $this->suplier->get()->result();

        $stock = new stdClass();
        $stock->barcode = null;
        $stock->id_stock = null;

        $data = [
            'page' => 'add',
            'value' => $stock,
            'items' => $items,
            'suplier' => $suplier
        ];
        $this->template->load('template/template', 'stock/stockAddIn', $data);
    }

    public function process()
    {
        if (isset($_POST['add_in'])) {
            $post = $this->input->post();
            // $post['suplier'] = null;
            $this->item->update_stock_in($post);
            $query = $this->stock->add_in($post);
            if ($query > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5>
                Berhasil menambah data baru.
              </div>');
                redirect('stock/in/stock_data');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Failed!</h5>
                Gagal menambah data baru.
              </div>');
                redirect('stock/in/stock_data');
            }
        } elseif (isset($_POST['add_out'])) {
            $post = $this->input->post();
            $post['suplier'] = null;
            $this->db->where('id_items', $post['id_item']);
            $result = $this->db->get('items')->row();
            if ($result->stock < $post['qty']) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Failed!</h5>
                Items terlalu sedikit.
              </div>');
                redirect('stock/out/stock_data');
            }
            $this->item->minus_stock_in($post);
            $query = $this->stock->add_out($post);
            if ($query > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Success!</h5>
                Berhasil menambah data baru.
              </div>');
                redirect('stock/out/stock_data');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Failed!</h5>
                Gagal menambah data baru.
              </div>');
                redirect('stock/out/stock_data');
            }
        }
    }
    public function hapusStockIn()
    {
        $id = $this->input->post('id');
        $get = $this->stock->get($id)->row();

        // $minus = $this->item->update_stock_out($get->qty, $get->id_items);
        if ($get) {
            $delete = $this->stock->deleteStockIn($id);
            if ($delete) {
                echo json_encode($delete);
            }
        }
    }

    // stock out
    public function stockDataOut()
    {
        $query = $this->stock->getJoin()->result();
        $data = [
            'stock' => $query
        ];
        $this->template->load('template/template', 'stock/stockDataOut', $data);
    }
    public function stockAddOut()
    {
        $items = $this->item->getJoin()->result();
        $suplier = $this->suplier->get()->result();

        $stock = new stdClass();
        $stock->barcode = null;
        $stock->id_stock = null;

        $data = [
            'page' => 'add',
            'value' => $stock,
            'items' => $items,
            'suplier' => $suplier
        ];
        $this->template->load('template/template', 'stock/stockAddOut', $data);
    }
    public function hapusStockOut()
    {
        $id = $this->input->post('id');
        $get = $this->stock->get($id)->row();

        // $minus = $this->item->plus_stock_out($get->qty, $get->id_items);
        if ($get) {
            $delete = $this->stock->deleteStockOut($id);
            if ($delete) {
                echo json_encode($delete);
            }
        }
    }
}
