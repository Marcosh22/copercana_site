<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Api_Banners extends ResourceController
{
    use ResponseTrait;
    

    public function index()
    {
        $response = array(
            'success' => true
        );

        return $this->respond($response);
    }

    public function save_order() {
        $session = \Config\Services::session();
        $request = \Config\Services::request();

        $contact_rules  = [
            'banners_order' => [
                'rules' => 'required', 
                'errors' => [
                    'required' => 'O campo \'Ordem dos Banners\' é obrigatório.',
                ]
            ]
        ];

        if (!$this->validate($contact_rules)) {
           $message = $this->validator->listErrors();
           $success = false;
        } else {
            $banners_order = $request->getPost('banners_order');
            $banners_order = explode("|", $banners_order);

            $bannerModel = model('App\Models\BannerModel', false);

            foreach($banners_order as $show_order => $banner_id) {
                $bannerModel->update_order((int)$banner_id, ((int)$show_order + 1));
            }

            $message = "Ordem de exibição atualizada com sucesso!";
            $success = true;
        }

        $response = array(
            'message' => $message,
            'success' => $success
        );

        return $this->respond($response);
    }

    public function increment_click($banner_id) {
        $bannerModel = model('App\Models\BannerModel', false);
        $bannerModel->increment_click((int)$banner_id);

        $message = "Qtd. cliques atualizado com sucesso!";
        $success = true;

        $response = array(
            'message' => $message,
            'success' => $success
        );

        return $this->respond($response);
    }
}
