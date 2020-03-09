<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<!--<style>
.city {display:none}
</style>-->
<!--<a href="<?php echo site_url();    ?>/locations/locations/create_loc"><button class="btn btn-primary btn-lg" id="save" style="margin-bottom: 30px; background-color: #281672;">Create Digital Signage</button></a>--><?php
    ?>

    
                                    <!--<div id="example2_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-xs-6"></div><div class="col-xs-6"></div></div><table id="example2" class="table table-bordered table-hover dataTable" aria-describedby="example2_info">
                                        <thead>
                                            <tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">LOCATION CODE</th>
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">LOCATION</th>
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">SETTINGS</th>
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">STATUS</th>
                                            
                                            </tr>
                                        </thead>
                                        
                                       <!-- <tfoot>
                                            <tr><th rowspan="1" colspan="1">Location Code</th>
                                                <th rowspan="1" colspan="1">Location</th>
                                                <th rowspan="1" colspan="1">Settings</th>
                                                <th rowspan="1" colspan="1">Status</th>
                                            </tr>
                                        </tfoot>-->
                                    <!--<tbody role="alert" aria-live="polite" aria-relevant="all">
                                                <!--tables-->
                                                
                                                <?php
                                     /*           $x = 0;
                                                foreach($view_locations as $data){
                                                    $x = $x + 1;
                                                    echo "<tr>";
                                                    ///////
                                                    echo "<td>" . $data->location_code . "</br>";
                                                    echo "<td>" . $data->location_name . "</br>";
                                                    ?>
                                                        <td><a href="<?php echo site_url();    ?>/view_running_status/view_running_status/get_location/<?php echo $data->location_code;   ?>"><button class="w3-button w3-green">Location Playlist</button></a>
                                                            <a href="<?php echo site_url();    ?>/crawler/crawler/get_crawler_location/<?php echo $data->location_code;   ?>"><button class="w3-button w3-blue">My Crawler</button></a>
                                    
                                                          <!--------------modal------------------>      
<!--<button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black">Online View</button>

<div id="id01" class="w3-modal">
 <div class="w3-modal-content w3-card-4 w3-animate-zoom">
  <header class="w3-container w3-blue"> 
   <span onclick="document.getElementById('id01').style.display='none'" 
   class="w3-button w3-blue w3-xlarge w3-display-topright">&times;</span>
   <h2>ADD</h2>
  </header>

  <div>
   <h1>ADD</h1>
    <div id="content_add"></div>
   <!--<p>London is the most populous city in the United Kingdom, with a metropolitan area of over 9 million inhabitants.</p>
   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
  <p>London is the most populous city in the United Kingdom, with a metropolitan area of over 9 million inhabitants.</p>
   <!--FROM HERE ->CONTENT LOAD VIA AJAX AND GO TO CONTROLLER AND PASS IT TO THE CONTENT AJAX--> 
    <!--<video width="850" height="500" autoplay loop style="margin-left: 26px;"><!--oncontextmenu="return false;"-->
       <!--<source src="http://localhost/rmn/js/Rmni Buwan Ng Wika 2017.mp4" type="video/mp4" >
       </video>
        <script>
            $(document).ready(function(){
            $("#content_add").load("<?php //echo site_url();    ?>/adds/adds/load_add/<?php //echo $data->location_code;   ?>");
        });
    </script>
  </div>

  <div class="w3-container w3-light-grey w3-padding">
   <button class="w3-btn w3-right w3-white w3-border" 
   onclick="document.getElementById('id01').style.display='none'">Close</button>
  </div>
 </div>
</div>-->
    
  <!--<button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black">Open Modal</button>
<?php //echo $data->location_code;   ?>
  <div id="id01" class="w3-modal">
    <div class="w3-modal-content">
      <div class="w3-container">
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
        <video width="800" height="500" autoplay loop style="margin-left: 26px;"><!--oncontextmenu="return false;"-->
      <!--<source src="http://localhost/rmn/js/Rmni Buwan Ng Wika 2017.mp4" type="video/mp4" >
       </video>
      </div>
    </div>
  </div>-->
  
  <!-- Trigger the modal with a button -->
  
                                                         <!-------------modal------------------->
                                                                    <a href="">
                                               
                                                                <!--<button>Real Time View</button>--></a>
                                                         <button class="w3-button w3-red">Delete Location</button>
                                    </td><?php
                                    echo "<td>" . "OFFLINE" . "</td>";
                                                    echo "</tr>";
                                                ?>                            
                                                <!--tables-->
                                            <!--</tr></tbody></table><div class="row"><div class="col-xs-6"><div class="dataTables_info" id="example2_info">Showing 1 to 10 of 57 entries</div></div><div class="col-xs-6"><div class="dataTables_paginate paging_bootstrap"><ul class="pagination"><li class="prev disabled"><a href="#">← Previous</a></li><li class="active"><a href="#">1</a></li><li><a href="#">2</a></li><li><a href="#">3</a></li><li><a href="#">4</a></li><li><a href="#">5</a></li><li class="next"><a href="#">Next → </a></li></ul></div></div></div></div>
                            -->    <!--</div>-->  
</tbody>
<script>
/*document.getElementsByClassName("tablink")[0].click();

function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].classList.remove("w3-light-grey");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.classList.add("w3-light-grey");
}*/
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<div class="box">
 <div class="box-header">       
     <div class="box-body table-responsive">
         <h3 class="box-title" style="margin-left:43%;"><b style="color:red;">DIGITAL SIGNAGES</b></h3>    
                                    
         <table >
	<div id="example2_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="row"><div class="col-xs-6"></div><div class="col-xs-6"></div></div><table id="example2" class="table table-bordered table-hover dataTable" aria-describedby="example2_info">
                                        <thead>
                                            <tr style="border-bottom: 3px solid #000;">
                                            <!--<tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">LOCATION CODE</th>-->
                                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"><b>LOCATION</b></th>
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"><b>SETTINGS</b></th>
                                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending"><b>STATUS</b></th>
                                            
                                            </tr>
                                            
                                        </thead>
        <tbody>
        
    <tr>
             <?php
                                                $x = 0;
                                                foreach($view_locations as $data){
                                                
                                                
                                                
                                                
                                                $exploded_loc_code = explode("-", $data->location_name); 
                                                    if($exploded_loc_code[2] == "S1"|| $exploded_loc_code[1] == "S1" || $exploded_loc_code[4] == "1" || $exploded_loc_code[3] == "S1" || $exploded_loc_code[1] == "CEBU"){
                                                         $loc_name_explode = $exploded_loc_code[0] . " " . $exploded_loc_code[1];
                                                        
                                                        if($exploded_loc_code[1] == "CEBU"){
                                                        	if($exploded_loc_code[3] == "S1"){
                                                        	$loc_name_explode = $exploded_loc_code[1] . " " . $exploded_loc_code[2] . " " . $exploded_loc_code[3];
                                                        	}else if($exploded_loc_code[3] == "1"){
                                                        	$loc_name_explode = $exploded_loc_code[1] . " " . $exploded_loc_code[2] . " " .$exploded_loc_code[3];
                                                        	}else{
                                                        	$loc_name_explode = $exploded_loc_code[1] . " " . $exploded_loc_code[2] . " " .$exploded_loc_code[3];
                                                        	}
                                                        }
                                                        
                                                        
                                                        
                                                        $x = $x + 1;
                                                    echo "<tr>";
                                                    ///////
                                                    //echo "<td>" . $data->location_code . "</br>";
                                                    
                                                    if($data->is_online == 0){
                                                    echo "<td>" . "<Font color='green'><b>$loc_name_explode </b></font>" . "</br>";
                                                    }else{
                                                    echo "<td>" . $loc_name_explode . "</br>";
                                                    }
                                                    
                                                    ?>
                                                        <td><!--<a href="<?php echo site_url();    ?>/view_running_status/view_running_status/get_location/<?php echo $data->location_code;   ?>"><button class="btn btn-primary btn-sm" style="font-size: xx-small; background-color: #281672;">MY PLAYLIST</button></a>
                                                            <a href="<?php echo site_url();    ?>/crawler/crawler/get_crawler_location/<?php echo $data->location_code;   ?>"><button class="btn btn-primary btn-sm" style="font-size: xx-small; background-color: #281672;">My Crawler</button></a>-->
                                    <button class="btn btn-primary btn-sm" first-name="<?php echo $data->location_code;   ?>" data-toggle="modal" data-target="#myModal" style="font-size: xx-small; background-color: #281672; background-color:transparent;" 
                                    
                                    
                            <?php
                            
                            if($data->is_online == 1){echo "disabled";}else{echo "enabled";}
                            
                            
                            ?>        
                                    
                                    >
					<img src="http://www.hey.fr/fun/emoji/android/en/android/561-emoji_android_television.png" style="width: 50px; background-color:white;">
				</button>
                                                            <!--<button class="btn btn-primary btn-sm" style="font-size: xx-small; background-color: #281672;">Delete Signage</button>-->
                                                            
                                                            
                                                            
                                                            
                                                            <?php
                                                            
                                                            //thyis is for multiple download
                                                            //for($i = 0; $i<=3; $i++){
    //echo "<iframe src='http://localhost/rmn/index.php/view_running_status/view_running_status/$data->location_code></iframe>";
//}
                                                            
                                                            ?>
                                                            <!--<a href="<?php echo site_url();    ?>/reports/reports/csv_ds_info/<?php echo $data->location_code;   ?>"><button class="btn btn-primary btn-sm" style="font-size: xx-small; background-color: #281672;">Export DS Info</button></a>
                                                            <a href="<?php echo site_url();    ?>/reports/reports/csv_create_playlist/<?php echo $data->location_code;   ?>"><button class="btn btn-primary btn-sm" style="font-size: xx-small; background-color: #281672;">Export Playlist</button></a>
                                                            <a href="<?php echo site_url();    ?>/reports/reports/csv_create_crawlers/<?php echo $data->location_code;   ?>"><button class="btn btn-primary btn-sm" style="font-size: xx-small; background-color: #281672;">Export Crawlers</button></a>-->
                                                            
                                                            
                                                            <?php
                                                            if($data->is_online == 0){
                                                             echo "<td>" . "<Font color='green'><b>ONLINE" . "</b></font></td>";
                                                            }else{
                                    echo "<td>" . "OFFLINE" . "</td>";
                                    }
                                                ?>     
        </td>
			
                        <?php
                        
                                                        }
                                                    
                                                }///
                                    ?>
		</tr>
	</tbody>
</table>
        </div>
        </div>
 </div>
    
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content"><!--style="width: 860px; margin-left: -60px;"-->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><!--&times;--></span></button>
        <h4 class="modal-title" id="myModalLabel"><!--Modal title--></h4>
      </div>
      <div class="modal-body">
        <form id="profileForm" style="table-layout: fixed;border-collapse: collapse;z-index: -1;position:relative;margin-top: -100%;">
            Location Code : <input class="form-control" name="firstname" value="" placeholder="firstname" id="fname" disabled>
       </form>
      </div>
        <div id="con"></div>
        <!--<video width="850" height="500" autoplay loop style="margin-left: 26px;"><!--oncontextmenu="return false;"-->
       <!--<source src="http://localhost/rmn/js/Rmni Buwan Ng Wika 2017.mp4" type="video/mp4" >
       </video>-->
        <div id="con"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="close_modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnsv">Connect</button>
      </div>
    </div>
  </div>
</div>


<script>
$('#myModal').on('show.bs.modal', function (e) {
  // get information to update quickly to modal view as loading begins
  var opener=e.relatedTarget;//this holds the element who called the modal
   
   //we get details from attributes
  var firstname=$(opener).attr('first-name');

//set what we got to our form
  $('#profileForm').find('[name="firstname"]').val(firstname);
   
});
</script>

<script>
    
    $(document).ready(function(){
        $("#btnsv").click(function(){
            datas = {
                data : $("#fname").val(),
                ajax : 1
            };
            $.ajax({
                url : "<?php echo site_url();    ?>/adds/adds/get_all_add3/",
                type : "post",
                data : datas,
                success : function(msg){
                    $("#con").html(msg);
                }
            });   
        });
    });
    
    
    </script>

    <script>
         
        </script>
        
        
        
        
