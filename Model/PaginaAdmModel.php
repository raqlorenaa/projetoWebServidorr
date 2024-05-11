<?php
namespace App\Model;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../conexao.php';

class PaginaAdmModel {
    private $mysqli;

    public function __construct($mysqli) {
        $this->mysqli = $mysqli;
    }

    public function getUsers($page = 1, $limit = 10) {
        $offset = ($page - 1) * $limit;
        $sql = "SELECT * FROM usuarios ORDER BY nome ASC LIMIT ? OFFSET ?";
        $stmt = $this->mysqli->prepare($sql);
        if ($stmt) {
            $stmt->bind_param('ii', $limit, $offset);
            $stmt->execute();
            return $stmt->get_result();
        } else {
            return null; // ou lidar com erro de maneira adequada
        }
    }

    public function getEventos($page = 1, $limit = 10) {
        $offset = ($page - 1) * $limit;
        $sql = "SELECT * FROM proposta_evento ORDER BY data_evento ASC LIMIT ? OFFSET ?";
        $stmt = $this->mysqli->prepare($sql);
        if ($stmt) {
            $stmt->bind_param('ii', $limit, $offset);
            $stmt->execute();
            return $stmt->get_result();
        } else {
            return null; // ou lidar com erro de maneira adequada
        }
    }
}
