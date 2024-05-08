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
        <?php foreach ($usuarios as $usuario):?>
        <tr>
            <td><?= $usuario['id']?></td>
            <td><?= $usuario['nome']?></td>
        </tr>
        <?php endforeach;?>
    </table>

    <h1>Eventos</h1>
    <table>
        <tr>
            <th>ID do Evento</th>
            <th>Data do Evento</th>
        </tr>
        <?php foreach ($eventos as $evento):?>
        <tr>
            <td><?= $evento['idevento']?></td>
            <td><?= $evento['data_evento']?></td>
        </tr>
        <?php endforeach;?>
    </table>
    <?php if (!empty($usuarios)):?>
    <!-- Iteração sobre $usuarios -->
<?php endif;?>

<?php if (!empty($eventos)):?>
    <!-- Iteração sobre $eventos -->
<?php endif;?>
</body>
</html>
