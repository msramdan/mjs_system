<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Setting_app extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Setting_app_model');
        $this->load->library('form_validation');
    }

    public function index() 
    {
        $id= 1;
        $row = $this->Setting_app_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'sett_apps' =>$this->Setting_app_model->get_by_id(1), 
                'action' => site_url('setting_app/update_action'),
		'id' => set_value('id', $row->id),
		'nama_aplikasi' => set_value('nama_aplikasi', $row->nama_aplikasi),
		'company' => set_value('company', $row->company),
		'alamat' => set_value('alamat', $row->alamat),
        'author' => set_value('author', $row->author),
		'favicon' => set_value('favicon', $row->favicon),
        'captcha' => set_value('captcha', $row->captcha),
        'audio' => set_value('audio', $row->audio),
	    );
            $this->template->load('template','setting_app/setting_app_form', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('setting_app'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $config['upload_path']      = './assets/assets/img';
            $config['allowed_types']    = 'jpg|png|jpeg'; 
            $config['max_size']         = 10048; 
            $config['file_name']        = 'File-'.date('ymd').'-'.substr(sha1(rand()),0,10); 
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload("favicon"))
            {
                $id = $this->input->post('id');
                $row = $this->Setting_app_model->get_by_id($id);
                $data = $this->upload->data();
                $favicon =$data['file_name'];
                if($row->favicon==null || $row->favicon=='' ){
                    }else{
                        $target_file = './assets/assets/img/'.$row->favicon;
                        unlink($target_file);
                    }
            }else{
                $favicon = $this->input->post('favicon_lama');
            }

            $captcha = $this->input->post('captcha');
            if ($captcha==null || $captcha=='' ) {
                $a = 'N';
            }else{
                $a ='Y';
            }

            $audio = $this->input->post('audio');
            if ($audio==null || $audio=='' ) {
                $b = 'N';
            }else{
                $b ='Y';
            }

            $data = array(
    		'nama_aplikasi' => $this->input->post('nama_aplikasi',TRUE),
    		'company' => $this->input->post('company',TRUE),
            'alamat' => $this->input->post('alamat',TRUE),
    		'author' => $this->input->post('author',TRUE),
            'captcha' => $a,
            'audio' => $b,
    		'favicon' => $favicon,
    	    );

            $this->Setting_app_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('Dashboard'));
        }
    }
    


    public function _rules() 
    {
	$this->form_validation->set_rules('nama_aplikasi', 'nama aplikasi', 'trim|required');
	$this->form_validation->set_rules('company', 'company', 'trim|required');
	$this->form_validation->set_rules('author', 'author', 'trim|required');
	$this->form_validation->set_rules('favicon', 'favicon', 'trim');
	$this->form_validation->set_rules('favicon', 'background app', 'trim');
	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function download_fav($gambar){
        force_download('assets/assets/img/'.$gambar,NULL);
    }

}
