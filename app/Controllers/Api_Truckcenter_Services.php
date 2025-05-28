<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Api_Truckcenter_Services extends ResourceController
{
    protected $format    = 'json';

    public function index()
    {
        $request = $this->request;
        $draw = $request->getGet('draw');
        $start = $request->getGet('start');
        $length = $request->getGet('length');
        $search = $request->getGet('search')['value'];
        $order_by = $request->getGet('order')[0]['column'];
        $order_dir = $request->getGet('order')[0]['dir'];

        $columns = [
            0 => 'id',
            1 => 'icon',
            2 => 'title',
            3 => 'order',
            4 => 'status',
            5 => 'created_at'
        ];
        
        $serviceModel = model('App\Models\TruckcenterServiceModel', false);
        $total_records = $serviceModel->countAllResults();
        
        $builder = $serviceModel->builder();
        
        if (!empty($search)) {
            $builder->like('title', $search);
        }
        
        $builder->orderBy($columns[$order_by], $order_dir);
        $builder->limit($length, $start);
        
        $services = $builder->get()->getResult();
        $filtered_records = count($services);
        
        // Prepare the data for DataTables
        $data = [];
        foreach ($services as $service) {
            $row = [];
            $row[] = $service->id;
            
            // Icon column
            if (!empty($service->icon)) {
                $row[] = '<img src="' . base_url($service->icon) . '" alt="' . $service->title . '" style="max-width: 50px; max-height: 50px;" />';
            } else {
                $row[] = '-';
            }
            
            $row[] = $service->title;
            $row[] = $service->order;
            
            // Status column
            if ($service->status == 1) {
                $row[] = '<span class="badge bg-success">Ativo</span>';
            } else {
                $row[] = '<span class="badge bg-danger">Inativo</span>';
            }
            
            // Format date
            $created_at = new \DateTime($service->created_at);
            $row[] = $created_at->format('d/m/Y H:i');
            
            // Actions column
            $actions = '<div class="actions-container">';
            $actions .= '<a class="btn btn-primary btn-sm" href="' . base_url('admin/truckcenter/services/edit/' . $service->id) . '"><i class="bi bi-pencil-square"></i></a> ';
            $actions .= '<a class="btn btn-danger btn-sm delete-btn" href="' . base_url('admin/truckcenter/services/delete/' . $service->id) . '" data-confirm="Tem certeza que deseja excluir este serviço/produto?"><i class="bi bi-trash"></i></a>';
            $actions .= '</div>';
            $row[] = $actions;
            
            $data[] = $row;
        }
        
        return $this->respond([
            'draw' => intval($draw),
            'recordsTotal' => $total_records,
            'recordsFiltered' => $filtered_records,
            'data' => $data
        ]);
    }
    
    public function update_order()
    {
        $request = $this->request;
        $message = "";
        $success = false;
        
        $services_order = $request->getPost('services_order');
        
        if (!empty($services_order)) {
            $serviceModel = model('App\Models\TruckcenterServiceModel', false);
            
            foreach($services_order as $order => $service_id) {
                $data = [
                    'order' => ((int)$order + 1)
                ];
                $serviceModel->update($service_id, $data);
            }
            
            $message = "Ordem de exibição atualizada com sucesso!";
            $success = true;
        }
        
        $response = array(
            'message' => $message,
            'success' => $success
        );
        
        return $this->respond($response);
    }
}