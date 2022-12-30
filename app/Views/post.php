<main>
    <?php 
        $dateTimeObj = new \DateTime($post->created_at, new \DateTimeZone('America/Sao_Paulo'));
      
        $date = \IntlDateFormatter::formatObject($dateTimeObj, "dd", 'pt');
        $month = ucfirst(\IntlDateFormatter::formatObject($dateTimeObj, "MMMM", 'pt'));
        $year = \IntlDateFormatter::formatObject($dateTimeObj, "Y", 'pt');
    ?> 
    <section class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="with-underline mx-0">Blog</h2>
                </div>
                <div class="col-12">
                    <a class="single-post__category" href="<?= base_url("blog/$post->category_slug") ?>">
                        <?= $post->category ?>
                    </a>
                    <h3 class="single-post__title mb-0"><?= $post->title; ?></h3>
                    <p class="mb-5"><?= $date ?> de <?= $month ?> de <?= $year ?></p>
                </div>
                <div class="col-12">
                    <div class="post__cover mb-5">
                        <img src="<?= base_url($post->cover); ?>" alt="<?= $post->title; ?>" class="img-fluid w-100">
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                
               <div class="col-12">
                   <div class="post__content ck-content ck-reset">
                        <?= htmlspecialchars_decode($post->content); ?>
                   </div>
               </div>
            </div>
        </div>
    </section>

    <?php if(isset($posts) && count($posts) > 0) { ?>
            <section class="page-section bg-light-gray">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="with-underline mx-0" >Mais publicações</h2>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach($posts as $post) { ?>
                        <div class="col-md-6 col-lg-3">
                            <article class="post-preview">
                                <a href="<?= base_url("blog/$post->category_slug/$post->slug") ?>" class="post-preview__thumb">
                                    <img src="<?= base_url($post->thumbnail) ?>" alt="<?= $post->title ?>">
                                </a>
                                <a class="post-preview__category" href="<?= base_url("blog/$post->category_slug") ?>">
                                    <?= $post->category ?>
                                </a>
                                <h4 class="post-preview__title">
                                    <a href="<?= base_url("blog/$post->category_slug/$post->slug") ?>">
                                        <?= $post->title ?>
                                    </a>
                                </h4>
                                <p class="post-preview__excerpt">
                                    <a href="<?= base_url("blog/$post->category_slug/$post->slug") ?>">
                                        <?= $post->excerpt ?>
                                    </a>
                                </p>
                                <a class="post-preview__link" href="<?= base_url("blog/$post->slug") ?>">Saiba Mais</a>
                            </article>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
        <?php } ?>
</main>