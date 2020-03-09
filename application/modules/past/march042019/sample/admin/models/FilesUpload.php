<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class FilesUpload extends CI_Model {

    public function setFiles()
    {
        $name_array = array();
        $count = count($_FILES['userfile']['size']);
        foreach ($_FILES as $key => $value)
            for ($s = 0; $s <= $count - 1; $s++) {
                $_FILES['userfile']['name'] = $value['name'][$s];
                $_FILES['userfile']['type'] = $value['type'][$s];
                $_FILES['userfile']['tmp_name'] = $value['tmp_name'][$s];
                $_FILES['userfile']['error'] = $value['error'][$s];
                $_FILES['userfile']['size'] = $value['size'][$s];

                $config['upload_path'] = './js/uploads/video/';
                $config['allowed_types'] = 'gif|jpg|png|mp4';
                $config['max_size'] = '10000000';
                $config['max_width'] = '51024';
                $config['max_height'] = '5768';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload()) {
                    $data_error = array('msg' => $this->upload->display_errors());
                    var_dump($data_error);
                } else {
                    $data = $this->upload->data();
                }
                $name_array[] = $data['file_name'];
            }

        $names = implode(',', $name_array);

        return $names;
    }
}