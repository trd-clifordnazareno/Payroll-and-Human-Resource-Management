<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Payroll_sheet extends MX_Controller{
    function __construct() {
            parent::__construct();

            $this->load->model('admin/employee_time_record_model');
            $this->load->model('admin/employee_model');
            $this->load->model('admin/leave_model');
            $this->load->model('admin/time_suspend_model');
            $this->load->model('admin/computational_time_model');
            $this->load->model('admin/bracket_for_gov_remettance_model');
            $this->load->model('admin/payroll_display_model');
            $this->load->model('admin/add_on_model');
            error_reporting(0);
        }
        
        function index(){
            $check_log = modules::run("templ/payroll/check_login");
        if($check_log == TRUE){
            //redirect('admin/employee');
            $data['location'] = "Payroll Records";
            $data['title'] = "Payroll Records";
            $data['header_title'] = "Payroll Records";
            
            
            
            
            if($this->session->userdata('session_log')){
                $data_sess = $this->session->userdata('session_log');
                    foreach($data_sess as $key => $value){
                        if($key == 'sess_user_type'){
                            $usertype = $value;
                        }
                    }
            }
            $data['user'] = $usertype;
            echo modules::run("templ/payroll/payroll_rec", $data);
        }else if($check_log == FALSE){
            $data = array(
            'title' => 'Login'
        );
            echo Modules::run("templ/payroll/login_page");
        }
            
        }
        function request(){
            if($this->uri->rsegment(3) == "payroll_rec"){
                self::request_payroll_rec();
            }
        }
        
        function request_payroll_rec(){
            ///unnecessary
            $time_suspend = ""; ///unnecessary
            $late_in_time_stat = "";///pila ang time na late if wala ka file /// ///unnecessary
            $late_hour_no_deduction = ""; ///naka file walay late if malate /// ///unnecessary
            $late_leave = "";///naka file ang late dagdagan sa leave /// ///unnecessary
            ///unnecessary





            $over_time_total_hours = "";/// ok
            $under_time_total_hours = "";/// ok // if full first 8 hours or less 8 hours
            $total_accomplished_hours_of_juty = "";/// ok over all total hours with over time
            $total_hours_to_comply_daily = "";/// ok
            $holiday_daily_pay = "";///
            $holiday_hourly_pay = "";///
            $over_time_premium = "";///
            $leave_from = "";/// ok
            $leave_to = "";/// ok
            $absent = "";/// to do
            $daily_time = ""; //total hours of juty
            $tot_over_time_amount_juty = "";

            $tardiness_amount_to_deduct = "";/// ok
            $tardiness_time_total = "";/// ok
            $full_tardiness = ""; //set to the database time late
            $daily_amount_pay = ""; ///ok
            $over_time_amount = "";///none
            $total_amount_for_day_juty = "";/// ok
            $total_hours_juty_complied = "";
            $total_tardiness_time_var = "";

            /// varibales to be injected in employee time record model
            $emp_id = "";
            $date_time_in = "";
            $date_time_out = "";
            $date = "";
            $holiday_type = "";



            /// varibales to be injected in employee model
            $salary_per_day = "";
            $salary_per_hour = "";
            $salary_per_month = "";
            $sched_time = "";
            $time_out = "";

            ///////////////////////////////////////////////////
            /////////////////////////////////////////////////// get employee time record
            ///////////////////////////////////////////////////


            //$date_from = strtotime("2018-08-10");
            //$date_to = strtotime("2018-08-15");




            $date_start = $_POST['from'];;
            $date_to = $_POST['to'];
            
            
            
            
            echo modules::run("functionality/payroll_sheet/get_daily_time_record/", $date_start, $date_to); 

            echo modules::run("functionality/payroll_sheet/get_computed_time/", $date_start, $date_to);
            
            echo modules::run("functionality/payroll_sheet/get_all_computational_data/", $date_start, $date_to);
            
            echo modules::run("functionality/payroll_sheet/get_specification_employee_record_data/", $date_start, $date_to);

             
            $data_to_display_payroll['payroll_data_rec'] = payroll_display_model::get_all_rec();
            $data_to_display_payroll['get_deduct_leave'] = payroll_display_model::get_deduct_leave($date_start, $date_to);
            $data_to_display_payroll['emp_list'] = employee_model::get_emp_records_list();
            $data_to_display_payroll['remove_non_working_days'] = payroll_display_model::remove_non_working_days($date_start, $date_to);
            
            $data_to_display_payroll['add_on'] = add_on_model::get_add_on_amount($date_start, $date_to);
            add_on_model::update_deduction();
            $data_to_display_payroll['get_deduction'] = add_on_model::get_deduction($date_start, $date_to);
            
            
            
            ///new
            $data_to_display_payroll['num_leave'] = computational_time_model::get_leave_count();
            ///new
            echo modules::run("templ/payroll/display_payroll_records", $data_to_display_payroll);             
                            
        }
}