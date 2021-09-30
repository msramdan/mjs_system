<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Supplier_model');
        $this->load->model('Pajak_model');
        $this->load->model('Setting_app_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        is_allowed($this->uri->segment(1),null);
        $supplier = $this->Supplier_model->get_all();
        $data = array(
            'supplier_data' => $supplier,
            'sett_apps' =>$this->Setting_app_model->get_by_id(1),
        );
        $this->template->load('template','supplier/supplier_list', $data);
    }

    public function read($id) 
    {
        is_allowed($this->uri->segment(1),'read');
        $row = $this->Supplier_model->get_by_id(decrypt_url($id));
        if ($row) {
            $data = array(
		'supplier_id' => $row->supplier_id,
        'sett_apps' =>$this->Setting_app_model->get_by_id(1),
		'kode_supplier' => $row->kode_supplier,
		'nama_supplier' => $row->nama_supplier,
		'alamat' => $row->alamat,
		'kota' => $row->kota,
		'provinsi' => $row->provinsi,
		'kode_pos' => $row->kode_pos,
		'telepon' => $row->telepon,
		'personal_kontak' => $row->personal_kontak,
		'email' => $row->email,
		'halaman_web' => $row->halaman_web,
		'catatan' => $row->catatan,
        'pajak_id' => $row->pajak_id,
        'npwp' => $row->npwp,
	    );
            $this->template->load('template','supplier/supplier_read', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('supplier'));
        }
    }

    public function create() 
    {
        is_allowed($this->uri->segment(1),'create');
        $data = array(
            'button' => 'Create',
            'pajak' =>$this->Pajak_model->get_all(),
            'kodeunik' =>$this->Supplier_model->buat_kode(),
            'sett_apps' =>$this->Setting_app_model->get_by_id(1),
            'action' => site_url('supplier/create_action'),
	    'supplier_id' => set_value('supplier_id'),
	    'kode_supplier' => set_value('kode_supplier'),
	    'nama_supplier' => set_value('nama_supplier'),
	    'alamat' => set_value('alamat'),
	    'kota' => set_value('kota'),
	    'provinsi' => set_value('provinsi'),
	    'kode_pos' => set_value('kode_pos'),
	    'telepon' => set_value('telepon'),
	    'personal_kontak' => set_value('personal_kontak'),
	    'email' => set_value('email'),
	    'halaman_web' => set_value('halaman_web'),
	    'catatan' => set_value('catatan'),
        'npwp' => set_value('npwp'),
        'pajak_id' => set_value('pajak_id'),
	);
        $this->template->load('template','supplier/supplier_form', $data);
    }
    
    public function create_action() 
    {
        is_allowed($this->uri->segment(1),'create');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode_supplier' => $this->input->post('kode_supplier',TRUE),
		'nama_supplier' => $this->input->post('nama_supplier',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'kota' => $this->input->post('kota',TRUE),
		'provinsi' => $this->input->post('provinsi',TRUE),
		'kode_pos' => $this->input->post('kode_pos',TRUE),
		'telepon' => $this->input->post('telepon',TRUE),
		'personal_kontak' => $this->input->post('personal_kontak',TRUE),
		'email' => $this->input->post('email',TRUE),
		'halaman_web' => $this->input->post('halaman_web',TRUE),
		'catatan' => $this->input->post('catatan',TRUE),
        'pajak_id' => $this->input->post('pajak_id',TRUE),
        'npwp' => $this->input->post('npwp',TRUE),
	    );

            $this->Supplier_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('supplier'));
        }
    }
    
    public function update($id) 
    {
        is_allowed($this->uri->segment(1),'update');
        $row = $this->Supplier_model->get_by_id(decrypt_url($id));

        if ($row) {
            $data = array(
                'button' => 'Update',
                'pajak' =>$this->Pajak_model->get_all(),
                'sett_apps' =>$this->Setting_app_model->get_by_id(1),
                'action' => site_url('supplier/update_action'),
		'supplier_id' => set_value('supplier_id', $row->supplier_id),
		'kode_supplier' => set_value('kode_supplier', $row->kode_supplier),
		'nama_supplier' => set_value('nama_supplier', $row->nama_supplier),
		'alamat' => set_value('alamat', $row->alamat),
		'kota' => set_value('kota', $row->kota),
		'provinsi' => set_value('provinsi', $row->provinsi),
		'kode_pos' => set_value('kode_pos', $row->kode_pos),
		'telepon' => set_value('telepon', $row->telepon),
		'personal_kontak' => set_value('personal_kontak', $row->personal_kontak),
		'email' => set_value('email', $row->email),
		'halaman_web' => set_value('halaman_web', $row->halaman_web),
		'catatan' => set_value('catatan', $row->catatan),
        'pajak_id' => set_value('pajak_id', $row->pajak_id),
        'npwp' => set_value('npwp', $row->npwp),
	    );
            $this->template->load('template','supplier/supplier_form', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('supplier'));
        }
    }
    
    public function update_action() 
    {
        is_allowed($this->uri->segment(1),'update');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('supplier_id', TRUE));
        } else {
            $data = array(
		'kode_supplier' => $this->input->post('kode_supplier',TRUE),
		'nama_supplier' => $this->input->post('nama_supplier',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'kota' => $this->input->post('kota',TRUE),
		'provinsi' => $this->input->post('provinsi',TRUE),
		'kode_pos' => $this->input->post('kode_pos',TRUE),
		'telepon' => $this->input->post('telepon',TRUE),
		'personal_kontak' => $this->input->post('personal_kontak',TRUE),
		'email' => $this->input->post('email',TRUE),
		'halaman_web' => $this->input->post('halaman_web',TRUE),
		'catatan' => $this->input->post('catatan',TRUE),
        'npwp' => $this->input->post('npwp',TRUE),
        'pajak_id' => $this->input->post('pajak_id',TRUE),
	    );

            $this->Supplier_model->update($this->input->post('supplier_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('supplier'));
        }
    }
    
    public function delete($id) 
    {
        is_allowed($this->uri->segment(1),'delete');
        $row = $this->Supplier_model->get_by_id(decrypt_url($id));

        if ($row) {
            $this->Supplier_model->delete(decrypt_url($id));
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('supplier'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('supplier'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_supplier', 'kode supplier', 'trim|required');
	$this->form_validation->set_rules('nama_supplier', 'nama supplier', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('kota', 'kota', 'trim|required');
	$this->form_validation->set_rules('provinsi', 'provinsi', 'trim|required');
	$this->form_validation->set_rules('kode_pos', 'kode pos', 'trim|required');
	$this->form_validation->set_rules('telepon', 'telepon', 'trim|required');
	$this->form_validation->set_rules('personal_kontak', 'personal kontak', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('halaman_web', 'halaman web', 'trim|required');
	$this->form_validation->set_rules('catatan', 'catatan', 'trim|required');

	$this->form_validation->set_rules('supplier_id', 'supplier_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        is_allowed($this->uri->segment(1),'read');
        $this->load->helper('exportexcel');
        $namaFile = "supplier.xls";
        $judul = "supplier";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Supplier");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Supplier");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "Kota");
	xlsWriteLabel($tablehead, $kolomhead++, "Provinsi");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Pos");
	xlsWriteLabel($tablehead, $kolomhead++, "Telepon");
	xlsWriteLabel($tablehead, $kolomhead++, "Personal Kontak");
	xlsWriteLabel($tablehead, $kolomhead++, "Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Halaman Web");
	xlsWriteLabel($tablehead, $kolomhead++, "Catatan");

	foreach ($this->Supplier_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_supplier);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_supplier);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kota);
	    xlsWriteLabel($tablebody, $kolombody++, $data->provinsi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_pos);
	    xlsWriteLabel($tablebody, $kolombody++, $data->telepon);
	    xlsWriteLabel($tablebody, $kolombody++, $data->personal_kontak);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->halaman_web);
	    xlsWriteLabel($tablebody, $kolombody++, $data->catatan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Supplier.php */
/* Location: ./application/controllers/Supplier.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-09-25 18:14:26 */
/* http://harviacode.com */