<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

foreach($image as $image){
    ?>


<div class="item"> <?php $file_name_path = (explode("C:/xampp/htdocs/rmn",$image->file)); ?> <img src="http://localhost/rmn<?php echo $file_name_path[1];    ?>" alt="user image" class="offline" style="width: 50px; height: 30px; margin-left: -300px; margin-top: -10px; background: #f00; width: 50px; height: 50px; border-radius: 50%;"> <small class="text-muted pull-right"><i class=""></i> <!--5:15--></small><?php $expld_trd = (explode("ADS",$image->client_name)); ?><?php $expld_trds = (explode("00000000",$expld_trd[1])); ?> <?php $expld_trds = (explode("0000000",$expld_trd[1])); ?> <?php $expld_trds = (explode("000000",$expld_trd[1])); ?> <?php $expld_trds = (explode("00000",$expld_trd[1])); ?><p style="margin-top: -26px; margin-left: -150px; font-size: 19px;"><?php echo $expld_trds[0];    ?></p> 
                        <div class="attachment">
                       
                        </div>
                        
                    </div>
<?php
break;
}