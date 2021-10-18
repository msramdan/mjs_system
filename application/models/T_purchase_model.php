<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_purchase_model extends CI_Model
{

    public $table = 't_purchase';
    public $id = 'purchase_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->join('user', 'user.user_id = t_purchase.user_id', 'left');
        $this->db->join('supplier', 'supplier.supplier_id = t_purchase.supplier_id', 'left');
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    function get_detail_po($id){
        $this->db->select('t_purchase_detail.*,item.nama_item,unit.nama_unit');
        $this->db->from('t_purchase_detail');
        $this->db->join('item', 'item.item_id = t_purchase_detail.item_id');
        $this->db->join('unit', 'unit.unit_id = item.unit_id');
        $this->db->where('purchase_id', $id);
        $query = $this->db->get()->result();
        return $query;
    }

    public function get_cart_purchase($params = null){
        $this->db->select('*, item.nama_item as item_name, t_cart_purchase.price as cart_price,unit.nama_unit');
        $this->db->from('t_cart_purchase');
        $this->db->join('item', 'item.item_id = t_cart_purchase.item_id');
        $this->db->join('unit', 'unit.unit_id = item.unit_id');
        if ($params != null) {
            $this->db->where($params);
        }
        $this->db->where('user_id', $this->session->userdata('userid'));
        $query = $this->db->get();
        return $query;
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('purchase_id', $q);
	$this->db->or_like('no_purchase', $q);
	$this->db->or_like('user_id', $q);
	$this->db->or_like('tanggal', $q);
	$this->db->or_like('final_price', $q);
	$this->db->or_like('note', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function cart_del($params = null){
        if ($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('t_cart_purchase');
    }

    public function edit_cart_data($post){
        $params =array(
            'price' =>$post['price'],
            'qty' =>$post['qty'],
            'total' =>$post['total'],

        );
        $this->db->where('cart_id',$post['cart_id']);
        $this->db->update('t_cart_purchase',$params);

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

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    public function update_qty($post){
        $sql = "UPDATE t_cart_purchase SET price ='$post[estimasi_harga]',
                qty = qty + '$post[qty]',
                total = '$post[estimasi_harga]'*qty where item_id='$post[item_id]'";
        $this->db->query($sql);
    }

    public function add_cart($post){
        $params=array(
            'item_id' =>$post['item_id'],
            'price' =>$post['estimasi_harga'],
            'qty' =>$post['qty'],
            'total' =>($post['estimasi_harga'] * $post['qty']),
            'user_id' =>$this->session->userdata('userid'),

        );
        $this->db->insert('t_cart_purchase',$params);
    }

    public function add_purchase($post){
        $params=array(
            'no_purchase' =>$post['no_po'],
            'subtotal' =>$post['subtotal'],
            'discount' =>$post['discount'],
            'grandtotal' =>$post['grandtotal'],
            'note' =>$post['note'],
            'tanggal' =>$post['tanggal'],
            'order_deadline' =>$post['order_deadline'],
            'receipt_date' =>$post['receipt_date'],
            'user_id' =>$this->fungsi->user_login()->user_id

        );
        $this->db->insert('t_purchase',$params);
        return $this->db->insert_id();
    }

    public function add_purchase_detail($params){
        $this->db->insert_batch('t_purchase_detail',$params);
    }

    public function auto_no_po()
    {
        $sql= "SELECT MAX(MID(no_purchase,9,4)) AS no_purchase
        FROM t_purchase
        where MID(no_purchase,3,6) = DATE_FORMAT(CURDATE(),'%y%m%d')";
        $query = $this->db->query($sql);
        if ($query->num_rows()>0) {
            $row = $query->row();
            $n = ((int)$row->no_purchase)+1;
            $no = sprintf("%'.04d", $n);
        }else{
            $no = "0001";
        }
        $no_purchase = "PO".date('ymd').$no;
        return $no_purchase;
    }


}

/* End of file T_purchase_model.php */
/* Location: ./application/models/T_purchase_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-10-08 06:20:35 */
/* http://harviacode.com */