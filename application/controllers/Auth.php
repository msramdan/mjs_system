<?php defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Auth extends CI_Controller {

  public function __construct()
    {
      parent::__construct();
      $this->load->model('user_m');
      $this->load->model('Setting_app_model');
    }

  public function index()
  {
    check_already_login();

    $query_sql = "SELECT captcha FROM `setting_app` WHERE id=1";
    $data_cap = $this->db->query($query_sql)->row_array();
    if ($data_cap['captcha']=='Y') {
      $options = array(
        'img_path'=>'./captcha/', #folder captcha yg sudah dibuat tadi
        'img_url'=>base_url('captcha'), #ini arahnya juga ke folder captcha
        'img_width'=>'145', #lebar image captcha
        'img_height'=>'45', #tinggi image captcha
        'expiration'=>7200, #waktu expired
        'font_path' => FCPATH . 'assets/font/coolvetica.ttf', #load font jika mau ganti fontnya
        'pool' => '0123456789', #tipe captcha (angka/huruf, atau kombinasi dari keduanya)
        # atur warna captcha-nya di sini ya.. gunakan kode RGB
        'colors' => array(
                'background' => array(242, 242, 242),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(255, 40, 40))
           );
    $cap = create_captcha($options);
    $data['image'] = $cap['image'];
    $this->session->set_userdata('mycaptcha', $cap['word']);
    $data['word'] = $this->session->userdata('mycaptcha');
    $data['sett_apps'] = $this->Setting_app_model->get_by_id(1);
    $this->load->view('login', $data);
      
    }else{
      $data = array(
            'sett_apps' =>$this->Setting_app_model->get_by_id(1),
        );
    $this->load->view('login', $data);
    }
  }


  public function profile()
  {
    $this->template->load('template','profile');
  }

  public function process()
  {
    $captcha = $this->input->post('captcha_code'); #mengambil value inputan pengguna
    if (isset($captcha)){
      $word = $this->session->userdata('mycaptcha'); #mengambil value captcha
      if (isset($captcha)) { #cek variabel $captcha kosong/tidak
         if (strtoupper($captcha)==strtoupper($word)) { #proses pencocokan captcha
          $post =$this->input->post(null, TRUE);
          if (isset($post['login'])){
            $this->load->model('user_m');
            $query =$this->user_m->login($post);
            if($query->num_rows() >0){
              $row =$query->row();
              $params = array(
                'userid'=>$row->user_id,
                'level_id' =>$row->level_id
              );
              $this->session->set_userdata($params);
              $this->user_m->addHistory($this->fungsi->user_login()->user_id, $this->fungsi->user_login()->nama_user.' Telah melakukan login', $_SERVER['HTTP_USER_AGENT']);
            echo "<script>window.location='".site_url('dashboard')."'</script>";
            } else{
               $this->session->set_flashdata('gagal', 'Login gagal, username atau password salah');
               redirect(site_url('auth'));
            }
          }
          }else{
          $this->session->set_flashdata('gagal', 'Kode captcha salah');
               redirect(site_url('auth'));
         }
       }
    }else{
      $post =$this->input->post(null, TRUE);
          if (isset($post['login'])){
            $this->load->model('user_m');
            $query =$this->user_m->login($post);
            if($query->num_rows() >0){
              $row =$query->row();
              $params = array(
                'userid'=>$row->user_id,
                'level_id' =>$row->level_id
              );
              $this->session->set_userdata($params);
              $this->user_m->addHistory($this->fungsi->user_login()->user_id, $this->fungsi->user_login()->nama_user.' Telah melakukan login', $_SERVER['HTTP_USER_AGENT']);
            echo "<script>window.location='".site_url('dashboard')."'</script>";
            } else{
               $this->session->set_flashdata('gagal', 'Login gagal, username atau password salah');
               redirect(site_url('auth'));
            }
          }

    }    
  }

  public function logout()
  {
    $params = array('userid','level_id');
    $this->session->unset_userdata($params);
    redirect('auth');

  }

  public function edit_profil($id){
        $data = array(
            'name'            =>$this->input->post('name',true),
            'address'         =>$this->input->post('address',true),
            'email'         =>$this->input->post('email',true),
        );
        $this->user_m->ubah_data($data,$id);
         echo "<script> alert('Data Berhasil diupdate')</script>";
         echo"<script>window.location='".site_url('auth/profile')."'</script>";
         
    }

    public function edit_password($id){
        if (sha1($this->input->post('lama'))==$this->fungsi->user_login()->password) {
            $data = array(
                'password'          => sha1($this->input->post('password',true)),
            );
            $this->user_m->ubah_data($data,$id);
            echo "<script> alert('Data Password Berhasil diupdate')</script>";
            echo"<script>window.location='".site_url('auth/logout')."'</script>";
        }else{
            echo "<script> alert('Password Lama Salah')</script>";
            echo"<script>window.location='".site_url('auth/profile')."'</script>";
        } 
    }


  public function lupa_password(){
    $this->form_validation->set_rules('email','Email', 'required');

    if($this->form_validation->run() == false){
      $data = array(
            'sett_apps' =>$this->Setting_app_model->get_by_id(1),
        );
      $this->load->view('lupa_password',$data);
    }else{
      $email = $this->input->post('email');
      $user = $this->db->get_where('user',['email' =>$email])->row_array();

      if ($user) {
          $token = base64_encode(openssl_random_pseudo_bytes(32));
        //   $token = n2hex(openssl_random_pseudo_bytes(32));
        // $token = base64_encode(random_bytes(32));
        $user_token =[
            'email' =>$this->input->post('email',true),
            'token' =>$token,
            'create_date' =>time()
          ];
          $this->user_m->user_token($user_token);

          $this->_send_email($token,'forgot');
          echo "<script>
        alert('Silahkan cek email untuk reset password');
        window.location='".site_url('auth/lupa_password')."'</script>";
      }else{
        echo "<script>
        alert('Email tidak terdaftar atau user belum aktive');
        window.location='".site_url('auth/lupa_password')."'</script>";
      }
    }  
  }

  private function _send_email($token, $type){
    $config = [
      'protocol'   =>'smtp',
      'smtp_host'  =>'ssl://smtp.googlemail.com',
      'smtp_user'  =>'systemmjs3@gmail.com',
      'smtp_pass'  =>'ramdan9090',
      'smtp_port'  => 465,
      'mailtype'   =>'html',
      'charset'    =>'iso-8859-1',
      'newline'    =>"\r\n"

    ];

    $this->load->library('email',$config);
    $this->email->from('systemmjs3@gmail.com','Admin MJS System');
    $this->email->to($this->input->post('email'));

    if($type =='verify'){
      $this->email->subject('Aktivasi Akun');
      $this->email->message('Click this link to verify your account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '&username='. $this->input->post('username') . '">Activate</a>');
    }else if ($type == 'forgot'){
      $this->email->subject('Reset Password');
      $this->email->message('Click this link to reset your password : <a href="' . base_url() . 'auth/reset_password?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');

    }
    
    if($this->email->send()){
      return true;
    }else{
      echo $this->email->print_debugger();
      die;
    }

  }

   public function reset_password(){
    $email = $this->input->get('email');
    $token = $this->input->get('token');
    $user = $this->db->get_where('user', ['email' =>$email])->row_array();
    if($user){
      $user_token = $this->db->get_where('user_token', ['token' =>$token])->row_array();
      if ($user_token){
        if (time() - $user_token['create_date'] < (60 * 60 * 24)){
          $this->session->set_userdata('reset_email', $email);
          $this->rubah_password();
        }else{
        $this->db->delete('user_token', ['email' => $email]);
        echo "<script>
        alert('Reset password gagal, Token Kadaluarsa');
        window.location='".site_url('auth/login')."'</script>";
        }
      }else{
        echo "<script>
        alert('Reset Password gagal, Token salah');
        window.location='".site_url('auth/login')."'</script>";
      }

    }else{
      echo "<script>
        alert('Reset Password gagal, Email salah');
        window.location='".site_url('auth/login')."'</script>";
    }

  }


  public function rubah_password(){
  if(!$this->session->userdata('reset_email')){
    redirect('login');
  }
  $this->form_validation->set_rules('password','password', 'required');
  $this->form_validation->set_rules('passcon','passcon', 'required');
  if($this->form_validation->run() == false){
    $data = array(
            'sett_apps' =>$this->Setting_app_model->get_by_id(1),
        );
      $this->load->view('rubah_password',$data);
  }else{
    $password = sha1($this->input->post('password',true));
    $email    = $this->session->userdata('reset_email');
    $this->db->set('password',$password);
    $this->db->where('email', $email);
    $this->db->update('user');
    $this->db->delete('user_token',['email' =>$email]);
    $this->session->unset_userdata('reset_email');
    echo "<script>
        alert('Password berhasil di rubah, Silahkan Login');
        window.location='".site_url('auth')."'</script>";
  }
}


}