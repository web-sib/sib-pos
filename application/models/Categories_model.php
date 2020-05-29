<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Categories_model extends CI_Model
{
    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('categories');
        if ($id != null) {
            $this->db->where('id_categories', $id);
        }
        return $this->db->get();
    }
    public function add($post)
    {
        $data = [
            'name' => $post['name']
        ];
        $this->db->insert('categories', $data);
        return $this->db->affected_rows();
    }
    public function update($post)
    {
        $data = [
            'name' => $post['name'],
            'updated' => date('Y-m-d H:i:S')
        ];
        $this->db->where('id_categories', $post['id']);
        $this->db->update('categories', $data);
        return $this->db->affected_rows();
    }
    public function delete($id)
    {
        $this->db->where('id_categories', $id);
        $this->db->delete('categories');
        return $this->db->affected_rows();
    }
}
