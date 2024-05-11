<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../conexao.php'; // Assegure-se que a conexão é criada aqui

use App\Model\PaginaAdmModel;

$model = new PaginaAdmModel($mysqli);
$usuarios = $model->getUsers();
$eventos = $model->getEventos();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Página de Administração</title>
</head>
<body>
    <h1>Usuários</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
        </tr>
        <?php if ($usuarios): while ($usuario = $usuarios->fetch_assoc()): ?>
        <tr>
            <td><?= $usuario['id'] ?></td>
            <td><?= $usuario['nome'] ?></td>
        </tr>
        <?php endwhile; endif; ?>
    </table>

    <h1>Eventos</h1>
    <table>
        <tr>
            <th>ID do Evento</th>
            <th>Data do Evento</th>
        </tr>
        <?php if ($eventos): while ($evento = $eventos->fetch_assoc()): ?>
        <tr>
            <td><?= $evento['idevento'] ?></td>
            <td><?= $evento['data_evento'] ?></td>
        </tr>
        <?php endwhile; endif; ?>
    </table>
</body>
</html>
