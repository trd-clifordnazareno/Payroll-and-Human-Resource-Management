<?php $this->load->view('template/header'); ?>

<div class="row">
    <center><b style="font-size: 20px; font-family: monospace;">ISSUES</b></center>
    <div class="col-xs-12 col-md-12">
        <table class="table table-condensed table-hover table-bordered">
            <thead>
            <tr>
                <th>Location Code</th>
                <th>Subject</th>
                <th>Report Date</th>
            </tr>
            </thead>
            <tbody>
                <?php
                foreach($get_fail_loc as $get_fail_loc){
                    if($get_fail_loc->is_fail == 1){
                ?>
                <tr>
                <td><?php  echo $get_fail_loc->location_code;  ?></td>
                <td><?php  echo $get_fail_loc->subject;  ?></td>
                <td><?php  echo $get_fail_loc->report_date;  ?></td>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    
    
    
    
    
    <center><b style="font-size: 20px; font-family: monospace;">RESOLVED ISSUES</b></center>
    <div class="col-xs-12 col-md-12">
        <table class="table table-condensed table-hover table-bordered">
            <thead>
            <tr>
                <th>Location Code</th>
                <th>Subject</th>
                <th>Report Date</th>
                <!--<th>Settings</th>-->
            </tr>
            </thead>
            <tbody>
                <?php
                foreach($get_fail_locs as $get_fail_locs){
                    if($get_fail_locs->is_fail == 0){
                ?>
                <tr>
                <td><?php  echo $get_fail_locs->location_code;  ?></td>
                <td><?php  echo $get_fail_locs->subject;  ?></td>
                <td><?php  echo $get_fail_locs->resume_date;  ?></td>
                <!--<td><button class="btn btn-danger btn-flat"> Delete </button></td>-->
                 <!--<td><a href="<?php //echo site_url();    ?>/failuretoair/failuretoair/get_clients/<?php  //echo $get_fail_locs->location_code;   ?>"><button>Show Clients</button></a></td>-->
                <!--<td><a href="<?php //echo site_url();    ?>/failuretoair/failuretoair/failure_report_view/<?php  //echo $get_fail_locs->location_code;   ?>"><button>PDF</button></a></td>-->
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
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
                                    <!--modal-->
    
<?php $this->load->view('template/footer'); ?>

    
    
                                    
                                    
                                    
                                    <script>
 $(document).ready(function(){
    $('table tbody tr  td').on('click',function(){
    $("#myModal").modal("show");
    <?php
    //$x = 0;
    //foreach($get_fail_loc as $data){
        //$x = $x + 1;
    //}
    //for($i =0;$i < $x;$i++){
    ?>   
    <?php
    //}
    ?>
    $("#txtfname").val($(this).closest('tr').children()[0].textContent);  
    $("#txtlname").val($(this).closest('tr').children()[1].textContent);
    $("#rep_date").val($(this).closest('tr').children()[2].textContent);
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
    
    <!--<script>
        $(document).ready(function(){
                                    $("#show_edit").click(function(){
                                        alert("<?php //echo $data->location_code;   ?>");
                                    });
                                });
        </script>-->

