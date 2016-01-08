<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Estatus_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    
      function consultar_estatus() {
        $this->db->select('*');
        $this->db->from('estatus');
        $this->db->where('idEstatus > 1');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    

    


}

?>
