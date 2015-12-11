<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model(array('pedidos_model', 'carrito_model'));
    }

    public function index() {
        
    }

    public function procesar_pedido() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['usuario'] = $session_data['username'];
            $idUsuarios = $session_data['idUsuarios'];

            $datos = array(
                'idUsuarios' => $idUsuarios,
                'CostoEnvio' => 0
            );

            //insertamos el encabezado del pedido
            $idPedidos = $this->pedidos_model->insertar_pedido($datos);

            if ($idPedidos) {
                $datosEstatus = array(
                    'idEstatus' => 1,
                    'idPedidos' => $idPedidos,
                    'idUsuarios' => $idUsuarios,
                );

                //insertamos el estatus del pedido
                $idPedidosEstatus = $this->pedidos_model->insertar_pedido_estatus($datosEstatus);
                if ($idPedidosEstatus) {
                    $productosCarrito = $this->carrito_model->obtener_productos_carrito_usuario($idUsuarios);
                    foreach ($productosCarrito->result() as $productoCarrito) {
                        $datosDetalle = array(
                            'idPedidos' => $idPedidos,
                            'idProductos' => $productoCarrito->idProductos,
                            'Cantidad' => $productoCarrito->Cantidad
                        );
                        $this->pedidos_model->insertar_pedido_detalle($datosDetalle);
                    }
                    //limpiamos el carrito del usuario
                    $this->carrito_model->borrar_carrito_usuario($idUsuarios);
                } else {
                    redirect('welcome/internalError');
                }
            } else {
                redirect('welcome/internalError');
            }
        }
    }

}
