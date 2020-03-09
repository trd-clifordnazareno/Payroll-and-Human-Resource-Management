<?php

class Users extends CI_Model{
    function login_users($username, $password){
        $data = $this->db->query("select * from users where username = '$username' and password = '$password'");
        return $data->result();
    }
    function check_usercode($usercode){
        $data = $this->db->query("select * from users where user_code = $usercode");
        return $data->result();
    }
    function insert_new_users($data){
        $this->db->insert('users', $data); 
    }
    function logs($data){
        $this->db->insert('login_logs', $data);
    }
    function get_all_employees(){
        $data = $this->db->get("users");
        return $data->result();
    }
}

