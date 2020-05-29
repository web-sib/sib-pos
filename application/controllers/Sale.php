<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sale extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        session_false();
        $this->load->model('User_model', 'user');
        $this->load->model('Items_model', 'items');
        $this->load->model('Customers_model', 'customers');
        $this->load->model('Sale_model', 'sale');
        $this->load->model('Kurir_model', 'kurir');
    }

    public function index()
    {
        $keranjang = $this->sale->getKeranjang();
        if ($keranjang->num_rows() > 0) {
            $this->sale->delAllKeranjang();
        }
        $items = $this->items->getJoin()->result();
        $customers = $this->customers->get()->result();
        $invoice = $this->sale->getInvoice();
        $kurir = $this->kurir->get()->result();
        $data = [
            'items' => $items,
            'customers' => $customers,
            'invoice' => $invoice,
            'kurirs' => $kurir
        ];
        $this->template->load('template/template', 'transaksi/sale', $data);
    }
    public function isi_data()
    {
        $get = $this->input->get();

        $query = $this->items->get($get['id'])->row();
        echo json_encode($query);
    }

    public function add()
    {
        $post = $this->input->get();
        $sub_total = preg_replace("/[^a-zA-Z0-9]/", "", $post['sub_total']);
        $discount = preg_replace("/[^a-zA-Z0-9]/", "", $post['discount']);
        $total = preg_replace("/[^a-zA-Z0-9]/", "", $post['total']);
        $uang = preg_replace("/[^a-zA-Z0-9]/", "", $post['uang']);
        $kembalian = preg_replace("/[^a-zA-Z0-9]/", "", $post['kembalian']);
        $data = [
            'invoice' => $post['invoice'],
            'id_customers' => $post['id_customers'],
            'kasir' => $post['id_user'],
            'sub_total' => $sub_total,
            'discount' => $discount,
            'total' => $total,
            'uang' => $uang,
            'kembalian' => $kembalian,
            'note' => $post['note'],
            'id_kurir' => $post['kurir'] == null ? null : $post['kurir'],
            'date' => $post['date'],
            'history' => 1
        ];

        if ($post['kurir'] != null) {
            $this->kurir->updateStatus($post['kurir']);
        }
        $query =  $this->sale->add($data);

        echo json_encode($query);
    }

    public function cetakStruk($invoice, $id = null)
    {
        if ($this->session->userdata('nomor') == null) {
            redirect('sale');
        }
        if ($id == null) {
            $customer['name'] = 'umum';
        } else {
            $customer = $this->sale->getId($id)->row_array();
        }
        $sent = $this->sale->getJoin($invoice);
        $query = $this->sale->getKeranjang();
        $data = [
            'transaksi' =>  $query->result(),
            'total' => $query->num_rows(),
            'sale' => $sent->row(),
            'customers' => $customer
        ];
        $i = $query->num_rows();
        $result = $query->result();
        for ($a = 0; $i > $a; $a++) {
            $this->sale->itemsMinus($result[$a]->qty, $result[$a]->barcode);
            $query = $this->sale->insertChart($result[$a]->qty, $result[$a]->barcode, $result[$a]->item_name);
        }
        $this->session->unset_userdata('nomor');
        $html = $this->load->view('print/struk', $data, true);
        $this->data->print($html, 'qrcode-' . '-' . date('ymd'), 'A4', 'potrait');
    }
    public function keranjangAdd()
    {
        $barcode = $this->input->post('barcode');
        $invoice = $this->input->post('invoice');
        $item_name = $this->input->post('item_name');
        $price = $this->input->post('price');
        $qty = $this->input->post('qty');
        $discount = $this->input->post('discount');
        $total = $this->input->post('total');

        $data = [
            'barcode' => $barcode,
            'invoice' => $invoice,
            'item_name' => $item_name,
            'price' => $price,
            'qty' => $qty,
            'discount' => $discount,
            'total' => $total,
        ];

        $this->sale->addKeranjang($data);
    }
    public function ubahKeranjang()
    {
        $barcode = $this->input->post('barcodeBaru');
        $price = $this->input->post('priceBaru') != null ? $this->input->post('priceBaru') : null;
        $qty = $this->input->post('qtyBaru');
        $discount = $this->input->post('discountBaru') != null ? $this->input->post('discountBaru') : null;
        $total = $this->input->post('totalBaru');

        $data = [
            'price' => $price,
            'qty' => $qty,
            'discount' => $discount,
            'total' => $total
        ];

        $query = $this->sale->updateKeranjang($data, $barcode);
        echo json_encode($query);
    }

    public function deleteKeranjang()
    {
        $barcode = $this->input->post('barcodeDelete');

        $this->sale->keranjangDelete($barcode);
    }
}
