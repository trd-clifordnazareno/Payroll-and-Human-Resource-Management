
<?php $this->load->view('template/header'); ?>

<ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo $page_content;    ?></a></li>
                        <li class="active"><!--Widgets--><?php if(isset($page_content2))echo $page_content2;   ?></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- /.content -->

<?php $this->load->view('template/footer'); ?>




<script>
$(document).ready(function(){
    $('#logins').click(function(){
        var datas = {
                ajax : '1'
            };
            $.ajax({
                url : "<?php echo site_url();   ?>/home_page/goh",
                type : "post",
                data : datas,
                success : function(msg){
                    alert('ok');
                }
            });
    });
});
</script>
