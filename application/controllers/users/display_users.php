<?php
class Display_users extends CI_controller{
    function __construct() {
        parent::__construct();
        
        $this->load->model('users/users');
        $this->load->model('display_users/display_user');
        error_reporting(0);
    }
    function index(){
        if($this->session->userdata('session_log')){
            $data = $this->session->userdata('session_log');
        foreach($data as $key => $value){
            if($key == 'sess_username'){
                $username = $value;
            }
            if($key == 'sess_department'){
                $department = $value;
            }
            if($key == 'sess_position'){
                $position = $value;
            }
            if($key == 'sess_usercode'){
                $usercode = $value;
            }
            if($key == 'sess_firstname'){
                $firstname = $value;
            }
            if($key == 'sess_lastname'){
                $lastname = $value;
            }
        }
        $data = array(
            'sess_username' => $username,
            'sess_department' => $department,
            'sess_position' => $position,
            'sess_firstname' => $firstname,
            'sess_lastname' => $lastname,
            'sess_usercode' => $usercode,
            'title' => 'Display Users',
            'page_content' => 'Display Users'
        );
        $this->load->view('files/users/display_users', $data);
        }else{
            redirect('login');
        }
        
    }
    function method(){
        if($this->uri->rsegment(3) == "load_user"){
            self::_method_load_user();
        }else if($this->uri->rsegment(3) == "edit_user"){
            self::_method_edit_user();
        }
    }
    function all_users(){
        $data = users::get_all_employees();
        $data = array(
            'list_employee' => $data
        );
        $this->load->view('files/ajax_tables/users', $data);
    }
    function _method_load_user(){
        $data = $this->uri->rsegment(4);
        
        $data = display_user::check_user($data);
        
        if($data){
            foreach($data as $data){
                $usercode = $data->user_code;
                $usertype = $data->user_type;
                $username = $data->username;
                $password = $data->password;
                $firstname = $data->firstname;
                $lastname = $data->lastname;
                $position = $data->position;
                $department = $data->department;
            }
            $sess = $this->session->userdata('session_log');
            foreach($sess as $key => $value){
                if($key == "sess_username"){
                    $sess_username = $value;
                }
                if($key == "sess_firstname"){
                    $sess_firstname = $value;
                }
                if($key == "sess_lastname"){
                    $sess_lastname = $value;
                }
                if($key == "sess_position"){
                    $sess_position = $value;
                }
                if($key == "sess_department"){
                    $sess_department = $value;
                }
            }
            $data_username = $sess_username;
            $data_firstname = $sess_firstname;
            $data_lastname = $sess_lastname;
            
            $data = array(
                'data_usercode' => $usercode,
                'data_usertype' => $usertype,
                'sess_username' => $data_username,
                'sess_firstname' => $sess_firstname,
                'sess_lastname' => $data_lastname,
                'sess_position' => $sess_position,
                'sess_department' => $sess_department,
                'data_password' => $password,
                'data_username' => $username,
                'data_firstname' => $firstname,
                'data_lastname' => $lastname,
                'data_position' => $position,
                'data_department' => $department,
                'title' => 'User Details',
                'page_content' => 'Display Users',
                'page_content2' => 'User Details'
            );
            $this->load->view('files/users/view_user_details', $data);
        }
    }
    function _method_edit_user(){
        ////////to be edit
        $usercode = $_POST['usercode'];
        $usertype = $_POST['usertype'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $position = $_POST['position'];
        $department = $_POST['department'];
        $ajax = $_POST['ajax'];
        
        $user_id = $usercode;
        $data = display_user::check_user($user_id);
        
        if($data){
            $data = array(
              'user_code' => $usercode,
              'user_type' => $usertype,
                'username' => $username,
                'password' => $password,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'position' => $position,
                'department' => $department
            );
            display_user::edit_user($user_id, $data);
            $data = $this->session->userdata("session_log");
            foreach ($data as $key => $value){
                if($key == "sess_usercode"){
                    $sess_usercode = $value;
                }
                if($key == "sess_username"){
                    $sess_username = $value;
                }
                if($key == "sess_user_type"){
                    $sess_usertype = $value;
                }
            }
            $data = array(
                  'user_code' => $sess_usercode,
                  'username' => $sess_username,
                  'login_time' => date("Y-m-d"),
                  'user_type' => $sess_usertype
              );
              users::logs($data);
            $data = array(
                    'success' => 'You Successfully Updated Data Users'
                );
            
            $this->load->view("files/error/success", $data);
        }
    }
    function delete_user(){
        
    }
}


?>

