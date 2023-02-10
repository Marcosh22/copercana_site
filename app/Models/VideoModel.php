<?php

namespace App\Models;

use CodeIgniter\Model;

class VideoModel extends Model
{
    public function add($url, $title, $subtitle)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('videos');
        
        $data = [
            'url' => $url,
            'title' => $title,
            'subtitle' => $subtitle
        ];
        
        if($builder->insert($data)) {
            return $db->insertID();
        } else {
            return null;
        }
    }

    public function update_video($id, $url, $title, $subtitle)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('videos');
        
        $data = [
            'url' => $url,
            'title' => $title,
            'subtitle' => $subtitle
        ];

        $builder->where('id', $id);
        
        $builder->update($data);

        return true;
    }

    public function get_all()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('videos');
        $builder->orderBy('created_at', 'DESC');
        $query  = $builder->get();

        return $query->getResult();
    }


    public function get_by_id($id) {
        $db      = \Config\Database::connect();
        $builder = $db->table('videos');
        $builder->where('id', $id);
        $query  = $builder->get();

        return $query->getRow();
    }

    public function delete_video($id) {

        $db      = \Config\Database::connect();

        $builder = $db->table('videos');
        $builder->where('id', $id);

        $builder->delete();

        return true;
    }
}