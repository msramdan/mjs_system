<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Receipts extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('T_purchase_model');
        $this->load->model('Setting_app_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data = array(
            'sett_apps' =>$this->Setting_app_model->get_by_id(1),
        );
        $this->template->load('template','receipts/receipts_list',$data);
    }

}
