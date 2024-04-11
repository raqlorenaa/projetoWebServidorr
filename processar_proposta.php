<?php
$host = 'localhost';
$usuario = 'root';
$senha = '';
$bancoDeDados = 'phpteste';

$conexao = new mysqli($host, $usuario, $senha, $bancoDeDados);

if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $data = $_POST["data"];
    $local = $_POST["local"];
    $contato = $_POST["contato"];

    $sql = "INSERT INTO proposta_evento (nome_evento, desc_evento, data_evento, local_evento, info_contato) VALUES (?, ?, ?, ?, ?)";

    $stmt = $conexao->prepare($sql);

    if ($stmt === false) {
        die("Erro ao preparar a declaração: " . $conexao->error);
    }

    $stmt->bind_param("sssss", $nome, $descricao, $data, $local, $contato);

    $resultado = $stmt->execute();

    if ($resultado === false) {
        die("Erro ao executar a declaração: " . $stmt->error);
    }

    $stmt->close();

    $conexao->close();

    echo "<h2>Sucesso!</h2>";
    echo "<p>A proposta de evento foi enviada com sucesso.</p>";
} else {
    echo "<p>Nenhum dado recebido. Por favor, envie o formulário.</p>";
}
?>
