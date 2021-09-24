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
            'classnyak' => $this
        );
        $this->template->load('template','coa/coa_list', $data);
    }

    public function looping_lagi($id){
        $sql = "select * from coa where parent_coa_id='$id'";
        $jml = $this->db->query($sql)->num_rows();
        if ($jml > 0) {
           $data_coa = $this->db->query($sql)->result_array();
            foreach($data_coa as $row)
            { ?>
                <ul>
               <li data-jstree='{"opened":true}'>
                 <a><?= $row['kd_coa'] ?> - <?= $row['coa_name'] ?></a>
                 <?php $this->looping_lagi($row['coa_id']); ?>
               </li>
             </ul>
            <?php } 
        }else{

        }  

    }


    public function add(){
        $data = array(
         'coa_name'  => $_POST['coa_name'],
         'kd_coa'  => $_POST['kd_coa'],
         'parent_coa_id' => $_POST['parent_coa_id']
        );
        $this->Coa_model->insert($data);
        $this->session->set_flashdata('message', 'Data COA Tersimpan');

        // echo 'Data COA Berhasil di Simpan';

    }

    public function data_parent(){

        $sql = "select * from coa";                                    
        $data_coa = $this->db->query($sql)->result_array();

        $output = '<option style="color: black" value="0">Parent</option>';
        foreach($data_coa as $row)
        {
         $output .= '<option style="color: black" value="'.$row["coa_id"].'">'.$row["coa_name"].'</option>';
        }

        echo $output;

    }

    public function tampil(){
        $parent_coa_id = 0;
        $sql = "select * from coa";                                    
        $data_coa = $this->db->query($sql)->result_array();
        foreach($data_coa as $row)
        {
            $data =$this->_get_node_data($parent_coa_id);
        }

        echo json_encode(array_values($data));
    }


    function _get_node_data($parent_coa_id)
    {
     $query = "SELECT * FROM coa WHERE parent_coa_id = '".$parent_coa_id."'";
     $result = $this->db->query($query)->result_array();

     $output = array();
     foreach($result as $row)
     {
      $sub_array = array();
      $sub_array['text'] = $row['coa_name'];
      $sub_array['nodes'] = array_values($this->_get_node_data($row['coa_id']));
      $output[] = $sub_array;
     }
     return $output;
    }



    public function read($id) 
    {
        is_allowed($this->uri->segment(1),'read');
        $row = $this->Coa_model->get_by_id(decrypt_url($id));
        if ($row) {
            $data = array(
        'coa_id' => $row->coa_id,
        'sett_apps' =>$this->Setting_app_model->get_by_id(1),
        'coa_name' => $row->coa_name,
        'parent_coa_id' => $row->parent_coa_id,
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
        'coa_id' => set_value('coa_id'),
        'coa_name' => set_value('coa_name'),
        'parent_coa_id' => set_value('parent_coa_id'),
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
        'coa_name' => $this->input->post('coa_name',TRUE),
        'parent_coa_id' => $this->input->post('parent_coa_id',TRUE),
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
        'coa_id' => set_value('coa_id', $row->coa_id),
        'coa_name' => set_value('coa_name', $row->coa_name),
        'parent_coa_id' => set_value('parent_coa_id', $row->parent_coa_id),
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
            $this->update($this->input->post('coa_id', TRUE));
        } else {
            $data = array(
        'coa_name' => $this->input->post('coa_name',TRUE),
        'parent_coa_id' => $this->input->post('parent_coa_id',TRUE),
        );

            $this->Coa_model->update($this->input->post('coa_id', TRUE), $data);
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
    $this->form_validation->set_rules('coa_name', 'coa name', 'trim|required');
    $this->form_validation->set_rules('parent_coa_id', 'parent coa id', 'trim|required');

    $this->form_validation->set_rules('coa_id', 'coa_id', 'trim');
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
    xlsWriteLabel($tablehead, $kolomhead++, "coa Name");
    xlsWriteLabel($tablehead, $kolomhead++, "Parent coa Id");

    foreach ($this->Coa_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
        xlsWriteLabel($tablebody, $kolombody++, $data->coa_name);
        xlsWriteNumber($tablebody, $kolombody++, $data->parent_coa_id);

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
/* Generated by Harviacode Codeigniter CRUD Generator 2021-09-24 08:19:52 */
/* http://harviacode.com */