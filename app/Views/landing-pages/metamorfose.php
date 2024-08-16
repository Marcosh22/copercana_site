<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Missão Metamorfose - Copercana</title>
    <link rel="stylesheet" href="<?= base_url("_assets/landing-pages/metamorfose/css/style.css") ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="logo-container">
            <div class="logo">
                <a href="<?= base_url("metamorfose") ?>" style="color: inherit; text-decoration: none;">
                    <img src="<?= base_url("_assets/landing-pages/metamorfose/images/Logo.png"); ?>" alt="Minha Logo" class="logo-image">
                </a>
            </div>
            <div class="light" id="light"></div>
        </div>
    </header>

    <!-- Video -->
    <div class="video-container">
        <video id="videoHeader" class="video-header" autoplay loop muted>
            <source src="<?= base_url("_assets/landing-pages/metamorfose/video/TopSiteMapa.mp4"); ?>" type="video/mp4">
            Seu navegador não suporta o elemento de vídeo.
        </video>
    </div>

    <!-- Menu -->
    <div class="menu">
        <div class="menu_title">
            <h1>Bem-vindo(a), Agente</h1>
        </div>
        <div class="content-container">
            <div class="content-box">
                <button onclick="window.location.href='#informacoesSAP';" class="custom-button">
                    <img src="<?= base_url("_assets/landing-pages/metamorfose/images/BtnInformacoesSAP 2.png"); ?>" alt="Imagem 1" class="button-image">
                </button>
            </div>
            <div class="content-box">
                <button onclick="window.location.href='#manualUso';" class="custom-button">
                    <img src="<?= base_url("_assets/landing-pages/metamorfose/images/BtnManualUso 2.png"); ?>" alt="Imagem 2" class="button-image">
                </button>
            </div>
            <div class="content-box">
                <button onclick="window.location.href='#comoAcessar';" class="custom-button">
                    <img src="<?= base_url("_assets/landing-pages/metamorfose/images/BtnComoAcessar 1.png"); ?>" alt="Imagem 3" class="button-image">
                </button>
            </div>
            <div class="content-box">
                <button onclick="window.location.href='#centralSuporte';" class="custom-button">
                    <img src="<?= base_url("_assets/landing-pages/metamorfose/images/BtnCentralSuporte 1.png"); ?>" alt="Imagem 4" class="button-image">
                </button>
            </div>
        </div>
    </div>

    <!-- Apresentação -->
    <div class="apresentação">
        <p class="texto_1">
            A Missão Metamorfose foi iniciada e a transformação digital já começou na Copercana.
            Com o SAP, estamos integrando mais tecnologia, automação e eficiência aos nossos processos. Enquanto avançamos na implementação, sua missão é identificar e resolver problemas, além de reduzir riscos em seu setor, sempre colaborando em equipe para alcançar nossos objetivos.
            Confira abaixo o relatório completo da missão e esclareça todas as suas dúvidas. Estamos contando com você a cada passo dessa jornada.
        </p>
        <h3 class="Textoapresentacao_titulo">O futuro já chegou!</h3>
        <div id="informacoesSAP">
            <img src="<?= base_url("_assets/landing-pages/metamorfose/images/Separacao01.png"); ?>" alt="Separacao01" class="imagem-ajuste">
        </div>
    </div>

    <!-- Sobre o SAP -->
    <div class="SobreSap">
        <h1 class="SobreSap_Titulo">Sobre o SAP</h1>
        <img src="<?= base_url("_assets/landing-pages/metamorfose/images/TextoMaior01.png"); ?>" alt="textoMaior" class="Tesxte_Maior">
        <img src="<?= base_url("_assets/landing-pages/metamorfose/images/TextoMaior.png"); ?>" alt="texto_Maior" class="Tesxte_Maior1">
    </div>

    <!-- Cronograma -->
    <div class="cronograma">
        <h1 class="cronograma">Cronograma</h1>
        <p class="texto_2">
            Esse cronograma é nossa estratégia detalhada para garantir uma transição suave para o novo sistema SAP. Este plano inclui todas as etapas necessárias para migrar dados e processos do sistema antigo para o novo, garantindo que tudo funcione perfeitamente desde o primeiro dia.
        </p>
        <img src="<?= base_url("_assets/landing-pages/metamorfose/images/Group 2.png"); ?>" alt="local_cronograma" class="local_cronograma1">
    </div>

    <!-- Manual SAP -->
    <div class="cotender_sap">
        <div class="imagem">
            <img src="<?= base_url("_assets/landing-pages/metamorfose/images/Separacao01.png"); ?>" alt="separacao02" class="local_manual_sap">
        </div>
        <div class="titulo">
            <div id="manualUso">
                <h1>Manual de Uso SAP</h1>
            </div>
        </div>
        <div class="texto">
            <p>
                O Manual do SAP é um recurso essencial para todos os agentes. Ele contém instruções detalhadas sobre como utilizar o sistema de forma eficiente, garantindo que você tenha todas as informações necessárias para desempenhar suas funções.
            </p>
            <p>
                Baixe o Manual e Glossário no botão abaixo para ter acesso a todas as informações que você precisa para dominar o sistema.
            </p>
        </div>
        <div class="botoes">
            <div>
                <a href="<?= base_url("_assets/landing-pages/metamorfose/manual/Navegação Básica SAP GUI.pdf"); ?>" target="_blank">
                    <img src="<?= base_url("_assets/landing-pages/metamorfose/images/ButtonsMedium.png"); ?>" alt="Visualizar Manual">
                </a>
            </div>
            <div>
                <h2 class="titulo2">Glossário SAP</h2>
            </div>
            <div class="texto2">
                <p>
                    Glossário SAP é a sua ferramenta de referência para entender os termos e siglas mais importantes do sistema. Confira-os no botão abaixo:
                </p>
            </div>
            <!-- Botão que abrirá o pop-up -->
            <a id="open-popup" href="#">
                <img src="<?= base_url("_assets/landing-pages/metamorfose/images/ButtonsMedium2.png"); ?>" alt="Download Glossário" class="Download1">
            </a>
            <div id="popup" class="popup">
                <div class="popup-content">
                    <span id="close-popup" class="close-popup">&times;</span>
                    <h1 class="titulopopup">Glossário SAP</h1>
                    <img src="<?= base_url("_assets/landing-pages/metamorfose/images/Separacao01.png"); ?>" alt="Glossário SAP" class="popup-image">
                    <ul class="download-menu">
                        <li><a href="<?= base_url("_assets/landing-pages/metamorfose/manual/Projeto CoperSAP - Glossário SAP - BP.pdf"); ?>" target="_blank">Glossário - BP</a></li>
                        <li><a href="<?= base_url("_assets/landing-pages/metamorfose/manual/Projeto CoperSAP - Glossário SAP - CO.pdf"); ?>" target="_blank">Glossário - CO</a></li>
                        <li><a href="<?= base_url("_assets/landing-pages/metamorfose/manual/Projeto CoperSAP - Glossário SAP - CS.pdf"); ?>" target="_blank">Glossário - CS</a></li>
                        <li><a href="<?= base_url("_assets/landing-pages/metamorfose/manual/Projeto CoperSAP - Glossário SAP - EWM e WM.pdf"); ?>" target="_blank">Glossário - EWM e WM</a></li>
                        <li><a href="<?= base_url("_assets/landing-pages/metamorfose/manual/Projeto CoperSAP - Glossário SAP - FI.pdf"); ?>" target="_blank">Glossário - FI</a></li>
                        <li><a href="<?= base_url("_assets/landing-pages/metamorfose/manual/Projeto CoperSAP - Glossário SAP - MM.pdf"); ?>" target="_blank">Glossário - MM</a></li>
                        <li><a href="<?= base_url("_assets/landing-pages/metamorfose/manual/Projeto CoperSAP - Glossário SAP - PM.pdf"); ?>" target="_blank">Glossário - PM</a></li>
                        <li><a href="<?= base_url("_assets/landing-pages/metamorfose/manual/Projeto CoperSAP - Glossário SAP - PP.pdf"); ?>" target="_blank">Glossário - PP</a></li>
                        <li><a href="<?= base_url("_assets/landing-pages/metamorfose/manual/Projeto CoperSAP - Glossário SAP - PS.pdf"); ?>" target="_blank">Glossário - PS</a></li>
                        <li><a href="<?= base_url("_assets/landing-pages/metamorfose/manual/Projeto CoperSAP - Glossário SAP - QM.pdf"); ?>" target="_blank">Glossário - QM</a></li>
                        <li><a href="<?= base_url("_assets/landing-pages/metamorfose/manual/Projeto CoperSAP - Glossário SAP - SD.pdf"); ?>" target="_blank">Glossário - SD</a></li>
                        <li><a href="<?= base_url("_assets/landing-pages/metamorfose/manual/Projeto CoperSAP - Glossário SAP - TM.pdf"); ?>" target="_blank">Glossário - TM</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Como Acessar -->
    <div id="comoAcessar">
        <div class="background-container">
            <div class="como_acessar">
                <h1 class="acessar_titulo">Como Acessar</h1>
                <p class="acessar_texto">
                    Agente, sua chave de acesso é o código exclusivo que permite entrar no sistema SAP.
                    Ela garante que apenas usuários autorizados possam acessar as informações e funcionalidades do sistema, mantendo a segurança e integridade dos dados.
                </p>
                <div class="box_container">
                    <div class="box_acessar">
                        <div class="container">
                            <img src="<?= base_url("_assets/landing-pages/metamorfose/images/Base3.png"); ?>" alt="como_acessar" class="como_acessar1">
                            <div class="text-center">
                                <h4>01</h4>
                                <p>Ao acessar o sistema SAP, você será solicitado a inserir sua chave de acesso.</p>
                            </div>
                        </div>
                    </div>
                    <div class="box_acessar">
                        <div class="container">
                            <img src="<?= base_url("_assets/landing-pages/metamorfose/images/Base3.png"); ?>" alt="como_acessar" class="como_acessar1">
                            <div class="text-center">
                                <h4>02</h4>
                                <p>Digite o código que você recebeu.</p>
                            </div>
                        </div>
                    </div>
                    <div class="box_acessar">
                        <div class="container">
                            <img src="<?= base_url("_assets/landing-pages/metamorfose/images/Base3.png"); ?>" alt="como_acessar" class="como_acessar1">
                            <div class="text-center">
                                <h4>03</h4>
                                <p>Após a validação, você terá acesso ao sistema SAP.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Central de Suporte -->
    <div id="centralSuporte">
        <div class="central_de_suporte">
            <img src="<?= base_url("_assets/landing-pages/metamorfose/images/Separacao01.png"); ?>" alt="central" class="local_central">
            <h1 class="central_titulo">Central de Suporte</h1>
            <p class="central_texto">
                Durante a implementação do sistema SAP, nossa Central de Suporte será sua linha direta para resolver
                qualquer dúvida ou problema que possa surgir. Nossa equipe de especialistas está pronta para fornecer
                todo o suporte necessário para garantir o sucesso da missão.
            </p>
            <h5 class="central_texto2">Em breve, você poderá conferir todos os contatos aqui.</h5>
        </div>    
    </div>

    <!-- Footer -->
    <div class="footer-container">
        <div class="footer-images">
            <img src="<?= base_url("_assets/landing-pages/metamorfose/images/02.png"); ?>" alt="Imagem 02" class="imagem02">
            <img src="<?= base_url("_assets/landing-pages/metamorfose/images/05.png"); ?>" alt="Imagem 03" class="imagem03">
        </div>
        <div class="footer-bottom">
            <p>&copy; ACME Copercana. Todos os direitos reservados</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="<?= base_url("_assets/landing-pages/metamorfose/js/luz.js"); ?>"></script>
    <script src="<?= base_url("_assets/landing-pages/metamorfose/js/PopUp_Glossário.js"); ?>"></script>
</body>
</html>
