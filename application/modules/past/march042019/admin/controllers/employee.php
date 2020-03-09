<?php



defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends MX_Controller {
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
            //redirect('admin/employee');
            //$this->load->view("templ/payroll/contents/daily_time_records/daily_time_rec");
            $get_sss = bracket_for_gov_remettance_model::getSearch(array('bfgr.name_of_bracket ='=>"sss"),"",array("bfgr.bfgr_given_id"=>"ASC"),true);
            $get_philh = bracket_for_gov_remettance_model::getSearch(array('bfgr.name_of_bracket ='=>"philhealth"),"",array("bfgr.bfgr_given_id"=>"ASC"),true);
            $get_pag_i = bracket_for_gov_remettance_model::getSearch(array('bfgr.name_of_bracket ='=>"pag-ibig"),"",array("bfgr.bfgr_given_id"=>"ASC"),true);
            
            $get_employee_rec = employee_model::getSearch_allemployee(array(),"",array("employee.emp_code"=>"ASC"),true);
            
            
            
            
            $get_dept_rec = dept_model::getSearch_dept(array(),"",array("dept.dept_id"=>"ASC"),true);
            
            $data['employee_data_rec'] = $get_employee_rec;
            $data['location'] = "Employee";
            $data['title'] = "Employee";
            $data['header_title'] = "Empoyee";
            $data['sss_brk'] = $get_sss;
                    $data['philh_brk'] = $get_philh;
                    $data['pag_i_brk'] = $get_pag_i;
            
            
            
			///new
                    $data['bracket_type'] = bracket_for_gov_remettance_model::get_bracket_type();
            ///new
            
            
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
            echo modules::run("templ/payroll/empoyees_page", $data);
        }else if($check_log == FALSE){
            $data = array(
            'title' => 'Login'
        );
            echo Modules::run("templ/payroll/login_page");
        }
            

        }
        function request(){
            if($this->uri->rsegment(3) == "create_employee"){
                self::request_create_employee();
            }if($this->uri->rsegment(3) == "update_employee"){
                self::request_update_employee();
            }
        }
        function request_create_employee(){
            //$emp_code = $this->input->post('emp_code');
            $emp_name = $this->input->post('emp_name');
            $dept = $this->input->post('dept');
            $position = $this->input->post('position');
            $monthly_or_daily_salary = $this->input->post('monthly_or_daily_salary');
            $sss_brk = $this->input->post('sss_brk');
            $phil_h_brk = $this->input->post('phil_h_brk');
            $pag_i_brk = $this->input->post('pag_i_brk');
            $pay_type = $this->input->post('pay_type');
            $sched_in = $this->input->post('sched_in');
            $sched_out = $this->input->post('sched_out');
            $user_type = $this->input->post('user_type');
            $emp_date_hired = $this->input->post('emp_date_hired');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $sched_day_from = $this->input->post('duty_from');
            $sched_day_to = $this->input->post('duty_to');
            
            $this->load->library("form_validation");
        
               //$this->form_validation->set_rules('emp_code', 'Emp Code', 'trim|required');
               $this->form_validation->set_rules('emp_name', 'Emp Name', 'trim|required');
               $this->form_validation->set_rules('dept', 'DEPT', 'trim|required');
                                            
               $this->form_validation->set_rules('position', 'Position', 'trim|required');
               $this->form_validation->set_rules('monthly_or_daily_salary', 'Monthy Or Daily', 'trim|required');
               $this->form_validation->set_rules('sss_brk', 'SSS Bracket', 'trim|required');
               //$this->form_validation->set_rules('phil_h_brk', 'Philhealth Bracket', 'trim|required');
                                            
               $this->form_validation->set_rules('pag_i_brk', 'Pag-ibig Bracket', 'trim|required');
               $this->form_validation->set_rules('pay_type', 'Pay Type', 'trim|required');
               $this->form_validation->set_rules('sched_in', 'Time In Schedule', 'trim|required');
                                            
               $this->form_validation->set_rules('sched_out', 'Time Out Schedule', 'trim|required');
               $this->form_validation->set_rules('user_type', 'User Type', 'trim|required');
            
               $this->form_validation->set_rules('emp_date_hired', 'Emp Date Hired', 'trim|required');
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            
               if($this->form_validation->run() == false){
                                                echo "<div class='alert alert-danger alert-dismissible'>
                                                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                                    <h4><i class='icon fa fa-ban'></i> Incomplete Fields!</h4>
                                                    
                                                    </div>";
                                            }else{
                                                $check_emp_code = employee_model::getFields($emp_code);
                                                if($check_emp_code){
                                                    echo "<div class='alert alert-danger alert-dismissible'>
                                                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                                    <h4><i class='icon fa fa-ban'></i> Employee ID YOU Intered Has Exist!</h4>
                                                    
                                                    </div>";
                                                }else{
                                                    if($pay_type == "monthly"){ // monthly
                                                    $get_per_day = $monthly_or_daily_salary / 26;
                                                    $pay_per_day = $get_per_day; // daily rate
                                                    
                                                    $get_per_hour = $pay_per_day / 8;
                                                    $pay_per_hour = $get_per_hour; // hourly rate
                                                    
                                                    }else if($pay_type == "daily"){ // daily
                                                        $pay_per_day = $monthly_or_daily_salary; // daily rate
                                                        $pay_per_hour = $pay_per_day / 8; // hourly rate
                                                    }
                                                    //$data_employee['emp_code'] = $emp_code;
                                                    $data_employee['emp_name'] = $emp_name;
                                                    $data_employee['dept'] = $dept;
                                                    $data_employee['position'] = $position;
                                                    $data_employee['salary'] = $monthly_or_daily_salary;
                                                    $data_employee['sss_bracket'] = $sss_brk;
                                                    $data_employee['philhealth_bracket'] = $phil_h_brk;
                                                    $data_employee['pag_ibig_bracket'] = $pag_i_brk;
                                                    $data_employee['pay_type'] = $pay_type;
                                                    $data_employee['shedule_type'] = $sched_in;
                                                    $data_employee['time_out_sched'] = $sched_out;
                                                    $data_employee['user_type'] = $user_type;
                                                    $data_employee['emp_date_hired'] = $emp_date_hired;
                                                    $data_employee['username'] = $username;
                                                    $data_employee['password'] = $password;

                                                    $data_employee['pey_per_day'] = $pay_per_day;//round($pay_per_day);
                                                    $data_employee['pay_per_hour'] = $pay_per_hour;//round($pay_per_hour);
                                                    $data_employee['daily_salary'] = $pay_per_day;//round($pay_per_day);

                                                    $data_employee['emp_leave_available'] = 0;
                                                    $data_employee['emp_sick_leave_available'] = 0;
                                                    $data_employee['enabled'] = 0;
                                                    $data_employee['juty_day_from'] = $sched_day_from;
                                                    $data_employee['juty_day_to'] = $sched_day_to;

                                                    employee_model::insert_table($data_employee);
                                                    
                                                    $get_emp_code = employee_model::get_emp_code("0");
                                                    if($get_emp_code){
                                                        foreach($get_emp_code as $get_emp_code_data){
                                                            $emp_code_data = $get_emp_code_data->emp_id;
                                                        }
                                                        
                                                        $emp_data_code['emp_code'] = "000$emp_code_data";
                                                        $emp_data_code['enabled'] = 1;
                                                        $updt_emp_code = employee_model::update_table($emp_data_code, "emp_id", $emp_code_data);
                                                    }
                                                    echo "<div class='alert alert-success alert-dismissible'>
                                                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                                            <h4><i class='icon fa fa-check'></i> Employee Has Been Regestered Successfully$emp_code_data!</h4>
                                                            </div>";
                                                }
                                                
                                                
                                            }
            /*echo "<div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <h4><i class='icon fa fa-ban'></i> Alert!</h4>
                Danger alert preview. This alert is dismissable. A wonderful serenity has taken possession of my entire
                soul, like these sweet mornings of spring which I enjoy with my whole heart.
              </div>";*/
        }
        function request_update_employee(){
            $data_emp_code = $this->input->post('emp_code');
            $data_emp_name = $this->input->post('emp_name');
            $data_emp_dept = $this->input->post('dept');
            $data_emp_position = $this->input->post('position');
            $data_emp_monthly_salary = $this->input->post('monthly_or_daily_salary');
            $data_emp_sss = $this->input->post('sss_brk');
            $data_phil_h = $this->input->post('phil_h_brk');
            $data_emp_pag_i = $this->input->post('pag_i_brk');
            $data_emp_pay_type = $this->input->post('pay_type');
            $data_emp_sched_in = $this->input->post('sched_in');
            $data_emp_sched_out = $this->input->post('sched_out');
            $data_emp_daily_salary = $this->input->post('daily_salary');
            $data_emp_monthly_salary_given = $this->input->post('monthly_salary_given');
            $data_emp_user_type = $this->input->post('user_type');
            
            //for daily
            
            if($data_emp_pay_type == "daily"){
                
            $data_emp_update['emp_name'] = $data_emp_name;
            $data_emp_update['dept'] = $data_emp_dept;
            $data_emp_update['position'] = $data_emp_position;
            $data_emp_update['salary'] = $data_emp_daily_salary;
            $data_emp_update['pey_per_day'] = $data_emp_daily_salary;
            $data_emp_update['pay_per_hour'] = $data_emp_daily_salary / 8;
            $data_emp_update['pay_type'] = $data_emp_pay_type;
            $data_emp_update['shedule_type'] = $data_emp_sched_in;
            $data_emp_update['time_out_sched'] = $data_emp_sched_out;
            $data_emp_update['daily_salary'] = $data_emp_daily_salary;
            $data_emp_update['user_type'] = $data_emp_user_type;
            $data_emp_update['sss_bracket'] = $data_emp_sss;
            $data_emp_update['philhealth_bracket'] = $data_phil_h;
            $data_emp_update['pag_ibig_bracket'] = $data_emp_pag_i;
            
            employee_model::update_table($data_emp_update, "emp_code", $data_emp_code);
            echo "<div class='alert alert-success alert-dismissible'>
                                                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                                            <h4><i class='icon fa fa-check'></i> Employee Has Been Updated Successfully!</h4>
                                                            </div>";
            }
            else if($data_emp_pay_type == "monthly"){
                $data_emp_update['emp_name'] = $data_emp_name;
                $data_emp_update['dept'] = $data_emp_dept;
                $data_emp_update['position'] = $data_emp_position;
                $data_emp_update['salary'] = $data_emp_monthly_salary_given;
                $data_emp_update['pey_per_day'] = floor($data_emp_monthly_salary_given / 26);
                $get_daily_sal = floor($data_emp_monthly_salary_given / 26);
                $get_hourly_sal = round($get_daily_sal / 8);
                $data_emp_update['pay_per_hour'] = $get_hourly_sal;
                $data_emp_update['pay_type'] = $data_emp_pay_type;
                $data_emp_update['shedule_type'] = $data_emp_sched_in;
                $data_emp_update['time_out_sched'] = $data_emp_sched_out;
                $data_emp_update['daily_salary'] = $get_daily_sal;
                $data_emp_update['user_type'] = $data_emp_user_type;
                $data_emp_update['sss_bracket'] = $data_emp_sss;
                $data_emp_update['philhealth_bracket'] = $data_phil_h;
                $data_emp_update['pag_ibig_bracket'] = $data_emp_pag_i;
                employee_model::update_table($data_emp_update, "emp_code", $data_emp_code);
                echo "<div class='alert alert-success alert-dismissible'>
                                                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                                            <h4><i class='icon fa fa-check'></i> Employee Has Been Updated Successfully!</h4>
                                                            </div>";
            }
            
                                               
        }
        function del_employee(){
            $emp_id = $this->uri->rsegment(3);
            $del_employee['enabled'] = 0;
            employee_model::update_table($del_employee, "emp_code", $emp_id);
            $this->load->library('user_agent');
            redirect($this->agent->referrer());
        }
    function update_emp(){
        /*echo $this->uri->rsegment(3) . "</br>";
        echo $this->uri->rsegment(4) . "</br>";
        echo $this->uri->rsegment(5) . "</br>";
        echo $this->uri->rsegment(6) . "</br>";
        echo $this->uri->rsegment(7) . "</br>";
        echo $this->uri->rsegment(8) . "</br>";
        echo $this->uri->rsegment(9) . "</br>";
        echo $this->uri->rsegment(10) . "</br>";
        echo $this->uri->rsegment(11) . "</br>";
        echo $this->uri->rsegment(12) . "</br>";
        echo $this->uri->rsegment(13) . "</br>";exit;*/
        
        
        
        
        $data_emp_code = $this->uri->rsegment(14);
            $data_emp_name = urldecode(urldecode($this->uri->rsegment(3)));
            //$data_emp_dept = $this->input->post('dept');
            $data_emp_position = $this->uri->rsegment(4);
            //$data_emp_monthly_salary = $this->input->post('monthly_or_daily_salary');
            $data_emp_sss = $this->uri->rsegment(5);
            $data_phil_h = $this->uri->rsegment(6);
            $data_emp_pag_i = $this->uri->rsegment(7);
            $data_emp_pay_type = $this->uri->rsegment(8);
            $data_emp_sched_in = $this->uri->rsegment(9);
            $data_emp_sched_out = $this->uri->rsegment(10);
            $data_emp_daily_salary = $this->uri->rsegment(11);
            $data_emp_monthly_salary_given = $this->uri->rsegment(12);
            $data_emp_user_type = $this->uri->rsegment(13);
        $data_emp_juty_from = $this->uri->rsegment(15);
        $data_emp_juty_to = $this->uri->rsegment(16);
        $data_emp_dept = $this->uri->rsegment(17);
            
            //for daily
            
            if($data_emp_pay_type == "daily"){
                
            $data_emp_update['emp_name'] = $data_emp_name;
            $data_emp_update['dept'] = $data_emp_dept;
            $data_emp_update['position'] = $data_emp_position;
            $data_emp_update['salary'] = $data_emp_daily_salary;
            $data_emp_update['pey_per_day'] = $data_emp_daily_salary;
            $data_emp_update['pay_per_hour'] = $data_emp_daily_salary / 8;
            $data_emp_update['pay_type'] = $data_emp_pay_type;
            $data_emp_update['shedule_type'] = $data_emp_sched_in;
            $data_emp_update['time_out_sched'] = $data_emp_sched_out;
            $data_emp_update['daily_salary'] = $data_emp_daily_salary;
            $data_emp_update['user_type'] = $data_emp_user_type;
            $data_emp_update['sss_bracket'] = $data_emp_sss;
            $data_emp_update['philhealth_bracket'] = $data_phil_h;
            $data_emp_update['pag_ibig_bracket'] = $data_emp_pag_i;
                $data_emp_update['juty_day_from'] = $data_emp_juty_from;
                $data_emp_update['juty_day_to'] = $data_emp_juty_to;
                $data_emp_update['dept'] = $data_emp_dept;
            
            employee_model::update_table($data_emp_update, "emp_code", $data_emp_code);
            /*echo "<div class='alert alert-success alert-dismissible'>
                                                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                                            <h4><i class='icon fa fa-check'></i> Employee Has Been Updated Successfully!</h4>
                                                            </div>";*/
            $this->load->library('user_agent');
            redirect($this->agent->referrer());
            }
            else if($data_emp_pay_type == "monthly"){
                $data_emp_update['emp_name'] = $data_emp_name;
                $data_emp_update['dept'] = $data_emp_dept;
                $data_emp_update['position'] = $data_emp_position;
                $data_emp_update['salary'] = $data_emp_monthly_salary_given;
                $data_emp_update['pey_per_day'] = floor($data_emp_monthly_salary_given / 26);
                $get_daily_sal = floor($data_emp_monthly_salary_given / 26);
                $get_hourly_sal = round($get_daily_sal / 8);
                $data_emp_update['pay_per_hour'] = $get_hourly_sal;
                $data_emp_update['pay_type'] = $data_emp_pay_type;
                $data_emp_update['shedule_type'] = $data_emp_sched_in;
                $data_emp_update['time_out_sched'] = $data_emp_sched_out;
                $data_emp_update['daily_salary'] = $get_daily_sal;
                $data_emp_update['user_type'] = $data_emp_user_type;
                $data_emp_update['sss_bracket'] = $data_emp_sss;
                $data_emp_update['philhealth_bracket'] = $data_phil_h;
                $data_emp_update['pag_ibig_bracket'] = $data_emp_pag_i;
                $data_emp_update['juty_day_from'] = $data_emp_juty_from;
                $data_emp_update['juty_day_to'] = $data_emp_juty_to;
                $data_emp_update['dept'] = $data_emp_dept;
                employee_model::update_table($data_emp_update, "emp_code", $data_emp_code);
                /*echo "<div class='alert alert-success alert-dismissible'>
                                                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                                            <h4><i class='icon fa fa-check'></i> Employee Has Been Updated Successfully!</h4>
                                                            </div>";*/
                $this->load->library('user_agent');
                redirect($this->agent->referrer());
            }
    }
    function position_list(){
        $dept_id = $_POST['dept_id'];
        $get_position_rec = position_model::getSearch_position(array('position.dept_id ='=>$dept_id),"",array("position.position_id"=>"ASC"),true);
        $data = $get_position_rec;
        foreach($data as $data_data){
            echo "<option value='$data_data->position_id'>$data_data->position_name</option>";
        }
    }





//////////////////////////////////////////////////////////////////////////////////////////



}
