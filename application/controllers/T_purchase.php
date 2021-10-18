<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_purchase extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('T_purchase_model');
        $this->load->model('Item_model');
        $this->load->model('Supplier_model');
        $this->load->model('Setting_app_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        is_allowed($this->uri->segment(1),null);

        $t_purchase = $this->T_purchase_model->get_all();
        $data = array(
            't_purchase_data' => $t_purchase,
            'sett_apps' =>$this->Setting_app_model->get_by_id(1),
        );
        $this->template->load('template','t_purchase/t_purchase_list', $data);
    }

    public function read($id) 
    {
        is_allowed($this->uri->segment(1),'read');
        $row = $this->T_purchase_model->get_by_id(decrypt_url($id));
        $detail_po = $this->T_purchase_model->get_detail_po(decrypt_url($id));

        if ($row) {
            $data = array(
		'purchase_id' => $row->purchase_id,
        'detail' => $detail_po,
        'sett_apps' =>$this->Setting_app_model->get_by_id(1),
		'no_purchase' => $row->no_purchase,
        'order_deadline' => $row->order_deadline,
        'receipt_date' => $row->receipt_date,
		'nama_user' => $row->nama_user,
		'tanggal' => $row->tanggal,
		'grandtotal' => $row->grandtotal,
		'note' => $row->note,
	    );
            $this->template->load('template','t_purchase/t_purchase_read', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('t_purchase'));
        }
    }

    public function get_item_by_id(){
        $item_id = $this->input->post('item_id');
        $sql = "select * from item where item_id='$item_id'";
        $subMenu = $this->db->query($sql)->row();
        echo json_encode($subMenu);
    }

    public function create() 
    {
        is_allowed($this->uri->segment(1),'create');
        $cart = $this->T_purchase_model->get_cart_purchase();
        $data = array(
            'button' => 'Create',
            'no_po'=>$this->T_purchase_model->auto_no_po(),
            'cart' =>$cart,
            'supplier' =>$this->Supplier_model->get_all(),
            'item' =>$this->Item_model->get_all_wtf(),
            'sett_apps' =>$this->Setting_app_model->get_by_id(1),
            'action' => site_url('t_purchase/create_action'),
	    'purchase_id' => set_value('purchase_id'),
	    'no_purchase' => set_value('no_purchase'),
	    'user_id' => set_value('user_id'),
	    'tanggal' => set_value('tanggal'),
	    'final_price' => set_value('final_price'),
	    'note' => set_value('note'),
	);
        $this->template->load('template','t_purchase/t_purchase_form', $data);
    }
    
    public function create_action() 
    {
        is_allowed($this->uri->segment(1),'create');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'no_purchase' => $this->input->post('no_purchase',TRUE),
		'user_id' => $this->input->post('user_id',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'final_price' => $this->input->post('final_price',TRUE),
		'note' => $this->input->post('note',TRUE),
	    );

            $this->T_purchase_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t_purchase'));
        }
    }
    
    public function update($id) 
    {
        is_allowed($this->uri->segment(1),'update');
        $row = $this->T_purchase_model->get_by_id(decrypt_url($id));

        if ($row) {
            $data = array(
                'button' => 'Update',
                'sett_apps' =>$this->Setting_app_model->get_by_id(1),
                'action' => site_url('t_purchase/update_action'),
		'purchase_id' => set_value('purchase_id', $row->purchase_id),
		'no_purchase' => set_value('no_purchase', $row->no_purchase),
		'user_id' => set_value('user_id', $row->user_id),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'final_price' => set_value('final_price', $row->final_price),
		'note' => set_value('note', $row->note),
	    );
            $this->template->load('template','t_purchase/t_purchase_form', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('t_purchase'));
        }
    }
    
    public function update_action() 
    {
        is_allowed($this->uri->segment(1),'update');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('purchase_id', TRUE));
        } else {
            $data = array(
		'no_purchase' => $this->input->post('no_purchase',TRUE),
		'user_id' => $this->input->post('user_id',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'final_price' => $this->input->post('final_price',TRUE),
		'note' => $this->input->post('note',TRUE),
	    );

            $this->T_purchase_model->update($this->input->post('purchase_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t_purchase'));
        }
    }
    
    public function delete($id) 
    {
        is_allowed($this->uri->segment(1),'delete');
        $row = $this->T_purchase_model->get_by_id(decrypt_url($id));

        if ($row) {
            $this->T_purchase_model->delete(decrypt_url($id));
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t_purchase'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('t_purchase'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('no_purchase', 'no purchase', 'trim|required');
	$this->form_validation->set_rules('user_id', 'user id', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('final_price', 'final price', 'trim|required');
	$this->form_validation->set_rules('note', 'note', 'trim|required');

	$this->form_validation->set_rules('purchase_id', 'purchase_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        is_allowed($this->uri->segment(1),'read');
        $this->load->helper('exportexcel');
        $namaFile = "t_purchase.xls";
        $judul = "t_purchase";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "No Purchase");
	xlsWriteLabel($tablehead, $kolomhead++, "User Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
	xlsWriteLabel($tablehead, $kolomhead++, "Final Price");
	xlsWriteLabel($tablehead, $kolomhead++, "Note");

	foreach ($this->T_purchase_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_purchase);
	    xlsWriteNumber($tablebody, $kolombody++, $data->user_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
	    xlsWriteNumber($tablebody, $kolombody++, $data->final_price);
	    xlsWriteLabel($tablebody, $kolombody++, $data->note);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

        public function process(){
        $data = $this->input->post(null, TRUE);
        if (isset($_POST['add_cart'])) {
            $item_id = $this->input->post('item_id');

            $check_cart = $this->T_purchase_model->get_cart_purchase([
                't_cart_purchase.item_id' => $item_id
            ])->num_rows();

            if ($check_cart > 0) {
                $this->T_purchase_model->update_qty($data);
            }else{
                $this->T_purchase_model->add_cart($data);
            }
            
            if($this->db->affected_rows() > 0){
                $params = array("success" => true);
            }else{
                $params = array("success" => false);
            }
            echo json_encode($params);
        }

        if (isset($_POST['edit_cart'])) {
            $this->T_purchase_model->edit_cart_data($data); 

            if($this->db->affected_rows() > 0){

            $params = array("success" => true);
            }else{
                $params = array("success" => false);
            }
            echo json_encode($params);
        }

        if (isset($_POST['process_payment'])) {
            $purchase_id = $this->T_purchase_model->add_purchase($data);
            $cart = $this->T_purchase_model->get_cart_purchase()->result();
            $row = [];
            foreach ($cart as $c => $value) {
                array_push($row, array(
                    'purchase_id' =>$purchase_id,
                    'item_id' =>$value->item_id,
                    'price' =>$value->cart_price,
                    'qty' =>$value->qty,
                    'total' =>$value->total,
                ));
            }
            $this->T_purchase_model->add_purchase_detail($row);
            //potong stock barang
            $this->T_purchase_model->cart_del(['user_id' =>$this->session->userdata('userid')]);

            if($this->db->affected_rows() > 0){

            $params = array("success" => true, "purchase_id" =>$purchase_id);
            }else{
                $params = array("success" => false);
            }
            echo json_encode($params);
        }       
    }

    public function cart_data(){
            $data['cart'] = $this->T_purchase_model->get_cart_purchase();
            $this->load->view('t_purchase/cart_data',$data);

    }

    public function del_cart(){
        if (isset($_POST['cancel_payment'])) {
            $this->T_purchase_model->cart_del(['user_id' =>$this->session->userdata('userid')]);
        }else{
            $cart_id = $this->input->post('cart_id');
            $this->T_purchase_model->cart_del(['cart_id' => $cart_id]);
        }        

        if($this->db->affected_rows() > 0){
                $params = array("success" => true);
            }else{
                $params = array("success" => false);
            }
            echo json_encode($params);
    }

     public function pdf($id)
    {
        is_allowed($this->uri->segment(1),'read');
        $this->load->library('dompdf_gen');

       $row = $this->T_purchase_model->get_by_id(decrypt_url($id));
       $detail_po = $this->T_purchase_model->get_detail_po(decrypt_url($id));
        if ($row) {
            $data = array(
                'purchase_id' => $row->purchase_id,
                'sett_apps' =>$this->Setting_app_model->get_by_id(1),
                'no_purchase' => $row->no_purchase,
                'attn' => $row->attn,
                'detail' => $detail_po,
                'nama_supplier' => $row->nama_supplier,
                'alamat' => $row->alamat,
                'order_deadline' => $row->order_deadline,
                'receipt_date' => $row->receipt_date,
                'nama_user' => $row->nama_user,
                'tanggal' => $row->tanggal,
                'grandtotal' => $row->grandtotal,
                'note' => $row->note,
                );

       $this->load->view('t_purchase/pdf',$data);
       $paper_size = 'A4';
       $orientation = 'portrait';
       $html = $this->output->get_output();
       $this->dompdf->set_paper($paper_size, $orientation);
       $this->dompdf->load_html($html);
       $this->dompdf->render();
       
       ob_end_clean();
       
       $this->dompdf->stream("laporan_purchase_order.pdf", array('Attachment' =>0));
        }
    }


}

/* End of file T_purchase.php */
/* Location: ./application/controllers/T_purchase.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-10-08 06:20:35 */
/* http://harviacode.com */