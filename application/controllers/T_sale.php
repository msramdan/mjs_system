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
        $this->load->model('Spal_model');
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

    public function gey_by_spal(){
        $spal_id = $this->input->post('spal_id');
        if ($spal_id !='' || $spal_id !=null)  {
            $row = $this->Spal_model->get_by_id($spal_id);
            echo json_encode($row);
        }else{
            $row='nodata';
            echo json_encode($row);
        }

        

    }

    public function gen_no_so(){
        $tahun = date('Y');
        $spal_id = $this->input->post('spal_id');
        if ($spal_id !='' || $spal_id !=null)  {
            $sql = "SELECT pelanggan_id from spal where spal_id='$spal_id'";
            $query_kode = $this->db->query($sql);
            $kd1 = $query_kode->row();
            $pelanggan_id = $kd1->pelanggan_id;            
        }else{
            $pelanggan_id ='';
        }

        if ($pelanggan_id !='' || $pelanggan_id !=null)  {
                $sql1 = "SELECT kode_pelanggan from pelanggan where pelanggan_id='$pelanggan_id'";
                $query_kode2 = $this->db->query($sql1);
                $kd1 = $query_kode2->row();
                $kd = $kd1->kode_pelanggan;

                    $sql2= "SELECT MAX(LEFT(no_so,3)) AS no_so FROM t_sale where Left(tanggal,4)='$tahun'";
                    $query = $this->db->query($sql2);

                    if ($query->num_rows()>0) {
                        $row = $query->row();
                        $n = ((int)$row->no_so)+1;
                        $no = sprintf("%'.03d", $n);
                    }else{
                        $no = "001";
                    }

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
                    $hasil =$no.'/SO/MJS-'.$kd.'/'.$fix.'/'.$tahun;
                    echo json_encode($hasil);

        }else{
             $hasil ='';
            echo json_encode($hasil);


        }


        

    }




    public function gen_no_spal()
        {

            $tahun_bulan = date('Y-m');

            $pelanggan_id = $this->input->post('kode');

            if ($pelanggan_id !='' || $pelanggan_id !=null)  {
                $sql1 = "SELECT kode_pelanggan from pelanggan where pelanggan_id='$pelanggan_id'";
                $query_kode = $this->db->query($sql1);
                $kd1 = $query_kode->row();
                $kd = $kd1->kode_pelanggan;
                    $sql= "SELECT LEFT(no_spal,3) AS no_spal FROM spal where Left(tanggal,7)='$tahun_bulan'";
                    $query = $this->db->query($sql);

                    if ($query->num_rows()>0) {
                        $row = $query->row();
                        $n = ((int)$row->no_spal)+1;
                        $no = sprintf("%'.03d", $n);
                    }else{
                        $no = "001";
                    }

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
                    $hasil =$no.'/SPAL/MJS-'.$kd.'/'.$fix.'/'.$tahun;
                    echo json_encode($hasil);

            }else{
                $hasil ='';
                echo json_encode($hasil);

        }
    }

    public function cart_data(){
            $data['cart'] = $this->T_sale_model->get_cart();
            $this->load->view('t_sale/cart_data',$data);

    }

    public function read($id) 
    {
        is_allowed($this->uri->segment(1),'read');
        $row = $this->T_sale_model->get_by_id(decrypt_url($id));
        $detail_so = $this->T_sale_model->get_detail_so(decrypt_url($id));
        if ($row) {
            $data = array(
        'sett_apps' =>$this->Setting_app_model->get_by_id(1),
		't_sale_id' => $row->t_sale_id,
        'detail' => $detail_so,
        'no_so' => $row->no_so,
        'no_spal' => $row->no_spal,
        'nama_user' => $row->nama_user,
        'nama_pelanggan' => $row->nama_pelanggan,
        'attn' => $row->attn,
		'tanggal' => $row->tanggal,
		'sub_price' => $row->sub_price,
		'discount' => $row->discount,
		'final_price' => $row->final_price,
		'note' => $row->note,
        'kapal' => $row->kapal,
        'tongkang' => $row->tongkang,
        'pelabuhan_muat' => $row->pelabuhan_muat,
        'pelabuhan_bongkar' => $row->pelabuhan_bongkar,
        'nama_muatan' => $row->nama_muatan,
        'dokumen' => $row->dokumen,
        'metode_pembayaran' => $row->metode_pembayaran
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
            'spal' =>$this->Spal_model->get_all(),
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

    public function download($gambar){
        force_download('assets/assets/img/spal/'.$gambar,NULL);
    }

     public function pdf($id)
    {
        is_allowed($this->uri->segment(1),'read');
        $this->load->library('dompdf_gen');
       $row = $this->T_sale_model->get_by_id(decrypt_url($id));
       $detail_so = $this->T_sale_model->get_detail_so(decrypt_url($id));
        if ($row) {
            $data = array(
        'sett_apps' =>$this->Setting_app_model->get_by_id(1),
        't_sale_id' => $row->t_sale_id,
        'detail' => $detail_so,
        'no_so' => $row->no_so,
        'no_spal' => $row->no_spal,
        'nama_user' => $row->nama_user,
        'alamat' => $row->alamat,
        'nama_pelanggan' => $row->nama_pelanggan,
        'attn' => $row->attn,
        'tanggal' => $row->tanggal,
        'sub_price' => $row->sub_price,
        'discount' => $row->discount,
        'final_price' => $row->final_price,
        'note' => $row->note,
        'kapal' => $row->kapal,
        'tongkang' => $row->tongkang,
        'pelabuhan_muat' => $row->pelabuhan_muat,
        'pelabuhan_bongkar' => $row->pelabuhan_bongkar,
        'nama_muatan' => $row->nama_muatan,
        'dokumen' => $row->dokumen,
        'metode_pembayaran' => $row->metode_pembayaran
        );
       $this->load->view('t_sale/pdf',$data);
       $paper_size = 'A4';
       $orientation = 'portrait';
       $html = $this->output->get_output();
       $this->dompdf->set_paper($paper_size, $orientation);
       $this->dompdf->load_html($html);
       $this->dompdf->render();
       
       ob_end_clean();
       
       $this->dompdf->stream("laporan_sales_order.pdf", array('Attachment' =>0));
        }
    }


}

/* End of file T_sale.php */
/* Location: ./application/controllers/T_sale.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-10-01 06:19:18 */
/* http://harviacode.com */