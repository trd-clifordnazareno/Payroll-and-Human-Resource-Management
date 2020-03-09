<?php



defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends MX_Controller {
        function __construct() {
            parent::__construct();

            $this->load->model('admin/employee_time_record_model');
            $this->load->model('admin/employee_model');
            $this->load->model('admin/leave_model');
            $this->load->model('admin/time_suspend_model');
            $this->load->model('admin/computational_time_model');
            $this->load->model('admin/bracket_for_gov_remettance_model');
            $this->load->model('admin/dept_model');
            $this->load->model('admin/position_model');
            error_reporting(0);
        }

	public function index(){

        $check_log = modules::run("templ/payroll/check_login");
        if($check_log == TRUE){
            
            $get_dept_rec = dept_model::getSearch_dept(array(),"",array("dept.dept_id"=>"ASC"),true);
            
            $data['location'] = "Department";
            $data['title'] = "Department";
            $data['header_title'] = "Department";
            
            if($this->session->userdata('session_log')){
                $data_sess = $this->session->userdata('session_log');
                    foreach($data_sess as $key => $value){
                        if($key == 'sess_user_type'){
                            $usertype = $value;
                        }
                    }
            }
            $data['user'] = $usertype;
            $data['dept_rec'] = $get_dept_rec;
            echo modules::run("templ/payroll/dept_page", $data);
        }else if($check_log == FALSE){
            $data = array(
            'title' => 'Login'
        );
            echo Modules::run("templ/payroll/login_page");
        }
            

        }
        function request(){
            if($this->uri->rsegment(3) == "create_dept"){
                self::request_create_dept();
            }
        }
        function update_dept(){
            $dept_name = $this->uri->rsegment(3);
            $dept_id = $this->uri->rsegment(4);
            
            $data['dept_name'] = $dept_name;
            
            dept_model::update_table($data, "dept_id", $dept_id);
            
            $this->load->library('user_agent');
            redirect($this->agent->referrer());
        }
    function del_dept(){
        $dept_id = $this->uri->rsegment(3);
        $data['enabled'] = 0;
        dept_model::update_table($data, "dept_id", $dept_id);
        
        $this->load->library('user_agent');
        redirect($this->agent->referrer());
    }
    function request_create_dept(){
        $dept_name = $this->input->post('dept_name');
        
        $this->load->library("form_validation");
        
        $this->form_validation->set_rules('dept_name', 'Department', 'trim|required');
        
        
        if($this->form_validation->run() == false){
               echo "<div class='alert alert-danger alert-dismissible'>
               <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
               <h4><i class='icon fa fa-ban'></i> Empty Field!</h4>
                                                    
                </div>";
           }else{
            $dept_insert['dept_name'] = $dept_name;
            $dept_insert['enabled'] = 1;
            dept_model::insert_table($dept_insert);
            
            echo "<div class='alert alert-success alert-dismissible'>
               <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
               <h4><i class='icon fa fa-ban'></i> Department Registered Successfully!</h4>
                                                    
                </div>";
        }
    }
        
        
    
    
  





//////////////////////////////////////////////////////////////////////////////////////////



}
