<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    protected $table      = 'posts';

    public function add($title, $cover, $thumbnail, $content, $excerpt, $category_id, $author_id, $page_title, $page_description, $page_tags, $slug, $status, $redirect)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('posts');
        
        $data = [
            'title' => $title,
            'cover'  => $cover,
            'thumbnail'  => $thumbnail,
            'content'  => $content,
            'excerpt' => $excerpt,
            'category_id'  => $category_id,
            'author_id'  => $author_id,
            'page_title'  => $page_title,
            'page_description' => $page_description,
            'page_tags' => $page_tags,
            'slug' => $slug,
            'status' => $status,
            'redirect' => $redirect
        ];
        
        if($builder->insert($data)) {
            return $db->insertID();
        } else {
            return null;
        }
    }

    public function update_post($id, $title, $cover, $thumbnail, $content, $excerpt, $category_id, $author_id, $page_title, $page_description, $page_tags, $slug, $status, $redirect)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('posts');
        
        $data = [
            'title' => $title,
            'cover'  => $cover,
            'thumbnail'  => $thumbnail,
            'content'  => $content,
            'excerpt' => $excerpt,
            'category_id'  => $category_id,
            'author_id'  => $author_id,
            'page_title'  => $page_title,
            'page_description' => $page_description,
            'page_tags' => $page_tags,
            'slug' => $slug,
            'status' => $status,
            'redirect' => $redirect
        ];

        $builder->where('id', $id);
        
        $builder->update($data);

        return true;
    }

    public function get_all($page=0, $limit=200)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('posts');

        $builder->select('posts.*, categories.title as category, CONCAT(users.first_name, " ", users.last_name) as author');
        $builder->join('categories', 'categories.id = posts.category_id');
        $builder->join('users', 'users.id = posts.author_id');

        $builder->orderBy('posts.id', 'DESC');
        $query  = $builder->get($limit, $page);

        return $query->getResult();
    }
    
    public function get_all_published($page=0, $limit=200) {
        $db      = \Config\Database::connect();
        $builder = $db->table('posts');
        $builder->where('status', 'published');
        $builder->orderBy('id', 'DESC');
        $query  = $builder->get($limit, $page);

        return $query->getResult();
    }

    public function get_others_published($post_id, $page=0, $limit=200) {
        $db      = \Config\Database::connect();
        $builder = $db->table('posts');
        $builder->where('id <>', $post_id);
        $builder->where('status', 'published');
        $builder->orderBy('id', 'DESC');
        $query  = $builder->get($limit, $page);

        return $query->getResult();
    }

    public function get_all_by_category($category_id, $page=0, $limit=200) {
        $db      = \Config\Database::connect();
        $builder = $db->table('posts');
        $builder->where('category_id', $category_id);
        $builder->orderBy('id', 'DESC');
        $query  = $builder->get($limit, $page);

        return $query->getResult();
    }

    public function get_all_published_by_category($category_id, $page=0, $limit=200) {
        $db      = \Config\Database::connect();
        $builder = $db->table('posts');
        $builder->where('status', 'published');
        $builder->where('category_id', $category_id);
        $builder->orderBy('id', 'DESC');
        $query  = $builder->get($limit, $page);

        return $query->getResult();
    }

    public function get_total()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('posts');
        $builder->orderBy('id', 'DESC');
        return $builder->countAllResults();
    }
    
    public function get_total_published() {
        $db      = \Config\Database::connect();
        $builder = $db->table('posts');
        $builder->where('status', 'published');
        $builder->orderBy('id', 'DESC');
        return $builder->countAllResults();
    }

    public function get_total_by_category($category_id) {
        $db      = \Config\Database::connect();
        $builder = $db->table('posts');
        $builder->where('category_id', $category_id);
        $builder->orderBy('id', 'DESC');
        return $builder->countAllResults();
    }

    public function get_total_published_by_category($category_id) {
        $db      = \Config\Database::connect();
        $builder = $db->table('posts');
        $builder->where('status', 'published');
        $builder->where('category_id', $category_id);
        $builder->orderBy('id', 'DESC');
        return $builder->countAllResults();
    }

    public function get_by_slug($slug) {
        $db      = \Config\Database::connect();
        $builder = $db->table('posts');
        $builder->where('slug', $slug);
        $builder->orderBy('id', 'DESC');
        $query  = $builder->get();

        return $query->getRow();
    }

    public function get_by_id($id) {
        $db      = \Config\Database::connect();
        $builder = $db->table('posts');
        $builder->where('id', $id);
        $builder->orderBy('id', 'DESC');
        $query  = $builder->get();

        return $query->getRow();
    }

    public function get_published_by_slug($slug) {
        $db      = \Config\Database::connect();
        $builder = $db->table('posts');
        $builder->where('slug', $slug);
        $builder->where('status', 'published');
        $builder->orderBy('id', 'DESC');
        $query  = $builder->get();

        return $query->getRow();
    }

    public function get_published_by_category_and_slug($category_id, $slug) {
        $db      = \Config\Database::connect();
        $builder = $db->table('posts');
        $builder->where('category_id', $category_id);
        $builder->where('slug', $slug);
        $builder->where('status', 'published');
        $builder->orderBy('id', 'DESC');
        $query  = $builder->get();

        return $query->getRow();
    }

    public function remove_cover($id) {
        $db      = \Config\Database::connect();
        $builder = $db->table('posts');
        
        $data = [
            'cover' => "",
            'thumbnail' => ""
        ];

        $builder->where('id', $id);

        $builder->update($data);
        return true;
    }

    public function delete_post($post_id) {

        $db      = \Config\Database::connect();

        $builder = $db->table('posts');
        $builder->where('id', $post_id);

        $builder->delete();

        return true;
    }

    public function add_category() {
        if (!$this->ionAuth->loggedIn())
		{
			return redirect()->to('/auth/login');
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
        if (!$this->ionAuth->loggedIn())
		{
			return redirect()->to('/auth/login');
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
        if (!$this->ionAuth->loggedIn())
		{
			return redirect()->to('/auth/login');
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