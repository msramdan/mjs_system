<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Spal extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Spal_model');
        $this->load->model('Pelanggan_model');
        $this->load->model('Setting_app_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        is_allowed($this->uri->segment(1),null);
        $spal = $this->Spal_model->get_all();
        $data = array(
            'spal_data' => $spal,
            'sett_apps' =>$this->Setting_app_model->get_by_id(1),
        );
        $this->template->load('template','spal/spal_list', $data);
    }

    public function read($id) 
    {
        is_allowed($this->uri->segment(1),'read');
        $row = $this->Spal_model->get_by_id(decrypt_url($id));
        if ($row) {
            $data = array(
		'spal_id' => $row->spal_id,
        'sett_apps' =>$this->Setting_app_model->get_by_id(1),
		'no_spal' => $row->no_spal,
		'tanggal' => $row->tanggal,
		'pelanggan_id' => $row->nama_pelanggan,
		'attn' => $row->attn,
		'kapal' => $row->kapal,
		'tongkang' => $row->tongkang,
		'nama_muatan' => $row->nama_muatan,
		'jumlah_muatan' => $row->jumlah_muatan,
		'harga_muatan' => $row->harga_muatan,
		'pelabuhan_muat' => $row->pelabuhan_muat,
		'pelabuhan_bongkar' => $row->pelabuhan_bongkar,
		'metode_pembayaran' => $row->metode_pembayaran,
		'dokumen' => $row->dokumen,
	    );
            $this->template->load('template','spal/spal_read', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('spal'));
        }
    }

    public function create() 
    {
        is_allowed($this->uri->segment(1),'create');
        $data = array(
            'button' => 'Create',
            'pelanggan' =>$this->Pelanggan_model->get_all(),
            'sett_apps' =>$this->Setting_app_model->get_by_id(1),
            'action' => site_url('spal/create_action'),
	    'spal_id' => set_value('spal_id'),
	    'no_spal' => set_value('no_spal'),
	    'tanggal' => set_value('tanggal'),
	    'pelanggan_id' => set_value('pelanggan_id'),
	    'attn' => set_value('attn'),
	    'kapal' => set_value('kapal'),
	    'tongkang' => set_value('tongkang'),
	    'nama_muatan' => set_value('nama_muatan'),
	    'jumlah_muatan' => set_value('jumlah_muatan'),
	    'harga_muatan' => set_value('harga_muatan'),
	    'pelabuhan_muat' => set_value('pelabuhan_muat'),
	    'pelabuhan_bongkar' => set_value('pelabuhan_bongkar'),
	    'metode_pembayaran' => set_value('metode_pembayaran'),
	    'dokumen' => set_value('dokumen'),
	);
        $this->template->load('template','spal/spal_form', $data);
    }
    
    public function create_action() 
    {
        is_allowed($this->uri->segment(1),'create');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

        $config['upload_path']      = './assets/assets/img/spal'; 
        $config['allowed_types']    = 'pdf|doc|docx'; 
        $config['max_size']         = 10048; 
        $config['file_name']        = $this->input->post('no_spal',TRUE);
        $this->load->library('upload',$config);
        $this->upload->initialize($config);
        $this->upload->do_upload("dokumen");
        $data = $this->upload->data();
        $dokumen =$data['file_name'];


            $data = array(
		'no_spal' => $this->input->post('no_spal',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'pelanggan_id' => $this->input->post('pelanggan_id',TRUE),
		'attn' => $this->input->post('attn',TRUE),
		'kapal' => $this->input->post('kapal',TRUE),
		'tongkang' => $this->input->post('tongkang',TRUE),
		'nama_muatan' => $this->input->post('nama_muatan',TRUE),
		'jumlah_muatan' => $this->input->post('jumlah_muatan',TRUE),
		'harga_muatan' => $this->input->post('harga_muatan',TRUE),
		'pelabuhan_muat' => $this->input->post('pelabuhan_muat',TRUE),
		'pelabuhan_bongkar' => $this->input->post('pelabuhan_bongkar',TRUE),
		'metode_pembayaran' => $this->input->post('metode_pembayaran',TRUE),
		'dokumen' => $dokumen,
	    );

            $this->Spal_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('spal'));
        }
    }
    
    public function update($id) 
    {
        is_allowed($this->uri->segment(1),'update');
        $row = $this->Spal_model->get_by_id(decrypt_url($id));

        if ($row) {
            $data = array(
                'button' => 'Update',
                'pelanggan' =>$this->Pelanggan_model->get_all(),
                'sett_apps' =>$this->Setting_app_model->get_by_id(1),
                'action' => site_url('spal/update_action'),
		'spal_id' => set_value('spal_id', $row->spal_id),
		'no_spal' => set_value('no_spal', $row->no_spal),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'pelanggan_id' => set_value('pelanggan_id', $row->pelanggan_id),
		'attn' => set_value('attn', $row->attn),
		'kapal' => set_value('kapal', $row->kapal),
		'tongkang' => set_value('tongkang', $row->tongkang),
		'nama_muatan' => set_value('nama_muatan', $row->nama_muatan),
		'jumlah_muatan' => set_value('jumlah_muatan', $row->jumlah_muatan),
		'harga_muatan' => set_value('harga_muatan', $row->harga_muatan),
		'pelabuhan_muat' => set_value('pelabuhan_muat', $row->pelabuhan_muat),
		'pelabuhan_bongkar' => set_value('pelabuhan_bongkar', $row->pelabuhan_bongkar),
		'metode_pembayaran' => set_value('metode_pembayaran', $row->metode_pembayaran),
		'dokumen' => set_value('dokumen', $row->dokumen),
	    );
            $this->template->load('template','spal/spal_form', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('spal'));
        }
    }
    
    public function update_action() 
    {
        is_allowed($this->uri->segment(1),'update');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('spal_id', TRUE));
        } else {
            $nama = $this->input->post('no_spal');

            $config['upload_path']      = './assets/assets/img/spal'; 
            $config['allowed_types']    = 'pdf|doc|docx'; 
            $config['max_size']         = 10048; 
            $config['file_name']        =$nama.'Rev';
            $this->load->library('upload',$config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload("dokumen")) {
            $id = $this->input->post('spal_id');
            $row = $this->Spal_model->get_by_id($id);
            $data = $this->upload->data();
            $dokumen =$data['file_name'];
            if($row->dokumen==null || $row->dokumen=='' ){
            }else{

            $target_file = './assets/assets/img/spal/'.$row->dokumen;
            unlink($target_file);
            
            }
                }else{
                $dokumen = $this->input->post('dokumen_lama');
            }

            $data = array(
		'no_spal' => $this->input->post('no_spal',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'pelanggan_id' => $this->input->post('pelanggan_id',TRUE),
		'attn' => $this->input->post('attn',TRUE),
		'kapal' => $this->input->post('kapal',TRUE),
		'tongkang' => $this->input->post('tongkang',TRUE),
		'nama_muatan' => $this->input->post('nama_muatan',TRUE),
		'jumlah_muatan' => $this->input->post('jumlah_muatan',TRUE),
		'harga_muatan' => $this->input->post('harga_muatan',TRUE),
		'pelabuhan_muat' => $this->input->post('pelabuhan_muat',TRUE),
		'pelabuhan_bongkar' => $this->input->post('pelabuhan_bongkar',TRUE),
		'metode_pembayaran' => $this->input->post('metode_pembayaran',TRUE),
		'dokumen' => $dokumen,
	    );

            $this->Spal_model->update($this->input->post('spal_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('spal'));
        }
    }
    
    public function delete($id) 
    {
        is_allowed($this->uri->segment(1),'delete');
        $row = $this->Spal_model->get_by_id(decrypt_url($id));

        if ($row) {
            if($row->dokumen==null || $row->dokumen=='' ){
                }else{
                $target_file = './assets/assets/img/spal/'.$row->dokumen;
                unlink($target_file);
                }


            $this->Spal_model->delete(decrypt_url($id));
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('spal'));
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('spal'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('no_spal', 'no spal', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('pelanggan_id', 'pelanggan id', 'trim|required');
	$this->form_validation->set_rules('attn', 'attn', 'trim|required');
	$this->form_validation->set_rules('kapal', 'kapal', 'trim|required');
	$this->form_validation->set_rules('tongkang', 'tongkang', 'trim|required');
	$this->form_validation->set_rules('nama_muatan', 'nama muatan', 'trim|required');
	$this->form_validation->set_rules('jumlah_muatan', 'jumlah muatan', 'trim|required');
	$this->form_validation->set_rules('harga_muatan', 'harga muatan', 'trim|required');
	$this->form_validation->set_rules('pelabuhan_muat', 'pelabuhan muat', 'trim|required');
	$this->form_validation->set_rules('pelabuhan_bongkar', 'pelabuhan bongkar', 'trim|required');
	$this->form_validation->set_rules('metode_pembayaran', 'metode pembayaran', 'trim|required');
	$this->form_validation->set_rules('dokumen', 'dokumen', 'trim');

	$this->form_validation->set_rules('spal_id', 'spal_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        is_allowed($this->uri->segment(1),'read');
        $this->load->helper('exportexcel');
        $namaFile = "spal.xls";
        $judul = "spal";
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
	xlsWriteLabel($tablehead, $kolomhead++, "No Spal");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
	xlsWriteLabel($tablehead, $kolomhead++, "Pelanggan Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Attn");
	xlsWriteLabel($tablehead, $kolomhead++, "Kapal");
	xlsWriteLabel($tablehead, $kolomhead++, "Tongkang");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Muatan");
	xlsWriteLabel($tablehead, $kolomhead++, "Jumlah Muatan");
	xlsWriteLabel($tablehead, $kolomhead++, "Harga Muatan");
	xlsWriteLabel($tablehead, $kolomhead++, "Pelabuhan Muat");
	xlsWriteLabel($tablehead, $kolomhead++, "Pelabuhan Bongkar");
	xlsWriteLabel($tablehead, $kolomhead++, "Metode Pembayaran");
	xlsWriteLabel($tablehead, $kolomhead++, "Dokumen");

	foreach ($this->Spal_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_spal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
	    xlsWriteNumber($tablebody, $kolombody++, $data->pelanggan_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->attn);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kapal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tongkang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_muatan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jumlah_muatan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->harga_muatan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pelabuhan_muat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pelabuhan_bongkar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->metode_pembayaran);
	    xlsWriteLabel($tablebody, $kolombody++, $data->dokumen);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function gen_no_spal()
        {
            $tahun = date('Y');
            $pelanggan_id = $this->input->post('kode');

            if ($pelanggan_id !='' || $pelanggan_id !=null)  {
                $sql1 = "SELECT kode_pelanggan from pelanggan where pelanggan_id='$pelanggan_id'";
                $query_kode = $this->db->query($sql1);
                $kd1 = $query_kode->row();
                $kd = $kd1->kode_pelanggan;
                    $sql= "SELECT MAX(LEFT(no_spal,3)) AS no_spal FROM spal where Left(tanggal,4)='$tahun'";
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

}

/* End of file Spal.php */
/* Location: ./application/controllers/Spal.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-10-06 05:53:23 */
/* http://harviacode.com */