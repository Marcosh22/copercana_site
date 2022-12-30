<?php

namespace App\Models;

use CodeIgniter\Model;

class AccessModel extends Model
{
    public function add($subscribe_id, $session_id, $page) {
        $db      = \Config\Database::connect();
        $builder = $db->table('access');
        
        $data = [
            'subscribe_id'  => $subscribe_id,
            'session_id' => $session_id,
            'page' => $page,
        ];
        
        if($builder->insert($data)) {
            return $db->insertID();
        } else {
            return $db->error();
        }
    }

    public function update_subscribe_id_by_session_id($session_id, $subscribe_id) {
        $db      = \Config\Database::connect();
        $builder = $db->table('access');
        
        $data = [
            'subscribe_id' => $subscribe_id
        ];
        
        $builder->where('session_id', $session_id);

        $builder->update($data);
        return true;
    }

}