<?php

namespace App\Controllers;

class Admin_Blog extends BaseController
{
    public function __construct()
	{
		$this->ionAuth = new \IonAuth\Libraries\IonAuth();
	}

    public function index()
    {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin() && !$this->ionAuth->inGroup(2)) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();

        $data = array(
            'page' => 'blog',
            'session' => $session,
            'logged_user' => $this->ionAuth->user(),
            'ion_auth' => $this->ionAuth
        );
        
        echo view('admin/includes/header', $data);
        echo view('admin/blog/index', $data);
        echo view('admin/includes/footer', $data);
    }

    public function add_new()
    {
        helper(['form']);

        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin() && !$this->ionAuth->inGroup(2)) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();

        $categoryModel = model('App\Models\CategoryModel', false);
        $categories = $categoryModel->get_all();

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/blog.js').'?v='.filemtime('_assets/admin/js/blog.js').'"></script>'
        );

        $data['page'] = 'blog-add_new';
        $data['categories'] = $categories;
        $data['session'] = $session;
        $data['footer_dependencies'] = $footer_dependencies;
        $data['logged_user'] = $this->ionAuth->user();
        $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/blog/add_new', $data);
        echo view('admin/includes/footer', $data);
    }

    public function edit($post_id)
    {
        helper(['form']);

        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin() && !$this->ionAuth->inGroup(2)) {
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
            '<script src="'.base_url('_assets/admin/js/blog.js').'?v='.filemtime('_assets/admin/js/blog.js').'"></script>'
        );

        $data['footer_dependencies'] = $footer_dependencies;
        $data['page'] = 'blog-edit';
        $data['session'] = $session;
        $data['categories'] = $categories;
        $data['post'] = $post;
        $data['logged_user'] = $this->ionAuth->user();
        $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/blog/edit', $data);
        echo view('admin/includes/footer', $data);
    }

    public function categories()
    {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin() && !$this->ionAuth->inGroup(2)) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        
        $data = array(
            'page' => 'blog-categories',
            'session' => $session,
            'logged_user' => $this->ionAuth->user()
        );
        
        echo view('admin/includes/header', $data);
        echo view('admin/blog/categories-index', $data);
        echo view('admin/includes/footer', $data);
    }

    public function add_new_category()
    {
        helper(['form']);

        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin() && !$this->ionAuth->inGroup(2)) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();


        $data['page'] = 'blog-sector_add_new';
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
        $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/blog/category-add_new', $data);
        echo view('admin/includes/footer', $data);
    }

    public function edit_category($category_id)
    {
        helper(['form']);

        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin() && !$this->ionAuth->inGroup(2)) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $categoryModel = model('App\Models\CategoryModel', false);
        $category = $categoryModel->get_by_id($category_id);

        if(!isset($category) || empty($category) || !$category) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
        $data['page'] = 'blog-category_edit';
        $data['session'] = $session;
        $data['category'] = $category;
        $data['logged_user'] = $this->ionAuth->user();
        $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/blog/category-edit', $data);
        echo view('admin/includes/footer', $data);
    }

}
