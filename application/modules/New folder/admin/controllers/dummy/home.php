<?php



defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {
        function __construct() {
            parent::__construct();

            $this->load->model('admin/my_models');
            //$this->load->model('display_users/display_user');
            //$this->load->model('location2/location2_model');
            error_reporting(0);
        }

	public function index()
	{
        $x = my_models::getSearch(array('l.for_holiday_days_id ='=>1, 'l.holiday_type ='=>"legal"),"",array("l.daily_type_rate"=>"ASC"),true);
		foreach($x as $data){
		$rate['rate'] = $data->daily_type_rate;
		}
            echo Modules::run("templ/payroll/main", $rate);
	//echo "ok";

	}

	//function go()
	//{
		//$data['data'] = $this->load->view('templ/TEMPLATE');
	//	echo Modules::run("templ/payroll/main");
		//$this->load->view('home', $data);
	//}



//////////////////////////////////////////////////////////////////////////////////////////



}