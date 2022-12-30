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
                <div class="col-12 mt-3">
                    <?= $page_data->intro_section_description ?>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php if(isset($page_data->quality_cert_section_show) && $page_data->quality_cert_section_show == 1) { ?>
    <section class="page-section bg-dark-green with-stripes">
        <div class="container">
            <div class="row">
                <div class="col-12 d-md-flex justify-content-between align-items-center">
                    <h2 class="text-white with-underline mx-0" style="margin-bottom: 0; max-width: 500px">
                        <?= $page_data->quality_cert_section_title ?></h2>
                    <?= $page_data->quality_cert_section_description ?>
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

    <?php if(isset($page_data->about_section_show) && $page_data->about_section_show == 1) { ?>
    <section class="page-section">
        <div class="container">
            <div class="row">
                <?php if(isset($page_data->about_section_title) && !empty($page_data->about_section_title)) { ?>
                <div class="col-12">
                    <h2 class="with-underline mx-0" style="margin-bottom: 0;"><?= $page_data->about_section_title ?>
                    </h2>
                </div>
                <?php } ?>
                <div class="col-12 mt-3">
                    <?= $page_data->about_section_description_01 ?>
                    <?php if(isset($page_data->about_section_cta_text) && !empty($page_data->about_section_cta_text) && isset($page_data->about_section_cta_link) && !empty($page_data->about_section_cta_link)) { ?>
                    <div class="d-flex justify-content-center">
                        <a class="button button--block button--sm mx-auto my-4"
                            href="<?= $page_data->about_section_cta_link ?>" target="_blank"
                            rel="noopener noreferrer"><?= $page_data->about_section_cta_text ?></a>
                    </div>
                    <?php } ?>
                    <?= $page_data->about_section_description_02 ?>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php if(isset($page_data->contact_section_show) && $page_data->contact_section_show == 1) { ?>
    <section class="page-section bg-dark-green">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?= $page_data->contact_section_description ?>
                    <h2 class="text-white with-underline mx-0" style="margin-bottom: 0;"></h2>
                </div>
                <?php if((isset($page_data->contact_section_phone) && !empty($page_data->contact_section_phone)) || (isset($page_data->contact_section_whatsapp) && !empty($page_data->contact_section_whatsapp))) { ?>
                <div class="col-12 d-md-flex justify-content-start align-items-center mt-3">
                    <h2 class="text-white ml-0 mb-0">
                        <?= $page_data->contact_section_title ?>
                    </h2>
                    <p class="text-white mb-0"
                        style="font-size: 1.2em; position: relative; top: 5px;">
                        <?php if(isset($page_data->contact_section_phone) && !empty($page_data->contact_section_phone)) { ?>
                        <a href="tel:<?= $page_data->contact_section_phone ?>" target="_blank" rel="noopener noreferrer" >
                            Tel.: <?= $page_data->contact_section_phone ?>
                            <?php } ?>


                            <?php if((isset($page_data->contact_section_phone) && !empty($page_data->contact_section_phone)) && (isset($page_data->contact_section_whatsapp) && !empty($page_data->contact_section_whatsapp))) { ?>
                            ou pelo
                            <?php } ?>

                            <?php if(isset($page_data->contact_section_whatsapp) && !empty($page_data->contact_section_whatsapp)) { ?>
                            <a href="https://api.whatsapp.com/send?phone=55<?= preg_replace("/[^0-9]/", "", $page_data->contact_section_whatsapp); ?>" target="_blank" rel="noopener noreferrer">
                                WhatsApp <?= $page_data->contact_section_whatsapp ?>&nbsp;
                                
                            </a>
                            <?php } ?>
                    </p>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php } ?>
</main>