<main id="main" class="main">

    <div class="pagetitle">
        <h1>Vagas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item"><a href="<?= base_url("admin/jobs") ?>">Vagas</a></li>
                <li class="breadcrumb-item active">Editar</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Editar Vaga</h5>
                        <p>Insira as informações atualizadas da vaga:</p>
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

                        <?php echo form_open_multipart('admin/jobs/update_job/'.$job->id, ['class' => 'my-5']);?>
                        <div class="row mb-3">
                                <?php echo form_label('Cargo<span class="required">*</span>', 'role_id', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php 
                                        $roles_options = array();

                                        $roles_options[""] = "";

                                        foreach($roles as $role) {
                                            $roles_options[(string)$role->id] = $role->title;
                                        }
                                    ?>
                                    <?php echo form_dropdown('role_id', $roles_options, $job->role_id, ['class' => 'form-control searchable', 'required' => 'required', 'id' => 'role_id']);?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <?php echo form_label('Cargo Relacionado 1', 'related_role_01_id', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php echo form_dropdown('related_role_01_id', $roles_options, $job->related_role_01_id, ['class' => 'form-control searchable', 'id' => 'related_role_01_id']);?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <?php echo form_label('Cargo Relacionado 2', 'related_role_02_id', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php echo form_dropdown('related_role_02_id', $roles_options, $job->related_role_02_id, ['class' => 'form-control searchable', 'id' => 'related_role_02_id']);?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <?php echo form_label('Título da Vaga<span class="required">*</span>', 'title', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php echo form_input([
                                            'name' => 'title',
                                            'id'   => 'title',
                                            'type' => 'text'
                                        ], $job->title, ['class' => 'form-control', 'required' => 'required']);?>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <?php echo form_label('Filial<span class="required">*</span>', 'branch_id', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php 
                                        $branches_options = array();

                                        foreach($branches as $branch) {
                                            $branches_options[(string)$branch->id] = $branch->city;
                                        }
                                    ?>
                                    <?php echo form_dropdown('branch_id', $branches_options, $job->branch_id, ['class' => 'form-control searchable', 'required' => 'required', 'id' => 'branch_id']);?>
                                
                                </div>
                            </div>
                            <div class="row mb-3">
                                <?php echo form_label('Tipo<span class="required">*</span>', 'type', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php 
                                        $type_options = array(
                                            '0' => 'Pessoa sem deficiência',
                                            '1' => 'PcD',
                                            '2' => 'Ambos'
                                        );
                                    ?>
                                    <?php echo form_dropdown('type', $type_options, $job->type, ['class' => 'form-control', 'required' => 'required', 'id' => 'type']);?>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <?php echo form_label('Ramo de atividade', 'activity', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php echo form_input([
                                            'name' => 'activity',
                                            'id'   => 'activity',
                                            'type' => 'text'
                                        ], $job->activity, ['class' => 'form-control']);?>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <?php echo form_label('Nº de vagas<span class="required">*</span>', 'quantity', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php echo form_input([
                                            'name' => 'quantity',
                                            'id'   => 'quantity',
                                            'type' => 'number'
                                        ], $job->quantity, ['class' => 'form-control', 'required' => 'required']);?>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <?php echo form_label('Carga horária', 'workload', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php echo form_input([
                                            'name' => 'workload',
                                            'id'   => 'workload',
                                            'type' => 'text'
                                        ], $job->workload, ['class' => 'form-control']);?>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <?php echo form_label('Modalidade<span class="required">*</span>', 'modality', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php 
                                        $modality_options = array(
                                            'Efetivo' => 'Efetivo',
                                            'Temporário' => 'Temporário',
                                            'Estágio' => 'Estágio'
                                        );
                                    ?>
                                    <?php echo form_dropdown('modality', $modality_options, $job->modality, ['class' => 'form-control', 'required' => 'required', 'id' => 'modality']);?>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <?php echo form_label('Escolaridade<span class="required">*</span>', 'grade', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php 
                                        $grade_options = array(
                                            'Ensino superior completo' => 'Ensino superior completo',
                                            'Ensino superior incompleto' => 'Ensino superior incompleto',
                                            'Pós graduado' => 'Pós graduado',
                                            'Primeiro grau completo' => 'Primeiro grau completo',
                                            'Primeiro grau incompleto' => 'Primeiro grau incompleto',
                                            'Segundo grau completo' => 'Segundo grau completo',
                                            'Segundo grau incompleto' => 'Segundo grau incompleto',
                                            'Curso Técnico' => 'Curso Técnico',
                                        );
                                    ?>
                                    <?php echo form_dropdown('grade', $grade_options, $job->grade, ['class' => 'form-control searchable', 'required' => 'required', 'id' => 'grade']);?>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <?php echo form_label('Descrição da vaga', 'description', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php echo form_textarea([
                                            'name' => 'description',
                                            'id'   => 'description',
                                        ], $job->description, ['class' => 'editor form-control']);?>

                                </div>
                            </div>
                            <div class="row mb-5">
                            <?php echo form_label('Status', 'status', ['class' => 'col-sm-2 col-form-label']);?>

                            <div class="col-sm-10">

                                <div class="switch__container">
                                    <?php echo form_checkbox([
                                            'name' => 'status',
                                            'id'   => 'status',
                                            'value'   => '1',
                                            'checked' => $job->status == 1,
                                        ], '1', $job->status == 1, ['class' => 'switch switch--shadow']);?>

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