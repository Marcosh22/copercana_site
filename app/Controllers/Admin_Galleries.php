<?php

namespace App\Controllers;

class Admin_Galleries extends BaseController
{
    private $ionAuth;
    
    public function __construct()
	{
		$this->ionAuth = new \IonAuth\Libraries\IonAuth();
	}

    public function edit($gallery_id)
    {
        helper(['form']);

        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/galleries.js').'?v='.filemtime('_assets/admin/js/galleries.js').'"></script>'
        );

        $session = \Config\Services::session();
        $galleryModel = model('App\Models\GalleryModel', false);
        $gallery = $galleryModel->get_by_id($gallery_id);

        if(!isset($gallery) || empty($gallery) || !$gallery) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $pictures = $galleryModel->get_pictures_by_gallery_id($gallery_id);

        $data['page'] = 'galleries-edit';
        $data['session'] = $session;
        $data['gallery'] = $gallery;
        $data['pictures'] = $pictures;
        $data['footer_dependencies'] = $footer_dependencies;
        $data['logged_user'] = $this->ionAuth->user();
        $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/galleries/edit', $data);
        echo view('admin/includes/footer', $data);
    }

    public function update_gallery($gallery_id) {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $request = \Config\Services::request();

        $galleryModel = model('App\Models\GalleryModel', false);
        $gallery = $galleryModel->get_by_id($gallery_id);

        if(!isset($gallery) || empty($gallery) || !$gallery) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $validationRule = [
            'title' => [
                'label' => 'Título',
                'rules' => 'required',
            ],
            'images' => [
                'label' => 'Imagens',
                'rules' => 'max_size[images,30000]',
            ]
        ];

        if (!$this->validate($validationRule)) {
            $message = $this->validator->listErrors();
            $success = false;
        } else {

            $title = $request->getPost('title');
            $status = $request->getPost('status');
            $status = $status ? $status : 0;
            
            $date = date('Ymd');

            $galleryModel->update_gallery($gallery_id, $title, $status);
            
            if ($image_file = $this->request->getFiles()) {

                if (!is_dir(PUBLIC_PATH."/uploads/galleries/$date")) {
                    mkdir(PUBLIC_PATH."/uploads/galleries/$date", 0777, TRUE);
                }

                foreach($image_file['images'] as $picture) {
                    if ($picture->isValid() && ! $picture->hasMoved()) {
                        $picture_random_name = $picture->getRandomName();
                        $picture_path = "uploads/galleries/$date/$picture_random_name";
                        $thumbnail_path = "uploads/galleries/$date/thumb-$picture_random_name";

                        $thumbnail = \Config\Services::image()
                            ->withFile($picture)
                            ->fit(350, 350, 'center')
                            ->save(FCPATH . $thumbnail_path);

                        $image = \Config\Services::image()
                                ->withFile($picture)
                                ->resize(1920, 1920, true, 'width')
                                ->save(FCPATH . $picture_path);


                        $picture_order = $galleryModel->get_next_picture_order($gallery_id);
                        $galleryModel->add_picture($gallery_id, $picture_path, $thumbnail_path, "", "", $picture_order);
                    }
                }
            }
            
            $message = "Galeria atualizado com sucesso!";
            $success = true;
        } 

        $response = array(
            'message' => $message,
            'success' => $success
        );

        $session->setFlashdata('response', $response);
        return redirect()->to('/admin/galleries/edit/'.$gallery_id);
    }

    public function delete_picture($gallery_id, $picture_id) {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();

        $galleryModel = model('App\Models\GalleryModel', false);

        $gallery = $galleryModel->get_by_id($gallery_id);

        if(!isset($gallery) || empty($gallery) || !$gallery) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
        $picture = $galleryModel->get_picture_by_id($picture_id);

        if(!isset($picture) || empty($picture) || !$picture) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $galleryModel->delete_picture($picture_id);

        $response = array(
            'message' => "Imagem excluída com sucesso!",
            'success' => true
        );

        $session->setFlashdata('response', $response);

        return redirect()->to('/admin/galleries/edit/'.$gallery_id);
    }
}
