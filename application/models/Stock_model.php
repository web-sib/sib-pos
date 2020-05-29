
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stock_model extends CI_Model
{
    public function getJoin()
    {
        $this->db->select('stock.*,items.barcode, items.name as itemsName, suplier.name as suplierName, user.user as userName');
        $this->db->from('stock');
        if ($this->uri->segment(2) == "in") {
            $this->db->where('type', 'in');
        } elseif ($this->uri->segment(2) == "out") {
            $this->db->where('type', 'out');
        }
        $this->db->join('items', 'items.id_items = stock.id_items');
        $this->db->join('suplier', 'suplier.id_suplier = stock.id_suplier', 'left');
        $this->db->join('user', 'user.id_user = stock.id_user');
        return $this->db->get();
    }
    public function add_in($post)
    {
        $data = [
            'id_items' => $post['id_item'],
            'type' => 'in',
            'detail' => $post['detail'],
            'id_suplier' => $post['suplier'] = null ? null : $post['suplier'],
            'qty' => $post['qty'],
            'date' => $post['date'],
            'id_user' => $this->session->userdata('user_id'),

        ];
        $this->db->insert('stock', $data);
        return $this->db->affected_rows();
    }
    public function add_out($post)
    {
        $data = [
            'id_items' => $post['id_item'],
            'type' => 'out',
            'detail' => $post['detail'],
            'id_suplier' => $post['suplier'] = null ? null : $post['suplier'],
            'qty' => $post['qty'],
            'date' => $post['date'],
            'id_user' => $this->session->userdata('user_id'),

        ];
        $this->db->insert('stock', $data);
        return $this->db->affected_rows();
    }
    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('stock');
        if ($id != null) {
            $this->db->where('id_stock', $id);
        }
        return $this->db->get();
    }
    public function deleteStockIn($id)
    {
        $this->db->where('id_stock', $id);
        $this->db->delete('stock');
        return $this->db->affected_rows();
    }
    public function deleteStockOut($id)
    {
        $this->db->where('id_stock', $id);
        $this->db->delete('stock');
        return $this->db->affected_rows();
    }
}
