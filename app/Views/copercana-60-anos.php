<?php if(isset($page_data->intro_section_banner) && !empty($page_data->intro_section_banner)) { ?>
<picture>
    <source media="(max-width: 768px)" srcset="<?= base_url($page_data->intro_section_mobile_banner) ?>">
    <source media="(min-width: 768px)" srcset="<?= base_url($page_data->intro_section_banner) ?>">
    <img src="<?= base_url($page_data->intro_section_banner) ?>" alt="" class="img-fluid w-100">
</picture>
<?php } ?>

<main>
    <?php if(isset($page_data)) { ?>

    <?php if(isset($page_data->about_section_show) && $page_data->about_section_show == 1) { ?>
    <section class="page-section bg-secondary-dark-green with-stripes--laterals">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-6">
                    <h2 class="text-orange">
                        <?= $page_data->about_section_title ?>
                    </h2>
                    <?= $page_data->about_section_description ?>
                </div>
                <?php if(isset($page_data->about_section_video_url) && !empty($page_data->about_section_video_url)) {
                    $url = $page_data->about_section_video_url;
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
                <div class="col-md-6">
                    <div class="responsive-iframe">
                        <iframe frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen src="<?= $fullEmbedUrl; ?>"></iframe>
                    </div>
                </div>
                <?php } ?>

            </div>
        </div>
    </section>
    <?php } ?>

    <?php if(isset($page_data->celebration_section_show) && $page_data->celebration_section_show == 1) { ?>
    <section class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="with-underline text-orange mx-0" style="margin-bottom: 0;">
                        <?= $page_data->celebration_section_title ?></h2>
                </div>
                <div class="col-12">
                    <ul class="page-icon-navigation">
                        <li style="background-color: #F9B85A;">
                            <a href="#agronegocios-copercana">
                                <picture>
                                    <img src="<?= base_url("_assets/images/trator.png") ?>" alt=""
                                        srcset="<?= base_url("_assets/images/trator.png") ?> 1x, <?= base_url("_assets/images/trator@2x.png") ?> 2x">
                                </picture>
                                <p>Agronegócios<br />
                                    Copercana</p>
                            </a>
                        </li>
                        <li style="background-color: #FF9E01;">
                            <a href="#jantar-show-aniversario">
                                <picture>
                                    <img src="<?= base_url("_assets/images/tacas.png") ?>" alt=""
                                        srcset="<?= base_url("_assets/images/tacas.png") ?> 1x, <?= base_url("_assets/images/tacas@2x.png") ?> 2x">
                                </picture>
                                <p>Jantar/show<br />
                                    de aniversário</p>
                            </a>
                        </li>
                        <li style="background-color: #8E4B20;">
                            <a href="#orquestra-sinfonica">
                                <picture>
                                    <img src="<?= base_url("_assets/images/violino.png") ?>" alt=""
                                        srcset="<?= base_url("_assets/images/violino.png") ?> 1x, <?= base_url("_assets/images/violino@2x.png") ?> 2x">
                                </picture>
                                <p>Apresentação<br />
                                    Orquestra sinfônica</p>
                            </a>
                        </li>
                        <li style="background-color: #4A2610;">
                            <a href="#mundo-digital">
                                <picture>
                                    <img src="<?= base_url("_assets/images/notebook.png") ?>" alt=""
                                        srcset="<?= base_url("_assets/images/notebook.png") ?> 1x, <?= base_url("_assets/images/notebook@2x.png") ?> 2x">
                                </picture>
                                <p>60 anos digital</p>
                            </a>
                        </li>
                        <li style="background-color: #00A41D;">
                            <a href="#revista-canavieiros">
                                <picture>
                                    <img src="<?= base_url("_assets/images/revista.png") ?>" alt=""
                                        srcset="<?= base_url("_assets/images/revista.png") ?> 1x, <?= base_url("_assets/images/revista@2x.png") ?> 2x">
                                </picture>
                                <p>60 anos<br />
                                    canavieiros</p>
                            </a>
                        </li>
                        <li style="background-color: #007A2D;">
                            <a href="#diversos">
                                <picture>
                                    <img src="<?= base_url("_assets/images/diversos.png") ?>" alt=""
                                        srcset="<?= base_url("_assets/images/diversos.png") ?> 1x, <?= base_url("_assets/images/diversos@2x.png") ?> 2x">
                                </picture>
                                <p>diversos</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php if(isset($page_data->agrobusiness_section_show) && $page_data->agrobusiness_section_show == 1) { ?>
    <section class="page-section bg-beige copercana-60-anos-section" id="agronegocios-copercana">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <img src="<?= base_url($page_data->agrobusiness_section_picture) ?>" alt=""
                        class="img-fluid w-100 section-banner">
                </div>
                <div class="col-12">
                    <h2 class="text-black text-center title-smaller">
                        <?= $page_data->agrobusiness_section_title ?></h2>
                    <?= $page_data->agrobusiness_section_description ?>
                </div>

            </div>
        </div>
        <?php if(isset($galleryAgrobusiness) && count($galleryAgrobusiness) > 0) { ?>
        <div class="gallery__carousel light-gallery">
            <?php foreach($galleryAgrobusiness as $picture) { ?>
            <a href="<?= base_url($picture->picture) ?>" class="gallery-item">
                <img src="<?= base_url($picture->thumbnail) ?>" alt="<?= $picture->title ?>" class="img-fluid d-block">
            </a>
            <?php } ?>
        </div>
        <?php } ?>
    </section>
    <?php } ?>

    <?php if(isset($page_data->birthday_section_show) && $page_data->birthday_section_show == 1) { ?>
    <section class="page-section bg-orange copercana-60-anos-section" id="jantar-show-aniversario">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <img src="<?= base_url($page_data->birthday_section_picture) ?>" alt=""
                        class="img-fluid w-100 section-banner">
                </div>
                <div class="col-12">
                    <h2 class="text-white text-center title-smaller">
                        <?= $page_data->birthday_section_title ?></h2>
                    <?= $page_data->birthday_section_description ?>
                </div>

            </div>
        </div>
        <?php if(isset($galleryBirthday) && count($galleryBirthday) > 0) { ?>
        <div class="gallery__carousel light-gallery">
            <?php foreach($galleryBirthday as $picture) { ?>
            <a href="<?= base_url($picture->picture) ?>" class="gallery-item">
                <img src="<?= base_url($picture->thumbnail) ?>" alt="<?= $picture->title ?>" class="img-fluid d-block">
            </a>
            <?php } ?>
        </div>
        <?php } ?>
    </section>
    <?php } ?>

    <?php if(isset($page_data->orchestra_section_show) && $page_data->orchestra_section_show == 1) { ?>
    <section class="page-section bg-secondary-dark-green copercana-60-anos-section" id="orquestra-sinfonica">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <img src="<?= base_url($page_data->orchestra_section_picture) ?>" alt=""
                        class="img-fluid w-100 section-banner">
                </div>
                <div class="col-12">
                    <h2 class="text-white text-center title-smaller">
                        <?= $page_data->orchestra_section_title ?></h2>
                    <?= $page_data->orchestra_section_description ?>
                </div>

            </div>
        </div>
        <?php if(isset($galleryOrchestra) && count($galleryOrchestra) > 0) { ?>
        <div class="gallery__carousel light-gallery">
            <?php foreach($galleryOrchestra as $picture) { ?>
            <a href="<?= base_url($picture->picture) ?>" class="gallery-item">
                <img src="<?= base_url($picture->thumbnail) ?>" alt="<?= $picture->title ?>" class="img-fluid d-block">
            </a>
            <?php } ?>
        </div>
        <?php } ?>

    </section>
    <?php } ?>

    <?php if(isset($page_data->digital_section_show) && $page_data->digital_section_show == 1) { ?>
    <section class="page-section bg-darkest-green copercana-60-anos-section" id="mundo-digital">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <img src="<?= base_url($page_data->digital_section_picture) ?>" alt=""
                        class="img-fluid w-100 section-banner">
                </div>
                <div class="col-12">
                    <h2 class="text-white text-center title-smaller">
                        <?= $page_data->digital_section_title ?></h2>
                    <?= $page_data->digital_section_description ?>
                </div>

            </div>
        </div>
        <?php if(isset($galleryDigital) && count($galleryDigital) > 0) { ?>
        <div class="gallery__carousel light-gallery">
            <?php foreach($galleryDigital as $picture) { ?>
            <a href="<?= base_url($picture->picture) ?>" class="gallery-item">
                <img src="<?= base_url($picture->thumbnail) ?>" alt="<?= $picture->title ?>" class="img-fluid d-block">
            </a>
            <?php } ?>
        </div>
        <?php } ?>

    </section>
    <?php } ?>

    <?php if(isset($page_data->magazine_section_show) && $page_data->magazine_section_show == 1) { ?>
    <section class="page-section bg-orange copercana-60-anos-section" id="revista-canavieiros">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <img src="<?= base_url($page_data->magazine_section_picture) ?>" alt=""
                        class="img-fluid w-100 section-banner">
                </div>
                <div class="col-12">
                    <h2 class="text-white text-center title-smaller">
                        <?= $page_data->magazine_section_title ?></h2>
                    <?= $page_data->magazine_section_description ?>
                </div>

            </div>
        </div>
        <?php if(isset($galleryMagazine) && count($galleryMagazine) > 0) { ?>
        <div class="gallery__carousel light-gallery">
            <?php foreach($galleryMagazine as $picture) { ?>
            <a href="<?= base_url($picture->picture) ?>" class="gallery-item">
                <img src="<?= base_url($picture->thumbnail) ?>" alt="<?= $picture->title ?>" class="img-fluid d-block">
            </a>
            <?php } ?>
        </div>
        <?php } ?>

    </section>
    <?php } ?>

    <?php if(isset($page_data->miscellaneous_section_show) && $page_data->miscellaneous_section_show == 1) { ?>
    <section class="page-section bg-beige copercana-60-anos-section" id="diversos">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <img src="<?= base_url($page_data->miscellaneous_section_picture) ?>" alt=""
                        class="img-fluid w-100 section-banner">
                </div>
                <div class="col-12">
                    <h2 class="text-black text-center title-smaller">
                        <?= $page_data->miscellaneous_section_title ?></h2>
                    <?= $page_data->miscellaneous_section_description ?>
                </div>

            </div>
        </div>
        <?php if(isset($galleryMiscellaneous) && count($galleryMiscellaneous) > 0) { ?>
        <div class="gallery__carousel light-gallery">
            <?php foreach($galleryMiscellaneous as $picture) { ?>
            <a href="<?= base_url($picture->picture) ?>" class="gallery-item">
                <img src="<?= base_url($picture->thumbnail) ?>" alt="<?= $picture->title ?>" class="img-fluid d-block">
            </a>
            <?php } ?>
        </div>
        <?php } ?>

    </section>
    <?php } ?>

    <?php if(isset($page_data->experiences_section_show) && $page_data->experiences_section_show == 1) { ?>
    <section class="page-section copercana-60-anos-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="with-underline text-orange">
                        <?= $page_data->experiences_section_title ?></h2>
                    <?= $page_data->experiences_section_description ?>
                </div>
                <?php if(isset($videos) && count($videos) > 0) { 

                    function getVideoId($url) {
                        $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_]+)\??/i';
                        $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))(\w+)/i';
                    
                        if (preg_match($longUrlRegex, $url, $matches)) {
                            $youtube_id = $matches[count($matches) - 1];
                        }
                    
                        if (preg_match($shortUrlRegex, $url, $matches)) {
                            $youtube_id = $matches[count($matches) - 1];
                        }

                        return $youtube_id;
                    }
                    
                    function getVideoEmbedUrl($url) {
                        $youtube_id = getVideoId($url);
                        $fullEmbedUrl = 'https://www.youtube.com/embed/' . $youtube_id;

                        return $fullEmbedUrl;
                    }

                    function getVideoThumbnail($url) {
                        $youtube_id = getVideoId($url);
                        $thumbnail = 'https://img.youtube.com/vi/' . $youtube_id . '/0.jpg';

                        return $thumbnail;
                    }
                       
                    $currentActive = $videos[0];
                    ?>
                <div class="col-12">
                    <div class="active-video" id="active-video">
                        <div class="responsive-iframe">
                            <iframe id="active-video-iframe" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen src="<?= getVideoEmbedUrl($currentActive->url); ?>"></iframe>
                        </div>
                        <h3 id="active-video-title"><?= $currentActive->title ?></h3>
                        <h4 id="active-video-subtitle"><?= $currentActive->subtitle ?></h4>
                    </div>

                    <?php if(count($videos) > 1) { ?>
                    <div class="videos__carousel">
                        <?php foreach($videos as $video) { ?>
                        <div class="video-item__wrapper">
                            <a data-href="<?= getVideoEmbedUrl($video->url); ?>" data-title="<?= $video->title ?>"
                                data-subtitle="<?= $video->subtitle ?>" class="video-item">
                                <div class="video-item__picture">
                                    <img src="<?= getVideoThumbnail($video->url) ?>"
                                        alt="<?= $video->title ?> - <?= $video->subtitle ?>" class="img-fluid d-block">
                                    <svg height="32px" style="enable-background:new 0 0 32 32;" version="1.1"
                                        viewBox="0 0 32 32" width="32px" xml:space="preserve"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g id="Layer_1" />
                                        <g id="play_x5F_alt">
                                            <path
                                                d="M16,0C7.164,0,0,7.164,0,16s7.164,16,16,16s16-7.164,16-16S24.836,0,16,0z M10,24V8l16.008,8L10,24z   "
                                                style="fill:#FFF;" />
                                        </g>
                                    </svg>
                                </div>
                                <h3><?= $video->title ?></h3>
                                <h4><?= $video->subtitle ?></h4>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>
        </div>

    </section>
    <?php } ?>


    <?php if(isset($page_data->partners_section_show) && $page_data->partners_section_show == 1) { ?>
    <section class="page-section bg-secondary-dark-green">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="with-underline text-orange">
                        <?= $page_data->partners_section_title ?></h2>
                    <?= $page_data->partners_section_description ?>
                </div>
            </div>
        </div>
    </section>
    <?php if(isset($page_data->partners_section_premium_sponsors_show) && $page_data->partners_section_premium_sponsors_show == 1) { ?>
    <section class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="sponsors-title">Patrocinadores Premium</h2>
                    <img src="<?= base_url("_assets/images/patrocinadores-premiums.jpg") ?>" alt=""
                        class="img-fluid d-block">
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
    <?php if(isset($page_data->partners_section_sponsors_show) && $page_data->partners_section_sponsors_show == 1) { ?>
    <section class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="sponsors-title">Patrocinadores</h2>
                    <img src="<?= base_url("_assets/images/patrocinadores.jpg") ?>" alt="" class="img-fluid d-block">
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
    <?php } ?>

    <?php if(isset($page_data->share_section_show) && $page_data->share_section_show == 1) { ?>
    <section class="page-section bg-darkest-green">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="with-underline text-orange">
                        <?= $page_data->share_section_title ?></h2>
                    <?= $page_data->share_section_description ?>
                </div>

                <?php if(isset($files) && count($files) > 0) { ?>
                    <div class="col-12">
                    <div class="files__carousel">
                        <?php foreach($files as $file) { ?>
                        <div class="file-item__wrapper">
                            <a href="<?= base_url($file->file); ?>" class="file-item" download>
                                <div class="file-item__picture">
                                    <img src="<?= base_url($file->cover) ?>"
                                        alt="<?= $file->title ?> - <?= $file->subtitle ?>" class="img-fluid d-block">
                                        <svg fill="#FFF" height="800px" width="800px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
	 viewBox="0 0 29.978 29.978" xml:space="preserve">
<g>
	<path d="M25.462,19.105v6.848H4.515v-6.848H0.489v8.861c0,1.111,0.9,2.012,2.016,2.012h24.967c1.115,0,2.016-0.9,2.016-2.012
		v-8.861H25.462z"/>
	<path d="M14.62,18.426l-5.764-6.965c0,0-0.877-0.828,0.074-0.828s3.248,0,3.248,0s0-0.557,0-1.416c0-2.449,0-6.906,0-8.723
		c0,0-0.129-0.494,0.615-0.494c0.75,0,4.035,0,4.572,0c0.536,0,0.524,0.416,0.524,0.416c0,1.762,0,6.373,0,8.742
		c0,0.768,0,1.266,0,1.266s1.842,0,2.998,0c1.154,0,0.285,0.867,0.285,0.867s-4.904,6.51-5.588,7.193
		C15.092,18.979,14.62,18.426,14.62,18.426z"/>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
	<g>
	</g>
</g>
</svg>

                                </div>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                    </div>
                <?php } ?>

                <div class="col-12">
                    <?= $page_data->share_section_secondary_description ?>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php } ?>

</main>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center active"><svg stroke="#FFF" fill="#FFF" stroke-width="0" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"></path></svg></a>