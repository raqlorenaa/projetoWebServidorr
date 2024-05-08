<?php

class Usuario {
    private $mysqli;
    
    public function logout() {
        session_unset();
        session_destroy();
    }

    public function __construct($mysqli) {
        $this->mysqli = $mysqli;
    }

    public function cadastrarUsuario($nome, $email, $username, $password) {
        if (empty($password)) {
            return "<div class='error'>Erro: Por favor, insira uma senha.</div>";
        } else {
            $stmt = $this->mysqli->prepare("INSERT INTO usuarios (nome, email, username, password) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $nome, $email, $username, $password);

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
