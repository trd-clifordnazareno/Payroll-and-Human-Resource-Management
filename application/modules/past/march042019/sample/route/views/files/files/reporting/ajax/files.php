<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//echo "<button>" . $data . "</button>";
?>

<div class="row">

                                        <?php 
foreach($data as $data){
    ?><div class="col-md-3"><div class="external-event bg-transparent ui-draggable" style="position: relative;">
        <!--<ul id="nav"> <li>-->                          
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style='background-color:#281672;'>×</button><?php
    echo "<a id='b' href='$data->location_code/$data->clients_code'><button class=btn bg-purple btn-flat style='background-color:#281672; color:white'>" . $data->location_code . "</button></a>";
    ?><!--</li></ul>--></div></div><?php
}?>
</div>

<?php  //echo $end.$start;  ?>
<?php $format_start_time = strtotime($start);
$format_end_time = strtotime($end); 
$start_date_time =  date("Y-m-d H:i:s", $format_start_time);
$end_date_time = date("Y-m-d H:i:s", $format_end_time);
$all_date = $end_date_time.$start_date_time;?>



<script>
    $(document).ready(function(){
        $("a").click(function(){
             var page = $(this).attr('href');
             $('#x').load('<?php echo site_url();   ?>/reports/reports/go/' + page + '/<?php echo $format_start_time. '/' .$format_end_time;   ?>');
             return false;
        });
       
    });
    </script>