<?php 
session_start();

if (!isset($_SESSION['id']) || $_SESSION['tipo'] !== 'admin') {
    $_SESSION['error_message'] = "Acesso não autorizado. Faça login como administrador para acessar esta página.";
    header("Location: index.php");
    exit();
}

include ('../conexao.php');

if (isset($_GET['action']) && $_GET['action'] === 'remover' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql_remover_usuario = "DELETE FROM usuarios WHERE id = $id";
    $resultado_remover_usuario = $mysqli->query($sql_remover_usuario);
    if ($resultado_remover_usuario) {
        header("Location: view.paginaadm.php");
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
        header("Location: view.paginaadm.php");
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