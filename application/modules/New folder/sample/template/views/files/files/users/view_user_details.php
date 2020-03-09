<?php $this->load->view('template/header'); ?>
<ol class="breadcrumb">
                        <li><a href="<?php echo site_url();   ?>/users/display_users"><i class="fa fa-dashboard"></i> <?php echo $page_content;    ?></a></li>
                        <li class="active"><!--Widgets--><?php echo $page_content2;   ?></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- /.content -->
<!--<div class="box-body table-responsive">
                                    <div id="example2_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-xs-6"></div><div class="col-xs-6"></div></div><table id="example2" class="table table-bordered table-hover dataTable" aria-describedby="example2_info">
                                        <thead>
                                            <tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">User Code</th>
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">User Type</th>
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Username</th>
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">First Name</th>
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Last Name</th>
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Position</th>
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Department</th>
                                                </tr>
                                        </thead>
                                        
                                        
                                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                                        <?php
                                        /*echo "</tr>";
                                        echo "<td>" . $usercode . "</br>";
                                        echo "<td>" . $data_username . "</br>";
                                        echo "<td>" . $usertype . "</br>";
                                        echo "<td>" . $firstname . "</br>";
                                        echo "<td>" . $lastname . "</br>";
                                        echo "<td>" . $position . "</br>";
                                        echo "<td>" . $department . "</br>";
                                        
                                        echo "</tr>";*/
                                        
                                        ?>
                                            </tr></tbody></table><div class="row"><div class="col-xs-6"><div class="dataTables_info" id="example2_info">Showing 1 to 10 of 57 entries</div></div><div class="col-xs-6"><div class="dataTables_paginate paging_bootstrap"><ul class="pagination"><li class="prev disabled"><a href="#">← Previous</a></li><li class="active"><a href="#">1</a></li><li><a href="#">2</a></li><li><a href="#">3</a></li><li><a href="#">4</a></li><li><a href="#">5</a></li><li class="next"><a href="#">Next → </a></li></ul></div></div></div></div>
                                </div>-->
<div id="content"></div>
                    
                    <div class="box box-info">
                                <div class="box-header">
                                    <h3 class="box-title">Users Details</h3>
                                </div>
                                <div class="box-body">
                                    <!-- Color Picker -->
                                    <div class="form-group">
                                        <label>User Code:</label>                                         
                                        <input type="text" class="form-control my-colorpicker1 colorpicker-element" id="usercode" value="<?php echo $data_usercode;   ?>" disabled>
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <label>User Type:</label>                                         
                                        <input type="text" class="form-control my-colorpicker1 colorpicker-element" id="usertype" value="<?php echo $data_usertype;   ?>" disabled>
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <label>User Type:</label>
                                    <select class="form-control" value="<?php echo $data_usertype;   ?>">
                                                <option></option>
                                                <option>Admin</option>
                                                <option>User</option>
                                            </select>
                                        </div><!-- /.form group -->

                                    <div class="form-group">
                                        <label>UserName:</label>                                         
                                        <input type="text" class="form-control my-colorpicker1 colorpicker-element" id="username" value="<?php echo $data_username;   ?>">
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <label>Password:</label>                                         
                                        <input type="password" class="form-control my-colorpicker1 colorpicker-element" id="password" value="<?php echo $data_password;   ?>" disabled>
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <label>First Name:</label>                                         
                                        <input type="text" class="form-control my-colorpicker1 colorpicker-element" id="firstname" value="<?php echo $data_firstname;   ?>">
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <label>Last Name:</label>                                         
                                        <input type="text" class="form-control my-colorpicker1 colorpicker-element" id="lastname" value="<?php echo $data_lastname;   ?>">
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <label>Position:</label>                                         
                                        <input type="text" class="form-control my-colorpicker1 colorpicker-element" id="position" value="<?php echo $data_position;   ?>">
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <label>Department:</label>                                         
                                        <input type="text" class="form-control my-colorpicker1 colorpicker-element" id="department" value="<?php echo $data_department;   ?>">
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                    <button class="btn btn-primary btn-lg" id="save">Save</button>
                                     &nbsp&nbsp&nbsp<button class="btn btn-primary btn-lg" id="delete">Delete</button>
                                    </div><!-- /.form group -->
                                    
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                            
<?php $this->load->view('template/footer'); ?>

                            <script>
                                $(document).ready(function(){
                                    $("#save").click(function(){
                                        var datas = {
                                            usercode : $("#usercode").val(),
                                            usertype : $("#usertype").val(),
                                            username : $("#username").val(),
                                            password : $("#password").val(),
                                            firstname : $("#firstname").val(),
                                            lastname : $("#lastname").val(),
                                            position : $("#position").val(),
                                            department : $("#department").val(),
                                            
                                            ajax : '1'
                                        };
                                        $.ajax({
                                            url : "<?php echo site_url();   ?>/users/display_users/method/edit_user",
                                            type : "post",
                                            data : datas,
                                            success : function(msg){
                                                $("#content").html(msg);
                                            }
                                        });
                                    });
                                });
                                </script> 