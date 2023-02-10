<?php

namespace App\Controllers;
use CodeIgniter\I18n\Time;

class Registration extends BaseController
{
    public function index()
    {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    public function contact() {
        $recaptch_secret_key = "6Ld6qU0hAAAAAIfaHO-DEDxMUv3dk_KuQAqQs2lD";

        helper(['form']);

        $session = \Config\Services::session();
        $request = \Config\Services::request();

        $captcha = $request->getPost("g-recaptcha-response");

        $ip = $_SERVER['REMOTE_ADDR'];
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($recaptch_secret_key) .  '&response=' . urlencode($captcha);
        $response = file_get_contents($url);
        $g_response = json_decode($response,true);

        if ($g_response['success'] === true) {
            $contact_rules  = [
                'name' => [
                    'rules' => 'required', 
                    'errors' => [
                        'required' => 'O campo \'Nome Completo\' é obrigatório',
                    ]
                ],
                'email' => [
                    'rules' => 'required|valid_email', 
                    'errors' => [
                        'required' => 'O campo \'E-mail\' é obrigatório',
                        'valid_email' => 'O e-mail informado é inválido.'
                    ]
                ],
                'cellphone' => [
                    'rules' => 'required', 
                    'errors' => [
                        'required' => 'O campo \'Celular\' é obrigatório',
                    ]
                ],
                'city' => [
                    'rules' => 'required', 
                    'errors' => [
                        'required' => 'O campo \'Cidade/Estado\' é obrigatório',
                    ]
                ],
                'subject' => [
                    'rules' => 'required', 
                    'errors' => [
                        'required' => 'O campo \'Assunto\' é obrigatório',
                    ]
                ],
                'message' => [
                    'rules' => 'required', 
                    'errors' => [
                        'required' => 'O campo \'Mensagem\' é obrigatório',
                    ]
                ],
                'lgpd_opt_in' => [
                    'rules' => 'required|integer', 
                    'errors' => [
                        'required' => 'Aceite nossa política de privacidade para continuar',
                        'integer' => 'Aceite nossa política de privacidade para continuar'
                    ]
                ],
            ];

            if (!$this->validate($contact_rules)) {
            $message = $this->validator->listErrors();
            $success = false;

            } else {

                $name = $request->getPost('name');
                $email = $request->getPost('email');
                $cellphone = $request->getPost('cellphone');
                $city = $request->getPost('city');
                $subject = $request->getPost('subject');
                $message = $request->getPost('message');
                $lgpd_opt_in = $request->getPost('lgpd_opt_in');
                $lgpd_opt_in = $lgpd_opt_in ? $lgpd_opt_in : 0;

                try {
                    $contactModel = model('App\Models\ContactModel', false);
                    $response = $contactModel->add($name, $email, $cellphone, $city, $subject, $message, $lgpd_opt_in);

                    $generalModel = model('App\Models\GeneralModel', false);
                    $general = $generalModel->get_by_id(1);

                    if(isset($general) && isset($general->contact_emails) && !empty($general->contact_emails)) {
                        $email_srvc = \Config\Services::email();

                        $email_srvc->setFrom('site@copercana.com.br', 'Copercana');
                        $email_srvc->setTo($general->contact_emails);

                        $email_srvc->setSubject($general->contacts_subject);

                        $email_body = "Nome: $name\n";
                        $email_body .= "E-mail: $email\n";
                        $email_body .= "Celular: $cellphone\n";
                        $email_body .= "Cidade: $city\n";
                        $email_body .= "Assunto: $subject\n";
                        $email_body .= "Mensagem: $message\n";

                        $email_srvc->setMessage($email_body);

                        $email_srvc->send();
                    }

                    if($response) {
                        $message = "Retornaremos seu contato em breve.";
                        $success = true;
                    } else {
                        $message = "Tente novamente mais tarde.";
                        $success = false;
                    }
                    
                } catch (\Exception $e) {
                    $message = $e->getMessage();
                    $success = false;
                }
            }
        } else {
            $message = "Marque a opção 'Não sou um robô' para continuar.";
            $success = false;
        }
        
        $form_data = array();

        if(!$success) {
            $form_data = array(
                'name' => $request->getPost('name'),
                'email' => $request->getPost('email'),
                'cellphone' => $request->getPost('cellphone'),
                'city' => $request->getPost('city'),
                'subject' => $request->getPost('subject'),
                'message' => $request->getPost('message'),
                'lgpd_opt_in' => $request->getPost('lgpd_opt_in')
            );
        }

        $response = array(
            'message' => $message,
            'success' => $success,
            'form_data' => $form_data
        );

        $session->setFlashdata('response', $response);
        return redirect()->to('/contato');
    }

    public function cooperate() {
        $recaptch_secret_key = "6Ld6qU0hAAAAAIfaHO-DEDxMUv3dk_KuQAqQs2lD";

        helper(['form']);

        $session = \Config\Services::session();
        $request = \Config\Services::request();

        $captcha = $request->getPost("g-recaptcha-response");

        $ip = $_SERVER['REMOTE_ADDR'];
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($recaptch_secret_key) .  '&response=' . urlencode($captcha);
        $response = file_get_contents($url);
        $g_response = json_decode($response,true);

        if ($g_response['success'] === true) {
            $contact_rules  = [
                'name' => [
                    'rules' => 'required', 
                    'errors' => [
                        'required' => 'O campo \'Nome Completo\' é obrigatório',
                    ]
                ],
                'registration' => [
                    'rules' => 'required', 
                    'errors' => [
                        'required' => 'O campo \'Matrícula do cooperado\' é obrigatório',
                    ]
                ],
                'cpf_cnpj' => [
                    'rules' => 'required', 
                    'errors' => [
                        'required' => 'O campo \'CPF/CNPJ\' é obrigatório',
                    ]
                ],
                'city' => [
                    'rules' => 'required', 
                    'errors' => [
                        'required' => 'O campo \'Cidade/Estado\' é obrigatório',
                    ]
                ],
                'email' => [
                    'rules' => 'required|valid_email', 
                    'errors' => [
                        'required' => 'O campo \'E-mail\' é obrigatório',
                        'valid_email' => 'O e-mail informado é inválido.'
                    ]
                ],
                'cellphone' => [
                    'rules' => 'required', 
                    'errors' => [
                        'required' => 'O campo \'Celular/Whatsapp\' é obrigatório',
                    ]
                ],
                'lgpd_opt_in' => [
                    'rules' => 'required|integer', 
                    'errors' => [
                        'required' => 'Aceite nossa política de privacidade para continuar',
                        'integer' => 'Aceite nossa política de privacidade para continuar'
                    ]
                ],
            ];

            if (!$this->validate($contact_rules)) {
            $message = $this->validator->listErrors();
            $success = false;

            } else {

                $name = $request->getPost('name');
                $registration = $request->getPost('registration');
                $cpf_cnpj = $request->getPost('cpf_cnpj');
                $city = $request->getPost('city');
                $email = $request->getPost('email');
                $cellphone = $request->getPost('cellphone');
                $telephone = $request->getPost('telephone');
                $lgpd_opt_in = $request->getPost('lgpd_opt_in');
                $lgpd_opt_in = $lgpd_opt_in ? $lgpd_opt_in : 0;

                try {
                    $contactModel = model('App\Models\ContactModel', false);
                    $response = $contactModel->addCooperated($name, $registration, $cpf_cnpj, $city, $email, $cellphone, $telephone, $lgpd_opt_in);

                    $generalModel = model('App\Models\GeneralModel', false);
                    $general = $generalModel->get_by_id(1);

                    if(isset($general) && isset($general->contact_emails) && !empty($general->contact_emails)) {
                        $email_srvc = \Config\Services::email();

                        $email_srvc->setFrom('site@copercana.com.br', 'Copercana');
                        $email_srvc->setTo($general->contact_emails);

                        $email_srvc->setSubject($general->contacts_subject);

                        $email_body = "Nome: $name\n";
                        $email_body .= "Código Cooperado: $registration\n";
                        $email_body .= "CPF/CNPJ: $cpf_cnpj\n";
                        $email_body .= "Cidade/Estado: $city\n";
                        $email_body .= "E-mail: $email\n";
                        $email_body .= "Celular/Whatsapp: $cellphone\n";
                        $email_body .= "Telefone: $telephone\n";

                        $email_srvc->setMessage($email_body);

                        $email_srvc->send();
                    }

                    if($response) {
                        $message = "Retornaremos seu contato em breve.";
                        $success = true;
                    } else {
                        $message = "Tente novamente mais tarde.";
                        $success = false;
                    }
                    
                } catch (\Exception $e) {
                    $message = $e->getMessage();
                    $success = false;
                }
            }
        } else {
            $message = "Marque a opção 'Não sou um robô' para continuar.";
            $success = false;
        }
        
        $form_data = array();

        if(!$success) {

            $form_data = array(
                'name' => $request->getPost('name'),
                'registration' => $request->getPost('registration'),
                'cpf_cnpj' => $request->getPost('cpf_cnpj'),
                'city' => $request->getPost('city'),
                'email' => $request->getPost('email'),
                'cellphone' => $request->getPost('cellphone'),
                'telephone' => $request->getPost('telephone'),
                'lgpd_opt_in' => $request->getPost('lgpd_opt_in')
            );
        }

        $response = array(
            'message' => $message,
            'success' => $success,
            'form_data' => $form_data
        );

        $session->setFlashdata('response', $response);
        return redirect()->to('/soucooperado#contact-form');
    }

    public function subscribe() {
        helper(['form']);

        $session = \Config\Services::session();
        $request = \Config\Services::request();

        $contact_rules  = [
            'person_type' => [
                'rules' => 'required', 
                'errors' => [
                    'required' => 'O campo \'Tipo de pessoa\' é obrigatório',
                ]
            ],
            'name' => [
                'rules' => 'required', 
                'errors' => [
                    'required' => 'O campo \'Nome Completo\' é obrigatório',
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email', 
                'errors' => [
                    'required' => 'O campo \'E-mail\' é obrigatório',
                    'valid_email' => 'O e-mail informado é inválido.'
                ]
            ],
            'company' => [
                'rules' => 'required', 
                'errors' => [
                    'required' => 'O campo \'Empresa\' é obrigatório',
                ]
            ],
            'ocupation' => [
                'rules' => 'required', 
                'errors' => [
                    'required' => 'O campo \'Cargo\' é obrigatório',
                ]
            ],
            'cpf_cnpj' => [
                'rules' => 'required', 
                'errors' => [
                    'required' => 'O campo \'CPF/CNPJ\' é obrigatório',
                ]
            ],
            'cellphone' => [
                'rules' => 'required', 
                'errors' => [
                    'required' => 'O campo \'Celular\' é obrigatório',
                ]
            ],
            'city' => [
                'rules' => 'required', 
                'errors' => [
                    'required' => 'O campo \'Cidade/Estado\' é obrigatório',
                ]
            ],
            'lgpd_opt_in' => [
                'rules' => 'required|integer', 
                'errors' => [
                    'required' => 'Aceite nossa política de privacidade para continuar',
                    'integer' => 'Aceite nossa política de privacidade para continuar'
                ]
            ],
        ];

        if (!$this->validate($contact_rules)) {
           $message = $this->validator->listErrors();
           $success = false;

        } else {

            $name = $request->getPost('name');
            $email = $request->getPost('email');
            $cellphone = $request->getPost('cellphone');
            $city = $request->getPost('city');
            $company = $request->getPost('company');
            $ocupation = $request->getPost('ocupation');
            $person_type = $request->getPost('person_type');
            $cpf_cnpj = $request->getPost('cpf_cnpj');
            $lgpd_opt_in = $request->getPost('lgpd_opt_in');
            $lgpd_opt_in = $lgpd_opt_in ? $lgpd_opt_in : 0;

            try {
                $subscribeModel = model('App\Models\SubscribeModel', false);
                $subscribe = $subscribeModel->get_by_cpf_cnpj($cpf_cnpj);

                if(!isset($subscribe) || empty($subscribe) || !$subscribe) {
                    $response = $subscribeModel->add($name, $email, $cellphone, $city, $company, $ocupation, $person_type, $cpf_cnpj, $lgpd_opt_in);
                } else {
                    $response = $subscribe->id;
                }

                if($response) {
                    helper('cookie');
                    $message = "Agora você pode acessar o site!";
                    $success = true;

                    $today = new Time('now');

                    $cookie = array(
                        'subscribe_id' => $response,
                        'subscribe_time' => $today->toDateTimeString(),
                        'session_id' => session_id()
                    );

                    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
                    $encrypted = openssl_encrypt(base64_encode(json_encode($cookie)), 'aes-256-cbc', 'hpvao0xA3bs07H2YBbxdcVbxi4HCk8BS', 0, $iv);

                    $session->setFlashdata('cookie', $encrypted . '::' . $iv);
                    $session->keepFlashdata('income_url');

                } else {
                    $message = "Tente novamente mais tarde.";
                    $success = false;
                }
                
            } catch (\Exception $e) {
                $message = $e->getMessage();
                $success = false;
            }
        }

        $form_data = array();

        if(!$success) {
            $form_data = array(
                'name' => $request->getPost('name'),
                'email' => $request->getPost('email'),
                'cellphone' => $request->getPost('cellphone'),
                'city' => $request->getPost('city'),
                'company' => $request->getPost('company'),
                'ocupation' => $request->getPost('ocupation'),
                'person_type' => $request->getPost('person_type'),
                'cpf_cnpj' => $request->getPost('cpf_cnpj'),
                'lgpd_opt_in' => $request->getPost('lgpd_opt_in')
            );
        }

        $response = array(
            'message' => $message,
            'success' => $success,
            'form_data' => $form_data
        );

        $session->setFlashdata('response', $response);
        return redirect()->to('/cadastro');
    }
}
