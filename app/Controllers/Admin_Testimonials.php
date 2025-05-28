<?php

namespace App\Controllers;

class Admin_Testimonials extends BaseController
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

        $data['page'] = 'testimonials';
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/testimonials/index', $data);
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
        $testimonialModel = model('App\Models\TestimonialModel', false);

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/testimonials.js').'?v='.filemtime('_assets/admin/js/testimonials.js').'"></script>'
        );


        $data['page'] = 'testimonials-add_new';
        $data['footer_dependencies'] = $footer_dependencies;
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        
        echo view('admin/includes/header', $data);
        echo view('admin/testimonials/add_new', $data);
        echo view('admin/includes/footer', $data);
    }

    public function edit($testimonial_id)
    {
        helper(['form']);

        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $testimonialModel = model('App\Models\TestimonialModel', false);
        $testimonial = $testimonialModel->get_by_id($testimonial_id);

        if(!isset($testimonial) || empty($testimonial) || !$testimonial) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/testimonials.js').'?v='.filemtime('_assets/admin/js/testimonials.js').'"></script>'
        );

        $data['page'] = 'testimonials-edit';
        $data['footer_dependencies'] = $footer_dependencies;
        $data['session'] = $session;
        $data['testimonial'] = $testimonial;
        $data['logged_user'] = $this->ionAuth->user();
        $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/testimonials/edit', $data);
        echo view('admin/includes/footer', $data);
    }

    public function add_testimonial() {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $request = \Config\Services::request();

        $testimonialModel = model('App\Models\TestimonialModel', false);
        $testimonial_id = false;

        $validationRule = [
            'picture' => [
                'label' => 'Foto',
                'rules' => 'if_exist|uploaded[picture]'
                    . '|mime_in[picture,application/pdf,application/force-download,application/x-download,application/unknown]'
                    . '|max_size[picture, 30720]',
            ],
            'title' => [
                'label' => 'Título',
                'rules' => 'required',
            ],
            'name' => [
                'label' => 'Nome',
                'rules' => 'required',
            ],
            'testimonial' => [
                'label' => 'Depoimento',
                'rules' => 'required',
            ]
        ];

        if (!$this->validate($validationRule)) {
            $message = $this->validator->listErrors();
            $success = false;
        } else {
            $picture = $this->request->getFile('picture');
            $title = $request->getPost('title');
            $name = $request->getPost('name');
            $testimonial = $request->getPost('testimonial');
            
            $status = $request->getPost('status');
            $status = $status ? $status : 0;
            
            if($picture->isValid() && !$picture->hasMoved()) {
                
                $random_name = $picture->getRandomName();

                $picture_date = date('Ymd');
    
                if (!is_dir(PUBLIC_PATH."/uploads/testimonials/$picture_date")) {
                    mkdir(PUBLIC_PATH."/uploads/testimonials/$picture_date", 0777, TRUE);
                }

                $picture_path = "uploads/testimonials/$picture_date/$random_name";
                $picture->move("uploads/testimonials/$picture_date", $random_name);

                try {
                    $testimonial_id = $testimonialModel->add($picture_path, $title, $name, $testimonial, $status);
                    
                    if($testimonial_id) {
                        $message = "Depoimento Cadastrado com sucesso.";
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
            'name' => $request->getPost('name'),
            'testimonial' => $request->getPost('testimonial'),
            'status' => $request->getPost('status')
        );

        $response = array(
            'message' => $message,
            'success' => $success,
            'form_data' => $form_data
        );

        $session->setFlashdata('response', $response);

        if($success && $testimonial_id) {
            return redirect()->to('/admin/testimonials/edit/'.$testimonial_id);
        } else {
            return redirect()->to('/admin/testimonials/add_new');
        }
    }

    public function update_testimonial($testimonial_id) {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $request = \Config\Services::request();

        $testimonialModel = model('App\Models\TestimonialModel', false);
        $testimonial_data = $testimonialModel->get_by_id($testimonial_id);

        if(!isset($testimonial_data) || empty($testimonial_data) || !$testimonial_data) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $validationRule = [
            'picture' => [
                'label' => 'Foto',
                'rules' => 'if_exist|uploaded[picture]'
                    . '|mime_in[picture,application/pdf,application/force-download,application/x-download,application/unknown]'
                    . '|max_size[picture, 30720]',
            ],
            'title' => [
                'label' => 'Título',
                'rules' => 'required',
            ],
            'name' => [
                'label' => 'Nome',
                'rules' => 'required',
            ],
            'testimonial' => [
                'label' => 'Depoimento',
                'rules' => 'required',
            ]
        ];

        if (!$this->validate($validationRule)) {
            $message = $this->validator->listErrors();
            $success = false;
        } else {

            $picture = $this->request->getFile('picture');
            $title = $request->getPost('title');
            $name = $request->getPost('name');
            $testimonial = $request->getPost('testimonial');
            
            $status = $request->getPost('status');
            $status = $status ? $status : 0;

            $picture_date = date('Ymd');

            if(isset($picture) && !empty($picture) && $picture->isValid() && !$picture->hasMoved()) {
                $random_name = $picture->getRandomName();
                $picture_path = "uploads/testimonials/$picture_date/$random_name";

                if (!is_dir(PUBLIC_PATH."/uploads/testimonials/$picture_date")) {
                    mkdir(PUBLIC_PATH."/uploads/testimonials/$picture_date", 0777, TRUE);
                }

                $picture->move("uploads/testimonials/$picture_date", $random_name);

            } else {
                $picture_path = $testimonial_data->picture;
            }

            $testimonialModel->update_testimonial($testimonial_id, $picture_path, $title, $name, $testimonial, $status);
            $message = "depoimento atualizado com sucesso!";
            $success = true;
        } 

        $response = array(
            'message' => $message,
            'success' => $success
        );

        $session->setFlashdata('response', $response);
        return redirect()->to('/admin/testimonials/edit/'.$testimonial_id);
    }
    
    public function delete($testimonial_id) {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();

        $testimonialModel = model('App\Models\TestimonialModel', false);
        $testimonial = $testimonialModel->get_by_id($testimonial_id);

        if(!isset($testimonial) || empty($testimonial) || !$testimonial) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $testimonialModel->delete_testimonial($testimonial_id);

        $response = array(
            'message' => "Depoimento excluído com sucesso!",
            'success' => true
        );

        $session->setFlashdata('response', $response);

        return redirect()->to('/admin/testimonials');
    }

    public function remove_picture($testimonial_id) {
 if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $testimonialModel = model('App\Models\TestimonialModel', false);
        $testimonial = $testimonialModel->get_by_id($testimonial_id);

        if(!isset($testimonial) || empty($testimonial) || !$testimonial) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $testimonialModel->remove_picture($testimonial_id);

        return redirect()->to('/admin/testimonials/edit/'.$testimonial_id);
    }
}
