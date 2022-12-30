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
                    <div class="d-flex flex-column flex-md-row justify-content-between my-4">
                        <a class="button button--outline button--block button--sm my-2"
                            href="https://www.gov.br/trabalho-e-previdencia/pt-br/composicao/orgaos-especificos/secretaria-de-trabalho/inspecao/escola" target="_blank"
                            rel="noopener noreferrer">Acesse Manual da Aprendizagem do TEM</a>

                        <div class="d-flex justify-content-center">
                            <a class="button button--outline button--block button--sm my-2"
                                href="https://www.planalto.gov.br/ccivil_03/Leis/L10097.htm" target="_blank"
                                rel="noopener noreferrer">Link da Lei 10.097/2000</a>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    </section>
    <?php } ?>

    <?php } ?>
</main>