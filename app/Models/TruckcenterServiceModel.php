<?php

namespace App\Models;

use CodeIgniter\Model;

class TruckcenterServiceModel extends Model
{
    protected $table = 'truckcenter_services';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'icon', 'description', 'order', 'status', 'created_at', 'updated_at'];
    protected $returnType = 'object';

    public function get_all()
    {
        $builder = $this->db->table($this->table);
        $builder->orderBy('order', 'ASC');
        return $builder->get()->getResult();
    }

    public function get_all_active()
    {
        $builder = $this->db->table($this->table);
        $builder->where('status', 1);
        $builder->orderBy('order', 'ASC');
        return $builder->get()->getResult();
    }

    public function get_by_id($id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id', $id);
        return $builder->get()->getRow();
    }

    public function add($title, $icon, $description, $order, $status)
    {
        $now = new \CodeIgniter\I18n\Time('now', 'America/Sao_Paulo', 'pt_BR');
        
        if (empty($order) || $order == 0) {
            // Get the highest order value and add 1
            $builder = $this->db->table($this->table);
            $builder->selectMax('order');
            $result = $builder->get()->getRow();
            $order = $result->order ? ($result->order + 1) : 1;
        }

        $data = [
            'title' => $title,
            'icon' => $icon,
            'description' => $description,
            'order' => $order,
            'status' => $status,
            'created_at' => $now->toDateTimeString(),
            'updated_at' => $now->toDateTimeString()
        ];

        $this->db->table($this->table)->insert($data);
        return $this->db->insertID();
    }

    public function update_service($id, $title, $icon, $description, $order, $status)
    {
        $now = new \CodeIgniter\I18n\Time('now', 'America/Sao_Paulo', 'pt_BR');

        $data = [
            'title' => $title,
            'description' => $description,
            'order' => $order,
            'status' => $status,
            'updated_at' => $now->toDateTimeString()
        ];

        if ($icon) {
            $data['icon'] = $icon;
        }

        $this->db->table($this->table)->where('id', $id)->update($data);
        return true;
    }

    public function remove_icon($id)
    {
        $now = new \CodeIgniter\I18n\Time('now', 'America/Sao_Paulo', 'pt_BR');

        $data = [
            'icon' => NULL,
            'updated_at' => $now->toDateTimeString()
        ];

        $this->db->table($this->table)->where('id', $id)->update($data);
        return true;
    }

    public function delete_service($id)
    {
        $this->db->table($this->table)->where('id', $id)->delete();
        return true;
    }

    public function update_all_orders($old_order, $new_order)
    {
        // Se a nova ordem é maior que a antiga, decrementamos todas as ordens entre a antiga e a nova
        if ($new_order > $old_order) {
            $this->db->query("UPDATE {$this->table} SET `order` = `order` - 1 WHERE `order` > ? AND `order` <= ?", [$old_order, $new_order]);
        }
        // Se a nova ordem é menor que a antiga, incrementamos todas as ordens entre a nova e a antiga
        else if ($new_order < $old_order) {
            $this->db->query("UPDATE {$this->table} SET `order` = `order` + 1 WHERE `order` >= ? AND `order` < ?", [$new_order, $old_order]);
        }
        
        return true;
    }
}