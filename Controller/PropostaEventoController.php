<?php
namespace App\Controller;

use App\Model\PropostaEvento;

// Caminho absoluto para o arquivo conexao.php
require __DIR__ . '/../conexao.php';

class PropostaEventoController {
    private $propostaEventoModel;

    public function __construct($mysqli) {
        $this->propostaEventoModel = new PropostaEvento($mysqli);
    }

    public function lerPropostas() {
        return $this->propostaEventoModel->lerPropostas();
    }

    public function atualizarProposta($idevento, $desc_evento, $data_evento, $local_evento, $info_contato, $status_proposta) {
        return $this->propostaEventoModel->atualizarProposta($idevento, $desc_evento, $data_evento, $local_evento, $info_contato, $status_proposta);
    }

    public function deletarProposta($idevento) {
        return $this->propostaEventoModel->deletarProposta($idevento);
    }
}
?>
