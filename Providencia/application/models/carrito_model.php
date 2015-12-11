<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Carrito_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function obtener_productos_carrito_usuario($idUsuario) {
        $this->db->select('*, ROUND(P.Precio,2) as PrecioR, ROUND((P.Precio * CU.Cantidad),2) as Subtotal');
        $this->db->from('carritousuario as CU');
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

    function borrar_producto_carrito($idProductos) {
        $this->db->where('idProductos', $idProductos);
        $this->db->delete('carritousuario');
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function insertar_productos_carrito($data) {
        return $this->db->insert('carritousuario', $data);
    }

    function obtener_carrito_usuario_producto($idProductos, $idUsuarios) {
        $this->db->select('*');
        $this->db->from('carritousuario');
        $this->db->where('idProductos', $idProductos);
        $this->db->where('idUsuarios', $idUsuarios);
        $query = $this->db->get();
        //die($this->db->last_query());
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }

    function actualizar_carrito_usuario($data, $id) {
        $this->db->where('idCarritoUsuario', $id);
        $this->db->update('carritousuario', $data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function borrar_carrito_usuario($idUsuarios) {
        $this->db->where('idUsuarios', $idUsuarios);
        $this->db->delete('carritousuario');
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}

?>
