<?php

if(isset($datas))
{
    $str = 0;
    foreach($datas as $data){
        $datas = $data->crawler_message;
        $str = $str + strlen($datas);
        echo $datas;
        
    }
    //echo $str;
    
}
?>


   <?php
   
   echo $data;
   
   ?>
    <div id="div3"></div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    setTimeout(function(){
        $("#div2").load("<?php echo site_url();   ?>/clients/clients/display_crawler_interval");
    }, <?php 
        echo $str;
       ?>);
        
 
});
</script>
</head>
<body>

<marquee  direction="right" scrollamount="30" scrolldelay="20" onmouseover="this.stop()"
     onmouseout="this.start()" width="100%" loop="1" onfinish="javascript:alert('finish');" >
         sample
        
</marquee>


