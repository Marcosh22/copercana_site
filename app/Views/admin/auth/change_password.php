<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Login</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link href="<?= base_url('_assets/admin/img/favicon.png'); ?>" rel="icon">
    <link href="<?= base_url('_assets/admin/img/apple-touch-icon.png'); ?>" rel="apple-touch-icon">

    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <link href="<?= base_url('_assets/admin/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('_assets/admin/vendor/bootstrap-icons/bootstrap-icons.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('_assets/admin/vendor/boxicons/css/boxicons.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('_assets/admin/vendor/quill/quill.snow.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('_assets/admin/vendor/quill/quill.bubble.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('_assets/admin/vendor/remixicon/remixicon.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('_assets/admin/vendor/simple-datatables/style.css'); ?>" rel="stylesheet">

    <link href="<?= base_url('_assets/admin/css/style.css'); ?>" rel="stylesheet">

</head>
<main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="assets/img/logo.png" alt="">
                                    <span class="d-none d-lg-block">Copercana</span>
                                </a>
                            </div>

                            <div class="card mb-3">
                        <div class="card-body">

                                    <div class="pt-4 pb-2">
                                          <h5 class="card-title text-center pb-0 fs-4">
                                          <?php echo lang('Auth.change_password_heading');?></h5>
                                    </div>
                                    <?php if($message && isset($message) && !empty($message)) { ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                      <?php echo $message;?>
                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    <?php } ?>

                                    <?php echo form_open('auth/change_password', ['class' => 'row g-3', 'novalidate' => 'true']);?>

                                    <div class="col-12">
                                        <?php echo form_label(lang('Auth.change_password_old_password_label'), 'old_password', ['class' => 'form-label']);?>
                                        <?php echo form_input($old_password, '', ['class' => 'form-control']);?>
                                    </div>

                                    <div class="col-12">
                                        <?php echo form_label(sprintf(lang('Auth.change_password_new_password_label'), $minPasswordLength), '', ['class' => 'form-label']);?>
                                        <?php echo form_input($new_password, '', ['class' => 'form-control']);?>
                                    </div>

                                    <div class="col-12">
                                        <?php echo form_label(lang('Auth.change_password_new_password_confirm_label'), 'new_password_confirm', ['class' => 'form-label']);?>
                                        <?php echo form_input($new_password_confirm, '', ['class' => 'form-control']);?>
                                    </div>

                                    <div class="col-12">
                                        <?php echo form_submit('submit', lang('Auth.change_password_submit_btn'), ['class' => 'btn btn-primary w-100']);?>
                                    </div>
                                    <?php echo form_close();?>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <script src="<?= base_url('_assets/admin/vendor/apexcharts/apexcharts.min.js'); ?>"></script>
    <script src="<?= base_url('_assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('_assets/admin/vendor/chart.js/chart.min.js'); ?>"></script>
    <script src="<?= base_url('_assets/admin/vendor/echarts/echarts.min.js'); ?>"></script>
    <script src="<?= base_url('_assets/admin/vendor/quill/quill.min.js'); ?>"></script>
    <script src="<?= base_url('_assets/admin/vendor/simple-datatables/simple-datatables.js'); ?>"></script>
    <script src="<?= base_url('_assets/admin/vendor/tinymce/tinymce.min.js'); ?>"></script>
    <script src="<?= base_url('_assets/admin/vendor/php-email-form/validate.js'); ?>"></script>

    <script src="<?= base_url('_assets/admin/js/main.js'); ?>"></script>

</body>

</html>