<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Izin_m extends CI_Model {
   
    public function get($id = null)
    {
        $this->db->from('izin');
        if($id != null){
            $this->db->where('izin_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function del ($id)
    {
        $this->db->where('izin_id', $id);
        $this->db->delete('izin');
    }
    public function add($post)
    {
            $params['username_izin'] = ucfirst($this->fungsi->user_login()->username);
            $params['nama_izin'] = $post['nama_izin'];
            // $params['username_izin'] = $post['username_izin'];
            $params['alasan'] = $post['alasan'];
            $params['keterangan'] = $post['keterangan'];
            $params['tgl_izin'] = $post['tgl_izin'];
           
            $this->db->insert('izin', $params);
    }
    public function get_dataizin($id = null)
    {
        $this->db->select('*');
        $this->db->from('izin');
        $this->db->where('approved_izin', 1);
        $query = $this->db->get();
        return $query;
    }

    public function get_pendingizin($id = null)
    {
        $this->db->select('*');
        $this->db->from('izin');
        $this->db->where('approved_izin', 0);
        $query = $this->db->get();
        return $query;
    }
    public function get_rejectedizin($id = null)
    {
        $this->db->select('*');
        $this->db->from('izin');
        $this->db->where('approved_izin', 2);
        $query = $this->db->get();
        return $query;
    }

    public function approveizin($username_izin)
    {
        $this->db->set('approved_izin', 1, FALSE);
        $this->db->where('username_izin', $username_izin);
        $this->db->update('izin');
    }
    public function rejectizin($username_izin)
    {
        $this->db->set('approved_izin', 2, FALSE);
        $this->db->where('username_izin', $username_izin);
        $this->db->update('izin');
    }
    
}