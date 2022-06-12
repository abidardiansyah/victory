<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		check_not_login();
		// check_admin();
		
		$this->template->load('template', 'Admin');
	}
}
