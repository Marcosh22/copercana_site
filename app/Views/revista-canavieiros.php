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
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-7">
                            <?= $page_data->intro_section_description ?>
                        </div>
                        <div class="col-md-5 d-flex align-items-center justify-content-center">
                            <?php if(isset($page_data->intro_section_logo) && !empty($page_data->intro_section_logo)) { ?>
                                    <img src="<?= base_url($page_data->intro_section_logo) ?>" alt="" class="img-fluid">
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php } ?>

        <?php if(isset($page_data->magazine_section_show) && $page_data->magazine_section_show == 1 && isset($magazines) && count($magazines) > 0) { ?>
            <section class="page-section bg-dark-green">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-md-flex align-items-end">
                                <h2 class="text-white with-underline with-underline--flex ml-0 mr-3" style="margin-bottom: 0;"><?= $page_data->magazine_section_title ?></h2>
                                <?= $page_data->magazine_section_description ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="offers__carousel">
                                <?php foreach($magazines as $magazine) { 
                                    $date = !isset($magazine->date) || empty($magazine->date) || $magazine->date === '0000-00-00 00:00:00' || $magazine->date === '0000-00-00' ? null : date_format(date_create($magazine->date),"m/Y");
                                ?>
                                <div>
                                    <a class="offer" href="<?= base_url($magazine->file) ?>" target="_blank" rel="noopener noreferrer">
                                        <img class="offer__cover" src="<?= base_url($magazine->cover); ?>" alt="<?= $magazine->cover ?>" class="img-fluid">
                                        <span class="offer__title"><?= $magazine->title ?></span>
                                        <span class="offer__expires-at">
                                            <?= $date?>
                                        </span>
                                    </a>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php } ?>
        <?php if(isset($page_data->contact_section_show) && $page_data->contact_section_show == 1) { ?>
            <section class="page-section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="with-underline mx-0" style="margin-bottom: 0;"><?= $page_data->contact_section_title ?></h2>
                        </div>
                        <div class="col-12 mt-3">
                            <?= $page_data->contact_section_description ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php } ?>
    <?php } ?>
</main>