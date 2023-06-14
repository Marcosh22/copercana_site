<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class OfferModel extends Model
{

    public function get_by_id($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('offers');
        $builder->where('id', $id);
        $query  = $builder->get();

        return $query->getRow();
    }

    public function get_total()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('offers');
        return $builder->countAllResults();
    }

    public function get_all($page=0, $limit=200)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('offers');
        $builder->orderBy('starts_at', 'DESC');
        $query  = $builder->get();

        return $query->getResult($limit, $page);
    }

    public function get_total_active()
    {
        $today = new Time('-3 hours', 'America/Sao_Paulo');

        $db      = \Config\Database::connect();
        $builder = $db->table('offers');

        $builder->where('ends_at >=', $today);
        $builder->where('status', 1);

        $builder->orWhere('ends_at', 0);
        $builder->where('status', 1);

        $builder->orWhere('ends_at IS NULL', NULL, FALSE);
        $builder->where('status', 1);

        return $builder->countAllResults();
    }

   /*  public function get_all_active()
    {
        $today = new Time('-3 hours', 'America/Sao_Paulo');

        $db      = \Config\Database::connect();
        $builder = $db->table('offers');

        $builder->where('ends_at >=', $today);
        $builder->where('starts_at <=', $today);
        $builder->where('status', 1);

        $builder->orWhere('ends_at >=', $today);
        $builder->where('starts_at', 0);
        $builder->where('status', 1);

        $builder->orWhere('ends_at >=', $today);
        $builder->where('starts_at IS NULL', NULL, FALSE);
        $builder->where('status', 1);

        $builder->orWhere('ends_at', 0);
        $builder->where('starts_at <=', $today);
        $builder->where('status', 1);

        $builder->orWhere('ends_at', 0);
        $builder->where('starts_at', 0);
        $builder->where('status', 1);

        $builder->orWhere('ends_at', 0);
        $builder->where('starts_at IS NULL', NULL, FALSE);
        $builder->where('status', 1);

        $builder->orWhere('ends_at IS NULL', NULL, FALSE);
        $builder->where('starts_at <=', $today);
        $builder->where('status', 1);

        $builder->orWhere('ends_at IS NULL', NULL, FALSE);
        $builder->where('starts_at', 0);
        $builder->where('status', 1);

        $builder->orWhere('ends_at IS NULL', NULL, FALSE);
        $builder->where('starts_at IS NULL', NULL, FALSE);
        $builder->where('status', 1);

        $query  = $builder->get();

        return $query->getResult();
    } */
    
    public function get_all_active()
    {
        $today = new Time('-3 hours', 'America/Sao_Paulo');

        $db      = \Config\Database::connect();
        $builder = $db->table('offers');

        $builder->where('ends_at >=', $today);
        $builder->where('starts_at <=', $today);
        $builder->where('status', 1);

        $builder->orWhere('ends_at IS NULL', NULL, FALSE);
        $builder->where('starts_at <=', $today);
        $builder->where('status', 1);

        $builder->orWhere('ends_at', 0);
        $builder->where('starts_at <=', $today);
        $builder->where('status', 1);

        $query  = $builder->get();

        return $query->getResult();
    }

    public function add($file, $cover, $title, $starts_at, $ends_at, $status = 0) {
        $db      = \Config\Database::connect();
        $builder = $db->table('offers');
        
        $data = [
            'file'  => $file,
            'cover'  => $cover,
            'title' => $title,
            'starts_at' => $starts_at,
            'ends_at' => $ends_at,
            'status' => $status
        ];
        
        if($builder->insert($data)) {
            return $db->insertID();
        } else {
            return $db->error();
        }
    }

    public function update_offer($id, $file, $cover, $title, $starts_at, $ends_at, $status = 0) {
        $db      = \Config\Database::connect();
        $builder = $db->table('offers');
        
        $data = [
            'file'  => $file,
            'cover'  => $cover,
            'title' => $title,
            'starts_at' => $starts_at,
            'ends_at' => $ends_at,
            'status' => $status
        ];

        $builder->where('id', $id);

        $builder->update($data);
        return true;
    }

    public function remove_file($id) {
        $db      = \Config\Database::connect();
        $builder = $db->table('offers');
        
        $data = [
            'file' => "",
            'cover' => ""
        ];

        $builder->where('id', $id);

        $builder->update($data);
        return true;
    }

    public function delete_offer($offer_id) {

        $db      = \Config\Database::connect();
        $builder = $db->table('offers');
        $builder->where('id', $offer_id);

        $builder->delete();

        return true;
    }
}