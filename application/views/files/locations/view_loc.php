<?php $this->load->view('template/header'); ?>
<!--<ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> <?php //echo $page_content;    ?></a></li>
                        <li><!--Widgets--><?php //if(isset($page_content2))echo $page_content2;   ?><!--</li>
                        <!--<li class="active"><!--Widgets--><?php //if(isset($page_content3))echo $page_content3;   ?><!--</li>
                    <!--</ol>-->
                </section>

                <!-- Main content -->
                <section class="content">
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    <div id="content">
                    <div class="form-group">
                                    <button class="btn btn-primary btn-lg" id="save">Add New Content</button>
                                    </div><!-- /.form group -->
                    
                    <!-- /.content -->
                    
<div class="box-body table-responsive">
                                    <div id="example2_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-xs-6"></div><div class="col-xs-6"></div></div><table id="example2" class="table table-bordered table-hover dataTable" aria-describedby="example2_info">
                                        <thead>
                                            <!--<tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Date Aired</th>-->
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Play List</th>
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Location Code</th>
                                               <!-- <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Clients Code</th>-->
                                                <!--<th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">FileName Code</th>-->
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">FileName</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Lenght</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Daily Loops</th>
                                             <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">From</th>
                                             <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Expire</th>
                                             
                                             <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Days Left</th>
                                             <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">View Logs</th>
                                             <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Edit Details</th>
                                             <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Delete</th>
                                             <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Status</th>
                                            </tr>
                                        </thead>
                                        
                                        <tfoot>
                                            <!--<tr><th rowspan="1" colspan="1">Date Aired</th>-->
                                            <th rowspan="1" colspan="1">Play List</th>
                                                <th rowspan="1" colspan="1">Location Code</th>
                                                <!--<th rowspan="1" colspan="1">Clients Code</th>-->
                                                <!--<th rowspan="1" colspan="1">FileName Code</th>-->
                                                <th rowspan="1" colspan="1">FileName</th>
                                                <th rowspan="1" colspan="1">Lenght</th>
                                                <th rowspan="1" colspan="1">Daily Loops</th>
                                                <th rowspan="1" colspan="1">From</th>
                                                <th rowspan="1" colspan="1">Expire</th>
                                                
                                                <th rowspan="1" colspan="1">Days Left</th>
                                                <th rowspan="1" colspan="1">View Logs</th>
                                                <th rowspan="1" colspan="1">Edit Details</th>
                                                <th rowspan="1" colspan="1">Delete</th>
                                                <th rowspan="1" colspan="1">Status</th>
                                            </tr>
                                        </tfoot>
                                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                                                <!--tables-->
                                                
                                                <?php

foreach($data as $data){
    echo "<tr>";
    //echo "<td>" . $data->date_aired . "</td>";
    echo "<td>" . $data->sequence . "</td>";
    echo "<td>" . $data->location_code . "</td>";
    //echo "<td>" . $data->clients_code . "</td>";
    //echo "<td>" . $data->filename_code . "</td>";
    echo "<td>" . $data->filename . "</td>";
    echo "<td>" . $data->lenght . "</td>";
    echo "<td>" . $data->play . "</td>";
    echo "<td>" . $data->start . "</td>";
    echo "<td>" . $data->expire . "</td>";
    
    echo "<td>" . $result . "</td>";
    ?><td><a href="<?php echo site_url();    ?>"><button class="btn btn-warning">View Logs</button></a></td><?php
    ?><td><a href="<?php echo site_url();    ?>/playlist/playlist/method/edit_playlist/<?php echo $data->table_location_reports_id;   ?>"><button class="btn btn-success">Edit Details</button></a></td><?php
    ?><td><a href="<?php echo site_url();    ?>/playlist/playlist/method/delete_item/<?php echo $data->sequence . "/" . $data->location_code . "/" . $data->table_location_reports_id;   ?>"><button>Delete</button></a></td><?php
    if($data->expire >= date("Y-m-d")){
        echo "<td>" . "ACTIVE" . "</td>";
    }else{
        echo "<td>" . "EXPIRED" . "</td>";
    }
    

    echo "</tr>";
}

?>
    <?php
   
/*$born = "2016";
$days = 1;
$month = "1";
$now = date("Y");
$now_month = date("m");

$age = $now - $born;
if($month < $now_month){
    $age = $age - 1;
    echo $age;
}*/
    /*$born = "26-01-2016";
    $len = strlen($born);
    
    for($i = 1;$i <= $len;$i++){
       if($i == 1){
            $daya = $born[0];
       }
       if($i == 1){
           $dayb = $born[1];
       }
       if($i == 1){
           $c = $born[2];
       }
       if($i == 1){
           $montha = $born[3];
       }
       if($i == 1){
           $monthb = $born[4];
       }
       if($i == 1){
            $a = $born[5];
       }
       if($i == 1){
           $yeara = $born[6];
       }
       if($i == 1){
           $yearb = $born[7];
       }
       if($i == 1){
           $yearc = $born[8];
       }
       if($i == 1){
           //year
           $yeard = $born[9];
           $nowyear = date("Y");
           //day
           $day = $daya . $dayb;
           $nowday = date("d");
           
           $month = $montha . $monthb;
           $nowmonth = date("m");
           
           //calculate years
           $year = $yeara . $yearb . $yearc . $yeard;
           
           $age = date("Y") - $year;
          
           if($nowyear == $year){
               $age = 0;
           }else{
              if($month <= $nowmonth){
               $age = $age - 1;
           }else if($month >= $nowmonth){
               $age = $age;
           }
           $perday = $age;
           $per_dates = 365;
           
           //day results in a year
           $day_result = $perday * $per_dates;
           
           //calculate months
           $month_res = $nowmonth - $month; 
           }
           echo $age;
           
           
           
           
           
       }
        
       
       
    }
   
    


*/


?>
                                                
                                                
                                                <!--tables-->
                                            <!--</tr></tbody></table><div class="row"><div class="col-xs-6"><div class="dataTables_info" id="example2_info">Showing 1 to 10 of 57 entries</div></div><div class="col-xs-6"><div class="dataTables_paginate paging_bootstrap"><ul class="pagination"><li class="prev disabled"><a href="#">← Previous</a></li><li class="active"><a href="#">1</a></li><li><a href="#">2</a></li><li><a href="#">3</a></li><li><a href="#">4</a></li><li><a href="#">5</a></li><li class="next"><a href="#">Next → </a></li></ul></div></div></div></div>
                                --></div>
<!--<div class="form-group">
                                        <label>File Name:</label>
                                    <select class="form-control" id="file">
                                                <?php foreach($file_data as $data){
                                                    ?> <option value="<?php echo $data->filename_code;   ?>"><?php echo $data->filename_name;   ?></option>   <?php
                                                }   ?>
                                                
                                            </select>
                                        </div>-->
    <!--<div class="form-group">
                                        <label>Playlist Count:</label>
                                    <select class="form-control" id="playlistcount">
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
                                        </div>-->
    
    
    
    <!--<div class="form-group">
                                    <button class="btn btn-primary btn-lg" id="save">Save</button>
                                    </div><!-- /.form group -->
    
</div>  
</div>
<!--<div id="content"></div>-->
<?php //echo $segmt; this is the id of client_id ?>
<?php $this->load->view('template/footer'); ?>



<script>
    $(document).ready(function(){
        var d = new Date();
        var seconds = d.getSeconds();
        if(seconds == 5){
            $("#content").load("<?php echo site_url();    ?>/view_running_status/view_running_status/update_playlist/<?php echo $this->uri->rsegment(3);   ?>");
        }
        if(seconds == 10){
            $("#content").load("<?php echo site_url();    ?>/view_running_status/view_running_status/update_playlist/<?php echo $this->uri->rsegment(3);   ?>");
        }
        if(seconds == 15){
            $("#content").load("<?php echo site_url();    ?>/view_running_status/view_running_status/update_playlist/<?php echo $this->uri->rsegment(3);   ?>");
        }
        if(seconds == 20){
            $("#content").load("<?php echo site_url();    ?>/view_running_status/view_running_status/update_playlist/<?php echo $this->uri->rsegment(3);   ?>");
        }
        if(seconds == 25){
            $("#content").load("<?php echo site_url();    ?>/view_running_status/view_running_status/update_playlist/<?php echo $this->uri->rsegment(3);   ?>");
        }
        if(seconds == 30){
            $("#content").load("<?php echo site_url();    ?>/view_running_status/view_running_status/update_playlist/<?php echo $this->uri->rsegment(3);   ?>");
        }
        if(seconds == 35){
            $("#content").load("<?php echo site_url();    ?>/view_running_status/view_running_status/update_playlist/<?php echo $this->uri->rsegment(3);   ?>");
        }
        if(seconds == 40){
            $("#content").load("<?php echo site_url();    ?>/view_running_status/view_running_status/update_playlist/<?php echo $this->uri->rsegment(3);   ?>");
        }
        if(seconds == 45){
            $("#content").load("<?php echo site_url();    ?>/view_running_status/view_running_status/update_playlist/<?php echo $this->uri->rsegment(3);   ?>");
        }
        if(seconds == 50){
            $("#content").load("<?php echo site_url();    ?>/view_running_status/view_running_status/update_playlist/<?php echo $this->uri->rsegment(3);   ?>");
        }
        if(seconds == 55){
            $("#content").load("<?php echo site_url();    ?>/view_running_status/view_running_status/update_playlist/<?php echo $this->uri->rsegment(3);   ?>");
        }
        if(seconds == 60){
            $("#content").load("<?php echo site_url();    ?>/view_running_status/view_running_status/update_playlist/<?php echo $this->uri->rsegment(3);   ?>");
        }
        
    
       
    });
    </script>
    
    
    
    <script>
                                $(document).ready(function(){
                                    $("#save").click(function(){
                                        var datas = {
                                            file : $("#file").val(),
                                            playlistcount : $("#playlistcount").val(),
                                            segmt : "<?php echo $segmt;   ?>",
                                            
                                            ajax : '1'
                                        };
                                        $.ajax({
                                            url : "<?php echo site_url();   ?>/playlist/playlist/add_content",
                                            type : "post",
                                            data : datas,
                                            success : function(msg){
                                              $("#content").html(msg);
                                               
                                            }
                                        });
                                    });
                                });
                                </script>