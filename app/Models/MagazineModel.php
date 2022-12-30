<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class MagazineModel extends Model
{

    public function get_by_id($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('magazines');
        $builder->where('id', $id);
        $query  = $builder->get();

        return $query->getRow();
    }

    public function get_total()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('magazines');
        return $builder->countAllResults();
    }

    public function get_all()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('magazines');
        $builder->orderBy('date', 'DESC');
        $query  = $builder->get();

        return $query->getResult();
    }

    public function get_total_active()
    {
        $today = new Time('now');

        $db      = \Config\Database::connect();
        $builder = $db->table('magazines');
        $builder->where('status', 1);

        return $builder->countAllResults();
    }

    public function get_all_active($page=0, $limit=200)
    {
        $today = new Time('now');

        $db      = \Config\Database::connect();
        $builder = $db->table('magazines');
        $builder->where('status', 1);
        $query  = $builder->get($limit, $page);

        return $query->getResult();
    }

    public function add($file, $cover, $title, $date, $status = 0) {
        $db      = \Config\Database::connect();
        $builder = $db->table('magazines');
        
        $data = [
            'file'  => $file,
            'cover'  => $cover,
            'title'  => $title,
            'date' => $date,
            'status' => $status
        ];
        
        if($builder->insert($data)) {
            return $db->insertID();
        } else {
            return $db->error();
        }
    }

    public function update_magazine($id, $file, $cover, $title, $date, $status = 0) {
        $db      = \Config\Database::connect();
        $builder = $db->table('magazines');
        
        $data = [
            'file'  => $file,
            'cover'  => $cover,
            'title'  => $title,
            'date' => $date,
            'status' => $status
        ];

        $builder->where('id', $id);

        $builder->update($data);
        return true;
    }

    public function remove_file($id) {
        $db      = \Config\Database::connect();
        $builder = $db->table('magazines');
        
        $data = [
            'file' => "",
            'cover' => ""
        ];

        $builder->where('id', $id);

        $builder->update($data);
        return true;
    }

    public function delete_magazine($magazine_id) {

        $magazine = $this->get_by_id($magazine_id);

        $db      = \Config\Database::connect();
        $builder = $db->table('magazines');
        $builder->where('id', $magazine_id);

        $builder->delete();

        return true;
    }
}