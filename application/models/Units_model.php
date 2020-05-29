<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Units_model extends CI_Model
{
    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('units');
        if ($id != null) {
            $this->db->where('id_units', $id);
        }
        return $this->db->get();
    }
    public function add($post)
    {
        $data = [
            'name' => $post['name'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->insert('units', $data);
        return $this->db->affected_rows();
    }
    public function update($post)
    {
        $data = [
            'name' => $post['name']
        ];
        $this->db->where('id_units', $post['id']);
        $this->db->update('units', $data);
        return $this->db->affected_rows();
    }
    public function delete($id)
    {
        $this->db->where('id_units', $id);
        $this->db->delete('units');
        return $this->db->affected_rows();
    }
}
