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
                'berkas' =>$this->Request_form_model->get_berkas(decrypt_url($id)),
        		'request_form_id' => $row->request_form_id,
                'sett_apps' =>$this->Setting_app_model->get_by_id(1),
        		'kode_request_form' => $row->kode_request_form,
        		'nama_user' => $row->nama_user,
        		'tanggal_request' => $row->tanggal_request,
        		'request' => $row->request,
        		'keterangan' => $row->keterangan,
                'status' => $row->status,
                'whoisreviewing' => $row->approval,
                'keterangan_tolak' => $row->keterangan_tolak,
                'classnyak' => $this
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

        $i = 0;
        
        foreach ($data as $key => $value) {

            $arr[$i]['user_id'] = $value->user_id;
            $arr[$i]['status'] = '-';
            
            if ($i == 0) {
            
                $arr[$i]['tanda_tangan'] = 'sekarang';
            } else {
                $arr[$i]['tanda_tangan'] = 'belum';
            }
            
            $i++;
        }

        return json_encode($arr);

        //return json_encode($arr);

    }
    
    function cekDataInApprovalListAvailability()
    {
        // $data = $this->Categori_request_model->get_request_approve_availability($id);
        $data = $this->Categori_request_model->get_request_approve_availability();
        return $data;
    }

<<<<<<< HEAD
    function find_berkas_for_this_request_form($request_form_id)
    {
        $data = $this->Categori_request_model->get_all_file_for_request_form($request_form_id);
=======
    function find_berkas_for_this_request_form($id)
    {
        $data = $this->Categori_request_model->get_all_file_for_request_form($id);
>>>>>>> origin/main
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
                'status' => 'Dalam Review',
                'approval' => $approval_list,
                'keterangan_tolak' => '-'
    	    );

            $this->Request_form_model->insert($data);
<<<<<<< HEAD
            $request_id_ramdan = $this->db->insert_id();
=======

            $form_request_id = $this->db->insert_id();
>>>>>>> origin/main
            
            $nama_berkas = $_POST['nama_berkas'];

            if ($nama_berkas) {
                $this->load->library('upload');
                
                $jumlah_data = count($nama_berkas);

                for($i = 0; $i < $jumlah_data;$i++)
                {
                    if($_FILES['berkas']['name'][$i]){
                        
                        $filenamee = 'ApprDoc-'.$this->input->post('kode_request_form').'-'.date('ymd').'-'.substr(sha1(rand()),0,10);

                        $config['upload_path']          = './assets/assets/img/file_rf'; 
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
<<<<<<< HEAD
                            'request_form_id' =>$request_id_ramdan,
=======
                            'request_form_id' => $form_request_id,
>>>>>>> origin/main
                            'nama_berkas' => $nama_berkas[$i],
                            'photo' => $uploadData[$i]['file_name'],
                        );

                        //print_r($data);
                        
                        $this->db->insert('file_rf',$data);
                    
                    } else {

                        echo "no files for ".$nama_berkas[$i].'???'.$_FILES['berkas']['name'][$i].'???';
                    }

                }
           }


           $this->session->set_flashdata('message', 'Create Record Success');
           redirect(site_url('request_form'));
        }
    }

    function getusername($id)
    {
        $this->load->model('User_m');
        $data = $this->User_m->get_by_id($id);
        return $data;
    }
    
    function is_allowed_toedit($id_request_form)
    {
        $data = $this->Request_form_model->get_by_id(decrypt_url($id_request_form));

        if($data->status == 'Dalam Review')
        {
            $arr = json_decode($data->approval, TRUE);

            $stillonreview = 0;

            foreach ($arr as $value) {
                if ($value['status'] === '-') {
                    $stillonreview++;
                }
            }

            if ($stillonreview == count($arr)) {
                return 'allowed';
            } else {
                return 'not allowed';
            }
        }

        if ($data->status == 'Ditolak') {
            return 'allowed';
        }
    }

    public function update($id) 
    {
        is_allowed($this->uri->segment(1),'update');

        $row = $this->Request_form_model->get_by_id(decrypt_url($id));

        if ($row) {

            if ($this->is_allowed_toedit($id) == 'allowed') {
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
                    'keterangan_tolak' => $row->keterangan_tolak,
                    'classnyak' => $this
                );
                $this->template->load('template','request_form/request_form_form', $data);
            } else {
                $this->session->set_flashdata('error', 'Tidak dapat diedit karena sudah direview');
                redirect(site_url('request_form'));
            }
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
            $row = $this->Request_form_model->get_by_id($this->input->post('request_form_id', TRUE));

            if ($row->status == 'Ditolak' || $row->status == 'Dalam Review') {
                $data = array(
                    'kode_request_form' => $this->input->post('kode_request_form',TRUE),
                    'user_id' => $this->input->post('user_id',TRUE),
                    'tanggal_request' => $this->input->post('tanggal_request',TRUE),
                    'categori_request_id' => $this->input->post('categori_request_id',TRUE),
                    'keterangan' => $this->input->post('keterangan',TRUE),
                    'approval' => $this->generate_approval_list($this->input->post('categori_request_id',TRUE)),
                    'status' => 'Dalam Review'
                );
                //print_r($data);
                $this->Request_form_model->update($this->input->post('request_form_id', TRUE), $data);
            }

            // IN CASE YOUR ADDING AGAIN
            $nama_berkas = $_POST['nama_berkas'];
            $request_form_id = $_POST['request_form_id'];

            if ($nama_berkas) {
                $this->load->library('upload');
                
                $jumlah_data = count($nama_berkas);

                for($i = 0; $i < $jumlah_data;$i++)
                {
                    if($_FILES['berkas']['name'][$i]){
                        
                        $filenamee = 'ApprDoc-'.$this->input->post('kode_request_form').'-'.date('ymd').'-'.substr(sha1(rand()),0,10);

                        $config['upload_path']          = './assets/assets/img/file_rf'; 
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
<<<<<<< HEAD
                            'request_form_id' =>$request_form_id,
=======
                            'request_form_id' => $this->input->post('request_form_id', TRUE),
>>>>>>> origin/main
                            'nama_berkas' => $nama_berkas[$i],
                            'photo' => $uploadData[$i]['file_name'],
                        );
                        //ramdan

                        print_r($data);
<<<<<<< HEAD
=======
                        
>>>>>>> origin/main
                        $this->db->insert('file_rf',$data);
                    
                    } else {

                        echo "no files for ".$nama_berkas[$i].'???'.$_FILES['berkas']['name'][$i].'???';
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
            if ($this->is_allowed_toedit($id) == 'allowed') {
<<<<<<< HEAD
                $getberkas = $this->Request_form_model->get_berkas_list(decrypt_url($id));
                //ramdan

                foreach ($getberkas as $value) {
                    $this->Request_form_model->delete_berkas_form_request($value->file_rf_id);
                    unlink('./assets/assets/img/file_rf/'.$value->photo);
=======
                $getberkas = $this->Request_form_model->get_berkas_list($row->request_form_id);

                foreach ($getberkas as $value) {
                    $this->Request_form_model->delete_berkas_form_request_by_r_id($value->request_form_id);
                    unlink('./assets/assets/img/berkas/'.$value->photo);
>>>>>>> origin/main
                }
                $this->Request_form_model->delete(decrypt_url($id));
                $this->session->set_flashdata('message', 'Delete Record Success');
                redirect(site_url('request_form'));
            }
            else
            {
                $this->session->set_flashdata('error', 'Tidak dapat dihapus karena sudah dalam proses review');
                redirect(site_url('request_form'));   
            }
            
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('request_form'));
        }
    }

    public function delete_berkas_request_file()
    {
        is_allowed($this->uri->segment(1),'delete');

        $id = $this->input->post('file_rf_id');
        $filename = $this->input->post('file_name');

        $this->Request_form_model->delete_berkas_form_request(decrypt_url($id));
        
        unlink("./assets/assets/img/file_rf/".$filename);

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

<<<<<<< HEAD
    public function download($gambar){
        force_download('assets/assets/img/file_rf/'.$gambar,NULL);
=======
    public function pdf($id)
    {
        is_allowed($this->uri->segment(1),'read');
        $this->load->library('dompdf_gen');

        $row = $this->Request_form_model->get_by_id(decrypt_url($id));
        if ($row) {
            $data = array(
                'request_form_id' => $row->request_form_id,
                'sett_apps' =>$this->Setting_app_model->get_by_id(1),
                'kode_request_form' => $row->kode_request_form,
                'nama_user' => $row->nama_user,
                'tanggal_request' => $row->tanggal_request,
                'request' => $row->request,
                'keterangan' => $row->keterangan,
                'status' => $row->status,
                'whoisreviewing' => $row->approval,
                'keterangan_tolak' => $row->keterangan_tolak,
                'classnyak' => $this
            );
            $this->load->view('request_form/request_form_pdf',$data);
           $paper_size = 'A4';
           $orientation = 'portrait';
           $html = $this->output->get_output();
           $this->dompdf->set_paper($paper_size, $orientation);
           $this->dompdf->load_html($html);
           $this->dompdf->render();
           
           ob_end_clean();
           
           $this->dompdf->stream("request_form".$id.".pdf", array('Attachment' =>0));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('request_form'));
        }
>>>>>>> origin/main
    }

}

/* End of file Request_form.php */
/* Location: ./application/controllers/Request_form.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-09-14 11:13:12 */
/* http://harviacode.com */