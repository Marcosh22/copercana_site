<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Api_Pictures extends ResourceController
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
            'pictures_order' => [
                'rules' => 'required', 
                'errors' => [
                    'required' => 'O campo \'Ordem das Imagens\' é obrigatório.',
                ]
            ]
        ];

        if (!$this->validate($contact_rules)) {
           $message = $this->validator->listErrors();
           $success = false;
        } else {
            $pictures_order = $request->getPost('pictures_order');
            $pictures_order = explode("|", $pictures_order);

            $galleryModel = model('App\Models\GalleryModel', false);

            foreach($pictures_order as $show_order => $picture_id) {
                $galleryModel->update_picture_order((int)$picture_id, ((int)$show_order + 1));
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

}
