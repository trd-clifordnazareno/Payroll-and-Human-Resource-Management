<?php $this->load->view('template/header'); ?>
<div id="content">
<button class="btn btn-primary btn-lg" id="failure_to_air">FAILURE TO AIR</button>
</div>

<?php $this->load->view('template/footer'); ?>



<script>
                                $(document).ready(function(){
                                    $("#failure_to_air").click(function(){
                                        var datas = {
                                            ajax : '1'
                                        };
                                        $.ajax({
                                            url : "<?php echo site_url();   ?>/failuretoair/failuretoair/method/form",
                                            type : "post",
                                            data : datas,
                                            success : function(msg){
                                                $("#content").html(msg);
                                            }
                                        });
                                    });
                                });
                                </script>