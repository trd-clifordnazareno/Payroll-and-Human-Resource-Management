<?php $this->load->view('template/header'); ?>

<ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo $page_content;    ?></a></li>
                        <li class="active"><!--Widgets--><?php if(isset($page_content2))echo $page_content2;   ?></li>
                    </ol>
 <!--</section>-->

                <!-- Main content -->
               <!--<section class="content">-->
                    <!-- /.content -->

<div id="content">
    

                            <div class="box box-info">
                                <div class="box-header">
                                    <h3 class="box-title">Register Location</h3>
                                </div>
                                <div class="box-body">
                                    <!-- Color Picker -->
                                    <div class="form-group">
                                        <label>Location Code:</label>                                         
                                        <input type="text" class="form-control my-colorpicker1 colorpicker-element" id="locationcode">
                                    </div><!-- /.form group -->
                                    

                                    <div class="form-group">
                                        <label>Location Name:</label>                                         
                                        <input type="text" class="form-control my-colorpicker1 colorpicker-element" id="locationname">
                                    </div><!-- /.form group -->
                                    
                                    
                                    <div class="form-group">
                                        <label>Time On:</label>                                         
                                        <input type="text" class="form-control my-colorpicker1 colorpicker-element" id="time">
                                    </div><!-- /.form group -->
                                    
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label>Time Out:</label>                                         
                                        <input type="text" class="form-control my-colorpicker1 colorpicker-element" id="time_out">
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                    <button class="btn btn-primary btn-lg" id="save">Save</button>
                                    </div><!-- /.form group -->
                                    
                                </div><!-- /.box-body -->
    </div>
<?php $this->load->view('template/footer'); ?>

                            
                            
                            <script>
                                $(document).ready(function(){
                                    $("#save").click(function(){
                                        var datas = {
                                            locationcode : $("#locationcode").val(),
                                            clientcode : $("#clientcode").val(),
                                            locationname : $("#locationname").val(),
                                            time : $("#time").val(),
                                            timeout : $("#time_out").val(),
                                            ajax : '1'
                                        };
                                        $.ajax({
                                            url : "<?php echo site_url();   ?>/locations/locations/loc_regester",
                                            type : "post",
                                            data : datas,
                                            success : function(msg){
                                                $("#content").html(msg);
                                            }
                                        });
                                    });
                                });
                                </script>