<?php



defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller {
        function __construct() {
            parent::__construct();

            $this->load->model('admin/employee_time_record_model');
            $this->load->model('admin/employee_model');
            $this->load->model('admin/leave_model');
            $this->load->model('admin/time_suspend_model');
            $this->load->model('admin/computational_time_model');
            $this->load->model('admin/bracket_for_gov_remettance_model');
            $this->load->model('admin/leave_model');
            error_reporting(0);
        }

	public function index(){
        
        $check_log = modules::run("templ/payroll/check_login");
        if($check_log == TRUE){
            redirect('admin/employee');
        }else if($check_log == FALSE){
            $data = array(
            'title' => 'Login'
        );
            echo Modules::run("templ/payroll/login_page");
        }
        
        //echo modules::run("templ/payroll/leave_page", $data);
    }
    public function login_user(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        
        
        $this->load->library("form_validation");
        
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        
        
        if($this->form_validation->run() == false){
               echo "<div class='alert alert-danger alert-dismissible'>
               <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
               <h4><i class='icon fa fa-ban'></i> Incomplete Fields!</h4>
                                                    
                </div>";
           }else{
            $username_post = $username;
            $password_post = $password;
            
            $check_user = employee_model::check_user_login($username, $password);
            if($check_user){
                $data = array(
                  'sess_username' => $username,
                  'sess_user_type' => $check_user->user_type,
                    'sess_emp_id' => $check_user->emp_code,
                    'sess_full_name' => $check_user->emp_name,
                    'sess_sick_leave' => $check_user->emp_sick_leave_available,
                    'sess_vacation_leave' => $check_user->emp_leave_available
              );
              $this->session->set_userdata('session_log', $data);
                $base_url = base_url();
                if($check_user->user_type == "admin"){
                    echo "<script>window.location = '$base_url" . "admin/employee';</script>";
                }else if($check_user->user_type == "user"){
                    echo "<script>window.location = '$base_url" . "admin/leaves';</script>";
                }
            }else{
                echo "<div class='alert alert-danger alert-dismissible' id='login_failed'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <h4><i class='icon fa fa-ban'></i> Alert!</h4>
                Your Username or Password are Incorrect !.
              </div>";
            }
            
        }
        
    }
    function logout(){
        $this->session->unset_userdata('session_log');
        $this->session->sess_destroy();
        $base_url = base_url();
                echo "<script>window.location = '$base_url" . "admin/login';</script>";
    }
    
    
    
    
    
    
    
    
}