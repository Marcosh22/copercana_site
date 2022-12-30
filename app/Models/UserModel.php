<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    public function update_user($id, $first_name, $last_name, $picture = "", $description = "", $website = "", $instagram = "", $facebook = "", $twitter = "", $youtube = "", $linkedin = "", $tiktok = "", $behance = "", $pinterest = "", $flickr = "", $github = "")
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        
        $data = [
            'first_name' => $first_name,
            'last_name'  => $last_name,
            'description' => $description,
            'picture' => $picture,
            'website' => $website,
            'instagram' => $instagram,
            'facebook' => $facebook,
            'twitter' => $twitter,
            'youtube' => $youtube,
            'linkedin' => $linkedin,
            'tiktok' => $tiktok,
            'behance' => $behance,
            'pinterest' => $pinterest,
            'flickr' => $flickr,
            'github' => $github
        ];

        $builder->where('id', $id);
        
        $builder->update($data);

        return true;
    }

    public function get_all()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->where('active', 1);
        $builder->orderBy('id', 'DESC');
        $query  = $builder->get();

        return $query->getResult();
    }

    public function get_all_active()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->where('active', 1);
        $builder->orderBy('id', 'DESC');
        $query  = $builder->get();

        return $query->getResult();
    }

    public function get_by_id($id) {
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->where('active', 1);
        $builder->where('id', $id);
        $query  = $builder->get();

        return $query->getRow();
    }

    public function get_active_by_id($id) {
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->where('id', $id);
        $builder->where('active', 1);
        $query  = $builder->get();

        return $query->getRow();
    }

    public function remove_picture($id) {
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        
        $data = [
            'picture' => ""
        ];

        $builder->where('id', $id);

        $builder->update($data);
        return true;
    }

    public function delete_user($id) {

        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        
        $data = [
            'active' => 0
        ];

        $builder->where('id', $id);

        $builder->update($data);
        return true;
    }
}