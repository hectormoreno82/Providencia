<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pedidos_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insertar_pedido($data) {
        $this->db->insert('pedidos', $data);
        return $this->db->insert_id();
    }
    
    function insertar_pedido_estatus($data){
        $this->db->insert('pedidosestatus', $data);
        return $this->db->insert_id();
    }
    
    function insertar_pedido_detalle($data){
        $this->db->insert('pedidosdetalle', $data);
        return $this->db->insert_id();
    }
    
    function obtener_pedidos_usuario($idUsuario) {
        $this->db->select('*');
        $this->db->from('pedidos as Ped');
        $this->db->join('pedidosdetalle as P', 'P.idProductos = CU.idProductos', 'inner');
        $this->db->join('productos as P', 'P.idProductos = CU.idProductos', 'inner');
        $this->db->join('imagenes as I', 'I.idProductos = CU.idProductos', 'inner');
        $this->db->where('CU.idUsuarios', $idUsuario);
        $this->db->group_by("CU.idProductos");
        //$this->db->order_by("productos.idProductos", "asc"); 
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }

}

?>
