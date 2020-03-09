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
        Create Hollidays
        <?php     ?>
      </h1>
        <div>
            <button type="button" class="btn bg-navy margin" id="create_bracket_btn">Create Bracket</button>
            <button type="button" class="btn bg-navy margin" id="view_bracket_btn">Display Bracket</button>
        </div>
      
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div id="create_bracket">
            <div id="child"></div>
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Create Holliadys</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
                
                
                
                <div class="box box-info">
            <div class="box-header with-border">
                <div id="child1"></div>
              <h3 class="box-title">Holliday Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <!--<form class="form-horizontal">-->
              <div class="box-body">
                <div class="form-group" style="margin-left:100px;">
                  <label>Type of Holliday </label>
                  <select class="form-control" style="width:97%;" id="holliday_name">
                      <option value="L">Legal</option>
                      <option value="S">Special</option>
                      
                      
                  </select>
                </div>
                <!--<div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                  </div>
                </div>-->
                
                  
                  <div class="form-group">
                  <label for="">Date</label>
                  <input type="date" class="form-control" id="date">
                </div>
                  <!--<div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Bracket Given ID</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword3" placeholder="">
                  </div>
                </div>-->
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <!--<button type="submit" class="btn btn-default">Cancel</button>-->
                <button type="submit" class="btn btn-info pull-right" id="create_holliday">Submit</button>
              </div>
              <!-- /.box-footer -->
            <!--</form>-->
          </div>
                
                            
                <!-- page 1 -->
                
                
               
                
                
                
                
              
              <!-- /.form-group -->
              
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
                
                
                
                
                
                
               <!-- page 2 --> 
                
                
                
                
                
                
                
              
              
            </div>
            <!-- /.col -->
          </div>
            <!--<button type="submit" class="btn btn-primary" id="submit">Submit</button>-->
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        
      </div>
        </div>
        <div id="view_bracket">
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
                <th>Holliday Name</th>
                <th>Date</th>
                
            </tr>
                </thead>
                <tbody>
                
                    
                    
                    
                    
                    <?php  //echo $rate;echo "<pre>"; var_dump($rate);echo "</pre>";

foreach($hollidays as $hollidays_data){
   echo "<tr id='xxx'>";
    echo "<td>" . $hollidays_data->holiday_type ."</td>";
    echo "<td>" . $hollidays_data->date_time_record ."</td>";
    
    
    //echo "<td><table><tr><td> <a href='http://localhost/payroll/index.php/admin/bracket_for_gov_rem/del_bracket_for_gov_rem/$bracket_data_data->bfgr_given_id'><button type='button' class='btn btn-block btn-danger' style='margin-left:3px;'>Delete</button></a></td>" . "<td>&nbsp&nbsp&nbsp<a href='#edit$bracket_data_data->bfgr_given_id' data-toggle='modal'><button type='button' class='btn btn-warning btn-sm'>Edit</button></a></td>" ."</tr></table></td>";/*<td>" . "<button type='button' class='btn btn-success' data-toggle='modal' data-target='#modal-default$employee_data_rec_data->emp_code'>
                //Edit
              //</button></td>*/
   //echo "<td>" . "<button type='button' class='btn btn-block btn-danger'>Delete</button>" ."</td>";
    
    ?>
        
        <!----------------------------------------------------------------------------------------->
                    <div id="edit<?php echo $bracket_data_data->bfgr_given_id; ?>" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-lg">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <form method="post" class="form-horizontal" role="form">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Edit Item</h4>
                                        </div>
                                        <div class="modal-body">
                                           <?php
                  
                  
                    echo "<b>Bracket ID</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text' class='form-control' id='emp_code_updt' value='$bracket_data_data->bfgr_given_id' readonly style='width:30%;' name='bfgr_given_id'></br></br>";
                    echo "<b>Bracket Name</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<select class='form-control select2' style='width: 35%; margin-left:-30px;' id='sss_bracket_updt' name='name_of_br_updt'>";
                            echo "<option value='$bracket_data_data->name_of_bracket'>$bracket_data_data->name_of_bracket</option>";
                    foreach ($sss_brk as $bar) : 
                                echo "<option value='$bracket_data_data->name_of_bracket'>$bracket_data_data->name_of_bracket</option>";
                             endforeach; 
                    echo "</select></br></br>";
                    echo "<b>Salary Range</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<select class='form-control select2' style='width: 35%; margin-left:-25px;' id='sss_bracket_updt' name='salary_range_updt'>";
                            echo "<option value='$bracket_data_data->salary_range'>$bracket_data_data->salary_range</option>";
                    /*foreach ($sss_brk as $bar) : 
                                echo "<option value='$bracket_data_data->salary_range'>$bracket_data_data->salary_range</option>";
                             endforeach;*/
                    echo "<option value='10000'>10000</option>";
                    echo "<option value='11000'>11000</option>";
                    echo "<option value='12000'>12000</option>";
                    echo "<option value='13000'>13000</option>";
                    echo "<option value='14000'>14000</option>";
                    echo "<option value='15000'>15000</option>";
                    echo "<option value='16000'>16000</option>";
                    echo "<option value='17000'>17000</option>";
                    echo "<option value='18000'>18000</option>";
                    echo "<option value='19000'>19000</option>";
                    echo "<option value='20000'>20000</option>";
                    echo "<option value='21000'>21000</option>";
                    echo "<option value='22000'>2200</option>";
                    echo "<option value='23000'>23000</option>";
                    echo "<option value='24000'>24000</option>";
                    echo "<option value='25000'>25000</option>";
                    echo "<option value='26000'>26000</option>";
                    echo "<option value='27000'>27000</option>";
                    echo "<option value='28000'>28000</option>";
                    echo "<option value='29000'>29000</option>";
                    echo "<option value='30000'>30000</option>";
                    echo "</select></br></br>";
                    echo "<b>Monthly Deduction</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<select class='form-control select2' style='width: 35%; margin-left:-59px;' id='sss_bracket_updt' name='monthly_deduct_updt'>";
                            echo "<option value='$bracket_data_data->monthly_deduction'>$bracket_data_data->monthly_deduction</option>";
                    /*foreach ($sss_brk as $bar) : 
                                echo "<option value='$bracket_data_data->monthly_deduction'>$bracket_data_data->monthly_deduction</option>";
                             endforeach;*/
                        for($x = 1;$x < 1001;$x++){
                            echo "<option value='$x'>$x</option>";
                        }
                    echo "</select></br></br>";
                    echo "<b>Employee Addon</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<select class='form-control select2' style='width: 35%; margin-left:-47px;' id='sss_bracket_updt' name='employee_addon_updt'>";
                            echo "<option value='$bracket_data_data->employee_addon'>$bracket_data_data->employee_addon</option>";
                    /*foreach ($sss_brk as $bar) : 
                                echo "<option value='$bracket_data_data->employee_addon'>$bracket_data_data->employee_addon</option>";
                             endforeach;*/
                        for($x = 1;$x < 1001;$x++){
                            echo "<option value='$x'>$x</option>";
                        }
                    echo "</select></br></br>";
    
                    
                    //echo "<b>Employee User Type</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text' class='form-control' id='user_type_updt' value='$employee_data_rec_data->user_type' style='width:50%;'></br></br>";
                    
                  
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
                                $name_of_br_updt = $_POST['name_of_br_updt'];
                                $salary_range_updt = $_POST['salary_range_updt'];
                                $monthly_deduct_updt = $_POST['monthly_deduct_updt'];
                                
                                $employee_addon_updt = $_POST['employee_addon_updt'];
                                $bfgr_given_id = $_POST['bfgr_given_id'];
                                

                                header("location:http://localhost/payroll/index.php/admin/bracket/update_bracket/$name_of_br_updt/$salary_range_updt/$monthly_deduct_updt/$employee_addon_updt/$bfgr_given_id");
                            }
    
    
    
                    ?>
                    <!--------------------------------------------------------------------------------------->
        
        
        <div class="modal fade" id="modal-default<?php echo $employee_data_rec_data->emp_code;    ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title"><?php echo $employee_data_rec_data->emp_code;    ?><div id="modal_update_success"></div></h4>
              </div>
                <form action="#" method="post">
              <div class="modal-body">
                <!--<p>One fine body&hellip;</p>-->
                  <?php
                  
                  
                  
                    echo "<b>Employee Code</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text' class='form-control' id='emp_code_updt' value='$employee_data_rec_data->emp_code' disabled style='width:50%;' name='emp_code_updt'></br></br>";
                    echo "<b>Employee Name</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text' class='form-control' id='emp_name_updt' value='$employee_data_rec_data->emp_name' style='width:50%;' name='emp_name_updt'></br></br>";
                    echo "<b>Employee Department</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text' class='form-control' id='dept_updt' value='$employee_data_rec_data->dept' style='width:50%;' name='dept_updt'></br></br>";
                    echo "<b>Employee Position</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text' class='form-control' id='position_updt' value='$employee_data_rec_data->position' style='width:50%;' name='position_updt'></br></br>";
                    echo "<b>Employee Salary</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text' class='form-control' id='mothly_salary_updt' value='$employee_data_rec_data->salary' disabled style='width:50%;' name='mothly_salary_updt'></br></br>";
                    
                    echo "<b>Employee SSS</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<select class='form-control select2' style='width: 35%;' id='sss_bracket_updt' style='width:50%;' name='sss_bracket_updt'>";
                            echo "<option value='$employee_data_rec_data->sss_bracket'>$employee_data_rec_data->sss_bracket</option>";
                    foreach ($sss_brk as $bar) : 
                                echo "<option value='$bar->bfgr_given_id'>$bar->bfgr_given_id</option>";
                             endforeach; 
                    echo "</select></br></br>";
                    echo "<b>Employee PhilHealth</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<select class='form-control select2' style='width: 35%;' id='philhealth_bracket_updt' style='width:50%;' name='philhealth_bracket_updt'>";
                         echo "<option value='$employee_data_rec_data->philhealth_bracket'>$employee_data_rec_data->philhealth_bracket</option>";   
                    foreach ($philh_brk as $bar) : 
                                echo "<option value='$bar->bfgr_given_id'>$bar->bfgr_given_id</option>";
                             endforeach; 
                    echo "</select></br></br>";
                    echo "<b>Employee Pag-ibig</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<select class='form-control select2' style='width: 35%;' id='pag_ibig_bracket_updt' style='width:50%;' name='pag_ibig_bracket_updt'>";
                    echo "<option value='$employee_data_rec_data->pag_ibig_bracket'>$employee_data_rec_data->pag_ibig_bracket</option>";        
                    foreach ($pag_i_brk as $bar) : 
                                echo "<option value='$bar->bfgr_given_id'>$bar->bfgr_given_id</option>";
                             endforeach; 
                    echo "</select></br></br>";
                    echo "<b>Employee Pay Type</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<select class='form-control select2' style='width: 35%;' id='pay_type_updt' style='width:50%;' name='pay_type_updt'>";
                           
                    
                                echo "<option value='daily'>daily</option>";
                                echo "<option value='monthly'>monthly</option>";
                             
                    echo "</select></br></br>";
                    //echo "<b>Employee SSS</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text' class='form-control' id='sss_bracket_updt' value='$employee_data_rec_data->sss_bracket'></br></br>";
                    //echo "<b>Employee PhilHealth</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text' class='form-control' id='philhealth_bracket_updt' value='$employee_data_rec_data->philhealth_bracket'></br></br>";
                    //echo "<b>Employee Pag-ibig</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text' class='form-control' id='pag_ibig_bracket_updt' value='$employee_data_rec_data->pag_ibig_bracket'></br></br>";
                    //echo "<b>Employee Pay Type</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text' class='form-control' id='pay_type_updt' value='$employee_data_rec_data->pay_type'></br></br>";
                    echo "<b>Employee Time In</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text' class='form-control' id='sched_in_updt' value='$employee_data_rec_data->shedule_type' style='width:50%;' name='sched_in_updt'></br></br>";
                    echo "<b>Employee Time Out</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text' class='form-control' id='sched_out_updt' value='$employee_data_rec_data->time_out_sched' style='width:50%;' name='sched_out_updt'></br></br>";
                    echo "<b>Employee Daily Salary</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text' class='form-control' id='daily_salary_updt' value='$employee_data_rec_data->daily_salary' style='width:50%;' name='daily_salary_updt'></br></br>";
                    /*if($employee_data_rec_data->pay_type == "daily"){
                        echo "<b>Employee Monthly Salary</b> &nbsp&nbsp&nbsp&nbsp&nbsp<input type='text' class='form-control' id='monthly_salary_given_updt' value='0.0' style='width:50%;' name='monthly_salary_given_updt'></br></br>";
                    }else if($employee_data_rec_data->pay_type == "monthly"){
                        echo "<b>Employee Monthly Salary</b> &nbsp&nbsp&nbsp&nbsp&nbsp<input type='text' class='form-control' id='monthly_salary_given_updt' value='$employee_data_rec_data->salary' style='width:50%; name='monthly_salary_given_updt'></br></br>";
                    }*/
                    if($employee_data_rec_data->pay_type == "daily"){
                        echo "<b>Employee Daily Salary</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text' class='form-control' id='daily_salary_updt' value='0.0' style='width:50%;' name='monthly_salary_given_updt'></br></br>";
                    }else if($employee_data_rec_data->pay_type == "monthly"){
                        echo "<b>Employee Daily Salary</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text' class='form-control' id='daily_salary_updt' value='$employee_data_rec_data->salary' style='width:50%;' name='monthly_salary_given_updt'></br></br>";
                    }
                    echo "<b>Employee Pay Type</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<select class='form-control select2' style='width: 35%;' id='user_type_updt' style='width:50%;' name='user_type_updt'>";
                           
                    
                                echo "<option value='user'>user</option>";
                                echo "<option value='admin'>admin</option>";
                             
                    echo "</select></br></br>";
                    //echo "<b>Employee User Type</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text' class='form-control' id='user_type_updt' value='$employee_data_rec_data->user_type' style='width:50%;'></br></br>";
                    
                  
                  ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="updt_employee">Save changes</button>
                  
                        
                  <input type="submit" value="xxx" name="go">
                  
                  
                  
                  
                  
                  
                  
              </div>
                </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
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
                                    $("#create_holliday").click(function(){
                                        var datas = {
                                            holliday_name : $("#holliday_name").val(), 
                                            date : $("#date").val(),
                                            
                                            
                                            
                                            ajax : '1'
                                        };
                                        $.ajax({
                                            url : "<?php echo site_url();   ?>/admin/hollidays/ajax_method/create_holliday",
                                            type : "post",
                                            data : datas,
                                            success : function(msg){
                                                //$("#child1").html(msg);
                                                alert("YOUVE SUCCESSFULLY ADDED");
                                            }
                                        });
                                    });
                                });
                                </script>
                                
                                
                                
                                
                                <script>
$(document).ready(function(){
    $("#create_bracket").hide();
    $("#view_bracket").show();
    
    $("#create_bracket_btn").click(function(){
        $("#view_bracket").hide();
        $("#create_bracket").show();
    });
    $("#view_bracket_btn").click(function(){
        $("#create_bracket").hide();
        $("#view_bracket").show();
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