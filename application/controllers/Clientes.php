<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

   public function listarTodos() {
      // carregar o model e armazenar o array de clientes dentro da variavel $clientes
      $this->load->model("ClienteModel");
      $clientes = $this->ClienteModel->listarTodos();

      // preparar o retorno em json
      header('Content-Type: application/json');
      echo json_encode($clientes);
   }

   public function salvar() {
       $postdata = file_get_contents("php://input");
       $request = json_decode($postdata);
       $cliente = ["nome"            => $request->nome,
                   "email"           => $request->email,
                   "celular"         => $request->celular,
                   "datanascimento"  => $request->datanascimento
                  ];

       $this->load->model("ClienteModel");
       $this->ClienteModel->salvar($cliente);
   }

   public function index(){
      $this->load->view("clientes/index.html");
   }
}

?>
