<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Api_Datatables extends ResourceController
{
    use ResponseTrait;
    

    public function index()
    {
        $response = array(
            'success' => true
        );

        return $this->respond($response);
    }

    public function offers() {

        try {
            $request = \Config\Services::request();

            $table = 'offers';
            $columns = array('id', 'cover', 'title', 'starts_at', 'ends_at', 'status', 'created_at', 'id');
            $search_columns = array('id', 'cover', 'title', 'starts_at', 'ends_at', 'status', 'created_at');
            $order = array('id', 'cover', 'title', 'starts_at', 'ends_at', 'status', 'created_at', 'id');

            $dataModel = model('App\Models\DtModel', false);
            $fetch_data = $dataModel->make_datatables($table, $columns, $search_columns, $order);  
            $data = array();  

            foreach($fetch_data as $row) {  

                $cover = '<div class="img-preview"><img src="'. base_url($row->cover) .'" alt=""></div>';
                $post_status = "<span class='status ".($row->status == 1 ? 'status--active' : 'status--inactive')."'>".($row->status == 1 ? 'ATIVO' : 'INATIVO')."</span>";

                $created_at=date_create($row->created_at);
                $created_at=date_format($created_at,"d/m/Y H:i");

                $starts_at = !isset($row->starts_at) || empty($row->starts_at) || $row->starts_at === '0000-00-00 00:00:00' || $row->starts_at === '0000-00-00' ? 'Indefinido' : date_format(date_create($row->starts_at),"d/m/Y");
                $ends_at = !isset($row->ends_at) || empty($row->ends_at) || $row->ends_at === '0000-00-00 00:00:00' || $row->ends_at === '0000-00-00' ? 'Indefinido' : date_format(date_create($row->ends_at),"d/m/Y");

                $sub_array = array();  
                $sub_array[] = $row->id;
                $sub_array[] = $cover;
                $sub_array[] = $row->title;
                $sub_array[] = $starts_at;
                $sub_array[] = $ends_at;
                $sub_array[] = $post_status;
                $sub_array[] = $created_at;

                $sub_array[] = '<a href="'. base_url("admin/offers/edit/".$row->id) .'" class="btn btn-sm btn-success"><i class="bi bi-pencil"></i></a>&nbsp;
                                <a href="'. base_url("admin/offers/delete/".$row->id) .'" class="btn btn-sm btn-danger" onclick="handleConfirmation(event)"  data-title="Excluir jornal de oferta?"><i class="bi bi-trash"></i></a>';
                
                $data[] = $sub_array;  
            }  

            $output = array(  
                "draw" => intval($request->getPost('draw')),  
                "recordsTotal" => $dataModel->get_all_data($table),  
                "recordsFiltered" => $dataModel->get_filtered_data($table, $columns, $search_columns, $order), 
                "data" => $data
            );

            return $this->respond($output);
        } catch (\Exception $e) {

            return $this->respond(array(  
                "draw" => intval($request->getPost('draw')),  
                "recordsTotal" => 0,  
                "recordsFiltered" => 0,  
                "data" => array(),
                "error" => $e->getMessage()
            ));
        }
	}

    public function magazines() {

        try {
            $request = \Config\Services::request();

            $table = 'magazines';
            $columns = array('id', 'cover', 'date', 'status', 'created_at', 'id');
            $search_columns = array('id', 'cover', 'date', 'status', 'created_at');
            $order = array('id', 'cover', 'date', 'status', 'created_at', 'id');

            $dataModel = model('App\Models\DtModel', false);
            $fetch_data = $dataModel->make_datatables($table, $columns, $search_columns, $order);  
            $data = array();  

            foreach($fetch_data as $row) {  

                $cover = '<div class="img-preview"><img src="'. base_url($row->cover) .'" alt=""></div>';
                $post_status = "<span class='status ".($row->status == 1 ? 'status--active' : 'status--inactive')."'>".($row->status == 1 ? 'ATIVO' : 'INATIVO')."</span>";

                $created_at=date_create($row->created_at);
                $created_at=date_format($created_at,"d/m/Y H:i");

                $date = !isset($row->date) || empty($row->date) || $row->date === '0000-00-00 00:00:00' || $row->date === '0000-00-00' ? 'Indefinido' : date_format(date_create($row->date),"d/m/Y");

                $sub_array = array();  
                $sub_array[] = $row->id;
                $sub_array[] = $cover;
                $sub_array[] = $date;
                $sub_array[] = $post_status;
                $sub_array[] = $created_at;

                $sub_array[] = '<a href="'. base_url("admin/magazines/edit/".$row->id) .'" class="btn btn-sm btn-success"><i class="bi bi-pencil"></i></a>&nbsp;
                                <a href="'. base_url("admin/magazines/delete/".$row->id) .'" class="btn btn-sm btn-danger" onclick="handleConfirmation(event)"  data-title="Excluir revista?"><i class="bi bi-trash"></i></a>';
                
                $data[] = $sub_array;  
            }  

            $output = array(  
                "draw" => intval($request->getPost('draw')),  
                "recordsTotal" => $dataModel->get_all_data($table),  
                "recordsFiltered" => $dataModel->get_filtered_data($table, $columns, $search_columns, $order), 
                "data" => $data
            );

            return $this->respond($output);
        } catch (\Exception $e) {

            return $this->respond(array(  
                "draw" => intval($request->getPost('draw')),  
                "recordsTotal" => 0,  
                "recordsFiltered" => 0,  
                "data" => array(),
                "error" => $e->getMessage()
            ));
        }
	}

    public function indications() {

        try {
            $request = \Config\Services::request();

            $table = 'indications';
            $columns = array('id', 'cover', 'title', 'status', 'created_at', 'id');
            $search_columns = array('id', 'cover', 'title', 'status', 'created_at');
            $order = array('id', 'cover', 'title', 'status', 'created_at', 'id');

            $dataModel = model('App\Models\DtModel', false);
            $fetch_data = $dataModel->make_datatables($table, $columns, $search_columns, $order);  
            $data = array();  

            foreach($fetch_data as $row) {  

                $cover = '<div class="img-preview"><img src="'. base_url($row->cover) .'" alt=""></div>';
                $post_status = "<span class='status ".($row->status == 1 ? 'status--active' : 'status--inactive')."'>".($row->status == 1 ? 'ATIVO' : 'INATIVO')."</span>";

                $created_at=date_create($row->created_at);
                $created_at=date_format($created_at,"d/m/Y H:i");


                $sub_array = array();  
                $sub_array[] = $row->id;
                $sub_array[] = $cover;
                $sub_array[] = $row->title;
                $sub_array[] = $post_status;
                $sub_array[] = $created_at;

                $sub_array[] = '<a href="'. base_url("admin/indications/edit/".$row->id) .'" class="btn btn-sm btn-success"><i class="bi bi-pencil"></i></a>&nbsp;
                                <a href="'. base_url("admin/indications/delete/".$row->id) .'" class="btn btn-sm btn-danger" onclick="handleConfirmation(event)"  data-title="Excluir indicação?"><i class="bi bi-trash"></i></a>';
                
                $data[] = $sub_array;  
            }  

            $output = array(  
                "draw" => intval($request->getPost('draw')),  
                "recordsTotal" => $dataModel->get_all_data($table),  
                "recordsFiltered" => $dataModel->get_filtered_data($table, $columns, $search_columns, $order), 
                "data" => $data
            );

            return $this->respond($output);
        } catch (\Exception $e) {

            return $this->respond(array(  
                "draw" => intval($request->getPost('draw')),  
                "recordsTotal" => 0,  
                "recordsFiltered" => 0,  
                "data" => array(),
                "error" => $e->getMessage()
            ));
        }
	}

    public function files() {

        try {
            $request = \Config\Services::request();

            $table = 'files';
            $columns = array('id', 'cover', 'title', 'created_at', 'id');
            $search_columns = array('id', 'cover', 'title', 'created_at');
            $order = array('id', 'cover', 'title', 'created_at', 'id');

            $dataModel = model('App\Models\DtModel', false);
            $fetch_data = $dataModel->make_datatables($table, $columns, $search_columns, $order);  
            $data = array();  

            foreach($fetch_data as $row) {  

                $cover = '<div class="img-preview"><img src="'. base_url($row->cover) .'" alt=""></div>';

                $created_at=date_create($row->created_at);
                $created_at=date_format($created_at,"d/m/Y H:i");


                $sub_array = array();  
                $sub_array[] = $row->id;
                $sub_array[] = $cover;
                $sub_array[] = $row->title;
                $sub_array[] = $created_at;

                $sub_array[] = '<a href="'. base_url("admin/files/edit/".$row->id) .'" class="btn btn-sm btn-success"><i class="bi bi-pencil"></i></a>&nbsp;
                                <a href="'. base_url("admin/files/delete/".$row->id) .'" class="btn btn-sm btn-danger" onclick="handleConfirmation(event)"  data-title="Excluir arquivo?"><i class="bi bi-trash"></i></a>';
                
                $data[] = $sub_array;  
            }  

            $output = array(  
                "draw" => intval($request->getPost('draw')),  
                "recordsTotal" => $dataModel->get_all_data($table),  
                "recordsFiltered" => $dataModel->get_filtered_data($table, $columns, $search_columns, $order), 
                "data" => $data
            );

            return $this->respond($output);
        } catch (\Exception $e) {

            return $this->respond(array(  
                "draw" => intval($request->getPost('draw')),  
                "recordsTotal" => 0,  
                "recordsFiltered" => 0,  
                "data" => array(),
                "error" => $e->getMessage()
            ));
        }
	}

    public function testimonials() {

        try {
            $request = \Config\Services::request();

            $table = 'testimonials';
            $columns = array('id', 'picture', 'name', 'title', 'status', 'created_at', 'id');
            $search_columns = array('id', 'picture', 'name', 'title', 'status', 'created_at');
            $order = array('id', 'picture', 'name', 'title', 'status', 'created_at', 'id');

            $dataModel = model('App\Models\DtModel', false);
            $fetch_data = $dataModel->make_datatables($table, $columns, $search_columns, $order);  
            $data = array();  

            foreach($fetch_data as $row) {  

                $picture = '<div class="img-preview"><img src="'. base_url($row->picture) .'" alt=""></div>';
                $post_status = "<span class='status ".($row->status == 1 ? 'status--active' : 'status--inactive')."'>".($row->status == 1 ? 'ATIVO' : 'INATIVO')."</span>";

                $created_at=date_create($row->created_at);
                $created_at=date_format($created_at,"d/m/Y H:i");


                $sub_array = array();  
                $sub_array[] = $row->id;
                $sub_array[] = $picture;
                $sub_array[] = $row->name;
                $sub_array[] = $row->title;
                $sub_array[] = $post_status;
                $sub_array[] = $created_at;

                $sub_array[] = '<a href="'. base_url("admin/testimonials/edit/".$row->id) .'" class="btn btn-sm btn-success"><i class="bi bi-pencil"></i></a>&nbsp;
                                <a href="'. base_url("admin/testimonials/delete/".$row->id) .'" class="btn btn-sm btn-danger" onclick="handleConfirmation(event)"  data-title="Excluir depoimento?"><i class="bi bi-trash"></i></a>';
                
                $data[] = $sub_array;  
            }  

            $output = array(  
                "draw" => intval($request->getPost('draw')),  
                "recordsTotal" => $dataModel->get_all_data($table),  
                "recordsFiltered" => $dataModel->get_filtered_data($table, $columns, $search_columns, $order), 
                "data" => $data
            );

            return $this->respond($output);
        } catch (\Exception $e) {

            return $this->respond(array(  
                "draw" => intval($request->getPost('draw')),  
                "recordsTotal" => 0,  
                "recordsFiltered" => 0,  
                "data" => array(),
                "error" => $e->getMessage()
            ));
        }
	}

    public function fuel_forms() {

        try {
            $request = \Config\Services::request();

            $table = 'fuel_forms';
            $columns = array('id', 'title', 'created_at', 'id');
            $search_columns = array('id', 'title', 'created_at');
            $order = array('id', 'title', 'created_at');

            $dataModel = model('App\Models\DtModel', false);
            $fetch_data = $dataModel->make_datatables($table, $columns, $search_columns, $order);  
            $data = array();  

            foreach($fetch_data as $row) {  
                $created_at=date_create($row->created_at);
                $created_at=date_format($created_at,"d/m/Y H:i");

                $sub_array = array();  
                $sub_array[] = $row->id;
                $sub_array[] = $row->title;
                $sub_array[] = $created_at;

                $sub_array[] = '<a href="'. base_url("admin/fuel_forms/edit/".$row->id) .'" class="btn btn-sm btn-success"><i class="bi bi-pencil"></i></a>&nbsp;
                                <a href="'. base_url("admin/fuel_forms/delete/".$row->id) .'" class="btn btn-sm btn-danger" onclick="handleConfirmation(event)"  data-title="Excluir formulário?"><i class="bi bi-trash"></i></a>';
                
                $data[] = $sub_array;  
            }  

            $output = array(  
                "draw" => intval($request->getPost('draw')),  
                "recordsTotal" => $dataModel->get_all_data($table),  
                "recordsFiltered" => $dataModel->get_filtered_data($table, $columns, $search_columns, $order), 
                "data" => $data
            );

            return $this->respond($output);
        } catch (\Exception $e) {

            return $this->respond(array(  
                "draw" => intval($request->getPost('draw')),  
                "recordsTotal" => 0,  
                "recordsFiltered" => 0,  
                "data" => array(),
                "error" => $e->getMessage()
            ));
        }
	}

    public function units($type) {

        try {
            $request = \Config\Services::request();

            $table = 'units';
            $columns = array('id', 'city', 'state', 'address', 'status', 'created_at', 'id');
            $search_columns = array('id', 'city', 'state', 'address', 'status', 'created_at');
            $order = array('id', 'city', 'state', 'address', 'status', 'created_at');

            $dataModel = model('App\Models\DtModel', false);

            $additional_conditions = array(
                array(
                    'type' => 'where',
                    'key' => 'type',
                    'value' => $type,
                    'side' => '',
                    'escape' => NULL
                )
            );

            $fetch_data = $dataModel->make_datatables($table, $columns, $search_columns, $order, [], $additional_conditions);  
            $data = array();  

            foreach($fetch_data as $row) {  
                $status = "<span class='status ".($row->status == 1 ? 'status--active' : 'status--inactive')."'>".($row->status == 1 ? 'ATIVO' : 'INATIVO')."</span>";

                $created_at=date_create($row->created_at);
                $created_at=date_format($created_at,"d/m/Y H:i");

                $sub_array = array();  
                $sub_array[] = $row->id;
                $sub_array[] = $row->city;
                $sub_array[] = $row->state;
                $sub_array[] = $row->address;
                $sub_array[] = $status;
                $sub_array[] = $created_at;

                $sub_array[] = '<a href="'. base_url("admin/units/".$type."/edit/".$row->id) .'" class="btn btn-sm btn-success"><i class="bi bi-pencil"></i></a>&nbsp;
                                <a href="'. base_url("admin/units/".$type."/delete/".$row->id) .'" class="btn btn-sm btn-danger" onclick="handleConfirmation(event)"  data-title="Excluir unidade?"><i class="bi bi-trash"></i></a>';
                
                $data[] = $sub_array;  
            }  

            $output = array(  
                "draw" => intval($request->getPost('draw')),  
                "recordsTotal" => $dataModel->get_all_data($table, [], $additional_conditions),  
                "recordsFiltered" => $dataModel->get_filtered_data($table, $columns, $search_columns, $order, [], $additional_conditions), 
                "data" => $data
            );

            return $this->respond($output);
        } catch (\Exception $e) {

            return $this->respond(array(  
                "draw" => intval($request->getPost('draw')),  
                "recordsTotal" => 0,  
                "recordsFiltered" => 0,  
                "data" => array(),
                "error" => $e->getMessage()
            ));
        }
	}

    public function jobs() {

        try {
            $request = \Config\Services::request();

            $table = 'jobs';
            $columns = array('jobs.id', 'jobs.title', 'jobs.type', 'roles.title as role', 'jobs.quantity', 'CONCAT(branches.city, " / ", branches.uf) as city', 'jobs.status', 'jobs.created_at', 'jobs.id');
            $search_columns = array('jobs.id', 'jobs.title', 'jobs.type', 'roles.title', 'jobs.quantity', 'branches.city', 'jobs.status', 'jobs.created_at');
            $order = array('jobs.id', 'jobs.title', 'jobs.type', 'roles.title', 'jobs.quantity', 'branches.city', 'jobs.status', 'jobs.created_at', 'jobs.id');

            $joins = array(
                array(
                    'table' => 'roles',
                    'on' => 'roles.id = jobs.role_id',
                    'type' => 'left'
                ),
                array(
                    'table' => 'branches',
                    'on' => 'branches.id = jobs.branch_id',
                    'type' => 'left'
                )
            );

            $dataModel = model('App\Models\DtModel', false);
            $fetch_data = $dataModel->make_datatables($table, $columns, $search_columns, $order, $joins);  
            $data = array();  

            foreach($fetch_data as $row) {  

                $post_status = "<span class='status ".($row->status == 1 ? 'status--active' : 'status--inactive')."'>".($row->status == 1 ? 'ATIVO' : 'INATIVO')."</span>";

                $type;

                switch($row->type) {
                    case '0':
                        $type = "Pessoa sem deficiência";
                    break;
                    case '1':
                        $type = "PcD";
                    break;   
                    case '2':
                        $type = "Ambos";
                    break;               
                }

                $created_at=date_create($row->created_at);
                $created_at=date_format($created_at,"d/m/Y H:i");

                $sub_array = array();  
                $sub_array[] = $row->id;  
                $sub_array[] = $row->title;
                $sub_array[] = $row->role;
                $sub_array[] = $row->quantity;
                $sub_array[] = $row->city;
                $sub_array[] = $type;
                $sub_array[] = $post_status;
                $sub_array[] = $created_at;

                $sub_array[] = '<a href="'. base_url("admin/jobs/edit/".$row->id) .'" class="btn btn-sm btn-success"><i class="bi bi-pencil"></i></a>&nbsp;
                                <a href="'. base_url("admin/jobs/delete/".$row->id) .'" class="btn btn-sm btn-danger" onclick="handleConfirmation(event)"  data-title="Excluir vaga?"><i class="bi bi-trash"></i></a>';
                
                $data[] = $sub_array;  
            }  

            $output = array(  
                "draw" => intval($request->getPost('draw')),  
                "recordsTotal" => $dataModel->get_all_data($table, $joins),  
                "recordsFiltered" => $dataModel->get_filtered_data($table, $columns, $search_columns, $order, $joins), 
                "data" => $data
            );

            return $this->respond($output);
        } catch (\Exception $e) {

            return $this->respond(array(  
                "draw" => intval($request->getPost('draw')),  
                "recordsTotal" => 0,  
                "recordsFiltered" => 0,  
                "data" => array(),
                "error" => $e->getMessage()
            ));
        }
	}

    public function jobs_roles() {

        try {
            $request = \Config\Services::request();

            $table = 'roles';
            $columns = array('id', 'title', 'created_at', 'id');
            $search_columns = array('id', 'title', 'created_at');
            $order = array('id', 'title', 'created_at');

            $dataModel = model('App\Models\DtModel', false);


            $fetch_data = $dataModel->make_datatables($table, $columns, $search_columns, $order);  
            $data = array();  

            foreach($fetch_data as $row) {  

                $created_at=date_create($row->created_at);
                $created_at=date_format($created_at,"d/m/Y H:i");

                $sub_array = array();  
                $sub_array[] = $row->id;
                $sub_array[] = $row->title;
                $sub_array[] = $created_at;

                $sub_array[] = '<a href="'. base_url("admin/jobs/edit_role/".$row->id) .'" class="btn btn-sm btn-success"><i class="bi bi-pencil"></i></a>&nbsp;
                                <a href="'. base_url("admin/jobs/delete_role/".$row->id) .'" class="btn btn-sm btn-danger" onclick="handleConfirmation(event)"  data-title="Excluir cargo?"><i class="bi bi-trash"></i></a>';
                
                $data[] = $sub_array;  
            }  

            $output = array(  
                "draw" => intval($request->getPost('draw')),  
                "recordsTotal" => $dataModel->get_all_data($table),  
                "recordsFiltered" => $dataModel->get_filtered_data($table, $columns, $search_columns, $order), 
                "data" => $data
            );

            return $this->respond($output);
        } catch (\Exception $e) {

            return $this->respond(array(  
                "draw" => intval($request->getPost('draw')),  
                "recordsTotal" => 0,  
                "recordsFiltered" => 0,  
                "data" => array(),
                "error" => $e->getMessage()
            ));
        }
	}

    public function news() {

        try {
            $request = \Config\Services::request();

            $table = 'posts';
            $columns = array('posts.id', 'posts.title', 'CONCAT(users.first_name, " ", users.last_name) as author', 'posts.status', 'posts.created_at', 'posts.id');
            $search_columns = array('posts.id', 'posts.title', 'users.first_name', 'users.last_name', 'posts.status', 'posts.created_at');
            $order = array('posts.id', 'posts.title', 'users.first_name', 'posts.status', 'posts.created_at', 'posts.id');

            $joins = array(
                array(
                    'table' => 'users',
                    'on' => 'users.id = posts.author_id',
                    'type' => 'left'
                )
            );

            $additional_conditions = array(
                array(
                    'type' => 'where',
                    'key' => 'category_id',
                    'value' => 1,
                    'side' => '',
                    'escape' => NULL
                )
            );

            $dataModel = model('App\Models\DtModel', false);
            $fetch_data = $dataModel->make_datatables($table, $columns, $search_columns, $order, $joins, $additional_conditions);  
            $data = array();  

            foreach($fetch_data as $row) {  

                switch($row->status) {
                    case 'draft': 
                        $post_status = "Rascunho";
                    break;
                    case 'published': 
                        $post_status = "Publicado";
                    break;
                    default:
                        $post_status = "";
                }

                $created_at=date_create($row->created_at);
                $created_at=date_format($created_at,"d/m/Y H:i");

                $sub_array = array();  
                $sub_array[] = $row->id;  
                $sub_array[] = $row->title;

                $sub_array[] = $row->author;
                $sub_array[] = $post_status;
                $sub_array[] = $created_at;

                $sub_array[] = '<a href="'. base_url("admin/news/edit/".$row->id) .'" class="btn btn-sm btn-success"><i class="bi bi-pencil"></i></a>&nbsp;
                                <a href="'. base_url("admin/post/delete/".$row->id) .'" class="btn btn-sm btn-danger" onclick="handleConfirmation(event)"  data-title="Excluir publicação?"><i class="bi bi-trash"></i></a>';
                
                $data[] = $sub_array;  
            }  

            $output = array(  
                "draw" => intval($request->getPost('draw')),  
                "recordsTotal" => $dataModel->get_all_data($table, $joins, $additional_conditions),  
                "recordsFiltered" => $dataModel->get_filtered_data($table, $columns, $search_columns, $order, $joins, $additional_conditions), 
                "data" => $data
            );

            return $this->respond($output);
        } catch (\Exception $e) {

            return $this->respond(array(  
                "draw" => intval($request->getPost('draw')),  
                "recordsTotal" => 0,  
                "recordsFiltered" => 0,  
                "data" => array(),
                "error" => $e->getMessage()
            ));
        }
	}

    public function blog() {

        try {
            $request = \Config\Services::request();

            $table = 'posts';
            $columns = array('posts.id', 'posts.title', 'categories.title as category', 'CONCAT(users.first_name, " ", users.last_name) as author', 'posts.status', 'posts.created_at', 'posts.id');
            $search_columns = array('posts.id', 'posts.title', 'categories.title', 'users.first_name', 'users.last_name', 'posts.status', 'posts.created_at');
            $order = array('posts.id', 'posts.title', 'categories.title', 'users.first_name', 'posts.status', 'posts.created_at', 'posts.id');

            $additional_conditions = array(
                array(
                    'type' => 'where',
                    'key' => 'category_id <>',
                    'value' => 1,
                    'side' => '',
                    'escape' => NULL
                )
            );

            $joins = array(
                array(
                    'table' => 'categories',
                    'on' => 'categories.id = posts.category_id',
                    'type' => 'left'
                ),
                array(
                    'table' => 'users',
                    'on' => 'users.id = posts.author_id',
                    'type' => 'left'
                )
            );

            $dataModel = model('App\Models\DtModel', false);
            $fetch_data = $dataModel->make_datatables($table, $columns, $search_columns, $order, $joins, $additional_conditions);  
            $data = array();  

            foreach($fetch_data as $row) {  

                switch($row->status) {
                    case 'draft': 
                        $post_status = "Rascunho";
                    break;
                    case 'published': 
                        $post_status = "Publicado";
                    break;
                    default:
                        $post_status = "";
                }

                $created_at=date_create($row->created_at);
                $created_at=date_format($created_at,"d/m/Y H:i");

                $sub_array = array();  
                $sub_array[] = $row->id;  
                $sub_array[] = $row->title;
                $sub_array[] = $row->category;

                $sub_array[] = $row->author;
                $sub_array[] = $post_status;
                $sub_array[] = $created_at;

                $sub_array[] = '<a href="'. base_url("admin/blog/edit/".$row->id) .'" class="btn btn-sm btn-success"><i class="bi bi-pencil"></i></a>&nbsp;
                                <a href="'. base_url("admin/post/delete/".$row->id) .'" class="btn btn-sm btn-danger" onclick="handleConfirmation(event)"  data-title="Excluir publicação?"><i class="bi bi-trash"></i></a>';
                
                $data[] = $sub_array;  
            }  

            $output = array(  
                "draw" => intval($request->getPost('draw')),  
                "recordsTotal" => $dataModel->get_all_data($table, $joins, $additional_conditions),  
                "recordsFiltered" => $dataModel->get_filtered_data($table, $columns, $search_columns, $order, $joins, $additional_conditions), 
                "data" => $data
            );

            return $this->respond($output);
        } catch (\Exception $e) {

            return $this->respond(array(  
                "draw" => intval($request->getPost('draw')),  
                "recordsTotal" => 0,  
                "recordsFiltered" => 0,  
                "data" => array(),
                "error" => $e->getMessage()
            ));
        }
	}

    public function blog_categories() {

        try {
            $request = \Config\Services::request();

            $table = 'categories';
            $columns = array('title', 'created_at', 'id');
            $search_columns = array('title', 'created_at', 'id');
            $order = array('title', 'created_at', 'id');

            $additional_conditions = array(
                array(
                    'type' => 'where',
                    'key' => 'id <>',
                    'value' => 1,
                    'side' => '',
                    'escape' => NULL
                )
            );

            $dataModel = model('App\Models\DtModel', false);
            $fetch_data = $dataModel->make_datatables($table, $columns, $search_columns, $order, [], $additional_conditions);  
            $data = array();  

            foreach($fetch_data as $row) {  

                $created_at=date_create($row->created_at);
                $created_at=date_format($created_at,"d/m/Y H:i");

                $sub_array = array();  
                $sub_array[] = $row->title;
                $sub_array[] = $created_at;

                $sub_array[] = '<a href="'. base_url("admin/blog/edit_category/".$row->id) .'" class="btn btn-sm btn-success"><i class="bi bi-pencil"></i></a>&nbsp;
                                <a href="'. base_url("admin/post/delete_category/".$row->id) .'" class="btn btn-sm btn-danger" onclick="handleConfirmation(event)"  data-title="Excluir categoria?"><i class="bi bi-trash"></i></a>';
                
                $data[] = $sub_array;  
            }  

            $output = array(  
                "draw" => intval($request->getPost('draw')),  
                "recordsTotal" => $dataModel->get_all_data($table, [], $additional_conditions),  
                "recordsFiltered" => $dataModel->get_filtered_data($table, $columns, $search_columns, $order, [], $additional_conditions), 
                "data" => $data
            );

            return $this->respond($output);
        } catch (\Exception $e) {

            return $this->respond(array(  
                "draw" => intval($request->getPost('draw')),  
                "recordsTotal" => 0,  
                "recordsFiltered" => 0,  
                "data" => array(),
                "error" => $e->getMessage()
            ));
        }
	}

    public function users() {

        try {
            $request = \Config\Services::request();

            $table = 'users';
            $columns = array('id', 'CONCAT(first_name," ", last_name) as name', 'email', 'last_login', 'created_on', 'id');
            $search_columns = array('id', 'first_name', 'last_name', 'email', 'last_login', 'created_on');
            $order = array('id', 'first_name', 'email', 'last_login', 'created_on', 'id');

            $additional_conditions = array(
                array(
                    'type' => 'where',
                    'key' => 'active',
                    'value' => 1,
                    'side' => '',
                    'escape' => NULL
                )
            );

            $dataModel = model('App\Models\DtModel', false);
            $fetch_data = $dataModel->make_datatables($table, $columns, $search_columns, $order, [], $additional_conditions);  
            $data = array();  

            foreach($fetch_data as $row) {  

                $last_login = date('d/m/Y H:i', $row->last_login);
                $created_on = date('d/m/Y H:i', $row->created_on);

                $sub_array = array();  
                $sub_array[] = $row->id;  
                $sub_array[] = $row->name;
                $sub_array[] = $row->email;
                $sub_array[] = $last_login;
                $sub_array[] = $created_on;

                $sub_array[] = '<a href="'. base_url("admin/users/edit/".$row->id) .'" class="btn btn-sm btn-success"><i class="bi bi-pencil"></i></a>&nbsp;
                                <a href="'. base_url("admin/users/delete/".$row->id) .'" class="btn btn-sm btn-danger" onclick="handleConfirmation(event)"  data-title="Excluir usuário?"><i class="bi bi-trash"></i></a>';
                
                $data[] = $sub_array;  
            }  

            $output = array(  
                "draw" => intval($request->getPost('draw')),  
                "recordsTotal" => $dataModel->get_all_data($table, [], $additional_conditions),  
                "recordsFiltered" => $dataModel->get_filtered_data($table, $columns, $search_columns, $order, [], $additional_conditions), 
                "data" => $data
            );

            return $this->respond($output);
        } catch (\Exception $e) {

            return $this->respond(array(  
                "draw" => intval($request->getPost('draw')),  
                "recordsTotal" => 0,  
                "recordsFiltered" => 0,  
                "data" => array(),
                "error" => $e->getMessage()
            ));
        }
	}

    public function contacts() {

        try {
            $request = \Config\Services::request();

            $table = 'contacts';
            $columns = array('id', 'name', 'email', 'cellphone', 'city', 'subject', 'created_at','id');
            $search_columns = array('id', 'name', 'email', 'cellphone', 'city', 'subject', 'created_at');
            $order = array('id', 'name', 'email', 'cellphone', 'city', 'subject', 'created_at','id');

            $dataModel = model('App\Models\DtModel', false);
            $fetch_data = $dataModel->make_datatables($table, $columns, $search_columns, $order);  
            $data = array();  

            foreach($fetch_data as $row) {  

                $created_at=date_create($row->created_at);
                $created_at=date_format($created_at,"d/m/Y H:i");

                $sub_array = array();  
                $sub_array[] = $row->id;  
                $sub_array[] = htmlentities($row->name);
                $sub_array[] = htmlentities($row->email);
                $sub_array[] = htmlentities($row->cellphone);
                $sub_array[] = htmlentities($row->city);
                $sub_array[] = htmlentities($row->subject);
                $sub_array[] = $created_at;

                $sub_array[] = '<a href="'. base_url("admin/contacts/see_more/".$row->id) .'" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i></a>&nbsp;
                                <a href="'. base_url("admin/contacts/delete/".$row->id) .'" class="btn btn-sm btn-danger" onclick="handleConfirmation(event)"  data-title="Excluir contato?"><i class="bi bi-trash"></i></a>';
                
                $data[] = $sub_array;  
            }  

            $output = array(  
                "draw" => intval($request->getPost('draw')),  
                "recordsTotal" => $dataModel->get_all_data($table),  
                "recordsFiltered" => $dataModel->get_filtered_data($table, $columns, $search_columns, $order), 
                "data" => $data
            );

            return $this->respond($output);
        } catch (\Exception $e) {

            return $this->respond(array(  
                "draw" => intval($request->getPost('draw')),  
                "recordsTotal" => 0,  
                "recordsFiltered" => 0,  
                "data" => array(),
                "error" => $e->getMessage()
            ));
        }
	}

    public function cooperated_contacts() {

        try {
            $request = \Config\Services::request();

            $table = 'cooperated';
            $columns = array('id', 'name', 'registration', 'cpf_cnpj', 'email', 'cellphone', 'telephone', 'city', 'created_at','id');
            $search_columns = array('id', 'name', 'registration', 'cpf_cnpj', 'email', 'cellphone', 'telephone', 'city', 'created_at');
            $order = array('id', 'name', 'registration', 'cpf_cnpj', 'email', 'cellphone', 'telephone', 'city', 'created_at','id');

            $dataModel = model('App\Models\DtModel', false);
            $fetch_data = $dataModel->make_datatables($table, $columns, $search_columns, $order);  
            $data = array();  

            foreach($fetch_data as $row) {  

                $created_at=date_create($row->created_at);
                $created_at=date_format($created_at,"d/m/Y H:i");

                $sub_array = array();  
                $sub_array[] = $row->id;  
                $sub_array[] = htmlentities($row->name);
                $sub_array[] = htmlentities($row->registration);
                $sub_array[] = htmlentities($row->cpf_cnpj);
                $sub_array[] = htmlentities($row->email);
                $sub_array[] = htmlentities($row->cellphone);
                $sub_array[] = htmlentities($row->telephone);
                $sub_array[] = htmlentities($row->city);
                $sub_array[] = $created_at;

                $sub_array[] = '<a href="'. base_url("admin/contacts/see_more_cooperated/".$row->id) .'" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i></a>&nbsp;
                                <a href="'. base_url("admin/contacts/delete_cooperated/".$row->id) .'" class="btn btn-sm btn-danger" onclick="handleConfirmation(event)"  data-title="Excluir contato?"><i class="bi bi-trash"></i></a>';
                
                $data[] = $sub_array;  
            }  

            $output = array(  
                "draw" => intval($request->getPost('draw')),  
                "recordsTotal" => $dataModel->get_all_data($table),  
                "recordsFiltered" => $dataModel->get_filtered_data($table, $columns, $search_columns, $order), 
                "data" => $data
            );

            return $this->respond($output);
        } catch (\Exception $e) {

            return $this->respond(array(  
                "draw" => intval($request->getPost('draw')),  
                "recordsTotal" => 0,  
                "recordsFiltered" => 0,  
                "data" => array(),
                "error" => $e->getMessage()
            ));
        }
	}

    public function events_galleries() {

        try {
            $request = \Config\Services::request();

            $table = 'events_galleries';
            $columns = array('show_order', 'cover', 'title', 'date', 'status', 'created_at', 'id');
            $search_columns = array('show_order', 'cover', 'title', 'date', 'status', 'created_at', 'id');
            $order = array('show_order', 'cover', 'title', 'date', 'status', 'created_at', 'id');

            $dataModel = model('App\Models\DtModel', false);
            $fetch_data = $dataModel->make_datatables($table, $columns, $search_columns, $order);  
            $data = array();  

            foreach($fetch_data as $row) {  

                $cover = '<div class="img-preview"><img src="'. base_url($row->cover) .'" alt=""></div>';
                $post_status = "<span class='status ".($row->status == 1 ? 'status--active' : 'status--inactive')."'>".($row->status == 1 ? 'ATIVO' : 'INATIVO')."</span>";

                $created_at=date_create($row->created_at);
                $created_at=date_format($created_at,"d/m/Y H:i");

                $date=date_create($row->date);
                $date=date_format($date,"d/m/Y");

                $sub_array = array();  
                $sub_array[] = $row->show_order;
                $sub_array[] = $cover;
                $sub_array[] = $row->title;
                $sub_array[] = $post_status;
                $sub_array[] = $date;
                $sub_array[] = $created_at;

                $sub_array[] = '<a href="'. base_url("admin/events_galleries/edit/".$row->id) .'" class="btn btn-sm btn-success"><i class="bi bi-pencil"></i></a>&nbsp;
                                <a href="'. base_url("admin/events_galleries/delete/".$row->id) .'" class="btn btn-sm btn-danger" onclick="handleConfirmation(event)"  data-title="Excluir galeria?"><i class="bi bi-trash"></i></a>';
                
                $data[] = $sub_array;  
            }  

            $output = array(  
                "draw" => intval($request->getPost('draw')),  
                "recordsTotal" => $dataModel->get_all_data($table),  
                "recordsFiltered" => $dataModel->get_filtered_data($table, $columns, $search_columns, $order), 
                "data" => $data
            );

            return $this->respond($output);
        } catch (\Exception $e) {

            return $this->respond(array(  
                "draw" => intval($request->getPost('draw')),  
                "recordsTotal" => 0,  
                "recordsFiltered" => 0,  
                "data" => array(),
                "error" => $e->getMessage()
            ));
        }
	}

    public function videos() {

        try {
            $request = \Config\Services::request();

            $table = 'videos';
            $columns = array('id', 'url', 'title', 'created_at', 'id');
            $search_columns = array('id', 'url', 'title', 'created_at');
            $order = array('id', 'url', 'title', 'created_at', 'id');

            $dataModel = model('App\Models\DtModel', false);
            $fetch_data = $dataModel->make_datatables($table, $columns, $search_columns, $order, []);  
            $data = array();  

            foreach($fetch_data as $row) {  

                $created_at=date_create($row->created_at);
                $created_at=date_format($created_at,"d/m/Y H:i");

                $sub_array = array();  
                $sub_array[] = $row->id;
                $sub_array[] = $row->url;
                $sub_array[] = $row->title;
                $sub_array[] = $created_at;

                $sub_array[] = '<a href="'. base_url("admin/videos/edit_video/".$row->id) .'" class="btn btn-sm btn-success"><i class="bi bi-pencil"></i></a>&nbsp;
                                <a href="'. base_url("admin/videos/delete/".$row->id) .'" class="btn btn-sm btn-danger" onclick="handleConfirmation(event)"  data-title="Excluir video?"><i class="bi bi-trash"></i></a>';
                
                $data[] = $sub_array;  
            }  

            $output = array(  
                "draw" => intval($request->getPost('draw')),  
                "recordsTotal" => $dataModel->get_all_data($table, []),  
                "recordsFiltered" => $dataModel->get_filtered_data($table, $columns, $search_columns, $order, []), 
                "data" => $data
            );

            return $this->respond($output);
        } catch (\Exception $e) {

            return $this->respond(array(  
                "draw" => intval($request->getPost('draw')),  
                "recordsTotal" => 0,  
                "recordsFiltered" => 0,  
                "data" => array(),
                "error" => $e->getMessage()
            ));
        }
	}
}
