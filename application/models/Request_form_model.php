<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Request_form_model extends CI_Model
{

    public $table = 'request_form';
    public $id = 'request_form_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    function get_berkas_list($id_request_form)
    {
        $this->db->where('request_form_id', $id_request_form);
        return $this->db->get('file_rf')->result();
    }

    // get all
    function get_all()
    {
        $this->db->join('user','user.user_id = request_form.user_id');
        $this->db->join('categori_request','categori_request.categori_request_id = request_form.categori_request_id');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function get_berkas ($id){
        $this->db->select('file_rf.*');
        $this->db->from('file_rf');
        $this->db->where('request_form_id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function get_all_active_request()
    {
        $this->db->join('user','user.user_id = request_form.user_id');
        $this->db->join('categori_request','categori_request.categori_request_id = request_form.categori_request_id');
        
        $this->db->like('approval','-');
        
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function get_all_dissaproved_request()
    {
        // $this->db->join('user','user.user_id = request_form.user_id');
        // $this->db->join('categori_request','categori_request.categori_request_id = request_form.categori_request_id');
        // $this->db->group_start();
        //     $this->db->like('approval','%false%');
        //     $this->db->or_like('approval','%true%');
        // $this->db->group_end();
        // $this->db->order_by($this->id, $this->order);
        // return $this->db->get($this->table)->result();
    }

    function get_all_approved_request()
    {
        // $this->db->join('user','user.user_id = request_form.user_id');
        // $this->db->join('categori_request','categori_request.categori_request_id = request_form.categori_request_id');
        // $this->db->group_start();
        //     $this->db->like('approval','%false%');
        //     $this->db->or_like('approval','%true%');
        // $this->db->group_end();
        // $this->db->order_by($this->id, $this->order);
        // return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->join('user','user.user_id = request_form.user_id');
        $this->db->join('categori_request','categori_request.categori_request_id = request_form.categori_request_id');
        $this->db->order_by($this->id, $this->order);
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('request_form_id', $q);
	$this->db->or_like('kode_request_form', $q);
	$this->db->or_like('user_id', $q);
	$this->db->or_like('tanggal_request', $q);
	$this->db->or_like('categori_request_id', $q);
	$this->db->or_like('keterangan', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }


    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function delete_berkas_form_request($file_rf_id)
    {
        $this->db->where('file_rf_id', $file_rf_id);
        $this->db->delete('file_rf');
    }

    function delete_berkas_form_request_by_r_id($id_request_form)
    {
        $this->db->where('request_form_id', $id_request_form);
        $this->db->delete('file_rf');
    }

    function get_no_rf(){
        $q = $this->db->query("SELECT MAX(RIGHT(kode_request_form,4)) AS kd_max FROM request_form WHERE DATE(tanggal_request)=CURDATE()");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return date('Ydm').$kd;
    }

    function detect_dissapprove_status($id_request_form)
    {
        $this->db->where('request_form_id', $id_request_form);
        $this->db->like('approval', 'false');
        return $this->db->get($this->table)->num_rows();
    }

}

/* End of file Request_form_model.php */
/* Location: ./application/models/Request_form_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-09-14 11:13:12 */
/* http://harviacode.com */