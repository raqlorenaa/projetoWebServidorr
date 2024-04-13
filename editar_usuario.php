<?php 
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $novo_nome = $_POST['novo_nome'];
    $novo_email = $_POST['novo_email'];
    $novo_tipo = $_POST['novo_tipo'];

    if ($novo_tipo == 'admin' || $novo_tipo == 'cliente') {
        $sql_atualizar_usuario = "UPDATE usuarios SET 
                          nome = '$novo_nome', 
                          email = '$novo_email',
                          tipo = '$novo_tipo'
                          WHERE id = $id";
        $resultado_usuario = $mysqli->query($sql_atualizar_usuario);
        if ($resultado_usuario) {
            header("Location: paginaadmin.php");
            exit;
        } else {
            echo "Erro ao atualizar usuário.";
        }
    } else {
        echo "Tipo de usuário inválido.";
    }
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql_usuario = "SELECT * FROM usuarios WHERE id = $id";
    $resultado_usuario = $mysqli->query($sql_usuario);
    if ($resultado_usuario->num_rows == 1) {
        $usuario = $resultado_usuario->fetch_assoc();
    } else {
        echo "Usuário não encontrado.";
    }
} else {
    echo "ID do usuário não fornecido.";
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 300px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            background-color: white;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Editar Usuário</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="novo_nome" value="<?php echo $usuario['nome']; ?>" required>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="novo_email" value="<?php echo $usuario['email']; ?>" required>

            <label for="tipo">Tipo:</label>
            <select id="tipo" name="novo_tipo" required>
                <option value="admin" <?php if ($usuario['tipo'] == 'admin') echo 'selected'; ?>>Admin</option>
                <option value="cliente" <?php if ($usuario['tipo'] == 'cliente') echo 'selected'; ?>>Cliente</option>
            </select>

            <input type="submit" value="Salvar">
        </form>
    </div>

    <footer>
        <p>&copy; Todos os direitos reservados.</p>
    </footer>
</body>

</html>
