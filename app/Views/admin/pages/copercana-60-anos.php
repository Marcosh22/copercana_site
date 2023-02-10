<main id="main" class="main">

    <div class="pagetitle">
        <h1>Páginas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Páginas</li>
                <li class="breadcrumb-item active">Copercana 60 Anos</li>
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

                        <?php echo form_open_multipart('admin/pages/update_page/29', ['class' => 'my-5']);?>


                        
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

                        <h3 class="card-title">Copercana 60 Anos</h3>
                        <div class="row mb-3">
                            <?php echo form_label('Banner</br><small>(Recomendado: 1920x370)</small>', 'intro_section_banner', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php if(isset($page_data) && isset($page_data->intro_section_banner) && !empty($page_data->intro_section_banner)) { ?>
                                <div class="banner-preview">
                                    <input type="hidden" name="intro_section_banner"
                                        value="<?= $page_data->intro_section_banner; ?>">
                                    <img src="<?= base_url($page_data->intro_section_banner) ?>" alt="">
                                    <a class="delete-btn"
                                        href="<?= base_url("admin/pages/delete_file/17/intro_section_banner") ?>"><i
                                            class="bi bi-x-circle-fill"></i></a>
                                </div>
                                <?php } else { ?>
                                <?php echo form_upload([
                                            'name' => 'intro_section_banner',
                                            'id'   => 'intro_section_banner'
                                        ], '', ['class' => 'form-control']);?>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('Banner Mobile</br><small>(Recomendado: 860x500)</small>', 'intro_section_mobile_banner', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php if(isset($page_data) && isset($page_data->intro_section_mobile_banner) && !empty($page_data->intro_section_mobile_banner)) { ?>
                                <div class="banner-preview">
                                    <input type="hidden" name="intro_section_mobile_banner"
                                        value="<?= $page_data->intro_section_mobile_banner; ?>">
                                    <img src="<?= base_url($page_data->intro_section_mobile_banner) ?>" alt="">
                                    <a class="delete-btn"
                                        href="<?= base_url("admin/pages/delete_file/17/intro_section_mobile_banner") ?>"><i
                                            class="bi bi-x-circle-fill"></i></a>
                                </div>
                                <?php } else { ?>
                                <?php echo form_upload([
                                            'name' => 'intro_section_mobile_banner',
                                            'id'   => 'intro_section_mobile_banner'
                                        ], '', ['class' => 'form-control']);?>
                                <?php } ?>
                            </div>
                        </div>
                        <h3 class="card-title">Sobre</h3>
                        <div class="row mb-3">
                            <?php echo form_label('URL Vídeo (YouTube)', 'about_section_video_url', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_input([
                                    'name' => 'about_section_video_url',
                                    'id'   => 'about_section_video_url',
                                    'type' => 'text'
                                ], isset($page_data) && isset($page_data->about_section_video_url) ? $page_data->about_section_video_url : '', ['class' => 'form-control']);?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('Título', 'about_section_title', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_input([
                                            'name' => 'about_section_title',
                                            'id'   => 'about_section_title',
                                            'type' => 'text'
                                        ], isset($page_data) && isset($page_data->about_section_title) ? $page_data->about_section_title : '', ['class' => 'form-control']);?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('Descrição', 'about_section_description', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_textarea([
                                            'name' => 'about_section_description',
                                            'id'   => 'about_section_description',
                                        ], isset($page_data) && isset($page_data->about_section_description) ? $page_data->about_section_description : '', ['class' => 'form-control editor', 'style' => 'height: 100px']);?>

                            </div>
                        </div>
                        <div class="row mb-5">
                            <?php echo form_label('Exibir seção?', 'about_section_show', ['class' => 'col-sm-2 col-form-label']);?>

                            <div class="col-sm-10">

                                <div class="switch__container">
                                    <?php echo form_checkbox([
                                            'name' => 'about_section_show',
                                            'id'   => 'about_section_show',
                                            'value'   => '1',
                                            'checked' => isset($page_data) && isset($page_data->about_section_show) && $page_data->about_section_show == 1,
                                        ], '1', isset($page_data) && isset($page_data->about_section_show) && $page_data->about_section_show == 1, ['class' => 'switch switch--shadow']);?>

                                    <label for="about_section_show"></label>
                                </div>
                            </div>
                        </div>

                        <h3 class="card-title">Comemoração</h3>
                        <div class="row mb-3">
                            <?php echo form_label('Título', 'celebration_section_title', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_input([
                                            'name' => 'celebration_section_title',
                                            'id'   => 'celebration_section_title',
                                            'type' => 'text'
                                        ], isset($page_data) && isset($page_data->celebration_section_title) ? $page_data->celebration_section_title : '', ['class' => 'form-control']);?>

                            </div>
                        </div>
                        <div class="row mb-5">
                            <?php echo form_label('Exibir seção?', 'celebration_section_show', ['class' => 'col-sm-2 col-form-label']);?>

                            <div class="col-sm-10">

                                <div class="switch__container">
                                    <?php echo form_checkbox([
                                            'name' => 'celebration_section_show',
                                            'id'   => 'celebration_section_show',
                                            'value'   => '1',
                                            'checked' => isset($page_data) && isset($page_data->celebration_section_show) && $page_data->celebration_section_show == 1,
                                        ], '1', isset($page_data) && isset($page_data->celebration_section_show) && $page_data->celebration_section_show == 1, ['class' => 'switch switch--shadow']);?>

                                    <label for="celebration_section_show"></label>
                                </div>
                            </div>
                        </div>

                        <h3 class="card-title">Agronegócios Copercana</h3>
                        <div class="row mb-3">
                            <?php echo form_label('Imagem</br><small>(Recomendado: 1110x340)</small>', 'agrobusiness_section_picture', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php if(isset($page_data) && isset($page_data->agrobusiness_section_picture) && !empty($page_data->agrobusiness_section_picture)) { ?>
                                <div class="banner-preview">
                                    <input type="hidden" name="agrobusiness_section_picture"
                                        value="<?= $page_data->agrobusiness_section_picture; ?>">
                                    <img src="<?= base_url($page_data->agrobusiness_section_picture) ?>" alt="">
                                    <a class="delete-btn"
                                        href="<?= base_url("admin/pages/delete_file/29/agrobusiness_section_picture") ?>"><i
                                            class="bi bi-x-circle-fill"></i></a>
                                </div>
                                <?php } else { ?>
                                <?php echo form_upload([
                                            'name' => 'agrobusiness_section_picture',
                                            'id'   => 'agrobusiness_section_picture'
                                        ], '', ['class' => 'form-control']);?>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('Título', 'agrobusiness_section_title', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_input([
                                            'name' => 'agrobusiness_section_title',
                                            'id'   => 'agrobusiness_section_title',
                                            'type' => 'text'
                                        ], isset($page_data) && isset($page_data->agrobusiness_section_title) ? $page_data->agrobusiness_section_title : '', ['class' => 'form-control']);?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('Descrição', 'agrobusiness_section_description', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_textarea([
                                            'name' => 'agrobusiness_section_description',
                                            'id'   => 'agrobusiness_section_description',
                                        ], isset($page_data) && isset($page_data->agrobusiness_section_description) ? $page_data->agrobusiness_section_description : '', ['class' => 'form-control editor', 'style' => 'height: 100px']);?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="page-action-button d-flex my-4">
                                    <a class="btn btn-success mx-2 my-2"
                                        href="<?= base_url("admin/galleries/edit/1") ?>"><i class="bi bi-plus-square"></i>
                                        Ver Fotos da Galeria
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <?php echo form_label('Exibir seção?', 'agrobusiness_section_show', ['class' => 'col-sm-2 col-form-label']);?>

                            <div class="col-sm-10">

                                <div class="switch__container">
                                    <?php echo form_checkbox([
                                            'name' => 'agrobusiness_section_show',
                                            'id'   => 'agrobusiness_section_show',
                                            'value'   => '1',
                                            'checked' => isset($page_data) && isset($page_data->agrobusiness_section_show) && $page_data->agrobusiness_section_show == 1,
                                        ], '1', isset($page_data) && isset($page_data->agrobusiness_section_show) && $page_data->agrobusiness_section_show == 1, ['class' => 'switch switch--shadow']);?>

                                    <label for="agrobusiness_section_show"></label>
                                </div>
                            </div>
                        </div>

                        <h3 class="card-title">Jantar/Show Aniversário</h3>
                        <div class="row mb-3">
                            <?php echo form_label('Imagem</br><small>(Recomendado: 1110x340)</small>', 'birthday_section_picture', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php if(isset($page_data) && isset($page_data->birthday_section_picture) && !empty($page_data->birthday_section_picture)) { ?>
                                <div class="banner-preview">
                                    <input type="hidden" name="birthday_section_picture"
                                        value="<?= $page_data->birthday_section_picture; ?>">
                                    <img src="<?= base_url($page_data->birthday_section_picture) ?>" alt="">
                                    <a class="delete-btn"
                                        href="<?= base_url("admin/pages/delete_file/29/birthday_section_picture") ?>"><i
                                            class="bi bi-x-circle-fill"></i></a>
                                </div>
                                <?php } else { ?>
                                <?php echo form_upload([
                                            'name' => 'birthday_section_picture',
                                            'id'   => 'birthday_section_picture'
                                        ], '', ['class' => 'form-control']);?>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('Título', 'birthday_section_title', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_input([
                                            'name' => 'birthday_section_title',
                                            'id'   => 'birthday_section_title',
                                            'type' => 'text'
                                        ], isset($page_data) && isset($page_data->birthday_section_title) ? $page_data->birthday_section_title : '', ['class' => 'form-control']);?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('Descrição', 'birthday_section_description', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_textarea([
                                            'name' => 'birthday_section_description',
                                            'id'   => 'birthday_section_description',
                                        ], isset($page_data) && isset($page_data->birthday_section_description) ? $page_data->birthday_section_description : '', ['class' => 'form-control editor', 'style' => 'height: 100px']);?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="page-action-button d-flex my-4">
                                    <a class="btn btn-success mx-2 my-2"
                                        href="<?= base_url("admin/galleries/edit/2") ?>"><i class="bi bi-plus-square"></i>
                                        Ver Fotos da Galeria
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <?php echo form_label('Exibir seção?', 'birthday_section_show', ['class' => 'col-sm-2 col-form-label']);?>

                            <div class="col-sm-10">

                                <div class="switch__container">
                                    <?php echo form_checkbox([
                                            'name' => 'birthday_section_show',
                                            'id'   => 'birthday_section_show',
                                            'value'   => '1',
                                            'checked' => isset($page_data) && isset($page_data->birthday_section_show) && $page_data->birthday_section_show == 1,
                                        ], '1', isset($page_data) && isset($page_data->birthday_section_show) && $page_data->birthday_section_show == 1, ['class' => 'switch switch--shadow']);?>

                                    <label for="birthday_section_show"></label>
                                </div>
                            </div>
                        </div>


                        <h3 class="card-title">Orquestra Sinfônica</h3>
                        <div class="row mb-3">
                            <?php echo form_label('Imagem</br><small>(Recomendado: 1110x340)</small>', 'orchestra_section_picture', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php if(isset($page_data) && isset($page_data->orchestra_section_picture) && !empty($page_data->orchestra_section_picture)) { ?>
                                <div class="banner-preview">
                                    <input type="hidden" name="orchestra_section_picture"
                                        value="<?= $page_data->orchestra_section_picture; ?>">
                                    <img src="<?= base_url($page_data->orchestra_section_picture) ?>" alt="">
                                    <a class="delete-btn"
                                        href="<?= base_url("admin/pages/delete_file/29/orchestra_section_picture") ?>"><i
                                            class="bi bi-x-circle-fill"></i></a>
                                </div>
                                <?php } else { ?>
                                <?php echo form_upload([
                                            'name' => 'orchestra_section_picture',
                                            'id'   => 'orchestra_section_picture'
                                        ], '', ['class' => 'form-control']);?>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('Título', 'orchestra_section_title', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_input([
                                            'name' => 'orchestra_section_title',
                                            'id'   => 'orchestra_section_title',
                                            'type' => 'text'
                                        ], isset($page_data) && isset($page_data->orchestra_section_title) ? $page_data->orchestra_section_title : '', ['class' => 'form-control']);?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('Descrição', 'orchestra_section_description', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_textarea([
                                            'name' => 'orchestra_section_description',
                                            'id'   => 'orchestra_section_description',
                                        ], isset($page_data) && isset($page_data->orchestra_section_description) ? $page_data->orchestra_section_description : '', ['class' => 'form-control editor', 'style' => 'height: 100px']);?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="page-action-button d-flex my-4">
                                    <a class="btn btn-success mx-2 my-2"
                                        href="<?= base_url("admin/galleries/edit/3") ?>"><i class="bi bi-plus-square"></i>
                                        Ver Fotos da Galeria
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <?php echo form_label('Exibir seção?', 'orchestra_section_show', ['class' => 'col-sm-2 col-form-label']);?>

                            <div class="col-sm-10">

                                <div class="switch__container">
                                    <?php echo form_checkbox([
                                            'name' => 'orchestra_section_show',
                                            'id'   => 'orchestra_section_show',
                                            'value'   => '1',
                                            'checked' => isset($page_data) && isset($page_data->orchestra_section_show) && $page_data->orchestra_section_show == 1,
                                        ], '1', isset($page_data) && isset($page_data->orchestra_section_show) && $page_data->orchestra_section_show == 1, ['class' => 'switch switch--shadow']);?>

                                    <label for="orchestra_section_show"></label>
                                </div>
                            </div>
                        </div>

                        <h3 class="card-title">Mundo Digital</h3>
                        <div class="row mb-3">
                            <?php echo form_label('Imagem</br><small>(Recomendado: 1110x340)</small>', 'digital_section_picture', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php if(isset($page_data) && isset($page_data->digital_section_picture) && !empty($page_data->digital_section_picture)) { ?>
                                <div class="banner-preview">
                                    <input type="hidden" name="digital_section_picture"
                                        value="<?= $page_data->digital_section_picture; ?>">
                                    <img src="<?= base_url($page_data->digital_section_picture) ?>" alt="">
                                    <a class="delete-btn"
                                        href="<?= base_url("admin/pages/delete_file/29/digital_section_picture") ?>"><i
                                            class="bi bi-x-circle-fill"></i></a>
                                </div>
                                <?php } else { ?>
                                <?php echo form_upload([
                                            'name' => 'digital_section_picture',
                                            'id'   => 'digital_section_picture'
                                        ], '', ['class' => 'form-control']);?>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('Título', 'digital_section_title', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_input([
                                            'name' => 'digital_section_title',
                                            'id'   => 'digital_section_title',
                                            'type' => 'text'
                                        ], isset($page_data) && isset($page_data->digital_section_title) ? $page_data->digital_section_title : '', ['class' => 'form-control']);?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('Descrição', 'digital_section_description', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_textarea([
                                            'name' => 'digital_section_description',
                                            'id'   => 'digital_section_description',
                                        ], isset($page_data) && isset($page_data->digital_section_description) ? $page_data->digital_section_description : '', ['class' => 'form-control editor', 'style' => 'height: 100px']);?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="page-action-button d-flex my-4">
                                    <a class="btn btn-success mx-2 my-2"
                                        href="<?= base_url("admin/galleries/edit/4") ?>"><i class="bi bi-plus-square"></i>
                                        Ver Fotos da Galeria
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <?php echo form_label('Exibir seção?', 'digital_section_show', ['class' => 'col-sm-2 col-form-label']);?>

                            <div class="col-sm-10">

                                <div class="switch__container">
                                    <?php echo form_checkbox([
                                            'name' => 'digital_section_show',
                                            'id'   => 'digital_section_show',
                                            'value'   => '1',
                                            'checked' => isset($page_data) && isset($page_data->digital_section_show) && $page_data->digital_section_show == 1,
                                        ], '1', isset($page_data) && isset($page_data->digital_section_show) && $page_data->digital_section_show == 1, ['class' => 'switch switch--shadow']);?>

                                    <label for="digital_section_show"></label>
                                </div>
                            </div>
                        </div>

                        <h3 class="card-title">Revista Canavieiros</h3>
                        <div class="row mb-3">
                            <?php echo form_label('Imagem</br><small>(Recomendado: 1110x340)</small>', 'magazine_section_picture', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php if(isset($page_data) && isset($page_data->magazine_section_picture) && !empty($page_data->magazine_section_picture)) { ?>
                                <div class="banner-preview">
                                    <input type="hidden" name="magazine_section_picture"
                                        value="<?= $page_data->magazine_section_picture; ?>">
                                    <img src="<?= base_url($page_data->magazine_section_picture) ?>" alt="">
                                    <a class="delete-btn"
                                        href="<?= base_url("admin/pages/delete_file/29/magazine_section_picture") ?>"><i
                                            class="bi bi-x-circle-fill"></i></a>
                                </div>
                                <?php } else { ?>
                                <?php echo form_upload([
                                            'name' => 'magazine_section_picture',
                                            'id'   => 'magazine_section_picture'
                                        ], '', ['class' => 'form-control']);?>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('Título', 'magazine_section_title', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_input([
                                            'name' => 'magazine_section_title',
                                            'id'   => 'magazine_section_title',
                                            'type' => 'text'
                                        ], isset($page_data) && isset($page_data->magazine_section_title) ? $page_data->magazine_section_title : '', ['class' => 'form-control']);?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('Descrição', 'magazine_section_description', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_textarea([
                                            'name' => 'magazine_section_description',
                                            'id'   => 'magazine_section_description',
                                        ], isset($page_data) && isset($page_data->magazine_section_description) ? $page_data->magazine_section_description : '', ['class' => 'form-control editor', 'style' => 'height: 100px']);?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="page-action-button d-flex my-4">
                                    <a class="btn btn-success mx-2 my-2"
                                        href="<?= base_url("admin/galleries/edit/5") ?>"><i class="bi bi-plus-square"></i>
                                        Ver Fotos da Galeria
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <?php echo form_label('Exibir seção?', 'magazine_section_show', ['class' => 'col-sm-2 col-form-label']);?>

                            <div class="col-sm-10">

                                <div class="switch__container">
                                    <?php echo form_checkbox([
                                            'name' => 'magazine_section_show',
                                            'id'   => 'magazine_section_show',
                                            'value'   => '1',
                                            'checked' => isset($page_data) && isset($page_data->magazine_section_show) && $page_data->magazine_section_show == 1,
                                        ], '1', isset($page_data) && isset($page_data->magazine_section_show) && $page_data->magazine_section_show == 1, ['class' => 'switch switch--shadow']);?>

                                    <label for="magazine_section_show"></label>
                                </div>
                            </div>
                        </div>

                        <h3 class="card-title">Diversos</h3>
                        <div class="row mb-3">
                            <?php echo form_label('Imagem</br><small>(Recomendado: 1110x340)</small>', 'miscellaneous_section_picture', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php if(isset($page_data) && isset($page_data->miscellaneous_section_picture) && !empty($page_data->miscellaneous_section_picture)) { ?>
                                <div class="banner-preview">
                                    <input type="hidden" name="miscellaneous_section_picture"
                                        value="<?= $page_data->miscellaneous_section_picture; ?>">
                                    <img src="<?= base_url($page_data->miscellaneous_section_picture) ?>" alt="">
                                    <a class="delete-btn"
                                        href="<?= base_url("admin/pages/delete_file/29/miscellaneous_section_picture") ?>"><i
                                            class="bi bi-x-circle-fill"></i></a>
                                </div>
                                <?php } else { ?>
                                <?php echo form_upload([
                                            'name' => 'miscellaneous_section_picture',
                                            'id'   => 'miscellaneous_section_picture'
                                        ], '', ['class' => 'form-control']);?>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('Título', 'miscellaneous_section_title', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_input([
                                            'name' => 'miscellaneous_section_title',
                                            'id'   => 'miscellaneous_section_title',
                                            'type' => 'text'
                                        ], isset($page_data) && isset($page_data->miscellaneous_section_title) ? $page_data->miscellaneous_section_title : '', ['class' => 'form-control']);?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('Descrição', 'miscellaneous_section_description', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_textarea([
                                            'name' => 'miscellaneous_section_description',
                                            'id'   => 'miscellaneous_section_description',
                                        ], isset($page_data) && isset($page_data->miscellaneous_section_description) ? $page_data->miscellaneous_section_description : '', ['class' => 'form-control editor', 'style' => 'height: 100px']);?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="page-action-button d-flex my-4">
                                    <a class="btn btn-success mx-2 my-2"
                                        href="<?= base_url("admin/galleries/edit/6") ?>"><i class="bi bi-plus-square"></i>
                                        Ver Fotos da Galeria
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <?php echo form_label('Exibir seção?', 'miscellaneous_section_show', ['class' => 'col-sm-2 col-form-label']);?>

                            <div class="col-sm-10">

                                <div class="switch__container">
                                    <?php echo form_checkbox([
                                            'name' => 'miscellaneous_section_show',
                                            'id'   => 'miscellaneous_section_show',
                                            'value'   => '1',
                                            'checked' => isset($page_data) && isset($page_data->miscellaneous_section_show) && $page_data->miscellaneous_section_show == 1,
                                        ], '1', isset($page_data) && isset($page_data->miscellaneous_section_show) && $page_data->miscellaneous_section_show == 1, ['class' => 'switch switch--shadow']);?>

                                    <label for="miscellaneous_section_show"></label>
                                </div>
                            </div>
                        </div>

                        <h3 class="card-title">Boas Experiências</h3>
                        <div class="row mb-3">
                            <?php echo form_label('Título', 'experiences_section_title', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_input([
                                            'name' => 'experiences_section_title',
                                            'id'   => 'experiences_section_title',
                                            'type' => 'text'
                                        ], isset($page_data) && isset($page_data->experiences_section_title) ? $page_data->experiences_section_title : '', ['class' => 'form-control']);?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('Descrição', 'experiences_section_description', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_textarea([
                                            'name' => 'experiences_section_description',
                                            'id'   => 'experiences_section_description',
                                        ], isset($page_data) && isset($page_data->experiences_section_description) ? $page_data->experiences_section_description : '', ['class' => 'form-control editor', 'style' => 'height: 100px']);?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="page-action-button d-flex my-4">
                                    <a class="btn btn-success mx-2 my-2"
                                        href="<?= base_url("admin/videos") ?>"><i class="bi bi-plus-square"></i>
                                        Gerenciar Vídeos
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <?php echo form_label('Exibir seção?', 'experiences_section_show', ['class' => 'col-sm-2 col-form-label']);?>

                            <div class="col-sm-10">

                                <div class="switch__container">
                                    <?php echo form_checkbox([
                                            'name' => 'experiences_section_show',
                                            'id'   => 'experiences_section_show',
                                            'value'   => '1',
                                            'checked' => isset($page_data) && isset($page_data->experiences_section_show) && $page_data->experiences_section_show == 1,
                                        ], '1', isset($page_data) && isset($page_data->experiences_section_show) && $page_data->experiences_section_show == 1, ['class' => 'switch switch--shadow']);?>

                                    <label for="experiences_section_show"></label>
                                </div>
                            </div>
                        </div>

                        <h3 class="card-title">Parceiros</h3>
                        <div class="row mb-3">
                            <?php echo form_label('Título', 'partners_section_title', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_input([
                                            'name' => 'partners_section_title',
                                            'id'   => 'partners_section_title',
                                            'type' => 'text'
                                        ], isset($page_data) && isset($page_data->partners_section_title) ? $page_data->partners_section_title : '', ['class' => 'form-control']);?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('Descrição', 'partners_section_description', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_textarea([
                                            'name' => 'partners_section_description',
                                            'id'   => 'partners_section_description',
                                        ], isset($page_data) && isset($page_data->partners_section_description) ? $page_data->partners_section_description : '', ['class' => 'form-control editor', 'style' => 'height: 100px']);?>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <?php echo form_label('Exibir patrocinadores?', 'partners_section_sponsors_show', ['class' => 'col-sm-2 col-form-label']);?>

                            <div class="col-sm-10">

                                <div class="switch__container">
                                    <?php echo form_checkbox([
                                            'name' => 'partners_section_sponsors_show',
                                            'id'   => 'partners_section_sponsors_show',
                                            'value'   => '1',
                                            'checked' => isset($page_data) && isset($page_data->partners_section_sponsors_show) && $page_data->partners_section_sponsors_show == 1,
                                        ], '1', isset($page_data) && isset($page_data->partners_section_sponsors_show) && $page_data->partners_section_sponsors_show == 1, ['class' => 'switch switch--shadow']);?>

                                    <label for="partners_section_sponsors_show"></label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <?php echo form_label('Exibir patrocinadores premiums?', 'partners_section_premium_sponsors_show', ['class' => 'col-sm-2 col-form-label']);?>

                            <div class="col-sm-10">

                                <div class="switch__container">
                                    <?php echo form_checkbox([
                                            'name' => 'partners_section_premium_sponsors_show',
                                            'id'   => 'partners_section_premium_sponsors_show',
                                            'value'   => '1',
                                            'checked' => isset($page_data) && isset($page_data->partners_section_premium_sponsors_show) && $page_data->partners_section_premium_sponsors_show == 1,
                                        ], '1', isset($page_data) && isset($page_data->partners_section_premium_sponsors_show) && $page_data->partners_section_premium_sponsors_show == 1, ['class' => 'switch switch--shadow']);?>

                                    <label for="partners_section_premium_sponsors_show"></label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-5">
                            <?php echo form_label('Exibir seção?', 'partners_section_show', ['class' => 'col-sm-2 col-form-label']);?>

                            <div class="col-sm-10">

                                <div class="switch__container">
                                    <?php echo form_checkbox([
                                            'name' => 'partners_section_show',
                                            'id'   => 'partners_section_show',
                                            'value'   => '1',
                                            'checked' => isset($page_data) && isset($page_data->partners_section_show) && $page_data->partners_section_show == 1,
                                        ], '1', isset($page_data) && isset($page_data->partners_section_show) && $page_data->partners_section_show == 1, ['class' => 'switch switch--shadow']);?>

                                    <label for="partners_section_show"></label>
                                </div>
                            </div>
                        </div>

                        <h3 class="card-title">Compartilhar</h3>
                        <div class="row mb-3">
                            <?php echo form_label('Título', 'share_section_title', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_input([
                                            'name' => 'share_section_title',
                                            'id'   => 'share_section_title',
                                            'type' => 'text'
                                        ], isset($page_data) && isset($page_data->share_section_title) ? $page_data->share_section_title : '', ['class' => 'form-control']);?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('Descrição', 'share_section_description', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_textarea([
                                            'name' => 'share_section_description',
                                            'id'   => 'share_section_description',
                                        ], isset($page_data) && isset($page_data->share_section_description) ? $page_data->share_section_description : '', ['class' => 'form-control editor', 'style' => 'height: 100px']);?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('Descrição Secundária', 'share_section_secondary_description', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_textarea([
                                            'name' => 'share_section_secondary_description',
                                            'id'   => 'share_section_secondary_description',
                                        ], isset($page_data) && isset($page_data->share_section_secondary_description) ? $page_data->share_section_secondary_description : '', ['class' => 'form-control editor', 'style' => 'height: 100px']);?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="page-action-button d-flex my-4">
                                    <a class="btn btn-success mx-2 my-2"
                                        href="<?= base_url("admin/files ") ?>"><i class="bi bi-plus-square"></i>
                                        Gerenciar Arquivos
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <?php echo form_label('Exibir seção?', 'share_section_show', ['class' => 'col-sm-2 col-form-label']);?>

                            <div class="col-sm-10">

                                <div class="switch__container">
                                    <?php echo form_checkbox([
                                            'name' => 'share_section_show',
                                            'id'   => 'share_section_show',
                                            'value'   => '1',
                                            'checked' => isset($page_data) && isset($page_data->share_section_show) && $page_data->share_section_show == 1,
                                        ], '1', isset($page_data) && isset($page_data->share_section_show) && $page_data->share_section_show == 1, ['class' => 'switch switch--shadow']);?>

                                    <label for="share_section_show"></label>
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