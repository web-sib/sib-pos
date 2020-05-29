<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user', $post['user']);
        $this->db->where('password', sha1($post['password']));
        return $this->db->get();
    }

    public function get($id = null, $level_name = null)
    {
        $this->db->from('user');

        if ($id != null) {
            $this->db->where('id_user', $id);
        }
        return $this->db->get();
    }

    public function insert_user($post)
    {
        $data['user'] = $post['username'];
        $data['password'] = password_hash($post['password'], PASSWORD_DEFAULT);
        $data['addres'] = $post['address'] != "" ? $post['address'] : null;
        $data['level'] = $post['level'];
        $data['nama'] = $post['name'];

        $this->db->set($data);
        $query = $this->db->insert('user');
        return $this->db->affected_rows();
    }

    public function edit_user($post, $newpassword)
    {
        $data['user'] = $post['username'];
        if ($newpassword != null) {
            $data['password'] = sha1($post['newpassword']);
        }
        $data['addres'] = $post['address'] != "" ? $post['address'] : null;
        $data['level'] = $post['level'];
        $data['nama'] = $post['name'];

        $this->db->where('id_user', $post['id']);
        $this->db->set($data);
        $this->db->update('user');
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('user');
        return $this->db->affected_rows();
    }
}
