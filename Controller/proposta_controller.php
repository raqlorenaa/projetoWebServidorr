<?php
include ('../conexao.php');
include ('../model/proposta.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $model = new Proposta($mysqli);

    $nome_evento = $_POST['nome'];
    $desc_evento = $_POST['descricao'];
    $data_evento = $_POST['data'];
    $local_evento = $_POST['local'];
    $info_contato = $_POST['contato'];

    $mensagem = $model->enviarProposta($nome_evento, $desc_evento, $data_evento, $local_evento, $info_contato);
    echo $mensagem;
} else {
    header("Location: proposta_view.html");
    exit;
}
?>
