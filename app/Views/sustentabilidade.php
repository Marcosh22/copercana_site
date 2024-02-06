<main>
    <?php if(isset($page_data)) { ?>
        <?php if(isset($page_data->sustainability_section_show) && $page_data->sustainability_section_show == 1) { ?>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <?php if(isset($page_data->sustainability_section_banner) && !empty($page_data->sustainability_section_banner)) { ?>
                            <div class="page_banner">
                                <picture>
                                    <source media="(max-width: 768px)" srcset="<?= base_url($page_data->sustainability_section_mobile_banner) ?>">
                                    <source media="(min-width: 768px)" srcset="<?= base_url($page_data->sustainability_section_banner) ?>">
                                    <img src="<?= base_url($page_data->sustainability_section_banner) ?>" alt="" class="img-fluid">
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
                            <h2 class="with-underline mx-0" style="margin-bottom: 0;"><?= $page_data->sustainability_section_title ?></h2>
                        </div>
                        
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-8">
                            <?= $page_data->sustainability_section_description ?>
                        </div>
                        <div class="col-md-4 d-flex align-items-center justify-content-center">
                            <?php if(isset($page_data->sustainability_section_picture) && !empty($page_data->sustainability_section_picture)) { ?>
                                    <img src="<?= base_url($page_data->sustainability_section_picture) ?>" alt="" class="img-fluid">
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php } ?>

        <section class="page-section bg-light-gray" id="magazine-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="with-underline" style="margin-left: 0;"><?= $page_data->report_section_title ?></h2>
                        <div style="margin-bottom: 30px;">
                        <?= $page_data->report_section_description ?>
                        </div>
                        <?php if(isset($page_data->report_section_file) && !empty($page_data->report_section_file)) { ?>
                        <a class="button" href="<?= base_url($page_data->report_section_file) ?>" target="_blank" rel="noopener noreferrer">
                            Baixar
                        </a>
                        <?php } ?>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 20px;">
                    <div class="col-md-4">
                        <picture>
                            <img id="magazine" src="<?= base_url("_assets/images/capa-sustentabilidade-2022.png") ?>?v=01" alt="Relatório de sustentabilidade 2022" />
                        </picture>
                    </div>
                    <div class="col-md-8 d-flex flex-column justify-content-center">
                        <h3 style="color: #003406; font-weight: 900;">Relatório de sustentabilidade 2022</h3>
                        <a class="button" href="<?= base_url("files/relatorio-sustentabilidade-2022.pdf") ?>" target="_blank" rel="noopener noreferrer">
                            Baixar
                        </a>
                    </div>
                </div>
                <div class="row" style="margin-bottom: 20px;">
                    <div class="col-md-4">
                        <picture>
                            <img id="magazine" src="<?= base_url("_assets/images/capa-sustentabilidade-2021.png") ?>?v=01" alt="Relatório de sustentabilidade 2021" />
                        </picture>
                    </div>
                    <div class="col-md-8 d-flex flex-column justify-content-center">
                        <h3 style="color: #003406; font-weight: 900;">Relatório de sustentabilidade 2021</h3>
                        <a class="button" href="<?= base_url("files/relatorio-sustentabilidade-2021.pdf") ?>" target="_blank" rel="noopener noreferrer">
                            Baixar
                        </a>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
</main>