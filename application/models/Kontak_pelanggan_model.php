<?php
class Kontak_pelanggan_model extends CI_Model{
 
    function data_list(){
        $hasil=$this->db->query("SELECT * FROM kontak_pelanggan");
        return $hasil->result();
    }
 
    function simpan_data($pelanggan_id,$nama,$title_jabatan,$telepon){
        $hasil=$this->db->query("INSERT INTO kontak_pelanggan (pelanggan_id,nama,title_jabatan,telepon)VALUES('$pelanggan_id','$nama','$title_jabatan','$telepon')");
        return $hasil;
    }
 
    function get_data_by_id($id){
        $hsl=$this->db->query("SELECT * FROM kontak_pelanggan WHERE kontak_pelanggan_id='$id'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'kontak_pelanggan_id' => $data->kontak_pelanggan_id,
                    'pelanggan_id' => $data->pelanggan_id,
                    'nama' => $data->nama,
                    'title_jabatan' => $data->title_jabatan,
                    'telepon' => $data->telepon,
                    );
            }
        }
        return $hasil;
    }
 
    function update_data($id,$data){
        $this->db->where('kontak_pelanggan_id', $id);
        $this->db->update('kontak_pelanggan', $data);
    }
 
    function hapus_data($nama){
        $hasil=$this->db->query("DELETE FROM kontak_pelanggan WHERE kontak_pelanggan_id='$nama'");
        return $hasil;
    }
     
}