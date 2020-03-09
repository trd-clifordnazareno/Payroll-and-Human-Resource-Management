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
                <th>Employee Name</th>
                <th>Date Time In</th>
                <th>Date Time Out</th>
                <th>Date</th>
                <th>Total Hours To Comply Daily</th>
                <th>Total Accomplished Hours</th>
                <th>Total Hours Of Juty</th>
                <th>Over Time Total Hours</th>
                <th>Tardiness Time Total</th>
                <th>Tardiness Amount Deduct</th>
                <th>Over Time Amount</th>
                <th>Salary Per Day</th>
                <th>Salary Per Hour</th>
                <th>Leave From</th>
                <th>Leave To</th>
                <th>Day Type</th>
                <th>Gross Pay</th>
                <th>Net Pay</th>
            </tr>
                </thead>
                <tbody>
                
                    
                    
                    
                    
                    <?php  //echo $rate;echo "<pre>"; var_dump($rate);echo "</pre>";

foreach($daily_time_rec as $data_rec){
   echo "<tr>";
    echo "<td>" . $data_rec->emp_id ."</td>";
    echo "<td>" . $data_rec->emp_name ."</td>";
    echo "<td>" . $data_rec->date_time_in ."</td>";
    echo "<td>" . $data_rec->date_time_out ."</td>";
    echo "<td>" . $data_rec->date ."</td>";
    echo "<td>" . $data_rec->total_hours_to_comply_daily ."</td>";
    echo "<td>" . $data_rec->total_accomplished_hours ."</td>";
     echo "<td>" . $data_rec->total_hours_of_juty_required ."</td>";
    echo "<td>" . $data_rec->over_time_total_hour ."</td>";
    echo "<td><font color =red>" . $data_rec->tardiness_time_total ."</font></td>";
    echo "<td>" . $data_rec->tardiness_amount_to_deduct ."</td>";
    echo "<td>" . $data_rec->over_time_amount ."</td>";
    echo "<td>" . $data_rec->salary_per_day_amount ."</td>";
    echo "<td>" . $data_rec->salary_per_hour_amount ."</td>";
    echo "<td>" . $data_rec->leave_from ."</td>";
    echo "<td>" . $data_rec->leave_to ."</td>";
    echo "<td>" . $data_rec->day_type ."</td>";
    echo "<td>" . $data_rec->total_normal_pay ."</td>";
    echo "<td>" . $data_rec->total_pay_for_over_all_hour ."</td>";
   
    
    
    
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





<!--<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <!--<table id="example" class="table table-striped table-bordered table bg-info" style="width:100%">
        <thead>
            <tr>
                <th>Employee ID</th>
                <th>Employee Name</th>
                <th>Date Time In</th>
                <th>Date Time Out</th>
                <th>Date</th>
                <th>Over Time Total Hours</th>
                <th>Total Accomplished Hours</th>
                
                <th>Total Hours To Comply Daily</th>
                <th>Tardiness Amount Deduct</th>
                <th>Tardiness Time Total</th>
                <th>Total Pay For The Day</th>
                <th>Total Hours Of Juty</th>
                <th>Over Time Amount</th>
                
                <th>Salary Per Day</th>
                <th>Salary Per Hour</th>
                <th>Leave From</th>
                <th>Leave To</th>
            </tr>
        </thead>
        <tbody>
            
            
            
            
            <?php  //echo $rate;echo "<pre>"; var_dump($rate);echo "</pre>";

/*foreach($daily_time_rec as $data_rec){
   echo "<tr>";
    echo "<td>" . $data_rec->emp_id ."</td>";
    echo "<td>" . $data_rec->emp_name ."</td>";
    echo "<td>" . $data_rec->date_time_in ."</td>";
    echo "<td>" . $data_rec->date_time_out ."</td>";
    echo "<td>" . $data_rec->date ."</td>";
    echo "<td>" . $data_rec->over_time_total_hour ."</td>";
    echo "<td>" . $data_rec->total_accomplished_hours ."</td>";
    echo "<td>" . $data_rec->total_hours_to_comply_daily ."</td>";
    echo "<td>" . $data_rec->tardiness_amount_to_deduct ."</td>";
    echo "<td>" . $data_rec->tardiness_time_total ."</td>";
    echo "<td>" . $data_rec->total_pay_for_over_all_hour ."</td>";
    echo "<td>" . $data_rec->total_hours_of_juty_required ."</td>";
    echo "<td>" . $data_rec->over_time_amount ."</td>";
    echo "<td>" . $data_rec->salary_per_day_amount ."</td>";
    echo "<td>" . $data_rec->salary_per_hour_amount ."</td>";
    echo "<td>" . $data_rec->leave_from ."</td>";
    echo "<td>" . $data_rec->leave_to ."</td>";
    
   echo "</tr>";
    
}*/


?>
        </tbody>
        
    </table>
            
          </div>-->






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
    newWin.document.write(htmlToPrint);
    newWin.print();
    newWin.close();
}
</script>