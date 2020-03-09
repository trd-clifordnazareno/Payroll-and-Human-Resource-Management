<?php

interface Sys_Tunning
{
	




  public function get_daily_time_rec();
public function get_daily_time_rec_list();
public function get_payroll_rec();
public function get_create_employee();
public function get_update_employee();
public function get_del_employee();
public function get_vacation_leave();
public function get_sick_leave();
public function get_create_employee_leaves();
public function get_create_bracket();
public function get_create_dept();
/////////// setters
public function set_daily_time_rec();
public function set_daily_time_rec_list();
public function set_payroll_rec();
public function set_create_employee();
public function set_update_employee();
public function set_del_employee();
public function set_vacation_leave();
public function set_sick_leave();
public function set_create_employee_leaves();
public function set_create_bracket();
public function set_create_dept();
public function execute_setters();
}


?>
