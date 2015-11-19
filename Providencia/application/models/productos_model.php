<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Productos_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function obtener_productos($idCategorias) {
        $query = "SELECT * FROM productos as P 
                    LEFT JOIN imagenes as I ON P.idProductos = I.idProductos
                    INNER JOIN categorias as C ON P.idCategorias = C.idCategorias";
        if ($idCategorias > 0) {
            $query .= " WHERE P.idCategorias = " . $idCategorias;
        }
        $query .= " GROUP BY P.idProductos ORDER BY P.idProductos; ";
        
        $datos = $this->db->query($query);
        if ($datos->num_rows() > 0) {
            return $datos;
        } else {
            return FALSE;
        }
    }
    
//    function obtener_productos($idCategorias) {
//        if ($idCategorias > 0) {
//            $this->db->where('idCategorias', $idCategorias);
//        }
//        
//        $query = $this->db->get('productos');
//        if ($query->num_rows() > 0) {
//            return $query;
//        } else {
//            return FALSE;
//        }
//    }

}

?>
