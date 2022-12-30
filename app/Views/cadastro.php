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
                    <h2 class="with-underline mx-0" style="margin-bottom: 0;"><?= $page_data->intro_section_title ?>
                    </h2>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <?= $page_data->intro_section_description ?>
                    <?php if(isset($page_data->intro_section_cta_text) && !empty($page_data->intro_section_cta_text) && isset($page_data->intro_section_cta_link) && !empty($page_data->intro_section_cta_link)) { ?>
                    <div class="d-flex justify-content-center">
                        <a class="button button--light-green button--block button--sm mx-auto my-4"
                            href="<?= $page_data->intro_section_cta_link ?>" target="_blank"
                            rel="noopener noreferrer"><?= $page_data->intro_section_cta_text ?></a>
                    </div>
                    <?php } ?>
                </div>
            
            </div>
        </div>
    </section>
    <?php } ?>

    <?php } ?>
</main>