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
            <div class="row mt-3">

                <div class="col-md-8">
                    <?= $page_data->intro_section_description ?>
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-center">
                    <?php if(isset($page_data->intro_section_picture) && !empty($page_data->intro_section_picture)) { ?>
                    <img src="<?= base_url($page_data->intro_section_picture) ?>" alt="" class="img-fluid">
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <?php if(isset($jobs) && count($jobs) > 0) { ?>

    <?php
        $chunk = array_chunk($jobs, 2, true);
    ?>
    <?php foreach($chunk as $key => $pieces) { 
        
        ?>

    <section class="<?= $key % 2 === 0 ? "bg-light-gray" : "" ?>">
        <div class="container">
            <div class="row">
                <?php foreach($pieces as $job) { 
                    $created_at = !isset($job->created_at) || empty($job->created_at) || $job->created_at === '0000-00-00 00:00:00' || $job->created_at === '0000-00-00' ? null : date_format(date_create($job->created_at),"d/m/Y");
                    ?>
                <div class="col-md-6">
                    <article class="unit unit--no-bg <?= $job->type == 1 ? ' is-pcd-job' : '' ?>">
                        <div>
                            <h4 class="unit__title">
                                <?= ((int)$job->quantity <= 1 ? "0" : "") . $job->quantity ?>&nbsp;
                                Vaga<?= ((int)$job->quantity > 1 ? "s" : "") ?>&nbsp;de
                                <?= ucfirst(mb_strtolower($job->title)) ?>
                            </h4>
                            <div class="unit__address">
                                <?= $job->city ?>&nbsp;/<?= $job->uf ?><br />
                                <?= $created_at ?>
                            </div>
                            <a href="<?= base_url("trabalhe-conosco/vagas-disponiveis/".$job->id) ?>" class="button button--sm">
                                Saiba mais
                            </a>
                        </div>
                    </article>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <?php } ?>

    <?php } else { ?>
        <p class="not-found" style="margin: 80px 0; text-align: center;">NENHUMA VAGA DISPONÍVEL</p>
    <?php } ?>
    <?php } ?>

    <?php } ?>
</main>