<?php $this->load->view('template/header'); ?>
<ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo $page_content;    ?></a></li>
                        <li class="active"><!--Widgets--><?php echo $page_content2;   ?></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- /.content -->
<div id="content"></div>

<?php $this->load->view('template/footer'); ?>

<script>
    $(document).ready(function(){
       $("#content").load("<?php echo site_url();    ?>/users/display_users/all_users");
    });
    </script>