<?php
class Home_Page extends CI_controller{
  function __construct(){
    parent::__construct();
    //constructors here
    $this->load->model('users');
    error_reporting(0);
  }
    function index(){
       // redirect('home_page/goh');
       if($this->session->userdata('session_log')){
         $datas = $this->session->userdata( 'session_log');
         foreach ($datas as $key => $value) {
           if($key == 'username'){
             $username = $value;
           }

         }



         $this->load->library('pagination');

         $config['base_url'] = site_url('home_page/index');
         $max = 3;
         $page = (!$this->uri->segment('3')) ? 0 : $this->uri->segment('3');
         $config['total_rows'] = users::get();
         $config['per_page'] = $max;

         $this->pagination->initialize($config);

         $users = users::get_data($max, $page);

         $data =  $users;

         $data = array(
             'user' => $username,
             'session' => $this->session->userdata('session_log'),
             'page_title' => 'HOME',
             'content_title' => $username,
             'data1' => users::get_data($max, $page),
             'text' => 'Hey what is in your mind now?'
         );

         $this->load->view('files/home/home', $data);
       }else{
         redirect('login');
       }

    }
    function goh(){
      if ($this->session->userdata('session')) {
          $data = $this->session->userdata('session');
          foreach ($data as $key => $value) {
              if ($key == 'username') {
                  $emp_code = $value;
              }
              if ($key == 'login') {
                  $login = $value;
              }
          }
          $data = users::login_users($emp_code);
          foreach ($data as $data) {
              $name = $data->name;
              $last_name = $data->last_name;
              $position = $data->position;
          }


          $this->load->library('pagination');

          $config['base_url'] = site_url('home_page/index');
          $max = 3;
          $page = (!$this->uri->segment('3')) ? 0 : $this->uri->segment('3');
          $config['total_rows'] = users::get();
          $config['per_page'] = $max;

          $this->pagination->initialize($config);

          $users = users::get_data($max, $page);

          $data =  $users;

          $data = array(
              'data1' => $data
          );
          $this->load->view('sample', $data);
      } else {
          $this->load->view('log/log_header');
      }
    }
}
?>
