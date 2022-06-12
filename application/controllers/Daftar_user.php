<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_user extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		check_admin();
		$this->load->model('user_m');
		$this->load->library('form_validation');
	}

	public function index()
	{
	
		
		$this->template->load('template', 'new/new_user_add');
	}

	

	// public function add()
	// {
	// 	$this->form_validation->set_rules('fullname','Name', 'required');
	// 	$this->form_validation->set_rules('username','Username', 'required|min_length[4]|is_unique[user.username]');
	// 	$this->form_validation->set_rules('password','Password', 'required|min_length[4]');
	// 	$this->form_validation->set_rules('passconf','Password Confirm', 'required|matches[password]',array ('matches' => '%s does not match password'));
	// 	$this->form_validation->set_rules('address','Alamat', 'required');
	// 	$this->form_validation->set_rules('level','Level', 'required');
	// 	$this->form_validation->set_message('required','%s Please enter the data correctly!');
 

	// 	if ($this->form_validation->run() == FALSE)
	// 	{
	// 		$this->template->load('template', 'user/user_form_add');
	// 	} else{
	// 		$post = $this->input->post(null, TRUE);
	// 		$this->user_m->add($post);
	// 		if($this->db->affected_rows() > 0) {
	// 			echo "<script>alert('Data berhasil disimpan');</script>";
	// 			}
	// 			echo "<script>window.location='".site_url('user')."';</script>";
	// 	}
		
	
	// }

	
			
	
}
