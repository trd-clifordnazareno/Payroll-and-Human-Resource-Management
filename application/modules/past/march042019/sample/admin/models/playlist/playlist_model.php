<?php

class Playlist_Model extends CI_Model{
    function get_loc_code($loc_code){
        $data = $this->db->query("select * from table_location_report where location_code = '$loc_code'");
        return $data->result();
    }
    function get_id_per_playlist($table_location_reports_id){
        $data = $this->db->query("select * from table_location_report where table_location_reports_id = '$table_location_reports_id'");
        return $data->result();
    }
    function insert_play_list($data){
        $this->db->insert('play_logs', $data);
    }
    function update_playlist($playlist_code, $data){
        $this->db->where('user_code', $playlist_code);
        $this->db->update('play_logs', $data); 
    }
    function get_playlist_id($table_location_reports_id){
        $data = $this->db->query("select * from table_location_report where table_location_reports_id = '$table_location_reports_id'");
        return $data->result();
    }
    function update_add($playlist_code, $data){
        $this->db->where('table_location_reports_id', $playlist_code);
        $this->db->update('table_location_report', $data);
    }
    function update_playlist_sqnce($table_location_reports_id){
        $data = $this->db->query("select * from table_location_report where table_location_reports_id = $table_location_reports_id");
        return $data->result();
    }
    function check_loc_seq($loc_code, $seq){
        $data = $this->db->query("select * from table_location_report where location_code = $loc_code and sequence = $seq");
        return $data->result();
    }
    function update_loc_seq($loc_code, $seq_code, $data){
        $this->db->where('location_code', $loc_code);
        $this->db->where('sequence', $seq_code);
        $this->db->update('table_location_report', $data);
    }
    function insert_playlist($data){
        $this->db->insert('table_location_report', $data);
    }
    function get_all_file(){
        $data = $this->db->query("select * from files");
        return $data->result();
    }
    function add_new_client($data){
        $this->db->insert('clients', $data);
    }
    function get_play_list($loc_code){
        $data = $this->db->query("select * from table_location_report where location_code = '$loc_code'");
        return $data->result();
    }
    function data_loc_playlist($loc_code, $play_num){
        $data = $this->db->query("select * from clients where location_code = '$loc_code' and playlist_number = $play_num");
        return $data->result();
    }
    function insert_new_playlist($data){
        $this->db->insert('table_location_report', $data);
    }
    function data_select_expired($date){
        $data = $this->db->query("select * from table_location_report where expire <= '$date'");
        return $data->result();
    }
    function update_playlist_table($loc_code, $data, $date){
        //$this->db->query("update table_location_report set filename = 'ok' where sequence = 1");
        $this->db->where('location_code', $loc_code);
        $this->db->where('expire <', $date);
        $this->db->update('table_location_report', $data);
    }
    function update_playlist_table_index($data, $date){
        $this->db->where('expire <', $date);
        $this->db->update('table_location_report', $data);
    }
    function data_select_expired_ticker($date){
        $data = $this->db->query("select * from crawlers where end_date <= '$date'");
        return $data->result();
    }
    function update_playlist_table_ticker($data, $date){
        $this->db->where('end_date <', $date);
        $this->db->update('crawlers', $data);
    }
    function insert_new_video($data){
        $this->db->insert('video_files', $data);
    }
    function get_video_file_upload(){
        $data = $this->db->query("select * from video_files where used = 0");
        return $data->result();
    }
    function update_upload_video($data){
        $this->db->query("update video_files set used = 1 where used = 0");
    }
    function get_file_code($filename){
        $data = $this->db->query("select * from video_files where file_name = '$filename'");
        return $data->result();
    }
    function select_adds_for_playlist($loc_code){
        $data = $this->db->query("select * from playlist_update where location_code = '$loc_code'");
        return $data->result();
    }
    function insert_new_palylist($data){
        $this->db->insert('playlist_update', $data);
    }
    function get_seq(){
        $data = $this->db->query("select distinct location_code from locations");
        return $data->result();
    }
    function get_seq_per_loc($loc_code){
        $data = $this->db->query("select * from table_location_report where location_code = '$loc_code'");
        return $data->result();
    }
    function sel_playlist_update($loc_code){
        $data = $this->db->query("select * from playlist_update where location_code = '$loc_code'");
        return $data->result();
    }
    function insert_new_playlist_loc($data){
        $this->db->insert('playlist_update', $data);
    }
    function del_item($sequence_code, $loc_code, $table_location_reports_id){
        $this->db->query("delete from table_location_report where sequence = '$sequence_code' "
                . "and location_code = '$loc_code' "
                . "and table_location_reports_id = '$table_location_reports_id'");
    }
    function get_trd(){
        $data = $this->db->query("select * from thread");
        return $data->result();
    }
    function client_load(){
        $data = $this->db->query("select * from client_list");
        return $data->result();
    }
    function insert_new_thread($data){
        $this->db->insert('thread', $data);
    }
    function get_thread_max(){
        $data = $this->db->query("select max(img_upload_id), file_path, orig_name from image_file_upload");
        return $data->result();
    }
    function get_zero(){
        $data = $this->db->query("select * from thread where file = '0'");
        return $data->result();
    }
    function update_thread($data){
        $this->db->where('file', '0');
        $this->db->update('thread', $data);
    }
    function get_image($image){
        $data = $this->db->query("select * from thread where client_name = '$image'");
        return $data->result();
    }
}
