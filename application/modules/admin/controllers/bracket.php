<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bracket extends MX_Controller {
        function __construct() {
            parent::__construct();

            $this->load->model('admin/employee_time_record_model');
            $this->load->model('admin/employee_model');
            $this->load->model('admin/leave_model');
            $this->load->model('admin/time_suspend_model');
            $this->load->model('admin/computational_time_model');
            $this->load->model('admin/bracket_for_gov_remettance_model');
            $this->load->model('admin/bracket_model');
            error_reporting(0);
        }
    function index(){
        /*$check_log = modules::run("templ/payroll/check_login");
        if($check_log == TRUE){
            //redirect('admin/employee');
            $data['title'] = "Approval";
            $data['location'] = "Approval";
            $data['emp_approval_leave'] = leave_model::getSearch_all_emp_leave(array("leave.approved"=>"0"),"",array("leave.emp_id"=>"ASC"),true);
            
            
            
            if($this->session->userdata('session_log')){
                $data_sess = $this->session->userdata('session_log');
                    foreach($data_sess as $key => $value){
                        if($key == 'sess_user_type'){
                            $usertype = $value;
                        }
                    }
            }
            $data['user'] = $usertype;
            
            echo modules::run("templ/payroll/approval_page", $data);
        }else if($check_log == FALSE){
            $data = array(
            'title' => 'Login'
        );
            echo Modules::run("templ/payroll/login_page");
        }*/
        
    }
    function request(){
            if($this->uri->rsegment(3) == "create_bracket"){
                self::request_create_bracket();
            }
        }
    function request_create_bracket(){
        $bracket_name = $this->input->post('bracket_name');
        $salary_range = $this->input->post('salary_range');
        $monthly_deduction = $this->input->post('monthly_deduction');
        $employee_addon = $this->input->post('employee_addon');
        $data['name_of_bracket'] = $bracket_name;
        $data['salary_range'] = $salary_range;
        $data['monthly_deduction'] = $monthly_deduction;
        $data['employee_addon'] = $employee_addon;
        $data['used'] = 0;
        $data['enabled'] = 1;
        
        bracket_for_gov_remettance_model::insert_table($data);
        
        $get_unused_bracket = bracket_for_gov_remettance_model::getFields_bracket(0);
        if($get_unused_bracket){
            $bracket_id = $get_unused_bracket->bfgr_id;
            $bracket_name = $get_unused_bracket->name_of_bracket;
            
            $data['bfgr_given_id'] = strtolower("br$bracket_name"."_".$bracket_id);
            $data['used'] = 1;
            bracket_for_gov_remettance_model::update_table_bracket($data, "used", 0);
            
            
            
            
            echo "<div class='alert alert-success alert-dismissible'>
               <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
               <h4><i class='icon fa fa-ban'></i> Bracket Regestered Successfully!</h4>
                                                    
                </div>";
        }
    }
    function update_bracket(){
        $name_of_brk = $this->uri->rsegment(3);
        $salary_range = $this->uri->rsegment(4);
        $monthly_deduct = $this->uri->rsegment(5);
        $employee_add_on = $this->uri->rsegment(6);
        $bfgr_given_id = $this->uri->rsegment(7);
        
        $data['name_of_bracket'] = $name_of_brk;
        $data['salary_range'] = $salary_range;
        $data['monthly_deduction'] = $monthly_deduct;
        $data['employee_addon'] = $employee_add_on;
        
        bracket_for_gov_remettance_model::update_table($data, "bfgr_given_id", $bfgr_given_id);
        
        $this->load->library('user_agent');
        redirect($this->agent->referrer());

    }

}
?>