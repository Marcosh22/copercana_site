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
    <?php } ?>

    <?php 
        $updated_at = !isset($job->updated_at) || empty($job->updated_at) || $job->updated_at === '0000-00-00 00:00:00' || $job->updated_at === '0000-00-00' ? null : date_format(date_create($job->updated_at),"d/m/Y");
    ?> 
    <section class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-12" id="job">
                    <h1><?= $job->title; ?></h1>
                    <div class="job-description<?= $job->type == 1 ? ' is-pcd-job' : '' ?>">
                        <p><strong>Alterado em:&nbsp;</strong><?= $updated_at; ?></p>
                        <p>
                            <strong>Número de Vagas:&nbsp;</strong><?= ((int)$job->quantity <= 1 ? "0" : "") . $job->quantity ?>&nbsp;Vaga<?= ((int)$job->quantity > 1 ? "s" : "") ?><br/>
                            <strong>Escolaridade:&nbsp;</strong><?= $job->grade; ?><br/>
                            <strong>Cidade:&nbsp;</strong><?= $job->city; ?>&nbsp;/<?= $job->uf; ?>
                        </p>
                        <p>
                            <strong>Cargo:&nbsp;</strong><?= $job->role; ?><br/>
                            <strong>Salário:&nbsp;</strong>À combinar<br/>
                            <strong>Modalidade:&nbsp;</strong><?= $job->modality; ?>
                            <?php if(isset($job->activity) && !empty($job->activity)) { ?>
                                <br/><strong>Ramo de Atividade:&nbsp;</strong><?= $job->activity; ?>
                            <?php } ?>
                            <?php if(isset($job->workload) && !empty($job->workload)) { ?>
                                <br/><strong>Carga Horária:&nbsp;</strong><?= $job->workload; ?>
                            <?php } ?>
                        </p>
                        <p><strong>Descrição:</strong></p>
                        <?= $job->description; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>