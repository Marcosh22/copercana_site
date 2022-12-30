<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class FuelFormModel extends Model
{

    public function get_by_id($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('fuel_forms');
        $builder->where('id', $id);
        $query  = $builder->get();

        return $query->getRow();
    }

    public function get_total()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('fuel_forms');
        return $builder->countAllResults();
    }

    public function get_all()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('fuel_forms');
        $builder->orderBy('id', 'DESC');
        $query  = $builder->get();

        return $query->getResult();
    }

    public function add($file, $title) {
        $db      = \Config\Database::connect();
        $builder = $db->table('fuel_forms');
        
        $data = [
            'file'  => $file,
            'title' => $title
        ];
        
        if($builder->insert($data)) {
            return $db->insertID();
        } else {
            return $db->error();
        }
    }

    public function update_form($id, $file, $title) {
        $db      = \Config\Database::connect();
        $builder = $db->table('fuel_forms');
        
        $data = [
            'file'  => $file,
            'title' => $title
        ];

        $builder->where('id', $id);

        $builder->update($data);
        return true;
    }

    public function remove_file($id) {
        $db      = \Config\Database::connect();
        $builder = $db->table('fuel_forms');
        
        $data = [
            'file' => ""
        ];

        $builder->where('id', $id);

        $builder->update($data);
        return true;
    }

    public function delete_form($form_id) {

        $form = $this->get_by_id($form_id);

        $db      = \Config\Database::connect();
        $builder = $db->table('fuel_forms');
        $builder->where('id', $form_id);

        $builder->delete();

        return true;
    }
}