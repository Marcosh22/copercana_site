<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{

    public function add($title) {
        $db      = \Config\Database::connect();
        $builder = $db->table('roles');
        
        $data = [
            'title'  => $title
        ];
        
        if($builder->insert($data)) {
            return $db->insertID();
        } else {
            return $db->error();
        }
    }

    public function update_role($id, $title) {
        $db      = \Config\Database::connect();
        $builder = $db->table('roles');
        
        $data = [
            'title'  => $title
        ];

        $builder->where('id', $id);

        $builder->update($data);
        return true;
    }

    public function get_all()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('roles');
        $builder->orderBy('title', 'ASC');
        $query  = $builder->get();

        return $query->getResult();
    }

    public function get_by_id($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('roles');
        $builder->where('id', $id);
        $query  = $builder->get();

        return $query->getRow();
    }

    public function get_total()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('roles');
        return $builder->countAllResults();
    }

    public function delete_role($role_id) {

        $role = $this->get_by_id($role_id);

        $db      = \Config\Database::connect();
        $builder = $db->table('roles');
        $builder->where('id', $role_id);

        $builder->delete();

        return true;
    }
}