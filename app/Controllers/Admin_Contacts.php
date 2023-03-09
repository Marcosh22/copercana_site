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
}
