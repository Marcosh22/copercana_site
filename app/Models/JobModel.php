<?php

namespace App\Models;

use CodeIgniter\Model;

class JobModel extends Model
{

    public function add($role_id, $related_role_01_id, $related_role_02_id, $title, $branch_id, $type, $activity, $quantity, $workload, $modality, $grade, $description, $status) {
        $db      = \Config\Database::connect();
        $builder = $db->table('jobs');
        
        $data = [
            'role_id' => $role_id, 
            'related_role_01_id' => $related_role_01_id,
            'related_role_02_id' => $related_role_02_id,
            'title' => $title,
            'branch_id' => $branch_id,
            'type' => $type,
            'activity' => $activity,
            'quantity' => $quantity,
            'workload' => $workload,
            'modality' => $modality,
            'grade' => $grade,
            'description' => $description,
            'status' => $status
        ];
        
        if($builder->insert($data)) {
            return $db->insertID();
        } else {
            return $db->error();
        }
    }

    public function update_job($id, $role_id, $related_role_01_id, $related_role_02_id, $title, $branch_id, $type, $activity, $quantity, $workload, $modality, $grade, $description, $status) {
        $db      = \Config\Database::connect();
        $builder = $db->table('jobs');
        
        $data = [
            'role_id' => $role_id, 
            'related_role_01_id' => $related_role_01_id,
            'related_role_02_id' => $related_role_02_id,
            'title' => $title,
            'branch_id' => $branch_id,
            'type' => $type,
            'activity' => $activity,
            'quantity' => $quantity,
            'workload' => $workload,
            'modality' => $modality,
            'grade' => $grade,
            'description' => $description,
            'status' => $status
        ];

        $builder->where('id', $id);

        $builder->update($data);
        return true;
    }

    public function get_all()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('jobs');
        $query  = $builder->get();

        return $query->getResult();
    }

    public function get_all_active()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('jobs');

        $builder->select('jobs.*, branches.city, branches.uf');
        $builder->join('branches', 'branches.id = jobs.branch_id');

        $builder->where('jobs.status', 1);
        $builder->orderBy('jobs.id', 'DESC');
        $query  = $builder->get();

        return $query->getResult();
    }


    public function get_by_id($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('jobs');
        $builder->select('jobs.*, branches.city, branches.uf, role.title as role, related_role_01.title as related_role_01, related_role_02.title as related_role_02');
        $builder->join('branches', 'branches.id = jobs.branch_id', 'left');
        $builder->join('roles as role', 'role.id = jobs.role_id', 'left');
        $builder->join('roles as related_role_01', 'related_role_01.id = jobs.related_role_01_id', 'left');
        $builder->join('roles as related_role_02', 'related_role_02.id = jobs.related_role_02_id', 'left');

        $builder->where('jobs.id', $id);
        $query  = $builder->get();

        return $query->getRow();
    }

    public function get_active_by_id($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('jobs');

        $builder->select('jobs.*, branches.city, branches.uf, role.title as role, related_role_01.title as related_role_01, related_role_02.title as related_role_02');
        $builder->join('branches', 'branches.id = jobs.branch_id', 'left');
        $builder->join('roles as role', 'role.id = jobs.role_id', 'left');
        $builder->join('roles as related_role_01', 'related_role_01.id = jobs.related_role_01_id', 'left');
        $builder->join('roles as related_role_02', 'related_role_02.id = jobs.related_role_02_id', 'left');

        $builder->where('jobs.status', 1);
        $builder->where('jobs.id', $id);
        $query  = $builder->get();

        return $query->getRow();
    }


    public function get_total()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('jobs');
        return $builder->countAllResults();
    }

    public function delete_job($job_id) {

        $job = $this->get_by_id($job_id);

        $db      = \Config\Database::connect();
        $builder = $db->table('jobs');
        $builder->where('id', $job_id);

        $builder->delete();

        return true;
    }
}