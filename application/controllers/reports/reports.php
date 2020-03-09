<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Reports extends CI_controller{
  function __construct(){
  parent::__construct();
  //constructors here
  $this->load->model('report/report_model');
  $this->load->model('clients/clients_model');
  
  
  
  $this->load->helper('url');
  $this->load->helper('csv');
  error_reporting(0);
}
  function index(){
    if($this->session->userdata('session_log')){
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
    $data_client_lists = report_model::client_list();
    $data = array(
        'sess_username' => $username,
        'sess_department' => $department,
        'sess_position' => $position,
        'sess_usertype' => $usertype,
        'sess_firstname' => $firstname,
        'sess_lastname' => $lastname,
        'sess_usercode' => $usercode,
        'title' => 'Clients',
        'page_content' => 'Display Users',
        'page_content2' => 'Display Status',
        'datas' => $data_client_lists
    );
    $this->load->view('files/reporting/reports', $data);
    }else{
        redirect('login');
    }
   // if ($handle = opendir('file://C:/xampp/htdocs/rmn/js/reports')) {
   

    /* This is the correct way to loop over the directory. */
   // while (false !== ($entry = readdir($handle))) {
    //    if($entry == "ADSSEAPORT2017091500-crawlers.csv"){
	//		echo $entry;
	//	}
   // }

    

   // closedir($handle);
//}

  }
  function txt(){
      $client_name = $_POST['txt'];
      $get_client_code = report_model::get_client_code($client_name);
    foreach($get_client_code as $data){
        $client_id = $data->client_code;
        break;
    }
      
      
      
      $time = $_POST['timelaps'];
      $str = $time;
      $explode_time = (explode("-",$str));
      $start_time = str_replace("AM", "", $explode_time[0]);
      $end_time = str_replace("AM", "", $explode_time[1]);
      $realtime = str_replace("/", "-", $start_time);
      $format_start_time = strtotime($start_time);
      $format_end_date = strtotime($end_time);
      //echo date("Y-d-m H:i:s", $format_start_time);
      //echo "</br>";
      //echo date("Y-d-m H:i:s", $format_end_date);
      $stdate = date("Y-m-d H:i:s", $format_start_time);
      $enddate = date("Y-m-d H:i:s", $format_end_date);
      //echo $stdate . "ok";
      
          $get_loc = report_model::get_loc($client_id);
          
          if($get_loc){
              //foreach($get_loc as $get_loc){
                  //$data['data'] = $get_loc->location_code;
              $data = array(
                 'data' => $get_loc,
                      'start' => $stdate,
                  'end' => $enddate
              );
                  $this->load->view("files/reporting/ajax/files", $data);
              //}
          }else{
              echo "none";
          }
     
  }
  function go(){
      //$this->load->helper('url');
      $_loc_id = $this->uri->rsegment(3);
      $clients_id = $this->uri->rsegment(4);
      $start_date = date("Y-m-d H:i:s", $this->uri->rsegment(5));
      $end_date = date("Y-m-d H:i:s", $this->uri->rsegment(6));
      //additional code
      $start_d = strtotime($start_date);
      $end_d = strtotime($end_date);
      $convert_start_time = date("Y-m-d", $start_d);
      $convert_end_time = date("Y-m-d", $end_d);
      
      
      
          $get_log = report_model::get_log($_loc_id, $clients_id, $convert_start_time, $convert_end_time);
          if($get_log){
              report_model::delete_playlist();
             
             $get_playlist_num = report_model::get_playlist_numbr($clients_id);
             if($get_playlist_num){
                 foreach($get_playlist_num as $get_playlist_num){
                     $client_name = $get_playlist_num->client_name;
                     $client_codes = $get_playlist_num->client_code;
                     break;
             }
             }
             echo "<a href=" . site_url() . "/reports/reports/pdf_per_loops_per_loc/" . date("Y-m-d", $this->uri->rsegment(5)) . "/" . date("Y-m-d", $this->uri->rsegment(6)) . "/" . $client_name . "/" . $_loc_id . ">" . " <button class='btn bg-maroon btn-flat margin'>Export Playlist</button>" . "</a>";
             echo "<a href=" . site_url() . "/reports/reports/pdf_loops_per_clients_loc_per_loc/" . date("Y-m-d", $this->uri->rsegment(5)) . "/" . date("Y-m-d", $this->uri->rsegment(6)) . "/" . $client_name .  "/" . $_loc_id . ">" . " <button class='btn bg-maroon btn-flat margin'>Export Playlist</button>" . "</a>" . "</br>";
             //$get_log = report_model::get_log($_loc_id, $clients_id, $start_date, $end_date);
             $data = array(
                  'data' => $get_log,
                  'startdate' => $start_date,
                  'enddate' => $end_date
              );
              $this->load->view("files/reporting/ajax/table_logs", $data);
          }
     
      
  }
  /*function go(){
      //$this->load->helper('url');
      $_loc_id = $this->uri->rsegment(3);
      $clients_id = $this->uri->rsegment(4);
      $start_date = date("Y-m-d H:i:s", $this->uri->rsegment(5));
      $end_date = date("Y-m-d H:i:s", $this->uri->rsegment(6));
      
      
      $get_reports = report_model::get_loc($clients_id);
      if($get_reports){
          $get_log = report_model::get_log($_loc_id, $clients_id, $start_date, $end_date);
          if($get_log){
              report_model::delete_playlist();
             foreach($get_log as $get_log_data){
                 $loc_code_data = $get_log_data->loc_code_data;
                 $clients_code_data = $get_log_data->clients_code;
                 $filename_code_data = $get_log_data->filename_code;
                 $filename_data = $get_log_data->filename;
                 $lenght_data = $get_log_data->lenght;
                 $play_data = $get_log_data->play;
                 $from_data = $get_log_data->start;
                 $expire_data = $get_log_data->expire;
                 $sequence_data = $get_log_data->sequence;
                 $ins_playlist_data = array(
                         'PlaylistNumber' => $sequence_data,
                         'MovieTitle' => $filename_data,
                         'VideoLengthSec' => $lenght_data,
                     'StartDate' => $from_data,
                     'EndDate' => $expire_data,
                     'LoopShows' => $play_data,
                     'ClientCode' => $clients_code_data
                         );
                 report_model::insert_playlist($ins_playlist_data);
             }
             $get_playlist_num = report_model::get_playlist_numbr("ADSWL000000004");
             if($get_playlist_num){
                 foreach($get_playlist_num as $get_playlist_num){
                     $client_name = $get_playlist_num->client_name;
                     $client_codes = $get_playlist_num->client_code;
                     break;
             }
             }
             echo "<a href=http://localhost/rmn/index.php/reports/reports/pdf_per_loops/" . date("Y-m-d", $this->uri->rsegment(5)) . "/" . date("Y-m-d", $this->uri->rsegment(6)) . "/" . $client_name .">" . " <button class='btn bg-maroon btn-flat margin'>Export Playlist</button>" . "</a>";
             echo "<a href=http://192.168.254.104/rmn/index.php/reports/reports/pdf_loops_per_clients_loc/" . date("Y-m-d", $this->uri->rsegment(5)) . "/" . date("Y-m-d", $this->uri->rsegment(6)) . "/" . $client_name .">" . " <button class='btn bg-maroon btn-flat margin'>Export Playlist</button>" . "</a>" . "</br>";
             
             
              //echo "<a href=http://localho
   * st/rmn/index.php/reports/reports/create_location_playlist/$_loc_id/$clients_id>" . " <button class='btn bg-maroon btn-flat margin'>Export Playlist</button>" . "</a>" . "</br>";
              //echo "<a href=http://localhost/rmn/index.php/reports/reports/create_ds_info/$_loc_id/$clients_id>" . " <button class='btn bg-maroon btn-flat margin'>Export Ds Info</button>" . "</a>" . "</br>";
              $data = array(
                  'data' => $get_log,
                  'startdate' => $start_date,
                  'enddate' => $end_date
              );
              $this->load->view("files/reporting/ajax/table_logs", $data);
              //report_model::create_csv($_loc_id, $clients_id);
          }
      }
      
  }*/
  function create_logs(){
      $_loc_id = $this->uri->rsegment(3);
      $clients_id = $this->uri->rsegment(4);
      
      report_model::create_logs_rep($_loc_id, $clients_id);
  }
  function create_location_playlist(){
      $_loc_id = $this->uri->rsegment(3);
      $clients_id = $this->uri->rsegment(4);
      report_model::del_ds_info();
         $data = report_model::get_ds_info($_loc_id);
         
      
      if($data){
          foreach($data as $data){
              $loc_name = $data->location_name;
              $time_on = $data->time;
              
              $time_off = $data->time_Off;
              $Id = $data->location_code;
              $datas = array(
                  'LocationName' => $loc_name,
                  'TimeOn' => $time_on,
                  'TimeOff' => $time_off,
                  'Id' => $Id
              );
              report_model::ds_info_ins($datas);
          }
      }   
      report_model::create_location_playlist($_loc_id);
      
      
      
      
  }
  function create_ds_info(){
      $_loc_id = $this->uri->rsegment(3);
      $clients_id = $this->uri->rsegment(4);
      report_model::del_ds_info();
      $data = report_model::get_ds_info($_loc_id);
         
      
      if($data){
          foreach($data as $data){
              $loc_name = $data->location_name;
              $time_on = $data->time;
              
              $time_off = $data->time_Off;
              $Id = $data->location_code;
              $datas = array(
                  'LocationName' => $loc_name,
                  'TimeOn' => $time_on,
                  'TimeOff' => $time_off,
                  'Id' => $Id
              );
              report_model::ds_info_ins($datas);
          }
      }   
      report_model::get_location_playlist($_loc_id);
      
  }
  function gettime(){
      $time = $_POST['timelaps'];
      $str = $time;
      $explode_time = (explode("-",$str));
      $start_time = str_replace("AM", "", $explode_time[0]);
      $end_time = str_replace("AM", "", $explode_time[1]);
      $realtime = str_replace("/", "-", $start_time);
      $format_start_time = strtotime($start_time);
      $format_end_date = strtotime($end_time);
      //echo date("Y-d-m H:i:s", $format_start_time);
      //echo "</br>";
      //echo date("Y-d-m H:i:s", $format_end_date);
      $stdate = date("m-d-Y H:i:s", $format_start_time);
      $enddate = date("m-d-Y H:i:s", $format_end_date);
      echo $stdate;
  }
  function csv_create_playlist(){
      $_loc_id = $this->uri->rsegment(3);
      report_model::del_ds_info();
         $data = report_model::get_ds_info($_loc_id);
         
      
      if($data){
          foreach($data as $data){
              $loc_name = $data->location_name;
              $time_on = $data->time;
              
              $time_off = $data->time_Off;
              $Id = $data->location_code;
              $datas = array(
                  'LocationName' => $loc_name,
                  'TimeOn' => $time_on,
                  'TimeOff' => $time_off,
                  'Id' => $Id
              );
              report_model::ds_info_ins($datas);
          }
      }   
      report_model::csv_playlist($_loc_id);
  }
  function csv_ds_info(){
      $_loc_id = $this->uri->rsegment(3);
      report_model::del_ds_info();
      $data = report_model::get_ds_info($_loc_id);
         
      
      if($data){
          foreach($data as $data){
              $loc_name = $data->location_name;
              $time_on = $data->time;
              
              $time_off = $data->time_Off;
              $Id = $data->location_code;
              $datas = array(
                  'LocationName' => $loc_name,
                  'TimeOn' => $time_on,
                  'TimeOff' => $time_off,
                  'Id' => $Id
              );
              report_model::ds_info_ins($datas);
          }
      }   
      report_model::get_location_playlist($_loc_id);
  }
  function csv_create_crawlers(){
      $_loc_id = $this->uri->rsegment(3);
         $data = report_model::get_ds_info($_loc_id);
         
      
      if($data){
          report_model::csv_crawlers($_loc_id);
      }   
      
  }
  function create_csv_client_per_loc(){
      $loc_id = $this->uri->rsegment(4);
              $client_id = $this->uri->rsegment(3);
              
              
              
              $loc_id_for_playlist_table = $this->uri->rsegment(3);
              $client_id_for_playlist_table = $this->uri->rsegment(4);
              
              $file_id = $this->uri->rsegment(5);
               $start_date = str_replace("%20", " ", $this->uri->rsegment(6));
               $end_date = str_replace("%20", " ", $this->uri->rsegment(7));
      
              //echo $loc_id. $client_id. $filename;exit;
              $get_client_loc_file_per_client = report_model::get_client_loc_file_per_client($loc_id_for_playlist_table, $client_id_for_playlist_table, $file_id);
              if($get_client_loc_file_per_client){
                  foreach($get_client_loc_file_per_client as $get_client_loc_file_per_client){
                      $filename = $get_client_loc_file_per_client->filename;
                      break;
                  }
                  
              }
              report_model::get_client_loc_file_per_client_rep($loc_id, $client_id, $filename, $start_date, $end_date); 
  }
  
  
  
  function pdf()
{
   $this->load->library('Pdf');
   $data = report_model::get_rep();
   $datas = array(
       //'data' => "ok"
       'data' => $data
   );
   $this->load->view("pdf/pdfreport", $datas);
    
         
    //$pdf->Write(5, 'CodeIgniter TCPDF Integration');
   // $pdf->Output('pdf/pdfreport.pdf', 'I');
}



function pdf_loops()
{
   $this->load->library('Pdf');
   $data = report_model::get_rep_total_loops();
   $datas = array(
       //'data' => "ok"
       'data' => $data
   );
   $this->load->view("pdf/pdfreport_loops", $datas);
    
         
    //$pdf->Write(5, 'CodeIgniter TCPDF Integration');
   // $pdf->Output('pdf/pdfreport.pdf', 'I');
}
function rep(){
    $data = report_model::get_rep();
    $x = "";
    $num = 0;
    foreach($data as $data){
        if($x == ""){
            $x = $data->DSLocationCode;
            $num = $num+1;
            echo $data->DSLocationCode . "</br>";
            
        }else if($x == $data->DSLocationCode){
            $x = $data->DSLocationCode;
            $num = $num+1;
            echo $data->DSLocationCode . "</br>";
            
        }else if($x != $data->DSLocationCode){
            
            echo $num . "</br>";
            
            echo "do something" . "</br>";
            echo $data->DSLocationCode . "</br>";
            $x = $data->DSLocationCode;
            $num = 0;
            $num = $num+1;
            
            
            
            
        }
        //echo $num;
    }
    echo $num;
}
function dis_rep(){
    $data['datas'] = report_model::client_list();
    $this->load->view("files/reporting/view_rep", $data);
}
function view_rep(){
    $start_date = $_POST['startdate'];
    $end_date = $_POST['enddate'];
    $client_code = $this->uri->rsegment(3);
    $get_client_code = report_model::get_client_code($client_code);
    foreach($get_client_code as $data){
        $client_id = $data->client_code;
        break;
    }
   $data = report_model::total_loops($start_date, $end_date, $client_id);
   $datas = array(
       //'data' => "ok"
       'data' => $data,
       'start' => $start_date,
       'end' => $end_date
   );
   $this->load->view("pdf/pdf_ajax/pdfreport_loops_page", $datas);
}
function pdf_per_loops()
{
    $start = $this->uri->rsegment(3);
    $end = $this->uri->rsegment(4);
    $client_code = $this->uri->rsegment(5);
    $get_client_code = report_model::get_client_code($client_code);
    foreach($get_client_code as $data){
        $client_id = $data->client_code;
        break;
    }
   $this->load->library('Pdf');
   $data = report_model::get_rep_total_per_loops($start, $end, $client_id);
   $data_seaport = report_model::get_rep_total_per_loops($start, $end, $client_id);
   $data_airport = report_model::get_rep_total_per_loops($start, $end, $client_id);
   $data_count = report_model::get_rep_total_per_loops($start, $end, $client_id);
   $get_playlist_num = report_model::get_playlist_num($client_id);
   $datas = array(
       //'data' => "ok"
       'data' => $data,
           'start' => $start,
       'end' => $end,
       'client_id' => $client_id,
       'client_name' => $client_code,
       'len' => $get_playlist_num,
       'seaport'=>$data_seaport,
       'airport' => $data_airport,
       'loop_count_seaport' => $data_airport,
       'type' => 0
   );
   //$this->load->view("pdf/pdf_ajax/loop_count", $datas);
   $this->load->view("pdf/new_pdf_per_loc", $datas);
    
         
    //$pdf->Write(5, 'CodeIgniter TCPDF Integration');
   // $pdf->Output('pdf/pdfreport.pdf', 'I');
}
function pdf_loops_per_clients_loc()
{
    $start = $this->uri->rsegment(3);
    $end = $this->uri->rsegment(4);
    $client_code = $this->uri->rsegment(5);
    $get_client_code = report_model::get_client_code($client_code);
    foreach($get_client_code as $data){
        $client_id = $data->client_code;
        break;
    }
    $this->load->library('Pdf');
   $data = report_model::get_rep_per_clients_loc($start, $end, $client_id);
   $get_playlist_num = report_model::get_playlist_num($client_id);
   $datas = array(
       //'data' => "ok"
       'data' => $data,
       'start' => $start,
       'end' => $end,
       'client_id' => $client_id,
       'client_name' => $client_code,
       'len' => $get_playlist_num
   );
   $this->load->view("pdf/pdf_per_loc", $datas);
       
    //$pdf->Write(5, 'CodeIgniter TCPDF Integration');
   // $pdf->Output('pdf/pdfreport.pdf', 'I');
}



function pdf_per_loops_per_loc()
{
    $start = $this->uri->rsegment(3);
    $end = $this->uri->rsegment(4);
    $client_code = $this->uri->rsegment(5);
    $loc_code = $this->uri->rsegment(6);
    $get_client_code = report_model::get_client_code($client_code);
    foreach($get_client_code as $data){
        $client_id = $data->client_code;
        break;
    }
   $this->load->library('Pdf');
   $data = report_model::get_rep_total_per_loops_per_loc($start, $end, $client_id, $loc_code);
   $get_playlist_num = report_model::get_playlist_num($client_id);
   $datas = array(
       //'data' => "ok"
       'data' => $data,
           'start' => $start,
       'end' => $end,
       'client_id' => $client_id,
       'client_name' => $client_code,
       'len' => $get_playlist_num
   );
   $this->load->view("pdf/pdf_ajax/loop_count", $datas);
    
         
    //$pdf->Write(5, 'CodeIgniter TCPDF Integration');
   // $pdf->Output('pdf/pdfreport.pdf', 'I');
}
function pdf_loops_per_clients_loc_per_loc()
{
    $start = $this->uri->rsegment(3);
    $end = $this->uri->rsegment(4);
    $client_code = $this->uri->rsegment(5);
    $loc_code = $this->uri->rsegment(6);
    $get_client_code = report_model::get_client_code($client_code);
    foreach($get_client_code as $data){
        $client_id = $data->client_code;
        break;
    }
    $this->load->library('Pdf');
   $data = report_model::get_rep_per_clients_loc_per_loc($start, $end, $client_id, $loc_code);
   $get_playlist_num = report_model::get_playlist_num($client_id);
   $datas = array(
       //'data' => "ok"
       'data' => $data,
       'start' => $start,
       'end' => $end,
       'client_id' => $client_id,
       'client_name' => $client_code,
       'len' => $get_playlist_num
   );
   $this->load->view("pdf/pdf_per_loc", $datas);
       
    //$pdf->Write(5, 'CodeIgniter TCPDF Integration');
   // $pdf->Output('pdf/pdfreport.pdf', 'I');
}

/////////////////////////////////////////////////////////////////////////
function new_pdf_per_loops()
{
    $start = $this->uri->rsegment(3);
    $end = $this->uri->rsegment(4);
    $client_code = $this->uri->rsegment(5);
    $get_client_code = report_model::get_client_code($client_code);
    foreach($get_client_code as $data){
        $client_id = $data->client_code;
        break;
    }
   $this->load->library('Pdf');
   $data = report_model::get_rep_total_per_loops($start, $end, $client_id);
   $get_playlist_num = report_model::get_playlist_num($client_id);
   $datas = array(
       //'data' => "ok"
       'data' => $data,
           'start' => $start,
       'end' => $end,
       'client_id' => $client_id,
       'client_name' => $client_code,
       'len' => $get_playlist_num
   );
   //$this->load->view("pdf/pdf_ajax/loop_count", $datas);
   $this->load->view("pdf/new_pdf_per_loc", $datas);
    
         
    //$pdf->Write(5, 'CodeIgniter TCPDF Integration');
   // $pdf->Output('pdf/pdfreport.pdf', 'I');
}



function pdf_per_loops_download()
{
    $start = $this->uri->rsegment(3);
    $end = $this->uri->rsegment(4);
    $client_code = $this->uri->rsegment(5);
    $get_client_code = report_model::get_client_code($client_code);
    foreach($get_client_code as $data){
        $client_id = $data->client_code;
        break;
    }
   $this->load->library('Pdf');
   $data = report_model::get_rep_total_per_loops($start, $end, $client_id);
   $data_seaport = report_model::get_rep_total_per_loops($start, $end, $client_id);
   $data_airport = report_model::get_rep_total_per_loops($start, $end, $client_id);
   $data_count = report_model::get_rep_total_per_loops($start, $end, $client_id);
   $get_playlist_num = report_model::get_playlist_num($client_id);
   $datas = array(
       //'data' => "ok"
       'data' => $data,
           'start' => $start,
       'end' => $end,
       'client_id' => $client_id,
       'client_name' => $client_code,
       'len' => $get_playlist_num,
       'seaport'=>$data_seaport,
       'airport' => $data_airport,
       'loop_count_seaport' => $data_airport,
       'type' => 1
   );
   //$this->load->view("pdf/pdf_ajax/loop_count", $datas);
   $this->load->view("pdf/new_pdf_per_loc", $datas);
    
         
    //$pdf->Write(5, 'CodeIgniter TCPDF Integration');
   // $pdf->Output('pdf/pdfreport.pdf', 'I');
}
function reportbydate(){
    $data_date = report_model::data_date();
    $data_item = report_model::data_item();
    $data_loc = report_model::data_loc();
    
    echo "<table border=1>";
    foreach($data_date as $data_dates){
        echo "<tr>";
        $date = $data_dates->date_a;
        $num = 0;
        foreach($data_loc as $data_locs){
            $loc = $data_locs->DSClientCode;
            
            foreach($data_item as $data_items){
                if($data_items->item_a == $date && $data_items->DSClientCode == $loc){
                    $num = $num + 1;
                }
            }
            echo "<td>$num $loc</td>";
            $num = 0;
        }
        echo "</tr>";
    }
    echo "</table>";
}
function reportbydates(){
    
    
    
    $start = $this->uri->rsegment(3);
    $end = $this->uri->rsegment(4);
    $client_code = $this->uri->rsegment(5);
    $get_client_code = report_model::get_client_code($client_code);
    foreach($get_client_code as $data){
        $client_id = $data->client_code;
        break;
    }
   $this->load->library('Pdf');
   $data = report_model::get_rep_total_per_loops($start, $end, $client_id);
   $data_seaport = report_model::get_rep_total_per_loops($start, $end, $client_id);
   $data_airport = report_model::get_rep_total_per_loops($start, $end, $client_id);
   $data_count = report_model::get_rep_total_per_loops($start, $end, $client_id);
   $get_playlist_num = report_model::get_playlist_num($client_id);
   
   
   
    $data_date = report_model::data_date($start, $end, $client_id);
    $data_item = report_model::data_item($start, $end, $client_id);
    $data_loc = report_model::data_loc($start, $end, $client_id);
    
    $data_loc_count = report_model::data_loc_count($start, $end, $client_id);
    
    
   $datas = array(
       //'data' => "ok"
       'data' => $data,
           'start' => $start,
       'end' => $end,
       'client_id' => $client_id,
       'client_name' => $client_code,
       'len' => $get_playlist_num,
       'seaport'=>$data_seaport,
       'airport' => $data_airport,
       'loop_count_seaport' => $data_airport,
       'type' => 0,
       'data_date' => $data_date,
       'data_item' => $data_item,
       'data_loc' => $data_loc,
       'data_count' => $data_count,
       'data_loc_count' => $data_loc_count
   );
    $this->load->view("pdf/pdf_date", $datas);
}




function reportbydates_download(){
    
    
    
    $start = $this->uri->rsegment(3);
    $end = $this->uri->rsegment(4);
    $client_code = $this->uri->rsegment(5);
    $get_client_code = report_model::get_client_code($client_code);
    foreach($get_client_code as $data){
        $client_id = $data->client_code;
        break;
    }
   $this->load->library('Pdf');
   $data = report_model::get_rep_total_per_loops($start, $end, $client_id);
   $data_seaport = report_model::get_rep_total_per_loops($start, $end, $client_id);
   $data_airport = report_model::get_rep_total_per_loops($start, $end, $client_id);
   $data_count = report_model::get_rep_total_per_loops($start, $end, $client_id);
   $get_playlist_num = report_model::get_playlist_num($client_id);
   
   
   
    $data_date = report_model::data_date($start, $end, $client_id);
    $data_item = report_model::data_item($start, $end, $client_id);
    $data_loc = report_model::data_loc($start, $end, $client_id);
    
    $data_loc_count = report_model::data_loc_count($start, $end, $client_id);
    
    
   $datas = array(
       //'data' => "ok"
       'data' => $data,
           'start' => $start,
       'end' => $end,
       'client_id' => $client_id,
       'client_name' => $client_code,
       'len' => $get_playlist_num,
       'seaport'=>$data_seaport,
       'airport' => $data_airport,
       'loop_count_seaport' => $data_airport,
       'type' => 1,
       'data_date' => $data_date,
       'data_item' => $data_item,
       'data_loc' => $data_loc,
       'data_count' => $data_count,
       'data_loc_count' => $data_loc_count
   );
    $this->load->view("pdf/pdf_date", $datas);
}




//============================================================+
    // File name   : example_001.php
    // Begin       : 2008-03-04
    // Last Update : 2013-05-14
    //
    // Description : Example 001 for TCPDF class
    //               Default Header and Footer
    //
    // Author: Nicola Asuni
    //
    // (c) Copyright:
    //               Nicola Asuni
    //               Tecnick.com LTD
    //               www.tecnick.com
    //               info@tecnick.com
    //============================================================+
 
    /**
    * Creates an example PDF TEST document using TCPDF
    * @package com.tecnick.tcpdf
    * @abstract TCPDF - Example: Default Header and Footer
    * @author Nicola Asuni
    * @since 2008-03-04
    */
 
    // create new PDF document
    /*$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    
 
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Nicola Asuni');
    $pdf->SetTitle('TCPDF Example 001');
    $pdf->SetSubject('TCPDF Tutorial');
    $pdf->SetKeywords('TCPDF, PDF, example, test, guide');   
 
    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 
 
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
 
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
 
    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);    
 
    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); 
 
    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);  
 
    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }   
 
    // ---------------------------------------------------------    
 
    // set default font subsetting mode
    $pdf->setFontSubsetting(true);   
 
    // Set font
    // dejavusans is a UTF-8 Unicode font, if you only need to
    // print standard ASCII chars, you can use core fonts like
    // helvetica or times to reduce file size.
    $pdf->SetFont('dejavusans', '', 14, '', true);   
 
    // Add a page
    // This method has several options, check the source code documentation for more information.
    $pdf->AddPage(); 
 
    // set text shadow effect
    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
 
    // Set some content to print
    $html = <<<EOD
    <h1>Welcome to <a href="http://www.tcpdf.org" style="text-decoration:none;background-color:#CC0000;color:black;">&nbsp;<span style="color:black;">TC</span><span style="color:white;">PDF</span>&nbsp;</a>!</h1>
    <i>This is the first example of TCPDF library.</i>
    <p>This text is printed using the <i>writeHTMLCell()</i> method but you can also use: <i>Multicell(), writeHTML(), Write(), Cell() and Text()</i>.</p>
    <p>Please check the source code documentation and other examples for further information.</p>
    <p style="color:#CC0000;">TO IMPROVE AND EXPAND TCPDF I NEED YOUR SUPPORT, PLEASE <a href="http://sourceforge.net/donate/index.php?group_id=128076">MAKE A DONATION!</a></p>
EOD;
 
    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
 
    // ---------------------------------------------------------    
 
    // Close and output PDF document
    // This method has several options, check the source code documentation for more information.
    $pdf->Output('example_001.pdf', 'I');    
 
    //============================================================+
    // END OF FILE
    //============================================================+
     * 
     */
   
   
   
   
   /*
    * 
    * 
    * 
    * 
    * /*$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$title = "PDF Report";
$pdf->SetTitle($title);
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING);
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetDefaultMonospacedFont('helvetica');
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->SetFont('helvetica', '', 9);
$pdf->setFontSubsetting(false);
$pdf->AddPage();
ob_start();
    $x = "ok";
    $content = $x;
ob_end_clean();
$pdf->writeHTML($content, true, false, true, false, '');
$pdf->Output('example_001.pdf', 'I');*/
}
