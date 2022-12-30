<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    public function add($title, $slug)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('categories');
        
        $data = [
            'title' => $title,
            'slug' => $slug
        ];
        
        if($builder->insert($data)) {
            return $db->insertID();
        } else {
            return null;
        }
    }

    public function update_category($id, $title, $slug)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('categories');
        
        $data = [
            'title' => $title,
            'slug' => $slug
        ];

        $builder->where('id', $id);
        
        $builder->update($data);

        return true;
    }

    public function get_all()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('categories');
        $builder->where('id <>', 1);
        $builder->orderBy('title', 'ASC');
        $query  = $builder->get();

        return $query->getResult();
    }

    public function get_by_slug($slug) {
        $db      = \Config\Database::connect();
        $builder = $db->table('categories');
        $builder->where('id <>', 1);
        $builder->where('slug', $slug);
        $query  = $builder->get();

        return $query->getRow();
    }

    public function get_by_id($id) {
        $db      = \Config\Database::connect();
        $builder = $db->table('categories');
        $builder->where('id <>', 1);
        $builder->where('id', $id);
        $query  = $builder->get();

        return $query->getRow();
    }

    public function delete_category($id) {

        $db      = \Config\Database::connect();

        $builder = $db->table('categories');
        $builder->where('id', $id);

        $builder->delete();

        return true;
    }
}