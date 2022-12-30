<main>
    <?php if(isset($page_data)) { ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if(isset($page_data->intro_section_banner) && !empty($page_data->intro_section_banner)) { ?>
                <div class="page_banner">
                    <picture>
                        <source media="(max-width: 768px)"
                            srcset="<?= base_url($page_data->intro_section_mobile_banner) ?>">
                        <source media="(min-width: 768px)" srcset="<?= base_url($page_data->intro_section_banner) ?>">
                        <img src="<?= base_url($page_data->intro_section_banner) ?>" alt="" class="img-fluid">
                    </picture>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php if(isset($page_data->intro_section_show) && $page_data->intro_section_show == 1) { ?>
    <section class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-md-flex align-items-center">
                        <h2 class="with-underline with-underline--flex ml-0 mb-3 mb-md-0 mr-md-5 py-md-4" ><?= $page_data->intro_section_title ?></h2>
                        <?php if(isset($page_data->intro_section_logo) && !empty($page_data->intro_section_logo)) { ?>
                            <img class="ml-md-5" src="<?= base_url($page_data->intro_section_logo) ?>" alt="Emprapa" width="85" height="85">
                        <?php } ?>
                        <?php if(isset($page_data->intro_section_file) && !empty($page_data->intro_section_file)) { ?>
                            <a href="<?= base_url($page_data->intro_section_file) ?>" target="_blank" rel="noopener noreferrer">
                            <img class="ml-5" src="<?= base_url("_assets/images/pdf-download-btn.png") ?>" alt="Download PDF" width="150" height="85">
                            </a>
                        <?php } ?>
                    </div>
                    </h2>
                </div>
                <div class="col-12 mt-3">
                    <?= $page_data->intro_section_description ?>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php if(isset($page_data->bioas_section_show) && $page_data->bioas_section_show == 1) { ?>
    <section class="page-section bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="with-underline mx-0"><?= $page_data->bioas_section_title ?>
                    </h2>
                </div>
                <div class="col-12 mt-3 ck-reset">
                    <?= $page_data->bioas_section_description ?>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
    <?php } ?>
</main>