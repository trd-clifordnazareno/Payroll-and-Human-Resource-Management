<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/




include('conf/system_class.php');
include('conf/sys_date.php');
include('conf/sys_property.php');

$check_file = new Sys_Date;
$check_file->setconf_date();
$check_file->setconf_username();
$check_file->setcof_password();
$check_file->setconf_check_date();

$user_file = $check_file->sys_date_username_check;
$pass_file = $check_file->sys_date_password_check;
$date_file = $check_file->sys_date_date_check;


$obj = new System_Class("$user_file","$pass_file","$date_file");
$obj->setProperty_credentials();
$obj->setProperty_date();
$obj->setproperty_confg();
$checks = $obj->check_output;
//echo $checks;
$obj->i($checks);

$obj_data_point = new Sys_property();
$obj_data_point->get_daily_time_rec();
$obj_data_point->get_daily_time_rec_list();
$obj_data_point->get_payroll_rec();
$obj_data_point->get_create_employee();
$obj_data_point->get_update_employee();
$obj_data_point->get_del_employee();
$obj_data_point->get_vacation_leave();
$obj_data_point->get_sick_leave();
$obj_data_point->get_create_employee_leaves();
$obj_data_point->get_create_bracket();
$obj_data_point->get_create_dept();
$obj_data_point->get_position_list();





$obj_data_point->execute_setters();
$route['default_controller'] = $obj_data_point->daily_time_record;
$route['admin/daily_time_record/ajax_method/daily_time_rec'] = $obj_data_point->request_daily_time_rec;
$route['admin/payroll_sheet/ajax_method/payroll_rec'] = $obj_data_point->payroll_sheet;
$route['admin/employee/ajax_method/create_employee'] = $obj_data_point->create_employee;
$route['admin/employee/ajax_method/update_employee'] = $obj_data_point->update_employee;
$route['admin/employee/del_employee'] = $obj_data_point->del_employee;
$route['admin/leaves/ajax_method/vacation_leave'] = $obj_data_point->vacation_leave;
$route['admin/leaves/ajax_method/sick_leave'] = $obj_data_point->sick_leave;
$route['admin/leaves/ajax_method/create_employee_leaves'] = $obj_data_point->create_employee_leaves;
$route['admin/bracket/ajax_method/create_bracket'] = $obj_data_point->create_bracket;
$route['admin/department/ajax_method/create_dept'] = $obj_data_point->create_dept;
$route['admin/employee/ajax_method/position_list'] = $obj_data_point->position_list;
/*$route['default_controller'] = 'admin/daily_time_record';
$route['admin/daily_time_record/ajax_method/daily_time_rec'] = 'admin/daily_time_record/request/daily_time_rec';
$route['admin/payroll_sheet/ajax_method/payroll_rec'] = 'admin/payroll_sheet/request/payroll_rec';
$route['admin/employee/ajax_method/create_employee'] = 'admin/employee/request/create_employee';
$route['admin/employee/ajax_method/update_employee'] = 'admin/employee/request/update_employee';
$route['admin/employee/del_employee'] = 'admin/employee/del_employee';
$route['admin/leaves/ajax_method/vacation_leave'] = 'admin/leaves/request/vacation_leave';
$route['admin/leaves/ajax_method/sick_leave'] = 'admin/leaves/request/sick_leave';
$route['admin/leaves/ajax_method/create_employee_leaves'] = 'admin/leaves/request/create_employee_leaves';
$route['admin/bracket/ajax_method/create_bracket'] = 'admin/bracket/request/create_bracket';
$route['admin/department/ajax_method/create_dept'] = 'admin/department/request/create_dept';*/
$route['admin/over_time/ajax_method/create_over_time'] = 'admin/over_time/request/create_over_time';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
