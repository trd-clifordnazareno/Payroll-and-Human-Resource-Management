<!--<button type="submit" class="btn btn-primary" onclick="printDiv();" style="margin-bottom:3px; margin-top:-19px; margin-left:39px;">Print Daily Time Record</button>-->
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
                <th>From</th>
                <th>To</th>
                <th>Adjustment</th>
                <th>Commision</th>
                
            </tr>
                </thead>
                <tbody>
                
                    
                    
                    
                    
                    <?php  //echo $rate;echo "<pre>"; var_dump($rate);echo "</pre>";


                    foreach($employee_rec as $employee_rec){
        
                    foreach($add_on_rec as $add_on_rec_data){
                        if($add_on_rec_data->emp_id == $employee_rec->emp_code){
                        echo "<tr>";
                         echo "<td>" . $add_on_rec_data->emp_id ."</td>";
                         echo "<td>" . $employee_rec->emp_name ."</td>";


                         echo "<td>" . $add_on_rec_data->from ."</td>";
                         echo "<td>" . $add_on_rec_data->tos ."</td>";
                         echo "<td>" . $add_on_rec_data->adjustment ."</td>";
                         echo "<td>" . $add_on_rec_data->commision ."</td>";
                        echo "</tr>";
                        }
                    }
    
    
    
   
    
    
    
   
    
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