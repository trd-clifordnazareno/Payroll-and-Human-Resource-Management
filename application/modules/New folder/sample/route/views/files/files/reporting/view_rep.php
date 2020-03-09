<?php $this->load->view('template/header'); ?>



<div class="box box-primary">
                                
                                <!-- form start -->
                                <label style="margin-left: 11px;">Client Name:</label>
                                    <div class="box-body">
                                        
                                        
                                        <div class="form-group">
                                            
                                            
                                            
                                            <!---->
                                            </br>
                                            <div class="form-group">
                                    <div class="input-group">                                          
                                        <!--<input id="new-event" type="text" class="form-control" placeholder="Event Title">-->
                                        
                                        
                                        
                                        <div id="page-wrapper">
                                            <input id="new-event" class="form-control" type="text" list="languages" placeholder="Client Code" style="margin-top: -40px; width: 700px; font-size: 3rem; height: 50px;">
  
                                        <datalist id="languages">
                                            <?php
                                            
                                            
                                            foreach($datas as $data){
                                                echo "<option value='$data->client_name'>";
                                            }
                                            
                                            
                                            ?>
                                            <!--<option value="dfdsfsdf">
                                        <option value="CSS">
                                        <option value="JavaScript">
                                        <option value="Java">
                                        <option value="Ruby">
                                        <option value="PHP">
                                        <option value="Go">
                                        <option value="Erlang">
                                        <option value="Python">
                                        <option value="C">
                                        <option value="C#">
                                        <option value="C++">-->
                                        </datalist>
                                        </div>
                                        
                                        
                                        
                                        
                                        <div class="input-group-btn">
                                            <!--<button id="add-new-event" type="button" class="btn btn-default btn-flat" style="margin-top: -40px;">Add</button>-->
                                        </div><!-- /btn-group -->
                                    </div><!-- /input-group -->
                                </div>
                                            
                                            
                                            <!---->
                                        <label>Start Date:</label>  
                                        <input type="date" class="form-control my-colorpicker1 colorpicker-element" id="startdate" style="width: 700px; font-size: 3rem; height: 50px;" value="<?php echo date("Y-m-d");   ?>">
                                        <label>End Date:</label>                                         
                                        <input type="date" class="form-control my-colorpicker1 colorpicker-element" id="enddate" style="width: 700px; font-size: 3rem; height: 50px;" value="<?php echo date("Y-m-d");   ?>">
                                        
                                    </div><!-- /.form group -->
                                        
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        
                                        
                                        
                                        
                                        <div class="timeline-body">
                                            <b style="font-size: 17px;">&nbsp&nbsp&nbspView Spots</b></br>
                                             <button type="submit" class="btn btn-primary" id="save" style="background-color: #281672; ">View Accounts</button>
                                        </div>
                                        <div class="timeline-body">
                                            <b style="font-size: 17px;">&nbsp&nbsp&nbspTotal Spots</b></br>
                                             <button type="submit" class="btn btn-primary" id="print_pdf_loop" style="background-color: #281672;">View Total Spots</button>
                                        <button type="submit" class="btn btn-primary" id="print_pdf_loop_download" style="background-color: #281672;">Download Total Spots</button>
                                        </div>
                                         <div class="timeline-body">
                                             <b style="font-size: 17px;">&nbsp&nbsp&nbspDaily Loop Count</b></br>
                                              <button type="submit" class="btn btn-primary" id="all_date_pdf" style="background-color: #281672;">View Daily Loop Count</button>
                                        <button type="submit" class="btn btn-primary" id="all_date_pdf_d" style="background-color: #281672;">Download Daily Loop Count</button>
                                        </div>
                                        <div class="timeline-body">
                                            <b style="font-size: 17px;">&nbsp&nbsp&nbspMaterial Logs</b></br>
                                              <button type="submit" class="btn btn-primary" id="print_pdf" style="background-color: #281672;">View Material Logs</button>
                                        </div>
                                       
                                        
                                       
                                        
                                    </div>
                                
                            </div>



<div id="content">
</div>




<?php  /*$ip =   "192.168.254.122";
exec("ping -n 3 $ip", $output, $status);
print_r($output);   

$host="http://192.168.254.122";

exec("ping -c 4 " . $host, $output, $result);

print_r($output);

if ($result == 0)

echo "Ping successful!";

else

echo "Ping unsuccessful!";*/

?>
                                    
<?php $this->load->view('template/footer'); ?>



<script>
                                $(document).ready(function(){
                                    
                                    $("#save").click(function(){
                                        var datas = {
                                            
                                            startdate : $("#startdate").val(),
                                            
                                            enddate : $("#enddate").val(),
                                            //sample : $("#sample").val()
                                            
                                            
                                            ajax : '1'
                                        };
                                        $.ajax({
                                            url : "<?php echo site_url();   ?>/reports/reports/view_rep/" + $("#new-event").val(),
                                            type : "post",
                                            data : datas,
                                            success : function(msg){
                                                $("#content").html(msg);
                                                //alert($("#enddate").val());
                                            }
                                        });
                                    });
                                });
                                </script>
                                
                                
                                
                                <script>
                                             
                                $(document).ready(function(){
                                    
                                    $("#print_pdf_loop").click(function(){
                                        
                                            var x = $("#startdate").val();
                                            
                                            var y = $("#enddate").val();
                                            var client_code = $("#new-event").val();
                                            
                                           window.open("<?php echo site_url();   ?>/reports/reports/pdf_per_loops" + "/" + $("#startdate").val() + "/" +  $("#enddate").val() + "/" + client_code), "_blank";
                                            
                                            
                                           
                                    });
                                    
                                    
                                    
                                    $("#print_pdf").click(function(){
                                        
                                            var x = $("#startdate").val();
                                            
                                            var y = $("#enddate").val();
                                            var client_code = $("#new-event").val();
                                            
                                           window.open("<?php echo site_url();   ?>/reports/reports/pdf_loops_per_clients_loc" + "/" + $("#startdate").val() + "/" +  $("#enddate").val() + "/" + client_code), "_blank";
                                            
                                            
                                           
                                    });
                                    
                                    
                                    
                                    
                                    $("#print_pdf_loop_download").click(function(){
                                        
                                            var x = $("#startdate").val();
                                            
                                            var y = $("#enddate").val();
                                            var client_code = $("#new-event").val();
                                            
                                           window.open("<?php echo site_url();   ?>/reports/reports/pdf_per_loops_download" + "/" + $("#startdate").val() + "/" +  $("#enddate").val() + "/" + client_code), "_blank";
                                            
                                            
                                           
                                    });
                                    
                                    
                                    
                                    
                                    $("#all_date_pdf").click(function(){
                                        
                                            var x = $("#startdate").val();
                                            
                                            var y = $("#enddate").val();
                                            var client_code = $("#new-event").val();
                                            
                                           window.open("<?php echo site_url();   ?>/reports/reports/reportbydates" + "/" + $("#startdate").val() + "/" +  $("#enddate").val() + "/" + client_code), "_blank";
                                            
                                            
                                           
                                    });
                                    
                                    
                                    
                                    
                                    $("#all_date_pdf_d").click(function(){
                                        
                                            var x = $("#startdate").val();
                                            
                                            var y = $("#enddate").val();
                                            var client_code = $("#new-event").val();
                                            
                                           window.open("<?php echo site_url();   ?>/reports/reports/reportbydates_download" + "/" + $("#startdate").val() + "/" +  $("#enddate").val() + "/" + client_code), "_blank";
                                            
                                            
                                           
                                    });
                                });
                                </script>