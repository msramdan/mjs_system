<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Categori_request_model extends CI_Model
{

    public $table = 'categori_request';
    public $table2 = 'flow_approved';
    public $id = 'categori_request_id';
    public $id2 = 'flow_approved_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function get_all_approval_name_and_step($category_request_id)
    {
        $this->db->join('user','user.user_id = flow_approved.user_id');
        $this->db->where('categori_request_id',$category_request_id);
        return $this->db->get($this->table2)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get data by id
    function get_by_id_approved($id)
    {
        $this->db->where($this->id2, $id);
        return $this->db->get($this->table2)->row();
    }


    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('categori_request_id', $q);
	$this->db->or_like('kd_request', $q);
	$this->db->or_like('request', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }


    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    function insert_approved($data)
    {
        $this->db->insert($this->table2, $data);
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

    function delete_approved($id)
    {
        $this->db->where($this->id2, $id);
        $this->db->delete($this->table2);
    }

}

/* End of file Categori_request_model.php */
/* Location: ./application/models/Categori_request_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-29 06:14:25 */
/* http://harviacode.com */