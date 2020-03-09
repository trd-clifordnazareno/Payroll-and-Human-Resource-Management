<?php
class Regester_users extends CI_controller{
    function __construct() {
        parent::__construct();
        
        $this->load->model('users/users');
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
            'title' => 'Regester',
            'page_content' => 'Regester Users'
        );
        $this->load->view('files/users/regester_users', $data);
        }else{
            redirect('login');
        }
        
    }
    function method(){
        if($this->uri->rsegment(3) == "regester"){
            self::_method_regester();
        }
    }
    function _method_regester(){
        $usercode = $_POST['usercode'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $position = $_POST['position'];
        $department = $_POST['department'];
        $usertype = $_POST['usertype'];
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('usercode', 'Usercode', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('usertype', 'Usertype', 'trim|required');
        $this->form_validation->set_rules('firstname', 'Firstname', 'trim|required');
        $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
        $this->form_validation->set_rules('position', 'Position', 'trim|required');
        $this->form_validation->set_rules('department', 'Department', 'trim|required');
        
        if($this->form_validation->run() == false){
            $data = array(
                'error' => 'incomplete input fields'
            );
            $this->load->view('files/error/log_error', $data);
    }else{
        $data = users::check_usercode($usercode);
            if($data){
                $data = array(
                    'error' => 'the usercode is already exist'
                );
                $this->load->view('files/error/log_error', $data);
            }else{
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
                users::insert_new_users($data);
                $data = array(
                    'success' => 'You Successfully Regestered'
                );
                $this->load->view('files/error/success', $data);
            }
    }
}
function url(){
    echo date("Y-m-d | h:i:sa");
}
}

