<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username_db = "root";
    $password_db = "";
    $dbname = "phpteste";

    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT tipo FROM clientes WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['tipo'] = $row['tipo'];
        if ($row['tipo'] == 'admin') {
            header("Location: paginaadmin.html"); 
        } else {
            header("Location: paginausuario.html");
        }
        exit;
    } else {
        echo "Usuário ou senha incorretos.";
    }

    $stmt->close();
    $conn->close();
}

?>
