<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pajak extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Pajak_model');
        $this->load->model('Coa_model');
        $this->load->model('Setting_app_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        is_allowed($this->uri->segment(1),null);
        $pajak = $this->Pajak_model->get_all();
        $data = array(
            'pajak_data' => $pajak,
            'sett_apps' =>$this->Setting_app_model->get_by_id(1),
        );
        $this->template->load('template','pajak/pajak_list', $data);
    }

    public function read($id) 
    {
        is_allowed($this->uri->segment(1),'read');
        $row = $this->Pajak_model->get_by_id(decrypt_url($id));
        if ($row) {
            $data = array(
		'pajak_id' => $row->pajak_id,
        'sett_apps' =>$this->Setting_app_model->get_by_id(1),
		'nama' => $row->nama,
		'nilai_tukar' => $row->nilai_tukar,
		'keterangan' => $row->keterangan,
		'akun_pajak_penjualan' => $row->akun_pajak_penjualan,
		'akun_pajak_pembelian' => $row->akun_pajak_pembelian,
	    );
            $this->template->load('template','pajak/pajak_read', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('pajak'));
        }
    }

    public function create() 
    {
        is_allowed($this->uri->segment(1),'create');
        $data = array(
            'button' => 'Create',
            'coa' =>$this->Coa_model->get_all(),
            'sett_apps' =>$this->Setting_app_model->get_by_id(1),
            'action' => site_url('pajak/create_action'),
	    'pajak_id' => set_value('pajak_id'),
	    'nama' => set_value('nama'),
	    'nilai_tukar' => set_value('nilai_tukar'),
	    'keterangan' => set_value('keterangan'),
	    'akun_pajak_penjualan' => set_value('akun_pajak_penjualan'),
	    'akun_pajak_pembelian' => set_value('akun_pajak_pembelian'),
	);
        $this->template->load('template','pajak/pajak_form', $data);
    }
    
    public function create_action() 
    {
        is_allowed($this->uri->segment(1),'create');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'nilai_tukar' => $this->input->post('nilai_tukar',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'akun_pajak_penjualan' => $this->input->post('akun_pajak_penjualan',TRUE),
		'akun_pajak_pembelian' => $this->input->post('akun_pajak_pembelian',TRUE),
	    );

            $this->Pajak_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pajak'));
        }
    }
    
    public function update($id) 
    {
        is_allowed($this->uri->segment(1),'update');
        $row = $this->Pajak_model->get_by_id(decrypt_url($id));

        if ($row) {
            $data = array(
                'button' => 'Update',
                'coa' =>$this->Coa_model->get_all(),
                'sett_apps' =>$this->Setting_app_model->get_by_id(1),
                'action' => site_url('pajak/update_action'),
		'pajak_id' => set_value('pajak_id', $row->pajak_id),
		'nama' => set_value('nama', $row->nama),
		'nilai_tukar' => set_value('nilai_tukar', $row->nilai_tukar),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'akun_pajak_penjualan' => set_value('akun_pajak_penjualan', $row->akun_pajak_penjualan),
		'akun_pajak_pembelian' => set_value('akun_pajak_pembelian', $row->akun_pajak_pembelian),
	    );
            $this->template->load('template','pajak/pajak_form', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('pajak'));
        }
    }
    
    public function update_action() 
    {
        is_allowed($this->uri->segment(1),'update');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('pajak_id', TRUE));
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'nilai_tukar' => $this->input->post('nilai_tukar',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'akun_pajak_penjualan' => $this->input->post('akun_pajak_penjualan',TRUE),
		'akun_pajak_pembelian' => $this->input->post('akun_pajak_pembelian',TRUE),
	    );

            $this->Pajak_model->update($this->input->post('pajak_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pajak'));
        }
    }
    
    public function delete($id) 
    {
        is_allowed($this->uri->segment(1),'delete');
        $row = $this->Pajak_model->get_by_id(decrypt_url($id));

        if ($row) {
            $this->Pajak_model->delete(decrypt_url($id));
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pajak'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('pajak'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('nilai_tukar', 'nilai tukar', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('akun_pajak_penjualan', 'akun pajak penjualan', 'trim|required');
	$this->form_validation->set_rules('akun_pajak_pembelian', 'akun pajak pembelian', 'trim|required');

	$this->form_validation->set_rules('pajak_id', 'pajak_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        is_allowed($this->uri->segment(1),'read');
        $this->load->helper('exportexcel');
        $namaFile = "pajak.xls";
        $judul = "pajak";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Nilai Tukar");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
	xlsWriteLabel($tablehead, $kolomhead++, "Akun Pajak Penjualan");
	xlsWriteLabel($tablehead, $kolomhead++, "Akun Pajak Pembelian");

	foreach ($this->Pajak_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nilai_tukar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->akun_pajak_penjualan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->akun_pajak_pembelian);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Pajak.php */
/* Location: ./application/controllers/Pajak.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-09-28 07:03:07 */
/* http://harviacode.com */