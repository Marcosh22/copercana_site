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
        if (!$this->ionAuth->loggedIn())
		{
			return redirect()->to('/auth/login');
		}

        $session = \Config\Services::session();

        $data = array(
            'page' => 'contacts',
            'session' => $session,
            'logged_user' => $this->ionAuth->user()
        );
        
        echo view('admin/includes/header', $data);
        echo view('admin/contacts/index', $data);
        echo view('admin/includes/footer', $data);
    }

    public function see_more($contact_id)
    {
        helper(['form']);

        if (!$this->ionAuth->loggedIn())
		{
			return redirect()->to('/auth/login');
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
        
        echo view('admin/includes/header', $data);
        echo view('admin/contacts/see_more', $data);
        echo view('admin/includes/footer', $data);
    }

    public function delete($contact_id) {
        if (!$this->ionAuth->loggedIn())
		{
			return redirect()->to('/auth/login');
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
}
