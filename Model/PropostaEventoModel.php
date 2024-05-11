<?php
namespace App\Model;
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../conexao.php';



class PropostaEventoModel {
    private $mysqli;

    public function __construct($mysqli) {
        $this->mysqli = $mysqli;
    }

    public function listarPropostas() {
        $query = "SELECT * FROM proposta_evento";
        $result = $this->mysqli->query($query);
        $propostas = array();
        while ($row = $result->fetch_assoc()) {
            $propostas[] = $row;
        }
        return $propostas;
    }
    
}
?>
