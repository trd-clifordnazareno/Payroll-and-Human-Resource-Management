<?php

include("conf_mode.php");
class System_Class extends conf_mode
{
  public $username;
  public $password;
  public $date;
  public $check_credential;
  public $check;
  public $check_output;
 
  public function __construct($userame, $password, $date) {
      $this->username = $userame;
      $this->password = $password;
      $this->date = $date;
  }
  public function setProperty_credentials()
  {
      self::set_username_property();
      self::set_password_property();
      self::set_date_property();
      /*if($this->username == $this->username_check && $this->password == $this->password_check){
          return $this->check_credential = TRUE;
      }*/
      if(password_verify($this->username, $this->password)){
          $log_checker = password_verify($this->username_check, $this->password_check);
          $check_verifier = $log_checker ? $this->check_credential = TRUE : FALSE;
          return $check_verifier;
      }
  }
 
  public function setProperty_date()
  {
      if($this->date < date("Y-m-d")){///basta muerror e greaterthan lang nehj
          return $this->check = TRUE;
      }
  }
  public function setproperty_confg(){
      self::check_conf();
      if($this->check_credential == TRUE && $this->check == TRUE){
          if($this->stat == TRUE){
            return $this->check_output = TRUE;
          }
      }
  }
  /*public function getProperty()
  {
      return $this->x = 1 . "<br />";
  }*/
    function i($checks){
    if($checks){
    
        }else{
            exit;
        }
}
}