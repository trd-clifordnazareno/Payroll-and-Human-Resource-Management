<?php
class Home_page extends CI_controller{
    function index(){
        if($this->session->userdata('session_log')){
            $data = $this->session->userdata('session_log');
        foreach($data as $key => $value){
            if($key == 'sess_username'){
                $username = $value;
                
            }
            if($key == 'sess_department'){
                $department = $value;
            }
            if($key == 'sess_position'){
                $position = $value;
            }
            if($key == 'sess_firstname'){
                $firstname = $value;
            }
            if($key == 'sess_lastname'){
                $lastname = $value;
            }
        }
        //echo $username;
        $data = array(
            'sess_username' => $username,
            'sess_firstname' => $firstname,
            'sess_lastname' => $lastname,
            'sess_position' => $$position,
            'sess_department' => $department,
            'title' => 'Home',
            'page_content' => 'Home'
        );
       $this->load->view('files/home/home', $data);
        }else{
            redirect('login');
        }
        
    }
}
?>
