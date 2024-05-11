<?php
namespace App\Model;
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../conexao.php';
class Sessao {
    public static function iniciarSessao() {
        session_start();
    }

    public static function encerrarSessao() {
        session_unset();
        session_destroy();
    }

    public static function estaLogado() {
        return isset($_SESSION['id']);
    }

    public static function isAdmin() {
        return (self::estaLogado() && $_SESSION['tipo'] == 'admin');
    }
}
?>
