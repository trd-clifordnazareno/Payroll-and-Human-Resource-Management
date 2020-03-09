<?php
class Adds extends CI_controller{
    function __construct(){
    parent::__construct();
    //constructors here
    $this->load->model('adds_model/adds_model');
    error_reporting(0);
  }
    function index(){
        
    }
    function load_add(){
        //echo $this->uri->rsegment(3);
         $data_location = $_POST['data'];
         
         $data = adds_model::get_location($data_location);
         if($data){
             foreach($data as $data){
                 $time = $data->time;
             }
             $time_now = date( "H:i:s", strtotime( $time));
             //$now_time = gettimeofday(true);
             $now_time = date('H:i:s');
             
             
            if($time_now != $now_time){
              $data_loc =  adds_model::get_loc_from_playlist($data_location) ;
               
              if($data_loc){
                  foreach($data_loc as $data){
                      $loc_code = $data->location_code;
                      $length = $data->clients_code;
                      $file_code = $data->filename_code;
                      $filename = $data->filename;
                      $lenght = $data->lenght;
                      $play = $data->start;
                      $expire = $data->expire;
                      $sequennce = $data->sequence;
                      
                      $parts = explode(":", $time); //if you know its safe
                      $time_in_location_per_sec = ($parts[0] * 60 * 60 + $parts[1] * 60 + $parts[2]) . "s";
                      
                      $data_playlist_min = adds_model::data_playlist_min($data_location);
                      
                      if($data_playlist_min){
                         foreach($data_playlist_min as $data){
                             //echo $data->playlist_len;
                             $data_length = $data->playlist_len;
                             
                             $res = $data_length + $time_in_location_per_sec;
                             echo $res;
                            
                             exit;
                             
                         } break;
                      }
                      
                      
                      
                  }
              }
            }
         }
        $this->load->view("files/ajax_tables/modal_add", $data);
    }
    function load_file_add(){
        
        
        $this->load->view("files/ajax_tables/modal_add");
    }
    function get_add(){
        $data_location = $_POST['data'];
        $data = adds_model::get_playlist_update($data_location);
        if($data){
            foreach($data as $data){
            
            $playlist_location = $data->location_code;
            $playlist_code = $data->playlist_code;
            $playlist_name = $data->playlist_name;
            $time_stamp = $data->time_stamp;
        }
        $datas = adds_model::get_playlist_number($data_location, $playlist_code);
        if($datas){
            foreach($datas as $data){
                $loc_code = $data->location_code;
                $playlist_codes = $datas->sequence;
                $filename = $data->filename;
            }
            
            $data_playlist_add = array(
                'loc_code' => $loc_code,
                'playlist_code' => $playlist_code,
                'filename' => $filename,
            );
            
            $this->load->view("files/ajax_tables/modal_add", $data_playlist_add);
        }
        /*$data_location_load_and_playlist = adds_model::data_location_load_and_playlist($data_location, $playlist_code);
            if($data_location_load_and_playlist){
            foreach ($data_location_load_and_playlist as $data){
                $next = $data->sequence;
                break;
                exit;
            }
             $data_playlist_update = array(
                    'playlist_code' => $next,
                    'time_stamp' => date('Y-m-d H:i:s')
                );
                adds_model::update_playlist_update($data_location, $data_playlist_update);      
        }*/
        } 
    }
    function get_all_add(){
        $data_location = $_POST['data'];
        $data = Adds_Model::get_loc_from_playlist($data_location);
        
        if($data){
            
            $data_files = array(
                'files' => $data
            );
            $this->load->view("files/ajax_tables/modal_add", $data_files);
        }
    }
    function get_adds_2(){
        $data_playlist_add = array(
                'filename' => 'video/video2',
            );
            
            $this->load->view("files/ajax_tables/modal_adds2", $data_playlist_add);
    }
    
    function get_all_add3(){
        //////
         $data = $this->session->userdata('session_log');
        foreach($data as $key => $value){
            if($key == 'sess_username'){
                $username = $value;
            }
            if($key == 'sess_department'){
                $department = $value;
            }
            if($key == 'sess_position'){
                $position = $value;
            }
            if($key == 'sess_user_code'){
                $usercode = $value;
            }
            if($key == 'sess_firstname'){
                $firstname = $value;
            }
            if($key == 'sess_lastname'){
                $lastname = $value;
            }
            if($key == 'sess_user_type'){
                $usertype = $value;
            }
        }
        //////
        $data_location = $_POST['data'];
        $data = Adds_Model::get_click_location($data_location);
        if($data){
            foreach($data as $data_click_loc){
                $data_loc_click_name = $data_click_loc->location_name;
                break;
            }
        }
        $data_location_clicked = $data_loc_click_name;
        $data_for_client_username_ = $username;
        $data_for_company = $firstname;
        $date_accessed = date("Y-m-d H:i:s");
        
        $data_tobe_insert = array(
            'location_name' => $data_location_clicked,
            'username' => $data_for_client_username_,
            'company' => $data_for_company,
            'date' => $date_accessed
        );
        Adds_Model::data_clicked_tobe_insert($data_tobe_insert);
        
        $data_location = $_POST['data'];
        $data = Adds_Model::get_playlist_updates($data_location);
        
        if($data){
            foreach($data as $data){
                $playlist_code = $data->playlist_code;
                //break;
            }
            $datas = Adds_Model::get_playlist_num_greaterthan($data_location, $playlist_code);
            $datass = Adds_Model::get_playlist_num_lessthan($data_location, $playlist_code);
            
            $data_ticker = Adds_Model::get_ticker($data_location);
            
            $data_files = array(
                'files' => $datas,
                'filed' => $datass,
                'ticker' => $data_ticker
            );
            
            $this->load->view("files/ajax_tables/modal_add", $data_files);
        }
    }
    function sample(){
        $data = array(
            'playlist_name' => "ok"
        );
        Adds_Model::insert("ok");
    }
    function sample1(){
        $this->load->view("files/sample/sample");
    }
    function update_video_playlist(){
        $update_video_playlist_num = Adds_Model::update_video_playlist_num(); //get last row in playlogs
        if($update_video_playlist_num){
            foreach($update_video_playlist_num as $update_video_playlist_num){
                $update_vid_playlist_loc = $update_video_playlist_num->DSClientCode; //get location code of the last row in playlogs
                $playlist_name = $update_video_playlist_num->DSMaterial; //get playlist video id of the last row in playlogs
            }
            $get_playlist_vid_id_update = Adds_Model::get_playlist_vid_id_update($update_vid_playlist_loc, $playlist_name); //get playlist id in table location report by playlist name
            foreach($get_playlist_vid_id_update as $get_playlist_vid_id_update){
                $playlist_vid_id = $get_playlist_vid_id_update->sequence;
            }
            $get_update_vid = Adds_Model::get_update_vid($update_vid_playlist_loc); //checking playlist update table location code is exist in the table
            if($get_update_vid){
                $data = array(
                    //'playlist_code' => 
                );
                Adds_Model::update_playlist_vid();
            }
        }
    }
    function update_video_playlist_id(){
        $loc_id = $this->uri->rsegment(3);
        $get_loc = Adds_Model::get_loc($loc_id);//get location_id in update_playlist
        
        if($get_loc){
            foreach($get_loc as $get_loc){
                $playlist_loc_code = $get_loc->location_code;     //set location_code from update_playlist
                $playlist_playlist_code = $get_loc->playlist_code;     //set playlist_code from update_playlist
                break;
            }
            if($playlist_playlist_code > 100){
                for($i = 1;$i < 100;$i ++){
                    $get_greater = Adds_Model::get_first_row($i, $loc_id);
                    if($get_greater){
                        $data_greater_hundred = array(
                            'playlist_code' => $i
                        );
                        Adds_Model::update_loc_playlist_first($i, $loc_id);
                    }
                    break;
                }
                
            }
            $get_playlist_code_and_loc_code = Adds_Model::get_playlist_code_and_loc_code($playlist_loc_code, $playlist_playlist_code); //get playlist_code and location_code in table_location_report
            if($get_playlist_code_and_loc_code){
                foreach($get_playlist_code_and_loc_code as $get_playlist_code_and_loc_code){
                    $loc_code_tbl = $get_playlist_code_and_loc_code->location_code; //location_code result from table location report
                    $playlist_code_tbl = $get_playlist_code_and_loc_code->sequence; //playlist_code result from table location report
                    break;
                }
                $num_playlist_code_tbl = $playlist_code_tbl + 1; //add increment 1 to playlist code as sequence
                
                $get_loc_increment = Adds_Model::get_loc_increment($loc_code_tbl, $num_playlist_code_tbl); //get playlist code form table location report using inceremented playlist_code and location_code
                //if true
                if($get_loc_increment){    //set for update to playlist_update
                    foreach($get_loc_increment as $get_loc_increment){
                        $playlist_update_loc_code = $get_loc_increment->location_code;
                        $playlist_tbl_playlist_code = $get_loc_increment->sequence;
                        break;
                    }
                    ///update
                    $update_update_playlist_tbl = array(
                        //'location_code' => $playlist_update_loc_code,
                        'playlist_code' => $playlist_tbl_playlist_code
                    );
                    Adds_Model::update_playlist_update_table($update_update_playlist_tbl, $loc_id);
                }else{
                    //false
                    $num = 100; // 1 to 100
                    $num_playlist = $num_playlist_code_tbl + 1; //add 1 to incremented $num_playlist_code_tbl variable
                    for($i == 1; $i <= $num;$i++){
                        if($i == $num_playlist){
                            $get_loc_increment = Adds_Model::get_loc_increment($loc_code_tbl, $num_playlist);
                                if($get_loc_increment){
                                    foreach($get_loc_increment as $get_loc_increment){
                                        $num_loc_tbl_update = $get_loc_increment->location_code;
                                        $num_playlist_tbl_update = $get_loc_increment->sequence;
                                        break;
                                    }
                                    //update
                                    $update_update_playlist_tbl = array(
                                        'playlist_code' => $num_playlist_tbl_update
                                    );
                                    Adds_Model::update_playlist_update_table($update_update_playlist_tbl, $num_loc_tbl_update);
                                }else{
                                    $num_playlist = $num_playlist + 1;
                                }
                        }
                    }
                   
                }
            }
        }
    }
    
    
}




?>
<?php
/*
 * 
 * function dummy for time
 * function sample(){
        $data_location = $_POST['data'];
        $data = adds_model::get_location($data_location);
        if($data){
            foreach ($data as $data){
                $loc_code = $data->location_code;
                $starting_time = $data->time;
                $d = strtotime($starting_time);
                $real_starting_time = date("H:i:s", $d); ///    09:30:00
                break;
                exit;
            }
            $data_plyst = adds_model::get_loc_from_playlist($loc_code) ;
            $x = $real_starting_time;
            $str = $x;
            $exp = (explode(":",$str));
            $hour = $exp[0];
            $min = $exp[1];
            $sec = $exp[2];
            
            $hour_sec = ($hour * 60) * 60;
            
            $min_sec = $min * 60;
            
            $sec_sec = $min_sec;
            
            
            echo $x . "</br>";
            
            
            $expld = (explode(":",gmdate("H:i:s", ($hour_sec+$min_sec+30)))) ;
            
            echo "</br>";
            
            
            
            $h_start = $hour;
            $h_ends = $expld[0];
            $m_start = $min;
            $m_end = floor($expld[1]) + 1;
            $s_start = $sec;
            $s_end = $expld[2];
            for($i=$h_start;$i<$h_ends+1;$i++){
                for($y=$m_start;$y<$m_end;$y++){
                   for($z=$s_start;$z<floor($expld[2]);$z++){
                      
                       
                   echo $i .":". $y .":". $z . "</br>";  
                   
                   
                }
                }
            }
            echo "</br>";
              
             echo gmdate("H:i:s", ($hour_sec+$min_sec+30));       
            foreach ($data_plyst as $data){
                           
            }
            
        }
    }
 * 
 * function load_add_files(){
       $data_location = $_POST['data'];
         
         $data = adds_model::get_location($data_location);
         if($data){
             foreach($data as $data){
                 $time = $data->time;
                 break;
             }
             $timespot = strtotime($time);
             $time_per_loc = date("H:i:s", $timespot);
             if($time_per_loc <= date('H:i:s')){
                  $data_loc =  adds_model::get_loc_from_playlist($data_location) ;
                  if($data_loc){
                      $time_upd = $time_per_loc;
                       foreach($data_loc as $data){
                           $len = $data->lenght;
                           $parts_of_time = explode(":", $time_upd); //if you know its safe
                           $time_to_seconds = ($parts_of_time[0] * 60 * 60 + $parts_of_time[1] * 60 + $parts_of_time[2])  ;
                           
                           $seconds = $time_to_seconds + $len;
                           $minutes = $seconds / 60;
                           $mod_seconds = $seconds % 60;
                           
                           $hours = $minutes / 60;
                           $mod_minutes = $minutes % 60;
                           
                           $real_time = date("H", $hours).":" .$mod_minutes.":".$mod_seconds;
                           
                           //$real = date("H:i:s", $real_time);
                           //$real_time = $time_to_seconds;
                           
                           $time_real = strtotime($real_time);
                           $time_upd = $real_time;
                           
                           $x = strtotime($time_upd);
                           
                           echo date("H:i:s", $x) . "</br>";
                           
                           //echo date("H:i:s", $time_real). "</br>";
                           if( ($time_per_loc <= date("H:i:s", $time_real) && date("H:i:s", $time_real) <= date("H:i:s"))  ){
                               //echo "ok";
                               //break;
                           } 
                           //break;
                           //exit;
                           
                       }
                  }
             }///
         }
    }///
$parts_of_time = explode(":", $time); //if you know its safe
                      $time_to_seconds = ($parts_of_time[0] * 60 * 60 + $parts_of_time[1] * 60 + $parts_of_time[2])  ;
                      
                      
                      
                       
                      $lenght_to_seconds = $lenght ;
                      
                      
                      
                      $totalseconnds = $time_to_seconds + $lenght_to_seconds;
                      
                      $minutes = $totalseconnds / 60;
                      $mod_seconds = $totalseconnds % 60;    //remainder seconds
                      
                      $hour = $minutes / 60;    //hours
                      $mod_minutes = $minutes %  60;    //remainder minutes
                      
                      $readable_time = date('H:i', $hour . $mod_minutes) .':'.$mod_seconds;
                      */?>