<?php
session_start();

// Inclua o arquivo de conexão com o banco de dados
include('../conexao.php');

// Verifica se o botão de logout foi pressionado
if(isset($_POST['logout'])) {
    logout();
}

// Verifica se os campos de login foram enviados
if(isset($_POST['username']) && isset($_POST['password'])) {
    process_login($_POST['username'], $_POST['password']);
}

function logout() {
    session_unset(); // Limpa todas as variáveis de sessão
    session_destroy(); // Destrói a sessão
    header("Location: ../view.index.php"); // Redireciona de volta para a página inicial
    exit();
}

function process_login($username, $password) {
    global $mysqli; // Torna a variável $mysqli global para que ela possa ser acessada dentro da função

    // Escapa os dados de entrada para prevenir SQL Injection
    $username = $mysqli->real_escape_string($username);
    $password = $mysqli->real_escape_string($password);

    // Query para verificar se o usuário existe no banco de dados
    $sql = "SELECT * FROM usuarios WHERE username = '$username' AND password = '$password'";
    $result = $mysqli->query($sql);

    // Verifica se há algum resultado retornado da query
    if($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Define as variáveis de sessão
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['tipo'] = $row['tipo'];

        // Redireciona para a página inicial após o login bem-sucedido
        header("Location: ../view/view.index.php");
        exit();
        
    }  else {
        // Exibe uma mensagem de erro caso o usuário não seja encontrado
        $_SESSION['login_error'] = "Usuário ou senha incorretos!";
        header("Location: ../view/view.login.php");
        exit();
    }
    
}
?>
