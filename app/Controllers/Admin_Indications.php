<?php

namespace App\Controllers;

class Admin_Indications extends BaseController
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

        $data['page'] = 'indications';
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/indications/index', $data);
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
        $indicationModel = model('App\Models\IndicationModel', false);

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/indications.js').'?v='.filemtime('_assets/admin/js/indications.js').'"></script>'
        );


        $data['page'] = 'indications-add_new';
        $data['footer_dependencies'] = $footer_dependencies;
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        
        echo view('admin/includes/header', $data);
        echo view('admin/indications/add_new', $data);
        echo view('admin/includes/footer', $data);
    }

    public function edit($indication_id)
    {
        helper(['form']);

        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $indicationModel = model('App\Models\IndicationModel', false);
        $indication = $indicationModel->get_by_id($indication_id);

        if(!isset($indication) || empty($indication) || !$indication) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/indications.js').'?v='.filemtime('_assets/admin/js/indications.js').'"></script>'
        );

        $data['page'] = 'indications-edit';
        $data['footer_dependencies'] = $footer_dependencies;
        $data['session'] = $session;
        $data['indication'] = $indication;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/indications/edit', $data);
        echo view('admin/includes/footer', $data);
    }

    public function add_indication() {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $request = \Config\Services::request();

        $indicationModel = model('App\Models\IndicationModel', false);
        $indication_id = false;

        $validationRule = [
            'file' => [
                'label' => 'PDF da revista',
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
            'description' => [
                'label' => 'Descrição',
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
            $description = $request->getPost('description');
            
            $status = $request->getPost('status');
            $status = $status ? $status : 0;
            
            if($file->isValid() && !$file->hasMoved()) {
                
                $random_name = $file->getRandomName();

                $file_date = date('Ymd');
    
                if (!is_dir(PUBLIC_PATH."/uploads/indications/$file_date")) {
                    mkdir(PUBLIC_PATH."/uploads/indications/$file_date", 0777, TRUE);
                }

                $file_path = "uploads/indications/$file_date/$random_name";
                $file->move("uploads/indications/$file_date", $random_name);

                if($cover->isValid() && !$cover->hasMoved()) {

                    $cover_random_name = $cover->getRandomName();
    
                    $cover_path = "uploads/indications/$file_date/$cover_random_name";
                    $cover->move("uploads/indications/$file_date", $cover_random_name);

                    try {
                        $indication_id = $indicationModel->add($file_path, $cover_path, $title, $description, $status);
                        
                        if($indication_id) {
                            $message = "Indicação Cadastrada com sucesso.";
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
            'description' => $request->getPost('description'),
            'status' => $request->getPost('status')
        );

        $response = array(
            'message' => $message,
            'success' => $success,
            'form_data' => $form_data
        );

        $session->setFlashdata('response', $response);

        if($success && $indication_id) {
            return redirect()->to('/admin/indications/edit/'.$indication_id);
        } else {
            return redirect()->to('/admin/indications/add_new');
        }
    }

    public function update_indication($indication_id) {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $request = \Config\Services::request();

        $indicationModel = model('App\Models\IndicationModel', false);
        $indication = $indicationModel->get_by_id($indication_id);

        if(!isset($indication) || empty($indication) || !$indication) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $validationRule = [
            'file' => [
                'label' => 'PDF da revista',
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
            'description' => [
                'label' => 'Descrição',
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
            $description = $request->getPost('description');
            
            $status = $request->getPost('status');
            $status = $status ? $status : 0;

            $file_date = date('Ymd');

            if(isset($file) && !empty($file) && $file->isValid() && !$file->hasMoved()) {
                $random_name = $file->getRandomName();
                $file_path = "uploads/indications/$file_date/$random_name";

                if (!is_dir(PUBLIC_PATH."/uploads/indications/$file_date")) {
                    mkdir(PUBLIC_PATH."/uploads/indications/$file_date", 0777, TRUE);
                }

                $file->move("uploads/indications/$file_date", $random_name);

            } else {
                $file_path = $indication->file;
            }

            if(isset($cover) && !empty($cover) && $cover->isValid() && !$cover->hasMoved()) {
                $cover_random_name = $cover->getRandomName();
                $cover_path = "uploads/indications/$file_date/$cover_random_name";

                if (!is_dir(PUBLIC_PATH."/uploads/indications/$file_date")) {
                    mkdir(PUBLIC_PATH."/uploads/indications/$file_date", 0777, TRUE);
                }

                $cover->move("uploads/indications/$file_date", $cover_random_name);

            } else {
                $cover_path = $indication->cover;
            }

            $indicationModel->update_indication($indication_id, $file_path, $cover_path, $title, $description, $status);
            $message = "indicação atualizada com sucesso!";
            $success = true;
        } 

        $response = array(
            'message' => $message,
            'success' => $success
        );

        $session->setFlashdata('response', $response);
        return redirect()->to('/admin/indications/edit/'.$indication_id);
    }
    
    public function delete($indication_id) {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();

        $indicationModel = model('App\Models\IndicationModel', false);
        $indication = $indicationModel->get_by_id($indication_id);

        if(!isset($indication) || empty($indication) || !$indication) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $indicationModel->delete_indication($indication_id);

        $response = array(
            'message' => "Indicação excluída com sucesso!",
            'success' => true
        );

        $session->setFlashdata('response', $response);

        return redirect()->to('/admin/indications');
    }

    public function remove_file($indication_id) {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $indicationModel = model('App\Models\IndicationModel', false);
        $indication = $indicationModel->get_by_id($indication_id);

        if(!isset($indication) || empty($indication) || !$indication) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $indicationModel->remove_file($indication_id);

        return redirect()->to('/admin/indications/edit/'.$indication_id);
    }

    public function remove_cover($indication_id) {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $indicationModel = model('App\Models\IndicationModel', false);
        $indication = $indicationModel->get_by_id($indication_id);

        if(!isset($indication) || empty($indication) || !$indication) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $indicationModel->remove_cover($indication_id);

        return redirect()->to('/admin/indications/edit/'.$indication_id);
    }


}
