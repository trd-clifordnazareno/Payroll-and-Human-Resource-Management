<button type="submit" class="btn btn-primary" onclick="printDiv();" style="margin-bottom:3px; margin-top:-19px; margin-left:39px;">Print Daily Time Record</button>
<div class="box box-primary">
            <!--<div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>-->
<div class="box-body">
              <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                  <div class="row"><div class="col-sm-6"></div><div class="col-sm-6">
                      
                      </div>
                          
                  </div>
                  <div class="row">
                      <div class="col-sm-12">
                          <table id="example" class="table table-bordered table-hover dataTable table table-striped table bg-info" role="grid" aria-describedby="example2_info" cellspacing="0">
                <thead>
                    <tr>
                <th>Employee ID</th>
                <!--<th>Employee Name</th>-->
                <th>Emp Name</th>
                <th>Emp Salary Per Month</th>
                <th>Emp Salary Per Day</th>
                <th>Emp Salary Per Hour</th>
                <th>Employee Total Hours w/ OT</th>
                <th>Employee Total Hours w/o OT</th>
                <th>Employee Total Tardiness Time</th>
                <th>Employee Total Tardinness Amount</th>
                <th>Employee Total OT</th>
                <th>Employee Total OT Amount</th>
                <th>Employee SSS Amount</th>
                <th>Employee Philh Amount</th>
                <th>Employee Pag-ibig Amount</th>
                <!--<th>Employee Total Sal Tally</th>-->
                <th>Employee PayType</th>
                <th>Total No. Of Legal Holidays Days</th>
                <th>Total No. Of Special Holidays Days</th>
                <th>Adjustment</th>
                <th>Commision</th>
                <th>Deduction and Advances</th>
                <th>No of Leave Days</th>
                <th>Employee Total Absent Days</th>
                <th>Employee Salary Gross</th>
                <th>Employee Salary Net</th>
            </tr>
                </thead>
                <tbody>
                
                    
                    
                    
                    
                    <?php  //echo $rate;echo "<pre>"; var_dump($rate);echo "</pre>";

foreach($payroll_data_rec as $data_rec){
   echo "<tr>";
    echo "<td>" . $data_rec->emp_id ."</td>";
    //echo "<td>" . $data_rec->emp_name ."</td>";
    echo "<td>" . $data_rec->emp_name ."</td>";
    echo "<td>" . $data_rec->employee_sal_per_month ."</td>";
    echo "<td>" . $data_rec->employee_sal_per_day ."</td>";
    echo "<td>" . $data_rec->employee_sal_per_hour ."</td>";
    echo "<td>" . $data_rec->employee_total_hours_complied ."</td>";
    echo "<td>" . $data_rec->employee_total_hours_to_comply ."</td>";
     echo "<td>" . $data_rec->employee_total_tardiness_time ."</td>";
    echo "<td>" . $data_rec->employee_total_tardiness_amount ."</td>";
    echo "<td>" . round($data_rec->employee_total_over_time) ."</td>";
    echo "<td>" . $data_rec->employee_total_over_time_amount ."</td>";
    echo "<td>" . $data_rec->employee_sss_amount ."</td>";
    echo "<td>" . $data_rec->employee_philh_amount ."</td>";
    echo "<td>" . $data_rec->employee_pag_i_amount ."</td>";
    //echo "<td>" . $data_rec->employee_total_salary_tally ."</td>";
    echo "<td>" . $data_rec->pay_type ."</td>";
    //new
    echo "<td>" . $data_rec->legal ."</td>";
    echo "<td>" . $data_rec->special ."</td>";
    ///new
    $add_on_amount = 0;
    foreach($add_on as $add_on_data){
        $add_on_emp_id = $add_on_data->emp_id;
        if($add_on_emp_id == $data_rec->emp_id){
            $add_adjustment = $add_on_data->adjustment;
            $add_on_amount = $add_on_amount + $add_adjustment;
        }
    }
    echo "<td>" . $add_on_amount ."</td>";
    $add_on_commision_amount = 0;
    foreach($add_on as $add_on_data){
        $add_on_emp_commision_id = $add_on_data->emp_id;
        if($add_on_emp_commision_id == $data_rec->emp_id){
            $add_commision = $add_on_data->commision;
            $add_on_commision_amount = $add_on_commision_amount + $add_commision;
        }
    }
    echo "<td>" . $add_on_commision_amount ."</td>";
    $deduction_amount = 0;
    foreach($get_deduction as $get_deduction_data){
        $add_on_emp_id = $get_deduction_data->emp_id;
        if($add_on_emp_id == $data_rec->emp_id){
            $amount_deduction = $get_deduction_data->amount_to_deduct;
            $deduction_amount = $deduction_amount + $amount_deduction;
        }
    }
    echo "<td>" . $deduction_amount ."</td>";
    ///new
    $number_of_leave = 0;
    foreach($num_leave as $num_leave_data){
        $num_leave_emp_id = $num_leave_data->emp_id;
        if($num_leave_emp_id == "$data_rec->emp_id" && $num_leave_data->total_hours_of_juty_required == "sick leave" || $num_leave_data->total_hours_of_juty_required == "vacation leave"){
            $number_of_leave = $number_of_leave + 1;
        }
    }
    echo "<td>" . $number_of_leave ."</td>";
    //end new
    if($data_rec->pay_type == "monthly"){
        $absent = $data_rec->total_absent;
        if($absent == 0){
            $get_salary_per_day = $data_rec->employee_sal_per_month/26;
            $get_juty = 26/2;
            $get_total_salary = $get_salary_per_day * $get_juty;
            
            echo "<td>" . $data_rec->total_absent ."</td>";
            echo "<td>" . (((($get_total_salary + $data_rec->employee_total_over_time_amount) + (($data_rec->legal * $data_rec->employee_sal_per_day) + (($data_rec->special * $data_rec->employee_sal_per_day) * 0.30))) - $data_rec->employee_total_tardiness_amount) + ($add_on_amount + $add_on_commision_amount) - $deduction_amount) ."</td>";
            echo "<td>" . (((($get_total_salary - ($data_rec->employee_sss_amount + $data_rec->employee_philh_amount + $data_rec->employee_pag_i_amount) + $data_rec->employee_total_over_time_amount) + (($data_rec->legal * $data_rec->employee_sal_per_day) + (($data_rec->special * $data_rec->employee_sal_per_day) * 0.30))) - $data_rec->employee_total_tardiness_amount) + ($add_on_amount + $add_on_commision_amount) - $deduction_amount) ."</td>";
        }else{
            $get_salary = (integer)(($data_rec->employee_sal_per_month/26*100))/100;
            $get_juty_time = 26 / 2;
            $get_juty_with_absent = $get_juty_time - $data_rec->total_absent;
            $get_total_salary = $get_salary * $get_juty_with_absent;
            $get_total_salary_with_deductions = $get_salary * $get_juty_with_absent - ($data_rec->employee_sss_amount + $data_rec->employee_philh_amount + $data_rec->employee_pag_i_amount);
            
            echo "<td>" . $data_rec->total_absent ."</td>";
            echo "<td>" . (((($get_total_salary + $data_rec->employee_total_over_time_amount) + + (($data_rec->legal * $data_rec->employee_sal_per_day) + (($data_rec->special * $data_rec->employee_sal_per_day) * 0.30))) - $data_rec->employee_total_tardiness_amount) + ($add_on_amount + $add_on_commision_amount) - $deduction_amount) ."</td>";
            $sick_num = 0;
            $vacation_num = 0;
            foreach($get_deduct_leave as $get_deduct_leave_data){
                if($get_deduct_leave_data->emp_id == $data_rec->emp_id){
                    
                    if($get_deduct_leave_data->total_hours_of_juty_required == "sick leave"){
                        if($sick_num == 0){
                            $sick_num_plus = $get_deduct_leave_data->salary_per_day_amount;
                            $sick_num = $sick_num + $sick_num_plus;
                        }else{
                            $sick_num = $sick_num + $get_deduct_leave_data->salary_per_day_amount;
                        }
                        
                    }
                    else if($get_deduct_leave_data->total_hours_of_juty_required == "vacation leave"){
                        if($vacation_num == 0){
                            $vacation_num_plus = $get_deduct_leave_data->salary_per_day_amount;
                            $vacation_num = $vacation_num + $vacation_num_plus;
                        }else{
                            $vacation_num = $vacation_num + $get_deduct_leave_data->salary_per_day_amount;
                        }
                        
                    }
                }
            }
            echo "<td>" . ((((($get_total_salary_with_deductions + $data_rec->employee_total_over_time_amount) + (($data_rec->legal * $data_rec->employee_sal_per_day) + (($data_rec->special * $data_rec->employee_sal_per_day) * 0.30))) - $data_rec->employee_total_tardiness_amount) + ($sick_num + $vacation_num)) + ($add_on_amount + $add_on_commision_amount) - $deduction_amount) . "</td>";
        }
    }else{
        foreach($emp_list as $emp_list_data){
            $emp_code_get = $emp_list_data->emp_code;
            $end_juty = $emp_list_data->juty_day_to;
            $sal_day = $emp_list_data->daily_salary;
            if($emp_code_get == $data_rec->emp_id){
                $num_leave = 0;
                foreach($remove_non_working_days as $remove_non_working_days_data){
                  $employee_id_get_from_leave = $remove_non_working_days_data->emp_id;
                    $employee_leave_from = $remove_non_working_days_data->leave_from;
                    $employee_leave_to = $remove_non_working_days_data->leave_to;
                    if($data_rec->emp_id == $employee_id_get_from_leave){
                        if($end_juty == "Saturday"){
                            for ($x=strtotime($employee_leave_from);$x<=strtotime($employee_leave_to);$x+=86400){
                            //echo date("l", $x);
                                if(date("l", $x) == "Sunday"){
                                    $num_leave = $num_leave + $sal_day;
                                }
                            }
                        }else if($end_juty == "Friday"){
                            for ($x=strtotime($employee_leave_from);$x<=strtotime($employee_leave_to);$x+=86400){
                            //echo date("l", $x);
                                if(date("l", $x) == "Sunday" || date("l", $x) == "Saturday"){
                                    $num_leave = ($num_leave + $sal_day) - $sal_day;
                                }
                            }
                        }
                        
                    }
                    
                }//echo $num_leave . $emp_code_get . $end_juty . $sal_day;
            }
        }
    
        echo "<td>" . $data_rec->total_absent ."</td>";
        echo "<td>" . ($data_rec->employee_gross_salary + ($add_on_amount + $add_on_commision_amount) - $deduction_amount) ."</td>";
        echo "<td>" . ($data_rec->employee_net_salary + ($add_on_amount + $add_on_commision_amount) - $deduction_amount) ."</td>";
    }
   
    
    
    
   echo "</tr>";
    
}


?>
                    
                </tbody>
                <tfoot>
                
              </table>
                      </div>
                  </div>
                  
              </div>
            </div>




</div>
<?php

/*echo "ok";
echo "<pre>";
var_dump($payroll_data_rec);
echo "</pre>";*/

?>




<script>
       $(document).ready(function() {
    $('#example').DataTable();
} );
       </script>



<script>
function printDiv() {
    var divToPrint = document.getElementById('example');
    var htmlToPrint = '' +
        '<style type="text/css">' +
        'table th, table td {' +
        'border:1px solid #000;' +
        'padding;0.5em;' +
        '}' +
        '</style>';
    htmlToPrint += divToPrint.outerHTML;
    newWin = window.open("");
    newWin.document.write("<p style='margin-left:90%;'> FROM : " + document.getElementById('from').value + " <br> TO : " + document.getElementById('to').value + "</p>");
    newWin.document.write(htmlToPrint);
    newWin.print();
    newWin.close();
}
</script>