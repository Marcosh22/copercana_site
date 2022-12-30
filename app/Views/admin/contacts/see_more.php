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
                        <h5 class="card-title">Visualizar Contato</h5>
                        <p>Veja aqui todas as informações do contato:</p>

                        <div class="my-5">
                            <div class="row mb-3">
                                <?php echo form_label('Nome', 'name', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php echo form_input([
                                            'name' => 'name',
                                            'id'   => 'name',
                                            'type' => 'text'
                                        ], $contact->name, ['class' => 'form-control', 'disabled' => 'disabled']);?>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <?php echo form_label('E-mail', 'email', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php echo form_input([
                                            'name' => 'email',
                                            'id'   => 'email',
                                            'type' => 'email'
                                        ], $contact->email, ['class' => 'form-control', 'disabled' => 'disabled']);?>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <?php echo form_label('Celular', 'cellphone', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php echo form_input([
                                            'name' => 'cellphone',
                                            'id'   => 'cellphone',
                                            'type' => 'text'
                                        ], $contact->cellphone, ['class' => 'form-control', 'disabled' => 'disabled']);?>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <?php echo form_label('Cidade', 'city', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php echo form_input([
                                            'name' => 'city',
                                            'id'   => 'city',
                                            'type' => 'text'
                                        ], $contact->city, ['class' => 'form-control', 'disabled' => 'disabled']);?>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <?php echo form_label('Assunto', 'subject', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php echo form_input([
                                            'name' => 'subject',
                                            'id'   => 'subject',
                                            'type' => 'text'
                                        ], $contact->subject, ['class' => 'form-control', 'disabled' => 'disabled']);?>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <?php echo form_label('Mensagem', 'message', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                        <?php echo form_textarea([
                                            'name' => 'message',
                                            'id'   => 'message',
                                        ], $contact->message, ['class' => 'form-control', 'style' => 'height: 100px', 'disabled' => 'disabled']);?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <?php 
                                    $contact_date=date_create($contact->created_at);
                                    $contact_date=date_format($contact_date,"d/m/Y H:i");
                                    ?>
                                <?php echo form_label('Data', 'create_at', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php echo form_input([
                                            'name' => 'create_at',
                                            'id'   => 'create_at',
                                            'type' => 'text'
                                        ], $contact_date, ['class' => 'form-control', 'disabled' => 'disabled']);?>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </section>

</main>