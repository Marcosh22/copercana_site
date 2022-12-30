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
                        <?php if(isset($page_data->supermarket_section_banner) && !empty($page_data->supermarket_section_banner)) { ?>
                            <div class="page_banner">
                                <picture>
                                    <source media="(max-width: 768px)" srcset="<?= base_url($page_data->supermarket_section_mobile_banner) ?>">
                                    <source media="(min-width: 768px)" srcset="<?= base_url($page_data->supermarket_section_banner) ?>">
                                    <img src="<?= base_url($page_data->supermarket_section_banner) ?>" alt="" class="img-fluid">
                                </picture>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php if(isset($page_data->supermarket_section_show) && $page_data->supermarket_section_show == 1) { ?>
            <section class="page-section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="with-underline mx-0" style="margin-bottom: 0;"><?= $page_data->supermarket_section_title ?></h2>
                        </div>
                        <div class="col-12 mt-3">
                            <?= $page_data->supermarket_section_description ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php } ?>

        <?php if(isset($page_data->offers_section_show) && $page_data->offers_section_show == 1) { ?>
            <section class="page-section bg-dark-green">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-md-flex align-items-end">
                                <h2 class="text-white with-underline with-underline--flex ml-0 mr-3" style="margin-bottom: 0;"><?= $page_data->offers_section_title ?></h2>
                                <?= $page_data->offers_section_description ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="offers__carousel">
                                <?php foreach($offers as $offer) { 
                                    $starts_at = !isset($offer->starts_at) || empty($offer->starts_at) || $offer->starts_at === '0000-00-00 00:00:00' || $offer->starts_at === '0000-00-00' ? null : date_format(date_create($offer->starts_at),"d/m/Y");
                                    $ends_at = !isset($offer->ends_at) || empty($offer->ends_at) || $offer->ends_at === '0000-00-00 00:00:00'|| $offer->ends_at === '0000-00-00' ? null : date_format(date_create($offer->ends_at),"d/m/Y");
                                        
                                ?>
                                <div>
                                    <a class="offer" href="<?= base_url($offer->file) ?>" target="_blank" rel="noopener noreferrer">
                                        <img class="offer__cover" src="<?= base_url($offer->cover); ?>" alt="<?= $offer->cover ?>" class="img-fluid">
                                        <span class="offer__title"><?= $offer->title ?></span>
                                        <?php if((isset($starts_at) && $starts_at !== null) || (isset($ends_at) && $ends_at !== null)) { ?>
                                            <span class="offer__expires-at">
                                                <?php
                                                    if((isset($starts_at) && $starts_at !== null) && (!isset($ends_at) || $ends_at === null)) {
                                                        echo "a partir de ".$starts_at;
                                                    } else if((!isset($starts_at) || $starts_at === null) && (isset($ends_at) && $ends_at !== null)) {
                                                        echo "válido até ".$ends_at;
                                                    } else {
                                                        echo "de ".$starts_at." a ".$ends_at;
                                                    }
                                                ?>
                                            </span>
                                        <?php } ?>
                                    </a>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php } ?>

        <?php if(isset($page_data->units_section_show) && $page_data->units_section_show == 1 && isset($units) && count($units) > 0) { ?>
            <section class="page-section bg-light-gray">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-md-flex align-items-end">
                                <h2 class="with-underline with-underline--flex ml-0 mr-3" style="margin-bottom: 0;"><?= $page_data->units_section_title ?></h2>
                                <?= $page_data->units_section_description ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <?php foreach($units as $unit) { ?>
            <article class="unit">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-5">
                            <img src="<?= base_url($unit->picture) ?>" alt="" class="unit__picture img-fluid">
                        </div>
                        <div class="col-12 col-md-6 col-lg-7">
                            <h4 class="unit__title"><?= $unit->city ?>/<?= $unit->state ?></h4>
                            <div class="unit__address">
                                <?= $unit->address ?>
                            </div>
                            <div class="d-lg-flex justify-content-between align-items-center">
                                <div class="unit__opening-hours">
                                    <?= $unit->opening_hours ?>
                                </div>
                                <?php if(isset($unit->address_link) && !empty($unit->address_link)) { ?>
                                    <a href="<?= $unit->address_link ?>" class="button button--sm" target="_blank" rel="noopener noreferrer">
                                        Traçar Rota
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
            <?php } ?>
        <?php } ?>
        <?php
            if(
                isset($socials) && 
                isset($socials->supermarket) &&
                (
                    (isset($socials->supermarket->facebook) && !empty($socials->supermarket->facebook)) ||
                    (isset($socials->supermarket->instagram) && !empty($socials->supermarket->instagram)) ||
                    (isset($socials->supermarket->youtube) && !empty($socials->supermarket->youtube)) ||
                    (isset($socials->supermarket->linkedin) && !empty($socials->supermarket->linkedin))
                )
            ) { ?>
    <section class="page-section bg-dark-green">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page-socials-wrapper">
                        <p class="text-white">
                            <strong>
                                Acesse as redes sociais
                            </strong>
                            <br />
                                dos Postos de Combustíveis
                        </p>
                        <div class="page-socials">
                            <?php if(isset($socials->supermarket->facebook) && !empty($socials->supermarket->facebook)) { ?>
                            <a href="<?= $socials->supermarket->facebook ?>" target="_blank" class="socials__item"
                                aria-label="Facebook">
                                <svg width="44" height="44" style="fill: #fff;" version="1.1" id="Layer_1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve">
                                    <title>Facebook</title>
                                    <path d="M481,258.1c0-124.3-100.8-225-225-225c-124.3,0-225,100.7-225,225c0,112.3,82.3,205.4,189.8,222.2V323.1h-57.1v-65h57.1
                                                                        v-49.6c0-56.4,33.5-87.5,85-87.5c24.6,0,50.4,4.4,50.4,4.4v55.4h-28.4c-27.9,0-36.6,17.4-36.6,35.2v42.2h62.4l-10,65h-52.4v157.2
                                                                        C398.7,463.4,481,370.3,481,258.1L481,258.1z">
                                    </path>
                                </svg>
                            </a>
                            <?php } ?>
                            <?php if(isset($socials->supermarket->instagram) && !empty($socials->supermarket->instagram)) { ?>
                            <a href="<?= $socials->supermarket->instagram ?>" target="_blank" class="socials__item"
                                aria-label="Instagram">
                                <svg width="40" height="40" style="fill: #fff;" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    x="0px" y="0px" viewBox="0 0 600 600" xml:space="preserve">
                                    <title>Instagram</title>
                                    <style type="text/css">
                                    .stinsta {
                                        fill: #005422;
                                    }
                                    </style>
                                    <g>
                                        <circle cx="300" cy="300" r="297.5"></circle>
                                        <path class="stinsta" d="M300,123.5c-47.9,0-54,0.2-72.8,1.1c-18.8,0.9-31.6,3.8-42.8,8.2c-11.6,4.5-21.5,10.5-31.3,20.4
                                                c-9.8,9.8-15.8,19.7-20.4,31.3c-4.4,11.2-7.4,24.1-8.2,42.8c-0.8,18.8-1.1,24.8-1.1,72.8c0,47.9,0.2,53.9,1.1,72.8
                                                c0.9,18.8,3.8,31.6,8.2,42.8c4.5,11.6,10.5,21.5,20.4,31.3c9.8,9.8,19.7,15.9,31.3,20.4c11.2,4.4,24.1,7.3,42.8,8.2
                                                c18.8,0.9,24.8,1.1,72.8,1.1c47.9,0,53.9-0.2,72.8-1.1c18.8-0.9,31.6-3.8,42.9-8.2c11.6-4.5,21.4-10.6,31.2-20.4
                                                c9.8-9.8,15.8-19.7,20.4-31.3c4.3-11.2,7.3-24,8.2-42.8c0.8-18.8,1.1-24.8,1.1-72.8c0-47.9-0.2-53.9-1.1-72.8
                                                c-0.9-18.8-3.9-31.6-8.2-42.8c-4.5-11.6-10.6-21.5-20.4-31.3c-9.8-9.8-19.6-15.8-31.3-20.4c-11.3-4.4-24.1-7.3-42.9-8.2
                                                C353.9,123.7,347.9,123.5,300,123.5L300,123.5z M284.2,155.3c4.7,0,9.9,0,15.8,0c47.1,0,52.7,0.2,71.3,1
                                                c17.2,0.8,26.5,3.7,32.8,6.1c8.2,3.2,14.1,7,20.3,13.2c6.2,6.2,10,12.1,13.2,20.3c2.4,6.2,5.3,15.6,6.1,32.8
                                                c0.8,18.6,1,24.2,1,71.3c0,47.1-0.2,52.7-1,71.3c-0.8,17.2-3.7,26.5-6.1,32.8c-3.2,8.2-7,14.1-13.2,20.3c-6.2,6.2-12,10-20.3,13.2
                                                c-6.2,2.4-15.6,5.3-32.8,6.1c-18.6,0.8-24.2,1-71.3,1c-47.1,0-52.7-0.2-71.3-1c-17.2-0.8-26.5-3.7-32.8-6.1
                                                c-8.2-3.2-14.1-7-20.3-13.2c-6.2-6.2-10-12.1-13.2-20.3c-2.4-6.2-5.3-15.6-6.1-32.8c-0.8-18.6-1-24.2-1-71.3
                                                c0-47.1,0.2-52.7,1-71.3c0.8-17.2,3.7-26.5,6.1-32.8c3.2-8.2,7-14.1,13.2-20.3c6.2-6.2,12.1-10,20.3-13.2
                                                c6.2-2.4,15.6-5.3,32.8-6.1C245,155.5,251.3,155.3,284.2,155.3L284.2,155.3z M394.2,184.6c-11.7,0-21.2,9.5-21.2,21.2
                                                c0,11.7,9.5,21.2,21.2,21.2c11.7,0,21.2-9.5,21.2-21.2C415.4,194.1,405.9,184.6,394.2,184.6L394.2,184.6z M300,209.4
                                                c-50.1,0-90.6,40.6-90.6,90.6c0,50.1,40.6,90.6,90.6,90.6c50.1,0,90.6-40.6,90.6-90.6C390.6,249.9,350.1,209.4,300,209.4L300,209.4
                                                z M300,241.2c32.5,0,58.8,26.3,58.8,58.8c0,32.5-26.3,58.8-58.8,58.8c-32.5,0-58.8-26.3-58.8-58.8
                                                C241.2,267.5,267.5,241.2,300,241.2z"></path>
                                    </g>
                                </svg>
                            </a>
                            <?php } ?>
                            <?php if(isset($socials->supermarket->youtube) && !empty($socials->supermarket->youtube)) { ?>
                                <a href="<?= $socials->supermarket->youtube ?>" class="socials__item" target="_blank" rel="noopener noreferrer" aria-label="Youtube">
                                    <svg width="40" height="40"
                                        id="Слой_1" x="0px" y="0px" viewBox="0 0 300 300"
                                        enable-background="new 0 0 400 400" xml:space="preserve" width="300"
                                        height="300">
                                        <title >Youtube</title>
                                        <defs id="defs15">
                                            <pattern y="0" x="0" height="6" width="6" patternUnits="userSpaceOnUse"
                                                id="EMFhbasepattern" />
                                        </defs>
                                        <g id="g4189" transform="scale(0.75,0.75)">
                                            <rect width="400" height="400" id="rect4"
                                                style="fill:#ffffff;fill-opacity:1" x="0" y="0" ry="200" />
                                            <g transform="matrix(7.8701756,0,0,7.8701756,695.19553,-948.4235)"
                                                id="g4167">
                                                <path
                                                    style="fill:#005422;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                                    d="M 149.9375 79.222656 C 149.9375 79.222656 86.718651 79.222715 70.851562 83.345703 C 62.355775 85.719505 55.360154 92.715203 52.986328 101.33594 C 48.863375 117.20304 48.863281 150.0625 48.863281 150.0625 C 48.863281 150.0625 48.863375 183.0467 52.986328 198.66406 C 55.360154 207.28468 62.230834 214.15544 70.851562 216.5293 C 86.843592 220.77718 149.9375 220.77734 149.9375 220.77734 C 149.9375 220.77734 213.28168 220.77729 229.14844 216.6543 C 237.76923 214.28049 244.63977 207.53464 246.88867 198.78906 C 251.1366 183.04674 251.13672 150.1875 251.13672 150.1875 C 251.13672 150.1875 251.26156 117.20304 246.88867 101.33594 C 244.63977 92.715203 237.76923 85.844606 229.14844 83.595703 C 213.28168 79.222856 149.9375 79.222656 149.9375 79.222656 z M 129.82227 119.70312 L 182.42188 150.0625 L 129.82227 180.29688 L 129.82227 119.70312 z "
                                                    transform="matrix(0.16941596,0,0,0.16941596,-88.332912,120.50856)"
                                                    id="path4156" />
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                            <?php } ?>
                            <?php if(isset($socials->supermarket->linkedin) && !empty($socials->supermarket->linkedin)) { ?>
                                <a href="<?= $socials->supermarket->linkedin ?>" target="_blank" class="socials__item" rel="noopener noreferrer" aria-label="LinkedIn">
                                    <svg width="40" height="40" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px"
                                        viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000"
                                        xml:space="preserve">
                                        <title >LinkedIn</title>
                                        <g>
                                            <path
                                            style="fill: #ffffff;"
                                                d="M500,10C229.4,10,10,229.4,10,500s219.4,490,490,490s490-219.4,490-490C990,229.3,770.6,10,500,10z M377.5,737.3H255V308.6h122.5V737.3z M320,282.3c-31.7,0-57.4-25.7-57.4-57.5c0-31.7,25.7-57.5,57.4-57.5c31.7,0.1,57.5,25.8,57.5,57.5C377.5,256.6,351.8,282.3,320,282.3z M806.3,737.3H683.8V472.3c0-31.1-8.9-52.8-47-52.8c-63.3,0-75.5,52.8-75.5,52.8v265.1H438.8V308.6h122.5v41c17.5-13.4,61.3-40.9,122.5-40.9c39.8,0,122.5,23.8,122.5,167.3V737.3z" />
                                        </g>
                                    </svg>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
    <?php } ?>
</main>