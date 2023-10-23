<?php

namespace App\Controllers;

class Admin_Users extends BaseController
{
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
            'page' => 'users',
            'session' => $session,
            'logged_user' => $this->ionAuth->user(),
            'is_admin' => $this->ionAuth->isAdmin(),
            'ion_auth' => $this->ionAuth
        );
        
        echo view('admin/includes/header', $data);
        echo view('admin/users/index', $data);
        echo view('admin/includes/footer', $data);
    }

    public function add_new() {
        helper(['form']);

        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();

        $data['page'] = 'users-add_new';
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
         $data['is_admin'] = $this->ionAuth->isAdmin();
        $data['session'] = $session;
        
        echo view('admin/includes/header', $data);
        echo view('admin/users/add_new', $data);
        echo view('admin/includes/footer', $data);
    }

    public function edit($user_id)
    {
        helper(['form']);

        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $userModel = model('App\Models\UserModel', false);
        $user = $userModel->get_by_id($user_id);

        if(!isset($user) || empty($user) || !$user) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $user_groups = $this->ionAuth->getUsersGroups($user->id)->getResult();

        $header_dependencies = array(
            '<script src="https://kit.fontawesome.com/70f24af034.js" crossorigin="anonymous"></script>'
        );

        $data['header_dependencies'] = $header_dependencies;
        $data['page'] = 'users-edit';
        $data['session'] = $session;
        $data['user'] = $user;
        $data['user_groups'] = $user_groups;
        $data['logged_user'] = $this->ionAuth->user();
        $data['is_admin'] = $this->ionAuth->isAdmin();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/users/edit', $data);
        echo view('admin/includes/footer', $data);
    }

    public function add_user() {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $request = \Config\Services::request();

        $validationRule = [
            'picture' => [
                'label' => 'Imagem do perfil',
                'rules' => 'if_exist|uploaded[picture]'
                    . '|is_image[picture]'
                    . '|mime_in[picture,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[picture,1000]',
            ],
            'first_name' => [
                'label' => 'Primeiro nome',
                'rules' => 'trim|required',
            ],
            'last_name' => [
                'label' => 'Último nome',
                'rules' => 'trim|required',
            ],
            'email' => [
                'label' => 'E-mail',
                'rules' => 'trim|required|valid_email',
            ],
            'password' => [
                'label' => 'Senha',
                'rules' => 'required|min_length[8]|matches[password_confirm]'
            ],
            'password_confirm' => [
                'label' => 'Confirmação de senha',
                'rules' => 'required'
            ],
            'group' => [
                'label' => 'Grupo',
                'rules' => 'required',
            ],
        ];

        if (!$this->validate($validationRule)) {
            $message = $this->validator->listErrors();
            $success = false;
        } else {
            $picture = $this->request->getFile('picture');
            $first_name = $request->getPost('first_name');
            $last_name = $request->getPost('last_name');
            $email = $request->getPost('email');
            $password = $request->getPost('password');
            $group = $request->getPost('group');
            $description = $request->getPost('description');

            $website = $request->getPost('website');
            $instagram = $request->getPost('instagram');
            $facebook = $request->getPost('facebook');
            $twitter = $request->getPost('twitter');
            $youtube = $request->getPost('youtube');
            $linkedin = $request->getPost('linkedin');
            $tiktok = $request->getPost('tiktok');
            $behance = $request->getPost('behance');
            $pinterest = $request->getPost('pinterest');
            $flickr = $request->getPost('flickr');
            $github = $request->getPost('github');

            $userModel = model('App\Models\UserModel', false);
            $user = $userModel->get_by_email($email);

            if($user && $user->active == 1) {
                $message = 'Já existe um usuário com o e-mail informado.';
                $success = false;
            } else {

                if(isset($picture) && !empty($picture) && $picture->isValid() && !$picture->hasMoved()) {
                    $random_name = $picture->getRandomName();
                    $date = date('Ymd');

                    if (!is_dir(PUBLIC_PATH."/uploads/users/$date")) {
                        mkdir(PUBLIC_PATH."/uploads/users/$date", 0777, TRUE);
                    }

                    $picture->move("uploads/users/$date", $random_name);
                    $picture_path = "uploads/users/$date/$random_name";
                } else {
                    $picture_path = "";
                }

                $additionalData = array(
                    'first_name' => $this->request->getPost('first_name'),
                    'last_name'  => $this->request->getPost('last_name'),
                    'description' => $description,
                    'picture' => $picture_path,
                    'website' => $website,
                    'instagram' => $instagram,
                    'facebook' => $facebook,
                    'twitter' => $twitter,
                    'youtube' => $youtube,
                    'linkedin' => $linkedin,
                    'tiktok' => $tiktok,
                    'behance' => $behance,
                    'pinterest' => $pinterest,
                    'flickr' => $flickr,
                    'github' => $github
                );

                $groups = array($group);

                $user_id = $this->ionAuth->register($email, $password, $email, $additionalData, $groups);

                if($user_id) {
                    $message = $this->ionAuth->messages();
                    $success = true;
                } else {
                    $message = $this->ionAuth->errors('list');
                    $success = false;
                }
            }
        } 

        $form_data = array(
            'first_name' => $request->getPost('first_name'),
            'last_name' => $request->getPost('last_name'),
            'email' => $request->getPost('email'),
            'description' => $request->getPost('description'),
            'group' => $request->getPost('group'),
            'website' => $request->getPost('website'),
            'instagram' => $request->getPost('instagram'),
            'facebook' => $request->getPost('facebook'),
            'twitter' => $request->getPost('twitter'),
            'youtube' => $request->getPost('youtube'),
            'linkedin' => $request->getPost('linkedin'),
            'tiktok' => $request->getPost('tiktok'),
            'behance' => $request->getPost('behance'),
            'pinterest' => $request->getPost('pinterest'),
            'flickr' => $request->getPost('flickr'),
            'github' => $request->getPost('github')
        );

        $response = array(
            'message' => $message,
            'success' => $success,
            'form_data' => $form_data
        );

        $session->setFlashdata('response', $response);

        if($success && $user_id) {
            return redirect()->to('/admin/users/edit/'.$user_id);
        } else {
            return redirect()->to('/admin/users/add_new');
        }
    }

    public function update_user($user_id) {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $request = \Config\Services::request();

        $userModel = model('App\Models\UserModel', false);
        $user = $userModel->get_by_id($user_id);

        if(!isset($user) || empty($user) || !$user) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $validationRule = [
            'picture' => [
                'label' => 'Imagem do perfil',
                'rules' => 'if_exist|uploaded[picture]'
                    . '|is_image[picture]'
                    . '|mime_in[picture,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                    . '|max_size[picture,1000]',
            ],
            'first_name' => [
                'label' => 'Primeiro nome',
                'rules' => 'trim|required',
            ],
            'last_name' => [
                'label' => 'Último nome',
                'rules' => 'trim|required',
            ],
            'group' => [
                'label' => 'Grupo',
                'rules' => 'required',
            ],
        ];

        if (!$this->validate($validationRule)) {
            $message = $this->validator->listErrors();
            $success = false;
        } else {
            $picture = $this->request->getFile('picture');
            $first_name = $request->getPost('first_name');
            $last_name = $request->getPost('last_name');
            $description = $request->getPost('description');
            $group = $request->getPost('group');

            $website = $request->getPost('website');
            $instagram = $request->getPost('instagram');
            $facebook = $request->getPost('facebook');
            $twitter = $request->getPost('twitter');
            $youtube = $request->getPost('youtube');
            $linkedin = $request->getPost('linkedin');
            $tiktok = $request->getPost('tiktok');
            $behance = $request->getPost('behance');
            $pinterest = $request->getPost('pinterest');
            $flickr = $request->getPost('flickr');
            $github = $request->getPost('github');

            if(isset($picture) && !empty($picture) && $picture->isValid() && !$picture->hasMoved()) {
                
                $random_name = $picture->getRandomName();
                $date = date('Ymd');

                if (!is_dir(PUBLIC_PATH."/uploads/users/$date")) {
                    mkdir(PUBLIC_PATH."/uploads/users/$date", 0777, TRUE);
                }

                $picture->move("uploads/users/$date", $random_name);
                $picture_path = "uploads/users/$date/$random_name";
            } else {
                $picture_path = $user->picture;
            }

            //$userModel->update_user($user_id, $first_name, $last_name, $picture_path, $description, $website, $instagram, $facebook, $twitter, $youtube, $linkedin, $tiktok, $behance, $pinterest, $flickr, $github);
            
            $this->ionAuth->update($user_id, 
                array(
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'picture_path' => $picture_path,
                    'description' => $description,
                    'website' => $website,
                    'instagram' => $instagram,
                    'facebook' => $facebook,
                    'twitter' => $twitter,
                    'youtube' => $youtube,
                    'linkedin' => $linkedin,
                    'tiktok' => $tiktok,
                    'behance' => $behance,
                    'pinterest' => $pinterest,
                    'flickr' => $flickr,
                    'github' => $github
                )
            );

            $this->ionAuth->removeFromGroup(false, $user_id);
            $this->ionAuth->addToGroup($group, $user_id);

            $message = "usuário atualizado com sucesso!";
            $success = true;
        } 

        $response = array(
            'message' => $message,
            'success' => $success,
            'tab' => 'edit'
        );

        $session->setFlashdata('response', $response);

        return redirect()->to('/admin/users/edit/'.$user_id.'?tab=edit');
    }

    public function remove_picture($user_id) {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }
        $userModel = model('App\Models\UserModel', false);
        $user = $userModel->get_by_id($user_id);

        if(!isset($user) || empty($user) || !$user) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $userModel->remove_picture($user_id);

        return redirect()->to('/admin/users/edit/'.$user_id.'?tab=edit');
    }

	public function change_password($user_id = null)
	{
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $request = \Config\Services::request();

        $user = $this->ionAuth->user()->row();

        $validationRule = [
            'new_password' => [
                'label' => 'Nova senha',
                'rules' => 'required|min_length[8]|matches[new_password_confirm]',
            ],
            'new_password_confirm' => [
                'label' => 'Confirmação da nova senha',
                'rules' => 'required',
            ]
        ];

        if(!$this->ionAuth->isAdmin()) {
            $validationRule = [
                'old_password' => [
                    'label' => 'Senha atual',
                    'rules' => 'required',
                ],
                ...$validationRule
            ];
        }

        if (!$this->validate($validationRule)) {
            $message = $this->validator->listErrors();
            $success = false;
        } else {

            $change;

            if($this->ionAuth->isAdmin() && isset($user_id) && !empty($user_id)) {
                $data = array(
                    'password' => $this->request->getPost('new_password'),
                );

                $change = $this->ionAuth->update($user_id, $data);
            } else {
			    $identity = $session->get('identity');
                $change = $this->ionAuth->changePassword($identity, $this->request->getPost('old_password'), $this->request->getPost('new_password'));
            }

            if($change) {
                $message = $this->ionAuth->messages();
                $success = true;
            } else {
                $message = $this->ionAuth->errors();
                $success = false;
            }
        }
        
        $response = array(
            'message' => $message,
            'success' => $success,
            'tab' => 'change-password'
        );

        $session->setFlashdata('response', $response);

        return redirect()->to('/admin/users/edit/'.$user->id.'?tab=change-password');
	}

    public function delete($user_id) {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();

        $userModel = model('App\Models\UserModel', false);
        $user = $userModel->get_by_id($user_id);

        if(!isset($user) || empty($user) || !$user) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $userModel->delete_user($user_id);

        $response = array(
            'message' => "Usuário excluído com sucesso!",
            'success' => true
        );

        $session->setFlashdata('response', $response);

        return redirect()->to('/admin/users');
    }
}