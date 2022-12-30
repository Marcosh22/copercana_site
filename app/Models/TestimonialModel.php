<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class TestimonialModel extends Model
{

    public function get_by_id($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('testimonials');
        $builder->where('id', $id);
        $query  = $builder->get();

        return $query->getRow();
    }

    public function get_total()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('testimonials');
        return $builder->countAllResults();
    }

    public function get_all()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('testimonials');
        $builder->orderBy('id', 'DESC');
        $query  = $builder->get();

        return $query->getResult();
    }

    public function get_total_active()
    {
        $today = new Time('now');

        $db      = \Config\Database::connect();
        $builder = $db->table('testimonials');
        $builder->where('status', 1);

        return $builder->countAllResults();
    }

    public function get_all_active($page=0, $limit=200)
    {
        $today = new Time('now');

        $db      = \Config\Database::connect();
        $builder = $db->table('testimonials');
        $builder->where('status', 1);
        $query  = $builder->get($limit, $page);

        return $query->getResult();
    }

    public function add($picture, $title, $name, $testimonial, $status = 0) {
        $db      = \Config\Database::connect();
        $builder = $db->table('testimonials');
        
        $data = [
            'picture'  => $picture,
            'title'  => $title,
            'name'  => $name,
            'testimonial' => $testimonial,
            'status' => $status
        ];
        
        if($builder->insert($data)) {
            return $db->insertID();
        } else {
            return $db->error();
        }
    }

    public function update_testimonial($id, $picture, $title, $name, $testimonial, $status = 0) {
        $db      = \Config\Database::connect();
        $builder = $db->table('testimonials');
        
        $data = [
            'picture'  => $picture,
            'title'  => $title,
            'name'  => $name,
            'testimonial' => $testimonial,
            'status' => $status
        ];

        $builder->where('id', $id);

        $builder->update($data);
        return true;
    }

    public function remove_picture($id) {
        $db      = \Config\Database::connect();
        $builder = $db->table('testimonials');
        
        $data = [
            'picture' => "",
        ];

        $builder->where('id', $id);

        $builder->update($data);
        return true;
    }

    public function delete_testimonial($testimonial_id) {

        $testimonial = $this->get_by_id($testimonial_id);

        $db      = \Config\Database::connect();
        $builder = $db->table('testimonials');
        $builder->where('id', $testimonial_id);

        $builder->delete();

        return true;
    }
}