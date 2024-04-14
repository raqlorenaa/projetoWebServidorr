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
<html data-wf-domain="momentos-magicos-eventos.io" data-wf-page="661afabff13e333115fda066"
    data-wf-site="661afabef13e333115fd9fd8" lang="en">

<head>
    <meta charset="utf-8" />
    <title>MM Eventos</title>
    <meta content="Business - Webflow HTML website template" property="og:title" />
    <meta
        content="https://assets-global.website-files.com/5c6eb5400253230156de2bd6/5cdc268dd7274d5c05c6009a_Business%20SEO.jpg"
        property="og:image" />
    <meta content="Business - Webflow HTML website template" property="twitter:title" />
    <meta
        content="https://assets-global.website-files.com/5c6eb5400253230156de2bd6/5cdc268dd7274d5c05c6009a_Business%20SEO.jpg"
        property="twitter:image" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Webflow" name="generator" />
    <link
        href="style1.css"
        rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
    <script
        type="text/javascript">WebFont.load({ google: { families: ["Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic"] } });</script>
    <script
        type="text/javascript">!function (o, c) { var n = c.documentElement, t = " w-mod-"; n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch") }(window, document);</script>
    <link href="https://assets-global.website-files.com/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <link href="https://assets-global.website-files.com/img/webclip.png" rel="apple-touch-icon" />
</head>

<body>
    <div data-collapse="medium" data-animation="default" data-duration="400" data-easing="ease" data-easing2="ease"
        role="banner" class="navigation w-nav">
        <div class="navigation-wrap"><a href="/" aria-current="page" class="logo-link w-nav-brand w--current"><img
                    src="https://assets-global.website-files.com/661afabef13e333115fd9fd8/661afb55ca5426d279ee99b6_M.png"
                    width="108" alt="" class="logo-image" /></a>
            <div class="menu">
                <nav role="navigation" class="navigation-items w-nav-menu"><a href="/about"
                        class="navigation-item w-nav-link">Empresa</a><a href="/projects"
                        class="navigation-item w-nav-link">SERVIÇOS</a><a href="/team"
                        class="navigation-item w-nav-link">fOTOS</a><a href="/contact"
                        class="navigation-item w-nav-link">ConTATO</a></nav>
                <div class="menu-button w-nav-button"><img
                        src="https://assets-global.website-files.com/661afabef13e333115fd9fd8/661afabff13e333115fda08d_menu-icon.png"
                        width="22" alt="" class="menu-icon" /></div>
            </div>
            <a href="paginalogin.php"
                class="button cc-contact-us w-inline-block">
                <div>lOGIN</div>
            </a>
        </div>
    </div>
    <div class="section cc-store-home-wrap">
        <div class="intro-header">
            <div class="intro-content cc-homepage">
                <div class="intro-text">
                    <div class="heading-jumbo">EVENTOS</div>
                    <div class="paragraph-bigger cc-bigger-white-light">Considerada uma das melhores empresas de eventos
                        corporativos em Ponta grossa.<br /></div>
                </div><a  class="  w-inline-block">
                    
                </a>
            </div>
        </div>
        <div class="container">
            <div class="motto-wrap">
                <div class="label cc-light">Transformaremos seu evento....</div>
                <div class="heading-jumbo-small">Faça agora mesmo seu orçamento online conosco<br /></div>
            </div>
            <div class="divider"></div>
            <div class="home-content-wrap">
                <div class="w-layout-grid about-grid">
                    <div id="w-node-_86e64837-0616-515b-4568-76c147234d34-15fda066">
                        <div class="home-section-wrap">
                            <div class="label cc-light">Sobre</div>
                            <h2 class="section-heading">Quem Somos</h2>
                            <p class="paragraph-light">Nulla vel sodales tellus, quis condimentum enim. Nunc porttitor
                                venenatis feugiat. Etiam quis faucibus erat, non accumsan leo. Aliquam erat volutpat.
                                Vestibulum ac faucibus eros. Cras ullamcorper gravida tellus ut consequat.</p>
                        </div>
                    </div><img
                        src="https://assets-global.website-files.com/661afabef13e333115fd9fd8/661afabff13e333115fda090_placeholder%203.svg"
                        id="w-node-_86e64837-0616-515b-4568-76c147234d3f-15fda066" alt="" />
                </div>
            </div>
        </div>
    </div>
    <section></section>
    <section>
        <div class="w-layout-grid grid-2">
            <h2 id="w-node-f221b6e9-1f6b-ebd7-c9f4-f194ec9ebc36-15fda066" class="heading">Missão</h2>
            <h2 id="w-node-_66a4415e-5c70-ef06-d61c-94efb9ef9f56-15fda066" class="heading">Visão</h2>
            <h2 id="w-node-d13e08bb-bb3c-4a09-d77c-042db2e1988c-15fda066" class="heading">Valores</h2>
            <p id="w-node-_4338af9a-2243-b1df-0809-1bba866d9038-15fda066" class="paragraph">Fazer parte dos melhores
                momentos do seu dia.</p>
            <p id="w-node-f3cbc856-6ea2-a7ac-0167-85d3a87ea209-15fda066" class="paragraph-3">Justiça, coragem,
                compaixão, cortesia, verdade, honra e lealdade.</p>
            <p id="w-node-fb9bf876-a68d-f031-fc91-62d6c6228f23-15fda066" class="paragraph-2">Ser uma empresa referencia
                em Eventos e Treinamentos corporativos no Brasil.</p>
        </div>
        <br>
        <br>
        <br>
        <br>
    </section>
    <section></section>
    <section class="section-2">
        <div class="w-layout-grid grid-3"><img
                src="https://assets-global.website-files.com/661afabef13e333115fd9fd8/661b0c8bca5426d279fc9c02_mulher-em-mesa-executiva-realizando-atendimento-vi.webp"
                loading="lazy" width="Auto" sizes="(max-width: 479px) 100vw, 400px" alt=""
                srcset="https://assets-global.website-files.com/661afabef13e333115fd9fd8/661b0c8bca5426d279fc9c02_mulher-em-mesa-executiva-realizando-atendimento-vi-p-500.webp 500w, https://assets-global.website-files.com/661afabef13e333115fd9fd8/661b0c8bca5426d279fc9c02_mulher-em-mesa-executiva-realizando-atendimento-vi-p-800.webp 800w, https://assets-global.website-files.com/661afabef13e333115fd9fd8/661b0c8bca5426d279fc9c02_mulher-em-mesa-executiva-realizando-atendimento-vi.webp 1000w"
                class="image" /><img
                src="https://assets-global.website-files.com/661afabef13e333115fd9fd8/661b0a908bda4a590a2dc8ad_Ponta_Grossa_2019.jpg"
                loading="lazy" width="131" id="w-node-_4642168e-1c41-aed8-d603-cb9100c7e3a3-15fda066" alt=""
                srcset="https://assets-global.website-files.com/661afabef13e333115fd9fd8/661b0a908bda4a590a2dc8ad_Ponta_Grossa_2019-p-500.jpg 500w, https://assets-global.website-files.com/661afabef13e333115fd9fd8/661b0a908bda4a590a2dc8ad_Ponta_Grossa_2019-p-800.jpg 800w, https://assets-global.website-files.com/661afabef13e333115fd9fd8/661b0a908bda4a590a2dc8ad_Ponta_Grossa_2019-p-1080.jpg 1080w, https://assets-global.website-files.com/661afabef13e333115fd9fd8/661b0a908bda4a590a2dc8ad_Ponta_Grossa_2019.jpg 1200w"
                sizes="(max-width: 479px) 100vw, 400px" class="image" /><img
                src="https://assets-global.website-files.com/661afabef13e333115fd9fd8/661b0c8bca5426d279fc9c02_mulher-em-mesa-executiva-realizando-atendimento-vi.webp"
                loading="lazy" width="131" id="w-node-_04ba5733-524a-ae9c-41cc-69edc9db9f2f-15fda066" alt=""
                srcset="https://assets-global.website-files.com/661afabef13e333115fd9fd8/661b0c8bca5426d279fc9c02_mulher-em-mesa-executiva-realizando-atendimento-vi-p-500.webp 500w, https://assets-global.website-files.com/661afabef13e333115fd9fd8/661b0c8bca5426d279fc9c02_mulher-em-mesa-executiva-realizando-atendimento-vi-p-800.webp 800w, https://assets-global.website-files.com/661afabef13e333115fd9fd8/661b0c8bca5426d279fc9c02_mulher-em-mesa-executiva-realizando-atendimento-vi.webp 1000w"
                sizes="(max-width: 479px) 100vw, 400px" class="image" />
            <p id="w-node-_69cafbb0-a4f1-1e3a-cb63-0d1d6d69fe38-15fda066"><strong>AMBIENTES MODERNOS
                </strong><br />Salas, auditórios e espaços multiuso</p>
            <p id="w-node-f06f6a67-1e1b-1206-abbf-bf7b75e8a8a8-15fda066"><strong>LOCALIZAÇÃO
                    PRIVILEGIADA</strong><br />Centro de Ponta Grossa <br /></p>
            <p id="w-node-a9ffde14-716d-c106-82c9-5af115f19282-15fda066"><strong>ATENDIMENTO DE
                    QUALIDADE</strong><br />Solicite-nos um orçamento...<br /></p>
        </div>
    </section>
    <div class="section">
        <br>
        <br>
        <br>
        <br>
        <section> </section>
        <section class="section-3">
            <div class="w-layout-grid grid-4">
                <p id="w-node-_87368b26-1c92-5341-e38d-8de24872beca-15fda066" class="paragraph-6"><strong
                        class="bold-text-2">Solicite<br />orçamento<br />online</strong><br /></p>
                <ul id="w-node-eea85589-b528-26ec-7e32-b3e668a6ee26-15fda066" role="list" class="list w-list-unstyled">
                    <li class="list-item">ORÇAMENTO ONLINE</li>
                    <li class="list-item-2">ENVIAR WHATSAPP</li>
                    <li class="list-item-3">ENVIAR EMAIL</li>
                </ul>
            </div>
        </section>
        <div class="container"></div>
    </div>
    <div class="section">
        <div class="footer-wrap"><a  target="_blank" class="webflow-link w-inline-block"><img
                    src="https://assets-global.website-files.com/661afabef13e333115fd9fd8/661afabff13e333115fda09b_webflow-w-small%402x.png"
                    width="15" alt="" class="webflow-logo-tiny" />
                <div class="paragraph-tiny">Desenvolvido por Raquel Lorena e Erasto Rodas</div>
            </a></div>
    </div>
    <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=661afabef13e333115fd9fd8"
        type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
    <script src="script.js"
        type="text/javascript"></script>
</body>

</html>