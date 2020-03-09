<?php $this->load->view('template/header'); ?>
<form action="" method="post">
    <select name="name" style="font-size:19px;">
	<option value=""></option>
        <?php
		
		$condb = new mysqli("localhost", "root", "", "rmi");	
		$sel_loc = $condb->query("select * from locations");
		
		if($sel_loc->num_rows){
			while($sel_loc_row = $sel_loc->fetch_object()){
				?><?php ?>
			
			  <option value="<?php echo $sel_loc_row->location_code;    ?>"><?php echo $sel_loc_row->location_name;    ?></option>
			  
			
             <?php
                 
             }
         }
		
		?>
    <select>
    <input id='submit' type='submit' name = 'upload_file_csv'    value = 'UPLOAD CSV' style="font-size:19px; width:130px;">
    <!--<input id='submit' type='submit' name = 'Coffee' value = 'Coffee'>-->
</form>

<?php
$loc_name = $_POST['name'];
if(isset($_POST['upload_file_csv'])){

$connect = mysqli_connect("localhost", "root", "", "rmi");
$query = "delete from table_location_report where filename = 'MovieTitle'";
                mysqli_query($connect, $query);

$query_del = "delete from table_location_report where location_code = '$loc_name'";
                mysqli_query($connect, $query_del);
                
$handle_crawlers = fopen("file://D:/AgilaDS/db/$loc_name/playlist/$loc_name-playlist.csv", "r");
   while($data = fgetcsv($handle_crawlers))
   {
                                $item1 = mysqli_real_escape_string($connect, $data[1]);  
                                $item2 = mysqli_real_escape_string($connect, $data[2]);
				$item3 = mysqli_real_escape_string($connect, $data[3]);
				$item4 = mysqli_real_escape_string($connect, $data[4]);  
                                $item5 = mysqli_real_escape_string($connect, $data[5]);
				$item6 = mysqli_real_escape_string($connect, $data[6]);
                                $item7 = mysqli_real_escape_string($connect, $data[7]);
                $query = "INSERT into table_location_report(location_code, clients_code, filename, lenght, play, start, expire, sequence) values('$loc_name', '$item7', '$item2', '$item3', '$item6', '$item4', '$item5', '$item1')";
                mysqli_query($connect, $query);
   }
   fclose($handle_crawlers); 
  } 
   $query = "delete from table_location_report where filename = 'MovieTitle'";
                mysqli_query($connect, $query);
   
   ?>
<?php $this->load->view('template/footer'); ?>