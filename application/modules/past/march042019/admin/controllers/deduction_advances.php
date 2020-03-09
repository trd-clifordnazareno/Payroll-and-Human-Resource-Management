<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Deduction_Advances extends MX_Controller {
        function __construct() {
            parent::__construct();

            $this->load->model('admin/employee_time_record_model');
            $this->load->model('admin/employee_model');
            $this->load->model('admin/leave_model');
            $this->load->model('admin/time_suspend_model');
            $this->load->model('admin/computational_time_model');
            $this->load->model('admin/bracket_for_gov_remettance_model');
            $this->load->model('admin/add_on_model');
            $this->load->model('admin/deduction_advances_model');
            error_reporting(0);
        }
    function index(){
        $check_log = modules::run("templ/payroll/check_login");
        if($check_log == TRUE){
            //redirect('admin/employee');
            $data['title'] = "Approval";
            $data['location'] = "Approval";
            
            if($this->session->userdata('session_log')){
                $data_sess = $this->session->userdata('session_log');
                    foreach($data_sess as $key => $value){
                        if($key == 'sess_user_type'){
                            $usertype = $value;
                        }
                    }
            }
            $data['user'] = $usertype;
            $data['employee'] = add_on_model::get_all_employee();
            echo modules::run("templ/payroll/deduction_page", $data);
        }else if($check_log == FALSE){
            $data = array(
            'title' => 'Login'
        );
            echo Modules::run("templ/payroll/login_page");
        }
        
    }
    
    
    
    
    
    function request(){
            if($this->uri->rsegment(3) == "deduction_advances"){
                self::request_deduction_advances();
            }
        }
    function request_deduction_advances(){
        $from = $_POST['from'];
        $to = $_POST['to'];
        $item_name = $_POST['item_name'];
        $amount = $_POST['amount'];
        $amount_to_deduct = $_POST['amount_to_deduct'];
        $emp_id = $_POST['emp_id'];
        $this->load->library("form_validation");
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required');
        $this->form_validation->set_rules('amount_to_deduct', 'Amount To Deduct', 'trim|required');
        if($this->form_validation->run() == false){
                                                echo "<div class='alert alert-danger alert-dismissible'>
                                                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                                    <h4><i class='icon fa fa-ban'></i> Incomplete Fields!</h4>
                                                    
                                                    </div>";
                                            }else{
                                                $data['start'] = $from;
                                                $data['end'] = $to;
                                                $data['item_name'] = $item_name;
                                                $data['amount'] = $amount;
                                                $data['amount_to_deduct'] = $amount_to_deduct;
                                                $data['emp_id'] = $emp_id;
                                                $data['status'] = 0;
                                                $data['enabled'] = 1;
                                                deduction_advances_model::insert_table($data);
                                                echo "<div class='alert alert-success alert-dismissible'>
                                                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                                    <h4><i class='icon fa fa-ban'></i> Add Successful!</h4>
                                                    
                                                    </div>";
                                            }
                                             
        
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
	function get_all_deduction_advances(){
        $data['employee_rec'] = employee_model::get_emp_records_list();
        $data['ded_adv_rec'] = deduction_advances_model::get_deduction_advances();
        echo Modules::run("templ/payroll/deduction_advances_rec", $data);
    }

}
?>