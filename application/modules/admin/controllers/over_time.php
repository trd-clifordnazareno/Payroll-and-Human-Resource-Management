<?php



defined('BASEPATH') OR exit('No direct script access allowed');

class Over_Time extends MX_Controller {
        function __construct() {
            parent::__construct();

            $this->load->model('admin/employee_time_record_model');
            $this->load->model('admin/employee_model');
            $this->load->model('admin/leave_model');
            $this->load->model('admin/time_suspend_model');
            $this->load->model('admin/computational_time_model');
            error_reporting(0);
        }

	public function index(){
        $check_log = modules::run("templ/payroll/check_login");
        if($check_log == TRUE){
            //redirect('admin/employee');
            //$this->load->view("templ/payroll/contents/daily_time_records/daily_time_rec");
            $data['location'] = "Daily Time Records";
            $data['title'] = "Daily Time Records";
            $data['header_title'] = "Daily Time Records";
            if($this->session->userdata('session_log')){
                $data_sess = $this->session->userdata('session_log');
                    foreach($data_sess as $key => $value){
                        if($key == 'sess_user_type'){
                            $usertype = $value;
                        }
                    }
            }
            $data['user'] = $usertype;
            $data['data_emp'] = employee_model::get_emp_records_list();
            $data['get_over_time_authorization'] = employee_model::get_over_time_authorization();
            echo modules::run("templ/payroll/over_time_page", $data);
        }else if($check_log == FALSE){
            $data = array(
            'title' => 'Login'
        );
            echo Modules::run("templ/payroll/login_page");
        }

        
        

            
                                
    }




    function request(){
        if($this->uri->rsegment(3) == "create_over_time"){
            self::request_create_over_time();
        }
    }
    function request_create_over_time(){
        $emp_code = $_POST['emp_code'];
                                            
        $date_over_time = $_POST['date_over_time']; 
        $over_time_from = $_POST['over_time_from'];
        $over_time_to = $_POST['over_time_to'];

        $this->load->library("form_validation");
        
        $this->form_validation->set_rules('over_time_from', 'Over Time From', 'trim|required');
        $this->form_validation->set_rules('over_time_to', 'Over Time To', 'trim|required');

        if($this->form_validation->run() == false){
            echo "<div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <h4><i class='icon fa fa-ban'></i> Incomplete Fields!</h4>
                
                </div>";
        }else{
            $data['emp_id'] = $emp_code;
            $data['date_over_time'] = $date_over_time;
            $data['time_over_from'] = $over_time_from;
            $data['over_time_to'] = $over_time_to;
            $data['enabled'] = 1;
            employee_model::insert_over_time_authorization($data);
            echo "<div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                <h4><i class='icon fa fa-ban'></i> Success!</h4>
                
                </div>";
        }
        

    }
    function upload_daily_time_record(){
        exec('wmic COMPUTERSYSTEM Get UserName', $user);
        $pc_user = (explode('\\',$user[1]));
        $handle = "file://C:/Users/$pc_user[1]/Desktop/folders/payroll_for_manila.csv";
            if(file_exists($handle)){
                $handle = fopen("file://C:/Users/$pc_user[1]/Desktop/folders/payroll_for_manila.csv", "r");
                   while($data = fgetcsv($handle))
                   {
                                $item1 = date("Y-m-d", strtotime($data[0]));  
                                $item2 = $data[1];
                                $item3 = $data[2];
                                $item4 = $data[3];  
                                $item5 = $data[4];
                                //$item7 = $data[6];
                                //$query = "INSERT into tbl_movielist(PlaylistNumber, MovieTitle, VideoLengthSec, StartDate, EndDate, LoopShows, ClientCode) values('$item1', '$item2', '$item3', '$item4', '$item5', '$item6', '$item7')";
                                //mysqli_query($connect, $query);
                       
                       $datas['date_time_record'] = $item1;
                       $datas['time_in_date'] = $item2;
                       $datas['time_out_date'] = $item3;
                       $datas['emp_id'] = $item4;
                       $datas['holiday_type'] = $item5;
                       $datas['enabled'] = 1;
                       employee_time_record_model::insert_table($datas);
                                //echo $item1 . "</br>";
                       
                   }
                    fclose($handle);
                $date = date("Y-m-d");
                rename("file://C:/Users/$pc_user[1]/Desktop/folders/payroll_for_manila.csv", "file://C:/Users/$pc_user[1]/Desktop/folders/payroll_for_manila-$date.csv");
                echo "<script>alert('The File Payroll For Manila Has Been Uploaded');</script>";
               //$query = "delete from tbl_movielist where MovieTitle = 'MovieTitle'";
                            //mysqli_query($connect, $query);
                }else{
                    //echo "x";
                }
        
    }





//////////////////////////////////////////////////////////////////////////////////////////



}
