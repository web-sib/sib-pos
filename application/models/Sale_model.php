
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sale_model extends CI_Model
{
    public function get($id = null)
    {
        $this->db->select('*');
        if ($id != null) {
            $this->db->where('id_sale', $id);
        }
        $this->db->from('sale');
        $query = $this->db->get();
        return $query;
    }

    public function insertChart($qty, $barcode, $item_name)
    {
        $this->db->where('barcode', $barcode);
        $query = $this->db->get('barang_terlaris');
        $result = $this->db->affected_rows();
        $row = $query->row();
        if ($result > 0) {
            $data = [
                'jumlah' => ((int) $row->jumlah) + ((int) $qty)
            ];
            $this->db->where('barcode', $barcode);
            $this->db->update('barang_terlaris', $data);
            return $this->db->affected_rows();
        } else {
            $data = [
                'barcode' => $barcode,
                'item_name' => $item_name,
                'jumlah' => $qty,
                'bulan' => date('m')
            ];
            $this->db->insert('barang_terlaris', $data);
            return $this->db->affected_rows();
        }
    }

    public function getChart()
    {
        $date = date('m');
        $sql = "SELECT jumlah as jumlahAll, item_name FROM barang_terlaris WHERE bulan = '$date' ORDER BY jumlah DESC LIMIT 5";
        return $this->db->query($sql);
    }

    public function cekMon()
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('m');
        $this->db->where('bulan !=', $date);
        $this->db->delete('barang_terlaris');
    }

    public function getId($id)
    {
        $this->db->where('id_customers', $id);
        return $this->db->get('customers');
    }
    public function getJoinAll()
    {
        $this->db->select('sale.*, customers.name as names, kurir.name as kurirName');
        $this->db->from('sale');
        $this->db->join('customers', 'customers.id_customers = sale.id_customers', 'left');
        $this->db->join('kurir', 'kurir.id_kurir= sale.id_kurir', 'left');
        return $this->db->get();
    }
    public function getJoin($invoice)
    {
        $this->db->select('sale.*, customers.name as names, kurir.name as kurirName');
        $this->db->from('sale');
        $this->db->where('invoice', $invoice);
        $this->db->join('customers', 'customers.id_customers = sale.id_customers', 'left');
        $this->db->join('kurir', 'kurir.id_kurir= sale.id_kurir', 'left');
        return $this->db->get();
    }
    public function getJoinId($id)
    {
        $this->db->select('sale.*, customers.name as names');
        $this->db->from('sale');
        $this->db->where('id_sale', $id);
        $this->db->join('customers', 'customers.id_customers = sale.id_sale', 'left');
        return $this->db->get();
    }
    public function getInvoice()
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = date('ymd');
        $sql = "SELECT MAX(MID(invoice, 9,4)) AS invoice_no FROM sale WHERE MID(invoice,3,6) = $data";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $value = ((int) $row->invoice_no) + 1;
            $val = sprintf("%'.04d", $value);
        } else {
            $val = "0001";
        }
        return "SP" . date('ymd') . $val;
    }

    public function add($data)
    {
        $this->db->insert('sale', $data);
        return $this->db->affected_rows();
    }

    public function addKeranjang($data)
    {
        $this->db->insert('keranjang', $data);
    }

    public function updateKeranjang($data, $barcode)
    {
        $this->db->where('barcode', $barcode);
        $this->db->update('keranjang', $data);

        return $this->db->affected_rows();
    }

    public function getKeranjang()
    {
        $query =  $this->db->get('keranjang');
        return $query;
    }

    public function delAllKeranjang()
    {
        $this->db->truncate('keranjang');
    }

    public function keranjangDelete($barcode)
    {
        $this->db->where('barcode', $barcode);
        $this->db->delete('keranjang');
    }

    public function itemsMinus($qty, $barcode)
    {
        $this->db->where('barcode', $barcode);
        $query = $this->db->get('items');
        $result = $query->num_rows();

        if ($result > 0) {
            $row = $query->row();
            $data = [
                'stock' => ((int) $row->stock) - $qty
            ];
            $this->db->where('barcode', $barcode);
            $this->db->update('items', $data);
            return $this->db->affected_rows();
        }
    }

    public function hapusReport($id)
    {
        $this->db->where('id_sale', $id);
        $this->db->delete('sale');
    }
}
