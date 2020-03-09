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
                          <table id="example" class="table table-bordered table-hover dataTable table table-striped table bg-info" role="grid" aria-describedby="example2_info">
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
    echo "<td>" . $data_rec->employee_total_over_time ."</td>";
    echo "<td>" . $data_rec->employee_total_over_time_amount ."</td>";
    echo "<td>" . $data_rec->employee_sss_amount ."</td>";
    echo "<td>" . $data_rec->employee_philh_amount ."</td>";
    echo "<td>" . $data_rec->employee_pag_i_amount ."</td>";
    //echo "<td>" . $data_rec->employee_total_salary_tally ."</td>";
    echo "<td>" . $data_rec->pay_type ."</td>";
    if($data_rec->pay_type == "monthly"){
        $absent = $data_rec->total_absent;
        if($absent == 0){
            $get_salary_per_day = $data_rec->employee_sal_per_month/26;
            $get_juty = 26/2;
            $get_total_salary = $get_salary_per_day * $get_juty;
            
            echo "<td>" . $data_rec->total_absent ."</td>";
            echo "<td>" . $get_total_salary ."</td>";
            echo "<td>" . $get_total_salary - ($data_rec->employee_sss_amount + $data_rec->employee_philh_amount + $data_rec->employee_pag_i_amount)."</td>";
        }else{
            $get_salary = (integer)(($data_rec->employee_sal_per_month/26*100))/100;
            $get_juty_time = 26 / 2;
            $get_juty_with_absent = $get_juty_time - $data_rec->total_absent;
            $get_total_salary = $get_salary * $get_juty_with_absent;
            $get_total_salary_with_deductions = $get_salary * $get_juty_with_absent - ($data_rec->employee_sss_amount + $data_rec->employee_philh_amount + $data_rec->employee_pag_i_amount);
            
            echo "<td>" . $data_rec->total_absent ."</td>";
            echo "<td>" . $get_total_salary ."</td>";
            echo "<td>" . $get_total_salary_with_deductions . "</td>";
        }
    }else{
    
        echo "<td>" . $data_rec->total_absent ."</td>";
        echo "<td>" . $data_rec->employee_gross_salary ."</td>";
        echo "<td>" . $data_rec->employee_net_salary ."</td>";
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