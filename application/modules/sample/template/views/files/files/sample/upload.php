<?php $this->load->view('template/header'); ?>

    <?php echo $error;?>

<?php echo form_open_multipart('upload/do_upload');?>

<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>
<?php $this->load->view('template/footer'); ?>

    
   
    
    <script>
    $(document).ready(function(){
    setInterval(function(){ 
        $("#greet").load("<?php echo site_url();    ?>/adds/adds/greet/<?php  echo $data;  ?>");
    }, 1000);  
    });
    </script><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

