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
                <input type="submit" name="logout" value="Sair">
             </form>';
} else {
    $botao = '<a class="login-button" href="paginalogin.php"><img src="kisspng-login-computer-icons-download-avatar-icon-5b2cfbf8e8da45.3511932815296747449538.jpg" alt="Login"> Login</a>';
    // Se não estiver logado, a variável $sair não é definida
    $sair = '';
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav {
            background-color: #444;
            padding: 10px;
            text-align: center;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }

        section {
            padding: 20px;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        .login-button, .proposta-button, .admin-button {
            background-color: #fff;
            color: #333;
            border: none;
            cursor: pointer;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 25px;
            transition: background-color 0.3s ease;
            display: flex;
            align-items: center;
            text-decoration: none;
        }

        .login-button:hover, .proposta-button:hover, .admin-button:hover {
            background-color: #ddd;
        }

        .login-button img {
            width: 20px;
            margin-right: 5px;
        }

        /* Estilizando o botão "Sair" */
        .logout-button {
            background-color: #f44336;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            text-decoration: none;
        }

        .logout-button:hover {
            background-color: #da190b;
        }

        /* Estilizando o contêiner para os botões */
        .button-container {
            display: flex;
            align-items: center;
        }
    </style>
</head>

<body>
    <header>
        <h1>Eventos</h1>
        <div class="button-container">
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
        <p>Somos uma empresa especializada em organizar eventos.</p>
    </section>
    <section id="servicos">
        <h2>Serviços</h2>
        <ul>
            <li>Casamentos</li>
            <li>Aniversários</li>
            <li>Eventos Corporativos</li>
            <li>Festas Temáticas</li>
        </ul>
    </section>
    <section id="portfolio">
        <h2>Portfolio</h2>
        <div class="gallery">
            <img src="Santos_Logo.png" alt="Evento 1">
            <img src="Asset-2.jpg" alt="Evento 2">
            <img src="download.jpg" alt="Evento 3">
        </div>
    </section>
    <section id="contato">
        <h2>Contato</h2>
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
        <p>&copy; Todos os direitos reservados.</p>
    </footer>

</body>

</html>
