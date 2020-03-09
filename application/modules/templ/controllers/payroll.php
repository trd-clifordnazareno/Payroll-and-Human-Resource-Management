<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Payroll extends MX_Controller {

	
    function daily_time_rec($data){
                    $this->load->view("payroll/contents/daily_time_records/daily_time_rec", $data);
                }    
    
    public function display_daily_time_records($data){
            $this->load->view("payroll/contents/daily_time_records/display_daily_time_record", $data);
                }
    public function display_payroll_records($data){
            $this->load->view("payroll/contents/payroll/ajax_request/display_payroll_records", $data);
                }
    public function payroll_rec($data){
            $this->load->view("payroll/contents/payroll/payroll_page", $data);
                } 
                public function empoyees_page($data){
            $this->load->view("payroll/contents/employee/employee_page1", $data);
                }
    public function leave_page($data){
            $this->load->view("payroll/contents/leave/leave_page", $data);
                }
    public function approval_page($data){
            $this->load->view("payroll/contents/approve/approve_page", $data);
                }
    function bracket_for_gov($data){
        $this->load->view("payroll/contents/bracket_for_gov/bracket_for_gov_page", $data);
    }
    function check_login(){
        if($this->session->userdata('session_log')){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    function login_page(){
        $this->load->view("payroll/contents/login/login_page");
    }
    function dept_page($data){
        $this->load->view("payroll/contents/dept/dept_page", $data);
    }
    function position_page($data){
        $this->load->view("payroll/contents/position/position_page", $data);
    }
    function display_leave($data){
        $this->load->view("payroll/contents/leave/leave_form/leave_form", $data);
    }
    function add_on_page($data){
        $this->load->view("payroll/contents/add_on/add_on", $data);
    }
    function deduction_page($data){
        $this->load->view("payroll/contents/add_on/deduction_advances", $data);
    }
    function add_on_rec($data){
        $this->load->view("payroll/contents/add_on/ajax/add_on_rec", $data);
    }
    function deduction_advances_rec($data){
        $this->load->view("payroll/contents/add_on/ajax/deduction_advances_rec", $data);
    }
	function hollidays_page($data){
        $this->load->view("payroll/contents/hollidays/hollidays_page", $data);
    }
    function over_time_page($data){
        $this->load->view("payroll/contents/overtime/over_time_page", $data);
    }
    
    
    
    
    
    /*function sample(){
        return "$data";
    }*/

		





}
/*public function main($data){

			$this->load->view("payroll/contents/home", $data);

		}
	public function blog(){

			$this->load->view("TEMPLATE");

		}*/