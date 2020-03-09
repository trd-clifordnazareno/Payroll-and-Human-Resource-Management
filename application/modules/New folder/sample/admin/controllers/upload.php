<?php
class Upload extends CI_controller{
    function __construct(){
    parent::__construct();
                $this->load->helper(array('form', 'url'));
  }
    function index(){
        $this->load->view('files/uploads/upload_form', array('error' => ' ' ));
    }
    function do_upload(){
        $config['upload_path']          = './js/uploads/';
                $config['allowed_types']        = 'gif|jpg|png|mp4';
                //$config['max_size']             = 100;
                //$config['max_width']            = 1024;
                //$config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('files/uploads/upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        $this->load->view('files/uploads/upload_success', $data);
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