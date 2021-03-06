<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Setting_app_model extends CI_Model
{

    public $table = 'setting_app';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }


    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }


}

/* End of file Setting_app_model.php */
/* Location: ./application/models/Setting_app_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-22 11:03:00 */
/* http://harviacode.com */