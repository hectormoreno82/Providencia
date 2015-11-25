<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Registro_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function registrar_usuarios($idCategorias) {
        
        $this->db->select('*');
        $this->db->from('productos');
        $this->db->join('imagenes','imagenes.idProductos = productos.idProductos', 'left');
        $this->db->join('categorias','categorias.idCategorias = productos.idCategorias', 'inner');
        if ($idCategorias > 0) {
            $this->db->where('productos.idCategorias', $idCategorias);
        }
        $this->db->group_by("productos.idProductos"); 
        $this->db->order_by("productos.idProductos", "asc"); 
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }
    


}

?>
