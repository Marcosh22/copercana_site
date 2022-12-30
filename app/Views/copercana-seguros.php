<main>
    <?php if(isset($page_data)) { ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if(isset($page_data->insurance_section_banner) && !empty($page_data->insurance_section_banner)) { ?>
                <div class="page_banner">
                    <picture>
                        <source media="(max-width: 768px)"
                            srcset="<?= base_url($page_data->insurance_section_mobile_banner) ?>">
                        <source media="(min-width: 768px)"
                            srcset="<?= base_url($page_data->insurance_section_banner) ?>">
                        <img src="<?= base_url($page_data->insurance_section_banner) ?>" alt="" class="img-fluid">
                    </picture>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php if(isset($page_data->insurance_section_show) && $page_data->insurance_section_show == 1) { ?>
    <section class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="with-underline mx-0" style="margin-bottom: 0;"><?= $page_data->insurance_section_title ?>
                    </h2>
                </div>
            </div>
            <div class="row mt-3">

                <div class="col-md-8">
                    <?= $page_data->insurance_section_description ?>
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-center">
                    <?php if(isset($page_data->insurance_section_picture) && !empty($page_data->insurance_section_picture)) { ?>
                    <img src="<?= base_url($page_data->insurance_section_picture) ?>" alt="" class="img-fluid">
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php if(isset($page_data->coverage_section_show) && $page_data->coverage_section_show == 1) { ?>
    <section class="page-section bg-dark-green">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-md-flex align-items-end">
                        <h2 class="text-white with-underline with-underline--flex ml-0 mr-3" style="margin-bottom: 0;">
                            <?= $page_data->coverage_section_title ?></h2>
                        <?= $page_data->coverage_section_description ?>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12">
                    <?= $page_data->coverage_section_content ?>
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

    <?php if(isset($page_data->units_section_show) && $page_data->units_section_show == 1 && isset($units) && count($units) > 0) { ?>
    <section class="page-section bg-light-gray">
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

    <?php
        $chunk = array_chunk($units, 2, true);
    ?>
    <?php foreach($chunk as $key => $pieces) { ?>

    <section class="<?= $key % 2 === 0 ? "bg-light-gray" : "" ?>">
        <div class="container">
            <div class="row">
                <?php foreach($pieces as $unit) { ?>
                <div class="col-md-6">
                    <article class="unit unit--no-bg">
                        <h4 class="unit__title"><?= $unit->city ?>/<?= $unit->state ?></h4>
                        <?php if(isset($unit->address_link) && !empty($unit->address_link)) { ?>
                            <div class="unit__address">
                                <?= $unit->address ?>
                            </div>
                        <a href="<?= $unit->address_link ?>" class="button button--sm" target="_blank"
                            rel="noopener noreferrer">
                            Traçar Rota
                        </a>
                        <?php } ?>
                    </article>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <?php } ?>

    <?php } ?>

    <?php } ?>
</main>