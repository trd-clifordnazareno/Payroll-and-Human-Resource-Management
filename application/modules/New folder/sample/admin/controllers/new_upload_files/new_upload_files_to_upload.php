<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



class New_Upload_Files_To_Upload extends MX_controller{
    function __construct(){
  parent::__construct();
  //constructors here
  $this->load->model('admin/playlist/playlist_model');
  $this->load->model('admin/clients/clients_model');
  error_reporting(0);
}
function index(){
    echo modules::run("route/new_upload");
        //$this->load->view("files/new_upload/new_upload");
        }  
        function csv_upload(){
            echo modules::run("route/csv_upload");
            //$this->load->view("files/new_upload/csv_upload");
        }
}

