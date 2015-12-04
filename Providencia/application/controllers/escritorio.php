<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Escritorio extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        $this->load->helper(array('form', 'url'));
        $this->load->model('carrito_model');
        //$this->load->library('user_agent');
        //$data['visitas'] = $this->visitas_portal_model->obtener_explorador();
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['usuario'] = $session_data['username'];
            $data['tipo'] = $session_data['tipo'];
            $data['cantidadCarrito'] = $this->carrito_model->obtener_cantidad_productos_carrito($session_data['idUsuarios']);
            $this->load->view('header_view', $data);
            $this->load->view('escritorio/escritorio_view', $data);
            $this->load->view('footer_view');
        }
    }

    

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */