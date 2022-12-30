<?php

namespace App\Controllers;

class Admin_Fuel_Forms extends BaseController
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
		}

        $session = \Config\Services::session();

        $data['page'] = 'fuel_forms';
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
        
        echo view('admin/includes/header', $data);
        echo view('admin/fuel_forms/index', $data);
        echo view('admin/includes/footer', $data);
    }

    public function add_new()
    {
        helper(['form']);

        if (!$this->ionAuth->loggedIn())
		{
			return redirect()->to('/auth/login');
		}

        $session = \Config\Services::session();

        $data['page'] = 'fuel_forms-add_new';
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
        
        
        echo view('admin/includes/header', $data);
        echo view('admin/fuel_forms/add_new', $data);
        echo view('admin/includes/footer', $data);
    }

    public function edit($form_id)
    {
        helper(['form']);

        if (!$this->ionAuth->loggedIn())
		{
			return redirect()->to('/auth/login');
		}

        $session = \Config\Services::session();
        $fuelFormModel = model('App\Models\FuelFormModel', false);
        $form = $fuelFormModel->get_by_id($form_id);

        if(!isset($form) || empty($form) || !$form) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data['page'] = 'forms-edit';
        $data['session'] = $session;
        $data['form'] = $form;
        $data['logged_user'] = $this->ionAuth->user();
        
        echo view('admin/includes/header', $data);
        echo view('admin/fuel_forms/edit', $data);
        echo view('admin/includes/footer', $data);
    }

    public function add_form() {
        if (!$this->ionAuth->loggedIn())
		{
			return redirect()->to('/auth/login');
		}

        $session = \Config\Services::session();
        $request = \Config\Services::request();

        $fuelFormModel = model('App\Models\FuelFormModel', false);
        $form_id = false;

        $validationRule = [
            'file' => [
                'label' => 'PDF',
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
            
            if($file->isValid() && !$file->hasMoved()) {
                
                $random_name = $file->getRandomName();

                $date = date('Ymd');
    
                if (!is_dir(PUBLIC_PATH."/uploads/fuel_forms/$date")) {
                    mkdir(PUBLIC_PATH."/uploads/fuel_forms/$date", 0777, TRUE);
                }

                $file->move("uploads/fuel_forms/$date", $random_name);
                
                $file_path = "uploads/fuel_forms/$date/$random_name";

                try {
                    $form_id = $fuelFormModel->add($file_path, $title);
                    
                    if($form_id) {
                        $message = "Formulário Cadastrado com sucesso.";
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
            'title' => $request->getPost('title')
        );

        $response = array(
            'message' => $message,
            'success' => $success,
            'form_data' => $form_data
        );

        $session->setFlashdata('response', $response);

        if($success && $form_id) {
            return redirect()->to('/admin/fuel_forms/edit/'.$form_id);
        } else {
            return redirect()->to('/admin/fuel_forms/add_new');
        }
    }

    public function update_form($form_id) {
        if (!$this->ionAuth->loggedIn())
		{
			return redirect()->to('/auth/login');
		}

        $session = \Config\Services::session();
        $request = \Config\Services::request();

        $fuelFormModel = model('App\Models\FuelFormModel', false);
        $form = $fuelFormModel->get_by_id($form_id);

        if(!isset($form) || empty($form) || !$form) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $validationRule = [
            'file' => [
                'label' => 'PDF',
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

            if(isset($file) && !empty($file) && $file->isValid() && !$file->hasMoved()) {
                $date = date('Ymd');
                $random_name = $file->getRandomName();
                $file_path = "uploads/fuel_forms/$date/$random_name";

                if (!is_dir(PUBLIC_PATH."/uploads/fuel_forms/$date")) {
                    mkdir(PUBLIC_PATH."/uploads/fuel_forms/$date", 0777, TRUE);
                }

                $file->move("uploads/fuel_forms/$date", $random_name);

            } else {
                $file_path = $form->file;
            }

            $fuelFormModel->update_form($form_id, $file_path, $title);
            $message = "Formulário atualizado com sucesso!";
            $success = true;
        } 

        $response = array(
            'message' => $message,
            'success' => $success
        );

        $session->setFlashdata('response', $response);
        return redirect()->to('/admin/fuel_forms/edit/'.$form_id);
    }
    
    public function delete($form_id) {
        if (!$this->ionAuth->loggedIn())
		{
			return redirect()->to('/auth/login');
		}

        $session = \Config\Services::session();

        $fuelFormModel = model('App\Models\FuelFormModel', false);
        $form = $fuelFormModel->get_by_id($form_id);

        if(!isset($form) || empty($form) || !$form) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $fuelFormModel->delete_form($form_id);

        $response = array(
            'message' => "Formulário excluído com sucesso!",
            'success' => true
        );

        $session->setFlashdata('response', $response);

        return redirect()->to('/admin/fuel_forms');
    }

    public function remove_file($form_id) {
        if (!$this->ionAuth->loggedIn())
		{
			return redirect()->to('/admin/auth/login');
		}

        $fuelFormModel = model('App\Models\FuelFormModel', false);
        $form = $fuelFormModel->get_by_id($form_id);

        if(!isset($form) || empty($form) || !$form) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $fuelFormModel->remove_file($form_id);

        return redirect()->to('/admin/fuel_forms/edit/'.$form_id);
    }

    public function make_cover($file = "") {
        $uri = current_url(true);
        $segments = $uri->getSegments();
        $segments = array_slice($segments, 3);

        $file_path = "";

        foreach($segments as $key => $segment) {
            $file_path .= $segment;

            if($key < count($segments) - 1) $file_path .= "/";
        }

       if(empty($file_path)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
            $w = 243;
            $h = 350;

            $im = new \Imagick();
            try {
                $im->setResolution(144, 144);     //set the resolution of the resulting jpg
                $im->readImage($file_path.'[0]');    //[0] for the first page
                $im->scaleImage($w, 0);
                $im->cropImage($w, $h, 0, 0);
                $im->setImageFormat('jpg');
                $im->setInterlaceScheme(\Imagick::INTERLACE_PLANE);
                header('Content-Type: image/jpeg');
                echo $im;
            } catch (\Exception $e) {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }

		return null;
	}
}
