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
        // Mudança para usar URL amigável
        $botao = '<a class="admin-button" href="/projetoWebServidorr/paginadeadmin">Página Admin</a>';
    } else {
        // Mudança para usar URL amigável
        $botao = '<a class="proposta-button" href="/projetoWebServidorr/paginadeproposta">Enviar Proposta</a>';
    }
} else {
    // Mudança para usar URL amigável
    $botao = '<a class="login-button" href="/projetoWebServidorr/paginadelogin">Faça o Login para nos enviar um Orçamento!</a>';
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
                header("Location: /projetoWebServidorr/index.php"); // Caminho absoluto
                exit();
            }
        }
        return $sair;
    }
}