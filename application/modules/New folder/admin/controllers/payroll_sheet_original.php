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

            computational_time_model::del_table();
            $data_emp_daily_record = employee_time_record_model::get_employee_daily_time_record($date_start, $date_to);
            if($data_emp_daily_record){
                foreach($data_emp_daily_record as $data_emp_daily_record_data){
                    $emp_id = $data_emp_daily_record_data->emp_id;
                    $date_time_in = $data_emp_daily_record_data->time_in_date;
                    $date_time_out = $data_emp_daily_record_data->time_out_date;
                    $date = $data_emp_daily_record_data->date_time_record;
                    $holiday_type = $data_emp_daily_record_data->holiday_type;

                    $get_employee_record = employee_model::getSearch(array('employee.emp_code ='=>$emp_id),"",array("employee.emp_id"=>"ASC"),true);
                    if($get_employee_record){
                        foreach($get_employee_record as $check_emp_code_data){
                            $salary_per_day = $check_emp_code_data->daily_salary;
                            $salary_per_hour = $check_emp_code_data->pay_per_hour;
                            $salary_per_month = $check_emp_code_data->salary;
                            $sched_time = $check_emp_code_data->shedule_type;
                            $time_out = $check_emp_code_data->time_out_sched;

                            $emp_name = $check_emp_code_data->emp_name;



                            ///////////////////////////////////////////////////
                            /////////////////////////////////////////////////// get over time
                            ///////////////////////////////////////////////////

                            $get_time_in = strtotime($date_time_in);
                            $get_time_out = strtotime($date_time_out);
                            $diff_ot = $get_time_out - $get_time_in;
                            $hours      = floor($diff_ot / 60 / 60);
                            $minutes    = round(($diff_ot - ($hours * 60 * 60)) / 60);

                            $get_ot_hours = floatval($hours.'.'.$minutes);

                            if($get_ot_hours >= 10){
                                $juty_hours = $get_ot_hours - 9;

                                /*$time_sched_data = strtotime($sched_time);
                                $time_in_data = strtotime($date_time_in);
                                if($time_sched_data < $time_in_data){
                                    $get_additional_time = $time_in_data - $time_sched_data;
                                    $hours      = floor($get_additional_time / 60 / 60);
                                    $minutes    = round(($get_additional_time - ($hours * 60 * 60)) / 60);
                                    $total_ot_time = $hours.'.'.$minutes;
                                    $juty_extra_hours = $total_ot_time + $juty_hours;
                                    $juty_hours = round($juty_extra_hours);

                                }*/
                                ///over all over time
                                $over_time_total_hours = $juty_hours; ///over all over time
                                $get_ot_hours = $over_time_total_hours;
                                //echo $get_ot_hours . "ot</br>";
                            }












                            ///////////////////////////////////////////////////
                            /////////////////////////////////////////////////// get under time
                            ///////////////////////////////////////////////////
                            $time_in_for_under_time = $date_time_in;
                            $time_out_for_under_time = $date_time_out;

                            $total_for_under_time = strtotime($time_out_for_under_time) - strtotime($time_in_for_under_time);
                            $hours_for_under_time      = floor($total_for_under_time / 60 / 60);
                            $minutes_for_under_time    = round(($total_for_under_time - ($hours_for_under_time * 60 * 60)) / 60);
                            $total_under_time = $hours_for_under_time.'.'.$minutes_for_under_time;
                            $time_schedule_data = $sched_time;
                            $time_out_schedule = $time_out;

                                if($time_in_for_under_time >= $time_schedule_data && $time_out_for_under_time <= "11:59:59"){
                                    $hours_time = 8;
                                    $tot_time = $hours_time - $total_under_time;//tardiness total
                                    $tot_hours_of_juty = $total_under_time;//total hours of juty
                                    $tot_regular_hours = $total_under_time;//total regular hours
                                    $over_time_i = 0;//over time

                                    ///set
                                        $over_time_total_hours = $over_time_i;//over time
                                        $under_time_total_hours = $tot_regular_hours;//consumed time with late or under time
                                        $total_accomplished_hours_of_juty = $tot_hours_of_juty;//total hours of juty
                                        $tardiness_time_total = $tot_time;//tardiness
                                        $daily_time = $tot_regular_hours;
                                    ///
                                    //echo "</br>time deff no over time</br>";
                                    //echo "$tot_regular_hours total hours of regular hours</br>";
                                    //echo "$tot_hours_of_juty total hours of juty</br>";
                                    //echo $tot_time . " tardiness total</br>";
                                    //echo $over_time_i . " over time</br>";
                                    //echo "____________________________</br></br>";
                                }
                                else if($time_in_for_under_time < $time_schedule_data && $time_out_for_under_time <= "11:59:59"){
                                    $time_schedule_data_i = $time_schedule_data;
                                    $time_in_for_under_time_i = $time_in_for_under_time;
                                    $diff_i = $time_schedule_data_i - $time_in_for_under_time_i;

                                    $total_i = $total_under_time;
                                    $total_for_under_time_i = $total_i - $diff_i;// total hours of juty
                                    $tot_regular_hours_i = $total_for_under_time_i;// total regular hours of juty
                                    $hours_time_i = 8;
                                    $diff_total_time = $hours_time_i - $total_for_under_time_i;//total tardiness
                                    $over_time_total_i = 0;

                                    ///set
                                        $over_time_total_hours = $over_time_total_i;//over time
                                        $under_time_total_hours = $tot_regular_hours_i;//consumed time with late or under time
                                        $total_accomplished_hours_of_juty = $total_for_under_time_i;//total hours of juty
                                        $tardiness_time_total = $diff_total_time;//tardiness
                                        $daily_time = $tot_regular_hours_i;
                                    ///
                                    //echo "</br>time no over time</br>";
                                    //echo $total_for_under_time_i . "total hours of juty</br>";
                                    //echo $tot_regular_hours_i . "total hours of regular hours</br>";
                                     //echo $diff_total_time . "total tardiness</br>";
                                     //echo $over_time_total_i . " over time</br>";
                                     //echo "</br>____________</br></br>";

                                }
                                else if($time_in_for_under_time >= $time_schedule_data && ($time_out_for_under_time >= "12:00:00" && $time_out_for_under_time <= "12:59:59")){
                                    $time_from_twelve = "12:00:00";
                                    $time_out_for_under_time_i = $time_out_for_under_time;
                                    $diff_for_under_time = strtotime($time_out_for_under_time_i) - strtotime($time_from_twelve);

                                    $hours_for_under_time      = floor($diff_for_under_time / 60 / 60);
                                    $minutes_for_under_time    = round(($diff_for_under_time - ($hours_for_under_time * 60 * 60)) / 60);
                                    $total_mins_for_under_time = $hours_for_under_time.'.'.$minutes_for_under_time;

                                    $total_under_time_i = $total_under_time - $total_mins_for_under_time;//total hours of juty
                                    $total_hours_regular_i = $total_under_time_i;//total regular hours of juty
                                    $hours_data_i = 8;
                                    $tot_data_i = $hours_data_i - $total_under_time_i;//tardiness
                                    $over_time_hours = 0;
                                    ///set
                                        $over_time_total_hours = $over_time_hours;//over time
                                        $under_time_total_hours = $total_hours_regular_i;//consumed time with late or under time
                                        $total_accomplished_hours_of_juty = $total_under_time_i;//total hours of juty
                                        $tardiness_time_total = $tot_data_i;//tardiness
                                        $daily_time = $total_hours_regular_i;
                                    ///
                                    //echo "</br>time no over time</br>";
                                    //echo  $total_under_time_i . " total hours of juty</br>";
                                    //echo  $total_hours_regular_i . " total hours of regular hours of juty</br>";
                                    //echo  $tot_data_i . " tardiness total</br>";
                                    //echo $over_time_hours . " over time</br>";
                                    //echo "______________________</br></br>";
                                }
                                else if($time_in_for_under_time < $time_schedule_data && ($time_out_for_under_time >= "12:00:00" && $time_out_for_under_time <= "12:59:59")){

                                    //get excess time
                                    $time_in_for_under_time_i = $time_in_for_under_time;
                                    $time_sched_for_under_time_i = $time_schedule_data;
                                    $diff = strtotime($time_sched_for_under_time_i) - strtotime($time_in_for_under_time_i);
                                    $hours_i = floor($diff / 60 / 60);
                                    $mins_i = round(($diff - ($hours_i * 60 * 60)) / 60);

                                    $total_diff = $hours_i . '.' . $mins_i;
                                    //echo $total_diff . "asdsdfsdfsdfsdfsd</br>";

                                    //get 12 to timeout
                                    $time_from_tweve = "12:00:00";
                                    $time_out_i = $time_out_for_under_time;
                                    $diff_i = strtotime($time_out_i) - strtotime($time_from_tweve);
                                    $diff_hi = floor($diff_i / 60 / 60);
                                    $diff_mi = round(($diff_i - ($hours_hi * 60 * 60)) / 60);

                                    $total_diff1 = $diff_hi . '.' . $diff_mi;

                                    //echo $total_diff1 . "adfdfsdfsdfsdfsd</br>";

                                    //add excess time and twelve to 1
                                    $diff2 = $total_diff + $total_diff1;
                                    //echo $diff2 . "asdasdasdasdasdasd</br>";

                                    //remove excess time and twelve to 1
                                    $diff3 = $total_under_time - $diff2;//total hours of juty
                                    $hours_data_i = 8;
                                    $tot_data_time = $hours_data_i - $diff3;//tardiness total
                                    $total_regular_hours_i = $diff3;//total regular hour
                                    $over_time_hours_i = 0;
                                    ///set
                                        $over_time_total_hours = $over_time_hours_i;//over time
                                        $under_time_total_hours = round($total_regular_hours_i);//consumed time with late or under time
                                        $total_accomplished_hours_of_juty = round($diff3);//total hours of juty
                                        $tardiness_time_total = $tot_data_time;//tardiness
                                        $daily_time = $total_regular_hours_i;
                                    ///
                                    //echo "</br>time no under time</br>";
                                    //echo round($diff3) . " total hours of juty</br>";
                                    //echo round($total_regular_hours_i) . " total regular hours</br>";
                                    //echo $tot_data_time . " tardiness total </br>";
                                    //echo $over_time_hours_i . " over time</br>";
                                    //echo "________________________</br></br>";



                                }
                                else if($time_in_for_under_time >= $time_schedule_data && $time_out_for_under_time >= "13:00:00"){
                                    if($time_in_for_under_time >= "12:00:00" && $time_in_for_under_time <= "12:59:59"){
                                        //get twelve to 1
                                        $time_in_i = $time_in_for_under_time;
                                        $time_from_ter_teen = "12:59:59";

                                        $diff_i = strtotime($time_from_ter_teen) - strtotime($time_in_i);
                                        $diff_hi = floor($diff_i / 60 / 60);
                                        $diff_mi = round(($diff_i - ($diff_hi * 60 * 60)) / 60);

                                        $total_diff1 = $diff_hi . '.' . $diff_mi;
                                        //echo $total_diff1 . " kkkkkkkkkkkkkkkkk</br>";

                                        //total hour - noon time
                                        $diff1 = $total_under_time - $total_diff1;
                                        //echo $diff1 . " qqqqqqqqqqqqqqqqqqqqqq</br>";
                                        if($time_out_schedule >= $time_out_for_under_time){






                                            /////////////////////////////////////////////////////////////////////////////////////////////////////guba
                                            /////////////////////////////////////////////////////////////////////////////////////////////////////
                                            /////////////////////////////////////////////////////////////////////////////////////////////////////
                                            //total hours of juty
                                            //$hours = 8;
                                            //get tardiness
                                            //$diff_total_tardiness = $hours - $diff1;
                                            //echo "</br>time total diff</br>";
                                           // echo $diff1 . "total hours</br>";
                                            //echo $diff_total_tardiness . " tardiness no overtimex</br>";
                                            //$i = $total_under_time - round($total_diff1);
                                            $tot_time_hours = floor($total_under_time);

                                            if($time_in_i == "12:00:00"){
                                                $tot_time_hours = $tot_time_hours -1;// total hours
                                                }

                                            if($tot_time_hours == 5){
                                                $tot_time_hours = $tot_time_hours-1;// total hours
                                            }
                                            $hours = 8;
                                            $x = $hours - ($tot_time_hours - round($total_diff1)); //tardiness total
                                            $total_regular_hours_time = $tot_time_hours;//total regular hours
                                            $over_time_comply = 0;//over time

                                            ///__________________________________________________________________________________//
                                            //                   dire nagsugud
                                            ///__________________________________________________________________________________//

                                            $_total_hours = $tot_time_hours - round($total_diff1);
                                            $_total_regular_hours = $total_regular_hours_time - round($total_diff1);
                                            $_total_tardiness = $hours - ($tot_time_hours - round($total_diff1));
                                            ///set
                                                $over_time_total_hours = $over_time_comply;//over time
                                                $under_time_total_hours = $_total_regular_hours;//consumed time with late or under time
                                                $total_accomplished_hours_of_juty = $_total_hours;//total hours of juty
                                                $tardiness_time_total = $_total_tardiness;//tardiness
                                                $daily_time = $_total_regular_hours;
                                            ///

                                            //echo $_total_hours  . " total hours no overtime</br>";
                                            //echo $_total_regular_hours . " total regular hours</br>";
                                            //echo $_total_tardiness  . " total tardiness no overtime</br>";
                                            //echo $over_time_comply  . " total over time</br>";
                                            //echo "_______________________________</br></br>";
                                            /////////////////////////////////////////////////////////////////////////////////////////////////////guba
                                            /////////////////////////////////////////////////////////////////////////////////////////////////////
                                            /////////////////////////////////////////////////////////////////////////////////////////////////////





                                        }else if($time_out_schedule < $time_out_for_under_time){ //has over time
                                            $time_out_sched_i = $time_out_schedule;
                                            $time_out_time = $time_out_for_under_time;

                                            $diff_total1 = strtotime($time_out_time) - strtotime($time_out_sched_i); //get overtime
                                            $diff_hi = floor($diff_total1 / 60 / 60);
                                            $diff_mi = round(($diff_total1 - ($diff_hi * 60 * 60)) / 60);
                                            $min_diff = $diff_hi . '.' . $diff_mi;//over time
                                            $total1 = $diff1 -  $min_diff;//remove over time //total juty hours
                                            $_tottal1_round = round($total1);//total hours regular juty

                                            $total_hours_i = $_tottal1_round + $min_diff;//total hours of juty
                                            $total_tardiness = 8 - $_tottal1_round;//tardiness
                                            $total_over_time_i = $min_diff;//over time


                                            ///set
                                                $over_time_total_hours = $min_diff;//over time
                                                $under_time_total_hours = $_tottal1_round;//consumed time with late or under time
                                                $total_accomplished_hours_of_juty = $total_hours_i;//total hours of juty
                                                $tardiness_time_total = $total_tardiness;//tardiness
                                                $daily_time = $_tottal1_round;
                                            ///
                                            //echo "</br>time deff</br>";
                                            //echo $_tottal1_round . " total hours regular time</br>";
                                            //echo $total_hours_i . " total hours of juty</br>";
                                            //echo $total_tardiness . " tardiness total</br>";
                                             //echo $min_diff . " has overtime</br>";
                                             //echo "____________________</br></br>";
                                        }
                                    }else if($time_in_for_under_time <= "11:59:59"){
                                        //get total hours
                                        $time_in_i = $time_in_for_under_time;
                                        $time_out_i = $time_out_for_under_time;

                                        $diff_i = strtotime($time_out_i) - strtotime($time_in_i);
                                        $hour_i = floor($diff_i / 60 / 60);
                                        $min_i = round(($diff_i - ($hour_i * 60 * 60)) / 60);
                                        $total_i = $hour_i . '.' . $min_i;//over time
                                        //echo $total_i . "wwwwwwwwwwwwwwwwwwwwwwwwwwwww</br>";
                                        $minus_one = 1;//noon time

                                        $diff_total1 = $total_i - $minus_one; //remove noon time //total hours
                                        //echo $diff_total1 . "wwwwwwwwwwwwwwwwwwwwwwwwwwww</br>";
                                        if($time_out_schedule >= $time_out_for_under_time){// no over time
                                            $hours_time_i = 8;
                                            $tot_hours = $hours_time_i - $diff_total1; //total hours
                                            //$tardiness_i = $tot_hours; //tardiness
                                            $tot_hours = $diff_total1;//total hours of juty
                                            $total_regular_hours_time_i = $tot_hours;//total hours regular
                                            $tardiness_i = 8 - $tot_hours;//tardinesss total
                                            $total_over_time = 0;

                                            ///set
                                                $over_time_total_hours = round($total_over_time);//over time
                                                $under_time_total_hours = round($total_regular_hours_time_i);//consumed time with late or under time
                                                $total_accomplished_hours_of_juty = round($tot_hours);//total hours of juty
                                                $tardiness_time_total = round($tardiness_i);//tardiness
                                                $daily_time = $total_regular_hours_time_i;
                                            ///
                                            //echo "</br> time diff</br>";
                                            //echo round($tot_hours) . " total hours of jutyx</br>";
                                            //echo round($total_regular_hours_time_i) . " total hours regular of juty</br>";
                                            //echo round($tardiness_i) . " tardiness total</br>";
                                            //echo round($total_over_time) . " over time</br>";
                                            //echo "___________________</br></br>";

                                        }else if($time_out_schedule < $time_out_for_under_time){ //has over time
                                            $time_out_sched_i = $time_out_schedule;
                                            $time_out_time = $time_out_for_under_time;

                                            $diff_total2 = strtotime($time_out_time) - strtotime($time_out_sched_i); //get overtime
                                            $diff_hi = floor($diff_total2 / 60 / 60);
                                            $diff_mi = round(($diff_total2 - ($diff_hi * 60 * 60)) / 60);
                                            $min_diff = $diff_hi . '.' . $diff_mi;//over time
                                            $total1 = $diff_total1 -  $min_diff;//remove over time //total juty hours // total regular hours
                                            $total_late = 8 - $total1;

                                            $total_hours_time = round($total1) + $min_diff;//total hours of juty

                                            ///set
                                                $over_time_total_hours = $min_diff;//over time
                                                $under_time_total_hours = round($total1);//consumed time with late or under time
                                                $total_accomplished_hours_of_juty = $total_hours_time;//total hours of juty
                                                $tardiness_time_total = round($total_late);//tardiness
                                                $daily_time = $total1;
                                            ///
                                            //echo "</br>time deff</br>";
                                            //echo round($total1) . " total regular hours of juty</br>";
                                            //echo $total_hours_time . "total hours of juty</br>";
                                            //echo round($total_late) . " tardiness total</br>";
                                             //echo $min_diff . "overtime total</br>";
                                             //echo "_________________________</br></br>";
                                        }


                                    }

                                }else if($time_in_for_under_time < $time_schedule_data && $time_out_for_under_time >= "13:00:00"){
                                    //get total hours
                                    $time_sched_i = $time_schedule_data;
                                    $time_out_time_i = $time_out_for_under_time;

                                    $diff_time_i = strtotime($time_out_time_i) - strtotime($time_sched_i);
                                    $hour_hi = floor($diff_time_i / 60 / 60);
                                    $min_mi = round(($diff_time_i - ($hour_hi * 60 * 60)) / 60);

                                    $tot_time = $hour_hi . '.' . $min_mi; //total hours

                                    $minus_one = 1;
                                    $total_time_1 = $tot_time - $minus_one; //remove noon time //total hours //total hours of juty

                                    if($time_out_schedule >= $time_out_time_i){ //no over time
                                        $total_regular_hour_time = $total_time_1;//total regular hours
                                        $over_time_hours_time = 0;//over time

                                        $late_i = 8 - $total_time_1;//tardiness total

                                        ///set
                                                $over_time_total_hours = $over_time_hours_time;//over time
                                                $under_time_total_hours = $total_regular_hour_time;//consumed time with late or under time
                                                $total_accomplished_hours_of_juty = $total_time_1;//total hours of juty
                                                $tardiness_time_total = $late_i;//tardiness
                                                $daily_time = $total_regular_hour_time;
                                            ///
                                        //echo "</br> time diff</br>";
                                        //echo $total_time_1 . " total hours of juty</br>";
                                        //echo $total_regular_hour_time . " total regular hours of juty</br>";
                                        //echo $late_i . " tardiness total</br>";
                                        //echo $over_time_hours_time . " over time</br>";
                                        //echo "_______________________</br></br";
                                    }else if($time_out_schedule < $time_out_time_i){ //has over time
                                        //get over time
                                        $time_out_data = $time_out_time_i;
                                        $time_out_sched_data = $time_out_schedule;

                                        $diff_data_i = strtotime($time_out_sched_data) - strtotime($time_out_data);
                                        $diff_total_time = floor($diff_data_i / 60 / 60);
                                        $diff_total_time1 = round(($diff_data_i - ($diff_total_time * 60 * 60)) / 60);

                                        $over_time = $diff_total_time1; //over time
                                        $diff_total_time_hours = $total_time_1;//total hours//remove noon time
                                        $diff_tot_hours = $diff_total_time_hours; //total hours

                                        if($diff_tot_hours >= 8){
                                            $late_i = 0; //late
                                        }
                                        $over_time_i = $diff_tot_hours - 8; //over time
                                        $tot_hours_for_reg_duty = $diff_tot_hours - $over_time_i; //juty for regular hours


                                        ///set
                                                $over_time_total_hours = $over_time_i;//over time
                                                $under_time_total_hours = $tot_hours_for_reg_duty;//consumed time with late or under time
                                                $total_accomplished_hours_of_juty = $diff_tot_hours;//total hours of juty
                                                $tardiness_time_total = $late_i;//tardiness
                                                $daily_time = $tot_hours_for_reg_duty;
                                            ///
                                        //echo "</br>time diff</br>";
                                        //echo $diff_tot_hours . " total hours of juty</br>";
                                        //echo $over_time_i . " over time</br>";
                                        //echo $late_i . " no late</br>";
                                        //echo $tot_hours_for_reg_duty . " juty for regular hours</br>";
                                        //echo "__________________________</br></br>";

                                    }

                                }

                            //////// tardiness amount
                            $time_explode = $daily_time;// total time juty hours
                            $view_min = (explode(".",$time_explode));

                            $check_hour = ($view_min[0]); //get hour
                            $check_min = ($view_min[1]); //get mins

                            $combine = $check_hour . "." . $check_min;
                            //echo $daily_time . " total hours of juty from 8 hours</br>";

                            $try = (explode(":",$date_time_in));
                            ///11echo $try['1'] . "</br>";
                            $check_min = $try['1'];



                            $last_num = (explode(":",$date_time_out));

                          if($sched_time < $date_time_in && $time_out == $date_time_out){ //late in time in
                            if($date_time_in <= "11:59:59"){
                              $noon = 60;
                              $sched = $sched_time;
                              $in = $date_time_in;

                              $diff_data_i = strtotime($in) - strtotime($sched);
                              $diff_total_time = floor($diff_data_i / 60 / 60);
                              $diff_total_time1 = round(($diff_data_i - ($diff_total_time * 60 * 60)) / 60);

                              $hourset = $diff_total_time;
                              $minset = $diff_total_time1 ;

                              $get_hour_set =   $hourset * 60;
                              $total_hour_set = $get_hour_set + $minset;
                              $full_tardiness = $total_hour_set;
                            }else if($date_time_in >= "12:00:00" && $date_time_in <= "12:59:59"){
                                $noon = 60 - $check_min;
                              $sched = $sched_time;
                              $in = $date_time_in;

                              $diff_data_i = strtotime($in) - strtotime($sched);
                              $diff_total_time = floor($diff_data_i / 60 / 60);
                              $diff_total_time1 = round(($diff_data_i - ($diff_total_time * 60 * 60)) / 60);

                              $hourset = $diff_total_time;
                              $minset = $diff_total_time1 ;

                              $get_hour_set =   $hourset * 60;
                              $total_hour_set = $get_hour_set + $minset;
                              $full_tardiness = $total_hour_set - $check_min;
                            }else if($date_time_in >= "13:00:00"){
                                $sched = $sched_time;
                              $in = $date_time_in;

                              $diff_data_i = strtotime($in) - strtotime($sched);
                              $diff_total_time = floor($diff_data_i / 60 / 60);
                              $diff_total_time1 = round(($diff_data_i - ($diff_total_time * 60 * 60)) / 60);

                              $hourset = $diff_total_time;
                              $minset = $diff_total_time1 ;

                              $get_hour_set =   $hourset * 60;
                              $total_hour_set = $get_hour_set + $minset;
                              $full_tardiness = $total_hour_set - 60;
                            }



                          }
                          else if($sched_time < $date_time_in && $time_out > $date_time_out){ //late in and out
                            if($date_time_in <= "11:59:59"){
                              $noon = 60;
                              $sched = $sched_time;
                              $in = $date_time_in;

                              $diff_data_i = strtotime($in) - strtotime($sched);
                              $diff_total_time = floor($diff_data_i / 60 / 60);
                              $diff_total_time1 = round(($diff_data_i - ($diff_total_time * 60 * 60)) / 60);



                              $sched_out = $time_out;
                              $in_out = $date_time_out;

                              $diff_data_i_out = strtotime($sched_out) - strtotime($in_out);
                              $diff_total_time_out = floor($diff_data_i_out / 60 / 60);
                              $diff_total_time1_out = round(($diff_data_i_out - ($diff_total_time_out * 60 * 60)) / 60);
                              //out
                              $hourset_out = $diff_total_time_out;
                              $minset_out = $diff_total_time1_out ;

                              $hour_out = $hourset_out;
                              $min_out = $minset_out;


                              //in
                              $hourset = $diff_total_time;
                              $minset = $diff_total_time1 ;

                              $hour = $hourset;
                              $min = $minset;

                              $total_h_in = $hour * 60;
                              $total_h_out = $hour_out * 60;

                              $total_h = $total_h_in + $total_h_out;

                              $total_min = $min + $min_out;
                              $total_lates = $total_min + $total_h;
                              if($date_time_out >= "13:00:00"){
                              $full_tardiness = $total_lates;
                              }else if($date_time_out <= "12:59:59"){
                                  $full_tardiness = $total_lates - 60;
                              }
                              //$full_tardiness = $total_lates;
                            }
                              if($date_time_in >= "12:01:00" && $date_time_in <= "12:59:59"){
                                  $noon = $check_min;
                              $sched = $sched_time;
                              $in = $date_time_in;

                              $diff_data_i = strtotime($in) - strtotime($sched);
                              $diff_total_time = floor($diff_data_i / 60 / 60);
                              $diff_total_time1 = round(($diff_data_i - ($diff_total_time * 60 * 60)) / 60);



                              $sched_out = $time_out;
                              $in_out = $date_time_out;

                              $diff_data_i_out = strtotime($sched_out) - strtotime($in_out);
                              $diff_total_time_out = floor($diff_data_i_out / 60 / 60);
                              $diff_total_time1_out = round(($diff_data_i_out - ($diff_total_time_out * 60 * 60)) / 60);
                              //out
                              $hourset_out = $diff_total_time_out;
                              $minset_out = $diff_total_time1_out ;

                              $hour_out = $hourset_out;
                              $min_out = $minset_out;


                              //in
                              $hourset = $diff_total_time;
                              $minset = $diff_total_time1 ;

                              $hour = $hourset;
                              $min = $minset;

                              $total_h_in = $hour * 60;
                              $total_h_out = $hour_out * 60;

                              $total_h = $total_h_in + $total_h_out;

                              $total_min = $min + $min_out;
                              $total_lates = $total_min + $total_h;
                              $full_tardiness = $total_lates - $noon;
                              }
                              if($date_time_in == "12:00:00" && $date_time_in <= "12:59:59"){
                                  ///
                                  $noon = $check_min;
                              $sched = $sched_time;
                              $in = $date_time_in;

                              $diff_data_i = strtotime($in) - strtotime($sched);
                              $diff_total_time = floor($diff_data_i / 60 / 60);
                              $diff_total_time1 = round(($diff_data_i - ($diff_total_time * 60 * 60)) / 60);



                              $sched_out = $time_out;
                              $in_out = $date_time_out;

                              $diff_data_i_out = strtotime($sched_out) - strtotime($in_out);
                              $diff_total_time_out = floor($diff_data_i_out / 60 / 60);
                              $diff_total_time1_out = round(($diff_data_i_out - ($diff_total_time_out * 60 * 60)) / 60);
                              //out
                              $hourset_out = $diff_total_time_out;
                              $minset_out = $diff_total_time1_out ;

                              $hour_out = $hourset_out;
                              $min_out = $minset_out;


                              //in
                              $hourset = $diff_total_time;
                              $minset = $diff_total_time1 ;

                              $hour = $hourset;
                              $min = $minset;

                              $total_h_in = $hour * 60;
                              $total_h_out = $hour_out * 60;

                              $total_h = $total_h_in + $total_h_out;

                              $total_min = $min + $min_out;
                              $total_lates = $total_min + $total_h;
                              $full_tardiness = $total_lates;
                              if($full_tardiness > 480){$full_tardiness = 480;}
                                  ///
                              }else if($date_time_in >= "13:00:00"){
                                  $noon = $check_min;
                              $sched = $sched_time;
                              $in = $date_time_in;

                              $diff_data_i = strtotime($in) - strtotime($sched);
                              $diff_total_time = floor($diff_data_i / 60 / 60);
                              $diff_total_time1 = round(($diff_data_i - ($diff_total_time * 60 * 60)) / 60);



                              $sched_out = $time_out;
                              $in_out = $date_time_out;

                              $diff_data_i_out = strtotime($sched_out) - strtotime($in_out);
                              $diff_total_time_out = floor($diff_data_i_out / 60 / 60);
                              $diff_total_time1_out = round(($diff_data_i_out - ($diff_total_time_out * 60 * 60)) / 60);
                              //out
                              $hourset_out = $diff_total_time_out;
                              $minset_out = $diff_total_time1_out ;

                              $hour_out = $hourset_out;
                              $min_out = $minset_out;


                              //in
                              $hourset = $diff_total_time;
                              $minset = $diff_total_time1 ;

                              $hour = $hourset;
                              $min = $minset;

                              $total_h_in = $hour * 60;
                              $total_h_out = $hour_out * 60;

                              $total_h = $total_h_in + $total_h_out;

                              $total_min = $min + $min_out;
                              $total_lates = $total_min + $total_h;
                              $full_tardiness = $total_lates - 60;
                              }


                          }
                          else if($sched_time < $date_time_in && $time_out < $date_time_out){ //late in
                              if($date_time_in <= "11:59:59"){
                                  $sched = $sched_time;
                                    $in = $date_time_in;

                                    $diff_data_i = strtotime($in) - strtotime($sched);
                                    $diff_total_time = floor($diff_data_i / 60 / 60);
                                    $diff_total_time1 = round(($diff_data_i - ($diff_total_time * 60 * 60)) / 60);

                                    $hourset = $diff_total_time;
                                    $minset = $diff_total_time1 ;

                                    $get_hour_set =   $hourset * 60;
                                    $total_hour_set = $get_hour_set + $minset;
                                    $full_tardiness = $total_hour_set;
                              }else if($date_time_in >= "12:00:00" && $date_time_in <= "12:59:59"){
                                  $noon = 60 - $check_min;
                                  $sched = $sched_time;
                                    $in = $date_time_in;

                                    $diff_data_i = strtotime($in) - strtotime($sched);
                                    $diff_total_time = floor($diff_data_i / 60 / 60);
                                    $diff_total_time1 = round(($diff_data_i - ($diff_total_time * 60 * 60)) / 60);

                                    $hourset = $diff_total_time;
                                    $minset = $diff_total_time1 ;

                                    $get_hour_set =   $hourset * 60;
                                    $total_hour_set = $get_hour_set + $minset;
                                    $full_tardiness = $total_hour_set - $check_min;
                              }else if($date_time_in >= "13:00:00"){
                                  $noon = 60 - $check_min;
                                  $sched = $sched_time;
                                    $in = $date_time_in;

                                    $diff_data_i = strtotime($in) - strtotime($sched);
                                    $diff_total_time = floor($diff_data_i / 60 / 60);
                                    $diff_total_time1 = round(($diff_data_i - ($diff_total_time * 60 * 60)) / 60);

                                    $hourset = $diff_total_time;
                                    $minset = $diff_total_time1 ;

                                    $get_hour_set =   $hourset * 60;
                                    $total_hour_set = $get_hour_set + $minset;
                                    $full_tardiness = $total_hour_set - 60;
                              }
                            

                          }
                          else if($sched_time == $date_time_in && $time_out == $date_time_out){ // no late
                            $sched = $sched_time;
                            $in = $date_time_in;

                            $diff_data_i = strtotime($in) - strtotime($sched);
                            $diff_total_time = floor($diff_data_i / 60 / 60);
                            $diff_total_time1 = round(($diff_data_i - ($diff_total_time * 60 * 60)) / 60);

                            $hourset = $diff_total_time;
                            $minset = $diff_total_time1 ;

                            $get_hour_set =   $hourset * 60;
                            $total_hour_set = $get_hour_set + $minset;
                            $full_tardiness = $total_hour_set;
                          }
                          else if($sched_time == $date_time_in && $time_out > $date_time_out){ // late out
                            $sched_out = $time_out;
                            $in_out = $date_time_out;

                            $diff_data_i_out = strtotime($sched_out) - strtotime($in_out);
                            $diff_total_time_out = floor($diff_data_i_out / 60 / 60);
                            $diff_total_time1_outs = round(($diff_data_i_out - ($diff_total_time_out * 60 * 60)) / 60);

                            $hourset_out = $diff_total_time_out;
                            $minset_out = $diff_total_time1_outs;

                            $get_hour_set_out =   $hourset_out * 60;
                            $total_hour_set_outs = $get_hour_set_out + $minset_out;
                            $full_tardiness = $total_hour_set_outs;
                            if($date_time_out <= "11:59:59"){
                                $sched_out = $time_out;
                                $in_out = $date_time_out;

                                $diff_data_i_out = strtotime($sched_out) - strtotime($in_out);
                                $diff_total_time_out = floor($diff_data_i_out / 60 / 60);
                                $diff_total_time1_outs = round(($diff_data_i_out - ($diff_total_time_out * 60 * 60)) / 60);

                                $hourset_out = $diff_total_time_out;
                                $minset_out = $diff_total_time1_outs;

                                $get_hour_set_out =   $hourset_out * 60;
                                $total_hour_set_outs = $get_hour_set_out + $minset_out;
                                $full_tardiness = $total_hour_set_outs - 60;
                            }else if($date_time_out >= "12:00:00" && $date_time_out <= "12:59:59"){
                                $noon = 60 - $last_num[1];
                                $sched_out = $time_out;
                                $in_out = $date_time_out;

                                $diff_data_i_out = strtotime($sched_out) - strtotime($in_out);
                                $diff_total_time_out = floor($diff_data_i_out / 60 / 60);
                                $diff_total_time1_outs = round(($diff_data_i_out - ($diff_total_time_out * 60 * 60)) / 60);

                                $hourset_out = $diff_total_time_out;
                                $minset_out = $diff_total_time1_outs;

                                $get_hour_set_out =   $hourset_out * 60;
                                $total_hour_set_outs = $get_hour_set_out + $minset_out;
                                $full_tardiness = $total_hour_set_outs - $noon;
                            }
                          }
                          else if($sched_time == $date_time_in && $time_out < $date_time_out){ // no late
                            $sched = $sched_time;
                            $in = $date_time_in;

                            $diff_data_i = strtotime($in) - strtotime($sched);
                            $diff_total_time = floor($diff_data_i / 60 / 60);
                            $diff_total_time1 = round(($diff_data_i - ($diff_total_time * 60 * 60)) / 60);

                            $hourset = $diff_total_time;
                            $minset = $diff_total_time1 ;

                            $get_hour_set =   $hourset * 60;
                            $total_hour_set = $get_hour_set + $minset;
                            $full_tardiness = $total_hour_set;
                          }
                          else if($sched_time > $date_time_in && $time_out == $date_time_out){ // no late
                            $full_tardiness = 0;
                          }
                          else if($sched_time > $date_time_in && $time_out > $date_time_out){ // late out
                            $sched_out = $time_out;
                            $in_out = $date_time_out;

                            $diff_data_i_out = strtotime($sched_out) - strtotime($in_out);
                            $diff_total_time_out = floor($diff_data_i_out / 60 / 60);
                            $diff_total_time1_out = round(($diff_data_i_out - ($diff_total_time_out * 60 * 60)) / 60);

                            $hourset_out = $diff_total_time_out;
                            $minset_out = $diff_total_time1_out ;

                            $get_hour_set_out =   $hourset_out * 60;
                            $total_hour_set_out = $get_hour_set_out + $minset_out;
                            $full_tardiness = $total_hour_set_out;
                            if($date_time_out <= "11:59:59"){
                                $sched_out = $time_out;
                                $in_out = $date_time_out;

                                $diff_data_i_out = strtotime($sched_out) - strtotime($in_out);
                                $diff_total_time_out = floor($diff_data_i_out / 60 / 60);
                                $diff_total_time1_out = round(($diff_data_i_out - ($diff_total_time_out * 60 * 60)) / 60);

                                $hourset_out = $diff_total_time_out;
                                $minset_out = $diff_total_time1_out ;

                                $get_hour_set_out =   $hourset_out * 60;
                                $total_hour_set_out = $get_hour_set_out + $minset_out;
                                $full_tardiness = $total_hour_set_out - 60;
                            }else if($date_time_out >= "12:00:00" && $date_time_out <= "12:59:59"){
                                $noon = 60 - $last_num[1];
                                $sched_out = $time_out;
                                $in_out = $date_time_out;

                                $diff_data_i_out = strtotime($sched_out) - strtotime($in_out);
                                $diff_total_time_out = floor($diff_data_i_out / 60 / 60);
                                $diff_total_time1_out = round(($diff_data_i_out - ($diff_total_time_out * 60 * 60)) / 60);

                                $hourset_out = $diff_total_time_out;
                                $minset_out = $diff_total_time1_out ;

                                $get_hour_set_out =   $hourset_out * 60;
                                $total_hour_set_out = $get_hour_set_out + $minset_out;
                                $full_tardiness = $total_hour_set_out - $noon;
                            }
                          }
                          else if($sched_time > $date_time_in && $time_out < $date_time_out){ // no late
                            $full_tardiness = 0;
                          }





                            $compute_tradiness_amount =  ($salary_per_hour / 60 * $full_tardiness);//round($salary_per_hour / 60 * $full_tardiness);
                            $tardiness_amount_to_deduct = $compute_tradiness_amount;




                             /*echo $tardiness_amount_to_deduct . " tardiness amount</br>";
                             //////// tardiness amount
                             */
                             ///salary per day - tardiness
                             $hour_pay = $salary_per_day - $tardiness_amount_to_deduct;
                             //echo round($hour_pay) . " salary per day minus tardines regular</br>";
                             //echo $tardiness_amount_to_deduct . "</br>";
                             ///salary per day - tardiness




                             ///check for holiday salary

                             if($holiday_type == "legal"){
                                 $daily_amount_pay = ($hour_pay + $salary_per_day);//round($hour_pay + $salary_per_day);
                                  //echo $daily_amount_pay  . " salary per day base on status days legal</br></br>";
                             }else if($holiday_type == "special"){
                                 $daily_amount_pay = (($salary_per_day * 0.30) + $hour_pay);//round(($salary_per_day * 0.30) + $hour_pay);
                                  //echo $daily_amount_pay  . " salary per day base on status days special</br></br>";
                             }else if($holiday_type == ""){
                                 $daily_amount_pay = ($hour_pay);//round($hour_pay);
                                  //echo $daily_amount_pay  . " salary per day base on status days none</br></br>";
                             }

                             ///check for holiday salary


                             ///over time
                             $over_time_hour_pay = $salary_per_hour;
                             $total_over_time_consumed = $over_time_total_hours;

                             if($total_over_time_consumed >= 1){
                                 if($holiday_type == "legal"){
                                     $tot_hour = $over_time_hour_pay * 2;
                                     $tot_over_time_pay = $tot_hour * $total_over_time_consumed;
                                 }else if($holiday_type == "special"){
                                     $tot_hour = ($over_time_hour_pay * 0.30) +  $over_time_hour_pay;
                                     $tot_over_time_pay = $tot_hour * $total_over_time_consumed;
                                 }else if($holiday_type == ""){
                                     $tot_hour = ($over_time_hour_pay * 0.25) + $over_time_hour_pay;
                                     $tot_over_time_pay = $tot_hour * $total_over_time_consumed;
                                 }
                             }
                             if($over_time_total_hours > 1){
                                //echo $tot_over_time_pay  . " over time amount $over_time_total_hours</br></br>";
                             }else if($over_time_total_hours < 1){
                                 $tot_over_time_pay = 0;
                                 //echo $tot_over_time_pay  . " over time amount $over_time_total_hours</br></br>";
                             }
                             
                             
                             
                             
                             $given_hours = 480;
                            $total_tardiness_time_var = ($given_hours - $full_tardiness) / 60 + $total_over_time_consumed;
                           //echo $total_tardiness_time_var / 60 . "</br>";





                             $tot_over_time_amount_juty = ($tot_over_time_pay);//round($tot_over_time_pay);
                             ///over all salary amount with tardiness deduction and over time
                             $over_all_pay_for_the_day = $daily_amount_pay + $tot_over_time_pay;
                             $total_amount_for_day_juty = $over_all_pay_for_the_day;
                             //echo $over_all_pay_for_the_day . " total pay for the day</br>";

                             $over_time_explode = (explode(".",$over_time_total_hours));
                             $ot_hour = $over_time_explode[0];
                             $ot_mins = $over_time_explode[1];

                             $add_hour = $check_hour + $ot_hour;
                             $add_min = $check_min + $ot_mins;

                             $total_hours_for_the_day = $add_hour . "." . $add_min; //total hours of juty
                             $total_hours_juty_complied = $total_hours_for_the_day;
                             $tot_hours_of_juty_required = $daily_time; //total hours of juty in required time
                             $full_tardiness1 = $full_tardiness;//total tardiness time
                             $tardiness_amt = $compute_tradiness_amount;//total tardiness amount
                             $over_time_tot_hour = $over_time_total_hours;//over time total
                             $over_time_amt = $tot_over_time_pay;//over time amount
                             $tot_pay_day = $over_all_pay_for_the_day;//total pay for the day
                             $tot_hours_to_comply = 8;//total hour to comply
                             $salary_per_day_amt = $salary_per_day;//salary per day amount
                             $salary_per_hour_amt = $salary_per_hour;//salary per hour amount
                             //$salary_per_month_amt = $salary_per_month;//salary per month
                             $emp_id_ins = $emp_id;
                             $time_in_date = $date_time_in;
                             $time_out_date = $date_time_out;
                             $date_time = $date;

                             //echo $salary_per_month_amt . " sdfsdfsdfsfsdfsdfsd</br>";
                                    $data_to_ins_computational_model['emp_id'] = $emp_id_ins;
                                    $data_to_ins_computational_model['date_time_in'] = $time_in_date;
                                     $data_to_ins_computational_model['date_time_out'] = $time_out_date;
                                     $data_to_ins_computational_model['date'] = $date_time;
                                     $data_to_ins_computational_model['over_time_total_hour'] = $over_time_tot_hour;
                                     $data_to_ins_computational_model['total_accomplished_hours'] = $total_hours_for_the_day;
                                     $data_to_ins_computational_model['total_hours_to_comply_daily'] = $tot_hours_to_comply;
                                     $data_to_ins_computational_model['tardiness_amount_to_deduct'] = $tardiness_amt;
                                     $data_to_ins_computational_model['tardiness_time_total'] = $full_tardiness1;
                                     $data_to_ins_computational_model['total_pay_for_over_all_hour'] = ($tot_pay_day);//round($tot_pay_day);
                                     $data_to_ins_computational_model['total_hours_of_juty_required'] = $tot_hours_of_juty_required;
                                     $data_to_ins_computational_model['total_normal_pay'] = $hour_pay;
                                     $data_to_ins_computational_model['over_time_amount'] = ($over_time_amt);//round($over_time_amt);
                                     $data_to_ins_computational_model['salary_per_day_amount'] = $salary_per_day_amt;
                                     $data_to_ins_computational_model['salary_per_hour_amount'] = $salary_per_hour_amt;
                                     $data_to_ins_computational_model['enabled'] = 1;
                                     $data_to_ins_computational_model['day_type'] = $holiday_type;
                                     $data_to_ins_computational_model['total_hours_of_juty_complied'] = $total_tardiness_time_var;

                                     $data_to_ins_computational_model['emp_name'] = $emp_name;
                             computational_time_model::insert_table($data_to_ins_computational_model);






















                            ///set empty
                            $over_time_total_hours = "";
                            $under_time_total_hours = "";
                            $total_accomplished_hours_of_juty = "";
                            $total_hours_to_comply_daily = "";
                            $holiday_daily_pay = "";
                            $holiday_hourly_pay = "";
                            $over_time_premium = "";
                            $leave_from = "";
                            $leave_to = "";
                            $absent = "";
                            $time_suspend = "";
                            $tardiness_amount_to_deduct = "";
                            $tardiness_time_total = "";
                            $late_in_time_stat = "";
                            $late_hour_no_deduction = "";
                            $late_leave = "";





                            /// varibales to be injected in employee model
                            $salary_per_day = "";
                            $salary_per_hour = "";
                            $salary_per_month = "";
                            $sched_time = "";




                            //echo "______________________________________________________________________________________________</br></br>";
                        }
                    }





                 /// varibales to be injected in employee time record model
                            $emp_id = "";
                            $date_time_in = "";
                            $date_time_out = "";
                            $date = "";
                            $holiday_type = "";

                }
            }


                            ///////////////////////////////////////////////////
                            /////////////////////////////////////////////////// get leave
                            ///////////////////////////////////////////////////
                            $leave_from_data = "";
                            $leave_to_data = "";
                            $leave_file_time = "";
                            $leave_type = "";
                            $emp_daily_salary = "";
                            $emp_id_of_leave = "";
                            $number_of_days_leave = "";

                            $leave_data = leave_model::get_employee_approved_leave_for_daily_time_record($date_start, $date_to);
                            if($leave_data){
                                foreach($leave_data as $leave_data_data){

                                   $emp_id_of_leave = $leave_data_data->emp_id;
                                   $leave_type = $leave_data_data->type_of_leave;
                                   $leave_from_data = $leave_data_data->leave_from;
                                   $leave_to_data = $leave_data_data->leave_to;
                                   $leave_file_time = $leave_data_data->leave_file_date;
                                   $use_var = $leave_data_data->use;

                                    $check = employee_model::get_emp_records($emp_id_of_leave);
                                    if($check){
                                        foreach($check as $checked){

                                            $start_date_leave = new DateTime($leave_from_data);
                                            $end_date_leave = new DateTime($leave_to_data);

                                            $diff_days_of_leave = $end_date_leave->diff($start_date_leave)->format("%a") + 1;

                                            $number_of_days_leave = $diff_days_of_leave;
                                            $emp_daily_salary = $checked->daily_salary;
                                                if($leave_type == "absent"){
                                                    echo "no pay";
                                                }else if($leave_type == "vacation leave"){
                                                        //echo $emp_daily_salary . "-" . $emp_id_of_leave  . "-" . $leave_type . "-" . $leave_from_data . "-" .$leave_to_data . " dateleave " .$leave_file_time . "-" . $number_of_days_leave . " total leave" . "</br>";
                                                        for ($x=strtotime($leave_from_data);$x<=strtotime($leave_to_data);$x+=86400){
                                                            if($leave_data_data->use == 0){
                                                                $cal_leaves = $checked->emp_leave_available - $number_of_days_leave;
                                                                $xxx = array(
                                                                    'emp_leave_available' => $cal_leaves
                                                                );
                                                                employee_model::update_table($xxx, "emp_code", $checked->emp_code);
                                                                $num['use'] = 1;
                                                                 leave_model::update_table($num, "emp_id", $checked->emp_code);


                                                                $d_date = date('l', strtotime(date('Y-m-d',$x)));
                                                                if($checked->juty_day_to == "Friday"){
                                                                    if($d_date != "Saturday" && $d_date != "Sunday"){
                                                                        $data_['date'] = date('Y-m-d',$x);
                                                                         $data_['leave_from'] = $leave_data_data->leave_from;
                                                                         $data_['leave_to'] = $leave_data_data->leave_to;
                                                                         $data_['emp_id'] = $emp_id_of_leave;
                                                                         $data_['total_pay_for_over_all_hour'] = $checked->daily_salary;
                                                                         $data_['total_hours_of_juty_required'] = "vacation leave";

                                                                         $data_['emp_name'] = $checked->emp_name;
                                                                        $data_['enabled'] = 1;
                                                                        $data_['salary_per_day_amount'] = $checked->daily_salary;

                                                                         computational_time_model::insert_table($data_);
                                                                    }
                                                                }else if($checked->juty_day_to == "Saturday"){
                                                                    if($d_date != "Sunday"){
                                                                        $data_['date'] = date('Y-m-d',$x);
                                                                         $data_['leave_from'] = $leave_data_data->leave_from;
                                                                         $data_['leave_to'] = $leave_data_data->leave_to;
                                                                         $data_['emp_id'] = $emp_id_of_leave;
                                                                         $data_['total_pay_for_over_all_hour'] = $checked->daily_salary;
                                                                         $data_['total_hours_of_juty_required'] = "vacation leave";

                                                                         $data_['emp_name'] = $checked->emp_name;
                                                                        $data_['enabled'] = 1;
                                                                        $data_['salary_per_day_amount'] = $checked->daily_salary;

                                                                         computational_time_model::insert_table($data_);
                                                                    }
                                                                }

                                                                 
                                                            }else{
                                                                $d_date = date('l', strtotime(date('Y-m-d',$x)));
                                                                if($checked->juty_day_to == "Friday"){
                                                                    if($d_date != "Saturday" && $d_date != "Sunday"){
                                                                        $data_['date'] = date('Y-m-d',$x);
                                                                         $data_['leave_from'] = $leave_data_data->leave_from;
                                                                         $data_['leave_to'] = $leave_data_data->leave_to;
                                                                         $data_['emp_id'] = $emp_id_of_leave;
                                                                         $data_['total_pay_for_over_all_hour'] = $checked->daily_salary;
                                                                         $data_['total_hours_of_juty_required'] = "vacation leave";

                                                                         $data_['emp_name'] = $checked->emp_name;
                                                                        $data_['enabled'] = 1;
                                                                        $data_['salary_per_day_amount'] = $checked->daily_salary;
                                                                         computational_time_model::insert_table($data_);
                                                                    }
                                                                }else if($checked->juty_day_to == "Saturday"){
                                                                    if($d_date != "Sunday"){
                                                                        $data_['date'] = date('Y-m-d',$x);
                                                                         $data_['leave_from'] = $leave_data_data->leave_from;
                                                                         $data_['leave_to'] = $leave_data_data->leave_to;
                                                                         $data_['emp_id'] = $emp_id_of_leave;
                                                                         $data_['total_pay_for_over_all_hour'] = $checked->daily_salary;
                                                                         $data_['total_hours_of_juty_required'] = "vacation leave";

                                                                         $data_['emp_name'] = $checked->emp_name;
                                                                        $data_['enabled'] = 1;
                                                                        $data_['salary_per_day_amount'] = $checked->daily_salary;
                                                                         computational_time_model::insert_table($data_);
                                                                    }
                                                                }
                                                                
                                                            }
                                                            //echo date('Y-m-d',$x) . " $checked->emp_code </br>";

                                                        }

                                                }else if($leave_type == "sick leave"){
                                                        //echo $emp_daily_salary . "-" . $emp_id_of_leave  . "-" . $leave_type . "-" . $leave_from_data . "-" .$leave_to_data . " dateleave " .$leave_file_time . "-" . $number_of_days_leave . " total leave" . "</br>";
                                                        for ($x=strtotime($leave_from_data);$x<=strtotime($leave_to_data);$x+=86400){
                                                            if($use_var == 0){
                                                                $cal_leaves = $checked->emp_sick_leave_available - $number_of_days_leave;
                                                                $xxx = array(
                                                                    'emp_sick_leave_available' => $cal_leaves
                                                                );
                                                                employee_model::update_table($xxx, "emp_code", $checked->emp_code);
                                                                $num['use'] = 1;
                                                                $iii = $checked->emp_code;
                                                                 leave_model::update_table($num, "emp_id", (string)$iii);


                                                                $d_date = date('l', strtotime(date('Y-m-d',$x)));
                                                                if($checked->juty_day_to == "Friday"){
                                                                    if($d_date != "Saturday" && $d_date != "Sunday"){
                                                                        $data_['date'] = date('Y-m-d',$x);
                                                                 $data_['leave_from'] = $leave_data_data->leave_from;
                                                                 $data_['leave_to'] = $leave_data_data->leave_to;
                                                                 $data_['emp_id'] = $emp_id_of_leave;
                                                                 $data_['total_pay_for_over_all_hour'] = $checked->daily_salary;
                                                                 $data_['total_hours_of_juty_required'] = "sick leave";

                                                                 $data_['emp_name'] = $checked->emp_name;
                                                                $data_['enabled'] = 1;
                                                                $data_['salary_per_day_amount'] = $checked->daily_salary;

                                                                 computational_time_model::insert_table($data_);
                                                                 //echo "xxx $iii </br>";
                                                                    }
                                                                }else if($checked->juty_day_to == "Saturday"){
                                                                    if($d_date != "Sunday"){
                                                                        $data_['date'] = date('Y-m-d',$x);
                                                                 $data_['leave_from'] = $leave_data_data->leave_from;
                                                                 $data_['leave_to'] = $leave_data_data->leave_to;
                                                                 $data_['emp_id'] = $emp_id_of_leave;
                                                                 $data_['total_pay_for_over_all_hour'] = $checked->daily_salary;
                                                                 $data_['total_hours_of_juty_required'] = "sick leave";

                                                                 $data_['emp_name'] = $checked->emp_name;
                                                                $data_['enabled'] = 1;
                                                                $data_['salary_per_day_amount'] = $checked->daily_salary;

                                                                 computational_time_model::insert_table($data_);
                                                                 //echo "xxx $iii </br>";
                                                                    }
                                                                }

                                                                 
                                                            }else{
                                                                $d_date = date('l', strtotime(date('Y-m-d',$x)));
                                                                if($checked->juty_day_to == "Friday"){
                                                                    if($d_date != "Saturday" && $d_date != "Sunday"){
                                                                        $data_['date'] = date('Y-m-d',$x);
                                                                         $data_['leave_from'] = $leave_data_data->leave_from;
                                                                         $data_['leave_to'] = $leave_data_data->leave_to;
                                                                         $data_['emp_id'] = $emp_id_of_leave;
                                                                         $data_['total_pay_for_over_all_hour'] = $checked->daily_salary;
                                                                         $data_['total_hours_of_juty_required'] = "sick leave";

                                                                         $data_['emp_name'] = $checked->emp_name;
                                                                        $data_['enabled'] = 1;
                                                                        $data_['salary_per_day_amount'] = $checked->daily_salary;

                                                                         computational_time_model::insert_table($data_);
                                                                    }
                                                                }else if($checked->juty_day_to == "Saturday"){
                                                                    if($d_date != "Sunday"){
                                                                        $data_['date'] = date('Y-m-d',$x);
                                                                         $data_['leave_from'] = $leave_data_data->leave_from;
                                                                         $data_['leave_to'] = $leave_data_data->leave_to;
                                                                         $data_['emp_id'] = $emp_id_of_leave;
                                                                         $data_['total_pay_for_over_all_hour'] = $checked->daily_salary;
                                                                         $data_['total_hours_of_juty_required'] = "sick leave";

                                                                         $data_['emp_name'] = $checked->emp_name;
                                                                        $data_['enabled'] = 1;
                                                                        $data_['salary_per_day_amount'] = $checked->daily_salary;

                                                                         computational_time_model::insert_table($data_);
                                                                    }
                                                                }
                                                                
                                                            }


                                                        }

                                                }
                                            //break;
                                            }
                                    }

                                }
                            }

                            payroll_display_model::del_table();


                            $get_data_daily_record = computational_time_model::get_all_rec();
                            //$get_data_daily_record['location'] = "Daily Time Record";
                            //$this->load->view("templ/payroll/contents/home", $get_data_daily_record);
                            //echo modules::run("templ/payroll/display_daily_time_records", $get_data_daily_record);
                            
                            //$get_data_daily_record);
                            $get_all_records_from_computational_table = computational_time_model::get_compute_rec();
                            /*echo "<pre>";
                            var_dump($get_all_records_from_computational_table);
                            echo "</pre>";*/
                            echo "</br>";
                            foreach($get_all_records_from_computational_table as $get_all_records_from_computational_table_data){
                                //echo $get_all_records_from_computational_table_data->emp_id . "</br>";
                                $emp_id_data = $get_all_records_from_computational_table_data->emp_id;
                                $check_emp_id = employee_model::getSearch(array('employee.emp_code ='=>$emp_id_data),"",array("employee.emp_id"=>"ASC"),true);
                                    foreach($check_emp_id as $employee_data){
                                        
                                        
                                        
                                        $employee_id = $employee_data->emp_code; //emp id
                                        $employee_name = $employee_data->emp_name;
                                        $employee_sal_per_day = $employee_data->daily_salary; /// salary per day
                                        $employee_sal_per_month = $employee_data->salary; // salary per month
                                        $employee_sal_per_hour = $employee_data->pay_per_hour; // salary per hour
                                        
                                        $employee_total_hours_complied = $get_all_records_from_computational_table_data->total_time; // total hours include over time
                                        $employee_total_hours_to_comply = $get_all_records_from_computational_table_data->total_accomplished_hours_as_required; // total hours over time not included
                                        $employee_total_tardiness_time = $get_all_records_from_computational_table_data->total_tardiness_time; // total tardiness
                                        $employee_total_tardiness_amount = $get_all_records_from_computational_table_data->tardiness_amount; // total tardiness amount
                                         $employee_total_over_time = $get_all_records_from_computational_table_data->over_time_total_time; // total over time
                                         $employee_total_over_time_amount = $get_all_records_from_computational_table_data->over_time_total_amount; // total over time amount
                                         
                                         
                                         $employee_pay_type = $employee_data->pay_type;
                                         
                                         $sss_brk = $employee_data->sss_bracket; // sss id bracket
                                        $phil_h_brk = $employee_data->philhealth_bracket; // philhealth id bracket
                                        $pag_ibig_brk = $employee_data->pag_ibig_bracket; // pag-ibig id bracket
                                         
                                         $check_bracket_for_gov_sss = bracket_for_gov_remettance_model::getFields($sss_brk); // get sss bracket info
                                        $check_bracket_for_gov_phil_h = bracket_for_gov_remettance_model::getFields($phil_h_brk); // get philhealth bracket info
                                        $check_bracket_for_gov_pag_i = bracket_for_gov_remettance_model::getFields($pag_ibig_brk); // get pag-ibig bracket info
                                        
                                         $employee_sss_amount = $check_bracket_for_gov_sss->monthly_deduction; // sss amount
                                         $employee_philh_amount = $check_bracket_for_gov_phil_h->monthly_deduction; // philhealth amount
                                         $employee_pag_i_amount = $check_bracket_for_gov_pag_i->monthly_deduction; // pag-ibig amount
                                         $employee_total_salary_tally = $get_all_records_from_computational_table_data->total_salary_tally; // total salary
                                         $employee_gross_salary = $get_all_records_from_computational_table_data->total_salary_tally; // total gross salary
                                         
                                         
                                         
                                        
                                        $employee_total_bracket_for_sss = $check_bracket_for_gov_sss->monthly_deduction; // sss monthly deduction
                                        $employee_total_bracket_for_phil_h = $check_bracket_for_gov_phil_h->monthly_deduction; // philhealth monthly deduction
                                        $employee_total_bracket_for_pag_i = $check_bracket_for_gov_pag_i->monthly_deduction; // pag-ibig monthly deduction
                                        $total_gov_amount = $employee_total_bracket_for_sss + $employee_total_bracket_for_phil_h + $employee_total_bracket_for_pag_i; // total gov bracket amout
                                         $employee_net_salary = $employee_gross_salary - $total_gov_amount; // total net salary
                                        
                                        /*echo $check_bracket_for_gov_sss->name_of_bracket . "-" . $check_bracket_for_gov_phil_h->name_of_bracket . "-" . $check_bracket_for_gov_pag_i->name_of_bracket . 
                                                "-" . $employee_data->emp_code . "-" . $get_all_records_from_computational_table_data->total_tardiness_time .
                                                "_". $check_bracket_for_gov_sss->monthly_deduction . "_" . $employee_data->pay_per_day . "</br>";*/
                                        /*echo $employee_id . " -> empid</br>";
                                         echo $employee_sal_per_day . " -> emp sal per day</br>";
                                          echo  $employee_sal_per_month . " -> emp sal per month</br>";
                                           echo $employee_sal_per_hour . " -> emp sal per hour</br>";
                                            echo $employee_total_hours_complied . " -> emp tatal hours with over time</br>";
                                             echo $employee_total_hours_to_comply . " -> total hours no over time</br>";
                                              echo $employee_total_tardiness_time . " -> tardiess time</br>";
                                               echo $employee_total_tardiness_amount . " -> tardiness amount</br>";
                                               echo $employee_total_over_time . " -> over time</br>";
                                               echo $employee_total_over_time_amount . " -> over time amount</br>";
                                                echo $employee_sss_amount . " -> sss amount</br>";
                                                 echo $employee_philh_amount . " -> philhealth amount</br>";
                                                 echo $employee_pag_i_amount . " -> pag-ibig amount</br>";
                                                 echo $employee_total_salary_tally . " -> sal tally</br>";
                                                 echo $employee_gross_salary . " -> gross</br>";
                                                 echo  $employee_net_salary . " -> net</br>";*/
                                        
                                        
                                        
                                        
                                        $get_hol_legal_count = employee_time_record_model::get_hol_count($date_start, $date_to, "legal", $employee_id);
                                         if($get_hol_legal_count){
                                             foreach($get_hol_legal_count as $get_hol_legal_count_data){
                                                 $count_legal = $get_hol_legal_count_data->holiday_count;
                                                 $total_legal_add_on = $get_hol_legal_count_data->holiday_count * $employee_sal_per_day;
                                                 break;
                                             }
                                         }
                                         $get_hol_special_count = employee_time_record_model::get_hol_count($date_start, $date_to, "special", $employee_id);
                                         if($get_hol_special_count){
                                             foreach($get_hol_special_count as $get_hol_special_count_data){
                                                 $count_special = $get_hol_special_count_data->holiday_count;
                                                 $total_special_add_on = ($get_hol_special_count_data->holiday_count * $employee_sal_per_day) * 0.30;
                                                 break;
                                             }
                                         }
                                         $data_payroll['emp_id'] = $employee_id;
                                         $data_payroll['emp_name'] = $employee_name;
                                         $data_payroll['employee_sal_per_day'] = $employee_sal_per_day;
                                         $data_payroll['employee_sal_per_month'] = $employee_sal_per_month;
                                         $data_payroll['employee_sal_per_hour'] = $employee_sal_per_hour;
                                         $data_payroll['employee_total_hours_complied'] = (int)(($employee_total_hours_complied*100))/100;
                                         $data_payroll['employee_total_hours_to_comply'] = (double)(($employee_total_hours_to_comply*100))/100;
                                         $data_payroll['employee_total_tardiness_time'] = $employee_total_tardiness_time;
                                         $data_payroll['employee_total_tardiness_amount'] = $employee_total_tardiness_amount;
                                         $data_payroll['employee_total_over_time'] = $employee_total_over_time;
                                         $data_payroll['employee_total_over_time_amount'] = $employee_total_over_time_amount;
                                         $data_payroll['employee_sss_amount'] = $employee_sss_amount;
                                         $data_payroll['employee_philh_amount'] = $employee_philh_amount;
                                         $data_payroll['employee_pag_i_amount'] = $employee_pag_i_amount;
                                         $data_payroll['employee_total_salary_tally'] = $employee_total_salary_tally;
                                         $data_payroll['employee_gross_salary'] = $employee_gross_salary;
                                         $total_holidays_add_on = $total_legal_add_on + $total_special_add_on;
                                         $data_payroll['employee_net_salary'] = $employee_net_salary;
                                         $data_payroll['pay_type'] = $employee_pay_type;
                                         $data_payroll['enabled'] = 1;
                                                 
                                         
                                        
                                        //new
                                         $data_payroll['legal'] = $count_legal;
                                         $data_payroll['special'] = $count_special;
                                         //end new
                                        
                                        payroll_display_model::insert_table($data_payroll);
                                         
                                        //echo "</br></br>";
                                        
                                    }
                                    
                            }
                            for ($x=strtotime($date_start);$x<=strtotime($date_to);$x+=86400){
                                        //echo date("Y-m-d l", $x) . " xxx</br>";
                                        $get_employee_rec_juty_day = employee_model::get_emp_records_list();
                                        foreach($get_employee_rec_juty_day as $get_employee_rec_juty_day_data){
                                            $get_f = $get_employee_rec_juty_day_data->juty_day_from;
                                            $get_t = $get_employee_rec_juty_day_data->juty_day_to;
                                            
                                            //echo "_________________________$get_employee_rec_juty_day_data->emp_code</br>";
                                            $get_juty_day_from = $get_employee_rec_juty_day_data->juty_day_from;
                                            $get_juty_day_to = $get_employee_rec_juty_day_data->juty_day_to;
                                            for ($y=strtotime($date_start);$y<=strtotime($date_to);$y+=86400){
                                                if($get_f == "Monday" && $get_t == "Friday"){
                                                    if(date("l", $x) == "Saturday" || date("l", $x) == "Sunday"){
                                                        //echo "rest day</br>";break;
                                                    }else{
                                                        if(date("l", $y) == "Saturday" || date("l", $y) == "Sunday"){
                                                            //echo date("Y-m-d l", $y) . " restday</br>";
                                                        }else{
                                                            $get_date_rec = employee_time_record_model::getField_time_record("$get_employee_rec_juty_day_data->emp_code", date("Y-m-d", $x));
                                                            if($get_date_rec){
                                                                //echo date("Y-m-d l", $x) . " juty</br>";break;
                                                            }else{
                                                                $check_emp_data = payroll_display_model::getFields("$get_employee_rec_juty_day_data->emp_code");
                                                                if($check_emp_data){
                                                                    $absent_date =  $check_emp_data->total_absent;
                                                                }
                                                                
                                                                $update_absent['total_absent'] = $absent_date + 1;
                                                                //echo $absent_date;
                                                                payroll_display_model::update_table($update_absent, "emp_id", "$get_employee_rec_juty_day_data->emp_code");
                                                                break;
                                                                //echo date("Y-m-d l", $x) . " no juty</br>";break;
                                                            }
                                                        //echo date("Y-m-d l", $y) . " juty day</br>";
                                                        }
                                                    }
                                                    
                                                }
                                                
                                                
                                                
                                                
                                                //for saturday
                                                if($get_f == "Monday" && $get_t == "Saturday"){
                                                    if(date("l", $x) == "Sunday"){
                                                        //echo "rest day</br>";break;
                                                    }else{
                                                        if(date("l", $y) == "Sunday"){
                                                            //echo date("Y-m-d l", $y) . " restday</br>";
                                                        }else{
                                                            $get_date_rec = employee_time_record_model::getField_time_record("$get_employee_rec_juty_day_data->emp_code", date("Y-m-d", $x));
                                                            if($get_date_rec){
                                                                //echo date("Y-m-d l", $x) . " juty</br>";break;
                                                            }else{
                                                                $check_emp_data = payroll_display_model::getFields("$get_employee_rec_juty_day_data->emp_code");
                                                                if($check_emp_data){
                                                                    $absent_date =  $check_emp_data->total_absent;
                                                                }
                                                                
                                                                $update_absent['total_absent'] = $absent_date + 1;
                                                                //echo $absent_date;
                                                                payroll_display_model::update_table($update_absent, "emp_id", "$get_employee_rec_juty_day_data->emp_code");
                                                                break;
                                                                //echo date("Y-m-d l", $x) . " no juty</br>";break;
                                                            }
                                                        //echo date("Y-m-d l", $y) . " juty day</br>";
                                                        }
                                                    }
                                                    
                                                }
                                                //
                                            }
                                        }
                                        
                                    }
                            $data_to_display_payroll['payroll_data_rec'] = payroll_display_model::get_all_rec();
            $data_to_display_payroll['get_deduct_leave'] = payroll_display_model::get_deduct_leave($date_start, $date_to);
            $data_to_display_payroll['emp_list'] = employee_model::get_emp_records_list();
            $data_to_display_payroll['remove_non_working_days'] = payroll_display_model::remove_non_working_days($date_start, $date_to);
            
            $data_to_display_payroll['add_on'] = add_on_model::get_add_on_amount($date_start, $date_to);
            add_on_model::update_deduction();
            $data_to_display_payroll['get_deduction'] = add_on_model::get_deduction();
            
                            echo modules::run("templ/payroll/display_payroll_records", $data_to_display_payroll);             
                            
        }
}