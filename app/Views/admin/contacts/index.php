<main id="main" class="main">

    <div class="pagetitle">
        <h1>Contatos</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active">Contatos</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Contatos</h5>
                        <p>Visualize todos os contatos recebidos através dos formulários</p>

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


                        <div class="card">
                            <?php 
                        $response = $session->getFlashdata('response');
                    ?>
                            <div class="card-body pt-3">
                                <!-- Bordered Tabs -->
                                <ul class="nav nav-tabs nav-tabs-bordered">


                                    <li class="nav-item">
                                        <button
                                            class="nav-link <?= !isset($_GET['tab']) || $_GET['tab'] !== 'cooperated' ? 'active' : '' ?>"
                                            data-bs-toggle="tab" data-bs-target="#contacts">Contatos</button>
                                    </li>
                                    <li class="nav-item">
                                        <button
                                            class="nav-link <?= isset($_GET['tab']) && $_GET['tab'] === 'cooperated' ? 'active' : '' ?>"
                                            data-bs-toggle="tab" data-bs-target="#cooperated">Cooperados</button>
                                    </li>

                                </ul>
                                <div class="tab-content pt-2">

                                    <div class="tab-pane fade <?= !isset($_GET['tab']) || $_GET['tab'] !== 'cooperated' ? 'show active' : '' ?> contacts pt-3"
                                        id="contacts">
                                        <div class="row">
                                            <div class="col-12">
                                                <?php 
                                                    if(isset($response) && !empty($response) && $response['tab'] === 'edit') { 
                                                ?>
                                                <div class="alert alert-<?= $response['success'] ? 'success' : 'danger' ?> d-flex align-items-center alert-dismissible fade show my-3"
                                                    role="alert" style="margin-bottom: 20px">
                                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                                        aria-label="Success:">
                                                        <use
                                                            xlink:href="<?= $response['success'] ? '#check-circle-fill' : '#exclamation-triangle-fill' ?>" />
                                                    </svg>
                                                    <div>
                                                        <?= $response['message'] ?>
                                                    </div>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="Close"></button>
                                                </div>

                                                <?php } ?>
                                            </div>
                                            <div class="col-12">
                                                <table class="table datatable"
                                                    data-ssr="<?= base_url("api/datatables/contacts") ?>"
                                                    style="width: 100%;"
                                                    >
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Nome</th>
                                                            <th scope="col">E-mail</th>
                                                            <th scope="col">Celular</th>
                                                            <th scope="col">Cidade</th>
                                                            <th scope="col">Assunto</th>
                                                            <th scope="col">Data</th>
                                                            <th scope="col">Ações</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade <?= isset($_GET['tab']) && $_GET['tab'] === 'cooperated' ? 'show active' : '' ?> pt-3"
                                        id="cooperated" data-export="true">
                                        <div class="row">
                                            <div class="col-12">
                                                <?php 
                                                    if(isset($response) && !empty($response) && $response['tab'] === 'cooperated') { 
                                                ?>
                                                <div class="alert alert-<?= $response['success'] ? 'success' : 'danger' ?> d-flex align-items-center alert-dismissible fade show my-3"
                                                    role="alert" style="margin-bottom: 20px">
                                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                                        aria-label="Success:">
                                                        <use
                                                            xlink:href="<?= $response['success'] ? '#check-circle-fill' : '#exclamation-triangle-fill' ?>" />
                                                    </svg>
                                                    <div>
                                                        <?= $response['message'] ?>
                                                    </div>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="Close"></button>
                                                </div>
                                                <?php } ?>
                                            </div>
                                            <div class="col-12">
                                                <table class="table datatable"
                                                    data-ssr="<?= base_url("api/datatables/cooperated_contacts") ?>"
                                                    data-export="true"
                                                    style="width: 100%;"
                                                    >
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Nome</th>
                                                            <th scope="col">Cod. cooperado</th>
                                                            <th scope="col">CPF/CNPJ</th>
                                                            <th scope="col">E-mail</th>
                                                            <th scope="col">Celular/Whatsapp</th>
                                                            <th scope="col">Telefone</th>
                                                            <th scope="col">Cidade</th>
                                                            <th scope="col">Data</th>
                                                            <th scope="col">Ações</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>

                                    </div>

                                </div><!-- End Bordered Tabs -->

                            </div>
                        </div>





                    </div>
                </div>
            </div>
    </section>

</main>