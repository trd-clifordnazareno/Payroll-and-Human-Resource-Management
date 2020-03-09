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

            $this->load->database();
            $query = $this->clients_model->get_crawlers("ads-seaport-2-170911-01");
 
            $this->load->helper('csv');
            query_to_csv($query, TRUE, 'toto.csv');
            
        }
}