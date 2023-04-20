<?php

namespace App\Controllers;

class Admin_Contacts extends BaseController
{
    public function __construct()
	{
		$this->ionAuth = new \IonAuth\Libraries\IonAuth();
	}

    public function index()
    {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();

        $data = array(
            'page' => 'contacts',
            'session' => $session,
            'logged_user' => $this->ionAuth->user(),
            'ion_auth' => $this->ionAuth
        );
        
        echo view('admin/includes/header', $data);
        echo view('admin/contacts/index', $data);
        echo view('admin/includes/footer', $data);
    }

    public function see_more($contact_id)
    {
        helper(['form']);

        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();

        $contactModel = model('App\Models\ContactModel', false);
        $contact = $contactModel->get_by_id($contact_id);

        if(!isset($contact) || empty($contact) || !$contact) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data['page'] = 'contacts-see_more';
        $data['session'] = $session;
        $data['contact'] = $contact;
        $data['logged_user'] = $this->ionAuth->user();
        $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/contacts/see_more', $data);
        echo view('admin/includes/footer', $data);
    }

    public function delete($contact_id) {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();

        $contactModel = model('App\Models\ContactModel', false);
        $contact = $contactModel->get_by_id($contact_id);

        if(!isset($contact) || empty($contact) || !$contact) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $contactModel->delete_contact($contact_id);

        $response = array(
            'message' => "Contato excluído com sucesso!",
            'success' => true
        );

        $session->setFlashdata('response', $response);

        return redirect()->to('/admin/contacts');
    }

    public function bulk_delete() {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $request = \Config\Services::request();

        $contact_ids = $request->getPost('contact_ids');
        $contact_ids = explode(',', $contact_ids);

        $session = \Config\Services::session();

        $contactModel = model('App\Models\ContactModel', false);
        $contactModel->bulk_delete_contact($contact_ids);

        $response = array(
            'message' => "contato(s) excluído(s) com sucesso!",
            'success' => true
        );

        $session->setFlashdata('response', $response);

        return redirect()->to('/admin/contacts');
    }

    public function see_more_cooperated($contact_id)
    {
        helper(['form']);

        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();

        $contactModel = model('App\Models\ContactModel', false);
        $contact = $contactModel->get_cooperated_by_id($contact_id);

        if(!isset($contact) || empty($contact) || !$contact) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data['page'] = 'contacts-see_more';
        $data['session'] = $session;
        $data['contact'] = $contact;
        $data['logged_user'] = $this->ionAuth->user();
        $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/contacts/see_more_cooperated', $data);
        echo view('admin/includes/footer', $data);
    }

    public function update_cooperated($contact_id) {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $request = \Config\Services::request();

        $contactModel = model('App\Models\ContactModel', false);
        $contact = $contactModel->get_cooperated_by_id($contact_id);

        if(!isset($contact) || empty($contact) || !$contact) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $validationRule = [
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
            ]
        ];

        if (!$this->validate($validationRule)) {
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
            
            $date = date('Ymd');
            
            $contactModel->updateCooperated($contact_id, $name, $registration, $cpf_cnpj, $city, $email, $cellphone, $telephone);
            $message = "Contato atualizado com sucesso!";
            $success = true;
        } 

        $response = array(
            'message' => $message,
            'success' => $success
        );

        $session->setFlashdata('response', $response);
        return redirect()->to('/admin/contacts/see_more_cooperated/'.$contact_id);
    }

    public function delete_cooperated($contact_id) {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();

        $contactModel = model('App\Models\ContactModel', false);
        $contact = $contactModel->get_cooperated_by_id($contact_id);

        if(!isset($contact) || empty($contact) || !$contact) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $contactModel->delete_cooperated($contact_id);

        $response = array(
            'message' => "Contato excluído com sucesso!",
            'success' => true
        );

        $session->setFlashdata('response', $response);

        return redirect()->to('/admin/contacts?tab=cooperated');
    }

    public function bulk_delete_cooperated() {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $request = \Config\Services::request();

        $contact_ids = $request->getPost('contact_ids');
        $contact_ids = explode(',', $contact_ids);

        $session = \Config\Services::session();

        $contactModel = model('App\Models\ContactModel', false);
        $contactModel->bulk_delete_cooperated($contact_ids);

        $response = array(
            'message' => "contato(s) excluído(s) com sucesso!",
            'success' => true
        );

        $session->setFlashdata('response', $response);

        return redirect()->to('/admin/contacts?tab=cooperated');
    }
}
