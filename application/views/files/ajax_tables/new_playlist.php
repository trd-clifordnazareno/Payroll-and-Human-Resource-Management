 <div class="form-group">
                                    <button class="btn btn-primary btn-lg" id="save">Add New Content</button>
                                    </div><!-- /.form group -->
<div class="box-body table-responsive">
                                    <div id="example2_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-xs-6"></div><div class="col-xs-6"></div></div><table id="example2" class="table table-bordered table-hover dataTable" aria-describedby="example2_info">
                                        <thead>
                                            <!--<tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Date Aired</th>-->
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Play List</th>
                                                <!--<th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Location Code</th>-->
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
                                             <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Statuss</th>
                                            </tr>
                                        </thead>
                                        
                                        <tfoot>
                                            <!--<tr><th rowspan="1" colspan="1">Date Aired</th>-->
                                            <th rowspan="1" colspan="1">Play List</th>
                                                <!--<th rowspan="1" colspan="1">Location Code</th>-->
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
                                                <th rowspan="1" colspan="1">Statuss</th>
                                            </tr>
                                        </tfoot>
                                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                                                <!--tables-->
                                                
                                                <?php
  //var_dump($data);
foreach($data as $data){
    echo "<tr>";
    //echo "<td>" . $data->date_aired . "</td>";
    echo "<td>" . $data->playlist_number . "</td>";
    //echo "<td>" . $data->location_code . "</td>";
    //echo "<td>" . $data->clients_code . "</td>";
    //echo "<td>" . $data->filename_code . "</td>";
    echo "<td>" . $data->filename . "</td>";
    echo "<td>" . $data->lenght . "</td>";
    echo "<td>" . $data->play . "</td>";
    echo "<td>" . $data->start_date . "</td>";
    echo "<td>" . $data->expire_date . "</td>";
    
    echo "<td>" . $result . "</td>";
    ?><td><a href="<?php echo site_url();    ?>"><button>View Logs</button></a></td><?php
    ?><td><a href="<?php echo site_url();    ?>/playlist/playlist/method/edit_playlist/<?php echo $data->table_location_reports_id;   ?>"><button>Edit Details</button></a></td><?php
    ?><td><a href="<?php echo site_url();    ?>/playlist/playlist/method/delete_item/<?php echo $data->sequence;   ?>"><button>Delete</button></a></td><?php
    if($data->expire >= date("Y-m-d")){
        echo "<td>" . "ACTIVE" . "</td>";
    }else{
        echo "<td>" . "EXPIRED" . "</td>";
    }
    

    echo "</tr>";
}

?>

    <script>
                                $(document).ready(function(){
                                    $("#save").click(function(){
                                        var datas = {
                                            clientname : $("#clientname").val(),
                                            filename : $("#filename").val(),
                                            length : $("#length").val(),
                                            startdate : $("#startdate").val(),
                                            starttime : $("#starttime").val(),
                                            expiredate : $("#expiredate").val(),
                                            expiretime : $("#expiretime").val(),
                                            playlist_number : $("#playlist_number").val(),
                                            ajax : '1'
                                        };
                                        $.ajax({
                                            url : "<?php echo site_url();   ?>/playlist/playlist/add_new_content",
                                            type : "post",
                                            data : datas,
                                            success : function(msg){
                                              $("#content").html(msg);
                                               
                                            }
                                        });
                                    });
                                });
                                </script>

