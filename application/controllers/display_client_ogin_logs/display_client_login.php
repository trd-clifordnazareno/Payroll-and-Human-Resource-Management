<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Display_client_login extends CI_Controller {
 
 function index()
 {
  $this->load->view("files/client_logs/view_client_log");
 }

 function pagination()
 {
   $x = $this->uri->rsegment(4);
  $this->load->model("clients/clients_model");
  $this->load->library("pagination");
  $config = array();
  $config["base_url"] = "#";
  $config["total_rows"] = $this->clients_model->count_all();
  $config["per_page"] = $x;
  $config["uri_segment"] = 4;
  $config["use_page_numbers"] = TRUE;
  $config["full_tag_open"] = '<ul class="pagination">';
  $config["full_tag_close"] = '</ul>';
  $config["first_tag_open"] = '<li>';
  $config["first_tag_close"] = '</li>';
  $config["last_tag_open"] = '<li>';
  $config["last_tag_close"] = '</li>';
  $config['next_link'] = '&gt;';
  $config["next_tag_open"] = '<li>';
  $config["next_tag_close"] = '</li>';
  $config["prev_link"] = "&lt;";
  $config["prev_tag_open"] = "<li>";
  $config["prev_tag_close"] = "</li>";
  $config["cur_tag_open"] = "<li class='active'><a href='#'>";
  $config["cur_tag_close"] = "</a></li>";
  $config["num_tag_open"] = "<li>";
  $config["num_tag_close"] = "</li>";
  $config["num_links"] = 5;
  $this->pagination->initialize($config);
  $page = $this->uri->segment(4);
  $start = ($page - 1) * $config["per_page"];

  $output = array(
   'pagination_link'  => $this->pagination->create_links(),
   'country_table'   => $this->clients_model->fetch_details($config["per_page"], $start)
  );
  echo json_encode($output);
 }
 
}