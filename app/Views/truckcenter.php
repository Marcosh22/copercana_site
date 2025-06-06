<?php
$socials = $general->socials;

if (isset($socials) && !empty($socials)) {
    $socials = json_decode($socials);
}
?>

<main>
    <?php if (isset($page_data)) { ?>
        <?php if (isset($banners) && count($banners) > 0) { ?>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div id="main-carousel" class="carousel slide" data-ride="carousel">
                            <?php if (count($banners) > 1) { ?>
                                <ol class="carousel-indicators">
                                    <?php foreach ($banners as $key => $banner) { ?>
                                        <li data-target="#main-carousel" data-slide-to="<?= $key; ?>"
                                            class="<?= $key === 0 ? 'active' : ''; ?>" aria-current="<?= $key === 0 ? 'true' : ''; ?>"
                                            aria-label="Slide <?= $key + 1; ?>"></li>
                                    <?php } ?>
                                </ol>
                            <?php } ?>

                            <div class="carousel-inner">

                                <?php foreach ($banners as $key => $banner) { ?>
                                    <div class="carousel-item <?= $key === 0 ? 'active' : ''; ?>">
                                        <?php if (isset($banner->link) && !empty($banner->link)) { ?>
                                            <a href="<?= $banner->link ?>" target="<?= $banner->link_target ?>"
                                                onclick="increment_banner_click_count(<?= $banner->id ?>)">
                                            <?php } ?>
                                            <picture>
                                                <source media="(max-width: 768px)" srcset="<?= base_url($banner->mobile_picture) ?>">
                                                <source media="(min-width: 768px)" srcset="<?= base_url($banner->desktop_picture) ?>">
                                                <img src="<?= base_url($banner->desktop_picture) ?>" class="d-block w-100"
                                                    alt="<?= $banner->title ?>">
                                            </picture>
                                            <?php if (isset($banner->link) && !empty($banner->link)) { ?>
                                            </a>
                                        <?php } ?>
                                    </div>
                                <?php } ?>

                            </div>
                            <?php if (count($banners) > 1) { ?>
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
        <!--         <?php if (isset($page_data->truckcenter_section_show) && $page_data->truckcenter_section_show == 1) { ?>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <?php if (isset($page_data->truckcenter_section_banner) && !empty($page_data->truckcenter_section_banner)) { ?>
                            <div class="page_banner">
                                <picture>
                                    <source media="(max-width: 768px)"
                                        srcset="<?= base_url($page_data->truckcenter_section_mobile_banner) ?>">
                                    <source media="(min-width: 768px)"
                                        srcset="<?= base_url($page_data->truckcenter_section_banner) ?>">
                                    <img src="<?= base_url($page_data->truckcenter_section_banner) ?>" alt="" class="img-fluid">
                                </picture>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div> -->
        <section class="page-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="mx-0" style="margin-bottom: 0;"><?= $page_data->truckcenter_section_title ?></h2>
                        <p class="with-underline mx-0" style="margin-bottom: 0;">
                            <?= $page_data->truckcenter_section_subtitle ?></p>
                    </div>

                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="ck-reset truckcenter_description">
                            <?= $page_data->truckcenter_section_description ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>

    <?php if (isset($page_data->services_section_show) && $page_data->services_section_show == 1 && isset($services) && count($services) > 0) { ?>
        <div class="bg-light-gray">
            <section class="page-section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-md-flex align-items-end">
                                <h2 class="with-underline with-underline--flex ml-0 mr-3" style="margin-bottom: 0;">
                                    <?= $page_data->services_section_title ?></h2>
                                <?= $page_data->services_section_description ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="truckcenter_services">
                                <?php foreach ($services as $service) { ?>
                                    <div class="truckcenter_service">
                                        <div class="truckcenter_service__icon">
                                            <img src="<?= base_url($service->icon) ?>" alt="">
                                        </div>
                                        <h3 class="truckcenter_service__title"><?= $service->title ?></h3>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    <?php } ?>


    <?php if (isset($page_data->units_section_show) && $page_data->units_section_show == 1 && isset($units) && count($units) > 0) { ?>
        <section class="page-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="d-md-flex align-items-end">
                            <h2 class="with-underline with-underline--flex ml-0 mr-3" style="margin-bottom: 0;">
                                <?= $page_data->units_section_title ?></h2>
                            <?= $page_data->units_section_description ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php foreach ($units as $unit) { ?>
            <article class="unit" style="background-color: #FFF;">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-5 order-md-1">
                            <img src="<?= base_url($unit->picture) ?>" alt="" class="unit__picture img-fluid">
                        </div>
                        <div class="col-12 col-md-6 col-lg-7 order-md-0">
                            <h4 class="unit__title"><?= $unit->city ?>/<?= $unit->state ?></h4>
                            <div class="unit__address">
                                <?= $unit->address ?>
                            </div>
                            <div class="unit__opening-hours">
                                <?= $unit->opening_hours ?>
                            </div>
                            <?php if (isset($unit->address_link) && !empty($unit->address_link)) { ?>
                                <a href="<?= $unit->address_link ?>" class="button button--sm" target="_blank"
                                    rel="noopener noreferrer">
                                    Traçar Rota
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </article>
        <?php } ?>
    <?php } ?>

<?php } ?>
</main>