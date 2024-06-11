<?php
namespace App\Controller;

use App\Model\Event;
use App\Core\View;

class EventController {
    private $eventModel;

    public function __construct() {
        $this->eventModel = new Event();
    }

    public function edit($eventId) {
        $event = $this->eventModel->getEventById($eventId);
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $updated = $this->eventModel->updateEvent(
                $eventId,
                $_POST['nova_data_evento'],
                $_POST['nova_desc_evento'],
                $_POST['nova_info_contato'],
                $_POST['novo_local_evento'],
                $_POST['novo_nome_evento'],
                $_POST['novo_status_proposta']
            );
            if ($updated) {
                View::redirect('admin');
            } else {
                View::render('EditEventView.php', ['error' => 'Erro ao atualizar evento.', 'event' => $event]);
            }
        } else {
            View::render('EditEventView.php', ['event' => $event]);
        }
    }
}
