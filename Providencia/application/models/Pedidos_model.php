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
        $query = "SELECT *, ROUND(P.Precio,2) as PrecioR, ROUND((P.Precio * PD.Cantidad),2) as Subtotal
                    FROM pedidosdetalle as PD
                    INNER JOIN pedidos as Ped ON Ped.idPedidos = PD.idPedidos
                    INNER JOIN productos as P ON P.idProductos = PD.idProductos
                    INNER JOIN imagenes as I ON I.idProductos = PD.idProductos
                    INNER JOIN pedidosestatus as PE ON PE.idPedidos = PD.idPedidos
                    INNER JOIN estatus as E ON E.idEstatus = PE.idEstatus
                    WHERE PE.idPedidosEstatus = (SELECT idPedidosEstatus FROM pedidosestatus WHERE idPedidos = Ped.idPedidos ORDER BY idPedidosEstatus DESC LIMIT 1)
                    AND PD.idPedidos = " .  $idPedidos . " GROUP BY PD.idProductos";
        
        $datos = $this->db->query($query);
        if ($datos->num_rows() > 0) {
            return $datos;
        } else {
            return FALSE;
        }
    }
    
//    function obtener_detalle_pedido($idPedidos) {
//        $this->db->select('*, ROUND(P.Precio,2) as PrecioR, ROUND((P.Precio * PD.Cantidad),2) as Subtotal');
//        $this->db->from('pedidosdetalle as PD');
//        $this->db->join('productos as P', 'P.idProductos = PD.idProductos', 'inner');
//        $this->db->join('imagenes as I', 'I.idProductos = PD.idProductos', 'inner');
//        $this->db->join('pedidosestatus as PE', 'PE.idPedidos = PD.idPedidos', 'inner');
//        $this->db->join('estatus as E', 'E.idEstatus = PE.idEstatus', 'inner');
//        $this->db->where('PD.idPedidos', $idPedidos);
//        $this->db->group_by("PD.idProductos");
//        //$this->db->order_by("productos.idProductos", "asc"); 
//        $query = $this->db->get();
//        if ($query->num_rows() > 0) {
//            return $query;
//        } else {
//            return FALSE;
//        }
//    }
    
    function obtener_pedidos_admin() {
        $query = "SELECT PD.idPedidos, ROUND(SUM(Prod.precio * PD.Cantidad),2) as Cantidad, COUNT(PD.idProductos) as CantidadProductos
                    ,(SELECT Fecha FROM pedidosestatus WHERE idEstatus = 1 AND idPedidos = P.idPedidos) as FechaPedido  
                    ,PE.Fecha as FechaModificacion,E.Nombre as Estatus, E.idEstatus, E.Clase, U.username
                    ,CONCAT(C.ApPaterno, ' ', C.ApMaterno, ' ', C.Nombres) as Cliente, CONCAT(C.Municipio, ', ', Est.Nombre) as Lugar
                    FROM pedidos as P 
                    INNER JOIN pedidosdetalle as PD ON PD.idPedidos = P.idPedidos
                    INNER JOIN productos as Prod ON Prod.idProductos = PD.idProductos
                    INNER JOIN pedidosestatus as PE ON PE.idPedidos = PD.idPedidos
                    INNER JOIN estatus as E ON E.idEstatus = PE.idEstatus
					INNER JOIN usuarios as U ON U.idUsuarios = P.idUsuarios
					INNER JOIN clientes as C ON C.idUsuarios = P.idUsuarios
					INNER JOIN estados as Est ON Est.IdEstados = C.IdEstados
                    WHERE PE.idPedidosEstatus = (SELECT idPedidosEstatus FROM pedidosestatus WHERE idPedidos = P.idPedidos ORDER BY idPedidosEstatus DESC LIMIT 1)
                    GROUP BY P.idPedidos";
        //die($query);
        $datos = $this->db->query($query);
        if ($datos->num_rows() > 0) {
            return $datos;
        } else {
            return FALSE;
        }
    }
    
    function actualizar_pedido($idPedidos, $data){
        $this->db->where('idPedidos', $idPedidos);
        $this->db->update('pedidos', $data); 
        return $this->db->affected_rows();
    }

}

?>
