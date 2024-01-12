<?php

namespace App\Controllers;

class Admin_Offers extends BaseController
{
    private $ionAuth;
    
    public function __construct()
	{
		$this->ionAuth = new \IonAuth\Libraries\IonAuth();
	}

    public function index()
    {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin() && !$this->ionAuth->inGroup(3)) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();

        $data['page'] = 'offers';
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/offers/index', $data);
        echo view('admin/includes/footer', $data);
    }

    public function add_new()
    {
        helper(['form']);

        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin() && !$this->ionAuth->inGroup(3)) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $offerModel = model('App\Models\OfferModel', false);

        $data['page'] = 'offers-add_new';
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        
        echo view('admin/includes/header', $data);
        echo view('admin/offers/add_new', $data);
        echo view('admin/includes/footer', $data);
    }

    public function edit($offer_id)
    {
        helper(['form']);

        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin() && !$this->ionAuth->inGroup(3)) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $offerModel = model('App\Models\OfferModel', false);
        $offer = $offerModel->get_by_id($offer_id);

        if(!isset($offer) || empty($offer) || !$offer) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data['page'] = 'offers-edit';
        $data['session'] = $session;
        $data['offer'] = $offer;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/offers/edit', $data);
        echo view('admin/includes/footer', $data);
    }

    public function add_offer() {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin() && !$this->ionAuth->inGroup(3)) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $request = \Config\Services::request();

        $offerModel = model('App\Models\OfferModel', false);
        $offer_id = false;

        $validationRule = [
            'file' => [
                'label' => 'PDF do jornal de ofertas',
                'rules' => 'uploaded[file]'
                    . '|mime_in[file,application/pdf,application/force-download,application/x-download,application/unknown]'
                    . '|max_size[file, 12288]',
            ],
            'title' => [
                'label' => 'Título',
                'rules' => 'required',
            ]
        ];

        if (!$this->validate($validationRule)) {
            $message = $this->validator->listErrors();
            $success = false;
        } else {
            $file = $this->request->getFile('file');
            $title = $request->getPost('title');
            $starts_at = $request->getPost('starts_at');
            $ends_at = $request->getPost('ends_at');
            $status = $request->getPost('status');
            $status = $status ? $status : 0;
            
            if($file->isValid() && !$file->hasMoved()) {
                
                $random_name = $file->getRandomName();

                $date = date('Ymd');
    
                if (!is_dir(PUBLIC_PATH."/uploads/offers/$date")) {
                    mkdir(PUBLIC_PATH."/uploads/offers/$date", 0777, TRUE);
                }

                $file_path = "uploads/offers/$date/$random_name";
                $cover_path = str_replace(".pdf", ".jpg", $file_path);
                $file->move("uploads/offers/$date", $random_name);

                $w = 200;
                $h = 270;

                $im = new \Imagick();
                $im->setResolution(144, 144);     //set the resolution of the resulting jpg
                $im->readImage($file_path.'[0]');    //[0] for the first page
                $im->scaleImage($w, 0);
                $im->cropImage($w, $h, 0, 0);
                $im->setImageFormat('jpg');
                $im->setInterlaceScheme(\Imagick::INTERLACE_PLANE);
                $im->writeImage($cover_path);

                try {
                    $offer_id = $offerModel->add($file_path, $cover_path, $title, $starts_at, $ends_at, $status);
                    
                    if($offer_id) {
                        $message = "Jornal de Oferta Cadastrado com sucesso.";
                        $success = true;
                    } else {
                        $message = "Tente novamente mais tarde.";
                        $success = false;
                    }
                    
                } catch (\Exception $e) {
                    $message = $e->getMessage();
                    $success = false;
                }
            } else {
                $message = "Erro ao efetuar upload. Tente novamente.";
                $success = false;
            }
        } 

        $form_data = array(
            'title' => $request->getPost('title'),
            'starts_at' => $request->getPost('starts_at'),
            'ends_at' => $request->getPost('ends_at'),
            'status' => $request->getPost('status')
        );

        $response = array(
            'message' => $message,
            'success' => $success,
            'form_data' => $form_data
        );

        $session->setFlashdata('response', $response);

        if($success && $offer_id) {
            return redirect()->to('/admin/offers/edit/'.$offer_id);
        } else {
            return redirect()->to('/admin/offers/add_new');
        }
    }

    public function update_offer($offer_id) {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin() && !$this->ionAuth->inGroup(3)) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $request = \Config\Services::request();

        $offerModel = model('App\Models\OfferModel', false);
        $offer = $offerModel->get_by_id($offer_id);

        if(!isset($offer) || empty($offer) || !$offer) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $validationRule = [
            'file' => [
                'label' => 'PDF do jornal de ofertas',
                'rules' => 'if_exist|uploaded[file]'
                    . '|mime_in[file,application/pdf,application/force-download,application/x-download,application/unknown]'
                    . '|max_size[file, 12288]',
            ],
            'title' => [
                'label' => 'Título',
                'rules' => 'required',
            ]
        ];

        if (!$this->validate($validationRule)) {
            $message = $this->validator->listErrors();
            $success = false;
        } else {

            $file = $this->request->getFile('file');
            $title = $request->getPost('title');
            $starts_at = $request->getPost('starts_at');
            $ends_at = $request->getPost('ends_at');
            $status = $request->getPost('status');
            $status = $status ? $status : 0;

            if(isset($file) && !empty($file) && $file->isValid() && !$file->hasMoved()) {
                $date = date('Ymd');
                $random_name = $file->getRandomName();
                $file_path = "uploads/offers/$date/$random_name";
                $cover_path = str_replace(".pdf", ".jpg", $file_path);

                if (!is_dir(PUBLIC_PATH."/uploads/offers/$date")) {
                    mkdir(PUBLIC_PATH."/uploads/offers/$date", 0777, TRUE);
                }

                $file->move("uploads/offers/$date", $random_name);

                $w = 200;
                $h = 270;

                $im = new \Imagick();
                $im->setResolution(144, 144);     //set the resolution of the resulting jpg
                $im->readImage($file_path.'[0]');    //[0] for the first page
                $im->scaleImage($w, 0);
                $im->cropImage($w, $h, 0, 0);
                $im->setImageFormat('jpg');
                $im->setInterlaceScheme(\Imagick::INTERLACE_PLANE);
                $im->writeImage($cover_path);

            } else {
                $file_path = $offer->file;
                $cover_path = $offer->cover;
            }

            $offerModel->update_offer($offer_id, $file_path, $cover_path, $title, $starts_at, $ends_at, $status);
            $message = "Jornal de Oferta atualizado com sucesso!";
            $success = true;
        } 

        $response = array(
            'message' => $message,
            'success' => $success
        );

        $session->setFlashdata('response', $response);
        return redirect()->to('/admin/offers/edit/'.$offer_id);
    }
    
    public function delete($offer_id) {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin() && !$this->ionAuth->inGroup(3)) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();

        $offerModel = model('App\Models\OfferModel', false);
        $offer = $offerModel->get_by_id($offer_id);

        if(!isset($offer) || empty($offer) || !$offer) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $offerModel->delete_offer($offer_id);

        $response = array(
            'message' => "Jornal de Oferta excluído com sucesso!",
            'success' => true
        );

        $session->setFlashdata('response', $response);

        return redirect()->to('/admin/offers');
    }

    public function remove_file($offer_id) {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin() && !$this->ionAuth->inGroup(3)) {
            return redirect()->to('/admin');
        }

        $offerModel = model('App\Models\OfferModel', false);
        $offer = $offerModel->get_by_id($offer_id);

        if(!isset($offer) || empty($offer) || !$offer) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $offerModel->remove_file($offer_id);

        return redirect()->to('/admin/offers/edit/'.$offer_id);
    }

}
