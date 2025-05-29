<main id="main" class="main">

    <div class="pagetitle">
        <h1>Páginas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Páginas</li>
                <li class="breadcrumb-item active">Home</li>
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

                        <?php echo form_open_multipart('admin/pages/update_page/1', ['class' => 'my-5']);?>

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
                        <h3 class="card-title">Serviços</h3>
                        <div class="row mb-3">
                            <?php echo form_label('Título', 'services_section_title', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_input([
                                                'name' => 'services_section_title',
                                                'id'   => 'services_section_title',
                                                'type' => 'text'
                                            ], isset($page_data) && isset($page_data->services_section_title) ? $page_data->services_section_title : '', ['class' => 'form-control']);?>

                            </div>
                        </div>
                        <div class="row mb-5">
                            <?php echo form_label('Exibir seção?', 'services_section_show', ['class' => 'col-sm-2 col-form-label']);?>

                            <div class="col-sm-10">

                                <div class="switch__container">
                                    <?php echo form_checkbox([
                                            'name' => 'services_section_show',
                                            'id'   => 'services_section_show',
                                            'value'   => '1',
                                            'checked' => isset($page_data) && isset($page_data->services_section_show) && $page_data->services_section_show == 1,
                                        ], '1', isset($page_data) && isset($page_data->services_section_show) && $page_data->services_section_show == 1, ['class' => 'switch switch--shadow']);?>

                                    <label for="services_section_show"></label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-sm-2">
                                <?php echo form_label('Auto Center', '', ['class' => 'card-title col-form-label']);?>
                            </div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <?php echo form_label('Imagem</br><small>(Recomendado: 300x160)</small>', 'service_01_picture', ['class' => 'col-form-label']);?>
                                        <?php if(isset($page_data) && isset($page_data->service_01_picture) && !empty($page_data->service_01_picture)) { ?>
                                        <div class="banner-preview">
                                            <input type="hidden" name="service_01_picture"
                                                value="<?= $page_data->service_01_picture; ?>">
                                            <img src="<?= base_url($page_data->service_01_picture) ?>" alt="">
                                            <a class="delete-btn"
                                                href="<?= base_url("admin/pages/delete_file/1/service_01_picture") ?>"><i
                                                    class="bi bi-x-circle-fill"></i></a>
                                        </div>
                                        <?php } else { ?>
                                        <?php echo form_upload([
                                                    'name' => 'service_01_picture',
                                                    'id'   => 'service_01_picture'
                                                ], '', ['class' => 'form-control']);?>
                                        <?php } ?>
                                    </div>
                                    <div class="col-sm-8 d-flex flex-column justify-content-end">
                                        <?php echo form_label('Título', 'service_01_title', ['class' => 'col-form-label']);?>
                                        <?php echo form_input([
                                                'name' => 'service_01_title',
                                                'id'   => 'service_01_title',
                                                'type' => 'text'
                                            ], isset($page_data) && isset($page_data->service_01_title) ? $page_data->service_01_title : '', ['class' => 'form-control']);?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo form_label('Descrição', 'service_01_description', ['class' => 'col-form-label']);?>
                                        <?php echo form_textarea([
                                                'name' => 'service_01_description',
                                                'id'   => 'service_01_description',
                                            ], isset($page_data) && isset($page_data->service_01_description) ? $page_data->service_01_description : '', ['class' => 'form-control', 'style' => 'height: 70px']);?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo form_label('Exibir?', 'show_service_01', ['class' => 'col-form-label']);?>
                                        <div class="switch__container">
                                            <?php echo form_checkbox([
                                                    'name' => 'show_service_01',
                                                    'id'   => 'show_service_01',
                                                    'value'   => '1',
                                                    'checked' => isset($page_data) && isset($page_data->show_service_01) && $page_data->show_service_01 == 1,
                                                ], '1', isset($page_data) && isset($page_data->show_service_01) && $page_data->show_service_01 == 1, ['class' => 'switch switch--shadow']);?>

                                            <label for="show_service_01"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-5">
                            <div class="col-sm-2">
                                <?php echo form_label('Seguros', '', ['class' => 'card-title col-form-label']);?>
                            </div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <?php echo form_label('Imagem</br><small>(Recomendado: 300x160)</small>', 'service_02_picture', ['class' => 'col-form-label']);?>
                                        <?php if(isset($page_data) && isset($page_data->service_02_picture) && !empty($page_data->service_02_picture)) { ?>
                                        <div class="banner-preview">
                                            <input type="hidden" name="service_02_picture"
                                                value="<?= $page_data->service_02_picture; ?>">
                                            <img src="<?= base_url($page_data->service_02_picture) ?>" alt="">
                                            <a class="delete-btn"
                                                href="<?= base_url("admin/pages/delete_file/1/service_02_picture") ?>"><i
                                                    class="bi bi-x-circle-fill"></i></a>
                                        </div>
                                        <?php } else { ?>
                                        <?php echo form_upload([
                                                    'name' => 'service_02_picture',
                                                    'id'   => 'service_02_picture'
                                                ], '', ['class' => 'form-control']);?>
                                        <?php } ?>
                                    </div>
                                    <div class="col-sm-8 d-flex flex-column justify-content-end">
                                        <?php echo form_label('Título', 'service_02_title', ['class' => 'col-form-label']);?>
                                        <?php echo form_input([
                                                'name' => 'service_02_title',
                                                'id'   => 'service_02_title',
                                                'type' => 'text'
                                            ], isset($page_data) && isset($page_data->service_02_title) ? $page_data->service_02_title : '', ['class' => 'form-control']);?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo form_label('Descrição', 'service_02_description', ['class' => 'col-form-label']);?>
                                        <?php echo form_textarea([
                                                'name' => 'service_02_description',
                                                'id'   => 'service_02_description',
                                            ], isset($page_data) && isset($page_data->service_02_description) ? $page_data->service_02_description : '', ['class' => 'form-control', 'style' => 'height: 70px']);?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo form_label('Exibir?', 'show_service_02', ['class' => 'col-form-label']);?>
                                        <div class="switch__container">
                                            <?php echo form_checkbox([
                                                    'name' => 'show_service_02',
                                                    'id'   => 'show_service_02',
                                                    'value'   => '1',
                                                    'checked' => isset($page_data) && isset($page_data->show_service_02) && $page_data->show_service_02 == 1,
                                                ], '1', isset($page_data) && isset($page_data->show_service_02) && $page_data->show_service_02 == 1, ['class' => 'switch switch--shadow']);?>

                                            <label for="show_service_02"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-sm-2">
                                <?php echo form_label('Centro de Eventos', '', ['class' => 'card-title col-form-label']);?>
                            </div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <?php echo form_label('Imagem</br><small>(Recomendado: 300x160)</small>', 'service_03_picture', ['class' => 'col-form-label']);?>
                                        <?php if(isset($page_data) && isset($page_data->service_03_picture) && !empty($page_data->service_03_picture)) { ?>
                                        <div class="banner-preview">
                                            <input type="hidden" name="service_03_picture"
                                                value="<?= $page_data->service_03_picture; ?>">
                                            <img src="<?= base_url($page_data->service_03_picture) ?>" alt="">
                                            <a class="delete-btn"
                                                href="<?= base_url("admin/pages/delete_file/1/service_03_picture") ?>"><i
                                                    class="bi bi-x-circle-fill"></i></a>
                                        </div>
                                        <?php } else { ?>
                                        <?php echo form_upload([
                                                    'name' => 'service_03_picture',
                                                    'id'   => 'service_03_picture'
                                                ], '', ['class' => 'form-control']);?>
                                        <?php } ?>
                                    </div>
                                    <div class="col-sm-8 d-flex flex-column justify-content-end">
                                        <?php echo form_label('Título', 'service_03_title', ['class' => 'col-form-label']);?>
                                        <?php echo form_input([
                                                'name' => 'service_03_title',
                                                'id'   => 'service_03_title',
                                                'type' => 'text'
                                            ], isset($page_data) && isset($page_data->service_03_title) ? $page_data->service_03_title : '', ['class' => 'form-control']);?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo form_label('Descrição', 'service_03_description', ['class' => 'col-form-label']);?>
                                        <?php echo form_textarea([
                                                'name' => 'service_03_description',
                                                'id'   => 'service_03_description',
                                            ], isset($page_data) && isset($page_data->service_03_description) ? $page_data->service_03_description : '', ['class' => 'form-control', 'style' => 'height: 70px']);?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo form_label('Exibir?', 'show_service_03', ['class' => 'col-form-label']);?>
                                        <div class="switch__container">
                                            <?php echo form_checkbox([
                                                    'name' => 'show_service_03',
                                                    'id'   => 'show_service_03',
                                                    'value'   => '1',
                                                    'checked' => isset($page_data) && isset($page_data->show_service_03) && $page_data->show_service_03 == 1,
                                                ], '1', isset($page_data) && isset($page_data->show_service_03) && $page_data->show_service_03 == 1, ['class' => 'switch switch--shadow']);?>

                                            <label for="show_service_03"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-sm-2">
                                <?php echo form_label('Copercana Solar', '', ['class' => 'card-title col-form-label']);?>
                            </div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <?php echo form_label('Imagem</br><small>(Recomendado: 300x160)</small>', 'service_04_picture', ['class' => 'col-form-label']);?>
                                        <?php if(isset($page_data) && isset($page_data->service_04_picture) && !empty($page_data->service_04_picture)) { ?>
                                        <div class="banner-preview">
                                            <input type="hidden" name="service_04_picture"
                                                value="<?= $page_data->service_04_picture; ?>">
                                            <img src="<?= base_url($page_data->service_04_picture) ?>" alt="">
                                            <a class="delete-btn"
                                                href="<?= base_url("admin/pages/delete_file/1/service_04_picture") ?>"><i
                                                    class="bi bi-x-circle-fill"></i></a>
                                        </div>
                                        <?php } else { ?>
                                        <?php echo form_upload([
                                                    'name' => 'service_04_picture',
                                                    'id'   => 'service_04_picture'
                                                ], '', ['class' => 'form-control']);?>
                                        <?php } ?>
                                    </div>
                                    <div class="col-sm-8 d-flex flex-column justify-content-end">
                                        <?php echo form_label('Título', 'service_04_title', ['class' => 'col-form-label']);?>
                                        <?php echo form_input([
                                                'name' => 'service_04_title',
                                                'id'   => 'service_04_title',
                                                'type' => 'text'
                                            ], isset($page_data) && isset($page_data->service_04_title) ? $page_data->service_04_title : '', ['class' => 'form-control']);?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo form_label('Descrição', 'service_04_description', ['class' => 'col-form-label']);?>
                                        <?php echo form_textarea([
                                                'name' => 'service_04_description',
                                                'id'   => 'service_04_description',
                                            ], isset($page_data) && isset($page_data->service_04_description) ? $page_data->service_04_description : '', ['class' => 'form-control', 'style' => 'height: 70px']);?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo form_label('Exibir?', 'show_service_04', ['class' => 'col-form-label']);?>
                                        <div class="switch__container">
                                            <?php echo form_checkbox([
                                                    'name' => 'show_service_04',
                                                    'id'   => 'show_service_04',
                                                    'value'   => '1',
                                                    'checked' => isset($page_data) && isset($page_data->show_service_04) && $page_data->show_service_04 == 1,
                                                ], '1', isset($page_data) && isset($page_data->show_service_04) && $page_data->show_service_04 == 1, ['class' => 'switch switch--shadow']);?>

                                            <label for="show_service_04"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-sm-2">
                                <?php echo form_label('Copercana Sustentável', '', ['class' => 'card-title col-form-label']);?>
                            </div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <?php echo form_label('Imagem</br><small>(Recomendado: 300x160)</small>', 'service_05_picture', ['class' => 'col-form-label']);?>
                                        <?php if(isset($page_data) && isset($page_data->service_05_picture) && !empty($page_data->service_05_picture)) { ?>
                                        <div class="banner-preview">
                                            <input type="hidden" name="service_05_picture"
                                                value="<?= $page_data->service_05_picture; ?>">
                                            <img src="<?= base_url($page_data->service_05_picture) ?>" alt="">
                                            <a class="delete-btn"
                                                href="<?= base_url("admin/pages/delete_file/1/service_05_picture") ?>"><i
                                                    class="bi bi-x-circle-fill"></i></a>
                                        </div>
                                        <?php } else { ?>
                                        <?php echo form_upload([
                                                    'name' => 'service_05_picture',
                                                    'id'   => 'service_05_picture'
                                                ], '', ['class' => 'form-control']);?>
                                        <?php } ?>
                                    </div>
                                    <div class="col-sm-8 d-flex flex-column justify-content-end">
                                        <?php echo form_label('Título', 'service_05_title', ['class' => 'col-form-label']);?>
                                        <?php echo form_input([
                                                'name' => 'service_05_title',
                                                'id'   => 'service_05_title',
                                                'type' => 'text'
                                            ], isset($page_data) && isset($page_data->service_05_title) ? $page_data->service_05_title : '', ['class' => 'form-control']);?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo form_label('Descrição', 'service_05_description', ['class' => 'col-form-label']);?>
                                        <?php echo form_textarea([
                                                'name' => 'service_05_description',
                                                'id'   => 'service_05_description',
                                            ], isset($page_data) && isset($page_data->service_05_description) ? $page_data->service_05_description : '', ['class' => 'form-control', 'style' => 'height: 70px']);?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo form_label('Exibir?', 'show_service_05', ['class' => 'col-form-label']);?>
                                        <div class="switch__container">
                                            <?php echo form_checkbox([
                                                    'name' => 'show_service_05',
                                                    'id'   => 'show_service_05',
                                                    'value'   => '1',
                                                    'checked' => isset($page_data) && isset($page_data->show_service_05) && $page_data->show_service_05 == 1,
                                                ], '1', isset($page_data) && isset($page_data->show_service_05) && $page_data->show_service_05 == 1, ['class' => 'switch switch--shadow']);?>

                                            <label for="show_service_05"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-sm-2">
                                <?php echo form_label('Departamento Agronômico', '', ['class' => 'card-title col-form-label']);?>
                            </div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <?php echo form_label('Imagem</br><small>(Recomendado: 300x160)</small>', 'service_06_picture', ['class' => 'col-form-label']);?>
                                        <?php if(isset($page_data) && isset($page_data->service_06_picture) && !empty($page_data->service_06_picture)) { ?>
                                        <div class="banner-preview">
                                            <input type="hidden" name="service_06_picture"
                                                value="<?= $page_data->service_06_picture; ?>">
                                            <img src="<?= base_url($page_data->service_06_picture) ?>" alt="">
                                            <a class="delete-btn"
                                                href="<?= base_url("admin/pages/delete_file/1/service_06_picture") ?>"><i
                                                    class="bi bi-x-circle-fill"></i></a>
                                        </div>
                                        <?php } else { ?>
                                        <?php echo form_upload([
                                                    'name' => 'service_06_picture',
                                                    'id'   => 'service_06_picture'
                                                ], '', ['class' => 'form-control']);?>
                                        <?php } ?>
                                    </div>
                                    <div class="col-sm-8 d-flex flex-column justify-content-end">
                                        <?php echo form_label('Título', 'service_06_title', ['class' => 'col-form-label']);?>
                                        <?php echo form_input([
                                                'name' => 'service_06_title',
                                                'id'   => 'service_06_title',
                                                'type' => 'text'
                                            ], isset($page_data) && isset($page_data->service_06_title) ? $page_data->service_06_title : '', ['class' => 'form-control']);?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo form_label('Descrição', 'service_06_description', ['class' => 'col-form-label']);?>
                                        <?php echo form_textarea([
                                                'name' => 'service_06_description',
                                                'id'   => 'service_06_description',
                                            ], isset($page_data) && isset($page_data->service_06_description) ? $page_data->service_06_description : '', ['class' => 'form-control', 'style' => 'height: 70px']);?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo form_label('Exibir?', 'show_service_06', ['class' => 'col-form-label']);?>
                                        <div class="switch__container">
                                            <?php echo form_checkbox([
                                                    'name' => 'show_service_06',
                                                    'id'   => 'show_service_06',
                                                    'value'   => '1',
                                                    'checked' => isset($page_data) && isset($page_data->show_service_06) && $page_data->show_service_06 == 1,
                                                ], '1', isset($page_data) && isset($page_data->show_service_06) && $page_data->show_service_06 == 1, ['class' => 'switch switch--shadow']);?>

                                            <label for="show_service_06"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-sm-2">
                                <?php echo form_label('Distribuidora de Combustível', '', ['class' => 'card-title col-form-label']);?>
                            </div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <?php echo form_label('Imagem</br><small>(Recomendado: 300x160)</small>', 'service_07_picture', ['class' => 'col-form-label']);?>
                                        <?php if(isset($page_data) && isset($page_data->service_07_picture) && !empty($page_data->service_07_picture)) { ?>
                                        <div class="banner-preview">
                                            <input type="hidden" name="service_07_picture"
                                                value="<?= $page_data->service_07_picture; ?>">
                                            <img src="<?= base_url($page_data->service_07_picture) ?>" alt="">
                                            <a class="delete-btn"
                                                href="<?= base_url("admin/pages/delete_file/1/service_07_picture") ?>"><i
                                                    class="bi bi-x-circle-fill"></i></a>
                                        </div>
                                        <?php } else { ?>
                                        <?php echo form_upload([
                                                    'name' => 'service_07_picture',
                                                    'id'   => 'service_07_picture'
                                                ], '', ['class' => 'form-control']);?>
                                        <?php } ?>
                                    </div>
                                    <div class="col-sm-8 d-flex flex-column justify-content-end">
                                        <?php echo form_label('Título', 'service_07_title', ['class' => 'col-form-label']);?>
                                        <?php echo form_input([
                                                'name' => 'service_07_title',
                                                'id'   => 'service_07_title',
                                                'type' => 'text'
                                            ], isset($page_data) && isset($page_data->service_07_title) ? $page_data->service_07_title : '', ['class' => 'form-control']);?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo form_label('Descrição', 'service_07_description', ['class' => 'col-form-label']);?>
                                        <?php echo form_textarea([
                                                'name' => 'service_07_description',
                                                'id'   => 'service_07_description',
                                            ], isset($page_data) && isset($page_data->service_07_description) ? $page_data->service_07_description : '', ['class' => 'form-control', 'style' => 'height: 70px']);?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo form_label('Exibir?', 'show_service_07', ['class' => 'col-form-label']);?>
                                        <div class="switch__container">
                                            <?php echo form_checkbox([
                                                    'name' => 'show_service_07',
                                                    'id'   => 'show_service_07',
                                                    'value'   => '1',
                                                    'checked' => isset($page_data) && isset($page_data->show_service_07) && $page_data->show_service_07 == 1,
                                                ], '1', isset($page_data) && isset($page_data->show_service_07) && $page_data->show_service_07 == 1, ['class' => 'switch switch--shadow']);?>

                                            <label for="show_service_07"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-sm-2">
                                <?php echo form_label('Ferragem e Magazine', '', ['class' => 'card-title col-form-label']);?>
                            </div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <?php echo form_label('Imagem</br><small>(Recomendado: 300x160)</small>', 'service_08_picture', ['class' => 'col-form-label']);?>
                                        <?php if(isset($page_data) && isset($page_data->service_08_picture) && !empty($page_data->service_08_picture)) { ?>
                                        <div class="banner-preview">
                                            <input type="hidden" name="service_08_picture"
                                                value="<?= $page_data->service_08_picture; ?>">
                                            <img src="<?= base_url($page_data->service_08_picture) ?>" alt="">
                                            <a class="delete-btn"
                                                href="<?= base_url("admin/pages/delete_file/1/service_08_picture") ?>"><i
                                                    class="bi bi-x-circle-fill"></i></a>
                                        </div>
                                        <?php } else { ?>
                                        <?php echo form_upload([
                                                    'name' => 'service_08_picture',
                                                    'id'   => 'service_08_picture'
                                                ], '', ['class' => 'form-control']);?>
                                        <?php } ?>
                                    </div>
                                    <div class="col-sm-8 d-flex flex-column justify-content-end">
                                        <?php echo form_label('Título', 'service_08_title', ['class' => 'col-form-label']);?>
                                        <?php echo form_input([
                                                'name' => 'service_08_title',
                                                'id'   => 'service_08_title',
                                                'type' => 'text'
                                            ], isset($page_data) && isset($page_data->service_08_title) ? $page_data->service_08_title : '', ['class' => 'form-control']);?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo form_label('Descrição', 'service_08_description', ['class' => 'col-form-label']);?>
                                        <?php echo form_textarea([
                                                'name' => 'service_08_description',
                                                'id'   => 'service_08_description',
                                            ], isset($page_data) && isset($page_data->service_08_description) ? $page_data->service_08_description : '', ['class' => 'form-control', 'style' => 'height: 70px']);?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo form_label('Exibir?', 'show_service_08', ['class' => 'col-form-label']);?>
                                        <div class="switch__container">
                                            <?php echo form_checkbox([
                                                    'name' => 'show_service_08',
                                                    'id'   => 'show_service_08',
                                                    'value'   => '1',
                                                    'checked' => isset($page_data) && isset($page_data->show_service_08) && $page_data->show_service_08 == 1,
                                                ], '1', isset($page_data) && isset($page_data->show_service_08) && $page_data->show_service_08 == 1, ['class' => 'switch switch--shadow']);?>

                                            <label for="show_service_08"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-sm-2">
                                <?php echo form_label('Laboratório de Solos', '', ['class' => 'card-title col-form-label']);?>
                            </div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <?php echo form_label('Imagem</br><small>(Recomendado: 300x160)</small>', 'service_09_picture', ['class' => 'col-form-label']);?>
                                        <?php if(isset($page_data) && isset($page_data->service_09_picture) && !empty($page_data->service_09_picture)) { ?>
                                        <div class="banner-preview">
                                            <input type="hidden" name="service_09_picture"
                                                value="<?= $page_data->service_09_picture; ?>">
                                            <img src="<?= base_url($page_data->service_09_picture) ?>" alt="">
                                            <a class="delete-btn"
                                                href="<?= base_url("admin/pages/delete_file/1/service_09_picture") ?>"><i
                                                    class="bi bi-x-circle-fill"></i></a>
                                        </div>
                                        <?php } else { ?>
                                        <?php echo form_upload([
                                                    'name' => 'service_09_picture',
                                                    'id'   => 'service_09_picture'
                                                ], '', ['class' => 'form-control']);?>
                                        <?php } ?>
                                    </div>
                                    <div class="col-sm-8 d-flex flex-column justify-content-end">
                                        <?php echo form_label('Título', 'service_09_title', ['class' => 'col-form-label']);?>
                                        <?php echo form_input([
                                                'name' => 'service_09_title',
                                                'id'   => 'service_09_title',
                                                'type' => 'text'
                                            ], isset($page_data) && isset($page_data->service_09_title) ? $page_data->service_09_title : '', ['class' => 'form-control']);?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo form_label('Descrição', 'service_09_description', ['class' => 'col-form-label']);?>
                                        <?php echo form_textarea([
                                                'name' => 'service_09_description',
                                                'id'   => 'service_09_description',
                                            ], isset($page_data) && isset($page_data->service_09_description) ? $page_data->service_09_description : '', ['class' => 'form-control', 'style' => 'height: 70px']);?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo form_label('Exibir?', 'show_service_09', ['class' => 'col-form-label']);?>
                                        <div class="switch__container">
                                            <?php echo form_checkbox([
                                                    'name' => 'show_service_09',
                                                    'id'   => 'show_service_09',
                                                    'value'   => '1',
                                                    'checked' => isset($page_data) && isset($page_data->show_service_09) && $page_data->show_service_09 == 1,
                                                ], '1', isset($page_data) && isset($page_data->show_service_09) && $page_data->show_service_09 == 1, ['class' => 'switch switch--shadow']);?>

                                            <label for="show_service_09"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-sm-2">
                                <?php echo form_label('Posto de Combustível', '', ['class' => 'card-title col-form-label']);?>
                            </div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <?php echo form_label('Imagem</br><small>(Recomendado: 300x160)</small>', 'service_10_picture', ['class' => 'col-form-label']);?>
                                        <?php if(isset($page_data) && isset($page_data->service_10_picture) && !empty($page_data->service_10_picture)) { ?>
                                        <div class="banner-preview">
                                            <input type="hidden" name="service_10_picture"
                                                value="<?= $page_data->service_10_picture; ?>">
                                            <img src="<?= base_url($page_data->service_10_picture) ?>" alt="">
                                            <a class="delete-btn"
                                                href="<?= base_url("admin/pages/delete_file/1/service_10_picture") ?>"><i
                                                    class="bi bi-x-circle-fill"></i></a>
                                        </div>
                                        <?php } else { ?>
                                        <?php echo form_upload([
                                                    'name' => 'service_10_picture',
                                                    'id'   => 'service_10_picture'
                                                ], '', ['class' => 'form-control']);?>
                                        <?php } ?>
                                    </div>
                                    <div class="col-sm-8 d-flex flex-column justify-content-end">
                                        <?php echo form_label('Título', 'service_10_title', ['class' => 'col-form-label']);?>
                                        <?php echo form_input([
                                                'name' => 'service_10_title',
                                                'id'   => 'service_10_title',
                                                'type' => 'text'
                                            ], isset($page_data) && isset($page_data->service_10_title) ? $page_data->service_10_title : '', ['class' => 'form-control']);?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo form_label('Descrição', 'service_10_description', ['class' => 'col-form-label']);?>
                                        <?php echo form_textarea([
                                                'name' => 'service_10_description',
                                                'id'   => 'service_10_description',
                                            ], isset($page_data) && isset($page_data->service_10_description) ? $page_data->service_10_description : '', ['class' => 'form-control', 'style' => 'height: 70px']);?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo form_label('Exibir?', 'show_service_10', ['class' => 'col-form-label']);?>
                                        <div class="switch__container">
                                            <?php echo form_checkbox([
                                                    'name' => 'show_service_10',
                                                    'id'   => 'show_service_10',
                                                    'value'   => '1',
                                                    'checked' => isset($page_data) && isset($page_data->show_service_10) && $page_data->show_service_10 == 1,
                                                ], '1', isset($page_data) && isset($page_data->show_service_10) && $page_data->show_service_10 == 1, ['class' => 'switch switch--shadow']);?>

                                            <label for="show_service_10"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-sm-2">
                                <?php echo form_label('Supermercado', '', ['class' => 'card-title col-form-label']);?>
                            </div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <?php echo form_label('Imagem</br><small>(Recomendado: 300x160)</small>', 'service_11_picture', ['class' => 'col-form-label']);?>
                                        <?php if(isset($page_data) && isset($page_data->service_11_picture) && !empty($page_data->service_11_picture)) { ?>
                                        <div class="banner-preview">
                                            <input type="hidden" name="service_11_picture"
                                                value="<?= $page_data->service_11_picture; ?>">
                                            <img src="<?= base_url($page_data->service_11_picture) ?>" alt="">
                                            <a class="delete-btn"
                                                href="<?= base_url("admin/pages/delete_file/1/service_11_picture") ?>"><i
                                                    class="bi bi-x-circle-fill"></i></a>
                                        </div>
                                        <?php } else { ?>
                                        <?php echo form_upload([
                                                    'name' => 'service_11_picture',
                                                    'id'   => 'service_11_picture'
                                                ], '', ['class' => 'form-control']);?>
                                        <?php } ?>
                                    </div>
                                    <div class="col-sm-8 d-flex flex-column justify-content-end">
                                        <?php echo form_label('Título', 'service_11_title', ['class' => 'col-form-label']);?>
                                        <?php echo form_input([
                                                'name' => 'service_11_title',
                                                'id'   => 'service_11_title',
                                                'type' => 'text'
                                            ], isset($page_data) && isset($page_data->service_11_title) ? $page_data->service_11_title : '', ['class' => 'form-control']);?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo form_label('Descrição', 'service_11_description', ['class' => 'col-form-label']);?>
                                        <?php echo form_textarea([
                                                'name' => 'service_11_description',
                                                'id'   => 'service_11_description',
                                            ], isset($page_data) && isset($page_data->service_11_description) ? $page_data->service_11_description : '', ['class' => 'form-control', 'style' => 'height: 70px']);?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo form_label('Exibir?', 'show_service_11', ['class' => 'col-form-label']);?>
                                        <div class="switch__container">
                                            <?php echo form_checkbox([
                                                    'name' => 'show_service_11',
                                                    'id'   => 'show_service_11',
                                                    'value'   => '1',
                                                    'checked' => isset($page_data) && isset($page_data->show_service_11) && $page_data->show_service_11 == 1,
                                                ], '1', isset($page_data) && isset($page_data->show_service_11) && $page_data->show_service_11 == 1, ['class' => 'switch switch--shadow']);?>

                                            <label for="show_service_11"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-sm-2">
                                <?php echo form_label('Unidade de Grãos', '', ['class' => 'card-title col-form-label']);?>
                            </div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <?php echo form_label('Imagem</br><small>(Recomendado: 300x160)</small>', 'service_12_picture', ['class' => 'col-form-label']);?>
                                        <?php if(isset($page_data) && isset($page_data->service_12_picture) && !empty($page_data->service_12_picture)) { ?>
                                        <div class="banner-preview">
                                            <input type="hidden" name="service_12_picture"
                                                value="<?= $page_data->service_12_picture; ?>">
                                            <img src="<?= base_url($page_data->service_12_picture) ?>" alt="">
                                            <a class="delete-btn"
                                                href="<?= base_url("admin/pages/delete_file/1/service_12_picture") ?>"><i
                                                    class="bi bi-x-circle-fill"></i></a>
                                        </div>
                                        <?php } else { ?>
                                        <?php echo form_upload([
                                                    'name' => 'service_12_picture',
                                                    'id'   => 'service_12_picture'
                                                ], '', ['class' => 'form-control']);?>
                                        <?php } ?>
                                    </div>
                                    <div class="col-sm-8 d-flex flex-column justify-content-end">
                                        <?php echo form_label('Título', 'service_12_title', ['class' => 'col-form-label']);?>
                                        <?php echo form_input([
                                                'name' => 'service_12_title',
                                                'id'   => 'service_12_title',
                                                'type' => 'text'
                                            ], isset($page_data) && isset($page_data->service_12_title) ? $page_data->service_12_title : '', ['class' => 'form-control']);?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo form_label('Descrição', 'service_12_description', ['class' => 'col-form-label']);?>
                                        <?php echo form_textarea([
                                                'name' => 'service_12_description',
                                                'id'   => 'service_12_description',
                                            ], isset($page_data) && isset($page_data->service_12_description) ? $page_data->service_12_description : '', ['class' => 'form-control', 'style' => 'height: 70px']);?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo form_label('Exibir?', 'show_service_12', ['class' => 'col-form-label']);?>
                                        <div class="switch__container">
                                            <?php echo form_checkbox([
                                                    'name' => 'show_service_12',
                                                    'id'   => 'show_service_12',
                                                    'value'   => '1',
                                                    'checked' => isset($page_data) && isset($page_data->show_service_12) && $page_data->show_service_12 == 1,
                                                ], '1', isset($page_data) && isset($page_data->show_service_12) && $page_data->show_service_12 == 1, ['class' => 'switch switch--shadow']);?>

                                            <label for="show_service_12"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-sm-2">
                                <?php echo form_label('Truck Center', '', ['class' => 'card-title col-form-label']);?>
                            </div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <?php echo form_label('Imagem</br><small>(Recomendado: 300x160)</small>', 'service_13_picture', ['class' => 'col-form-label']);?>
                                        <?php if(isset($page_data) && isset($page_data->service_13_picture) && !empty($page_data->service_13_picture)) { ?>
                                        <div class="banner-preview">
                                            <input type="hidden" name="service_13_picture"
                                                value="<?= $page_data->service_13_picture; ?>">
                                            <img src="<?= base_url($page_data->service_13_picture) ?>" alt="">
                                            <a class="delete-btn"
                                                href="<?= base_url("admin/pages/delete_file/1/service_13_picture") ?>"><i
                                                    class="bi bi-x-circle-fill"></i></a>
                                        </div>
                                        <?php } else { ?>
                                        <?php echo form_upload([
                                                    'name' => 'service_13_picture',
                                                    'id'   => 'service_13_picture'
                                                ], '', ['class' => 'form-control']);?>
                                        <?php } ?>
                                    </div>
                                    <div class="col-sm-8 d-flex flex-column justify-content-end">
                                        <?php echo form_label('Título', 'service_13_picture', ['class' => 'col-form-label']);?>
                                        <?php echo form_input([
                                                'name' => 'service_13_picture',
                                                'id'   => 'service_13_picture',
                                                'type' => 'text'
                                            ], isset($page_data) && isset($page_data->service_13_picture) ? $page_data->service_13_picture : '', ['class' => 'form-control']);?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo form_label('Descrição', 'service_13_description', ['class' => 'col-form-label']);?>
                                        <?php echo form_textarea([
                                                'name' => 'service_13_description',
                                                'id'   => 'service_13_description',
                                            ], isset($page_data) && isset($page_data->service_13_description) ? $page_data->service_13_description : '', ['class' => 'form-control', 'style' => 'height: 70px']);?>
                                    </div>
                                    <div class="col-12">
                                        <?php echo form_label('Exibir?', 'show_service_13', ['class' => 'col-form-label']);?>
                                        <div class="switch__container">
                                            <?php echo form_checkbox([
                                                    'name' => 'show_service_13',
                                                    'id'   => 'show_service_13',
                                                    'value'   => '1',
                                                    'checked' => isset($page_data) && isset($page_data->show_service_13) && $page_data->show_service_13 == 1,
                                                ], '1', isset($page_data) && isset($page_data->show_service_13) && $page_data->show_service_13 == 1, ['class' => 'switch switch--shadow']);?>

                                            <label for="show_service_13"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3 class="card-title">Notícias</h3>
                        <div class="row mb-3">
                            <?php echo form_label('Título', 'news_section_title', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_input([
                                            'name' => 'news_section_title',
                                            'id'   => 'news_section_title',
                                            'type' => 'text'
                                        ], isset($page_data) && isset($page_data->news_section_title) ? $page_data->news_section_title : '', ['class' => 'form-control']);?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('Descrição', 'news_section_description', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_textarea([
                                            'name' => 'news_section_description',
                                            'id'   => 'news_section_description',
                                        ], isset($page_data) && isset($page_data->news_section_description) ? $page_data->news_section_description : '', ['class' => 'form-control editor', 'style' => 'height: 100px']);?>

                            </div>
                        </div>
                        <div class="row mb-5">
                            <?php echo form_label('Exibir seção?', 'news_section_show', ['class' => 'col-sm-2 col-form-label']);?>

                            <div class="col-sm-10">

                                <div class="switch__container">
                                    <?php echo form_checkbox([
                                            'name' => 'news_section_show',
                                            'id'   => 'news_section_show',
                                            'value'   => '1',
                                            'checked' => isset($page_data) && isset($page_data->news_section_show) && $page_data->news_section_show == 1,
                                        ], '1', isset($page_data) && isset($page_data->news_section_show) && $page_data->news_section_show == 1, ['class' => 'switch switch--shadow']);?>

                                    <label for="news_section_show"></label>
                                </div>
                            </div>
                        </div>

                        <h3 class="card-title">Revista</h3>
                        <div class="row mb-3">
                            <?php echo form_label('Imagem</br><small>(Recomendado: 425x270)</small>', 'magazine_section_picture', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php if(isset($page_data) && isset($page_data->magazine_section_picture) && !empty($page_data->magazine_section_picture)) { ?>
                                <div class="banner-preview">
                                    <input type="hidden" name="magazine_section_picture"
                                        value="<?= $page_data->magazine_section_picture; ?>">
                                    <img src="<?= base_url($page_data->magazine_section_picture) ?>" alt="">
                                    <a class="delete-btn"
                                        href="<?= base_url("admin/pages/delete_file/1/magazine_section_picture") ?>"><i
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

                        <h3 class="card-title">Banner Corpo</h3>
                        <div class="row mb-3">
                            <?php echo form_label('Imagem</br><small>(Recomendado: 1920x560)</small>', 'body_banner_section_picture', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php if(isset($page_data) && isset($page_data->body_banner_section_picture) && !empty($page_data->body_banner_section_picture)) { ?>
                                <div class="banner-preview">
                                    <input type="hidden" name="body_banner_section_picture"
                                        value="<?= $page_data->body_banner_section_picture; ?>">
                                    <img src="<?= base_url($page_data->body_banner_section_picture) ?>" alt="">
                                    <a class="delete-btn"
                                        href="<?= base_url("admin/pages/delete_file/1/body_banner_section_picture") ?>"><i
                                            class="bi bi-x-circle-fill"></i></a>
                                </div>
                                <?php } else { ?>
                                <?php echo form_upload([
                                            'name' => 'body_banner_section_picture',
                                            'id'   => 'body_banner_section_picture'
                                        ], '', ['class' => 'form-control']);?>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <?php echo form_label('Exibir banner?', 'body_banner_section_show', ['class' => 'col-sm-2 col-form-label']);?>

                            <div class="col-sm-10">

                                <div class="switch__container">
                                    <?php echo form_checkbox([
                                            'name' => 'body_banner_section_show',
                                            'id'   => 'body_banner_section_show',
                                            'value'   => '1',
                                            'checked' => isset($page_data) && isset($page_data->body_banner_section_show) && $page_data->body_banner_section_show == 1,
                                        ], '1', isset($page_data) && isset($page_data->body_banner_section_show) && $page_data->body_banner_section_show == 1, ['class' => 'switch switch--shadow']);?>

                                    <label for="body_banner_section_show"></label>
                                </div>
                            </div>
                        </div>

                        <h3 class="card-title">Agronegócios Copercana</h3>
                        <div class="row mb-3">
                            <?php echo form_label('Título', 'agribusiness_section_title', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_input([
                                            'name' => 'agribusiness_section_title',
                                            'id'   => 'agribusiness_section_title',
                                            'type' => 'text'
                                        ], isset($page_data) && isset($page_data->agribusiness_section_title) ? $page_data->agribusiness_section_title : '', ['class' => 'form-control']);?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('Descrição', 'agribusiness_section_description', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_textarea([
                                            'name' => 'agribusiness_section_description',
                                            'id'   => 'agribusiness_section_description',
                                        ], isset($page_data) && isset($page_data->agribusiness_section_description) ? $page_data->agribusiness_section_description : '', ['class' => 'form-control editor', 'style' => 'height: 100px']);?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('Link', 'agribusiness_section_link', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_input([
                                            'name' => 'agribusiness_section_link',
                                            'id'   => 'agribusiness_section_link',
                                            'type' => 'text'
                                        ], isset($page_data) && isset($page_data->agribusiness_section_link) ? $page_data->agribusiness_section_link : '', ['class' => 'form-control']);?>

                            </div>
                        </div>
                        <div class="row mb-5">
                            <?php echo form_label('Exibir seção?', 'agribusiness_section_show', ['class' => 'col-sm-2 col-form-label']);?>

                            <div class="col-sm-10">

                                <div class="switch__container">
                                    <?php echo form_checkbox([
                                            'name' => 'agribusiness_section_show',
                                            'id'   => 'agribusiness_section_show',
                                            'value'   => '1',
                                            'checked' => isset($page_data) && isset($page_data->agribusiness_section_show) && $page_data->agribusiness_section_show == 1,
                                        ], '1', isset($page_data) && isset($page_data->agribusiness_section_show) && $page_data->agribusiness_section_show == 1, ['class' => 'switch switch--shadow']);?>

                                    <label for="agribusiness_section_show"></label>
                                </div>
                            </div>
                        </div>

                        <h3 class="card-title">Seja um cooperado</h3>
                        <div class="row mb-3">
                            <?php echo form_label('Título', 'cooperated_section_title', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_input([
                                            'name' => 'cooperated_section_title',
                                            'id'   => 'cooperated_section_title',
                                            'type' => 'text'
                                        ], isset($page_data) && isset($page_data->cooperated_section_title) ? $page_data->cooperated_section_title : '', ['class' => 'form-control']);?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('Descrição', 'cooperated_section_description', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_textarea([
                                            'name' => 'cooperated_section_description',
                                            'id'   => 'cooperated_section_description',
                                        ], isset($page_data) && isset($page_data->cooperated_section_description) ? $page_data->cooperated_section_description : '', ['class' => 'form-control editor', 'style' => 'height: 100px']);?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('Link', 'cooperated_section_link', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_input([
                                            'name' => 'cooperated_section_link',
                                            'id'   => 'cooperated_section_link',
                                            'type' => 'text'
                                        ], isset($page_data) && isset($page_data->cooperated_section_link) ? $page_data->cooperated_section_link : '', ['class' => 'form-control']);?>

                            </div>
                        </div>
                        <div class="row mb-5">
                            <?php echo form_label('Exibir seção?', 'cooperated_section_show', ['class' => 'col-sm-2 col-form-label']);?>

                            <div class="col-sm-10">

                                <div class="switch__container">
                                    <?php echo form_checkbox([
                                            'name' => 'cooperated_section_show',
                                            'id'   => 'cooperated_section_show',
                                            'value'   => '1',
                                            'checked' => isset($page_data) && isset($page_data->cooperated_section_show) && $page_data->cooperated_section_show == 1,
                                        ], '1', isset($page_data) && isset($page_data->cooperated_section_show) && $page_data->cooperated_section_show == 1, ['class' => 'switch switch--shadow']);?>

                                    <label for="cooperated_section_show"></label>
                                </div>
                            </div>
                        </div>
                        
                        <h3 class="card-title">Ofertas</h3>
                        <div class="row mb-3">
                            <?php echo form_label('Título', 'offers_section_title', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_input([
                                            'name' => 'offers_section_title',
                                            'id'   => 'offers_section_title',
                                            'type' => 'text'
                                        ], isset($page_data) && isset($page_data->offers_section_title) ? $page_data->offers_section_title : '', ['class' => 'form-control']);?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('Descrição', 'offers_section_description', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_textarea([
                                            'name' => 'offers_section_description',
                                            'id'   => 'offers_section_description',
                                        ], isset($page_data) && isset($page_data->offers_section_description) ? $page_data->offers_section_description : '', ['class' => 'form-control editor', 'style' => 'height: 100px']);?>

                            </div>
                        </div>
                        <div class="row mb-5">
                            <?php echo form_label('Exibir seção?', 'offers_section_show', ['class' => 'col-sm-2 col-form-label']);?>

                            <div class="col-sm-10">

                                <div class="switch__container">
                                    <?php echo form_checkbox([
                                            'name' => 'offers_section_show',
                                            'id'   => 'offers_section_show',
                                            'value'   => '1',
                                            'checked' => isset($page_data) && isset($page_data->offers_section_show) && $page_data->offers_section_show == 1,
                                        ], '1', isset($page_data) && isset($page_data->offers_section_show) && $page_data->offers_section_show == 1, ['class' => 'switch switch--shadow']);?>

                                    <label for="offers_section_show"></label>
                                </div>
                            </div>
                        </div>

                        <h3 class="card-title">Trabalhe Conosco</h3>
                        <div class="row mb-3">
                            <?php echo form_label('Título', 'jobs_section_title', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_input([
                                            'name' => 'jobs_section_title',
                                            'id'   => 'jobs_section_title',
                                            'type' => 'text'
                                        ], isset($page_data) && isset($page_data->jobs_section_title) ? $page_data->jobs_section_title : '', ['class' => 'form-control']);?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('Descrição', 'jobs_section_description', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_textarea([
                                            'name' => 'jobs_section_description',
                                            'id'   => 'jobs_section_description',
                                        ], isset($page_data) && isset($page_data->jobs_section_description) ? $page_data->jobs_section_description : '', ['class' => 'form-control editor', 'style' => 'height: 100px']);?>

                            </div>
                        </div>
                        <div class="row mb-5">
                            <?php echo form_label('Exibir seção?', 'jobs_section_show', ['class' => 'col-sm-2 col-form-label']);?>

                            <div class="col-sm-10">

                                <div class="switch__container">
                                    <?php echo form_checkbox([
                                            'name' => 'jobs_section_show',
                                            'id'   => 'jobs_section_show',
                                            'value'   => '1',
                                            'checked' => isset($page_data) && isset($page_data->jobs_section_show) && $page_data->jobs_section_show == 1,
                                        ], '1', isset($page_data) && isset($page_data->jobs_section_show) && $page_data->jobs_section_show == 1, ['class' => 'switch switch--shadow']);?>

                                    <label for="jobs_section_show"></label>
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