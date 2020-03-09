
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title;   ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php  echo base_url();     ?>js/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php  echo base_url();     ?>js/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php  echo base_url();     ?>js/bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php  echo base_url();     ?>js/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php  echo base_url();     ?>js/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php  echo base_url();     ?>js/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php  echo base_url();     ?>js/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?php  echo base_url();     ?>js/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php  echo base_url();     ?>js/bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php  echo base_url();     ?>js/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php  echo base_url();     ?>js/dist/css/skins/_all-skins.min.css">
  <!--add on new-->
  <link rel="stylesheet" href="<?php  echo base_url();     ?>js/bower_components/morris.js/morris.css">
  <link rel="stylesheet" href="<?php  echo base_url();     ?>js/bower_components/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="<?php  echo base_url();     ?>js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- add on new -->
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <!--<link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <ul class="sidebar-menu" data-widget="tree">
          <?php if($user == "admin"):     ?>
      <li><a href="<?php  echo site_url();     ?>/admin/daily_time_record"><i class="fa fa-book"></i> <span>DAILY TIME RECORDS</span></a></li>
        <li><a href="<?php  echo site_url();     ?>/admin/payroll_sheet"><i class="fa fa-calendar"></i> <span>PAYROLL RECORDS</span></a></li>
        <li><a href="<?php  echo site_url();     ?>/admin/employee"><i class="fa fa-user"></i> <span>EMPLOYEE</span></a></li>
          <li><a href="<?php  echo site_url();     ?>/admin/leaves"><i class="fa fa-user-times"></i> <span>LEAVES</span></a></li>
          <li><a href="<?php  echo site_url();     ?>/admin/approval"><i class="fa fa-thumbs-up"></i> <span>APPROVAL</span></a></li>
          <li><a href="<?php  echo site_url();     ?>/admin/Bracket_For_Gov_Rem"><i class="fa fa-list-ol"></i> <span>BRAKETS</span></a></li>
          <li><a href="<?php  echo site_url();     ?>/admin/department"><i class="fa fa-building"></i> <span>DEPARTMENT</span></a></li>
          <li><a href="<?php  echo site_url();     ?>/admin/position"><i class="fa fa-wheelchair"></i> <span>POSITION</span></a></li>
		  <li><a href="<?php  echo site_url();     ?>/admin/add_on"><i class="fa fa-wheelchair"></i> <span>Add On</span></a></li>
		  <li><a href="<?php  echo site_url();     ?>/admin/deduction_advances"><i class="fa fa-wheelchair"></i> <span>Deduction and Advances</span></a></li>
          <?php  endif;   ?>
      </ul>
      <!-- search form -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      
    </section>
    <!-- /.sidebar -->
  </aside>