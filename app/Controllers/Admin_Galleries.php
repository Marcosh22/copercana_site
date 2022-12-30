<?php

namespace App\Controllers;

class Admin_Galleries extends BaseController
{
    private $slug_counter = 0;

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

        $data['page'] = 'galleries';
        $data['session'] = $session;
       
        $data['logged_user'] = $this->ionAuth->user();
        $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/galleries/index', $data);
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

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/galleries.js').'?v='.filemtime('_assets/admin/js/galleries.js').'"></script>'
        );

        $session = \Config\Services::session();
        $galleryModel = model('App\Models\GalleryModel', false);

        $next_order = $galleryModel->get_next_order();

        $data['page'] = 'galleries-add_new';
        $data['session'] = $session;
        $data['next_order'] = $next_order;
        $data['footer_dependencies'] = $footer_dependencies;
        $data['logged_user'] = $this->ionAuth->user();
        $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/galleries/add_new', $data);
        echo view('admin/includes/footer', $data);
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

    public function add_gallery() {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $request = \Config\Services::request();

        $galleryModel = model('App\Models\GalleryModel', false);
        $next_order = $galleryModel->get_next_order() + 1;
        $gallery_id = false;

        $validationRule = [
            'cover' => [
                'label' => 'Capa',
                'rules' => 'uploaded[cover]'
                    . '|is_image[cover]'
                    . '|mime_in[cover,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[cover,5000]',
            ],
            'title' => [
                'label' => 'Título',
                'rules' => 'required',
            ],
            'date' => [
                'label' => 'Data do Evento',
                'rules' => 'required',
            ],
            'show_order' => [
                'label' => 'Ordem de exibição',
                'rules' => 'required|integer|greater_than[0]|less_than['.$next_order.']',
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
            $cover = $this->request->getFile('cover');
            $title = $request->getPost('title');
            $event_date = $request->getPost('date');
            $show_order = $request->getPost('show_order');
            $status = $request->getPost('status');
            $status = $status ? $status : 0;
            $slug = $this->create_slug_from_gallery_title($title);
            
            if($cover->isValid() && !$cover->hasMoved()) {
                $cover_random_name = $cover->getRandomName();
                $cover_path = "uploads/galleries/$slug/$cover_random_name";

                if (!is_dir(PUBLIC_PATH."/uploads/galleries/$slug")) {
                    mkdir(PUBLIC_PATH."/uploads/galleries/$slug", 0777, TRUE);
                }

                \Config\Services::image()
                    ->withFile($cover)
                    ->fit(350, 350, 'center')
                    ->save(FCPATH . $cover_path);

                //$cover->move("uploads/galleries/$slug", $cover_random_name);

                try {
                    $galleryModel->update_all_orders((int)$show_order, $next_order);
                    
                    $gallery_id = $galleryModel->add($cover_path, $title, $event_date, $show_order, $slug, $status);

                    if($gallery_id) {
                        $message = "Galeria Cadastrado com sucesso.";
                        $success = true;
                    } else {
                        $message = "Tente novamente mais tarde.";
                        $success = false;
                    }
                    
                } catch (\Exception $e) {
                    $message = $e->getMessage();
                    $success = false;
                }

                if ($image_file = $this->request->getFiles()) {
                    foreach($image_file['images'] as $picture) {
                        if ($picture->isValid() && ! $picture->hasMoved()) {
                            $picture_random_name = $picture->getRandomName();
                            $picture_path = "uploads/galleries/$slug/$picture_random_name";
                            $thumbnail_path = "uploads/galleries/$slug/thumb-$picture_random_name";

                            $thumbnail = \Config\Services::image()
                                ->withFile($picture)
                                ->fit(350, 350, 'center')
                                ->save(FCPATH . $thumbnail_path);

                            $image = \Config\Services::image()
                                ->withFile($picture)
                                ->resize(1920, 1920, true, 'width')
                                ->save(FCPATH . $picture_path);


                            //$picture->move("uploads/galleries/$slug", $picture_random_name);

                            $picture_order = $galleryModel->get_next_picture_order($gallery_id);
                            $galleryModel->add_picture($gallery_id, $picture_path, $thumbnail_path, "", "", $picture_order);
                        }
                    }
                }
               
            } else {
                $message = "Erro ao efetuar upload. Tente novamente.";
                $success = false;
            }
        } 

        $form_data = array(
            'title' => $request->getPost('title'),
            'show_order' => $request->getPost('show_order'),
            'status' => $request->getPost('status')
        );

        $response = array(
            'message' => $message,
            'success' => $success,
            'form_data' => $form_data
        );

        $session->setFlashdata('response', $response);

        if($success && $gallery_id) {
            return redirect()->to('/admin/galleries/edit/'.$gallery_id);
        } else {
            return redirect()->to('/admin/galleries/add_new');
        }
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

        $next_order = $galleryModel->get_next_order();

        $validationRule = [
            'cover' => [
                'label' => 'Capa',
                'rules' => 'if_exist|uploaded[cover]'
                    . '|is_image[cover]'
                    . '|mime_in[cover,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[cover,5000]',
            ],
            'title' => [
                'label' => 'Título',
                'rules' => 'required',
            ],
            'date' => [
                'label' => 'Data do Evento',
                'rules' => 'required',
            ],
            'show_order' => [
                'label' => 'Ordem de exibição',
                'rules' => 'required|integer|greater_than[0]|less_than['.$next_order.']',
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

            $cover = $this->request->getFile('cover');
            $title = $request->getPost('title');
            $event_date = $request->getPost('date');
            $show_order = $request->getPost('show_order');
            $status = $request->getPost('status');
            $status = $status ? $status : 0;
            $slug = $gallery->slug;
            
            $date = date('Ymd');

            if(isset($cover) && !empty($cover) && $cover->isValid() && !$cover->hasMoved()) {
                $cover_random_name = $cover->getRandomName();
                //$cover->move("uploads/galleries/$slug", $cover_random_name);
                $cover_path = "uploads/galleries/$slug/$cover_random_name";

                if (!is_dir(PUBLIC_PATH."/uploads/galleries/$slug")) {
                    mkdir(PUBLIC_PATH."/uploads/galleries/$slug", 0777, TRUE);
                }

                \Config\Services::image()
                    ->withFile($cover)
                    ->fit(350, 350, 'center')
                    ->save(FCPATH . $cover_path);

            } else {
                $cover_path = $gallery->cover;
            }

            if((int)$show_order !== (int)$gallery->show_order) {
                $galleryModel->update_all_orders((int)$show_order, (int)$gallery->show_order);
            }
            
            $galleryModel->update_gallery($gallery_id, $cover_path, $title, $event_date, $show_order, $slug, $status);
            
            if ($image_file = $this->request->getFiles()) {
                foreach($image_file['images'] as $picture) {
                    if ($picture->isValid() && ! $picture->hasMoved()) {
                        $picture_random_name = $picture->getRandomName();
                        $picture_path = "uploads/galleries/$slug/$picture_random_name";
                        $thumbnail_path = "uploads/galleries/$slug/thumb-$picture_random_name";

                        $thumbnail = \Config\Services::image()
                            ->withFile($picture)
                            ->fit(350, 350, 'center')
                            ->save(FCPATH . $thumbnail_path);

                        $image = \Config\Services::image()
                                ->withFile($picture)
                                ->resize(1920, 1920, true, 'width')
                                ->save(FCPATH . $picture_path);


                        //$picture->move("uploads/galleries/$slug", $picture_random_name);

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
    
    public function remove_cover($gallery_id) {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $galleryModel = model('App\Models\GalleryModel', false);
        $gallery = $galleryModel->get_by_id($gallery_id);

        if(!isset($gallery) || empty($gallery) || !$gallery) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $galleryModel->remove_cover($gallery_id);

        return redirect()->to('/admin/galleries/edit/'.$gallery_id);
    }

    public function delete($gallery_id) {
        if (!$this->ionAuth->loggedIn())
		{
			return redirect()->to('/auth/login');
		}

        $session = \Config\Services::session();

        $galleryModel = model('App\Models\GalleryModel', false);
        $gallery = $galleryModel->get_by_id($gallery_id);

        if(!isset($gallery) || empty($gallery) || !$gallery) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $galleryModel->delete_gallery($gallery_id);

        $response = array(
            'message' => "Galeria excluída com sucesso!",
            'success' => true
        );

        $session->setFlashdata('response', $response);

        return redirect()->to('/admin/galleries');
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

    private function create_slug_from_gallery_title($gallery_title) {
        $slug = $this->slugify($gallery_title);

        $galleryModel = model('App\Models\GalleryModel', false);
        $gallery = $galleryModel->get_by_slug($slug);

        if($gallery) {
            $this->slug_counter++;
            return $this->create_slug_from_gallery_title($gallery_title."-".$this->slug_counter);
        } else {
            $this->slug_counter = 0;
            return $slug;
        }
    }

    private function slugify($text, string $divider = '-')
    {
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, $divider);
        $text = preg_replace('~-+~', $divider, $text);
        $text = strtolower($text);
        
        if (empty($text)) {
            return 'n-a';
        }
        
        return $text;
    }
}
