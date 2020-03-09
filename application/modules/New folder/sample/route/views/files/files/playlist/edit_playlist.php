<?php $this->load->view('template/header'); ?>
<div id="content"></div>
<ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo $page_content;    ?></a></li>
                        <li class="active"><!--Widgets--><?php echo $page_content2;   ?></li>
                    </ol>
<div class="box box-info">
                                <div class="box-header">
                                    <h3 class="box-title">Add Details</h3>
                                </div>
                                <div class="box-body">
                                    <!-- Color Picker -->
                                    <div class="form-group">
                                        <label>Location Code:</label>                                         
                                        <input type="text" class="form-control my-colorpicker1 colorpicker-element" id="locationcode" value="<?php echo $location_code;   ?>" disabled>
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <label>Filename:</label>                                         
                                        <input type="text" class="form-control my-colorpicker1 colorpicker-element" id="filename" value="<?php echo $filename;   ?>" disabled>
                                    </div><!-- /.form group -->
                                    

                                    <div class="form-group">
                                        <label>From:</label>                                         
                                        <input type="text" class="form-control my-colorpicker1 colorpicker-element" id="from" value="<?php echo $from;   ?>" disabled>
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <label>Expire:</label>                                         
                                        <input type="text" class="form-control my-colorpicker1 colorpicker-element" id="expire" value="<?php echo $expire;   ?>" disabled>
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <label>Sequence:</label>                                         
                                        <input type="text" class="form-control my-colorpicker1 colorpicker-element" id="" value="<?php echo $sequence;   ?>" disabled>
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <label>User Type:</label>
                                    <select class="form-control" id="sequence">
                                                <option value=""></option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                            </select>
                                        </div>
                                    
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
                                            locationcode : $("#locationcode").val(),
                                            filename : $("#filename").val(),
                                            from : $("#from").val(),
                                            expire : $("#expire").val(),
                                            table_location_reports_id : "<?php echo $table_location_reports_id;   ?>",
                                            sequence : $("#sequence").val(),
                                            seq_orig : "<?php echo $sequence;   ?>",
                                            file_code : "<?php echo $file_code;   ?>",
                                            lenght : "<?php echo $lenght;   ?>",
                                            
                                            ajax : '1'
                                        };
                                        $.ajax({
                                            url : "<?php echo site_url();   ?>/playlist/playlist/method/edit_add",
                                            type : "post",
                                            data : datas,
                                            success : function(msg){
                                                $("#content").html(msg);
                                            }
                                        });
                                    });
                                });
                                </script>