<?php

 $this->load->view('templte/headers'); ?>



<div id="content">
    
</div>

<div class="box box-info">
                                <div class="box-header">
                                    <h3 class="box-title">REGESTER MEDIUM</h3>
                                </div>
                                <div class="box-body">
                                    <!-- Color Picker -->
                                    <div class="form-group">
                                        <label>BILLBOARD NAME:</label>                                         
                                        <input type="text" class="form-control my-colorpicker1 colorpicker-element" id="billboard_name">
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <label>DESCRIPTION:</label>                                         
                                        <input type="text" class="form-control my-colorpicker1 colorpicker-element" id="description">
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <label>SIZE:</label>                                         
                                        <input type="text" class="form-control my-colorpicker1 colorpicker-element" id="size">
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <label>CURRENT CLIENT:</label>                                         
                                        <input type="text" class="form-control my-colorpicker1 colorpicker-element" id="current_client">
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <label>AVAILABILITY:</label>                                         
                                        <input type="date" class="form-control my-colorpicker1 colorpicker-element" id="availabilty">
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <label>AGENT:</label>                                         
                                        <input type="text" class="form-control my-colorpicker1 colorpicker-element" id="agent">
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <label>STATUS:</label>                                         
                                        <input type="text" class="form-control my-colorpicker1 colorpicker-element" id="status">
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                    <button class="btn btn-primary btn-lg" id="save">Save</button>
                                    </div><!-- /.form group -->
                                    
                                    
                                    
                                    
                                    
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                            
                            
                            
                            
<?php
$this->load->view('templte/footer');

?>
                            
<script>
                                $(document).ready(function(){
                                    $("#save").click(function(){
                                        var datas = {
                                            billboard_name : $("#billboard_name").val(),
                                            description : $("#description").val(),
                                            size : $("#size").val(),
                                            current_client : $("#current_client").val(),
                                            availabilty : $("#availabilty").val(),
                                            agent : $("#agent").val(),
                                            status : $("#status").val(),
                                            ajax : '1'
                                        };
                                        $.ajax({
                                            url : "<?php echo site_url();   ?>/admin/inventory_details/Mediums/method/regester_new_mediums",
                                            type : "post",
                                            data : datas,
                                            success : function(msg){
                                                $("#content").html(msg);
                                                //alert("ok")
                                            }
                                        });
                                    });
                                });
                                </script>