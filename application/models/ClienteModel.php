<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class ClienteModel extends CI_Model {

   public function listarTodos(){
      return $this->db->get('cliente')->result_array();
   }

   public function salvar($cliente) {
       $this->db->insert('cliente', $cliente);
   }

}

?>
