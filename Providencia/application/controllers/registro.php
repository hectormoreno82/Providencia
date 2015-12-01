<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model(array('registro_model','estados_model','clientes_model'));
    }

    public function index() {
        $data['estados'] = $this->estados_model->consultar_estados();
        $this->load->view('header_view');
        $this->load->view('registro_view', $data);
        $this->load->view('footer_view');
    }

       function registrar_cliente() {
           echo $this->input->post('txtNombre');
           
            $data = array(
                'txtNombre' => $this->input->post('txtNombre'),
                'txtApPaterno' => $this->input->post('txtApPaterno'),
                'txtApMaterno' => $this->input->post('txtApMaterno'),
                'txtCorreo' => $this->input->post('txtCorreo'),
                'txtTelefono' => $this->input->post('txtTelefono'),
                'cbxEstados' => $this->input->post('cbxEstados'),
                'txtMunicipio' => $this->input->post('txtMunicipio')
            );
            print_r($data);
            
          //  $this->registro_model->insertar_usuario($data);
           // $data['idUsuarios'] =  $this->registro_model->consultar_ultimoid();
            //$this->clientes_model->insertar_cliente($data);
            
            //redirect(base_url() . "registro");
    
    }
   

}
