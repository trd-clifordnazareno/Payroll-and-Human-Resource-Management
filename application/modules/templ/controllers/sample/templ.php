<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Templ extends MX_Controller {

	public function main(){

			$this->load->view("contents/home");

		}
	public function blog(){

			$this->load->view("TEMPLATE");

		}

		





}