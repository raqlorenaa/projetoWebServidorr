<?php
namespace App\Model;

// Caminho absoluto para o arquivo conexao.php
require __DIR__ . '/../conexao.php';

class PropostaEvento {
    private $mysqli;

    public function __construct($mysqli) {
        $this->mysqli = $mysqli;
    }

    public function lerPropostas() {
        $stmt = $this->mysqli->prepare("SELECT * FROM proposta_evento");
        $stmt->execute();
        $result = $stmt->get_result();
        $propostas = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $propostas;
    }

    public function atualizarProposta($idevento, $desc_evento, $data_evento, $local_evento, $info_contato, $status_proposta) {
        $stmt = $this->mysqli->prepare("UPDATE proposta_evento SET desc_evento = ?, data_evento = ?, local_evento = ?, info_contato = ?, status_proposta = ? WHERE idevento = ?");
        $stmt->bind_param("sssssi", $desc_evento, $data_evento, $local_evento, $info_contato, $status_proposta, $idevento);
        if ($stmt->execute()) {
            $stmt->close();
            return "Proposta atualizada com sucesso!";
        } else {
            $stmt->close();
            return "Erro ao atualizar proposta: " . $stmt->error;
        }
    }

    public function deletarProposta($idevento) {
        $stmt = $this->mysqli->prepare("DELETE FROM proposta_evento WHERE idevento = ?");
        $stmt->bind_param("i", $idevento);
        if ($stmt->execute()) {
            $stmt->close();
            return "Proposta deletada com sucesso!";
        } else {
            $stmt->close();
            return "Erro ao deletar proposta: " . $stmt->error;
        }
    }
}
?>
