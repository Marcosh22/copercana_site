<?php
    $socials = $general->socials;

    if(isset($socials) && !empty($socials)) {
        $socials = json_decode($socials);
    }
?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Geral</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active">Geral</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Editar Configurações do Site</h5>
                        <p>Edite algumas informações básicas do site:</p>
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

                        <?php echo form_open_multipart('admin/general/update_general/'.$general->id, ['class' => 'my-5']);?>
                            <div class="row mb-3">
                                <?php echo form_label('Endereço', 'address', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php echo form_input([
                                            'name' => 'address',
                                            'id'   => 'address',
                                            'type' => 'text'
                                        ], $general->address ? $general->address : '', ['class' => 'form-control']);?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <?php echo form_label('Link Endereço', 'address_link', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php echo form_input([
                                            'name' => 'address_link',
                                            'id'   => 'address_link',
                                            'type' => 'text'
                                        ], $general->address_link ? $general->address_link : '', ['class' => 'form-control']);?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <?php echo form_label('iFrame Google Maps', 'address_iframe', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php echo form_textarea([
                                                'name' => 'address_iframe',
                                                'id'   => 'address_iframe',
                                            ], $general->address_iframe ? $general->address_iframe : '', ['class' => 'form-control', 'style' => 'height: 100px']);?>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <?php echo form_label('Telefone para contato', 'phone', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php echo form_input([
                                            'name' => 'phone',
                                            'id'   => 'phone',
                                            'type' => 'text'
                                        ], $general->phone ? $general->phone : '', ['class' => 'form-control']);?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <?php echo form_label('Link Talentos', 'jobs_link', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php echo form_input([
                                            'name' => 'jobs_link',
                                            'id'   => 'jobs_link',
                                            'type' => 'text'
                                        ], $general->jobs_link ? $general->jobs_link : '', ['class' => 'form-control']);?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <?php echo form_label('Rádio Copercana', 'radio', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php echo form_input([
                                            'name' => 'radio',
                                            'id'   => 'radio',
                                            'type' => 'text'
                                        ], $general->radio ? $general->radio : '', ['class' => 'form-control']);?>
                                </div>
                            </div>
                            <div class="row mb-5" id="redes-sociais">
                                <?php echo form_label('Redes sociais:', '', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php echo form_label('Instagram', 'instagram', ['class' => 'col-form-label']);?>
                                            <?php echo form_input([
                                                'name' => 'instagram',
                                                'id'   => 'instagram',
                                                'type' => 'text',
                                            ], $general->instagram ? $general->instagram : '', ['class' => 'form-control']);?>

                                        </div>
                                        <div class="col-md-6">
                                            <?php echo form_label('Facebook', 'facebook', ['class' => 'col-form-label']);?>
                                            <?php echo form_input([
                                                'name' => 'facebook',
                                                'id'   => 'facebook',
                                                'type' => 'text',
                                            ], $general->facebook ? $general->facebook : '', ['class' => 'form-control']);?>

                                        </div>
                                        <div class="col-md-6">
                                            <?php echo form_label('Youtube', 'youtube', ['class' => 'col-form-label']);?>
                                            <?php echo form_input([
                                                'name' => 'youtube',
                                                'id'   => 'youtube',
                                                'type' => 'text',
                                            ], $general->youtube ? $general->youtube : '', ['class' => 'form-control']);?>

                                        </div>
                                        <div class="col-md-6">
                                            <?php echo form_label('LinkedIn', 'linkedin', ['class' => 'col-form-label']);?>
                                            <?php echo form_input([
                                                'name' => 'linkedin',
                                                'id'   => 'linkedin',
                                                'type' => 'text',
                                            ], $general->linkedin ? $general->linkedin : '', ['class' => 'form-control']);?>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-5" id="redes-sociais-autocenter">
                                <?php echo form_label('Auto Center:', '', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php echo form_label('Instagram', 'instagram_autocenter', ['class' => 'col-form-label']);?>
                                            <?php echo form_input([
                                                'name' => 'socials[autocenter][instagram]',
                                                'id'   => 'instagram_autocenter',
                                                'type' => 'text',
                                            ],
                                            isset($socials) &&  
                                            isset($socials->autocenter) &&
                                            isset($socials->autocenter->instagram) ?
                                            $socials->autocenter->instagram : '', 
                                            ['class' => 'form-control']);?>

                                        </div>
                                        <div class="col-md-6">
                                            <?php echo form_label('Facebook', 'facebook_autocenter', ['class' => 'col-form-label']);?>
                                            <?php echo form_input([
                                                'name' => 'socials[autocenter][facebook]',
                                                'id'   => 'facebook_autocenter',
                                                'type' => 'text',
                                            ],
                                            isset($socials) &&  
                                            isset($socials->autocenter) &&
                                            isset($socials->autocenter->facebook) ?
                                            $socials->autocenter->facebook : ''
                                            , ['class' => 'form-control']);?>

                                        </div>
                                        <div class="col-md-6">
                                            <?php echo form_label('Youtube', 'youtube_autocenter', ['class' => 'col-form-label']);?>
                                            <?php echo form_input([
                                                'name' => 'socials[autocenter][youtube]',
                                                'id'   => 'youtube_autocenter',
                                                'type' => 'text',
                                            ], 
                                            isset($socials) &&  
                                            isset($socials->autocenter) &&
                                            isset($socials->autocenter->youtube) ?
                                            $socials->autocenter->youtube : ''
                                            , ['class' => 'form-control']);?>

                                        </div>
                                        <div class="col-md-6">
                                            <?php echo form_label('LinkedIn', 'linkedin_autocenter', ['class' => 'col-form-label']);?>
                                            <?php echo form_input([
                                                'name' => 'socials[autocenter][linkedin]',
                                                'id'   => 'linkedin_autocenter',
                                                'type' => 'text',
                                            ], 
                                            isset($socials) &&  
                                            isset($socials->autocenter) &&
                                            isset($socials->autocenter->linkedin) ?
                                            $socials->autocenter->linkedin : ''
                                            , ['class' => 'form-control']);?>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-5" id="redes-sociais-magazine">
                                <?php echo form_label('Ferragem e Magazine:', '', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php echo form_label('Instagram', 'instagram_magazine', ['class' => 'col-form-label']);?>
                                            <?php echo form_input([
                                                'name' => 'socials[magazine][instagram]',
                                                'id'   => 'instagram_magazine',
                                                'type' => 'text',
                                            ],
                                            isset($socials) &&  
                                            isset($socials->magazine) &&
                                            isset($socials->magazine->instagram) ?
                                            $socials->magazine->instagram : '', 
                                            ['class' => 'form-control']);?>

                                        </div>
                                        <div class="col-md-6">
                                            <?php echo form_label('Facebook', 'facebook_magazine', ['class' => 'col-form-label']);?>
                                            <?php echo form_input([
                                                'name' => 'socials[magazine][facebook]',
                                                'id'   => 'facebook_magazine',
                                                'type' => 'text',
                                            ],
                                            isset($socials) &&  
                                            isset($socials->magazine) &&
                                            isset($socials->magazine->facebook) ?
                                            $socials->magazine->facebook : ''
                                            , ['class' => 'form-control']);?>

                                        </div>
                                        <div class="col-md-6">
                                            <?php echo form_label('Youtube', 'youtube_magazine', ['class' => 'col-form-label']);?>
                                            <?php echo form_input([
                                                'name' => 'socials[magazine][youtube]',
                                                'id'   => 'youtube_magazine',
                                                'type' => 'text',
                                            ], 
                                            isset($socials) &&  
                                            isset($socials->magazine) &&
                                            isset($socials->magazine->youtube) ?
                                            $socials->magazine->youtube : ''
                                            , ['class' => 'form-control']);?>

                                        </div>
                                        <div class="col-md-6">
                                            <?php echo form_label('LinkedIn', 'linkedin_magazine', ['class' => 'col-form-label']);?>
                                            <?php echo form_input([
                                                'name' => 'socials[magazine][linkedin]',
                                                'id'   => 'linkedin_magazine',
                                                'type' => 'text',
                                            ], 
                                            isset($socials) &&  
                                            isset($socials->magazine) &&
                                            isset($socials->magazine->linkedin) ?
                                            $socials->magazine->linkedin : ''
                                            , ['class' => 'form-control']);?>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-5" id="redes-sociais-postos">
                                <?php echo form_label('Postos de Combustíveis:', '', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php echo form_label('Instagram', 'instagram_gas_station', ['class' => 'col-form-label']);?>
                                            <?php echo form_input([
                                                'name' => 'socials[gas_station][instagram]',
                                                'id'   => 'instagram_gas_station',
                                                'type' => 'text',
                                            ],
                                            isset($socials) &&  
                                            isset($socials->gas_station) &&
                                            isset($socials->gas_station->instagram) ?
                                            $socials->gas_station->instagram : '', 
                                            ['class' => 'form-control']);?>

                                        </div>
                                        <div class="col-md-6">
                                            <?php echo form_label('Facebook', 'facebook_gas_station', ['class' => 'col-form-label']);?>
                                            <?php echo form_input([
                                                'name' => 'socials[gas_station][facebook]',
                                                'id'   => 'facebook_gas_station',
                                                'type' => 'text',
                                            ],
                                            isset($socials) &&  
                                            isset($socials->gas_station) &&
                                            isset($socials->gas_station->facebook) ?
                                            $socials->gas_station->facebook : ''
                                            , ['class' => 'form-control']);?>

                                        </div>
                                        <div class="col-md-6">
                                            <?php echo form_label('Youtube', 'youtube_gas_station', ['class' => 'col-form-label']);?>
                                            <?php echo form_input([
                                                'name' => 'socials[gas_station][youtube]',
                                                'id'   => 'youtube_gas_station',
                                                'type' => 'text',
                                            ], 
                                            isset($socials) &&  
                                            isset($socials->gas_station) &&
                                            isset($socials->gas_station->youtube) ?
                                            $socials->gas_station->youtube : ''
                                            , ['class' => 'form-control']);?>

                                        </div>
                                        <div class="col-md-6">
                                            <?php echo form_label('LinkedIn', 'linkedin_gas_station', ['class' => 'col-form-label']);?>
                                            <?php echo form_input([
                                                'name' => 'socials[gas_station][linkedin]',
                                                'id'   => 'linkedin_gas_station',
                                                'type' => 'text',
                                            ], 
                                            isset($socials) &&  
                                            isset($socials->gas_station) &&
                                            isset($socials->gas_station->linkedin) ?
                                            $socials->gas_station->linkedin : ''
                                            , ['class' => 'form-control']);?>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-5" id="redes-sociais-supermercados">
                                <?php echo form_label('Supermercados:', '', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <?php echo form_label('Instagram', 'instagram_supermarket', ['class' => 'col-form-label']);?>
                                            <?php echo form_input([
                                                'name' => 'socials[supermarket][instagram]',
                                                'id'   => 'instagram_supermarket',
                                                'type' => 'text',
                                            ],
                                            isset($socials) &&  
                                            isset($socials->supermarket) &&
                                            isset($socials->supermarket->instagram) ?
                                            $socials->supermarket->instagram : '', 
                                            ['class' => 'form-control']);?>

                                        </div>
                                        <div class="col-md-6">
                                            <?php echo form_label('Facebook', 'facebook_supermarket', ['class' => 'col-form-label']);?>
                                            <?php echo form_input([
                                                'name' => 'socials[supermarket][facebook]',
                                                'id'   => 'facebook_supermarket',
                                                'type' => 'text',
                                            ],
                                            isset($socials) &&  
                                            isset($socials->supermarket) &&
                                            isset($socials->supermarket->facebook) ?
                                            $socials->supermarket->facebook : ''
                                            , ['class' => 'form-control']);?>

                                        </div>
                                        <div class="col-md-6">
                                            <?php echo form_label('Youtube', 'youtube_supermarket', ['class' => 'col-form-label']);?>
                                            <?php echo form_input([
                                                'name' => 'socials[supermarket][youtube]',
                                                'id'   => 'youtube_supermarket',
                                                'type' => 'text',
                                            ], 
                                            isset($socials) &&  
                                            isset($socials->supermarket) &&
                                            isset($socials->supermarket->youtube) ?
                                            $socials->supermarket->youtube : ''
                                            , ['class' => 'form-control']);?>

                                        </div>
                                        <div class="col-md-6">
                                            <?php echo form_label('LinkedIn', 'linkedin_supermarket', ['class' => 'col-form-label']);?>
                                            <?php echo form_input([
                                                'name' => 'socials[supermarket][linkedin]',
                                                'id'   => 'linkedin_supermarket',
                                                'type' => 'text',
                                            ], 
                                            isset($socials) &&  
                                            isset($socials->supermarket) &&
                                            isset($socials->supermarket->linkedin) ?
                                            $socials->supermarket->linkedin : ''
                                            , ['class' => 'form-control']);?>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <?php echo form_label('E-mails para recebimento de contatos<br/><small>Insira quantos e-mails forem necessários separados por vírgula.</small>', 'contact_emails', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10 d-flex flex-column justify-content-center">
                                    <?php echo form_input([
                                            'name' => 'contact_emails',
                                            'id'   => 'contact_emails',
                                            'type' => 'text'
                                        ], $general->contact_emails ? $general->contact_emails : '', ['class' => 'form-control']);?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <?php echo form_label('Assunto nos e-mails de contatos', 'contacts_subject', ['class' => 'col-sm-2 col-form-label']);?>
                                <div class="col-sm-10">
                                    <?php echo form_input([
                                            'name' => 'contacts_subject',
                                            'id'   => 'contacts_subject',
                                            'type' => 'text'
                                        ], $general->contacts_subject ? $general->contacts_subject : '', ['class' => 'form-control']);?>
                                </div>
                            </div>
                        <div class="row mb-3">
                            <?php echo form_label('Texto legal do rodapé', 'footer_legal_text', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_textarea([
                                            'name' => 'footer_legal_text',
                                            'id'   => 'footer_legal_text',
                                        ], $general->footer_legal_text ? $general->footer_legal_text : '', ['class' => 'form-control', 'style' => 'height: 100px']);?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('HTML Head (Entre as tags <head></head>)', 'head_html', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_textarea([
                                            'name' => 'head_html',
                                            'id'   => 'head_html',
                                        ], $general->head_html ? $general->head_html : '', ['class' => 'form-control', 'style' => 'height: 100px']);?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('HTML Body (Após a abertura da tag <body>)', 'body_html', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_textarea([
                                            'name' => 'body_html',
                                            'id'   => 'body_html',
                                        ], $general->body_html ? $general->body_html : '', ['class' => 'form-control', 'style' => 'height: 100px']);?>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <?php echo form_label('HTML Rodapé (Antes do fechamento da tag </body>)', 'footer_html', ['class' => 'col-sm-2 col-form-label']);?>
                            <div class="col-sm-10">
                                <?php echo form_textarea([
                                            'name' => 'footer_html',
                                            'id'   => 'footer_html',
                                        ], $general->footer_html ? $general->footer_html : '', ['class' => 'form-control', 'style' => 'height: 100px']);?>

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