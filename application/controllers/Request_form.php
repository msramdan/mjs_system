<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Request_form extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Request_form_model');
        $this->load->model('Categori_request_model');
        $this->load->model('Setting_app_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        is_allowed($this->uri->segment(1),null);
        $request_form = $this->Request_form_model->get_all();
        $data = array(
            'request_form_data' => $request_form,
            'sett_apps' =>$this->Setting_app_model->get_by_id(1),
        );
        $this->template->load('template','request_form/request_form_list', $data);
    }

    public function read($id) 
    {
        is_allowed($this->uri->segment(1),'read');
        $row = $this->Request_form_model->get_by_id(decrypt_url($id));
        if ($row) {
            $data = array(
		'request_form_id' => $row->request_form_id,
        'sett_apps' =>$this->Setting_app_model->get_by_id(1),
		'kode_request_form' => $row->kode_request_form,
		'user_id' => $row->user_id,
		'tanggal_request' => $row->tanggal_request,
		'categori_request_id' => $row->categori_request_id,
		'keterangan' => $row->keterangan,
	    );
            $this->template->load('template','request_form/request_form_read', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('request_form'));
        }
    }

    public function create() 
    {
        is_allowed($this->uri->segment(1),'create');
        $data = array(
            'button' => 'Create',
            'categori_requests' =>$this->Categori_request_model->get_all(),
            'kode'=>$this->Request_form_model->get_no_rf(),
            'sett_apps' =>$this->Setting_app_model->get_by_id(1),
            'action' => site_url('request_form/create_action'),
    	    'request_form_id' => set_value('request_form_id'),
    	    'kode_request_form' => set_value('kode_request_form'),
    	    'user_id' => set_value('user_id'),
    	    'tanggal_request' => set_value('tanggal_request'),
    	    'categori_request_id' => set_value('categori_request_id'),
    	    'keterangan' => set_value('keterangan'),
            'classnyak' => $this
    	);
        $this->template->load('template','request_form/request_form_form', $data);
    }

    function generate_approval_list($id_categori_request)
    {
        $data = $this->Categori_request_model->get_all_approval_name_and_step($id_categori_request);


        $arr = [];
        
        foreach ($data as $key => $value) {
            $arr[$value->user_id] = 'false';
        }

        return json_encode($arr);

    }
    
    function cekDataInApprovalList($id)
    {
        $data = $this->Categori_request_model->get_request_approve_for($id);
        return $data;
    }

    function find_berkas_for_this_request_form($id,$user_id)
    {
        $data = $this->Categori_request_model->get_all_file_for_request_form($id,$user_id);
        return $data;
    }

    public function create_action() 
    {
        is_allowed($this->uri->segment(1),'create');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

            $approval_list = $this->generate_approval_list($this->input->post('categori_request_id',TRUE));

            $data = array(
        		'kode_request_form' => $this->input->post('kode_request_form',TRUE),
        		'user_id' => $this->input->post('user_id',TRUE),
        		'tanggal_request' => $this->input->post('tanggal_request',TRUE),
        		'categori_request_id' => $this->input->post('categori_request_id',TRUE),
        		'keterangan' => $this->input->post('keterangan',TRUE),
                'approval_status' => $approval_list
    	    );

            $this->Request_form_model->insert($data);
            
            $nama_berkas = $_POST['nama_berkas'];

            if ($nama_berkas) {
                $this->load->library('upload');
                
                $jumlah_data = count($nama_berkas);

                for($i = 0; $i < $jumlah_data;$i++)
                {
                    if($_FILES['berkas']['name'][$i]){
                        
                        $filenamee = 'ApprDoc-'.$this->input->post('kode_request_form').'-'.date('ymd').'-'.substr(sha1(rand()),0,10);

                        $config['upload_path']          = './assets/assets/img/berkas'; 
                        $config['allowed_types']        = 'jpg|png|pdf|docx|doc';
                        $config['max_size']             = 10000;
                        $config['file_name']            = $filenamee;

                        $_FILES['file[]']['name'] = $_FILES['berkas']['name'][$i];
                        $_FILES['file[]']['type'] = $_FILES['berkas']['type'][$i];
                        $_FILES['file[]']['tmp_name'] = $_FILES['berkas']['tmp_name'][$i];
                        $_FILES['file[]']['error'] = $_FILES['berkas']['error'][$i];
                        $_FILES['file[]']['size'] = $_FILES['berkas']['size'][$i];

                        $this->upload->initialize($config);
                        $this->upload->do_upload('file[]');

                        $uploadData[] = $this->upload->data();

                        $data = array(
                            'karyawan_id' => $this->session->userdata('userid'),
                            'nama_berkas' => $nama_berkas[$i],
                            'photo' => $uploadData[$i]['file_name'],
                        );

                        print_r($data);
                        
                        $this->db->insert('berkas',$data);
                    
                    } else {

                        echo "haha! no files for ".$nama_berkas[$i].'???'.$_FILES['berkas']['name'][$i].'???';
                    }

                }
           }


           $this->session->set_flashdata('message', 'Create Record Success');
           redirect(site_url('request_form'));
        }
    }
    
    public function update($id) 
    {
        is_allowed($this->uri->segment(1),'update');
        $row = $this->Request_form_model->get_by_id(decrypt_url($id));

        if ($row) {
            $data = array(
                'button' => 'Update',
                'sett_apps' =>$this->Setting_app_model->get_by_id(1),
                'action' => site_url('request_form/update_action'),
        		'request_form_id' => set_value('request_form_id', $row->request_form_id),
        		'kode_request_form' => set_value('kode_request_form', $row->kode_request_form),
        		'user_id' => set_value('user_id', $row->user_id),
        		'tanggal_request' => set_value('tanggal_request', $row->tanggal_request),
        		'categori_request_id' => $row->categori_request_id,
        		'keterangan' => set_value('keterangan', $row->keterangan),
                'classnyak' => $this
	    );
            $this->template->load('template','request_form/request_form_form', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('request_form'));
        }
    }
    
    public function update_action() 
    {
        is_allowed($this->uri->segment(1),'update');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('request_form_id', TRUE));
        } else {
            $data = array(
        		'kode_request_form' => $this->input->post('kode_request_form',TRUE),
        		'user_id' => $this->input->post('user_id',TRUE),
        		'tanggal_request' => $this->input->post('tanggal_request',TRUE),
        		'categori_request_id' => $this->input->post('categori_request_id',TRUE),
        		'keterangan' => $this->input->post('keterangan',TRUE),
            );

            $this->Request_form_model->update($this->input->post('request_form_id', TRUE), $data);

            // IN CASE YOUR ADDING AGAIN

            $nama_berkas = $_POST['nama_berkas'];

            if ($nama_berkas) {
                $this->load->library('upload');
                
                $jumlah_data = count($nama_berkas);

                for($i = 0; $i < $jumlah_data;$i++)
                {
                    if($_FILES['berkas']['name'][$i]){
                        
                        $filenamee = 'ApprDoc-'.$this->input->post('kode_request_form').'-'.date('ymd').'-'.substr(sha1(rand()),0,10);

                        $config['upload_path']          = './assets/assets/img/berkas'; 
                        $config['allowed_types']        = 'jpg|png|pdf|docx|doc';
                        $config['max_size']             = 10000;
                        $config['file_name']            = $filenamee;

                        $_FILES['file[]']['name'] = $_FILES['berkas']['name'][$i];
                        $_FILES['file[]']['type'] = $_FILES['berkas']['type'][$i];
                        $_FILES['file[]']['tmp_name'] = $_FILES['berkas']['tmp_name'][$i];
                        $_FILES['file[]']['error'] = $_FILES['berkas']['error'][$i];
                        $_FILES['file[]']['size'] = $_FILES['berkas']['size'][$i];

                        $this->upload->initialize($config);
                        $this->upload->do_upload('file[]');

                        $uploadData[] = $this->upload->data();

                        $data = array(
                            'karyawan_id' => $this->session->userdata('userid'),
                            'nama_berkas' => $nama_berkas[$i],
                            'photo' => $uploadData[$i]['file_name'],
                        );

                        print_r($data);
                        
                        $this->db->insert('berkas',$data);
                    
                    } else {

                        echo "haha! no files for ".$nama_berkas[$i].'???'.$_FILES['berkas']['name'][$i].'???';
                    }

                }
            }


            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('request_form'));
        }
    }
    
    public function delete($id) 
    {
        is_allowed($this->uri->segment(1),'delete');
        $row = $this->Request_form_model->get_by_id(decrypt_url($id));

        if ($row) {
            
            $getberkas = $this->Request_form_model->get_berkas_list($row->kode_request_form,$row->user_id);

            foreach ($getberkas as $value) {
                $this->Request_form_model->delete_berkas_form_request($value->berkas_id);
                unlink('./assets/assets/img/berkas/'.$value->photo);
            }

            $this->Request_form_model->delete(decrypt_url($id));

            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('request_form'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('request_form'));
        }
    }

    public function delete_berkas()
    {
        is_allowed($this->uri->segment(1),'delete');

        $id = $this->input->post('berkas_id');
        $filename = $this->input->post('file_name');

        $this->Request_form_model->delete_berkas_form_request(decrypt_url($id));
        
        unlink("./assets/assets/img/berkas/".$filename);

        echo 'ok';
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_request_form', 'kode request form', 'trim|required');
	$this->form_validation->set_rules('user_id', 'user id', 'trim|required');
	$this->form_validation->set_rules('tanggal_request', 'tanggal request', 'trim|required');
	$this->form_validation->set_rules('categori_request_id', 'categori request id', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('request_form_id', 'request_form_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        is_allowed($this->uri->segment(1),'read');
        $this->load->helper('exportexcel');
        $namaFile = "request_form.xls";
        $judul = "request_form";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Request Form");
	xlsWriteLabel($tablehead, $kolomhead++, "User Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Request");
	xlsWriteLabel($tablehead, $kolomhead++, "Categori Request Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

	foreach ($this->Request_form_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_request_form);
	    xlsWriteNumber($tablebody, $kolombody++, $data->user_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_request);
	    xlsWriteNumber($tablebody, $kolombody++, $data->categori_request_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Request_form.php */
/* Location: ./application/controllers/Request_form.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-09-14 11:13:12 */
/* http://harviacode.com */