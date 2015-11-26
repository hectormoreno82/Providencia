<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author hector.moreno
 */
class Login extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }
    
    function index(){
        $this->load->view('header_view');
        $this->load->view('login_view');
        $this->load->view('footer_view');
    }
}
