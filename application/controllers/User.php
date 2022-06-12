<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model('user_m');
		$this->load->library('form_validation');
	}

	public function index()
	{
	
		$data['row'] = $this->user_m->get_datauser();
		$this->template->load('template', 'user/user_data', $data);
	}

	public function pending_user()
	{
		$data['row'] = $this->user_m->get_pendinguser();
		$this->template->load('template', 'user/user_pending', $data);
	}
	public function rejected_user()
	{
		$data['row'] = $this->user_m->get_rejecteduser();
		$this->template->load('template', 'user/user_rejected', $data);
	}
	public function approve_user($user_id)
	{
		$this->user_m->approveuser($user_id);
		if($this->db->affected_rows() > 0) 
		{
			echo "<script>alert('Data berhasil disimpan');</script>";
		}
		echo "<script>window.location='".site_url('user/pending_user')."';</script>";
	}
	public function reject_user($user_id)
	{
		$this->user_m->rejectuser($user_id);
		if($this->db->affected_rows() > 0) 
		{
			echo "<script>alert('Data berhasil disimpan');</script>";
		}
		echo "<script>window.location='".site_url('user/pending_user')."';</script>";
	}

	public function add()
	{
		$this->form_validation->set_rules('fullname','Name', 'required');
		$this->form_validation->set_rules('username','Username', 'required|min_length[4]|is_unique[user.username]');
		$this->form_validation->set_rules('password','Password', 'required|min_length[4]');
		$this->form_validation->set_rules('passconf','Password Confirm', 'required|matches[password]',array ('matches' => '%s does not match password'));
		$this->form_validation->set_rules('address','Alamat', 'required');
		$this->form_validation->set_rules('level','Level', 'required');
		$this->form_validation->set_message('required','%s Please enter the data correctly!');
 

		if ($this->form_validation->run() == FALSE)
		{
			$this->template->load('template', 'user/user_form_add');
		} else{
			$post = $this->input->post(null, TRUE);
			$this->user_m->add($post);
			if($this->db->affected_rows() > 0) {
				echo "<script>alert('Data berhasil disimpan');</script>";
				}
				echo "<script>window.location='".site_url('user')."';</script>";
		}
		
	
	}

	public function edit($id)
	{
		$this->form_validation->set_rules('fullname','Name', 'required');
		$this->form_validation->set_rules('username','Username', 'required|min_length[4]|callback_username_check');
		if($this->input->post('password')){	
			$this->form_validation->set_rules('password','Password', 'min_length[4]');
			$this->form_validation->set_rules('passconf','Password Confirm', '|matches[password]',array ('matches' => '%s does not match password'));
		}
		if($this->input->post('passconf')){	
			$this->form_validation->set_rules('passconf','Password Confirm', 'matches[password]',array ('matches' => '%s does not match password'));
		}
		$this->form_validation->set_rules('address','Alamat', 'required');
		$this->form_validation->set_rules('level','Level', 'required');
		$this->form_validation->set_message('required','%s Please enter the data correctly!');
 

		if ($this->form_validation->run() == FALSE)
		{
			$query = $this->user_m->get($id);
			if ($query->num_rows()>0){
				$data['row'] = $query->row();
				$this->template->load('template', 'user/user_form_edit', $data);					
			}else{
				echo "<script>alert('Data tidak ditemukan');";
				echo "window.location='".site_url('user')."';</script>";
			}
		} else{
			$post = $this->input->post(null, TRUE);
			$this->user_m->edit($post);
			if($this->db->affected_rows() > 0) {
				echo "<script>alert('Data berhasil disimpan');</script>";
				}
				echo "<script>window.location='".site_url('user')."';</script>";
		}
		
	
	}
	function username_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND user_id != '$post[user_id]'");
		if($query->num_rows() > 0 ){
			$this->form_validation->set_message('username_check','{field} ini sudah dipakai, silahkan ganti');
			return FALSE;
		}else{
			return TRUE;
		}

	}
	public function del()
	{
		$id = $this->input->post('user_id');
		$this->user_m->del($id);
		if($this->db->affected_rows() > 0){
			echo "<script>alert('Data deleted successfully');</script>";
		}
			echo "<script>window.location='".site_url('user')."';</script>";
	}
			
	
}
