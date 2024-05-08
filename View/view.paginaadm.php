<?php
include '../conexao.php';
include '../controller/PropostaEventoController.php';

?>

<!DOCTYPE html>
<html>
<head>
    <title>Propostas de Evento</title>
</head>
<body>
    <h1>Propostas de Evento</h1>
    <table border="1">
        <tr>
            <th>Nome do Evento</th>
            <th>Descrição do Evento</th>
            <th>Data do Evento</th>
            <th>ID do Evento</th>
            <th>Local do Evento</th>
            <th>Informações de Contato</th>
            <th>Status da Proposta</th>
        </tr>
        <?php foreach ($propostas as $proposta):?>
        <tr>
            <td><?php echo $proposta['nome_evento'];?></td>
            <td><?php echo $proposta['desc_evento'];?></td>
            <td><?php echo $proposta['data_evento'];?></td>
            <td><?php echo $proposta['idevento'];?></td>
            <td><?php echo $proposta['local_evento'];?></td>
            <td><?php echo $proposta['info_contato'];?></td>
            <td><?php echo $proposta['status_proposta'];?></td>
        </tr>
        <?php endforeach;?>
    </table>
</body>
</html>
