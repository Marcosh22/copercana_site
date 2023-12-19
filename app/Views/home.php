<?php if(isset($banners) && count($banners) > 0) { ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div id="main-carousel" class="carousel slide" data-ride="carousel">
                <?php if(count($banners) > 1) { ?>
                <ol class="carousel-indicators">
                    <?php foreach($banners as $key => $banner) { ?>
                    <li data-target="#main-carousel" data-slide-to="<?= $key; ?>"
                        class="<?= $key === 0 ? 'active' : ''; ?>" aria-current="<?= $key === 0 ? 'true' : ''; ?>"
                        aria-label="Slide <?= $key + 1; ?>"></li>
                    <?php } ?>
                </ol>
                <?php } ?>

                <div class="carousel-inner">

                    <?php foreach($banners as $key => $banner) { ?>
                    <div class="carousel-item <?= $key === 0 ? 'active' : ''; ?>">
                        <?php if(isset($banner->link) && !empty($banner->link)) { ?>
                        <a href="<?= $banner->link ?>" target="<?= $banner->link_target ?>"
                            onclick="increment_banner_click_count(<?= $banner->id ?>)">
                            <?php } ?>
                            <picture>
                                <source media="(max-width: 768px)" srcset="<?= base_url($banner->mobile_picture) ?>">
                                <source media="(min-width: 768px)" srcset="<?= base_url($banner->desktop_picture) ?>">
                                <img src="<?= base_url($banner->desktop_picture) ?>" class="d-block w-100"
                                    alt="<?= $banner->title ?>">
                            </picture>
                            <?php if(isset($banner->link) && !empty($banner->link)) { ?>
                        </a>
                        <?php } ?>
                    </div>
                    <?php } ?>

                </div>
                <?php if(count($banners) > 1) { ?>
                <button class="carousel-control-prev" aria-label="Next Slide" type="button" data-target="#main-carousel"
                    data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </button>
                <button class="carousel-control-next" aria-label="Previous Slide" type="button"
                    data-target="#main-carousel" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </button>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php } ?>


<main>
    <?php if(isset($page_data)) { ?>

        <?php if(isset($page_data->services_section_show) && $page_data->services_section_show == 1) { ?>
            <section class="page-section" style="padding: 30px 0;">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <h2 class="with-underline" style="margin-bottom: 0;"><?= $page_data->services_section_title ?></h2>
                        </div>
                        <div class="col-12">
                            <div class="services">
                                <?php if(isset($page_data->show_service_01) && $page_data->show_service_01 == 1) { ?>
                                    <article class="service__item service-card">
                                        <div class="service-card__header">
                                            <img src="<?= base_url($page_data->service_01_picture) ?>"
                                                alt="<?= $page_data->service_01_title ?>">
                                        </div>
                                        <div class="service-card__body">
                                            <h3 class="service-card__title">
                                                <?= $page_data->service_01_title ?>
                                            </h3>
                                            <p class="service-card__description">
                                                <?= $page_data->service_01_description ?>
                                            </p>
                                            <a href="<?= base_url("servicos/auto-center") ?>" class="service-card__button">
                                                Saiba mais
                                            </a>
                                        </div>
                                    </article>
                                <?php } ?>

                                <?php if(isset($page_data->show_service_02) && $page_data->show_service_02 == 1) { ?>
                                    <article class="service__item service-card">
                                        <div class="service-card__header">
                                            <img src="<?= base_url($page_data->service_02_picture) ?>"
                                                alt="<?= $page_data->service_02_title ?>">
                                        </div>
                                        <div class="service-card__body">
                                            <h3 class="service-card__title">
                                                <?= $page_data->service_02_title ?>
                                            </h3>
                                            <p class="service-card__description">
                                                <?= $page_data->service_02_description ?>
                                            </p>
                                            <a href="<?= base_url("servicos/seguros") ?>" class="service-card__button">
                                                Saiba mais
                                            </a>
                                        </div>
                                    </article>
                                <?php } ?>

                                <?php if(isset($page_data->show_service_03) && $page_data->show_service_03 == 1) { ?>
                                    <article class="service__item service-card">
                                        <div class="service-card__header">
                                            <img src="<?= base_url($page_data->service_03_picture) ?>"
                                                alt="<?= $page_data->service_03_title ?>">
                                        </div>
                                        <div class="service-card__body">
                                            <h3 class="service-card__title">
                                                <?= $page_data->service_03_title ?>
                                            </h3>
                                            <p class="service-card__description">
                                                <?= $page_data->service_03_description ?>
                                            </p>
                                            <a href="<?= base_url("servicos/centro-de-eventos") ?>" class="service-card__button">
                                                Saiba mais
                                            </a>
                                        </div>
                                    </article>
                                <?php } ?>

                                <?php if(isset($page_data->show_service_04) && $page_data->show_service_04 == 1) { ?>
                                    <article class="service__item service-card">
                                        <div class="service-card__header">
                                            <img src="<?= base_url($page_data->service_04_picture) ?>"
                                                alt="<?= $page_data->service_04_title ?>">
                                        </div>
                                        <div class="service-card__body">
                                            <h3 class="service-card__title">
                                                <?= $page_data->service_04_title ?>
                                            </h3>
                                            <p class="service-card__description">
                                                <?= $page_data->service_04_description ?>
                                            </p>
                                            <a href="<?= base_url("servicos/copercana-solar") ?>" class="service-card__button">
                                                Saiba mais
                                            </a>
                                        </div>
                                    </article>
                                <?php } ?>

                                <?php if(isset($page_data->show_service_05) && $page_data->show_service_05 == 1) { ?>
                                    <article class="service__item service-card">
                                        <div class="service-card__header">
                                            <img src="<?= base_url($page_data->service_05_picture) ?>"
                                                alt="<?= $page_data->service_05_title ?>">
                                        </div>
                                        <div class="service-card__body">
                                            <h3 class="service-card__title">
                                                <?= $page_data->service_05_title ?>
                                            </h3>
                                            <p class="service-card__description">
                                                <?= $page_data->service_05_description ?>
                                            </p>
                                            <a href="<?= base_url("institucional/sustentabilidade") ?>" class="service-card__button">
                                                Saiba mais
                                            </a>
                                        </div>
                                    </article>
                                <?php } ?>

                                <?php if(isset($page_data->show_service_06) && $page_data->show_service_06 == 1) { ?>
                                    <article class="service__item service-card">
                                        <div class="service-card__header">
                                            <img src="<?= base_url($page_data->service_06_picture) ?>"
                                                alt="<?= $page_data->service_06_title ?>">
                                        </div>
                                        <div class="service-card__body">
                                            <h3 class="service-card__title">
                                                <?= $page_data->service_06_title ?>
                                            </h3>
                                            <p class="service-card__description">
                                                <?= $page_data->service_06_description ?>
                                            </p>
                                            <a href="<?= base_url("servicos/departamento-agronomico") ?>" class="service-card__button">
                                                Saiba mais
                                            </a>
                                        </div>
                                    </article>
                                <?php } ?>

                                <?php if(isset($page_data->show_service_07) && $page_data->show_service_07 == 1) { ?>
                                    <article class="service__item service-card">
                                        <div class="service-card__header">
                                            <img src="<?= base_url($page_data->service_07_picture) ?>"
                                                alt="<?= $page_data->service_07_title ?>">
                                        </div>
                                        <div class="service-card__body">
                                            <h3 class="service-card__title">
                                                <?= $page_data->service_07_title ?>
                                            </h3>
                                            <p class="service-card__description">
                                                <?= $page_data->service_07_description ?>
                                            </p>
                                            <a href="<?= base_url("servicos/distribuidora-de-combustiveis") ?>" class="service-card__button">
                                                Saiba mais
                                            </a>
                                        </div>
                                    </article>
                                <?php } ?>

                                <?php if(isset($page_data->show_service_08) && $page_data->show_service_08 == 1) { ?>
                                    <article class="service__item service-card">
                                        <div class="service-card__header">
                                            <img src="<?= base_url($page_data->service_08_picture) ?>"
                                                alt="<?= $page_data->service_08_title ?>">
                                        </div>
                                        <div class="service-card__body">
                                            <h3 class="service-card__title">
                                                <?= $page_data->service_08_title ?>
                                            </h3>
                                            <p class="service-card__description">
                                                <?= $page_data->service_08_description ?>
                                            </p>
                                            <a href="<?= base_url("servicos/ferragem-magazine") ?>" class="service-card__button">
                                                Saiba mais
                                            </a>
                                        </div>
                                    </article>
                                <?php } ?>

                                <?php if(isset($page_data->show_service_09) && $page_data->show_service_09 == 1) { ?>
                                    <article class="service__item service-card">
                                        <div class="service-card__header">
                                            <img src="<?= base_url($page_data->service_09_picture) ?>"
                                                alt="<?= $page_data->service_09_title ?>">
                                        </div>
                                        <div class="service-card__body">
                                            <h3 class="service-card__title">
                                                <?= $page_data->service_09_title ?>
                                            </h3>
                                            <p class="service-card__description">
                                                <?= $page_data->service_09_description ?>
                                            </p>
                                            <a href="<?= base_url("servicos/laboratorio-de-solos") ?>" class="service-card__button">
                                                Saiba mais
                                            </a>
                                        </div>
                                    </article>
                                <?php } ?>

                                <?php if(isset($page_data->show_service_10) && $page_data->show_service_10 == 1) { ?>
                                    <article class="service__item service-card">
                                        <div class="service-card__header">
                                            <img src="<?= base_url($page_data->service_10_picture) ?>"
                                                alt="<?= $page_data->service_10_title ?>">
                                        </div>
                                        <div class="service-card__body">
                                            <h3 class="service-card__title">
                                                <?= $page_data->service_10_title ?>
                                            </h3>
                                            <p class="service-card__description">
                                                <?= $page_data->service_10_description ?>
                                            </p>
                                            <a href="<?= base_url("servicos/posto-de-combustivel") ?>" class="service-card__button">
                                                Saiba mais
                                            </a>
                                        </div>
                                    </article>
                                <?php } ?>

                                <?php if(isset($page_data->show_service_11) && $page_data->show_service_11 == 1) { ?>
                                    <article class="service__item service-card">
                                        <div class="service-card__header">
                                            <img src="<?= base_url($page_data->service_11_picture) ?>"
                                                alt="<?= $page_data->service_11_title ?>">
                                        </div>
                                        <div class="service-card__body">
                                            <h3 class="service-card__title">
                                                <?= $page_data->service_11_title ?>
                                            </h3>
                                            <p class="service-card__description">
                                                <?= $page_data->service_11_description ?>
                                            </p>
                                            <a href="<?= base_url("servicos/supermercado") ?>" class="service-card__button">
                                                Saiba mais
                                            </a>
                                        </div>
                                    </article>
                                <?php } ?>

                                <?php if(isset($page_data->show_service_12) && $page_data->show_service_12 == 1) { ?>
                                    <article class="service__item service-card">
                                        <div class="service-card__header">
                                            <img src="<?= base_url($page_data->service_12_picture) ?>"
                                                alt="<?= $page_data->service_12_title ?>">
                                        </div>
                                        <div class="service-card__body">
                                            <h3 class="service-card__title">
                                                <?= $page_data->service_12_title ?>
                                            </h3>
                                            <p class="service-card__description">
                                                <?= $page_data->service_12_description ?>
                                            </p>
                                            <a href="<?= base_url("servicos/unidade-de-graos") ?>" class="service-card__button">
                                                Saiba mais
                                            </a>
                                        </div>
                                    </article>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php } ?>

        <?php if(isset($page_data->news_section_show) && $page_data->news_section_show == 1) { ?>
            <section class="page-section bg-light-gray">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-md-flex align-items-end">
                                <h2 class="with-underline with-underline--flex" style="margin-bottom: 0;"><?= $page_data->news_section_title ?></h2>
                                <?= $page_data->news_section_description ?>
                            </div>
                        </div>
                    </div>
                    <?php if(isset($posts) && count($posts) > 0) { ?>
                        <?php
                                $feature = array_shift($posts);
                            ?>
                        <div class="row">
                            <div class="col-12">
                                <article class="post-preview post-preview--feature">
                                    <a href="<?= base_url(($feature->category_id == 1 ? "noticias" : "blog/$feature->category_slug")."/$feature->slug") ?>" class="post-preview__thumb">
                                        <img src="<?= base_url($feature->thumbnail) ?>" alt="Seminário de Precisão">
                                    </a>
                                    <div>
                                        <h4 class="post-preview__title">
                                            <a href="<?= base_url(($feature->category_id == 1 ? "noticias" : "blog/$feature->category_slug")."/$feature->slug") ?>">
                                                <?= $feature->title ?>
                                            </a>
                                        </h4>
                                        <p class="post-preview__excerpt">
                                            <a href="<?= base_url(($feature->category_id == 1 ? "noticias" : "blog/$feature->category_slug")."/$feature->slug") ?>">
                                                <?= $feature->excerpt ?>
                                            </a>
                                        </p>
                                        <a class="post-preview__link" href="<?= base_url(($feature->category_id == 1 ? "noticias" : "blog/$feature->category_slug")."/$feature->slug") ?>">Saiba
                                            Mais</a>
                                    </div>
                                </article>
                            </div>
                        </div>
                        <div class="row">
                            <?php foreach($posts as $post) { ?>
                            <div class="col-md-6 col-lg-3">
                                <article class="post-preview">
                                    <a href="<?= base_url(($post->category_id == 1 ? "noticias" : "blog/$post->category_slug")."/$post->slug") ?>" class="post-preview__thumb">
                                        <img src="<?= base_url($post->thumbnail) ?>" alt="Seminário de Precisão">
                                    </a>
                                    <h4 class="post-preview__title">
                                        <a href="<?= base_url(($post->category_id == 1 ? "noticias" : "blog/$post->category_slug")."/$post->slug") ?>">
                                            <?= $post->title ?>
                                        </a>
                                    </h4>
                                    <p class="post-preview__excerpt">
                                        <a href="<?= base_url(($post->category_id == 1 ? "noticias" : "blog/$post->category_slug")."/$post->slug") ?>">
                                            <?= $post->excerpt ?>
                                        </a>
                                    </p>
                                    <a class="post-preview__link" href="<?= base_url(($post->category_id == 1 ? "noticias" : "blog/$post->category_slug")."/$post->slug") ?>">Saiba Mais</a>
                                </article>
                            </div>
                            <?php } ?>
                        </div>
                    <?php } else { ?>
                        <p style="margin: 50px 0; text-align: center;">NENHUMA PUBLIÇÃO ENCONTRADA</p>
                    <?php } ?>
                </div>
            </section>
        <?php } ?>

        <?php if(isset($page_data->magazine_section_show) && $page_data->magazine_section_show == 1) { ?>
            <section class="page-section" id="magazine-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <picture>
                                <img id="magazine" src="<?= base_url($page_data->magazine_section_picture) ?>" alt="<?= $page_data->magazine_section_title ?>" />
                            </picture>
                        </div>
                        <div class="col-md-7">
                            <h2 class="with-underline" style="margin-left: 0;"><?= $page_data->magazine_section_title ?></h2>
                            <div style="margin-bottom: 30px;">
                            <?= $page_data->magazine_section_description ?>
                            </div>
                            <a href="<?= base_url("comunicacao/revista-canavieiros") ?>" class="button">
                                Saiba mais
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        <?php } ?>

        <?php if(isset($page_data->body_banner_section_show) && $page_data->body_banner_section_show == 1) { ?>
            <div id="cane-field">
                <img src="<?= base_url($page_data->body_banner_section_picture) ?>" alt="Canavial - Copercana">
            </div>
        <?php } ?>

        <?php if(
                (isset($page_data->agribusiness_section_show) && $page_data->agribusiness_section_show == 1) ||
                (isset($page_data->cooperated_section_show) && $page_data->cooperated_section_show == 1)) { ?>
            <section class="page-section bg-dark-green with-stripes">
                <div class="container">
                    <div class="row justify-content-between">
                    <?php if(isset($page_data->agribusiness_section_show) && $page_data->agribusiness_section_show == 1) { ?>
                        <div class="col-md-5 mb-5 mb-md-0">
                            <h2 class="text-white with-underline with-underline--to-left"
                                style="margin-left: 0; margin-right: 0;">
                                <span style="display: inline-block; max-width: 350px;">
                                    <?= $page_data->agribusiness_section_title ?>
                                </span>
                            </h2>
                            <?= $page_data->agribusiness_section_description ?>
                            <?php if(isset($page_data->agribusiness_section_link) && !empty($page_data->agribusiness_section_link)) { ?>
                                <a href="<?= $page_data->agribusiness_section_link ?>" class="button"  style="margin-top: 20px;">
                                    Saiba mais
                                </a>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <?php if(isset($page_data->cooperated_section_show) && $page_data->cooperated_section_show == 1) { ?>
                        <div class="col-md-5">
                            <h2 class="text-white with-underline with-underline--to-right"
                                style="margin-left: 0; margin-right: 0;">
                                <span style="display: inline-block; max-width: 350px;">
                                    <?= $page_data->cooperated_section_title ?>
                                </span>
                            </h2>
                            <?= $page_data->cooperated_section_description ?>
                            <?php if(isset($page_data->cooperated_section_link) && !empty($page_data->cooperated_section_link)) { ?>
                                <a href="<?= $page_data->cooperated_section_link ?>" class="button"  style="margin-top: 20px;">
                                    Saiba mais
                                </a>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </section>
        <?php } ?>

        <?php if(isset($offers) && count($offers) > 0) { ?>
        <?php if(isset($page_data->offers_section_show) && $page_data->offers_section_show == 1) { ?>
            <section class="page-section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-md-flex align-items-end">
                                <h2 class="with-underline with-underline--flex" style="margin-bottom: 0;"><?= $page_data->offers_section_title ?></h2>
                                <?= $page_data->offers_section_description ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="offers__carousel">
                                <?php foreach($offers as $offer) { 
                                    $starts_at = !isset($offer->starts_at) || empty($offer->starts_at) || $offer->starts_at === '0000-00-00 00:00:00' || $offer->starts_at === '0000-00-00' ? null : date_format(date_create($offer->starts_at),"d/m/Y");
                                    $ends_at = !isset($offer->ends_at) || empty($offer->ends_at) || $offer->ends_at === '0000-00-00 00:00:00'|| $offer->ends_at === '0000-00-00' ? null : date_format(date_create($offer->ends_at),"d/m/Y");
                                        
                                ?>
                                <div>
                                    <a class="offer" href="<?= base_url($offer->file) ?>" target="_blank" rel="noopener noreferrer">
                                        <img class="offer__cover" src="<?= base_url($offer->cover); ?>" alt="<?= $offer->cover ?>" class="img-fluid">
                                        <span class="offer__title"><?= $offer->title ?></span>
                                        <?php if((isset($starts_at) && $starts_at !== null) || (isset($ends_at) && $ends_at !== null)) { ?>
                                            <span class="offer__expires-at">
                                                <?php
                                                    if((isset($starts_at) && $starts_at !== null) && (!isset($ends_at) || $ends_at === null)) {
                                                        echo "a partir de ".$starts_at;
                                                    } else if((!isset($starts_at) || $starts_at === null) && (isset($ends_at) && $ends_at !== null)) {
                                                        echo "válido até ".$ends_at;
                                                    } else {
                                                        echo "de ".$starts_at." a ".$ends_at;
                                                    }
                                                ?>
                                            </span>
                                        <?php } ?>
                                    </a>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php } ?>
        <?php } ?>

        <?php if(isset($page_data->jobs_section_show) && $page_data->jobs_section_show == 1) { ?>
            <section class="page-section bg-light-gray">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-md-flex align-items-end">
                                <h2 class="with-underline with-underline--flex" style="margin-bottom: 0;"><?= $page_data->jobs_section_title ?></h2>
                                <?= $page_data->jobs_section_description ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-lg-4">
                            <a href="<?= base_url("trabalhe-conosco/cadastro") ?>" class="horizontal-card">
                                <div class="horizontal-card__picture">
                                    <img src="<?= base_url("_assets/images/cadastro-vagas.jpg") ?>"
                                        alt="Cadastrar/Atualizar - Vagas">
                                </div>
                                <div class="horizontal-card__content">
                                    Cadastrar<br />
                                    Atualizar
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4">
                            <a href="<?= base_url("trabalhe-conosco/vagas-disponiveis") ?>" class="horizontal-card">
                                <div class="horizontal-card__picture">
                                    <img src="<?= base_url("_assets/images/vagas-disponiveis.jpg") ?>" alt="Vagas Disponíveis">
                                </div>
                                <div class="horizontal-card__content">
                                    Vagas<br />
                                    Disponíveis
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4">
                            <a href="<?= base_url("trabalhe-conosco/jovem-aprendiz") ?>" class="horizontal-card">
                                <div class="horizontal-card__picture">
                                    <img src="<?= base_url("_assets/images/jovem-aprendiz-img.jpg") ?>"
                                        alt="Programa Jovem Aprendiz">
                                </div>
                                <div class="horizontal-card__content">
                                    Programa<br />
                                    Jovem<br />
                                    Aprendiz
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        <?php } ?>
    <?php } ?>
</main>