<main id="main" class="main">

    <div class="pagetitle">
        <h1>Páginas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Páginas</li>
                <li class="breadcrumb-item active">Relatório de Transparência</li>
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

                        if (isset($response) && !empty($response)) { ?>

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

                        <?php echo form_open_multipart('admin/pages/update_page/32', ['class' => 'my-5']); ?>
                        <h3 class="card-title">Relatório de Transparência</h3>
                        <div class="row mb-3">
                            <?php echo form_label('Título da página', 'page_title', ['class' => 'col-sm-2 col-form-label']); ?>
                            <div class="col-sm-10">
                                <?php echo form_input([
                                    'name' => 'page_title',
                                    'id' => 'page_title',
                                    'type' => 'text'
                                ], $page_data && $page_data->page_title ? $page_data->page_title : '', ['class' => 'form-control']); ?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('Conteúdo', 'page_content', ['class' => 'col-sm-2 col-form-label']); ?>
                            <div class="col-sm-10">
                                <?php echo form_textarea([
                                    'name' => 'page_content',
                                    'id' => 'page_content',
                                ], $page_data && $page_data->page_content ? $page_data->page_content : '', ['class' => 'form-control editor']); ?>

                            </div>
                        </div>
                        <h3 class="card-title">Arquivos</h3>
                        <div class="row mb-3">
                            <?php echo form_label('Título', 'files_section_title', ['class' => 'col-sm-2 col-form-label']); ?>
                            <div class="col-sm-10">
                                <?php echo form_input([
                                    'name' => 'files_section_title',
                                    'id' => 'files_section_title',
                                    'type' => 'text'
                                ], $page_data && $page_data->files_section_title ? $page_data->files_section_title : '', ['class' => 'form-control']); ?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('Relatório 1º Semestre', 'files_section_file_01', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php if(isset($page_data) && isset($page_data->files_section_file_01) && !empty($page_data->files_section_file_01)) { ?>
                                <div class="banner-preview">
                                    <input type="hidden" name="files_section_file_01"
                                        value="<?= $page_data->files_section_file_01; ?>">
                                    <img src="<?= base_url("admin/pages/make_cover/".$page_data->files_section_file_01) ?>" alt="">
                                    <a class="delete-btn"
                                        href="<?= base_url("admin/pages/delete_file/32/files_section_file_01") ?>"><i
                                            class="bi bi-x-circle-fill"></i></a>
                                </div>
                                <?php } else { ?>
                                <?php echo form_upload([
                                            'name' => 'files_section_file_01',
                                            'id'   => 'files_section_file_01'
                                        ], '', ['class' => 'form-control']);?>
                                <?php } ?>
                            </div>
                        </div>
                         <div class="row mb-5">
                            <?php echo form_label('Relatório 2º Semestre', 'files_section_file_02', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php if(isset($page_data) && isset($page_data->files_section_file_02) && !empty($page_data->files_section_file_02)) { ?>
                                <div class="banner-preview">
                                    <input type="hidden" name="files_section_file_02"
                                        value="<?= $page_data->files_section_file_02; ?>">
                                    <img src="<?= base_url("admin/pages/make_cover/".$page_data->files_section_file_02) ?>" alt="">
                                    <a class="delete-btn"
                                        href="<?= base_url("admin/pages/delete_file/32/files_section_file_02") ?>"><i
                                            class="bi bi-x-circle-fill"></i></a>
                                </div>
                                <?php } else { ?>
                                <?php echo form_upload([
                                            'name' => 'files_section_file_02',
                                            'id'   => 'files_section_file_02'
                                        ], '', ['class' => 'form-control']);?>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <?php echo form_submit('submit', 'Salvar', ['class' => 'btn btn-primary w-100']); ?>
                            </div>
                        </div>
                        <?php echo form_close(); ?>

                    </div>
                </div>
            </div>
    </section>

</main>