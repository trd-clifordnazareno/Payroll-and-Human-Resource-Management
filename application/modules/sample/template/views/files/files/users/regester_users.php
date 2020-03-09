<?php $this->load->view('template/header'); ?>

<ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo $page_content;    ?></a></li>
                        <li class="active"><!--Widgets--><?php echo $page_content2;   ?></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- /.content -->

<div id="content">
    
</div>
                            <div class="box box-info">
                                <div class="box-header">
                                    <h3 class="box-title">Regester Users</h3>
                                </div>
                                <div class="box-body">
                                    <!-- Color Picker -->
                                    <div class="form-group">
                                        <label>User Code:</label>                                         
                                        <input type="text" class="form-control my-colorpicker1 colorpicker-element" id="usercode">
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <label>User Type:</label>
                                    <select class="form-control" id="user_type">
                                                <option></option>
                                                <option>Admin</option>
                                                <option>User</option>
                                            </select>
                                        </div><!-- /.form group -->

                                    <div class="form-group">
                                        <label>UserName:</label>                                         
                                        <input type="text" class="form-control my-colorpicker1 colorpicker-element" id="username">
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <label>Password:</label>                                         
                                        <input type="text" class="form-control my-colorpicker1 colorpicker-element" id="password">
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <label>First Name:</label>                                         
                                        <input type="text" class="form-control my-colorpicker1 colorpicker-element" id="firstname">
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <label>Last Name:</label>                                         
                                        <input type="text" class="form-control my-colorpicker1 colorpicker-element" id="lastname">
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <label>Position:</label>                                         
                                        <input type="text" class="form-control my-colorpicker1 colorpicker-element" id="position">
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <label>Department:</label>                                         
                                        <input type="text" class="form-control my-colorpicker1 colorpicker-element" id="department">
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                    <button class="btn btn-primary btn-lg" id="save">Save</button>
                                    </div><!-- /.form group -->
                                    
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

                        
<?php $this->load->view('template/footer'); ?>

                            
                            
                            <script>
                                $(document).ready(function(){
                                    $("#save").click(function(){
                                        var datas = {
                                            usercode : $("#usercode").val(),
                                            usertype : $("#user_type").val(),
                                            username : $("#username").val(),
                                            password : $("#password").val(),
                                            firstname : $("#firstname").val(),
                                            lastname : $("#lastname").val(),
                                            position : $("#position").val(),
                                            department : $("#department").val(),
                                            
                                            ajax : '1'
                                        };
                                        $.ajax({
                                            url : "<?php echo site_url();   ?>/users/regester_users/method/regester",
                                            type : "post",
                                            data : datas,
                                            success : function(msg){
                                                $("#content").html(msg);
                                            }
                                        });
                                    });
                                });
                                </script>