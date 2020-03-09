<?php

class Display_User extends CI_Model{
    function check_user($usercode){
        $data = $this->db->query("select * from Users where user_code = $usercode");
        return $data->result();
    }
    function edit_user($usercode, $data){
        $this->db->where('user_code', 0);
        $this->db->update('users', $data); 
    }
}

