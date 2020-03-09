<?php

class Crawler_Model extends CI_Model{
    function get_loc($loc_id){
        $data = $this->db->query("select* from crawlers where location_id = '$loc_id'");
        return $data->result();
    }
    function get_crawler_id($crawler_id){
        $data = $this->db->query("select* from crawlers where crawler_id = $crawler_id");
        return $data->result();
    }
    function check_location_playlist($loc_id, $playlist_id){
        $data = $this->db->query("select* from crawlers where location_id = '$loc_id' and playlist_id = $playlist_id");
        return $data->result();
    }
    function update_crawler($loc_code, $playlist_code, $data){
        $this->db->where('location_id', $loc_code);
        $this->db->where('playlist_id', $playlist_code);
        $this->db->update('crawlers', $data);
    }
    function update_crawler_back($crawler_id, $data){
        $this->db->where('crawler_id', $crawler_id);
        $this->db->update('crawlers', $data);
    }
    function check_crawler_id($crawler_id){
        $data = $this->db->query("select* from crawlers where crawler_id = $crawler_id");
        return $data->result();
    }
    function get_all_crawler_by_id($loc_id){
        $data = $this->db->query("select* from crawlers where location_id = '$loc_id'");
        return $data->result();
    }
    function insert_new_crawler($data){
        $this->db->insert('crawlers', $data);
    }
    function get_crawler_with_loc($loc_id){
        $data = $this->db->query("select* from crawlers where location_id = '$loc_id'");
        return $data->result();
    }
    function get_loc_max($loc_code){
        $data = $this->db->query("select MAX(playlist_id) as p FROM crawlers where location_id = '$loc_code'");
        return $data->result();
    }
    function data_select_expired_ticker($loc_id, $date){
        $data = $this->db->query("select * from crawlers where end_date < '$date' and location_id = '$loc_id'");
        return $data->result();
    }
    function update_playlist_table_ticker($loc_code, $data, $date){
        $this->db->where('location_id', $loc_code);
        $this->db->where('end_date <', $date);
        $this->db->update('crawlers', $data);
    }
    function insert_new_image_for_crawler($data){
        $this->db->insert('image_file_upload', $data);
    }
    function get_image_file_upload(){
        $data = $this->db->query("select * from image_file_upload where used = 0");
        return $data->result();
    }
    function update_upload_image($data){
        $this->db->query("update image_file_upload set used = 1 where used = 0");
    }
    function get_all_crawlers(){
        $data = $this->db->query("select * from crawler_type");
        return $data->result();
    }
    function get_crawler_next_playlist($loc_id){
        $data = $this->db->query("select max(playlist_id) from crawlers where location_id = '$loc_id'");
        return $data->result();
    }
    
}

