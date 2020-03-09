<?php $this->load->view('template/header'); ?>

<div class="row">
    <center><b style="font-size: 20px; font-family: monospace;">ISSUES</b></center>
    <div class="col-xs-12 col-md-12">
        <table class="table table-condensed table-hover table-bordered">
            <thead>
            <tr>
                <th>Location Code</th>
                <th>Subject</th>
            </tr>
            </thead>
            <tbody>
                <?php
                foreach($get_loc as $get_loc){
                ?>
                <tr>
                <td><?php  echo $get_loc->location_code;  ?></td>
                <td><?php  echo $get_loc->location_name;  ?></td>
               
                <?php
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
          <b> LOCATION NAME : </b>
        <p><input type="text" class="input-sm" id="txtlname" style="width: 400px; text-align: center;"/></p>
        
        
        <!---->
        <div class="col-xs-12">
    <div class="form-group">
        <div class="btn-group" role="group" aria-label="Selection type" id="off_button">
            <button type="button" class="btn btn-default BtnType" value="1" id="off">Food</button>   </div>       
            <div class="btn-group" role="group" aria-label="Selection type" id="on_button">
            <button type="button" class="btn btn-default BtnType" value="0" id="on">Drink</button></div>   
        
    </div>
</div>
        <!---->
      </div>
       
        
        
        
        
        
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
    });
 });
</script>
<script>
    $(document).ready(function () {
    $('#divType button').click(function () {
        $(this).addClass('active').siblings().removeClass('active');
        $('#<%= hidType.ClientID%>').val($(this).data('value'));
        //alert($(this).data('value'));             
    });
});
    </script>

<script>
    $(document).ready(function(){
        $("#off_button").click(function(){
            
    var datas = {
                                            loc_code : $("#txtfname").val(),
                                            status : 1,
                                            ajax : '1'
                                        };
                                        $.ajax({
                                            url : "<?php echo site_url();   ?>/failuretoair/failuretoair/switch_stat/",
                                            type : "post",
                                            data : datas,
                                            success : function(msg){
                                                alert("off");
                                                window.location = "http://192.168.254.111/rmn/index.php/failuretoair/failuretoair/get_all_loc ";
                                            }
                                        });                             
         });
         });
         
         </script>
           <script>
         
         $(document).ready(function(){
        $("#on_button").click(function(){
                  var datas = {
                                            loc_code : $("#txtfname").val(),
                                            status : 0,
                                            ajax : '1'
                                        };
                                        $.ajax({
                                            url : "<?php echo site_url();   ?>/failuretoair/failuretoair/switch_stat/",
                                            type : "post",
                                            data : datas,
                                            success : function(msg){
                                                alert("on");
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

