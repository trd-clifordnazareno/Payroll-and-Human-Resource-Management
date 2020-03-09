


<div class="box-body table-responsive">
                                    <div id="example2_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-xs-6"></div><div class="col-xs-6"></div></div><table id="example2" class="table table-bordered table-hover dataTable" aria-describedby="example2_info">
                                        <thead>
                                            <tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                                    LOCATIONS</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                                                    MATERIAL</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                    TOTAL LOOPS</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">
                                                    TIMESTAMP</th>
                                               </tr>
                                        </thead>
                                        
                                       
                                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                                        
                                            <?php
echo "</br>";
echo "<h3>ClientCode</h3>";
echo "<h4>Time</h4>";
echo "<table>";
echo "<tr>";
echo "<td><b>LOCATION</b></td>";
echo "<td><b>MATERIAL</b></td>";
echo "<td><b>TIME</b></td>";
//$content .= "<td>four</td>";
echo "</tr>";
$x = "";
    $num = 0;
foreach($data as $data){
    


                                            
                                            echo "</br>";
echo "<h3>ClientCode</h3>";
echo "<h4>Time</h4>";
echo "<table>";
echo "<tr>";
echo "<td><b>LOCATION</b></td>";
echo "<td><b>MATERIAL</b></td>";
echo "<td><b>TIME</b></td>";
//$content .= "<td>four</td>";
echo "</tr>";
$x = "";
    $num = 0;
foreach($data as $data){
    
    if($x == ''){
        $x = $data->DSClientCode;
    $num = $num + 1;
    
    
    
    echo "<tr></tr>";
    echo "<tr><td></td></tr>";
    echo "<tr>______________________________________________________________________________________________</tr>";
    echo "<tr><td></td></tr>";
    echo "<tr><td></td></tr>";
    
    
    
        echo "<tr>";
    echo "<td>$data->DSClientCode</td>";
    echo "<td>$data->DSMaterial</td>";
    echo "<td>$data->Timestamp</td>";
    //$content .= "<td>$num</td>";
    echo "</tr>";
    
    //break;
    }else if($x == $data->DSClientCode){
        $x = $data->DSClientCode;
    $num = $num + 1;
        $content .= "<tr>";
    echo "<td>$data->DSClientCode</td>";
    echo "<td>$data->DSMaterial</td>";
    echo "<td>$data->Timestamp</td>";
    //$content .= "<td>$num</td>";
    echo "</tr>";
    
    }else if($x != $data->DSClientCode){
      
    $num = $num;  
    echo "<tr>";
    echo "__________________________________________________________________________________________";
    //$content .= "<td>________________________</td>";
    echo "</tr>";
    
    
    
    
    
    echo "<tr>";
    echo "<td>___________________________</td>";
    echo "<td>___________________________</td>";
    echo "<td>___________________________</td>";
    //$content .= "<td>________________________</td>";
    echo "</tr>";
    
    
    
    
     
    echo "<tr>";
    echo "<td></td>";
    echo "<td></td>";
    //$content .= "<td></td>";
    echo "<td>total $num</td>";
    echo "</tr>";
    
    echo "<tr>";
    echo "<td></td>";
    echo "</tr>";
    
    $num = 1; 
    
        $content .= "<tr>";
    echo "<td>$data->DSClientCode</td>";
    echo "<td>$data->DSMaterial</td>";
    echo "<td>$data->Timestamp</td>";
    //$content .= "<td>$num</td>";
    echo "</tr>";
    
    $x = $data->DSClientCode;
        $num = 0;
    $num = $num + 1; 
    }
}
echo "<tr>";
    echo "__________________________________________________________________________________________";
    //$content .= "<td>________________________</td>";
    echo "</tr>";
    
    
    
    
    
    echo "<tr>";
    echo "<td>___________________________</td>";
    echo "<td>___________________________</td>";
    echo "<td>___________________________</td>";
    //$content .= "<td>________________________</td>";
    echo "</tr>";
    echo "<tr>";
echo "<td></td>";
echo "<td></td>";
echo "<td>Total $num</td>";
echo "</tr>";
echo "</table>";
                                            
                                            
                                                                 
                                }

?>
                                            
                                            
                                        </tbody>
</div>
                                            
                                </div>
    

