<?php
session_start();

// Verifica se o botão de logout foi pressionado
if(isset($_POST['logout'])) {
    session_unset(); // Limpa todas as variáveis de sessão
    session_destroy(); // Destrói a sessão
    header("Location: index.php"); // Redireciona de volta para a página inicial
    exit();
}

// Verifica se os campos de login foram enviados
if(isset($_POST['username']) && isset($_POST['password'])) {
    include('conexao.php'); // Inclui o arquivo de conexão com o banco de dados

    // Escapa os dados de entrada para prevenir SQL Injection
    $username = $mysqli->real_escape_string($_POST['username']);
    $password = $mysqli->real_escape_string($_POST['password']);

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
        header("Location: index.php");
        exit();
    } else {
        // Exibe uma mensagem de erro caso o usuário não seja encontrado
        echo "Usuário ou senha incorretos";
    }
} else {
    // Exibe uma mensagem caso os campos de login não tenham sido preenchidos
    echo "Por favor, preencha todos os campos";
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 300px;
            margin: 50px auto 0; /* Ajusta a margem superior */
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px; /* Adiciona espaço abaixo do título */
        }

        h1 img {
            width: 40px; /* Define o tamanho do logo */
            margin-right: 10px; /* Adiciona espaço entre o logo e o texto */
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            width: 48%;
            padding: 10px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            margin-right: 4px;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }

        header {
            background-color: #000;
            color: #fff;
            padding: 20px;
            text-align: center;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .back-button {
            background-color: #fff;
            color: #333;
            border: none;
            cursor: pointer;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 25px;
            transition: background-color 0.3s ease;
            display: flex;
            align-items: center;
            text-decoration: none;
        }

        .back-button:hover {
            background-color: #ddd;
        }

        .back-button img {
            width: 20px;
            margin-right: 5px;
        }

        .register-button {
            width: 48%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            text-align: center;
            margin-top: 10px;
        }

        .register-button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <header>
        <a class="back-button" href="javascript:history.go(-1)">
            <img src="voltar.png" alt="Voltar"> Voltar
        </a>
        <h1><img src="logo.png" alt="Logo"> </h1>
    </header>

    <div class="container">
        <div style="text-align: center;">
            <img src="login.png" alt="" style="width: 20%;">
        </div>
        <form action="paginalogin.php" method="post">
            <label for="username">Login</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Senha</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Login">

            <a href="paginadecadastro.html" class="register-button">Cadastrar-se</a>
        </form>
    </div>

    <footer>
        <p>&copy; Todos os direitos reservados.</p>
    </footer>
</body>

</html>
