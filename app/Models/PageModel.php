<?php

namespace App\Models;

use CodeIgniter\Model;

class PageModel extends Model
{

    public function get_by_id($id) {
        $db      = \Config\Database::connect();
        $builder = $db->table('pages');

        $builder->where('id', $id);
        $builder->orderBy('id', 'DESC');
        $query  = $builder->get();

        return $query->getRow();
    }

    public function update_page($id, $title, $definition, $url, $view, $status) {
        $db      = \Config\Database::connect();
        $builder = $db->table('pages');
        
        $data = [
            'title'  => $title,
            'definition' => $definition,
            'url' => $url,
            'view'  => $view,
            'status' => $status
        ];

        $builder->where('id', $id);

        $builder->update($data);
        return true;
    }
}