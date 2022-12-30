<?php

namespace App\Models;

use CodeIgniter\Model;

class BranchModel extends Model
{

    public function get_all()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('branches');
        $builder->orderBy('city', 'ASC');
        $query  = $builder->get();

        return $query->getResult();
    }
}