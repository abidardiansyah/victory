<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marketing_m extends CI_Model {
    public function get($id = null)
    {
        $this->db->from('marketing');
        if($id != null){
            $this->db->where('marketing_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function del ($id)
    {
        $this->db->where('marketing_id', $id);
        $this->db->delete('marketing');
    }
    public function add($post, $string)
    {
            $params['foto'] = $string['file_name'];
            $params['username'] = $post['username'];
            $params['name'] = $post['fullname'];
            $params['phone'] = $post['phone'];
            $params['address'] = $post['address'];
            $params['tgl_lahir'] = ($post['tgl_lahir']);
            $params['jk_marketing'] = $post['jk_marketing'];
            $params['agama'] = $post['agama'];
            $this->db->insert('marketing', $params);
    }
    public function edit($post)
    {
        $params['name'] = $post['fullname'];
        $params['phone'] = $post['phone'];
        $params['address'] = $post['address'];
        // $params['level'] = $post['level'];
        $this->db->where('marketing_id', $post['marketing_id']);
        $this->db->update('marketing', $params);
    }
    public function get_datamarketing($id = null)
    {
        $this->db->select('*');
        $this->db->from('marketing');
        $this->db->where('approved_marketing', 1);
        $query = $this->db->get();
        return $query;
        
    }

    public function get_pendingmarketing($id = null)
    {
        $this->db->select('*');
        $this->db->from('marketing');
        $this->db->where('approved_marketing', 0);
        $query = $this->db->get();
        return $query;
    }
    public function get_rejectedmarketing($id = null)
    {
        $this->db->select('*');
        $this->db->from('marketing');
        $this->db->where('approved_marketing', 2);
        $query = $this->db->get();
        return $query;
    }
    public function approvemarketing($marketing_id)
    {
        $this->db->set('approved_marketing', 1, FALSE);
        $this->db->where('marketing_id', $marketing_id);
        $this->db->update('marketing');
    }
    public function rejectmarketing($marketing_id)
    {
        $this->db->set('approved_marketing', 2, FALSE);
        $this->db->where('marketing_id', $marketing_id);
        $this->db->update('marketing');
    }
    public function get_profiledata($name)
    {
        $this->db->select('*');
        $this->db->from('marketing');
        $this->db->where('name', $name);
        $query = $this->db->get();
        return $query;
    }
}