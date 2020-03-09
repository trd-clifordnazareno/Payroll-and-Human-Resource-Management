<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>




<script>
    $(document).ready(function () {
        setInterval(function () {
            $("#bar").load("<?php echo site_url();   ?>/playlist/playlist/num");
        }, 0010);
    });

</script>
