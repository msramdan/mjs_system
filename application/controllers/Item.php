<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Item extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Setting_app_model');
        $this->load->model('Coa_model');
        $this->load->model('Supplier_model');
        $this->load->model('Item_model');
        $this->load->model('Kategori_model');
        $this->load->model('Unit_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        is_allowed($this->uri->segment(1),null);
        $item = $this->Item_model->get_all();
        $data = array(
            'item_data' => $item,
            'sett_apps' =>$this->Setting_app_model->get_by_id(1),
        );
        $this->template->load('template','item/item_list', $data);
    }

    public function read($id) 
    {
        is_allowed($this->uri->segment(1),'read');
        $row = $this->Item_model->get_by_id(decrypt_url($id));
        if ($row) {
            $data = array(
		'item_id' => $row->item_id,
        'sett_apps' =>$this->Setting_app_model->get_by_id(1),
		'kd_internal_item' => $row->kd_internal_item,
		'nama_item' => $row->nama_item,
		'kategori_id' => $row->kategori_id,
		'unit_id' => $row->unit_id,
		'deskripsi' => $row->deskripsi,
        'type' => $row->type,
		'estimasi_harga' => $row->estimasi_harga,
		'stok' => $row->stok,
	    );
            $this->template->load('template','item/item_read', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('item'));
        }
    }

    public function create() 
    {
        is_allowed($this->uri->segment(1),'create');
        $data = array(
            'button' => 'Create',
            'coa' =>$this->Coa_model->get_all(),
            'supplier' =>$this->Supplier_model->get_all(),
            'sett_apps' =>$this->Setting_app_model->get_by_id(1),
            'kategori' =>$this->Kategori_model->get_all(),
            'unit' =>$this->Unit_model->get_all(),
            'kodeunik' =>$this->Item_model->buat_kode(),
            'action' => site_url('item/create_action'),
	    'item_id' => set_value('item_id'),
	    'kd_internal_item' => set_value('kd_internal_item'),
	    'nama_item' => set_value('nama_item'),
	    'kategori_id' => set_value('kategori_id'),
	    'unit_id' => set_value('unit_id'),
	    'deskripsi' => set_value('deskripsi'),
        'type' => set_value('type'),
	    'estimasi_harga' => set_value('estimasi_harga'),
        'diskon' => set_value('diskon'),
	    'stok' => set_value('stok'),
        'akun_beban' => set_value('akun_beban'),
        'akun_return_pembelian' => set_value('akun_return_pembelian'),
        'akun_penjualan' => set_value('akun_penjualan'),
        'akun_return_penjualan' => set_value('akun_return_penjualan'),
	);
        $this->template->load('template','item/item_form', $data);
    }
    
    public function create_action() 
    {
        is_allowed($this->uri->segment(1),'create');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $type =$_POST['type'];

            if ($type =='Non Persediaan') {
                        // input data item 
                    $data = array(
                        'kd_internal_item' => $this->input->post('kd_internal_item',TRUE),
                        'nama_item' => $this->input->post('nama_item',TRUE),
                        'kategori_id' => $this->input->post('kategori_id',TRUE),
                        'unit_id' => $this->input->post('unit_id',TRUE),
                        'deskripsi' => $this->input->post('deskripsi',TRUE),
                        'type' => $this->input->post('type',TRUE),
                        'estimasi_harga' => $this->input->post('estimasi_harga',TRUE),
                        'diskon' => $this->input->post('diskon',TRUE),
                        'akun_beban' => $this->input->post('akun_beban',TRUE),
                        'akun_return_pembelian' => $this->input->post('akun_return_pembelian',TRUE),
                        'akun_penjualan' => $this->input->post('akun_penjualan',TRUE),
                        'akun_return_penjualan' => $this->input->post('akun_return_penjualan',TRUE),
                        );
                        $this->Item_model->insert($data);
                        $item_id = $this->db->insert_id();
                    // input data item supplier
                        $supplier_id                = $_POST['supplier_id'];
                        $kd_eksternal               = $_POST['kd_eksternal'];
                        $estimasi_harga_supplier    = $_POST['estimasi_harga_supplier'];
                        $update_tgl                 = $_POST['update_tgl']; 
                        $jml_data_supplier  = $_POST['supplier_id'];
                        $jumlah_data = count($jml_data_supplier);
                        for($i = 0; $i < $jumlah_data;$i++)
                        {
                            $arr['item_id'] = $item_id;
                            $arr['supplier_id'] = $supplier_id[$i];
                            $arr['kd_eksternal'] = $kd_eksternal[$i];
                            $arr['estimasi_harga_supplier'] = $estimasi_harga_supplier[$i];
                            $arr['update_tgl'] = $update_tgl[$i];
                            $this->db->insert('item_supplier',$arr);       
                        }
            }else{
                $data = array(
                        'kd_internal_item' => $this->input->post('kd_internal_item',TRUE),
                        'nama_item' => $this->input->post('nama_item',TRUE),
                        'kategori_id' => $this->input->post('kategori_id',TRUE),
                        'unit_id' => $this->input->post('unit_id',TRUE),
                        'deskripsi' => $this->input->post('deskripsi',TRUE),
                        'type' => $this->input->post('type',TRUE),
                        'estimasi_harga' => $this->input->post('estimasi_harga',TRUE),
                        'diskon' => $this->input->post('diskon',TRUE),
                        'akun_beban' => $this->input->post('akun_beban',TRUE),
                        'akun_return_pembelian' => $this->input->post('akun_return_pembelian',TRUE),
                        'akun_penjualan' => $this->input->post('akun_penjualan',TRUE),
                        'akun_return_penjualan' => $this->input->post('akun_return_penjualan',TRUE),
                        );
                        $this->Item_model->insert($data);
                        $item_id = $this->db->insert_id();

            }
            
                
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('item'));
        }
    }
    
    public function update($id) 
    {
        is_allowed($this->uri->segment(1),'update');
        $row = $this->Item_model->get_by_id(decrypt_url($id));

        if ($row) {
            $data = array(
                'button' => 'Update',
                'supplier' =>$this->Supplier_model->get_all(),
                'coa' =>$this->Coa_model->get_all(),
                'kategori' =>$this->Kategori_model->get_all(),
                'unit' =>$this->Unit_model->get_all(),
                'sett_apps' =>$this->Setting_app_model->get_by_id(1),
                'action' => site_url('item/update_action'),
		'item_id' => set_value('item_id', $row->item_id),
		'kd_internal_item' => set_value('kd_internal_item', $row->kd_internal_item),
		'nama_item' => set_value('nama_item', $row->nama_item),
		'kategori_id' => set_value('kategori_id', $row->kategori_id),
		'unit_id' => set_value('unit_id', $row->unit_id),
        'type' => set_value('type', $row->type),
		'deskripsi' => set_value('deskripsi', $row->deskripsi),
        'diskon' => set_value('diskon', $row->diskon),
		'estimasi_harga' => set_value('estimasi_harga', $row->estimasi_harga),
		'stok' => set_value('stok', $row->stok),
        'akun_beban' => set_value('akun_beban', $row->akun_beban),
        'akun_return_pembelian' => set_value('akun_return_pembelian', $row->akun_return_pembelian),
        'akun_penjualan' => set_value('akun_penjualan', $row->akun_penjualan),
        'akun_return_penjualan' => set_value('akun_return_penjualan', $row->akun_return_penjualan),

        
	    );
            

            $this->template->load('template','item/item_form', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('item'));
        }
    }
    
    public function update_action() 
    {
        is_allowed($this->uri->segment(1),'update');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('item_id', TRUE));
        } else {
        $type =$_POST['type'];

        if ($type =='Non Persediaan') {

            $data = array(
                'kd_internal_item' => $this->input->post('kd_internal_item',TRUE),
                'nama_item' => $this->input->post('nama_item',TRUE),
                'kategori_id' => $this->input->post('kategori_id',TRUE),
                'unit_id' => $this->input->post('unit_id',TRUE),
                'deskripsi' => $this->input->post('deskripsi',TRUE),
                'type' => $this->input->post('type',TRUE),
                'estimasi_harga' => $this->input->post('estimasi_harga',TRUE),
                'diskon' => $this->input->post('diskon',TRUE),
                'akun_beban' => $this->input->post('akun_beban',TRUE),
                'akun_return_pembelian' => $this->input->post('akun_return_pembelian',TRUE),
                'akun_penjualan' => $this->input->post('akun_penjualan',TRUE),
                'akun_return_penjualan' => $this->input->post('akun_return_penjualan',TRUE),
                );
                $this->Item_model->update($this->input->post('item_id', TRUE), $data);
                        $item_id = $this->input->post('item_id');
                    // input data item supplier
                        $supplier_id                = $_POST['supplier_id'];
                        $kd_eksternal               = $_POST['kd_eksternal'];
                        $estimasi_harga_supplier    = $_POST['estimasi_harga_supplier']; 
                        $update_tgl                 = $_POST['update_tgl']; 
                        $jml_data_supplier  = $_POST['supplier_id'];
                        $jumlah_data = count($jml_data_supplier);
                        for($i = 0; $i < $jumlah_data;$i++)
                        {
                            $arr['item_id'] = $item_id;
                            $arr['supplier_id'] = $supplier_id[$i];
                            $arr['kd_eksternal'] = $kd_eksternal[$i];
                            $arr['estimasi_harga_supplier'] = $estimasi_harga_supplier[$i];
                            $arr['update_tgl'] = $update_tgl[$i];
                            $this->db->insert('item_supplier',$arr);       
                        }

        }else{
            $data = array(
                'kd_internal_item' => $this->input->post('kd_internal_item',TRUE),
                'nama_item' => $this->input->post('nama_item',TRUE),
                'kategori_id' => $this->input->post('kategori_id',TRUE),
                'unit_id' => $this->input->post('unit_id',TRUE),
                'deskripsi' => $this->input->post('deskripsi',TRUE),
                'type' => $this->input->post('type',TRUE),
                'estimasi_harga' => $this->input->post('estimasi_harga',TRUE),
                'diskon' => $this->input->post('diskon',TRUE),
                'akun_beban' => $this->input->post('akun_beban',TRUE),
                'akun_return_pembelian' => $this->input->post('akun_return_pembelian',TRUE),
                'akun_penjualan' => $this->input->post('akun_penjualan',TRUE),
                'akun_return_penjualan' => $this->input->post('akun_return_penjualan',TRUE),
                );
                $this->Item_model->update($this->input->post('item_id', TRUE), $data);
        }




           
            
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('item'));
        }
    }
    
    public function delete($id) 
    {
        is_allowed($this->uri->segment(1),'delete');
        $row = $this->Item_model->get_by_id(decrypt_url($id));

        if ($row) {
            $this->Item_model->delete(decrypt_url($id));
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('item'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('item'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kd_internal_item', 'kd internal item', 'trim|required');
	$this->form_validation->set_rules('nama_item', 'nama item', 'trim|required');
	$this->form_validation->set_rules('kategori_id', 'Nama kategori', 'trim|required');
    $this->form_validation->set_rules('type', 'Type', 'trim|required');
	$this->form_validation->set_rules('unit_id', 'unit id', 'trim|required');
	$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
	$this->form_validation->set_rules('estimasi_harga', 'estimasi harga', 'trim');
	$this->form_validation->set_rules('item_id', 'item_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        is_allowed($this->uri->segment(1),'read');
        $this->load->helper('exportexcel');
        $namaFile = "item.xls";
        $judul = "item";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kd Internal Item");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Item");
	xlsWriteLabel($tablehead, $kolomhead++, "Kategori Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Unit Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Deskripsi");
	xlsWriteLabel($tablehead, $kolomhead++, "Estimasi Harga");
	xlsWriteLabel($tablehead, $kolomhead++, "Stok");

	foreach ($this->Item_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kd_internal_item);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_item);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kategori_id);
	    xlsWriteNumber($tablebody, $kolombody++, $data->unit_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->deskripsi);
	    xlsWriteNumber($tablebody, $kolombody++, $data->estimasi_harga);
	    xlsWriteNumber($tablebody, $kolombody++, $data->stok);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Item.php */
/* Location: ./application/controllers/Item.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-24 18:34:07 */
/* http://harviacode.com */
