<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Items_model extends CI_Model
{
    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('items');
        if ($id != null) {
            $this->db->where('id_items', $id);
        }
        return $this->db->get();
    }
    public function hapus($id)
    {
        $this->db->where('id_items', $id);
        $this->db->delete('items');
        return $this->db->affected_rows();
    }
    public function add($post)
    {
        $params = [
            'barcode' => $post['barcode'],
            'name' => $post['name'],
            'id_categories' => $post['categories'],
            'id_units' => $post['units'],
            'price' => $post['price'],
            'image' => $post['image']
        ];
        $this->db->insert('items', $params);
        return $this->db->affected_rows();
    }
    public function update($post)
    {
        $params = [
            'barcode' => $post['barcode'],
            'name' => $post['name'],
            'id_categories' => $post['categories'],
            'id_units' => $post['units'],
            'price' => $post['price'],
            'updated' => date('Y-m-d H:i:s')
        ];
        if ($post['image'] != null) {
            $params['image'] = $post['image'];
        }
        $this->db->where('id_items', $post['id']);
        $this->db->update('items', $params);
        return $this->db->affected_rows();
    }
    public function getJoin()
    {
        $this->db->select('items.*, categories.name as categoriesName, units.name as unitsName');
        $this->db->from('items');
        $this->db->join('categories', 'categories.id_categories = items.id_categories');
        $this->db->join('units', 'units.id_units = items.id_units');
        return $this->db->get();
    }

    public function update_stock_in($post)
    {
        $qty = $post['qty'];
        $id = $post['id_item'];
        $this->db->query("UPDATE items SET stock = stock + '$qty' WHERE id_items = '$id'");
    }
    public function minus_stock_in($post)
    {
        $qty = $post['qty'];
        $id = $post['id_item'];
        $this->db->query("UPDATE items SET stock = stock - '$qty' WHERE id_items = '$id'");
    }
    // public function update_stock_out($qty, $id)
    // {
    //     $this->db->where('id_items', $id);
    //     $query = $this->db->get('items')->row();
    //     if ($query->stock != $qty) {
    //         return true;
    //     }
    //     $this->db->query("UPDATE items SET stock = stock - '$qty' WHERE id_items = '$id'");
    //     return $this->db->affected_rows();
    // }
    // public function plus_stock_out($qty, $id)
    // {
    //     $this->db->where('id_items', $id);
    //     $query = $this->db->get('items')->row();
    //     if ($query->stock == 0) {
    //         return true;
    //     }
    //     $this->db->query("UPDATE items SET stock = stock + '$qty' WHERE id_items = '$id'");
    //     return $this->db->affected_rows();
    // }
    public function barcodeRand()
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = date('ymd');
        $sql = "SELECT MAX(MID(barcode, 9,4)) AS barcode_no FROM items WHERE MID(barcode,3,6) = $data";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $value = ((int) $row->barcode_no) + 1;
            $val = sprintf("%'.04d", $value);
        } else {
            $val = "0001";
        }
        return "PRODUCT" . date('ymd') . $val;
    }
}
