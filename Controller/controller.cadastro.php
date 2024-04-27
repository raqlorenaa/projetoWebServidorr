<?php
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($mysqli->connect_error) {
        die("Erro na conexão com o banco de dados: " . $mysqli->connect_error);
    }

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($password)) {
        echo "<div class='error'>Erro: Por favor, insira uma senha.</div>";
    } else {
        $stmt = $mysqli->prepare("INSERT INTO usuarios (nome, email, username, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nome, $email, $username, $password);

        if ($stmt->execute()) {
            echo "Usuário cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar usuário: " . $stmt->error;
        }

        $stmt->close();
        $mysqli->close();
    }
}
?>
