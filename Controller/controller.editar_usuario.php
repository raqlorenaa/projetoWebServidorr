<?php 
include('../conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $novo_nome = $_POST['novo_nome'];
    $novo_email = $_POST['novo_email'];
    $novo_tipo = $_POST['novo_tipo'];

    if ($novo_tipo == 'admin' || $novo_tipo == 'cliente') {
        $sql_atualizar_usuario = "UPDATE usuarios SET 
                          nome = '$novo_nome', 
                          email = '$novo_email',
                          tipo = '$novo_tipo'
                          WHERE id = $id";
        $resultado_usuario = $mysqli->query($sql_atualizar_usuario);
        if ($resultado_usuario) {
            header("Location: ../paginaadmin.php");
            exit;
        } else {
            echo "Erro ao atualizar usuário.";
        }
    } else {
        echo "Tipo de usuário inválido.";
    }
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql_usuario = "SELECT * FROM usuarios WHERE id = $id";
    $resultado_usuario = $mysqli->query($sql_usuario);
    if ($resultado_usuario->num_rows == 1) {
        $usuario = $resultado_usuario->fetch_assoc();
    } else {
        echo "Usuário não encontrado.";
    }
} else {
    echo "ID do usuário não fornecido.";
}
?>
