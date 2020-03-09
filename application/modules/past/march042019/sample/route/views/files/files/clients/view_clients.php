<?php $this->load->view('template/header'); ?>

<div id="content"></div>
<?php $this->load->view('template/footer'); ?>




<script>
    $(document).ready(function(){
       $("#content").load("<?php echo site_url();    ?>/clients/clients/load_clients");
    });
    </script>
