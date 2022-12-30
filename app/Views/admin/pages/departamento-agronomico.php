<main id="main" class="main">

    <div class="pagetitle">
        <h1>Páginas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Páginas</li>
                <li class="breadcrumb-item active">Departamento Agronômico</li>
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

                        <?php echo form_open_multipart('admin/pages/update_page/27', ['class' => 'my-5']);?>

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
                        <h3 class="card-title">Departamento Agronômico</h3>
                        <div class="row mb-3">
                            <?php echo form_label('Banner</br><small>(Recomendado: 1110x300)</small>', 'intro_section_banner', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php if(isset($page_data) && isset($page_data->intro_section_banner) && !empty($page_data->intro_section_banner)) { ?>
                                <div class="banner-preview">
                                    <input type="hidden" name="intro_section_banner"
                                        value="<?= $page_data->intro_section_banner; ?>">
                                    <img src="<?= base_url($page_data->intro_section_banner) ?>" alt="">
                                    <a class="delete-btn"
                                        href="<?= base_url("admin/pages/delete_file/27/intro_section_banner") ?>"><i
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
                                        href="<?= base_url("admin/pages/delete_file/27/intro_section_mobile_banner") ?>"><i
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
                        <div class="row mb-3">
                            <?php echo form_label('Título', 'intro_section_title', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_input([
                                                'name' => 'intro_section_title',
                                                'id'   => 'intro_section_title',
                                                'type' => 'text'
                                            ], isset($page_data) && isset($page_data->intro_section_title) ? $page_data->intro_section_title : '', ['class' => 'form-control']);?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('Descrição', 'intro_section_description', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_textarea([
                                            'name' => 'intro_section_description',
                                            'id'   => 'intro_section_description',
                                        ], isset($page_data) && isset($page_data->intro_section_description) ? $page_data->intro_section_description : '', ['class' => 'form-control editor', 'style' => 'height: 100px']);?>

                            </div>
                        </div>
                        <div class="row mb-5">
                            <?php echo form_label('Exibir seção?', 'intro_section_show', ['class' => 'col-sm-2 col-form-label']);?>

                            <div class="col-sm-10">

                                <div class="switch__container">
                                    <?php echo form_checkbox([
                                            'name' => 'intro_section_show',
                                            'id'   => 'intro_section_show',
                                            'value'   => '1',
                                            'checked' => isset($page_data) && isset($page_data->intro_section_show) && $page_data->intro_section_show == 1,
                                        ], '1', isset($page_data) && isset($page_data->intro_section_show) && $page_data->intro_section_show == 1, ['class' => 'switch switch--shadow']);?>

                                    <label for="intro_section_show"></label>
                                </div>
                            </div>
                        </div>

                        <h3 class="card-title">Unidades</h3>
                        <div class="row mb-3">
                            <?php echo form_label('Título', 'units_section_title', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_input([
                                                'name' => 'units_section_title',
                                                'id'   => 'units_section_title',
                                                'type' => 'text'
                                            ], isset($page_data) && isset($page_data->units_section_title) ? $page_data->units_section_title : '', ['class' => 'form-control']);?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('Descrição', 'units_section_description', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_textarea([
                                            'name' => 'units_section_description',
                                            'id'   => 'units_section_description',
                                        ], isset($page_data) && isset($page_data->units_section_description) ? $page_data->units_section_description : '', ['class' => 'form-control editor', 'style' => 'height: 100px']);?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="page-action-button d-flex my-4">
                                    <a class="btn btn-success mx-2 my-2"
                                        href="<?= base_url("admin/units/agronomic-department") ?>"><i class="bi bi-plus-square"></i>
                                        Visualizar Unidades
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <?php echo form_label('Exibir seção?', 'units_section_show', ['class' => 'col-sm-2 col-form-label']);?>

                            <div class="col-sm-10">

                                <div class="switch__container">
                                    <?php echo form_checkbox([
                                            'name' => 'units_section_show',
                                            'id'   => 'units_section_show',
                                            'value'   => '1',
                                            'checked' => isset($page_data) && isset($page_data->units_section_show) && $page_data->units_section_show == 1,
                                        ], '1', isset($page_data) && isset($page_data->units_section_show) && $page_data->units_section_show == 1, ['class' => 'switch switch--shadow']);?>

                                    <label for="units_section_show"></label>
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