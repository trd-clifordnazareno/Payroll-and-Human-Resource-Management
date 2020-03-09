<?php
        
        echo "</br>";
        if(isset($error)){
            ?>
                <div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b> <?php echo $error; ?>
                                        <?php echo "</br></br>";   ?>
                                        <?php echo validation_errors();   ?>
                                    </div>
                <?php
        }
        
        ?>



<?php    
if(isset($create_loc)){
 ?>
<a href="<?php echo site_url();   ?>/locations/locations/create_loc">Back To Create Location</a>
<?php
        }
   ?>