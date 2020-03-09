<?php
class View_Running_Status extends MX_controller{
    function __construct(){
    parent::__construct();
    //constructors here
    $this->load->model('admin/locations/locations');
    $this->load->model('admin/playlist/playlist_model');
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
        
        ///update add if there are expired     //////////////////////////////////////////////////////////////////
        
         $data_select_expired = playlist_model::data_select_expired(date("Y-m-d H:i:s"));
        if($data_select_expired){
           
                $location_code = "";
                $clients_code = "";
                $filename_code = "";
                $filename = "video/video";
                $lenght = "";
                $play = "";
                $from = "";
                $expire = "";
                $data_update_playlist = array(
                    //'clients_code' => $clients_code,
                    //'filename_code' => $filename_code,
                    //'filename' => $filename,
                    'lenght' => $lenght,
                    'play' => $play,
                    'start' => $from,
                    'expire' => $expire
                );
                playlist_model::update_playlist_table_index($data_update_playlist, date("Y-m-d H:i:s"));
           
        }
        
        ///update ticker if there are expired    //////////////////////////////////////////////////////////////
        
        $data_select_expired_ticker = playlist_model::data_select_expired_ticker(date("Y-m-d H:i:s"));
        if($data_select_expired_ticker){
           
                $location_id = "";
                $crawler_message = "";
                $start_date = "";
                $end_date = "";
                $playlist_id = "";
                $data_update_playlist_ticker = array(
                    //'location_id' => $location_id,
                    //'crawler_message' => $crawler_message,
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    //'playlist_id' => $playlist_id,
                );
                playlist_model::update_playlist_table_ticker($data_update_playlist_ticker, date("Y-m-d H:i:s"));
           
        }
        
        
        
        
        $data = array(
            'sess_username' => $username,
            'sess_department' => $department,
            'sess_position' => $position,
            'sess_usertype' => $usertype,
            'sess_firstname' => $firstname,
            'sess_lastname' => $lastname,
            'sess_usercode' => $usercode,
            'title' => 'Display Users',
            'page_content' => 'Display Users',
            'page_content2' => 'Display Status'
        );
        echo Modules::run("route/view_dig_signage", $data);
        //$this->load->view('files/reports/view_dig_signage', $data);
        }else{
            redirect('admin/login');
            //redirect('login');
        }
        
    }
    function view_status(){
        $data = locations::get_loc();
        $data = array(
            'view_locations' => $data,
            'trd' => $trd = playlist_model::get_trd(),
                'client_load' => playlist_model::client_load()
        );
        echo modules::run("route/view_status", $data);
        //$this->load->view("files/ajax_tables/view_status", $data);
    }
    function get_location(){
        $data = $this->uri->rsegment(3);
        $segmt = $data;
        $datas = locations::get_per_loc($data);
        
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
        
        $data_select_expired = playlist_model::data_select_expired(date("Y-m-d H:i:s"));
        if($data_select_expired){
           
                $location_code = "";
                $clients_code = "";
                $filename_code = "";
                $filename = "video/video";
                $lenght = "";
                $play = "";
                $from = "";
                $expire = "";
                $data_update_playlist = array(
                    //'clients_code' => $clients_code,
                    //'filename_code' => $filename_code,
                    //'filename' => $filename,
                    'lenght' => $lenght,
                    'play' => $play,
                    'start' => $from,
                    'expire' => $expire
                );
                playlist_model::update_playlist_table($segmt, $data_update_playlist, date("Y-m-d H:i:s"));
           
        }
        $get_file_data = playlist_model::get_all_file();
        $data = array(
            'data' => $datas,
            'sess_username' => $username,
            'sess_position' => $position,
            'sess_department' => $department,
            'sess_firstname' => $firstname,
            'sess_lastname' => $lastname,
            'title' => 'Playlist',
            'page_content' => 'Clients',
            'page_content2' => 'Locations',
            'page_content3' => 'Playlist',
            'file_data' => $get_file_data,
            'segmt' => $segmt
        );
        
        echo modules::run("route/get_location", $data);
            //$this->load->view("files/locations/view_loc", $data);
     
    }
    function update_playlist(){
        $data_segment = $this->uri->rsegment(3);
        
        $datas = playlist_model::get_loc_code($data_segment);
        if($datas){
            foreach($datas as $data){
                $playlist_id = $data->table_location_reports_id;
                $filename_code = $data->filename_code;
                $time = date('H:i:s');
                $filename = $data->filename;
                ///update procedure here
                $data = array(
                    'playlist_id' => $playlist_id,
                    'file_id' => $filename_code,
                    'date_loged' => $time,
                    'filename' => $filename
                );
                playlist_model::insert_play_list($data);
                
               /*$playlist_code = 3;
                
                $data_per_playlist = playlist_model::get_id_per_playlist($playlist_code);
                
                if($data_per_playlist){
                    foreach ($data_per_playlist as $data){
                        $sequence = $data->sequence;
                        $add = $sequence + 1;
                        
                        $upd = array(
                            'sequence' => $add
                        );
                        playlist_model::update_playlist($playlist_code, $upd);
                    }
                }*/
                
                
                
                
                ////////////////////////
            }
        }
    }
    function x(){
        echo $this->uri->rsegment(3);
    }
    function get_playlist_seq(){
        $get_seq = playlist_model::get_seq();///get loc
        foreach($get_seq as $get_seq_data){
            $loc_data = $get_seq_data->location_code;
            $get_seq_per_loc = playlist_model::get_seq_per_loc($loc_data); ///first get loc
            if($get_seq_per_loc){
                foreach($get_seq_per_loc as $get_seq_per_loc_data){
                    $get_playlist_in_loc = $get_seq_per_loc_data->sequence;
                    $sel_playlist_update = playlist_model::sel_playlist_update($loc_data); ///check loc in playlist update
                    
                    if($sel_playlist_update){
                        //do nothing
                    }else{
                        $data = array(
                            'playlist_code' =>$get_playlist_in_loc,
                            'location_code' => $loc_data
                        );
                        $insert_new_playlist_loc = playlist_model::insert_new_playlist_loc($data);
                    }
                    break;
                }
            }
        }
    }
    function save_new_thread(){
        $thread_client = $_POST['thread_client'];
        $txt_thread = $_POST['txt_thread'];
        $file = $_POST['file'];
        
        $this->load->library("form_validation");
        
        $this->form_validation->set_rules('thread_client', 'Thread_client', 'trim|required');
        $this->form_validation->set_rules('txt_thread', 'Txt_thread', 'trim|required');
        $this->form_validation->set_rules('file', 'File', 'trim|required');
        
        if($this->form_validation->run() == false){
        $data = array(
            'error' => "Incomplete Fields",
            'id' => 1
        );
        echo modules::run("route/err_save_new_thread", $data);
        //$this->load->view("files/error/sticky_note", $data);
        self::add_new_crawler();
        }else{
            $data = array(
                            'client_name' =>$_POST['thread_client'],
                            'thread_msg' => $_POST['txt_thread'],
                                'file' => '0'
                        );
                        playlist_model::insert_new_thread($data);
                        
                        $get_thread_max = playlist_model::get_thread_max();
        if($get_thread_max){
            foreach($get_thread_max as $get_thread_max){
                $get_max_num = $get_thread_max->file_path . $get_thread_max->orig_name;
                //echo $get_max_num;
            }
            $get_zero = playlist_model::get_zero();
            if($get_zero){
                $data = array(
                    'file' => $get_max_num
                );
                playlist_model::update_thread($data);
            }
        }
        }
        
    }
    function txtar(){
        echo $this->uri->rsegment(3);
    }
    function get_thread(){
        $get_thread_max = playlist_model::get_thread_max();
        if($get_thread_max){
            foreach($get_thread_max as $get_thread_max){
                $get_max_num = $get_thread_max->num_img;
                
            }
            $get_zero = playlist_model::get_zero();
            if($get_zero){
                $data = array(
                    'file' => $get_max_num
                );
                playlist_model::update_thread($data);
            }
        }
    }
    function get_client_images(){
        $x = trim($_POST['data']);
        $get_image = playlist_model::get_image($x);
        if($get_image){
            $data = array(
            'image' => $get_image
        );
            echo modules::run("route/get_client_images", $data);
        //$this->load->view("files/ajax_tables/image", $data);
        }
        
    }
    
}

