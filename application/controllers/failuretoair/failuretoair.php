<?php
class Failuretoair extends CI_controller{
    function __construct() {
        parent::__construct();
        
        $this->load->model('users/users');
        $this->load->model('display_users/display_user');
        $this->load->model('failuretoair/failuretoair_model');
        error_reporting(0);
    }
    function index(){
        if($this->session->userdata('session_log')){
            $data = $this->session->userdata('session_log');
        foreach($data as $key => $value){
            if($key == 'sess_username'){
                $username = $value;
            }
            if($key == 'sess_department'){
                $department = $value;
            }
            if($key == 'sess_position'){
                $position = $value;
            }
            if($key == 'sess_usercode'){
                $usercode = $value;
            }
            if($key == 'sess_firstname'){
                $firstname = $value;
            }
            if($key == 'sess_lastname'){
                $lastname = $value;
            }
        }
        $data = array(
            'sess_username' => $username,
            'sess_department' => $department,
            'sess_position' => $position,
            'sess_firstname' => $firstname,
            'sess_lastname' => $lastname,
            'sess_usercode' => $usercode,
            'title' => 'Display Users',
            'page_content' => 'Display Users'
        );
        $this->load->view('files/users/display_users', $data);
        }else{
            redirect('login');
        }
        
    }
    function view_failure(){
        $get_fail_loc = failuretoair_model::get_fail_locs();
        $get_fail_locs = failuretoair_model::get_fail_loc_resume();
        $datas = array(
            'get_fail_loc' => $get_fail_loc,
            'get_fail_locs'=> $get_fail_locs
        );
        $this->load->view("files/failure_to_air/fail_page", $datas);
    }
    function failure_to_air(){
        $this->load->view("files/failure_to_air/failure_to_air");
    }
    
    
    
    function method(){
        if($this->uri->rsegment(3) == "insert_fail_loc"){
            self::_method_insert_fail_loc();
        }else if($this->uri->rsegment(3) == "form"){
            self::_method_form();
        }else if($this->uri->rsegment(3) == "load_scr"){
            self::_method_load_scr();
        }
    }
    ///////////////method/////////////////////////////////
    
    
    function _method_form(){
        $loc['loc'] = failuretoair_model::load_loc();
        $this->load->view("files/failure_to_air/ajax/form", $loc);
    }
    function _method_insert_fail_loc(){
        $report_date = $_POST['report_date'];
        $failure_to_date_loc = $_POST['failure_to_date_loc'];
        $subject = $_POST['subject'];
        $reason = $_POST['reason'];
        $fail_scr = $_POST['fail_scr'];
        if($fail_scr == NULL){
            $fail_scr = '0';
        }
        
        
        
        $this->load->library("form_validation");
        
        $this->form_validation->set_rules('report_date', 'Report_date', 'trim|required');
        $this->form_validation->set_rules('failure_to_date_loc', 'Failure_to_date_loc', 'trim|required');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required');
        $this->form_validation->set_rules('reason', 'Reason', 'trim|required');
        
                                            
        if($this->form_validation->run() == false){
        $data = array(
            'error' => "Incomplete Fields",
            'id' => 1
        );
        $this->load->view("files/error/sticky_note", $data);
        //self::add_new_crawler();
        }else{
            $data = array(
                'location_code' => $failure_to_date_loc,
                'subject' => $subject,
                'report_date' => $report_date,
                'reason' => $reason,
                'screen' => $fail_scr,
                'is_fail' => 1
            );
            failuretoair_model::insert_fail_loc($data);
            $data = array(
            'success' => "SUCCESS",
            'id' => 1
        );
          
        $loc_pos = $this->load->view("files/error/success", $data);
        $get_fail_loc = failuretoair_model::get_fail_loc($failure_to_date_loc);
        $loc_affected = failuretoair_model::loc_affected($failure_to_date_loc);
        
        $get_stat_in_loc = failuretoair_model::stat_in_loc($failure_to_date_loc);
        if($get_stat_in_loc){
            $update_data_loc = array(
                'status' => 1,
            );
            failuretoair_model::update_stat_in_loc($failure_to_date_loc, $update_data_loc);
        }
        
        $data_loc_items = array(
            'loc_pos' => $loc_pos,
            'get_fail_loc' => $get_fail_loc,
            'loc_affected' => $loc_affected
        );
        $this->load->view("files/failure_to_air/ajax/loc_fail", $data_loc_items);
        }
    }
    function _method_load_scr(){
        $subject = $_POST['subject_type'];
        $loc_code = $_POST['loc_code'];
        
        if($subject == "maintenance"){
            echo "<div class=form-group>
                                                    
                                                SCREEN : <input type='text' name='scr' id='scr'><br>
                                                    
                                            </div>";
        }else{
        }
    }
    function go(){
        $loc_code = $this->uri->rsegment(3);
        
        $loc_affected = failuretoair_model::loc_affected($loc_code);
        $get_fail_loc = failuretoair_model::get_fail_loc($loc_code);
        foreach($get_fail_loc as $get_fail_loc){
            $reason = $get_fail_loc->reason;
            $is_fail = $get_fail_loc->is_fail;
            $resume_date = $get_fail_loc->resume_date;
            $summary = $get_fail_loc->summary;
        }
        
        
        
        $datas = array(
            'loc_data' => $loc_affected,
            'reason_data' => $reason,
            'is_fail' => $is_fail,
            'resume_date' => $resume_date,
            'summary_data'=> $summary,
            'loc_code' => $loc_code
        );
        
        $this->load->view("files/failure_to_air/ajax/loc_data", $datas);
    }
    function add_text_box(){
        echo "<center><b>Summary</b></center>";
        echo "<textarea rows='4' cols='50' type='textarea' class='form-control' placeholder='Enter text' style='width: 300px;' id='summary'></textarea>";
    }
    function resume_fail(){
        $resume = $_POST['reason'];
        $loc_code = $_POST['loc_code'];
        $datas = array(
            'is_fail' => 0,
            'resume_date' => date("Y-m-d"),
            'summary' => $resume
        );
        failuretoair_model::resume_fail($loc_code, $datas);
        $datas = array(
            'status' => 0
        );
        failuretoair_model::resume_fail_loc($loc_code, $datas);
        echo "<center><div class='alert alert-success alert-dismissable'>
                                        <i class='fa fa-check'></i>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                        <b>Alert!</b> Success UPDATED.
                                    </div></center>";
    }
    function button(){
        $loc_code = $this->uri->rsegment(3);
         $get_button = failuretoair_model::get_fail_loc($loc_code);
         foreach($get_button as $data){
             $button['button'] = $data->is_fail;
         }
         $this->load->view("files/failure_to_air/ajax/button", $button);
    }
    function failure_report_view(){
        $this->load->library('Pdf');
        $loc_code = $this->uri->rsegment(3);
        $client_code = $this->uri->rsegment(4);
        $get_loc = failuretoair_model::get_fail_loc($loc_code);
        $get_material = failuretoair_model::get_playlist_num($loc_code, $client_code);
        foreach($get_material as $data_material){
            $loc_name = $data_material->location_code;
            $client_name = $data_material->clients_code;
        }
        $get_loc_name = failuretoair_model::get_loc_name($loc_name);
        foreach($get_loc_name as $loc_name_data){
            $location_name = $loc_name_data->location_code;
        }
        $get_client_name = failuretoair_model::get_client_name($client_name);
         foreach($get_client_name as $get_client_name){
             $client_name_data = $get_client_name->client_name;
         }
         foreach($get_loc as $data_get_loc){
             $get_data_get_loc = $data_get_loc->screen;
             break;
         }
         
         
         
         
         
         if($get_data_get_loc == 0){
             $explode_data_loc = explode("-", $location_name);
                if($explode_data_loc[1] == "ORMOC"){
                   if($explode_data_loc[3] == "S1"){
                        $get_loc_like_code = failuretoair_model::get_loc_like_code($explode_data_loc[1]);
                        if($get_loc_like_code){
                            foreach($get_loc_like_code as $get_loc_like_code_data){
                                $screen_down = 'all ' . $get_loc_like_code_data->count_loc . ' screen(s)';
                            }
                        }
                   }
               }else if($explode_data_loc[1] == "DIPOLOG"){
                   if($explode_data_loc[2] == "S1"){
                       $get_loc_like_code = failuretoair_model::get_loc_like_code($explode_data_loc[1]);
                        if($get_loc_like_code){
                            foreach($get_loc_like_code as $get_loc_like_code_data){
                                $screen_down = 'all ' . $get_loc_like_code_data->count_loc . ' screen(s)';
                            }
                        }

                   }
               }else if($explode_data_loc[2] == "CEBU"){
                   if($explode_data_loc[3] == "PIER1"){
                       if($explode_data_loc[4] == "S1"){
                            $get_loc_like_code = failuretoair_model::get_loc_like_code($explode_data_loc[2] . "-" . $explode_data_loc[3]);
                            if($get_loc_like_code){
                                foreach($get_loc_like_code as $get_loc_like_code_data){
                                $screen_down = 'all ' . $get_loc_like_code_data->count_loc . ' screen(s)';
                             }
                            }
                       }
                   }else if($explode_data_loc[3] == "PIER2"){
                       if($explode_data_loc[4] == "S1"){
                            $get_loc_like_code = failuretoair_model::get_loc_like_code($explode_data_loc[2] . "-" . $explode_data_loc[3]);
                        if($get_loc_like_code){
                            foreach($get_loc_like_code as $get_loc_like_code_data){
                                $screen_down = 'all ' . $get_loc_like_code_data->count_loc . ' screen(s)';
                            }
                        }
                       }
                   }else if($explode_data_loc[3] == "PIER3"){
                       if($explode_data_loc[4] == "S1"){
                            $get_loc_like_code = failuretoair_model::get_loc_like_code($explode_data_loc[2] . "-" . $explode_data_loc[3]);
                            if($get_loc_like_code){
                            foreach($get_loc_like_code as $get_loc_like_code_data){
                                $screen_down = 'all ' . $get_loc_like_code_data->count_loc . ' screen(s)';
                            }
                        }
                       }
                   }else if($explode_data_loc[3] == "PIER4"){
                       if($explode_data_loc[4] == "S1"){
                        $get_loc_like_code = failuretoair_model::get_loc_like_code($explode_data_loc[2] . "-" . $explode_data_loc[3]);
                        if($get_loc_like_code){
                            foreach($get_loc_like_code as $get_loc_like_code_data){
                                $screen_down = 'all ' . $get_loc_like_code_data->count_loc . ' screen(s)';
                            }
                        }
                       }
                   }
               }else if($explode_data_loc[3] == "S1"){
                        $get_loc_like_code = failuretoair_model::get_loc_like_code($explode_data_loc[0] . "-" . $explode_data_loc[1] . "-" . $explode_data_loc[2]);
                        if($get_loc_like_code){
                            foreach($get_loc_like_code as $get_loc_like_code_data){
                                $screen_down = 'all ' . $get_loc_like_code_data->count_loc . ' screen(s)';
                            }
                        }
               }else{
                   if($explode_data_loc[2] == "PAGADIAN"){
                      if($explode_data_loc[3] == "S12017100401"){
                          $get_loc_like_code = failuretoair_model::get_loc_like_code($explode_data_loc[2]);
                        if($get_loc_like_code){
                            foreach($get_loc_like_code as $get_loc_like_code_data){
                                $screen_down = 'all ' . $get_loc_like_code_data->count_loc . ' screen(s)';
                            }
                        }
                      }
                   }else if($explode_data_loc[2] == "ZAMBOANGA"){
                       if($explode_data_loc[3] == "S12017100403"){
                           $get_loc_like_code = failuretoair_model::get_loc_like_code($explode_data_loc[2]);
                        if($get_loc_like_code){
                            foreach($get_loc_like_code as $get_loc_like_code_data){
                                $screen_down = 'all ' . $get_loc_like_code_data->count_loc . ' screen(s)';
                            }
                        }
                      }
                   }
               }
         }else{
             $screen_down = 'screen(s) ' . $get_data_get_loc;
         }
         
        $datas = array(
            'loc_data' => $get_loc,
            'get_material' => $get_material,
            'loc_name' => $location_name,
            'client_name' => $client_name_data,
            'screen_fail' => $screen_down
        );
        
        $this->load->view("pdf/failure_report", $datas);
    }
    function get_clients(){
        $loc_code = $this->uri->rsegment(3);
        $get_clients = failuretoair_model::get_clients($loc_code);
        echo "<pre>";
        var_dump($get_clients);
        echo "</pre>";
    }
    function get_all_loc(){
        $get_loc['get_loc'] = failuretoair_model::get_all_location();
        $this->load->view("files/failure_to_air/fail_set_up", $get_loc);
    }
    function switch_stat(){
        $loc_code = $_POST['loc_code'];
        $stats = $_POST['status'];
        $data = array(
            'is_online' => $stats
        );
        $update_stats = failuretoair_model::update_stats($loc_code, $data);
    }
    function count_name_loc(){
        $loc =failuretoair_model::get_all_location();
        $name_of_loc = "";
        $num = 0;
        foreach($loc as $data){
            $loc_code = explode("-", $data->location_code);
            if($loc_code[1] == "DIPOLOG"){
                $get_name = $loc_code[1];
                if($name_of_loc != $get_name){
                    $name_of_loc = $get_name;
                    $num = $num + 1;
                }else{
                    $name_of_loc = $get_name;
                }
            }else if($loc_code[1] == "ORMOC"){
                $get_name = $loc_code[1];
                if($name_of_loc != $get_name){
                    $name_of_loc = $get_name;
                    $num = $num + 1;
                }else{
                    $name_of_loc = $get_name;
                }
            }else if($loc_code[2] == "CEBU"){
                if($loc_code[4] == "S1"){
                    $get_name = $loc_code[2] . "-" . $loc_code[3];
                    if($name_of_loc != $get_name){
                    $name_of_loc = $get_name;
                    $num = $num + 1;
                    }else{
                    $name_of_loc = $get_name;
                    }
                }
            }else if($loc_code[3] == "S1"){
                $get_name = $loc_code[1] . "-" . $loc_code[2];
                if($name_of_loc != $get_name){
                    $name_of_loc = $get_name;
                    $num = $num + 1;
                    }else{
                    $name_of_loc = $get_name;
                    }
            }else if($loc_code[1] == "CEBU"){
                $get_name = $loc_code[1] . "-" . $loc_code[2];
                if($name_of_loc != $get_name){
                    $name_of_loc = $get_name;
                    $num = $num + 1;
                    }else{
                    $name_of_loc = $get_name;
                    }
            }else{
                if($loc_code[2] == "PAGADIAN"){
                    $get_name = $loc_code[2];
                if($name_of_loc != $get_name){
                    $name_of_loc = $get_name;
                    $num = $num + 1;
                    }else{
                    $name_of_loc = $get_name;
                    }
                }else if($loc_code[2] == "ZAMBOANGA"){
                    $get_name = $loc_code[2];
                if($name_of_loc != $get_name){
                    $name_of_loc = $get_name;
                    $num = $num + 1;
                    }else{
                    $name_of_loc = $get_name;
                    }
                }
            }
            //failuretoair_model::get_same_loc_name();
        }
        echo "<font color='black' size=3></b>NUMBER of LOCATIONS : </b></font> <font size=3 color='red'><b>$num</b></font>";
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}


?>

