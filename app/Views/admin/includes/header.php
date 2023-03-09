<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Copercana | Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
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
    <meta name="msapplication-TileImage" content="<?= base_url('icons/ms-icon-144x144.png'); ?>">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('_assets/admin/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
  <link href="<?= base_url('_assets/admin/vendor/bootstrap-icons/bootstrap-icons.css'); ?>" rel="stylesheet">
  <link href="<?= base_url('_assets/admin/vendor/boxicons/css/boxicons.min.css'); ?>" rel="stylesheet">
  <link href="<?= base_url('_assets/admin/vendor/quill/quill.snow.css'); ?>" rel="stylesheet">
  <link href="<?= base_url('_assets/admin/vendor/quill/quill.bubble.css'); ?>" rel="stylesheet">
  <link href="<?= base_url('_assets/admin/vendor/remixicon/remixicon.css'); ?>" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  <link href="<?= base_url('_assets/admin/vendor/DataTables/datatables.min.css'); ?>" rel="stylesheet">

  <link href="<?= base_url('_assets/admin/css/style.css'); ?>?v=<?= filemtime('_assets/admin/css/style.css'); ?>" rel="stylesheet">

  <?php if(isset($header_dependencies)) {
    foreach($header_dependencies as $dependency) {
        echo $dependency;
        }   
    }  ?>

</head>

<body>
    <input type="hidden" name="base_url" id="base_url" value="<?= base_url() ?>">
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block">Copercana</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?= isset($logged_user->row()->picture) && !empty($logged_user->row()->picture) ? base_url($logged_user->row()->picture) : base_url("_assets/images/no-picture.jpg") ?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?= substr($logged_user->row()->first_name, 0, 1) ?>.&nbsp;<?= $logged_user->row()->last_name; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?= $logged_user->row()->first_name; ?>&nbsp;<?= $logged_user->row()->last_name; ?></h6>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?= base_url("admin/users/edit/".$logged_user->row()->id) ?>">
                <i class="bi bi-person"></i>
                <span>Meu perfil</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?= base_url("auth/logout") ?>">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sair</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <?php if($ion_auth->isAdmin()) {?>
      <!-- ======= Banners ======= -->
      <li class="nav-item">
        <a class="nav-link <?= $page !== 'banners' && $page !== 'banners-add_new' && $page !== 'banners-edit' ? 'collapsed' : null ?>" data-bs-target="#banners-nav" data-bs-toggle="collapse">
        <i class="bi bi-image"></i><span>Banners</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="banners-nav" class="nav-content collapse <?= $page === 'banners' || $page === 'banners-add_new' || $page === 'banners-edit' ? 'show' : null ?>" data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= base_url("admin/banners/add_new") ?>" <?= $page === 'banners-add_new' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Adicionar Novo</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url("admin/banners") ?>" <?= $page === 'banners' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Visualizar Todos</span>
            </a>
          </li>
        </ul>
      </li>
      <?php } ?>
      
      <?php if($ion_auth->isAdmin() || $ion_auth->inGroup(3)) {?>
      <!-- ======= Ofertas ======= -->
      <li class="nav-item">
        <a class="nav-link <?= $page !== 'offers' && $page !== 'offers-add_new'  && $page !== 'offers-edit' ? 'collapsed' : null ?>" data-bs-target="#offers-nav" data-bs-toggle="collapse">
        <i class="bi bi-tag"></i><span>Ofertas</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="offers-nav" class="nav-content collapse <?= $page === 'offers' || $page === 'offers-add_new' || $page === 'offers-edit' ? 'show' : null ?>" data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= base_url("admin/offers/add_new") ?>" <?= $page === 'offers-add_new' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Adicionar Novo</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url("admin/offers") ?>" <?= $page === 'offers' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Visualizar Todos</span>
            </a>
          </li>
        </ul>
      </li>
      <?php } ?>
      
      <?php if($ion_auth->isAdmin()) {?>
      <!-- ======= Revistas ======= -->
      <li class="nav-item">
        <a class="nav-link <?= $page !== 'magazines' && $page !== 'magazines-add_new'  && $page !== 'magazines-edit' ? 'collapsed' : null ?>" data-bs-target="#magazines-nav" data-bs-toggle="collapse">
        <i class="bi bi-book"></i><span>Revistas</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="magazines-nav" class="nav-content collapse <?= $page === 'magazines' || $page === 'magazines-add_new' || $page === 'magazines-edit' ? 'show' : null ?>" data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= base_url("admin/magazines/add_new") ?>" <?= $page === 'magazines-add_new' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Adicionar Novo</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url("admin/magazines") ?>" <?= $page === 'magazines' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Visualizar Todos</span>
            </a>
          </li>
        </ul>
      </li>
      <?php } ?>

      <?php if($ion_auth->isAdmin()) {?>
      <!-- ======= Galeria de Eventos ======= -->
      <li class="nav-item">
        <a class="nav-link <?= $page !== 'galleries' && $page !== 'galleries-add_new' && $page !== 'galleries-edit' ? 'collapsed' : null ?>" data-bs-target="#galleries-nav" data-bs-toggle="collapse">
        <i class="bi bi-images"></i><span>Galerias de Eventos</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="galleries-nav" class="nav-content collapse <?= $page === 'galleries' || $page === 'galleries-add_new' || $page === 'galleries-edit' ? 'show' : null ?>" data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= base_url("admin/events_galleries/add_new") ?>" <?= $page === 'galleries-add_new' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Adicionar Novo</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url("admin/events_galleries") ?>" <?= $page === 'galleries' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Visualizar Todos</span>
            </a>
          </li>
        </ul>
      </li>
      <?php } ?>
      
      <?php if($ion_auth->isAdmin()) {?>
      <!-- ======= Indicações ======= -->
      <li class="nav-item">
        <a class="nav-link <?= $page !== 'indications' && $page !== 'indications-add_new'  && $page !== 'indications-edit' ? 'collapsed' : null ?>" data-bs-target="#indications-nav" data-bs-toggle="collapse">
        <i class="bi bi-lightbulb"></i><span>Indicações</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="indications-nav" class="nav-content collapse <?= $page === 'indications' || $page === 'indications-add_new' || $page === 'indications-edit' ? 'show' : null ?>" data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= base_url("admin/indications/add_new") ?>" <?= $page === 'indications-add_new' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Adicionar Novo</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url("admin/indications") ?>" <?= $page === 'indications' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Visualizar Todos</span>
            </a>
          </li>
        </ul>
      </li>
      <?php } ?>
      
      <?php if($ion_auth->isAdmin()) {?>
      <!-- ======= Depoimentos ======= -->
      <li class="nav-item">
        <a class="nav-link <?= $page !== 'testimonials' && $page !== 'testimonials-add_new'  && $page !== 'testimonials-edit' ? 'collapsed' : null ?>" data-bs-target="#testimonials-nav" data-bs-toggle="collapse">
        <i class="bi bi-quote"></i><span>Depoimentos</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="testimonials-nav" class="nav-content collapse <?= $page === 'testimonials' || $page === 'testimonials-add_new' || $page === 'testimonials-edit' ? 'show' : null ?>" data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= base_url("admin/testimonials/add_new") ?>" <?= $page === 'testimonials-add_new' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Adicionar Novo</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url("admin/testimonials") ?>" <?= $page === 'testimonials' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Visualizar Todos</span>
            </a>
          </li>
        </ul>
      </li>
      <?php } ?>
      
      <?php if($ion_auth->isAdmin() || $ion_auth->inGroup(4)) {?>
      <!-- ======= Vagas ======= -->
      <li class="nav-item">
        <a class="nav-link <?= $page !== 'jobs' && $page !== 'jobs-add_new' && $page !== 'jobs-edit' && $page !== 'jobs-roles' && $page !== 'jobs-roles_add_new' && $page !== 'jobs-roles_edit' ? 'collapsed' : null ?>" data-bs-target="#jobs-nav" data-bs-toggle="collapse">
        <i class="bi bi-briefcase"></i><span>Vagas</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="jobs-nav" class="nav-content collapse <?= $page === 'jobs' || $page === 'jobs-add_new' || $page === 'jobs-edit' || $page === 'jobs-roles' || $page === 'jobs-roles_add_new' || $page === 'jobs-roles_edit' ? 'show' : null ?>" data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= base_url("admin/jobs/add_new") ?>" <?= $page === 'jobs-add_new' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Adicionar Nova</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url("admin/jobs") ?>" <?= $page === 'jobs' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Visualizar Todas</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url("admin/jobs/roles") ?>" <?= $page === 'jobs-roles' || $page === 'jobs-roles_add_new' || $page === 'jobs-roles_edit' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Cargos</span>
            </a>
          </li>
        </ul>
      </li>
      <?php } ?>
      
      <?php if($ion_auth->isAdmin() || $ion_auth->inGroup(2)) {?>
      <!-- ======= Blog ======= -->
      <li class="nav-item">
        <a class="nav-link <?= $page !== 'blog' && $page !== 'blog-add_new'  && $page !== 'blog-edit' && $page !== 'blog-categories' && $page !== 'blog-categories_add_new' && $page !== 'blog-categories_edit' ? 'collapsed' : null ?>" data-bs-target="#blog-nav" data-bs-toggle="collapse">
        <i class="bi bi-blockquote-right"></i><span>Blog</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="blog-nav" class="nav-content collapse <?= $page === 'blog' || $page === 'blog-add_new' || $page === 'blog-edit' || $page === 'blog-categories' || $page === 'blog-categories_add_new' || $page === 'blog-categories_edit' ? 'show' : null ?>" data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= base_url("admin/blog/add_new") ?>" <?= $page === 'blog-add_new' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Adicionar Novo</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url("admin/blog") ?>" <?= $page === 'blog' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Visualizar Todos</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url("admin/blog/categories") ?>" <?= $page === 'blog-categories' || $page === 'blog-categories_add_new' || $page === 'blog-categories_edit' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Categorias</span>
            </a>
          </li>
        </ul>
      </li>
      <?php } ?>
      
      <?php if($ion_auth->isAdmin()) {?>
      <!-- ======= Noticias ======= -->
      <li class="nav-item">
        <a class="nav-link <?= $page !== 'news' && $page !== 'news-add_new'  && $page !== 'news-edit' ? 'collapsed' : null ?>" data-bs-target="#news-nav" data-bs-toggle="collapse">
        <i class="bi bi-newspaper"></i><span>Notícias</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="news-nav" class="nav-content collapse <?= $page === 'news' || $page === 'news-add_new' || $page === 'news-edit' ? 'show' : null ?>" data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= base_url("admin/news/add_new") ?>" <?= $page === 'news-add_new' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Adicionar Novo</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url("admin/news") ?>" <?= $page === 'news' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Visualizar Todos</span>
            </a>
          </li>
        </ul>
      </li>
      <?php } ?>
      
      <?php if($ion_auth->isAdmin()) {?>
      <!-- ======= Páginas ======= -->
      <li class="nav-item">
        <a class="nav-link <?= $page !== 'pages-home' && $page !== 'pages-institucional' && $page !== 'pages-sustentabilidade' && $page !== 'pages-cooperativismo' && $page !== 'pages-politica-de-privacidade' && $page !== 'pages-autocenter' && $page !== 'pages-centro-de-eventos' && $page !== 'pages-distribuidora-de-combustiveis' && $page !== 'pages-ferragem-magazine' && $page !== 'pages-postos-de-combustiveis' && $page !== 'pages-copercana-solar' && $page !== 'pages-copercana-seguros' && $page !== 'pages-supermercados' && $page !== 'pages-unidade-de-graos' && $page !== 'pages-assessoria-de-imprensa' && $page !== 'pages-revista-canavieiros' && $page !== 'pages-radio-copercana' && $page !== 'pages-redes-sociais' && $page !== 'pages-indicacoes' && $page !== 'pages-cadastro' && $page !== 'pages-jovem-aprendiz' && $page !== 'pages-vagas-disponiveis' && $page !== 'pages-laboratorio-de-solos' && $page !== 'pages-tecnologia-bioas' && $page !== 'pages-departamento-agronomico' && $page !== 'pages-noticias' && $page !== 'pages-blog' && $page !== 'pages-contato' && $page !== 'pages-soucooperado' && $page !== 'pages-copercana-60-anos' ? 'collapsed' : null ?>" data-bs-target="#pages-nav" data-bs-toggle="collapse">
        <i class="bi bi-file-earmark-code"></i><span>Páginas</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="pages-nav" class="nav-content collapse <?= $page === 'pages-home' || $page === 'pages-institucional' || $page === 'pages-sustentabilidade' || $page === 'pages-cooperativismo' || $page === 'pages-politica-de-privacidade' || $page === 'pages-autocenter' || $page === 'pages-centro-de-eventos' || $page === 'pages-distribuidora-de-combustiveis' || $page === 'pages-ferragem-magazine' || $page === 'pages-postos-de-combustiveis' || $page === 'pages-copercana-solar' || $page === 'pages-copercana-seguros' || $page === 'pages-supermercados' || $page === 'pages-unidade-de-graos' || $page === 'pages-assessoria-de-imprensa' || $page === 'pages-revista-canavieiros' || $page === 'pages-radio-copercana' || $page === 'pages-redes-sociais' || $page === 'pages-indicacoes' || $page === 'pages-cadastro' || $page === 'pages-jovem-aprendiz' || $page === 'pages-vagas-disponiveis' || $page === 'pages-laboratorio-de-solos' || $page === 'pages-tecnologia-bioas' || $page === 'pages-departamento-agronomico' || $page === 'pages-noticias' || $page === 'pages-contato' || $page === 'pages-soucooperado' || $page === 'pages-copercana-60-anos' ? 'show' : null ?>" data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= base_url("admin/pages/home") ?>" <?= $page === 'pages-home' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Home</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url("admin/pages/institucional") ?>" <?= $page === 'pages-institucional' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Institucional</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url("admin/pages/sustentabilidade") ?>" <?= $page === 'pages-sustentabilidade' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Sustentabilidade</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url("admin/pages/cooperativismo") ?>" <?= $page === 'pages-cooperativismo' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Cooperativismo</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url("admin/pages/politica-de-privacidade") ?>" <?= $page === 'pages-politica-de-privacidade' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Política de Privacidade</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url("admin/pages/autocenter") ?>" <?= $page === 'pages-autocenter' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Auto Center</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url("admin/pages/centro-de-eventos") ?>" <?= $page === 'pages-centro-de-eventos' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Centro de Eventos</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url("admin/pages/distribuidora-de-combustiveis") ?>" <?= $page === 'pages-distribuidora-de-combustiveis' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Distribuidora de Combustíveis</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url("admin/pages/ferragem-magazine") ?>" <?= $page === 'pages-ferragem-magazine' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Ferragem e Magazine</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url("admin/pages/postos-de-combustiveis") ?>" <?= $page === 'pages-postos-de-combustiveis' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Postos de Combustíveis</span>
            </a>
          </li>

          <li>
            <a href="<?= base_url("admin/pages/copercana-solar") ?>" <?= $page === 'pages-copercana-solar' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Copercana Solar</span>
            </a>
          </li>

          <li>
            <a href="<?= base_url("admin/pages/copercana-seguros") ?>" <?= $page === 'pages-copercana-seguros' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Copercana Seguros</span>
            </a>
          </li>

          <li>
            <a href="<?= base_url("admin/pages/supermercados") ?>" <?= $page === 'pages-supermercados' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Supermercados</span>
            </a>
          </li>

          <li>
            <a href="<?= base_url("admin/pages/unidade-de-graos") ?>" <?= $page === 'pages-unidade-de-graos' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Unidade de Grãos</span>
            </a>
          </li>

          <li>
            <a href="<?= base_url("admin/pages/laboratorio-de-solos") ?>" <?= $page === 'pages-laboratorio-de-solos' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Laboratório de Solos</span>
            </a>
          </li>

          <li>
            <a href="<?= base_url("admin/pages/departamento-agronomico") ?>" <?= $page === 'pages-departamento-agronomico' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Departamento Agronômico</span>
            </a>
          </li>
          
          <li>
            <a href="<?= base_url("admin/pages/assessoria-de-imprensa") ?>" <?= $page === 'pages-assessoria-de-imprensa' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Assessoria de Imprensa</span>
            </a>
          </li>

          <li>
            <a href="<?= base_url("admin/pages/revista-canavieiros") ?>" <?= $page === 'pages-revista-canavieiros' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Revista Canavieiros</span>
            </a>
          </li>

          <li>
            <a href="<?= base_url("admin/pages/radio-copercana") ?>" <?= $page === 'pages-radio-copercana' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Rádio Copercana</span>
            </a>
          </li>

          <li>
            <a href="<?= base_url("admin/pages/redes-sociais") ?>" <?= $page === 'pages-redes-sociais' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Redes Sociais</span>
            </a>
          </li>

          <li>
            <a href="<?= base_url("admin/pages/indicacoes") ?>" <?= $page === 'pages-indicacoes' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Indicações</span>
            </a>
          </li>

          <li>
            <a href="<?= base_url("admin/pages/cadastro") ?>" <?= $page === 'pages-cadastro' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Cadastro de Currículos</span>
            </a>
          </li>

          <li>
            <a href="<?= base_url("admin/pages/jovem-aprendiz") ?>" <?= $page === 'pages-jovem-aprendiz' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Jovem Aprendiz</span>
            </a>
          </li>

          <li>
            <a href="<?= base_url("admin/pages/vagas-disponiveis") ?>" <?= $page === 'pages-vagas-disponiveis' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Vagas Disponíveis</span>
            </a>
          </li>

          

          <li>
            <a href="<?= base_url("admin/pages/tecnologia-bioas") ?>" <?= $page === 'pages-tecnologia-bioas' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Tecnologia BioAS</span>
            </a>
          </li>

          
          
          <li>
            <a href="<?= base_url("admin/pages/noticias") ?>" <?= $page === 'pages-noticias' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Notícias</span>
            </a>
          </li>

          <li>
            <a href="<?= base_url("admin/pages/blog") ?>" <?= $page === 'pages-blog' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Blog</span>
            </a>
          </li>
         
          <li>
            <a href="<?= base_url("admin/pages/contato") ?>" <?= $page === 'pages-contato' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Contato</span>
            </a>
          </li>

          <li>
            <a href="<?= base_url("admin/pages/soucooperado") ?>" <?= $page === 'pages-soucooperado' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Cooperados Coopercana</span>
            </a>
          </li>

          <li>
            <a href="<?= base_url("admin/pages/copercana-60-anos") ?>" <?= $page === 'pages-copercana-60-anos' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Copercana 60 Anos</span>
            </a>
          </li>
          
        </ul>
      </li>
      <?php } ?>
      
      <?php if($ion_auth->isAdmin()) {?>
      <!-- ======= Usuários ======= -->
      <li class="nav-item">
        <a class="nav-link <?= $page !== 'users' && $page !== 'users-add_new' && $page !== 'users-edit' ? 'collapsed' : null ?>" data-bs-target="#users-nav" data-bs-toggle="collapse">
        <i class="bi bi-people"></i><span>Usuários</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="users-nav" class="nav-content collapse <?= $page === 'users' || $page === 'users-add_new' || $page === 'users-edit' ? 'show' : null ?>" data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= base_url("admin/users/add_new") ?>" <?= $page === 'users-add_new' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Adicionar Novo</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url("admin/users") ?>" <?= $page === 'users' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Visualizar Todos</span>
            </a>
          </li>
        </ul>
      </li>
      <?php } ?>
      
      <?php if($ion_auth->isAdmin()) {?>
      <!-- ======= Unidades ======= -->
      <li class="nav-item">
        <a class="nav-link <?= $page !== 'unis' && $page !== 'units-autocenter' && $page !== 'units-magazines' && $page !== 'units-gas-station' && $page !== 'units-insurance' && $page !== 'units-supermarket' && $page !== 'units-grain-unit'  ? 'collapsed' : null ?>" data-bs-target="#units-nav" data-bs-toggle="collapse">
        <i class="bi bi-shop"></i><span>Unidades</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="units-nav" class="nav-content collapse <?= $page === 'unis' || $page === 'units-autocenter' || $page === 'units-agronomic-department' || $page === 'units-magazines' || $page === 'units-gas-station' || $page === 'units-insurance' || $page === 'units-supermarket' || $page === 'units-grain-unit' ? 'show' : null ?>" data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= base_url("admin/units/autocenter") ?>" <?= $page === 'units-autocenter' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Auto Center</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url("admin/units/agronomic-department") ?>" <?= $page === 'units-agronomic-department' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Departamento Agronômico</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url("admin/units/magazine") ?>" <?= $page === 'units-magazines' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Ferragem e Magazine</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url("admin/units/gas-station") ?>" <?= $page === 'units-gas-station' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Postos de Combustíveis</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url("admin/units/insurance") ?>" <?= $page === 'units-insurance' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Seguros</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url("admin/units/supermarket") ?>" <?= $page === 'units-supermarket' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Supermercados</span>
            </a>
          </li>
          <li>
            <a href="<?= base_url("admin/units/grain-unit") ?>" <?= $page === 'units-grain-unit' ? 'class="active"' : null ?>>
              <i class="bi bi-circle"></i><span>Unidade de Grãos</span>
            </a>
          </li>
        </ul>
      </li>
      <?php } ?>
      
      <?php if($ion_auth->isAdmin()) {?>
      <!-- ======= Contatos ======= -->
      <li class="nav-item">
        <a class="nav-link <?= $page !== 'contacts' && $page !== 'contacts-see_more' ? 'collapsed' : '' ?>" href="<?= base_url("admin/contacts") ?>">
          <i class="bi bi-envelope"></i>
          <span>Contatos</span>
        </a>
      </li>
      <?php } ?>
      
      <?php if($ion_auth->isAdmin()) {?>
      <!-- ======= Geral ======= -->
      <li class="nav-item">
        <a class="nav-link <?= $page !== 'general' ? 'collapsed' : '' ?>" href="<?= base_url("admin/general") ?>">
          <i class="bi bi-gear"></i>
          <span>Geral</span>
        </a>
      </li>
      <?php } ?>
      
    </ul>

  </aside><!-- End Sidebar-->