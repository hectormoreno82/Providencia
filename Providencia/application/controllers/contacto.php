<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contacto extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
       // $this->load->model(array('registro_model', 'estados_model', 'clientes_model'));
    }

    public function index() {
        //$data['estados'] = $this->estados_model->consultar_estados();
        $this->load->view('header_view');
        $this->load->view('contacto_view');
        $this->load->view('footer_view');
    }





}
