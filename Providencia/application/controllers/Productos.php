<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Productos extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }
    public function index(){
        
        $segmento = $this->uri->segment(3);
        if($segmento){
            $this->load->view('header_view');
            $this->load->view('productos_view');
            $this->load->view('footer_view');
            
        }
//        $this->load->view('header_view');
//        $this->load->view('productos_view');
//        $this->load->view('footer_view');
    }
    
    public function productosDetalle(){
        
    }
}
