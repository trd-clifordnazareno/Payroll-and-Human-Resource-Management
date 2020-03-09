<?php


class Sys_Date
{
  public $sys_date_username_check;
  public $sys_date_password_check;
  public $sys_date_date_check;
  public $sys_date_check_date;
 
  public function setconf_date(){
      return $this->sys_date_date_check = "2019-08-01";
  }
  public function setconf_username(){
      if($this->sys_date_date_check > date("Y-m-d")){
          return $this->sys_date_username_check = "ok";
      }
  }
  public function setcof_password(){
      if($this->sys_date_date_check > date("Y-m-d")){
          return $this->sys_date_password_check = "ok";
      }
  }
  public function setconf_check_date(){
      if($this->sys_date_date_check > date("Y-m-d")){
          return $this->sys_date_check_date = TRUE;
      }
  }
 
  
}