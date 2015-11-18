<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Productos_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function obtener_productos($idCategorias) {
        $this->db->where('idCategorias', $idCategorias);
        $query = $this->db->get('productos');
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }

}

?>
