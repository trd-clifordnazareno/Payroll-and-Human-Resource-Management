<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {

	function __construct() {
	 parent::__construct();
						
	 error_reporting();
	}

	public function index() {
	 $this->page();
	}


	public function page() {
						
	 echo Modules::run("template/home");
						
	}


	public function login() {
					error_reporting(0);

					$this->load->library('form_validation');
					$this->form_validation->set_rules('u', 'username', 'htmlspecialchars|trim|required');
					$this->form_validation->set_rules('p', 'username', 'htmlspecialchars|trim|required');
					if($this->form_validation->run() == false){
						$data = array(
							'msg' => 'incomplete input field'
						);
					//header("location:../log");
					echo Modules::run("templ/login2", $data);

					}else{

						$username = $_POST['u'];
						$password = $_POST['p'];

						$data = $this->perfect_model->get($username, $password);
						if($data){
							$data = array(
								'name' => 'name',
								'is_logged_in' => TRUE,
							);
								/* Set Session */
						$this->session->set_userdata('ci_session', $data);
						header("location:page");

						}else{
							$data = array(
								'msg' => 'Incorrect Input Fields'
							);
						echo Modules::run("templ/login2", $data);
						}
					}


	}

	public function logout() {
						$this->session->unset_userdata('ci_session');
						header("location:../log");
  }

}
