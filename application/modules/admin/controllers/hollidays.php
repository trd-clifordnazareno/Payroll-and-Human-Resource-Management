<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Hollidays extends MX_Controller {
        function __construct() {
            parent::__construct();

            $this->load->model('admin/employee_time_record_model');
            $this->load->model('admin/employee_model');
            $this->load->model('admin/leave_model');
            $this->load->model('admin/time_suspend_model');
            $this->load->model('admin/computational_time_model');
            $this->load->model('admin/bracket_for_gov_remettance_model');
            $this->load->model('admin/add_on_model');
            $this->load->model('admin/holliday_model');
            error_reporting(0);
        }
    function index(){
        $check_log = modules::run("templ/payroll/check_login");
        if($check_log == TRUE){
            //redirect('admin/employee');
            $data['title'] = "Hollidays";
            $data['location'] = "Hollidays";
            
            if($this->session->userdata('session_log')){
                $data_sess = $this->session->userdata('session_log');
                    foreach($data_sess as $key => $value){
                        if($key == 'sess_user_type'){
                            $usertype = $value;
                        }
                    }
            }
            $data['user'] = $usertype;
            $data['hollidays'] = holliday_model::get_all_hollidays();
            echo modules::run("templ/payroll/hollidays_page", $data);
        }else if($check_log == FALSE){
            $data = array(
            'title' => 'Login'
        );
            echo Modules::run("templ/payroll/login_page");
        }
        
    }
    function deduction(){
        $data['employee'] = add_on_model::get_all_employee();
        echo Modules::run("templ/payroll/deduction_page", $data);
    }
    
    
    
    
    function ajax_method(){
            if($this->uri->rsegment(3) == "create_holliday"){
                self::request_create_holliday();
            }
        }
    function request_create_holliday(){
        /*$holliday_name = $_POST['holliday_name'];
        $date = $_POST['date'];
        $data['holiday_type'] = $holliday_name;
        holliday_model::update_table($data, "date_time_record", $date);*/
		$holliday_name = $_POST['holliday_name'];
        $date = $_POST['date'];
        
        $get_all_emp = employee_model::get_emp_records_list();
		holliday_model::delete_spicific_date("date_time_record", $date);
        foreach($get_all_emp as $get_all_emp_data){
            $data['date_time_record'] = $date;
            $data['time_in_date'] = "08:30:00";
            $data['time_out_date'] = "17:30:00";
            $data['emp_id'] = $get_all_emp_data->emp_code;
            $data['holiday_type'] = $holliday_name;
            $data['enabled'] = 1;
            holliday_model::insert_table_holliday($data);
            
        }
        //holliday_model::update_table($data);
        
    }
    function add_deduction(){
        $id = "10044";
        $data['emp_id'] = "10044";
        $data['amount'] = 100;
        $data['status'] = 0;
        add_on_model::insert_table_ded($data);
        $get = add_on_model::get_ded($id);
        if($get){
            foreach($get as $get_data){
                $emp_id = $get_data->emp_id;
                $amount = $get_data->amount;
                
                $get_update = add_on_model::get_update($emp_id);
                if($get_update){
                    foreach($get_update as $get_update_data){
                        $num = $get_update_data->amount_left - $amount;
                        $datas['amount_left'] = $num;
                        $datas['amount_left'] = $num;
                        add_on_model::update_ded($datas, "emp_id", $emp_id);
                        $datasss['status'] = 1;
                        add_on_model::update_deds($datasss, "emp_id", $emp_id);
                    }
                }
                
        }
        }
    }
    function get_all_add_on(){
        $get_add_on_rec['employee_rec'] = employee_model::get_emp_records_list();
        $get_add_on_rec['add_on_rec'] = add_on_model::get_add_on_rec();
        echo Modules::run("templ/payroll/add_on_rec", $get_add_on_rec);
    }

}
?>