
<?php
class Display_Client_Login_Logs extends MX_controller{
  function __construct(){
    parent::__construct();
    //constructors here
    $this->load->model('admin/clients/clients_model');
    error_reporting(0);
  }
    function index(){
        if($this->session->userdata('session_log')){
            $data = $this->session->userdata('session_log');
        
        
       $data_logs = array(
           'title' => 'Display Users',
            'page_content' => 'Display Users',
            'page_content2' => 'Display Status',
            'data' => clients_model::data_logs_view()
                );
       echo modules::run("route/Display_Client_Login_Logs", $data_logs);
        //$this->load->view('files/client_logs/client_logs', $data_logs);
        }else{
            redirect('admin/login');
        }
        
    }
}
