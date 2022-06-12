<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PendMarketing extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model('pendmarketing_m');
		$this->load->library('form_validation');
	}

	public function index()
	{
		if($this->fungsi->user_login()->level ==1){
			$data['row'] = $this->pendmarketing_m->get();
		}else {
			$data['row'] = $this->pendmarketing_m->get_profilepending(ucfirst($this->fungsi->user_login()->name));
		}
		$this->template->load('template', 'approval/pending_marketing',$data);
	}
	public function detail()
	{
		$data['row'] = $this->pendmarketing_m->get();
		$this->template->load('template', 'marketing/detail_pending_marketing',$data);
	}
	
}
