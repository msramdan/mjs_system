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
        $this->load->model('Absen_model');
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
            'lokasi_id' => $lokasi_id,
            'karyawan' => $karyawan,
            'sett_apps' =>$this->Setting_app_model->get_by_id(1),
            'classnyak' => $this
        );
        $this->template->load('template','absen/absen_list', $data);
    }

    function deteksiKehadiran($lokasi_id, $date, $karyawan_id)
    {
        $cek = $this->Karyawan_model->by_lokasi_date_karyawan_id(decrypt_url($lokasi_id), $date, $karyawan_id);

        if ($cek) {
            return $cek[0]->status;
        } else {
            return 'Masuk';
        }
    }

    function refreshtabelabsen()
    {
        is_allowed($this->uri->segment(1),null);

        $lokasi_id = $this->input->post('id_lokasi');
        $date = $this->input->post('date');

        $karyawan = $this->Karyawan_model->by_lokasi(decrypt_url($lokasi_id));

        
        
        // $totalterabsen = $this->Absen_model->count_terabsen($date);

        // $detectterabsenbelumadalampiran = $this->Absen_model->count_terabsenbelumadalampiran($date)

        // $terabsensemua = 'no';

        // if ($totalterabsen == count($karyawan)) {
        //     $terabsensemua = 'yes';
        // }

        $data = array(
            // 'terabsensemua' => $terabsensemua,
            'karyawan' => $karyawan,
            'classnyak' => $this,
            'date' => $date,
            'lokasi_id' => $lokasi_id
        );

        //print_r($data['karyawan']);
        $this->load->view('absen/tabel_absen_karyawan_list', $data);
    }

    function get_dataKehadiran($lokasi_id, $date, $karyawan_id)
    {
        $cek = $this->Karyawan_model->by_lokasi_date_karyawan_id(decrypt_url($lokasi_id), $date, $karyawan_id);

        return $cek;
    }

    function save_absensi_data()
    {

        $karyawan_id = $this->input->post('karyawan_id');
        $status = $this->input->post('status');
        $alasan = $this->input->post('alasan');
        $tanggal = $this->input->post('tanggal');
        $jam_masuk = $this->input->post('jam_masuk');
        $jam_keluar = $this->input->post('jam_keluar');
        $filenamee = '';

        $cek = $this->Absen_model->cek_absensi($karyawan_id, $tanggal);       

       
        $this->load->library('upload');
        
        if($_FILES['photo']['name']){
        
            $photo = $_FILES['photo']['name'];

            $filenamee = 'AbsF_'.$tanggal.'_'.trim($karyawan_id).'.'.pathinfo($photo, PATHINFO_EXTENSION);
            $config['upload_path']          = './assets/assets/img/absen_files'; 
            $config['allowed_types']        = 'jpg|png|jpeg|pdf';
            $config['max_size']             = 10000;
            $config['file_name']            = $filenamee;

            $_FILES['file']['name'] = $_FILES['photo']['name'];
            $_FILES['file']['type'] = $_FILES['photo']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['photo']['tmp_name'];
            $_FILES['file']['error'] = $_FILES['photo']['error'];
            $_FILES['file']['size'] = $_FILES['photo']['size'];
            $this->upload->initialize($config);
            $this->upload->do_upload('file');
            $uploadData = $this->upload->data();

            $msg = 'upload success';
        
        } else {
            $filenamee = $this->input->post('photo');
            $msg = 'no file detected, it might caused by choosing Izin or Alfa';
        }

        if ($cek) {
            $data = array(
                'karyawan_id' => $karyawan_id,
                'status' => $status,
                'alasan' => $alasan,
                'photo' => $filenamee,
                'tanggal' => $tanggal,
                'jam_masuk' => $jam_masuk,
                'jam_pulang' => $jam_keluar
            );
            $this->Absen_model->update($cek->absen_id,$data);
        } else {
            $data = array(
                'karyawan_id' => $karyawan_id,
                'status' => $status,
                'alasan' => $alasan,
                'photo' => $filenamee,
                'tanggal' => $tanggal,
                'jam_masuk' => $jam_masuk,
                'jam_pulang' => $jam_keluar
            );
            $this->Absen_model->insert($data);
        }

        $arr = array(
            'msg' => $msg,
            'msgscnd' => 'ok' 
        );

        echo json_encode($arr);

        //everything works fine, but kinda hard handling the error triggered by this function... ugh!
    }

}


