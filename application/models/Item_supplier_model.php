<?php
class Item_supplier_model extends CI_Model{
 
    function data_list($id){
        $hasil=$this->db->query("SELECT item_supplier.*,supplier.nama_supplier FROM item_supplier join supplier on supplier.supplier_id=item_supplier.supplier_id where item_id='$id'");
        return $hasil->result();
    }
 
    function simpan_data($item_id_modal,$supplier_id_modal,$kd_eksternal_modal,$estimasi_harga_supplier_modal,$update_tgl_modal){
        $hasil=$this->db->query("INSERT INTO item_supplier (item_id,supplier_id,kd_eksternal,estimasi_harga_supplier,update_tgl)VALUES('$item_id_modal','$supplier_id_modal','$kd_eksternal_modal','$estimasi_harga_supplier_modal','$update_tgl_modal')");
        return $hasil;
    }
 
    function get_data_by_id($id){
        $hsl=$this->db->query("SELECT * FROM item_supplier WHERE item_supplier_id='$id'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'item_supplier_id' => $data->item_supplier_id,
                    'item_id' => $data->item_id,
                    'supplier_id' => $data->supplier_id,
                    'kd_eksternal' => $data->kd_eksternal,
                    'estimasi_harga_supplier' => $data->estimasi_harga_supplier,
                    'update_tgl' => $data->update_tgl,
                    );
            }
        }
        return $hasil;
    }
 
    function update_data($id,$data){
        $this->db->where('item_supplier_id', $id);
        $this->db->update('item_supplier', $data);
    }
 
    function hapus_data($nama){
        $hasil=$this->db->query("DELETE FROM item_supplier WHERE item_supplier_id='$nama'");
        return $hasil;
    }
     
}