<?php
class Login extends CI_controller{
  function __construct(){
    parent::__construct();
    //constructors here
    $this->load->model('users/users');
    error_reporting(0);
  }
    function index(){
    if($this->session->userdata('session_log')){
      redirect('home/home_page');
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
          $data = users::login_users($username, $password);
          if($data){
              foreach ($data as $data){
                  $username = $data->username;
                   $user_Id = $data->user_id;
                   $user_code = $data->user_code;
                   $password = $data->password;
                   $firstname = $data->firstname;
                   $lastname = $data->lastname;
                   $position = $data->position;
                   $department = $data->department;
                   $usertype = $data->user_type;
              }
              $data = array(
                  'sess_username' => $username,
                  'sess_user_id' => $user_id,
                  'sess_user_code' => $user_code,
                  'sess_user_type' => $usertype,
                  'sess_password' => $password,
                  'sess_time' => date("Y-m-d"),
                  'sess_firstname' => $firstname,
                  'sess_lastname' => $lastname,
                  'sess_position' => $position,
                  'sess_department' => $department
              );
              $this->session->set_userdata('session_log', $data);
              $data = array(
                  'user_code' => $user_code,
                  'username' => $username,
                  'login_time' => date("Y-m-d"),
                  'user_type' => $usertype
              );
              users::logs($data);
              redirect('home/home_page');
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
        $this->session->unset_userdata('session_log');
        $this->session->sess_destroy();
        $this->load->view('files/logs/login');
    }
}
