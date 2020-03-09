<?php
ini_set('max_execution_time', 300);
//tcpdf();
$obj_pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$obj_pdf->SetCreator(PDF_CREATOR);
$title = "PDF Report";
$obj_pdf->SetTitle($title);
$PDF_HEADER_STRING = "sample string";
$obj_pdf->SetHeaderData("", PDF_HEADER_LOGO_WIDTH, $title, $PDF_HEADER_STRING);
$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$obj_pdf->SetDefaultMonospacedFont('helvetica');
$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->setPrintHeader(false);
$obj_pdf->setPrintFooter(true);
$obj_pdf->SetMargins(7, "", PDF_MARGIN_RIGHT);
$obj_pdf->SetMargins(17, "", PDF_MARGIN_LEFT);
$obj_pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM);
$obj_pdf->SetFont('helvetica', '', 9);
$obj_pdf->setFontSubsetting(false);
$obj_pdf->AddPage();
//ob_start();
    // we can have any view part here like HTML, PHP etc
    //$content = ob_get_contents();
//$content = "<h1>title</h1>";
$content = "</br>";

$obj_pdf->Image(base_url() . "/image/image.png", 30,3,40,30, 'PNG');
$obj_pdf->Image(base_url() . "/image/eye.JPG", 150,3,40,30, 'JPG');
$content .= "<h3></h3>";
$content .= "<h3></h3>";
$content .= "<h3></h3>";
$content .= "<h3></h3>";
$content .= "<h3></h3>";
$content .= "<h3></h3>";
$content .= "<h3></h3>";
$s = $start;

$start_d = explode("-", $s);
for($i = 1;$i < 100;$i++){
    $str_m = $client_name . " COP" . $start_d[1][0] . $start_d[1][1];
    //$content .= $str_m;
    break;
    
}
$end_d = explode("-", $end);
for($i = 1;$i < 100;$i++){
    $end_m = $end_d[1][0] . $end_d[1][1];
    //$content .= $end_m;
    break;
    
}
$yr_d = explode("-", $end);
for($i = 1;$i < 100;$i++){
    $year_m = "-" . $yr_d[0][0] . $yr_d[0][1] . $yr_d[0][2] . $yr_d[0][3];
    //$content .= $year_m;
    break;
    
}
$content .= '<p style="text-align:right;"><b>' . $str_m.$end_m.$year_m . '</b></p>';
//$content .= "<h1 style='font-size:100%;'>_________________________________________________________</h1>";
/*$content .= '<table cellpadding="0" style="font-size:3px; border-top:3px solid #000; solid #000;">';
$content .= '<tr>';
$content .= '<td>';
$content .= '</td>';

$content .= '</tr>';
$content .= '</table>';*/



$content .= '<table cellpadding="3" style="font-size:10px; border-bottom:3px solid #000;">';
$content .= '<tr>';
$content .= '<td style="width:100px; text-align:center;"><b>Client Name :</b>';
$content .= '</td>';

$content .= '<td style="width:150px;"><b>' .$client_name.'</b>';
$content .= '</td>';
$content .= '<td style="width:100px; text-align:center;"><b></b>';
$content .= '</td>';

$content .= '<td style="width:150px;"><b>' .''.'</b>';
$content .= '</td>';

$content .= '</tr>';
/*$content .= "<tr>";
$content .= "<td></td>";
$content .= "</tr>";*/
/*$content .= '<tr >';
$content .= '<td style="width:100px; text-align:center;">';
$content .= "<b></b>";
$content .= '</td>';
$content .= '<td style="width:300px;">';
/*$content .= "<table>";
    
  
   
foreach($len as $len){
    $num = explode(".", $len->lenght);
   $content .= "<tr>";
   $content .= '<td style="width:190px;">' . $len->filename . '</td> <td>' . $num[0] . '    -    SECONDS</td>';
   $content .= "</tr>";
}

   $content .= "</table>";*/
/*$content .= '</td>';

$content .= '</tr>';*/
$content .= '</table>';




/*$content .= '<table cellpadding="5" style="font-size:10px; border-top:3px solid #000; solid #000;">';
/*$content .= '<tr >';
$content .= '<td>';
$content .= '</td>';

$content .= '</tr>';*/
/*$content .= '</table>';*/



//$content .= "<p></p>";


$start = $start;
$end = $end;
$content .= '<p style="text-align:center;"><b>CERTIFICATE OF PERFORMANCE</b></p>';
$content .= 
         '<table style="font-size:10px;">'
        . '<tr>'
        . '<td style="text-align:center; align-self:center;">'
        . '</td>'
        . '<td style="text-align:center; align-self:center; text-align:right;"><b>PERIOD</b>'
        . '</td>'
        . '<td style="text-align:center; align-self:center;"><b>FROM :</b>'
        . '</td>'
        . '<td style="text-align:center; align-self:center; text-align:left;">' .  $start
        . '</td>'
        . '<td style="text-align:center; align-self:center;">'
        . '</td>'
        . '</tr>'
        
        
        
        
        
        . '<tr>'
        . '<td style="text-align:center; align-self:center;">'
        . '</td>'
        . '<td style="text-align:center; align-self:center; text-align:right;">'
        . '</td>'
        . '<td style="text-align:center; align-self:center;"><b>TO :</b>'
        . '</td>'
        . '<td style="text-align:center; align-self:center; text-align:left;">' . $end
        . '</td>'
        . '<td style="text-align:center; align-self:center;">'
        . '</td>'
        . '</tr>'
        
        . '</table>';



//$content .= "<p></p>"; 
   $content .= "<h6></h6>";     
/*$content .= "<h3></h3>";
$content .= "<h3>ClientCode : $client_id</h3>";
$content .= "<b>Client Name :</b> $client_name";
$content .= "<h4>Time : $start to $end</h4>";



$content .= "<h2>_________________________________________________________________</h2>";
 $content .= "<table border=10>";
    $content .= "<tr>";
   $content .= "<th><b>FILES</b></th> <th><b>SECONDS LENGTH</b></th><th><b>LOOPS</b></th>";
   $content .= "</tr>";
   $content .= "<td></td> <td></td>";
   $content .= "<tr>";
   $content .= "</tr>";
foreach($len as $len){
    $num = explode(".", $len->lenght);
   $content .= "<tr>";
   $content .= "<td>$len->filename</td> <td>    $num[0]</td><td>        $len->total_files</td>";
   $content .= "</tr>";
}
$content .= "</table>";*/
/*$content . '<center>';
$content .= '<table border=1 cellpadding=5 style=font-size:10px;>';
$content .= '<table border="1" cellpadding="5" style="font-size:10px; border-top:2px solid #000; border-left:3px solid #000; border-right:2px solid #000; border-bottom:2px solid #000;">';
$content .= '<tr style="font-weight:bold;text-align:center;line-height:11px;" >';
$content .= '<th border:30px solid #000 style="border:2px solid #000; background-color:#c1c5c9;">Digital Signage Location</th>';
$content .= '<th style="border:2px solid #000; background-color:#c1c5c9;">Total Spots</th>';
$content .= '</tr>';
/*$content .= '<tr style="text-align:center;line-height:11px;font-weight:bold;font-size:8px;" >';
$content .= '<td style="vertical-align: middle;font-weight:bold; border:3px solid #000;">' . $tenInfo[0]['school_college_name'] . '</td>';
$content .= '<td style="vertical-align: middle; border:3px solid #000;">' . $tenInfo[0]['board']. '</td>';
$content .= '</tr>';*/

/*$content .= '<tr style="text-align:center;line-height:11px;font-weight:bold;font-size:8px;" >';
$content .= '<td style="vertical-align: middle; border:2px solid #000;">' . "<UL><LI>DFSDFSFS</LI><LI>DFSDFSFS</LI><LI>DFSDFSFS</LI><LI>DFSDFSFS</LI></UL>" . '</td>';
$content .= '<td style="vertical-align: middle; border:2px solid #000;">' . $plusInfo[0]['board']. '</td>';
$content .= '</tr>';





$content .= '</table>';
$content .= '</center>';*/

$content .= '<table >';
        $content .= '<tr>';
        /*$content .= '<td style="border:3px solid #000; width:30px;">';
            /*$content .= '<table>';
            /*$content .= '<tr>';
                $content .= '<td style="text-align:center; align-self:center; line-height:17px; width:30px;">';
               $content .= '</td>';
            $content .= '</tr>';
            $content .= '<tr>';
                $content .= '<td style="text-align:center; align-self:center; line-height:17px; width:30px;">';
               $content .= '</td>';
            $content .= '</tr>';*/
            $num = 1;
            $date_tobe_use = 0;
                foreach($data_date as $iii){
                    $date_to_explode = explode("-", $iii->date_a);
                    $date_expoded = $date_to_explode[1];
                     /*$content .= '<tr>';
                     /////// jan
                     if($date_expoded == 01){
                         if($date_tobe_use == 0){
                             $content .= '<tr>';
                             $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:20px; width:50px;">';
                          
                                $content .= '<table>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'."J" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "A" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "N" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "U" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "A" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "R" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "Y" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '</table>';
                           $content .= '</td>';
                           $content .= '</tr>';
                           $date_tobe_use = $date_expoded;
                         }else if($date_tobe_use == $date_expoded){
                             $content .= '<tr>';
                             $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:20px; width:50px;">' . "";
                             $content .= '</td>';
                             $content .= '</tr>';
                             $date_tobe_use = $date_expoded;
                         }else if($date_tobe_use != $date_expoded){
                             $date_tobe_use = 0;
                         }
                    $num = $num + 1;
                    
                     }
                     ////jan
                     ////feb
                     if($date_expoded == 02){
                         if($date_tobe_use == 0){
                             $content .= '<tr>';
                             $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:20px; width:50px;">';
                          
                                $content .= '<table>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'."F" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'."E" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'."B" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'."U" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "A" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "R" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "Y" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '</table>';
                           $content .= '</td>';
                           $content .= '</tr>';
                           $date_tobe_use = $date_expoded;
                         }else if($date_tobe_use == $date_expoded){
                             $content .= '<tr>';
                             $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:20px; width:50px;">' . "";
                             $content .= '</td>';
                             $content .= '</tr>';
                             $date_tobe_use = $date_expoded;
                         }else if($date_tobe_use != $date_expoded){
                             $date_tobe_use = 0;
                         }
                    $num = $num + 1;
                    
                     }
                     ////feb
                     ////mar
                     if($date_expoded == 03){
                         if($date_tobe_use == 0){
                             $content .= '<tr>';
                             $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:20px; width:50px;">';
                          
                                $content .= '<table>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "M" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "A" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "R" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px;font-size:11px;">' . '<b>'. "C" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'."H" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '</table>';
                           $content .= '</td>';
                           $content .= '</tr>';
                           $date_tobe_use = $date_expoded;
                         }else if($date_tobe_use == $date_expoded){
                             $content .= '<tr>';
                             $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:20px; width:50px;">' . "";
                             $content .= '</td>';
                             $content .= '</tr>';
                             $date_tobe_use = $date_expoded;
                         }else if($date_tobe_use != $date_expoded){
                             $date_tobe_use = 0;
                         }
                    $num = $num + 1;
                    
                     }
                     ////mar
                     ////apr
                     if($date_expoded == 04){
                         if($date_tobe_use == 0){
                             $content .= '<tr>';
                             $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:20px; width:50px;">';
                          
                                $content .= '<table>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "A" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "P" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "R" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "I" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>' . "L" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '</table>';
                           $content .= '</td>';
                           $content .= '</tr>';
                           $date_tobe_use = $date_expoded;
                         }else if($date_tobe_use == $date_expoded){
                             $content .= '<tr>';
                             $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:20px; width:50px;">' . "";
                             $content .= '</td>';
                             $content .= '</tr>';
                             $date_tobe_use = $date_expoded;
                         }else if($date_tobe_use != $date_expoded){
                             $date_tobe_use = 0;
                         }
                    $num = $num + 1;
                    
                     }
                     ////apr
                     ////may
                     if($date_expoded == 05){
                         if($date_tobe_use == 0){
                             $content .= '<tr>';
                             $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:20px; width:50px;">';
                          
                                $content .= '<table>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "M" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "A" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "Y" . '<b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '</table>';
                           $content .= '</td>';
                           $content .= '</tr>';
                           $date_tobe_use = $date_expoded;
                         }else if($date_tobe_use == $date_expoded){
                             $content .= '<tr>';
                             $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:20px; width:50px;">' . "";
                             $content .= '</td>';
                             $content .= '</tr>';
                             $date_tobe_use = $date_expoded;
                         }else if($date_tobe_use != $date_expoded){
                             $date_tobe_use = 0;
                         }
                    $num = $num + 1;
                    
                     }
                     ////may
                     ////jun
                     if($date_expoded == 06){
                         if($date_tobe_use == 0){
                             $content .= '<tr>';
                             $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:20px; width:50px;">';
                          
                                $content .= '<table>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "J" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "U" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "N" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "E" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '</table>';
                           $content .= '</td>';
                           $content .= '</tr>';
                           $date_tobe_use = $date_expoded;
                         }else if($date_tobe_use == $date_expoded){
                             $content .= '<tr>';
                             $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:20px; width:50px;">' . "";
                             $content .= '</td>';
                             $content .= '</tr>';
                             $date_tobe_use = $date_expoded;
                         }else if($date_tobe_use != $date_expoded){
                             $date_tobe_use = 0;
                         }
                    $num = $num + 1;
                    
                     }
                     ////jun
                     ////jul
                     if($date_expoded == 07){
                         if($date_tobe_use == 0){
                             $content .= '<tr>';
                             $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:20px; width:50px;">';
                          
                                $content .= '<table>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "J" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "U" . '<b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "L" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "Y" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '</table>';
                           $content .= '</td>';
                           $content .= '</tr>';
                           $date_tobe_use = $date_expoded;
                         }else if($date_tobe_use == $date_expoded){
                             $content .= '<tr>';
                             $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:20px; width:50px;">' . "";
                             $content .= '</td>';
                             $content .= '</tr>';
                             $date_tobe_use = $date_expoded;
                         }else if($date_tobe_use != $date_expoded){
                             $date_tobe_use = 0;
                         }
                    $num = $num + 1;
                    
                     }
                     ////jul
                     ////AUG
                     if($date_expoded == 08){
                         if($date_tobe_use == 0){
                             $content .= '<tr>';
                             $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:20px; width:50px;">';
                          
                                $content .= '<table>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "A" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "U" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "G" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "U" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "S" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "T" .'/b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '</table>';
                           $content .= '</td>';
                           $content .= '</tr>';
                           $date_tobe_use = $date_expoded;
                         }else if($date_tobe_use == $date_expoded){
                             $content .= '<tr>';
                             $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:20px; width:50px;">' . "";
                             $content .= '</td>';
                             $content .= '</tr>';
                             $date_tobe_use = $date_expoded;
                         }else if($date_tobe_use != $date_expoded){
                             $date_tobe_use = 0;
                         }
                    $num = $num + 1;
                    
                     }
                     ////AUG
                     ////SEP
                     if($date_expoded == 09){
                         if($date_tobe_use == 0){
                             $content .= '<tr>';
                             $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:20px; width:50px;">';
                          
                                $content .= '<table>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "S" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "E" . '/b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'."P" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "T" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px;font-size:11px;">' . '<b>'. "E" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "M" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "B" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "E" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "R" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '</table>';
                           $content .= '</td>';
                           $content .= '</tr>';
                           $date_tobe_use = $date_expoded;
                         }else if($date_tobe_use == $date_expoded){
                             $content .= '<tr>';
                             $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:20px; width:50px;">' . "";
                             $content .= '</td>';
                             $content .= '</tr>';
                             $date_tobe_use = $date_expoded;
                         }else if($date_tobe_use != $date_expoded){
                             $date_tobe_use = 0;
                         }
                    $num = $num + 1;
                    
                     }
                     ////SEP
                     ////OCT
                     if($date_expoded == 10){
                         if($date_tobe_use == 0){
                             $content .= '<tr>';
                             $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:20px; width:50px;">';
                          
                                $content .= '<table>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; line-height:10px; width:30px; font-size:11px;">' . '<b>'."O".'</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; line-height:10px; width:30px; font-size:11px;">' . '<b>'."C".'</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; line-height:10px; width:30px; font-size:11px;">' . '<b>'."T" .'</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; line-height:10px; width:30px; font-size:11px;">' . '<b>'."O" .'</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; line-height:10px; width:30px; font-size:11px;">' . '<b>'."B" .'</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "E" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "R" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '</table>';
                           $content .= '</td>';
                           $content .= '</tr>';
                           $date_tobe_use = $date_expoded;
                         }else if($date_tobe_use == $date_expoded){
                             $content .= '<tr>';
                             $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:20px; width:50px;">' . "";
                             $content .= '</td>';
                             $content .= '</tr>';
                             $date_tobe_use = $date_expoded;
                         }else if($date_tobe_use != $date_expoded){
                             /*$content .= '<tr>';
                             $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:20px; width:50px;">' . "";
                             $content .= '</td>';
                             $content .= '</tr>';*/
                             /*$date_tobe_use = 0;
                         }
                          
                    //$content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:20px; width:50px;">' . "d";
                   
                    $num = $num + 1;
                    ////OCT
                    ////NOV
                     }else if($date_expoded == 11){
                         if($date_tobe_use == 0){
                             $content .= '<tr>';
                             $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:20px; width:50px;">';
                          
                                $content .= '<table>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "N" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "O" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; line-height:10px; width:30px; font-size:11px;">' . '<b>' . "V" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "E" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "M" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "B" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "E" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "R" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '</table>';
                           $content .= '</td>';
                           $content .= '</tr>';
                           $date_tobe_use = $date_expoded;
                         }else if($date_tobe_use == $date_expoded){
                             $content .= '<tr>';
                             $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:20px; width:50px;">' . "";
                             $content .= '</td>';
                             $content .= '</tr>';
                             $date_tobe_use = $date_expoded;
                         }else if($date_tobe_use != $date_expoded){
                             $content .= '<tr>';
                             $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:20px; width:50px;">' . "";
                             $content .= '</td>';
                             $content .= '</tr>';
                             $date_tobe_use = 0;
                         }
                         /*$content .= '<tr>';
                         $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:20px; width:50px;">';
                         $content .= '</td>';
                         $content .= '</tr>';*/
                    /*$num = $num + 1;
                     }
                     ////NOV
                     ////DEC
                     if($date_expoded == 12){
                         if($date_tobe_use == 0){
                             $content .= '<tr>';
                             $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:20px; width:50px;">';
                          
                                $content .= '<table>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "D" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "E" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "C" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "E" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "M" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "B" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; line-height:10px; width:30px; font-size:11px;">' . '<b>'. "E" . '</b>';
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '<tr>';
                                $content .= '<td style="text-align:center; align-self:center; line-height:10px; width:30px; font-size:15px;">' . "R";
                                $content .= '</td>';
                                $content .= '</tr>';
                                $content .= '</table>';
                           $content .= '</td>';
                           $content .= '</tr>';
                           $date_tobe_use = $date_expoded;
                         }else if($date_tobe_use == $date_expoded){
                             $content .= '<tr>';
                             $content .= '<td style="text-align:center; align-self:center; border:1px solid #000; line-height:20px; width:50px;">' . "";
                             $content .= '</td>';
                             $content .= '</tr>';
                             $date_tobe_use = $date_expoded;
                         }else if($date_tobe_use != $date_expoded){
                             $date_tobe_use = 0;
                         }
                    $num = $num + 1;
                    
                     }
                     ////DEC
                    
                    $content .= '</tr>';*/
                }
           
            /*$content .= '</table>';*/
        /*$content .= '</td>';*/
        
        
        
        
        
        
        $content .= '<td style="border:3px solid #000;">';


        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $content .= '<table style="margin-top:10px; margin-left:300px;" border="1" align="left" cellpadding="0" cellspacing="0">';
        $content .= '<tr>';
        $content .= '<td style="border:3px solid #000; background-color:#c1c5c9; text-align:center; line-height:20px; font-size:10px;"><b>DATE</b></td>';
        $loc_num = 0;
        foreach($data_loc as $data_location){
            $new_data = explode("-", $data_location->DSClientCode);
            /////////////////////////////////////
            if($new_data[1] == "ORMOC"){
                if($new_data[3] == "S1"){
                //$content .= '<td style="text-align:center; align-self:center; border:3px solid #000; background-color:#c1c5c9; font-size:6px; line-height:11px;">' . $new_data[1] . " " . $new_data[2] . '</td>';
                 $loc_num = $loc_num + 1;
                $content .= '<td style="text-align:center; align-self:center; border:3px solid #000; background-color:#c1c5c9; font-size:10px; line-height:20px;"><b>' . $loc_num . '</b></td>';
                
                }
            }else if($new_data[1] == "DIPOLOG"){
                if($new_data[2] == "S1"){
                //$content .= '<td style="text-align:center; align-self:center; border:3px solid #000; background-color:#c1c5c9; font-size:6px; line-height:11px;">' . $new_data[1] . '</td>';
                $loc_num = $loc_num + 1;
                $content .= '<td style="text-align:center; align-self:center; border:3px solid #000; background-color:#c1c5c9; font-size:10px; line-height:20px;"><b>' . $loc_num . '</b></td>';
                
                
                }
            }else if($new_data[2] == "CEBU"){
                if($new_data[3] == "PIER1"){
                    if($new_data[4] == "S1"){
                        //$content .= '<td style="text-align:center; align-self:center; border:3px solid #000; background-color:#c1c5c9; font-size:6px; line-height:11px;">' . $new_data[2] . " " . $new_data[1] . $new_data[3] . '</td>';
                    $loc_num = $loc_num + 1;
                $content .= '<td style="text-align:center; align-self:center; border:3px solid #000; background-color:#c1c5c9; font-size:10px; line-height:20px;"><b>' . $loc_num . '</b></td>';
                        
                    }
                }else if($new_data[3] == "PIER2"){
                    if($new_data[4] == "S1"){
                        //$content .= '<td style="text-align:center; align-self:center; border:3px solid #000; background-color:#c1c5c9; font-size:6px; line-height:11px;">' . $new_data[2] . " " . $new_data[1] . $new_data[3] . '</td>';
                    $loc_num = $loc_num + 1;
                $content .= '<td style="text-align:center; align-self:center; border:3px solid #000; background-color:#c1c5c9; font-size:10px; line-height:20px;"><b>' . $loc_num . '</b></td>';
                        
                    }
                }else if($new_data[3] == "PIER3"){
                    if($new_data[4] == "S1"){
                        //$content .= '<td style="text-align:center; align-self:center; border:3px solid #000; background-color:#c1c5c9; font-size:6px; line-height:11px;">' . $new_data[2] . " " . $new_data[1] . $new_data[3] . '</td>';
                    $loc_num = $loc_num + 1;
                $content .= '<td style="text-align:center; align-self:center; border:3px solid #000; background-color:#c1c5c9; font-size:10px; line-height:20px;"><b>' . $loc_num . '</b></td>';
                        
                    }
                }else if($new_data[3] == "PIER4"){
                    if($new_data[4] == "S1"){
                        //$content .= '<td style="text-align:center; align-self:center; border:3px solid #000; background-color:#c1c5c9; font-size:6px; line-height:11px;">' . $new_data[2] . " " . $new_data[1] . '4' . '</td>';
                    $loc_num = $loc_num + 1;
                $content .= '<td style="text-align:center; align-self:center; border:3px solid #000; background-color:#c1c5c9; font-size:10px; line-height:20px;"><b>' . $loc_num . '</b></td>';
                        
                    }
                }
            }else if($new_data[3] == "S1"){
                //$content .= '<td style="text-align:center; align-self:center; border:3px solid #000; background-color:#c1c5c9; font-size:6px; line-height:11px;">' . $new_data[2] . " " . $new_data[1] . '</td>';
            $loc_num = $loc_num + 1;
                $content .= '<td style="text-align:center; align-self:center; border:3px solid #000; background-color:#c1c5c9; font-size:10px; line-height:20px;"><b>' . $loc_num . '</b></td>';
                
            }else{
                if($new_data[2] == "PAGADIAN"){
                   if($new_data[3] == "S12017100401"){
                    //$content .= '<td style="text-align:center; align-self:center; border:3px solid #000; background-color:#c1c5c9; font-size:6px; line-height:11px;">' . $new_data[2] . " " . $new_data[1] . '</td>';
                   $loc_num = $loc_num + 1;
                $content .= '<td style="text-align:center; align-self:center; border:3px solid #000; background-color:#c1c5c9; font-size:10px; line-height:20px;"><b>' . $loc_num . '</b></td>';
                    
                   }
                }else if($new_data[2] == "ZAMBOANGA"){
                    if($new_data[3] == "S12017100403"){
                    //$content .= '<td style="text-align:center; align-self:center; border:3px solid #000; background-color:#c1c5c9; font-size:6px; line-height:11px;">' . $new_data[2] . " " . $new_data[1] . '</td>';
                   $loc_num = $loc_num + 1;
                $content .= '<td style="text-align:center; align-self:center; border:3px solid #000; background-color:#c1c5c9; font-size:10px; line-height:20px;"><b>' . $loc_num . '</b></td>';
                    
                    }
                }else if($new_data[2] == "COTABATO"){
                    if($new_data[3] == "2017102816"){
                    //$content .= '<td style="text-align:center; align-self:center; border:3px solid #000; background-color:#c1c5c9; font-size:6px; line-height:11px;">' . $new_data[2] . " " . $new_data[1] . '</td>';
                   $loc_num = $loc_num + 1;
                $content .= '<td style="text-align:center; align-self:center; border:3px solid #000; background-color:#c1c5c9; font-size:10px; line-height:20px;"><b>' . $loc_num . '</b></td>';
                    
                    }
                }
            }
            /////////////////////////////////////
        //$content .= '<td style="text-align:center; align-self:center; border:3px solid #000; line-height:20px; background-color:#c1c5c9;"><b>' . $data_location->DSClientCode . '</b></td>';
        }
        $content .= '</tr>';
        
        $content .= '</table>';
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $content .= '<table style="margin-top:10px; margin-left:300px;" border="1" align="left" cellpadding="0" cellspacing="0">';
    foreach($data_date as $data_dates){
        $content .= '<tr>';
        $explode_date = explode("-", $data_dates->date_a);
        $content .= '<td style="border-right:3px solid #000; text-align:center; line-height:15px;">' . $explode_date[2] . '</td>';
        $date = $data_dates->date_a;
        $num = 0;
        foreach($data_loc as $data_locs){
            $loc = $data_locs->DSClientCode;
            
            foreach($data_item as $data_items){
                if($data_items->item_a == $date && $data_items->DSClientCode == $loc){
                    $num = $num + 1;
                }
            }
            $data_date = explode("-", $data_locs->DSClientCode);
            if($data_date[1] == "ORMOC"){
                if($data_date[3] == "S1"){
                    $content .= '<td style="text-align:center; align-self:center; border-right:3px solid #000; line-height:15px;">' . $num . '</td>';
                }
            }if($data_date[1] == "DIPOLOG"){
                if($data_date[2] == "S1"){
                    $content .= '<td style="text-align:center; align-self:center; border-right:3px solid #000; line-height:15px;">' . $num . '</td>';
                }
            }else if($data_date[2] == "CEBU"){
                if($data_date[3] == "PIER1"){
                    if($data_date[4] == "S1"){
                        $content .= '<td style="text-align:center; align-self:center; border-right:3px solid #000; line-height:15px;">' . $num . '</td>';
                    }
                }else if($data_date[3] == "PIER2"){
                    if($data_date[4] == "S1"){
                        $content .= '<td style="text-align:center; align-self:center; border-right:3px solid #000; line-height:15px;">' . $num . '</td>';
                    }
                }else if($data_date[3] == "PIER3"){
                    if($data_date[4] == "S1"){
                        $content .= '<td style="text-align:center; align-self:center; border-right:3px solid #000; line-height:15px;">' . $num . '</td>';
                    }
                }else if($data_date[3] == "PIER4"){
                    if($data_date[4] == "S1"){
                        $content .= '<td style="text-align:center; align-self:center; border-right:3px solid #000; line-height:15px;">' . $num . '</td>';
                    }
                }
            }else if($data_date[3] == "S1"){
                if($data_date[1] != "ORMOC"){
                $content .= '<td style="text-align:center; align-self:center; border-right:3px solid #000; line-height:15px;">' . $num . '</td>';
                }
            }else{
                if($data_date[2] == "PAGADIAN"){
                   if($data_date[3] == "S12017100401"){
                    $content .= '<td style="text-align:center; align-self:center; border-right:3px solid #000; line-height:15px;">' . $num . '</td>';
                   }
                }else if($data_date[2] == "ZAMBOANGA"){ 
                    if($data_date[3] == "S12017100403"){
                    $content .= '<td style="text-align:center; align-self:center; border-right:3px solid #000; line-height:15px;">' . $num . '</td>';
                   }
                }else if($data_date[2] == "COTABATO"){ 
                    if($data_date[3] == "2017102816"){
                    $content .= '<td style="text-align:center; align-self:center; border-right:3px solid #000; line-height:15px;">' . $num . '</td>';
                   }
                }
            }
            $num = 0;
        }
        $content .= '</tr>';
    }
    $content .= '</table>';
    
    
    
    
    $content .= '<table style="margin-top:10px; margin-left:300px;" border="1" align="left" cellpadding="0" cellspacing="0">';
        $content .= '<tr>';
        $content .= '<td style="border:3px solid #000; background-color:#c1c5c9; text-align:center;">TOTAL</td>';
        foreach($data_loc_count as $data_location_count){
            $new_data_count = explode("-", $data_location_count->DSClientCode);
            /////////////////////////////////////
            if($new_data_count[1] == "ORMOC"){
                if($new_data_count[3] == "S1"){
                $content .= '<td style="text-align:center; align-self:center; border:3px solid #000; background-color:#c1c5c9;"><b>' . $data_location_count->files . '</b></td>';
                }
            }else if($new_data_count[1] == "DIPOLOG"){
                if($new_data_count[2] == "S1"){
                $content .= '<td style="text-align:center; align-self:center; border:3px solid #000; background-color:#c1c5c9;"><b>' . $data_location_count->files . '</b></td>';
                }
            }else if($new_data_count[2] == "CEBU"){
                if($new_data_count[3] == "PIER1"){
                    if($new_data_count[4] == "S1"){
                        $content .= '<td style="text-align:center; align-self:center; border:3px solid #000; background-color:#c1c5c9;"><b>' . $data_location_count->files . '</b></td>';
                    }
                }else if($new_data_count[3] == "PIER2"){
                    if($new_data_count[4] == "S1"){
                        $content .= '<td style="text-align:center; align-self:center; border:3px solid #000; background-color:#c1c5c9;"><b>' . $data_location_count->files . '</b></td>';
                    }
                }else if($new_data_count[3] == "PIER3"){
                    if($new_data_count[4] == "S1"){
                        $content .= '<td style="text-align:center; align-self:center; border:3px solid #000; background-color:#c1c5c9;"><b>' . $data_location_count->files . '</b></td>';
                    }
                }else if($new_data_count[3] == "PIER4"){
                    if($new_data_count[4] == "S1"){
                        $content .= '<td style="text-align:center; align-self:center; border:3px solid #000; background-color:#c1c5c9;"><b>' . $data_location_count->files . '</b></td>';
                    }
                }
            }else if($new_data_count[3] == "S1"){
                $content .= '<td style="text-align:center; align-self:center; border:3px solid #000; background-color:#c1c5c9;"><b>' . $data_location_count->files . '</b></td>';
            }else{
                if($new_data_count[2] == "PAGADIAN"){
                   if($new_data_count[3] == "S12017100401"){
                    $content .= '<td style="text-align:center; align-self:center; border:3px solid #000; background-color:#c1c5c9;"><b>' . $data_location_count->files . '</b></td>';
                   }
                }else if($new_data_count[2] == "ZAMBOANGA"){
                    if($new_data_count[3] == "S12017100403"){
                    $content .= '<td style="text-align:center; align-self:center; border:3px solid #000; background-color:#c1c5c9;"><b>' . $data_location_count->files . '</b></td>';
                   }
                }else if($new_data_count[2] == "COTABATO"){
                    if($new_data_count[3] == "2017102816"){
                    $content .= '<td style="text-align:center; align-self:center; border:3px solid #000; background-color:#c1c5c9;"><b>' . $data_location_count->files . '</b></td>';
                   }
                }
            }
            /////////////////////////////////////
        //$content .= '<td style="text-align:center; align-self:center; border:3px solid #000; line-height:20px; background-color:#c1c5c9;"><b>' . $data_location->DSClientCode . '</b></td>';
        }
        $content .= '</tr>';
        
        $content .= '</table>';
        
        
        
        $content .= '</td>';
        $content .= '</tr>';
         $content .= '</table>';
        
        
        
        
        

        //$content .= '<h3></h3>';
        $content .= '<h3>__________________________________________________________________________________</h3>';
        $content .= '<p style="text-align:center;">We warrant that in accordance with the CERTIFIED OFFICIAL NETWORK, COMPUTER GENERATED REPORT LOGS';
        $content .= ' indicated above were broadcast.</p>';
        $content .= '<hr></hr>';
        
        
        
        $content .= "<p></p>";
        $content .= "<p></p>";
        $content .= "<p></p>";
        $content .= "<p></p>";
        
        $content .= '<table>';
        
        
        
        $content .= '<tr>';
        $content .= '<td>';
        $content .= '</td>';
        $content .= '<td>';
        $content .= '</td>';
        $content .= '<td>';
        $content .= '</td>';
        $content .= '<td>';
        $obj_pdf->Image(base_url() . "/image/Signature.png", 147,200,40,30, 'png');
        //$content .= "<b>image</b>";
        $content .= '</td>';

        $content .= '</tr>';
        
        
        $content .= '<tr>';
        $content .= '<td>';
        $content .= '</td>';
        $content .= '<td>';
        $content .= '</td>';
        $content .= '<td>';
        $content .= '</td>';
        $content .= '<td>';
        $content .= '</td>';

        $content .= '</tr>';
        
        
        
        
        $content .= '<tr>';
        $content .= '<td>';
        $content .= '</td>';
        $content .= '<td>';
        $content .= '</td>';
        $content .= '<td>';
        $content .= '</td>';
        $content .= '<td>';
        $content .= '</td>';

        $content .= '</tr>';
        
        
        
        
        $content .= '<tr>';
        $content .= '<td>';
        $content .= '</td>';
        $content .= '<td>';
        $content .= '</td>';
        $content .= '<td>';
        $content .= '</td>';
        $content .= '<td>';
        $content .= '</td>';

        $content .= '</tr>';
        
        
        
        
        $content .= '<tr>';
        $content .= '<td>';
        $content .= '</td>';
        $content .= '<td>';
        $content .= '</td>';
        $content .= '<td>';
        $content .= '</td>';
        $content .= '<td>';
        $content .= '</td>';

        $content .= '</tr>';
        
        
        
        
        $content .= '<tr>';
        $content .= '<td>';
        $content .= '</td>';
        $content .= '<td>';
        $content .= '</td>';
        $content .= '<td>';
        $content .= '</td>';
        $content .= '<td>';
        $content .= '</td>';

        $content .= '</tr>';
        
        
        
        
        $content .= '<tr>';
        $content .= '<td>';
        $content .= '</td>';
        $content .= '<td>';
        $content .= '</td>';
        $content .= '<td>';
        $content .= '</td>';
        $content .= '<td>';
        
        $content .= '<table >';
$content .= '<tr>';
$content .= '<td style="font-size:10px; border-bottom:2px solid #000; width:100px; text-align:center;"><b>ELMER TAGALOG</b>';
$content .= '</td>';
$content .= '<td style="width:100px; text-align:center;"><b></b>';
$content .= '</td>';

$content .= '<td style="width:150px;"><b>' .''.'</b>';
$content .= '</td>';

$content .= '</tr>';

$content .= '</table>';

        $content .= '</td>';

        $content .= '</tr>';
        
        
        
        
        
        
        $content .= '<tr>';
        $content .= '<td>';
        $content .= '</td>';
        $content .= '<td>';
        $content .= '</td>';
        $content .= '<td>';
        $content .= '</td>';
        $content .= '<td style="font-size:10px; width:100px; text-align:center;">';
        $content .= '<b>Traffic Officer</b>';
        $content .= '</td>';

        $content .= '</tr>';
        $content .= '</table>';





$obj_pdf->writeHTML($content, true, false, true, false, '');
if($type == 1){
  $obj_pdf->Output('COP-' . $client_name .'-REPORTS'.date("Y-m-d").'.pdf', 'D');  
}else{
    $obj_pdf->Output('output.pdf', 'I');  
}


//ob_end_clean();*/






/*$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->SetTitle('Pdf Example');
    $pdf->SetHeaderMargin(30);
    $pdf->SetTopMargin(20);
    $pdf->setFooterMargin(20);
    $pdf->SetAutoPageBreak(true);
    $pdf->SetAuthor('Author');
    $pdf->SetDisplayMode('real', 'default');
    
    
    
    $pdf->AddPage();
//ob_start();
    //$content = ob_get_contents();
    $content = "<h1>title</h1>";
    //$pdf->writeHTML($content, true, false, true, false, '');
$content .= "<table>";
$content .= "<tr>";
$content .= "<td>one</td>";
$content .= "<td>two</td>";
$content .= "<td>three</td>";
$content .= "</tr>";
foreach($data as $data){
    $content .= "<tr>";
    $content .= "<td>$data->client_name</td>";
    $content .= "</tr>";
}

$content .= "</table>";



$pdf->writeHTML($content, true, false, true, false, '');
//ob_end_clean();
//$pdf->writeHTML($content, true, false, true, false, '');
$pdf->Output('example_001.pdf', 'I');*/