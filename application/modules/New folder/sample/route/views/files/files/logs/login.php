<!DOCTYPE html>
<div id="content">
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title><?php if(isset($title)){ echo $title ; }   ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url();    ?>js/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo base_url();    ?>js/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url();    ?>js/css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">
<?php
if(isset($error)){
    echo "</br>"
    ?>
        <div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b> <?php echo $error;    ?>
                                    </div>
        <?php
}
 ?>
        <div class="form-box" id="login-box">
            <div class="header" style="background-color: #376cda;"><img src="<?php echo base_url();    ?>/image/rmni-logo.png" sign="" div="" style="height: 51px;
    margin-left: -17px;
    margin-top: -10px;
    width: 190px;
}"><!--Sign In--></div>
            <form action="<?php echo site_url();   ?>/admin/login/method/log" method="post">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="User ID"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password"/>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="remember_me"/> Remember me
                    </div>
                </div>
                <div class="footer">
                    <button type="submit" class="btn bg-olive btn-block" id="logins" style="background: #376cda;">Sign me in</button>

                    <p><a href="#">I forgot my password</a></p>

                    <a href="register.html" class="text-center">Register a new membership</a>
                </div>
            </form>

            <div class="margin text-center">
                <!--<span>Sign in using social networks</span>-->
                <br/>
                <!--<button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
                <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
                <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>-->

            </div>
        </div>


        <!-- jQuery 2.0.2 -->
        <script src="<?php echo base_url();   ?>js/css/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url();    ?>js/js/bootstrap.min.js" type="text/javascript"></script>

    </body>
</html>
</div>
<script>
$(document).ready(function(){
    $('#logins').click(function(){
        var datas = {
                username : $('#username').val(),
                password : $('#password').val(),
                ajax : '1'
            };
            $.ajax({
                url : "<?php echo site_url();   ?>/login/log",
                type : "post",
                data : datas,
                success : function(msg){
                    $('#content').html(msg);
                }
            });
    });
});
</script>
