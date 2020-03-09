<?php

class Report_Model extends CI_Model{
    function get_loc($client_code){
        $data = $this->db->query("select distinct location_code, clients_code  from table_location_report where clients_code = '$client_code'");
        return $data->result();
    }
    function get_logs($loc_id, $client_code, $from, $end){
        $data = $this->db->query("select * from table_location_report where clients_code = '$client_code' and location_code = '$loc_id' and 'start' >= '$from' and expire <= '$end'");
        return $data->result();
    }
    function get_log($loc_id, $client_code, $from, $end){
        $data = $this->db->query("select * from tbl_playlogs where DSLocationCode = '$client_code' and DSClientCode = '$loc_id' and DATE(Timestamp) between '$from' and '$end' order by Timestamp");
        return $data->result();
    }
    function create_logs_rep($loc_id, $clients_id){
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $filename = "filename_you_wish.csv";
        $query = "SELECT * FROM tbl_playlogs where DSLocationCode = '$loc_id' and DSClientCode = '$clients_id'";
        $result = $this->db->query($query);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        force_download($filename, $data);
    }
    function insert_playlist($data){
        $this->db->insert('movie_playlist', $data);
    }
    function delete_playlist(){
        $this->db->query("delete from movie_playlist");
    }
    function create_location_playlist($_loc_id){
        //exec('C:\xampp\htdocs\rmn\js\reports\playlist_server.bat');
        //
        
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $filename = "$_loc_id.csv";
        $query = "SELECT * FROM movie_playlist ";
        $result = $this->db->query($query);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        
        force_download($filename, $data);
        
        /*$this->load->dbutil(); 
    $this->load->helper('file'); 

    $this->load->helper('download');
    $delimiter = ","; 
    $newline = "\r\n";
    $filename = "filename.csv";  
    $query = "SELECT * FROM movie_playlist";
    $result = $this->db->query($query);
    $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
    write_file('./js/reports/filename.csv', $data);
    */
    
    }
    function get_ds_info($loc_id){
        $data = $this->db->query("select * from locations where location_code = '$loc_id'");
        return $data->result();
    }
    function ds_info_ins($data){
        $this->db->insert('ds_info', $data);
    }
    function del_ds_info(){
        $this->db->query("delete from ds_info");
    }
    function get_location_playlist($_loc_id){
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $filename = "$_loc_id-ds_info.csv";
        $query = "SELECT * FROM ds_info ";
        $result = $this->db->query($query);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        
        force_download($filename, $data);
    }
    function csv_playlist($_loc_id){
        
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $filename = "$_loc_id-playlist.csv";
        $query = "SELECT table_location_reports_id AS FileId, sequence AS PlaylistNumber, filename AS MovieTitle, lenght as VideoLengthSec, start AS StartDate, expire AS EndDate, play as LoopShows, clients_code AS ClientCode
           FROM table_location_report 
           WHERE location_code = '$_loc_id'";
        $result = $this->db->query($query);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        
        force_download($filename, $data);
        
    
    }
    function csv_crawlers($_loc_id){
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $filename = "$_loc_id-crawlers.csv";
        $query = "select * from crawlers where location_id = '$_loc_id'";
        $result = $this->db->query($query);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        
        force_download($filename, $data);
    }
    function get_client_loc_file_per_client($loc_id, $client_id, $filename_id){
        $data = $this->db->query("select * from table_location_report where location_code = '$loc_id' and clients_code = '$client_id' and filename_code = '$filename_id'");
        return $data->result();
    }
    function get_client_loc_file_per_client_rep($loc_id, $client_id, $filename, $startdate, $enddate){
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        //echo $startdate. $enddate;exit;
        $q         =  $this->db->query("select * from tbl_Playlogs where DSClientCode = '$client_id' and DSLocationCode = '$loc_id' and DSMaterial = '$filename' and Timestamp >= '$startdate' and Timestamp <= '$enddate' ");
        $delimiter = ",";
        $nuline    = "\r\n";

        force_download('smaple.csv', 
        $this->dbutil->csv_from_result($q, $delimiter, $nuline));
    }
    function get_rep(){
        $data = $this->db->query("select * from tbl_playlogs where DSLocationCode = 'ADSATC000000006' and Timestamp between '2017-10-04' and '2017-10-07' order by DSMaterial");
        return $data->result();
    }
    
    
    
    
    function get_rep_total_loops(){
        $data = $this->db->query("select count(DSMaterial) as x, DSClientCode, DSMaterial, Timestamp  from tbl_playlogs where DSLocationCode = 'ADSATC000000006' group by DSMaterial");
        return $data->result();
    }
    function total_loops($start, $end, $client_code){
        $data = $this->db->query("select count(DSMaterial) as total_loops, DSClientCode, DSMaterial, Timestamp  from tbl_playlogs where DSLocationCode = '$client_code' and DATE(Timestamp) between '$start' and '$end' group by DSClientCode, DSMaterial");
        return $data->result();
        
    }
    
    
    //function per clients report
    function get_rep_total_per_loops($start, $end, $client_code){
        $data = $this->db->query("select distinct DSClientCode, count(DSLocationCode) as loop_count, DSClientCode, DSMaterial, Timestamp  from tbl_playlogs where DSLocationCode = '$client_code' and DATE(Timestamp) between '$start' and '$end' group by DSClientCode");
        return $data->result();
    }
    //function per materials report
    /*function get_rep_total_per_loops($start, $end, $client_code){
        $data = $this->db->query("select count(DSMaterial) as loop_count, DSClientCode, DSMaterial, Timestamp  from tbl_playlogs where DSLocationCode = '$client_code' and DATE(Timestamp) between '$start' and '$end' group by DSClientCode, DSMaterial");
        return $data->result();
    }*/
    
    
    
    function get_rep_total_per_loops_per_loc($start, $end, $client_code, $loc_id){
        $data = $this->db->query("select distinct DSClientCode, count(DSLocationCode) as loop_count, DSClientCode, DSMaterial, Timestamp  from tbl_playlogs where DSClientCode = '$loc_id' and DSLocationCode = '$client_code' and DATE(Timestamp) between '$start' and '$end' group by DSClientCode");
        return $data->result();
    }
    
    
    function get_rep_per_clients_loc($start, $end, $client_code){
        $data = $this->db->query("select * from tbl_playlogs where DSLocationCode = '$client_code' and DATE(Timestamp) between '$start' and '$end' order by DSClientCode, DSMaterial, TimeStamp");
        return $data->result();
    }
    
    
    
    function get_rep_per_clients_loc_per_loc($start, $end, $client_code, $loc_id){
        $data = $this->db->query("select * from tbl_playlogs where DSClientCode = '$loc_id' and DSLocationCode = '$client_code' and DATE(Timestamp) between '$start' and '$end' order by DSClientCode, DSMaterial, TimeStamp");
        return $data->result();
    }
    
    
    
    function client_list(){
        $data = $this->db->query("select * from client_list");
        return $data->result();
    }
    function get_client_code($client_name){
        $data = $this->db->query("select * from client_list where client_name = '$client_name'");
        return $data->result();
    }
    function get_playlist_num($client_id){
        $data = $this->db->query("select count(filename) as total_files, filename, lenght from table_location_report where clients_code = '$client_id' group by filename");
        return $data->result();
    }
    function get_playlist_numbr($client_id){
        $data = $this->db->query("select * from client_list where client_code = '$client_id'");
        return $data->result();
    }
    
    
    
    function data_date($start, $end, $client_id){
        $data = $this->db->query("SELECT DISTINCT(DATE(TIMESTAMP)) as date_a FROM `tbl_playlogs` WHERE DSLocationCode = '$client_id' and DATE(Timestamp) between '$start' and '$end' ORDER BY TIMESTAMP");
        return $data->result();
    }
    function data_item($start, $end, $client_id){
        $data = $this->db->query("SELECT DSClientCode, DSLocationCode, DSMaterial, DATE(TIMESTAMP) as item_a FROM `tbl_playlogs` WHERE DSLocationCode = '$client_id' and DATE(Timestamp) between '$start' and '$end' ORDER BY TIMESTAMP");
        return $data->result();
    }
    function data_loc($start, $end, $client_id){
        $data = $this->db->query("SELECT DISTINCT(DSClientCode) FROM `tbl_playlogs` WHERE DSLocationCode = '$client_id' and DATE(Timestamp) between '$start' and '$end' ORDER BY TIMESTAMP");
        return $data->result();
    }
    function data_loc_count($start, $end, $client_id){
        $data = $this->db->query("SELECT DISTINCT(DSClientCode), count(DSMaterial) as files FROM `tbl_playlogs` WHERE DSLocationCode = '$client_id' and DATE(Timestamp) between '$start' and '$end' group by DSClientCode ORDER BY TIMESTAMP");
        return $data->result();
    }
}
