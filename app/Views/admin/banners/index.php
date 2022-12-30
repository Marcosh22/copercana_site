<main id="main" class="main">

    <div class="pagetitle">
        <h1>Banners</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active">Banners</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Banners</h5>
                        <p>Adicione e gerencie os banners rotativos da sua Home Page</p>
                        <div class="page-action-button d-flex my-4">
                            <a class="btn btn-success mx-2 my-2" href="<?= base_url("admin/banners/add_new") ?>"><i
                                    class="bi bi-plus-square"></i> Adicionar Novo Banner</a>
                        </div>
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


                        <?php if(isset($banners_home) && count($banners_home) > 0) { ?>
                        <div class="banners-list js-sortable">
                            <?php foreach($banners_home as $banner) { ?>
                            <div class="list-group-item" data-id="<?= $banner->id ?>">
                                <div class="banner-info">
                                    <i class="bi bi-arrows-move"></i>
                                    <div class="banner-info__picture">
                                        <img src="<?= base_url($banner->desktop_picture) ?>" alt="">
                                    </div>
                                    <div class="banner-info__description">
                                        <h4><?= $banner->title ?></h4>
                                        <span>
                                            <?php
                                                        if(isset($banner->starts_at) && !empty($banner->starts_at) && $banner->starts_at !== '0000-00-00 00:00:00') {
                                                            $start_date=date_create($banner->starts_at);
                                                            $start_date=date_format($start_date,"d/m/Y H:i");
                                                        } else {
                                                            $start_date="Indefinido";
                                                        }

                                                        if(isset($banner->ends_at) && !empty($banner->ends_at)&& $banner->ends_at !== '0000-00-00 00:00:00') {
                                                            $end_date=date_create($banner->ends_at);
                                                            $end_date=date_format($end_date,"d/m/Y H:i");
                                                        } else {
                                                            $end_date="Indefinido";
                                                        }
                                                        
                                                        ?>
                                            <span>Quantidade de cliques:
                                                <strong><?= $banner->click_count ?></strong></span><br /><br />
                                            <i>Início: <?= $start_date ?></i>&nbsp;-&nbsp;<i>Término:
                                                <?= $end_date ?></i>
                                        </span>
                                        <span
                                            class="status <?= $banner->status == 1 ? 'status--active' : 'status--inactive' ?>"><?= $banner->status == 1 ? 'ATIVO' : 'INATIVO' ?></span>
                                    </div>
                                    <div class="banner-info__configs">
                                        <span class="actions-buttons">
                                            <a href="<?= base_url("admin/banners/edit/".$banner->id) ?>"
                                                class="btn btn-success"><i class="bi bi-pencil"></i><span
                                                    class="d-none d-sm-block">&nbsp;Editar</span></a>
                                            <a href="<?= base_url("admin/banners/delete/".$banner->id) ?>"
                                                class="btn btn-danger" data-toggle=confirmation
                                                data-title="Excluir banner?"><i class="bi bi-trash"></i><span
                                                    class="d-none d-sm-block">&nbsp;Remover</span></a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
    </section>

</main>