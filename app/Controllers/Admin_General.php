<?php

namespace App\Controllers;

class Admin_General extends BaseController
{
    private $ionAuth;
    
    public function __construct()
	{
		$this->ionAuth = new \IonAuth\Libraries\IonAuth();
	}

    public function index()
    {
        helper(['form']);

        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $generalModel = model('App\Models\GeneralModel', false);
        $general = $generalModel->get_by_id(1);

        if(!isset($general) || empty($general) || !$general) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data['page'] = 'general-edit';
        $data['session'] = $session;
        $data['general'] = $general;
        $data['logged_user'] = $this->ionAuth->user();
        $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/general/index', $data);
        echo view('admin/includes/footer', $data);
    }

    public function update_general($id) {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $request = \Config\Services::request();

        $generalModel = model('App\Models\GeneralModel', false);
        $general = $generalModel->get_by_id($id);

        if(!isset($general) || empty($general) || !$general) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $address = $request->getPost('address');
        $address_link = $request->getPost('address_link');
        $address_iframe = $request->getPost('address_iframe');
        $phone = $request->getPost('phone');
        $radio = $request->getPost('radio');
        $facebook = $request->getPost('facebook');
        $instagram = $request->getPost('instagram');
        $youtube = $request->getPost('youtube');
        $linkedin = $request->getPost('linkedin');
        $socials = $request->getPost('socials');
        if(isset($socials) && !empty($socials)) $socials = json_encode($socials);
        $contact_emails = $request->getPost('contact_emails');
        $contacts_subject = $request->getPost('contacts_subject');
        $footer_legal_text = $request->getPost('footer_legal_text');
        $head_html = $request->getPost('head_html');
        $body_html = $request->getPost('body_html');
        $footer_html = $request->getPost('footer_html');
        
        $generalModel->update_general($id, $address, $address_link, $address_iframe, $phone, $radio, $facebook, $instagram, $youtube, $linkedin, $socials, $contact_emails, $contacts_subject, $footer_legal_text, $head_html, $body_html, $footer_html);
        $message = "Dados atualizados com sucesso!";
        $success = true;

        $response = array(
            'message' => $message,
            'success' => $success
        );

        $session->setFlashdata('response', $response);
        return redirect()->to('/admin/general');
    }

}
