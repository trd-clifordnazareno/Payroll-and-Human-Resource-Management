<?php $this->load->view('template/header'); ?>

<ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo $page_content;    ?></a></li>
                        <li class="active"><!--Widgets--><?php echo $page_content2;   ?></li>
                    </ol>
<div id="content">
<div class="box box-info">
                                <div class="box-header">
                                    <h3 class="box-title">Add Details</h3>
                                </div>
                                <div class="box-body">
                                    <!-- Color Picker -->
                                    <div class="form-group">
                                        <label>Location Code:</label>                                         
                                        <input type="text" class="form-control my-colorpicker1 colorpicker-element" id="locationcode" value="<?php echo $location_id;   ?>" disabled>
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <label>Crawler Message:</label>                                         
                                        <input type="text" class="form-control my-colorpicker1 colorpicker-element" id="crawler_message" value="<?php echo $crawler_message;   ?>">
                                    </div><!-- /.form group -->
                                    

                                    <div class="form-group">
                                        <label>Start Date:</label>                                         
                                        <input type="text" class="form-control my-colorpicker1 colorpicker-element" id="start_date" value="<?php echo $start_date;   ?>">
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <label>End Date:</label>                                         
                                        <input type="text" class="form-control my-colorpicker1 colorpicker-element" id="end_date" value="<?php echo $end_date;   ?>">
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <label>Playlist Crawler ID</label>                                         
                                        <input type="text" class="form-control my-colorpicker1 colorpicker-element" id="playlist_crawler" value="<?php echo $playlist_id;   ?>" disabled>
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <label>Playlist Crawler ID:</label>
                                    <select class="form-control" id="playlist_crawler_id">
                                                <option value="<?php echo $playlist_id;   ?>"><?php echo $playlist_id;   ?></option>
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
    </div>                        

<?php $this->load->view('template/footer'); ?>

<script>
                                $(document).ready(function(){
                                    $("#save").click(function(){
                                        var datas = {
                                            locationcode : $("#locationcode").val(),
                                            crawler_message : $("#crawler_message").val(),
                                            start_date : $("#start_date").val(),
                                            end_date : $("#end_date").val(),
                                            old_playlist : "<?php echo $playlist_id;   ?>",
                                            playlist_crawler_id : $("#playlist_crawler_id").val(),
                                            crawler_id : "<?php echo $crawler_id;   ?>",
                                            
                                            ajax : '1'
                                        };
                                        $.ajax({
                                            url : "<?php echo site_url();   ?>/crawler/crawler/edit_crawler_spic",
                                            type : "post",
                                            data : datas,
                                            success : function(msg){
                                                $("#content").html(msg);
                                            }
                                        });
                                    });
                                });
                                </script>

