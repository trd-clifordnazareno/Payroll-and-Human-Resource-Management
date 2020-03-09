<?php

class Generate extends CI_Controller
{

    function Generate()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('clients/clients_model');
        $this->load->helper('url');
                $this->load->helper('csv');
    }

        function create_csv(){

            $query = $this->clients_model->get_loc_and_type("ads-airport-20170911-02");
            $num = $query->num_fields();
            $var =array();
            $i=1;
            $fname="";
            while($i <= $num){
                $test = $i;
                $value = $this->input->post($test);

                if($value != ''){
                        $fname= $fname." ".$value;
                        array_push($var, $value);

                    }
                 $i++;
            }

            $fname = trim($fname);

            $fname=str_replace(' ', ',', $fname);

            $this->db->select($fname);
            $quer = $this->db->get('<tablename>');
            
            query_to_csv($quer,TRUE,'Products_'.date('dMy').'.csv');
            
        }
}