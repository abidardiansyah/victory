<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	
		
		$this->load->model('new_m');
		$this->load->model('marketing_m');
		$this->load->library('form_validation');
	}

	public function newuser()
	{
		{
			$this->form_validation->set_rules('fullname','Name', 'required');
			$this->form_validation->set_rules('username','Username', 'required|min_length[4]|is_unique[user.username]');
			$this->form_validation->set_rules('password','Password', 'required|min_length[4]');
			$this->form_validation->set_rules('passconf','Password Confirm', 'required|matches[password]',array ('matches' => '%s does not match password'));
			$this->form_validation->set_rules('address','Alamat', 'required');


			// $this->form_validation->set_rules('name','Name', 'required');
			$this->form_validation->set_rules('phone','Phone', 'required|min_length[9]');
			// $this->form_validation->set_rules('address','Address', 'required');
			$this->form_validation->set_rules('tgl_lahir','Tgl Lahir', 'required');
			$this->form_validation->set_rules('jk_marketing','Jenis Kelamin', 'required');
			$this->form_validation->set_rules('agama','Agama', 'required');
			$this->form_validation->set_message('required','%s Please enter the data correctly!');
	 
	
			if ($this->form_validation->run() == FALSE)
			{
			
				$this->load->view( 'new/new_user_add');
			} else{
				$config['upload_path'] = './uploads';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size'] = 5120;
				$this->load->library('upload',$config);
				if (!$this->upload->do_upload('foto')) 
				{
					sleep(4);
					echo "<script>alert('Data gagal disimpan');</script>";
				}else 
				{
					sleep(4);
					$string = $this->upload->data();
					$post = $this->input->post(null, TRUE);
					$this->new_m->add($post);
					$this->marketing_m->add($post, $string);
					if($this->db->affected_rows() > 0) {
						echo "<script>alert('Data berhasil disimpan');</script>";
						}
						echo "<script>window.location='".site_url('auth/login')."';</script>";
				}
			}
		}
	}

	// public function add()
	// {
	// 	$this->form_validation->set_rules('fullname','Name', 'required');
	// 	$this->form_validation->set_rules('username','Username', 'required|min_length[4]|is_unique[user.username]');
	// 	$this->form_validation->set_rules('password','Password', 'required|min_length[4]');
	// 	$this->form_validation->set_rules('passconf','Password Confirm', 'required|matches[password]',array ('matches' => '%s does not match password'));
	// 	$this->form_validation->set_rules('address','Alamat', 'required');
		
	// 	$this->form_validation->set_message('required','%s Please enter the data correctly!');
 

	// 	if ($this->form_validation->run() == FALSE)
	// 	{
	// 		$this->load->view( 'new/new_user_add');
	// 	} else{
	// 		$post = $this->input->post(null, TRUE);
	// 		$this->new_m->add($post);
	// 		if($this->db->affected_rows() > 0) {
	// 			echo "<script>alert('Data berhasil disimpan');</script>";
	// 			}
	// 			echo "<script>window.location='".site_url('user')."';</script>";
	// 	}
		
	
	// }

	
	
}
