<main>
    <?php if(isset($page_data)) { ?>
        <?php if(isset($page_data->cooperativism_section_show) && $page_data->cooperativism_section_show == 1) { ?>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <?php if(isset($page_data->cooperativism_section_banner) && !empty($page_data->cooperativism_section_banner)) { ?>
                            <div class="page_banner">
                                <picture>
                                    <source media="(max-width: 768px)" srcset="<?= base_url($page_data->cooperativism_section_mobile_banner) ?>">
                                    <source media="(min-width: 768px)" srcset="<?= base_url($page_data->cooperativism_section_banner) ?>">
                                    <img src="<?= base_url($page_data->cooperativism_section_banner) ?>" alt="" class="img-fluid">
                                </picture>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <section class="page-section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="with-underline mx-0" style="margin-bottom: 0;"><?= $page_data->cooperativism_section_title ?></h2>
                        </div>
                        
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="ck-reset cooperativism_description" id="coperativism-description">
                                <?= $page_data->cooperativism_section_description ?>
                            </div>
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

        <?php if(isset($page_data->principles_section_show) && $page_data->principles_section_show == 1) { ?>
            <section class="page-section bg-dark-green">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="text-white with-underline mx-0">
                                <?= $page_data->principles_section_title ?>
                            </h2>
                            <?= $page_data->principles_section_description ?>
                        </div>
                    </div>
                </div>
            </section>

            <section class="page-section">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-12 col-md-6 col-lg-5">
                            <div class="principle">
                            <h3>
                                <?= $page_data->principle_01_section_title ?>
                            </h3>
                            <?= $page_data->principle_01_section_description ?>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-5">
                            <div class="principle">
                            <h3>
                                <?= $page_data->principle_02_section_title ?>
                            </h3>
                            <?= $page_data->principle_02_section_description ?>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-5">
                            <div class="principle">
                            <h3>
                                <?= $page_data->principle_03_section_title ?>
                            </h3>
                            <?= $page_data->principle_03_section_description ?>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-5">
                            <div class="principle">
                            <h3>
                                <?= $page_data->principle_04_section_title ?>
                            </h3>
                            <?= $page_data->principle_04_section_description ?>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-5">
                            <div class="principle">
                            <h3>
                                <?= $page_data->principle_05_section_title ?>
                            </h3>
                            <?= $page_data->principle_05_section_description ?>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-5">
                            <div class="principle">
                            <h3>
                                <?= $page_data->principle_06_section_title ?>
                            </h3>
                            <?= $page_data->principle_06_section_description ?>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-5">
                            <div class="principle">
                            <h3>
                                <?= $page_data->principle_07_section_title ?>
                            </h3>
                            <?= $page_data->principle_07_section_description ?>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-5">
                            <img class="img-fluid w-100" src="<?= base_url($page_data->principles_section_picture) ?>" alt="">
                        </div>
                    </div>
                </div>
            </section>

        <?php } ?>

    <?php } ?>
</main>