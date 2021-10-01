<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Absen_model extends CI_Model
{

    public $table = 'absen';
    public $id = 'absen_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

   	function cek_absensi($id_karyawan, $tanggal)
    {
        $this->db->where('karyawan_id',$id_karyawan);
        $this->db->where('tanggal',$tanggal);
        return $this->db->get('absen')->row();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
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

    function count_terabsen($date)
    {
    	$this->db->where('tanggal', $date);
    	return $this->db->get('absen')->num_rows();
    }


    //still wrking on this shit!

    function recap_yearly($lokasi_id,$tahun)
    {

        //these query below may affect server's performance, kudu di optimize lagi... "kali"
        $q = $this->db->query("
            SELECT
              karyawan.nama_karyawan AS 'nama_karyawan',
              SUM(if(month(absen.tanggal) = 1, absen.status = 'Masuk',0))  AS 'JanuariMasuk',
              SUM(if(month(absen.tanggal) = 1, absen.status = 'Sakit',0))  AS 'JanuariSakit',
              SUM(if(month(absen.tanggal) = 1, absen.status = 'Izin',0))  AS 'JanuariIzin',
              SUM(if(month(absen.tanggal) = 1, absen.status = 'Alpa',0))  AS 'JanuariAlpa',
              SUM(if(month(absen.tanggal) = 1, absen.status = 'Cuti',0))  AS 'JanuariCuti',
              SUM(if(month(absen.tanggal) = 2, absen.status = 'Masuk',0))  AS 'FebruariMasuk',
              SUM(if(month(absen.tanggal) = 2, absen.status = 'Sakit',0))  AS 'FebruariSakit',
              SUM(if(month(absen.tanggal) = 2, absen.status = 'Izin',0))  AS 'FebruariIzin',
              SUM(if(month(absen.tanggal) = 2, absen.status = 'Alpa',0))  AS 'FebruariAlpa',
              SUM(if(month(absen.tanggal) = 2, absen.status = 'Cuti',0))  AS 'FebruariCuti',
              SUM(if(month(absen.tanggal) = 3, absen.status = 'Masuk',0))  AS 'MaretMasuk',
              SUM(if(month(absen.tanggal) = 3, absen.status = 'Sakit',0))  AS 'MaretSakit',
              SUM(if(month(absen.tanggal) = 3, absen.status = 'Izin',0))  AS 'MaretIzin',
              SUM(if(month(absen.tanggal) = 3, absen.status = 'Alpa',0))  AS 'MaretAlpa',
              SUM(if(month(absen.tanggal) = 3, absen.status = 'Cuti',0))  AS 'MaretCuti',
              SUM(if(month(absen.tanggal) = 4, absen.status = 'Masuk',0))  AS 'AprilMasuk',
              SUM(if(month(absen.tanggal) = 4, absen.status = 'Sakit',0))  AS 'AprilSakit',
              SUM(if(month(absen.tanggal) = 4, absen.status = 'Izin',0))  AS 'AprilIzin',
              SUM(if(month(absen.tanggal) = 4, absen.status = 'Alpa',0))  AS 'AprilAlpa',
              SUM(if(month(absen.tanggal) = 4, absen.status = 'Cuti',0))  AS 'AprilCuti',
              SUM(if(month(absen.tanggal) = 5, absen.status = 'Masuk',0))  AS 'MeiMasuk',
              SUM(if(month(absen.tanggal) = 5, absen.status = 'Sakit',0))  AS 'MeiSakit',
              SUM(if(month(absen.tanggal) = 5, absen.status = 'Izin',0))  AS 'MeiIzin',
              SUM(if(month(absen.tanggal) = 5, absen.status = 'Alpa',0))  AS 'MeiAlpa',
              SUM(if(month(absen.tanggal) = 5, absen.status = 'Cuti',0))  AS 'MeiCuti',
              SUM(if(month(absen.tanggal) = 6, absen.status = 'Masuk',0))  AS 'JuniMasuk',
              SUM(if(month(absen.tanggal) = 6, absen.status = 'Sakit',0))  AS 'JuniSakit',
              SUM(if(month(absen.tanggal) = 6, absen.status = 'Izin',0))  AS 'JuniIzin',
              SUM(if(month(absen.tanggal) = 6, absen.status = 'Alpa',0))  AS 'JuniAlpa',
              SUM(if(month(absen.tanggal) = 6, absen.status = 'Cuti',0))  AS 'JuniCuti',
              SUM(if(month(absen.tanggal) = 7, absen.status = 'Masuk',0))  AS 'JuliMasuk',
              SUM(if(month(absen.tanggal) = 7, absen.status = 'Sakit',0))  AS 'JuliSakit',
              SUM(if(month(absen.tanggal) = 7, absen.status = 'Izin',0))  AS 'JuliIzin',
              SUM(if(month(absen.tanggal) = 7, absen.status = 'Alpa',0))  AS 'JuliAlpa',
              SUM(if(month(absen.tanggal) = 7, absen.status = 'Cuti',0))  AS 'JuliCuti',
              SUM(if(month(absen.tanggal) = 8, absen.status = 'Masuk',0))  AS 'AgustusMasuk',
              SUM(if(month(absen.tanggal) = 8, absen.status = 'Sakit',0))  AS 'AgustusSakit',
              SUM(if(month(absen.tanggal) = 8, absen.status = 'Izin',0))  AS 'AgustusIzin',
              SUM(if(month(absen.tanggal) = 8, absen.status = 'Alpa',0))  AS 'AgustusAlpa',
              SUM(if(month(absen.tanggal) = 8, absen.status = 'Cuti',0))  AS 'AgustusCuti',
              SUM(if(month(absen.tanggal) = 9, absen.status = 'Masuk',0))  AS 'SeptemberMasuk',
              SUM(if(month(absen.tanggal) = 9, absen.status = 'Sakit',0))  AS 'SeptemberSakit',
              SUM(if(month(absen.tanggal) = 9, absen.status = 'Izin',0))  AS 'SeptemberIzin',
              SUM(if(month(absen.tanggal) = 9, absen.status = 'Alpa',0))  AS 'SeptemberAlpa',
              SUM(if(month(absen.tanggal) = 9, absen.status = 'Cuti',0))  AS 'SeptemberCuti',
              SUM(if(month(absen.tanggal) = 10 ,absen.status = 'Masuk',0)) AS 'OktoberMasuk',
              SUM(if(month(absen.tanggal) = 10 ,absen.status = 'Sakit',0)) AS 'OktoberSakit',
              SUM(if(month(absen.tanggal) = 10 ,absen.status = 'Izin',0)) AS 'OktoberIzin',
              SUM(if(month(absen.tanggal) = 10 ,absen.status = 'Alpa',0)) AS 'OktoberAlpa',
              SUM(if(month(absen.tanggal) = 10 ,absen.status = 'Cuti',0)) AS 'OktoberCuti',
              SUM(if(month(absen.tanggal) = 11 ,absen.status = 'Masuk',0)) AS 'NovemberMasuk',
              SUM(if(month(absen.tanggal) = 11 ,absen.status = 'Sakit',0)) AS 'NovemberSakit',
              SUM(if(month(absen.tanggal) = 11 ,absen.status = 'Izin',0)) AS 'NovemberIzin',
              SUM(if(month(absen.tanggal) = 11 ,absen.status = 'Alpa',0)) AS 'NovemberAlpa',
              SUM(if(month(absen.tanggal) = 11 ,absen.status = 'Cuti',0)) AS 'NovemberCuti',
              SUM(if(month(absen.tanggal) = 12 ,absen.status = 'Masuk',0)) AS 'DesemberMasuk',
              SUM(if(month(absen.tanggal) = 12 ,absen.status = 'Sakit',0)) AS 'DesemberSakit',
              SUM(if(month(absen.tanggal) = 12 ,absen.status = 'Izin',0)) AS 'DesemberIzin',
              SUM(if(month(absen.tanggal) = 12 ,absen.status = 'Alpa',0)) AS 'DesemberAlpa',
              SUM(if(month(absen.tanggal) = 12 ,absen.status = 'Cuti',0)) AS 'DesemberCuti'
            FROM `absen`
            JOIN karyawan ON karyawan.karyawan_id = absen.karyawan_id
            WHERE karyawan.lokasi_id = '".$lokasi_id."' 
            AND year(absen.tanggal) = '".$tahun."'
            GROUP BY absen.karyawan_id;
            ");

        return $q;

        //oh god
    }
}

/* End of file Categori_benefit_model.php */
/* Location: ./application/models/Categori_benefit_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-27 05:13:15 */
/* http://harviacode.com */