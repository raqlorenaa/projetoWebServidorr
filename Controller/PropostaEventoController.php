<?php

namespace App\Controller;

use App\Model\PropostaEventoModel;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../conexao.php';


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
