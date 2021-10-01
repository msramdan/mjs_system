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
        $this->load->model('Absen_model');
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

    public function rekap($lokasi_id,$tahun)
    {
        is_allowed($this->uri->segment(1),null);

        $data = array(
            'sett_apps' =>$this->Setting_app_model->get_by_id(1),
            'lokasi_id' =>$lokasi_id,
            'tahun' => $tahun
        );

                                                    
        $this->template->load('template','rekap_absen/rekap', $data);
    }

    public function get_data()
    {
        $lokasi_id = decrypt_url($this->input->post('id_lokasi'));

        $year = $this->input->post('tahun');

        $recap_data = $this->Absen_model->recap_yearly($lokasi_id,$year);
        $data = [];

        foreach ($recap_data->result() as $value) {
            $data[] = array(
                $value->nama_karyawan,
                $value->JanuariMasuk,
                $value->JanuariSakit,
                $value->JanuariIzin,
                $value->JanuariAlpa,
                $value->JanuariCuti,
                $value->FebruariMasuk,
                $value->FebruariSakit,
                $value->FebruariIzin,
                $value->FebruariAlpa,
                $value->FebruariCuti,
                $value->MaretMasuk,
                $value->MaretSakit,
                $value->MaretIzin,
                $value->MaretAlpa,
                $value->MaretCuti,
                $value->AprilMasuk,
                $value->AprilSakit,
                $value->AprilIzin,
                $value->AprilAlpa,
                $value->AprilCuti,
                $value->MeiMasuk,
                $value->MeiSakit,
                $value->MeiIzin,
                $value->MeiAlpa,
                $value->MeiCuti,
                $value->JuniMasuk,
                $value->JuniSakit,
                $value->JuniIzin,
                $value->JuniAlpa,
                $value->JuniCuti,
                $value->JuliMasuk,
                $value->JuliSakit,
                $value->JuliIzin,
                $value->JuliAlpa,
                $value->JuliCuti,
                $value->AgustusMasuk,
                $value->AgustusSakit,
                $value->AgustusIzin,
                $value->AgustusAlpa,
                $value->AgustusCuti,
                $value->SeptemberMasuk,
                $value->SeptemberSakit,
                $value->SeptemberIzin,
                $value->SeptemberAlpa,
                $value->SeptemberCuti,
                $value->OktoberMasuk,
                $value->OktoberSakit,
                $value->OktoberIzin,
                $value->OktoberAlpa,
                $value->OktoberCuti,
                $value->NovemberMasuk,
                $value->NovemberSakit,
                $value->NovemberIzin,
                $value->NovemberAlpa,
                $value->NovemberCuti,
                $value->DesemberMasuk,
                $value->DesemberSakit,
                $value->DesemberIzin,
                $value->DesemberAlpa,
                $value->DesemberCuti
            );
        }
        $result = array(
            "recordsTotal" => $recap_data->num_rows(),
            "recordsFiltered" => $recap_data->num_rows(),
            "data" => $data
        );
        echo json_encode($result);
       

        // $data['recap_data_list'] = $recap_data;

        // $this->load->view('rekap_absen/tabel_rekap',$data);
    }


}


