<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model(array('pedidos_model', 'carrito_model'));
        $this->load->library("fpdf17/fpdf");
        //$this->load->library("fpdf17/fpdf_protection");
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['usuario'] = $session_data['username'];
            $data['tipo'] = $session_data['tipo'];
            $data['cantidadCarrito'] = $this->carrito_model->obtener_cantidad_productos_carrito($session_data['idUsuarios']);
            $data['pedidosUsuario'] = $this->pedidos_model->obtener_pedidos_usuario($session_data['idUsuarios']);
        }

        $this->load->view('header_view', $data);
        $this->load->view('pedidos_usuarios_view', $data);
        $this->load->view('footer_view');
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
                    redirect('pedidos');
                } else {
                    redirect('welcome/internalError');
                }
            } else {
                redirect('welcome/internalError');
            }
        }
    }
    
    public function detalle(){
        $segmento = $this->uri->segment(3);
        if ($segmento) {
            $data = $this->pedidos_model->obtener_detalle_pedido($segmento);
            $this->output->set_content_type('application/json')->set_output(json_encode($data->result()));
        }
        
    }
    
    public function imprimir(){
        $segmento = $this->uri->segment(3);
        if ($segmento) {
            $data = $this->pedidos_model->obtener_detalle_pedido($segmento);
            //$this->output->set_content_type('application/json')->set_output(json_encode($data->result()[0]));
            
            $pdf = new FPDF();
            $pdf->AddPage();
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(30, 5, 'DETALLE DEL PEDIDO No.'.$data->result()[0]->idPedidos, 0, 1);
            $pdf->Output(); 
            
            
        }
    }

}
