
<?php
    $definition = $unit->definition;

    if(isset($definition) && !empty($definition)) {
        $definition = json_decode($definition);
    }
?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Postos de Combustíveis</h1>
        <nav>
        <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item"><a href="<?= base_url("admin/units/gas-station") ?>">Postos de Combustíveis</a></li>
                <li class="breadcrumb-item active">Editar Unidade</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Editar Unidade</h5>
                        <p>Insira as informações atualizados da unidade:</p>
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

                        <?php echo form_open_multipart('admin/units/update_unit/'.$unit->id, ['class' => 'my-5'], ['type' => 'gas-station']);?>
                        <div class="row mb-3">
                        <?php echo form_label('Foto<span class="required">*</span></br><small>(Recomendado: 450×330)</small>', 'cover', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php if(isset($unit) && isset($unit->picture) && !empty($unit->picture)) { ?>
                                <div class="banner-preview">
                                    <input type="hidden" name="picture"
                                        value="<?= $unit->picture; ?>">
                                    <img src="<?= base_url($unit->picture) ?>" alt="">
                                    <a class="delete-btn"
                                        href="<?= base_url("admin/units/remove_picture/gas-station/".$unit->id) ?>"><i
                                            class="bi bi-x-circle-fill"></i></a>
                                </div>
                                <?php } else { ?>
                                    <?php echo form_upload([
                                            'name' => 'picture',
                                            'id'   => 'picture'
                                        ], '', ['class' => 'form-control', 'required' => 'required']);
                                    } ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('Cidade<span class="required">*</span>', 'city', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_input([
                                        'name' => 'city',
                                        'id'   => 'city',
                                        'type' => 'text'
                                    ], $unit->city, ['class' => 'form-control', 'required' => 'required']);?>

                            </div>
                        </div>
    
                        <div class="row mb-3">
                                <?php echo form_label('Estado<span class="required">*</span>', 'state', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                <?php 
                                    $states = array(
                                        '' => 'Selecione o estado',
                                        'AC'=>'Acre',
                                        'AL'=>'Alagoas',
                                        'AP'=>'Amapá',
                                        'AM'=>'Amazonas',
                                        'BA'=>'Bahia',
                                        'CE'=>'Ceará',
                                        'DF'=>'Distrito Federal',
                                        'ES'=>'Espírito Santo',
                                        'GO'=>'Goiás',
                                        'MA'=>'Maranhão',
                                        'MT'=>'Mato Grosso',
                                        'MS'=>'Mato Grosso do Sul',
                                        'MG'=>'Minas Gerais',
                                        'PA'=>'Pará',
                                        'PB'=>'Paraíba',
                                        'PR'=>'Paraná',
                                        'PE'=>'Pernambuco',
                                        'PI'=>'Piauí',
                                        'RJ'=>'Rio de Janeiro',
                                        'RN'=>'Rio Grande do Norte',
                                        'RS'=>'Rio Grande do Sul',
                                        'RO'=>'Rondônia',
                                        'RR'=>'Roraima',
                                        'SC'=>'Santa Catarina',
                                        'SP'=>'São Paulo',
                                        'SE'=>'Sergipe',
                                        'TO'=>'Tocantins'
                                        );
                                    echo form_dropdown('state', $states, $unit->state, ['id' => 'state', 'class' => 'form-control', 'required' => 'required']);?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <?php echo form_label('Endereço', 'address', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php echo form_textarea([
                                            'name' => 'address'
                                        ], $unit->address, ['class' => 'editor form-control']);?>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <?php echo form_label('Horário de Funcionamento', 'opening_hours', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php echo form_textarea([
                                            'name' => 'opening_hours'
                                        ], $unit->opening_hours, ['class' => ' editor form-control']);?>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <?php echo form_label('Link Google Maps', 'city', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php echo form_input([
                                            'name' => 'address_link',
                                            'id'   => 'address_link',
                                            'type' => 'text'
                                        ], $unit->address_link, ['class' => 'form-control']);?>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <?php echo form_label('Certificado de Posto Revendedor (Autoriz.)', 'dealer_authorizarion', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php echo form_input([
                                            'name' => 'definition[dealer_authorizarion]',
                                            'id'   => 'dealer_authorizarion',
                                            'type' => 'text'
                                        ], isset($definition) && isset($definition->dealer_authorizarion) ? $definition->dealer_authorizarion : '', ['class' => 'form-control']);?>

                                </div>
                            </div>

                            <div class="row mb-3">
                                <?php echo form_label('Serviços', '', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-6 col-md-4 col-lg-2">
                                            <div class="form-group">
                                                <?php echo form_checkbox([
                                                    'name' => 'definition[services][]',
                                                    'id'   => 'services-fuel',
                                                    'value'   => 'fuel',
                                                    ],
                                                    'fuel', 
                                                        isset($definition) ?  
                                                        isset($definition->services) &&
                                                        in_array('fuel', $definition->services)
                                                    : false
                                                ); ?>
                                                <?php echo form_label('Combustíveis', 'services-fuel', ['class' => 'col-form-label']);?>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-4 col-lg-2">
                                            <div class="form-group">
                                                <?php echo form_checkbox([
                                                    'name' => 'definition[services][]',
                                                    'id'   => 'services-convenience-store',
                                                    'value'   => 'convenience-store',
                                                    ],
                                                    'convenience-store', 
                                                    isset($definition) ?  
                                                    isset($definition->services) &&
                                                    in_array('convenience-store', $definition->services)
                                                    : false
                                                ); ?>
                                                <?php echo form_label('Loja de Conveniência', 'services-convenience-store', ['class' => 'col-form-label']);?>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-4 col-lg-2">
                                            <div class="form-group">
                                                <?php echo form_checkbox([
                                                    'name' => 'definition[services][]',
                                                    'id'   => 'services-oil-change',
                                                    'value'   => 'oil-change',
                                                    ],
                                                    'oil-change', 
                                                    isset($definition) ?  
                                                    isset($definition->services) &&
                                                    in_array('oil-change', $definition->services)
                                                    : false
                                                ); ?>
                                                <?php echo form_label('Troca de Óleo', 'services-oil-change', ['class' => 'col-form-label']);?>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-4 col-lg-2">
                                            <div class="form-group">
                                                <?php echo form_checkbox([
                                                    'name' => 'definition[services][]',
                                                    'id'   => 'services-car-wash',
                                                    'value'   => 'car-wash',
                                                    ],
                                                    'car-wash', 
                                                    isset($definition) ?  
                                                    isset($definition->services) &&
                                                    in_array('car-wash', $definition->services)
                                                    : false
                                                ); ?>
                                                <?php echo form_label('Lava Rápido', 'services-car-wash', ['class' => 'col-form-label']);?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="row mb-3">
                                <?php echo form_label('Combustíveis', '', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-6 col-md-4 col-lg-2">
                                            <div class="form-group">
                                                <?php echo form_checkbox([
                                                    'name' => 'definition[fuels][]',
                                                    'id'   => 'fuels-gasoline-common',
                                                    'value'   => 'gasoline-common',
                                                    ],
                                                    'gasoline-common', 
                                                    isset($definition) ?  
                                                    isset($definition->fuels) &&
                                                    in_array('gasoline-common', $definition->fuels)
                                                    : false
                                                ); ?>
                                                <?php echo form_label('Gasolina Comum', 'fuels-gasoline-common', ['class' => 'col-form-label']);?>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-4 col-lg-2">
                                            <div class="form-group">
                                                <?php echo form_checkbox([
                                                    'name' => 'definition[fuels][]',
                                                    'id'   => 'fuels-gasoline-additive',
                                                    'value'   => 'gasoline-additive',
                                                    ],
                                                    'gasoline-additive', 
                                                    isset($definition) ?  
                                                    isset($definition->fuels) &&
                                                    in_array('gasoline-additive', $definition->fuels)
                                                    : false
                                                ); ?>
                                                <?php echo form_label('Gasolina Aditivada Copernitro Pro', 'fuels-gasoline-additive', ['class' => 'col-form-label']);?>
                                            </div>
                                        </div>

                                        <div class="col-6 col-md-4 col-lg-2">
                                            <div class="form-group">
                                                <?php echo form_checkbox([
                                                    'name' => 'definition[fuels][]',
                                                    'id'   => 'fuels-diesel-common',
                                                    'value'   => 'diesel-common',
                                                    ],
                                                    'diesel-common', 
                                                    isset($definition) ?  
                                                    isset($definition->fuels) &&
                                                    in_array('diesel-common', $definition->fuels)
                                                    : false
                                                ); ?>
                                                <?php echo form_label('Diesel Comum', 'fuels-diesel-common', ['class' => 'col-form-label']);?>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-4 col-lg-2">
                                            <div class="form-group">
                                                <?php echo form_checkbox([
                                                    'name' => 'definition[fuels][]',
                                                    'id'   => 'fuels-diesel-additive',
                                                    'value'   => 'diesel-additive',
                                                    ],
                                                    'diesel-additive', 
                                                    isset($definition) ?  
                                                    isset($definition->fuels) &&
                                                    in_array('diesel-additive', $definition->fuels)
                                                    : false
                                                ); ?>
                                                <?php echo form_label('Diesel Aditivado', 'fuels-diesel-additive', ['class' => 'col-form-label']);?>
                                            </div>
                                        </div>

                                        <div class="col-6 col-md-4 col-lg-2">
                                            <div class="form-group">
                                                <?php echo form_checkbox([
                                                    'name' => 'definition[fuels][]',
                                                    'id'   => 'fuels-diesel-s-10',
                                                    'value'   => 'diesel-s-10',
                                                    ],
                                                    'diesel-s-10', 
                                                    isset($definition) ?  
                                                    isset($definition->fuels) &&
                                                    in_array('diesel-s-10', $definition->fuels)
                                                    : false
                                                ); ?>
                                                <?php echo form_label('Diesel S-10 Aditivado Copernitro Pro Ultra Filtrado', 'fuels-diesel-s-10', ['class' => 'col-form-label']);?>
                                            </div>
                                        </div>

                                        <div class="col-6 col-md-4 col-lg-2">
                                            <div class="form-group">
                                                <?php echo form_checkbox([
                                                    'name' => 'definition[fuels][]',
                                                    'id'   => 'fuels-diesel-s-500',
                                                    'value'   => 'diesel-s-500',
                                                    ],
                                                    'diesel-s-500', 
                                                    isset($definition) ?  
                                                    isset($definition->fuels) &&
                                                    in_array('diesel-s-500', $definition->fuels)
                                                    : false
                                                ); ?>
                                                <?php echo form_label('Diesel S-500 Aditivado Copernitro Pro Ultra Filtrado', 'fuels-diesel-s-500', ['class' => 'col-form-label']);?>
                                            </div>
                                        </div>


                                        <div class="col-6 col-md-4 col-lg-2">
                                            <div class="form-group">
                                                <?php echo form_checkbox([
                                                    'name' => 'definition[fuels][]',
                                                    'id'   => 'fuels-ethanol',
                                                    'value'   => 'ethanol',
                                                    ],
                                                    'ethanol', 
                                                    isset($definition) ?  
                                                    isset($definition->fuels) &&
                                                    in_array('ethanol', $definition->fuels)
                                                    : false
                                                ); ?>
                                                <?php echo form_label('Etanol', 'fuels-ethanol', ['class' => 'col-form-label']);?>
                                            </div>
                                        </div>

                                        <div class="col-6 col-md-4 col-lg-2">
                                            <div class="form-group">
                                                <?php echo form_checkbox([
                                                    'name' => 'definition[fuels][]',
                                                    'id'   => 'fuels-arla-32',
                                                    'value'   => 'arla-32',
                                                    ],
                                                    'arla-32', 
                                                    isset($definition) ?  
                                                    isset($definition->fuels) &&
                                                    in_array('arla-32', $definition->fuels)
                                                    : false
                                                ); ?>
                                                <?php echo form_label('Arla 32', 'fuels-arla-32', ['class' => 'col-form-label']);?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row mb-5">
                                <?php echo form_label('Exibir loja?', 'status', ['class' => 'col-sm-2 col-form-label']);?>

                                <div class="col-sm-10">
                                    <div class="switch__container">
                                        <?php echo form_checkbox([
                                            'name' => 'status',
                                            'id'   => 'status',
                                            'value'   => '1',
                                            'checked' => $unit->status == 1,
                                        ], '1',$unit->status == 1, ['class' => 'switch switch--shadow']);?>
                                        
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