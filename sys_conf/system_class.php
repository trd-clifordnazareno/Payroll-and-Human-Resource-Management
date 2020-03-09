<?php


class System_Class
{
  public $x = 1;
 
  public function setProperty()
  {
      $this->x = "ok";
  }
 
  public function getProperty()
  {
      return $this->x = 1 . "<br />";
  }
}