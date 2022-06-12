<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Izin extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('user_m');
		$this->load->model('izin_m');
		$this->load->library('form_validation');
	}

	public function index()
	{
	
		$data['row'] = $this->izin_m->get_dataizin();
		$this->template->load('template', 'izin/izin_data', $data);
	}
	public function pending_izin()
	{
		
			$data['row'] = $this->izin_m->get_pendingizin();
			$this->template->load('template', 'izin/pending_izin', $data);
		
	}
	public function rejected_izin()
	{
		$data['row'] = $this->izin_m->get_rejectedizin();
		$this->template->load('template', 'izin/izin_rejected', $data);
	}
	public function approve_izin($username_izin)
	{
		$this->izin_m->approveizin($username_izin);
		if($this->db->affected_rows() > 0) 
		{
			echo "<script>alert('Data berhasil disimpan');</script>";
		}
		echo "<script>window.location='".site_url('izin/pending_izin')."';</script>";
	}

	public function reject_izin($username_izin)
	{
		$this->izin_m->rejectizin($username_izin);
		if($this->db->affected_rows() > 0) 
		{
			echo "<script>alert('Data berhasil disimpan');</script>";
		}
		echo "<script>window.location='".site_url('izin/pending_izin')."';</script>";
	}



	// public function pending_user()
	// {
	// 	$data['row'] = $this->user_m->get_pendinguser();
	// 	$this->template->load('template', 'user/user_pending', $data);
	// }
	// public function rejected_user()
	// {
	// 	$data['row'] = $this->user_m->get_rejecteduser();
	// 	$this->template->load('template', 'user/user_rejected', $data);
	// }
	// public function approve_user($username)
	// {
	// 	$this->user_m->approveuser($username);
	// 	if($this->db->affected_rows() > 0) 
	// 	{
	// 		echo "<script>alert('Data berhasil disimpan');</script>";
	// 	}
	// 	echo "<script>window.location='".site_url('user/pending_user')."';</script>";
	// }
	// public function reject_user($username)
	// {
	// 	$this->user_m->rejectuser($username);
	// 	if($this->db->affected_rows() > 0) 
	// 	{
	// 		echo "<script>alert('Data berhasil disimpan');</script>";
	// 	}
	// 	echo "<script>window.location='".site_url('user/pending_user')."';</script>";
	// }

	public function add()
	{
		$this->form_validation->set_rules('nama_izin','nama izin', 'required');
		// $this->form_validation->set_rules('username_izin','username izin', 'required');
		$this->form_validation->set_rules('alasan','alasan', 'required|min_length[4]');
		$this->form_validation->set_rules('keterangan','keterangan', 'required');
		$this->form_validation->set_rules('tgl_izin','tgl. Izin', 'required');

		$this->form_validation->set_message('required','%s Please enter the data correctly!');
 

		if ($this->form_validation->run() == FALSE)
		{
			$this->template->load('template', 'izin/izin_form_add');
		} else{
			$post = $this->input->post(null, TRUE);
			$this->izin_m->add($post);
			if($this->db->affected_rows() > 0) {
				echo "<script>alert('Data berhasil disimpan, tunggu hingga persetujuan');</script>";
				}
				echo "<script>window.location='".site_url('izin/pending_izin')."';</script>";
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
		$id = $this->input->post('izin_id');
		$this->izin_m->del($id);
		if($this->db->affected_rows() > 0){
			echo "<script>alert('Data deleted successfully');</script>";
		}
			echo "<script>window.location='".site_url('izin')."';</script>";
	}

			
	
}
