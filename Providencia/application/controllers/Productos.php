<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model(array('productos_model','carrito_model'));
    }

    public function index() {
        $data['productos'] = $this->productos_model->obtener_productos(0);
        $this->load->view('header_view');
        $this->load->view('productos_view', $data);
        $this->load->view('footer_view');
    }

    public function categorias() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['usuario'] = $session_data['username'];
            $data['cantidadCarrito'] = $this->carrito_model->obtener_cantidad_productos_carrito($session_data['idUsuarios']);            
        }
        
        $segmento = $this->uri->segment(3);
        if ($segmento) {
            $data['productos'] = $this->productos_model->obtener_productos($segmento);
            
            $this->load->view('header_view', $data);
            $this->load->view('productos_view', $data);
            $this->load->view('footer_view');
        }
    }

    public function detalle() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['usuario'] = $session_data['username'];       
            $data['cantidadCarrito'] = $this->carrito_model->obtener_cantidad_productos_carrito($session_data['idUsuarios']);
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
