<?php

namespace App\Controllers;

class Landing_Pages extends BaseController
{

    private $general;

    public function __construct()
    {
        $generalModel = model('App\Models\GeneralModel', false);
        $this->general = $generalModel->get_by_id(1);

        $this->save_access();
    }
    public function metamorfose()
    {
        echo view('landing-pages/metamorfose');
    }

    private function save_access()
    {
        $session = \Config\Services::session();
        $uri = current_url(true);

        helper('cookie');
        $cookie = get_cookie('subdata');

        $subscribe_id = null;
        $session_id = session_id();
        $page = (string) $uri;

        if (isset ($cookie) && !empty ($cookie)) {
            list($encrypted_data, $iv) = explode('::', $cookie, 2);
            $subdata = openssl_decrypt($encrypted_data, 'aes-256-cbc', 'hpvao0xA3bs07H2YBbxdcVbxi4HCk8BS', 0, $iv);
            $subdata = json_decode(base64_decode($subdata));
            $subscribe_id = $subdata->subscribe_id;
        }

        $accessModel = model('App\Models\AccessModel', false);
        $accessModel->add($subscribe_id, $session_id, $page);

        if ($subscribe_id)
            $accessModel->update_subscribe_id_by_session_id($session_id, $subscribe_id);
    }
}
