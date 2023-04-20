<main id="main" class="main">

    <div class="pagetitle">
        <h1>Contatos</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item"><a href="<?= base_url("admin/contacts") ?>">Contatos</a></li>
                <li class="breadcrumb-item active">Visualizar</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Visualizar Contato (Cooperados)</h5>
                        <p>Veja aqui todas as informações do contato:</p>

                        <div class="my-5">
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

                        <?php echo form_open_multipart('admin/contacts/update_cooperated/'.$contact->id, ['class' => 'my-5']);?>
                            <div class="row mb-3">
                                <?php echo form_label('Nome', 'name', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php echo form_input([
                                            'name' => 'name',
                                            'id'   => 'name',
                                            'type' => 'text'
                                        ], $contact->name ? $contact->name : '', ['class' => 'form-control']);?>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <?php echo form_label('Código do cooperado', 'registration', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php echo form_input([
                                            'name' => 'registration',
                                            'id'   => 'registration',
                                            'type' => 'text'
                                        ], $contact->registration ? $contact->registration : '', ['class' => 'form-control']);?>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <?php echo form_label('CPF/CNPJ', 'cpf_cnpj', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php echo form_input([
                                            'name' => 'cpf_cnpj',
                                            'id'   => 'cpf_cnpj',
                                            'type' => 'text'
                                        ], $contact->cpf_cnpj ? $contact->cpf_cnpj : '', ['class' => 'form-control']);?>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <?php echo form_label('E-mail', 'email', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php echo form_input([
                                            'name' => 'email',
                                            'id'   => 'email',
                                            'type' => 'email'
                                        ], $contact->email ? $contact->email : '', ['class' => 'form-control']);?>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <?php echo form_label('Celular/Whatsapp', 'cellphone', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php echo form_input([
                                            'name' => 'cellphone',
                                            'id'   => 'cellphone',
                                            'type' => 'text'
                                        ], $contact->cellphone ? $contact->cellphone : '', ['class' => 'form-control']);?>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <?php echo form_label('Telefone', 'telephone', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php echo form_input([
                                            'name' => 'telephone',
                                            'id'   => 'telephone',
                                            'type' => 'text'
                                        ], $contact->telephone ? $contact->telephone : '', ['class' => 'form-control']);?>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <?php echo form_label('Cidade', 'city', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php echo form_input([
                                            'name' => 'city',
                                            'id'   => 'city',
                                            'type' => 'text'
                                        ], $contact->city ? $contact->city : '', ['class' => 'form-control']);?>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <?php 
                                    $contact_date=date_create($contact->created_at);
                                    $contact_date=date_format($contact_date,"d/m/Y H:i");
                                    ?>
                                <?php echo form_label('Data', 'created_at', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php echo form_input([
                                            'name' => 'created_at',
                                            'id'   => 'created_at',
                                            'type' => 'text'
                                        ], $contact_date, ['class' => 'form-control', 'disabled' => 'disabled']);?>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <?php 
                                    $contact_update_date=date_create($contact->updated_at);
                                    $contact_update_date=date_format($contact_update_date,"d/m/Y H:i");
                                    ?>
                                <?php echo form_label('Última atualização', 'updated_at', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php echo form_input([
                                            'name' => 'updated_at',
                                            'id'   => 'updated_at',
                                            'type' => 'text'
                                        ], $contact_update_date, ['class' => 'form-control', 'disabled' => 'disabled']);?>

                                </div>
                            </div>
                            <div class="row mb-3">
                            <div class="col-12">
                                <?php echo form_submit('submit', 'Atualizar', ['class' => 'btn btn-primary w-100']);?>
                            </div>
                        </div>

                        <?php echo form_close();?>

                        </div>

                    </div>
                </div>
            </div>
    </section>

</main>