<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Absen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Lokasi_model');
        $this->load->model('Karyawan_model');
        $this->load->model('Setting_app_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        is_allowed($this->uri->segment(1),null);
        $lokasi = $this->Lokasi_model->get_all();
        $data = array(
            'lokasi' => $lokasi,
            'sett_apps' =>$this->Setting_app_model->get_by_id(1),
        );
        $this->template->load('template','absen/view_lokasi', $data);
    }

    public function tampilKaryawan($lokasi_id)
    {
        is_allowed($this->uri->segment(1),null);
        $karyawan = $this->Karyawan_model->by_lokasi(decrypt_url($lokasi_id));
        $data = array(
            'karyawan' => $karyawan,
            'sett_apps' =>$this->Setting_app_model->get_by_id(1),
        );
        $this->template->load('template','absen/absen_list', $data);
    }

}


