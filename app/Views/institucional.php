<main>
    <?php if(isset($page_data)) { ?>
        <?php if(isset($page_data->about_us_section_show) && $page_data->about_us_section_show == 1) { ?>
            <section class="page-section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="with-underline mx-0" style="margin-bottom: 0;"><?= $page_data->about_us_section_title ?></h2>
                        </div>
                        <div class="col-12 mt-3">
                            <?= $page_data->about_us_section_description ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php } ?>

        <?php if(isset($page_data->video_section_show) && $page_data->video_section_show == 1 && isset($page_data->video_section_url) && !empty($page_data->video_section_url)) {
                $url = $page_data->video_section_url;
                $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_]+)\??/i';
                $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))(\w+)/i';
            
                if (preg_match($longUrlRegex, $url, $matches)) {
                    $youtube_id = $matches[count($matches) - 1];
                }
            
                if (preg_match($shortUrlRegex, $url, $matches)) {
                    $youtube_id = $matches[count($matches) - 1];
                }
                $fullEmbedUrl = 'https://www.youtube.com/embed/' . $youtube_id ;
            ?>
            <section class="page-section bg-light-gray">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="responsive-iframe">
                                <iframe frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen src="<?= $fullEmbedUrl; ?>"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php } ?>

        <?php if(
                (isset($page_data->mission_section_show) && $page_data->mission_section_show == 1) ||
                (isset($page_data->vision_section_show) && $page_data->vision_section_show == 1)) { ?>
            <section class="page-section bg-dark-green with-stripes">
                <div class="container">
                    <div class="row justify-content-between">
                    <?php if(isset($page_data->mission_section_show) && $page_data->mission_section_show == 1) { ?>
                        <div class="col-md-5 mb-5 mb-md-0">
                            <h2 class="text-white with-underline with-underline--to-left"
                                style="margin-left: 0; margin-right: 0;">
                                <span style="display: inline-block; max-width: 350px;">
                                    <?= $page_data->mission_section_title ?>
                                </span>
                            </h2>
                            <?= $page_data->mission_section_description ?>
                        </div>
                    <?php } ?>
                    <?php if(isset($page_data->vision_section_show) && $page_data->vision_section_show == 1) { ?>
                        <div class="col-md-5">
                            <h2 class="text-white with-underline with-underline--to-right"
                                style="margin-left: 0; margin-right: 0;">
                                <span style="display: inline-block; max-width: 350px;">
                                    <?= $page_data->vision_section_title ?>
                                </span>
                            </h2>
                            <?= $page_data->vision_section_description ?>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </section>
        <?php } ?>
        
        <?php if(isset($page_data->gallery_section_show) && $page_data->gallery_section_show == 1) { ?>
            <section class="inline-gallery inline-gallery--3x">
            <?php if(isset($page_data->gallery_section_picture_01) && !empty($page_data->gallery_section_picture_01)) { ?>
                    <img src="<?= base_url($page_data->gallery_section_picture_01) ?>" alt="" class="img-fluid">
                <?php } ?>
                <?php if(isset($page_data->gallery_section_picture_02) && !empty($page_data->gallery_section_picture_02)) { ?>
                    <img src="<?= base_url($page_data->gallery_section_picture_02) ?>" alt="" class="img-fluid">
                <?php } ?>
                <?php if(isset($page_data->gallery_section_picture_03) && !empty($page_data->gallery_section_picture_03)) { ?>
                    <img src="<?= base_url($page_data->gallery_section_picture_03) ?>" alt="" class="img-fluid">
                <?php } ?>
            </section>
        <?php } ?>

        <?php if(isset($page_data->board_section_show) && $page_data->board_section_show == 1) { ?>
                <section class="page-section institutional-council">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="with-underline mx-0" style="margin-bottom: 0;"><?= $page_data->board_section_title ?></h2>
                            </div>
                        </div>
                        <?php if(isset($page_data->council_01_section_show) && $page_data->council_01_section_show == 1) { ?>
                            <div class="row mt-5">
                                <div class="col-12">
                                    <h3 class="institutional-council__title"><?= $page_data->council_01_section_title ?></h3>
                                    <h4 class="institutional-council__term_of_office"><?= $page_data->council_01_section_term_of_office ?></h4>
                                </div>
                                <div class="col-12">
                                    <div class="ck-reset institutional-council__board">
                                        <?= $page_data->council_01_section_description ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </section>

                <?php if(isset($page_data->council_01_section_show) && $page_data->council_02_section_show == 1) { ?>
                <section class="page-section bg-light-gray institutional-council">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="institutional-council__title"><?= $page_data->council_02_section_title ?></h3>
                                <h4 class="institutional-council__term_of_office"><?= $page_data->council_02_section_term_of_office ?></h4>
                            </div>
                            <div class="col-12">
                                <div class="ck-reset institutional-council__board">
                                    <?= $page_data->council_02_section_description ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <?php } ?>
        <?php } ?>

        <?php if(isset($page_data->testimonials_section_show) && $page_data->testimonials_section_show == 1 && isset($testimonials) && count($testimonials) > 0) { ?>
            <section class="page-section bg-dark-green" id="testimonials">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="testimonials__carousel">
                                <?php foreach($testimonials as $testimonial) { ?>
                                    <div>
                                        <blockquote class="testimonial">
                                            <div class="testimonial__content">
                                                <h3 class="testimonial__title"><?= $testimonial->title ?></h3>
                                                <div class="testimonial__text">
                                                    <?= $testimonial->testimonial ?>
                                                </div>
                                            </div>
                                            <div class="testimonial__picture">
                                                <figure>
                                                    <img src="<?= isset($testimonial->picture) && !empty($testimonial->picture) ? base_url($testimonial->picture) : base_url("_assets/images/no-picture.jpg") ?>" alt="<?= $testimonial->name ?>">
                                                    <figcaption>
                                                        <cite class="testimonial__author"><?= $testimonial->name ?></cite>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                        </blockquote>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php } ?>
    <?php } ?>
</main>