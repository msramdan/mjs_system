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

    public function rekap_tahunan($lokasi_id,$tahun)
    {
        is_allowed($this->uri->segment(1),null);

        $data = array(
            'sett_apps' =>$this->Setting_app_model->get_by_id(1),
            'lokasi_id' =>$lokasi_id,
            'tahun' => $tahun
        );

                                                    
        $this->template->load('template','rekap_absen/rekap_tahunan', $data);
    }

    public function rekap_bulanan($lokasi_id,$bulan,$tahun)
    {
        is_allowed($this->uri->segment(1),null);

        $getkaryawanbasedonloc = $this->Karyawan_model->by_lokasi(decrypt_url($lokasi_id));

        $data = array(
            'sett_apps' =>$this->Setting_app_model->get_by_id(1),
            'datakaryawan' => $getkaryawanbasedonloc,
            'lokasi_id' =>$lokasi_id,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'classnyak' => $this
        );
                                                    
        $this->template->load('template','rekap_absen/rekap_bulanan', $data);
    }

    public function get_data_yearly()
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

    // public function get_data_monthly()
    // {
    //     $lokasi_id = decrypt_url($this->input->post('id_lokasi'));

    //     $month = $this->input->post('bulan');
    //     $year = $this->input->post('tahun');

    //     $recap_data = $this->Absen_model->recap_monthly($lokasi_id,$month,$year);
    //     $data = [];

    //     foreach ($recap_data->result() as $value) {
    //         $data[] = array(
    //             $value->nama_karyawan,
    //             $value->M,
    //             $value->S,
    //             $value->I,
    //             $value->A,
    //             $value->C
    //         );
    //     }
    //     $result = array(
    //         "recordsTotal" => $recap_data->num_rows(),
    //         "recordsFiltered" => $recap_data->num_rows(),
    //         "data" => $data
    //     );
    //     echo json_encode($result);
       

    //     // $data['recap_data_list'] = $recap_data;

    //     // $this->load->view('rekap_absen/tabel_rekap',$data);
    // }

    function countMasuk($karyawan_id, $bulan, $tahun, $lokasi_id)
    {
        $data = $this->Absen_model->hitungMasuk($karyawan_id, $bulan, $tahun, decrypt_url($lokasi_id));
        return $data;
    }

    function countSakit($karyawan_id, $bulan, $tahun, $lokasi_id)
    {
        $data = $this->Absen_model->hitungSakit($karyawan_id, $bulan, $tahun, decrypt_url($lokasi_id));
        return $data;
    }

    function countIzin($karyawan_id, $bulan, $tahun, $lokasi_id)
    {
        $data = $this->Absen_model->hitungIzin($karyawan_id, $bulan, $tahun, decrypt_url($lokasi_id));
        return $data;
    }

    function countAlpa($karyawan_id, $bulan, $tahun, $lokasi_id)
    {
        $data = $this->Absen_model->hitungAlpa($karyawan_id, $bulan, $tahun, decrypt_url($lokasi_id));
        return $data;
    }

    function countCuti($karyawan_id, $bulan, $tahun, $lokasi_id)
    {
        $data = $this->Absen_model->hitungCuti($karyawan_id, $bulan, $tahun, decrypt_url($lokasi_id));
        return $data;
    }

    public function showCalendar()
    {
        //http://keithdevens.com/software/php_calendar
        $time = time();
        $today = date('j', $time);
        $days = array($today => array(null, null,'<div id="today">' . $today . '</div>'));
        $pn = array('&laquo;' => date('n', $time) - 1, '&raquo;' => date('n', $time) + 1);
        echo $this->generate_calendar(date('Y', $time), date('n', $time), $days, 1, null, 0);
        // License: http://keithdevens . com/software/license
    }

    // PHP Calendar (version 2 . 3), written by Keith Devens
    // http://keithdevens . com/software/php_calendar
    //  see example at http://keithdevens . com/weblog
    function generate_calendar($year, $month, $days = array(), $day_name_length = 3, $month_href = NULL, $first_day = 0, $pn = array())
    {
        $first_of_month = gmmktime(0, 0, 0, $month, 1, $year);
        // remember that mktime will automatically correct if invalid dates are entered
        // for instance, mktime(0,0,0,12,32,1997) will be the date for Jan 1, 1998
        // this provides a built in "rounding" feature to generate_calendar()

        $day_names = array(); //generate all the day names according to the current locale
        for ($n = 0, $t = (3 + $first_day) * 86400; $n < 7; $n++, $t+=86400) //January 4, 1970 was a Sunday
            $day_names[$n] = ucfirst(gmstrftime('%A', $t)); //%A means full textual day name

        list($month, $year, $month_name, $weekday) = explode(',', gmstrftime('%m, %Y, %B, %w', $first_of_month));
        $weekday = ($weekday + 7 - $first_day) % 7; //adjust for $first_day
        $title   = htmlentities(ucfirst($month_name)) . $year;  //note that some locales don't capitalize month and day names

        //Begin calendar .  Uses a real <caption> .  See http://diveintomark . org/archives/2002/07/03
        @list($p, $pl) = each($pn); @list($n, $nl) = each($pn); //previous and next links, if applicable
        if($p) $p = '<span class="calendar-prev">' . ($pl ? '<a href="' . htmlspecialchars($pl) . '">' . $p . '</a>' : $p) . '</span>&nbsp;';
        if($n) $n = '&nbsp;<span class="calendar-next">' . ($nl ? '<a href="' . htmlspecialchars($nl) . '">' . $n . '</a>' : $n) . '</span>';
        $calendar = "<div class=\"mini_calendar\">\n<table class='table table-bordered table-light'>" . "\n" . 
            '<caption class="calendar-month">' . $p . ($month_href ? '<a href="' . htmlspecialchars($month_href) . '">' . $title . '</a>' : $title) . $n . "</caption>\n<tr>";

        if($day_name_length)
        {   //if the day names should be shown ($day_name_length > 0)
            //if day_name_length is >3, the full name of the day will be printed
            foreach($day_names as $d)
                $calendar  .= '<th abbr="' . htmlentities($d) . '">' . htmlentities($day_name_length < 4 ? substr($d,0,$day_name_length) : $d) . '</th>';
            $calendar  .= "</tr>\n<tr>";
        }

        if($weekday > 0) 
        {
            for ($i = 0; $i < $weekday; $i++) 
            {
                $calendar  .= '<td>&nbsp;</td>'; //initial 'empty' days
            }
        }
        for($day = 1, $days_in_month = gmdate('t',$first_of_month); $day <= $days_in_month; $day++, $weekday++)
        {
            if($weekday == 7)
            {
                $weekday   = 0; //start a new week
                $calendar  .= "</tr>\n<tr>";
            }
            if(isset($days[$day]) and is_array($days[$day]))
            {
                @list($link, $classes, $content) = $days[$day];
                if(is_null($content))  $content  = $day;
                $calendar  .= '<td' . ($classes ? ' class="' . htmlspecialchars($classes) . '">' : '>') . 
                    ($link ? '<a href="' . htmlspecialchars($link) . '">' . $content . '</a>' : $content) . '</td>';
            }
            else $calendar  .= "<td>$day</td>";
        }
        if($weekday != 7) $calendar  .= '<td id="emptydays" colspan="' . (7-$weekday) . '">&nbsp;</td>'; //remaining "empty" days

        return $calendar . "</tr>\n</table>\n</div>\n";
    }
}


