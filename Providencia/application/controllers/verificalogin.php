<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class VerificaLogin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user', '', TRUE);
    }

    function index() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $result = $this->user->login($username, $password);
        if ($result) {
            $sess_array = array();
            foreach ($result as $row) {
                $sess_array = array(
                    'idUsuarios' => $row->idUsuarios,
                    'username' => $row->username,
                    'tipo' => $row->tipo,
                );
                $this->session->set_userdata('logged_in', $sess_array);
                if ($row->tipo == 1) {
                    redirect('pedidos/pedidos_admin', 'refresh');
                }
                else{
                    redirect('pedidos', 'refresh');
                }
                
            }
            //return TRUE;
        } else {
            //$this->form_validation->set_message('check_database', '<div class="notification error"> <img src="images/icons/error.png" alt="Error"/> <p>Usuario o contraseña incorrectas</p></div>');
            $data['error'] = 'Usuario o contraseña incorrectas';
            $this->load->view('header_view');
            $this->load->view('login_view', $data);
            $this->load->view('footer_view');
            //return false;
        }
//        $this->load->library('form_validation');
//
//        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
//        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
//
//        if (check_database($username, $password) == FALSE) {
//            echo 'entra al error';
////            $this->load->view('header_view');
////            $this->load->view('login_view');
////            $this->load->view('footer_view');
//            
//        } else {
//            //AQUI LO MANDAMOS A LAS OPCIONES PRIVADAS
//            echo 'entra';
//            //redirect('escritorio', 'refresh');
//        }
    }

    function check_database($username, $password) {
        $result = $this->user->login($username, $password);
        if ($result) {
            $sess_array = array();
            foreach ($result as $row) {
                $sess_array = array(
                    'idUsuarios' => $row->idUsuarios,
                    'username' => $row->username
                );
                $this->session->set_userdata('logged_in', $sess_array);
            }
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', '<div class="notification error"> <img src="images/icons/error.png" alt="Error"/> <p>Usuario o contraseña incorrectas</p></div>');
            return false;
        }
    }

}

?>
