<main id="main" class="main">

    <div class="pagetitle">
        <h1>Usuários</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item"><a href="<?= base_url("admin/users") ?>">Usuários</a></li>
                <li class="breadcrumb-item active">Adicionar Novo</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Adicionar Novo Usuários</h5>
                        <p>Insira as informações do novo usuário:</p>
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
                            $form_data = null;
                            
                            if(isset($response) && !empty($response)) { 
                                    if(isset($response['form_data']) && !empty($response['form_data']) && !$response['success']) {
                                        $form_data = $response['form_data'];
                                    }
                                ?>

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
                        <?php echo form_open_multipart('admin/users/add_user', ['class' => 'my-5']);?>
                        <div class="row mb-3">
                            <?php echo form_label('Imagem de perfil</br><small>(Recomendado: 300x300)', 'picture', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_upload([
                                        'name' => 'picture',
                                        'id'   => 'picture'
                                    ], '', ['class' => 'form-control']);?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('Primeiro Nome<span class="required">*</span>', 'first_name', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_input([
                                        'name' => 'first_name',
                                        'id'   => 'first_name',
                                        'type' => 'text'
                                    ], $form_data && $form_data['first_name'] ? $form_data['first_name'] : '', ['class' => 'form-control', 'required' => 'required']);?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('Último Nome<span class="required">*</span>', 'last_name', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_input([
                                        'name' => 'last_name',
                                        'id'   => 'last_name',
                                        'type' => 'text'
                                    ], $form_data && $form_data['last_name'] ? $form_data['last_name'] : '', ['class' => 'form-control', 'required' => 'required']);?>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <?php echo form_label('E-mail<span class="required">*</span>', 'email', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_input([
                                        'name' => 'email',
                                        'id'   => 'email',
                                        'type' => 'email'
                                    ], $form_data && $form_data['email'] ? $form_data['email'] : '', ['class' => 'form-control', 'required' => 'required']);?>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <?php echo form_label('Senha<span class="required">*</span>', 'password', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_password([
                                        'name' => 'password',
                                        'id'   => 'password'
                                    ], '', ['class' => 'form-control', 'required' => 'required']);?>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <?php echo form_label('Confirmação de senha<span class="required">*</span>', 'password_confirm', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_password([
                                        'name' => 'password_confirm',
                                        'id'   => 'password_confirm'
                                    ], '', ['class' => 'form-control', 'required' => 'required']);?>

                            </div>
                        </div>

                        <div class="row mb-3">
                                <?php echo form_label('Tipo<span class="required">*</span>', 'group_id', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php 
                                        $group_options = array();

                                        foreach($groups as $group) {
                                            $group_options[(string)$group->id] = $group->description;
                                        }
                                    ?>
                                    <?php echo form_dropdown('group_id', $group_options, $form_data && $form_data['group_id'] ? $form_data['group_id'] : '', ['class' => 'form-control', 'required' => 'required', 'id' => 'group_id']);?>

                                </div>
                            </div>

                       <!--  <div class="row mb-3">
                            <?php echo form_label('Sobre você:', 'description', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_textarea([
                                          'name' => 'description',
                                          'id'   => 'description',
                                    ], $form_data && $form_data['description'] ? $form_data['description'] : '', ['class' => 'form-control', 'style' => 'height: 100px']);?>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <?php echo form_label('Redes sociais:', '', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-md-6 col-lg-4">
                                        <?php echo form_label('Website', 'website', ['class' => 'col-form-label']);?>
                                        <?php echo form_input([
                                                    'name' => 'website',
                                                    'id'   => 'website',
                                                    'type' => 'text'
                                                ], $form_data && $form_data['website'] ? $form_data['website'] : '', ['class' => 'form-control']);?>

                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <?php echo form_label('Instagram', 'instagram', ['class' => 'col-form-label']);?>
                                        <?php echo form_input([
                                                    'name' => 'instagram',
                                                    'id'   => 'instagram',
                                                    'type' => 'text'
                                                ], $form_data && $form_data['instagram'] ? $form_data['instagram'] : '', ['class' => 'form-control']);?>

                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <?php echo form_label('Facebook', 'facebook', ['class' => 'col-form-label']);?>
                                        <?php echo form_input([
                                                    'name' => 'facebook',
                                                    'id'   => 'facebook',
                                                    'type' => 'text'
                                                ], $form_data && $form_data['facebook'] ? $form_data['facebook'] : '', ['class' => 'form-control']);?>

                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <?php echo form_label('Twitter', 'twitter', ['class' => 'col-form-label']);?>
                                        <?php echo form_input([
                                                    'name' => 'twitter',
                                                    'id'   => 'twitter',
                                                    'type' => 'text'
                                                ], $form_data && $form_data['twitter'] ? $form_data['twitter'] : '', ['class' => 'form-control']);?>

                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <?php echo form_label('Youtube', 'youtube', ['class' => 'col-form-label']);?>
                                        <?php echo form_input([
                                                    'name' => 'youtube',
                                                    'id'   => 'youtube',
                                                    'type' => 'text'
                                                ], $form_data && $form_data['youtube'] ? $form_data['youtube'] : '', ['class' => 'form-control']);?>

                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <?php echo form_label('LinkedIn', 'linkedin', ['class' => 'col-form-label']);?>
                                        <?php echo form_input([
                                                    'name' => 'linkedin',
                                                    'id'   => 'linkedin',
                                                    'type' => 'text'
                                                ], $form_data && $form_data['linkedin'] ? $form_data['linkedin'] : '', ['class' => 'form-control']);?>

                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <?php echo form_label('TikTok', 'tiktok', ['class' => 'col-form-label']);?>
                                        <?php echo form_input([
                                                    'name' => 'tiktok',
                                                    'id'   => 'tiktok',
                                                    'type' => 'text'
                                                ], $form_data && $form_data['tiktok'] ? $form_data['tiktok'] : '', ['class' => 'form-control']);?>

                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <?php echo form_label('Behance', 'behance', ['class' => 'col-form-label']);?>
                                        <?php echo form_input([
                                                    'name' => 'behance',
                                                    'id'   => 'behance',
                                                    'type' => 'text'
                                                ], $form_data && $form_data['behance'] ? $form_data['behance'] : '', ['class' => 'form-control']);?>

                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <?php echo form_label('Pinterest', 'pinterest', ['class' => 'col-form-label']);?>
                                        <?php echo form_input([
                                                    'name' => 'pinterest',
                                                    'id'   => 'pinterest',
                                                    'type' => 'text'
                                                ], $form_data && $form_data['pinterest'] ? $form_data['pinterest'] : '', ['class' => 'form-control']);?>

                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <?php echo form_label('Flickr', 'flickr', ['class' => 'col-form-label']);?>
                                        <?php echo form_input([
                                                    'name' => 'flickr',
                                                    'id'   => 'flickr',
                                                    'type' => 'text'
                                                ], $form_data && $form_data['flickr'] ? $form_data['flickr'] : '', ['class' => 'form-control']);?>

                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <?php echo form_label('Github', 'github', ['class' => 'col-form-label']);?>
                                        <?php echo form_input([
                                                    'name' => 'github',
                                                    'id'   => 'github',
                                                    'type' => 'text'
                                                ], $form_data && $form_data['github'] ? $form_data['github'] : '', ['class' => 'form-control']);?>

                                    </div>
                                </div>
                            </div>
                        </div> -->

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