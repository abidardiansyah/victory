<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {
    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();
        return $query;

    }
    public function get($id = null)
    {
        $this->db->select('*');
        $this->db->from('user');
        if($id != null){
            $this->db->where('user_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function get_datauser($id = null)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('approved', 1);
        $query = $this->db->get();
        return $query;
    }
    
    public function add($post)
    {
        $params['name'] = $post['fullname'];
        $params['username'] = $post['username'];
        $params['kode'] = $post['kode'];
        $params['password'] = sha1($post['password']);
        $params['address'] = $post['address'];
        $params['level'] = $post['level'];
        $this->db->insert('user', $params);
    }
   
    public function del ($id)
		{
			$this->db->where('user_id', $id);
			$this->db->delete('user');
        }
    public function edit($post)
    {
        $params['name'] = $post['fullname'];
        $params['username'] = $post['username'];
        if(!empty($post['password'])){
            $params['password'] = sha1($post['password']);
        }
        $params['kode'] = $post['kode'];
        $params['address'] = $post['address'];
        $params['level'] = $post['level'];
        $this->db->where('user_id', $post['user_id']);
        $this->db->update('user', $params);
    }

    public function get_pendinguser($id = null)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('approved', 0);
        $query = $this->db->get();
        return $query;
    }

    public function get_rejecteduser($id = null)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('approved', 2);
        $query = $this->db->get();
        return $query;
    }

    public function approveuser($user_id)
    {
        $this->db->set('approved', 1, FALSE);
        $this->db->where('user_id', $user_id);
        $this->db->update('user');
    }
    public function rejectuser($user_id)
    {
        $this->db->set('approved', 2, FALSE);
        $this->db->where('user_id', $user_id);
        $this->db->update('user');
    }

    public function get_fullname($username)
    {
        $this->db->select('fullname');
        $this->db->from('user');
        $this->db->where('username', $username);
        $query = $this->db->get();
        return $query;
    }
}