<main>
    <?php if(isset($page_data)) { ?>
        <div class="container">
                <div class="row">
                    <div class="col-12">
                        <?php if(isset($page_data->grain_unit_section_banner) && !empty($page_data->grain_unit_section_banner)) { ?>
                            <div class="page_banner">
                                <picture>
                                    <source media="(max-width: 768px)" srcset="<?= base_url($page_data->grain_unit_section_mobile_banner) ?>">
                                    <source media="(min-width: 768px)" srcset="<?= base_url($page_data->grain_unit_section_banner) ?>">
                                    <img src="<?= base_url($page_data->grain_unit_section_banner) ?>" alt="" class="img-fluid">
                                </picture>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php if(isset($page_data->grain_unit_section_show) && $page_data->grain_unit_section_show == 1) { ?>
            <section class="page-section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="with-underline mx-0" style="margin-bottom: 0;"><?= $page_data->grain_unit_section_title ?></h2>
                        </div>
                        <div class="col-12 mt-3">
                            <?= $page_data->grain_unit_section_description ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php } ?>
        
        <?php if(isset($page_data->gallery_section_show) && $page_data->gallery_section_show == 1) { ?>
            <section class="inline-gallery inline-gallery--6x">
                <?php if(isset($page_data->gallery_section_picture_01) && !empty($page_data->gallery_section_picture_01)) { ?>
                    <img src="<?= base_url($page_data->gallery_section_picture_01) ?>" alt="" class="img-fluid">
                <?php } ?>
                <?php if(isset($page_data->gallery_section_picture_02) && !empty($page_data->gallery_section_picture_02)) { ?>
                    <img src="<?= base_url($page_data->gallery_section_picture_02) ?>" alt="" class="img-fluid">
                <?php } ?>
                <?php if(isset($page_data->gallery_section_picture_03) && !empty($page_data->gallery_section_picture_03)) { ?>
                    <img src="<?= base_url($page_data->gallery_section_picture_03) ?>" alt="" class="img-fluid">
                <?php } ?>
                <?php if(isset($page_data->gallery_section_picture_04) && !empty($page_data->gallery_section_picture_04)) { ?>
                    <img src="<?= base_url($page_data->gallery_section_picture_04) ?>" alt="" class="img-fluid">
                <?php } ?>
                <?php if(isset($page_data->gallery_section_picture_05) && !empty($page_data->gallery_section_picture_05)) { ?>
                    <img src="<?= base_url($page_data->gallery_section_picture_05) ?>" alt="" class="img-fluid">
                <?php } ?>
                <?php if(isset($page_data->gallery_section_picture_06) && !empty($page_data->gallery_section_picture_06)) { ?>
                    <img src="<?= base_url($page_data->gallery_section_picture_06) ?>" alt="" class="img-fluid">
                <?php } ?>
            </section>
        <?php } ?>

        <?php if(isset($page_data->units_section_show) && $page_data->units_section_show == 1 && isset($units) && count($units) > 0) { ?>
            <section class="page-section bg-light-gray">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-md-flex align-items-end">
                                <h2 class="with-underline with-underline--flex ml-0 mr-3" style="margin-bottom: 0;"><?= $page_data->units_section_title ?></h2>
                                <?= $page_data->units_section_description ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <?php foreach($units as $unit) { ?>
            <article class="unit">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-5">
                            <img src="<?= base_url($unit->picture) ?>" alt="" class="unit__picture img-fluid">
                        </div>
                        <div class="col-12 col-md-6 col-lg-7 d-flex align-items-center">
                            <div>
                                <h4 class="unit__title"><?= $unit->city ?>/<?= $unit->state ?></h4>
                                <div class="unit__address">
                                    <?= $unit->address ?>
                                </div>
                                <div class="unit__opening-hours">
                                    <?= $unit->opening_hours ?>
                                </div>
                                <?php if(isset($unit->address_link) && !empty($unit->address_link)) { ?>
                                    <a href="<?= $unit->address_link ?>" class="button button--sm" target="_blank" rel="noopener noreferrer">
                                        Traçar Rota
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
            <?php } ?>
        <?php } ?>

    <?php } ?>
</main>