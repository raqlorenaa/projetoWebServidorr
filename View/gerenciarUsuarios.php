<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../conexao.php';

use App\Controller\AdminController;

$adminController = new AdminController($mysqli);
$usuarios = $adminController->lerUsuarios();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $tipo = $_POST['tipo'];
        echo $adminController->atualizarUsuario($id, $nome, $email, $username, $tipo);
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];
        echo $adminController->deletarUsuario($id);
    }

    // Redireciona para evitar resubmissão do formulário
    header("Location: " . $_SERVER['REQUEST_URI']);
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gerenciar Usuários</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #121212;
            color: #ffffff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 90%;
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            background-color: #1e1e1e;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
        }

        h1 {
            text-align: center;
            color: #ffffff;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #3a3a3a;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333333;
            color: #ffffff;
        }

        tr:nth-child(even) {
            background-color: #2c2c2c;
        }

        tr:hover {
            background-color: #3a3a3a;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        .redirect-button {
            margin-bottom: 20px;
            text-align: center;
        }

        form {
            display: flex;
            align-items: center;
        }

        form td {
            padding: 5px;
        }

        select, input[type="text"], input[type="email"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            box-sizing: border-box;
            background-color: #333333;
            border: 1px solid #4a4a4a;
            border-radius: 5px;
            color: #ffffff;
        }

        select:focus, input[type="text"]:focus, input[type="email"]:focus {
            border-color: #80bdff;
            outline: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="redirect-button">
            <button onclick="redirectToPropostas()">Ir para Propostas de Evento</button>
        </div>
        <h1>Gerenciar Usuários</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Username</th>
                <th>Tipo</th>
                <th>Ações</th>
            </tr>
            <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <form method="post">
                    <td><input type="hidden" name="id" value="<?= $usuario['id'] ?>"><?= $usuario['id'] ?></td>
                    <td><input type="text" name="nome" value="<?= $usuario['nome'] ?>"></td>
                    <td><input type="email" name="email" value="<?= $usuario['email'] ?>"></td>
                    <td><input type="text" name="username" value="<?= $usuario['username'] ?>"></td>
                    <td>
                        <select name="tipo">
                            <option value="cliente" <?= $usuario['tipo'] == 'cliente' ? 'selected' : '' ?>>Cliente</option>
                            <option value="admin" <?= $usuario['tipo'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                        </select>
                    </td>
                    <td>
                        <button type="submit" name="update">Atualizar</button>
                        <button type="submit" name="delete">Deletar</button>
                    </td>
                </form>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <script>
    function redirectToPropostas() {
        window.location.href = '/projetoWebServidorr/view/adminPropostas.php';
    }
</script>
</body>
</html>
