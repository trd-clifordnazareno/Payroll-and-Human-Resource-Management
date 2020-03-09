<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mediumdetail extends CI_Model {
  function __construct(){
    parent:: __construct();
  }

  function insert_mediums($data){
    $this->db->insert("details",$data);
    return $this->db->insert_id();
  }

  function update_table($data,$table_col,$key){
    $this->db->where($table_col,$key);
    $this->db->update("users",$data);
        return $key;
  }

  function delete_table($table_col,$key){
    $this->db->delete("users",array($table_col=>$key));
  }

  function get_info($id)
  {
      $this->db->from('employee')->where('id_user', $id);
      return $this->db->get();
  }

  function get($id, $id_u){
    $data = $this->db->query("select * from employee where emp_code = $id and name = '$id_u'");
    return $data->result();
  }

  function  get_emp() {
    $data = $this->db->query("select * from employee limit 5" );
    return $data->result();
  }



  function  emp_details($id) {
    $data = $this->db->query("select * from employee where  emp_code  = $id" );
    return $data->result();
  }



  function  emp_data($id) {
    $data = $this->db->query("select * from employee where  emp_code  = $id" );
    return $data->result();
  }
  function other_db(){
      $db2 = $this->load->database("other_db", TRUE);
      $data = $db2->query("select * from details" );
      return $data->result();
  }
  function insert_new_mediums($data){
      $db2 = $this->load->database("other_db", TRUE);
    $db2->insert("details",$data);
    return $db2->insert_id();
  }


}
