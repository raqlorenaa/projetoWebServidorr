<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "phpteste"; 

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($password)) {
        echo "Erro: Por favor, insira uma senha.";
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO clientes (nome, email, username, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nome, $email, $username, $password);

    if ($stmt->execute()) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar usuário: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: cadastro.php");
    exit;
}
?>
