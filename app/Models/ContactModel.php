<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
    public function add($name, $email, $cellphone, $city, $subject, $message, $lgpd_opt_in)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('contacts');
        
        $data = [
            'name' => htmlentites($name),
            'email'  => htmlentites($email),
            'cellphone'  => htmlentites($cellphone),
            'city' => htmlentites($city),
            'subject'  => htmlentites($subject),
            'message'  => htmlentites($message),
            'lgpd_opt_in'  => $lgpd_opt_in
        ];
        
        if($builder->insert($data)) {
            return $db->insertID();
        } else {
            return null;
        }
    }

    public function addCooperated($name, $registration, $cpf_cnpj, $city, $email, $cellphone, $telephone, $lgpd_opt_in) {
        $db      = \Config\Database::connect();
        $builder = $db->table('cooperated');
        
        $data = [
            'name' => htmlentites($name),
            'registration'  => htmlentites($registration),
            'cpf_cnpj'  => htmlentites($cpf_cnpj),
            'city' => htmlentites($city),
            'email'  => htmlentites($email),
            'cellphone'  =>htmlentites($cellphone),
            'telephone'  => htmlentites($telephone),
            'lgpd_opt_in'  => $lgpd_opt_in
        ];
        
        if($builder->insert($data)) {
            return $db->insertID();
        } else {
            return null;
        }
    }

    public function get_all()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('contacts');

        $builder->orderBy('created_at', 'DESC');
        $query  = $builder->get();

        return $query->getResult();
    }

    public function get_by_id($id) {
        $db      = \Config\Database::connect();
        $builder = $db->table('contacts');

        $builder->where('id', $id);
        $builder->orderBy('id', 'DESC');
        $query  = $builder->get();

        return $query->getRow();
    }

    public function delete_contact($contact_id) {

        $db      = \Config\Database::connect();

        $builder = $db->table('contacts');
        $builder->where('id', $contact_id);

        $builder->delete();

        return true;
    }

    public function get_cooperated_by_id($id) {
        $db      = \Config\Database::connect();
        $builder = $db->table('cooperated');

        $builder->where('id', $id);
        $builder->orderBy('id', 'DESC');
        $query  = $builder->get();

        return $query->getRow();
    }

    public function delete_cooperated($contact_id) {

        $db      = \Config\Database::connect();

        $builder = $db->table('cooperated');
        $builder->where('id', $contact_id);

        $builder->delete();

        return true;
    }
}