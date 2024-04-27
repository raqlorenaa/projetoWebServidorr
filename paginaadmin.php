<?php 
session_start();

if (!isset($_SESSION['id']) || $_SESSION['tipo'] !== 'admin') {
    $_SESSION['error_message'] = "Acesso não autorizado. Faça login como administrador para acessar esta página.";
    header("Location: index.php");
    exit();
}

include ('conexao.php');

if (isset($_GET['action']) && $_GET['action'] === 'remover' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql_remover_usuario = "DELETE FROM usuarios WHERE id = $id";
    $resultado_remover_usuario = $mysqli->query($sql_remover_usuario);
    if ($resultado_remover_usuario) {
        header("Location: paginaadmin.php");
        exit;
    } else {
        echo "Erro ao remover usuário.";
    }
}

if (isset($_GET['action_evento']) && $_GET['action_evento'] === 'remover_evento' && isset($_GET['idevento'])) {
    $idevento = $_GET['idevento'];
    $sql_remover_evento = "DELETE FROM proposta_evento WHERE idevento = $idevento";
    $resultado_remover_evento = $mysqli->query($sql_remover_evento);
    if ($resultado_remover_evento) {
        header("Location: paginaadmin.php");
        exit;
    } else {
        echo "Erro ao remover evento.";
    }
}


$sql_clientes_count_query = "SELECT COUNT(*) AS c FROM usuarios";
$sql_clientes_count_query_exec = $mysqli->query($sql_clientes_count_query) or die($mysqli->error);
$sql_clientes_count = $sql_clientes_count_query_exec->fetch_assoc();
$clientes_count = $sql_clientes_count['c'];

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$limit = 50;
$offset = ($page - 1) * $limit;
$page_number = ceil($clientes_count / $limit);


$sql_clientes_query = "SELECT * FROM usuarios ORDER BY nome ASC LIMIT $limit OFFSET $offset";
$sql_clientes_query_exec = $mysqli->query($sql_clientes_query) or die($mysqli->error);


$sql_eventos_count_query = "SELECT COUNT(*) AS c FROM proposta_evento";
$sql_eventos_count_query_exec = $mysqli->query($sql_eventos_count_query) or die($mysqli->error);
$sql_eventos_count = $sql_eventos_count_query_exec->fetch_assoc();
$eventos_count = $sql_eventos_count['c'];

$page_evento = isset($_GET['page_evento']) ? intval($_GET['page_evento']) : 1;
$limit_evento = 50;
$offset_evento = ($page_evento - 1) * $limit_evento;
$page_number_evento = ceil($eventos_count / $limit_evento);


$sql_eventos_query = "SELECT * FROM proposta_evento ORDER BY data_evento ASC LIMIT $limit_evento OFFSET $offset_evento";
$sql_eventos_query_exec = $mysqli->query($sql_eventos_query) or die($mysqli->error);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Administração</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .pagination {
            margin-top: 20px;
            text-align: center;
        }

        .pagination a {
            color: black;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color .3s;
            border: 1px solid #ddd;
        }

        .pagination a.active {
            background-color: #4CAF50;
            color: white;
            border: 1px solid #4CAF50;
        }

        .pagination a:hover:not(.active) {
            background-color: #ddd;
        }
    </style>
</head>

<body>
    <header>
        <h1>Usuários (<?= $clientes_count; ?>)</h1>
    </header>

    <div class="container">
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Username</th>
                <th>Tipo</th>
                <th>Ação</th>
            </tr>
            <?php while ($clientes = $sql_clientes_query_exec->fetch_assoc()) { ?>
                <tr>
                    <td><?= $clientes['id']; ?></td>
                    <td><?= $clientes['nome']; ?></td>
                    <td><?= $clientes['email']; ?></td>
                    <td><?= $clientes['username']; ?></td>
                    <td><?= $clientes['tipo']; ?></td>
                    <td>
                        <a href="editar_usuario.php?id=<?= $clientes['id']; ?>">Editar</a>
                        <a href="paginaadmin.php?action=remover&id=<?= $clientes['id']; ?>" onclick="return confirm('Tem certeza que deseja remover este usuário?')">Remover</a>
                    </td>
                </tr>
            <?php } ?>
        </table> 

        <div class="pagination">
            
        </div>
    </div>

    <header>
        <h1>Eventos (<?= $eventos_count; ?>)</h1>
    </header>

    <div class="container">
        <table>
            <tr>
                <th>ID</th>
                <th>Data do Evento</th>
                <th>Descrição do Evento</th>
                <th>ID do Evento</th>
                <th>Informações de Contato</th>
                <th>Local do Evento</th>
                <th>Nome do Evento</th>
                <th>Status Proposta</th>
                <th>Ação</th>
            </tr>
            <?php while ($eventos = $sql_eventos_query_exec->fetch_assoc()) { ?>
                <tr>
                    <td><?= $eventos['idevento']; ?></td>
                    <td><?= $eventos['data_evento']; ?></td>
                    <td><?= $eventos['desc_evento']; ?></td>
                    <td><?= $eventos['idevento']; ?></td>
                    <td><?= $eventos['info_contato']; ?></td>
                    <td><?= $eventos['local_evento']; ?></td>
                    <td><?= $eventos['nome_evento']; ?></td>
                    <td><?= $eventos['status_proposta']; ?></td>
                    <td>
                        <a href="editar_evento.php?idevento=<?= $eventos['idevento']; ?>">Editar</a>
                        <a href="paginaadmin.php?action_evento=remover_evento&idevento=<?= $eventos['idevento']; ?>" onclick="return confirm('Tem certeza que deseja remover este evento?')">Remover</a>
                    </td>
                </tr>
            <?php } ?>
        </table> 

        <div class="pagination">
            
        </div>
    </div>

    <footer>
        <p>&copy; Todos os direitos reservados.</p>
    </footer>
</body>

</html>
