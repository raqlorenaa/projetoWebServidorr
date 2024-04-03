<?php
// Arquivo: test.php

// Função de soma simples
function soma($a, $b) {
    return $a + $b;
}

// Teste da função soma
function test_soma() {
    $resultado = soma(2, 3);
    if ($resultado == 5) {
        echo "Teste de soma bem-sucedido!\n";
    } else {
        echo "Teste de soma falhou. O resultado foi: $resultado\n";
    }
}

// Testar a função
test_soma();
?>
