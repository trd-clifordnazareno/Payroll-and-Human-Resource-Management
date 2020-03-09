<?php $this->load->view('template/header'); ?>
<ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo $page_content;    ?></a></li>
                        <li class="active"><!--Widgets--><?php echo $page_content2;   ?></li>
                    </ol>
<div id="content">
<div class="form-group">
                                    <button class="btn btn-primary btn-lg" id="save">Add New Crawler</button>
                                    </div><!-- /.form group -->
                    
                    <!-- /.content -->
                    <div id="content">                  
<div class="box-body table-responsive">
                                    <div id="example2_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-xs-6"></div><div class="col-xs-6"></div></div><table id="example2" class="table table-bordered table-hover dataTable" aria-describedby="example2_info">
                                        <thead>
                                            <!--<tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Date Aired</th>-->
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Crawler ID</th>
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">location ID</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Crawler Message</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Start Date </th>
                                             <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">End Date</th>
                                             <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Playlist Id</th>
                                             <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">View Logs </th>
                                             
                                             
                                             <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Edit Details</th>
                                             <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Status</th>
                                             
                                        </thead>
                                        
                                        <!--<tfoot>
                                            <!--<tr><th rowspan="1" colspan="1">Date Aired</th>-->
                                            <!--<th rowspan="1" colspan="1">Play List</th>
                                                <!--<th rowspan="1" colspan="1">Location Code</th>-->
                                                <!--<th rowspan="1" colspan="1">Clients Code</th>-->
                                                <!--<th rowspan="1" colspan="1">FileName Code</th>-->
                                                <!--<th rowspan="1" colspan="1">FileName</th>
                                                <th rowspan="1" colspan="1">Lenght</th>
                                                <th rowspan="1" colspan="1">Daily Loops</th>
                                                <th rowspan="1" colspan="1">From</th>
                                                <th rowspan="1" colspan="1">Expire</th>
                                                
                                                <th rowspan="1" colspan="1">Days Left</th>
                                                <th rowspan="1" colspan="1">View Logs</th>
                                                <th rowspan="1" colspan="1">Edit Details</th>
                                                <th rowspan="1" colspan="1">Status</th>
                                            </tr>
                                        </tfoot>-->
                                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                                                <!--tables-->
                                                
                                                <?php

foreach($data as $data){
    echo "<tr>";
    echo "<td>" . $data->crawler_id . "</td>";
    echo "<td>" . $data->location_id . "</td>";
    echo "<td>" . $data->crawler_message . "</td>";
    echo "<td>" . $data->start_date . "</td>";
    echo "<td>" . $data->end_date . "</td>";
    echo "<td>" . $data->playlist_id . "</td>";
    ?><td><a href="<?php echo site_url();    ?>"><button class="btn btn-warning">View Logs</button></a></td><?php
    ?><td><a href="<?php echo site_url();    ?>/crawler/crawler/edit_crawler/<?php echo $data->crawler_id;   ?>"><button class="btn btn-primary">Edit Details</button></a></td><?php
    if($data->end_date >= date("Y-m-d")){
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
</div>
 
<?php $this->load->view('template/footer'); ?>

<script>
                                $(document).ready(function(){
                                    $("#save").click(function(){
                                        var datas = {
                                            locationcode : "<?php echo $location_code; ?>",
                                            
                                            
                                            ajax : '1'
                                        };
                                        $.ajax({
                                            url : "<?php echo site_url();   ?>/crawler/crawler/add_new_crawler",
                                            type : "post",
                                            data : datas,
                                            success : function(msg){
                                                $("#content").html(msg);
                                            }
                                        });
                                    });
                                });
                                </script>