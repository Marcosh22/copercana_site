<?php
    $socials = $general->socials;

    if(isset($socials) && !empty($socials)) {
        $socials = json_decode($socials);
    }
?>
<main>
    <?php if(isset($page_data)) { ?>
        <div class="container">
                <div class="row">
                    <div class="col-12">
                        <?php if(isset($page_data->intro_section_banner) && !empty($page_data->intro_section_banner)) { ?>
                            <div class="page_banner">
                                <picture>
                                    <source media="(max-width: 768px)" srcset="<?= base_url($page_data->intro_section_mobile_banner) ?>">
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
                            <h2 class="with-underline mx-0" style="margin-bottom: 0;"><?= $page_data->intro_section_title ?></h2>
                        </div>
                        <div class="col-12 mt-3">
                            <?= $page_data->intro_section_description ?>
                        </div>
                    </div>
                </div>
            </section>

            <?php if(isset($indications) && count($indications) > 0) { ?>
                <?php foreach($indications as $indication) { ?>
                <article class="unit">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-md-4 d-flex justify-content-center">
                                <img src="<?= base_url($indication->cover) ?>" alt="" class="unit__picture img-fluid">
                            </div>
                            <div class="col-12 col-md-8">
                                <h4 class="unit__title"><?= $indication->title ?></h4>
                                <div class="unit__address">
                                    <?= $indication->description ?>
                                </div>
                                <a href="<?= base_url($indication->file) ?>" class="button button--sm" target="_blank" rel="noopener noreferrer">
                                    Baixar
                                </a>
                            </div>
                        </div>
                    </div>
                </article>
                <div class="d-flex justify-content-center mx-auto my-4">
                <?= $pagination ?>
                </div>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    <?php } ?>
</main>