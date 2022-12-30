<?php

namespace App\Controllers;

class Admin extends BaseController
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
		} else {

            if($this->ionAuth->isAdmin()) {
                return redirect()->to('/admin/banners');
            } else {
                if($this->ionAuth->inGroup(2)) {
                    return redirect()->to('/admin/blog');
                } else if ($this->ionAuth->inGroup(3)) {
                    return redirect()->to('/admin/offers');
                } else if ($this->ionAuth->inGroup(4)) {
                    return redirect()->to('/admin/jobs');
                } else {
                    return $this->response->setStatusCode(403)->setBody('403 Forbidden'); 
                }
            }
        }
    }
}
