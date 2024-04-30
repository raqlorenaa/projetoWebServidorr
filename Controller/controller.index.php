<?php
session_start();

// Verifica se o botão de logout foi pressionado
if(isset($_POST['logout'])) {
    session_unset(); // Limpa todas as variáveis de sessão
    session_destroy(); // Destrói a sessão
    header("Location: ../View/view.index.php"); // Redireciona de volta para a página inicial
    exit();
}

// Definir variáveis $botao e $sair aqui
if(isset($_SESSION['id'])) {
    if($_SESSION['tipo'] == 'admin') {
        $botao = '<a class="admin-button" href="view.paginaadm.php">Página Admin</a>';
    } else {
        $botao = '<a class="proposta-button" href="../view/view.proposta.html">Enviar Proposta</a>';
    }
    // Adiciona o botão "Sair"
    $sair = '<form action="" method="post">
                <input type="submit" name="logout" value="Sair" class="logout-button">
             </form>';
} else {
    $botao = '<a class="login-button" href="../view/view.login.php">Faça o Login para nos enviar um Orçamento</a>';
    // Se não estiver logado, a variável $sair não é definida
    $sair = '';
}
?>
