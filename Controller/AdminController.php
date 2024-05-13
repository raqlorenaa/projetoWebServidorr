<?php
namespace App\Controller;

use App\Model\Admin;

// Caminho absoluto para o arquivo conexao.php
require __DIR__ . '/../conexao.php';

class AdminController {
    private $adminModel;

    public function __construct($mysqli) {
        $this->adminModel = new Admin($mysqli);
    }

    public function lerUsuarios() {
        return $this->adminModel->lerUsuarios();
    }

    public function atualizarUsuario($id, $nome, $email, $username, $tipo) {
        return $this->adminModel->atualizarUsuario($id, $nome, $email, $username, $tipo);
    }

    public function deletarUsuario($id) {
        return $this->adminModel->deletarUsuario($id);
    }
}
?>
