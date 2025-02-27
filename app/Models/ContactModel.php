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
            'name' => $name,
            'email'  => $email,
            'cellphone'  => $cellphone,
            'city' => $city,
            'subject'  => $subject,
            'message'  => $message,
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
            'name' => $name,
            'registration'  => $registration,
            'cpf_cnpj'  => $cpf_cnpj,
            'city' => $city,
            'email'  => $email,
            'cellphone'  =>$cellphone,
            'telephone'  => $telephone,
            'lgpd_opt_in'  => $lgpd_opt_in
        ];
        
        if($builder->insert($data)) {
            return $db->insertID();
        } else {
            return null;
        }
    }

    public function updateCooperated($id, $name, $registration, $cpf_cnpj, $city, $email, $cellphone, $telephone) {
        $db      = \Config\Database::connect();
        $builder = $db->table('cooperated');
        
        $data = [
            'name' => $name,
            'registration'  => $registration,
            'cpf_cnpj'  => $cpf_cnpj,
            'city' => $city,
            'email'  => $email,
            'cellphone'  =>$cellphone,
            'telephone'  => $telephone
        ];
        
        $builder->where('id', $id);

        $builder->update($data);
        return true;
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

    public function bulk_delete_contact($contact_ids) {

        $db      = \Config\Database::connect();

        $builder = $db->table('contacts');
        $builder->whereIn('id', $contact_ids);

        return $builder->delete();
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

    public function bulk_delete_cooperated($contact_ids) {

        $db      = \Config\Database::connect();

        $builder = $db->table('cooperated');
        $builder->whereIn('id', $contact_ids);

        return $builder->delete();
    }
}