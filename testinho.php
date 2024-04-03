<?php
echo "olá mundo";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $data_evento = $_POST["data_evento"];

    
    if (empty($nome) || empty($email) || empty($data_evento)) {
        echo "Por favor, preencha todos os campos.";
    } else {
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "phpmyadmin";

        $conn = new mysqli($servername, $username, $password, $dbname);

        
        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }

        
        $sql = "INSERT INTO clientes (nome, email, data_evento) VALUES ('$nome', '$email', '$data_evento')";

        if ($conn->query($sql) === TRUE) {
            echo "Cadastro realizado com sucesso!";
        } else {
            echo "Erro ao cadastrar: " . $conn->error;
        }

        
        $conn->close();
    }
} else {
    
    header("Location: cadastro_evento.html");
    exit();
}
?>