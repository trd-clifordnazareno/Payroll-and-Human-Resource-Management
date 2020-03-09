<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends MX_Controller {




function home() {
    $data['header'] = $this->load->view("templte/headers");
    $data['footer'] = $this->load->view("templte/footer");
    $this->load->view('files/home', $data);
}
function input_mediums(){
    //$data['header'] = $this->load->view("templte/headers");
    //$data['footer'] = $this->load->view("templte/footer");
    $this->load->view("files/mediums/input_mediums");
}
function create_new_mediums($data){
    $this->load->view('files/mediums/ajax/success', $data);
}
			



}




