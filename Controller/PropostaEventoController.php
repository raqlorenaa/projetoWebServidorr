<?php

include '../conexao.php';
require_once '../model/PropostaEventoModel.php';


class PropostaEventoController {
    private $model;
    private $mysqli;

    public function __construct($mysqli) {
        $this->model = new PropostaEventoModel($mysqli);
        $this->mysqli = $mysqli;
        $this->listarPropostas();
    }

    public function listarPropostas() {
        $propostas = $this->model->listarPropostas();
        include '../view/view.paginaadm.php'; // Chamando a view para exibir os dados
    }
    
   
}
?>
