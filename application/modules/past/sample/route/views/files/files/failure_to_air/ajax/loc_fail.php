<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo $loc_pos;
foreach($get_fail_loc as $data){
    
}



?>



<div class="box-body table-responsive">
                                    <div id="example2_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-xs-6"></div><div class="col-xs-6"></div></div>
                                        <table id="example2" class="table table-bordered table-hover dataTable" aria-describedby="example2_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Location Signage</th>
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Status</th>
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Settings</th>
                                        </thead>
                                        
                                        
                                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                                        <?php
                                        
                                        foreach($get_fail_loc as $data){
                                            echo "<tr>";
                                            echo "<td>$data->location_code</td>";
                                            echo "<td>$data->subject</td>";
                                            echo "<td><button id='show_edit'>EDIT</button></td>";
                                             echo "</tr>";
                                        }
                                        
                                        ?>
                                        <!--<tr class="odd">
                                                <td class="  sorting_1">Gecko</td>
                                                <td class=" ">Firefox 1.0</td>
                                                <td class=" ">Win 98+ / OSX.2+</td>
                                                <td class=" ">1.7</td>
                                                <td class=" ">A</td>
                                            </tr>-->
                                    </tbody>
                                        
                                </div>
    
    
    
    <!--<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">EDIT</h4>
      </div>
      <div class="modal-body">
        <p><input type="text" class="input-sm" id="txtfname"/></p>
        <p><input type="text" class="input-sm" id="txtlname"/></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  <!--</div><!-- /.modal-dialog -->
<!--</div><!-- /.modal -->
<center>
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">LOCATION SIGNAGE</h4>
      </div>
      <div class="modal-body">
          <b>LOCATION CODE : </b>
          <p><input type="text" class="input-sm" id="txtfname" style="width: 400px; text-align: center;"/></p>
          <b> SUBJECT : </b>
        <p><input type="text" class="input-sm" id="txtlname" style="width: 400px; text-align: center;"/></p>
        <b> REPORT DATE : </b>
        <p><input type="text" class="input-sm" id="rep_date" style="width: 400px; text-align: center;"/></p>
        <div id="con"></div>
        <div id="add_text_box"></div>
        <button type="button" class="btn bg-navy btn-flat margin" id="add_box">Add</button>
         <div id="resume"></div>
      </div>
        <div id="button"></div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</center>

<script>
 $(document).ready(function(){
    $('table tbody tr  td').on('click',function(){
    $("#myModal").modal("show");
    $("#txtfname").val($(this).closest('tr').children()[0].textContent);  
    $("#txtlname").val($(this).closest('tr').children()[1].textContent);
    });
 });
</script>



<script>
 $(document).ready(function(){
     setInterval(function(){ 
     $("#con").load("<?php echo site_url();    ?>/failuretoair/failuretoair/go/" + $("#txtfname").val());
    }, 1000);
     
    
 });
</script>
<script>
 $(document).ready(function(){
     setInterval(function(){ 
     $("#button").load("<?php echo site_url();    ?>/failuretoair/failuretoair/button/" + $("#txtfname").val());
    }, 3000);
 });
</script>
<script>
    $("#add_box").click(function(){
                                        var datas = {
                                            ajax : '1'
                                        };
                                        $.ajax({
                                            url : "<?php echo site_url();   ?>/failuretoair/failuretoair/add_text_box/",
                                            type : "post",
                                            data : datas,
                                            success : function(msg){
                                                $("#add_text_box").html(msg);
                                                //alert($("#enddate").val());
                                            }
                                        });
                                    });
    </script>
    
    
    
    
    <script>
        $(document).ready(function(){
    $("#click").click(function(){
                                        var datas = {
                                            loc_code : $("#txtfname").val(),
                                            reason : $("#reason").val(),
                                            ajax : '1'
                                        };
                                        $.ajax({
                                            url : "<?php echo site_url();   ?>/failuretoair/failuretoair/resume_fail/",
                                            type : "post",
                                            data : datas,
                                            success : function(msg){
                                                $("#resume").html(msg);
                                                //alert($("#enddate").val());
                                            }
                                        });
                                    });
                                     });
    </script>