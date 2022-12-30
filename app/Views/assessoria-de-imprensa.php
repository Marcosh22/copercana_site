<main>
    <?php if(isset($page_data)) { ?>
    <?php if(isset($page_data->intro_section_show) && $page_data->intro_section_show == 1) { ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if(isset($page_data->intro_section_banner) && !empty($page_data->intro_section_banner)) { ?>
                <div class="page_banner">
                    <picture>
                        <source media="(max-width: 768px)"
                            srcset="<?= base_url($page_data->intro_section_mobile_banner) ?>">
                        <source media="(min-width: 768px)"
                            srcset="<?= base_url($page_data->intro_section_banner) ?>">
                        <img src="<?= base_url($page_data->intro_section_banner) ?>" alt="" class="img-fluid">
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
                    <h2 class="with-underline ml-0" style="margin-bottom: 0;">
                        <?= $page_data->intro_section_title ?></h2>
                </div>
                <div class="col-12 mt-3">
                    <?= $page_data->intro_section_description ?>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php if(isset($page_data->contact_section_show) && $page_data->contact_section_show == 1) { ?>
    <section class="page-section bg-dark-green">
        <div class="container">
            <?php if(isset($page_data->contact_section_title) && !empty($page_data->contact_section_title)) { ?>
            <div class="row mb-4">
                <div class="col-12">
                    <h2 class="text-white with-underline mx-0" style="margin-bottom: 0;"><?= $page_data->contact_section_title ?></h2>
                </div>
            </div>
            <?php } ?>
            <div class="row">
                <div class="col-12">
                    <?= $page_data->contact_section_description ?>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php } ?>
</main>