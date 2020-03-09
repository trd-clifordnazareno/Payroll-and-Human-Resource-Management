<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Mediums extends MX_Controller{
    function __construct() {
	 parent::__construct();
		$this->load->model('mediumdetail');				
	 error_reporting(0);
	}
        public function index(){
            echo Modules::run("template/input_mediums");
        }
        function method(){
        if($this->uri->rsegment(3) == "regester_new_mediums"){
            self::_method_regester_new_mediums();
        }
        }
         function _method_regester_new_mediums(){
            $billboard_name = $_POST['billboard_name'];
             $description = $_POST['description'];
             $size = $_POST["size"];
              //$current_client = $_POST["current_client"];
              //$availabilty = $_POST["availabilty"];
              //$agent = $_POST["agent"];
              //$status = $_POST["status"];
              
              $this->load->library('form_validation');
              
              $this->form_validation->set_rules('billboard_name', 'Billboard_name', 'trim|required');
              $this->form_validation->set_rules('description', 'Description', 'trim|required');
              $this->form_validation->set_rules('size', 'Size', 'trim|required');
              //$this->form_validation->set_rules('current_client', 'Current_client', 'trim|required');
              //$this->form_validation->set_rules('availabilty', 'Availabilty', 'trim|required');
              //$this->form_validation->set_rules('agent', 'Agent', 'trim|required');
              //$this->form_validation->set_rules('status', 'Status', 'trim|required');
              
              if($this->form_validation->run() == false){
                $data = array(
                    'error' => 'incomplete input fields'
                );
                
                $this->load->view('files/error/log_error', $data);
            }else{
                $data = array(
                    'billboardname' => $billboard_name,
                    'description' => $description,
                    'size' => $size,
                    'currentclient' => "",
                    'availability' => "",
                    'agent' => "OPEN",
                    'status' => "",
                    'color' => 0,
                    'desc_date' => 0,
                    'renew_date' => ""
                );
                //$this->load->model('mediumdetail');	
                

                
                mediumdetail::insert_new_mediums($data);
                $data = array(
                    'success' => 'You Successfully Inserted New Medium'
                );
                echo Modules::run("template/create_new_mediums", $data);
            }
        }
        function x(){
            
        }
}