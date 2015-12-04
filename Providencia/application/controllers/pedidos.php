<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('pedidos_model');
    }

    public function index() {
        
    }

    public function procesar_pedido(){
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['usuario'] = $session_data['username'];
            $idUsuarios = $session_data['idUsuarios'];
        }
    }

}
