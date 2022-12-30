<?php

namespace App\Controllers;

class Admin_Banners extends BaseController
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

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/banners.js').'?v='.filemtime('_assets/admin/js/banners.js').'"></script>'
        );

        $bannerModel = model('App\Models\BannerModel', false);

        $pager = \Config\Services::pager();
        $banners_home = $bannerModel->get_all_by_page_id(1);
        $banners_feira = $bannerModel->get_all_by_page_id(2);
        $banners_visitantes = $bannerModel->get_all_by_page_id(4);
        
        $data['page'] = 'banners';
        $data['banners_home'] = $banners_home;
        $data['banners_feira'] = $banners_feira;
        $data['banners_visitantes'] = $banners_visitantes;
        $data['session'] = $session;
        $data['footer_dependencies'] = $footer_dependencies;
        $data['logged_user'] = $this->ionAuth->user();
        $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/banners/index', $data);
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
        $bannerModel = model('App\Models\BannerModel', false);

        $next_order = $bannerModel->get_next_order();

        $data['page'] = 'banners-add_new';
        $data['session'] = $session;
        $data['next_order'] = $next_order;
        $data['logged_user'] = $this->ionAuth->user();
        $data['ion_auth'] = $this->ionAuth;
        
        
        echo view('admin/includes/header', $data);
        echo view('admin/banners/add_new', $data);
        echo view('admin/includes/footer', $data);
    }

    public function edit($banner_id)
    {
        helper(['form']);

        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $bannerModel = model('App\Models\BannerModel', false);
        $banner = $bannerModel->get_by_id($banner_id);

        if(!isset($banner) || empty($banner) || !$banner) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data['page'] = 'banners-edit';
        $data['session'] = $session;
        $data['banner'] = $banner;
        $data['logged_user'] = $this->ionAuth->user();
        $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/banners/edit', $data);
        echo view('admin/includes/footer', $data);
    }

    public function add_banner() {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $request = \Config\Services::request();

        $page_id = $request->getPost('page_id');

        $bannerModel = model('App\Models\BannerModel', false);
        $next_order = $bannerModel->get_next_order_by_page_id($page_id) + 1;
        $banner_id = false;

        $validationRule = [
            'desktop_picture' => [
                'label' => 'Banner Desktop',
                'rules' => 'uploaded[desktop_picture]'
                    . '|is_image[desktop_picture]'
                    . '|mime_in[desktop_picture,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[desktop_picture,1000]',
            ],
            'mobile_picture' => [
                'label' => 'Banner Mobile',
                'rules' => 'uploaded[mobile_picture]'
                    . '|is_image[mobile_picture]'
                    . '|mime_in[mobile_picture,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[mobile_picture,1000]',
            ],
            'title' => [
                'label' => 'Título',
                'rules' => 'required',
            ],
            'page_id' => [
                'label' => 'Página de exibição',
                'rules' => 'required'
            ],
            'show_order' => [
                'label' => 'Ordem de exibição',
                'rules' => 'required|integer|greater_than[0]|less_than['.$next_order.']',
            ],
            'starts_at' => [
                'label' => 'Data de ínicio',
                'rules' => 'required|valid_date'
            ],
            'ends_at' => [
                'label' => 'Data de término',
                'rules' => 'permit_empty|if_exist|valid_date'
            ]
        ];

        if (!$this->validate($validationRule)) {
            $message = $this->validator->listErrors();
            $success = false;
        } else {
            $desktop_picture = $this->request->getFile('desktop_picture');
            $mobile_picture = $this->request->getFile('mobile_picture');
            $title = $request->getPost('title');
            $link = $request->getPost('link');
            $link_target = $request->getPost('link_target');
            $show_order = $request->getPost('show_order');
            $starts_at = $request->getPost('starts_at');
            $ends_at = $request->getPost('ends_at');
            $status = $request->getPost('status');
            $status = $status ? $status : 0;
            
            if($desktop_picture->isValid() && !$desktop_picture->hasMoved()) {
                $desktop_random_name = $desktop_picture->getRandomName();
                $date = date('Ymd');

                if (!is_dir(PUBLIC_PATH."/uploads/banners/$date")) {
                    mkdir(PUBLIC_PATH."/uploads/banners/$date", 0777, TRUE);
                }

                $desktop_picture->move("uploads/banners/$date", $desktop_random_name);
                $desktop_picture_path = "uploads/banners/$date/$desktop_random_name";

                if($mobile_picture->isValid() && !$mobile_picture->hasMoved()) {
                    $mobile_random_name = $mobile_picture->getRandomName();
                    $mobile_picture->move("uploads/banners/$date", $mobile_random_name);
                    $mobile_picture_path = "uploads/banners/$date/$mobile_random_name";

                    try {
                        $bannerModel->update_all_orders_by_page_id((int)$show_order, $next_order, $page_id);
                        
                        $banner_id = $bannerModel->add($title, $desktop_picture_path, $mobile_picture_path, $link, $link_target, $show_order, $starts_at, $ends_at, $page_id, $status);
                        
                       /*  echo "<pre>";
                        print_r($banner_id);
                        echo "</pre>";

                        return null; */

                        if($banner_id) {
                            $message = "Banner Cadastrado com sucesso.";
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
            'show_order' => $request->getPost('show_order'),
            'page_id' => $request->getPost('page_id'),
            'starts_at' => $request->getPost('starts_at'),
            'ends_at' => $request->getPost('ends_at'),
            'link' => $request->getPost('link'),
            'link_target' => $request->getPost('link_target'),
            'status' => $request->getPost('status')
        );

        $response = array(
            'message' => $message,
            'success' => $success,
            'form_data' => $form_data
        );

        $session->setFlashdata('response', $response);

        if($success && $banner_id) {
            return redirect()->to('/admin/banners/edit/'.$banner_id);
        } else {
            return redirect()->to('/admin/banners/add_new');
        }
    }

    public function update_banner($banner_id) {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $request = \Config\Services::request();

        $bannerModel = model('App\Models\BannerModel', false);
        $banner = $bannerModel->get_by_id($banner_id);

        if(!isset($banner) || empty($banner) || !$banner) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $page_id = $request->getPost('page_id');

        $next_order = $bannerModel->get_next_order_by_page_id($page_id);

        if($next_order < 1) $next_order = 1;

        $validationRule = [
            'desktop_picture' => [
                'label' => 'Banner Desktop',
                'rules' => 'if_exist|uploaded[desktop_picture]'
                    . '|is_image[desktop_picture]'
                    . '|mime_in[desktop_picture,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[desktop_picture,1000]',
            ],
            'mobile_picture' => [
                'label' => 'Banner Mobile',
                'rules' => 'if_exist|uploaded[mobile_picture]'
                    . '|is_image[mobile_picture]'
                    . '|mime_in[mobile_picture,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[mobile_picture,1000]',
            ],
            'title' => [
                'label' => 'Título',
                'rules' => 'required',
            ],
            'page_id' => [
                'label' => 'Página de exibição',
                'rules' => 'required'
            ],
            'show_order' => [
                'label' => 'Ordem de exibição',
                'rules' => 'required|integer|greater_than[0]|less_than['.($next_order + 1).']',
            ],
            'starts_at' => [
                'label' => 'Data de ínicio',
                'rules' => 'required|valid_date'
            ],
            'ends_at' => [
                'label' => 'Data de término',
                'rules' => 'permit_empty|if_exist|valid_date'
            ]
        ];

        if (!$this->validate($validationRule)) {
            $message = $this->validator->listErrors();
            $success = false;
        } else {

            $desktop_picture = $this->request->getFile('desktop_picture');
            $mobile_picture = $this->request->getFile('mobile_picture');
            $title = $request->getPost('title');
            $link = $request->getPost('link');
            $link_target = $request->getPost('link_target');
            $show_order = $request->getPost('show_order');
            $starts_at = $request->getPost('starts_at');
            $ends_at = $request->getPost('ends_at');
            $status = $request->getPost('status');
            $status = $status ? $status : 0;
            
            $date = date('Ymd');

            if (!is_dir(PUBLIC_PATH."/uploads/banners/$date")) {
                mkdir(PUBLIC_PATH."/uploads/banners/$date", 0777, TRUE);
            }

            if(isset($desktop_picture) && !empty($desktop_picture) && $desktop_picture->isValid() && !$desktop_picture->hasMoved()) {
                $desktop_random_name = $desktop_picture->getRandomName();
                $desktop_picture->move("uploads/banners/$date", $desktop_random_name);
                $desktop_picture_path = "uploads/banners/$date/$desktop_random_name";
            } else {
                $desktop_picture_path = $banner->desktop_picture;
            }

            if(isset($mobile_picture) && !empty($mobile_picture) && $mobile_picture->isValid() && !$mobile_picture->hasMoved()) {
                $mobile_random_name = $mobile_picture->getRandomName();
                $mobile_picture->move("uploads/banners/$date", $mobile_random_name);
                $mobile_picture_path = "uploads/banners/$date/$mobile_random_name";
            } else {
                $mobile_picture_path = $banner->mobile_picture;
            }

            if((int)$show_order !== (int)$banner->show_order) {
                $bannerModel->update_all_orders_by_page_id((int)$show_order, (int)$banner->show_order, $page_id);
            }
            
            $bannerModel->update_banner($banner_id, $title, $desktop_picture_path, $mobile_picture_path, $link, $link_target, $show_order, $starts_at, $ends_at, $page_id, $status);
            $message = "Banner atualizado com sucesso!";
            $success = true;
        } 

        $response = array(
            'message' => $message,
            'success' => $success
        );

        $session->setFlashdata('response', $response);
        return redirect()->to('/admin/banners/edit/'.$banner_id);
    }
    
    public function remove_desktop_picture($banner_id) {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $bannerModel = model('App\Models\BannerModel', false);
        $banner = $bannerModel->get_by_id($banner_id);

        if(!isset($banner) || empty($banner) || !$banner) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $bannerModel->remove_desktop_picture($banner_id);

        return redirect()->to('/admin/banners/edit/'.$banner_id);
    }

    public function remove_mobile_picture($banner_id) {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $bannerModel = model('App\Models\BannerModel', false);
        $banner = $bannerModel->get_by_id($banner_id);

        if(!isset($banner) || empty($banner) || !$banner) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $bannerModel->remove_mobile_picture($banner_id);

        return redirect()->to('/admin/banners/edit/'.$banner_id);
    }

    public function delete($banner_id) {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();

        $bannerModel = model('App\Models\BannerModel', false);
        $banner = $bannerModel->get_by_id($banner_id);

        if(!isset($banner) || empty($banner) || !$banner) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $bannerModel->delete_banner($banner_id);

        $response = array(
            'message' => "Banner excluído com sucesso!",
            'success' => true
        );

        $session->setFlashdata('response', $response);

        return redirect()->to('/admin/banners?tab=tab-'.$banner->page_id);
    }
}
