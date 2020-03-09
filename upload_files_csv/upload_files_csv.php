<?php
ini_set('max_execution_time', 900);
//exec('C:\xampp\htdocs\rmn\upload_files_csv\import_csv.bat');
$con = new mysqli("localhost", "root", "", "rmi");
    $sel = $con->query("select * from locations");
    if($sel->num_rows){ 
        while($sel_row = $sel->fetch_object()){
            $loc_name = $sel_row->location_code;
            
            $txtdata = "load data local infile 'D:/AgilaDS/db/$loc_name/logs/playlogs.csv' into table tbl_playlogs;";
            $myfile = fopen("C:/xampp/mysql/bin/import_csv.sql", "w") or die("Unable to open file!");
            $txt = $txtdata;
            fwrite($myfile, $txt);
            fclose($myfile);
            
            
            
            exec('C:\xampp\htdocs\rmn\upload_files_csv\import_csv.bat');
        }
    }
    
    
    
    /*$get_distinct_log = $con->query("select distinct  DSClientCode, DSLocationCode, DSMaterial, Timestamp from tbl_playlogs");
    if($get_distinct_log->num_rows){
        while($get_distinct_log_row = $get_distinct_log->fetch_object()){
            $DSClientCode = $get_distinct_log_row->DSClientCode;
            $DSLocationCode = $get_distinct_log_row->DSLocationCode;
            $DSMaterial = $get_distinct_log_row->DSMaterial;
            $Timestamp = $get_distinct_log_row->Timestamp;
            
            $con->query("delete from tbl_playlogs where DSClientCode = $DSClientCode and DSLocationCode = $DSLocationCode and DSMaterial = $DSMaterial and Timestamp = $Timestamp");
            $con->query("insert into tbl_playlogs(DSClientCode, DSLocationCode, DSMaterial, Timestamp) values ($DSClientCode, $DSLocationCode, $DSMaterial, $Timestamp)");
        
            
        }
    }*/
    //$con->query("ALTER IGNORE TABLE tbl_playlogs ADD UNIQUE INDEX (DSClientCode, DSLocationCode, DSMaterial, Timestamp);");
        header("location:http://192.168.254.111/rmn/index.php/view_running_status/view_running_status");
/*$connect = mysqli_connect("localhost", "root", "", "rmi");

 
 
  $query = "delete from tbl_playlogs";
                mysqli_query($connect, $query);
				
	 //$condb = new mysqli("localhost", "root", "", "rmi");	
         //$check = $condb->query("select * from tbl_dsinfo");
         //if($check->num_rows){
             //while($check_row = $check->fetch_object()){
               //  $ds_info = $check_row->LocationName;
             //}
        // }
				
				
				
   $handle = fopen("file://D:/AgilaDS/db/AlphaTest/logs/playlog.csv", "r");
   while($data = fgetcsv($handle))
   {
                                $item1 = mysqli_real_escape_string($connect, $data[0]);  
                                $item2 = mysqli_real_escape_string($connect, $data[1]);
				$item3 = mysqli_real_escape_string($connect, $data[2]);
				$item4 = mysqli_real_escape_string($connect, $data[3]);  
                                
                $query = "INSERT into tbl_playlogs(DSClientCode, DSLocationCode, DSMaterial, Timestamp) values('$item2', '$item1', '$item3', '$item4')";
                mysqli_query($connect, $query);
   }
   fclose($handle);*/
   
                
         
                
                
   
                
                
                
                
                   
                
               
  


?>