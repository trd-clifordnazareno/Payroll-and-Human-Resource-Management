<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bracket_For_Gov_Rem extends MX_Controller {
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
        $bracket_data = bracket_for_gov_remettance_model::getSearch_bracket(array(),"",array("bfgr.bfgr_given_id"=>"ASC"),true);
        $bracket_gov = bracket_model::getSearch_bracket(array(),"",array("bracket.bracket_id"=>"ASC"),true);
        
        $check_log = modules::run("templ/payroll/check_login");
        if($check_log == TRUE){
            //redirect('admin/employee');
            $data['title'] = "Bracket For Government Remittance";
            $data['location'] = "Bracket For Government Remittance";
            
            
            if($this->session->userdata('session_log')){
                $data_sess = $this->session->userdata('session_log');
                    foreach($data_sess as $key => $value){
                        if($key == 'sess_user_type'){
                            $usertype = $value;
                        }
                    }
            }
            $data['user'] = $usertype;
            $data['bracket_data'] = $bracket_data;
            $data['bracket_gov'] = $bracket_gov;
            
            echo modules::run("templ/payroll/bracket_for_gov", $data);
        }else if($check_log == FALSE){
            $data = array(
            'title' => 'Login'
        );
            echo Modules::run("templ/payroll/login_page");
        }
        
    }
    function approved_employee_leave(){
        $emp_code = $this->uri->rsegment(3);
        $date_leave = $this->uri->rsegment(4);
        $type_of_leave = $this->uri->rsegment(5);
        $leave_from = $this->uri->rsegment(6);
        $leave_to = $this->uri->rsegment(7);
        $data['approved'] = 1;
        $data['use'] = 1;
        
        $start = strtotime($leave_from);
        $end = strtotime($leave_to);

        $days_between = ceil(abs($end - $start) / 86400) + 1;
        
        if($type_of_leave == "vacation%20leave"){
            $check_emp = employee_model::getFields($emp_code);
                $vacation_leave = $check_emp->emp_leave_available - $days_between;
                $data_updt['emp_leave_available'] = $vacation_leave;
                employee_model::update_table($data_updt, "emp_code", $emp_code);
        }else if($type_of_leave == "sick%20leave"){
            $check_emp = employee_model::getFields($emp_code);
                $sick_leave = $check_emp->emp_sick_leave_available - $days_between;
                $data_updt['emp_sick_leave_available'] = $sick_leave;
                employee_model::update_table($data_updt, "emp_code", $emp_code);
        }
        
        
        
        
        
        leave_model::update_emp_leave($data, "emp_id", $emp_code, "leave_file_date", $date_leave);
        
        $this->load->library('user_agent');
        redirect($this->agent->referrer());
    }
    function del_bracket_for_gov_rem(){
        $bfgr_given_id = $this->uri->rsegment(3);
        $data['enabled'] = 0;
        bracket_for_gov_remettance_model::update_table($data, "bfgr_given_id", $bfgr_given_id);
        
        $this->load->library('user_agent');
        redirect($this->agent->referrer());
    }

}
?>