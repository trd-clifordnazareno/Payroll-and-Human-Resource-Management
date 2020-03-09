<?php $this->load->view("template/header"); ?>
<ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo $page_content;    ?></a></li>
                        <li><!--Widgets--><?php if(isset($page_content2))echo $page_content2;   ?></li>
                        <li class="active"><!--Widgets--><?php if(isset($page_content3))echo $page_content3;   ?></li>
                    </ol>
                
<div id="content"></div>



<div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Create Client</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                
                                
                                    <div class="box-body">
<div class="form-group">
   
                                        <label>Client Name:</label>                                         
                                        <input type="text" class="form-control my-colorpicker1 colorpicker-element" id="client_name">
                                    </div><!-- /.form group -->
                                    <div class="form-group">
   
                                        <label>Client ID:</label>                                         
                                        <input type="text" class="form-control my-colorpicker1 colorpicker-element" id="client_id">
                                    </div><!-- /.form group -->
                                    
                                    
                                    
                                    <div class="form-group">
                                    <button class="btn btn-primary btn-lg" id="save">Save</button>
                                    </div>
                                    
                                    
                                    
                                    
                                        
                                    </div><!-- /.box-body -->

                               
                                    
                            </div>

<?php $this->load->view("template/footer"); ?>

                                    
                                    
                                    
                                    <script>
                                $(document).ready(function(){
                                    $("#save").click(function(){
                                        var datas = {
                                            client_name : $("#client_name").val(),
                                            client_id : $("#client_id").val(),
                                            
                                            ajax : '1'
                                        };
                                        $.ajax({
                                            url : "<?php echo site_url();   ?>/clients/clients/add_new_client_list",
                                            type : "post",
                                            data : datas,
                                            success : function(msg){
                                              $("#content").html(msg);
                                               
                                            }
                                        });
                                    });
                                });
                                </script>
