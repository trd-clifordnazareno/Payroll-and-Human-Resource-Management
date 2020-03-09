<?php




?>

<html class="gr__192_168_1_117"><head><style class="darkreader darkreader--fallback" media="screen"></style><style class="darkreader darkreader--text" media="screen"></style><style class="darkreader darkreader--invert" media="screen"></style><style class="darkreader darkreader--inline" media="screen">[data-darkreader-inline-bgcolor] {
  background-color: var(--darkreader-inline-bgcolor) !important;
}
[data-darkreader-inline-bgimage] {
  background-image: var(--darkreader-inline-bgimage) !important;
}
[data-darkreader-inline-border] {
  border-color: var(--darkreader-inline-border) !important;
}
[data-darkreader-inline-border-bottom] {
  border-bottom-color: var(--darkreader-inline-border-bottom) !important;
}
[data-darkreader-inline-border-left] {
  border-left-color: var(--darkreader-inline-border-left) !important;
}
[data-darkreader-inline-border-right] {
  border-right-color: var(--darkreader-inline-border-right) !important;
}
[data-darkreader-inline-border-top] {
  border-top-color: var(--darkreader-inline-border-top) !important;
}
[data-darkreader-inline-boxshadow] {
  box-shadow: var(--darkreader-inline-boxshadow) !important;
}
[data-darkreader-inline-color] {
  color: var(--darkreader-inline-color) !important;
}
[data-darkreader-inline-fill] {
  fill: var(--darkreader-inline-fill) !important;
}
[data-darkreader-inline-stroke] {
  stroke: var(--darkreader-inline-stroke) !important;
}
[data-darkreader-inline-outline] {
  outline-color: var(--darkreader-inline-outline) !important;
}</style><style class="darkreader darkreader--user-agent" media="screen">html {
    background-color: #1b1c1e !important;
}
html, body, input, textarea, select, button {
    background-color: #1b1c1e;
}
html, body, input, textarea, select, button {
    border-color: #444444;
    color: #9f9e9c;
}
a {
    color: #3068a8;
}
table {
    border-color: #3d3d3d;
}
::placeholder {
    color: #817e7a;
}
::selection {
    background-color: #104688;
    color: #adadad;
}
::-moz-selection {
    background-color: #104688;
    color: #adadad;
}
input:-webkit-autofill,
textarea:-webkit-autofill,
select:-webkit-autofill {
    background-color: #424610 !important;
    color: #9f9e9c !important;
}
::-webkit-scrollbar {
    background-color: #1e1e21;
    color: #888683;
}
::-webkit-scrollbar-thumb {
    background-color: #25272c;
}
::-webkit-scrollbar-thumb:hover {
    background-color: #282c32;
}
::-webkit-scrollbar-thumb:active {
    background-color: #2c333c;
}
::-webkit-scrollbar-corner {
    background-color: #1b1c1e;
}</style>
        <title>Leave #25</title>

        <style>
            body { margin: 0; font-family: Arial, Helvetica, sans-serif; font-size: 12px; } .form-group { margin-bottom: 20px; } table { width: 100%; } hr { margin-top: 0; } .text-left { text-align: left; } .text-center { text-align: center; } .text-right { text-align: right; } .terms { font-size: 10px !important; } .mega-font { font-size: 20px; } .big-font { font-size: 14px; } .reg-font { font-size: 11px; } .small-font { font-size: 10px; } .clearfix { height: 15px; } @page { size: auto; margin: 0mm 0mm 0mm 0mm; } #top, #main { display: block; position: relative; } #top { top: 0; left: 0; padding-top: 0.75in;} #main { margin-left: 0.75in; margin-right: 0.75in; } #bottom { display: block; position: absolute; bottom: 0; left: 0; }
        </style><style class="darkreader darkreader--sync" media="screen"></style>
    </head>

    <body data-gr-c-s-loaded="true" style="">
        <div id="top">
            <h3 class="text-center">LEAVE FORM</h3>
        </div>
        <div id="main">
            <table>
                <tbody><tr id="pioneer"><th width="25%"></th><th width="25%"></th><th width="25%"></th><th width="25%"></th></tr>
                <tr>
                    <td colspan="2"><!--Leave # 25--></td>
                    <td colspan="2" class="text-right">Date: <?php echo $file_date;     ?></td>
                </tr>

                <tr class="clearfix"></tr>

                <tr>
                    <td class="small-font">Emplotyee:</td>
                    <td colspan="3"><?php  echo $emp_name;   ?></td>
                </tr>

                <tr>
                    <td class="small-font">Reason:</td>
                    <td colspan="3"><?php  echo $reason;    ?></td>
                </tr>

                <tr>
                    <td class="small-font">Type:</td>
                    <td colspan="3"><?php if($type_of_leave == "sick%20leave"){echo "Sick Leave";}else{echo "Vacation Leave";}     ?></td>
                </tr>

                <tr>
                    <td class="small-font">Period of Leave:</td>
                    <td>Fr: <?php echo $from;     ?></td>
                    <td colspan="2">To: <?php echo $to;     ?></td>                    
                </tr>

                <tr class="clearfix"></tr>
                <tr class="clearfix"></tr>

                <tr>
                    <td>
                        Requested by: <br>
                        <br>
                        <br>
                        <?php echo $emp_name;     ?> <br>
                    </td>

                    <td colspan="2">
                        Noted by: <br>
                        <br>
                        <br>
                        ____________________
                    </td>

                    <td colspan="2">
                        Approved by: <br>
                        <br>
                        <br>
                        Jeremy Huang<br>
                        President
                    </td>
                </tr>
            </tbody></table>
        </div>

        <script type="text/javascript">
        	window.onload = window.print;
            setTimeout(window.close, 500);
        </script>
    

</body></html>


<script>

  //window.print();


</script>