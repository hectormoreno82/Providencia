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
    
//    function obtener_pedidos_usuario($idUsuario) {
//        $this->db->select('*');
//        $this->db->from('pedidos as Ped');
//        $this->db->join('pedidosdetalle as P', 'P.idProductos = CU.idProductos', 'inner');
//        $this->db->join('productos as P', 'P.idProductos = CU.idProductos', 'inner');
//        $this->db->join('imagenes as I', 'I.idProductos = CU.idProductos', 'inner');
//        $this->db->where('CU.idUsuarios', $idUsuario);
//        $this->db->group_by("CU.idProductos");
//        //$this->db->order_by("productos.idProductos", "asc"); 
//        $query = $this->db->get();
//        if ($query->num_rows() > 0) {
//            return $query;
//        } else {
//            return FALSE;
//        }
//    }
    
    function obtener_pedidos_usuario($idUsuarios) {
        $query = "SELECT PD.idPedidos, ROUND(SUM(Prod.precio * PD.Cantidad),2) as Cantidad, COUNT(PD.idProductos) as CantidadProductos
                    ,(SELECT Fecha FROM pedidosestatus WHERE idEstatus = 1 AND idPedidos = P.idPedidos) as FechaPedido  
                    ,PE.Fecha as FechaModificacion,E.Nombre as Estatus, E.idEstatus, E.Clase
                    FROM pedidos as P 
                    INNER JOIN pedidosdetalle as PD ON PD.idPedidos = P.idPedidos
                    INNER JOIN productos as Prod ON Prod.idProductos = PD.idProductos
                    INNER JOIN pedidosestatus as PE ON PE.idPedidos = PD.idPedidos
                    INNER JOIN estatus as E ON E.idEstatus = PE.idEstatus
                    WHERE PE.idPedidosEstatus = (SELECT idPedidosEstatus FROM pedidosestatus WHERE idPedidos = P.idPedidos ORDER BY idPedidosEstatus DESC LIMIT 1)
                    AND P.idUsuarios = " .  $idUsuarios . " GROUP BY P.idPedidos";
 
        $datos = $this->db->query($query);
        if ($datos->num_rows() > 0) {
            return $datos;
        } else {
            return FALSE;
        }
    }
    
    function obtener_detalle_pedido($idPedidos) {
        $query = "SELECT PD.idPedidos, ROUND(SUM(Prod.precio * PD.Cantidad),2) as Cantidad, COUNT(PD.idProductos) as CantidadProductos
                    ,(SELECT Fecha FROM pedidosestatus WHERE idEstatus = 1 AND idPedidos = P.idPedidos) as FechaPedido  
                    ,PE.Fecha as FechaModificacion,E.Nombre as Estatus, E.idEstatus, E.Clase
                    FROM pedidos as P 
                    INNER JOIN pedidosdetalle as PD ON PD.idPedidos = P.idPedidos
                    INNER JOIN productos as Prod ON Prod.idProductos = PD.idProductos
                    INNER JOIN pedidosestatus as PE ON PE.idPedidos = PD.idPedidos
                    INNER JOIN estatus as E ON E.idEstatus = PE.idEstatus
                    WHERE PE.idPedidosEstatus = (SELECT idPedidosEstatus FROM pedidosestatus WHERE idPedidos = P.idPedidos ORDER BY idPedidosEstatus DESC LIMIT 1)
                    AND P.idPedidos = " .  $idPedidos . " GROUP BY P.idPedidos";
 
        $datos = $this->db->query($query);
        if ($datos->num_rows() > 0) {
            return $datos;
        } else {
            return FALSE;
        }
    }

}

?>
