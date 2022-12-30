<?php

namespace App\Controllers;

class Admin_Jobs extends BaseController
{
    protected $helpers = ['form'];

    public function __construct()
	{
		$this->ionAuth = new \IonAuth\Libraries\IonAuth();
	}

    public function index()
    {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin() && !$this->ionAuth->inGroup(4)) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        
        $data = array(
            'page' => 'jobs',
            'session' => $session,
            'logged_user' => $this->ionAuth->user(),
            'ion_auth' => $this->ionAuth
        );
        
        echo view('admin/includes/header', $data);
        echo view('admin/jobs/index', $data);
        echo view('admin/includes/footer', $data);
    }

    public function add_new()
    {
        helper(['form']);
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin() && !$this->ionAuth->inGroup(4)) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();

        $roleModel = model('App\Models\RoleModel', false);
        $roles = $roleModel->get_all();

        $branchModel = model('App\Models\BranchModel', false);
        $branches = $branchModel->get_all();

        $header_dependencies = array(
            '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />'
        );

        $footer_dependencies = array(
            '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>',
            '<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>',
            '<script src="'.base_url('_assets/admin/js/jobs.js').'?v='.filemtime('_assets/admin/js/jobs.js').'"></script>'
        );

        $data['page'] = 'jobs-add_new';
        $data['header_dependencies'] = $header_dependencies;
        $data['footer_dependencies'] = $footer_dependencies;
        $data['roles'] = $roles;
        $data['branches'] = $branches;
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/jobs/add_new', $data);
        echo view('admin/includes/footer', $data);
    }

    public function edit($job_id)
    {
        helper(['form']);

        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin() && !$this->ionAuth->inGroup(4)) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $jobModel = model('App\Models\JobModel', false);
        $job = $jobModel->get_by_id($job_id);

        $roleModel = model('App\Models\RoleModel', false);
        $roles = $roleModel->get_all();

        $branchModel = model('App\Models\BranchModel', false);
        $branches = $branchModel->get_all();

        if(!isset($job) || empty($job) || !$job) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $header_dependencies = array(
            '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />'
        );

        $footer_dependencies = array(
            '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>',
            '<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>',
            '<script src="'.base_url('_assets/admin/js/jobs.js').'?v='.filemtime('_assets/admin/js/jobs.js').'"></script>'
        );

        $data['page'] = 'jobs-edit';
        $data['header_dependencies'] = $header_dependencies;
        $data['footer_dependencies'] = $footer_dependencies;
        $data['session'] = $session;
        $data['roles'] = $roles;
        $data['branches'] = $branches;
        $data['job'] = $job;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/jobs/edit', $data);
        echo view('admin/includes/footer', $data);
    }

    public function add_job() {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin() && !$this->ionAuth->inGroup(4)) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $request = \Config\Services::request();

        $contact_rules  = [
            'role_id' => [
                'rules' => 'required', 
                'errors' => [
                    'required' => 'O campo \'Cargo\' é obrigatório'
                ]
            ],
            'title' => [
                'rules' => 'required', 
                'errors' => [
                    'required' => 'O campo \'Título\' é obrigatório'
                ]
            ],
            'branch_id' => [
                'rules' => 'required', 
                'errors' => [
                    'required' => 'O campo \'Filial\' é obrigatório'
                ]
            ],
            'type' => [
                'rules' => 'required', 
                'errors' => [
                    'required' => 'O campo \'Tipo de Vaga\' é obrigatório'
                ]
            ],
            'quantity' => [
                'rules' => 'required|integer', 
                'errors' => [
                    'required' => 'O campo \'Quantidade de vagas\' é obrigatório',
                    'integer' => 'O campo \'Quantidade de vagas\' deve ser um número inteiro.',
                ]
            ],
            'grade' => [
                'rules' => 'required', 
                'errors' => [
                    'required' => 'O campo \'Escolaridade\' é obrigatório'
                ]
            ],
            'modality' => [
                'rules' => 'required', 
                'errors' => [
                    'required' => 'O campo \'Modalidade\' é obrigatório'
                ]
            ],
            'description' => [
                'rules' => 'required', 
                'errors' => [
                    'required' => 'O campo \'Descrição\' é obrigatório'
                ]
            ]
        ];

        if (!$this->validate($contact_rules)) {
           $message = $this->validator->listErrors();
           $success = false;
        } else {

            $role_id = $request->getPost('role_id');
            $related_role_01_id = $request->getPost('related_role_01_id');
            $related_role_02_id = $request->getPost('related_role_02_id');
            $title = $request->getPost('title');
            $branch_id = $request->getPost('branch_id');
            $type = $request->getPost('type');
            $activity = $request->getPost('activity');
            $quantity = $request->getPost('quantity');
            $workload = $request->getPost('workload');
            $modality = $request->getPost('modality');
            $grade = $request->getPost('grade');
            $description = $request->getPost('description');
            $status = $request->getPost('status');
            $status = $status ? $status : 0;

            try {
                $jobModel = model('App\Models\JobModel', false);
                $job_id = $jobModel->add($role_id, $related_role_01_id, $related_role_02_id, $title, $branch_id, $type, $activity, $quantity, $workload, $modality, $grade, $description, $status);

                if($job_id) {
                    $message = "Vaga cadastrada com sucesso.";
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

        $form_data = array(
            'name' => $request->getPost('name'),
            'link' => $request->getPost('link'),
            'role_id' => $request->getPost('role_id')
        );

        $response = array(
            'message' => $message,
            'success' => $success,
            'form_data' => $form_data
        );

        $session->setFlashdata('response', $response);

        if($success && $job_id) {
            return redirect()->to('/admin/jobs/edit/'.$job_id);
        } else {
            return redirect()->to('/admin/jobs/add_new');
        }
    }

    public function update_job($job_id) {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin() && !$this->ionAuth->inGroup(4)) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $request = \Config\Services::request();

        $contact_rules  = [
            'role_id' => [
                'rules' => 'required', 
                'errors' => [
                    'required' => 'O campo \'Cargo\' é obrigatório'
                ]
            ],
            'title' => [
                'rules' => 'required', 
                'errors' => [
                    'required' => 'O campo \'Título\' é obrigatório'
                ]
            ],
            'branch_id' => [
                'rules' => 'required', 
                'errors' => [
                    'required' => 'O campo \'Filial\' é obrigatório'
                ]
            ],
            'type' => [
                'rules' => 'required', 
                'errors' => [
                    'required' => 'O campo \'Tipo de Vaga\' é obrigatório'
                ]
            ],
            'quantity' => [
                'rules' => 'required|integer', 
                'errors' => [
                    'required' => 'O campo \'Quantidade de vagas\' é obrigatório',
                    'integer' => 'O campo \'Quantidade de vagas\' deve ser um número inteiro.',
                ]
            ],
            'grade' => [
                'rules' => 'required', 
                'errors' => [
                    'required' => 'O campo \'Escolaridade\' é obrigatório'
                ]
            ],
            'modality' => [
                'rules' => 'required', 
                'errors' => [
                    'required' => 'O campo \'Modalidade\' é obrigatório'
                ]
            ],
            'description' => [
                'rules' => 'required', 
                'errors' => [
                    'required' => 'O campo \'Descrição\' é obrigatório'
                ]
            ]
        ];

        $jobModel = model('App\Models\JobModel', false);
        $job = $jobModel->get_by_id($job_id);

        if(!isset($job) || empty($job) || !$job) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        if (!$this->validate($contact_rules)) {
           $message = $this->validator->listErrors();
           $success = false;
        } else {

            $role_id = $request->getPost('role_id');
            $related_role_01_id = $request->getPost('related_role_01_id');
            $related_role_02_id = $request->getPost('related_role_02_id');
            $title = $request->getPost('title');
            $branch_id = $request->getPost('branch_id');
            $type = $request->getPost('type');
            $activity = $request->getPost('activity');
            $quantity = $request->getPost('quantity');
            $workload = $request->getPost('workload');
            $modality = $request->getPost('modality');
            $grade = $request->getPost('grade');
            $description = $request->getPost('description');
            $status = $request->getPost('status');
            $status = $status ? $status : 0;

            $jobModel->update_job($job_id, $role_id, $related_role_01_id, $related_role_02_id, $title, $branch_id, $type, $activity, $quantity, $workload, $modality, $grade, $description, $status);
            $message = "Vaga atualizada com sucesso!";
            $success = true;
        }

        $response = array(
            'message' => $message,
            'success' => $success
        );

        $session->setFlashdata('response', $response);

        return redirect()->to('/admin/jobs/edit/'.$job_id);
    }

    public function delete($job_id) {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin() && !$this->ionAuth->inGroup(4)) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();

        $jobModel = model('App\Models\JobModel', false);
        $job = $jobModel->get_by_id($job_id);

        if(!isset($job) || empty($job) || !$job) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $jobModel->delete_job($job_id);

        $response = array(
            'message' => "Expositor excluído com sucesso!",
            'success' => true
        );

        $session->setFlashdata('response', $response);

        return redirect()->to('/admin/jobs');
    }

    public function roles()
    {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin() && !$this->ionAuth->inGroup(4)) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        
        $data = array(
            'page' => 'jobs-roles',
            'session' => $session,
            'logged_user' => $this->ionAuth->user(),
            'ion_auth' => $this->ionAuth
        );
        
        echo view('admin/includes/header', $data);
        echo view('admin/jobs/roles-index', $data);
        echo view('admin/includes/footer', $data);
    }

    public function add_new_role()
    {
        helper(['form']);

        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin() && !$this->ionAuth->inGroup(4)) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();

        $data['page'] = 'jobs-role_add_new';
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/jobs/role-add_new', $data);
        echo view('admin/includes/footer', $data);
    }

    public function edit_role($role_id)
    {
        helper(['form']);

        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin() && !$this->ionAuth->inGroup(4)) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $roleModel = model('App\Models\RoleModel', false);
        $role = $roleModel->get_by_id($role_id);

        if(!isset($role) || empty($role) || !$role) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
        $data['page'] = 'jobs-roles_edit';
        $data['session'] = $session;
        $data['role'] = $role;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/jobs/role-edit', $data);
        echo view('admin/includes/footer', $data);
    }

    public function add_role() {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin() && !$this->ionAuth->inGroup(4)) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $request = \Config\Services::request();

        $roleModel = model('App\Models\RoleModel', false);

         $contact_rules  = [
            'title' => [
                'rules' => 'required', 
                'errors' => [
                    'required' => 'O campo \'Cargo\' é obrigatório.',
                ]
            ]
        ];

        if (!$this->validate($contact_rules)) {
           $message = $this->validator->listErrors();
           $success = false;
        } else {
            try {
                $title = $request->getPost('title');
                $role_id = $roleModel->add($title);

                if($role_id) {
                    $message = "Cargo Cadastrado com sucesso.";
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

        $form_data = array(
            'title' => $request->getPost('title'),
        );

        $response = array(
            'message' => $message,
            'success' => $success,
            'form_data' => $form_data
        );

        $session->setFlashdata('response', $response);

        if($success && $role_id) {
            return redirect()->to('/admin/jobs/edit_role/'.$role_id);
        } else {
            return redirect()->to('/admin/jobs/add_new_role');
        }
    }

    public function update_role($role_id) {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin() && !$this->ionAuth->inGroup(4)) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $request = \Config\Services::request();

        $roleModel = model('App\Models\RoleModel', false);
        $role = $roleModel->get_by_id($role_id);

        if(!isset($role) || empty($role) || !$role) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $contact_rules  = [
            'title' => [
                'rules' => 'required', 
                'errors' => [
                    'required' => 'O campo \'Cargo\' é obrigatório.',
                ]
            ]
        ];

        if (!$this->validate($contact_rules)) {
           $message = $this->validator->listErrors();
           $success = false;
        } else {
            
            $title = $request->getPost('title');

            $roleModel->update_role($role_id, $title);
           
            $message = "Cargo atualizado com sucesso!";
            $success = true;
        }

        $response = array(
            'message' => $message,
            'success' => $success
        );

        $session->setFlashdata('response', $response);

        return redirect()->to('/admin/jobs/edit_role/'.$role_id);
    }

    public function delete_role($role_id) {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin() && !$this->ionAuth->inGroup(4)) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();

        $roleModel = model('App\Models\RoleModel', false);
        $role = $roleModel->get_by_id($role_id);

        if(!isset($role) || empty($role) || !$role) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $roleModel->delete_role($role_id);

        $response = array(
            'message' => "Cargo excluído com sucesso!",
            'success' => true
        );

        $session->setFlashdata('response', $response);

        return redirect()->to('/admin/jobs/roles');
    }

}
