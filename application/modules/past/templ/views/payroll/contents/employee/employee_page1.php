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
        Employee
        <?php     ?>
      </h1>
        <div>
            <button type="button" class="btn bg-navy margin" id="create_employee_btn">Create Employee</button>
            <button type="button" class="btn bg-navy margin" id="view_empoyee_btn">Display Employee</button>
        </div>
      
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- SELECT2 EXAMPLE -->
        <div id="create_employee">
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
                
                <!--<div class="form-group">
                  <label for="">Emp Code</label>
                  <input type="text" class="form-control" id="emp_code">
                </div>-->
                
                <div class="form-group">
                  <label for="emp_name">Employee Name</label>
                  <input type="text" class="form-control" id="emp_name">
                </div>
                
                <!--<div class="form-group">
                  <label for="dept">Department</label>
                  <input type="text" class="form-control" id="dept">
                </div>-->
                <div class="form-group">
                    <label>Department</label>
                        <select class="form-control select2" data-placeholder="Select SSS Bracket"
                                style="width: 100%;" id="sel_dept">
                            
                          <option value="">Select Department</option>
                          
                           <?php foreach ($dept_rec as $dept_rec_data) : ?>
                            <option value="<?php echo $dept_rec_data->dept_id;   ?>" id="sel_dept_id"><?php echo $dept_rec_data->dept_name;   ?></option>
                            <?php endforeach; ?> 
                            
                          
                        </select>
              </div>
                
                <!--<div class="form-group">
                  <label for="position">Position</label>
                  <input type="text" class="form-control" id="position">
                </div>-->
                <div class="form-group">
                    <label>Position</label>
                        <select class="form-control select2" data-placeholder="Select SSS Bracket"
                                style="width: 100%;" id="position_list">
                            
                          
                          
                           
                            
                          
                        </select>
              </div>
                
                <div class="form-group">
                  <label for="monthly_or_daily_salary">Monthly Salary or Daily Salary</label>
                  <input type="text" class="form-control" id="monthly_or_daily_salary">
                </div>
                
                
                
                            <?php //var_dump($sss_brk);   ?>
                              
                            
                <!--<div class="form-group">
                    <label>SSS Bracket</label>
                        <select class="form-control select2" multiple="multiple" data-placeholder="Select SSS Bracket"
                                style="width: 100%;" id="sss_brk">
                            
                          
                          
                           <?php foreach ($sss_brk as $bar) : ?>
                            <option id="<?php echo $bar->bfgr_given_id;   ?>"><?php echo $bar->bfgr_given_id;   ?></option>
                            <?php endforeach; ?> 
                            
                          <!--<option>Alabama</option>
                          <option>Alaska</option>
                          <option>California</option>
                          <option>Delaware</option>
                          <option>Tennessee</option>
                          <option>Texas</option>
                          <option>Washington</option>-->
                        <!--</select>
              </div>-->
                
                <div class="form-group">
                <label>SSS Bracket</label>
                <select class="form-control select2" style="width: 100%;" id="sss_brk">
                            <?php foreach ($sss_brk as $bar) : ?>
                                <option value="<?php echo $bar->bfgr_given_id;   ?>"><?php echo $bar->salary_range;   ?></option>
                            <?php endforeach; ?>
                </select>
              </div>
                
               <div class="form-group">
                <label>PHILHEALTH Bracket</label>
                <select class="form-control select2" style="width: 100%;" id="phil_h_brk">
                            <?php foreach ($philh_brk as $bar) : ?>
                                <option value="<?php echo $bar->bfgr_given_id;   ?>"><?php echo $bar->salary_range;   ?></option>
                            <?php endforeach; ?>
                </select>
              </div> 
                
              <div class="form-group">
                <label>PAG-IBIG Bracket</label>
                <select class="form-control select2" style="width: 100%;" id="pag_i_brk">
                            <?php foreach ($pag_i_brk as $bar) : ?>
                                <option value="<?php echo $bar->bfgr_given_id;   ?>"><?php echo $bar->salary_range;   ?></option>
                            <?php endforeach; ?>
                </select>
              </div>  
                
                
              
              <!-- /.form-group -->
              
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
                
                
                <div class="form-group">
                  <label>Pay Type</label>
                  <select class="form-control" id="pay_type">
                      <option value="monthly">Monthly</option>
                      <option value="daily">Daily</option>
                    
                  </select>
                </div>
                
                
                <div class="form-group">
                  <label for="">Date Hired</label>
                  <input type="date" class="form-control" id="emp_date_hired">
                </div>
                
                <div class="form-group">
                  <label>Schedule Day From</label>
                  <select class="form-control" id="sched_day_from">
                      <option value="Monday">Monday</option>
                      <option value="Thursday">Thursday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                      <option value="Saturday">Saturday</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Schedule Day To</label>
                  <select class="form-control" id="sched_day_to">
                      <option value="Monday">Monday</option>
                      <option value="Thursday">Thursday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                      <option value="Saturday">Saturday</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Schedule In</label>
                  <select class="form-control" id="sched_in">
                      <option value="08:00:00">08:00:00</option>
                      <option value="08:30:00">08:30:00</option>
                      <option value="08:46:00">08:46:00</option>
                    <option>option 3</option>
                    <option>option 4</option>
                    <option>option 5</option>
                  </select>
                </div>
                
                <div class="form-group">
                  <label>Schedule Out</label>
                  <select class="form-control" id="sched_out">
                      <option value="17:00:00">05:00:00</option>
                      <option value="17:30:00">05:30:00</option>
                    <option>option 3</option>
                    <option>option 4</option>
                    <option>option 5</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Username</label>
                  <input type="text" class="form-control" id="username">
                </div>
                <div class="form-group">
                  <label for="">Password</label>
                  <input type="text" class="form-control" id="password">
                </div>
                <div class="form-group">
                  <label>User Type</label>
                  <select class="form-control" id="user_type">
                      <option value="admin" id="admin">ADMIN</option>
                      <option value="user" id="user">USER</option>
                    
                  </select>
                </div>
              
              <!-- /.form-group -->
              <!--<div class="form-group">
                <label>Disabled Result</label>
                <select class="form-control select2" style="width: 100%;">
                  <option selected="selected">Alabama</option>
                  <option>Alaska</option>
                  <option disabled="disabled">California (disabled)</option>
                  <option>Delaware</option>
                  <option>Tennessee</option>
                  <option>Texas</option>
                  <option>Washington</option>
                </select>
              </div>-->
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
            <button type="submit" class="btn btn-primary" id="submit">Submit</button>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        
      </div>
        </div>
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
                <th>Employee Name</th>
                <th>Department</th>
                <th>Position</th>
                <th>Salary Per Month</th>
                <th>SSS Bracket</th>
                <th>PhillHealth Bracket</th>
                <th>Pag-ibig Bracket</th>
                <th>Schedule In</th>
                <th>Schedule Out</th>
                <th>Daily Salary</th>
                <th>Monthly Salary</th>
                <th>User Type</th>
                <th>Action</th>
            </tr>
                </thead>
                <tbody>
                
                    
                    
                    
                    
                    <?php  //echo $rate;echo "<pre>"; var_dump($rate);echo "</pre>";

foreach($employee_data_rec as $employee_data_rec_data){
   echo "<tr id='xxx'>";
    echo "<td>" . $employee_data_rec_data->emp_code ."</td>";
    echo "<td>" . $employee_data_rec_data->emp_name ."</td>";
    echo "<td>" . $employee_data_rec_data->dept ."</td>";
    echo "<td>" . $employee_data_rec_data->position ."</td>";
    echo "<td>" . $employee_data_rec_data->salary ."</td>";
    echo "<td>" . $employee_data_rec_data->sss_bracket ."</td>";
    echo "<td>" . $employee_data_rec_data->philhealth_bracket ."</td>";
     echo "<td>" . $employee_data_rec_data->pag_ibig_bracket ."</td>";
    echo "<td>" . $employee_data_rec_data->shedule_type ."</td>";
    
    echo "<td>" . $employee_data_rec_data->time_out_sched ."</td>";
    echo "<td>" . $employee_data_rec_data->daily_salary ."</td>";
    echo "<td>" . $employee_data_rec_data->salary ."</td>";
    echo "<td>" . $employee_data_rec_data->user_type ."</td>";
    echo "<td><table><tr><td> <a href='http://localhost/payroll/index.php/admin/employee/del_employee/$employee_data_rec_data->emp_code'><button type='button' class='btn btn-block btn-danger' style='margin-left:3px;'>Delete</button></a></td>" . "<td>&nbsp&nbsp&nbsp<a href='#edit$employee_data_rec_data->emp_code' data-toggle='modal'><button type='button' class='btn btn-warning btn-sm'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></button></a></td>" ."</tr></table></td>";/*<td>" . "<button type='button' class='btn btn-success' data-toggle='modal' data-target='#modal-default$employee_data_rec_data->emp_code'>
                Edit
              </button></td>*/
   //echo "<td>" . "<button type='button' class='btn btn-block btn-danger'>Delete</button>" ."</td>";
    
    ?>
        
        <!----------------------------------------------------------------------------------------->
                    <div id="edit<?php echo $employee_data_rec_data->emp_code; ?>" class="modal fade" role="dialog">
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
                  
                  
                  
                    echo "<b>Employee Code</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text' class='form-control' id='emp_code_updt' value='$employee_data_rec_data->emp_code' readonly style='width:50%;' name='emp_code_updt'></br></br>";
                    echo "<b>Employee Name</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text' class='form-control' id='emp_name_updt' value='$employee_data_rec_data->emp_name' style='width:50%;' name='emp_name_updt' required></br></br>";
                    echo "<b>Employee Department</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text' class='form-control' id='dept_updt' value='$employee_data_rec_data->dept' style='width:50%;' name='dept_updt'></br></br>";
                    echo "<b>Employee Position</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text' class='form-control' id='position_updt' value='$employee_data_rec_data->position' style='width:50%;' name='position_updt' required></br></br>";
                    echo "<b>Employee Salary</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text' class='form-control' id='mothly_salary_updt' value='$employee_data_rec_data->salary' disabled style='width:50%;' name='mothly_salary_updt' required></br></br>";
                    
                    echo "<b>Employee SSS</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<select class='form-control select2' style='width: 35%;' id='sss_bracket_updt' style='width:50%;' name='sss_bracket_updt'>";
                        foreach($bracket_type as $bracket_type_data) {
                            if($bracket_type_data->bfgr_given_id == $employee_data_rec_data->sss_bracket){
                                echo "<option value='$employee_data_rec_data->sss_bracket'>$bracket_type_data->monthly_deduction</option>";
                            }
                        }   
                    
                    foreach ($sss_brk as $bar) : 
                                echo "<option value='$bar->bfgr_given_id'>$bar->monthly_deduction</option>";
                             endforeach; 
                    echo "</select></br></br>";
                    echo "<b>Employee PhilHealth</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<select class='form-control select2' style='width: 35%;' id='philhealth_bracket_updt' style='width:50%;' name='philhealth_bracket_updt'>";
                         foreach($bracket_type as $bracket_type_data) {
                            if($bracket_type_data->bfgr_given_id == $employee_data_rec_data->sss_bracket){
                                echo "<option value='$employee_data_rec_data->philhealth_bracket'>$bracket_type_data->monthly_deduction</option>";
                            }
                        }  
//echo "<option value='$employee_data_rec_data->philhealth_bracket'>$employee_data_rec_data->philhealth_bracket</option>";   
                    foreach ($philh_brk as $bar) : 
                                echo "<option value='$bar->bfgr_given_id'>$bar->monthly_deduction</option>";
                             endforeach; 
                    echo "</select></br></br>";
                    echo "<b>Employee Pag-ibig</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<select class='form-control select2' style='width: 35%;' id='pag_ibig_bracket_updt' style='width:50%;' name='pag_ibig_bracket_updt'>";
                    foreach($bracket_type as $bracket_type_data) {
                            if($bracket_type_data->bfgr_given_id == $employee_data_rec_data->sss_bracket){
                                echo "<option value='$employee_data_rec_data->pag_ibig_bracket'>$bracket_type_data->monthly_deduction</option>";
                            }
                        }
//echo "<option value='$employee_data_rec_data->pag_ibig_bracket'>$employee_data_rec_data->pag_ibig_bracket</option>";        
                    foreach ($pag_i_brk as $bar) : 
                                echo "<option value='$bar->bfgr_given_id'>$bar->monthly_deduction</option>";
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
                    echo "<b>Employee Time In</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text' class='form-control' id='sched_in_updt' value='$employee_data_rec_data->shedule_type' style='width:50%;' name='sched_in_updt' required></br></br>";
                    echo "<b>Employee Time Out</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text' class='form-control' id='sched_out_updt' value='$employee_data_rec_data->time_out_sched' style='width:50%;' name='sched_out_updt' required></br></br>";
    
    
                    echo "<b>Juty From</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<select class='form-control select2' style='width: 35%; margin-left:7%;' id='juty_from_data' style='width:50%;' name='juty_from_updt'>";
                           
                                echo "<option value='$employee_data_rec_data->juty_day_from'>$employee_data_rec_data->juty_day_from</option>";
                                echo "<option value='Monday'>Monday</option>";
                                echo "<option value='Tuesday'>Tuesday</option>";
                                echo "<option value='Wednesday'>Wednesday</option>";
                                echo "<option value='Thursday'>Thursday</option>";
                                echo "<option value='Friday'>Friday</option>";
                                echo "<option value='Saturday'>Saturday</option>";
                                echo "<option value='Sunday'>Sunday</option>";
                             
                    echo "</select></br></br>";
                    echo "<b>Juty To</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<select class='form-control select2' style='width: 35%; margin-left:9%' id='juty_to_data' style='width:50%;' name='juty_to_updt'>";
                           
                                echo "<option value='$employee_data_rec_data->juty_day_to'>$employee_data_rec_data->juty_day_to</option>";
                                echo "<option value='Monday'>Monday</option>";
                                echo "<option value='Tuesday'>Tuesday</option>";
                                echo "<option value='Wednesday'>Wednesday</option>";
                                echo "<option value='Thursday'>Thursday</option>";
                                echo "<option value='Friday'>Friday</option>";
                                echo "<option value='Saturday'>Saturday</option>";
                                echo "<option value='Sunday'>Sunday</option>";
                             
                    echo "</select></br></br>";
    
    
    
    
    
                    echo "<b>Employee Daily Salary</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text' class='form-control' id='daily_salary_updt' value='$employee_data_rec_data->daily_salary' style='width:50%;' name='daily_salary_updt' required></br></br>";
                    /*if($employee_data_rec_data->pay_type == "daily"){
                        echo "<b>Employee Monthly Salary</b> &nbsp&nbsp&nbsp&nbsp&nbsp<input type='text' class='form-control' id='monthly_salary_given_updt' value='0.0' style='width:50%;' name='monthly_salary_given_updt'></br></br>";
                    }else if($employee_data_rec_data->pay_type == "monthly"){
                        echo "<b>Employee Monthly Salary</b> &nbsp&nbsp&nbsp&nbsp&nbsp<input type='text' class='form-control' id='monthly_salary_given_updt' value='$employee_data_rec_data->salary' style='width:50%; name='monthly_salary_given_updt'></br></br>";
                    }*/
                    if($employee_data_rec_data->pay_type == "daily"){
                        echo "<b>Employee Monthly Salary</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text' class='form-control' id='daily_salary_updt' value='0.0' style='width:50%; margin-left:-3%;' name='monthly_salary_given_updt' required></br></br>";
                    }else if($employee_data_rec_data->pay_type == "monthly"){
                        echo "<b>Employee Monthly Salary</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text' class='form-control' id='daily_salary_updt' value='$employee_data_rec_data->salary' style='width:50%; margin-left:-3%;' name='monthly_salary_given_updt' required></br></br>";
                    }
                    echo "<b>Employee Pay Type</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<select class='form-control select2' style='width: 35%;' id='user_type_updt' style='width:50%;' name='user_type_updt'>";
                           
                    
                                echo "<option value='user'>user</option>";
                                echo "<option value='admin'>admin</option>";
                             
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
                                $sel_emp_name_updt = $_POST['emp_name_updt'];
                                $sel_dept_updt = $_POST['dept_updt'];
                                $sel_position = $_POST['position_updt'];
                                //$sel_mothly_salary_updt = $_POST['mothly_salary_updt'];
                                $sel_sss_bracket_updt = $_POST['sss_bracket_updt'];
                                $sel_philhealth_bracket_updt = $_POST['philhealth_bracket_updt'];
                                $sel_pag_ibig_bracket_updt = $_POST['pag_ibig_bracket_updt'];
                                $sel_pay_type_updt = $_POST['pay_type_updt'];
                                $sel_sched_in_updt = $_POST['sched_in_updt'];
                                $sel_sched_out_updt = $_POST['sched_out_updt'];
                                $sel_daily_salary_updt = $_POST['daily_salary_updt'];
                                $sel_monthly_salary_given_updt = $_POST['monthly_salary_given_updt'];
                                $sel_user_type_updt = $_POST['user_type_updt'];
                                $sel_emp_code_updt = $_POST['emp_code_updt'];
                                $sel_juty_from_updt = $_POST['juty_from_updt'];
                                $sel_juty_to_updt = $_POST['juty_to_updt'];
                                
                                $base = site_url();

                                header("location:$base/admin/employee/update_emp/$sel_emp_name_updt/$sel_position/$sel_sss_bracket_updt/$sel_philhealth_bracket_updt/$sel_pag_ibig_bracket_updt/$sel_pay_type_updt/$sel_sched_in_updt/$sel_sched_out_updt/$sel_daily_salary_updt/$sel_monthly_salary_given_updt/$sel_user_type_updt/$sel_emp_code_updt/$sel_juty_from_updt/$sel_juty_to_updt/$sel_dept_updt");
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
                        echo "<b>Employee Monthly Salary</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text' class='form-control' id='daily_salary_updt' value='0.0' style='width:50%;' name='monthly_salary_given_updt'></br></br>";
                    }else if($employee_data_rec_data->pay_type == "monthly"){
                        echo "<b>Employee Monthly Salary</b> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type='text' class='form-control' id='daily_salary_updt' value='$employee_data_rec_data->salary' style='width:50%;' name='monthly_salary_given_updt'></br></br>";
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
                                    $("#submit").click(function(){
                                        var datas = {
                                            //emp_code : $("#emp_code").val(), 
                                            emp_name : $("#emp_name").val(),
                                            dept : $("#sel_dept").val(), 
                                            position : $("#position_list").val(),
                                            monthly_or_daily_salary : $("#monthly_or_daily_salary").val(), 
                                            sss_brk : $("#sss_brk").val(),
                                            phil_h_brk : $("#phil_h_brk").val(),
                                            pag_i_brk : $("#pag_i_brk").val(), 
                                            pay_type : $("#pay_type").val(),
                                            sched_in : $("#sched_in").val(),
                                            sched_out : $("#sched_out").val(), 
                                            user_type : $("#user_type").val(),
                                            emp_date_hired : $("#emp_date_hired").val(),
                                            username : $("#username").val(),
                                            password : $("#password").val(),
                                            duty_from : $("#sched_day_from").val(),
                                            duty_to : $("#sched_day_to").val(),
                                            
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




<script>
    $(document).ready(function(){
        $(function(){

             $("#sel_dept").change(function(){
                 var status = this.value;
                    
                     var datas = {
                                                dept_id : $("#sel_dept").val(),

                                                ajax : '1'
                                            };
                     
                    $.ajax({
                                                url : "<?php echo site_url();   ?>/admin/employee/position_list",
                                                type : "post",
                                                data : datas,
                                                success : function(msg){
                                                    $("#position_list").html(msg);
                                                    
                                                }
                                            });
                       
              });

        });
    });
</script>




