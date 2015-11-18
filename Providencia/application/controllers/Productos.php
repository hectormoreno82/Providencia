<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Productos extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('productos_model');
    }
    public function index(){
        
        
//            $this->load->view('header_view');
//            $this->load->view('productos_view');
//            $this->load->view('footer_view');
            
        
//        $this->load->view('header_view');
//        $this->load->view('productos_view');
//        $this->load->view('footer_view');
    }
    
    public function categorias(){
        $segmento = $this->uri->segment(3);
        if($segmento){
            $data['productos'] = $this->productos_model->obtener_productos($segmento);
            $this->load->view('header_view');
            $this->load->view('productos_view', $data);
            $this->load->view('footer_view');
        }
    }
    public function productosDetalle(){
        
    }
}
