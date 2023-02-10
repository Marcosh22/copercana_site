<?php

namespace App\Controllers;

class Admin_Videos extends BaseController
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

        $data['page'] = 'videos';
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/videos/index', $data);
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
        $videoModel = model('App\Models\VideoModel', false);


        $data['page'] = 'videos-add_new';
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
        $data['ion_auth'] = $this->ionAuth;
        
        
        echo view('admin/includes/header', $data);
        echo view('admin/videos/add_new', $data);
        echo view('admin/includes/footer', $data);
    }

    public function edit($video_id)
    {
        helper(['form']);

        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $videoModel = model('App\Models\VideoModel', false);
        $video = $videoModel->get_by_id($video_id);

        if(!isset($video) || empty($video) || !$video) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        

        $data['page'] = 'videos-edit';
        $data['session'] = $session;
        $data['video'] = $video;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/videos/edit', $data);
        echo view('admin/includes/footer', $data);
    }

    public function add_video() {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $request = \Config\Services::request();

        $videoModel = model('App\Models\VideoModel', false);
        $video_id = false;

        $validationRule = [
            'url' => [
                'label' => 'URL',
                'rules' => 'required',
            ],
            'title' => [
                'label' => 'Título',
                'rules' => 'required',
            ],
            'subtitle' => [
                'label' => 'Subtítulo',
                'rules' => 'required',
            ],
        ];

        if (!$this->validate($validationRule)) {
            $message = $this->validator->listErrors();
            $success = false;
        } else {
            $url = $this->request->getPost('url');
            $title = $request->getPost('title');
            $subtitle = $request->getPost('subtitle');
            
            try {
                $video_id = $videoModel->add($url, $title, $subtitle);
                
                if($video_id) {
                    $message = "Vídeo Cadastrado com sucesso.";
                    $success = true;
                } else {
                    $message = "Tente novamente mais tarde.";
                    $success = false;
                }
                
            } catch (\Exception $e) {
                $message = $e->getMessage();
                $success = false;
            } 
        } 

        $form_data = array(
            'url' => $request->getPost('url'),
            'title' => $request->getPost('title'),
            'subtitle' => $request->getPost('subtitle')
        );

        $response = array(
            'message' => $message,
            'success' => $success,
            'form_data' => $form_data
        );

        $session->setFlashdata('response', $response);

        if($success && $video_id) {
            return redirect()->to('/admin/videos/edit/'.$video_id);
        } else {
            return redirect()->to('/admin/videos/add_new');
        }
    }

    public function update_video($video_id) {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $request = \Config\Services::request();

        $videoModel = model('App\Models\VideoModel', false);
        $video_data = $videoModel->get_by_id($video_id);

        if(!isset($video_data) || empty($video_data) || !$video_data) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $validationRule = [
            'url' => [
                'label' => 'URL',
                'rules' => 'required',
            ],
            'title' => [
                'label' => 'Título',
                'rules' => 'required',
            ],
            'subtitle' => [
                'label' => 'Subtítulo',
                'rules' => 'required',
            ],
        ];

        if (!$this->validate($validationRule)) {
            $message = $this->validator->listErrors();
            $success = false;
        } else {

            $url = $this->request->getPost('url');
            $title = $request->getPost('title');
            $subtitle = $request->getPost('subtitle');

            $videoModel->update_video($video_id, $url, $title, $subtitle);
            $message = "Vídeo atualizado com sucesso!";
            $success = true;
        } 

        $response = array(
            'message' => $message,
            'success' => $success
        );

        $session->setFlashdata('response', $response);
        return redirect()->to('/admin/videos/edit/'.$video_id);
    }
    
    public function delete($video_id) {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();

        $videoModel = model('App\Models\VideoModel', false);
        $video = $videoModel->get_by_id($video_id);

        if(!isset($video) || empty($video) || !$video) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $videoModel->delete_video($video_id);

        $response = array(
            'message' => "Vídeo excluído com sucesso!",
            'success' => true
        );

        $session->setFlashdata('response', $response);

        return redirect()->to('/admin/videos');
    }

}
