<?php

Class Failuretoair_model extends CI_Model{
    
    function insert_fail_loc($data){
        $this->db->insert('failure_to_air', $data); 
    }
    function load_loc(){
        $data = $this->db->query("select * from locations");
        return $data->result();
    }
    function get_fail_loc($loc_code){
        $data = $this->db->query("select * from failure_to_air where location_code = '$loc_code'");
        return $data->result();
    }
    function stat_in_loc($loc_code){
        $data = $this->db->query("select * from table_location_report where location_code = '$loc_code'");
        return $data->result();
    }
    function update_stat_in_loc($loc_code, $data){
         $this->db->where('location_code', $loc_code);
         $this->db->update('locations', $data);
    }
    function get_fail_locs(){
        $data = $this->db->query("select * from failure_to_air order by report_date desc");
        return $data->result();
    }
    function get_fail_loc_resume(){
        $data = $this->db->query("select * from failure_to_air order by resume_date desc");
        return $data->result();
    }
    function loc_affected($loc_code){
        $data = $this->db->query("select distinct(clients_code) from table_location_report where location_code = '$loc_code'");
        return $data->result();
    }
    function resume_fail($loc_code, $data){
        $this->db->where('location_code', $loc_code);
         $this->db->update('failure_to_air', $data);
    }
    function resume_fail_loc($loc_code, $data){
        $this->db->where('location_code', $loc_code);
         $this->db->update('locations', $data);
    }
    function get_playlist_num($loc_code, $client_code){
        $data = $this->db->query("select distinct filename, clients_code, lenght, location_code from table_location_report where location_code = '$loc_code' and clients_code = '$client_code'");
        return $data->result();
    }
    function get_clients($loc_code){
        $data = $this->db->query("select distinct(clients_code) as clints_code from table_location_report where location_code = '$loc_code'");
        return $data->result();
    }
    function get_loc_name($loc_code){
        $data = $this->db->query("select location_name, location_code from locations where location_code = '$loc_code'");
        return $data->result();
    }
    function get_client_name($client_name){
        $data = $this->db->query("select client_name from client_list where client_code = '$client_name'");
        return $data->result();
    }
    function get_loc_like_code($client_name){
        $data = $this->db->query("select count(location_name) as count_loc from locations where location_code like '%$client_name%'");
        return $data->result();
    }
    function get_all_location(){
        $data = $this->db->query("select * from locations");
        return $data->result();
    }
    function update_stats($loc_code, $data){
        $this->db->where('location_code', $loc_code);
         $this->db->update('locations', $data);
    }
    
}
?>