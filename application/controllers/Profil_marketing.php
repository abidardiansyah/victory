<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_marketing extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		check_not_login();
	
		$this->load->model('user_m');
		$this->load->model('izin_m');
		$this->load->model('marketing_m');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['row'] = $this->marketing_m->get_profiledata(ucfirst($this->fungsi->user_login()->name))->result_array();
		$data['user'] = $this->db->get_where('user', ['user_id'=>$this->session->userid])->row_array();
		$this->template->load('template', 'marketing/profil_data_marketing', $data);
	}

	public function update($id)
	{
		if($_FILES['foto']['name']){
			if($this->input->post('password') != $this->input->post('password2')){
				$this->session->set_flashdata('error', 'Konfirmasi Password tidak sesuai');
				redirect('profil_marketing','refresh');
			}else{
				$config['upload_path'] 	= './uploads/';
				$config['allowed_types']= 'gif|jpg|jpeg|png';
				$config['max_size']  	= '1024';
				
				$this->load->library('upload', $config);
				
				if (!$this->upload->do_upload('foto')){
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('error', $error);
					redirect('profil_marketing','refresh');
				} else {
					$data = array(
						'foto'			=> $this->upload->data('file_name'),
						'username'		=> $this->input->post('username'),
						'name'			=> $this->input->post('fullname'),
						'phone'			=> $this->input->post('phone'),
						'address'		=> $this->input->post('address'),
						'tgl_lahir'		=> $this->input->post('tgl_lahir'),
						'jk_marketing'	=> $this->input->post('jk_marketing'),
						'agama'			=> $this->input->post('agama'),
						'created'		=> date('Y-m-d H:i:s')
					);
				}
			}
		}else{
			if($this->input->post('password') != $this->input->post('password2')){
				$this->session->set_flashdata('error', 'Konfirmasi Password tidak sesuai');
				redirect('profil_marketing','refresh');
			}else{
				$data = array(
					'username'		=> $this->input->post('username'),
					'name'			=> $this->input->post('fullname'),
					'phone'			=> $this->input->post('phone'),
					'address'		=> $this->input->post('address'),
					'tgl_lahir'		=> $this->input->post('tgl_lahir'),
					'jk_marketing'	=> $this->input->post('jk_marketing'),
					'agama'			=> $this->input->post('agama'),
					'created'		=> date('Y-m-d H:i:s')
				);
			}
		}

		$this->db->update('marketing', $data, ['marketing_id'=>$id]);

		$data2 = array(
			'username'	=> $this->input->post('username'),
			'password'	=> sha1($this->input->post('password'))
		);
		$this->db->update('user', $data2, ['user_id'=>$this->session->userid]);

		$this->session->set_flashdata('sukses', 'Data berhasil diupdate');
		redirect('profil_marketing');
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
		// $this->form_validation->set_rules('username','Username', 'required|min_length[4]|callback_username_check');
		// if($this->input->post('password')){	
		// 	$this->form_validation->set_rules('password','Password', 'min_length[4]');
		// 	$this->form_validation->set_rules('passconf','Password Confirm', '|matches[password]',array ('matches' => '%s does not match password'));
		// }
		// if($this->input->post('passconf')){	
		// 	$this->form_validation->set_rules('passconf','Password Confirm', 'matches[password]',array ('matches' => '%s does not match password'));
		// }
		$this->form_validation->set_rules('phone','Phone', 'required');
	
		$this->form_validation->set_rules('address','address', 'required');
		$this->form_validation->set_message('required','%s Please enter the data correctly!');
 

		if ($this->form_validation->run() == FALSE)
		{
			$query = $this->marketing_m->get($id);
			if ($query->num_rows()>0){
				$data['row'] = $query->row();
				$this->template->load('template', 'profil_marketing', $data);					
			}else{
				echo "<script>alert('Data tidak ditemukan');";
				echo "window.location='".site_url('profil_marketing')."';</script>";
			}
		} else{
			$post = $this->input->post(null, TRUE);
			$this->marketing_m->edit($post);
			if($this->db->affected_rows() > 0) {
				echo "<script>alert('Data berhasil disimpan');</script>";
				}
				echo "<script>window.location='".site_url('profil_marketing')."';</script>";
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
