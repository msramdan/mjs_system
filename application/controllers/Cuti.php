<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cuti extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Cuti_model');
        $this->load->model('Karyawan_model');
        $this->load->model('Setting_app_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        is_allowed($this->uri->segment(1),null);
        $data = array(
            'sett_apps' =>$this->Setting_app_model->get_by_id(1),
        );
        $this->template->load('template','cuti/cuti_list', $data);
    }

    public function read($id) 
    {
        is_allowed($this->uri->segment(1),'read');
        $row = $this->Cuti_model->get_by_id(decrypt_url($id));

        if ($row) {
            $data = array(
		'cuti_id' => $row->cuti_id,
        'sett_apps' =>$this->Setting_app_model->get_by_id(1),
		'nama_karyawan' => $row->nama_karyawan,
		'tanggal' => $row->tanggal,
		'alasan' => $row->alasan,
		'photo' => $row->photo,
		'status_cuti' => $row->status_cuti,
	    );
            $this->template->load('template','cuti/cuti_read', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('cuti'));
        }
    }

    public function create() 
    {
        is_allowed($this->uri->segment(1),'create');
        $data = array(
            'button' => 'Create',
            'sett_apps' =>$this->Setting_app_model->get_by_id(1),
            'karyawan' =>$this->Karyawan_model->get_all(),
            'action' => site_url('cuti/create_action'),
	    'cuti_id' => set_value('cuti_id'),
	    'karyawan_id' => set_value('karyawan_id'),
	    'tanggal' => set_value('tanggal'),
	    'alasan' => set_value('alasan'),
	    'photo' => set_value('photo'),
	    'status_cuti' => set_value('status_cuti'),
	);
        $this->template->load('template','cuti/cuti_form', $data);
    }
    
    public function create_action() 
    {
        is_allowed($this->uri->segment(1),'create');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
        $tanggal = $this->input->post('tanggal');
        $karyawan_id = $this->input->post('karyawan_id');

        $cek_data_cuti = "select *from cuti where tanggal='$tanggal' and karyawan_id='$karyawan_id'" ;
        $cek = $this->db->query($cek_data_cuti)->num_rows();

        if ($cek > 0) {
            $this->session->set_flashdata('error', 'Sudah ada data pengajuan');
        }else{
            $config['upload_path']      = './assets/assets/img/absen'; 
            $config['allowed_types']    = 'jpg|png|jpeg|pdf|doc|docx'; 
            $config['max_size']         = 10048; 
            $config['file_name']        = 'File-'.date('ymd').'-'.substr(sha1(rand()),0,10); 
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            $this->upload->do_upload("photo");
            $data = $this->upload->data();
            $photo =$data['file_name'];

            $data = array(
            'karyawan_id' => $this->input->post('karyawan_id',TRUE),
            'tanggal' => $this->input->post('tanggal',TRUE),
            'alasan' => $this->input->post('alasan',TRUE),
            'photo' => $photo,
            'status_cuti' => $this->input->post('status_cuti',TRUE),
            );
                $this->Cuti_model->insert($data);
                $this->session->set_flashdata('message', 'Create Record Success');

        }
        redirect(site_url('cuti'));
        }
    }
    
    public function update($id) 
    {
        is_allowed($this->uri->segment(1),'update');
        $row = $this->Cuti_model->get_by_id(decrypt_url($id));

        if ($row) {
            $data = array(
                'button' => 'Update',
                'sett_apps' =>$this->Setting_app_model->get_by_id(1),
                'karyawan' =>$this->Karyawan_model->get_all(),
                'action' => site_url('cuti/update_action'),
		'cuti_id' => set_value('cuti_id', $row->cuti_id),
		'karyawan_id' => set_value('karyawan_id', $row->karyawan_id),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'alasan' => set_value('alasan', $row->alasan),
		'photo' => set_value('photo', $row->photo),
		'status_cuti' => set_value('status_cuti', $row->status_cuti),
	    );
            $this->template->load('template','cuti/cuti_form', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('cuti'));
        }
    }
    
    public function update_action() 
    {
        is_allowed($this->uri->segment(1),'update');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('cuti_id', TRUE));
        } else {

            $config['upload_path']      = './assets/assets/img/absen'; 
            $config['allowed_types']    = 'jpg|png|jpeg|pdf|doc|docx'; 
            $config['max_size']         = 10048; 
            $config['file_name']        = 'File-'.date('ymd').'-'.substr(sha1(rand()),0,10); 
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload("photo")) {
            $id = $this->input->post('cuti_id');
            $row = $this->Cuti_model->get_by_id($id);
            $data = $this->upload->data();
            $photo =$data['file_name'];
            if($row->photo==null || $row->photo=='' ){
            }else{
            $target_file = './assets/assets/img/absen/'.$row->photo;
            unlink($target_file);
            }
                }else{
                $photo = $this->input->post('photo_lama');
            }

            $data = array(
		'karyawan_id' => $this->input->post('karyawan_id',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'alasan' => $this->input->post('alasan',TRUE),
		'photo' => $photo,
		'status_cuti' => $this->input->post('status_cuti',TRUE),
	    );

            $this->Cuti_model->update($this->input->post('cuti_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('cuti'));
        }
    }
    
    public function delete($id) 
    {
        is_allowed($this->uri->segment(1),'delete');
        $row = $this->Cuti_model->get_by_id(decrypt_url($id));

        if ($row) {
            if($row->photo==null || $row->photo=='' ){
                }else{
                $target_file = './assets/assets/img/absen/'.$row->photo;
                unlink($target_file);
                }

            $this->Cuti_model->delete(decrypt_url($id));
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('cuti'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('cuti'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('karyawan_id', 'karyawan id', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('alasan', 'alasan', 'trim|required');
	$this->form_validation->set_rules('photo', 'photo', 'trim');
	$this->form_validation->set_rules('status_cuti', 'status cuti', 'trim|required');

	$this->form_validation->set_rules('cuti_id', 'cuti_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        is_allowed($this->uri->segment(1),'read');
        $this->load->helper('exportexcel');
        $namaFile = "cuti.xls";
        $judul = "cuti";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Karyawan Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
	xlsWriteLabel($tablehead, $kolomhead++, "Alasan");
	xlsWriteLabel($tablehead, $kolomhead++, "Photo");
	xlsWriteLabel($tablehead, $kolomhead++, "Status Cuti");

	foreach ($this->Cuti_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->karyawan_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alasan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->photo);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status_cuti);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

     public function download($gambar){
        force_download('assets/assets/img/absen/'.$gambar,NULL);
    }

}

/* End of file Cuti.php */
/* Location: ./application/controllers/Cuti.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-09-22 13:23:39 */
/* http://harviacode.com */