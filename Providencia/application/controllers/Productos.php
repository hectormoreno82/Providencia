<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Productos extends CI_Controller {
    public function index(){
        $this->load->helper(array('form', 'url'));
		//$this->load->view('welcome_message');
            $this->load->view('header_view');
            $this->load->view('productos_view');
            $this->load->view('footer_view');
    }
}
