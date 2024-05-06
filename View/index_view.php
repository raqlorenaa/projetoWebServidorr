<?php
require_once '../controller/sessao_controller.php';

$controllerSessao = new ControllerSessao();

$botoes = $controllerSessao->renderizarBotoes();
$formularioLogout = $controllerSessao->renderizarFormularioLogout();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Página Inicial</title>
</head>
<body>
    <div>
        <?php echo $botoes; ?>
    </div>
    <div>
        <?php echo $formularioLogout; ?>
    </div>
</body>
</html>
