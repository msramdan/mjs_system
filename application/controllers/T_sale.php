<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_sale extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('T_sale_model');
        $this->load->model('Item_model');
        $this->load->model('Pelanggan_model');
        $this->load->model('Setting_app_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        is_allowed($this->uri->segment(1),null);
        $t_sale = $this->T_sale_model->get_all();
        $data = array(
            't_sale_data' => $t_sale,
            'sett_apps' =>$this->Setting_app_model->get_by_id(1),
        );
        $this->template->load('template','t_sale/t_sale_list', $data);
    }

        public function cek_alamat()
        {

            $pelanggan_id = $this->input->post('kode');

            if ($pelanggan_id !='' || $pelanggan_id !=null)  {
                $sql1 = "SELECT alamat from pelanggan where pelanggan_id='$pelanggan_id'";
                $query_kode = $this->db->query($sql1);
                $kd1 = $query_kode->row();
                $alamat = $kd1->alamat;
                
            }else{
                $alamat = '-';
            }
            echo "$alamat";

        }

    public function data_item()
        {

            $item_id = $this->input->post('item_id');

            if ($item_id!='' || $item_id !=null) {
                $sql2 = "SELECT estimasi_harga from item where item_id='$item_id'";
                $query_kode2 = $this->db->query($sql2);
                $kd2 = $query_kode2->row();
                $data = array(
                    'estimasi_harga'      =>  $kd2->estimasi_harga
                );
                echo json_encode($data);
            }else{
                $data = array(
                    'estimasi_harga'      =>  0,
                );
                echo json_encode($data);
            }            
        }

    public function coba()
        {
            $tahun_bulan = date('Y-m');

            $pelanggan_id = $this->input->post('kode');
            $item_id = $this->input->post('item_id');

            if ($pelanggan_id !='' || $pelanggan_id !=null)  {
                $sql1 = "SELECT kode_pelanggan from pelanggan where pelanggan_id='$pelanggan_id'";
                $query_kode = $this->db->query($sql1);
                $kd1 = $query_kode->row();
                $kd = $kd1->kode_pelanggan;
                
            }else{
                $kd = '-';
            }

            if ($item_id!='' || $item_id !=null) {
                $sql2 = "SELECT kd_internal_item from item where item_id='$item_id'";
                $query_kode2 = $this->db->query($sql2);
                $kd2 = $query_kode2->row();
                $kd2 = $kd2->kd_internal_item;
                
            }else{
                $kd2 = '-';
            }

            $sql= "SELECT LEFT(invoice,3) AS invoice_no FROM t_sale where Left(tanggal,7)='$tahun_bulan'";
            $query = $this->db->query($sql);

            if ($query->num_rows()>0) {
                $row = $query->row();
                $n = ((int)$row->invoice_no)+1;
                $no = sprintf("%'.03d", $n);
            }else{
                $no = "001";
            }
            $invoice = $no;

            $bulan = date('m');
            if ($bulan==1) {
                $fix='I';
            }else if ($bulan==2) {
                $fix='II';
            }else if ($bulan==3) {
                $fix='III';
            }else if ($bulan==4) {
                $fix='IV';
            }else if ($bulan==5) {
                $fix='V';
            }else if ($bulan==6) {
                $fix='VI';
            }else if ($bulan==7) {
                $fix='VII';
            }else if ($bulan==8) {
                $fix='VIII';
            }else if ($bulan==9) {
                $fix='IX';
            }else if ($bulan==10) {
                $fix='X';
            }else if ($bulan==11) {
                $fix='XI';
            }else{
                $fix='XII';
            }
            $tahun = date('Y');
            $hasil =$no.'/'.$kd2.'/MJS-'.$kd.'/'.$fix.'/'.$tahun;
            echo "$hasil";
        }

    public function cart_data(){
            $data['cart'] = $this->T_sale_model->get_cart();
            $this->load->view('t_sale/cart_data',$data);

    }

    public function read($id) 
    {
        is_allowed($this->uri->segment(1),'read');
        $row = $this->T_sale_model->get_by_id(decrypt_url($id));
        if ($row) {
            $data = array(
		't_sale_id' => $row->t_sale_id,
		'invoice' => $row->invoice,
		'pelanggan_id' => $row->pelanggan_id,
		'user_id' => $row->user_id,
		'tanggal' => $row->tanggal,
		'attn' => $row->attn,
		'sub_price' => $row->sub_price,
		'discount' => $row->discount,
		'final_price' => $row->final_price,
		'note' => $row->note,
	    );
            $this->template->load('template','t_sale/t_sale_read', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('t_sale'));
        }
    }

    public function create() 
    {
        is_allowed($this->uri->segment(1),'create');
        $cart = $this->T_sale_model->get_cart();
        $data = array(
            'button' => 'Create',
            'cart' =>$cart,
            'pelanggan' =>$this->Pelanggan_model->get_all(),
            'jasa' =>$this->Item_model->get_all_service(),
            'sett_apps' =>$this->Setting_app_model->get_by_id(1),
            'action' => site_url('t_sale/create_action'),
	    't_sale_id' => set_value('t_sale_id'),
	    'invoice' => set_value('invoice'),
	    'pelanggan_id' => set_value('pelanggan_id'),
	    'user_id' => set_value('user_id'),
	    'tanggal' => set_value('tanggal'),
	    'attn' => set_value('attn'),
	    'sub_price' => set_value('sub_price'),
	    'discount' => set_value('discount'),
	    'final_price' => set_value('final_price'),
	    'note' => set_value('note'),
	);
        $this->template->load('template','t_sale/t_sale_form', $data);
    }
    
    public function create_action() 
    {
        is_allowed($this->uri->segment(1),'create');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'invoice' => $this->input->post('invoice',TRUE),
		'pelanggan_id' => $this->input->post('pelanggan_id',TRUE),
		'user_id' => $this->input->post('user_id',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'attn' => $this->input->post('attn',TRUE),
		'sub_price' => $this->input->post('sub_price',TRUE),
		'discount' => $this->input->post('discount',TRUE),
		'final_price' => $this->input->post('final_price',TRUE),
		'note' => $this->input->post('note',TRUE),
	    );

            $this->T_sale_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t_sale'));
        }
    }
    
    public function update($id) 
    {
        is_allowed($this->uri->segment(1),'update');
        $row = $this->T_sale_model->get_by_id(decrypt_url($id));

        if ($row) {
            $data = array(
                'button' => 'Update',
                'sett_apps' =>$this->Setting_app_model->get_by_id(1),
                'action' => site_url('t_sale/update_action'),
		't_sale_id' => set_value('t_sale_id', $row->t_sale_id),
		'invoice' => set_value('invoice', $row->invoice),
		'pelanggan_id' => set_value('pelanggan_id', $row->pelanggan_id),
		'user_id' => set_value('user_id', $row->user_id),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'attn' => set_value('attn', $row->attn),
		'sub_price' => set_value('sub_price', $row->sub_price),
		'discount' => set_value('discount', $row->discount),
		'final_price' => set_value('final_price', $row->final_price),
		'note' => set_value('note', $row->note),
	    );
            $this->template->load('template','t_sale/t_sale_form', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('t_sale'));
        }
    }
    
    public function update_action() 
    {
        is_allowed($this->uri->segment(1),'update');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('t_sale_id', TRUE));
        } else {
            $data = array(
		'invoice' => $this->input->post('invoice',TRUE),
		'pelanggan_id' => $this->input->post('pelanggan_id',TRUE),
		'user_id' => $this->input->post('user_id',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'attn' => $this->input->post('attn',TRUE),
		'sub_price' => $this->input->post('sub_price',TRUE),
		'discount' => $this->input->post('discount',TRUE),
		'final_price' => $this->input->post('final_price',TRUE),
		'note' => $this->input->post('note',TRUE),
	    );

            $this->T_sale_model->update($this->input->post('t_sale_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t_sale'));
        }
    }
    
    public function delete($id) 
    {
        is_allowed($this->uri->segment(1),'delete');
        $row = $this->T_sale_model->get_by_id(decrypt_url($id));

        if ($row) {
            $this->T_sale_model->delete(decrypt_url($id));
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t_sale'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('t_sale'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('invoice', 'invoice', 'trim|required');
	$this->form_validation->set_rules('pelanggan_id', 'customer id', 'trim|required');
	$this->form_validation->set_rules('user_id', 'user id', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('attn', 'attn', 'trim|required');
	$this->form_validation->set_rules('sub_price', 'sub price', 'trim|required');
	$this->form_validation->set_rules('discount', 'discount', 'trim|required');
	$this->form_validation->set_rules('final_price', 'final price', 'trim|required');
	$this->form_validation->set_rules('note', 'note', 'trim|required');

	$this->form_validation->set_rules('t_sale_id', 't_sale_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function process(){
        $data = $this->input->post(null, TRUE);
        if (isset($_POST['add_cart'])) {
            $item_id = $this->input->post('item_id');

            $check_cart = $this->T_sale_model->get_cart([
                't_cart.item_id' => $item_id
            ])->num_rows();

            if ($check_cart > 0) {
                $this->T_sale_model->update_qty($data);
            }else{
                $this->T_sale_model->add_cart($data);
            }
            if($this->db->affected_rows() > 0){
                $params = array("success" => true);
            }else{
                $params = array("success" => false);
            }
            echo json_encode($params);
        }

        if (isset($_POST['edit_cart'])) {
            $this->T_sale_model->edit_cart_data($data); 

            if($this->db->affected_rows() > 0){

            $params = array("success" => true);
            }else{
                $params = array("success" => false);
            }
            echo json_encode($params);
        }

        if (isset($_POST['process_payment'])) {
            $sale_id = $this->T_sale_model->add_sale($data);
            $cart = $this->T_sale_model->get_cart()->result();
            $row = [];
            foreach ($cart as $c => $value) {
                array_push($row, array(
                    'sale_id' =>$sale_id,
                    'item_id' =>$value->item_id,
                    'price' =>$value->cart_price,
                    'qty' =>$value->qty,
                    'qty_asli' =>$value->qty_asli,
                    'unit' =>$value->unit,
                    'discount_item' =>$value->discount_item,
                    'total' =>$value->total,
                ));
            }
            $this->T_sale_model->add_sale_detail($row);
            //potong stock barang
            $this->T_sale_model->cart_del(['user_id' =>$this->session->userdata('userid')]);

            if($this->db->affected_rows() > 0){

            $params = array("success" => true, "sale_id" =>$sale_id);
            }else{
                $params = array("success" => false);
            }
            echo json_encode($params);
        }       
    }

    public function del_cart(){
        if (isset($_POST['cancel_payment'])) {
            $this->T_sale_model->cart_del(['user_id' =>$this->session->userdata('userid')]);
        }else{
            $cart_id = $this->input->post('cart_id');
            $this->T_sale_model->cart_del(['cart_id' => $cart_id]);
        }        

        if($this->db->affected_rows() > 0){
                $params = array("success" => true);
            }else{
                $params = array("success" => false);
            }
            echo json_encode($params);
    }

}

/* End of file T_sale.php */
/* Location: ./application/controllers/T_sale.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-10-01 06:19:18 */
/* http://harviacode.com */