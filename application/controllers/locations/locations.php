<?php

class Locations extends CI_controller{
    function __construct() {
        parent::__construct();
        
        $this->load->model('users/users');
        $this->load->model('display_users/display_user');
        $this->load->model('location2/location2_model');
        error_reporting(0);
    }
    function index(){
        
    }
    function create_loc(){
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
            'title' => 'Create Locations',
            'page_content' => 'Create Locations'
        );
        $this->load->view('files/locations/create_loc', $data);
        }else{
            redirect('login');
        }
    }
    function loc_regester(){
        $count_location = location2_model::count_location();
        if($count_location){
            foreach($count_location as $count_location){
                $count_num = sprintf('%02d', $count_location->count);
            }
        }else{
            $count_num = 01;
        }
        $date_y = date("Y");
        $date_m = date("m");
        $date_d = date("d");
        
        $full_date = $date_y.$date_m.$date_d;
        
        $location_code_assign = $_POST['locationcode'];
        //$clientcode = $_POST['clientcode'];
        $ads = "RMNI-";
        $bar = "-";
        
        $locationcode = $ads.$location_code_assign.$bar.$full_date.$count_num;
        
        $locationname = $_POST['locationname'];
        $time = $_POST['time'];
        $timeout = $_POST['timeout'];
        
        $this->load->library("form_validation");
        
        $this->form_validation->set_rules('locationcode', 'Locationcode', 'trim|required');
        //$this->form_validation->set_rules('clientcode', 'Clientcode', 'trim|required');
        $this->form_validation->set_rules('locationname', 'Locationname', 'trim|required');
        //$this->form_validation->set_rules('time', 'Time', 'trim|required');
        
        if($this->form_validation->run() == false){
            $data = array(
                'error' => "Incomplete Input Field",
                'create_loc' => 1
            );
            $this->load->view("files/error/log_error", $data);
        }else{
            $ajax = $_POST['ajax'];
        
        $check_loc_code = $locationcode;
        
        $data = location2_model::check_loc_code($check_loc_code);
        
        if($data){
            $datas = array(
                'error' => "Location Code is Already Exist"
            ); 
            $this->load->view("files/error/loc_err_regester", $datas);
        }else{
            $data = array(
                'location_code' => $locationcode,
                //'client_id' => $clientcode,
                'location_name' => $locationname,
                'time' => $time,
                'time_Off' => $timeout
            );
            location2_model::regester_loc($data);
            $data = array(
                'success' => "Regester Location Successfully",
            );
            $this->load->view("files/reports/view_dig_signage", $data);
        }
        }
        
        
        
        
        
    }
}

