<?php

namespace App\Controllers;

class Admin_Units extends BaseController
{
    public function __construct()
	{
		$this->ionAuth = new \IonAuth\Libraries\IonAuth();
	}

    public function autocenter()
    {
        if (!$this->ionAuth->loggedIn())
		{
			return redirect()->to('/auth/login');
		}

        $session = \Config\Services::session();

        $data['page'] = 'units-autocenter';
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
        
        echo view('admin/includes/header', $data);
        echo view('admin/units/autocenter/index', $data);
        echo view('admin/includes/footer', $data);
    }

    public function autocenter_add_new()
    {
        helper(['form']);

        if (!$this->ionAuth->loggedIn())
		{
			return redirect()->to('/auth/login');
		}

        $session = \Config\Services::session();

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/pages.js').'?v='.filemtime('_assets/admin/js/pages.js').'"></script>'
        );

        $data['page'] = 'units-autocenter';
        $data['footer_dependencies'] = $footer_dependencies;
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
        
        
        echo view('admin/includes/header', $data);
        echo view('admin/units/autocenter/add_new', $data);
        echo view('admin/includes/footer', $data);
    }

    public function autocenter_edit($unit_id)
    {
        helper(['form']);

        if (!$this->ionAuth->loggedIn())
		{
			return redirect()->to('/auth/login');
		}

        $session = \Config\Services::session();
        $unitModel = model('App\Models\UnitModel', false);
        $unit = $unitModel->get_by_id($unit_id);

        if(!isset($unit) || empty($unit) || !$unit) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/pages.js').'?v='.filemtime('_assets/admin/js/pages.js').'"></script>'
        );

        $data['page'] = 'units-autocenter';
        $data['session'] = $session;
        $data['unit'] = $unit;
        $data['footer_dependencies'] = $footer_dependencies;
        $data['form'] = $unit;
        $data['logged_user'] = $this->ionAuth->user();
        
        echo view('admin/includes/header', $data);
        echo view('admin/units/autocenter/edit', $data);
        echo view('admin/includes/footer', $data);
    }

    public function magazine()
    {
        if (!$this->ionAuth->loggedIn())
		{
			return redirect()->to('/auth/login');
		}

        $session = \Config\Services::session();

        $data['page'] = 'units-magazines';
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
        
        echo view('admin/includes/header', $data);
        echo view('admin/units/magazine/index', $data);
        echo view('admin/includes/footer', $data);
    }

    public function magazine_add_new()
    {
        helper(['form']);

        if (!$this->ionAuth->loggedIn())
		{
			return redirect()->to('/auth/login');
		}

        $session = \Config\Services::session();

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/pages.js').'?v='.filemtime('_assets/admin/js/pages.js').'"></script>'
        );

        $data['page'] = 'units-magazines';
        $data['footer_dependencies'] = $footer_dependencies;
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
        
        
        echo view('admin/includes/header', $data);
        echo view('admin/units/magazine/add_new', $data);
        echo view('admin/includes/footer', $data);
    }

    public function magazine_edit($unit_id)
    {
        helper(['form']);

        if (!$this->ionAuth->loggedIn())
		{
			return redirect()->to('/auth/login');
		}

        $session = \Config\Services::session();
        $unitModel = model('App\Models\UnitModel', false);
        $unit = $unitModel->get_by_id($unit_id);

        if(!isset($unit) || empty($unit) || !$unit) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/pages.js').'?v='.filemtime('_assets/admin/js/pages.js').'"></script>'
        );

        $data['page'] = 'units-magazines';
        $data['session'] = $session;
        $data['unit'] = $unit;
        $data['footer_dependencies'] = $footer_dependencies;
        $data['form'] = $unit;
        $data['logged_user'] = $this->ionAuth->user();
        
        echo view('admin/includes/header', $data);
        echo view('admin/units/magazine/edit', $data);
        echo view('admin/includes/footer', $data);
    }

    public function gas_station()
    {
        if (!$this->ionAuth->loggedIn())
		{
			return redirect()->to('/auth/login');
		}

        $session = \Config\Services::session();

        $data['page'] = 'units-gas-station';
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
        
        echo view('admin/includes/header', $data);
        echo view('admin/units/gas-station/index', $data);
        echo view('admin/includes/footer', $data);
    }

    public function gas_station_add_new()
    {
        helper(['form']);

        if (!$this->ionAuth->loggedIn())
		{
			return redirect()->to('/auth/login');
		}

        $session = \Config\Services::session();

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/pages.js').'?v='.filemtime('_assets/admin/js/pages.js').'"></script>'
        );

        $data['page'] = 'units-gas-station';
        $data['footer_dependencies'] = $footer_dependencies;
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
        
        
        echo view('admin/includes/header', $data);
        echo view('admin/units/gas-station/add_new', $data);
        echo view('admin/includes/footer', $data);
    }

    public function gas_station_edit($unit_id)
    {
        helper(['form']);

        if (!$this->ionAuth->loggedIn())
		{
			return redirect()->to('/auth/login');
		}

        $session = \Config\Services::session();
        $unitModel = model('App\Models\UnitModel', false);
        $unit = $unitModel->get_by_id($unit_id);

        if(!isset($unit) || empty($unit) || !$unit) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/pages.js').'?v='.filemtime('_assets/admin/js/pages.js').'"></script>'
        );

        $data['page'] = 'units-gas-station';
        $data['session'] = $session;
        $data['unit'] = $unit;
        $data['footer_dependencies'] = $footer_dependencies;
        $data['form'] = $unit;
        $data['logged_user'] = $this->ionAuth->user();
        
        echo view('admin/includes/header', $data);
        echo view('admin/units/gas-station/edit', $data);
        echo view('admin/includes/footer', $data);
    }

    public function supermarket()
    {
        if (!$this->ionAuth->loggedIn())
		{
			return redirect()->to('/auth/login');
		}

        $session = \Config\Services::session();

        $data['page'] = 'units-supermarket';
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
        
        echo view('admin/includes/header', $data);
        echo view('admin/units/supermarket/index', $data);
        echo view('admin/includes/footer', $data);
    }

    public function supermarket_add_new()
    {
        helper(['form']);

        if (!$this->ionAuth->loggedIn())
		{
			return redirect()->to('/auth/login');
		}

        $session = \Config\Services::session();

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/pages.js').'?v='.filemtime('_assets/admin/js/pages.js').'"></script>'
        );

        $data['page'] = 'units-supermarket';
        $data['footer_dependencies'] = $footer_dependencies;
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
        
        
        echo view('admin/includes/header', $data);
        echo view('admin/units/supermarket/add_new', $data);
        echo view('admin/includes/footer', $data);
    }

    public function supermarket_edit($unit_id)
    {
        helper(['form']);

        if (!$this->ionAuth->loggedIn())
		{
			return redirect()->to('/auth/login');
		}

        $session = \Config\Services::session();
        $unitModel = model('App\Models\UnitModel', false);
        $unit = $unitModel->get_by_id($unit_id);

        if(!isset($unit) || empty($unit) || !$unit) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/pages.js').'?v='.filemtime('_assets/admin/js/pages.js').'"></script>'
        );

        $data['page'] = 'units-supermarket';
        $data['session'] = $session;
        $data['unit'] = $unit;
        $data['footer_dependencies'] = $footer_dependencies;
        $data['form'] = $unit;
        $data['logged_user'] = $this->ionAuth->user();
        
        echo view('admin/includes/header', $data);
        echo view('admin/units/supermarket/edit', $data);
        echo view('admin/includes/footer', $data);
    }

    public function insurance()
    {
        if (!$this->ionAuth->loggedIn())
		{
			return redirect()->to('/auth/login');
		}

        $session = \Config\Services::session();

        $data['page'] = 'units-insurance';
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
        
        echo view('admin/includes/header', $data);
        echo view('admin/units/insurance/index', $data);
        echo view('admin/includes/footer', $data);
    }
    
    public function insurance_add_new()
    {
        helper(['form']);

        if (!$this->ionAuth->loggedIn())
		{
			return redirect()->to('/auth/login');
		}

        $session = \Config\Services::session();

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/pages.js').'?v='.filemtime('_assets/admin/js/pages.js').'"></script>'
        );

        $data['page'] = 'units-insurance';
        $data['footer_dependencies'] = $footer_dependencies;
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
        
        
        echo view('admin/includes/header', $data);
        echo view('admin/units/insurance/add_new', $data);
        echo view('admin/includes/footer', $data);
    }

    public function insurance_edit($unit_id)
    {
        helper(['form']);

        if (!$this->ionAuth->loggedIn())
		{
			return redirect()->to('/auth/login');
		}

        $session = \Config\Services::session();
        $unitModel = model('App\Models\UnitModel', false);
        $unit = $unitModel->get_by_id($unit_id);

        if(!isset($unit) || empty($unit) || !$unit) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/pages.js').'?v='.filemtime('_assets/admin/js/pages.js').'"></script>'
        );

        $data['page'] = 'units-insurance';
        $data['session'] = $session;
        $data['unit'] = $unit;
        $data['footer_dependencies'] = $footer_dependencies;
        $data['form'] = $unit;
        $data['logged_user'] = $this->ionAuth->user();
        
        echo view('admin/includes/header', $data);
        echo view('admin/units/insurance/edit', $data);
        echo view('admin/includes/footer', $data);
    }

    public function grain_unit()
    {
        if (!$this->ionAuth->loggedIn())
		{
			return redirect()->to('/auth/login');
		}

        $session = \Config\Services::session();

        $data['page'] = 'units-grain-unit';
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
        
        echo view('admin/includes/header', $data);
        echo view('admin/units/grain-unit/index', $data);
        echo view('admin/includes/footer', $data);
    }
    
    public function grain_unit_add_new()
    {
        helper(['form']);

        if (!$this->ionAuth->loggedIn())
		{
			return redirect()->to('/auth/login');
		}

        $session = \Config\Services::session();

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/pages.js').'?v='.filemtime('_assets/admin/js/pages.js').'"></script>'
        );

        $data['page'] = 'units-grain-unit';
        $data['footer_dependencies'] = $footer_dependencies;
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
        
        
        echo view('admin/includes/header', $data);
        echo view('admin/units/grain-unit/add_new', $data);
        echo view('admin/includes/footer', $data);
    }

    public function grain_unit_edit($unit_id)
    {
        helper(['form']);

        if (!$this->ionAuth->loggedIn())
		{
			return redirect()->to('/auth/login');
		}

        $session = \Config\Services::session();
        $unitModel = model('App\Models\UnitModel', false);
        $unit = $unitModel->get_by_id($unit_id);

        if(!isset($unit) || empty($unit) || !$unit) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/pages.js').'?v='.filemtime('_assets/admin/js/pages.js').'"></script>'
        );

        $data['page'] = 'units-grain-unit';
        $data['session'] = $session;
        $data['unit'] = $unit;
        $data['footer_dependencies'] = $footer_dependencies;
        $data['form'] = $unit;
        $data['logged_user'] = $this->ionAuth->user();
        
        echo view('admin/includes/header', $data);
        echo view('admin/units/grain-unit/edit', $data);
        echo view('admin/includes/footer', $data);
    }


    public function agronomic_department_unit()
    {
        if (!$this->ionAuth->loggedIn())
		{
			return redirect()->to('/auth/login');
		}

        $session = \Config\Services::session();

        $data['page'] = 'units-agronomic-department';
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
        
        echo view('admin/includes/header', $data);
        echo view('admin/units/agronomic-department/index', $data);
        echo view('admin/includes/footer', $data);
    }
    
    public function agronomic_department_add_new()
    {
        helper(['form']);

        if (!$this->ionAuth->loggedIn())
		{
			return redirect()->to('/auth/login');
		}

        $session = \Config\Services::session();

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/pages.js').'?v='.filemtime('_assets/admin/js/pages.js').'"></script>'
        );

        $data['page'] = 'units-agronomic-department';
        $data['footer_dependencies'] = $footer_dependencies;
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
        
        
        echo view('admin/includes/header', $data);
        echo view('admin/units/agronomic-department/add_new', $data);
        echo view('admin/includes/footer', $data);
    }

    public function agronomic_department_edit($unit_id)
    {
        helper(['form']);

        if (!$this->ionAuth->loggedIn())
		{
			return redirect()->to('/auth/login');
		}

        $session = \Config\Services::session();
        $unitModel = model('App\Models\UnitModel', false);
        $unit = $unitModel->get_by_id($unit_id);

        if(!isset($unit) || empty($unit) || !$unit) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/pages.js').'?v='.filemtime('_assets/admin/js/pages.js').'"></script>'
        );

        $data['page'] = 'units-agronomic-department';
        $data['session'] = $session;
        $data['unit'] = $unit;
        $data['footer_dependencies'] = $footer_dependencies;
        $data['form'] = $unit;
        $data['logged_user'] = $this->ionAuth->user();
        
        echo view('admin/includes/header', $data);
        echo view('admin/units/agronomic-department/edit', $data);
        echo view('admin/includes/footer', $data);
    }

    public function add_unit() {
        if (!$this->ionAuth->loggedIn())
		{
			return redirect()->to('/auth/login');
		}

        $session = \Config\Services::session();
        $request = \Config\Services::request();

        $unitModel = model('App\Models\UnitModel', false);
        $unit_id = false;

        $validationRule = [
            'city' => [
                'label' => 'Cidade',
                'rules' => 'required',
            ],
            'state' => [
                'label' => 'Estado',
                'rules' => 'required',
            ]
        ];

        if (!$this->validate($validationRule)) {
            $message = $this->validator->listErrors();
            $success = false;
        } else {
            $picture = $request->getFile('picture');
            $picture_path = "";

            $city = $request->getPost('city');
            $state = $request->getPost('state');
            $address = $request->getPost('address');
            $address_link = $request->getPost('address_link');
            $opening_hours = $request->getPost('opening_hours');
            $definition = $request->getPost('definition');
            if(isset($definition) && !empty($definition)) $definition = json_encode($definition);
            $type = $request->getPost('type');
            $status = $request->getPost('status');
            $status = $status ? $status : 0;


            if(isset($picture) && !empty($picture) && $picture->isValid() && !$picture->hasMoved()) {
                $date = date('Ymd');
                $random_name = $picture->getRandomName();
                $picture_path = "uploads/units/$date/$random_name";

                if (!is_dir(PUBLIC_PATH."/uploads/units/$date")) {
                    mkdir(PUBLIC_PATH."/uploads/units/$date", 0777, TRUE);
                }

                $image = \Config\Services::image()
                    ->withFile($picture)
                    ->fit(450, 330, 'center')
                    ->save(FCPATH . $picture_path);

                //$picture->move("uploads/units/$date", $random_name);
            }

            try {
                $unit_id = $unitModel->add($picture_path, $city, $state, $address, $address_link, $opening_hours, $definition, $type, $status);
                
                if($unit_id) {
                    $message = "Loja Cadastrada com sucesso.";
                    $success = true;
                } else {
                    $message = "Tente novamente mais tarde.";
                    $success = false;
                }
                
            } catch (\Exception $e) {
                $message = $e->getMessage();
                $success = false;
            }
        } 

        $unit_data = array(
            'title' => $request->getPost('title'),
            'city' => $request->getPost('city'),
            'state' => $request->getPost('state'),
            'address' => $request->getPost('address'),
            'address_link' => $request->getPost('address_link'),
            'opening_hours' => $request->getPost('opening_hours'),
            'definition' => $request->getPost('definition'),
            'type' => $request->getPost('type'),
            'status' => $request->getPost('status')
        );

        $response = array(
            'message' => $message,
            'success' => $success,
            'form_data' => $unit_data
        );

        $session->setFlashdata('response', $response);

        if($success && $unit_id) {
            return redirect()->to('/admin/units/'.$request->getPost('type').'/edit/'.$unit_id);
        } else {
            return redirect()->to('/admin/units/'.$request->getPost('type').'/add_new');
        }
    }

    public function update_unit($unit_id) {
        if (!$this->ionAuth->loggedIn())
		{
			return redirect()->to('/auth/login');
		}

        $session = \Config\Services::session();
        $request = \Config\Services::request();

        $unitModel = model('App\Models\UnitModel', false);
        $unit = $unitModel->get_by_id($unit_id);

        if(!isset($unit) || empty($unit) || !$unit) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $validationRule = [
            'city' => [
                'label' => 'Cidade',
                'rules' => 'required',
            ],
            'state' => [
                'label' => 'Estado',
                'rules' => 'required',
            ]
        ];

        if (!$this->validate($validationRule)) {
            $message = $this->validator->listErrors();
            $success = false;
        } else {

            $picture = $request->getFile('picture');
            $picture_path = "";

            $city = $request->getPost('city');
            $state = $request->getPost('state');
            $address = $request->getPost('address');
            $address_link = $request->getPost('address_link');
            $opening_hours = $request->getPost('opening_hours');
            $definition = $request->getPost('definition');
            if(isset($definition) && !empty($definition)) $definition = json_encode($definition);
            $type = $request->getPost('type');
            $status = $request->getPost('status');
            $status = $status ? $status : 0;

            if(isset($picture) && !empty($picture) && $picture->isValid() && !$picture->hasMoved()) {
                $date = date('Ymd');
                $random_name = $picture->getRandomName();
                $picture_path = "uploads/units/$date/$random_name";

                if (!is_dir(PUBLIC_PATH."/uploads/units/$date")) {
                    mkdir(PUBLIC_PATH."/uploads/units/$date", 0777, TRUE);
                }

                $image = \Config\Services::image()
                    ->withFile($picture)
                    ->fit(450, 330, 'center')
                    ->save(FCPATH . $picture_path);

                //$picture->move("uploads/units/$date", $random_name);
            } else {
                $picture_path = $unit->picture;
            }

            $unitModel->update_unit($unit_id, $picture_path, $city, $state, $address, $address_link, $opening_hours, $definition, $type, $status);
            $message = "Loja atualizada com sucesso!";
            $success = true;
        } 

        $response = array(
            'message' => $message,
            'success' => $success
        );

        $session->setFlashdata('response', $response);
        return redirect()->to('/admin/units/'.$unit->type.'/edit/'.$unit_id);
    }
    
    public function delete($unit_type, $unit_id) {
        if (!$this->ionAuth->loggedIn())
		{
			return redirect()->to('/auth/login');
		}

        $session = \Config\Services::session();

        $unitModel = model('App\Models\UnitModel', false);
        $unit = $unitModel->get_by_id($unit_id);

        if(!isset($unit) || empty($unit) || !$unit) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $unitModel->delete_unit($unit_id);

        $response = array(
            'message' => "Loja excluída com sucesso!",
            'success' => true
        );

        $session->setFlashdata('response', $response);

        return redirect()->to('/admin/units/'.$unit_type);
    }

    public function remove_picture($unit_type, $unit_id) {
        if (!$this->ionAuth->loggedIn())
		{
			return redirect()->to('/admin/auth/login');
		}

        $unitModel = model('App\Models\UnitModel', false);
        $unit = $unitModel->get_by_id($unit_id);

        if(!isset($unit) || empty($unit) || !$unit) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $unitModel->remove_picture($unit_id);

        return redirect()->to('/admin/units/'.$unit_type.'/edit/'.$unit_id);
    }

}
