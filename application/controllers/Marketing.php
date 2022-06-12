<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marketing extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model('marketing_m');
		$this->load->library('form_validation');
	}

	public function index()
	{
		
		$data['row'] = $this->marketing_m->get_datamarketing();
		$this->template->load('template', 'marketing/marketing_data',$data);
	}
	public function profil()
	{
		$data['row'] = $this->marketing_m->get_profiledata();
		$this->template->load('template', 'marketing/detail_data_marketing',$data);
	}

	public function del($id)
	{
		
		$this->marketing_m->del($id);
		if($this->db->affected_rows() > 0){
			echo "<script>alert('Data deleted successfully');</script>";
		}
			echo "<script>window.location='".site_url('marketing')."';</script>";
	}

	public function add()
	{
		$this->form_validation->set_rules('name','Name', 'required');
		$this->form_validation->set_rules('phone','Phone', 'required|min_length[9]');
		$this->form_validation->set_rules('address','Address', 'required');
		$this->form_validation->set_rules('tgl_lahir','Tgl Lahir', 'required');
		$this->form_validation->set_rules('jk_marketing','Jenis Kelamin', 'required');
		$this->form_validation->set_rules('agama','Agama', 'required');
		
		$this->form_validation->set_message('required','%s Please enter the data correctly!');
 

		if ($this->form_validation->run() == FALSE)
		{
			$this->template->load('template', 'marketing/marketing_form_add');
		} else
		{
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
				$this->marketing_m->add($post, $string);
				if($this->db->affected_rows() > 0) 
				{
					echo "<script>alert('Data berhasil disimpan');</script>";
				}
					echo "<script>window.location='".site_url('marketing')."';</script>";
			}
		}
	}
	public function pending_marketing()
	{
		$data['row'] = $this->marketing_m->get_pendingmarketing();
		$this->template->load('template', 'marketing/pending_marketing', $data);
	}
	public function rejected_marketing()
	{
		$data['row'] = $this->marketing_m->get_rejectedmarketing();
		$this->template->load('template', 'marketing/marketing_rejected', $data);
	}
	public function approve_marketing($marketing_id)
	{
		$this->marketing_m->approvemarketing($marketing_id);
		if($this->db->affected_rows() > 0) 
		{
			echo "<script>alert('Data berhasil disimpan');</script>";
		}
		echo "<script>window.location='".site_url('marketing/pending_marketing')."';</script>";
	}
	public function reject_marketing($marketing_id)
	{
		$this->marketing_m->rejectmarketing($marketing_id);
		if($this->db->affected_rows() > 0) 
		{
			echo "<script>alert('Data berhasil disimpan');</script>";
		}
		echo "<script>window.location='".site_url('marketing/pending_marketing')."';</script>";
	}
	public function detail($id)
	{
		// $this->form_validation->set_rules('nama_client','Nama Catatan', 'required');
		// $this->form_validation->set_rules('no_client','No Client', 'required');
		// $this->form_validation->set_rules('pekerjaan_client','Pekerjaan Client', 'required');
		// $this->form_validation->set_rules('alamatnya','alamat Client', 'required');
		// $this->form_validation->set_rules('jk_client','Jenis Kelamin', 'required');
		// $this->form_validation->set_message('required','%s Please enter the data correctly!');
 

		// if ($this->form_validation->run() == FALSE)
		// {
			$query = $this->marketing_m->get($id);
			if ($query->num_rows()>0){
				$data['row'] = $query->row();
				$data['catatan'] = $this->db->get_where('catatan', ['marketing_client'=>$data['row']->username])->result_array();
				$this->template->load('template', 'marketing/detail_data_marketing', $data);					
			}else{
				echo "<script>alert('Data tidak ditemukan');";
				echo "window.location='".site_url('marketing')."';</script>";
			}
		// } else{
		// 	$post = $this->input->post(null, TRUE);
		// 	$this->catatan_m->edit($post);
		// 	if($this->db->affected_rows() > 0) {
		// 		echo "<script>alert('Data berhasil disimpan');</script>";
		// 		}
		// 		echo "<script>window.location='".site_url('catatan')."';</script>";
		// }
		
	
	}
}
