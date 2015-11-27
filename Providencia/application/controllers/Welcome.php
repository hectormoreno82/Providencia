<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
        //$this->load->view('welcome_message');
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $data['usuario'] = $session_data['username']; 
            $this->load->view('header_view',$data);
            $this->load->view('inicio_view');
            $this->load->view('footer_view');
        }  else {
            $this->load->view('header_view');
            $this->load->view('inicio_view');
            $this->load->view('footer_view');
        }
            
        

        
        
    }

    function logout() {
        $this->session->unset_userdata('logged_in');
        //session_destroy();
        redirect('welcome', 'refresh');
    }

}
