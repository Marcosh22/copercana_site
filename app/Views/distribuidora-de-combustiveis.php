<main>
    <?php if(isset($page_data)) { ?>
        <div class="container">
                <div class="row">
                    <div class="col-12">
                        <?php if(isset($page_data->fuel_distributor_section_banner) && !empty($page_data->fuel_distributor_section_banner)) { ?>
                            <div class="page_banner">
                                <picture>
                                    <source media="(max-width: 768px)" srcset="<?= base_url($page_data->fuel_distributor_section_mobile_banner) ?>">
                                    <source media="(min-width: 768px)" srcset="<?= base_url($page_data->fuel_distributor_section_banner) ?>">
                                    <img src="<?= base_url($page_data->fuel_distributor_section_banner) ?>" alt="" class="img-fluid">
                                </picture>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php if(isset($page_data->fuel_distributor_section_show) && $page_data->fuel_distributor_section_show == 1) { ?>
            <section class="page-section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="with-underline mx-0" style="margin-bottom: 0;"><?= $page_data->fuel_distributor_section_title ?></h2>
                        </div>
                        <div class="col-12 mt-3">
                            <?= $page_data->fuel_distributor_section_description ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php } ?>

        <?php if(isset($page_data->gallery_section_show) && $page_data->gallery_section_show == 1) { ?>
            <section class="inline-gallery inline-gallery--4x">
                <?php if(isset($page_data->gallery_section_picture_01) && !empty($page_data->gallery_section_picture_01)) { ?>
                    <img src="<?= base_url($page_data->gallery_section_picture_01) ?>" alt="" class="img-fluid">
                <?php } ?>
                <?php if(isset($page_data->gallery_section_picture_02) && !empty($page_data->gallery_section_picture_02)) { ?>
                    <img src="<?= base_url($page_data->gallery_section_picture_02) ?>" alt="" class="img-fluid">
                <?php } ?>
                <?php if(isset($page_data->gallery_section_picture_03) && !empty($page_data->gallery_section_picture_03)) { ?>
                    <img src="<?= base_url($page_data->gallery_section_picture_03) ?>" alt="" class="img-fluid">
                <?php } ?>
                <?php if(isset($page_data->gallery_section_picture_04) && !empty($page_data->gallery_section_picture_04)) { ?>
                    <img src="<?= base_url($page_data->gallery_section_picture_04) ?>" alt="" class="img-fluid">
                <?php } ?>
            </section>
        <?php } ?>

        <?php if(isset($page_data->fuel_forms_section_show) && $page_data->fuel_forms_section_show == 1) { ?>
            <section class="page-section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="with-underline mx-0" style="margin-bottom: 0;"><?= $page_data->fuel_forms_section_title ?></h2>
                        </div>
                        <div class="col-12 mt-3">
                            <?= $page_data->fuel_forms_section_description ?>
                            <?php 
                                if(isset($fuel_forms) && count($fuel_forms) > 0) { ?>
                                <ul class="fuel-forms-list">
                                <?php 
                                foreach($fuel_forms as $form) { ?>
                                <li class="fuel-forms-list__item">
                                    <a class="fuel-forms-list__link" href="<?= base_url($form->file) ?>" target="_blank" rel="noopener noreferrer">
                                        <svg 
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="19px" height="29px">
                                            <image  x="0px" y="0px" width="19px" height="29px"  xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAABMAAAAdCAMAAAB/hKeOAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAABU1BMVEUTOBL///8TOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBITOBL///+u7NyGAAAAb3RSTlMAAA5kdXJmBrzs6uvp+6MEagwLCnn+pQM6dPGCQHf4B2f5CGBlS6Ja8xF2IyYnHD5GAk1vbhf8/RIbhhkdjfQUGnN79X4YVWl4gFRjX104AaumP0w8v0O7O056zdAyNvbL0vogNDXh594lHyrltzMFVZWqAAAAAWJLR0QB/wIt3gAAAAd0SU1FB+YIAgoBFnbo0LMAAAEUSURBVCjPvdBZO0JRFMbxtRtMRSInhZAip5QOnSMl6RhDMs9zmXm//53dVj37fAH/i3Xxe9bF2ptsdkcrZ0cnEWOMutDd4xK5e9HnEYZ+74BXNOgbguIXNkytAsERKJ6GjbZtLDQ+0di02GSYpvimbD44ItEApmWbiQHBWRWy+eOJuSRLWUzE5v/R0trCIi+aliwTg27ocC1JljWWc/ncSmFVsqKxxmfJtJrK57rFbH9WCLdtY3ML29x29Eg507RdoLDHzW4C+8IqdFCFKu4t4ZDYETdFOz45NVOczkLnF9plVacrHbhO3sRu6e7+IfsIPDmJnmv1OOVfXsuutyK912sfrPX0Tze+EuIPWNuo8v1DTfsF5xxEaFtezJ8AAAAASUVORK5CYII=" />
                                        </svg>
                                        &nbsp;<?= $form->title ?>
                                    </a>
                                </li>
                                <?php
                                }?>
                                </ul>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php } ?>

    <?php } ?>
</main>