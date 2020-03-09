
<div id="content_for_form">
</div>
<center>
<div class="box box-primary" style="width: 330px;">
    
                                <div class="box-header">
                                    <h3 class="box-title">Location Signage</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label>Start Date:</label>                                         
                                            <input type="date" class="form-control my-colorpicker1 colorpicker-element" id="report_date" enabled style="width: 300px;">
                                        </div><!-- /.form group -->
                                        <div class="form-group">
                                                    <label>Location</label>
                                                <select class="form-control" id="failure_to_date_loc" style="width: 300px;">
                                                    <?php
                                                    
                foreach($loc as $loc_data){
                    
                $new_data = explode("-", $loc_data->location_code);
                
                if($new_data[1] == "ORMOC"){
                    if($new_data[3] == "S1"){
                        echo "<option value=$loc_data->location_code> $new_data[1]  $new_data[2] </option>";

                    }
                }else if($new_data[1] == "DIPOLOG"){
                    if($new_data[2] == "S1"){
                        echo "<option value=$loc_data->location_code> $new_data[1] </option>";

                    }
                }else if($new_data[2] == "CEBU"){
                    if($new_data[3] == "PIER1"){
                        if($new_data[4] == "S1"){
                            echo "<option value=$loc_data->location_code> $new_data[2]  $new_data[1]  $new_data[3]  </option>";

                        }
                    }else if($new_data[3] == "PIER2"){
                        if($new_data[4] == "S1"){
                            echo "<option value=$loc_data->location_code> $new_data[2]  $new_data[1]  $new_data[3]  </option>";
                        }
                    }else if($new_data[3] == "PIER3"){
                        if($new_data[4] == "S1"){
                            echo "<option value=$loc_data->location_code> $new_data[2]  $new_data[1]  $new_data[3]  </option>";
                        }
                    }else if($new_data[3] == "PIER4"){
                        if($new_data[4] == "S1"){
                            echo "<option value=$loc_data->location_code> $new_data[2]  $new_data[1]  4  </option>";

                        }
                    }
                }else if($new_data[3] == "S1"){
                    echo "<option value=$loc_data->location_code>  $new_data[2] $new_data[1]  </option>";
                
                }else{
                    if($new_data[2] == "PAGADIAN"){
                       if($new_data[3] == "S12017100401"){
                           echo "<option value=$loc_data->location_code>  $new_data[2] $new_data[1]  </option>";

                       }
                    }else if($new_data[2] == "ZAMBOANGA"){
                        if($new_data[3] == "S12017100403"){
                            echo "<option value=$loc_data->location_code>  $new_data[2] $new_data[1]  </option>";

                       }
                    }
                }
                                                        
              }
                                                    
                                                    
                ?>

                                                </select>
                                            </div>
                                        <div class="form-group">
                                                    <label>Subject</label>
                                                <select class="form-control" id="subject" style="width: 300px;">
                                                    <option value=""></option>
                                                    <option value="maintenance">Maintenance</option>
                                                    <option value="downtime">Downtime</option>

                                                </select>
                                            </div>
                                        <div id="content_for_loc_per_scr">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"> REASON</label>
                                            <textarea rows="4" cols="50" type="textarea" class="form-control" placeholder="Enter text" style="width: 300px;" id="reason"></textarea>
                                        </div>
                                        
                                    </div><!-- /.box-body -->
                                </form>
                                <div class="box-footer">
                                            <button type="submit" class="btn btn-primary" id="submits">Save</button>
                                    </div>
                            </div>
</center>


<script>
                                $(document).ready(function(){
                                    $("#submits").click(function(){
                                        var datas = {
                                            report_date : $("#report_date").val(),
                                            failure_to_date_loc : $("#failure_to_date_loc").val(),
                                            subject : $("#subject").val(),
                                            reason : $("#reason").val(),
                                            fail_scr : $("#scr").val(),
                                            ajax : '1'
                                        };
                                        $.ajax({
                                            url : "<?php echo site_url();   ?>/failuretoair/failuretoair/method/insert_fail_loc",
                                            type : "post",
                                            data : datas,
                                            success : function(msg){
                                                $("#content_for_form").html(msg);
                                            }
                                        });
                                    });
                                });
                                
                                
                                
                                $('#subject').on('change', function() {
                                var datas = {
                                            subject_type : this.value,
                                            loc_code : $("#failure_to_date_loc").val(),
                                            ajax : '1'
                                        };
                                        $.ajax({
                                            url : "<?php echo site_url();   ?>/failuretoair/failuretoair/method/load_scr",
                                            type : "post",
                                            data : datas,
                                            success : function(msg){
                                                $("#content_for_loc_per_scr").html(msg);
                                            }
                                        });    
                                });
                                </script>



