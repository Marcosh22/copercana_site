<main id="main" class="main">

    <div class="pagetitle">
        <h1>Páginas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Páginas</li>
                <li class="breadcrumb-item active">Institucional</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Editar Página</h5>
                        <p>Insira as informações atualizadas da sua página:</p>
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

                        <?php echo form_open_multipart('admin/pages/update_page/2', ['class' => 'my-5']);?>

                        <h3 class="card-title">Carrossel de cotações</h3>

                        <div class="row mb-3">
                            <?php echo form_label('Exibir?', 'show_quotation_carousel', ['class' => 'col-sm-2 col-form-label']);?>

                            <div class="col-sm-10">

                                <div class="switch__container">
                                    <?php echo form_checkbox([
                                            'name' => 'show_quotation_carousel',
                                            'id'   => 'show_quotation_carousel',
                                            'value'   => '1',
                                            'checked' => isset($page_data) && isset($page_data->show_quotation_carousel) && $page_data->show_quotation_carousel == 1,
                                        ], '1', isset($page_data) && isset($page_data->show_quotation_carousel) && $page_data->show_quotation_carousel == 1, ['class' => 'switch switch--shadow']);?>

                                    <label for="show_quotation_carousel"></label>
                                </div>
                            </div>
                        </div>
                        <h3 class="card-title">Sobre Nós</h3>
                        <div class="row mb-3">
                            <?php echo form_label('Título', 'about_us_section_title', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_input([
                                                'name' => 'about_us_section_title',
                                                'id'   => 'about_us_section_title',
                                                'type' => 'text'
                                            ], isset($page_data) && isset($page_data->about_us_section_title) ? $page_data->about_us_section_title : '', ['class' => 'form-control']);?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('Descrição', 'about_us_section_description', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_textarea([
                                            'name' => 'about_us_section_description',
                                            'id'   => 'about_us_section_description',
                                        ], isset($page_data) && isset($page_data->about_us_section_description) ? $page_data->about_us_section_description : '', ['class' => 'form-control editor', 'style' => 'height: 100px']);?>

                            </div>
                        </div>
                        <div class="row mb-5">
                            <?php echo form_label('Exibir seção?', 'about_us_section_show', ['class' => 'col-sm-2 col-form-label']);?>

                            <div class="col-sm-10">

                                <div class="switch__container">
                                    <?php echo form_checkbox([
                                            'name' => 'about_us_section_show',
                                            'id'   => 'about_us_section_show',
                                            'value'   => '1',
                                            'checked' => isset($page_data) && isset($page_data->about_us_section_show) && $page_data->about_us_section_show == 1,
                                        ], '1', isset($page_data) && isset($page_data->about_us_section_show) && $page_data->about_us_section_show == 1, ['class' => 'switch switch--shadow']);?>

                                    <label for="about_us_section_show"></label>
                                </div>
                            </div>
                        </div>

                        <h3 class="card-title">Video Institucional</h3>
                        <div class="row mb-3">
                            <?php echo form_label('URL (YouTube)', 'video_section_url', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_input([
                                    'name' => 'video_section_url',
                                    'id'   => 'video_section_url',
                                    'type' => 'text'
                                ], isset($page_data) && isset($page_data->video_section_url) ? $page_data->video_section_url : '', ['class' => 'form-control']);?>

                            </div>
                        </div>
                        <div class="row mb-5">
                            <?php echo form_label('Exibir seção?', 'video_section_show', ['class' => 'col-sm-2 col-form-label']);?>

                            <div class="col-sm-10">

                                <div class="switch__container">
                                    <?php echo form_checkbox([
                                            'name' => 'video_section_show',
                                            'id'   => 'video_section_show',
                                            'value'   => '1',
                                            'checked' => isset($page_data) && isset($page_data->video_section_show) && $page_data->video_section_show == 1,
                                        ], '1', isset($page_data) && isset($page_data->video_section_show) && $page_data->video_section_show == 1, ['class' => 'switch switch--shadow']);?>

                                    <label for="video_section_show"></label>
                                </div>
                            </div>
                        </div>

                        <h3 class="card-title">Missão</h3>
                        <div class="row mb-3">
                            <?php echo form_label('Título', 'mission_section_title', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_input([
                                            'name' => 'mission_section_title',
                                            'id'   => 'mission_section_title',
                                            'type' => 'text'
                                        ], isset($page_data) && isset($page_data->mission_section_title) ? $page_data->mission_section_title : '', ['class' => 'form-control']);?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('Descrição', 'mission_section_description', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_textarea([
                                            'name' => 'mission_section_description',
                                            'id'   => 'mission_section_description',
                                        ], isset($page_data) && isset($page_data->mission_section_description) ? $page_data->mission_section_description : '', ['class' => 'form-control editor', 'style' => 'height: 100px']);?>

                            </div>
                        </div>
                        <div class="row mb-5">
                            <?php echo form_label('Exibir seção?', 'mission_section_show', ['class' => 'col-sm-2 col-form-label']);?>

                            <div class="col-sm-10">

                                <div class="switch__container">
                                    <?php echo form_checkbox([
                                            'name' => 'mission_section_show',
                                            'id'   => 'mission_section_show',
                                            'value'   => '1',
                                            'checked' => isset($page_data) && isset($page_data->mission_section_show) && $page_data->mission_section_show == 1,
                                        ], '1', isset($page_data) && isset($page_data->mission_section_show) && $page_data->mission_section_show == 1, ['class' => 'switch switch--shadow']);?>

                                    <label for="mission_section_show"></label>
                                </div>
                            </div>
                        </div>

                        <h3 class="card-title">Visão</h3>
                        <div class="row mb-3">
                            <?php echo form_label('Título', 'vision_section_title', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_input([
                                            'name' => 'vision_section_title',
                                            'id'   => 'vision_section_title',
                                            'type' => 'text'
                                        ], isset($page_data) && isset($page_data->vision_section_title) ? $page_data->vision_section_title : '', ['class' => 'form-control']);?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('Descrição', 'vision_section_description', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_textarea([
                                            'name' => 'vision_section_description',
                                            'id'   => 'vision_section_description',
                                        ], isset($page_data) && isset($page_data->vision_section_description) ? $page_data->vision_section_description : '', ['class' => 'form-control editor', 'style' => 'height: 100px']);?>

                            </div>
                        </div>
                        
                        <div class="row mb-5">
                            <?php echo form_label('Exibir seção?', 'vision_section_show', ['class' => 'col-sm-2 col-form-label']);?>

                            <div class="col-sm-10">

                                <div class="switch__container">
                                    <?php echo form_checkbox([
                                            'name' => 'vision_section_show',
                                            'id'   => 'vision_section_show',
                                            'value'   => '1',
                                            'checked' => isset($page_data) && isset($page_data->vision_section_show) && $page_data->vision_section_show == 1,
                                        ], '1', isset($page_data) && isset($page_data->vision_section_show) && $page_data->vision_section_show == 1, ['class' => 'switch switch--shadow']);?>

                                    <label for="vision_section_show"></label>
                                </div>
                            </div>
                        </div>
                        
                        <h3 class="card-title">Galeria</h3>
                        <div class="row mb-3">
                            <?php echo form_label('Imagem 01</br><small>(Recomendado: 640x295)</small>', 'gallery_section_picture_01', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php if(isset($page_data) && isset($page_data->gallery_section_picture_01) && !empty($page_data->gallery_section_picture_01)) { ?>
                                <div class="banner-preview">
                                    <input type="hidden" name="gallery_section_picture_01"
                                        value="<?= $page_data->gallery_section_picture_01; ?>">
                                    <img src="<?= base_url($page_data->gallery_section_picture_01) ?>" alt="">
                                    <a class="delete-btn"
                                        href="<?= base_url("admin/pages/delete_file/2/gallery_section_picture_01") ?>"><i
                                            class="bi bi-x-circle-fill"></i></a>
                                </div>
                                <?php } else { ?>
                                <?php echo form_upload([
                                            'name' => 'gallery_section_picture_01',
                                            'id'   => 'gallery_section_picture_01'
                                        ], '', ['class' => 'form-control']);?>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('Imagem 02</br><small>(Recomendado: 640x295)</small>', 'gallery_section_picture_02', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php if(isset($page_data) && isset($page_data->gallery_section_picture_02) && !empty($page_data->gallery_section_picture_02)) { ?>
                                <div class="banner-preview">
                                    <input type="hidden" name="gallery_section_picture_02"
                                        value="<?= $page_data->gallery_section_picture_02; ?>">
                                    <img src="<?= base_url($page_data->gallery_section_picture_02) ?>" alt="">
                                    <a class="delete-btn"
                                        href="<?= base_url("admin/pages/delete_file/2/gallery_section_picture_02") ?>"><i
                                            class="bi bi-x-circle-fill"></i></a>
                                </div>
                                <?php } else { ?>
                                <?php echo form_upload([
                                            'name' => 'gallery_section_picture_02',
                                            'id'   => 'gallery_section_picture_02'
                                        ], '', ['class' => 'form-control']);?>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('Imagem 03</br><small>(Recomendado: 640x295)</small>', 'gallery_section_picture_03', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php if(isset($page_data) && isset($page_data->gallery_section_picture_03) && !empty($page_data->gallery_section_picture_03)) { ?>
                                <div class="banner-preview">
                                    <input type="hidden" name="gallery_section_picture_03"
                                        value="<?= $page_data->gallery_section_picture_03; ?>">
                                    <img src="<?= base_url($page_data->gallery_section_picture_03) ?>" alt="">
                                    <a class="delete-btn"
                                        href="<?= base_url("admin/pages/delete_file/2/gallery_section_picture_03") ?>"><i
                                            class="bi bi-x-circle-fill"></i></a>
                                </div>
                                <?php } else { ?>
                                <?php echo form_upload([
                                            'name' => 'gallery_section_picture_03',
                                            'id'   => 'gallery_section_picture_03'
                                        ], '', ['class' => 'form-control']);?>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <?php echo form_label('Exibir galeria?', 'gallery_section_show', ['class' => 'col-sm-2 col-form-label']);?>

                            <div class="col-sm-10">

                                <div class="switch__container">
                                    <?php echo form_checkbox([
                                            'name' => 'gallery_section_show',
                                            'id'   => 'gallery_section_show',
                                            'value'   => '1',
                                            'checked' => isset($page_data) && isset($page_data->gallery_section_show) && $page_data->gallery_section_show == 1,
                                        ], '1', isset($page_data) && isset($page_data->gallery_section_show) && $page_data->gallery_section_show == 1, ['class' => 'switch switch--shadow']);?>

                                    <label for="gallery_section_show"></label>
                                </div>
                            </div>
                        </div>

                        <h3 class="card-title">Diretoria</h3>
                        <div class="row mb-3">
                            <?php echo form_label('Título', 'board_section_title', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_input([
                                            'name' => 'board_section_title',
                                            'id'   => 'board_section_title',
                                            'type' => 'text'
                                        ], isset($page_data) && isset($page_data->board_section_title) ? $page_data->board_section_title : '', ['class' => 'form-control']);?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('Conselho 01', 'council_01_section_title', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_input([
                                            'name' => 'council_01_section_title',
                                            'id'   => 'council_01_section_title',
                                            'type' => 'text'
                                        ], isset($page_data) && isset($page_data->council_01_section_title) ? $page_data->council_01_section_title : '', ['class' => 'form-control']);?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('Mandato do Conselho 01', 'council_01_section_term_of_office', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_input([
                                            'name' => 'council_01_section_term_of_office',
                                            'id'   => 'council_01_section_term_of_office',
                                            'type' => 'text'
                                        ], isset($page_data) && isset($page_data->council_01_section_term_of_office) ? $page_data->council_01_section_term_of_office : '', ['class' => 'form-control']);?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('Descrição do Conselho 01', 'council_01_section_description', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_textarea([
                                            'name' => 'council_01_section_description',
                                            'id'   => 'council_01_section_description',
                                        ], isset($page_data) && isset($page_data->council_01_section_description) ? $page_data->council_01_section_description : '', ['class' => 'form-control editor', 'style' => 'height: 100px']);?>

                            </div>
                        </div>
                        <div class="row mb-5">
                            <?php echo form_label('Exibir conselho 01?', 'council_01_section_show', ['class' => 'col-sm-2 col-form-label']);?>

                            <div class="col-sm-10">

                                <div class="switch__container">
                                    <?php echo form_checkbox([
                                            'name' => 'council_01_section_show',
                                            'id'   => 'council_01_section_show',
                                            'value'   => '1',
                                            'checked' => isset($page_data) && isset($page_data->council_01_section_show) && $page_data->council_01_section_show == 1,
                                        ], '1', isset($page_data) && isset($page_data->council_01_section_show) && $page_data->council_01_section_show == 1, ['class' => 'switch switch--shadow']);?>

                                    <label for="council_01_section_show"></label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <?php echo form_label('Conselho 02', 'council_02_section_title', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_input([
                                            'name' => 'council_02_section_title',
                                            'id'   => 'council_02_section_title',
                                            'type' => 'text'
                                        ], isset($page_data) && isset($page_data->council_02_section_title) ? $page_data->council_02_section_title : '', ['class' => 'form-control']);?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('Mandato do Conselho 02', 'council_02_section_term_of_office', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_input([
                                            'name' => 'council_02_section_term_of_office',
                                            'id'   => 'council_02_section_term_of_office',
                                            'type' => 'text'
                                        ], isset($page_data) && isset($page_data->council_02_section_term_of_office) ? $page_data->council_02_section_term_of_office : '', ['class' => 'form-control']);?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('Descrição do Conselho 02', 'council_02_section_description', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_textarea([
                                            'name' => 'council_02_section_description',
                                            'id'   => 'council_02_section_description',
                                        ], isset($page_data) && isset($page_data->council_02_section_description) ? $page_data->council_02_section_description : '', ['class' => 'form-control editor', 'style' => 'height: 100px']);?>

                            </div>
                        </div>
                        <div class="row mb-5">
                            <?php echo form_label('Exibir conselho 02?', 'council_02_section_show', ['class' => 'col-sm-2 col-form-label']);?>

                            <div class="col-sm-10">

                                <div class="switch__container">
                                    <?php echo form_checkbox([
                                            'name' => 'council_02_section_show',
                                            'id'   => 'council_02_section_show',
                                            'value'   => '1',
                                            'checked' => isset($page_data) && isset($page_data->council_02_section_show) && $page_data->council_02_section_show == 1,
                                        ], '1', isset($page_data) && isset($page_data->council_02_section_show) && $page_data->council_02_section_show == 1, ['class' => 'switch switch--shadow']);?>

                                    <label for="council_02_section_show"></label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <?php echo form_label('Exibir seção?', 'board_section_show', ['class' => 'col-sm-2 col-form-label']);?>

                            <div class="col-sm-10">

                                <div class="switch__container">
                                    <?php echo form_checkbox([
                                            'name' => 'board_section_show',
                                            'id'   => 'board_section_show',
                                            'value'   => '1',
                                            'checked' => isset($page_data) && isset($page_data->board_section_show) && $page_data->board_section_show == 1,
                                        ], '1', isset($page_data) && isset($page_data->board_section_show) && $page_data->board_section_show == 1, ['class' => 'switch switch--shadow']);?>

                                    <label for="board_section_show"></label>
                                </div>
                            </div>
                        </div>
                        <h3 class="card-title">Depoimentos</h3>
                       <div class="row mb-3">
                        <div class="col-12">
                            <div class="page-action-button d-flex my-4">
                                <a class="btn btn-success mx-2 my-2" href="<?= base_url("admin/testimonials/add_new") ?>"><i
                                        class="bi bi-plus-square"></i> Adicionar Novo Depoimento</a>
                            </div>
                        </div>
                       </div>
                        <div class="row mb-5">
                            <?php echo form_label('Exibir seção?', 'testimonials_section_show', ['class' => 'col-sm-2 col-form-label']);?>

                            <div class="col-sm-10">

                                <div class="switch__container">
                                    <?php echo form_checkbox([
                                            'name' => 'testimonials_section_show',
                                            'id'   => 'testimonials_section_show',
                                            'value'   => '1',
                                            'checked' => isset($page_data) && isset($page_data->testimonials_section_show) && $page_data->testimonials_section_show == 1,
                                        ], '1', isset($page_data) && isset($page_data->testimonials_section_show) && $page_data->testimonials_section_show == 1, ['class' => 'switch switch--shadow']);?>

                                    <label for="testimonials_section_show"></label>
                                </div>
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