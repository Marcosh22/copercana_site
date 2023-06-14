<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class FileModel extends Model
{

    public function get_by_id($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('files');
        $builder->where('id', $id);
        $query  = $builder->get();

        return $query->getRow();
    }

    public function get_total()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('files');
        return $builder->countAllResults();
    }

    public function get_all()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('files');
        $builder->orderBy('created_at', 'DESC');
        $query  = $builder->get();

        return $query->getResult();
    }

    public function get_total_active()
    {
        $today = new Time('now', 'America/Sao_Paulo');

        $db      = \Config\Database::connect();
        $builder = $db->table('files');

        return $builder->countAllResults();
    }

    public function get_all_active($page=0, $limit=200)
    {
        $today = new Time('now', 'America/Sao_Paulo');

        $db      = \Config\Database::connect();
        $builder = $db->table('files');
        $query  = $builder->get($limit, $page);

        return $query->getResult();
    }

    public function add($file, $cover, $title, $subtitle) {
        $db      = \Config\Database::connect();
        $builder = $db->table('files');
        
        $data = [
            'file'  => $file,
            'cover'  => $cover,
            'title'  => $title,
            'subtitle' => $subtitle
        ];
        
        if($builder->insert($data)) {
            return $db->insertID();
        } else {
            return $db->error();
        }
    }

    public function update_file($id, $file, $cover, $title, $subtitle) {
        $db      = \Config\Database::connect();
        $builder = $db->table('files');
        
        $data = [
            'file'  => $file,
            'cover'  => $cover,
            'title'  => $title,
            'subtitle' => $subtitle,
        ];

        $builder->where('id', $id);

        $builder->update($data);
        return true;
    }

    public function remove_file($id) {
        $db      = \Config\Database::connect();
        $builder = $db->table('files');
        
        $data = [
            'file' => "",
        ];

        $builder->where('id', $id);

        $builder->update($data);
        return true;
    }

    public function remove_cover($id) {
        $db      = \Config\Database::connect();
        $builder = $db->table('files');
        
        $data = [
            'cover' => "",
        ];

        $builder->where('id', $id);

        $builder->update($data);
        return true;
    }

    public function delete_file($file_id) {

        $file = $this->get_by_id($file_id);

        $db      = \Config\Database::connect();
        $builder = $db->table('files');
        $builder->where('id', $file_id);

        $builder->delete();

        return true;
    }
}