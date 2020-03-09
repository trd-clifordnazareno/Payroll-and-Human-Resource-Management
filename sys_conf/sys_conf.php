<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class System extends MX_Controller{
    public $x;
    public function get(){
        return $x = "ok";
    }
}