<?php
class Login extends CI_controller{
  function __construct(){
    parent::__construct();
    //constructors here
    $this->load->model('clients/clients_model');
    error_reporting(0);
  }
    function index(){
    if($this->session->userdata('session_log')){
        $data = $this->session->userdata('session_log');
        foreach($data as $key => $value){
            if($key == 'sess_user_type'){
                $usertype = $value;
            }
        }
        if($user_type == "user"){
            redirect('view_running_status/view_running_status');
        }else if($user_type == "admin"){
            redirect('Display_Client_ogin_Logs/Display_Client_Login_Logs');
        }
      
    }else{
        $data = array(
            'title' => 'Login'
        );
      $this->load->view('files/logs/login', $data);
    }

    }
    function method(){
      if($this->uri->rsegment(3) == 'log'){
        self::_method_log_user();
      }
    }
    function _method_log_user(){
      $username = $_POST['username'];
      $password = $_POST['password'];

      $this->load->library('form_validation');

      $this->form_validation->set_rules('username', 'Username', 'trim|required');
      $this->form_validation->set_rules('password', 'Password', 'trim|required');
      //$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

      if($this->form_validation->run() == false){
          
              $data = array(
                  'title' => 'Login',
              'error' => 'incomplete fields'
          );
          $this->load->view('files/logs/login', $data);
          
              

      }else{
          $data = clients_model::client_users($username, $password);
          if($data){
              foreach ($data as $data){
                  $client_id = $data->client_account_id;
                  $username = $data->client_username;
                   $password = $data->client_password;
                   $corporate_name = $data->client_corporate_name;
                   $user_type = $data->user_type;
                   
              }
              $data = array(
                  'sess_username' => $username,
                  'sess_user_id' => $client_id,
                  'corporate_name' => $corporate_name,
                  'sess_password' => $password,
                  'sess_time' => date("Y-m-d"),
                  'sess_user_type' => $user_type
              );
              $this->session->set_userdata('session_log', $data);
              $data = array(
                  'client_username' => $username,
                  'client_corporate_name' => $corporate_name,
                  'client_id' => $client_id,
                  'login_time' => date("Y-m-d H:i:s"),
                  'is_login' => "1",
                  'logout_time' => ""
              );
              clients_model::client_logs($data);
              if($user_type == "user"){
                  redirect('view_running_status/view_running_status');
              }else if($user_type == "admin"){
                  redirect('Display_Client_ogin_Logs/Display_Client_Login_Logs');
              }
              
          }else{
              $data = array(
                  'title' => 'login',
                  'error' => 'incorrect username or password'
              );
              $this->load->view('files/logs/login', $data);
          }
            
       

      }


    }
    function logout(){
        $data_sess = $this->session->userdata('session_log');
        foreach($data_sess as $key => $value){
            if($key == 'client_id'){
                $client_id = $value;
            }
            
        }
        $data = array(
                  'is_login' => "0",
                  'logout_time' => date("Y-m-d H:i:s")
              );
              clients_model::client_logs_out($client_id, $data);
        $this->session->unset_userdata('session_log');
        $this->session->sess_destroy();
        $this->load->view('files/logs/login');
    }
}
