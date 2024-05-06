<?php
require_once '../model/sessao.php';
session_start();

class ControllerSessao {
    public function renderizarBotoes() {
        $botao = '';
        if (Sessao::estaLogado()) {
            if ($_SESSION['tipo'] == 'admin') {
                $botao = '<a class="admin-button" href="view.paginaadm.php">Página Admin</a>';
            } else {
                $botao = '<a class="proposta-button" href="../view/view.proposta.html">Enviar Proposta</a>';
            }
        } else {
            $botao = '<a class="login-button" href="../view/view.login.php">Faça o Login para nos enviar um Orçamento</a>';
        }
        return $botao;
    }

    public function renderizarFormularioLogout() {
        $sair = '';
        if (Sessao::estaLogado()) {
            $sair = '<form action="" method="post">
                        <input type="submit" name="logout" value="Sair" class="logout-button">
                    </form>';

            // Verifica se o botão de logout foi pressionado
            if(isset($_POST['logout'])) {
                Sessao::encerrarSessao(); // Encerra a sessão
                header("Location: ../View/index_view.php"); // Redireciona de volta para a página inicial
                exit();
            }
        }
        return $sair;
    }
}
?>
