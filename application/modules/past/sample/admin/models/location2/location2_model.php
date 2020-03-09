<?php

Class Location2_model extends CI_Model{
    
    function regester_loc($data){
        $this->db->insert('locations', $data); 
    }
    function check_loc_code($loc_code){
        $data = $this->db->query("select * from locations where location_code = '$loc_code'");
        return $data->result();
    }
    function count_location(){
        $data = $this->db->query("select count(location_code) as count from locations");
        return $data->result();
    }
}
?>