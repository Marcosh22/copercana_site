<main>
    <?php if(isset($page_data->intro_section_banner) && !empty($page_data->intro_section_banner)) { ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page_banner">
                    <picture>
                        <source media="(max-width: 768px)"
                            srcset="<?= base_url($page_data->intro_section_mobile_banner) ?>">
                        <source media="(min-width: 768px)" srcset="<?= base_url($page_data->intro_section_banner) ?>">
                        <img src="<?= base_url($page_data->intro_section_banner) ?>" alt="" class="img-fluid">
                    </picture>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <section class="page-section">
        <div class="container">
            <div class="row">
                <?php if(isset($page_data)) { ?>
                <div class="col-12">
                    <h2 class="with-underline mx-0" ><?= $page_data->page_title ?></h2>
                </div>
                <div class="col-12 mt-3">
                    <?= $page_data->page_description ?>
                </div>
                <?php } ?>
                <?php 
                                $response = $session->getFlashdata('response');
                                $form_data = null;

                                if(isset($response) && !empty($response)) { 
                                    if(isset($response['form_data']) && !empty($response['form_data'])) {
                                        $form_data = $response['form_data'];
                                    }
                                    ?>
                <div class="col-12">


                    <div class="alert alert-<?= $response['success'] ? 'success' : 'danger' ?> alert-dismissible fade show my-3"
                        role="alert">
                        <strong><?= $response['success'] ? 'Formulário enviado com sucesso!' : 'Erro ao enviar formulário:' ?></strong><br />
                        <?= $response['message'] ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <?php }
                            ?>
                <div class="col-12" style="margin: 50px 0;">
                <h4 style="font-weight: 900; color: #5b5b5f;">VOCÊ É UM COOPERADO DA COPERCANA?</h4>
                    <div class="c-radio-group">
                        <label for="is-cooperated-yes" class="c-radio-group__option">
                            <input type="radio" name="is-cooperated" id="is-cooperated-yes" value="1" <?= isset($form_data) && $form_data !== null ? 'checked' : '' ?>>
                            <label for="is-cooperated-yes">
                                <i><svg xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1"
                                        x="0px" y="0px" width="25px" height="25px" viewBox="0 0 533.973 533.973"
                                        style="enable-background:new 0 0 533.973 533.973;" xml:space="preserve">
                                        <g>
                                            <g>
                                                <path style="fill: #003605;"
                                                    d="M477.931,52.261c-12.821-12.821-33.605-12.821-46.427,0l-266.96,266.954l-62.075-62.069    c-12.821-12.821-33.604-12.821-46.426,0L9.616,303.572c-12.821,12.821-12.821,33.604,0,46.426l85.289,85.289l46.426,46.426    c12.821,12.821,33.611,12.821,46.426,0l46.426-46.426l290.173-290.174c12.821-12.821,12.821-33.605,0-46.426L477.931,52.261z" />
                                            </g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                    </svg></i>
                            </label>
                            Sim
                        </label>
                        <label for="is-cooperated-no" class="c-radio-group__option">
                            <input type="radio" name="is-cooperated" id="is-cooperated-no" value="0" >
                            <label for="is-cooperated-no">
                                <i><svg xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1"
                                        x="0px" y="0px" width="25px" height="25px" viewBox="0 0 533.973 533.973"
                                        style="enable-background:new 0 0 533.973 533.973;" xml:space="preserve">
                                        <g>
                                            <g>
                                                <path style="fill: #003605;"
                                                    d="M477.931,52.261c-12.821-12.821-33.605-12.821-46.427,0l-266.96,266.954l-62.075-62.069    c-12.821-12.821-33.604-12.821-46.426,0L9.616,303.572c-12.821,12.821-12.821,33.604,0,46.426l85.289,85.289l46.426,46.426    c12.821,12.821,33.611,12.821,46.426,0l46.426-46.426l290.173-290.174c12.821-12.821,12.821-33.605,0-46.426L477.931,52.261z" />
                                            </g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                    </svg></i>
                            </label>
                            Não
                        </label>
                    </div>
                </div>

               
                   <!--  <div class="col-12 <?= isset($form_data) && $form_data !== null ? '' : 'd-none' ?>" id="contact-form">
                        <form action="<?= base_url("registration/cooperate") ?>" method="POST">
                            <div class="row">
                                <div class="col-12">
                                    <input class="c-input" type="text" name="name" id="name" placeholder="Nome Completo"
                                        value="<?= $form_data && $form_data['name'] ? htmlentities($form_data['name']) : '' ?>" required>
                                </div>
                                <div class="col-12">
                                    <input class="c-input" type="text" name="registration" id="registration" placeholder="Código do cooperado"
                                        value="<?= $form_data && $form_data['registration'] ? htmlentities($form_data['registration']) : '' ?>" required>
                                </div>
                                
                                <div class="col-md-6">
                                    <input class="c-input mask-cpf_cnpj" type="text" name="cpf_cnpj" id="cpf_cnpj" placeholder="CPF/CNPJ"
                                        value="<?= $form_data && $form_data['cpf_cnpj'] ? htmlentities($form_data['cpf_cnpj']) : '' ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <input class="c-input " type="text" name="city" id="city" placeholder="Cidade/Estado"
                                        value="<?= $form_data && $form_data['city'] ? htmlentities($form_data['city']) : '' ?>" required>
                                </div>
                                <div class="col-12">
                                    <input class="c-input" type="email" name="email" id="email" placeholder="E-mail"
                                        value="<?= $form_data && $form_data['email'] ? htmlentities($form_data['email']) : '' ?>" required>
                                </div>
                                
                                <div class="col-12">
                                    <input class="c-input mask-cellphone" type="text" name="cellphone" id="cellphone"
                                        placeholder="Celular/Whatsapp"
                                        value="<?= $form_data && $form_data['cellphone'] ? htmlentities($form_data['cellphone']) : '' ?>" required min="16">
                                </div>
                                <div class="col-12">
                                    <input class="c-input mask-telephone" type="text" name="telephone" id="telephone"
                                        placeholder="Telefone"
                                        value="<?= $form_data && $form_data['telephone'] ? htmlentities($form_data['telephone']) : '' ?>" min="15">
                                </div>
                                <div class="col-12">
                                    <div class="c-checkbox-group">
                                        <label for="lgpd_opt_in" class="c-checkbox-group__option">
                                            <input type="checkbox" name="lgpd_opt_in" id="lgpd_opt_in" value="1"
                                                <?= $form_data && $form_data['lgpd_opt_in'] && $form_data['lgpd_opt_in'] == 1 ? 'checked' : '' ?>>
                                            <label for="lgpd_opt_in">
                                                <i><svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                                                        id="Capa_1" x="0px" y="0px" width="25px" height="25px"
                                                        viewBox="0 0 533.973 533.973"
                                                        style="enable-background:new 0 0 533.973 533.973;"
                                                        xml:space="preserve">
                                                        <g>
                                                            <g>
                                                                <path style="fill: #003605;"
                                                                    d="M477.931,52.261c-12.821-12.821-33.605-12.821-46.427,0l-266.96,266.954l-62.075-62.069    c-12.821-12.821-33.604-12.821-46.426,0L9.616,303.572c-12.821,12.821-12.821,33.604,0,46.426l85.289,85.289l46.426,46.426    c12.821,12.821,33.611,12.821,46.426,0l46.426-46.426l290.173-290.174c12.821-12.821,12.821-33.605,0-46.426L477.931,52.261z" />
                                                            </g>
                                                        </g>
                                                        <g>
                                                        </g>
                                                        <g>
                                                        </g>
                                                        <g>
                                                        </g>
                                                        <g>
                                                        </g>
                                                        <g>
                                                        </g>
                                                        <g>
                                                        </g>
                                                        <g>
                                                        </g>
                                                        <g>
                                                        </g>
                                                        <g>
                                                        </g>
                                                        <g>
                                                        </g>
                                                        <g>
                                                        </g>
                                                        <g>
                                                        </g>
                                                        <g>
                                                        </g>
                                                        <g>
                                                        </g>
                                                        <g>
                                                        </g>
                                                    </svg></i>
                                            </label>
                                            <small class="text-justify" style="line-height: 1.1em">Autorizo o uso de meus dados com a finalidade de identificar-me e receber retornos através dos meios informados. Este site respeita a Lei Geral de Proteção de Dados, por isso leia nossa <a
                                                    href="<?= base_url("institucional/politica-de-privacidade") ?>"
                                                    target="_blank"
                                                    style="color: inherit; text-decoration: none;">Política de
                                                    Privacidade.</a></small>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6 order-md-1 d-flex justify-content-md-end">
                                    <div class="g-recaptcha" data-sitekey="6Ld6qU0hAAAAAM_RIznOJv_I56u0Eo_fxa7elHrX">
                                    </div>
                                </div>
                                <div class="col-md-6 order-md-0">
                                    <button class="button button--sm button--block mt-4"
                                        type="submit"><span>ENVIAR</span></button>
                                </div>
                            </div>
                        </form>
                    </div> -->
                </div>
            </div>
    </script>
    </section>
    <?php if(isset($general->address_iframe) && !empty($general->address_iframe)) { ?>
        <div class="map-container">
            <div class="responsive-iframe">
            <?= $general->address_iframe ?>
            </div>
        </div>
    <?php } ?>
</main>

<div class="popup-overlayer d-none" id="message-popup">
    <div class="popup">
        <p>ESTE CADASTRO<br/>É EXCLUSIVO<br/>PARA COOPERADOS<br/>COPERCANA.<br/>AGRADECEMOS A<br/>COMPREENSÃO.</p>
    </div>
</div>

<div class="popup-overlayer" id="registration-finished" >
    <div class="popup">
        <p>CADASTROS<br/>ENCERRADOS.</p>
    </div>
</div>