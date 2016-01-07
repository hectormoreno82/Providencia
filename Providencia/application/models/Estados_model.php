<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Estados_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    
      function consultar_estados() {
        
        $this->db->select('*');
        $this->db->from('estados');
        $this->db->order_by("Nombre", "desc"); 
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    

    


}

?>
