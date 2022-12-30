<main>
    <?php if(isset($page_data)) { ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if(isset($page_data->solar_section_banner) && !empty($page_data->solar_section_banner)) { ?>
                <div class="page_banner">
                    <picture>
                        <source media="(max-width: 768px)"
                            srcset="<?= base_url($page_data->solar_section_mobile_banner) ?>">
                        <source media="(min-width: 768px)" srcset="<?= base_url($page_data->solar_section_banner) ?>">
                        <img src="<?= base_url($page_data->solar_section_banner) ?>" alt="" class="img-fluid">
                    </picture>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php if(isset($page_data->solar_section_show) && $page_data->solar_section_show == 1) { ?>
    <section class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="with-underline mx-0" style="margin-bottom: 0;"><?= $page_data->solar_section_title ?>
                    </h2>
                </div>
                <div class="col-12 mt-3">
                    <?= $page_data->solar_section_description ?>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php if(isset($page_data->photovoltaics_section_show) && $page_data->photovoltaics_section_show == 1) { ?>
    <section class="page-section bg-dark-green">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-white with-underline mx-0">
                        <?= $page_data->photovoltaics_section_title ?>
                    </h2>
                    <?= $page_data->photovoltaics_section_description ?>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php if(isset($page_data->benefits_section_show) && $page_data->benefits_section_show == 1) { ?>
    <section class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="with-underline mx-0" style="margin-bottom: 0;"><?= $page_data->benefits_section_title ?>
                    </h2>
                </div>
                <div class="col-12 mt-3">
                    <?= $page_data->benefits_section_description ?>
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

    <?php if(isset($page_data->doubts_section_show) && $page_data->doubts_section_show == 1) { ?>
    <section class="page-section bg-dark-green">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-white with-underline mx-0" style="margin-bottom: 0;">
                        <?= $page_data->doubts_section_title ?></h2>
                </div>
                <div class="col-12 mt-3">
                    <?= $page_data->doubts_section_description ?>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php if(isset($page_data->on_grid_section_show) && $page_data->on_grid_section_show == 1) { ?>
    <section class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="with-underline mx-0" style="margin-bottom: 0;"><?= $page_data->on_grid_section_title ?>
                    </h2>
                </div>
                <div class="col-12 mt-3">
                    <div class="ck-reset">
                        <?= $page_data->on_grid_section_description ?>
                    </div>
                    <?php if(isset($page_data->on_grid_section_cta_text) && !empty($page_data->on_grid_section_cta_text) && isset($page_data->on_grid_section_cta_link) && !empty($page_data->on_grid_section_cta_link)) { ?>
                    <div class="d-flex justify-content-center">
                        <a class="button button--block button--sm mx-auto"
                            href="<?= $page_data->on_grid_section_cta_link ?>" target="_blank"
                            rel="noopener noreferrer"><?= $page_data->on_grid_section_cta_text ?></a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php } ?>
</main>