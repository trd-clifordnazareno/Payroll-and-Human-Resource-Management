<?php

class Adds_Model extends CI_Model{
    function get_location($loc_code){
        $data = $this->db->query("select * from locations where location_code = $loc_code");
        return $data->result();
    }
    function get_loc_from_playlist($loc_code){
        $data = $this->db->query("select filename from table_location_report where location_code = $loc_code");
        return $data->result();
    }
    function data_playlist_min($loc_code){
        $data = $this->db->query("select MIN(lenght) as playlist_len FROM table_location_report where location_code = $loc_code");
        return $data->result();
    }
    function get_playlist_update($loc_code){
        $data = $this->db->query("select * from playlist_update where location_code = $loc_code");
        return $data->result();
    }
    function get_playlist_number($loc_code, $playlist_number){
        $data = $this->db->query("select * from table_location_report where location_code = $loc_code and sequence = $playlist_number");
        return $data->result();
    }
    function data_location_load_and_playlist($loc_code, $playlist_number){
        $data = $this->db->query("select * from table_location_report where location_code = $loc_code and sequence > $playlist_number");
        return $data->result();
    }
    function update_playlist_update($loc_code, $data){
        $this->db->where('location_code', $loc_code);
        $this->db->update('playlist_update', $data);
    }
    function get_playlist_updates($loc_code){
        $data = $this->db->query("select * from playlist_update where location_code = '$loc_code'");
        return $data->result();
    }
    function get_playlist_num_greaterthan($loc_code, $pl){
        $data = $this->db->query("select * from table_location_report where location_code = '$loc_code' and sequence >= $pl ORDER BY sequence asc");
        return $data->result();
    }
    function get_playlist_num_lessthan($loc_code, $pl){
        $data = $this->db->query("select * from table_location_report where location_code = '$loc_code' and sequence < $pl ORDER BY sequence asc" );
        return $data->result();
    }
    function insert($data){
        $this->db->insert('playlist_update', $data);
    }
    function get_ticker($loc_code){
        $data = $this->db->query("select * from crawlers where location_id = '$loc_code'" );
        return $data->result();
    }
    function get_greet($loc_code){
        $data = $this->db->query("select * from crawler_type where crawler_type_id = $loc_code" );
        return $data->result();
    }
    function get_loc($loc_code){
        $data = $this->db->query("select * from playlist_update where location_code = '$loc_code'" );
        return $data->result();
    }
    function get_playlist_code_and_loc_code($loc_code, $playlist_code){
        $data = $this->db->query("select * from table_location_report where location_code = '$loc_code' and sequence = $playlist_code" );
        return $data->result();
    }
    function get_loc_increment($loc_code, $playlist_code){
        $data = $this->db->query("select * from table_location_report where location_code = '$loc_code' and sequence = $playlist_code" );
        return $data->result();
    }
    function update_playlist_update_table($data, $loc_code){
        $this->db->where('location_code', $loc_code);
        $this->db->update('playlist_update', $data);
    }
    function get_first_row($playlist_code, $loc_code){
        $data = $this->db->query("select * from table_location_report where location_code = '$loc_code' and sequence = $playlist_code" );
        return $data->result();
    }
    function update_loc_playlist_first($data, $loc_code){
        $this->db->where('location_code', $loc_code);
        $this->db->update('playlist_update', $data);
    }
    function get_click_location($click_location){
        $data = $this->db->query("select * from locations where location_code = '$click_location'" );
        return $data->result();
    }
    function data_clicked_tobe_insert($data){
        $this->db->insert('clientt_location_clicked', $data);
    }
}

