<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Carrito extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('carrito_model');
    }

    public function index() {
//        $data['productos'] = $this->productos_model->obtener_productos(0);
//        $this->load->view('header_view');
//        $this->load->view('productos_view', $data);
//        $this->load->view('footer_view');
    }

    public function agregar_producto() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['usuario'] = $session_data['username'];
            $idUsuarios = $session_data['idUsuarios'];
            $data = array(
                'idUsuarios' => $session_data['idUsuarios'],
                'idProductos' => $this->input->post('txtidProductos'),
                'Cantidad' => $this->input->post('txtCantidad')
            );
            $this->carrito_model->insertar_productos_carrito($data);
            redirect('Productos/Detalle/'.$this->input->post('txtidProductos'));
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
