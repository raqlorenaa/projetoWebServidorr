<?php
namespace App\Model;
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../conexao.php';


class Proposta {
    private $mysqli;

    public function __construct($mysqli) {
        $this->mysqli = $mysqli;
    }

    public function enviarProposta($nome_evento, $desc_evento, $data_evento, $local_evento, $info_contato) {
        if ($this->mysqli->connect_error) {
            return "Erro na conexão com o banco de dados: " . $this->mysqli->connect_error;
        }

        $stmt = $this->mysqli->prepare("INSERT INTO proposta_evento (nome_evento, desc_evento, data_evento, local_evento, info_contato) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nome_evento, $desc_evento, $data_evento, $local_evento, $info_contato);

        if ($stmt->execute()) {
            return "Proposta de evento enviada com sucesso!";
        } else {
            return "Erro ao enviar proposta de evento: " . $stmt->error;
        }

        $stmt->close();
    }
}
?>
