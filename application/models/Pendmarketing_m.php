<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendmarketing_m extends CI_Model {
    public function get($id = null)
    {
        $this->db->select('*');
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
    public function get_profilepending($name)
    {
        $this->db->select('*');
        $this->db->from('marketing');
        if($name != null){
            $this->db->where('marketing_id', $name);
        }
        $query = $this->db->get();
        return $query;
    }
    

}