

            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

<script src="<?php echo base_url();   ?>/js/css/jquery.min.js"></script>
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>-->
        <!-- Bootstrap -->
        <script src="<?php echo base_url();   ?>/js/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url();   ?>/js/js/AdminLTE/app.js" type="text/javascript"></script>
        
        
        
        

    </body>
    
</html>

<script>
                                $(document).ready(function(){
                                    //$("#upload_all").hide();
                                    $("#create_account_client").click(function(){
                                        var datas = {
                                            
                                            client_username_account : $("#client_username_account").val(),
                                            client_password : $("#client_password").val(),
                                            company_name : $("#company_name").val(),
                                            user_type : $("#user_type").val(),
                                            ajax : '1'
                                        };
                                        $.ajax({
                                            url : "<?php echo site_url();   ?>/clients/clients/create_clients_account/",
                                            type : "post",
                                            data : datas,
                                            success : function(msg){
                                                //alert("File Successfully Uploaded");
                                                $("#dis_client_msg").html(msg);
                                                //alert($("#file_name").val());
                                                //alert("YOUVE SUCCESSFULLY ADDED NEW CLIENT ACCOUNT");
                                            }
                                        });
                                    });
                                });
                                </script>