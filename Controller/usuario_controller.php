<?php
namespace App\Controller;
use App\Model\Usuario;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../conexao.php';

class UsuarioController {
    private $usuarioModel;

    public function __construct($mysqli) {
        $this->usuarioModel = new Usuario($mysqli);
    }

    public function cadastrarUsuario($nome, $email, $username, $password, $tipo = 'cliente') {
        return $this->usuarioModel->cadastrarUsuario($nome, $email, $username, $password, $tipo);
    }
}

// Conexão com o banco de dados
$mysqli = new \mysqli($servername, $username, $password, $database); // Ajuste aqui

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($mysqli->connect_error) {
        die("Falha na conexão com o banco de dados: " . $mysqli->connect_error);
    }

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $tipo = $_POST['tipo'] ?? 'cliente'; // Usa 'cliente' como padrão se 'tipo' não for fornecido

    // Instância do Controller
    $usuarioController = new UsuarioController($mysqli);

    // Cadastrando o usuário
    echo $usuarioController->cadastrarUsuario($nome, $email, $username, $password, $tipo);

    $mysqli->close();
}
?>
