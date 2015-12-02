<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Carrito_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function obtener_productos_carrito_usuario($idUsuario) {
        
        $this->db->select('*');
        $this->db->from('carritousuario');
        $this->db->join('productos','productos.idProductos = carritousuario.idProductos', 'inner');
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
    
    function obtener_cantidad_productos_carrito($idUsuarios) {
        $this->db->select('*');
        $this->db->from('carritousuario');
        $this->db->where('idUsuarios', $idUsuarios);
        $this->db->group_by("idProductos"); 
        
        
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return FALSE;
        }
    }
    
    function insertar_productos_carrito($data){
        return $this->db->insert('carritousuario', $data);
    }

}

?>
