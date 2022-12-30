<main id="politics">
    <div class="page-section">
        <div class="container">
            <div class="row">
                <?php if(isset($page_data)) { ?>
                    <div class="col-12">
                        <h2 class="with-underline mx-0" style="margin-bottom: 0;"><?= $page_data->page_title ?></h2>
                    </div>
                    <div class="col-12 mt-5">
                    <?= $page_data->page_content ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</main>