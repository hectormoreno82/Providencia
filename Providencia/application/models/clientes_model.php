<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Clientes_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    
      function insertar_cliente($data) {
     
               $this->db->insert('usuarios',array('idUsuarios'=>$data['idUsuarios'],
                                            'Nombres'=>$data['txtNombre'],
                                            'ApPaterno'=>$data['txtApPaterno'],
                                            'ApMaterno'=>$data['txtApMaterno'],
                                            'Telefono'=>$data['txtTelefono'],
                                            'IdEstados'=>$data['cbxEstados'],
                                            'Estado'=>1,
                                            'Municipio'=>$data['txtMunicipio']));
    }
    

    


}

?>
