<?php 
include('../conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idevento'])) {
    $idevento = $_POST['idevento'];
    $nova_data_evento = $_POST['nova_data_evento'];
    $nova_desc_evento = $_POST['nova_desc_evento'];
    $novo_idevento = $_POST['novo_idevento'];
    $nova_info_contato = $_POST['nova_info_contato'];
    $novo_local_evento = $_POST['novo_local_evento'];
    $novo_nome_evento = $_POST['novo_nome_evento'];
    $novo_status_proposta = $_POST['novo_status_proposta'];

    $sql_atualizar_evento = "UPDATE proposta_evento SET 
                            data_evento = '$nova_data_evento', 
                            desc_evento = '$nova_desc_evento', 
                            idevento = '$novo_idevento', 
                            info_contato = '$nova_info_contato', 
                            local_evento = '$novo_local_evento', 
                            nome_evento = '$novo_nome_evento',
                            status_proposta = '$novo_status_proposta' 
                            WHERE idevento = $idevento";

    $resultado_evento = $mysqli->query($sql_atualizar_evento);
    if ($resultado_evento) {
        header("Location: ../paginaadmin.php");
        exit;
    } else {
        echo "Erro ao atualizar evento.";
    }
}

if (isset($_GET['idevento'])) {
    $idevento = $_GET['idevento'];
    $sql_evento = "SELECT * FROM proposta_evento WHERE idevento = $idevento";
    $resultado_evento = $mysqli->query($sql_evento);
    if ($resultado_evento->num_rows == 1) {
        $evento = $resultado_evento->fetch_assoc();
    } else {
        echo "Evento não encontrado.";
    }
} else {
    $evento = [];
    echo "ID do evento não fornecido.";
}
?>

