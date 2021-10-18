<?php
function check_already_login(){

    $ci =& get_instance();
    $user_session = $ci->session->userdata('userid');
    if ($user_session){
        redirect('dashboard');
    }
}

//untuk semua ctrl cek seesion login dan session unit
function is_login(){
    $ci =& get_instance();
    $user_session = $ci->session->userdata('userid');
    if (!$user_session){
        redirect('auth');        
    }
}

//untuk bagian dashboard saja
function cek_login_aja(){
    $ci =& get_instance();
    $user_session = $ci->session->userdata('userid');
        if (!$user_session){
        redirect('auth');
        }
}

//akses menu
function check_access($level_id, $sub_menu_id ){
    $ci = get_instance();
    $ci->db->where('level_id', $level_id);
    $ci->db->where('sub_menu_id', $sub_menu_id);
    $result = $ci->db->get('user_access_menu');
    if ($result->num_rows() > 0 ) {
         return "checked='checked'";
    }

}

 //acces_read
  function check_access_read($level_id, $menu_id ){
    $ci = get_instance();
    $ci->db->where('level_id', $level_id);
    $ci->db->where('sub_menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');
    if ($result->num_rows() > 0 ) {
        $row = $result->row();
        if ($row->read == 1) {
            return "checked='checked'";
        }         
    }

 }

 //acces_create
  function check_access_create($level_id, $menu_id ){
    $ci = get_instance();
    $ci->db->where('level_id', $level_id);
    $ci->db->where('sub_menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');
    if ($result->num_rows() > 0 ) {
        $row = $result->row();
        if ($row->create == 1) {
            return "checked='checked'";
        }         
    }

 }

  //acces_update
  function check_access_update($level_id, $menu_id ){
    $ci = get_instance();
    $ci->db->where('level_id', $level_id);
    $ci->db->where('sub_menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');
    if ($result->num_rows() > 0 ) {
        $row = $result->row();
        if ($row->update == 1) {
            return "checked='checked'";
        }         
    }

 }

 //acces_delete
  function check_access_delete($level_id, $menu_id ){
    $ci = get_instance();
    $ci->db->where('level_id', $level_id);
    $ci->db->where('sub_menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');
    if ($result->num_rows() > 0 ) {
        $row = $result->row();
        if ($row->delete == 1) {
            return "checked='checked'";
        }         
    }

 }
 //acces_export
  function check_access_export($level_id, $menu_id ){
    $ci = get_instance();
    $ci->db->where('level_id', $level_id);
    $ci->db->where('sub_menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');
    if ($result->num_rows() > 0 ) {
        $row = $result->row();
        if ($row->export == 1) {
            return "checked='checked'";
        }         
    }

 }

//format rupiah
function rupiah($angka){
    
    $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
    return $hasil_rupiah;
}

function invoice(){

        $ci = get_instance();
        $tahun_bulan = date('Y-m');

        $sql= "SELECT LEFT(invoice,3) AS invoice_no FROM t_sale where Left(tanggal,7)='$tahun_bulan'";
        $query = $ci->db->query($sql);

        if ($query->num_rows()>0) {
            $row = $query->row();
            $n = ((int)$row->invoice_no)+1;
            $no = sprintf("%'.03d", $n);
        }else{
            $no = "001";
        }
        $invoice = $no;

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
    $hasil =$no.'//MJS-'.'/'.$fix.'/'.$tahun;
    return $hasil;
}

//is_allowed
function is_allowed($nama_menu, $access=null){
    $ci =& get_instance();
    $ci->load->library('fungsi');
    $user_session = $ci->fungsi->user_login()->level_id;
    $ci->db->select('user_access_menu.*,sub_menu.url');
    $ci->db->from('user_access_menu');
    $ci->db->join('sub_menu', 'sub_menu.sub_menu_id = user_access_menu.sub_menu_id','left');
    $ci->db->where('url', $nama_menu);
    $ci->db->where('level_id', $user_session);
    if ($access !=null){
        $ci->db->where($access,1);
    }
    $query = $ci->db->get();
    if ($query->num_rows() < 1 ) {
     redirect('not_access');
    }    
}

//is_allowed_button
function is_allowed_button($nama_menu, $access=null){
    $ci =& get_instance();
    $ci->load->library('fungsi');
    $user_session = $ci->fungsi->user_login()->level_id;
    $ci->db->select('user_access_menu.*,sub_menu.url');
    $ci->db->from('user_access_menu');
    $ci->db->join('sub_menu', 'sub_menu.sub_menu_id = user_access_menu.sub_menu_id','left');
    $ci->db->where('url', $nama_menu);
    $ci->db->where('level_id', $user_session);
    if ($access !=null){
        $ci->db->where($access,1);
    }
    $query = $ci->db->get();
    $hasil = $query->num_rows();
    return $hasil;

}

function penyebut($nilai) {
        $nilai = abs($nilai);
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " ". $huruf[$nilai];
        } else if ($nilai <20) {
            $temp = penyebut($nilai - 10). " belas";
        } else if ($nilai < 100) {
            $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " seratus" . penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " seribu" . penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
        }     
        return $temp;
    }
 
    function terbilang($nilai) {
        if($nilai<0) {
            $hasil = "minus ". trim(penyebut($nilai));
        } else {
            $hasil = trim(penyebut($nilai));
        }           
        return $hasil;
    }



