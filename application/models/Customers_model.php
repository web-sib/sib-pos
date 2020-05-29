<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customers_model extends CI_Model
{
    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('customers');
        if ($id != null) {
            $this->db->where('id_customers', $id);
        }
        return $this->db->get();
    }
    public function add($post)
    {
        $data = [
            'name' => $post['name'],
            'gender' => $post['gender'],
            'phone' => $post['phone'],
            'address' => $post['address']
        ];
        $this->db->insert('customers', $data);
        return $this->db->affected_rows();
    }
    public function update($post)
    {
        $data = [
            'name' => $post['name'],
            'gender' => $post['gender'],
            'phone' => $post['phone'],
            'address' => $post['address'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('id_customers', $post['id']);
        $this->db->update('customers', $data);
        return $this->db->affected_rows();
    }
    public function delete($id)
    {
        $this->db->where('id_customers', $id);
        $this->db->delete('customers');
        return $this->db->affected_rows();
    }
}
