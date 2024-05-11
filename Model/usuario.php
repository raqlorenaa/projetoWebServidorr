<?php
namespace App\Model;
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../conexao.php';


class Usuario {
    private $mysqli;

    public function logout() {
        session_unset();
        session_destroy();
    }

    public function __construct($mysqli) {
        $this->mysqli = $mysqli;
    }

    public function cadastrarUsuario($nome, $email, $username, $password, $tipo) {
        if (empty($password)) {
            return "<div class='error'>Erro: Por favor, insira uma senha.</div>";
        } else {
            $stmt = $this->mysqli->prepare("INSERT INTO usuarios (nome, email, username, password, tipo) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $nome, $email, $username, $password, $tipo);

            if ($stmt->execute()) {
                return "Usuário cadastrado com sucesso!";
            } else {
                return "Erro ao cadastrar usuário: " . $stmt->error;
            }

            $stmt->close();
        }
    }
}

?>
