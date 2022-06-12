<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model('Home_m');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('Login');
	}
	
	// function insert()
	// {
	// 	$n = $this->input->post('name');
	// 	$u = $this->input->post('username');
	// 	$p = sha1($this->input->post('password'));
	// 	$a = $this->input->post('address');

	// 	$data = array(
	// 		'name' => $n,
	// 		'username' => $u,
	// 		'password' => $p,
	// 		'address' => $a
	// 	);
	// 	$this->home_m->insert_data($data);
	
		
	// }
}
