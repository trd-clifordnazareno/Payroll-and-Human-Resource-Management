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

$obj_pdf->Image(base_url() . "/image/image.png", 30,3,40,20, 'PNG'); //30,3,40,30, 
$obj_pdf->Image(base_url() . "/image/eye.JPG", 150,3,40,20, 'JPG'); //150,3,40,30,
$content .= "<h3></h3>";
$content .= "<h3></h3>";
$content .= "<h3></h3>";
$content .= "<h3></h3>";
$content .= "<h3></h3>";
//$content .= "<h3></h3>";
//$content .= "<h3></h3>";
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
$content .= '<table cellpadding="5" style="font-size:10px; border-top:3px solid #000; solid #000;">';
$content .= '<tr>';
$content .= '<td>';
$content .= '</td>';

$content .= '</tr>';
$content .= '</table>';



$content .= '<table>';
$content .= '<tr>';
$content .= '<td style="width:100px; text-align:center;"><b>Client Name</b>';
$content .= '</td>';

$content .= '<td style="width:150px;"><b>Materials</b>';
$content .= '</td>';

$content .= '</tr>';
$content .= "<tr>";
$content .= "<td></td>";
$content .= "</tr>";
$content .= '<tr >';
$content .= '<td style="width:100px; text-align:center;">';
$content .= "<b>$client_name</b>";
$content .= '</td>';
$content .= '<td style="width:300px;">';
$content .= "<table>";
    
  
$len_files = 0;   
foreach($len as $len){
    $len_files = $len_files + 1;
    $num = explode(".", $len->lenght);
   $content .= "<tr>";
   $content .= '<td style="width:190px;">' . $len->filename . '</td> <td>' . $num[0] . '    -    SECONDS</td>';
   $content .= "</tr>";
}

   $content .= "</table>";
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
$content .= '<p style="text-align:center;"><b>CERTIFICATE OF PERFORMANCE</b></p>';
$content .= 
         '<table >'
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
        $content .= '<td style="text-align:center; align-self:center; width:100px;">';
        $content .= '</td>';
        $content .= '<td style="text-align:center; align-self:center; border:3px solid #000; line-height:20px; background-color:#c1c5c9; width:150px;"><b>DIGITAL SIGNAGE LOCATION</b>';
        $content .= '</td>';
        $content .= '<td style="text-align:center; align-self:center; border:3px solid #000; line-height:20px; background-color:#c1c5c9;"><b>TOTAL SPOTS</b>';
        $content .= '</td>';
        $content .= '<td style="text-align:center; align-self:center;">';
        $content .= '</td>';
        $content .= '</tr>';
        $content .= '<tr>';
        $content .= '<td style="text-align:center; align-self:center; width:100px;">';
        $content .= '</td>';
        $content .= '<td style="text-align:center; align-self:center; border:3px solid #000; line-height:7px; width:150px;"> ';
        $content .= "<li></li>";
        $content .= '<li style="color:rgb(224, 82, 25);font-size:10px;"><u><b>AIRPORT NETWORK</b></u></li>';
        $content .= "<li></li>";
        
        $len_data = 0;
        foreach($data as $data){
            $len_data = $len_data + 1;
            $loc_name = explode("-", $data->DSClientCode);
            $loc_tv_numbr = $loc_name[3];
        
           $loc_alias = $loc_name[1];
        
            for($i = 0;$i < 100;$i++){
            $n1 = $loc_alias[0][0];
            $D = $loc_alias[0];
            }
            
            
            for($i = 0;$loc_tv_numbr;$i++){
                $tv_numbr = $loc_tv_numbr[0] . $loc_tv_numbr[1];
                $len_data = $len_data + 1;
                break;
            }
            if($n1 == "A" || $n1 == "D"){
               for($i = 0;$i < 100;$i++){
                $tv = $loc_name[3][0] . $loc_name[3][1];
                $len_data = $len_data + 1;
                break;
            }
            if($tv == "S1"){
                $content .= '<li style="font-size:7px;">' .$loc_name[2] . '</li>';
                $len_data = $len_data + 1;
            } 
            if($loc_name[1] == "DIPOLOG"){
                if($loc_name[2] == "S1"){
                    $content .= '<li style="font-size:7px;">' . $loc_name[1] . '</li>';
                    $len_data = $len_data + 1;
                }
                
            }
            }
        /*if($n1 == "A" || $n1 == "D" || $n1){
            if($loc_name[1] == "DIPOLOG"){
                $content .= "<li>$loc_name[1]</li>";
            }
            if($loc_name[2] != "S1"){
                $content .= "<li>$loc_name[2]</li>";
            }
            
            for($i = 0;$i < 100;$i++){
                $tv = $loc_name[3][0] . $loc_name[3][1];
                break;
            }
            /*if($tv == "S1"){
                $content .= $loc_name[2];
            }*/
        /*}*/
        
            
        }
        
        
        $content .= "<li></li>";
        $content .= '<li style="color:rgb(224, 82, 25);font-size:10px;"><u><b>SEAPORT NETWORK</b></u></li>';
        $content .= "<li></li>";
        
        $len_seaport = 0;
        foreach($seaport as $data){
            $loc_name = explode("-", $data->DSClientCode);
            $loc_tv_numbr = $loc_name[3];
        
           $loc_alias = $loc_name[1];
        
            for($i = 0;$i < 100;$i++){
            $n1 = $loc_alias[0][0];
            $D = $loc_alias[0];
            }
            if($n1 == "S" || $n1 == "O"){
                for($i = 0;$i < 100;$i++){
                $tv = $loc_name[3][0] . $loc_name[3][1];
                break;
            }
                if($loc_name[3] == "S1"){
                    
                    if($loc_alias == "ORMOC"){
                        if($loc_name[2] == "SEAPORT"){$content .= '<li style="font-size:7px;">' . $loc_alias . '</li>';
                        $len_seaport = $len_seaport + 1;
                        }else{}
                    }
                    //$content .= "<li>$loc_alias</li>";
                    
                }
                if($loc_name[2] == "CEBU"){
                    $pier_loc = $loc_name[3];
                    for($i = 0;$i < 100;$i++){
                        $first_scren = $pier_loc[4];
                       break;
                    }
                    if($first_scren == "1"){
                        if($loc_name[4] == "S1"){
                            
                            $content .= '<li style="font-size:7px;">' . $loc_name[2] . $loc_name[3] . '</li>';
                            $len_seaport = $len_seaport + 1;
                        }
                        
                    }else if($first_scren == "2"){
                        if($loc_name[4] == "S1"){
                           
                            $content .= '<li style="font-size:7px;">' . $loc_name[2] . $loc_name[3] . '</li>';
                            $len_seaport = $len_seaport + 1;
                        }
                    }else if($first_scren == "3"){
                        if($loc_name[4] == "S1"){
                          
                            $content .= '<li style="font-size:7px;">' . $loc_name[2] . $loc_name[3] . '</li>';
                            $len_seaport = $len_seaport + 1;
                        }
                    }else if($first_scren == "4"){
                        if($loc_name[4] == "S1"){
                            
                            $content .= '<li style="font-size:7px;">' . $loc_name[2] . $loc_name[3] . '</li>';
                            $len_seaport = $len_seaport + 1;
                        }
                    }
                    
                    
            }
            if($tv == "S1"){
                if($loc_name[2] == "SEAPORT"){}else{$content .= '<li style="font-size:7px;">' . $loc_name[2] . '</li>';}
                $len_seaport = $len_seaport + 1;
            } 
            }
            
        }$content .= "<h3></h3>";
        $content .= '</td>';
        $content .= '<td style="text-align:center; align-self:center; border:3px solid #000; line-height:7px;">';
        $content .= "<li></li>";
        $content .= '<li style="color:rgb(224, 82, 25);font-size:10px;"><b> <!--AIRPORT--></b></li>';
        $content .= "<li></li>";
        $len_airport = 0;
        foreach($airport as $data){
            $len_airport = $len_airport + 1;
            $loc_name = explode("-", $data->DSClientCode);
            $loc_tv_numbr = $loc_name[3];
        
           $loc_alias = $loc_name[1];
        
            for($i = 0;$i < 100;$i++){
            $n1 = $loc_alias[0][0];
            $D = $loc_alias[0];
            }
            
            
            for($i = 0;$loc_tv_numbr;$i++){
                $tv_numbr = $loc_tv_numbr[0] . $loc_tv_numbr[1];
                break;
            }
            if($n1 == "A" || $n1 == "D"){
               for($i = 0;$i < 100;$i++){
                $tv = $loc_name[3][0] . $loc_name[3][1];
                $len_airport = $len_airport + 1;
                break;
            }
            if($tv == "S1"){
                $content .= '<li style="font-size:7px;">' . $data->loop_count . '</li>';
            } 
            if($loc_name[1] == "DIPOLOG"){
                if($loc_name[2] == "S1"){
                    $content .= '<li style="font-size:7px;">' . $data->loop_count . '</li>';
                }
                
            }
            }
        /*if($n1 == "A" || $n1 == "D" || $n1){
            if($loc_name[1] == "DIPOLOG"){
                $content .= "<li>$loc_name[1]</li>";
            }
            if($loc_name[2] != "S1"){
                $content .= "<li>$loc_name[2]</li>";
            }
            
            for($i = 0;$i < 100;$i++){
                $tv = $loc_name[3][0] . $loc_name[3][1];
                break;
            }
            /*if($tv == "S1"){
                $content .= $loc_name[2];
            }*/
        /*}*/
        
            
        }
        ///////////
        $content .= "<li></li>";
        $content .= '<li style="color:rgb(224, 82, 25);font-size:10px;"><b> <!--SEAPORT--></b></li>';
        $content .= "<li></li>";
        foreach($loop_count_seaport as $data){
            $loc_name = explode("-", $data->DSClientCode);
            $loc_tv_numbr = $loc_name[3];
        
           $loc_alias = $loc_name[1];
        
            for($i = 0;$i < 100;$i++){
            $n1 = $loc_alias[0][0];
            $D = $loc_alias[0];
            }
            if($n1 == "S" || $n1 == "O"){
                for($i = 0;$i < 100;$i++){
                $tv = $loc_name[3][0] . $loc_name[3][1];
                break;
            }
                if($loc_name[3] == "S1"){
                     if($loc_name[2] == "SEAPORT"){$content .= '<li style="font-size:7px;">' . $data->loop_count . '</li>';}else{}
                    //$content .= "<li>$data->loop_count</li>";
                    
                }
                if($loc_name[2] == "CEBU"){
                    $pier_loc = $loc_name[3];
                    for($i = 0;$i < 100;$i++){
                        $first_scren = $pier_loc[4];
                       break;
                    }
                    if($first_scren == "1"){
                        if($loc_name[4] == "S1"){
                            
                            $content .= '<li style="font-size:7px;">' . $data->loop_count . '</li>';
                        }
                       
                    
                    }else if($first_scren == "2"){
                        if($loc_name[4] == "S1"){
                           
                            $content .= '<li style="font-size:7px;">' . $data->loop_count . '</li>';
                        }
                    }else if($first_scren == "3"){
                        if($loc_name[4] == "S1"){
                          
                            $content .= '<li style="font-size:7px;">' . $data->loop_count . '</li>';
                        }
                    }else if($first_scren == "4"){
                        if($loc_name[4] == "S1"){
                            
                            $content .= '<li style="font-size:7px;">' . $data->loop_count . '</li>';
                        }
                    }
                    
                    
            }
            if($tv == "S1"){
                if($loc_name[2] == "SEAPORT"){}else{$content .= '<li style="font-size:7px;">' . $data->loop_count . '</li>';}
            } 
            }
            
        }$content .= "<h3></h3>";
        $content .= '</td>';
        $content .= '<td style="text-align:center; align-self:center;">';
        $content .= '</td>';
        $content .= '</tr>';
        $content .= '</table>';




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
        //$content .= "<b>image</b>";
        $line_output = $len_files + $len_data + $len_seaport + $len_airport;
        if($line_output == 8){
            $obj_pdf->Image(base_url() . "/image/Signature.png", 147,165,40,30, 'png');
        }
        else if($line_output == 9){
            $obj_pdf->Image(base_url() . "/image/Signature.png", 147,165,40,30, 'png');
        }
        else if($line_output == 10){
            $obj_pdf->Image(base_url() . "/image/Signature.png", 147,168,40,30, 'png');
        }
        else if($line_output == 11){
            $obj_pdf->Image(base_url() . "/image/Signature.png", 147,168,40,30, 'png');
        }
        else if($line_output == 12){
            $obj_pdf->Image(base_url() . "/image/Signature.png", 147,168,40,30, 'png');
        }
        else if($line_output == 13){
            $obj_pdf->Image(base_url() . "/image/Signature.png", 147,168,40,30, 'png');
        }
        else if($line_output == 14){
            $obj_pdf->Image(base_url() . "/image/Signature.png", 147,168,40,30, 'png');
        }
        else if($line_output == 15){
            $obj_pdf->Image(base_url() . "/image/Signature.png", 147,169,40,30, 'png');
        }
        else if($line_output == 16){
            $obj_pdf->Image(base_url() . "/image/Signature.png", 147,170,40,30, 'png');
        }
        else if($line_output == 17){
            $obj_pdf->Image(base_url() . "/image/Signature.png", 147,169,40,30, 'png');
        }
        else if($line_output == 18){
            $obj_pdf->Image(base_url() . "/image/Signature.png", 147,169,40,30, 'png');
        }
        else if($line_output == 19){
            $obj_pdf->Image(base_url() . "/image/Signature.png", 147,170,40,30, 'png');
        }
        else if($line_output == 20){
            $obj_pdf->Image(base_url() . "/image/Signature.png", 147,170,40,30, 'png');
        }
        else if($line_output == 21){
            $obj_pdf->Image(base_url() . "/image/Signature.png", 147,170,40,30, 'png');
        }
        else if($line_output == 22){
            $obj_pdf->Image(base_url() . "/image/Signature.png", 147,170,40,30, 'png');
        }
        else if($line_output == 23){
            $obj_pdf->Image(base_url() . "/image/Signature.png", 147,169,40,30, 'png');
        }
        else if($line_output == 24){
            $obj_pdf->Image(base_url() . "/image/Signature.png", 147,169,40,30, 'png');
        }
        else if($line_output == 25){
            $obj_pdf->Image(base_url() . "/image/Signature.png", 147,170,40,30, 'png');
        }
        else if($line_output == 26){
            $obj_pdf->Image(base_url() . "/image/Signature.png", 147,170,40,30, 'png');
        }
        else if($line_output == 27){
            $obj_pdf->Image(base_url() . "/image/Signature.png", 147,170,40,30, 'png');
        }
        else if($line_output == 28){
            $obj_pdf->Image(base_url() . "/image/Signature.png", 147,170,40,30, 'png');
        }
        else if($line_output == 29){
            $obj_pdf->Image(base_url() . "/image/Signature.png", 147,170,40,30, 'png');
        }
        else if($line_output == 30){
            $obj_pdf->Image(base_url() . "/image/Signature.png", 147,170,40,30, 'png');
        }
        else if($line_output == 31){
            $obj_pdf->Image(base_url() . "/image/Signature.png", 147,170,40,30, 'png');
        }
        else if($line_output == 32){
            $obj_pdf->Image(base_url() . "/image/Signature.png", 147,170,40,30, 'png');
        }
        else if($line_output == 33){
            $obj_pdf->Image(base_url() . "/image/Signature.png", 147,170,40,30, 'png');
        }
        else if($line_output == 34){
            $obj_pdf->Image(base_url() . "/image/Signature.png", 147,170,40,30, 'png');
        }
        else if($line_output == 35){
            $obj_pdf->Image(base_url() . "/image/Signature.png", 147,170,40,30, 'png');
        }
        else if($line_output == 36){
            $obj_pdf->Image(base_url() . "/image/Signature.png", 147,170,40,30, 'png');
        }
        else if($line_output == 37){
            $obj_pdf->Image(base_url() . "/image/Signature.png", 147,170,40,30, 'png');
        }
        else if($line_output == 38){
            $obj_pdf->Image(base_url() . "/image/Signature.png", 147,170,40,30, 'png');
        }
        else if($line_output == 39){
            $obj_pdf->Image(base_url() . "/image/Signature.png", 147,170,40,30, 'png');
        }
        else if($line_output == 40){
            $obj_pdf->Image(base_url() . "/image/Signature.png", 147,170,40,30, 'png');
        }
        else if($line_output == 41){
            $obj_pdf->Image(base_url() . "/image/Signature.png", 147,170,40,30, 'png');
        }
        else if($line_output == 42){
            $obj_pdf->Image(base_url() . "/image/Signature.png", 147,170,40,30, 'png');
        }
        else if($line_output == 43){
            $obj_pdf->Image(base_url() . "/image/Signature.png", 147,170,40,30, 'png');
        }
        else if($line_output == 44){
            $obj_pdf->Image(base_url() . "/image/Signature.png", 147,170,40,30, 'png');
        }
        else if($line_output == 45){
            $obj_pdf->Image(base_url() . "/image/Signature.png", 147,171,40,30, 'png');
        }
        
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
        $content .= "<b>Traffic Officer</b>" . $len_files . "/" . $len_data . "/" . $len_seaport . "/" . $len_airport . "/" . $line_output;
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
$pdf->Output('example_001.pdf', 'I');*/https://www.facebook.com/photo.php?fbid=991762794203661&set=pb.100001098481652.-2207520000.1517906872.&type=3&theater