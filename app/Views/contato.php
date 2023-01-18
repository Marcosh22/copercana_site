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
                <div class="col-12 d-md-flex">
                    <?php if(isset($general->phone) && !empty($general->phone)) { ?>
                    <div class="mr-md-5">
                        <p style="font-weight: 700; color: #000; font-size: 1.2em;">
                            <strong style="font-weight: 900; color: #005422;">Contato matriz:</strong><br/>
                            <?= $general->phone ?>
                        </p>
                    </div>
                    <?php } ?>
                    <?php if(isset($general->address) && !empty($general->address)) { ?>
                    <div class="ml-md-5">
                        <p style="font-weight: 700; color: #000; font-size: 1.2em;">
                            <strong style="font-weight: 900; color: #005422;">Localização:</strong><br/>
                            <?= $general->address; ?>
                        </p>
                    </div>
                    <?php } ?>
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

                                    if(isset($response['email_debug']) && !empty($response['email_debug'])) {
                                        $email_debug = $response['email_debug'];
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
                            <div class="col-12 email-debug d-none">
                                <pre>
                                    <?php print_r($email_debug); ?>
                                </pre>
                            </div>
                    <div class="col-12">
                        <form action="<?= base_url("registration/contact") ?>" method="POST">
                            <div class="row">
                                <div class="col-12">
                                    <input class="c-input" type="text" name="name" id="name" placeholder="Nome Completo"
                                        value="<?= $form_data && $form_data['name'] ? $form_data['name'] : '' ?>">
                                </div>
                                <div class="col-12">
                                    <input class="c-input" type="email" name="email" id="email" placeholder="E-mail"
                                        value="<?= $form_data && $form_data['email'] ? $form_data['email'] : '' ?>">
                                </div>
                                <div class="col-md-6">
                                    <input class="c-input mask-cellphone" type="text" name="cellphone" id="cellphone"
                                        placeholder="Celular"
                                        value="<?= $form_data && $form_data['cellphone'] ? $form_data['cellphone'] : '' ?>">
                                </div>
                                <div class="col-md-6">
                                    <input class="c-input" type="text" name="city" id="city" placeholder="Cidade/Estado"
                                        value="<?= $form_data && $form_data['city'] ? $form_data['city'] : '' ?>">
                                </div>
                                <div class="col-12">
                                    <input class="c-input" type="text" name="subject" id="subject" placeholder="Assunto"
                                        value="<?= $form_data && $form_data['subject'] ? $form_data['subject'] : '' ?>">
                                </div>
                                <div class="col-12">
                                    <textarea class="c-textarea" name="message" id="message" placeholder="Mensagem"
                                        rows="8"><?= $form_data && $form_data['message'] ? $form_data['message'] : '' ?></textarea>
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
                                            <small class="text-justify" style="line-height: 1.1em">Autorizo o uso de
                                                meus dados com a finalidade de identificar-me e receber retornos através
                                                dos meios informados. Este site respeita a Lei Geral de Proteção de
                                                Dados, por isso leia nossa <a
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
                    </div>
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