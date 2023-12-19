<main id="main" class="main">

    <div class="pagetitle">
        <h1>Blog</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item"><a href="<?= base_url("admin/blog") ?>">Blog</a></li>
                <li class="breadcrumb-item active">Editar</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Editar Publicação</h5>
                        <p>Insira as informações atualizadas da sua publicação:</p>
                        <label>(<span class="required">*</span>) Campos obrigatórios</label>
                        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                            </symbol>
                            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </symbol>
                        </svg>

                        <?php 
                            $response = $session->getFlashdata('response');
                            
                            if(isset($response) && !empty($response)) { ?>

                        <div class="alert alert-<?= $response['success'] ? 'success' : 'danger' ?> d-flex align-items-center alert-dismissible fade show my-3"
                            role="alert" style="margin-bottom: 20px">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                                <use
                                    xlink:href="<?= $response['success'] ? '#check-circle-fill' : '#exclamation-triangle-fill' ?>" />
                            </svg>
                            <div>
                                <?= $response['message'] ?>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                        <?php }
                        ?>

                        <?php echo form_open_multipart('admin/post/update_post/'.$post->id, ['class' => 'my-5']);?>
                        <div class="row mb-3">
                            <?php echo form_label('Capa<span class="required">*</span></br><small>(Recomendado: 1300×530)</small>', 'cover', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">

                                <?php if(isset($post->cover) && !empty($post->cover)) { ?>
                                <div class="banner-preview">
                                    <img src="<?= base_url($post->cover) ?>" alt="">
                                    <a class="delete-btn" href="<?= base_url("admin/post/remove_cover/".$post->id) ?>"><i class="bi bi-x-circle-fill"></i></a>
                                </div>
                                <?php } else { ?>
                                <?php echo form_upload([
                                                    'name' => 'cover',
                                                    'id'   => 'cover'
                                                ], '', ['class' => 'form-control', 'required' => 'required']);?>
                                <?php } ?>
                            </div>
                        </div>

                            <div class="row mb-3">
                                <?php echo form_label('Título<span class="required">*</span>', 'title', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php echo form_input([
                                            'name' => 'title',
                                            'id'   => 'title',
                                            'type' => 'text'
                                        ], $post->title, ['class' => 'form-control', 'required' => 'required']);?>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <?php echo form_label('Resumo<span class="required">*</span>', 'excerpt', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php echo form_textarea([
                                            'name' => 'excerpt',
                                            'id'   => 'excerpt',
                                        ], $post->excerpt, ['class' => 'form-control', 'style' => 'height: 100px', 'required' => 'required']);?>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <?php echo form_label('Categoria<span class="required">*</span>', 'category_id', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php 
                                        $category_options = array();

                                        foreach($categories as $category) {
                                            $category_options[(string)$category->id] = $category->title;
                                        }
                                    ?>
                                    <?php echo form_dropdown('category_id', $category_options, $post->category_id, ['class' => 'form-control', 'required' => 'required', 'id' => 'category_id']);?>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <?php echo form_label('Meta Title', 'page_title', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php echo form_input([
                                            'name' => 'page_title',
                                            'id'   => 'page_title',
                                            'type' => 'text'
                                        ], $post->page_title, ['class' => 'form-control']);?>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <?php echo form_label('Meta description', 'page_description', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php echo form_textarea([
                                            'name' => 'page_description',
                                            'id'   => 'page_description',
                                        ], $post->page_description, ['class' => 'form-control', 'style' => 'height: 100px']);?>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <?php echo form_label('Meta Keywords', 'page_tags', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php echo form_input([
                                            'name' => 'page_tags',
                                            'id'   => 'page_tags',
                                            'type' => 'text'
                                        ], $post->page_tags, ['class' => 'form-control']);?>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <?php echo form_label('URL para redirecionamento', 'redirect', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php echo form_input([
                                            'name' => 'redirect',
                                            'id'   => 'redirect',
                                            'type' => 'text'
                                        ], $post->redirect, ['class' => 'form-control']);?>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <?php echo form_label('Status<span class="required">*</span>', 'status', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php 
                                        $status_options = array(
                                            'draft' => 'Rascunho',
                                            'published' => 'Publicado'
                                        );
                                    ?>
                                    <?php echo form_dropdown('status', $status_options, $post->status, ['class' => 'form-control', 'required' => 'required', 'id' => 'status']);?>

                                </div>
                            </div>

<!--                             <div class="row mb-5">
                                <?php echo form_label('Exibir Também em Notícias?', 'show_at_blog_and_news', ['class' => 'col-sm-2 col-form-label']);?>

                                <div class="col-sm-10">

                                    <div class="switch__container">
                                        <?php echo form_checkbox([
                                                'name' => 'show_at_blog_and_news',
                                                'id'   => 'show_at_blog_and_news',
                                                'value'   => '1',
                                                'checked' => $post->show_at_blog_and_news == 1,
                                            ], '1', $post->show_at_blog_and_news == 1, ['class' => 'switch switch--shadow']);?>

                                        <label for="show_at_blog_and_news"></label>
                                    </div>
                                </div>
                            </div> -->

                            <div class="row mb-5">
                                <?php echo form_label('Conteúdo', 'content', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php echo form_textarea([
                                            'name' => 'content',
                                            'id'   => 'editor',
                                        ], $post->content, ['class' => 'form-control']);?>

                                </div>
                            </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <?php echo form_submit('submit', 'Salvar', ['class' => 'btn btn-primary w-100']);?>
                            </div>
                        </div>

                        <?php echo form_close();?>

                    </div>
                </div>
            </div>
    </section>

</main>