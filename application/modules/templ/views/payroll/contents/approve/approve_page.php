<?php $this->load->view("templ/payroll/template/header1");    ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <!--Dashboard-->
        <small><!--Control panel--></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo $location;   ?></a></li>
        <li class="active"><?php echo $child1;   ?></li>
      </ol>
    </section>
    <section class="content-header">
        <h1 style="margin-top: -30px;">
        Approval
        
      </h1>
        
      
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        
        <div id="view_employee">
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
                <th>Leave From</th>
                <th>Leave To</th>
                <th>Leave File Date</th>
                <th>Type Of Leave</th>
                <th>Reason</th>
                <th>Approve</th>
                <th>Action</th>        
                
            </tr>
                </thead>
                <tbody>
                
                    
                    
                    
                    
                    <?php  //echo $rate;echo "<pre>"; var_dump($rate);echo "</pre>";

foreach($emp_approval_leave as $emp_approval_leave_data){
   echo "<tr id='emp_leave_approval'>";
    echo "<td>" . $emp_approval_leave_data->emp_id ."</td>";
    echo "<td>" . $emp_approval_leave_data->leave_from ."</td>";
    echo "<td>" . $emp_approval_leave_data->leave_to ."</td>";
    echo "<td>" . $emp_approval_leave_data->leave_file_date	 ."</td>";
    echo "<td>" . $emp_approval_leave_data->type_of_leave ."</td>";
    echo "<td>" . $emp_approval_leave_data->reason ."</td>";
    echo "<td>" . $emp_approval_leave_data->approved ."</td>";
     
    echo "<td><table><tr><td> <a href='http://192.168.88.117:82/payroll/index.php/admin/approval/approved_employee_leave/$emp_approval_leave_data->emp_id/$emp_approval_leave_data->leave_file_date/$emp_approval_leave_data->type_of_leave/$emp_approval_leave_data->leave_from/$emp_approval_leave_data->leave_to/$emp_approval_leave_data->half_day'><button type='button' class='btn btn-block btn-danger' style='margin-left:3px;'>Approve</button></a></td>" . "<td>&nbsp&nbsp&nbsp<!--<a href='#edit$employee_data_rec_data->emp_code' data-toggle='modal'><button type='button' class='btn btn-warning btn-sm'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button></a>--></td>" ."</tr></table></td>";/*<td>" . "<button type='button' class='btn btn-success' data-toggle='modal' data-target='#modal-default$employee_data_rec_data->emp_code'>
                Edit
              </button></td>*/
   //echo "<td>" . "<button type='button' class='btn btn-block btn-danger'>Delete</button>" ."</td>";
    
    ?>
        
        <!----------------------------------------------------------------------------------------->
                    
                    
                    <!-- for modal -->
                    
                    
                    
                    <!--------------------------------------------------------------------------------------->
        
        
        
            <?php
    
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
            
            //echo "<pre>";
            //var_dump($employee_data_rec);
            //echo "</pre>";
            
            ?>
        </div>
        
      <!-- /.box -->

      <div class="row">
        <div class="col-md-6">

          
          <!-- /.box -->

          
          
          <!-- /.box -->

        </div>
        <!-- /.col (left) -->
        <div class="col-md-6">
          
          <!-- /.box -->

          <!-- iCheck -->
          
          <!-- /.box -->
        </div>
        <!-- /.col (right) -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php $this->load->view("templ/payroll/template/footer1");    ?>

  
  
  
  <script>
       $(document).ready(function() {
    $('#example').DataTable();
} );
       </script>
       
       
       
       
       <script>
                                $(document).ready(function(){
                                    $("#submit").click(function(){
                                        var datas = {
                                            emp_code : $("#emp_code").val(), 
                                            emp_name : $("#emp_name").val(),
                                            dept : $("#dept").val(), 
                                            position : $("#position").val(),
                                            monthly_or_daily_salary : $("#monthly_or_daily_salary").val(), 
                                            sss_brk : $("#sss_brk").val(),
                                            phil_h_brk : $("#phil_h_brk").val(),
                                            pag_i_brk : $("#pag_i_brk").val(), 
                                            pay_type : $("#pay_type").val(),
                                            sched_in : $("#sched_in").val(),
                                            sched_out : $("#sched_out").val(), 
                                            user_type : $("#user_type").val(),
                                            emp_date_hired : $("#emp_date_hired").val(),
                                            
                                            ajax : '1'
                                        };
                                        $.ajax({
                                            url : "<?php echo site_url();   ?>/admin/employee/ajax_method/create_employee",
                                            type : "post",
                                            data : datas,
                                            success : function(msg){
                                                $("#child").html(msg);
                                                //alert("<?php echo $loc_codesgmt;   ?>");
                                            }
                                        });
                                    });
                                });
                                </script>
                                
                                
                                
                                
                                <script>
$(document).ready(function(){
    $("#create_employee").hide();
    $("#view_employee").show();
    
    $("#create_employee_btn").click(function(){
        $("#view_employee").hide();
        $("#create_employee").show();
    });
    $("#view_empoyee_btn").click(function(){
        $("#create_employee").hide();
        $("#view_employee").show();
    });
});
</script>
  




<script>
                                $(document).ready(function(){
                                    $("#updt_employee").click(function(){
                                        var datas = {
                                            emp_code : $("#emp_code_updt").val(), 
                                            emp_name : $("#emp_name_updt").val(),
                                            dept : $("#dept_updt").val(), 
                                            position : $("#position_updt").val(),
                                            monthly_or_daily_salary : $("#mothly_salary_updt").val(), 
                                            sss_brk : $("#sss_bracket_updt").val(),
                                            phil_h_brk : $("#philhealth_bracket_updt").val(),
                                            pag_i_brk : $("#pag_ibig_bracket_updt").val(), 
                                            pay_type : $("#pay_type_updt").val(),
                                            sched_in : $("#sched_in_updt").val(),
                                            sched_out : $("#sched_out_updt").val(), 
                                            daily_salary : $("#daily_salary_updt").val(),
                                            monthly_salary_given : $("#monthly_salary_given_updt").val(),
                                            user_type : $("#user_type_updt").val(),
                                            
                                            ajax : '1'
                                        };
                                        $.ajax({
                                            url : "<?php echo site_url();   ?>/admin/employee/ajax_method/update_employee",
                                            type : "post",
                                            data : datas,
                                            success : function(msg){
                                                $("#modal_update_success").html(msg);
                                                //alert("<?php echo $loc_codesgmt;   ?>");
                                            }
                                        });
                                    });
                                });
                                </script>