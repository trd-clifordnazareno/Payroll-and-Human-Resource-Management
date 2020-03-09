<?php
class Users extends CI_Model{
  function log_users($username, $password){
    $data = $this->db->query("select * from employee where name = '$username' and last_name = '$password'");
    return $data->result();
  }
  function get(){
    return $this->db->count_all_results("employee");

  }
  function get_data($max, $page){
    return $this->db->get('employee', $max, $page)->result_array();
  }
}
 ?>
