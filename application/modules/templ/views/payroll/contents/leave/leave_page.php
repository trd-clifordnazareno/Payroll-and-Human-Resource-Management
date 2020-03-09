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
        Employee Leaves
        
      </h1>
        <div>
            <button type="button" class="btn bg-navy margin" id="add_leave_btn">Add Leave</button>
            <button type="button" class="btn bg-navy margin" id="view_empoyee_leave_btn">Display Employees Leaves</button>
            <?php if($user == "admin"):  ?>
            
            <button type="button" class="btn bg-navy margin" id="allocate_empoyee_leave_btn">Allocate Employees Leaves</button>
            <?php endif;    ?>
        </div>
      
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div id="create_employee_leave">
            <div id="child"></div>
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Create Employee</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
                
                
                
                <div class="form-group">
                <label>Employee Name</label>
                <select class="form-control select2" style="width: 100%;" id="emp_name">
                            <?php
                    
                    if($user == "user"){
                        //echo $data_user->user;
                        echo "<option value='$user_solo'>$emp_name</option>";
                    }
                    else{
                        foreach($data_emp as $data_emp_data){
                            echo "<option value='$data_emp_data->emp_code'>$data_emp_data->emp_name</option>";
                        }
                        
                                /*<option value="01">JERECHO ROSALES</option>
                                <option value="02">mythor</option>
                                <option value="03">kunan</option>*/
                    
                    }
                    ?>
                                
                            
                </select>
              </div>
                
                <div class="form-group">
                  <label for="emp_name">Start Leave</label>
                  <input type="date" class="form-control" id="start_leave">
                </div>
                
                <div class="form-group">
                  <label for="emp_name">No. of Days</label>
                  <input type="text" class="form-control" id="end_leave">
                </div>
                
                
                <div class="form-group">
                <label>Leave Type</label>
                <select class="form-control select2" style="width: 100%;" id="leave_type">
                            
                                <option value="sick leave">Sick Leave</option>
                                <option value="vacation leave">Vacation Leave</option>
                            
                </select>
              </div>
			  
			  
			  
			  
			  <div class="form-group">
                <label>Half Day</label>
                <select class="form-control select2" style="width: 100%;" id="half_day">
                            
                                <option value="0"></option>
                                <option value="1">Half Day</option>
                            
                </select>
              </div>
                
                <div class="form-group">
                  <label for="emp_name">Reason</label>
                  <input type="text" class="form-control" id="leave_reason">
                </div>
                
                <div class="form-group">
                  <label for="emp_name">Sick Leave Remain</label>
                  <input type="text" class="form-control" id="sick_leave_bal" value="<?php  if($user == "user")echo $sick_leave_available;   ?>">
                </div>
                
                <div class="form-group">
                  <label for="emp_name">Vacation Leave Remain</label>
                  <input type="text" class="form-control" id="vacation_leave_bal" value="<?php if($user == "user")echo $vacation_leave;    ?>">
                </div>
                
               
                
              
                
                
              
              <!-- /.form-group -->
              
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              
            </div>
            <!-- /.col -->
          </div>
            <button type="submit" class="btn btn-primary" id="submit">Submit</button>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        
      </div>
        </div>
        <?php if($user == "admin"):    ?>
        <div id="view_employee_leave">
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
                <th>Employee Name</th>
                <th>Leave From</th>
                <th>Leave To</th>
                <th>Leave File Date</th>
                <th>Reason</th>
                <th>Type Of Leave</th>
                <th>Approved</th>
                <th>Action</th>
            </tr>
                </thead>
                <tbody>
                
                    
                    
                    
                    
                    <?php  //echo $rate;echo "<pre>"; var_dump($rate);echo "</pre>";

foreach($data_emp_leave as $data_emp_leave_data){
    foreach($data_emp as $data_emp_data){
        $emp_id_leave =  $data_emp_leave_data->emp_id;
        $emp_id = $data_emp_data->emp_code;
        if($emp_id_leave == $emp_id){
           echo "<tr id='xxx'>";
            echo "<td>" . $data_emp_leave_data->emp_id ."</td>";
            echo "<td>" . $data_emp_data->emp_name ."</td>";
            //echo "<td>" . $employee_data_rec_data->emp_name ."</td>";
            echo "<td>" . $data_emp_leave_data->leave_from ."</td>";
            echo "<td>" . $data_emp_leave_data->leave_to ."</td>";
            echo "<td>" . $data_emp_leave_data->leave_file_date ."</td>";
            echo "<td>" . $data_emp_leave_data->reason ."</td>";
            echo "<td>" . $data_emp_leave_data->type_of_leave ."</td>";
             echo "<td>" . $data_emp_leave_data->approved ."</td>";

            echo "<td><table><tr><td> <a href='http://192.168.88.117:82/payroll/index.php/admin/leaves/del_emp_leave/$data_emp_leave_data->emp_id/$data_emp_leave_data->leave_file_date'><button type='button' class='btn btn-block btn-danger' style='margin-left:3px;'>Delete</button></a></td>" . "<td>&nbsp&nbsp&nbsp<a href='http://192.168.88.152/payroll/index.php/admin/leaves/get_leave/$data_emp_leave_data->emp_id/$data_emp_data->emp_name/$data_emp_leave_data->leave_from/$data_emp_leave_data->leave_to/$data_emp_leave_data->leave_file_date/$data_emp_leave_data->reason/$data_emp_leave_data->type_of_leave' id='print'><button type='button' class='btn btn-warning btn-sm'> &nbsp Print &nbsp </button></a></td>" ."</tr></table></td>";
   //echo "<td>" . "<button type='button' class='btn btn-block btn-danger'>Delete</button>" ."</td>";
        }
    }
    
    ?>
        <!--for modal-->
        
        
        
        
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
        <?php endif;    ?>
        
        
        
        
        
        
        
        
        
        
        
        <!-- new -->
        <?php if($user == "user"):    ?>
        <div id="view_employee_leave">
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
                <th>Employee Name</th>
                <th>Leave From</th>
                <th>Leave To</th>
                <th>Leave File Date</th>
                <th>Reason</th>
                <th>Type Of Leave</th>
                <th>Approved</th>
                <th>Action</th>
            </tr>
                </thead>
                <tbody>
                
                    
                    
                    
                    
                    <?php  //echo $rate;echo "<pre>"; var_dump($rate);echo "</pre>";

foreach($data_emp_leave as $data_emp_leave_data){
    foreach($data_emp as $data_emp_data){
        $emp_id_leave =  $data_emp_leave_data->emp_id;
        $emp_id = $data_emp_data->emp_code;
        if($emp_id_leave == $emp_id){
            if($user_solo == $emp_id_leave){
                echo "<tr id='xxx'>";
            echo "<td>" . $data_emp_leave_data->emp_id ."</td>";
            echo "<td>" . $data_emp_data->emp_name ."</td>";
            //echo "<td>" . $employee_data_rec_data->emp_name ."</td>";
            echo "<td>" . $data_emp_leave_data->leave_from ."</td>";
            echo "<td>" . $data_emp_leave_data->leave_to ."</td>";
            echo "<td>" . $data_emp_leave_data->leave_file_date ."</td>";
            echo "<td>" . $data_emp_leave_data->reason ."</td>";
            echo "<td>" . $data_emp_leave_data->type_of_leave ."</td>";
             echo "<td>" . $data_emp_leave_data->approved ."</td>";

            echo "<td><table><tr><td> <a href='http://192.168.88.117:82/payroll/index.php/admin/leaves/del_emp_leave/$data_emp_leave_data->emp_id/$data_emp_leave_data->leave_file_date'><!--<button type='button' class='btn btn-block btn-danger' style='margin-left:3px;'>Delete</button>--></a></td>" . "<td>&nbsp&nbsp&nbsp<a href='http://192.168.88.152/payroll/index.php/admin/leaves/get_leave/$data_emp_leave_data->emp_id/$data_emp_data->emp_name/$data_emp_leave_data->leave_from/$data_emp_leave_data->leave_to/$data_emp_leave_data->leave_file_date/$data_emp_leave_data->reason/$data_emp_leave_data->type_of_leave' id='print'><button type='button' class='btn btn-warning btn-sm'> &nbsp Print &nbsp </button></a></td>" ."</tr></table></td>";
   //echo "<td>" . "<button type='button' class='btn btn-block btn-danger'>Delete</button>" ."</td>";
            }
           
        }
    }
    
    ?>
        <!--for modal-->
        
        
        
        
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
        <?php endif;    ?>
        <!-- end new -->
        
        
        
        
        
        
        
        <!--for allocate leave-->
        <div id="view_employee_allocate_leave">
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
                
                <th>Employee Name</th>
                <th>Position</th>
                <th>Date Hired</th>
                <th>Sick Leave Balance</th>
                <th>Vacation Leave Balance</th>
                
                <th>Action</th>
            </tr>
                </thead>
                <tbody>
                
                    
                    
                    
                    
                    <?php  //echo $rate;echo "<pre>"; var_dump($rate);echo "</pre>";

foreach($data_emp as $data_emp_data){
    
        
        
           echo "<tr id='xxx'>";
            echo "<td>" . $data_emp_data->emp_name ."</td>";
            echo "<td>" . $data_emp_data->position ."</td>";
            echo "<td>" . $data_emp_data->emp_date_hired ."</td>";
            echo "<td>" . $data_emp_data->emp_sick_leave_available ."</td>";
            echo "<td>" . $data_emp_data->emp_leave_available ."</td>";
            

            echo "<td><table><tr><td> </td>" . "<td><a href='#edit$data_emp_data->emp_code' data-toggle='modal'><button type='button' class='btn btn-block btn-success' style='margin-left:3px;'>Allocate</button></a></td>" ."</tr></table></td>";
   //echo "<td>" . "<button type='button' class='btn btn-block btn-danger'>Delete</button>" ."</td>";
    
    
    
    
        
   
    
    ?>
        <!--for modal-->
        
                    <!----------------------------------------------------------------------------------------->
                    <div id="edit<?php echo $data_emp_data->emp_code; ?>" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-lg">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <form method="post" class="form-horizontal" role="form">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Edit Allocation Leave</h4>
                                        </div>
                                        <div class="modal-body">
                                           <?php
                  
                  
                  
                    
                    echo "<b>Employee Name</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text' class='form-control' id='emp_id_leave' value='$data_emp_data->emp_code' style='width:50%;' name='emp_id_leave' required readonly hidden='true'></br></br>";
    
                    echo "<b>Employee Name</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text' class='form-control' id='emp_name_leave' value='$data_emp_data->emp_name' style='width:50%;' name='emp_name_leave' required disabled></br></br>";
    
                    echo "<b>Sick Leave Balance</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text' class='form-control' id='sick_leave' value='$data_emp_data->emp_sick_leave_available' style='width:50%;' name='sick_leave' required></br></br>";
                    echo "<b>Vacation Leave Balance</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text' class='form-control' id='vacation_leave' value='$data_emp_data->emp_leave_available' style='width:50%;' name='vacation_leave' required></br></br>";
                    
                    
                    
                    
                    
                    
                  
                  ?> 
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="update_item"><span class="glyphicon glyphicon-edit"></span> Edit</button>
                                            <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    
                    
                    
                    
                    <?php
                            if(isset($_POST['update_item'])){
                                $emp_id = $_POST['emp_id_leave'];
                                $sick_leave_available = $_POST['sick_leave'];
                                $vacation_leave_available = $_POST['vacation_leave'];
                                

                                header("location:http://192.168.88.117:82/payroll/index.php/admin/leaves/update_emp_leave/$emp_id/$sick_leave_available/$vacation_leave_available");
                            }
    
    
    
                    ?>
                    <!--------------------------------------------------------------------------------------->
        
        <!--end modal -->
        
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
        <!--end for allocate leave-->
        
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
                                            emp_code : $("#emp_name").val(), 
                                            
                                            start_leave : $("#start_leave").val(), 
                                            end_leave : $("#end_leave").val(),
                                            leave_type : $("#leave_type").val(), 
                                            leave_reason : $("#leave_reason").val(),
                                            sick_leave_bal : $("#sick_leave_bal").val(),
                                            vacation_leave_bal : $("#vacation_leave_bal").val(),

											half_day : $("#half_day").val(),
                                            
                                            
                                            ajax : '1'
                                        };
                                        $.ajax({
                                            url : "<?php echo site_url();   ?>/admin/leaves/ajax_method/create_employee_leaves",
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
    $("#create_employee_leave").hide();
    $("#view_employee_allocate_leave").hide();
    $("#view_employee_leave").show();
    
    
    $("#add_leave_btn").click(function(){
        $("#view_employee_leave").hide();
        $("#view_employee_allocate_leave").hide();
        $("#create_employee_leave").show();
    });
    $("#view_empoyee_leave_btn").click(function(){
        $("#create_employee_leave").hide();
        $("#view_employee_allocate_leave").hide();
        $("#view_employee_leave").show();
    });
    $("#allocate_empoyee_leave_btn").click(function(){
        $("#create_employee_leave").hide();
        $("#view_employee_leave").hide();
        $("#view_employee_allocate_leave").show();
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




<script>
    $(document).ready(function(){
        $(function(){

             $("#emp_name").change(function(){
                 var status = this.value;
                    //alert(status);
                 
                 
                 
                     var datas = {
                                                emp_code : $("#emp_name").val(),

                                                ajax : '1'
                                            };
                     $.ajax({
                                                url : "<?php echo site_url();   ?>/admin/leaves/ajax_method/vacation_leave",
                                                type : "post",
                                                data : datas,
                                                success : function(msg){
                                                    //$("#modal_update_success").html(msg);
                                                    //alert(status);
                                                    $("#vacation_leave_bal").val(msg);
                                                }
                                            });
                    $.ajax({
                                                url : "<?php echo site_url();   ?>/admin/leaves/ajax_method/sick_leave",
                                                type : "post",
                                                data : datas,
                                                success : function(msg){
                                                    //$("#modal_update_success").html(msg);
                                                    //alert(status);
                                                    $("#sick_leave_bal").val(msg);
                                                }
                                            });
                       //if(status=="1")
                         //$("#icon_class, #background_class").hide();// hide multiple sections
              });

        });
    });
</script>


<?php        ?>

<script>
/*function nWin() {
  var htmlTable = "<tr><td>Foo</td></tr>";

var winPrint = window.open();
//winPrint.document.write('<title>Print  Report</title><br /><br /> Hellow World');
winPrint.document.write('<table border=1 align=center>');
//winPrint.document.write('<tr>');
    winPrint.document.write('<thead>');
    winPrint.document.write('<tr>');
    winPrint.document.write('<th>Employee ID</th><th>Employee Name</th><th>Leave From</th><th>Leave To</th><th>Leave File Date</th><th>Reason</th><th>Type Of Leave</th><th>Approved</th>');
    winPrint.document.write('</tr>');
    winPrint.document.write('<thead>');
    
    
    
    
    <?php
    
    foreach($data_emp_leave as $data_emp_leave_data):?>
    <?php foreach($data_emp as $data_emp_data): ?>
    //winPrint.document.write('<?php  echo "<tr>";   ?>');
    //winPrint.document.write('<?php  echo "<td>" . "ok" . "</td>";   ?>');
    
            winPrint.document.write('<?php echo "<td align=center>" . $data_emp_leave_data->emp_id ."</td>"; ?>');
            winPrint.document.write('<?php echo "<td align=center>" . $data_emp_data->emp_name ."</td>"; ?>');
            winPrint.document.write('<?php echo "<td align=center>" . $data_emp_leave_data->leave_from ."</td>"; ?>');
            winPrint.document.write('<?php echo "<td align=center>" . $data_emp_leave_data->leave_to ."</td>"; ?>');
            winPrint.document.write('<?php echo "<td align=center>" . $data_emp_leave_data->leave_file_date ."</td>"; ?>');
            winPrint.document.write('<?php echo "<td align=center>" . $data_emp_leave_data->reason ."</td>"; ?>');
            winPrint.document.write('<?php echo "<td align=center>" . $data_emp_leave_data->type_of_leave ."</td>"; ?>');
             winPrint.document.write('<?php echo "<td align=center>" . $data_emp_leave_data->approved ."</td>"; ?>');
    winPrint.document.write('<?php  echo "</tr>";   ?>');
    <?php break; endforeach;?>
    <?php endforeach;?>
    
//winPrint.document.write('<?php  //echo $data;   ?>');
//winPrint.document.write('</tr>');
winPrint.document.write('</table>');
winPrint.document.close();
winPrint.focus();
winPrint.print();
winPrint.close(); 
}

$(function() {
    $("a#print").click(nWin);
});*/</script>