    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php if(isset($seo) && isset($seo['title'])) { ?>
        <title><?= $seo['title'] ?></title>
        <?php } ?>
        <?php if(isset($seo) && isset($seo['description'])) { ?>
        <meta name="description" content="<?= $seo['description'] ?>">
        <?php } ?>
        <?php if(isset($seo) && isset($seo['keywords'])) { ?>
        <meta name="keywords" content="<?= $seo['keywords'] ?>">
        <?php } ?>
        <?php if(isset($seo) && isset($seo['robots'])) { ?>
        <meta name="robots" content="<?= $seo['robots'] ?>">
        <?php } ?>
        <?php if(isset($seo) && isset($seo['canonical'])) { ?>
        <link rel="canonical" href="<?= $seo['canonical'] ?>">
        <?php } ?>
        <meta property="og:locale" content="pt_BR">
        <?php if(isset($seo) && isset($seo['type'])) { ?>
        <meta property="og:type" content="<?= $seo['type'] ?>">
        <?php } ?>
        <?php if(isset($seo) && isset($seo['title'])) { ?>
        <meta property="og:title" content="<?= $seo['title'] ?>">
        <?php } ?>
        <?php if(isset($seo) && isset($seo['description'])) { ?>
        <meta property="og:description" content="<?= $seo['description'] ?>">
        <?php } ?>
        <?php if(isset($seo) && isset($seo['canonical'])) { ?>
        <meta property="og:url" content="<?= $seo['canonical'] ?>">
        <?php } ?>
        <meta property="og:site_name" content="Agronegócios Copercana">
        <meta property="og:locale" content="pt_BR">
        <?php if(isset($seo) && isset($seo['share_thumb'])) { ?>
        <meta property="og:image" content="<?= $seo['share_thumb'] ?>">
        <?php } ?>
        <?php if(isset($seo) && isset($seo['publisher'])) { ?>
        <meta property="article:publisher" content="<?= $seo['publisher'] ?>">
        <?php } ?>

        <link rel="apple-touch-icon" sizes="57x57" href="<?= base_url('icons/apple-icon-57x57.png'); ?>">
        <link rel="apple-touch-icon" sizes="60x60" href="<?= base_url('icons/apple-icon-60x60.png'); ?>">
        <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url('icons/apple-icon-72x72.png'); ?>">
        <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('icons/apple-icon-76x76.png'); ?>">
        <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url('icons/apple-icon-114x114.png'); ?>">
        <link rel="apple-touch-icon" sizes="120x120" href="<?= base_url('icons/apple-icon-120x120.png'); ?>">
        <link rel="apple-touch-icon" sizes="144x144" href="<?= base_url('icons/apple-icon-144x144.png'); ?>">
        <link rel="apple-touch-icon" sizes="152x152" href="<?= base_url('icons/apple-icon-152x152.png'); ?>">
        <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('icons/apple-icon-180x180.png'); ?>">
        <link rel="icon" type="image/png" sizes="192x192" href="<?= base_url('icons/android-icon-192x192.png'); ?>">
        <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('icons/favicon-32x32.png'); ?>">
        <link rel="icon" type="image/png" sizes="96x96" href="<?= base_url('icons/favicon-96x96.png'); ?>">
        <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('icons/favicon-16x16.png'); ?>">
        <link rel="manifest" href="<?= base_url('icons/manifest.json'); ?>">
        <meta name="msapplication-TileColor" content="#005422">
        <meta name="msapplication-TileImage" content="<?= base_url('icons/ms-icon-144x144.png'); ?>">
        <meta name="theme-color" content="#005422">
        <link rel="stylesheet" href="<?= base_url("_assets/css/bootstrap.min.css") ?>">
        <link rel="stylesheet"
            href="<?= base_url("_assets/css/styles.css") ?>?v=<?=filemtime("_assets/css/styles.css")?>">

        <?php if(isset($header_dependencies)) {
        foreach($header_dependencies as $dependency) {
            echo $dependency;
        }
    }  ?>

        <?php if(isset($general) && isset($general->head_html) && !empty($general->head_html)) { ?>
        <?= $general->head_html; ?>
        <?php } ?>
    </head>

    <body id="page-<?= $page ?>">
        <?php if(isset($general) && isset($general->body_html) && !empty($general->body_html)) { ?>
        <?= $general->body_html; ?>
        <?php } ?>

        <?php if(!isset($hide_header) || $hide_header === false) { ?>

        <div class="acessibility-bar">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex justify-content-end">
                        <button class="acessibility__button" data-toggle="modal" data-target="#fontResizeModal">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 900.38 794.69" width="21" height="19"><defs><clipPath id="font-resize-svg-clip-path"><rect class="font-resize-svg-1" width="900.39" height="794.69"/></clipPath></defs><title>Font Resize</title><g id="Camada_2" data-name="Camada 2"><g id="Camada_1-2" data-name="Camada 1"><g class="font-resize-svg-2"><path class="font-resize-svg-3" d="M477.2,542.92A270,270,0,0,1,263.53,439.08C171.1,321.35,191.69,150.37,309.42,58a271.45,271.45,0,0,1,437.13,246,271.45,271.45,0,0,1-269.35,239M476.88,65a204.29,204.29,0,0,0-127.3,44.07c-89.53,70.28-105.18,200.3-34.9,289.82A206.41,206.41,0,1,0,476.88,65"/><path class="font-resize-svg-3" d="M808.36,775,683.49,611.35A51.69,51.69,0,0,1,692.2,539h0a51.69,51.69,0,0,1,72.37,8.71L889.44,711.38a51.69,51.69,0,0,1-8.71,72.37h0A51.7,51.7,0,0,1,808.36,775"/><path class="font-resize-svg-3" d="M644.3,559.05l-20.59-26.24a2.53,2.53,0,0,1,.43-3.55l75.94-59.61a2.54,2.54,0,0,1,3.55.42l20.59,26.24a2.53,2.53,0,0,1-.43,3.55l-75.94,59.61a2.54,2.54,0,0,1-3.55-.42"/><path class="font-resize-svg-3" d="M437.26,321.67,408,410.43H370.27l95.88-282.18h44L606.4,410.43H567.46l-30.14-88.76Zm92.53-28.47L502.15,212c-6.28-18.42-10.46-35.17-14.65-51.49h-.84c-4.18,16.74-8.79,33.91-14.23,51.07L444.8,293.2Z"/><path class="font-resize-svg-3" d="M143.19,521.11l-18.74,56.77h-24.1l61.32-180.49h28.12l61.59,180.49h-24.9L207.2,521.11Zm59.19-18.21L184.7,451c-4-11.78-6.69-22.49-9.37-32.94h-.54c-2.68,10.72-5.62,21.69-9.1,32.67L148,502.9Z"/><path class="font-resize-svg-3" d="M28.47,671.4,16,709.11H0L40.74,589.19H59.43l40.92,119.92H83.8L71,671.4Zm39.32-12.1L56.05,624.78c-2.67-7.83-4.45-14.95-6.23-21.89h-.36c-1.78,7.12-3.73,14.42-6.05,21.71L31.67,659.3Z"/></g></g></g></svg>
                        </button>
                        <div vw class="acessibility__button enabled">
                            <div vw-access-button class="active"></div>
                        </div>
                        <button class="acessibility__button" id="tts-button">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 797.17 801.13" width="19" height="19"><defs><clipPath id="clip-path" transform="translate(0 0)"><rect class="tts-svg-1" width="797.17" height="801.13"/></clipPath></defs><title>Texto para voz</title><g id="tts-svg-Camada_2" data-name="Camada 2"><g id="tts-svg-Camada_1-2" data-name="Camada 1"><g class="tts-svg-2"><path class="tts-svg-3" d="M621.88,384.39a244.58,244.58,0,0,1-76.2,176.9c-.19.18-.78.81-.92.92-23.28,24.31-24.39,32.43-27.92,58.58a478.65,478.65,0,0,1-9.52,52.41c-22,90.74-91.21,121.7-142.77,127.74l-.21,0a27.13,27.13,0,0,1-29.8-29.6v-.18a23.93,23.93,0,0,1,21.56-21.48,134.59,134.59,0,0,0,34-7.87c34.79-13.24,57.41-40.38,67.15-80.73a427.5,427.5,0,0,0,8.54-47.22c4.56-33.65,8.53-52.85,42.8-88.34l1-.92a190.24,190.24,0,0,0,60.83-140.23c0-105.88-86.17-192-192.09-192-101.91,0-185.56,79.83-191.69,180.24a12.47,12.47,0,0,1-12.4,11.81H147.55a12.41,12.41,0,0,1-12.44-13c6.77-128.26,113.27-230.55,243.19-230.55,134.31,0,243.58,109.27,243.58,243.54" transform="translate(0 0)"/><path class="tts-svg-3" d="M521.17,385.5H469.68a91.73,91.73,0,1,0-183.45,0H234.74c0-79,64.25-143.22,143.22-143.22S521.17,306.53,521.17,385.5" transform="translate(0 0)"/><path class="tts-svg-3" d="M763.14,224.63c-32.4-79.15-90.26-147.86-162.93-193.48L619.76,0c79.13,49.67,142.13,124.5,177.41,210.7Z" transform="translate(0 0)"/><path class="tts-svg-3" d="M686.07,261.58A415.37,415.37,0,0,0,557.5,108.83l21.61-29.76a452.31,452.31,0,0,1,140,166.33Z" transform="translate(0 0)"/><path class="tts-svg-3" d="M411.52,395.35a33.2,33.2,0,1,1-33.2-33.2,33.19,33.19,0,0,1,33.2,33.2" transform="translate(0 0)"/><path class="tts-svg-3" d="M326.15,480.72a33.2,33.2,0,1,1-33.2-33.2,33.2,33.2,0,0,1,33.2,33.2" transform="translate(0 0)"/><path class="tts-svg-3" d="M154.68,652.19A33.2,33.2,0,1,1,121.49,619a33.19,33.19,0,0,1,33.19,33.2" transform="translate(0 0)"/><path class="tts-svg-3" d="M66.4,741.93a33.2,33.2,0,1,1-33.2-33.2,33.2,33.2,0,0,1,33.2,33.2" transform="translate(0 0)"/><rect class="tts-svg-3" x="184.09" y="499.28" width="36.78" height="146.01" transform="translate(-344.44 308.86) rotate(-44.8)"/></g></g></g></svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="fontResizeModal" tabindex="-1" aria-labelledby="fontResizeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tamanho do texto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Para aumentar ou diminuir a fonte no nosso site, utilize os atalhos Ctrl+ (para aumentar) e Ctrl- (para diminuir) no seu teclado.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
                </div>
            </div>
        </div>

        <header class="site-header">
            <div class="container">
                <div class="row">
                    <div class="col-6 col-lg-3">
                        <a class="site-header__logo" href="<?= base_url() ?>">
                        <?php if($page === "copercana-60-anos") { ?>
                            <picture>
                                <source media="(max-width: 768px)"
                                    srcset="<?= base_url("_assets/images/selo-copercana-60-anos-2023@0,75x.png") ?> 1x, <?= base_url("_assets/images/selo-copercana-60-anos-2023@1,5x.png") ?> 2x">
                                <source media="(min-width: 768px)"
                                    srcset="<?= base_url("_assets/images/selo-copercana-60-anos-2023.png") ?> 1x, <?= base_url("_assets/images/selo-copercana-60-anos-2023@2x.png") ?> 2x">
                                <img src="<?= base_url("_assets/images/selo-copercana-60-anos-2023.png") ?>" alt="Copercana">
                            </picture>
                            <?php } else { ?>
                                <picture>
                                    <source media="(max-width: 768px)"
                                        srcset="<?= base_url("_assets/images/copercana-60-anos@0,75x.png") ?> 1x, <?= base_url("_assets/images/copercana-60-anos@1,5x.png") ?> 2x">
                                    <source media="(min-width: 768px)"
                                        srcset="<?= base_url("_assets/images/copercana-60-anos.png") ?> 1x, <?= base_url("_assets/images/copercana-60-anos@2x.png") ?> 2x">
                                    <img src="<?= base_url("_assets/images/copercana-60-anos.png") ?>" alt="Copercana">
                                </picture>
                            <?php } ?>
                        </a>
                    </div>
                    <div class="col-6 col-lg-9 d-flex align-items-center justify-content-end d-lg-block">
                        <nav class="site-nav">
                            <ul class="site-nav__menu nav-menu">
                                <li
                                    class="nav-menu__item nav-menu__item--has-submenu<?= $page == 'institucional' || (isset($parent_page) && $parent_page == 'institucional') ? ' active' : '' ?>">
                                    <a class="nav-menu__link" style="cursor: default;">INSTITUCIONAL</a>
                                    <ul class="nav-menu__submenu nav-submenu">
                                    <li
                                            class="nav-submenu__item<?= $page == 'cooperativismo' || (isset($parent_page) && $parent_page == 'cooperativismo') ? ' active' : '' ?>">
                                            <a href="<?= base_url("institucional/cooperativismo") ?>"
                                                class="nav-submenu__link">COOPERATIVISMO</a>
                                        </li>
                                        <li
                                            class="nav-submenu__item<?= $page == 'politica-de-privacidade' || (isset($parent_page) && $parent_page == 'politica-de-privacidade') ? ' active' : '' ?>">
                                            <a href="<?= base_url("institucional/politica-de-privacidade") ?>"
                                                class="nav-submenu__link">POLÍTICA DE PRIVACIDADE</a>
                                        </li>
                                        <li
                                            class="nav-submenu__item<?= $page == 'institucional' ? ' active' : '' ?>">
                                            <a href="<?= base_url("institucional") ?>"
                                                class="nav-submenu__link">QUEM SOMOS</a>
                                        </li>
                                       
                                        <li
                                            class="nav-submenu__item<?= $page == 'sustentabilidade' || (isset($parent_page) && $parent_page == 'sustentabilidade') ? ' active' : '' ?>">
                                            <a href="<?= base_url("institucional/sustentabilidade") ?>"
                                                class="nav-submenu__link">SUSTENTABILIDADE</a>
                                        </li>
                                        
                                    </ul>
                                </li>
                                <li
                                    class="nav-menu__item nav-menu__item--has-submenu<?= $page == 'servicos' || (isset($parent_page) && $parent_page == 'servicos') ? ' active' : '' ?>">
                                    <a class="nav-menu__link" style="cursor: default;">SERVIÇOS</a>
                                    <ul class="nav-menu__submenu nav-submenu">
                                        <li
                                            class="nav-submenu__item<?= $page == 'autocenter' || (isset($parent_page) && $parent_page == 'autocenter') ? ' active' : '' ?>">
                                            <a href="<?= base_url("servicos/auto-center") ?>"
                                                class="nav-submenu__link">AUTO CENTER E AUTOMOTIVO</a>
                                        </li>
                                        <li
                                            class="nav-submenu__item<?= $page == 'centro-de-eventos' || (isset($parent_page) && $parent_page == 'centro-de-eventos') ? ' active' : '' ?>">
                                            <a href="<?= base_url("servicos/centro-de-eventos") ?>"
                                                class="nav-submenu__link">CENTRO DE EVENTOS</a>
                                        </li>
                                        <li
                                            class="nav-submenu__item<?= $page == 'copercana-seguros' || (isset($parent_page) && $parent_page == 'copercana-seguros') ? ' active' : '' ?>">
                                            <a href="<?= base_url("servicos/seguros") ?>"
                                                class="nav-submenu__link">COPERCANA SEGUROS</a>
                                        </li>
                                        <li
                                            class="nav-submenu__item<?= $page == 'copercana-solar' || (isset($parent_page) && $parent_page == 'copercana-solar') ? ' active' : '' ?>">
                                            <a href="<?= base_url("servicos/copercana-solar") ?>"
                                                class="nav-submenu__link">COPERCANA SOLAR</a>
                                        </li>
                                        <li
                                            class="nav-submenu__item<?= $page == 'departamento-agronomico' || (isset($parent_page) && $parent_page == 'departamento-agronomico') ? ' active' : '' ?>">
                                            <a href="<?= base_url("servicos/departamento-agronomico") ?>"
                                                class="nav-submenu__link">DEPARTAMENTO AGRONÔMICO</a>
                                        </li>
                                        <li
                                            class="nav-submenu__item<?= $page == 'distribuidora-de-combustiveis' || (isset($parent_page) && $parent_page == 'distribuidora-de-combustiveis') ? ' active' : '' ?>">
                                            <a href="<?= base_url("servicos/distribuidora-de-combustiveis") ?>"
                                                class="nav-submenu__link">DISTRIBUIDORA DE COMBUSTÍVEIS</a>
                                        </li>
                                        <li
                                            class="nav-submenu__item<?= $page == 'ferragem-magazine' || (isset($parent_page) && $parent_page == 'ferragem-magazine') ? ' active' : '' ?>">
                                            <a href="<?= base_url("servicos/ferragem-magazine") ?>"
                                                class="nav-submenu__link">FERRAGEM E MAGAZINE</a>
                                        </li>
                                        <li
                                            class="nav-submenu__item nav-submenu__item--has-submenu<?= $page == 'laboratorio-de-solos' || (isset($parent_page) && $parent_page == 'laboratorio-de-solos') ? ' active' : '' ?>">
                                            <a href="<?= base_url("servicos/laboratorio-de-solos") ?>"
                                                class="nav-submenu__link">LABORATÓRIO DE SOLOS</a>
                                            <!-- <ul class="nav-submenu__submenu submenu-submenu">
                                                <li
                                                    class="submenu-submenu__item<?= $page == 'tecnologia-bioas' || (isset($parent_page) && $parent_page == 'tecnologia-bioas') ? ' active' : '' ?>">
                                                    <a href="<?= base_url("servicos/laboratorio-de-solos/tecnologia-bioas") ?>"
                                                        class="submenu-submenu__link">TECNOLOGIA BioAS</a>
                                                </li>
                                            </ul> -->
                                        </li>
                                        <li
                                            class="nav-submenu__item<?= $page == 'postos-de-combustiveis' || (isset($parent_page) && $parent_page == 'postos-de-combustiveis') ? ' active' : '' ?>">
                                            <a href="<?= base_url("servicos/posto-de-combustivel") ?>"
                                                class="nav-submenu__link">POSTOS DE COMBUSTÍVEIS</a>
                                        </li>
                                        <li
                                            class="nav-submenu__item<?= $page == 'supermercados' || (isset($parent_page) && $parent_page == 'supermercados') ? ' active' : '' ?>">
                                            <a href="<?= base_url("servicos/supermercado") ?>"
                                                class="nav-submenu__link">SUPERMERCADOS</a>
                                        </li>
                                        <li
                                            class="nav-submenu__item<?= $page == 'unidade-de-graos' || (isset($parent_page) && $parent_page == 'unidade-de-graos') ? ' active' : '' ?>">
                                            <a href="<?= base_url("servicos/unidade-de-graos") ?>"
                                                class="nav-submenu__link">UNIDADE DE GRÃOS</a>
                                        </li>
                                    </ul>
                                </li>
                                <li
                                    class="nav-menu__item nav-menu__item--has-submenu<?= $page == 'comunicacao' || (isset($parent_page) && $parent_page == 'comunicacao') ? ' active' : '' ?>">
                                    <a class="nav-menu__link" style="cursor: default;">COMUNICAÇÃO</a>
                                    <ul class="nav-menu__submenu nav-submenu">
                                        <li
                                            class="nav-submenu__item<?= $page == 'assessoria-de-imprensa' || (isset($parent_page) && $parent_page == 'assessoria-de-imprensa') ? ' active' : '' ?>">
                                            <a href="<?= base_url("comunicacao/assessoria-de-imprensa") ?>"
                                                class="nav-submenu__link">ASSESSORIA DE IMPRENSA</a>
                                        </li>
                                        <li
                                            class="nav-submenu__item<?= $page == 'indicacoes' || (isset($parent_page) && $parent_page == 'indicacoes') ? ' active' : '' ?>">
                                            <a href="<?= base_url("comunicacao/indicacoes") ?>"
                                                class="nav-submenu__link">INDICAÇÕES</a>
                                        </li>
                                        <li
                                            class="nav-submenu__item<?= $page == 'radio-copercana' || (isset($parent_page) && $parent_page == 'radio-copercana') ? ' active' : '' ?>">
                                            <a href="<?= base_url("comunicacao/radio-copercana") ?>"
                                                class="nav-submenu__link">RÁDIO COPERCANA</a>
                                        </li>
                                        <li
                                            class="nav-submenu__item<?= $page == 'redes-sociais' || (isset($parent_page) && $parent_page == 'redes-sociais') ? ' active' : '' ?>">
                                            <a href="<?= base_url("comunicacao/redes-sociais") ?>"
                                                class="nav-submenu__link">REDES SOCIAIS</a>
                                        </li>
                                        <li
                                            class="nav-submenu__item<?= $page == 'revista-canavieiros' || (isset($parent_page) && $parent_page == 'revista-canavieiros') ? ' active' : '' ?>">
                                            <a href="<?= base_url("comunicacao/revista-canavieiros") ?>"
                                                class="nav-submenu__link">REVISTA CANAVIEIROS</a>
                                        </li>
                                    </ul>
                                </li>
                                <li
                                    class="nav-menu__item<?= $page == 'noticias' || (isset($parent_page) && $parent_page == 'noticias') ? ' active' : '' ?>">
                                    <a href="<?= base_url("noticias") ?>" class="nav-menu__link">NOTÍCIAS</a>
                                </li>
                                <li
                                    class="nav-menu__item nav-menu__item--has-submenu<?= $page == 'trabalhe-conosco' || (isset($parent_page) && $parent_page == 'trabalhe-conosco') ? ' active' : '' ?>">
                                    <a class="nav-menu__link" style="cursor: default;">TRABALHE CONOSCO</a>
                                    <ul class="nav-menu__submenu nav-submenu">
                                        <li
                                            class="nav-submenu__item<?= $page == 'cadastro' || (isset($parent_page) && $parent_page == 'cadastro') ? ' active' : '' ?>">
                                            <a href="<?= base_url("trabalhe-conosco/cadastro") ?>"
                                                class="nav-submenu__link">CADASTRO E/OU ATUALIZAÇÃO</a>
                                        </li>
                                        <li
                                            class="nav-submenu__item<?= $page == 'jovem-aprendiz' || (isset($parent_page) && $parent_page == 'jovem-aprendiz') ? ' active' : '' ?>">
                                            <a href="<?= base_url("trabalhe-conosco/jovem-aprendiz") ?>"
                                                class="nav-submenu__link">JOVEM APRENDIZ</a>
                                        </li>
                                        <li
                                            class="nav-submenu__item<?= $page == 'vagas-disponiveis' || (isset($parent_page) && $parent_page == 'vagas-disponiveis') ? ' active' : '' ?>">
                                            <a href="<?= base_url("trabalhe-conosco/vagas-disponiveis") ?>"
                                                class="nav-submenu__link">VAGAS DISPONÍVEIS</a>
                                        </li>
                                        
                                    </ul>
                                </li>
                                <li
                                    class="nav-menu__item<?= $page == 'contato' || (isset($parent_page) && $parent_page == 'contato') ? ' active' : '' ?>">
                                    <a href="<?= base_url("contato") ?>" class="nav-menu__link">CONTATO</a>
                                </li>
                            </ul>

                        </nav>
                        <div class="d-none d-lg-flex flex-row justify-content-between align-items-center">
                            <form action="<?= base_url("busca") ?>" method="GET">
                                <label for="search-input" class="search-input">
                                    <input type="search" id="search-input" name="q">
                                    <button type="submit">
                                        <picture>
                                            <img src="<?= base_url("_assets/images/search-icon.png") ?>" alt="Buscar"
                                                srcset="<?= base_url("_assets/images/search-icon.png") ?> 1x, <?= base_url("_assets/images/search-icon@2x.png") ?> 2x">
                                        </picture>
                                    </button>
                                </label>
                            </form>
                            <div class="header-socials">
                                <?php if(isset($general) && isset($general->instagram) && !empty($general->instagram)) { ?>
                                <a href="<?= $general->instagram ?>" target="_blank" class="socials__item"
                                    aria-label="Instagram">
                                    <svg width="26" height="26" style="fill: <?= $page === "copercana-60-anos" ? "#CE7B01" : "#fff"  ?>;" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        x="0px" y="0px" viewBox="0 0 600 600" xml:space="preserve">
                                        <title>Instagram</title>
                                        <g>
                                            <circle cx="300" cy="300" r="297.5"></circle>
                                            <path class="stinsta" d="M300,123.5c-47.9,0-54,0.2-72.8,1.1c-18.8,0.9-31.6,3.8-42.8,8.2c-11.6,4.5-21.5,10.5-31.3,20.4
                                                c-9.8,9.8-15.8,19.7-20.4,31.3c-4.4,11.2-7.4,24.1-8.2,42.8c-0.8,18.8-1.1,24.8-1.1,72.8c0,47.9,0.2,53.9,1.1,72.8
                                                c0.9,18.8,3.8,31.6,8.2,42.8c4.5,11.6,10.5,21.5,20.4,31.3c9.8,9.8,19.7,15.9,31.3,20.4c11.2,4.4,24.1,7.3,42.8,8.2
                                                c18.8,0.9,24.8,1.1,72.8,1.1c47.9,0,53.9-0.2,72.8-1.1c18.8-0.9,31.6-3.8,42.9-8.2c11.6-4.5,21.4-10.6,31.2-20.4
                                                c9.8-9.8,15.8-19.7,20.4-31.3c4.3-11.2,7.3-24,8.2-42.8c0.8-18.8,1.1-24.8,1.1-72.8c0-47.9-0.2-53.9-1.1-72.8
                                                c-0.9-18.8-3.9-31.6-8.2-42.8c-4.5-11.6-10.6-21.5-20.4-31.3c-9.8-9.8-19.6-15.8-31.3-20.4c-11.3-4.4-24.1-7.3-42.9-8.2
                                                C353.9,123.7,347.9,123.5,300,123.5L300,123.5z M284.2,155.3c4.7,0,9.9,0,15.8,0c47.1,0,52.7,0.2,71.3,1
                                                c17.2,0.8,26.5,3.7,32.8,6.1c8.2,3.2,14.1,7,20.3,13.2c6.2,6.2,10,12.1,13.2,20.3c2.4,6.2,5.3,15.6,6.1,32.8
                                                c0.8,18.6,1,24.2,1,71.3c0,47.1-0.2,52.7-1,71.3c-0.8,17.2-3.7,26.5-6.1,32.8c-3.2,8.2-7,14.1-13.2,20.3c-6.2,6.2-12,10-20.3,13.2
                                                c-6.2,2.4-15.6,5.3-32.8,6.1c-18.6,0.8-24.2,1-71.3,1c-47.1,0-52.7-0.2-71.3-1c-17.2-0.8-26.5-3.7-32.8-6.1
                                                c-8.2-3.2-14.1-7-20.3-13.2c-6.2-6.2-10-12.1-13.2-20.3c-2.4-6.2-5.3-15.6-6.1-32.8c-0.8-18.6-1-24.2-1-71.3
                                                c0-47.1,0.2-52.7,1-71.3c0.8-17.2,3.7-26.5,6.1-32.8c3.2-8.2,7-14.1,13.2-20.3c6.2-6.2,12.1-10,20.3-13.2
                                                c6.2-2.4,15.6-5.3,32.8-6.1C245,155.5,251.3,155.3,284.2,155.3L284.2,155.3z M394.2,184.6c-11.7,0-21.2,9.5-21.2,21.2
                                                c0,11.7,9.5,21.2,21.2,21.2c11.7,0,21.2-9.5,21.2-21.2C415.4,194.1,405.9,184.6,394.2,184.6L394.2,184.6z M300,209.4
                                                c-50.1,0-90.6,40.6-90.6,90.6c0,50.1,40.6,90.6,90.6,90.6c50.1,0,90.6-40.6,90.6-90.6C390.6,249.9,350.1,209.4,300,209.4L300,209.4
                                                z M300,241.2c32.5,0,58.8,26.3,58.8,58.8c0,32.5-26.3,58.8-58.8,58.8c-32.5,0-58.8-26.3-58.8-58.8
                                                C241.2,267.5,267.5,241.2,300,241.2z"></path>
                                        </g>
                                    </svg>
                                </a>
                                <?php } ?>
                                <?php if(isset($general) && isset($general->facebook) && !empty($general->facebook)) { ?>
                                <a href="<?= $general->facebook ?>" target="_blank" class="socials__item"
                                    aria-label="Facebook">
                                    <svg width="28" height="28" style="fill: <?= $page === "copercana-60-anos" ? "#CE7B01" : "#fff"  ?>;" version="1.1" id="Layer_1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve">
                                        <title>Facebook</title>
                                        <path d="M481,258.1c0-124.3-100.8-225-225-225c-124.3,0-225,100.7-225,225c0,112.3,82.3,205.4,189.8,222.2V323.1h-57.1v-65h57.1
                                                            v-49.6c0-56.4,33.5-87.5,85-87.5c24.6,0,50.4,4.4,50.4,4.4v55.4h-28.4c-27.9,0-36.6,17.4-36.6,35.2v42.2h62.4l-10,65h-52.4v157.2
                                                            C398.7,463.4,481,370.3,481,258.1L481,258.1z"></path>
                                    </svg>
                                </a>
                                <?php } ?>



                                <?php if(isset($general) && isset($general->youtube) && !empty($general->youtube)) { ?>
                                <a href="<?= $general->youtube ?>" class="socials__item" target="_blank"
                                    rel="noopener noreferrer" aria-label="Youtube">
                                    <svg width="26" height="26" id="" x="0px" y="0px" viewBox="0 0 300 300"
                                        enable-background="new 0 0 400 400" xml:space="preserve" width="300"
                                        height="300">
                                        <title>Youtube</title>
                                        <defs id="defs15">
                                            <pattern y="0" x="0" height="6" width="6" patternUnits="userSpaceOnUse"
                                                id="EMFhbasepattern" />
                                        </defs>
                                        <g id="g4189" transform="scale(0.75,0.75)">
                                            <rect width="400" height="400" id="rect4"
                                                style="fill:<?= $page === "copercana-60-anos" ? "#CE7B01" : "#fff"  ?>;fill-opacity:1" x="0" y="0" ry="200" />
                                            <g transform="matrix(7.8701756,0,0,7.8701756,695.19553,-948.4235)"
                                                id="g4167">
                                                <path style="fill:<?= $page === "copercana-60-anos" ? "#031401" : "#005422"  ?>;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                    d="M 149.9375 79.222656 C 149.9375 79.222656 86.718651 79.222715 70.851562 83.345703 C 62.355775 85.719505 55.360154 92.715203 52.986328 101.33594 C 48.863375 117.20304 48.863281 150.0625 48.863281 150.0625 C 48.863281 150.0625 48.863375 183.0467 52.986328 198.66406 C 55.360154 207.28468 62.230834 214.15544 70.851562 216.5293 C 86.843592 220.77718 149.9375 220.77734 149.9375 220.77734 C 149.9375 220.77734 213.28168 220.77729 229.14844 216.6543 C 237.76923 214.28049 244.63977 207.53464 246.88867 198.78906 C 251.1366 183.04674 251.13672 150.1875 251.13672 150.1875 C 251.13672 150.1875 251.26156 117.20304 246.88867 101.33594 C 244.63977 92.715203 237.76923 85.844606 229.14844 83.595703 C 213.28168 79.222856 149.9375 79.222656 149.9375 79.222656 z M 129.82227 119.70312 L 182.42188 150.0625 L 129.82227 180.29688 L 129.82227 119.70312 z "
                                                    transform="matrix(0.16941596,0,0,0.16941596,-88.332912,120.50856)"
                                                    id="path4156" />
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                                <?php } ?>

                                <?php if(isset($general) && isset($general->linkedin) && !empty($general->linkedin)) { ?>
                                <a href="<?= $general->linkedin ?>" target="_blank" class="socials__item"
                                    rel="noopener noreferrer" aria-label="LinkedIn">
                                    <svg width="26" height="26" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px"
                                        viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000"
                                        xml:space="preserve">
                                        <title>LinkedIn</title>
                                        <g>
                                            <path style="fill: <?= $page === "copercana-60-anos" ? "#CE7B01" : "#fff"  ?>;"
                                                d="M500,10C229.4,10,10,229.4,10,500s219.4,490,490,490s490-219.4,490-490C990,229.3,770.6,10,500,10z M377.5,737.3H255V308.6h122.5V737.3z M320,282.3c-31.7,0-57.4-25.7-57.4-57.5c0-31.7,25.7-57.5,57.4-57.5c31.7,0.1,57.5,25.8,57.5,57.5C377.5,256.6,351.8,282.3,320,282.3z M806.3,737.3H683.8V472.3c0-31.1-8.9-52.8-47-52.8c-63.3,0-75.5,52.8-75.5,52.8v265.1H438.8V308.6h122.5v41c17.5-13.4,61.3-40.9,122.5-40.9c39.8,0,122.5,23.8,122.5,167.3V737.3z" />
                                        </g>
                                    </svg>
                                </a>
                                <?php } ?>

                                <?php if(isset($general) && isset($general->radio) && !empty($general->radio)) { ?>
                                <a href="<?= $general->radio ?>" target="_blank" class="socials__item"
                                    rel="noopener noreferrer" aria-label="LinkedIn">
                                    <svg width="26" height="26" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 82 82">
                                        <defs>
                                            <clipPath id="clip-path">
                                                <rect class="radio-1" width="82" height="82" />
                                            </clipPath>
                                        </defs>
                                        <title>Ativo 1</title>
                                        <g id="Camada_2" data-name="Camada 2">
                                            <g id="Camada_1-2" data-name="Camada 1">
                                                <g class="radio-2">
                                                    <path class="radio-3"
                                                        d="M82,41A41,41,0,1,1,41,0,41,41,0,0,1,82,41" />
                                                    <path class="radio-4"
                                                        d="M31.46,59.16c0,3-2.95,6.1-6.59,6.87S18.28,65,18.28,62s2.95-6.09,6.59-6.87S31.46,56.14,31.46,59.16Z" />
                                                    <path class="radio-4"
                                                        d="M57.81,49.75c0,3-3,6.1-6.59,6.87s-6.59-1-6.59-4.07,2.95-6.09,6.59-6.87S57.81,46.73,57.81,49.75Z" />
                                                    <polyline class="radio-4"
                                                        points="57.81 49.27 57.81 13.5 31.45 22.91 31.45 58.68" />
                                                    <line class="radio-4" x1="57.81" y1="22.91" x2="31.46" y2="32.33" />
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                                <?php } ?>

                            </div>
                        </div>
                        <div class="menu-toggler" id="open-menu-btn">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- <div class="col-lg-8 d-none d-sm-flex flex-column flex-md-row justify-content-around align-items-center">
                    <a class="c-button c-button--small c-button--outline mb-3 mb-md-0" href="<?= base_url("visitantes") ?>"><span>QUERO VISITAR</span></a>
                    <a class="c-button c-button--small c-button--outline" href="<?= base_url("agenda") ?>"><span>AGENDA</span></a>
                </div> -->
                </div>
            </div>

        </header>
        <nav class="mobile-site-nav" id="navbar">
            <ul class="mobile-site-nav__menu mobile-nav-menu">
                <li
                    class="mobile-nav-menu__item mobile-nav-menu__item--has-submenu<?= $page == 'institucional' || (isset($parent_page) && $parent_page == 'institucional') ? ' active' : '' ?>">
                    <a class="mobile-nav-menu__link" style="cursor: default;">INSTITUCIONAL</a>
                    <ul class="mobile-nav-menu__submenu mobile-nav-submenu">
                    <li
                            class="mobile-nav-submenu__item<?= $page == 'cooperativismo' || (isset($parent_page) && $parent_page == 'cooperativismo') ? ' active' : '' ?>">
                            <a href="<?= base_url("institucional/cooperativismo") ?>"
                                class="mobile-nav-submenu__link">Cooperativismo</a>
                        </li>
                        <li
                            class="mobile-nav-submenu__item<?= $page == 'politica-de-privacidade' || (isset($parent_page) && $parent_page == 'politica-de-privacidade') ? ' active' : '' ?>">
                            <a href="<?= base_url("institucional/politica-de-privacidade") ?>"
                                class="mobile-nav-submenu__link">Política de Privacidade</a>
                        </li>
                    <li
                            class="mobile-nav-submenu__item<?= $page == 'institucional' ? ' active' : '' ?>">
                            <a href="<?= base_url("institucional") ?>"
                                class="mobile-nav-submenu__link">Quem Somos</a>
                        </li>
                        
                        <li
                            class="mobile-nav-submenu__item<?= $page == 'sustentabilidade' || (isset($parent_page) && $parent_page == 'sustentabilidade') ? ' active' : '' ?>">
                            <a href="<?= base_url("institucional/sustentabilidade") ?>"
                                class="mobile-nav-submenu__link">Sustentabilidade</a>
                        </li>
                       
                    </ul>
                </li>
                <li
                    class="mobile-nav-menu__item mobile-nav-menu__item--has-submenu<?= $page == 'servicos' || (isset($parent_page) && $parent_page == 'servicos') ? ' active' : '' ?>">
                    <a class="mobile-nav-menu__link" style="cursor: default;">SERVIÇOS</a>
                    <ul class="mobile-nav-menu__submenu mobile-nav-submenu">
                        <li
                            class="mobile-nav-submenu__item<?= $page == 'autocenter' || (isset($parent_page) && $parent_page == 'autocenter') ? ' active' : '' ?>">
                            <a href="<?= base_url("servicos/auto-center") ?>" class="mobile-nav-submenu__link">Auto Center e Automotivo</a>
                        </li>
                        <li
                            class="mobile-nav-submenu__item<?= $page == 'centro-de-eventos' || (isset($parent_page) && $parent_page == 'centro-de-eventos') ? ' active' : '' ?>">
                            <a href="<?= base_url("servicos/centro-de-eventos") ?>"
                                class="mobile-nav-submenu__link">Centro de
                                Eventos</a>
                        </li>
                        <li
                            class="mobile-nav-submenu__item<?= $page == 'copercana-seguros' || (isset($parent_page) && $parent_page == 'copercana-seguros') ? ' active' : '' ?>">
                            <a href="<?= base_url("servicos/seguros") ?>"
                                class="mobile-nav-submenu__link">Copercana
                                Seguros</a>
                        </li>
                        <li
                            class="mobile-nav-submenu__item<?= $page == 'copercana-solar' || (isset($parent_page) && $parent_page == 'copercana-solar') ? ' active' : '' ?>">
                            <a href="<?= base_url("servicos/copercana-solar") ?>"
                                class="mobile-nav-submenu__link">Copercana Solar</a>
                        </li>
                        <li
                            class="mobile-nav-submenu__item<?= $page == 'departamento-agronomico' || (isset($parent_page) && $parent_page == 'departamento-agronomico') ? ' active' : '' ?>">
                            <a href="<?= base_url("servicos/departamento-agronomico") ?>"
                                class="mobile-nav-submenu__link">Departamento
                                Agronômico</a>
                        </li>
                        <li
                            class="mobile-nav-submenu__item<?= $page == 'distribuidora-de-combustiveis' || (isset($parent_page) && $parent_page == 'distribuidora-de-combustiveis') ? ' active' : '' ?>">
                            <a href="<?= base_url("servicos/distribuidora-de-combustiveis") ?>"
                                class="mobile-nav-submenu__link">Distribuidora de Combustíveis</a>
                        </li>
                        <li
                            class="mobile-nav-submenu__item<?= $page == 'ferragem-magazine' || (isset($parent_page) && $parent_page == 'ferragem-magazine') ? ' active' : '' ?>">
                            <a href="<?= base_url("servicos/ferragem-magazine") ?>"
                                class="mobile-nav-submenu__link">Ferragem e
                                Magazine</a>
                        </li>
                        <li
                            class="mobile-nav-submenu__item mobile-nav-menu__item--has-submenu<?= $page == 'laboratorio-de-solos' || (isset($parent_page) && $parent_page == 'laboratorio-de-solos') || $page == 'tecnologia-bioas' || (isset($parent_page) && $parent_page == 'tecnologia-bioas') ? ' active' : '' ?>">
                            <a href="<?= base_url("servicos/laboratorio-de-solos") ?>"
                                class="mobile-nav-submenu__link">Laboratório de
                                Solos</a>
                                <!-- <ul class="mobile-nav-menu__submenu mobile-nav-submenu">
                                    <li
                                        class="mobile-nav-submenu__item<?= $page == 'tecnologia-bioas' || (isset($parent_page) && $parent_page == 'tecnologia-bioas') ? ' active' : '' ?>">
                                        <a href="<?= base_url("servicos/laboratorio-de-solos/tecnologia-bioas") ?>" class="mobile-nav-submenu__link">Tecnologia BioAS</a>
                                    </li>
                                </ul> -->
                        </li>
                        <li
                            class="mobile-nav-submenu__item<?= $page == 'postos-de-combustiveis' || (isset($parent_page) && $parent_page == 'postos-de-combustiveis') ? ' active' : '' ?>">
                            <a href="<?= base_url("servicos/posto-de-combustivel") ?>"
                                class="mobile-nav-submenu__link">Postos de
                                Combustíveis</a>
                        </li>
                        <li
                            class="mobile-nav-submenu__item<?= $page == 'supermercados' || (isset($parent_page) && $parent_page == 'supermercados') ? ' active' : '' ?>">
                            <a href="<?= base_url("servicos/supermercado") ?>"
                                class="mobile-nav-submenu__link">Supermercados</a>
                        </li>
                        <li
                            class="mobile-nav-submenu__item<?= $page == 'unidade-de-graos' || (isset($parent_page) && $parent_page == 'unidade-de-graos') ? ' active' : '' ?>">
                            <a href="<?= base_url("servicos/unidade-de-graos") ?>"
                                class="mobile-nav-submenu__link">Unidade de
                                Grãos</a>
                        </li>
                    </ul>
                </li>
                <li
                    class="mobile-nav-menu__item mobile-nav-menu__item--has-submenu<?= $page == 'comunicacao' || (isset($parent_page) && $parent_page == 'comunicacao') ? ' active' : '' ?>">
                    <a class="mobile-nav-menu__link" style="cursor: default;">COMUNICAÇÃO</a>
                    <ul class="mobile-nav-menu__submenu mobile-nav-submenu">
                        <li
                            class="mobile-nav-submenu__item<?= $page == 'assessoria-de-imprensa' || (isset($parent_page) && $parent_page == 'assessoria-de-imprensa') ? ' active' : '' ?>">
                            <a href="<?= base_url("comunicacao/assessoria-de-imprensa") ?>"
                                class="mobile-nav-submenu__link">Assessoria
                                de Imprensa</a>
                        </li>
                        <li
                            class="mobile-nav-submenu__item<?= $page == 'indicacoes' || (isset($parent_page) && $parent_page == 'indicacoes') ? ' active' : '' ?>">
                            <a href="<?= base_url("comunicacao/indicacoes") ?>"
                                class="mobile-nav-submenu__link">Indicações</a>
                        </li>
                        <li
                            class="mobile-nav-submenu__item<?= $page == 'radio-copercana' || (isset($parent_page) && $parent_page == 'radio-copercana') ? ' active' : '' ?>">
                            <a href="<?= base_url("comunicacao/radio-copercana") ?>"
                                class="mobile-nav-submenu__link">Rádio
                                Copercana</a>
                        </li>
                        <li
                            class="mobile-nav-submenu__item<?= $page == 'redes-sociais' || (isset($parent_page) && $parent_page == 'redes-sociais') ? ' active' : '' ?>">
                            <a href="<?= base_url("comunicacao/redes-sociais") ?>"
                                class="mobile-nav-submenu__link">Redes Sociais</a>
                        </li>
                        <li
                            class="mobile-nav-submenu__item<?= $page == 'revista-canavieiros' || (isset($parent_page) && $parent_page == 'revista-canavieiros') ? ' active' : '' ?>">
                            <a href="<?= base_url("comunicacao/revista-canavieiros") ?>"
                                class="mobile-nav-submenu__link">Revista
                                Canavieiros</a>
                        </li>
                    </ul>
                </li>
                <li
                    class="mobile-nav-menu__item<?= $page == 'noticias' || (isset($parent_page) && $parent_page == 'noticias') ? ' active' : '' ?>">
                    <a href="<?= base_url("noticias") ?>" class="mobile-nav-menu__link">NOTÍCIAS</a>
                </li>
                <li
                    class="mobile-nav-menu__item mobile-nav-menu__item--has-submenu<?= $page == 'trabalhe-conosco' || (isset($parent_page) && $parent_page == 'trabalhe-conosco') ? ' active' : '' ?>">
                    <a class="mobile-nav-menu__link" style="cursor: default;">TRABALHE CONOSCO</a>
                    <ul class="mobile-nav-menu__submenu mobile-nav-submenu">
                    <li
                            class="mobile-nav-submenu__item<?= $page == 'cadastro' || (isset($parent_page) && $parent_page == 'cadastro') ? ' active' : '' ?>">
                            <a href="<?= base_url("trabalhe-conosco/cadastro") ?>"
                                class="mobile-nav-submenu__link">Cadastro e/ou
                                Atualização</a>
                        </li>
                        <li
                            class="mobile-nav-submenu__item<?= $page == 'jovem-aprendiz' || (isset($parent_page) && $parent_page == 'jovem-aprendiz') ? ' active' : '' ?>">
                            <a href="<?= base_url("trabalhe-conosco/jovem-aprendiz") ?>"
                                class="mobile-nav-submenu__link">Jovem
                                Aprendiz</a>
                        </li>
                        <li
                            class="mobile-nav-submenu__item<?= $page == 'vagas-disponiveis' || (isset($parent_page) && $parent_page == 'vagas-disponiveis') ? ' active' : '' ?>">
                            <a href="<?= base_url("trabalhe-conosco/vagas-disponiveis") ?>"
                                class="mobile-nav-submenu__link">Vagas
                                Disponíveis</a>
                        </li>
                        
                    </ul>
                </li>
                <li
                    class="mobile-nav-menu__item<?= $page == 'contato' || (isset($parent_page) && $parent_page == 'contato') ? ' active' : '' ?>">
                    <a href="<?= base_url("contato") ?>" class="mobile-nav-menu__link">CONTATO</a>
                </li>
            </ul>
            <div class="menu-toggler open" id="close-menu-btn">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
        <?php } ?>

        <?php if(isset($quotation_list) && $quotation_list === true) { ?>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="marquee" id="quotation-container">
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>