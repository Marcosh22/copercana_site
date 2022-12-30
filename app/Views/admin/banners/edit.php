<main id="main" class="main">

    <div class="pagetitle">
        <h1>Banners</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item"><a href="<?= base_url("admin/banners") ?>">Banners</a></li>
                <li class="breadcrumb-item active">Editar</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Editar Banner</h5>
                        <p>Insira as informações atualizados do seu banner:</p>
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

                        <?php echo form_open_multipart('admin/banners/update_banner/'.$banner->id, ['class' => 'my-5'], ['page_id' => 1]);?>
                        <div class="row mb-3">
                            <?php echo form_label('Banner desktop<span class="required">*</span></br><small>(Recomendado: 1110×300)</small>', 'picture', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">

                                <?php if(isset($banner->desktop_picture) && !empty($banner->desktop_picture)) { ?>
                                <div class="banner-preview">
                                    <img src="<?= base_url($banner->desktop_picture) ?>" alt="">
                                    <a class="delete-btn" href="<?= base_url("admin/banners/remove_desktop_picture/".$banner->id) ?>"><i class="bi bi-x-circle-fill"></i></a>
                                </div>
                                <?php } else { ?>
                                <?php echo form_upload([
                                                    'name' => 'desktop_picture',
                                                    'id'   => 'desktop_picture'
                                                ], '', ['class' => 'form-control', 'required' => 'required']);?>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('Banner mobile<span class="required">*</span></br><small>(Recomendado: 860x860)</small>', 'picture', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">

                                <?php if(isset($banner->mobile_picture) && !empty($banner->mobile_picture)) { ?>
                                <div class="banner-preview">
                                    <img src="<?= base_url($banner->mobile_picture) ?>" alt="">
                                    <a class="delete-btn" href="<?= base_url("admin/banners/remove_mobile_picture/".$banner->id) ?>"><i class="bi bi-x-circle-fill"></i></a>
                                </div>
                                <?php } else { ?>
                                <?php echo form_upload([
                                                    'name' => 'mobile_picture',
                                                    'id'   => 'mobile_picture'
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
                                        ], $banner->title, ['class' => 'form-control', 'required' => 'required']);?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('Link', 'link', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_input([
                                            'name' => 'link',
                                            'id'   => 'link',
                                            'type' => 'text'
                                        ], $banner->link ? $banner->link : '', ['class' => 'form-control']);?>

                            </div>
                        </div>
                        <div class="row mb-3">
                                <?php echo form_label('Abrir link em', 'link_target', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php 
                                        $link_target_options = array(
                                            '' => '',
                                            '_self' => 'Mesma aba',
                                            '_blank' => 'Nova aba'
                                        );

                                    ?>
                                    <?php echo form_dropdown('link_target', $link_target_options, $banner->link_target ? $banner->link_target : '', ['class' => 'form-control', 'id' => 'link_target']);?>

                                </div>
                            </div>
                           
                        <div class="row mb-3">
                            <?php echo form_label('Ordem de exibição<span class="required">*</span>', 'show_order', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_input([
                                            'name' => 'show_order',
                                            'id'   => 'show_order',
                                            'type' => 'number'
                                        ], $banner->show_order, ['class' => 'form-control', 'required' => 'required', 'min' => '1']);?>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <?php echo form_label('Data de início<span class="required">*</span>', 'starts_at', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php
                                        $starts_at = new DateTime($banner->starts_at);
                                        $starts_at_input =  $starts_at->format('Y-m-d\TH:i');
                                    ?>
                                <?php echo form_input([
                                            'name' => 'starts_at',
                                            'id'   => 'starts_at',
                                            'type' => 'datetime-local'
                                        ], $starts_at_input, ['class' => 'form-control', 'required' => 'required']);?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('Data de término', 'ends_at', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php
                                        if(isset($banner->ends_at) && !empty($banner->ends_at)) {
                                            $ends_at = new DateTime($banner->ends_at);
                                            $ends_at_input =  $ends_at->format('Y-m-d\TH:i');
                                        } else {
                                            $ends_at_input = "";
                                        }
                                    ?>
                                <?php echo form_input([
                                            'name' => 'ends_at',
                                            'id'   => 'ends_at',
                                            'type' => 'datetime-local'
                                        ], $ends_at_input, ['class' => 'form-control']);?>

                            </div>
                        </div>


                        <div class="row mb-5">
                            <?php echo form_label('Exibir banner?', 'status', ['class' => 'col-sm-2 col-form-label']);?>

                            <div class="col-sm-10">

                                <div class="switch__container">
                                    <?php echo form_checkbox([
                                            'name' => 'status',
                                            'id'   => 'status',
                                            'value'   => '1',
                                            'checked' => $banner->status == 1,
                                        ], '1', $banner->status == 1, ['class' => 'switch switch--shadow']);?>

                                    <label for="status"></label>
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