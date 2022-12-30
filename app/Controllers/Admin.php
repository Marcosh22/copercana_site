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
            return redirect()->to('/admin/banners');
        }
    }
}
