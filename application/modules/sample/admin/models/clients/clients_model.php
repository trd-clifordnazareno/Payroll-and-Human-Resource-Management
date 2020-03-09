<?php
class Clients_model extends CI_Model{
  function get_all_clients(){
    $data = $this->db->query("select * from clients");
    return $data->result();
  }
  function get_client_in_loc($client_code){
      $data = $this->db->query("select * from locations where client_id = $client_code");
    return $data->result();
  }
  function get_upload(){
      $data = $this->db->query("select * from video_files where used = 0");
        return $data->result();
  }
  function insert_new_upload($data){
      $this->db->insert('clients_files', $data);
  }
  function update_new_upload(){
      $this->db->query("update video_files set used = 1 where used = 0");
  }
  function get_all_clients_list(){
      $data = $this->db->query("select * from client_list");
    return $data->result();
  }
  function get_clients_adds($client_list_id){
      $data = $this->db->query("select * from clients_files where client_list_id = '$client_list_id'");
    return $data->result();
  }
  function check_code($client_code){
      $data = $this->db->query("select * from client_list where client_code = '$client_code'");
    return $data->result();
  }
  function insert_new_client_list($data){
      $this->db->insert('client_list', $data);
  }
  function get_all_client_list(){
      $data = $this->db->query("select * from client_list");
    return $data->result();
  }
  function get_client($client_code){
      $data = $this->db->query("select * from client_list where client_code = '$client_code'");
    return $data->result();
  }
  function get_client_files($client_code){
      $data = $this->db->query("select * from clients_files where client_list_id = '$client_code'");
    return $data->result();
  }
  function get_playlist_number($loc_code){
      $data = $this->db->query("SELECT * FROM playlist_type where location_code = $loc_code; " );
    return $data->result();
  }
  function insert_pl_n($data){
      $this->db->insert('playlist_type', $data);
  }
  function get_playlist_num($crawler_type_id){
      $data = $this->db->query("select * from crawlers where crawler_type_id = $crawler_type_id");
    return $data->result();
  }
  function del_playlist_type(){
      $this->db->query("delete from playlist_type where playlist_type_number > 0");
      $data = array(
          'playlist_type_number' => 0
      );
      $this->db->insert('playlist_type', $data);
  }
  function get_playlist_type($crawler_type_id){
      $data = $this->db->query("select * from crawlers where crawler_type_id = $crawler_type_id");
    return $data->result();
  }
  function get_playlist_number_specific(){
      $data = $this->db->query("select max(playlist_type_number) as crawler_type_number from playlist_type");
    return $data->result();
  }
  function get_crawler_type_id($crawler_type_id){
      $data = $this->db->query("select * from crawler_type where crawler_type_id = $crawler_type_id");
    return $data->result();
  }
  function del_crawler_type($playlist_type_id){
      $this->db->query("delete from playlist_type where playlist_type_number = $playlist_type_id");
 
  }
  function get_loc($loc_id){
      $data = $this->db->query("select * from crawlers where location_id = $loc_id");
    return $data->result();
  }
  function insert_new_crawler_type($data){
      $this->db->insert('playlist_type', $data);
  }
  function del_crawler_type_with_loc($loc_code){
      $this->db->query("delete from playlist_type where location_code = $loc_code");
 
  }
  function get_loc_of_type($loc_code){
      $data = $this->db->query("select * from playlist_type where location_code = $loc_code");
    return $data->result();
  }
  function look_up($loc_id){
      $data = $this->db->query("select * from crawler_running where location_id = $loc_id");
    return $data->result();
  }
  function insert_new_look_up($data){
      $this->db->insert('crawler_running', $data);
  }
  function get_look_up($loc_id){
      $data = $this->db->query("select * from crawler_running where location_id = $loc_id");
    return $data->result();
  }
  function get_crawler_data($loc_code, $crawler_type_number){
      $data = $this->db->query("select * from playlist_type where location_code = $loc_code and playlist_type_number = $crawler_type_number");
    return $data->result();
  }
  function update_crawler_running($data, $loc_id){
      $this->db->where('location_id', $loc_id);
        $this->db->update('crawler_running', $data);
  }
  function get_crawler_type_exist($crawler_type_id, $loc_id){
      //original
      //$data = $this->db->query("select * from playlist_type where playlist_type_number >= $crawler_type_id and location_code = $loc_id");
    
      $data = $this->db->query("select * from playlist_type where playlist_type_number >= $crawler_type_id and location_code = $loc_id");
    return $data->result();
  }
  function get_loc_and_type($loc_id){
      $data = $this->db->query("select * from crawler_running where location_id = '$loc_id'");
    return $data->result();
  }
  function data_crawler_id($crawler_type_id){
      $data = $this->db->query("select * from crawler_type where crawler_type_id = $crawler_type_id");
    return $data->result();
  }
  function max_data($loc_id){
      $data = $this->db->query("select max(crawler_type_id) as crawler_type_id from crawlers where location_id = '$loc_id'");
    return $data->result();
  }
  function get_greather_max($loc_id, $crawler_type_id){
      $data = $this->db->query("select * from playlist_type where location_code = $loc_id and playlist_type_number = $crawler_type_id");
    return $data->result();
  }
  
  
  
  
  
  
  
  //////////////////////////////////////
  function get_crawler_max($loc_id){
  $data = $this->db->query("select max(crawler_type_id) as crawler_type_id from crawler_running where location_id = '$loc_id'");
    return $data->result();
  }
  function get_crawler_type_id_from_max($loc_id, $crawler_type_id){
      $data = $this->db->query("select * from crawlers where location_id = '$loc_id' and crawler_type_id = $crawler_type_id");
    return $data->result();
  }
  
  function next_crawler_type_id($loc_id, $crawler_type_id){
      $data = $this->db->query("select * from crawlers where location_id = '$loc_id' and crawler_type_id = $crawler_type_id");
    return $data->result();
  }
  function insert_new_crawler_type_id($data){
      $this->db->insert('crawler_running', $data);
  }
  function get_len_crawler_type_id($loc_id, $crawler_type_id){
      $data = $this->db->query("select * from crawlers where location_id = '$loc_id' and crawler_type_id >= $crawler_type_id");
    return $data->result();
  }
  function del_all_crawler_type_id($loc_id){
      $this->db->query("delete from crawler_running where location_id = '$loc_id'");
  }
  function get_crawler_type_logo($crawler_type_id){
      $data = $this->db->query("select * from crawler_type where crawler_type_id = $crawler_type_id");
    return $data->result();
  }
  function get_crawler_type_id_len($loc_id, $crawler_type_id){
      $data = $this->db->query("select * from crawlers where location_id = $loc_id and crawler_type_id < $crawler_type_id");
    return $data->result();
  }
  function count_clients(){
      $data = $this->db->query("select count(client_code) as counts from client_list");
    return $data->result();
  }
  function get_crawlers($loc_id){
      $data = $this->db->query("select * from crawlers where location_id = '$loc_id'");
    return $data->result();
  }
  function ins_crawler_running($data){
      $this->db->insert('crawler_running', $data);
  }
  function get_min_crawler_type_id($loc_id){
      $data = $this->db->query("select min(crawler_type_id) as crawler_type_id from crawlers where location_id = '$loc_id'");
    return $data->result();
  }
  
  
  
  function ExportCSV()
{
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
        $delimiter = ",";
        $newline = "\r\n";
        $filename = "filename_you_wish.csv";
        $query = "SELECT * FROM crawlers";
        $result = $this->db->query($query);
        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
        force_download($filename, $data);
}
function get_next_playlist_number($loc_id){
    $data = $this->db->query("select max(sequence) as sequence_number from table_location_report where location_code = '$loc_id'");
    return $data->result();
}
function client_users($username, $password){
	$data = $this->db->query("select * from client_account where client_username = '$username' and client_password = '$password'");
        return $data->result();
}
function client_logs($data){
$this->db->insert('client_activity_log', $data);
}
function client_logs_out($client_id, $data){
    $this->db->where('client_id', $client_id);
        $this->db->update('client_activity_log', $data);
}
function data_logs_view(){
    $data = $this->db->query("select * from client_activity_log");
        return $data->result();
}
function insert_client_accounts($data){
    $this->db->insert('client_account', $data);
}




//////////////////////////
function count_all()
 {
  $query = $this->db->get("client_account");
  return $query->num_rows();
 }

 function fetch_details($limit, $start)
 {
  $output = '';
  $this->db->select("*");
  $this->db->from("client_account");
  $this->db->order_by("client_account_id", "ASC");
  $this->db->limit($limit, $start);
  $query = $this->db->get();
  $output .= '
  <table class="table table-bordered">
   <tr>
   <th>CLIENT ID</th>
    <th>CLIENT USERNAME</th>
    <th>CLIENT CORPORATE NAME</th>
    <th>USER TYPE</th>
   </tr>
  ';
  foreach($query->result() as $row)
  {
   $output .= '
   <tr>
   <td>'.$row->client_account_id.'</td>
    <td>'.$row->client_username.'</td>
    <td>'.$row->client_corporate_name.'</td>
        <td>'.$row->user_type.'</td>
   </tr>
   ';
  }
  $output .= '</table>';
  return $output;
 }
  
  
}



 ?>
