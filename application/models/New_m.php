<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class New_m extends CI_Model {
    // public function login($post)
    // {
    //     $this->db->select('*');
    //     $this->db->from('user');
    //     $this->db->where('username', $post['username']);
    //     $this->db->where('password', sha1($post['password']));
    //     $query = $this->db->get();
    //     return $query;

    // }
    // public function get($id = null)
    // {
    //     $this->db->select('*');
    //     $this->db->from('user');
    //     if($id != null){
    //         $this->db->where('user_id', $id);
    //     }
    //     $query = $this->db->get();
    //     return $query;
    // }
    // public function get_datauser($id = null)
    // {
    //     $this->db->select('*');
    //     $this->db->from('user');
    //     $this->db->where('approved', 1);
    //     $query = $this->db->get();
    //     return $query;
    // }
    
    public function add($post)
    {
        $params['name'] = $post['fullname'];
        $params['username'] = $post['username'];    
        $params['password'] = sha1($post['password']);
        $params['address'] = $post['address'];
        $params['level'] = 2;
        $this->db->insert('user', $params);
    }
   
    // public function del ($id)
	// 	{
	// 		$this->db->where('user_id', $id);
	// 		$this->db->delete('user');
    //     }
    

    // public function get_pendinguser($id = null)
    // {
    //     $this->db->select('*');
    //     $this->db->from('user');
    //     $this->db->where('approved', 0);
    //     $query = $this->db->get();
    //     return $query;
    // }

    // public function get_rejecteduser($id = null)
    // {
    //     $this->db->select('*');
    //     $this->db->from('user');
    //     $this->db->where('approved', 2);
    //     $query = $this->db->get();
    //     return $query;
    // }

    // public function approveuser($username)
    // {
    //     $this->db->set('approved', 1, FALSE);
    //     $this->db->where('username', $username);
    //     $this->db->update('user');
    // }
    // public function rejectuser($username)
    // {
    //     $this->db->set('approved', 2, FALSE);
    //     $this->db->where('username', $username);
    //     $this->db->update('user');
    // }
}