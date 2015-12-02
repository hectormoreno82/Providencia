<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Registro_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function insertar_usuario($data) {
       $password=rand(1000000, 2000000000) +''+ rand(1000000, 2000000000);
               $this->db->insert('usuarios',array('username'=>$data['txtCorreo'],
                                                  'password'=>$password,
                                                  'tipo'=>2));
               
    }
    
    
       function consultar_ultimoid() {
        $this->db->select_max('idUsuarios');
        $this->db->from('usuarios');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return FALSE;
        }
    }
    
    
     function consultar_correo($data) {
        $this->db->select('username');
        $this->db->from('usuarios');
        $this->db->where('username', $data);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return array('username'=>"0");
        }
    }
    
}

?>
