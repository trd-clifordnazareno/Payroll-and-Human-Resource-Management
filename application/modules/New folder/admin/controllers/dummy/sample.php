<?php

defined('BASEPATH') OR exit('No direct script access allowed');


public function index()
	{
            $data_emp_daily_record = employee_time_record_model::get_employee_daily_time_record();
            foreach($data_emp_daily_record as $data){
                $emp_id = $data->emp_id;
                $time_in = $data->time_in_date;
                $time_out = $data->time_out_date;
                //$pecial_holiday = $data->special_holiday;
                //$legal_holiday = $data->legal_holiday;
                
                $get_holiday_type = $data->holiday_type;
                $get_daily_salary = "";
                $get_salary_per_month = "";
                $get_pay_per_hour = "";
                $date_time_record = $data->date_time_record;
                
                
                ///return variable
                $over_time_total_hours = "";
                $under_time_total_hours = "";
                $total_accomplished_hours_of_juty = "";
                //for holiday daily 30%
                $get_daily_salary_plus_special_percent = "";
                //for holiday daily * 2
                $get_daily_salary_plus_holiday_percent = "";
                //for holiday per hour 30%
                $get_hourly_salary_plus_special_percent = "";
                //for holiday per hour * 2
                $get_hourly_salary_plus_holiday_percent = "";
                //for non holiday with over time
                $get_total_pay_in_over_time = "";
                //regular over time or overtime premium
                $regular_over_time = "";
                //leave from
                $leave_from = "";
                //leave to
                $leave_to = "";
                //absent_date
                $absent_date = "";
                //employee schedule
                $emp_sched = "";
                //status for conflict
                $status_type = "";
                //total time of late in conflict
                $total_get_late_in_conflict = "";
                //get hours of juty with out deduction in conflict
                $get_hours_of_juty_without_deduction = "";
                //get late hours with leave
                $get_late_with_leave = "";
                
                $check_emp_code = employee_model::getSearch(array('employee.emp_code ='=>$emp_id),"",array("employee.emp_id"=>"ASC"),true);;
                if($check_emp_code){
                    foreach($check_emp_code as $check_emp_code_data){
                        
                    
                    $get_emp_id = $emp_id;
                    $get_time_in = $time_in;
                    $get_time_out = $time_out;
                    //$get_special_holiday = $special_holiday;
                    //$get_legal_holiday = $legal_holiday;
                    //new
                    $get_pay_type = $check_emp_code_data->pay_type;
                    $get_salary_per_month = $check_emp_code_data->salary;
                    $get_pay_per_hour = $check_emp_code_data->pay_per_hour;
                            //new
                    
                    ///get overtime extra hours
                    $diff = $get_time_out - $get_time_out;
                    if($diff > 8){
                        $over_time = $diff - 8;
                        $over_time_total_hours = $over_time;
                    }
                    ///get under time total hours
                    if($diff < 8){
                        $over_time = $diff - 8;
                        $under_time_total_hours = $over_time;
                    }
                    ///total accomplished hours
                    $total_accomplished_hours = $diff;
                    $total_accomplished_hours_of_juty = $total_accomplished_hours;
                    $total_hours_to_comply_daily = 8;
                    echo $date_time_record;exit;
                    if($get_holiday_type == "special"){
                        if($get_pay_type == "daily"){
                            $compute_percent_daily_salary = $get_daily_salary * "0.30";
                            $get_daily_salary_plus_special_percent = $get_daily_salary + $compute_percent_daily_salary;
                            
                        }else if($get_pay_type == "monthly"){
                            $compute_percent_daily_salary = $get_daily_salary * "0.30";
                            $get_daily_salary_plus_special_percent = $get_daily_salary + $compute_percent_daily_salary;
                        }
                    }else if($get_pay_type == "legal"){
                        if($get_pay_type == "daily"){
                            $compute_percent_daily_salary = $get_daily_salary * 2;
                            $get_daily_salary_plus_holiday_percent = $get_daily_salary + $compute_percent_daily_salary;
                            
                        }else if($get_pay_type == "monthly"){
                            $compute_percent_daily_salary = $get_daily_salary * 2;
                            $get_daily_salary_plus_holiday_percent = $get_daily_salary + $compute_percent_daily_salary;
                        }
                    }
                    
                    
                    
                    if($over_time_total_hours > 0){
                       if($get_holiday_type == "special"){
                        if($get_pay_type == "daily"){
                            $compute_percent_hourly_salary = $get_pay_per_hour * "0.30";
                            $get_hourly_salary_plus_special_percent = ($get_pay_per_hour + $compute_percent_hourly_salary) * $over_time_total_hours;
                            
                        }else if($get_pay_type == "monthly"){
                            $compute_percent_hourly_salary = $get_pay_per_hour * "0.30";
                            $get_hourly_salary_plus_special_percent = ($get_pay_per_hour + $compute_percent_hourly_salary) * $over_time_total_hours;
                        }
                        }else if($get_pay_type == "legal"){
                            if($get_pay_type == "daily"){
                                $compute_percent_hourly_salary = $get_pay_per_hour * 2;
                                $get_hourly_salary_plus_holiday_percent = ($get_pay_per_hour + $compute_percent_hourly_salary) * $over_time_total_hours;

                            }else if($get_pay_type == "monthly"){
                                $compute_percent_hourly_salary = $get_pay_per_hour * 2;
                                $get_hourly_salary_plus_holiday_percent = ($get_pay_per_hour + $compute_percent_hourly_salary) * $over_time_total_hours;
                            }
                        }else if($get_pay_type == ""){
                            $get_total_pay_in_over_time = (($get_pay_per_hour * "0.25") + $get_pay_per_hour) * $over_time_total_hours;
                            $regular_over_time = $get_total_pay_in_over_time;
                        } 
                    }
                    
                    
                    
                    $data_leave = leave_model::get_employee_approved_leave($emp_id);
                    if($data_leave){
                        foreach($data_leave as $data_leave){
                            $leave_from = $data_leave->leave_from;
                            $leave_to = $data_leave->leave_to;
                            $vacation_type = $data_leave->vacation_type;
                            if($vacation_type == "vacation_leave"){
                                $leave_to = $data_leave->leave_to;
                                $vacation_type = $data_leave->vacation_type;
                            }else if($vacation_type == "sickness_leave"){
                                $leave_to = $data_leave->leave_to;
                                $vacation_type = $data_leave->vacation_type;
                            }else if($vacation_type == "absent"){
                                $leave_to = $data_leave->leave_to;
                                $vacation_type = $data_leave->vacation_type;
                                $absent_date = $data_leave->leave_file_date;
                            }
                        }
                        
                    }
                    
                    $emp_sched_data = employee_model::getSearch(array('employee.emp_id ='=>$emp_id),"",array("employee.emp_id"=>"ASC"),true);
                    foreach($emp_sched_data as $data_emp_sched){
                        $data_sched = $data_emp_sched->schedule_type;
                        $emp_sched = $data_sched;
                    }
                    
                    
                    
                    
                    
                    $get_time_suspend = time_suspend_model::get_time_suspend($emp_id);
                    if($get_time_suspend){
                        foreach($get_time_suspend as $data_time_suspend){
                            $status_time_suspend = $data_time_suspend->status;
                            $status_type = $status_time_suspend;
                            
                            if($status_time_suspend == ""){
                                $emp_time_sched = $emp_sched;
                                $emp_time_in = $time_in;
                                $get_total_time_of_late = "";
                                
                                
                                $total_compute      = strtotime($emp_time_in) - strtotime($emp_time_sched);
                                $hours_of_late      = floor($total_compute / 60 / 60);
                                $minutes_of_late    = round(($total_compute - ($hours * 60 * 60)) / 60);

                                $total_time_of_late = floatval($hours_of_late.'.'.$minutes_of_late);
                                $get_total_time_of_late = $total_time_of_late;
                                
                                $total_get_late_in_conflict = $get_total_time_of_late;

                                if($emp_time_in >= "12:00:00" || $emp_time_in <= "12:59:00"){
                                    //get late mins
                                    $from       = '12:00:00';
                                    $to         = $emp_time_in;
                                    
                                    $total      = strtotime($to) - strtotime($from);
                                    $hours      = floor($total / 60 / 60);
                                    $minutes    = round(($total - ($hours * 60 * 60)) / 60);
                                    //get late mins
                                    $get_total_mins_eccess = $hours.'.'.$minutes;
                                    $get_total_time_of_late = $get_total_time_of_late - $get_total_mins_eccess;
                                    $total_get_late_in_conflict = $get_total_time_of_late;
                                }else if($emp_time_in >= "13:00:00"){
                                    $excess_time = 1;
                                    $get_total_time_of_late = $get_total_time_of_late - $excess_time;
                                    $total_get_late_in_conflict = $get_total_time_of_late;
                                }
                            }else if($status_time_suspend == "late"){
                                $emp_time_in = $time_in;
                                $emp_time_out = $time_out;
                                $get_juty_hours = "";
                                
                                $from       = $emp_time_in;
                                $to         = $emp_time_out;

                                $total      = strtotime($to) - strtotime($from);
                                $hours      = floor($total / 60 / 60);
                                $minutes    = round(($total - ($hours * 60 * 60)) / 60);

                                $get_hours_of_juty_in_conflict_withut_deduction = floatval($hours.'.'.$minutes);
                                $get_hours_of_juty_without_deduction = $get_hours_of_juty_in_conflict_withut_deduction;
                                
                            }else if($status_time_suspend == "leave"){
                                $emp_time_in = $time_in;
                                $emp_time_out = $time_out;
                                $get_juty_hours = "";
                                $get_late_hours = "";
                                
                                ///get time of juty
                                $from       = $emp_time_in;
                                $to         = $emp_time_out;

                                $total      = strtotime($to) - strtotime($from);
                                $hours      = floor($total / 60 / 60);
                                $minutes    = round(($total - ($hours * 60 * 60)) / 60);

                                $get_juty_hours = floatval($hours.'.'.$minutes);
                                ///get time of juty
                                
                                //get time of late
                                $emp_time_sched       = $emp_sched;
                                $time_in_late         = $emp_time_in;

                                $total_late      = strtotime($time_in_late) - strtotime($emp_time_sched);
                                $hours_late      = floor($total_late / 60 / 60);
                                $minutes_late    = round(($total_late - ($hours_late * 60 * 60)) / 60);

                                $get_late_juty_hours = floatval($hours_late.'.'.$minutes_late);
                                //get time of late
                                
                                //add juty hours
                                $add_all_hours_for_juty_and_late = $get_juty_hours + $get_late_juty_hours;
                                        //add juty hours
                                if($add_all_hours_for_juty_and_late > 8){
                                    $add_all_hours_for_juty_and_late = $add_all_hours_for_juty_and_late -1;
                                    $get_late_with_leave = $add_all_hours_for_juty_and_late;
                                }
                            }
                        }
                    }
                    
                    
                    
                    
                    $data_details['emp_id'] = $emp_id;
                    $data_details['date_time_in'] = $time_in;
                    $data_details['date_time_out'] = $time_out;
                    $data_details['special_holiday'] = $pecial_holiday;
                    $data_details['date'] = $date_time_record;
                    
                    $data_details['legal_holiday'] = $legal_holiday;

                    $data_details['get_holiday_type'] = $get_holiday_type;
                    $data_details['get_daily_salary'] = $get_daily_salary;
                    $data_details['get_salary_per_month'] = $get_salary_per_month;
                    $data_details['get_pay_per_hour'] = $get_pay_per_hour;


                    ///return variable
                    $data_details['over_time_total_hours'] = $over_time_total_hours;
                    $data_details['under_time_total_hours'] = $under_time_total_hours;
                    $data_details['total_accomplished_hours_of_juty'] = $total_accomplished_hours_of_juty;
                    //for holiday daily 30%
                    $data_details['get_daily_salary_plus_special_percent'] = $get_daily_salary_plus_special_percent;
                    //for holiday daily * 2
                    $data_details['get_daily_salary_plus_holiday_percent'] = $get_daily_salary_plus_holiday_percent;
                    //for holiday per hour 30%
                    $data_details['get_hourly_salary_plus_special_percent'] = $get_hourly_salary_plus_special_percent;
                    //for holiday per hour * 2
                    $data_details['get_hourly_salary_plus_holiday_percent'] = $get_hourly_salary_plus_holiday_percent;
                    //for non holiday with over time
                    $data_details['get_total_pay_in_over_time'] = $get_total_pay_in_over_time;
                    //regular over time or overtime premium
                    $data_details['regular_over_time'] = $regular_over_time;
                    //leave from
                    $data_details['leave_from'] = $leave_from;
                    //leave to
                    $data_details['leave_to'] = $leave_to;
                    //absent_date
                    $data_details['absent_date'] = $absent_date;
                    //employee schedule
                    $data_details['emp_sched'] = $emp_sched;
                    //status for conflict
                    $data_details['status_type'] = $status_type;
                    //total time of late in conflict
                    $data_details['total_get_late_in_conflict'] = $total_get_late_in_conflict;
                    //get hours of juty with out deduction in conflict
                    $data_details['get_hours_of_juty_without_deduction'] = $get_hours_of_juty_without_deduction;
                    //get late hours with leave
                    $data_details['get_late_with_leave'] = $get_late_with_leave;
                    ///
                    //echo Modules::run("templ/payroll/display_daily_time_record", $data_details);
                    
                    //computational_time_model::insert_table($data_details);
                    
                    
                    echo "<pre>";
                    var_dump($data_details);
                    echo "</pre>";
                    
                    /*echo "<table>";

        echo "<tr>";
        echo "<td>";
        echo $data_details;
        echo "</td>";
        echo "<td>";
        echo $time_in;
        echo "</td>";
        echo "<td>";
        echo $time_out;
        echo "</td>";
        
        echo "<td>";
        echo $special_holiday ;
        echo "</td>";
        echo "<td>";
        echo $date_time_record;
        echo "</td>";
        echo "<td>";
        echo $legal_holiday;
        echo "</td>";
        echo "<td>";
        echo $get_holiday_type;
        echo "</td>";
        echo "<td>";
        echo $get_daily_salary;
        echo "</td>";
        echo "<td>";
        echo $get_salary_per_month;
        echo "</td>";
        echo "<td>";
        echo $get_pay_per_hour;
        echo "</td>";
        echo "<td>";
        echo $over_time_total_hours;
        echo "</td>";
        echo "<td>";
        echo $under_time_total_hours;
        echo "</td>";
        echo "<td>";
        echo $total_accomplished_hours_of_juty;
        echo "</td>";
        echo "<td>";
        echo $get_daily_salary_plus_special_percent;
        echo "</td>";
        echo "<td>";
        echo $get_daily_salary_plus_holiday_percent;
        echo "</td>";
        echo "<td>";
        echo $get_hourly_salary_plus_special_percent;
        echo "</td>";
        echo "<td>";
        echo $get_hourly_salary_plus_holiday_percent;
        echo "</td>";
        echo "<td>";
        echo $get_total_pay_in_over_time;
        echo "</td>";
        echo "<td>";
        echo $regular_over_time;
        echo "</td>";
        echo "<td>";
        echo $leave_from;
        echo "</td>";
        echo "<td>";
        echo $leave_to;
        echo "</td>";
        
        echo "<td>";
        echo $absent_date;
        echo "</td>";
        echo "<td>";
        echo $emp_sched;
        echo "</td>";
        echo "<td>";
        echo $status_type;
        echo "</td>";
        echo "<td>";
        echo $total_get_late_in_conflict;
        echo "</td>";
        
        
        
        echo "<td>";
        echo $get_hours_of_juty_without_deduction;
        echo "</td>";
        echo "<td>";
        echo $get_late_with_leave;
        echo "</td>";
        echo "</tr>";

                    echo "</table>";*/}
                }
            }
	}