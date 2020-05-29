<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suplier_model extends CI_Model
{
    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('suplier');
        if ($id != null) {
            $this->db->where('id_suplier', $id);
        }
        return $this->db->get();
    }
    public function hapus($id)
    {
        $this->db->where('id_suplier', $id);
        $this->db->delete('suplier');
        return $this->db->affected_rows();
    }
    public function add($post)
    {
        $params = [
            'name' => $post['name'],
            'phone' => $post['phone'],
            'address' => $post['address'],
            'description' => $post['description'] != null ? $post['description'] : null
        ];
        $this->db->insert('suplier', $params);
        return $this->db->affected_rows();
    }
    public function update($post)
    {
        $params = [
            'name' => $post['name'],
            'phone' => $post['phone'],
            'address' => $post['address'],
            'description' => $post['description'] != null ? $post['description'] : null,
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('id_suplier', $post['id']);
        $this->db->update('suplier', $params);
        return $this->db->affected_rows();
    }
}
