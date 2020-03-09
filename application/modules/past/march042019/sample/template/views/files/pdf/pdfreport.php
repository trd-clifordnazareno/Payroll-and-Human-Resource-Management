<?php

//tcpdf();
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
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
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, "", PDF_MARGIN_RIGHT);
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$obj_pdf->SetFont('helvetica', '', 9);
$obj_pdf->setFontSubsetting(false);
$obj_pdf->AddPage();
//ob_start();
    // we can have any view part here like HTML, PHP etc
    //$content = ob_get_contents();
//$content = "<h1>title</h1>";
$content = "</br>";
$content .= "<h3>ClientCode</h3>";
$content .= "<h4>Time</h4>";
$content .= "<table>";
$content .= "<tr>";
$content .= "<td><b>LOCATION</b></td>";
$content .= "<td><b>MATERIAL</b></td>";
$content .= "<td><b>TIME</b></td>";
//$content .= "<td>four</td>";
$content .= "</tr>";
$x = "";
    $num = 0;
foreach($data as $data){
    
    if($x == ''){
        $x = $data->DSClientCode;
    $num = $num + 1;
    
    
    
    $content .= "<tr></tr>";
    $content .= "<tr><td></td></tr>";
    $content .= "<tr>______________________________________________________________________________________________</tr>";
    $content .= "<tr><td></td></tr>";
    $content .= "<tr><td></td></tr>";
    
    
    
        $content .= "<tr>";
    $content .= "<td>$data->DSClientCode</td>";
    $content .= "<td>$data->DSMaterial</td>";
    $content .= "<td>$data->Timestamp</td>";
    //$content .= "<td>$num</td>";
    $content .= "</tr>";
    
    //break;
    }else if($x == $data->DSClientCode){
        $x = $data->DSClientCode;
    $num = $num + 1;
        $content .= "<tr>";
    $content .= "<td>$data->DSClientCode</td>";
    $content .= "<td>$data->DSMaterial</td>";
    $content .= "<td>$data->Timestamp</td>";
    //$content .= "<td>$num</td>";
    $content .= "</tr>";
    
    }else if($x != $data->DSClientCode){
      
    $num = $num;  
    $content .= "<tr>";
    $content .= "__________________________________________________________________________________________";
    //$content .= "<td>________________________</td>";
    $content .= "</tr>";
    
    
    
    
    
    $content .= "<tr>";
    $content .= "<td>___________________________</td>";
    $content .= "<td>___________________________</td>";
    $content .= "<td>___________________________</td>";
    //$content .= "<td>________________________</td>";
    $content .= "</tr>";
    
    
    
    
     
    $content .= "<tr>";
    $content .= "<td></td>";
    $content .= "<td></td>";
    //$content .= "<td></td>";
    $content .= "<td>total $num</td>";
    $content .= "</tr>";
    
    $content .= "<tr>";
    $content .= "<td></td>";
    $content .= "</tr>";
    
    $num = 1; 
    
        $content .= "<tr>";
    $content .= "<td>$data->DSClientCode</td>";
    $content .= "<td>$data->DSMaterial</td>";
    $content .= "<td>$data->Timestamp</td>";
    //$content .= "<td>$num</td>";
    $content .= "</tr>";
    
    $x = $data->DSClientCode;
        $num = 0;
    $num = $num + 1; 
    }
}
$content .= "<tr>";
    $content .= "__________________________________________________________________________________________";
    //$content .= "<td>________________________</td>";
    $content .= "</tr>";
    
    
    
    
    
    $content .= "<tr>";
    $content .= "<td>___________________________</td>";
    $content .= "<td>___________________________</td>";
    $content .= "<td>___________________________</td>";
    //$content .= "<td>________________________</td>";
    $content .= "</tr>";
    $content .= "<tr>";
$content .= "<td></td>";
$content .= "<td></td>";
$content .= "<td>Total $num</td>";
$content .= "</tr>";
$content .= "</table>";




$obj_pdf->writeHTML($content, true, false, true, false, '');
$obj_pdf->Output('output.pdf', 'I');

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