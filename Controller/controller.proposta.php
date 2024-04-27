<?php
include ('../conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($mysqli->connect_error) {
        die("Erro na conexão com o banco de dados: " . $mysqli->connect_error);
    }

    $nome_evento = $_POST['nome'];
    $desc_evento = $_POST['descricao'];
    $data_evento = $_POST['data'];
    $local_evento = $_POST['local'];
    $info_contato = $_POST['contato'];

    $stmt = $mysqli->prepare("INSERT INTO proposta_evento (nome_evento, desc_evento, data_evento, local_evento, info_contato) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nome_evento, $desc_evento, $data_evento, $local_evento, $info_contato);

    if ($stmt->execute()) {
        echo "Proposta de evento enviada com sucesso!";
    } else {
        echo "Erro ao enviar proposta de evento: " . $stmt->error;
    }

    $stmt->close();
    $mysqli->close();

} else {
    header("Location: paginadeproposta.html");
    exit;
}
?>
