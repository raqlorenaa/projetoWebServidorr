<?php

class PaginaAdmin {
    private $usuarios;
    private $eventos;

    public function __construct($usuarios, $eventos) {
        $this->usuarios = $usuarios;
        $this->eventos = $eventos;
    }

    public function render() {
        // Aqui você pode adicionar a lógica para renderizar a página de administração
        // incluindo a criação da tabela e a exibição dos usuários e eventos
    }
}
?>
