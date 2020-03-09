<?php
class Pagination extends CI_controller{
  function __construct(){
  parent::__construct();
  //constructors here
  $this->load->model('clients/clients_model');
 
  $this->load->helper('url');
  $this->load->helper('csv');
  $this->load->library("pagination");
  //$this->load->library("table");
  //error_reporting(0);
}
  function index(){
    $config['base_url'] = 'http://192.168.254.106/rmn/index.php/sample/pagination/pages';
    $config['total_rows'] = $this->db->get('locations')->num_rows();
    $config['per_page'] = 10;
    $config['num_links'] = 20;
    
    
    $config['full_tag_open'] = "<ul class='pagination'>";
    $config['full_tag_close'] ="</ul>";
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
    $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
    $config['next_link'] = 'Next';
    $config['next_tag_open'] = "<li>";
    $config['next_tagl_close'] = "</li>";
    $config['prev_link'] = 'prev';
    $config['prev_tag_open'] = "<li>";
    $config['prev_tagl_close'] = "</li>";
    $config['first_link'] = 'First';
    $config['first_tag_open'] = "<li>";
    $config['first_tagl_close'] = "</li>";
    $config['last_link'] = 'Last';
    $config['last_tag_open'] = "<li>";
    $config['last_tagl_close'] = "</li>";
    
    $this->pagination->initialize($config);
    
    $data['records'] = $this->db->get('locations', $config['per_page'], $this->uri->rsegment(3));
    
    $this->load->view("files/sample/pagination", $data);
  }
  function pages(){
  if($this->uri->rsegment(2) != NULL && $this->uri->rsegment(3) == NULL){
      self::_pages();
  }else if($this->uri->rsegment(2) != NULL && $this->uri->rsegment(3) != NULL){
      self::_pages();
  }
  }
  function _pages(){
      $config['base_url'] = 'http://192.168.254.106/rmn/index.php/sample/pagination/pages';
        $config['total_rows'] = $this->db->get('locations')->num_rows();
        $config['per_page'] = 10;
        $config['num_links'] = 20;
        
         $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_link'] = 'prev';
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_link'] = 'First';
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
            
            

        $this->pagination->initialize($config);

        $data['records'] = $this->db->get('locations', $config['per_page'], $this->uri->rsegment(3));

        $this->load->view("files/sample/pagination", $data);
  }
  
}



?>

<?php

/*$config['base_url'] = base_url(); // xác định trang phân trang
$config['total_rows'] = $this->Game_model->count_all(); // xác định tổng số record
$config['per_page'] = 120; // xác định số record ở mỗi trang
$config['uri_segment'] = 1; // xác định segment chứa page number
$config['num_links'] = 7;

$config['display_pages'] = TRUE;
$config['use_page_numbers'] = TRUE;

//Encapsulate whole pagination 
$config['full_tag_open'] = '<ul class="pagination">';
$config['full_tag_close'] = '</ul>';

//First link of pagination
$config['first_link'] = 'First';
$config['first_tag_open'] = '<li>>';
$config['first_tag_close'] = '</li>';

//Customizing the “Digit” Link
$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';

//For PREVIOUS PAGE Setup
$config['prev_link'] = 'prev';
$config['prev_tag_open'] = '<li>';
$config['prev_tag_close'] = '</li>';

//For NEXT PAGE Setup
$config['next_link'] = 'Next';
$config['next_tag_open'] = '<li>';
$config['next_tag_close'] = '</li>';

//For LAST PAGE Setup
$config['last_link'] = 'Last';
$config['last_tag_open'] = '<li>';
$config['last_tag_close'] = '</li>';

//For CURRENT page on which you are
$config['cur_tag_open'] = '<li class="active"><a href="#">';
$config['cur_tag_close'] = '</a></li>';
$this->pagination->initialize($config);

if($this->uri->segment(1) == 0)
{
    $offset = 0;
}
else
{
    $offset = ($config['per_page'])*($this->uri->segment(1)-1);
}*/


?>