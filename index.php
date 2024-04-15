
<?php
session_start();

// Verifica se o botão de logout foi pressionado
if(isset($_POST['logout'])) {
    session_unset(); // Limpa todas as variáveis de sessão
    session_destroy(); // Destrói a sessão
    header("Location: index.php"); // Redireciona de volta para a página inicial
    exit();
}

if(isset($_SESSION['id'])) {
    if($_SESSION['tipo'] == 'admin') {
        $botao = '<a class="admin-button" href="paginaadmin.php">Página Admin</a>';
    } else {
        $botao = '<a class="proposta-button" href="paginausuario.html">Enviar Proposta</a>';
    }
    // Adiciona o botão "Sair"
    $sair = '<form action="" method="post">
                <input type="submit" name="logout" value="Sair" class="logout-button">
             </form>';
} else {
    $botao = '<a class="login-button" href="paginalogin.php">Faça o Login para nos enviar um Orçamento</a>';
    // Se não estiver logado, a variável $sair não é definida
    $sair = '';
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MM Eventos</title>
    
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #fff;
            color: #333;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #000;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        nav {
            background-color: #000;
            padding: 10px;
            text-align: center;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
            font-family: 'Montserrat', sans-serif;
        }

        section {
            padding: 50px 20px;
            text-align: center;
        }

        footer {
            background-color: #000;
            color: #fff;
            text-align: center;
            padding: 20px;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        .login-button,
        .proposta-button,
        .admin-button,
        .logout-button {
            background-color: #fff;
            color: #000;
            border: none;
            cursor: pointer;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 25px;
            transition: background-color 0.3s ease;
            text-decoration: none;
            font-family: 'Roboto', sans-serif;
        }

        .login-button:hover,
        .proposta-button:hover,
        .admin-button:hover,
        .logout-button:hover {
            background-color: #f2f2f2;
        }

        .button-container {
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }

        /* Estilizando o formulário de contato */
        .contact-form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .contact-form input,
        .contact-form textarea,
        .contact-form input[type="submit"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
            font-family: 'Roboto', sans-serif;
        }

        .contact-form input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .contact-form input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .contact-form input:focus,
        .contact-form textarea:focus {
            outline: none;
            border-color: #007bff;
        }

        /* Estilizando o cabeçalho */
        h1 {
            font-family: 'Montserrat', sans-serif;
            font-size: 36px;
            margin-bottom: 20px;
        }

        h2 {
            font-family: 'Montserrat', sans-serif;
            font-size: 24px;
            margin-bottom: 10px;
        }

        /* Estilizando o rodapé */
        footer p {
            margin: 0;
        }

        #container-servicos {
            display: flex;
            justify-content: center;
        }

        /* Estilizando a galeria de imagens */
        .gallery {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .gallery img {
            width: 300px;
            height: 300px; /* Tornando as imagens quadradas */
            margin-bottom: 20px;
            border-radius: 0; /* Removendo a borda arredondada */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

    </style>
</head>

<body>
<header style="padding: 10px; text-align: center; position: relative;">
    <img src="logo.png" alt="Logotipo" style="max-width: 300px; height: auto;">
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
        </div>
    </section>

    <footer>
        <p>&copy; Desenvolvido por Erasto Rodas e Raquel Lorena</p>
    </footer>

</body>

</html>
