<?php

namespace App\Controllers;

use CodeIgniter\Files\File;
use CodeIgniter\I18n\Time;

class Admin_Post extends BaseController
{
    protected $helpers = ['form'];
    private $slug_counter = 0;
    private $ionAuth;

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

        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    public function add_post() {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin() && !$this->ionAuth->inGroup(2)) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $request = \Config\Services::request();

        $contact_rules  = [
            'title' => [
                'rules' => 'required', 
                'errors' => [
                    'required' => 'O campo \'Título\' é obrigatório.',
                ]
            ],
            'cover' => [
                'label' => 'Imagem de capa',
                'rules' => 'uploaded[cover]'
                    . '|is_image[cover]'
                    . '|mime_in[cover,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[cover, 2048]',
            ],
            'excerpt' => [
                'rules' => 'required', 
                'errors' => [
                    'required' => 'O campo \'Resumo\' é obrigatório.',
                ]
            ],
            'category_id' => [
                'rules' => 'required|integer', 
                'errors' => [
                    'required' => 'O campo \'Categoria\' é obrigatório',
                    'integer' => 'O campo \'Categoria\' deve ser um número inteiro.',
                ]
            ],
            'author_id' => [
                'rules' => 'required|integer', 
                'errors' => [
                    'required' => 'O campo \'Autor\' é obrigatório',
                    'integer' => 'O campo \'Autor\' deve ser um número inteiro.',
                ]
            ],
            'status' => [
                'rules' => 'required|in_list[draft,published]', 
                'errors' => [
                    'required' => 'O campo \'Status\' é obrigatório',
                    'in_list' => 'O campo \'Status\' permite apenas os valores rascunho ou publicado.',
                ]
            ]
        ];

        if (!$this->validate($contact_rules)) {
           $message = $this->validator->listErrors();
           $success = false;
        } else {

            $cover = $this->request->getFile('cover');

            if ($cover->isValid() && !$cover->hasMoved()) {

                $random_name = $cover->getRandomName();

                $date = date('Ymd');
    
                $cover_path = "uploads/posts/$date/$random_name";
                $thumbnail_path = "uploads/posts/$date/thumb-$random_name";

                if (!is_dir(PUBLIC_PATH."/uploads/posts/$date")) {
                    mkdir(PUBLIC_PATH."/uploads/posts/$date", 0777, TRUE);
                }
                
                $image = \Config\Services::image()
                    ->withFile($cover)
                    ->fit(350, 200, 'center')
                    ->save(FCPATH . $thumbnail_path);

                $cover->move("uploads/posts/$date", $random_name);
                
                $title = $request->getPost('title');
                $cover = $request->getPost('cover');
                $excerpt = $request->getPost('excerpt');
                $category_id = $request->getPost('category_id');
                $author_id = $request->getPost('author_id');
                $content = $request->getPost('content');
                $page_title = $request->getPost('page_title');
                $page_description = $request->getPost('page_description');
                $page_tags = $request->getPost('page_tags');
                $status = $request->getPost('status');
                $redirect = $request->getPost('redirect');
                $slug = $this->create_slug_from_post_title($title);

                $show_at_blog_and_news = $request->getPost('show_at_blog_and_news');
                $show_at_blog_and_news = $show_at_blog_and_news ? $show_at_blog_and_news : 0;

                try {
                    $postModel = model('App\Models\PostModel', false);
                    $post_id = $postModel->add($title, $cover_path, $thumbnail_path, $content, $excerpt, $category_id, $author_id, $page_title, $page_description, $page_tags, $slug, $status, $redirect, $show_at_blog_and_news);
    
                    if($post_id) {
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
        }

        $form_data = array(
            'title' => $request->getPost('title'),
            'cover' => $request->getPost('cover'),
            'excerpt' => $request->getPost('excerpt'),
            'category_id' => $request->getPost('category_id'),
            'author_id' => $request->getPost('author_id'),
            'content' => $request->getPost('content'),
            'page_title' => $request->getPost('page_title'),
            'page_description' => $request->getPost('page_description'),
            'page_tags' => $request->getPost('page_tags'),
            'status' => $request->getPost('status'),
            'redirect' => $request->getPost('redirect')
        );

        $response = array(
            'message' => $message,
            'success' => $success,
            'form_data' => $form_data
        );

        $session->setFlashdata('response', $response);

        $path = $request->getPost('category_id') == 1 ? 'news' : 'blog';

        if($success && $post_id) {
            return redirect()->to("/admin/$path/edit/$post_id");
        } else {
            return redirect()->to("/admin/$path/add_new");
        }
    }

    public function update_post($post_id) {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin() && !$this->ionAuth->inGroup(2)) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $request = \Config\Services::request();

        $contact_rules  = [
            'title' => [
                'rules' => 'required', 
                'errors' => [
                    'required' => 'O campo \'Título\' é obrigatório.',
                ]
            ],
            'cover' => [
                'label' => 'Imagem de capa',
                'rules' => 'if_exist|uploaded[cover]'
                    . '|is_image[cover]'
                    . '|mime_in[cover,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[cover, 2048]',
            ],
            'excerpt' => [
                'rules' => 'required', 
                'errors' => [
                    'required' => 'O campo \'Resumo\' é obrigatório.',
                ]
            ],
            'category_id' => [
                'rules' => 'required|integer', 
                'errors' => [
                    'required' => 'O campo \'Categoria\' é obrigatório',
                    'integer' => 'O campo \'Categoria\' deve ser um número inteiro.',
                ]
            ],
            'status' => [
                'rules' => 'required|in_list[draft,published]', 
                'errors' => [
                    'required' => 'O campo \'Status\' é obrigatório',
                    'in_list' => 'O campo \'Status\' permite apenas os valores rascunho ou publicado.',
                ]
            ]
        ];

        $postModel = model('App\Models\PostModel', false);
        $post = $postModel->get_by_id($post_id);

        if(!isset($post) || empty($post) || !$post) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        if (!$this->validate($contact_rules)) {
           $message = $this->validator->listErrors();
           $success = false;
        } else {

            $cover = $this->request->getFile('cover');
            $title = $request->getPost('title');
            $excerpt = $request->getPost('excerpt');
            $category_id = $request->getPost('category_id');
            $author_id = $post->author_id;
            $content = $request->getPost('content');
            $page_title = $request->getPost('page_title');
            $page_description = $request->getPost('page_description');
            $page_tags = $request->getPost('page_tags');
            $status = $request->getPost('status');
            $redirect = $request->getPost('redirect');
            $slug = $post->slug;

            $show_at_blog_and_news = $request->getPost('show_at_blog_and_news');
            $show_at_blog_and_news = $show_at_blog_and_news ? $show_at_blog_and_news : 0;

            if(isset($cover) && !empty($cover) && $cover->isValid() && !$cover->hasMoved()) {
                $random_name = $cover->getRandomName();
                $date = date('Ymd');
                $cover_path = "uploads/posts/$date/$random_name";

                $thumbnail_path = "uploads/posts/$date/thumb-$random_name";

                if (!is_dir(PUBLIC_PATH."/uploads/posts/$date")) {
                    mkdir(PUBLIC_PATH."/uploads/posts/$date", 0777, TRUE);
                }

                $image = \Config\Services::image()
                    ->withFile($cover)
                    ->fit(350, 200, 'center')
                    ->save(FCPATH . $thumbnail_path);

                $cover->move("uploads/posts/$date", $random_name);

            } else {
                $cover_path = $post->cover;
                $thumbnail_path = $post->thumbnail;
            }

            $published_at = $post->created_at;

            if($post->status === 'draft' && $status === 'published') {
                $published_at = new Time('now', 'America/Sao_Paulo');
            }

            $postModel->update_post($post_id, $title, $cover_path, $thumbnail_path, $content, $excerpt, $category_id, $author_id, $page_title, $page_description, $page_tags, $slug, $status, $redirect, $published_at, $show_at_blog_and_news);
            $message = "Publicação atualizada com sucesso!";
            $success = true;
        }

        $path = $category_id == 1 ? 'news' : 'blog';

        $response = array(
            'message' => $message,
            'success' => $success
        );

        $session->setFlashdata('response', $response);

        return redirect()->to("/admin/$path/edit/$post_id");
    }

    public function upload_image()
    {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin() && !$this->ionAuth->inGroup(2)) {
            return redirect()->to('/admin');
        }

        $validationRule = [
            'upload' => [
                'label' => 'Image File',
                'rules' => 'uploaded[upload]'
                    . '|is_image[upload]'
                    . '|mime_in[upload,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
            ],
        ];

        if (!$this->validate($validationRule)) {
            $images_urls = array(
                "error" => array(
                    "message" => $this->validator->getErrors()
                )
            );
        } else {
            $images_urls = array(
                "url" =>  "img.jpg"
            );
        }

        $img = $this->request->getFile('upload');

        if ($img->isValid() && !$img->hasMoved()) {
            
            $random_name = $img->getRandomName();

            $date = date('Ymd');

            $img->move("uploads/posts/$date", $random_name);

            $images_urls = array(
                "url" => base_url("uploads/posts/$date/$random_name")
            );
        } else {
            $images_urls = array(
                "error" => array(
                    "message" => 'The file has already been moved.'
                )
            );
        }
        return $this->response->setJSON($images_urls);
    }

    private function create_slug_from_post_title($post_title) {
        $slug = $this->slugify($post_title);

        $postModel = model('App\Models\PostModel', false);
        $post = $postModel->get_by_slug($slug);

        if($post) {
            $this->slug_counter++;
            return $this->create_slug_from_post_title($post_title."-".$this->slug_counter);
        } else {
            $this->slug_counter = 0;
            return $slug;
        }
    }

    private function create_slug_from_category_title($category_title) {
        $slug = $this->slugify($category_title);

        $categoryModel = model('App\Models\CategoryModel', false);
        $category = $categoryModel->get_by_slug($slug);

        if($category) {
            $this->slug_counter++;
            return $this->create_slug_from_post_title($category_title."-".$this->slug_counter);
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

    public function remove_cover($post_id) {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin() && !$this->ionAuth->inGroup(2)) {
            return redirect()->to('/admin');
        }

        $postModel = model('App\Models\PostModel', false);
        $post = $postModel->get_by_id($post_id);
        $category_id = $post->category_id;

        if(!isset($post) || empty($post) || !$post) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $path = $category_id == 1 ? 'news' : 'blog';

        $postModel->remove_cover($post_id);

        return redirect()->to("/admin/$path/edit/$post_id");
    }

    public function delete($post_id) {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin() && !$this->ionAuth->inGroup(2)) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();

        $postModel = model('App\Models\PostModel', false);
        $post = $postModel->get_by_id($post_id);
        $category_id = $post->category_id;

        if(!isset($post) || empty($post) || !$post) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $postModel->delete_post($post_id);

        $path = $category_id == 1 ? 'news' : 'blog';

        $response = array(
            'message' => "Publicação excluída com sucesso!",
            'success' => true
        );

        $session->setFlashdata('response', $response);

        return redirect()->to("/admin/$path");
    }

    public function add_category() {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin() && !$this->ionAuth->inGroup(2)) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $request = \Config\Services::request();

        $contact_rules  = [
            'title' => [
                'rules' => 'required', 
                'errors' => [
                    'required' => 'O campo \'Título\' é obrigatório.',
                ]
            ]
        ];

        if (!$this->validate($contact_rules)) {
           $message = $this->validator->listErrors();
           $success = false;
        } else {

            $title = $request->getPost('title');
            $slug = $this->create_slug_from_category_title($title);

            try {
                $categoryModel = model('App\Models\CategoryModel', false);
                $category_id = $categoryModel->add($title, $slug);

                if($category_id) {
                    $message = "Categoria cadastrada com sucesso.";
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
            'title' => $request->getPost('title')
        );

        $response = array(
            'message' => $message,
            'success' => $success,
            'form_data' => $form_data
        );

        $session->setFlashdata('response', $response);

        if($success && $category_id) {
            return redirect()->to('/admin/blog/edit_category/'.$category_id);
        } else {
            return redirect()->to('/admin/blog/add_new_category');
        }
    }

    public function update_category($category_id) {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin() && !$this->ionAuth->inGroup(2)) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $request = \Config\Services::request();

        $contact_rules  = [
            'title' => [
                'rules' => 'required', 
                'errors' => [
                    'required' => 'O campo \'Título\' é obrigatório.',
                ]
            ]
        ];

        $categoryModel = model('App\Models\CategoryModel', false);
        $category = $categoryModel->get_by_id($category_id);

        if(!isset($category) || empty($category) || !$category) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        if (!$this->validate($contact_rules)) {
           $message = $this->validator->listErrors();
           $success = false;
        } else {

            $title = $request->getPost('title');
            $slug = $category->slug;

            $categoryModel->update_category($category_id, $title, $slug);
            $message = "Categoria atualizada com sucesso!";
            $success = true;
        }

        $response = array(
            'message' => $message,
            'success' => $success
        );

        $session->setFlashdata('response', $response);

        return redirect()->to('/admin/blog/edit_category/'.$category_id);
    }

    public function delete_category($category_id) {
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

        $categoryModel->delete_category($category_id);

        $response = array(
            'message' => "Categoria excluída com sucesso!",
            'success' => true
        );

        $session->setFlashdata('response', $response);

        return redirect()->to('/admin/blog/categories');
    }
    
}
