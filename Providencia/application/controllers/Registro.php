<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller {

    function __construct() {
        parent::__construct();
       $this->load->helper(array('form', 'url'));
       $this->load->model('registro_model');
    }

    public function index() {
     //   $data['productos'] = $this->productos_model->obtener_productos(0);
        $this->load->view('header_view');
        $this->load->view('registro_view');
        $this->load->view('footer_view');
    }


}
