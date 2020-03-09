<?php $this->load->view('template/header'); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE | Calendar</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="http://192.168.254.111/rmn/js/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="http://192.168.254.111/rmn/js/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="http://192.168.254.111/rmn/js/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- fullCalendar -->
        <link href="http://192.168.254.111/rmn/js/css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
        <link href="http://192.168.254.111/rmn/js/css/fullcalendar/fullcalendar.print.css" rel="stylesheet" type="text/css" media='print' />
        <!-- Theme style -->
        <link href="http://192.168.254.111/rmn/js/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        
        
        
        <!--for date bootstrap-->
        
        
        
        
         <link href="http://192.168.254.111/rmn/js/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="http://192.168.254.111/rmn/js/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="http://192.168.254.111/rmn/js/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- daterange picker -->
        <link href="http://192.168.254.111/rmn/js/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- iCheck for checkboxes and radio inputs -->
        <link href="http://192.168.254.111/rmn/js/css/iCheck/all.css" rel="stylesheet" type="text/css" />
        <!-- Bootstrap Color Picker -->
        <link href="http://192.168.254.111/rmn/js/css/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet"/>
        <!-- Bootstrap time Picker -->
        <link href="http://192.168.254.111/rmn/js/css/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>
        <!-- Theme style -->
        <link href="http://192.168.254.111/rmn/js/css/AdminLTE.css" rel="stylesheet" type="text/css" />

        
        
        
        <!--for date bootstrap-->
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="../index.html" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                <!--AdminLTE-->
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            
        </header>
        <div>
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h4 class="box-title">Locations</h4>
                                </div>
                                <div class="box-body">
                                    <!-- the events -->
                                    <div id='external-events'>                                        
                                        <!--<div class='external-event bg-green'>Lunch</div>-->
                                        <!--<div class='external-event bg-red'>Go home</div>
                                        <div class='external-event bg-aqua'>Do homework</div>
                                        <div class='external-event bg-yellow'>Work on UI design</div>
                                        <div class='external-event bg-navy'>Sleep tight</div>-->
                                        <p>
                                            <!--<input type='checkbox' id='drop-remove' /> <label for='drop-remove'>remove after drop</label>-->
                                        </p>
                                    </div>
                                </div><!-- /.box-body -->
                            </div><!-- /. box -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Search Clients</h3>
                                </div>
                                <div class="box-body">
                                    <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                                        <!--<button type="button" id="color-chooser-btn" class="btn btn-danger btn-block btn-sm dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
                                        <ul class="dropdown-menu" id="color-chooser">
                                            <li><a class="text-green" href="#"><i class="fa fa-square"></i> Green</a></li>
                                            <!--<li><a class="text-blue" href="#"><i class="fa fa-square"></i> Blue</a></li>                                            
                                            <li><a class="text-navy" href="#"><i class="fa fa-square"></i> Navy</a></li>                                            
                                            <li><a class="text-yellow" href="#"><i class="fa fa-square"></i> Yellow</a></li>
                                            <li><a class="text-orange" href="#"><i class="fa fa-square"></i> Orange</a></li>
                                            <li><a class="text-aqua" href="#"><i class="fa fa-square"></i> Aqua</a></li>
                                            <li><a class="text-red" href="#"><i class="fa fa-square"></i> Red</a></li>
                                            <li><a class="text-fuchsia" href="#"><i class="fa fa-square"></i> Fuchsia</a></li>
                                            <li><a class="text-purple" href="#"><i class="fa fa-square"></i> Purple</a></li>-->
                                        </ul>
                                    </div><!-- /btn-group -->
                                    <div class="row">
                                         <div class="col-md-6">
                                    <div class="form-group">
                                    <div class="input-group">                                          
                                        <!--<input id="new-event" type="text" class="form-control" placeholder="Event Title">-->
                                        
                                        
                                        
                                        <div id="page-wrapper">
                                        <input id="new-event" type="text" class="form-control" list="languages" placeholder="CLIENTS NAME" style="margin-top: -40px; font-size: 3rem;">
  
                                        <datalist id="languages">
                                            <!--<option value="HTML">dfsdfsf</option>
                                        <option value="CSS">
                                        <option value="JavaScript">
                                        <option value="Java">
                                        <option value="Ruby">
                                        <option value="PHP">
                                        <option value="Go">
                                        <option value="Erlang">
                                        <option value="Python">
                                        <option value="C">
                                        <option value="C#">
                                        <option value="C++">-->
                                            <?php
                                            
                                            
                                            foreach($datas as $data){
                                                echo "<option value='$data->client_name'>";
                                            }
                                            
                                            
                                            ?>
                                        </datalist>
                                        </div>
                                        
                                        
                                        
                                        
                                        <div class="input-group-btn">
                                            <button id="add-new-event" type="button" class="btn btn-default btn-flat" style="margin-top: -40px;">ADD</button>
                                        </div><!-- /btn-group -->
                                    </div><!-- /input-group -->
                                </div>
                                         </div>
                                        <div class="col-md-6" style="margin-top:-50px;">
                                    <div class="form-group">
                                        <label>Date and time range:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="reservationtime">
                                        </div><!-- /.input group -->
                                    </div>
                                         </div>
                                    </div>
                            </div>
                        </div><!-- /.col -->
</div>
                        
                        
                        
        <!--<button id="btn">click</button>-->
                        
                        
                        
                        <div id="x"></div>
                        
                        
                        
                        
                        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="http://192.168.254.111/rmn/js/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- InputMask -->
        <script src="http://192.168.254.111/rmn/js/js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
        <script src="http://192.168.254.111/rmn/js/js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
        <script src="http://192.168.254.111/rmn/js/js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
        <!-- date-range-picker -->
        <script src="http://192.168.254.111/rmn/js/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- bootstrap color picker -->
        <script src="http://192.168.254.111/rmn/js/js/plugins/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
        <!-- bootstrap time picker -->
        <script src="http://192.168.254.111/rmn/js/js/plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="http://192.168.254.111/rmn/js/js/AdminLTE/app.js" type="text/javascript"></script>

        <!-- jQuery 2.0.2 -->
        <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- jQuery UI 1.10.3 -->
         <!--<script src="http://localhost/rmn/js/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
         <!--<script src="http://localhost/rmn/js/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
         <!--<script src="http://localhost/rmn/js/js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- fullCalendar -->
         <!--<script src="http://localhost/rmn/js/js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <!-- Page specific script -->
        <script type="text/javascript">
            $(function() {

                /* initialize the external events
                 -----------------------------------------------------------------*/
                function ini_events(ele) {
                    ele.each(function() {

                        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                        // it doesn't need to have a start or end
                        var eventObject = {
                            title: $.trim($(this).text()) // use the element's text as the event title
                        };

                        // store the Event Object in the DOM element so we can get to it later
                        $(this).data('eventObject', eventObject);

                        // make the event draggable using jQuery UI
                        $(this).draggable({
                            zIndex: 1070,
                            revert: true, // will cause the event to go back to its
                            revertDuration: 0  //  original position after the drag
                        });

                    });
                }
                ini_events($('#external-events div.external-event'));

                /* initialize the calendar
                 -----------------------------------------------------------------*/
                //Date for the calendar events (dummy data)
                
                

                /* ADDING EVENTS */
                var currColor = "white"; //Red by default
                //Color chooser button
                var colorChooser = $("#color-chooser-btn");
                $("#color-chooser > li > a").click(function(e) {
                    e.preventDefault();
                    //Save color
                    currColor = $(this).css("color");
                    //Add color effect to button
                    colorChooser
                            .css({"background-color": currColor, "border-color": currColor})
                            .html($(this).text()+' <span class="caret"></span>');
                });
                $("#add-new-event").click(function(e) {
                    
                    e.preventDefault();
                    //Get value and make sure it is not null
                    var val = $("#new-event").val();
                    if (val.length == 0) {
                        return;
                    }
                    
                    var datas = {
                                            
                                            txt : $("#new-event").val(),
                                            timelaps : $("#reservationtime").val(),
                                            
                                            ajax : '1'
                                        };
                                        $.ajax({
                                            url : "<?php echo site_url();   ?>/reports/reports/txt",
                                            type : "post",
                                            data : datas,
                                            success : function(msg){
                                                //Create event
                                                var event = $("<div style=display:inline-flex;/>");
                                                event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
                                                event.html(msg);
                                                $('#external-events').prepend(event);

                                                //Add draggable funtionality
                                                ini_events(event);

                                                //Remove event from text input
                                                $("#new-event").val("");
                                            }
                                        });
                                        
                                        
                                        
                                        
                    

                    
                });
            });
        </script>
        <script>
$(document).ready(function(){
  $('#b').click(function(){
  alert($('#b').attr("href"));
  });
});
</script>




 <script type="text/javascript">
            $(function() {
                //Datemask dd/mm/yyyy
                $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
                //Datemask2 mm/dd/yyyy
                $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
                //Money Euro
                $("[data-mask]").inputmask();

                //Date range picker
                $('#reservation').daterangepicker();
                //Date range picker with time picker
                $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
                //Date range as a button
                $('#daterange-btn').daterangepicker(
                        {
                            ranges: {
                                'Today': [moment(), moment()],
                                'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                                'Last 7 Days': [moment().subtract('days', 6), moment()],
                                'Last 30 Days': [moment().subtract('days', 29), moment()],
                                'This Month': [moment().startOf('month'), moment().endOf('month')],
                                'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                            },
                            startDate: moment().subtract('days', 29),
                            endDate: moment()
                        },
                function(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                }
                );

                //iCheck for checkbox and radio inputs
                $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal',
                    radioClass: 'iradio_minimal'
                });
                //Red color scheme for iCheck
                $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                    checkboxClass: 'icheckbox_minimal-red',
                    radioClass: 'iradio_minimal-red'
                });
                //Flat red color scheme for iCheck
                $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                    checkboxClass: 'icheckbox_flat-red',
                    radioClass: 'iradio_flat-red'
                });

                //Colorpicker
                $(".my-colorpicker1").colorpicker();
                //color picker with addon
                $(".my-colorpicker2").colorpicker();

                //Timepicker
                $(".timepicker").timepicker({
                    showInputs: false
                });
            });
        </script>


    </body>
</html>



<script>
    $(document).ready(function(){
  $('#btn').click(function(){
  var datas = {
                                            
                                            timelaps : $("#reservationtime").val(),
                                            
                                            ajax : '1'
                                        };
                                        $.ajax({
                                            url : "<?php echo site_url();   ?>/reports/reports/gettime",
                                            type : "post",
                                            data : datas,
                                            success : function(msg){
                                                //Create event
                                                alert(msg);
                                            }
                                        });
  });
});
    </script>
<!--





-->