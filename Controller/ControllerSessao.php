<?php

namespace App\Controller;

use App\Model\Sessao;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../conexao.php';

class ControllerSessao
{
    public function renderizarBotoes()
    {
        $botao = '';
        if (Sessao::estaLogado()) {
            if ($_SESSION['tipo'] == 'admin') {
                $botao = '<a class="admin-button" href="../view/view.paginaadm.php">Página Admin</a>';
            } else {
                $botao = '<a class="proposta-button" href="../view/proposta_view.html">Enviar Proposta</a>';
            }
        } else {
            $botao = '<a class="login-button" href="../view/login_view.html">Faça o Login para nos enviar um Orçamento!</a>';
        }
        return $botao;
    }

    public function renderizarFormularioLogout()
    {
        $sair = '';
        if (Sessao::estaLogado()) {
            $sair = '<form action="" method="post"> <input type="submit" name="logout" value="Sair" class="logout-button"> </form>';
            // Verifica se o botão de logout foi pressionado
            if (isset($_POST['logout'])) {
                Sessao::encerrarSessao();
                header("Location: ../View/index_view.php"); // Redireciona de volta para a página inicial
                exit();
            }
        }
        return $sair;
    }
}