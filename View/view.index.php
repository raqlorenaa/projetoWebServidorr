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
    <h2>Sobre Nós</h2>
        <p>Somos uma equipe apaixonada por criar experiências memoráveis ​​em eventos corporativos. Com anos de experiência no setor, dedicamo-nos a superar as expectativas de nossos clientes, proporcionando eventos que deixam uma impressão duradoura.</p>
        <p>Nossa missão é oferecer soluções criativas e personalizadas que atendam às necessidades exclusivas de cada cliente. Valorizamos a integridade, a inovação e a excelência em tudo o que fazemos.</p>
    </section>

    <section id="servicos">
    <h2>Serviços</h2>
        <p>Oferecemos uma ampla gama de serviços personalizados para atender às suas necessidades específicas. Nossos serviços incluem:</p>
        <ul style="list-style: none; padding-left: 0;">
            <li><strong>Eventos de Lançamento:</strong> Desde grandes lançamentos de produtos até eventos exclusivos para a imprensa, ajudamos você a impressionar seus convidados.</li>
            <li><strong>Conferências e Seminários:</strong> Organizamos eventos educacionais e inspiradores que promovem o aprendizado e a colaboração.</li>
            <li><strong>Eventos de Networking:</strong> Criamos ambientes propícios para conectar pessoas e promover relacionamentos profissionais.</li>
            <li><strong>Workshops e Treinamentos:</strong> Desenvolvemos programas de treinamento sob medida para capacitar sua equipe e alcançar seus objetivos empresariais.</li>
            <li><strong>Serviços de Catering:</strong> Parcerias com os melhores fornecedores para oferecer uma experiência gastronômica excepcional em seus eventos.</li>
            <li><strong>Gestão de Logística:</strong> Cuidamos de todos os detalhes, desde a reserva de locais até a coordenação de transporte e hospedagem, para garantir que seu evento seja um sucesso.</li>
        </ul>
    </section>

    <section id="portfolio">
    <h2>Portfolio</h2>
        <p>Confira alguns dos eventos corporativos que organizamos:</p>
        <div class="gallery">
            <img src="GettyImages-858790856.jpg" alt="Evento 1" class="event-image">
            <img src="producao-de-eventos.jpg" alt="Evento 2" class="event-image">
            <img src="sEGURO-eVENTOS-1.webp" alt="Evento 3" class="event-image">
        </div>  
    </section>

    <section id="contato">
    <h2>Contato</h2>
        <p>Entre em contato conosco para discutir suas necessidades de evento corporativo. Estamos aqui para ajudar!</p>
        <div class="contact-form">
            <form action="processar_formulario.php" method="post">
                <input type="text" name="nome" placeholder="Seu Nome" required><br>
                <input type="email" name="email" placeholder="Seu Email" required><br>
                <textarea name="mensagem" placeholder="Sua Mensagem" rows="4" required></textarea><br>
                <input type="submit" value="Enviar Mensagem">
            </form>
        </div>>
    </section>

    <footer>
        <p>&copy; Desenvolvido por Erasto Rodas e Raquel Lorena</p>
    </footer>

</body>

</html>
