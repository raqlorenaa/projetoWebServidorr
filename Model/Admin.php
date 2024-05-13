<?php
namespace App\Model;

// Caminho absoluto para o arquivo conexao.php
require __DIR__ . '/../conexao.php';

class Admin {
    private $mysqli;

    public function __construct($mysqli) {
        $this->mysqli = $mysqli;
    }

    public function lerUsuarios() {
        $stmt = $this->mysqli->prepare("SELECT * FROM usuarios");
        $stmt->execute();
        $result = $stmt->get_result();
        $usuarios = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $usuarios;
    }

    public function atualizarUsuario($id, $nome, $email, $username, $tipo) {
        $stmt = $this->mysqli->prepare("UPDATE usuarios SET nome = ?, email = ?, username = ?, tipo = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $nome, $email, $username, $tipo, $id);
        if ($stmt->execute()) {
            $stmt->close();
            return "Usuário atualizado com sucesso!";
        } else {
            $stmt->close();
            return "Erro ao atualizar usuário: " . $stmt->error;
        }
    }

    public function deletarUsuario($id) {
        $stmt = $this->mysqli->prepare("DELETE FROM usuarios WHERE id = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            $stmt->close();
            return "Usuário deletado com sucesso!";
        } else {
            $stmt->close();
            return "Erro ao deletar usuário: " . $stmt->error;
        }
    }
}
?>
