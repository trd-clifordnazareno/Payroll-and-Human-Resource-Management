<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if($button == 1){
    ?>
        
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="click">Update Online</button>
        
      </div>
        
        
        <?php
}
?>

<script>
        $(document).ready(function(){
    $("#click").click(function(){
                                        var datas = {
                                            loc_code : $("#txtfname").val(),
                                            reason : $("#summary").val(),
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