<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kurir_model extends CI_Model
{
    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('kurir');
        if ($id != null) {
            $this->db->where('id_kurir', $id);
        }
        return $this->db->get();
    }
    public function add($post)
    {
        $data = [
            'kode' => $post['kode'],
            'name' => $post['name'],
            'gender' => $post['gender'],
            'phone' => $post['phone'],
            'address' => $post['address']
        ];
        $this->db->insert('kurir', $data);
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
        $this->db->where('id_kurir', $post['id']);
        $this->db->update('kurir', $data);
        return $this->db->affected_rows();
    }
    public function updateStatus($id)
    {
        $data = [
            'status' => 1
        ];
        $this->db->where('id_kurir', $id);
        $this->db->update('kurir', $data);
    }
    public function delete($id)
    {
        $this->db->where('id_kurir', $id);
        $this->db->delete('kurir');
        return $this->db->affected_rows();
    }
    public function nonActive($kode)
    {
        $this->db->where('kode', $kode);
        $get = $this->db->get('kurir');
        $result = $get->row();

        if ($result != null) {
            if ($result->status == 0) {
                return 'Kurir sedang tidak aktif';
            } else {
                $data = [
                    'status' => '0'
                ];
                $this->db->where('kode', $kode);
                $this->db->set($data);
                $this->db->update('kurir');
                return $this->db->affected_rows();
            }
        } else {
            return 'Kode tidak terdaftar';
        }
    }
    public function kodeRender()
    {
        date_default_timezone_set('Asia/Jakarta');
        $data = date('ymd');
        $sql = "SELECT MAX(MID(kode, 9,4)) AS kode_no FROM kurir WHERE MID(kode,3,6) = $data";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $value = ((int) $row->kode_no) + 1;
            $val = sprintf("%'.04d", $value);
        } else {
            $val = "0001";
        }
        return "KD" . date('ymd') . $val;
    }
}
