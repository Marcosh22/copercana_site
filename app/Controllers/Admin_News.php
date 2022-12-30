<?php

namespace App\Controllers;

class Admin_News extends BaseController
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

        $data = array(
            'page' => 'news',
            'session' => $session,
            'logged_user' => $this->ionAuth->user(),
            'ion_auth' => $this->ionAuth
        );
        
        echo view('admin/includes/header', $data);
        echo view('admin/news/index', $data);
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

        $categoryModel = model('App\Models\CategoryModel', false);
        $categories = $categoryModel->get_all();

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/news.js').'?v='.filemtime('_assets/admin/js/news.js').'"></script>'
        );

        $data['page'] = 'news-add_new';
        $data['categories'] = $categories;
        $data['session'] = $session;
        $data['footer_dependencies'] = $footer_dependencies;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/news/add_new', $data);
        echo view('admin/includes/footer', $data);
    }

    public function edit($post_id)
    {
        helper(['form']);

        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $postModel = model('App\Models\PostModel', false);
        $post = $postModel->get_by_id($post_id);

        $categoryModel = model('App\Models\CategoryModel', false);
        $categories = $categoryModel->get_all();

        if(!isset($post) || empty($post) || !$post) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/news.js').'?v='.filemtime('_assets/admin/js/news.js').'"></script>'
        );

        $data['footer_dependencies'] = $footer_dependencies;
        $data['page'] = 'news-edit';
        $data['session'] = $session;
        $data['categories'] = $categories;
        $data['post'] = $post;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/news/edit', $data);
        echo view('admin/includes/footer', $data);
    }

}
