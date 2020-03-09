<?php
include "sys_tunning.php";
class Sys_Property implements sys_tunning{
public $daily_time_record;
  public $request_daily_time_rec;
  public $payroll_sheet;
  public $create_employee;
  public $update_employee;
  public $del_employee;
  public $vacation_leave;
  public $sick_leave;
  public $create_employee_leaves;
  public $create_bracket;
  public $create_dept;
   public $position_list;

public function get_daily_time_rec(){
$this->daily_time_record = 'admin/daily_time_record';
}
public function get_daily_time_rec_list(){
$this->request_daily_time_rec = 'admin/daily_time_record/request/daily_time_rec';
}
public function  get_payroll_rec(){
$this->payroll_sheet = 'admin/payroll_sheet/request/payroll_rec';
}
public function get_create_employee(){
$this->create_employee = 'admin/employee/request/create_employee';
}
public function get_update_employee(){
$this->update_employee = 'admin/employee/request/update_employee';
}
public function get_del_employee(){
$this->del_employee = 'admin/employee/del_employee';
}
public function get_vacation_leave(){
$this->vacation_leave = 'admin/leaves/request/vacation_leave';
}
public function get_sick_leave(){
$this->sick_leave = 'admin/leaves/request/sick_leave';
}
public function get_create_employee_leaves(){
$this->create_employee_leaves = 'admin/leaves/request/create_employee_leaves';
}
public function get_create_bracket(){
$this->create_bracket = 'admin/bracket/request/create_bracket';
}
public function get_create_dept(){
$this->create_dept = 'admin/department/request/create_dept';
}
public function get_position_list(){
$this->create_dept = 'admin/department/request/position_list';
}
/////////// setters
public function set_daily_time_rec(){
return $this->daily_time_record;
}
public function set_daily_time_rec_list(){
return $this->request_daily_time_rec;
}
public function set_payroll_rec(){
return $this->payroll_sheet;
}
public function set_create_employee(){
return $this->create_employee;
}
public function set_update_employee(){
return $this->update_employee;
}
public function set_del_employee(){
return $this->del_employee;
}
public function set_vacation_leave(){
return $this->vacation_leave;
}
public function set_sick_leave(){
return $this->sick_leave;
}
public function set_create_employee_leaves(){
return $this->create_employee_leaves;
}
public function set_create_bracket(){
return $this->create_bracket;
}
public function set_create_dept(){
return $this->create_dept;
}
public function set_position_list(){
return $this->position_list;
}
public function execute_setters(){
self::set_daily_time_rec();
self::get_daily_time_rec_list();
self::get_payroll_rec();
self::get_create_employee();
self::get_update_employee();
self::get_del_employee();
self::get_vacation_leave();
self::get_sick_leave();
self::get_create_employee_leaves();
self::get_create_bracket();
self::get_create_dept();
self::get_position_list();
}
}


?>
