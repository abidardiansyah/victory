<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model('izin_m');
		$this->load->model('user_m');
		$this->load->model('marketing_m');
		$this->load->model('Catatan_m');
		$this->load->library('form_validation');
	}

	public function index()
	{
		redirect('admin');
		// $data['row'] = $this->marketing_m->get_datamarketing();
		// $this->template->load('template', 'marketing/marketing_data',$data);
	}
	public function data_marketing()
	{
		
		$data['marketing'] = $this->marketing_m->get_datamarketing()->result_array();
		$this->template->load('template', 'laporan/v_lap_marketing',$data);
	}
	public function data_izin()
	{
		
		$data['izin'] = $this->izin_m->get_dataizin()->result_array();
		$this->template->load('template', 'laporan/v_lap_izin',$data);
	}
	
	function marketing_print(){
		$marketing = $this->marketing_m->get_datamarketing()->result_array();
		$html = '';
		$html .= '<html lang="en">
		<head>
		  <title>Document</title>
		</head>
		<h2  align="center" margin="1">LAPORAN DATA MARKETING
		VICTORY INTERNATIONAL FUTURES SEMARANG</h2>
		<hr>
		<p align="center" >S.Parman Office Park, Jl. S.Parman 3A RT 9, RW.4, Petompon, 
		  Kec. Gajahmungkur, Kota Semarang, Jawa Tengah 50253</p>
		
		<body>
		
		
		  
          <table border="1" cellspacing="0" cellpadding="5"  style="width:100%" >
            <tr>
                <th width="10">No.</th>
				<th>Nama Marketing</th>
				<th>Username</th>
				<th>No. Telp</th>
				<th>Alamat</th>
				<th>Tgl. Lahir</th>
				<th>Jenis Kelamin</th>
				<th>Agama</th>
				<th>Tgl. Masuk</th>
            </tr>';
            $no =1; foreach($marketing as $r){
				$jk_marketing = ($r['jk_marketing']==1) ? 'Laki-laki': 'Perempuan';
				$html .= '<tr>
							<td>'.$no++.'</td>
							<td>'.$r['name'].'</td>
							<td>'.$r['username'].'</td>
							<td>'.$r['phone'].'</td>
							<td>'.$r['address'].'</td>
							<td>'.$r['tgl_lahir'].'</td>
							<td>'.$jk_marketing.'</td>
							<td>'.$r['agama'].'</td>
							<td>'.$r['created'].'</td>
						</tr>';
			}
            
			$html .= '</table>
		</body>
		</html>';
		$this->fungsi->PdfGenerator($html, 'marketing', 'A4', 'Landscape');
	}
	
	function izin_print(){
		$tanggal1 = $this->input->post('tanggal1');
		$tanggal2 = $this->input->post('tanggal2');
		$izin = $this->Catatan_m->get_dataizin($tanggal1,$tanggal2);
		$html = '';
		$html .= '<html lang="en">
		<head>
		  <title>Document</title>
		</head>
		<h1 style="text-align: center;">LAPORAN DATA IZIN MARKETING</h1>
		<hr>

	  <br>
	  <table>
		  <tr>
			  <td  style="width: 30%;"><b>VICTORY INTERNATIONAL FUTURES SEMARANG</td></b>
			 
		  </tr>
		 
		  <tr>
		  
			  <td style="width: 65%;">S.Parman Office Park, Jl. S.Parman 3A RT 9, RW.4, Petompon,</td>

		  </tr>
		  <tr>
		  
			  <td style="width: 65%;">
				  Kec. Gajahmungkur, Kota Semarang, Jawa Tengah 50253</td>
		  </tr>
	  
	  </table>
		<body>
		<br>
		
		 
          <table  border="1" cellspacing="0" cellpadding="5" style="width:100%">
            <tr>
                <th width="10">No.</th>
                <th>Nama izin</th>
                <th>Username Izin</th>
                <th>alasan</th>
                <th>keterangan</th>
                <th>Tgl. izin</th>
                <th>Izin dibuat</th>
            </tr>';
            $no =1; foreach($izin as $r){
				$html .= '<tr text-align="center">
							<td>'.$no++.'</td>
							<td>'.$r['nama_izin'].'</td>
							<td>'.$r['username_izin'].'</td>
							<td>'.$r['alasan'].'</td>
							<td>'.$r['keterangan'].'</td>
							<td>'.$r['tgl_izin'].'</td>
							<td>'.$r['created'].'</td>
						</tr>';
			}
            
			$html .= '</table>
		</body>
		</html>';
		$this->fungsi->PdfGenerator($html, 'disini oke', 'A4', 'Landscape');
	}
	
	function detail_data_marketing($id)
	{
		
		$query = $this->marketing_m->get($id)->row();
		$jk_marketing = $query->jk_marketing == 1 ? 'Laki-laki': 'Perempuan';
		$html = '<html lang="en">
		
		<head>
		  <title>Document</title>
		</head>
		<body>
		  <h2  align="center" margin="5">BIODATA MARKETING
		  VICTORY INTERNATIONAL FUTURES SEMARANG</h2>
		  <hr>
		  
		  <h3 align="center" ><img src="'.base_url('uploads/'.$query->foto).'" width="150" height="200" ></h3>
		  <table align="center" border="0"solid; cellpadding="5" style="width:70%" text-align="center">
		
		  	<tr>
				<td>Nama Marketing</td>
				<td >: ' .$query->name.'</td>
			</tr>
		  	<tr>
				<td>No. Telpon</td>
				<td >: ' .$query->phone.'</td>
			</tr>
		  	<tr>
				<td>Alamat</td>
				<td >: ' .$query->address.'</td>
			</tr>
		  	<tr>
				<td>Tgl. Lahir</td>
				<td >: ' .$query->tgl_lahir.'</td>
			</tr>
			  <tr>
			  
			  		
				<td>Jenis Kelamin</td>
				<td >: ' .$jk_marketing.'</td>
			</tr>

			
		  	<tr>
				<td>Agama</td>
				<td >: ' .$query->agama.'</td>
			</tr>
		  	<tr>
				<td>Tgl. Masuk</td>
				<td >: ' .$query->created.'</td>
			</tr>
		  </table>
		</body>
		</html>';


		$this->fungsi->PdfGenerator($html, 'biodata', 'A4', 'Potrait');
	}

	public function detail_data_marketing_catatan()
	{
		$username = $this->input->post('username');
		$tanggal1 = $this->input->post('tanggal1');
		$tanggal2 = $this->input->post('tanggal2');
		$catatan = $this->Catatan_m->detail_data_marketing_catatan($username,$tanggal1,$tanggal2);
		$html = '';
		$html .= '<html lang="en">
		<head>
		  <title>Document</title>
		</head>
		<body>
		  <h1>CATATAN PROGRESS</h1>
		  
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
		$this->fungsi->PdfGenerator($html, 'catatan_progress', 'A4', 'Landscape');
	}

	function catatan_print(){
		$catatan = $this->catatan_m->get_dataclient()->result_array();
		$html = '';
		$html .= '<html lang="en">
		<head>
		  <title>Document</title>
		</head>
		<body>
		  <h1>VICTORY INTERNATIONAL FUTURES</h1>
		  
          <table border="1" cellspacing="0" cellpadding="5" style="width:100%">
            <tr>
                <th width="10">No.</th>
                <th>Nama izin</th>
            </tr>';
            $no =1; foreach($catatan as $r){
				$html .= '<tr>
							<td>'.$no++.'</td>
							<td>'.$r['marketing_client'].'</td>
						</tr>';
			}
            
			$html .= '</table>
		</body>
		</html>';
		$this->fungsi->PdfGenerator($html, 'disini oke', 'A4', 'Landscape');
	}
	
}
