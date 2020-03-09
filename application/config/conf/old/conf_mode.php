<?php


class conf_mode
{
  public $username_check;
  public $password_check;
  public $date_check;
  public $stat;
 
  public function set_username_property()
  {
      return $this->username_check = "ok";
  }
  public function set_password_property()
  {
      return $this->password_check = "ok";
  }
  public function set_date_property()
  {
      return $this->date_check = "2019-08-01";
  }
  public function check_conf(){
      if($this->date_check > date("Y-m-d")){
          return $this->stat = TRUE;
      }
  }
 
  
}