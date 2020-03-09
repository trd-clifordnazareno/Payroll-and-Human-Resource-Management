<?php $this->load->view("templ/payroll/template/header");    ?>
<section class="content-header">
        <h1 style="margin-top: -30px;">
        Department
        <?php     ?>
      </h1>
        <div>
            <button type="button" class="btn bg-navy margin" id="create_dept_btn">Create Department</button>
            <button type="button" class="btn bg-navy margin" id="view_dept_btn">Display Department</button>
        </div>
      
    </section>
<section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div id="create_dept">
            <div id="child"></div>
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Create Department</h3>

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
              <h3 class="box-title">Department Form</h3>
            </div>
            
              <div class="box-body">
                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Department Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Department Name" id="dept_create_name">
                  </div>
                </div>
                
                  
                  
                  
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <!--<button type="submit" class="btn btn-default">Cancel</button>-->
                <button type="submit" class="btn btn-info pull-right" id="create_depts">Submit</button>
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
        <div id="view_dept">
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
                <th>Department Name</th>
                
                
                <th>Action</th>
            </tr>
                </thead>
                <tbody>
                
                    
                    
                    
                    
                    <?php  //echo $rate;echo "<pre>"; var_dump($rate);echo "</pre>";

foreach($dept_rec as $dept_rec_data){
   echo "<tr id='xxx'>";
    echo "<td>" . $dept_rec_data->dept_name ."</td>";
    
    
    echo "<td><table><tr><td> <a href='http://192.168.88.117:82/payroll/index.php/admin/department/del_dept/$dept_rec_data->dept_id'><button type='button' class='btn btn-block btn-danger' style='margin-left:3px;'>Delete</button></a></td>" . "<td>&nbsp&nbsp&nbsp<a href='#edit$dept_rec_data->dept_id' data-toggle='modal'><button type='button' class='btn btn-warning btn-sm'>Edit</button></a></td>" ."</tr></table></td>";/*<td>" . "<button type='button' class='btn btn-success' data-toggle='modal' data-target='#modal-default$employee_data_rec_data->emp_code'>
                Edit
              </button></td>*/
   //echo "<td>" . "<button type='button' class='btn btn-block btn-danger'>Delete</button>" ."</td>";
    
    ?>
        
        <!----------------------------------------------------------------------------------------->
                    <div id="edit<?php echo $dept_rec_data->dept_id; ?>" class="modal fade" role="dialog">
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
                  
                  
                    echo "<b>Bracket ID</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text' class='form-control' id='emp_code_updt' value='$dept_rec_data->dept_id' readonly style='width:30%;' name='dept_id'></br></br>";
                    
                    
                    
                    
    
                    
                    echo "<b>Department Name</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text' class='form-control' id='user_type_updt' name='dept_name' value='$dept_rec_data->dept_name' style='width:50%; margin-left:-30px;'></br></br>";
                    
                  
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
                                $dept_name = $_POST['dept_name'];
                                
                                $dept_id = $_POST['dept_id'];
                                $base = base_url();

                                header("location:$base" . "admin/department/update_dept/$dept_name/$dept_id");
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
<?php $this->load->view("templ/payroll/template/footer");    ?>




<script>
       $(document).ready(function() {
    $('#example').DataTable();
} );
       </script>
       
       
       
       
       <script>
                                $(document).ready(function(){
                                    $("#create_depts").click(function(){
                                        var datas = {
                                            dept_name : $("#dept_create_name").val(), 
                                            
                                            
                                            
                                            ajax : '1'
                                        };
                                        $.ajax({
                                            url : "<?php echo site_url();   ?>/admin/department/ajax_method/create_dept",
                                            type : "post",
                                            data : datas,
                                            success : function(msg){
                                                $("#child1").html(msg);
                                                //alert("ok");
                                            }
                                        });
                                    });
                                });
                                </script>
                                
                                
                                
                                
                                <script>
$(document).ready(function(){
    $("#create_dept").hide();
    $("#view_dept").show();
    
    $("#create_dept_btn").click(function(){
        $("#view_dept").hide();
        $("#create_dept").show();
    });
    $("#view_dept_btn").click(function(){
        $("#create_dept").hide();
        $("#view_dept").show();
    });
});
</script>
  




