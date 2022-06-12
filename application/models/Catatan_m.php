<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catatan_m extends CI_Model {
   
    public function get($id = null)
    {
        $this->db->from('catatan');
        if($id != null){
            $this->db->where('catatan_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function del ($id)
    {
        $this->db->where('catatan_id', $id);
        $this->db->delete('catatan');
    }
    public function add($post)
    {
        $params['marketing_client'] = ucfirst($this->fungsi->user_login()->username);
        $params['nama_client'] = $post['nama_client'];
        $params['no_client'] = $post['no_client'];
        $params['pekerjaan_client'] = $post['pekerjaan_client'];
        $params['alamatnya'] = $post['alamatnya'];
        $params['jk_client'] = $post['jk_client'];
        $params['keterangan'] = $post['keterangan'];
        $this->db->insert('catatan', $params);
    }
    

    // public function get_datacatatan($id = null)
    // {
    //     $this->db->select('*');
    //     $this->db->from('catatan');
    //     $this->db->where('approved_izin', 1);
    //     $query = $this->db->get();
    //     return $query;
    // }

    public function get_dataclient($marketer)
    {
        $this->db->from('catatan');
        if($marketer != null){
            $this->db->where('marketing_client', $marketer);
        }
        $query = $this->db->get();
        return $query;
    }
    public function edit($post)
    {
        $params['nama_client'] = $post['nama_client'];
        $params['no_client'] = $post['no_client'];
        $params['pekerjaan_client'] = $post['pekerjaan_client'];
        $params['alamatnya'] = $post['alamatnya'];
        $params['jk_client'] = $post['jk_client'];
        $params['keterangan'] = $post['keterangan'];
        if($post['komentar']) $params['komentar'] = $post['komentar'];
        $this->db->where('catatan_id', $post['catatan_id']);
        $this->db->update('catatan', $params);
    }

    public function detail_data_marketing_catatan($username,$tanggal1,$tanggal2)
    {
       
        $this->db->from('catatan');
        $this->db->where('marketing_client', strtolower($username));
        $this->db->where('created >=', $tanggal1);
        $this->db->where('created <=', $tanggal2);
        return $this->db->get()->result_array();
    }

    public function get_dataizin($tanggal1,$tanggal2)
    {
        $this->db->from('izin');
        $this->db->where('tgl_izin >=', $tanggal1);
        $this->db->where('tgl_izin <=', $tanggal2);
        return $this->db->get()->result_array();
    }

    public function catatan_user($username,$tanggal1,$tanggal2)
    {
        $this->db->from('catatan');
        if($this->session->level != 1){
            $this->db->where('marketing_client', strtolower($username));
        }
        $this->db->where('DATE(created) >=', $tanggal1);
        $this->db->where('DATE(created) <=', $tanggal2);
        return $this->db->get()->result_array();
    }

   
}