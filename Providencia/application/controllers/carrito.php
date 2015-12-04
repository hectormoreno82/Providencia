<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Carrito extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('carrito_model');
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['usuario'] = $session_data['username'];
            $data['tipo'] = $session_data['tipo'];
            $data['cantidadCarrito'] = $this->carrito_model->obtener_cantidad_productos_carrito($session_data['idUsuarios']);
            $data['productosCarrito'] = $this->carrito_model->obtener_productos_carrito_usuario($session_data['idUsuarios']);
            $this->load->view('header_view', $data);
            $this->load->view('carrito_view', $data);
            $this->load->view('footer_view');
        }
//        $data['productos'] = $this->productos_model->obtener_productos(0);
//        $this->load->view('header_view');
//        $this->load->view('productos_view', $data);
//        $this->load->view('footer_view');
    }

    public function borrar_producto() {
        $segmento = $this->uri->segment(3);
        if ($segmento) {
            if ($this->carrito_model->borrar_producto_carrito($segmento)) {
                redirect('carrito');
            }
        }
    }

    public function agregar_producto() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['usuario'] = $session_data['username'];
            $idUsuarios = $session_data['idUsuarios'];
            
            //revisamos si ya existe el producto para saber si insertamos o actualizamos
            $carritoUsuario = $this->carrito_model->obtener_carrito_usuario_producto($this->input->post('txtidProductos'), $idUsuarios);
            if ($carritoUsuario) {
                $data = array(
                    'Cantidad' => $this->input->post('txtCantidad') + $carritoUsuario->result()[0]->Cantidad
                );
                $idCarritoUsuario = $carritoUsuario->result()[0]->idCarritoUsuario;
                //die($idCarritoUsuario);
                $this->carrito_model->actualizar_carrito_usuario($data, $idCarritoUsuario);
            } else {
                $data = array(
                    'idUsuarios' => $session_data['idUsuarios'],
                    'idProductos' => $this->input->post('txtidProductos'),
                    'Cantidad' => $this->input->post('txtCantidad')
                );
                $this->carrito_model->insertar_productos_carrito($data);
            }
            redirect('Productos/Detalle/' . $this->input->post('txtidProductos'));
        }
    }

    public function detalle() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['usuario'] = $session_data['username'];
        }
        $segmento = $this->uri->segment(3);
        if ($segmento) {
            $data['producto'] = $this->productos_model->obtener_productosId($segmento);
            $data['imagenes'] = $this->productos_model->obtener_productosImagenes($segmento);
        }
        $this->load->view('header_view', $data);
        $this->load->view('productosDetalle_view', $data);
        $this->load->view('footer_view');
    }

}
