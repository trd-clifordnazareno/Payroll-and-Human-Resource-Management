<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends MX_controller{
  function __construct(){
  parent::__construct();
  //constructors here
  $this->load->model('admin/clients/clients_model');
  
  
  
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
        'page_content2' => 'Display Status'
    );
    echo modules::run("route/clients_template", $data);
    //$this->load->view('files/clients/view_clients', $data);
    }else{
        redirect('admin/login');
    }
  }
  function load_clients(){
    $data = array(
      'view_clients' => clients_model::get_all_clients()
    );
    echo modules::run("route/load_clients", $data);
//$this->load->view("files/ajax_tables/view_clients", $data);
  }
  function get_loc(){
    ////////////////get locations with foriegn key id of clients
      $client_code = $this->uri->rsegment(3);
      
      $data = clients_model::get_client_in_loc($client_code);
      
       $datas = $this->session->userdata('session_log');
    foreach($datas as $key => $value){
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
      
      if($data){
          $data = array(
              'data' => $data,
              'sess_username' => $username,
              'sess_department' => $department,
              'sess_position' => $position,
              'sess_usertype' => $usertype,
              'sess_firstname' => $firstname,
              'sess_lastname' => $lastname,
              'sess_usercode' => $usercode,
              'title' => 'Locations',
              'page_content' => 'Clients',
              'page_content2' => 'Locations'
          );
          echo modules::run("route/get_loc", $data);
          //$this->load->view("files/ajax_tables/view_loc_per_client", $data);
      }
  }
  function create_clients(){
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
        'd' => clients_model::get_all_client_list()
    );
    echo modules::run("route/create_clients", $data);
    //$this->load->view("files/clients/create_clients", $data);
    //$this->load->view('files/clients/view_clients', $data);
    }else{
        redirect('admin/login');
    }
      //$data['d'] = clients_model::get_all_client_list();
      //$this->load->view("files/clients/create_clients", $data);
  }
  function add_clients(){
      $client_name = $_POST['client_name'];
      
      
      
      $this->load->library("form_validation");
        
      $this->form_validation->set_rules('client_name', 'Client Name', 'trim|required');
      
      if($this->form_validation->run() == false){
                                             $data_err = array(
                                                 'error' => "please put client name"
                                             );
                                             $this->load->view("files/error/sticky_note", $data_err);
                                            }else{
                                                $get_client = clients_model::get_client($client_name);
      if($get_client){
          foreach($get_client as $data){
              $client_names = $data->client_name;
              $client_codes = $data->client_code;
          }
      }
      $data = clients_model::get_upload();
      
      if($data){
          foreach($data as $data){
              $filename_data = $data->file_name;
              $file_id = $data->video_file_id;
          }
          $data_new_upload = array(
              'client_name' => $client_names,
              'client_product' => $filename_data,
              'video_file_id' => $file_id,
              'client_list_id' => $client_name
          );
          
          clients_model::insert_new_upload($data_new_upload);
          clients_model::update_new_upload();
          $data_suc = array(
              'success' => "Youve Successfully Uploaded the Video File"
          );
          echo modules::run("route/add_clients", $data_suc);
          //$this->load->view("files/error/success", $data_suc);
          
          //self::table_clients();
      } 
                                            }
                                          
      
      
  }
  
  
  
  function clients_add(){
      $client_code = $_POST['client_code'];
      $ajax = $_POST['ajax'];
      
      $data = clients_model::get_clients_adds($client_code);
      if($data){
          if($ajax){
              foreach($data as $data){
                  echo "<option value=$data->client_product>" . str_replace("_", " ", $data->client_product) . "</option>";
              }
              //$datas['data'] = $data;
              //$this->load->view("files/playlist/ajax/dropdown", $datas);
          }
      }
  }
  
  
  
  function create_spec_clients(){
      $data = clients_model::get_all_client_list();
      if($data){
          $datas['data'] = $data;
          echo modules::run("route/clients_add", $datas);
          //$this->load->view("files/clients/add_clients", $datas);
      }else{
          echo modules::run("route/clients_add", $datas);
          //$this->load->view("files/clients/add_clients", $datas);
      }
      
  }
  function add_new_client_list(){
      $count_clients = clients_model::count_clients();
      if($count_clients){
          foreach($count_clients as $count_clients){
              $count_num = sprintf('%09d', $count_clients->counts + 1);
          }
      }else{
          $count_num = sprintf('%09d', 1);
      }
      
      $ads = "ADS";
      
      
      $client_name = $_POST['client_name'];
      
      $client_id = $_POST['client_id'];
      
      
      
      $client_id_assign = $ads.$client_id.$count_num;
      
      $this->load->library("form_validation");
        
      $this->form_validation->set_rules('client_name', 'Client Name', 'trim|required');
      $this->form_validation->set_rules('client_id', 'Client ID', 'trim|required');
      
      if($this->form_validation->run() == false){
          $data = array(
              'error' => "Please complete and input a correct specified fields"
          );
          $this->load->view("files/clients/ajax/error", $data);
      }else{
          $check_code = clients_model::check_code($client_id_assign);
      if($check_code){
          $data = array(
              'error' => "The ID you specified are Existing"
          );
          echo modules::run("route/err_add_new_client_list", $data);
          //$this->load->view("files/clients/ajax/error", $data);
      }
      else{
          $data = array(
              'client_name' => $client_name,
              'client_code' => $client_id_assign
          );
          clients_model::insert_new_client_list($data);
          $data_suc = array(
              'success' => "You successfully added new client"
          );
          echo modules::run("route/add_new_client_list", $data_suc);
          //$this->load->view("files/clients/ajax/success", $data_suc);
      }
      }
      
  }
  function load_clients_names(){
      $data = clients_model::get_all_clients();
      if($data){
          if($data){
              $client_list = array(
                  'clients' => $data
              );
              echo modules::run("route/load_clients_names", $client_list);
              //$this->load->view("files/playlist/add_content", $client_list);
          }
      }
  }
  
  
  
  
  function sample(){
      //$post = [
    //'user' => 'AgilaDS',
//];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://222.127.76.78/nextcloud/index.php/apps/files/?dir=/&fileid=4465');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query('user=AgilaDS'));
$response = curl_exec($ch);
if($response){
    echo "ok";
}else{
    echo "x";
}
var_export($response);
  }
  function x(){
      //username and password of account


//set the directory for the cookie using defined document root var
$dir = DOC_ROOT."/ctemp";
//build a unique path with every request to store 
//the info per user with custom func. 
//$path = build_unique_path($dir);

//login form action url
$url="http://222.127.76.78/nextcloud/index.php/login?"; 
$postinfo = "user=AgilaDS"."&password=richmediasignage";

//$cookie_file_path = $path."/cookie.txt";

$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_NOBODY, false);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

//curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file_path);
//set the cookie the site has for certain features, this is optional
curl_setopt($ch, CURLOPT_COOKIE, "cookiename=0");
curl_setopt($ch, CURLOPT_USERAGENT,
    "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.7.12) Gecko/20050915 Firefox/1.0.7");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_REFERER, $_SERVER['REQUEST_URI']);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postinfo);
curl_exec($ch);

//page with the content I want to grab
curl_setopt($ch, CURLOPT_URL, "http://222.127.76.78/nextcloud/index.php/apps/files/?dir=/&fileid=4465");
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_HEADER, false); 
//do stuff with the info with DomDocument() etc
$html = curl_exec($ch);
if($html){
    echo "ok";
}else{
    echo "x";
}

curl_close($ch);
  }
  function xxx(){
      //step1
$cSession = curl_init(); 
//step2
curl_setopt($cSession,CURLOPT_URL,"http://222.127.76.78/nextcloud/index.php/login?user=AgilaDS&password=richmediasignage");
curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
curl_setopt($cSession,CURLOPT_HEADER, false); 
//step3
$result=curl_exec($cSession);
//step4
if($result){
    //header('Location: http://222.127.76.78/nextcloud/index.php/apps/files/?dir=/&fileid=4465/');
    redirect("http://222.127.76.78/nextcloud/index.php/apps/files/?dir=/AgilaDS/Material&fileid=4481");
}

curl_close($cSession);
//step5

  }
  function table_clients(){
      $client_code = $_POST['client_name'];
      $data = clients_model::get_client_files($client_code);
      if($data){
          $data_list = array(
              'data' => $data
          );
          echo modules::run("route/table_clients", $data_list);
          //$this->load->view("files/clients/ajax/table_clients", $data_list);
      }

  }
  function listh(){
      echo modules::run("route/listh");
      //$this->load->view("files/sample/samples");
  }
  function l(){
      $data['data'] = 10;
      $this->load->view("files/sample/file", $data);
  }
  function display_crawler(){
      $loc_id = $this->uri->rsegment(3);
      $data = clients_model::get_playlist_number($loc_id);
      
      if($data){
          ////////// code //////////
          
      $del_crawler_type = clients_model::del_crawler_type_with_loc($loc_id);
      $get_crawler_loc = clients_model::get_loc($loc_id);
      if($get_crawler_loc){
          foreach($get_crawler_loc as $data){
                 $crawler_type_id = $data->crawler_type_id;
                 $location_id = $data->location_id;
                 $crawler_message = $data->crawler_message;
                 $data_ins = array(
                     'playlist_type_number' => $crawler_type_id,
                     'location_code' => $location_id,
                     'message' => $crawler_message
                 );
                 clients_model::insert_new_crawler_type($data_ins);
             }
             /////step1
             $look_up = clients_model::look_up($loc_id);
             if($look_up){
                 foreach ($look_up as $data){
                     $num = $data->crawler_type_id;
                 }
             }else{
                 $data_insert_look_up = array(
                     'location_id' => $loc_id,
                     'crawler_type_id' => 1
                 );
                 clients_model::insert_new_look_up($data_insert_look_up);
                 $get_look_up = clients_model::get_look_up($loc_id);
                 if($get_look_up){
                     foreach ($get_look_up as $data){
                         $num = $data->crawler_type_id;
                     }
                 }
             }
             ///////step2
             $get_data = clients_model::get_crawler_data($loc_id, $num); 
             if($get_data){
                 $num_update = $num + 1;
                 
                 $get_crawler_type_exist = clients_model::get_crawler_type_exist($num_update, $loc_id);
                 if($get_crawler_type_exist){
                    
                     
                      $get_greather_max = clients_model::get_greather_max($loc_id, $num_update);
                      if($get_greather_max){
                          $data_look_up = array(
                        'location_id' => $loc_id,
                        'crawler_type_id' => $num_update
                     );
                     clients_model::update_crawler_running($data_look_up, $loc_id);
                      }else{
                           $data_look_up = array(
                        'location_id' => $loc_id,
                        'crawler_type_id' => $num_update + 1
                    );
                     clients_model::update_crawler_running($data_look_up, $loc_id);
                     redirect("admin/clients/clients/display_crawler/$loc_id");
                      }
                 }else{
                     $data_look_up = array(
                     'location_id' => $loc_id,
                     'crawler_type_id' => 1
                    );
                     clients_model::update_crawler_running($data_look_up, $loc_id);
                 }
                 
                 
                 
                 $str = 0;
                 foreach ($get_data as $datas){
                     $len = strlen($datas->message);
                     $str = $str + $len;
                 }
                 
                 
                 $datax = array(
                    'itm' => $get_data,
                    'loc_id' => $loc_id,
                     'len' => $str,
                     'div' => 790
                    );
      echo modules::run("route/display_crawler", $datax);
                    //$this->load->view("files/sample/tik", $datax);
             }
      }
      
      ///////////////////////////////////////
      }
      else{
         $get_loc = clients_model::get_loc($loc_id);
         if($get_loc){
             foreach($get_loc as $data){
                 $crawler_type_id = $data->crawler_type_id;
                 $location_id = $data->location_id;
                 $crawler_message = $data->crawler_message;
                 $data_ins = array(
                     'playlist_type_number' => $crawler_type_id,
                     'location_code' => $location_id,
                     'message' => $crawler_message
                 );
                 clients_model::insert_new_crawler_type($data_ins);
             }
             $data_look_up = array(
                     'location_id' => $loc_id,
                     'crawler_type_id' => 1
                 );
             clients_model::update_crawler_running($data_look_up, $loc_id);
             redirect("admin/clients/clients/display_crawler/$loc_id");
             //$get_data = clients_model::get_playlist_number($loc_id); 
             //if($get_data){
                 //$datax = array(
                    //'itm' => $get_data,
                    //'loc_id' => $loc_id
                   //);
      
                    //$this->load->view("files/sample/tik", $datax);
             //}
         }else{
             $datax = array(
                    'itm' => "unavailable",
                    'loc_id' => 0
                    );
      echo modules::run("route/display_crawler", $datax);
                    //$this->load->view("files/sample/tik", $datax);
         }
      }
      
      
      
      
     //exit;
      
      ///////
     /* foreach($data as $data){
          $num = $data->playlist_type_number;
      }
      $numbr = $num + 1;
      $data_ins = array(
          'playlist_type_number' => $numbr
      );
      clients_model::insert_pl_n($data_ins);
      
      $get_playlist_num = clients_model::get_playlist_num($numbr);
      if($get_playlist_num){
      $datax = array(
          'itm' => $get_playlist_num,
          'loc_id' => $loc_id
          );
      $dataxxxx['type'] = $get_playlist_num;
      $this->load->view("files/sample/tik", $datax);
      $this->load->view("files/sample/type", $dataxxxx);
      
      }else{
          clients_model::del_playlist_type();
          redirect("clients/clients/tik");
      }*/
      ////
      
  }
  function tik(){
      $itm['itm'] = $this->uri->rsegment(3);
      echo modules::run("route/tik", $itm);
      //$this->load->view("files/sample/tik", $itm);
  }
  function load_type(){
      $loc_id = $this->uri->rsegment(3);
      $data = clients_model::get_loc_and_type($loc_id);
      if($data){
          foreach ($data as $data){
              $num = $data->crawler_type_id - 1;
          }
          if($num == 0){
              $max_data = clients_model::max_data($loc_id);
              foreach ($max_data as $data){
                  $num = $data->crawler_type_id;
                  break;
              }
          }
          $crawler_type_id = $num;
          $data_crawler_id = clients_model::data_crawler_id($crawler_type_id);
          if($data_crawler_id){
              foreach ($data_crawler_id as $data){
                  echo strtoupper($data->crawler_name) . "</div>";
                  break;
              }
          }
      }else{
          echo "UNAVAILABLE";
      }
  }
  function load_types(){
      $loc_id = $this->uri->rsegment(3);
      
      
          
          if($num == 0){
              $max_data = clients_model::max_data($loc_id);
              foreach ($max_data as $data){
                  $num = $data->crawler_type_id;
                  break;
              }
          }
          $crawler_type_id = $num;
          /*$get_len_crawler_type_id = clients_model::get_len_crawler_type_id($loc_id, $num);
          if($get_len_crawler_type_id){
              $crawler_type_id = 1;
          }*/
          if($data_crawler_id){
              foreach ($data_crawler_id as $data){
                  echo $data->crawler_type_id . strtoupper($data->crawler_name);
                  break;
              }
          }
      
  }
  function load(){
      $data = clients_model::get_playlist_number_specific();
      if($data){
          foreach ($data as $data){
              $playlist_type_id = $data->crawler_type_number;
          }
          $crawler_type_number = clients_model::get_playlist_type($playlist_type_id);
          if($crawler_type_number){
              foreach($crawler_type_number as $crawler_type_number){
                  $crawler_id = $crawler_type_number->crawler_type_id;
              }
              $get_crawler_type_id = clients_model::get_crawler_type_id($crawler_id);
              
              if($get_crawler_type_id){
                  foreach($get_crawler_type_id as $datas){
                      echo $datas->crawler_name;
                  }
              }else{
                  echo "ok";
              }
          }else{
               $data_max_crawler_id = clients_model::get_playlist_number_specific();
               foreach($data_max_crawler_id as $data){
                   $max_crawler_id = $data->crawler_type_number;
               }
              clients_model::del_crawler_type($max_crawler_id);
         clients_model:: del_playlist_type();
          }
      }else{
          echo "x";
      }
      
  }
  function display_crawler_interval(){
      $loc_id = $this->uri->rsegment(3);
      $data = clients_model::get_playlist_number($loc_id);
      
      if($data){
          ////////// code //////////
          
      $del_crawler_type = clients_model::del_crawler_type_with_loc($loc_id);
      $get_crawler_loc = clients_model::get_loc($loc_id);
      if($get_crawler_loc){
          foreach($get_crawler_loc as $data){
                 $crawler_type_id = $data->crawler_type_id;
                 $location_id = $data->location_id;
                 $crawler_message = $data->crawler_message;
                 $data_ins = array(
                     'playlist_type_number' => $crawler_type_id,
                     'location_code' => $location_id,
                     'message' => $crawler_message
                 );
                 clients_model::insert_new_crawler_type($data_ins);
             }
             /////step1
             $look_up = clients_model::look_up($loc_id);
             if($look_up){
                 foreach ($look_up as $data){
                     $num = $data->crawler_type_id;
                 }
             }else{
                 $data_insert_look_up = array(
                     'location_id' => $loc_id,
                     'crawler_type_id' => 1
                 );
                 clients_model::insert_new_look_up($data_insert_look_up);
                 $get_look_up = clients_model::get_look_up($loc_id);
                 if($get_look_up){
                     foreach ($get_look_up as $data){
                         $num = $data->crawler_type_id;
                     }
                 }
             }
             ///////step2
             $get_data = clients_model::get_crawler_data($loc_id, $num); 
             if($get_data){
                 $num_update = $num + 1;
                 
                 $get_crawler_type_exist = clients_model::get_crawler_type_exist($num_update, $loc_id);
                 if($get_crawler_type_exist){
                    
                    
                      $get_greather_max = clients_model::get_greather_max($loc_id, $num_update);
                      if($get_greather_max){
                          $data_look_up = array(
                     'location_id' => $loc_id,
                     'crawler_type_id' => $num_update
                     );
                     clients_model::update_crawler_running($data_look_up, $loc_id);
                      }else{
                           $data_look_up = array(
                     'location_id' => $loc_id,
                     'crawler_type_id' => $num_update + 1
                    );
                     clients_model::update_crawler_running($data_look_up, $loc_id);
                     redirect("admin/clients/clients/display_crawler/$loc_id");
                      }
                 }else{
                     $data_look_up = array(
                     'location_id' => $loc_id,
                     'crawler_type_id' => 1
                    );
                     clients_model::update_crawler_running($data_look_up, $loc_id);
                 }
                 
                 
                 
                 $str = 0;
                 foreach ($get_data as $datas){
                     $len = strlen($datas->message);
                     $str = $str + $len;
                 }
                 
                 //clients_model::update_crawler_running($data_look_up, $loc_id);
                 $datax = array(
                    'itm' => $get_data,
                    'loc_id' => $loc_id,
                     'len' => $str,
                     'div' => 500
                    );
      echo modules::run("route/display_crawler_interval", $datax);
                    //$this->load->view("files/sample/tik", $datax);
             }
      }
      
      ///////////////////////////////////////
      }
      else{
         $get_loc = clients_model::get_loc($loc_id);
         if($get_loc){
             foreach($get_loc as $data){
                 $crawler_type_id = $data->crawler_type_id;
                 $location_id = $data->location_id;
                 $crawler_message = $data->crawler_message;
                 $data_ins = array(
                     'playlist_type_number' => $crawler_type_id,
                     'location_code' => $location_id,
                     'message' => $crawler_message
                 );
                 clients_model::insert_new_crawler_type($data_ins);
             }
             $data_look_up = array(
                     'location_id' => $loc_id,
                     'crawler_type_id' => 1
                 );
             clients_model::update_crawler_running($data_look_up, $loc_id);
             redirect("admin/clients/clients/display_crawler_interval/$loc_id");
             //$get_data = clients_model::get_playlist_number($loc_id); 
             //if($get_data){
                 //$datax = array(
                    //'itm' => $get_data,
                    //'loc_id' => $loc_id
                   //);
      
                    //$this->load->view("files/sample/tik", $datax);
             //}
         }else{
             $datax = array(
                    'itm' => "unavailable",
                    'loc_id' => 0
                    );
      echo modules::run("route/display_crawler_interval", $datax);
                    //$this->load->view("files/sample/tik", $datax);
         }
      }
      
      
      
      
     //exit;
      
      ///////
     /* foreach($data as $data){
          $num = $data->playlist_type_number;
      }
      $numbr = $num + 1;
      $data_ins = array(
          'playlist_type_number' => $numbr
      );
      clients_model::insert_pl_n($data_ins);
      
      $get_playlist_num = clients_model::get_playlist_num($numbr);
      if($get_playlist_num){
      $datax = array(
          'itm' => $get_playlist_num,
          'loc_id' => $loc_id
          );
      $dataxxxx['type'] = $get_playlist_num;
      $this->load->view("files/sample/tik", $datax);
      $this->load->view("files/sample/type", $dataxxxx);
      
      }else{
          clients_model::del_playlist_type();
          redirect("clients/clients/tik");
      }*/
      ////
      
  }function samplesss(){
      echo modules::run("route/samplesss");
      //$this->load->view("files/sample/sample");
  }
  function display_crawler_interval_sample(){
      $loc_id = $this->uri->rsegment(3);
      $data = clients_model::get_playlist_number($loc_id);
      
      if($data){
          ////////// code //////////
          
      $del_crawler_type = clients_model::del_crawler_type_with_loc($loc_id);
      $get_crawler_loc = clients_model::get_loc($loc_id);
      if($get_crawler_loc){
          foreach($get_crawler_loc as $data){
                 $crawler_type_id = $data->crawler_type_id;
                 $location_id = $data->location_id;
                 $crawler_message = $data->crawler_message;
                 $data_ins = array(
                     'playlist_type_number' => $crawler_type_id,
                     'location_code' => $location_id,
                     'message' => $crawler_message
                 );
                 clients_model::insert_new_crawler_type($data_ins);
             }
             /////step1
             $look_up = clients_model::look_up($loc_id);
             if($look_up){
                 foreach ($look_up as $data){
                     $num = $data->crawler_type_id;
                 }
             }else{
                 $data_insert_look_up = array(
                     'location_id' => $loc_id,
                     'crawler_type_id' => 1
                 );
                 clients_model::insert_new_look_up($data_insert_look_up);
                 $get_look_up = clients_model::get_look_up($loc_id);
                 if($get_look_up){
                     foreach ($get_look_up as $data){
                         $num = $data->crawler_type_id;
                     }
                 }
             }
             ///////step2
             $get_data = clients_model::get_crawler_data($loc_id, $num); 
             if($get_data){
                 $num_update = $num + 1;
                 
                 $get_crawler_type_exist = clients_model::get_crawler_type_exist($num_update, $loc_id);
                 if($get_crawler_type_exist){
                     $data_look_up = array(
                     'location_id' => $loc_id,
                     'crawler_type_id' => $num_update
                 );
                 }else{
                     $data_look_up = array(
                     'location_id' => $loc_id,
                     'crawler_type_id' => 1
                 );
                 }
                 
                 
                 
                 $str = 0;
                 foreach ($get_data as $datas){
                     $len = strlen($datas->message);
                     $str = $str + $len;
                 }
                 
                 clients_model::update_crawler_running($data_look_up, $loc_id);
                 $datax = array(
                    'itm' => $get_data,
                    'loc_id' => $loc_id,
                     'len' => $str,
                     'div' => 500
                    );
      echo modules::run("route/display_crawler_interval_sample", $datax);
                    //$this->load->view("files/sample/tik", $datax);
             }
      }
      
      ///////////////////////////////////////
      }
      else{
         $get_loc = clients_model::get_loc($loc_id);
         if($get_loc){
             foreach($get_loc as $data){
                 $crawler_type_id = $data->crawler_type_id;
                 $location_id = $data->location_id;
                 $crawler_message = $data->crawler_message;
                 $data_ins = array(
                     'playlist_type_number' => $crawler_type_id,
                     'location_code' => $location_id,
                     'message' => $crawler_message
                 );
                 clients_model::insert_new_crawler_type($data_ins);
             }
             $data_look_up = array(
                     'location_id' => $loc_id,
                     'crawler_type_id' => 1
                 );
             clients_model::update_crawler_running($data_look_up, $loc_id);
             redirect("admin/clients/clients/display_crawler_interval/$loc_id");
             //$get_data = clients_model::get_playlist_number($loc_id); 
             //if($get_data){
                 //$datax = array(
                    //'itm' => $get_data,
                    //'loc_id' => $loc_id
                   //);
      
                    //$this->load->view("files/sample/tik", $datax);
             //}
         }else{
             $datax = array(
                    'itm' => "unavailable",
                    'loc_id' => 0
                    );
      echo modules::run("route/display_crawler_interval_sample", $datax);
                    //$this->load->view("files/sample/tik", $datax);
         }
      }
      
      
      
      
     //exit;
      
      ///////
     /* foreach($data as $data){
          $num = $data->playlist_type_number;
      }
      $numbr = $num + 1;
      $data_ins = array(
          'playlist_type_number' => $numbr
      );
      clients_model::insert_pl_n($data_ins);
      
      $get_playlist_num = clients_model::get_playlist_num($numbr);
      if($get_playlist_num){
      $datax = array(
          'itm' => $get_playlist_num,
          'loc_id' => $loc_id
          );
      $dataxxxx['type'] = $get_playlist_num;
      $this->load->view("files/sample/tik", $datax);
      $this->load->view("files/sample/type", $dataxxxx);
      
      }else{
          clients_model::del_playlist_type();
          redirect("clients/clients/tik");
      }*/
      ////
      
  }
  function display_crawler_sample(){
      $loc_id = $this->uri->rsegment(3);
      $data = clients_model::get_playlist_number($loc_id);
      
      if($data){
          ////////// code //////////
          
      $del_crawler_type = clients_model::del_crawler_type_with_loc($loc_id);
      $get_crawler_loc = clients_model::get_loc($loc_id);
      if($get_crawler_loc){
          foreach($get_crawler_loc as $data){
                 $crawler_type_id = $data->crawler_type_id;
                 $location_id = $data->location_id;
                 $crawler_message = $data->crawler_message;
                 $data_ins = array(
                     'playlist_type_number' => $crawler_type_id,
                     'location_code' => $location_id,
                     'message' => $crawler_message
                 );
                 clients_model::insert_new_crawler_type($data_ins);
             }
             /////step1
             $look_up = clients_model::look_up($loc_id);
             if($look_up){
                 foreach ($look_up as $data){
                     $num = $data->crawler_type_id;
                 }
             }else{
                 $data_insert_look_up = array(
                     'location_id' => $loc_id,
                     'crawler_type_id' => 1
                 );
                 clients_model::insert_new_look_up($data_insert_look_up);
                 $get_look_up = clients_model::get_look_up($loc_id);
                 if($get_look_up){
                     foreach ($get_look_up as $data){
                         $num = $data->crawler_type_id;
                     }
                 }
             }
             ///////step2
             $get_data = clients_model::get_crawler_data($loc_id, $num); 
             if($get_data){
                 $num_update = $num + 1;
                 
                 $get_crawler_type_exist = clients_model::get_crawler_type_exist($num_update, $loc_id);
                 if($get_crawler_type_exist){
                     $data_look_up = array(
                     'location_id' => $loc_id,
                     'crawler_type_id' => $num_update
                 );
                 }else{
                     $data_look_up = array(
                     'location_id' => $loc_id,
                     'crawler_type_id' => 1
                 );
                 }
                 
                 
                 
                 $str = 0;
                 foreach ($get_data as $datas){
                     $len = strlen($datas->message);
                     $str = $str + $len;
                 }
                 
                 clients_model::update_crawler_running($data_look_up, $loc_id);
                 $datax = array(
                    'itm' => $get_data,
                    'loc_id' => $loc_id,
                     'len' => $str,
                     'div' => 790
                    );
      echo modules::run("route/display_crawler_sample", $datax);
                    //$this->load->view("files/sample/tik", $datax);
             }
      }
      
      ///////////////////////////////////////
      }
      else{
         $get_loc = clients_model::get_loc($loc_id);
         if($get_loc){
             foreach($get_loc as $data){
                 $crawler_type_id = $data->crawler_type_id;
                 $location_id = $data->location_id;
                 $crawler_message = $data->crawler_message;
                 $data_ins = array(
                     'playlist_type_number' => $crawler_type_id,
                     'location_code' => $location_id,
                     'message' => $crawler_message
                 );
                 clients_model::insert_new_crawler_type($data_ins);
             }
             $data_look_up = array(
                     'location_id' => $loc_id,
                     'crawler_type_id' => 1
                 );
             clients_model::update_crawler_running($data_look_up, $loc_id);
             redirect("admin/clients/clients/display_crawler/$loc_id");
             //$get_data = clients_model::get_playlist_number($loc_id); 
             //if($get_data){
                 //$datax = array(
                    //'itm' => $get_data,
                    //'loc_id' => $loc_id
                   //);
      
                    //$this->load->view("files/sample/tik", $datax);
             //}
         }else{
             $datax = array(
                    'itm' => "unavailable",
                    'loc_id' => 0
                    );
      echo modules::run("route/display_crawler_interval_sample", $datax);
                    //$this->load->view("files/sample/tik", $datax);
         }
      }
      
      
      
      
     //exit;
      
      ///////
     /* foreach($data as $data){
          $num = $data->playlist_type_number;
      }
      $numbr = $num + 1;
      $data_ins = array(
          'playlist_type_number' => $numbr
      );
      clients_model::insert_pl_n($data_ins);
      
      $get_playlist_num = clients_model::get_playlist_num($numbr);
      if($get_playlist_num){
      $datax = array(
          'itm' => $get_playlist_num,
          'loc_id' => $loc_id
          );
      $dataxxxx['type'] = $get_playlist_num;
      $this->load->view("files/sample/tik", $datax);
      $this->load->view("files/sample/type", $dataxxxx);
      
      }else{
          clients_model::del_playlist_type();
          redirect("clients/clients/tik");
      }*/
      ////
      
  }
  function crawler_start(){
      $loc_id = $this->uri->rsegment(3);
      //$data = clients_model::get_playlist_number($loc_id);
      
      $get_crawler_max = clients_model::get_crawler_max($loc_id);///////get max
      if($get_crawler_max){
          foreach($get_crawler_max as $get_crawler_max){
              $crawler_type_id = $get_crawler_max->crawler_type_id;
              break;
          }
          if($crawler_type_id == ""){
              $get_min_crawler_type_id = clients_model::get_min_crawler_type_id($loc_id);
              if($get_min_crawler_type_id){
                  foreach($get_min_crawler_type_id as $get_min_crawler_type_id){
                      $crawler_type_id = $get_min_crawler_type_id->crawler_type_id;
                      break;
              }
              }else{
                  $crawler_type_id = 1;
              }
              //$crawler_type_id = 1;
          }
          $get_crawler_type_id_from_max = clients_model::get_crawler_type_id_from_max($loc_id, $crawler_type_id); /////get crawler_type_id
          if($get_crawler_type_id_from_max){
              $get_crawler_type_logo = clients_model::get_crawler_type_logo($crawler_type_id);
              foreach($get_crawler_type_logo as $get_crawler_type_logo){
                  $logo = $get_crawler_type_logo->logo;
                  $indicate = $get_crawler_type_logo->indicate;break;
              }
              
              $num = $crawler_type_id + 1;
              
              $next_crawler_type_id = clients_model::next_crawler_type_id($loc_id, $num); ///get next crawler_type_id
              if($next_crawler_type_id){
                  $data = array(
                       'crawler_type_id' => $num,
                      'location_id' => $loc_id
                  );
                  clients_model::insert_new_crawler_type_id($data); ///insert new crawler_type_id true
              }else{
                  $data = array(
                       'crawler_type_id' => $num,
                      'location_id' => $loc_id
                  );
                  clients_model::insert_new_crawler_type_id($data); ///insert new crawler_type_id false
              }
              $str = 0;
              $msg = "";
              foreach($get_crawler_type_id_from_max as $get_crawler_type_id_from_max){
                                $date_i = strtotime($get_crawler_type_id_from_max->start_date);
                                $date_y = strtotime($get_crawler_type_id_from_max->end_date);

                                $start_date = date('Y-m-d H:i:s', $date_i);
                                $end_date = date('Y-m-d H:i:s', $date_y);
                                
                                $time_now = date("Y-m-d H:i:s");
                                
                                
                                
                                if($start_date <= $time_now and $end_date >= $time_now){
                                    $message = $get_crawler_type_id_from_max->crawler_message;
                                    $len = strlen($get_crawler_type_id_from_max->crawler_message);
                                    $str = $str + $len;
                                    $msg = $msg . $get_crawler_type_id_from_max->crawler_message . "&nbsp" . "•" . "&nbsp";
                                    
                                    
                                    
                                    
                                    $datax = array(
                                    'itm' => $msg,
                                     'loc_id' => $loc_id,
                                    'len' => $str,
                                    'div' => 790,
                                        'logo' => $logo,
                                        'indicate' => $indicate
                                );
                                    //$this->load->view("files/sample/tik", $datax);
                                }else{
                                    $message = "You Are Watching Richmedia Digital Signage";
                                    $len = strlen($get_crawler_type_id_from_max->crawler_message);
                                    $str = $str + $len;
                                    $datax = array(
                                    'itm' => $message,
                                     'loc_id' => $loc_id,
                                    'len' => $str,
                                    'div' => 790,
                                        
                                );
                                    //$this->load->view("files/sample/tik", $datax);
                                }
                                
                                
              }
              echo modules::run("route/display_crawler_interval_sample", $datax);
              //$this->load->view("files/sample/tik", $datax);
          }else{
              $num = $crawler_type_id + 1;
              
              $get_next_crawler_type_id = clients_model::next_crawler_type_id($loc_id, $num);
              if($get_next_crawler_type_id){
                  $data = array(
                      'crawler_type_id' => $num,
                      'location_id' => $loc_id
                  );
                  clients_model::insert_new_crawler_type_id($data);
                                    redirect("admin/clients/clients/crawler_start/$loc_id");
                  
              }else{
                  $get_len_crawler_type_id = clients_model::get_len_crawler_type_id($loc_id, $num);
                  if($get_len_crawler_type_id){
                      $data = array(
                      'crawler_type_id' => $num,
                      'location_id' => $loc_id
                  );
                  clients_model::insert_new_crawler_type_id($data);
                                    redirect("admin/clients/clients/crawler_start/$loc_id");
                  }else{
                      clients_model::del_all_crawler_type_id($loc_id);
                      $data = array(
                      'crawler_type_id' => 1,
                      'location_id' => $loc_id
                  ); 
                  clients_model::insert_new_crawler_type_id($data);
                                    redirect("admin/clients/clients/crawler_start/$loc_id");
                  }
              }
          }
      }else{
          $get_crawlers = clients_model::get_crawlers($loc_id);
          if($get_crawlers){
              $data_ins = array(
                  'location_id' => $loc_id,
                  'crawler_type_id' => 1
              );
              $ins_crawler_running = clients_model::ins_crawler_running($data_ins);
              redirect("admin/clients/clients/crawler_start/$loc_id");
          }else{
                                    $message = "You Are Watching Richmedia Digital Signage";
                                    $len = strlen($get_crawler_type_id_from_max->crawler_message);
                                    $str = $str + $len;
                                    $datax = array(
                                    'itm' => $message,
                                     'loc_id' => $loc_id,
                                    'len' => $str,
                                    'div' => 790,    
                                    );
                                    echo modules::run("route/display_crawler_interval_sample", $datax);
                                    //$this->load->view("files/sample/tik", $datax);
          }
      }
  }
  function crawler_start_next(){
      $loc_id = $this->uri->rsegment(3);
      //$data = clients_model::get_playlist_number($loc_id);
      
      $get_crawler_max = clients_model::get_crawler_max($loc_id);///////get max
      if($get_crawler_max){
          foreach($get_crawler_max as $get_crawler_max){
              $crawler_type_id = $get_crawler_max->crawler_type_id;
              break;
          }
          $get_crawler_type_id_from_max = clients_model::get_crawler_type_id_from_max($loc_id, $crawler_type_id); /////get crawler_type_id
          if($get_crawler_type_id_from_max){
              $get_crawler_type_logo = clients_model::get_crawler_type_logo($crawler_type_id);
              foreach($get_crawler_type_logo as $get_crawler_type_logo){
                  $logo = $get_crawler_type_logo->logo;
                  $indicate = $get_crawler_type_logo->indicate;break;
              }
              
              $num = $crawler_type_id + 1;
              
              $next_crawler_type_id = clients_model::next_crawler_type_id($loc_id, $num); ///get next crawler_type_id
              if($next_crawler_type_id){
                  $data = array(
                       'crawler_type_id' => $num,
                      'location_id' => $loc_id
                  );
                  clients_model::insert_new_crawler_type_id($data); ///insert new crawler_type_id true
              }else{
                  $data = array(
                       'crawler_type_id' => $num,
                      'location_id' => $loc_id
                  );
                  clients_model::insert_new_crawler_type_id($data); ///insert new crawler_type_id false
              }
              $str = 0;
              $msg = "";
              foreach($get_crawler_type_id_from_max as $get_crawler_type_id_from_max){
                                $date_i = strtotime($get_crawler_type_id_from_max->start_date);
                                $date_y = strtotime($get_crawler_type_id_from_max->end_date);

                                $start_date = date('Y-m-d H:i:s', $date_i);
                                $end_date = date('Y-m-d H:i:s', $date_y);
                                
                                $time_now = date("Y-m-d H:i:s");
                                
                                if($start_date <= $time_now and $end_date >= $time_now){
                                    $message = $get_crawler_type_id_from_max->crawler_message;
                                    $len = strlen($get_crawler_type_id_from_max->crawler_message);
                                    $str = $str + $len;
                                    $msg = $msg . $get_crawler_type_id_from_max->crawler_message . "&nbsp" . "•" . "&nbsp";
                                    $datax = array(
                                    'itm' => $msg,
                                     'loc_id' => $loc_id,
                                    'len' => $str,
                                    'div' => 790,
                                        'logo' => $logo,
                                        'indicate' => $indicate
                                );
                                    //$this->load->view("files/sample/tik", $datax);
                                }else{
                                    $message = "You Are Watching Richmedia Digital Signage";
                                    $len = strlen($get_crawler_type_id_from_max->crawler_message);
                                    $str = $str + $len;
                                    $datax = array(
                                    'itm' => $message,
                                     'loc_id' => $loc_id,
                                    'len' => $str,
                                    'div' => 790,
                                        
                                );
                                    //$this->load->view("files/sample/tik", $datax);
                                }
                                
                                
              }
              echo modules::run("route/display_crawler_interval_sample", $datax);
              //$this->load->view("files/sample/tik", $datax);
          }else{
              $num = $crawler_type_id + 1;
              
              $get_next_crawler_type_id = clients_model::next_crawler_type_id($loc_id, $num);
              if($get_next_crawler_type_id){
                  $data = array(
                      'crawler_type_id' => $num,
                      'location_id' => $loc_id
                  );
                  clients_model::insert_new_crawler_type_id($data);
                  redirect("admin/clients/clients/crawler_start_next/$loc_id");
                  
              }else{
                  $get_len_crawler_type_id = clients_model::get_len_crawler_type_id($loc_id, $num);
                  if($get_len_crawler_type_id){
                      $data = array(
                      'crawler_type_id' => $num,
                      'location_id' => $loc_id
                  );
                  clients_model::insert_new_crawler_type_id($data);
                                    
                                    redirect("admin/clients/clients/crawler_start_next/$loc_id");
                  }else{
                      clients_model::del_all_crawler_type_id($loc_id);
                      $data = array(
                      'crawler_type_id' => 1,
                      'location_id' => $loc_id
                  ); 
                  clients_model::insert_new_crawler_type_id($data);
                                     redirect("admin/clients/clients/crawler_start_next/$loc_id");
                  }
              }
          }
      }
  }
  function csv(){
          clients_model::ExportCSV();
      //$x = "ads-seaport-2-170911-01";
            //$this->load->database();
//$query = $this->db->get('crawlers');
 
//$this->load->helper('csv');
//query_to_csv($query, TRUE, 'toto.csv');
  }
  function create_clients_account(){
      $client_username_account = $_POST['client_username_account'];
      $client_password = $_POST['client_password'];
      $company_name = $_POST['company_name'];
      $user_type = $_POST['user_type'];
      
      
      
      $this->load->library("form_validation");
        
      $this->form_validation->set_rules('client_username_account', 'Client Username Account Name', 'trim|required');
      $this->form_validation->set_rules('client_password', 'Client Password', 'trim|required');
      $this->form_validation->set_rules('company_name', 'Company Name', 'trim|required');
      
      if($this->form_validation->run() == false){
        $data_err = array(
            'error' => "please input fields"
            );
        echo modules::run("route/err_stick_note", $data_err);
        //$this->load->view("files/error/sticky_note", $data_err);
        }else{
            $client_user_name_detail = $this->input->post("client_username_account");
            $client_password_detail = $this->input->post("client_password");
            $company_name_detail = $this->input->post("company_name");
            $user_type_detail = $this->input->post("user_type");
            
            $data_client_account = array(
                'client_username' => $client_user_name_detail,
                'client_password' => $client_password_detail,
                'client_corporate_name' => $company_name_detail,
                    'user_type' => $user_type_detail
            );
            clients_model::insert_client_accounts($data_client_account);
            $data_err = array(
            'success' => "YOU SUCCESSFULLY ADDED"
            );
            echo modules::run("route/success", $data_err);
            //$this->load->view("files/clients/ajax/success", $data_err);
        }
  }
}



?>
