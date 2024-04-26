<?php
include "../controller/controller.index.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MM Eventos</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../view/view.index.css">
</head>

<body>
<header style="padding: 10px; text-align: center; position: relative;">
    <img src="logo.jpg" alt="Logotipo" style="max-width: 300px; height: auto;">
    <div class="button-container" style="position: absolute; top: 10px; right: 10px;">
        <?php echo $botao; ?>
        <?php echo $sair; ?> <!-- Adiciona o botão "Sair" -->
    </div>
</header>

    <nav>
        <a href="#sobre">Sobre Nós</a>
        <a href="#servicos">Serviços</a>
        <a href="#portfolio">Portfolio</a>
        <a href="#contato">Contato</a>
    </nav>

    <section id="sobre">
        <!-- Seção Sobre Nós -->
    </section>

    <section id="servicos">
        <!-- Seção Serviços -->
    </section>

    <section id="portfolio">
        <!-- Seção Portfolio -->
    </section>

    <section id="contato">
        <!-- Seção Contato -->
    </section>

    <footer>
        <p>&copy; Desenvolvido por Erasto Rodas e Raquel Lorena</p>
    </footer>

</body>

</html>
