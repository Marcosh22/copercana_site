<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class UnitModel extends Model
{

    public function get_by_id($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('units');
        $builder->where('id', $id);
        $query  = $builder->get();

        return $query->getRow();
    }

    public function get_all_by_type($type) {
        $db      = \Config\Database::connect();
        $builder = $db->table('units');
        $builder->where('type', $type);
        $builder->where('status', 1);
        $builder->orderBy('city', 'ASC');
        $query  = $builder->get();

        return $query->getResult();
    }

    public function add($picture, $city, $state, $address, $address_link, $opening_hours, $definition, $type, $status) {
        $db      = \Config\Database::connect();
        $builder = $db->table('units');
        
        $data = [
            'picture' => $picture,
            'city' => $city,
            'state' => $state,
            'address' => $address,
            'address_link' => $address_link,
            'opening_hours' => $opening_hours,
            'definition' => $definition,
            'type' => $type,
            'status' => $status
        ];
        
        if($builder->insert($data)) {
            return $db->insertID();
        } else {
            return $db->error();
        }
    }

    public function update_unit($id, $picture, $city, $state, $address, $address_link, $opening_hours, $definition, $type, $status) {
        $db      = \Config\Database::connect();
        $builder = $db->table('units');
        
        $data = [
            'picture' => $picture,
            'city' => $city,
            'state' => $state,
            'address' => $address,
            'address_link' => $address_link,
            'opening_hours' => $opening_hours,
            'definition' => $definition,
            'type' => $type,
            'status' => $status
        ];

        $builder->where('id', $id);

        $builder->update($data);
        return true;
    }

    public function remove_picture($id) {
        $db      = \Config\Database::connect();
        $builder = $db->table('units');
        
        $data = [
            'picture' => ""
        ];

        $builder->where('id', $id);

        $builder->update($data);
        return true;
    }

    public function delete_unit($unit_id) {

        $unit = $this->get_by_id($unit_id);

        $db      = \Config\Database::connect();
        $builder = $db->table('units');
        $builder->where('id', $unit_id);

        $builder->delete();

        return true;
    }
}