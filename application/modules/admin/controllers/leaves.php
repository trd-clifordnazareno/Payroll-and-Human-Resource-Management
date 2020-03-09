<?php



defined('BASEPATH') OR exit('No direct script access allowed');

class Leaves extends MX_Controller {
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
            //redirect('admin/employee');
            if($this->session->userdata('session_log')){
                $data = $this->session->userdata('session_log');
                    foreach($data as $key => $value){
                        if($key == 'sess_username'){
                            $username = $value;
                        }
                        if($key == 'sess_user_type'){
                            $usertype = $value;
                        }
                        if($key == 'sess_emp_id'){
                            $emp_code = $value;
                        }
                        if($key == 'sess_full_name'){
                            $emp_name = $value;
                        }
                        if($key == 'sess_sick_leave'){
                            $sick_leave = $value;
                        }
                        if($key == 'sess_vacation_leave'){
                            $vacation_leave = $value;
                        }
                    }
            }
            $get_all_employees_leave = leave_model::getSearch_all_emp_leave(array(),"",array("leave.emp_id"=>"ASC"),true);
            $get_all_employees = employee_model::get_emp_records_list();
            $data['user'] = $usertype;
            $data['user_solo'] = $emp_code;
            $data['emp_name'] = $emp_name;
            $data['sick_leave_available'] = $sick_leave;
            $data['vacation_leave'] = $vacation_leave;
            $data['title'] = "Leaves";
            $data['location'] = "Leaves";
            $data['data_emp_leave'] = $get_all_employees_leave;
            $data['data_emp'] = $get_all_employees;


            echo modules::run("templ/payroll/leave_page", $data);
        }else if($check_log == FALSE){
            $data = array(
            'title' => 'Login'
        );
            echo Modules::run("templ/payroll/login_page");
        }
        
    }
    function request(){
            if($this->uri->rsegment(3) == "vacation_leave"){
                self::request_vacation_leave();
            }else if($this->uri->rsegment(3) == "sick_leave"){
                self::request_sick_leave();
            }else if($this->uri->rsegment(3) == "create_employee_leaves"){
                self::request_create_employee_leaves();
            }
        }
    function request_vacation_leave(){
        $emp_id = $_POST['emp_code'];
        $get_emp_leaves = employee_model::getFields($emp_id);
        echo $get_emp_leaves->emp_leave_available;
    }
    function request_sick_leave(){
        $emp_id = $_POST['emp_code'];
        $get_emp_leaves = employee_model::getFields($emp_id);
        echo $get_emp_leaves->emp_sick_leave_available;
    }
    function request_create_employee_leaves(){
        $emp_code = $this->input->post('emp_code');
        $start_leave = $this->input->post('start_leave');
        $leave_numbers = $this->input->post('end_leave');
        $leave_type = $this->input->post('leave_type');
        $leave_reason = $this->input->post('leave_reason');
        $sick_leave_bal = $this->input->post('sick_leave_bal');
        $vacation_leave_bal = $this->input->post('vacation_leave_bal');
		$half_day = $this->input->post('half_day');
        
        
        if($leave_numbers == 0 || $leave_numbers == ""){
            $end_leave = date('Y-m-d', strtotime($start_leave. " + 1 days"));
        }else{
            $leave_number_count = $leave_numbers - 1;
            $end_leave = date('Y-m-d', strtotime($start_leave. " + $leave_number_count days"));
            if($leave_type == "sick leave"){
                if($sick_leave_bal < $leave_numbers){
                    echo "<div class='alert alert-danger alert-dismissible'>
               <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
               <h4><i class='icon fa fa-ban'></i> Your Number of Leave Request Are Highter Than Your Balance Sick Leave Request!</h4>
                                                    
                </div>";exit;
                }
            }else if($leave_type == "vacation leave"){
                if($vacation_leave_bal < $leave_numbers){
                    echo "<div class='alert alert-danger alert-dismissible'>
               <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
               <h4><i class='icon fa fa-ban'></i> Your Number of Leave Request Are Highter Than Your Balance Vacation Leave Request!</h4>
                                                    
                </div>";exit;
                }
            }
            
        }
        
        $this->load->library("form_validation");
        
        $this->form_validation->set_rules('emp_code', 'Emp Code', 'trim|required');
        $this->form_validation->set_rules('start_leave', 'Start Date', 'trim|required');
        $this->form_validation->set_rules('end_leave', 'End Date', 'trim|required');
                                            
        $this->form_validation->set_rules('leave_type', 'Leave Type', 'trim|required');
        $this->form_validation->set_rules('leave_reason', 'Leave Reason', 'trim|required');
        $this->form_validation->set_rules('sick_leave_bal', 'Sick Leave', 'trim|required');
               
                                            
        $this->form_validation->set_rules('vacation_leave_bal', 'Vacation Leave', 'trim|required');
        
        if($this->form_validation->run() == false){
               echo "<div class='alert alert-danger alert-dismissible'>
               <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
               <h4><i class='icon fa fa-ban'></i> Incomplete Fields!</h4>
                                                    
                </div>";
           }else{
            $employee_code = $emp_code;
            $employee_start_leave = $start_leave;
            $employee_end_leave = $end_leave;
            $employee_leave_type = $leave_type;
            $employee_leave_reason = $leave_reason;
            $employee_sick_leave_bal = $sick_leave_bal;
            $employee_vacation_leave_bal = $vacation_leave_bal;
            
            $check_emp = employee_model::getFields($employee_code);
            if($check_emp){
                $data_insert['emp_id'] = $employee_code;
                $data_insert['leave_from'] = $employee_start_leave;
                $data_insert['leave_to'] = $employee_end_leave;
                $data_insert['type_of_leave'] = $employee_leave_type;
                $data_insert['reason'] = $employee_leave_reason;
                $data_insert['leave_file_date'] = date("Y-m-d");
                $data_insert['approved'] = "0";
				$data_insert['dept_id'] = $check_emp->dept;
				$data_insert['half_day'] = $half_day;
                $data_insert['use'] = "0";
                $data_insert['enabled'] = 1;
                
                $get_all_leave_list = leave_model::leavefilter($check_emp->dept, date("Y-m-d", strtotime($employee_start_leave)), date("Y-m-d", strtotime($employee_end_leave)));
                //foreach($get_all_leave_list as $get_all_leave_list){echo $get_all_leave_list_data->emp_id;}
                if($get_all_leave_list){
                    echo "<div class='alert alert-danger alert-dismissible'>
               <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
               <h4><i class='icon fa fa-ban'></i> You Cannot Leave For Now!</h4>
                                                    
                </div>";
                }else{
                    leave_model::insert_table($data_insert);
                echo "<div class='alert alert-success alert-dismissible'>
               <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
               <h4><i class='icon fa fa-ban'></i> Employee Leave Successfully Added!</h4>
                                                    
                </div>";
                    
                }
				/*leave_model::insert_table($data_insert);
                
                
                echo "<div class='alert alert-success alert-dismissible'>
               <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
               <h4><i class='icon fa fa-ban'></i> Employee Leave Successfully Added!</h4>
                                                    
                </div>";*/
                
            }else{
                echo "<div class='alert alert-danger alert-dismissible'>
               <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
               <h4><i class='icon fa fa-ban'></i> Employee ID not Exist!</h4>
                                                    
                </div>";
            }
        }
    }
    function del_emp_leave(){
        $emp_id = $this->uri->rsegment(3);
        $leave_file_date = $this->uri->rsegment(4);
        
            $del_employee_leave['enabled'] = 0;
            leave_model::del_leave($del_employee_leave, $emp_id, $leave_file_date);
            $this->load->library('user_agent');
            redirect($this->agent->referrer());
    }
    function update_emp_leave(){
        $emp_id = $this->uri->rsegment(3);
        $sick_leave_available = $this->uri->rsegment(4);
        $vacation_leave_available = $this->uri->rsegment(5);
        $data['emp_sick_leave_available'] = $sick_leave_available;
        $data['emp_leave_available'] = $vacation_leave_available;
        
        employee_model::update_table($data, "emp_code", $emp_id);
        
        $this->load->library('user_agent');
        redirect($this->agent->referrer());
    }
    function get_leave(){
        $emp_code = $this->uri->rsegment(3);
        $emp_name = $this->uri->rsegment(4);
        $from = $this->uri->rsegment(5);
        $to = $this->uri->rsegment(6);
        $file_date = $this->uri->rsegment(7);
        $reason = $this->uri->rsegment(8);
        $type_of_leave = $this->uri->rsegment(9);
        
        $data['emp_code'] = $emp_code;
        $data['emp_name'] = $emp_name;
        $data['from'] = $from;
        $data['to'] = $to;
        $data['file_date'] = $file_date;
        $data['reason'] = $reason;
        $data['type_of_leave'] = $type_of_leave;
        echo modules::run("templ/payroll/display_leave", $data);
    }
    
    
}