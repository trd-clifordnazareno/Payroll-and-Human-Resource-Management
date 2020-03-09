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
$obj_pdf->SetMargins(25, "", PDF_MARGIN_RIGHT);
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
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



foreach($loc_data as $data_subject){
    $subject = $data_subject->subject;
    $report_date = $data_subject->report_date;
    $resume_date = $data_subject->resume_date;
    break;
}

/*foreach($get_material as $material_data){
    $client_name = $material_data->clients_code;
    break;
}*/
$start_d = explode("-", $s);
for($i = 1;$i < 100;$i++){
    //$str_m = $client_name . $subject . $report_date . $resume_date;
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
$content .= '<p style="text-align:right;"><b>' . $client_name . '-' . $subject . '-' . $report_date . '-' . $resume_date . '</b></p>';
//$content .= "<h1 style='font-size:100%;'>_________________________________________________________</h1>";
$content .= '<table cellpadding="5" style="font-size:10px; border-top:3px solid #000; solid #000;">';
$content .= '<tr>';
$content .= '<td>';
$content .= '</td>';

$content .= '</tr>';
$content .= '</table>';



$content .= '<table>';
$content .= '<tr>';
$content .= '<td style="width:100px; text-align:left;"><b>Client Name :</b>';
$content .= '</td>';

$content .= '<td style="width:150px; text-align:left;"><b>' . $client_name . '</b>';
$content .= '</td>';



$content .= '</tr>';

$content .= "<tr>";
$content .= "<td></td>";
$content .= "</tr>";

$content .= '<tr>';
$content .= '<td style="width:100px; text-align:left;"><b>Materials :</b>';
$content .= '</td>';





$content .= '</tr>';





$content .= '<tr >';
$content .= '<td style="width:50px; text-align:center;">';
//$content .= "<b>$client_name</b>";
$content .= '</td>';
$content .= '<td style="width:300px;">';
$content .= "<table>";
    
  
   
foreach($get_material as $get_material){
    $num = explode(".", $get_material->lenght);
   $content .= "<tr>";
   $content .= '<td style="width:190px;">' . $get_material->filename . '</td> <td>' . $get_material->lenght . '    -    SECONDS</td>';
   $content .= "</tr>";
}

   $content .= "</table>";
$content .= '</td>';

$content .= '</tr>';
$content .= "<tr>";
$content .= "<td></td>";
$content .= "</tr>";
$content .= '<tr>';
foreach($loc_data as $data_subject_time){
    $report_date_time = $data_subject_time->report_date;
    $resume_date_time = $data_subject_time->resume_date;
    break;
}
$content .= '<td style="width:100px; text-align:left;"><b>Period :</b>';
$content .= '</td>';

if($resume_date_time == '0000-00-00'){
    $resume_date_time = '';
}else{
    $resume_date_time = $resume_date_time;
}
$content .= '<td style="width:100px; text-align:left;">' . $report_date_time . " - " .$resume_date_time;
$content .= '</td>';


$content .= '</tr>';
$content .= '<tr>';
$content .= '<td style="width:100px; text-align:left;"><b>Contract : Spot : 40</b>';
$content .= '</td>';



$content .= '</tr>';
$content .= '</table>';




$content .= '<table cellpadding="5" style="font-size:10px; border-bottom:3px solid #000; solid #000;">';
$content .= '<tr >';
$content .= '<td>';
$content .= '</td>';

$content .= '</tr>';
$content .= '</table>';



$content .= "<p></p>";


$start = $start;
$end = $end;





$content .= "<p></p>"; 
        
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
        $content .= '<td style="text-align:center; align-self:center; border:3px solid #000; line-height:20px; background-color:#c1c5c9; width:150px;"><b>Location Signage</b>';
        $content .= '</td>';
        $content .= '<td style="text-align:center; align-self:center; border:3px solid #000; line-height:20px; background-color:#c1c5c9;"><b>Date</b>';
        $content .= '</td>';
        $content .= '<td style="text-align:center; align-self:center; border:3px solid #000; line-height:20px; background-color:#c1c5c9;"><b>Days</b>';
        $content .= '</td>';
        $content .= '<td style="text-align:center; align-self:center; border:3px solid #000; line-height:20px; background-color:#c1c5c9;"><b>Total Spot</b>';
        $content .= '</td>';
        $content .= '<td style="text-align:center; align-self:center; border:3px solid #000; line-height:20px; background-color:#c1c5c9;"><b>Reason</b>';
        $content .= '</td>';
        $content .= '<td style="text-align:center; align-self:center; border:3px solid #000; line-height:20px; background-color:#c1c5c9;"><b>Screen Down</b>';
        $content .= '</td>';
        $content .= '<td style="text-align:center; align-self:center;">';
        $content .= '</td>';
        $content .= '</tr>';
        
        
        
        foreach($loc_data as $data){
        $content .= '<tr>';
        $explode_location_name = explode("-", $loc_name);
        
        
        
        
        if($explode_location_name[1] == "ORMOC"){
                   if($explode_location_name[3] == "S1"){
                        
                        
                                $screen_name = $explode_location_name[1];
                            
                   }
               }else if($explode_location_name[1] == "DIPOLOG"){
                   if($explode_location_name[2] == "S1"){
                       
                        
                                $screen_name = $explode_location_name[1];
                           

                   }
               }else if($explode_location_name[2] == "CEBU"){
                   if($explode_location_name[3] == "PIER1"){
                       if($explode_location_name[4] == "S1"){
                            
                           
                                $screen_name = $explode_location_name[2] . " " . $explode_location_name[3];
                            
                       }
                   }else if($explode_location_name[3] == "PIER2"){
                       if($explode_location_name[4] == "S1"){
                           
                        
                                $screen_name = $explode_location_name[2] . "-" . $explode_location_name[3];
                           
                       }
                   }else if($explode_location_name[3] == "PIER3"){
                       if($explode_location_name[4] == "S1"){
                           
                            
                                $screen_name = $explode_location_name[2] . "-" . $explode_location_name[3];
                            
                       }
                   }else if($explode_location_name[3] == "PIER4"){
                       if($explode_location_name[4] == "S1"){
                        
                        
                                $screen_name = $explode_location_name[2] . "-" . $explode_location_name[3];
                            
                       }
                   }
               }else if($explode_location_name[3] == "S1"){
                        
                        
                                $screen_name = $explode_location_name[0] . "-" . $explode_location_name[1] . "-" . $explode_location_name[2];
                            
               }else{
                   if($explode_location_name[2] == "PAGADIAN"){
                      if($explode_location_name[3] == "S12017100401"){
                          
                        
                                $screen_name = $explode_location_name[2];
                            
                      }
                   }else if($explode_location_name[2] == "ZAMBOANGA"){
                       if($explode_location_name[3] == "S12017100403"){
                           
                        
                                $screen_name = $explode_location_name[2];
                            
                      }
                   }
               }
               
               
               
               
        $content .= '<td style="text-align:center; align-self:center; border:3px solid #000; line-height:20px; width:150px;"><b>' . $screen_name . '</b>';
        $content .= '</td>';
        if($data->resume_date == '0000-00-00'){
            $content .= '<td style="text-align:center; align-self:center; border:3px solid #000; line-height:20px;"><b>' . $data->report_date . '</b>';
        }else{
            $content .= '<td style="text-align:center; align-self:center; border:3px solid #000; line-height:20px;"><b>' . $data->report_date . ' to ' . $data->resume_date . '</b>';
        }
        
        $content .= '</td>';
        //$x = date("d", strtotime($data->report_date)) + date("d", strtotime($data->resume_date));
        $str = date("d", strtotime($data->report_date));
        $end = date("d", strtotime($data->resume_date));
        $num = 0;
        for($i = $str; $i<=$end;$i++){
            $num=  $num + 1;
        }
        $total_spots = $num * 40;
        $content .= '<td style="text-align:center; align-self:center; border:3px solid #000; line-height:20px;"><b>'. $num .'</b>';
        $content .= '</td>';
        $content .= '<td style="text-align:center; align-self:center; border:3px solid #000; line-height:20px;"><b>' . $total_spots . '</b>';
        $content .= '</td>';
        $content .= '<td style="text-align:center; align-self:center; border:3px solid #000; line-height:15px;">' . $data->reason;
        $content .= '</td>';
        $content .= '<td style="text-align:center; align-self:center; border:3px solid #000; line-height:20px;"><b>' . $screen_fail . '</b>';
        $content .= '</td>';
        $content .= '<td style="text-align:center; align-self:center;">';
        $content .= '</td>';
        $content .= '</tr>';
        $content .= '</table>';
        }



        $content .= '<h3></h3>';
        $content .= '<h3>______________________________________________________________________________</h3>';
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
        $content .= "<b>image</b>";
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
        $content .= "<b>Traffic Officer</b>";
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