<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kontak_supplier extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Kontak_supplier_model');
        $this->load->model('Setting_app_model');
        $this->load->library('form_validation');
    }


    function data($supplier_id){
        $data=$this->Kontak_supplier_model->data_list($supplier_id);
        echo json_encode($data);
    }

    function hapus(){
        $id=$this->input->post('kode');
        $data=$this->Kontak_supplier_model->hapus_data($id);
        echo json_encode($data);
    }

    function simpan_data(){
        $supplier_id= $this->input->post('supplier_id');
        $nama=$this->input->post('nama');
        $title_jabatan=$this->input->post('title_jabatan');
        $telepon=$this->input->post('telepon');
        $data=$this->Kontak_supplier_model->simpan_data($supplier_id,$nama,$title_jabatan,$telepon);
        echo json_encode($data);
    }

    function get_data(){
        $id=$this->input->get('id');
        $data=$this->Kontak_supplier_model->get_data_by_id($id);
        echo json_encode($data);
    }

    function update_data(){
        
        $supplier_id = $this->input->post('kontak_supplier_id2');
        $arr = array(
            'nama' => $this->input->post('nama2'),
            'supplier_id' => $this->input->post('supplier_id2'),
            'title_jabatan' => $this->input->post('title_jabatan2'),
            'telepon' => $this->input->post('telepon2'),
        );


        $this->Kontak_supplier_model->update_data($supplier_id, $arr);
        echo json_encode($supplier_id);
    }
 
 


    


}

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-22 06:52:35 */
/* http://harviacode.com */