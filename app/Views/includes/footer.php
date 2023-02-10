<div id="cookieNotice" class="light display-right" style="display: none;">
    <div id="closeIcon" style="display: none;">
    </div>
    <div class="title-wrap">
        <h3>Consentimento de Cookies</h3>
    </div>
    <div class="content-wrap">
        <div class="msg-wrap">
            <p>Este website utiliza cookies ou tecnologias semelhantes, para melhorar a sua experiência de navegação e
                fornecer recomendações personalizadas. Ao continuar a usar nosso site, você concorda com nossa <a
                    style="color:#115cfa;" href="<?= base_url("institucional/politica-de-privacidade") ?>">Política de Privacidade</a>
            </p>
            <div class="btn-wrap">
                <button class="btn-primary" onclick="acceptCookieConsent();">Aceitar</button>
            </div>
        </div>
    </div>
</div>

<!-- <div class="contact-bar">
    <div class="container">
        <div class="row">
            <div class="col-4 d-none d-md-flex align-items-center justify-content-center">
                <a class="site-header__logo" href="<?= base_url() ?>">
                    <picture>
                        <source media="(max-width: 992px)"
                            srcset="<?= base_url("_assets/images/copercana@0,75x.png") ?> 1x, <?= base_url("_assets/images/copercana@1,5x.png") ?> 2x">
                        <source media="(min-width: 992px)"
                            srcset="<?= base_url("_assets/images/copercana.png") ?> 1x, <?= base_url("_assets/images/copercana@2x.png") ?> 2x">
                        <img src="<?= base_url("_assets/images/copercana.png") ?>" alt="Copercana">
                    </picture>
                </a>
            </div>

            <?php if(isset($general->phone) && !empty($general->phone)) { ?>
                <div class="col-6 col-md-4 d-flex align-items-center justify-content-center">
                    <a href="tel:<?= $general->phone ?>" target="_blank" rel="noopener noreferrer">
                        <div class="contact">
                            <div class="contact__icon">
                                <svg width="40" height="40" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 60 60"><defs><clipPath id="clip-path"><rect class="footer-phone-cls-1" width="60" height="60"/></clipPath></defs><title>phone</title><g id="Camada_2" data-name="Camada 2"><g id="Camada_1-2" data-name="Camada 1"><g class="footer-phone-cls-2"><path class="footer-phone-cls-3" d="M39,51.4A7.6,7.6,0,0,1,31.4,59,30.4,30.4,0,0,1,1,28.6,7.6,7.6,0,0,1,8.6,21a7.47,7.47,0,0,1,1.26.11l.2,0a1.84,1.84,0,0,1,1.47,1.5l1.92,11.3a.62.62,0,0,1-.34.65l-2.74,1.32a.62.62,0,0,0-.3.76A22.9,22.9,0,0,0,23.3,49.92a.61.61,0,0,0,.76-.3c.45-.89,1.35-2.74,1.35-2.74a.62.62,0,0,1,.65-.33l11.3,1.92a1.84,1.84,0,0,1,1.5,1.47l0,.2A7.47,7.47,0,0,1,39,51.4Z"/><path class="footer-phone-cls-4" d="M21,20A19,19,0,1,1,31.89,37.19L27.26,39a.78.78,0,0,1-1.05-.71l-.36-5.56A19,19,0,0,1,21,20Z"/><path class="footer-phone-cls-5" d="M39,20.5A1.5,1.5,0,1,1,40.5,22,1.5,1.5,0,0,1,39,20.5"/><path class="footer-phone-cls-5" d="M47,20.5A1.5,1.5,0,1,1,48.5,22,1.5,1.5,0,0,1,47,20.5"/><path class="footer-phone-cls-5" d="M31,20.5A1.5,1.5,0,1,1,32.5,22,1.5,1.5,0,0,1,31,20.5"/></g></g></g></svg>
                            </div>
                            <p class="contact__description text-white">
                                <strong>CONTATO MATRIZ:</strong><br/>
                                +55 16 3946 3300
                            </p>
                        </div>
                    </a>
                </div>
            <?php } ?>

            <?php if(isset($general->address) && !empty($general->address)) { ?>
                <div class="col-6 col-md-4 d-flex align-items-center justify-content-center">
                <?php if(isset($general->address_link) && !empty($general->address_link)) { ?>
                    <a href="<?= $general->address_link ?>" target="_blank" rel="noopener noreferrer">
                <?php } ?>

                <div class="contact">
                    <div class="contact__icon">
                        <svg width="32" height="39" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 48 60"><defs><clipPath id="clip-path"><rect class="footer-location-cls-1" width="48" height="60"/></clipPath></defs><title>location</title><g id="Camada_2" data-name="Camada 2"><g id="Camada_1-2" data-name="Camada 1"><g class="footer-location-cls-2"><path class="footer-location-cls-3" d="M43,20.21a19,19,0,1,0-38,0c0,13.14,14.67,28,18.23,32.42a1,1,0,0,0,1.54,0C28.33,48.23,43,33.35,43,20.21Z"/><circle class="footer-location-cls-3" cx="24" cy="20" r="10"/><path class="footer-location-cls-3" d="M34,49.5c7.69.81,13,2.52,13,4.5,0,2.76-10.3,5-23,5S1,56.76,1,54c0-2,5.31-3.69,13-4.5"/></g></g></g></svg>
                    </div>
                        <p class="contact__description text-white">
                        <strong>LOCALIZAÇÃO:</strong><br/>
                        <?= $general->address; ?>
                    </p>
                </div>

                <?php if(isset($general->address_link) && !empty($general->address_link)) { ?>
                    </a>
                <?php } ?>
                </div>
            <?php } ?>

        </div>
    </div>
</div> -->

<?php if(!isset($hide_footer) || $hide_footer === false) { ?>

<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-lg-3 d-flex align-items-center">
                <a class="site-footer__logo" href="<?= base_url() ?>">
                    <picture>
                        <source media="(max-width: 768px)" srcset="<?= base_url("_assets/images/copercana.png") ?> 1x, <?= base_url("_assets/images/copercana@2x.png") ?> 2x">
                        <source media="(min-width: 768px)" srcset="<?= base_url("_assets/images/copercana@1,6x.png") ?> 1x, <?= base_url("_assets/images/copercana@3,2x.png") ?> 2x">
                        <img src="<?= base_url("_assets/images/copercana@1,6x.png") ?>"
                            alt="Copercana">
                    </picture>
                </a>
            </div>
            <div class="col-md-4 col-lg-5 d-flex align-items-center justify-content-center justify-content-md-around">
                    <div class="socials">

                        <?php if(isset($general) && isset($general->facebook) && !empty($general->facebook)) { ?>
                        <a href="<?= $general->facebook ?>" target="_blank" class="socials__item"
                            aria-label="Facebook">
                            <svg width="28" height="28" style="fill: #fff;" version="1.1" id="Layer_1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve">
                                <title>Facebook</title>
                                <path d="M481,258.1c0-124.3-100.8-225-225-225c-124.3,0-225,100.7-225,225c0,112.3,82.3,205.4,189.8,222.2V323.1h-57.1v-65h57.1
                                    v-49.6c0-56.4,33.5-87.5,85-87.5c24.6,0,50.4,4.4,50.4,4.4v55.4h-28.4c-27.9,0-36.6,17.4-36.6,35.2v42.2h62.4l-10,65h-52.4v157.2
                                    C398.7,463.4,481,370.3,481,258.1L481,258.1z"></path>
                            </svg>
                        </a>
                        <?php } ?>

                        <?php if(isset($general) && isset($general->instagram) && !empty($general->instagram)) { ?>
                        <a href="<?= $general->instagram ?>" target="_blank" class="socials__item"
                            aria-label="Instagram">
                            <svg width="26" height="26" style="fill: #fff;" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                x="0px" y="0px" viewBox="0 0 600 600" xml:space="preserve">
                                <title>Instagram</title>
                                <g>
                                    <circle cx="300" cy="300" r="297.5"></circle>
                                    <path class="footer-stinsta_2" d="M300,123.5c-47.9,0-54,0.2-72.8,1.1c-18.8,0.9-31.6,3.8-42.8,8.2c-11.6,4.5-21.5,10.5-31.3,20.4
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

                        <?php if(isset($general) && isset($general->youtube) && !empty($general->youtube)) { ?>
                        <a href="<?= $general->youtube ?>" target="_blank" rel="noopener noreferrer"
                            aria-label="Youtube">
                            <svg width="26" height="26" id="Слой_1" x="0px" y="0px" viewBox="0 0 300 300"
                                enable-background="new 0 0 400 400" xml:space="preserve" width="300"
                                height="300">
                                <title>Youtube</title>
                                <defs id="defs15">
                                    <pattern y="0" x="0" height="6" width="6" patternUnits="userSpaceOnUse"
                                        id="EMFhbasepattern" />
                                </defs>
                                <g id="g4189" transform="scale(0.75,0.75)">
                                    <rect width="400" height="400" id="rect4"
                                        style="fill:#ffffff;fill-opacity:1" x="0" y="0" ry="200" />
                                    <g transform="matrix(7.8701756,0,0,7.8701756,695.19553,-948.4235)"
                                        id="g4167">
                                        <path style="fill:<?= $page === "copercana-60-anos" ? "#004B2C" : "#5C5B60"  ?>;fill-opacity:1;fill-rule:nonzero;stroke:none"
                                            d="M 149.9375 79.222656 C 149.9375 79.222656 86.718651 79.222715 70.851562 83.345703 C 62.355775 85.719505 55.360154 92.715203 52.986328 101.33594 C 48.863375 117.20304 48.863281 150.0625 48.863281 150.0625 C 48.863281 150.0625 48.863375 183.0467 52.986328 198.66406 C 55.360154 207.28468 62.230834 214.15544 70.851562 216.5293 C 86.843592 220.77718 149.9375 220.77734 149.9375 220.77734 C 149.9375 220.77734 213.28168 220.77729 229.14844 216.6543 C 237.76923 214.28049 244.63977 207.53464 246.88867 198.78906 C 251.1366 183.04674 251.13672 150.1875 251.13672 150.1875 C 251.13672 150.1875 251.26156 117.20304 246.88867 101.33594 C 244.63977 92.715203 237.76923 85.844606 229.14844 83.595703 C 213.28168 79.222856 149.9375 79.222656 149.9375 79.222656 z M 129.82227 119.70312 L 182.42188 150.0625 L 129.82227 180.29688 L 129.82227 119.70312 z "
                                            transform="matrix(0.16941596,0,0,0.16941596,-88.332912,120.50856)"
                                            id="path4156" />
                                    </g>
                                </g>
                            </svg>
                        </a>
                        <?php } ?>

                        <?php if(isset($general) && isset($general->linkedin) && !empty($general->linkedin)) { ?>
                        <a href="<?= $general->linkedin ?>" target="_blank" rel="noopener noreferrer"
                            aria-label="LinkedIn">
                            <svg width="26" height="26" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px"
                                viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000"
                                xml:space="preserve">
                                <title>LinkedIn</title>
                                <g>
                                    <path style="fill: #ffffff;"
                                        d="M500,10C229.4,10,10,229.4,10,500s219.4,490,490,490s490-219.4,490-490C990,229.3,770.6,10,500,10z M377.5,737.3H255V308.6h122.5V737.3z M320,282.3c-31.7,0-57.4-25.7-57.4-57.5c0-31.7,25.7-57.5,57.4-57.5c31.7,0.1,57.5,25.8,57.5,57.5C377.5,256.6,351.8,282.3,320,282.3z M806.3,737.3H683.8V472.3c0-31.1-8.9-52.8-47-52.8c-63.3,0-75.5,52.8-75.5,52.8v265.1H438.8V308.6h122.5v41c17.5-13.4,61.3-40.9,122.5-40.9c39.8,0,122.5,23.8,122.5,167.3V737.3z" />
                                </g>
                            </svg>
                        </a>
                        <?php } ?>

                        <?php if(isset($general) && isset($general->radio) && !empty($general->radio)) { ?>
                        <a href="<?= $general->radio ?>" target="_blank" class="socials__item"
                            rel="noopener noreferrer" aria-label="LinkedIn">
                            <svg width="26" height="26" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 82 82">
                                <defs>
                                    <clipPath id="clip-path">
                                        <rect class="footer-radio-cls-1" width="82" height="82" />
                                    </clipPath>
                                </defs>
                                <title>Ativo 1</title>
                                <g id="Camada_2" data-name="Camada 2">
                                    <g id="Camada_1-2" data-name="Camada 1">
                                        <g class="footer-radio-cls-2">
                                            <path class="footer-radio-cls-3" d="M82,41A41,41,0,1,1,41,0,41,41,0,0,1,82,41" />
                                            <path class="footer-radio-cls-4"
                                                d="M31.46,59.16c0,3-2.95,6.1-6.59,6.87S18.28,65,18.28,62s2.95-6.09,6.59-6.87S31.46,56.14,31.46,59.16Z" />
                                            <path class="footer-radio-cls-4"
                                                d="M57.81,49.75c0,3-3,6.1-6.59,6.87s-6.59-1-6.59-4.07,2.95-6.09,6.59-6.87S57.81,46.73,57.81,49.75Z" />
                                            <polyline class="footer-radio-cls-4"
                                                points="57.81 49.27 57.81 13.5 31.45 22.91 31.45 58.68" />
                                            <line class="footer-radio-cls-4" x1="57.81" y1="22.91" x2="31.46" y2="32.33" />
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </a>
                        <?php } ?>

                    </div>
                    <ul class="site-footer__nav">
                        <li><a href="<?= base_url("institucional") ?>">INSTITUCIONAL</a></li>
                        <li><a href="<?= base_url("#") ?>">SERVIÇOS</a></li>
                        <li><a href="<?= base_url("#") ?>">EVENTOS</a></li>
                        <li><a href="<?= base_url("noticias") ?>">NOTÍCIAS</a></li>
                        <li><a href="<?= base_url("trabalhe-conosco/vagas-disponiveis") ?>">TRABALHE CONOSCO</a></li>
                        <li><a href="<?= base_url("contato") ?>">CONTATO</a></li>
                    </ul>
                </div>
            <div class="col-md-4 d-flex d-md-block flex-column flex-sm-row justify-content-around align-items-center align-items-sm-start">
                <?php if(isset($general->address) && !empty($general->address)) { ?>

                    <?php if(isset($general->address_link) && !empty($general->address_link)) { ?>
                        <a href="<?= $general->address_link ?>" target="_blank" rel="noopener noreferrer">
                    <?php } ?>

                    <div class="contact">
                        <div class="contact__icon">
                            <svg width="32" height="39" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 48 60"><defs><clipPath id="clip-path"><rect class="footer-location-cls-1" width="48" height="60"/></clipPath></defs><title>location</title><g id="Camada_2" data-name="Camada 2"><g id="Camada_1-2" data-name="Camada 1"><g class="footer-location-cls-2"><path class="footer-location-cls-3" d="M43,20.21a19,19,0,1,0-38,0c0,13.14,14.67,28,18.23,32.42a1,1,0,0,0,1.54,0C28.33,48.23,43,33.35,43,20.21Z"/><circle class="footer-location-cls-3" cx="24" cy="20" r="10"/><path class="footer-location-cls-3" d="M34,49.5c7.69.81,13,2.52,13,4.5,0,2.76-10.3,5-23,5S1,56.76,1,54c0-2,5.31-3.69,13-4.5"/></g></g></g></svg>
                        </div>
                            <p class="contact__description">
                            <strong>LOCALIZAÇÃO:</strong><br/>
                            <?= $general->address; ?>
                        </p>
                    </div>

                    <?php if(isset($general->address_link) && !empty($general->address_link)) { ?>
                        </a>
                    <?php } ?>

                <?php } ?>
                <?php if(isset($general->phone) && !empty($general->phone)) { ?>
                    <a href="tel:<?= $general->phone ?>" target="_blank" rel="noopener noreferrer">
                        <div class="contact">
                            <div class="contact__icon">
                                <svg width="40" height="40" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 60 60"><defs><clipPath id="clip-path"><rect class="footer-phone-cls-1" width="60" height="60"/></clipPath></defs><title>phone</title><g id="Camada_2" data-name="Camada 2"><g id="Camada_1-2" data-name="Camada 1"><g class="footer-phone-cls-2"><path class="footer-phone-cls-3" d="M39,51.4A7.6,7.6,0,0,1,31.4,59,30.4,30.4,0,0,1,1,28.6,7.6,7.6,0,0,1,8.6,21a7.47,7.47,0,0,1,1.26.11l.2,0a1.84,1.84,0,0,1,1.47,1.5l1.92,11.3a.62.62,0,0,1-.34.65l-2.74,1.32a.62.62,0,0,0-.3.76A22.9,22.9,0,0,0,23.3,49.92a.61.61,0,0,0,.76-.3c.45-.89,1.35-2.74,1.35-2.74a.62.62,0,0,1,.65-.33l11.3,1.92a1.84,1.84,0,0,1,1.5,1.47l0,.2A7.47,7.47,0,0,1,39,51.4Z"/><path class="footer-phone-cls-4" d="M21,20A19,19,0,1,1,31.89,37.19L27.26,39a.78.78,0,0,1-1.05-.71l-.36-5.56A19,19,0,0,1,21,20Z"/><path class="footer-phone-cls-5" d="M39,20.5A1.5,1.5,0,1,1,40.5,22,1.5,1.5,0,0,1,39,20.5"/><path class="footer-phone-cls-5" d="M47,20.5A1.5,1.5,0,1,1,48.5,22,1.5,1.5,0,0,1,47,20.5"/><path class="footer-phone-cls-5" d="M31,20.5A1.5,1.5,0,1,1,32.5,22,1.5,1.5,0,0,1,31,20.5"/></g></g></g></svg>
                            </div>
                            <p class="contact__description">
                                <strong>CONTATO MATRIZ:</strong><br/>
                                +55 16 3946 3300
                            </p>
                        </div>
                    </a>
                <?php } ?>
            </div>
            <div class="col-12 d-md-flex justify-content-between">
                <p class="politics-link order-1"><a
                        style="text-decoration: none; color: inherit;"
                        href="<?= base_url("institucional/politica-de-privacidade") ?>">Política de
                        Privacidade</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a
                        style="text-decoration: none; color: inherit;"
                        href="<?= base_url("institucional/politica-de-privacidade") ?>#cookies">Política de Cookies</a></p>
                        <?php if(isset($general->footer_legal_text) && !empty($general->footer_legal_text)) { ?>
                            <p class="copyright order-0">
                                <?= $general->footer_legal_text ?>
                            </p>
                        <?php } ?>
            </div>
        </div>
    </div>
</footer>

<div vw class="enabled">
    <div vw-plugin-wrapper>
        <div class="vw-plugin-top-wrapper"></div>
    </div>
</div>
<?php } ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
<script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
<script src="<?= base_url("_assets/js/main.js") ?>?v=<?= filemtime("_assets/js/main.js") ?>"></script>

<?php if(isset($footer_dependencies)) {
        foreach($footer_dependencies as $dependency) {
            echo $dependency;
        }
    }  ?>

<?php if(isset($general) && isset($general->footer_html) && !empty($general->footer_html)) { ?>
<?= $general->footer_html; ?>
<?php } ?>
</body>

</html>