<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rekap_absen extends CI_Controller
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
        $this->template->load('template','rekap_absen/view_lokasi', $data);
    }

    public function rekap($lokasi_id)
    {
        is_allowed($this->uri->segment(1),null);
        $data = array(
            'sett_apps' =>$this->Setting_app_model->get_by_id(1),
            'lokasi_id' =>$lokasi_id,
        );
        $this->template->load('template','rekap_absen/rekap', $data);
    }


}


