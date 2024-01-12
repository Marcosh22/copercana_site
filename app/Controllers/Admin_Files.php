<?php

namespace App\Controllers;

class Admin_Files extends BaseController
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
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();

        $data['page'] = 'files';
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/files/index', $data);
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
        $fileModel = model('App\Models\FileModel', false);

        $data['page'] = 'files-add_new';
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        
        echo view('admin/includes/header', $data);
        echo view('admin/files/add_new', $data);
        echo view('admin/includes/footer', $data);
    }

    public function edit($file_id)
    {
        helper(['form']);

        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $fileModel = model('App\Models\FileModel', false);
        $file = $fileModel->get_by_id($file_id);

        if(!isset($file) || empty($file) || !$file) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $data['page'] = 'files-edit';
        $data['session'] = $session;
        $data['file'] = $file;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/files/edit', $data);
        echo view('admin/includes/footer', $data);
    }

    public function add_file() {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $request = \Config\Services::request();

        $fileModel = model('App\Models\FileModel', false);
        $file_id = false;

        $validationRule = [
            'file' => [
                'label' => 'Arquivo',
                'rules' => 'uploaded[file]'
                    . '|mime_in[file,application/pdf,application/force-download,application/x-download,application/unknown]'
                    . '|max_size[file, 30720]',
            ],
            'cover' => [
                'label' => 'Imagem de capa',
                'rules' => 'uploaded[cover]'
                    . '|is_image[cover]'
                    . '|mime_in[cover,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[cover, 2048]',
            ],
            'title' => [
                'label' => 'Título',
                'rules' => 'required',
            ],
            'subtitle' => [
                'label' => 'Subtítulo',
                'rules' => 'required',
            ]
        ];

        if (!$this->validate($validationRule)) {
            $message = $this->validator->listErrors();
            $success = false;
        } else {
            $file = $this->request->getFile('file');
            $cover = $this->request->getFile('cover');
            $title = $request->getPost('title');
            $subtitle = $request->getPost('subtitle');
            
            if($file->isValid() && !$file->hasMoved()) {
                
                $random_name = $file->getRandomName();

                $file_date = date('Ymd');
    
                if (!is_dir(PUBLIC_PATH."/uploads/files/$file_date")) {
                    mkdir(PUBLIC_PATH."/uploads/files/$file_date", 0777, TRUE);
                }

                $file_path = "uploads/files/$file_date/$random_name";
                $file->move("uploads/files/$file_date", $random_name);

                if($cover->isValid() && !$cover->hasMoved()) {

                    $cover_random_name = $cover->getRandomName();
    
                    $cover_path = "uploads/files/$file_date/$cover_random_name";
                    $cover->move("uploads/files/$file_date", $cover_random_name);

                    try {
                        $file_id = $fileModel->add($file_path, $cover_path, $title, $subtitle);
                        
                        if($file_id) {
                            $message = "Arquivo Cadastrado com sucesso.";
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
            } else {
                $message = "Erro ao efetuar upload. Tente novamente.";
                $success = false;
            }
        } 

        $form_data = array(
            'title' => $request->getPost('title'),
            'subtitle' => $request->getPost('subtitle')
        );

        $response = array(
            'message' => $message,
            'success' => $success,
            'form_data' => $form_data
        );

        $session->setFlashdata('response', $response);

        if($success && $file_id) {
            return redirect()->to('/admin/files/edit/'.$file_id);
        } else {
            return redirect()->to('/admin/files/add_new');
        }
    }

    public function update_file($file_id) {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $request = \Config\Services::request();

        $fileModel = model('App\Models\FileModel', false);
        $file = $fileModel->get_by_id($file_id);

        if(!isset($file) || empty($file) || !$file) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $validationRule = [
            'file' => [
                'label' => 'Arquivo',
                'rules' => 'if_exist|uploaded[file]'
                    . '|mime_in[file,application/pdf,application/force-download,application/x-download,application/unknown]'
                    . '|max_size[file, 30720]',
            ],
            'cover' => [
                'label' => 'Imagem de capa',
                'rules' => 'if_exist|uploaded[cover]'
                    . '|is_image[cover]'
                    . '|mime_in[cover,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[cover, 2048]',
            ],
            'title' => [
                'label' => 'Título',
                'rules' => 'required',
            ],
            'subtitle' => [
                'label' => 'Subtítulo',
                'rules' => 'required',
            ]
        ];

        if (!$this->validate($validationRule)) {
            $message = $this->validator->listErrors();
            $success = false;
        } else {

            $file = $this->request->getFile('file');
            $cover = $this->request->getFile('cover');
            $title = $request->getPost('title');
            $subtitle = $request->getPost('subtitle');
            
            $file_date = date('Ymd');

            if(isset($file) && !empty($file) && $file->isValid() && !$file->hasMoved()) {
                $random_name = $file->getRandomName();
                $file_path = "uploads/files/$file_date/$random_name";

                if (!is_dir(PUBLIC_PATH."/uploads/files/$file_date")) {
                    mkdir(PUBLIC_PATH."/uploads/files/$file_date", 0777, TRUE);
                }

                $file->move("uploads/files/$file_date", $random_name);

            } else {
                $file_path = $file->file;
            }

            if(isset($cover) && !empty($cover) && $cover->isValid() && !$cover->hasMoved()) {
                $cover_random_name = $cover->getRandomName();
                $cover_path = "uploads/files/$file_date/$cover_random_name";

                if (!is_dir(PUBLIC_PATH."/uploads/files/$file_date")) {
                    mkdir(PUBLIC_PATH."/uploads/files/$file_date", 0777, TRUE);
                }

                $cover->move("uploads/files/$file_date", $cover_random_name);

            } else {
                $cover_path = $file->cover;
            }

            $fileModel->update_file($file_id, $file_path, $cover_path, $title, $subtitle);
            $message = "Arquivo atualizado com sucesso!";
            $success = true;
        } 

        $response = array(
            'message' => $message,
            'success' => $success
        );

        $session->setFlashdata('response', $response);
        return redirect()->to('/admin/files/edit/'.$file_id);
    }
    
    public function delete($file_id) {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();

        $fileModel = model('App\Models\FileModel', false);
        $file = $fileModel->get_by_id($file_id);

        if(!isset($file) || empty($file) || !$file) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $fileModel->delete_file($file_id);

        $response = array(
            'message' => "Arquivo excluído com sucesso!",
            'success' => true
        );

        $session->setFlashdata('response', $response);

        return redirect()->to('/admin/files');
    }

    public function remove_file($file_id) {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $fileModel = model('App\Models\FileModel', false);
        $file = $fileModel->get_by_id($file_id);

        if(!isset($file) || empty($file) || !$file) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $fileModel->remove_file($file_id);

        return redirect()->to('/admin/files/edit/'.$file_id);
    }

    public function remove_cover($file_id) {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $fileModel = model('App\Models\FileModel', false);
        $file = $fileModel->get_by_id($file_id);

        if(!isset($file) || empty($file) || !$file) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $fileModel->remove_cover($file_id);

        return redirect()->to('/admin/files/edit/'.$file_id);
    }


}
