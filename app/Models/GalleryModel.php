<?php

namespace App\Models;

use CodeIgniter\Model;

class GalleryModel extends Model
{

    public function add($title, $status = 0) {
        $db      = \Config\Database::connect();
        $builder = $db->table('galleries');
        
        $data = [
            'title' => $title,
            'status' => $status
        ];
        
        if($builder->insert($data)) {
            return $db->insertID();
        } else {
            return $db->error();
        }
    }

    public function update_gallery($id, $title, $status = 0) {
        $db      = \Config\Database::connect();
        $builder = $db->table('galleries');
        
        $data = [
            'title' => $title,
            'status' => $status
        ];

        $builder->where('id', $id);

        $builder->update($data);
        return true;
    }

    public function get_all()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('galleries');

        $builder->orderBy('id', 'DESC');
        $query  = $builder->get();
        $result = array();

        foreach ($query->getResultArray() as $row) {
            $row['pictures'] = $this->get_pictures_by_gallery_id($row['id']);
            array_push($result, (object)$row);
        }

        return $result;
    }

    public function get_by_id($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('galleries');
        $builder->where('id', $id);
        $query  = $builder->get();

        return $query->getRow();
    }

    public function get_total()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('galleries');
        return $builder->countAllResults();
    }

    public function delete_gallery($gallery_id) {

        $db      = \Config\Database::connect();
        $builder = $db->table('galleries');
        $builder->where('id', $gallery_id);

        $builder->delete();

        return true;
    }

    public function get_picture_by_id($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('galleries_pictures');
        $builder->where('id', $id);
        $query  = $builder->get();

        return $query->getRow();
    }

    public function get_pictures_by_gallery_id($gallery_id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('galleries_pictures');
        $builder->where('gallery_id', $gallery_id);
        $builder->orderBy('show_order', 'ASC');
        $query  = $builder->get();

        return $query->getResult();
    }

    public function add_picture($gallery_id, $picture, $thumbnail, $title, $description, $show_order) {
        $db      = \Config\Database::connect();
        $builder = $db->table('galleries_pictures');
        
        $data = [
            'gallery_id'  => $gallery_id,
            'picture' => $picture,
            'thumbnail' => $thumbnail,
            'title'  => $title,
            'description' => $description,
            'show_order' => $show_order
        ];
        
        if($builder->insert($data)) {
            return $db->insertID();
        } else {
            return $db->error();
        }
    }

    public function get_next_picture_order($gallery_id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('galleries_pictures');
        $builder->where('gallery_id', $gallery_id);

        return $builder->countAllResults() + 1;
    }

    public function delete_picture($picture_id) {

        $picture = $this->get_picture_by_id($picture_id);

        $db      = \Config\Database::connect();
        $builder = $db->table('galleries_pictures');

        $builder->set('show_order', 'show_order-1', false);
        $builder->where('show_order >', $picture->show_order);
        
        $builder->update();

        $builder = $db->table('galleries_pictures');
        $builder->where('id', $picture_id);

        $builder->delete();

        return true;
    }

    public function update_picture_order($id, $show_order) {
        $db      = \Config\Database::connect();
        $builder = $db->table('galleries_pictures');

        $data = [
            'show_order'  => $show_order
        ];

        $builder = $builder->where('id', $id);
        
        $builder->update($data);
        return true;
    }
}