<main id="main" class="main">

    <div class="pagetitle">
        <h1>Jornais de Ofertas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active">Jornais de Ofertas</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Jornais de Ofertas</h5>
                        <p>Adicione e gerencie seus jornais de ofertas</p>
                        <div class="page-action-button d-flex my-4">
                            <a class="btn btn-success mx-2 my-2" href="<?= base_url("admin/offers/add_new") ?>"><i
                                    class="bi bi-plus-square"></i> Adicionar Novo Jornal de Oferta</a>
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
                        <table class="table datatable" data-ssr="<?= base_url("api/datatables/offers") ?>">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Capa</th>
                                    <th scope="col">Título</th>
                                    <th scope="col">Início</th>
                                    <th scope="col">Término</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Data da publicação</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            
                        </table>
                    </div>
                </div>
            </div>
    </section>

</main>