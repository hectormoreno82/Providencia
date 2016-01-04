<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Estatus extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model(array('estatus_model'));
    }

    public function index() {
    }

    public function obtener_estatus() {
        $data = $this->estatus_model->consultar_estatus();
        $this->output->set_content_type('application/json')->set_output(json_encode($data->result()));
    }
}
