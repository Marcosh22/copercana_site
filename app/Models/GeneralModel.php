<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class GeneralModel extends Model
{

    public function get_by_id($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('general');
        $builder->where('id', $id);
        $query  = $builder->get();

        return $query->getRow();
    }

    public function update_general($id, $address, $address_link, $address_iframe, $phone, $radio, $facebook, $instagram, $youtube, $linkedin, $socials, $contact_emails, $contacts_subject, $footer_legal_text, $head_html, $body_html, $footer_html) {
        $db      = \Config\Database::connect();
        $builder = $db->table('general');
        
        $data = [
            'address' => $address, 
            'address_link' => $address_link, 
            'address_iframe' => $address_iframe, 
            'phone' => $phone, 
            'radio' => $radio, 
            'facebook' => $facebook, 
            'instagram' => $instagram, 
            'youtube' => $youtube, 
            'linkedin' => $linkedin, 
            'socials' => $socials, 
            'contact_emails' => $contact_emails, 
            'contacts_subject' => $contacts_subject, 
            'footer_legal_text' => $footer_legal_text, 
            'head_html' => $head_html, 
            'body_html' => $body_html, 
            'footer_html' => $footer_html
        ];

        $builder->where('id', $id);

        $builder->update($data);
        return true;
    }
}