<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class BannerModel extends Model
{

    public function get_all()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('banners');
        $builder->orderBy('show_order', 'ASC');
        $query  = $builder->get();

        return $query->getResult();
    }

    public function get_all_by_page_id($page_id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('banners');
        $builder->where('page_id', $page_id);
        $builder->orderBy('show_order', 'ASC');
        $query  = $builder->get();

        return $query->getResult();
    }
    
    public function get_by_id($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('banners');
        $builder->where('id', $id);
        $query  = $builder->get();

        return $query->getRow();
    }

    public function get_total()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('banners');
        return $builder->countAllResults();
    }

    public function get_total_by_page_id($page_id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('banners');
        $builder->where('page_id', $page_id);
        return $builder->countAllResults();
    }

    public function get_all_active()
    {
        $today = new Time('now', 'America/Sao_Paulo');

        $db      = \Config\Database::connect();
        $builder = $db->table('banners');

        $builder->where('ends_at >=', $today);
        $builder->where('starts_at <=', $today);
        $builder->where('status', 1);

        $builder->orWhere('ends_at IS NULL', NULL, FALSE);
        $builder->where('starts_at <=', $today);
        $builder->where('status', 1);

        $builder->orWhere('ends_at', 0);
        $builder->where('starts_at <=', $today);
        $builder->where('status', 1);

        $builder->orderBy('show_order', 'ASC');

        $query  = $builder->get();

        return $query->getResult();
    }

    public function get_all_active_by_page_id($page_id)
    {
        $today = new Time('now', 'America/Sao_Paulo');

        $db      = \Config\Database::connect();
        $builder = $db->table('banners');

        
        $builder->where('ends_at >=', $today);
        $builder->where('starts_at <=', $today);
        $builder->where('status', 1);
        $builder->where('page_id', $page_id);

        $builder->orWhere('ends_at IS NULL', NULL, FALSE);
        $builder->where('starts_at <=', $today);
        $builder->where('status', 1);
        $builder->where('page_id', $page_id);

        $builder->orWhere('ends_at', 0);
        $builder->where('starts_at <=', $today);
        $builder->where('status', 1);
        $builder->where('page_id', $page_id);

        $builder->orderBy('show_order', 'ASC');

        $query  = $builder->get();

        if($query) {
            return $query->getResult();
        } else {
            return $db->error();
        }

        //return $query->getResult();
    }

    public function increment_click($id) {
        $db      = \Config\Database::connect();
        $builder = $db->table('banners');
        $builder->set('click_count', 'click_count+1', false);
        $builder->where('id', $id);
        $builder->update();
        return true;
    }

    public function add($title, $desktop_picture, $mobile_picture, $link, $link_target, $show_order, $starts_at, $ends_at = NULL, $page_id = 1, $status = 0) {
        $db      = \Config\Database::connect();
        $builder = $db->table('banners');
        
        $data = [
            'title'  => $title,
            'desktop_picture' => $desktop_picture,
            'mobile_picture' => $mobile_picture,
            'link'  => $link,
            'link_target'  => $link_target,
            'show_order'  => $show_order,
            'starts_at' => $starts_at,
            'ends_at' => $ends_at,
            'page_id' => $page_id,
            'status' => $status
        ];
        
        if($builder->insert($data)) {
            return $db->insertID();
        } else {
            return $db->error();
        }
    }

    public function update_banner($id, $title, $desktop_picture, $mobile_picture, $link, $link_target, $show_order, $starts_at, $ends_at = NULL, $page_id = 1, $status = 0) {
        $db      = \Config\Database::connect();
        $builder = $db->table('banners');
        
        $data = [
            'title'  => $title,
            'desktop_picture' => $desktop_picture,
            'mobile_picture' => $mobile_picture,
            'link'  => $link,
            'link_target'  => $link_target,
            'show_order'  => $show_order,
            'starts_at' => $starts_at,
            'ends_at' => $ends_at,
            'page_id' => $page_id,
            'status' => $status
        ];

        $builder->where('id', $id);

        $builder->update($data);
        return true;
    }

    public function remove_desktop_picture($id) {
        $db      = \Config\Database::connect();
        $builder = $db->table('banners');
        
        $data = [
            'desktop_picture' => ""
        ];

        $builder->where('id', $id);

        $builder->update($data);
        return true;
    }

    public function remove_mobile_picture($id) {
        $db      = \Config\Database::connect();
        $builder = $db->table('banners');
        
        $data = [
            'mobile_picture' => ""
        ];

        $builder->where('id', $id);

        $builder->update($data);
        return true;
    }

    public function update_order($id, $show_order) {
        $db      = \Config\Database::connect();
        $builder = $db->table('banners');

        $data = [
            'show_order'  => $show_order
        ];

        $builder->where('id', $id);
        
        $builder->update($data);
        return true;
    }
   
    public function get_next_order()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('banners');
        return $builder->countAllResults() + 1;
    }

    public function get_next_order_by_page_id($page_id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('banners');
        $builder->where('page_id', $page_id);
        return $builder->countAllResults() + 1;
    }

    public function update_all_orders($new_order, $old_order) {
        $db      = \Config\Database::connect();
        $builder = $db->table('banners');

        if($new_order > $old_order) {
            $builder->set('show_order', 'show_order-1', false);
            $builder->where('show_order >', $old_order);
            $builder->where('show_order <=', $new_order);
        } else {
            $builder->set('show_order', 'show_order+1', false);
            $builder->where('show_order <', $old_order);
            $builder->where('show_order >=', $new_order);
        }
        
        $builder->update();
        return true;
    }

    public function update_all_orders_by_page_id($new_order, $old_order, $page_id) {
        $db      = \Config\Database::connect();
        $builder = $db->table('banners');

        if($new_order > $old_order) {
            $builder->set('show_order', 'show_order-1', false);
            $builder->where('show_order >', $old_order);
            $builder->where('show_order <=', $new_order);
        } else {
            $builder->set('show_order', 'show_order+1', false);
            $builder->where('show_order <', $old_order);
            $builder->where('show_order >=', $new_order);
        }

        $builder->where('page_id', $page_id);

        $builder->update();
        return true;
    }

    public function delete_banner($banner_id) {

        $banner = $this->get_by_id($banner_id);

        $db      = \Config\Database::connect();
        $builder = $db->table('banners');

        $builder->set('show_order', 'show_order-1', false);
        $builder->where('show_order >', $banner->show_order);
        $builder->where('page_id', $banner->page_id);
        
        $builder->update();

        $builder = $db->table('banners');
        $builder->where('id', $banner_id);

        $builder->delete();

        return true;
    }
}