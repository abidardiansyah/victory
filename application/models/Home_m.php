<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_m extends CI_Model {
   
    function input_users($data,$table){
		$this->db->insert($table, $data);
	}

   
}