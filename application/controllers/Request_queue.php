<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Request_queue extends CI_Controller
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
        $request_form = $this->Request_form_model->get_all_active_request();
        $data = array(
            'request_queue_data' => $request_form,
            'sett_apps' =>$this->Setting_app_model->get_by_id(1),
        );
        $this->template->load('template','request_queue/request_queue_list', $data);
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
                'keterangan_tolak' => $row->keterangan_tolak,
                'status' => $row->status,
                'whoisreviewing' => $row->approval,
                'classnyak' => $this
            );
            $this->template->load('template','request_queue/request_queue_read', $data);
        } else {
            $this->session->set_flashdata('error', 'Record Not Found');
            redirect(site_url('request_queue'));
        }
    }

    function getusername($id)
    {
        $this->load->model('User_m');
        $data = $this->User_m->get_by_id($id);
        return $data;
    }

    function get_keterangan_tolak($request_form_id)
    {
        $data = $this->Request_form_model->get_by_id($request_form_id);
        return $data;
    }

    // function detectdisapprovedrequest($id_request_form)
    // {
    //     $data = $this->Request_form_model->detect_dissapprove_status($id_request_form);

    //     if($data > 0)
    //     {
    //         return 'not active';
    //     }
    //     else
    //     {
    //         return 'active';
    //     }
    // }

    function disapprove()
    {
        $kd_form_request = $this->input->post('kd_form_request');
        $id_request_form = $this->input->post('request_form_id');
        $categori_request_id = $this->input->post('categori_request_id');
        $signer = $this->session->userdata('userid');

        $disapprove_reason = $this->input->post('disapprove_reason');

        $approval_list = $this->Request_form_model->get_by_id(decrypt_url($id_request_form))->approval;

        $arr_appr = json_decode($approval_list,true);

        $detectstepforthissigner = $this->Categori_request_model->get_step_for_signer($signer, $categori_request_id)->step;

        $realstep = intval($detectstepforthissigner) - 1;

        $init = $arr_appr;

        $init[$realstep]['status'] = 'false';
        $init[$realstep]['tanda_tangan'] = 'sudah';

        $data = array(
            'status' => 'Ditolak',
            'approval' => json_encode($init),
            'keterangan_tolak' => $disapprove_reason,
        );

        $this->Request_form_model->update(decrypt_url($id_request_form), $data);

        $this->session->set_flashdata('message', 'Penolakan berhasil di inisialisasi');
        redirect(site_url('request_queue'));
    }

    function approve()
    {
        $kd_form_request = $this->input->post('kd_form_request');
        $id_request_form = $this->input->post('request_form_id');
        $categori_request_id = $this->input->post('categori_request_id');
        $signer = $this->input->post('signer');

        $disapprove_reason = $this->input->post('disapprove_reason');

        $approval_list = $this->Request_form_model->get_by_id(decrypt_url($id_request_form))->approval;

        $arr_appr = json_decode($approval_list,true);

        $detectstepforthissigner = $this->Categori_request_model->get_step_for_signer($signer, $categori_request_id)->step;

        $realstep = intval($detectstepforthissigner) - 1;

        echo 'before <br>';
        echo '<pre>';
            print_r($arr_appr);
        echo '</pre>';


        $init = $arr_appr;

        $init[$realstep]['status'] = 'true';
        $init[$realstep]['tanda_tangan'] = 'sudah';

        $counted = count($init);

        if ($realstep <= $counted) {
            $init[$realstep + 1]['tanda_tangan'] = 'sekarang';
        }

        echo '<br><br>aFTER';
        echo '<pre>';
            print_r($init);
        echo '</pre>';
    }

}

/* End of file Request_form.php */
/* Location: ./application/controllers/Request_form.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-09-14 11:13:12 */
/* http://harviacode.com */