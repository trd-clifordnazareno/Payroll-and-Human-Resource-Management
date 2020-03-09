<?php


?>
<div id="content">
    <p id="msg"></p>
 <div class="box box-info">
                                <div class="box-header">
                                    <h3 class="box-title">Add New Crawler</h3>
                                </div>
                                <div class="box-body">
                                    <!-- Color Picker -->
                                    <div class="form-group">
                                        <label>Crawler Message:</label>                                         
                                        <input type="text" class="form-control my-colorpicker1 colorpicker-element" id="crawlermessage" style="height: 50px; font-size: 3rem;">
                                    </div><!-- /.form group -->
                                    
<div class="form-group">
                                        <label>Crawler Type:</label>                
                                        <select class="form-control" id="crawler_type" style="height: 50px; font-size: 3rem;">
                                            <?php
                                            
                                            foreach($crawler_data as $data){
                                                echo "<option value=$data->crawler_type_id>$data->crawler_name</option>";
                                            }
                                            
                                            ?>
                                                <!--<option value="1">Greetings</option>
                                                <option value="2">News</option>
                                                <option value="3">Social Media</option>-->
                                                
                                            </select>
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <label>Start Date:</label>                                         
                                        <input type="date" class="form-control my-colorpicker1 colorpicker-element" id="startdate" style="height: 50px; font-size: 3rem;" value="<?php echo date('Y-m-d'); ?>">
                                        <select class="form-control" id="starttime" style="height: 50px; font-size: 3rem;">
                                                <option><?php echo date('h A'); ?></option>
                                                <option value="01:00">1 AM</option>
                                                <option value="02:00">2 AM</option>
                                                <option value="03:00">3 AM</option>
                                                <option value="04:00">4 AM</option>
                                                <option value="05:00">5 AM</option>
                                                <option value="06:00">6 AM</option>
                                                <option value="07:00">7 AM</option>
                                                <option value="08:00">8 AM</option>
                                                <option value="09:00">9 AM</option>
                                                <option value="10:00">10 AM</option>
                                                <option value="11:00">11 AM</option>
                                                <option value="12:00">12 PM</option>
                                                <option value="13:00">1 PM</option>
                                                <option value="14:00">2 PM</option>
                                                <option value="15:00">3 PM</option>
                                                <option value="16:00">4 PM</option>
                                                <option value="17:00">5 PM</option>
                                                <option value="18:00">6 PM</option>
                                                <option value="19:00">7 PM</option>
                                                <option value="20:00">8 PM</option>
                                                <option value="21:00">9 PM</option>
                                                <option value="22:00">10 PM</option>
                                                <option value="23:00">11 PM</option>
                                                <option value="23:59">12 AM</option>
                                            </select>
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <label>End Date:</label>                                         
                                        <input type="date" class="form-control my-colorpicker1 colorpicker-element" id="enddate" style="height: 50px; font-size: 3rem;" value="<?php echo date('Y-m-d'); ?>">
                                        <select class="form-control" id="endtime" style="height: 50px; font-size: 3rem;">
                                                <option><?php echo date('h A'); ?></option>
                                                <option value="01:00">01 AM</option>
                                                <option value="02:00">02 AM</option>
                                                <option value="03:00">03 AM</option>
                                                <option value="04:00">04 AM</option>
                                                <option value="05:00">05 AM</option>
                                                <option value="06:00">06 AM</option>
                                                <option value="07:00">07 AM</option>
                                                <option value="08:00">08 AM</option>
                                                <option value="09:00">09 AM</option>
                                                <option value="10:00">10 AM</option>
                                                <option value="11:00">11 AM</option>
                                                <option value="12:00">12 PM</option>
                                                <option value="13:00">01 PM</option>
                                                <option value="14:00">02 PM</option>
                                                <option value="15:00">03 PM</option>
                                                <option value="16:00">04 PM</option>
                                                <option value="17:00">05 PM</option>
                                                <option value="18:00">06 PM</option>
                                                <option value="19:00">07 PM</option>
                                                <option value="20:00">08 PM</option>
                                                <option value="21:00">09 PM</option>
                                                <option value="22:00">10 PM</option>
                                                <option value="23:00">11 PM</option>
                                                <option value="23:59">12 AM</option>
                                            </select>
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <label>Play List:</label>
                                        <select class="form-control" id="playlist" style="height: 50px; font-size: 3rem;">
                                                <option><?php echo $crawler_playlist_id;   ?></option>
                                                <?php 
                                                
                                                $end = 50;
                                                for($start = 1;$start < $end;$start ++){
                                                  ?>
                                                      <option value="<?php  echo $start;  ?>"><?php echo $start;   ?></option>
                                                      <?php  
                                                }
                                                    ?>
                                                
                                                
                                            </select>
                                        <!--<input type="text" class="form-control my-colorpicker1 colorpicker-element" id="playlist">-->
                                    </div><!-- /.form group -->
                                    
                                    <div class="form-group">
                                        <div id="upload_all"><button class="btn btn-primary btn-lg" id="saves">Save</button></div>
                                    <div id="upload_image">
                                        <input type="file" id="file" name="file" />
                                        <button id="upload" class="btn btn-primary btn-lg" style="margin-top: 10px;">Upload</button>
                                    </div>
                                   
                                    </div><!-- /.form group -->
                                    <!---------------------------------------------------------------------------->
                                    <script type="text/javascript">
            $(document).ready(function (e) {
                //$("#upload_all").hide();
                $("#upload_image").hide();
                $('#upload').on('click', function () {
                    var file_data = $('#file').prop('files')[0];
                    var form_data = new FormData();
                    form_data.append('file', file_data);
                    $.ajax({
                        url: '<?php echo site_url();   ?>/crawler/crawler/upload_image_crawler', // point to server-side controller method
                        dataType: 'text', // what to expect back from the server
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (response) {
                            $('#msg').html(response); // display success response from the server
                            $("#upload_all").show();
                            $("#upload_image").hide();
                        },
                        error: function (response) {
                            $('#msg').html(response); // display error response from the server
                            $("#upload_all").show();
                            $("#upload_image").hide();
                        }
                    });
                });
            });
        </script>
    <!--</head>-->
    <!--<body>-->
        <p id="msg"></p>
        
                                    <!---------------------------------------------------------------------------->
                                    
                                </div><!-- /.box-body -->
                                </div><!-- /.box -->
                                </div>



                                <script>
                                $(document).ready(function(){
                                    //$("#upload_all").hide();
                                    $("#upload_image").hide();
                                    $("#saves").click(function(){
                                        var datas = {
                                            locationcode : "<?php echo $loc_code;   ?>",
                                            crawlermessage : $("#crawlermessage").val(),
                                            startdate : $("#startdate").val(),
                                            starttime : $("#starttime").val(),
                                            enddate : $("#enddate").val(),
                                            endtime : $("#endtime").val(),
                                            playlist : $("#playlist").val(), 
                                            crawler_type : $("#crawler_type").val(),
                                            ajax : '1'
                                        };
                                        $.ajax({
                                            url : "<?php echo site_url();   ?>/crawler/crawler/add_entry_crawler",
                                            type : "post",
                                            data : datas,
                                            success : function(msg){
                                                $("#content").html(msg);
                                                //alert("<?php echo $loc_codesgmt;   ?>");
                                            }
                                        });
                                    });
                                });
                                </script>
                                
                                
                                
                                
                                <!------------upload picture in form action ---->
                                 <?php //echo form_open_multipart('upload/do_upload');?>
                                    <!--</br>
                                    <input type="file" name="userfile" size="20" />

                                    <br />

                                    <input type="submit" value="upload" class="btn btn-primary btn-lg"/>

                                    </form>-->