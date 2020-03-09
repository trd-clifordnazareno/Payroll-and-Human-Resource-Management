<html>
    <head>
        <meta charset="UTF-8">
        <title><?php if(isset($title)){echo $title;}   ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="http://richmedia.com.ph/rmni/js/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="http://richmedia.com.ph/rmni/js/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="http://richmedia.com.ph/rmni/js/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="http://richmedia.com.ph/rmni/js/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        
        
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> 
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-black">
        <?php
        if(isset($sess_username) and isset($title) and isset($page_content) and isset($sess_position) and isset($sess_department) and isset($page_content2) and isset($sess_firstname) and isset($sess_lastname)){
            $sess_username = $sess_username;
            $title = $title;
            $page_content = $page_content;
            $sess_position = $sess_position;
            $sess_department = $sess_department;
            $page_content2 = $page_content;
            $sess_firstname = $sess_firstname;
            $sess_lastname = $sess_lastname;
        }
        ?>
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="../index.html" class="logo" style="background-color:  #f2f2f2;">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                <font color="black"><div><img src="http://richmedia.com.ph/rmni/image/AgilaDS Final Crop.png" style='height: 51px;
    margin-left: -30px;
    margin-top: -10px;
    width: 100px;
}'><b style="font-size: -webkit-xxx-large;
    font-size: 15px;
    font-style: normal;
    font-family: fantasy;
    color: rgb(40, 22, 114);
    margin-right: -30px;"> CONTROL PANEL </b></div></font>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation" style="background-color: #f2f2f2;">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                    <div class="">
                     <table>
                                                <tr>
                                                    <td><button type="submit" class="btn bg-olive btn-block" data-toggle="modal" data-target="#create_client_account" style="margin-top:-10px; line-height:10px;">Create Client Account</button><td><td>&nbsp&nbsp&nbsp</td></td>
                                                    <td>
                                                        <form action="<?php echo site_url();   ?>/login/logout" method="post">
                                                    <button type="submit" class="btn bg-olive btn-block" id="logout" style="margin-top:3px; line-height:10px;">Logout</button>
                                                    </form>
                                                </td>
                                                </tr>
                                                
                                            </table>
                                        <!--<a href="#" class="btn btn-default btn-flat">Sign out</a>-->
                                        <!--<form action="<?php echo site_url();   ?>/login/logout" method="post">
                                            <button type="submit" class="btn bg-olive btn-block" id="logout" style="margin-top:3px; line-height:10px; 
 margin-left:-30%;">Logout</button>
                                        </form>-->
                                    </div>
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                            <!--<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope"></i>
                                <span class="label label-success">4</span>
                            </a>-->
                            <ul class="dropdown-menu">
                                <li class="header">You have 4 messages</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li><!-- start message -->
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="../img/avatar3.png" class="img-circle" alt="User Image"/>
                                                </div>
                                                <h4>
                                                    Support Team
                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li><!-- end message -->
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="../img/avatar2.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    AdminLTE Design Team
                                                    <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="../img/avatar.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Developers
                                                    <small><i class="fa fa-clock-o"></i> Today</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="../img/avatar2.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Sales Department
                                                    <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="../img/avatar.png" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Reviewers
                                                    <small><i class="fa fa-clock-o"></i> 2 days</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>
                        <!-- Notifications: style can be found in dropdown.less -->
                        <li class="dropdown notifications-menu">
                            <!--<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-warning"></i>
                                <span class="label label-warning">10</span>
                            </a>-->
                            <ul class="dropdown-menu">
                                <li class="header">You have 10 notifications</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-people info"></i> 5 new members joined today
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-warning danger"></i> Very long description here that may not fit into the page and may cause design problems
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users warning"></i> 5 new members joined
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-cart success"></i> 25 sales made
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="ion ion-ios7-person danger"></i> You changed your username
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
                            </ul>
                        </li>
                        <!-- Tasks: style can be found in dropdown.less -->
                        <li class="dropdown tasks-menu">
                            <!--<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-tasks"></i>
                                <span class="label label-danger">9</span>
                            </a>-->
                            <ul class="dropdown-menu">
                                <li class="header">You have 9 tasks</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Design some buttons
                                                    <small class="pull-right">20%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">20% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- end task item -->
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Create a nice theme
                                                    <small class="pull-right">40%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">40% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- end task item -->
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Some task I need to do
                                                    <small class="pull-right">60%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">60% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- end task item -->
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Make beautiful transitions
                                                    <small class="pull-right">80%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">80% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- end task item -->
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#">View all tasks</a>
                                </li>
                            </ul><!--<a href="http://richmedia.com.ph/rmni/upload_files_csv/upload_files_csv.php" style="color:white;"><button class="btn bg-blue btn-flat margin" style="margin-top:-9px;">Refresh Data Playlogs</button></a>-->
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!--<i class="glyphicon glyphicon-user"></i>-->
                                
                                <!--<button class="btn btn-primary"><a href="http://richmedia.com.ph/rmni/upload_files_csv/upload_files_csv.php">fdadasd</a></button>-->
                                
                                
                                <!--<span><?php if(isset($sess_username)){echo $sess_username;}   ?> <i class="caret"></i></span>-->
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="../img/avatar3.png" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $sess_firstname;   ?> - <?php echo $sess_lastname;   ?>
                                        <small>Position : <?php echo $sess_position;   ?></small>
                                        <small>Department : <?php echo $sess_department;   ?></small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="col-xs-4 text-center">
                                        <!--<a href="#">Followers</a>-->
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <!--<a href="#">Sales</a>-->
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <!--<a href="#">Friends</a>-->
                                    </div>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <!--<a href="#" class="btn btn-default btn-flat">Profile</a>-->
                                    </div>
                                    <div class="pull-right">
                                        <!--<a href="#" class="btn btn-default btn-flat">Sign out</a>-->
                                        <form action="<?php echo site_url();   ?>/login/logout" method="post">
                                            <button type="submit" class="btn bg-olive btn-block" id="logins">Logout</button>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas collapse-left" style="min-height: 819px;background-color: #0a10ef; background-color: rgb(40, 22, 114);">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar" style="border-bottom: transparent;">
                    <!-- Sidebar user panel -->
                    
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <!--<div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."    style="background: white;"/ >
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat" style="background: white;"><i class="fa fa-search"></i></button>
                            </span>
                        </div>-->
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="treeview" style="border: transparent;">
                            <a href="#" style="background: transparent;">
                                <i class=""></i>
                                <!--<span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp DS Locations</span>-->
                                <li style="border: transparent;"><a href="<?php echo site_url();   ?>/view_running_status/view_running_status" style="background: transparent; margin-top: -30px;"><i class="fa fa-angle-double-right"></i> Look Up Playlist</a></li>
                                
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo site_url();   ?>/view_running_status/view_running_status"><i class="fa fa-angle-double-right"></i> Look Up Playlist</a></li>
                                <!--<li><a href="UI/icons.html"><i class="fa fa-angle-double-right"></i> Icons</a></li>-->
                          </ul>
                        </li>
                        </br>
                        <!--<li style="border: transparent;"><a href="<?php echo site_url();   ?>/clients/clients/create_clients" style="background: transparent; margin-top: -30px;"><i class="fa fa-angle-double-right"></i> Upload Adds In Clients</a></li>-->
                        </br>
                        <!--<li style="border: transparent;"><a href="<?php echo site_url();   ?>/clients/clients/create_spec_clients" style="background: transparent; margin-top: -30px;"><i class="fa fa-angle-double-right"></i> Create Clients</a></li>-->
<!--</br>
                        <li style="border: transparent;"><a href="<?php echo site_url();   ?>/upload_files_csv/upload_files_csv.php" style="background: transparent; margin-top: -30px;"><i class="fa fa-angle-double-right"></i> Upload Logs</a></li>-->
                        </br>
                        <!--<li style="border: transparent;"><a href="<?php echo site_url();   ?>/reports/reports/dis_rep" style="background: transparent; margin-top: -30px;"><i class="fa fa-angle-double-right"></i> View Report</a></li>
                        </br>
                        <li style="border: transparent;"><a href="<?php echo site_url();   ?>/reports/reports" style="background: transparent; margin-top: -30px;"><i class="fa fa-angle-double-right"></i> View Report Per Location</a></li>
                        </br>-->
                        <!--<li>
                            <a href="<?php echo site_url();   ?>/home/home_page">
                                <!--<i></i> <span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Home</span>-->
                            <!--</a>
                        </li>-->
                        <!--<li class="">
                            <a href="<?php echo site_url();   ?>/users/regester_users">
                                <!--</i> <span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Regester User</span>-->
                            <!--</a>
                        </li>-->
                       <!-- <li class="treeview">
                            <a href="#">
                                <span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Charts</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo site_url();   ?>/users/display_users"><i class="fa fa-angle-double-right"></i> Display Users</a></li>
                                <!--<li><a href="charts/flot.html"><i class="fa fa-angle-double-right"></i> Flot</a></li>
                                <li><a href="charts/inline.html"><i class="fa fa-angle-double-right"></i> Inline charts</a></li>-->
                           <!--</ul>
                        </li>-->
                        
                         <!--<li class="">
                            <a href="<?php echo site_url();   ?>/locations/locations/create_loc">
                                <!--</i> <span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Enroll Digital Signage</span>-->
                            <!--</a>
                        </li>-->
                       <!-- <li class="">
                            <a href="<?php //echo site_url();   ?>/playlist/playlist/add_addvertise">
                                </i> <span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Playlist</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-edit"></i> <span>Forms</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="forms/general.html"><i class="fa fa-angle-double-right"></i> General Elements</a></li>
                                <li><a href="forms/advanced.html"><i class="fa fa-angle-double-right"></i> Advanced Elements</a></li>
                                <li><a href="forms/editors.html"><i class="fa fa-angle-double-right"></i> Editors</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-table"></i> <span>Tables</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="tables/simple.html"><i class="fa fa-angle-double-right"></i> Simple tables</a></li>
                                <li><a href="tables/data.html"><i class="fa fa-angle-double-right"></i> Data tables</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i class="fa fa-calendar"></i> <span>Calendar</span>
                                <small class="badge pull-right bg-red">3</small>
                            </a>
                        </li>
                        <li>
                            <a href="mailbox.html">
                                <i class="fa fa-envelope"></i> <span>Mailbox</span>
                                <small class="badge pull-right bg-yellow">12</small>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-folder"></i> <span>Examples</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="examples/invoice.html"><i class="fa fa-angle-double-right"></i> Invoice</a></li>
                                <li><a href="examples/login.html"><i class="fa fa-angle-double-right"></i> Login</a></li>
                                <li><a href="examples/register.html"><i class="fa fa-angle-double-right"></i> Register</a></li>
                                <li><a href="examples/lockscreen.html"><i class="fa fa-angle-double-right"></i> Lockscreen</a></li>
                                <li><a href="examples/404.html"><i class="fa fa-angle-double-right"></i> 404 Error</a></li>
                                <li><a href="examples/500.html"><i class="fa fa-angle-double-right"></i> 500 Error</a></li>
                                <li><a href="examples/blank.html"><i class="fa fa-angle-double-right"></i> Blank Page</a></li>
                            </ul>
                        </li>-->
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side strech">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?php if(isset($content_title)){echo $content_title;}?>
                        <small><!--Preview page--></small>
                    </h1>
                    
                    
                    
                    
                    <center>
<div class="modal fade" id="create_client_account">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><!--LOCATION SIGNAGE--></h4>
      </div>
        <div id="dis_client_msg"></div>
      <div class="modal-body">
          <b>Client UserName : </b>
          <p><input type="text" class="input-sm" id="client_username_account" style="width: 400px; text-align: center;" /></p>
          <b> Password : </b>
           <p><input type="text" class="input-sm" id="client_password" style="width: 400px; text-align: center;" /></p>
          <b> CompanyName : </b>
           <p><input type="text" class="input-sm" id="company_name" style="width: 400px; text-align: center;"/></p>
           <b> CompanyName : </b>
           <p><select width="300" style="
    width:  300px;
    " id="user_type">
                   <option value="user">User</option>
                   <option value="admin">Admin</option>
               </select></p>
          
          
        <div id="con"></div>
        <div id="add_text_box"></div>
        </br>
        <button type="button" class="btn bg-navy btn-flat margin" id="create_account_client">SUBMIT</button>
         <div id="resume"></div>
      </div>
        <div id="button"></div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</center>




                    <div id="login_logs"><!--last-->

<?php  
 $connect = mysqli_connect("ftp.richmedia.com.ph", "richmed_rmnitest", "i)vNPz40_As)", "richmed_rmn");  
 $query ="SELECT * FROM client_activity_log ORDER BY client_activity_log_id DESC";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
  
           
           <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> -->
        
           <div class="container">  
                <h3 align="center"></h3>  
                <br />  
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>USER NAME</td>  
                                    <td>CLIENT CORPORATE NAME</td>  
                                    <td>USERTYPE</td>  
                                    <td>LOGIN TIME</td>  
                                    <td>LOGOUT TIME</td>  
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["client_username"].'</td>  
                                    <td>'.$row["client_corporate_name"].'</td>  
                                    <td>'.$row["user_type"].'</td>  
                                    <td>'.$row["login_time"].'</td>  
                                    <td>'.$row["logout_time"].'</td>  
                               </tr>  

                               ';  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  </div> <!--last-->
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script>  
    
 <!--<div class="container box">
     <select id="sel" style="margin-top: 10px; margin-bottom:  10px; ">
        
        
       <?php //for($i = 1;$i<100;$i++) : ?>
            <option value=<?php //echo $i; ?>><?php echo $i; ?></option>;
        <?php   //endfor ; ?>
        
        
        
    </select>
     
  <div class="table-responsive" id="country_table"></div>
  
  <div align="right" id="pagination_link"></div>
  
 </div>-->
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>-->
        <!-- Bootstrap -->
        <!--<script src="http://richmedia.com.ph/rmni/js/js/bootstrap.min.js" type="text/javascript"></script>-->
        <!-- AdminLTE App -->
        <script src="http://richmedia.com.ph/rmni/js/js/AdminLTE/app.js" type="text/javascript"></script>
<script>
/*$(document).ready(function(){

 function load_country_data(pages)
 {
  $.ajax({
   url:"<?php echo site_url(); ?>/display_client_login_logs/display_client_login/pagination/"+pages+"/"+$("#sel").val(),
   method:"GET",
   dataType:"json",
   success:function(data)
   {
    $('#country_table').html(data.country_table);
    $('#pagination_link').html(data.pagination_link);
   }
  });
 }
 
 load_country_data(1);

 $(document).on("click", ".pagination li a", function(event){
  event.preventDefault();
  var pages = $(this).data('ci-pagination-page');
  load_country_data(pages);
 });

});*/
</script>








































<?php
class Display_Client_Login_Logs extends CI_controller{
  function __construct(){
    parent::__construct();
    //constructors here
    $this->load->model('clients/clients_model');
    error_reporting(0);
  }
    function index(){
        if($this->session->userdata('session_log')){
            $data = $this->session->userdata('session_log');
        
        
       $data_logs = array(
           'title' => 'Display Users',
            'page_content' => 'Display Users',
            'page_content2' => 'Display Status',
            'data' => clients_model::data_logs_view()
                );
        $this->load->view('files/client_logs/client_logs', $data_logs);
        }else{
            redirect('login');
        }
        
    }
}
