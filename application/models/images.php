<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Images extends CI_Model {
    function get_images()
    {
        $query = $this->db->get('images');
        if($query->num_rows() > 0){
            $result = $query->result_array();
            return $result;
        }else{
            return false;
        }
    }
}
