<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cuti_model extends CI_Model
{

    public $table = 'cuti';
    public $id = 'cuti_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->select('cuti.*,karyawan.nama_karyawan');
        $this->db->join('karyawan', 'karyawan.karyawan_id = cuti.karyawan_id', 'left');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->select('cuti.*,karyawan.nama_karyawan');
        $this->db->join('karyawan', 'karyawan.karyawan_id = cuti.karyawan_id', 'left');
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('cuti_id', $q);
	$this->db->or_like('karyawan_id', $q);
	$this->db->or_like('tanggal', $q);
	$this->db->or_like('alasan', $q);
	$this->db->or_like('photo', $q);
	$this->db->or_like('status_cuti', $q);
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

}

/* End of file Cuti_model.php */
/* Location: ./application/models/Cuti_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-09-22 13:23:39 */
/* http://harviacode.com */