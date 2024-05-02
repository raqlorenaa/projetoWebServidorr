<?php
namespace App\Model;

class Event {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function getEventById($eventId) {
        $stmt = $this->db->prepare("SELECT * FROM proposta_evento WHERE idevento = ?");
        $stmt->execute([$eventId]);
        return $stmt->fetch();
    }

    public function updateEvent($eventId, $data, $descricao, $contato, $local, $nome, $status) {
        $sql = "UPDATE proposta_evento SET data_evento = ?, desc_evento = ?, info_contato = ?, local_evento = ?, nome_evento = ?, status_proposta = ? WHERE idevento = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$data, $descricao, $contato, $local, $nome, $status, $eventId]);
    }
}
?>