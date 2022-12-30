<?php

namespace App\Models;

use CodeIgniter\Model;

class SessionModel extends Model
{

    public function get_by_id($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('ci_sessions');
        $builder->where('id', $id);
        $query  = $builder->get();

        return $query->getRow();
    }

}