<?php

namespace App\Models;

use CodeIgniter\Model;

class SubscribeModel extends Model
{
    public function add($name, $email, $cellphone, $city, $company, $ocupation, $person_type, $cpf_cnpj, $lgpd_opt_in)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('subscribes');
        
        $data = [
            'name' => $name,
            'email'  => $email,
            'cellphone'  => $cellphone,
            'city' => $city,
            'company'  => $company,
            'ocupation'  => $ocupation,
            'person_type'  => $person_type,
            'cpf_cnpj'  => $cpf_cnpj,
            'lgpd_opt_in'  => $lgpd_opt_in
        ];
        
        if($builder->insert($data)) {
            return $db->insertID();
        } else {
            return null;
        }
    }

    public function update_subscribe($id, $name, $email, $cellphone, $city, $company, $ocupation, $person_type, $cpf_cnpj, $lgpd_opt_in)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('subscribes');
        
        $data = [
            'name' => $name,
            'email'  => $email,
            'cellphone'  => $cellphone,
            'city' => $city,
            'company'  => $company,
            'ocupation'  => $ocupation,
            'person_type'  => $person_type,
            'cpf_cnpj'  => $cpf_cnpj,
            'lgpd_opt_in'  => $lgpd_opt_in
        ];
        
        $builder->where('id', $id);

        $builder->update($data);
        return true;
    }

    public function get_by_cpf_cnpj($cpf_cnpj)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('subscribes');
        $builder->where('cpf_cnpj', $cpf_cnpj);
        $query  = $builder->get();

        return $query->getRow();
    }

}