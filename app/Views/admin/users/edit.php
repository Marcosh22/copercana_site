<main id="main" class="main">

    <div class="pagetitle">
        <h1>Perfil</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item"><a href="<?= base_url("admin/users") ?>">Usuários</a></li>
                <li class="breadcrumb-item active">Perfil</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <img src="<?= isset($user->picture) && !empty($user->picture) ? base_url($user->picture) : base_url("_assets/images/no-picture.jpg") ?>" alt="Profile" class="rounded-circle">
                        <h2><?= $user->first_name ?>&nbsp;<?= $user->last_name ?></h2>
                        <div class="social-links mt-2">
                            <?php if(isset($user->website) && !empty($user->website)) { ?>
                            <a href="<?= $user->website ?>" class="socials__item" target="_blank"
                                rel="noopener noreferrer">
                                <i class="fa-solid fa-earth-americas"></i>
                            </a>
                            <?php } ?>
                            <?php if(isset($user->instagram) && !empty($user->instagram)) { ?>
                            <a href="<?= $user->instagram ?>" class="socials__item socials__item--instagram"
                                target="_blank" rel="noopener noreferrer">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                            <?php } ?>
                            <?php if(isset($user->facebook) && !empty($user->facebook)) { ?>
                            <a href="<?= $user->facebook ?>" class="socials__item socials__item--facebook"
                                target="_blank" rel="noopener noreferrer">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                            <?php } ?>
                            <?php if(isset($user->twitter) && !empty($user->twitter)) { ?>
                            <a href="<?= $user->twitter ?>" class="socials__item socials__item--twitter" target="_blank"
                                rel="noopener noreferrer">
                                <i class="fa-brands fa-twitter"></i>
                            </a>
                            <?php } ?>
                            <?php if(isset($user->youtube) && !empty($user->youtube)) { ?>
                            <a href="<?= $user->youtube ?>" class="socials__item socials__item--youtube" target="_blank"
                                rel="noopener noreferrer">
                                <i class="fa-brands fa-youtube"></i>
                            </a>
                            <?php } ?>
                            <?php if(isset($user->linkedin) && !empty($user->linkedin)) { ?>
                            <a href="<?= $user->linkedin ?>" class="socials__item socials__item--linkedin"
                                target="_blank" rel="noopener noreferrer">
                                <i class="fa-brands fa-linkedin-in"></i>
                            </a>
                            <?php } ?>
                            <?php if(isset($user->tiktok) && !empty($user->tiktok)) { ?>
                            <a href="<?= $user->tiktok ?>" class="socials__item socials__item--tiktok" target="_blank"
                                rel="noopener noreferrer">
                                <i class="fa-brands fa-tiktok"></i>
                            </a>
                            <?php } ?>
                            <?php if(isset($user->behance) && !empty($user->behance)) { ?>
                            <a href="<?= $user->behance ?>" class="socials__item socials__item--behance" target="_blank"
                                rel="noopener noreferrer">
                                <i class="fa-brands fa-behance"></i>
                            </a>
                            <?php } ?>
                            <?php if(isset($user->pinterest) && !empty($user->pinterest)) { ?>
                            <a href="<?= $user->pinterest ?>" class="socials__item socials__item--pinterest"
                                target="_blank" rel="noopener noreferrer">
                                <i class="fa-brands fa-pinterest-p"></i>
                            </a>
                            <?php } ?>
                            <?php if(isset($user->flickr) && !empty($user->flickr)) { ?>
                            <a href="<?= $user->flickr ?>" class="socials__item socials__item--flickr" target="_blank"
                                rel="noopener noreferrer">
                                <i class="fa-brands fa-flickr"></i>
                            </a>
                            <?php } ?>
                            <?php if(isset($user->github) && !empty($user->github)) { ?>
                            <a href="<?= $user->github ?>" class="socials__item socials__item--github" target="_blank"
                                rel="noopener noreferrer">
                                <i class="fa-brands fa-github"></i>
                            </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xl-8">
                <div class="card">
                    <?php 
                        $response = $session->getFlashdata('response');
                    ?>
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link <?= !isset($_GET['tab']) || ($_GET['tab'] !== 'edit' && $_GET['tab'] !== 'change-password') ? 'active' : '' ?>" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview">Overview</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link <?= isset($_GET['tab']) && $_GET['tab'] === 'edit' ? 'active' : '' ?>" data-bs-toggle="tab" data-bs-target="#profile-edit">Editar
                                    Perfil</button>
                            </li>
                            <?php if($user->id === $logged_user->row()->id) { ?>
                            <li class="nav-item">
                                <button class="nav-link <?= isset($_GET['tab']) && $_GET['tab'] === 'change-password' ? 'active' : '' ?>" data-bs-toggle="tab"
                                    data-bs-target="#profile-change-password">Alterar Senha</button>
                            </li>
                            <?php } ?>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane <?= !isset($_GET['tab']) || ($_GET['tab'] !== 'edit' && $_GET['tab'] !== 'change-password') ? 'show active' : '' ?> profile-overview" id="profile-overview">
                                <h5 class="card-title">Sobre</h5>
                                <p class="small fst-italic"><?= $user->description ?></p>

                                <h5 class="card-title">Detalhes do perfil</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Nome completo</div>
                                    <div class="col-lg-9 col-md-8"><?= $user->first_name ?>&nbsp;<?= $user->last_name ?>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">E-mail</div>
                                    <div class="col-lg-9 col-md-8"><?= $user->email ?></div>
                                </div>

                            </div>

                            <div class="tab-pane fade <?= isset($_GET['tab']) && $_GET['tab'] === 'edit' ? 'show active' : '' ?> profile-edit pt-3" id="profile-edit">
                            <?php 
                                     if(isset($response) && !empty($response) && $response['tab'] === 'edit') { 
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
                                <?php echo form_open_multipart('admin/users/update_user/'.$user->id, ['class' => 'my-5']);?>
                                <div class="row mb-3">
                                    <?php echo form_label('Imagem de perfil</br><small>(Recomendado: 300x300)</small>', 'picture', ['class' => 'col-md-4 col-lg-3 col-form-label']);?>
                                    <div class="col-md-8 col-lg-9">
                                        <?php if(isset($user->picture) && !empty($user->picture)) { ?>
                                        <div class="banner-preview">
                                            <img src="<?= base_url($user->picture) ?>" alt="">
                                            <div class="pt-2">
                                                <a href="<?= base_url("admin/users/remove_picture/".$user->id) ?>" class="btn btn-danger btn-sm"
                                                    title="Remove my profile image"><i class="bi bi-trash"></i></a>
                                            </div>
                                        </div>
                                        <?php } else { ?>
                                            <?php echo form_upload([
                                                'name' => 'picture',
                                                'id'   => 'picture'
                                            ], '', ['class' => 'form-control']);?>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <?php echo form_label('Primeiro Nome<span class="required">*</span>', 'first_name', ['class' => 'col-md-4 col-lg-3 col-form-label']);?>
                                    <div class="col-md-8 col-lg-9">
                                        <?php echo form_input([
                                        'name' => 'first_name',
                                        'id'   => 'first_name',
                                        'type' => 'text',
                                        'value' => $user->first_name
                                    ], '', ['class' => 'form-control', 'required' => 'required']);?>

                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <?php echo form_label('Último Nome<span class="required">*</span>', 'last_name', ['class' => 'col-md-4 col-lg-3 col-form-label']);?>
                                    <div class="col-md-8 col-lg-9">
                                        <?php echo form_input([
                                        'name' => 'last_name',
                                        'id'   => 'last_name',
                                        'type' => 'text',
                                        'value' => $user->last_name
                                    ], '', ['class' => 'form-control', 'required' => 'required']);?>

                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <?php echo form_label('Sobre:', 'description', ['class' => 'col-md-4 col-lg-3 col-form-label']);?>
                                    <div class="col-md-8 col-lg-9">
                                        <?php echo form_textarea([
                                          'name' => 'description',
                                          'id'   => 'description',
                                          'value' => $user->description
                                    ], '', ['class' => 'form-control', 'style' => 'height: 100px']);?>

                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <?php echo form_label('Redes sociais:', '', ['class' => 'col-md-4 col-lg-3 col-form-label']);?>
                                    <div class="col-md-8 col-lg-9">
                                        <div class="row">
                                            <div class="col-md-6 col-lg-4">
                                                <?php echo form_label('Website', 'website', ['class' => 'col-form-label']);?>
                                                <?php echo form_input([
                                                    'name' => 'website',
                                                    'id'   => 'website',
                                                    'type' => 'text',
                                                    'value' => $user->website
                                                ], '', ['class' => 'form-control']);?>

                                            </div>
                                            <div class="col-md-6 col-lg-4">
                                                <?php echo form_label('Instagram', 'instagram', ['class' => 'col-form-label']);?>
                                                <?php echo form_input([
                                                    'name' => 'instagram',
                                                    'id'   => 'instagram',
                                                    'type' => 'text',
                                                    'value' => $user->instagram
                                                ], '', ['class' => 'form-control']);?>

                                            </div>
                                            <div class="col-md-6 col-lg-4">
                                                <?php echo form_label('Facebook', 'facebook', ['class' => 'col-form-label']);?>
                                                <?php echo form_input([
                                                    'name' => 'facebook',
                                                    'id'   => 'facebook',
                                                    'type' => 'text',
                                                    'value' => $user->facebook
                                                ], '', ['class' => 'form-control']);?>

                                            </div>
                                            <div class="col-md-6 col-lg-4">
                                                <?php echo form_label('Twitter', 'twitter', ['class' => 'col-form-label']);?>
                                                <?php echo form_input([
                                                    'name' => 'twitter',
                                                    'id'   => 'twitter',
                                                    'type' => 'text',
                                                    'value' => $user->twitter
                                                ], '', ['class' => 'form-control']);?>

                                            </div>
                                            <div class="col-md-6 col-lg-4">
                                                <?php echo form_label('Youtube', 'youtube', ['class' => 'col-form-label']);?>
                                                <?php echo form_input([
                                                    'name' => 'youtube',
                                                    'id'   => 'youtube',
                                                    'type' => 'text',
                                                    'value' => $user->youtube
                                                ], '', ['class' => 'form-control']);?>

                                            </div>
                                            <div class="col-md-6 col-lg-4">
                                                <?php echo form_label('LinkedIn', 'linkedin', ['class' => 'col-form-label']);?>
                                                <?php echo form_input([
                                                    'name' => 'linkedin',
                                                    'id'   => 'linkedin',
                                                    'type' => 'text',
                                                    'value' => $user->linkedin
                                                ], '', ['class' => 'form-control']);?>

                                            </div>
                                            <div class="col-md-6 col-lg-4">
                                                <?php echo form_label('TikTok', 'tiktok', ['class' => 'col-form-label']);?>
                                                <?php echo form_input([
                                                    'name' => 'tiktok',
                                                    'id'   => 'tiktok',
                                                    'type' => 'text',
                                                    'value' => $user->tiktok
                                                ], '', ['class' => 'form-control']);?>

                                            </div>
                                            <div class="col-md-6 col-lg-4">
                                                <?php echo form_label('Behance', 'behance', ['class' => 'col-form-label']);?>
                                                <?php echo form_input([
                                                    'name' => 'behance',
                                                    'id'   => 'behance',
                                                    'type' => 'text',
                                                    'value' => $user->behance
                                                ], '', ['class' => 'form-control']);?>

                                            </div>
                                            <div class="col-md-6 col-lg-4">
                                                <?php echo form_label('Pinterest', 'pinterest', ['class' => 'col-form-label']);?>
                                                <?php echo form_input([
                                                    'name' => 'pinterest',
                                                    'id'   => 'pinterest',
                                                    'type' => 'text',
                                                    'value' => $user->pinterest
                                                ], '', ['class' => 'form-control']);?>

                                            </div>
                                            <div class="col-md-6 col-lg-4">
                                                <?php echo form_label('Flickr', 'flickr', ['class' => 'col-form-label']);?>
                                                <?php echo form_input([
                                                    'name' => 'flickr',
                                                    'id'   => 'flickr',
                                                    'type' => 'text',
                                                    'value' => $user->flickr
                                                ], '', ['class' => 'form-control']);?>

                                            </div>
                                            <div class="col-md-6 col-lg-4">
                                                <?php echo form_label('Github', 'github', ['class' => 'col-form-label']);?>
                                                <?php echo form_input([
                                                    'name' => 'github',
                                                    'id'   => 'github',
                                                    'type' => 'text',
                                                    'value' => $user->github
                                                ], '', ['class' => 'form-control']);?>

                                            </div>
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
                            
                            <?php if($user->id === $logged_user->row()->id) { ?>
                                <div class="tab-pane fade <?= isset($_GET['tab']) && $_GET['tab'] === 'change-password' ? 'show active' : '' ?> pt-3" id="profile-change-password">
                                <?php 
                                        if(isset($response) && !empty($response) && $response['tab'] === 'change-password') { 
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
                                <!-- Change Password Form -->
                                    <?php echo form_open('users/change_password');?>

                                        <div class="row mb-3">
                                            <?php echo form_label('Senha atual', 'old_password', ['class' => 'col-md-4 col-lg-3 col-form-label']);?>
                                            <div class="col-md-8 col-lg-9">
                                                <?php echo form_password([
                                                        'name' => 'old_password',
                                                        'id'   => 'old_password'
                                                    ], '', ['class' => 'form-control', 'required' => 'required']);?>

                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <?php echo form_label('Nova senha', 'new_password', ['class' => 'col-md-4 col-lg-3 col-form-label']);?>
                                            <div class="col-md-8 col-lg-9">
                                                <?php echo form_password([
                                                        'name' => 'new_password',
                                                        'id'   => 'new_password'
                                                    ], '', ['class' => 'form-control', 'required' => 'required']);?>

                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <?php echo form_label('Confirmação da nova senha', 'new_password_confirm', ['class' => 'col-md-4 col-lg-3 col-form-label']);?>
                                            <div class="col-md-8 col-lg-9">
                                                <?php echo form_password([
                                                        'name' => 'new_password_confirm',
                                                        'id'   => 'new_password_confirm'
                                                    ], '', ['class' => 'form-control', 'required' => 'required']);?>

                                            </div>
                                        </div>

                                        <div class="col-12">
                                        <?php echo form_submit('submit', 'Atualizar', ['class' => 'btn btn-primary w-100']);?>
                                        </div>
                                        <?php echo form_close();?>

                                </div>
                            <?php } ?>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main>