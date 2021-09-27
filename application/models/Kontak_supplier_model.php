<?php
class Kontak_supplier_model extends CI_Model{
 
    function data_list($supplier_id){
        $hasil=$this->db->query("SELECT * FROM kontak_supplier where supplier_id='$supplier_id'");
        return $hasil->result();
    }
 
    function simpan_data($supplier_id,$nama,$title_jabatan,$telepon){
        $hasil=$this->db->query("INSERT INTO kontak_supplier (supplier_id,nama,title_jabatan,telepon)VALUES('$supplier_id','$nama','$title_jabatan','$telepon')");
        return $hasil;
    }
 
    function get_data_by_id($id){
        $hsl=$this->db->query("SELECT * FROM kontak_supplier WHERE kontak_supplier_id='$id'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'kontak_supplier_id' => $data->kontak_supplier_id,
                    'supplier_id' => $data->supplier_id,
                    'nama' => $data->nama,
                    'title_jabatan' => $data->title_jabatan,
                    'telepon' => $data->telepon,
                    );
            }
        }
        return $hasil;
    }
 
    function update_data($id,$arr){
        $this->db->where('kontak_supplier_id', $id);
        $this->db->update('kontak_supplier', $arr);
    }
 
    function hapus_data($nama){
        $hasil=$this->db->query("DELETE FROM kontak_supplier WHERE kontak_supplier_id='$nama'");
        return $hasil;
    }
     
}