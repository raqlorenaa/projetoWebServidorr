<?php

include('../conexao.php');
include('../model/Usuario.php');

class UsuarioController {
    private $usuarioModel;

    public function __construct($mysqli) {
        $this->usuarioModel = new Usuario($mysqli);
    }

    public function cadastrarUsuario($nome, $email, $username, $password) {
        return $this->usuarioModel->cadastrarUsuario($nome, $email, $username, $password);
    }
}

// Conexão com o banco de dados
$mysqli = new mysqli($servername, $username, $password, $database);

// Verifica se houve um POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($mysqli->connect_error) {
        die("Falha na conexão com o banco de dados: " . $mysqli->connect_error);
    }

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Instância do Controller
    $usuarioController = new UsuarioController($mysqli);

    echo $usuarioController->cadastrarUsuario($nome, $email, $username, $password);

    $mysqli->close();
}

// Defina a lógica para definir $botao e $sair com base no estado de autenticação do usuário
if ($usuario_autenticado) {
    $botao = '<a href="logout.php">Logout</a>';
    $sair = '';
} else {
    $botao = '<a href="login.php">Login</a>';
    $sair = '';
}


?>
