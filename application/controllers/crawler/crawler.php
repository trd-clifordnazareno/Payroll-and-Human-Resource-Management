<?php

class crawler extends CI_controller{
    function __construct(){
    parent::__construct();
    //constructors here
    $this->load->model('crawler/crawler_model');
    $this->load->helper(array('form', 'url'));
    error_reporting(0);
  }
    function index(){
        
    }
    function get_crawler_location(){
        $data = $this->uri->rsegment(3);
        
        $loc_id = $data;
        $data = crawler_model::get_loc($data);
        
        if($data){
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
            
        
        ///update crawler ticker per location_is  ////////////////////////////////////////////////////////////////
        
        $data_select_expired_ticker = crawler_model::data_select_expired_ticker($loc_id, date("Y-m-d H:i:s"));
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
                crawler_model::update_playlist_table_ticker($loc_id, $data_update_playlist_ticker, date("Y-m-d H:i:s"));
           
        }
        
        
        ///update crawler ticker per location_is  ////////////////////////////////////////////////////////////////
        
            
            $data_crawler = array(
                'data' => $data,
                //'crawler_id' => $crawler_id,
                //'location_id' => $location,
                //'crawler_message' => $crawler_message,
                //'start_date' => $start_date,
                //'end_date' => $end_date,
                'location_code' => $loc_id,
                
                'sess_username' => $username,
                'sess_department' => $department,
                'sess_position' => $position,
                'sess_usertype' => $usertype,
                'sess_firstname' => $firstname,
                'sess_lastname' => $lastname,
                'sess_usercode' => $usercode,
                'title' => 'Crawler',
                'page_content' => 'Crawler'
            );
            $this->load->view("files/crawler/view_crawler", $data_crawler);
        }else{
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
            
            $data_crawler = array(
                //'crawler_id' => $crawler_id,
                //'location_id' => $location,
                //'crawler_message' => $crawler_message,
                //'start_date' => $start_date,
                //'end_date' => $end_date,
                'location_code' => $loc_id,
                
                'sess_username' => $username,
                'sess_department' => $department,
                'sess_position' => $position,
                'sess_usertype' => $usertype,
                'sess_firstname' => $firstname,
                'sess_lastname' => $lastname,
                'sess_usercode' => $usercode,
                'title' => 'Crawler',
                'page_content' => 'Crawler'
            );
            $this->load->view("files/crawler/view_crawler", $data_crawler);
        }
    }
    function edit_crawler(){
        $data = $this->uri->rsegment(3);
        
        $data = crawler_model::get_crawler_id($data);
        
        if($data){
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
        foreach($data as $data){
            $crawler_id = $data->crawler_id;
            $location_id = $data->location_id;
            $crawler_message = $data->crawler_message;
            $start_date = $data->start_date;
            $end_date = $data->end_date;
            $playlist_id = $data->playlist_id;
        }
        $data_crawler = array(
            'crawler_id' => $crawler_id,
            'location_id' => $location_id,
            'crawler_message' => $crawler_message,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'playlist_id' => $playlist_id,
            
            'sess_username' => $username,
                'sess_department' => $department,
                'sess_position' => $position,
                'sess_usertype' => $usertype,
                'sess_firstname' => $firstname,
                'sess_lastname' => $lastname,
                'sess_usercode' => $usercode,
                'title' => 'Edit Crawler',
                'page_content' => 'Edit Crawler'
        );
        $this->load->view("files/crawler/edit_crawler", $data_crawler);
        }
        
    }
    function edit_crawler_spic(){
        $locationcode = $_POST['locationcode'];
        $crawler_message = $_POST['crawler_message'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $playlist_crawler_id = $_POST['playlist_crawler_id'];
        $old_playlist = $_POST['old_playlist'];
        $crawler_id = $_POST['crawler_id'];
                                            
        $ajax = $_POST['ajax'];
        $data = crawler_model::check_location_playlist($locationcode, $playlist_crawler_id); //$playlist_crawler_id
        
        if($data){
            $data = array(
                'playlist_id' => $old_playlist,
                'crawler_message' => $crawler_message,
                'start_date' => $start_date,
                'end_date' => $end_date
            );
           crawler_model::update_crawler($locationcode, $playlist_crawler_id, $data);
           
           $datas = crawler_model::check_crawler_id($crawler_id);
           if($datas){
               $data = array(
               'playlist_id' => $playlist_crawler_id
           );
           crawler_model::update_crawler_back($crawler_id, $data);
           
           $data = array(
               'data' => crawler_model::get_all_crawler_by_id($locationcode),
               'loc_code' => $locationcode
           );
           if($data){
               $this->load->view("files/ajax_tables/crawlers", $data);
           }
           
           }
           
        }else{
            //crawler_model::insertcrawler();
            echo "THE PLAYLIST CRAWLER ID IS INVALID";
        }
    }
    function add_new_crawler(){
        $loc_code = $_POST['locationcode'];
        
        $max_data = crawler_model::get_loc_max($loc_code);
        
            foreach($max_data as $data){
                $max_palylist = $data->p;
            }
        $get_all_crawlers = crawler_model::get_all_crawlers();
        $get_crawler_next_playlist = crawler_model::get_crawler_next_playlist($loc_code);
        if($get_crawler_next_playlist){
            foreach($get_crawler_next_playlist as $get_crawler_next_playlist){
                $crawler_playlist_id = $get_crawler_next_playlist->playlist_id + 1;
                //break;
            }
        }
        $data = array(
            'loc_code' => $loc_code,
            'max_playlist' => $max_palylist,
            'crawler_data' => $get_all_crawlers,
            'crawler_playlist_id' => $crawler_playlist_id
        );
        
        $this->load->view("files/ajax_tables/add_crawler", $data);
    }
    function add_entry_crawler(){
        $locationcode = $_POST['locationcode'];
        $crawlermessage = $_POST['crawlermessage'];
        $startdate = $_POST['startdate'];
        $enddate = $_POST['enddate'];
        $playlist = $_POST['playlist'];
        $ajax = $_POST['ajax'];
        $starttime = $_POST['starttime'];
        $endtime = $_POST['endtime'];
        $crawler_type = $_POST['crawler_type'];
                                            
                                            
                                            
        $this->load->library("form_validation");
        
        $this->form_validation->set_rules('crawlermessage', 'Crawlermessage', 'trim|required');
        $this->form_validation->set_rules('startdate', 'Startdate', 'trim|required');
        $this->form_validation->set_rules('starttime', 'Starttime', 'trim|required');
        $this->form_validation->set_rules('enddate', 'Enddate', 'trim|required');
        $this->form_validation->set_rules('endtime', 'Endtime', 'trim|required');
        $this->form_validation->set_rules('playlist', 'Playlist', 'trim|required');
                                            
        if($this->form_validation->run() == false){
        $data = array(
            'error' => "Incomplete Fields",
            'id' => 1
        );
        $this->load->view("files/error/sticky_note", $data);
        self::add_new_crawler();
        }else{
            $data_get_image_file_upload = crawler_model::get_image_file_upload();
            foreach($data_get_image_file_upload as $data){
            $data_img = $data->img_file_name;
            }
        $data = array(
            'location_id' => $locationcode,
            'crawler_message' => $crawlermessage,
            'start_date' => $startdate . " " . $starttime,
            'end_date' => $enddate . " " . $endtime,
            'playlist_id' => $playlist,
            'crawler_type_id' => $crawler_type,
            'logo' => '1'//$data_img
        );
                                            
        crawler_model::insert_new_crawler($data);
        crawler_model::update_upload_image();
                                            
        $data = crawler_model::get_crawler_with_loc($locationcode);
                                            
        if($data){
                                                
            $this->load->view("files/ajax_tables/crawlers_load", $data);
        }
        }
                                          
                                            
                                            
                                            
    }
    function max(){
        $max_data = crawler_model::get_loc_max(3);
        
            foreach($max_data as $data){
                echo $data->p;
            }
        
        exit;
    }
    function load_add(){
        $data = array(
            's' => $_POST['loc']
        );
        $this->load->view("files/ajax_tables/modal", $data);
    }
    function g(){
        $data['a'] = $_POST['data'];
        $this->load->view("files/ajax_tables/modal_add", $data);
    }
    
    function upload_image_crawler() {
 
        //upload file
        $config['upload_path'] = './js/uploads/image/';
        $config['allowed_types'] = '*';
        $config['max_filename'] = '255';
        //$config['encrypt_name'] = TRUE;
        $config['max_size'] = '1024'; //1 MB
 
        if (isset($_FILES['file']['name'])) {
            if (0 < $_FILES['file']['error']) {
                echo 'Error during file upload' . $_FILES['file']['error'];
            } else {
                if (file_exists('js/uploads/changes_this_for_temporary_real_name_here is(image)/' . $_FILES['file']['name'])) {
                    echo 'File already exists : uploads/' . $_FILES['file']['name'];
                } else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('file')) {
                        echo $this->upload->display_errors();
                    } else {
                        $data = $this->upload->data();
                        
                        foreach($data as $data =>$key){
                            if($data == "file_name"){
                                $file_name = $key;
                            }
                            if($data == "file_type"){
                                $file_type = $key;
                            }
                            if($data == "file_path"){
                                $file_path = $key;
                            }
                            if($data == "full_path"){
                                $full_path = $key;
                            }
                            if($data == "raw_name"){
                                $raw_name = $key;
                            }
                             if($data == "orig_name"){
                                $orig_name = $key;
                            }
                            if($data == "file_ext"){
                                $file_ext = $key;
                            }
                            if($data == "file_size"){
                                $file_size = $key;
                            }
                            if($data == "image_width"){
                                $image_width = $key;
                            }
                            if($data == "image_height"){
                                $image_height = $key;
                            }
                            if($data == "image_type"){
                                $image_type = $key;
                            }
                            if($data == "image_size_str"){
                                $image_size_str = $key;
                            }
                        }
                        $data_img = array(
                            'img_file_name' => $file_name,
                            'file_type' => $file_type,
                            'file_path' => $file_path,
                            'raw_name' => $raw_name,
                            'orig_name' => $orig_name,
                            'file_ext' => $file_ext,
                            'file_size' => $file_size,
                            'image_width' => $image_width,
                            'img_height' => $image_height,
                            'img_type' => $image_type,
                            'img_size_str' => $image_size_str,
                            'date' => date("Y-m-d H:i:s"),
                            'used' => 0
                        );
                        crawler_model::insert_new_image_for_crawler($data_img);
                        
                        echo '<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b> File successfully uploaded : uploads/
                                            ' . $_FILES['file']['name'] . "</div>";
                    }
                }
            }
        } else {
            echo '<div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b> Please choose a file
                                            '     ;
        }
    }
}

