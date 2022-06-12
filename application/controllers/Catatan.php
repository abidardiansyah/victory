<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catatan extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('catatan_m');
		$this->load->model('user_m');
		$this->load->library('form_validation');
	}

	public function index()
	{
		if(ucfirst($this->fungsi->user_login()->level) == 1){
			$data['row'] = $this->catatan_m->get();
		}else{
			$data['row'] = $this->catatan_m->get_dataclient(ucfirst($this->fungsi->user_login()->username));
		}
		$this->template->load('template', 'catatan/catatan_data', $data);
	}
	
	function catatan_user(){ 
		$username = $this->fungsi->user_login()->username;
		$tanggal1 = $this->input->post('tanggal1');
		$tanggal2 = $this->input->post('tanggal2');
		$catatan = $this->catatan_m->catatan_user($username,$tanggal1,$tanggal2);
		$html = '';
		$html .= '<html lang="en">
		<head>
		  <title>Document</title>
		</head>
		<body>
		<h2  align="center" margin="5">Catatan Progres Marketing Victory International Futures Semarang</h2>
		  
          <table border="1" cellspacing="0" cellpadding="5" style="width:100%">
            <tr>
                <th width="10">No.</th>
                <th>Marketing</th>
                <th>Nama Client</th>
                <th>No. Telp</th>
                <th>Pekerjaan</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Waktu Pencatatan</th>
                <th>Keterangan</th>
                <th>Komentar Manajer</th>
            </tr>';
            $no =1; foreach($catatan as $r){
				$jk_client = ($r['jk_client']==1) ? 'Laki-laki': 'Perempuan';
				$html .= '<tr>
							<td>'.$no++.'</td>
							<td>'.$r['marketing_client'].'</td>
							<td>'.$r['nama_client'].'</td>
							<td>'.$r['no_client'].'</td>
							<td>'.$r['pekerjaan_client'].'</td>
							<td>'.$jk_client.'</td>
							<td>'.$r['alamatnya'].'</td>
							<td>'.$r['created'].'</td>
							<td>'.$r['keterangan'].'</td>
							<td>'.$r['komentar'].'</td>
						</tr>';
			}
            
			$html .= '</table>
		</body>
		</html>';
		$this->fungsi->PdfGenerator($html, 'catatan_user', 'A4', 'Landscape');
	}
	

	public function add()
	{
		// $this->form_validation->set_rules('marketing_client','Nama Marketing', 'required');
		$this->form_validation->set_rules('nama_client','Nama Client', 'required');
		$this->form_validation->set_rules('no_client','no client', 'required|min_length[4]');
		$this->form_validation->set_rules('pekerjaan_client','pekerjaan client', 'required');
		$this->form_validation->set_rules('alamatnya','Alamat client', 'required');
		$this->form_validation->set_rules('keterangan','Keterangan client', 'required');
		$this->form_validation->set_rules('jk_client','Jenis kelamin client', 'required');
		
	
		

		$this->form_validation->set_message('required','%s Please enter the data correctly!');
 

		if ($this->form_validation->run() == FALSE)
		{
			$this->template->load('template', 'catatan/catatan_form_add');
		} else{
			$post = $this->input->post(null, TRUE);
			$this->catatan_m->add($post);
			// $this->user_m->add($post);
			if($this->db->affected_rows() > 0) {
				echo "<script>alert('Data berhasil disimpan');</script>";
				}
				echo "<script>window.location='".site_url('catatan')."';</script>";
		}
		
	
	}

	public function edit($id)
	{
		$this->form_validation->set_rules('nama_client','Nama Catatan', 'required');
		$this->form_validation->set_rules('no_client','No Client', 'required');
		$this->form_validation->set_rules('pekerjaan_client','Pekerjaan Client', 'required');
		$this->form_validation->set_rules('alamatnya','alamat Client', 'required');
		$this->form_validation->set_rules('jk_client','Jenis Kelamin', 'required');
		$this->form_validation->set_rules('keterangan','keterangan Kelamin', 'required');
	
		
		$this->form_validation->set_message('required','%s Please enter the data correctly!');
 

		if ($this->form_validation->run() == FALSE)
		{
			$query = $this->catatan_m->get($id);
			if ($query->num_rows()>0){
				$data['row'] = $query->row();
				$this->template->load('template', 'catatan/catatan_form_edit', $data);					
			}else{
				echo "<script>alert('Data tidak ditemukan');";
				echo "window.location='".site_url('catatan')."';</script>";
			}
		} else{
			$post = $this->input->post(null, TRUE);
			$this->catatan_m->edit($post);
			if($this->db->affected_rows() > 0) {
				echo "<script>alert('Data berhasil disimpan');</script>";
				}
				echo "<script>window.location='".site_url('catatan')."';</script>";
		}
		
	
	}
	 
	public function del()
	{
		$id = $this->input->post('catatan_id');
		$this->catatan_m->del($id);
		if($this->db->affected_rows() > 0){
			echo "<script>alert('Data deleted successfully');</script>";
		}
			echo "<script>window.location='".site_url('catatan')."';</script>";
	}

			
	
}
