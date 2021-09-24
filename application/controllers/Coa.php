<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Coa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Coa_model');
        $this->load->model('Setting_app_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        is_allowed($this->uri->segment(1),null);
        $coa = $this->Coa_model->get_all();
        $data = array(
            'coa_data' => $coa,
            'sett_apps' =>$this->Setting_app_model->get_by_id(1),
        );
        $this->template->load('template','coa/coa_list', $data);
    }

    public function add(){
        $data = array(
         'category_name'  => $_POST['category_name'],
         'parent_category_id' => $_POST['parent_category']
        );


        $this->Coa_model->insert($data);
        echo 'Data COA Berhasil di Simpan';

    }


    public function read($id) 
    {
        is_allowed($this->uri->segment(1),'read');
        $row = $this->Coa_model->get_by_id(decrypt_url($id));
        if ($row) {
            $data = array(
		'category_id' => $row->category_id,
        'sett_apps' =>$this->Setting_app_model->get_by_id(1),
		'category_name' => $row->category_name,
		'parent_category_id' => $row->parent_category_id,
	    );
            $this->template->load('template','coa/coa_read', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('coa'));
        }
    }

    public function create() 
    {
        is_allowed($this->uri->segment(1),'create');
        $data = array(
            'button' => 'Create',
            'sett_apps' =>$this->Setting_app_model->get_by_id(1),
            'action' => site_url('coa/create_action'),
	    'category_id' => set_value('category_id'),
	    'category_name' => set_value('category_name'),
	    'parent_category_id' => set_value('parent_category_id'),
	);
        $this->template->load('template','coa/coa_form', $data);
    }
    
    public function create_action() 
    {
        is_allowed($this->uri->segment(1),'create');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'category_name' => $this->input->post('category_name',TRUE),
		'parent_category_id' => $this->input->post('parent_category_id',TRUE),
	    );

            $this->Coa_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('coa'));
        }
    }
    
    public function update($id) 
    {
        is_allowed($this->uri->segment(1),'update');
        $row = $this->Coa_model->get_by_id(decrypt_url($id));

        if ($row) {
            $data = array(
                'button' => 'Update',
                'sett_apps' =>$this->Setting_app_model->get_by_id(1),
                'action' => site_url('coa/update_action'),
		'category_id' => set_value('category_id', $row->category_id),
		'category_name' => set_value('category_name', $row->category_name),
		'parent_category_id' => set_value('parent_category_id', $row->parent_category_id),
	    );
            $this->template->load('template','coa/coa_form', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('coa'));
        }
    }
    
    public function update_action() 
    {
        is_allowed($this->uri->segment(1),'update');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('category_id', TRUE));
        } else {
            $data = array(
		'category_name' => $this->input->post('category_name',TRUE),
		'parent_category_id' => $this->input->post('parent_category_id',TRUE),
	    );

            $this->Coa_model->update($this->input->post('category_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('coa'));
        }
    }
    
    public function delete($id) 
    {
        is_allowed($this->uri->segment(1),'delete');
        $row = $this->Coa_model->get_by_id(decrypt_url($id));

        if ($row) {
            $this->Coa_model->delete(decrypt_url($id));
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('coa'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('coa'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('category_name', 'category name', 'trim|required');
	$this->form_validation->set_rules('parent_category_id', 'parent category id', 'trim|required');

	$this->form_validation->set_rules('category_id', 'category_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        is_allowed($this->uri->segment(1),'read');
        $this->load->helper('exportexcel');
        $namaFile = "coa.xls";
        $judul = "coa";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Category Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Parent Category Id");

	foreach ($this->Coa_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->category_name);
	    xlsWriteNumber($tablebody, $kolombody++, $data->parent_category_id);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Coa.php */
/* Location: ./application/controllers/Coa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-09-24 10:03:05 */
/* http://harviacode.com */