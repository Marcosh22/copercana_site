<main>
    <section class="page-section">
        
        <?php if(isset($page_data)) { ?>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="with-underline mx-0" style="margin-bottom: 0;"><?= $page_data->page_title ?></h2>
                </div>
                <div class="col-12 mt-3">
                    <?= $page_data->page_description ?>
                </div>
                <?php if(isset($current_category)){ ?>
                    <span class="results-label my-4">EXIBINDO RESULTADOS PARA CATEGORIA <i>'<?=$current_category->title ?>'</i></span>
                <?php } ?>
            </div>
        </div>
        <?php } ?>

        <?php if(isset($posts) && count($posts) > 0) { 
                foreach($posts as $key => $post) {
            ?>
            <div class="<?= $key % 2 === 0 ? ' bg-light-gray' : ''?>">
                <div class="container">
                    <div class="row">
                            <div class="col-12">
                                <article class="post-preview post-preview--feature">
                                    <a href="<?= base_url(($post->category_id == 1 ? "noticias" : "blog/$post->category_slug")."/$post->slug") ?>" class="post-preview__thumb">
                                        <img src="<?= base_url($post->thumbnail) ?>" alt="<?= $post->title ?>">
                                    </a>
                                    <div>
                                        <a class="post-preview__category" href="<?= base_url(($post->category_id == 1 ? "noticias" : "blog/$post->category_slug")) ?>">
                                            <?= $post->category ?>
                                        </a>
                                        <h4 class="post-preview__title">
                                            <a href="<?= base_url(($post->category_id == 1 ? "noticias" : "blog/$post->category_slug")."/$post->slug") ?>">
                                                <?= $post->title ?>
                                            </a>
                                        </h4>
                                        <p class="post-preview__excerpt">
                                            <a href="<?= base_url(($post->category_id == 1 ? "noticias" : "blog/$post->category_slug")."/$post->slug") ?>">
                                                <?= $post->excerpt ?>
                                            </a>
                                        </p>
                                        <a class="post-preview__link" href="<?= base_url(($post->category_id == 1 ? "noticias" : "blog/$post->category_slug")."/$post->slug") ?>">Saiba
                                            Mais</a>
                                    </div>
                                </article>
                            </div>
                        </div>
                </div>
            </div>
            <?php
                } ?>
                <div class="container">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <?= $pagination; ?>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
        <p class="not-found" style="margin: 50px 0; text-align: center;">NENHUMA PUBLICAÇÃO</p>
        <?php } ?>

    </section>


</main>