<?php

namespace App\Controllers;

class Admin_Magazines extends BaseController
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

        $data['page'] = 'magazines';
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/magazines/index', $data);
        echo view('admin/includes/footer', $data);
    }

    public function add_new()
    {
        helper(['form']);

        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $magazineModel = model('App\Models\MagazineModel', false);

        $data['page'] = 'magazines-add_new';
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        
        echo view('admin/includes/header', $data);
        echo view('admin/magazines/add_new', $data);
        echo view('admin/includes/footer', $data);
    }

    public function edit($magazine_id)
    {
        helper(['form']);

        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $magazineModel = model('App\Models\MagazineModel', false);
        $magazine = $magazineModel->get_by_id($magazine_id);

        if(!isset($magazine) || empty($magazine) || !$magazine) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data['page'] = 'magazines-edit';
        $data['session'] = $session;
        $data['magazine'] = $magazine;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/magazines/edit', $data);
        echo view('admin/includes/footer', $data);
    }

    public function add_magazine() {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $request = \Config\Services::request();

        $magazineModel = model('App\Models\MagazineModel', false);
        $magazine_id = false;

        $validationRule = [
            'file' => [
                'label' => 'PDF da revista',
                'rules' => 'uploaded[file]'
                    . '|mime_in[file,application/pdf,application/force-download,application/x-download,application/unknown]'
                    . '|max_size[file, 30720]',
            ],
            'title' => [
                'label' => 'Título',
                'rules' => 'required',
            ],
            'date' => [
                'label' => 'Data',
                'rules' => 'required|valid_date',
            ]
        ];

        if (!$this->validate($validationRule)) {
            $message = $this->validator->listErrors();
            $success = false;
        } else {
            $file = $this->request->getFile('file');
            $title = $request->getPost('title');

            $date = $request->getPost('date');
            $date = new \DateTime($date);
            $date =  $date->format('Y-m-d');
            
            $status = $request->getPost('status');
            $status = $status ? $status : 0;
            
            if($file->isValid() && !$file->hasMoved()) {
                
                $random_name = $file->getRandomName();

                $file_date = date('Ymd');
    
                if (!is_dir(PUBLIC_PATH."/uploads/magazines/$file_date")) {
                    mkdir(PUBLIC_PATH."/uploads/magazines/$file_date", 0777, TRUE);
                }

                $file_path = "uploads/magazines/$file_date/$random_name";
                $cover_path = str_replace(".pdf", ".jpg", $file_path);
                $file->move("uploads/magazines/$file_date", $random_name);

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
                    $magazine_id = $magazineModel->add($file_path, $cover_path, $title, $date, $status);
                    
                    if($magazine_id) {
                        $message = "Revista Cadastrado com sucesso.";
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
            'date' => $request->getPost('date'),
            'status' => $request->getPost('status')
        );

        $response = array(
            'message' => $message,
            'success' => $success,
            'form_data' => $form_data
        );

        $session->setFlashdata('response', $response);

        if($success && $magazine_id) {
            return redirect()->to('/admin/magazines/edit/'.$magazine_id);
        } else {
            return redirect()->to('/admin/magazines/add_new');
        }
    }

    public function update_magazine($magazine_id) {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $request = \Config\Services::request();

        $magazineModel = model('App\Models\MagazineModel', false);
        $magazine = $magazineModel->get_by_id($magazine_id);

        if(!isset($magazine) || empty($magazine) || !$magazine) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $validationRule = [
            'file' => [
                'label' => 'PDF da revista',
                'rules' => 'if_exist|uploaded[file]'
                    . '|mime_in[file,application/pdf,application/force-download,application/x-download,application/unknown]'
                    . '|max_size[file, 30720]',
            ],
            'title' => [
                'label' => 'Título',
                'rules' => 'required',
            ],
            'date' => [
                'label' => 'Data',
                'rules' => 'required|valid_date',
            ]
        ];

        if (!$this->validate($validationRule)) {
            $message = $this->validator->listErrors();
            $success = false;
        } else {

            $file = $this->request->getFile('file');
            $title = $request->getPost('title');

            $date = $request->getPost('date');
            $date = new \DateTime($date);
            $date =  $date->format('Y-m-d');

            $status = $request->getPost('status');
            $status = $status ? $status : 0;

            if(isset($file) && !empty($file) && $file->isValid() && !$file->hasMoved()) {
                $file_date = date('Ymd');
                $random_name = $file->getRandomName();
                $file_path = "uploads/magazines/$file_date/$random_name";
                $cover_path = str_replace(".pdf", ".jpg", $file_path);

                if (!is_dir(PUBLIC_PATH."/uploads/magazines/$file_date")) {
                    mkdir(PUBLIC_PATH."/uploads/magazines/$file_date", 0777, TRUE);
                }

                $file->move("uploads/magazines/$file_date", $random_name);

                $w = 245;
                $h = 320;

                $im = new \Imagick();
                $im->setResolution(144, 144);     //set the resolution of the resulting jpg
                $im->readImage($file_path.'[0]');    //[0] for the first page
                $im->scaleImage($w, 0);
                $im->cropImage($w, $h, 0, 0);
                $im->setImageFormat('jpg');
                $im->setInterlaceScheme(\Imagick::INTERLACE_PLANE);
                $im->writeImage($cover_path);

            } else {
                $file_path = $magazine->file;
                $cover_path = $magazine->cover;
            }

            $magazineModel->update_magazine($magazine_id, $file_path, $cover_path, $title, $date, $status);
            $message = "Revista atualizada com sucesso!";
            $success = true;
        } 

        $response = array(
            'message' => $message,
            'success' => $success
        );

        $session->setFlashdata('response', $response);
        return redirect()->to('/admin/magazines/edit/'.$magazine_id);
    }
    
    public function delete($magazine_id) {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();

        $magazineModel = model('App\Models\MagazineModel', false);
        $magazine = $magazineModel->get_by_id($magazine_id);

        if(!isset($magazine) || empty($magazine) || !$magazine) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $magazineModel->delete_magazine($magazine_id);

        $response = array(
            'message' => "Revista excluída com sucesso!",
            'success' => true
        );

        $session->setFlashdata('response', $response);

        return redirect()->to('/admin/magazines');
    }

    public function remove_file($magazine_id) {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $magazineModel = model('App\Models\MagazineModel', false);
        $magazine = $magazineModel->get_by_id($magazine_id);

        if(!isset($magazine) || empty($magazine) || !$magazine) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $magazineModel->remove_file($magazine_id);

        return redirect()->to('/admin/magazines/edit/'.$magazine_id);
    }

}
