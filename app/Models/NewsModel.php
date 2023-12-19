<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table      = 'posts';

    public function get_all($page=0, $limit=200)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('posts');

        $builder->select('posts.*, categories.title as category, CONCAT(users.first_name, " ", users.last_name) as author');
        $builder->join('categories', 'categories.id = posts.category_id');
        $builder->join('users', 'users.id = posts.author_id');
        $builder->where('posts.category_id', 1);

        $builder->orderBy('posts.id', 'DESC');
        $query  = $builder->get($limit, $page);

        return $query->getResult();
    }
    
    public function get_all_published($page=0, $limit=200) {
        $db      = \Config\Database::connect();
        $builder = $db->table('posts');

        $builder->select('posts.*, categories.title as category, categories.slug as category_slug, CONCAT(users.first_name, " ", users.last_name) as author');
        $builder->join('categories', 'categories.id = posts.category_id');
        $builder->join('users', 'users.id = posts.author_id');
        
        $builder->where('posts.category_id', 1);
        $builder->where('sposts.tatus', 'published');

        $builder->orWhere('posts.show_at_blog_and_news', 1);
        $builder->where('posts.status', 'published');

        $builder->orderBy('id', 'DESC');
        $query  = $builder->get($limit, $page);

        return $query->getResult();
    }

    public function get_others_published($post_id, $page=0, $limit=200) {
        $db      = \Config\Database::connect();
        $builder = $db->table('posts');
        $builder->where('id <>', $post_id);
        $builder->where('status', 'published');
        $builder->where('posts.category_id', 1);
        $builder->orderBy('id', 'DESC');
        $query  = $builder->get($limit, $page);

        return $query->getResult();
    }

    public function get_all_by_category($category_id, $page=0, $limit=200) {
        $db      = \Config\Database::connect();
        $builder = $db->table('posts');
        $builder->where('category_id', $category_id);
        $builder->where('posts.category_id', 1);
        $builder->orderBy('id', 'DESC');
        $query  = $builder->get($limit, $page);

        return $query->getResult();
    }

    public function get_all_published_by_category($category_id, $page=0, $limit=200) {
        $db      = \Config\Database::connect();
        $builder = $db->table('posts');
        $builder->where('status', 'published');
        $builder->where('category_id', $category_id);
        $builder->where('posts.category_id', 1);
        $builder->orderBy('id', 'DESC');
        $query  = $builder->get($limit, $page);

        return $query->getResult();
    }

    public function get_total()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('posts');
        $builder->where('posts.category_id', 1);
        $builder->orderBy('id', 'DESC');
        return $builder->countAllResults();
    }
    
    public function get_total_published() {
        $db      = \Config\Database::connect();
        $builder = $db->table('posts');
        $builder->where('posts.status', 'published');
        $builder->where('posts.category_id', 1);

        $builder->orWhere('posts.show_at_blog_and_news', 1);
        $builder->where('posts.status', 'published');

        $builder->orderBy('id', 'DESC');
        return $builder->countAllResults();
    }

    public function get_total_by_category($category_id) {
        $db      = \Config\Database::connect();
        $builder = $db->table('posts');
        $builder->where('category_id', $category_id);
        $builder->where('posts.category_id', 1);
        $builder->orderBy('id', 'DESC');
        return $builder->countAllResults();
    }

    public function get_total_published_by_category($category_id) {
        $db      = \Config\Database::connect();
        $builder = $db->table('posts');
        $builder->where('status', 'published');
        $builder->where('category_id', $category_id);
        $builder->where('posts.category_id', 1);
        $builder->orderBy('id', 'DESC');
        return $builder->countAllResults();
    }

    public function get_by_slug($slug) {
        $db      = \Config\Database::connect();
        $builder = $db->table('posts');
        $builder->where('slug', $slug);
        $builder->where('posts.category_id', 1);
        $builder->orderBy('id', 'DESC');
        $query  = $builder->get();

        return $query->getRow();
    }

    public function get_by_id($id) {
        $db      = \Config\Database::connect();
        $builder = $db->table('posts');
        $builder->where('id', $id);
        $builder->where('posts.category_id', 1);
        $builder->orderBy('id', 'DESC');
        $query  = $builder->get();

        return $query->getRow();
    }

    public function get_published_by_slug($slug) {
        $db      = \Config\Database::connect();
        $builder = $db->table('posts');
        $builder->where('slug', $slug);
        $builder->where('status', 'published');
        $builder->where('posts.category_id', 1);
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
        $builder->where('posts.category_id', 1);
        $builder->orderBy('id', 'DESC');
        $query  = $builder->get();

        return $query->getRow();
    }
}