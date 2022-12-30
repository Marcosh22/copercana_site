<?php
    $socials = $general->socials;

    if(isset($socials) && !empty($socials)) {
        $socials = json_decode($socials);
    }
?>

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

    <section class="inline-gallery inline-gallery--4x">
        <?php if(isset($page_data->intro_section_picture_01) && !empty($page_data->intro_section_picture_01)) { ?>
        <img src="<?= base_url($page_data->intro_section_picture_01) ?>" alt="" class="img-fluid">
        <?php } ?>
        <?php if(isset($page_data->intro_section_picture_02) && !empty($page_data->intro_section_picture_02)) { ?>
        <img src="<?= base_url($page_data->intro_section_picture_02) ?>" alt="" class="img-fluid">
        <?php } ?>
        <?php if(isset($page_data->intro_section_picture_03) && !empty($page_data->intro_section_picture_03)) { ?>
        <img src="<?= base_url($page_data->intro_section_picture_03) ?>" alt="" class="img-fluid">
        <?php } ?>
        <?php if(isset($page_data->intro_section_picture_04) && !empty($page_data->intro_section_picture_04)) { ?>
        <img src="<?= base_url($page_data->intro_section_picture_04) ?>" alt="" class="img-fluid">
        <?php } ?>
    </section>
    <?php } ?>

    <?php if(isset($page_data->gallery_section_show) && $page_data->gallery_section_show == 1 && isset($gallery) && count($gallery) > 0) { ?>
    <section class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="with-underline mx-0" style="margin-bottom: 0;">
                        <?= $page_data->gallery_section_title ?></h2>
                </div>
                <div class="col-12 mt-3">
                    <?= $page_data->gallery_section_description ?>
                </div>
                <div class="col-12">
                    <div class="gallery__carousel">
                        <?php foreach($gallery as $picture) { ?>
                            <div class="picture-preview light-gallery">
                                <a href="<?= base_url($picture->cover) ?>">
                                    <div class="picture-preview__picture">
                                        <img src="<?= base_url($picture->cover) ?>" alt="<?= $picture->title ?>" class="img-fluid">
                                        <p class="mt-2">
                                            <?= $picture->title ?><br/>
                                            <?php 
                                                $date = !isset($picture->date) || empty($picture->date) || $picture->date === '0000-00-00 00:00:00' || $picture->date === '0000-00-00' ? null : date_format(date_create($picture->date),"d/m/Y");
                                            ?>
                                            <?= $date ?>
                                        </p>
                                    </div>
                                </a>
                                <?php foreach($picture->pictures as $key => $pic) { ?>
                                    <a href="<?= base_url($pic->picture) ?>">
                                        <img src="<?= base_url($pic->thumbnail) ?>" alt="<?= $pic->title ?>" class="d-none">
                                    </a>
                                <?php  } ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php if(isset($page_data->address_section_show) && $page_data->address_section_show == 1) { ?>
    <section class="page-section bg-dark-green">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-white with-underline mx-0"><?= $page_data->address_section_title; ?></h2>
                </div>
                <div class="col-md-6">
                <?= $page_data->address_section_description; ?>
                </div>
                <div class="col-md-6">
                    <input type="hidden" name="lat" id="lat" value="<?= $page_data->address_section_lat ?>">
                    <input type="hidden" name="long" id="long" value="<?= $page_data->address_section_long ?>">
                    <input type="hidden" name="address" id="address" value="<?= $general->address ?>">
                    <p class="text-white"><strong>Como chegar:</strong></p>
                    <input class="search-route mb-3" id="origin_" name="origin_" placeholder="Digite seu endereço de partida">
                    <a href="#!" id="go" class="button button--light-green button--sm">Traçar Rota</a>
                </div>
            </div>
        </div>
    </section>
    <div id="map" class="map-container"></div>
    <?php } ?>

    <?php } ?>
</main>