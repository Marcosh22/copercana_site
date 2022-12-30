<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class DtModel extends Model
{
    public function make_query($table, $columns, $search_columns, $order, $joins = [], $additional_conditions = []) {
        
        $request = \Config\Services::request();
        $db      = \Config\Database::connect();
        $builder = $db->table($table);

        $builder->select($columns);


		if($request->getPost('search') && isset($request->getPost('search')['value'])) {
            foreach($search_columns as $key => $column) {
                if($key === 0) {
					
                    $builder->like($column, $request->getPost('search')['value'], 'both');
                } else {
                    $builder->orLike($column, $request->getPost('search')['value'], 'both');
                }

						foreach($additional_conditions as $condition) {
			switch($condition['type']) {
				case 'where':
					$builder->where($condition['key'], $condition['value'], $condition['escape']);
				break;
				case 'whereIn':
					$builder->whereIn($condition['key'], $condition['value'], $condition['escape']);
				break;
				case 'whereNotIn':
					$builder->whereNotIn($condition['key'], $condition['value'], $condition['escape']);
				break;
				case 'orWhere':
					$builder->orWhere($condition['key'], $condition['value'], $condition['escape']);
				break;
				case 'orWhereIn':
					$builder->orWhereIn($condition['key'], $condition['value'], $condition['escape']);
				break;
				case 'orWhereNotIn':
					$builder->orWhereNotIn($condition['key'], $condition['value'], $condition['escape']);
				break;
				case 'like':
					$builder->like($condition['key'], $condition['value'], $condition['side'], $condition['escape']);
				break;
				case 'orLike':
					$builder->orLike($condition['key'], $condition['value'], $condition['side'], $condition['escape']);
				break;
				case 'notLike':
					$builder->notLike($condition['key'], $condition['value'], $condition['side'], $condition['escape']);
				break;
				case 'orNotLike':
					$builder->orNotLike($condition['key'], $condition['value'], $condition['side'], $condition['escape']);
				break;
				default:
					$builder->where($condition['key'], $condition['value'], $condition['escape']);
				break;
			}
		}
            }
        }

		foreach($joins as $join) {
			$builder->join($join['table'], $join['on'], $join['type']);
		}

		if($request->getPost('order')) {
			$builder->orderBy($order[$request->getPost('order')['0']['column']], $request->getPost('order')['0']['dir']);
		} else {
			$builder->orderBy('id', 'desc');
		}

        return $builder;
	}  

	public function make_datatables($table, $columns, $search_columns, $order, $joins = [], $additional_conditions = []) {  
		$request = \Config\Services::request();
		$builder = $this->make_query($table, $columns, $search_columns, $order, $joins, $additional_conditions); 

		if($request->getPost('length') != -1) {
			$builder->limit($request->getPost('length'), $request->getPost('start'));
		}

        $query  = $builder->get();

		return $query->getResult();  
	}

	public function get_filtered_data($table, $columns, $search_columns, $order, $joins = [], $additional_conditions = []) {  
		$builder = $this->make_query($table, $columns, $search_columns, $order, $joins, $additional_conditions);  

		$query  = $builder->get();
		
		return $query->getNumRows();  
	}

	public function get_all_data($table, $joins = [], $additional_conditions = []) {  
        $db      = \Config\Database::connect();
        $builder = $db->table($table);
		
		foreach($joins as $join) {
			$builder->join($join['table'], $join['on'], $join['type']);
		}

		foreach($additional_conditions as $condition) {
			switch($condition['type']) {
				case 'where':
					$builder->where($condition['key'], $condition['value'], $condition['escape']);
				break;
				case 'whereIn':
					$builder->whereIn($condition['key'], $condition['value'], $condition['escape']);
				break;
				case 'whereNotIn':
					$builder->whereNotIn($condition['key'], $condition['value'], $condition['escape']);
				break;
				case 'orWhere':
					$builder->orWhere($condition['key'], $condition['value'], $condition['escape']);
				break;
				case 'orWhereIn':
					$builder->orWhereIn($condition['key'], $condition['value'], $condition['escape']);
				break;
				case 'orWhereNotIn':
					$builder->orWhereNotIn($condition['key'], $condition['value'], $condition['escape']);
				break;
				case 'like':
					$builder->like($condition['key'], $condition['value'], $condition['side'], $condition['escape']);
				break;
				case 'orLike':
					$builder->orLike($condition['key'], $condition['value'], $condition['side'], $condition['escape']);
				break;
				case 'notLike':
					$builder->notLike($condition['key'], $condition['value'], $condition['side'], $condition['escape']);
				break;
				case 'orNotLike':
					$builder->orNotLike($condition['key'], $condition['value'], $condition['side'], $condition['escape']);
				break;
				default:
					$builder->where($condition['key'], $condition['value'], $condition['escape']);
				break;
			}
		}

        return $builder->countAll();
	}  
}