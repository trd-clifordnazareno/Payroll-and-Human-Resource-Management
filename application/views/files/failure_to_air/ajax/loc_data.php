
<?php   if($is_fail == 0){
   ?>
<?php 
echo "<center><b>RESUME DATE : </b></center>";
echo "<input type='text' class='input-sm' style='width:400px; text-align: center;' value='$resume_date'>";    ?>
<div class="form-group">
    <label for="exampleInputEmail1"> FIXED ISSUES : </label></br>
 <textarea rows="4" cols="50" type="textarea" class="form-control" placeholder="Enter text" style="width: 400px; text-align: center;" id="reason" disabled><?php echo $reason_data;    ?></textarea>
</div>
<div class="form-group">
    <label for="exampleInputEmail1"> SUMMARY : </label></br>
 <textarea rows="4" cols="50" type="textarea" class="form-control" placeholder="Enter text" style="width: 400px; text-align: center;" id="reason" disabled><?php echo $summary_data;    ?></textarea>
</div>
<?php
} else if($is_fail == 1){
    ?>

<div class="form-group">
    <label for="exampleInputEmail1"> REASON : </label></br>
 <textarea rows="4" cols="50" type="textarea" class="form-control" placeholder="Enter text" style="width: 400px; text-align: center;" id="reason"><?php echo $reason_data;    ?></textarea>
</div>

<?php
}  ?>


<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
echo "<center><b>Affected Clients</b></center>";
echo "<table border=1>";
foreach($loc_data as $data){
    echo "<tr ><td width=400 style='text-align: center;'><a href='http://192.168.254.111/rmn/index.php/failuretoair/failuretoair/failure_report_view/$loc_code/$data->clients_code' target='_blank'>$data->clients_code</td></tr>";
}
echo "</table>";
echo "</br>";
