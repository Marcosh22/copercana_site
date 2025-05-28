<?php

namespace App\Controllers;

class Admin_Truckcenter_Services extends BaseController
{
    private $ionAuth;
    
    public function __construct()
	{
		$this->ionAuth = new \IonAuth\Libraries\IonAuth();
	}
    
    public function index()
    {
        if (!$this->ionAuth->loggedIn()) {
            return redirect()->to('/auth/login');
        } else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        
        $data = array(
            'page' => 'truckcenter_services',
            'user' => $this->ionAuth->user()->row(),
            'session' => $session,
            'logged_user' => $this->ionAuth->user(),
            'ion_auth' => $this->ionAuth
        );
        
        echo view('admin/includes/header', $data);
        echo view('admin/truckcenter/services/index', $data);
        echo view('admin/includes/footer', $data);
    }
    
    public function add_new()
    {
        helper(['form']);

        if (!$this->ionAuth->loggedIn()) {
            return redirect()->to('/auth/login');
        } else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }
        
        $session = \Config\Services::session();

        $data = array(
            'page' => 'truckcenter_services',
            'user' => $this->ionAuth->user()->row(),
            'session' => $session,
            'logged_user' => $this->ionAuth->user(),
            'ion_auth' => $this->ionAuth
        );
        
        echo view('admin/includes/header', $data);
        echo view('admin/truckcenter/services/add_new', $data);
        echo view('admin/includes/footer', $data);
    }
    
    public function add()
    {
        if (!$this->ionAuth->loggedIn()) {
            return redirect()->to('/auth/login');
        } else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }
        
        $request = $this->request;
        $message = '';
        $success = false;
        $service_id = null;
        
        $validationRule = [
            'icon' => [
                'label' => 'Ícone',
                'rules' => 'uploaded[icon]|max_size[icon,2048]|ext_in[icon,png,jpg,jpeg,gif,svg]',
            ],
            'title' => [
                'label' => 'Título',
                'rules' => 'required',
            ]
        ];
        
        if (!$this->validate($validationRule)) {
            $message = $this->validator->listErrors();
            $success = false;
        } else {
            $icon = $this->request->getFile('icon');
            $title = $request->getPost('title');
            $description = $request->getPost('description');
            $order = $request->getPost('order');
            $status = $request->getPost('status') ? 1 : 0;
            
            if ($icon->isValid() && !$icon->hasMoved()) {
                $newName = $icon->getRandomName();
                
                if ($icon->move(ROOTPATH . 'public/uploads/truckcenter/services/', $newName)) {
                    $icon_path = 'uploads/truckcenter/services/' . $newName;
                    
                    try {
                        $serviceModel = model('App\Models\TruckcenterServiceModel', false);
                        $service_id = $serviceModel->add($title, $icon_path, $description, $order, $status);
                        
                        if ($service_id) {
                            $message = "Serviço/Produto cadastrado com sucesso.";
                            $success = true;
                        } else {
                            $message = "Tente novamente mais tarde.";
                            $success = false;
                        }
                        
                    } catch (\Exception $e) {
                        $message = $e->getMessage();
                        $success = false;
                    }
                } else {
                    $message = "Erro ao efetuar upload. Tente novamente.";
                    $success = false;
                }
            } else {
                $message = "Erro ao efetuar upload. Tente novamente.";
                $success = false;
            }
        }
        
        $form_data = array(
            'title' => $request->getPost('title'),
            'description' => $request->getPost('description'),
            'order' => $request->getPost('order'),
            'status' => $request->getPost('status')
        );

        $session = \Config\Services::session();
        
        $response = array(
            'message' => $message,
            'success' => $success,
            'form_data' => $form_data,
            'logged_user' => $this->ionAuth->user(),
            'ion_auth' => $this->ionAuth,
            'session' => $session,
        );

        
        $session->setFlashdata('response', $response);
        
        if ($success && $service_id) {
            return redirect()->to('/admin/truckcenter/services/edit/' . $service_id);
        } else {
            return redirect()->to('/admin/truckcenter/services/add_new');
        }
    }
    
    public function edit($id = null)
    {
        helper(['form']);
        
        if (!$this->ionAuth->loggedIn()) {
            return redirect()->to('/auth/login');
        } else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }
        
        $serviceModel = model('App\Models\TruckcenterServiceModel', false);
        $service = $serviceModel->get_by_id($id);
        
        if (!$service) {
            return redirect()->to('/admin/truckcenter/services');
        }

        $session = \Config\Services::session();
        
        $data = array(
            'page' => 'truckcenter_services',
            'user' => $this->ionAuth->user()->row(),
            'session' => $session,
            'service' => $service,
            'logged_user' => $this->ionAuth->user(),
            'ion_auth' => $this->ionAuth,
            'session' => $session,
        );
        
        echo view('admin/includes/header', $data);
        echo view('admin/truckcenter/services/edit', $data);
        echo view('admin/includes/footer', $data);
    }
    
    public function update($id = null)
    {
        if (!$this->ionAuth->loggedIn()) {
            return redirect()->to('/auth/login');
        } else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }
        

        $request = $this->request;
        $message = '';
        $success = false;
        
        $serviceModel = model('App\Models\TruckcenterServiceModel', false);
        $service = $serviceModel->get_by_id($id);
        
        if (!$service) {
            return redirect()->to('/admin/truckcenter/services');
        }
        
        $icon = $this->request->getFile('icon');
        $title = $request->getPost('title');
        $description = $request->getPost('description');
        $order = $request->getPost('order');
        $status = $request->getPost('status') ? 1 : 0;
        
        $icon_path = $request->getPost('icon');

        $session = \Config\Services::session();
        
        if ($icon && $icon->isValid() && !$icon->hasMoved()) {
            $validationRule = [
                'icon' => [
                    'label' => 'Ícone',
                    'rules' => 'uploaded[icon]|max_size[icon,2048]|ext_in[icon,png,jpg,jpeg,gif,svg]',
                ]
            ];
            
            if (!$this->validate($validationRule)) {
                $message = $this->validator->listErrors();
                $success = false;
                
                $response = array(
                    'message' => $message,
                    'success' => $success
                );
                
                $session->setFlashdata('response', $response);
                return redirect()->to('/admin/truckcenter/services/edit/' . $id);
            }
            
            $newName = $icon->getRandomName();
            
            if ($icon->move(ROOTPATH . 'public/uploads/truckcenter/services/', $newName)) {
                $icon_path = 'uploads/truckcenter/services/' . $newName;
                
                // Remove old image if exists
                if (isset($service->icon) && !empty($service->icon) && file_exists(ROOTPATH . 'public/' . $service->icon)) {
                    @unlink(ROOTPATH . 'public/' . $service->icon);
                }
            } else {
                $message = "Erro ao efetuar upload. Tente novamente.";
                $success = false;
                
                $response = array(
                    'message' => $message,
                    'success' => $success
                );
                
                $session->setFlashdata('response', $response);
                return redirect()->to('/admin/truckcenter/services/edit/' . $id);
            }
        }
        
        try {
            $serviceModel->update_service($id, $title, $icon_path, $description, $order, $status);
            $message = "Serviço/Produto atualizado com sucesso!";
            $success = true;
        } catch (\Exception $e) {
            $message = $e->getMessage();
            $success = false;
        }
        
        $response = array(
            'message' => $message,
            'success' => $success
        );
        
        $session->setFlashdata('response', $response);
        return redirect()->to('/admin/truckcenter/services/edit/' . $id);
    }
    
    public function remove_icon($id)
    {
        if (!$this->ionAuth->loggedIn()) {
            return redirect()->to('/auth/login');
        } else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }
        
        $serviceModel = model('App\Models\TruckcenterServiceModel', false);
        $service = $serviceModel->get_by_id($id);
        
        if (!$service) {
            return redirect()->to('/admin/truckcenter/services');
        }
        
        if (isset($service->icon) && !empty($service->icon) && file_exists(ROOTPATH . 'public/' . $service->icon)) {
            @unlink(ROOTPATH . 'public/' . $service->icon);
        }
        
        $serviceModel->remove_icon($id);
        
        $message = "Ícone removido com sucesso!";
        $success = true;
        
        $response = array(
            'message' => $message,
            'success' => $success
        );

        $session = \Config\Services::session();
        
        $session->setFlashdata('response', $response);
        return redirect()->to('/admin/truckcenter/services/edit/' . $id);
    }
    
    public function delete($id)
    {
        if (!$this->ionAuth->loggedIn()) {
            return redirect()->to('/auth/login');
        } else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }
        
        $serviceModel = model('App\Models\TruckcenterServiceModel', false);
        $service = $serviceModel->get_by_id($id);
        
        if (!$service) {
            return redirect()->to('/admin/truckcenter/services');
        }
        
        // Remove image if exists
        if (isset($service->icon) && !empty($service->icon) && file_exists(ROOTPATH . 'public/' . $service->icon)) {
            @unlink(ROOTPATH . 'public/' . $service->icon);
        }
        
        $serviceModel->delete_service($id);
        
        $message = "Serviço/Produto excluído com sucesso!";
        $success = true;
        
        $response = array(
            'message' => $message,
            'success' => $success
        );
        $session = \Config\Services::session();
        $session->setFlashdata('response', $response);
        return redirect()->to('/admin/truckcenter/services');
    }
}