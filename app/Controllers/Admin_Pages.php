<?php

namespace App\Controllers;

class Admin_Pages extends BaseController
{

    private $ionAuth;
    
    public function __construct()
	{
		$this->ionAuth = new \IonAuth\Libraries\IonAuth();
	}

    public function home()
    {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        helper(['form']);

        $session = \Config\Services::session();
        
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(1);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/pages.js').'?v='.filemtime('_assets/admin/js/pages.js').'"></script>'
        );

        $data['page'] = 'pages-home';
        $data['footer_dependencies'] = $footer_dependencies;
        $data['page_data'] = $page_data;
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/pages/home', $data);
        echo view('admin/includes/footer', $data);
    }

    public function institucional()
    {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        helper(['form']);

        $session = \Config\Services::session();
        
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(2);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/pages.js').'?v='.filemtime('_assets/admin/js/pages.js').'"></script>'
        );

        $data['page'] = 'pages-institucional';
        $data['footer_dependencies'] = $footer_dependencies;
        $data['page_data'] = $page_data;
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/pages/institucional', $data);
        echo view('admin/includes/footer', $data);
    }

    public function sustentabilidade()
    {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        helper(['form']);

        $session = \Config\Services::session();
        
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(3);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/pages.js').'?v='.filemtime('_assets/admin/js/pages.js').'"></script>'
        );

        $data['page'] = 'pages-sustentabilidade';
        $data['footer_dependencies'] = $footer_dependencies;
        $data['page_data'] = $page_data;
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/pages/sustentabilidade', $data);
        echo view('admin/includes/footer', $data);
    }

    public function cooperativismo()
    {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        helper(['form']);

        $session = \Config\Services::session();
        
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(4);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/pages.js').'?v='.filemtime('_assets/admin/js/pages.js').'"></script>'
        );

        $data['page'] = 'pages-cooperativismo';
        $data['footer_dependencies'] = $footer_dependencies;
        $data['page_data'] = $page_data;
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/pages/cooperativismo', $data);
        echo view('admin/includes/footer', $data);
    }

    public function politica_privacidade()
    {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        helper(['form']);

        $session = \Config\Services::session();
        
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(5);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/pages.js').'?v='.filemtime('_assets/admin/js/pages.js').'"></script>'
        );

        $data['page'] = 'pages-politica-de-privacidade';
        $data['footer_dependencies'] = $footer_dependencies;
        $data['page_data'] = $page_data;
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/pages/politica-de-privacidade', $data);
        echo view('admin/includes/footer', $data);
    }

    public function autocenter()
    {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        helper(['form']);

        $session = \Config\Services::session();
        
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(6);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/pages.js').'?v='.filemtime('_assets/admin/js/pages.js').'"></script>'
        );

        $data['page'] = 'pages-autocenter';
        $data['footer_dependencies'] = $footer_dependencies;
        $data['page_data'] = $page_data;
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/pages/autocenter', $data);
        echo view('admin/includes/footer', $data);
    }

    public function centro_eventos()
    {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        helper(['form']);

        $session = \Config\Services::session();
        
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(7);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/pages.js').'?v='.filemtime('_assets/admin/js/pages.js').'"></script>'
        );

        $data['page'] = 'pages-centro-de-eventos';
        $data['footer_dependencies'] = $footer_dependencies;
        $data['page_data'] = $page_data;
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/pages/centro-de-eventos', $data);
        echo view('admin/includes/footer', $data);
    }

    public function distribuidora_combustiveis()
    {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        helper(['form']);

        $session = \Config\Services::session();
        
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(8);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/pages.js').'?v='.filemtime('_assets/admin/js/pages.js').'"></script>'
        );

        $data['page'] = 'pages-distribuidora-de-combustiveis';
        $data['footer_dependencies'] = $footer_dependencies;
        $data['page_data'] = $page_data;
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/pages/distribuidora-de-combustiveis', $data);
        echo view('admin/includes/footer', $data);
    }

    public function ferragem_magazine()
    {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        helper(['form']);

        $session = \Config\Services::session();
        
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(9);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/pages.js').'?v='.filemtime('_assets/admin/js/pages.js').'"></script>'
        );

        $data['page'] = 'pages-ferragem-magazine';
        $data['footer_dependencies'] = $footer_dependencies;
        $data['page_data'] = $page_data;
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/pages/ferragem-magazine', $data);
        echo view('admin/includes/footer', $data);
    }

    public function postos_combustiveis()
    {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        helper(['form']);

        $session = \Config\Services::session();
        
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(10);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/pages.js').'?v='.filemtime('_assets/admin/js/pages.js').'"></script>'
        );

        $data['page'] = 'pages-postos-de-combustiveis';
        $data['footer_dependencies'] = $footer_dependencies;
        $data['page_data'] = $page_data;
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/pages/postos-de-combustiveis', $data);
        echo view('admin/includes/footer', $data);
    }

    public function copercana_solar()
    {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        helper(['form']);

        $session = \Config\Services::session();
        
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(11);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/pages.js').'?v='.filemtime('_assets/admin/js/pages.js').'"></script>'
        );

        $data['page'] = 'pages-copercana-solar';
        $data['footer_dependencies'] = $footer_dependencies;
        $data['page_data'] = $page_data;
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/pages/copercana-solar', $data);
        echo view('admin/includes/footer', $data);
    }

    public function copercana_seguros()
    {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        helper(['form']);

        $session = \Config\Services::session();
        
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(12);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/pages.js').'?v='.filemtime('_assets/admin/js/pages.js').'"></script>'
        );

        $data['page'] = 'pages-copercana-seguros';
        $data['footer_dependencies'] = $footer_dependencies;
        $data['page_data'] = $page_data;
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/pages/copercana-seguros', $data);
        echo view('admin/includes/footer', $data);
    }

    public function supermercados()
    {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }
        helper(['form']);

        $session = \Config\Services::session();
        
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(13);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/pages.js').'?v='.filemtime('_assets/admin/js/pages.js').'"></script>'
        );

        $data['page'] = 'pages-supermercados';
        $data['footer_dependencies'] = $footer_dependencies;
        $data['page_data'] = $page_data;
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/pages/supermercados', $data);
        echo view('admin/includes/footer', $data);
    }

    public function unidade_graos()
    {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        helper(['form']);

        $session = \Config\Services::session();
        
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(14);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/pages.js').'?v='.filemtime('_assets/admin/js/pages.js').'"></script>'
        );

        $data['page'] = 'pages-unidade-de-graos';
        $data['footer_dependencies'] = $footer_dependencies;
        $data['page_data'] = $page_data;
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/pages/unidade-de-graos', $data);
        echo view('admin/includes/footer', $data);
    }

    public function assessoria_imprensa()
    {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        helper(['form']);

        $session = \Config\Services::session();
        
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(15);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/pages.js').'?v='.filemtime('_assets/admin/js/pages.js').'"></script>'
        );

        $data['page'] = 'pages-assessoria-de-imprensa';
        $data['footer_dependencies'] = $footer_dependencies;
        $data['page_data'] = $page_data;
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/pages/assessoria-de-imprensa', $data);
        echo view('admin/includes/footer', $data);
    }

    public function revista_canavieiros()
    {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        helper(['form']);

        $session = \Config\Services::session();
        
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(16);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/pages.js').'?v='.filemtime('_assets/admin/js/pages.js').'"></script>'
        );

        $data['page'] = 'pages-revista-canavieiros';
        $data['footer_dependencies'] = $footer_dependencies;
        $data['page_data'] = $page_data;
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/pages/revista-canavieiros', $data);
        echo view('admin/includes/footer', $data);
    }

    public function radio_copercana()
    {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        helper(['form']);

        $session = \Config\Services::session();
        
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(17);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/pages.js').'?v='.filemtime('_assets/admin/js/pages.js').'"></script>'
        );

        $data['page'] = 'pages-radio-copercana';
        $data['footer_dependencies'] = $footer_dependencies;
        $data['page_data'] = $page_data;
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/pages/radio-copercana', $data);
        echo view('admin/includes/footer', $data);
    }

    public function redes_sociais()
    {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        helper(['form']);

        $session = \Config\Services::session();
        
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(18);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/pages.js').'?v='.filemtime('_assets/admin/js/pages.js').'"></script>'
        );

        $data['page'] = 'pages-redes-sociais';
        $data['footer_dependencies'] = $footer_dependencies;
        $data['page_data'] = $page_data;
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/pages/redes-sociais', $data);
        echo view('admin/includes/footer', $data);
    }

    public function indicacoes()
    {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        helper(['form']);

        $session = \Config\Services::session();
        
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(19);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/pages.js').'?v='.filemtime('_assets/admin/js/pages.js').'"></script>'
        );

        $data['page'] = 'pages-indicacoes';
        $data['footer_dependencies'] = $footer_dependencies;
        $data['page_data'] = $page_data;
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/pages/indicacoes', $data);
        echo view('admin/includes/footer', $data);
    }

    public function cadastro()
    {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        helper(['form']);

        $session = \Config\Services::session();
        
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(20);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/pages.js').'?v='.filemtime('_assets/admin/js/pages.js').'"></script>'
        );

        $data['page'] = 'pages-cadastro';
        $data['footer_dependencies'] = $footer_dependencies;
        $data['page_data'] = $page_data;
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/pages/cadastro', $data);
        echo view('admin/includes/footer', $data);
    }

    public function jovem_aprendiz()
    {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        helper(['form']);

        $session = \Config\Services::session();
        
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(21);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/pages.js').'?v='.filemtime('_assets/admin/js/pages.js').'"></script>'
        );

        $data['page'] = 'pages-jovem-aprendiz';
        $data['footer_dependencies'] = $footer_dependencies;
        $data['page_data'] = $page_data;
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/pages/jovem-aprendiz', $data);
        echo view('admin/includes/footer', $data);
    }

    public function vagas_disponiveis()
    {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        helper(['form']);

        $session = \Config\Services::session();
        
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(22);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/pages.js').'?v='.filemtime('_assets/admin/js/pages.js').'"></script>'
        );

        $data['page'] = 'pages-vagas-disponiveis';
        $data['footer_dependencies'] = $footer_dependencies;
        $data['page_data'] = $page_data;
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/pages/vagas-disponiveis', $data);
        echo view('admin/includes/footer', $data);
    }

    public function laboratorio_solos()
    {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        helper(['form']);

        $session = \Config\Services::session();
        
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(23);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/pages.js').'?v='.filemtime('_assets/admin/js/pages.js').'"></script>'
        );

        $data['page'] = 'pages-laboratorio-de-solos';
        $data['footer_dependencies'] = $footer_dependencies;
        $data['page_data'] = $page_data;
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/pages/laboratorio-de-solos', $data);
        echo view('admin/includes/footer', $data);
    }

    public function tecnologia_bioas()
    {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        helper(['form']);

        $session = \Config\Services::session();
        
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(24);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/pages.js').'?v='.filemtime('_assets/admin/js/pages.js').'"></script>'
        );

        $data['page'] = 'pages-tecnologia-bioas';
        $data['footer_dependencies'] = $footer_dependencies;
        $data['page_data'] = $page_data;
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/pages/tecnologia-bioas', $data);
        echo view('admin/includes/footer', $data);
    }

    public function noticias()
    {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        helper(['form']);

        $session = \Config\Services::session();
        
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(25);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/pages.js').'?v='.filemtime('_assets/admin/js/pages.js').'"></script>'
        );

        $data['page'] = 'pages-noticias';
        $data['footer_dependencies'] = $footer_dependencies;
        $data['page_data'] = $page_data;
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/pages/noticias', $data);
        echo view('admin/includes/footer', $data);
    }

    public function blog()
    {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        helper(['form']);

        $session = \Config\Services::session();
        
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(28);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/pages.js').'?v='.filemtime('_assets/admin/js/pages.js').'"></script>'
        );

        $data['page'] = 'pages-blog';
        $data['footer_dependencies'] = $footer_dependencies;
        $data['page_data'] = $page_data;
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/pages/blog', $data);
        echo view('admin/includes/footer', $data);
    }

    public function contato()
    {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        helper(['form']);

        $session = \Config\Services::session();
        
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(26);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/pages.js').'?v='.filemtime('_assets/admin/js/pages.js').'"></script>'
        );

        $data['page'] = 'pages-contato';
        $data['footer_dependencies'] = $footer_dependencies;
        $data['page_data'] = $page_data;
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/pages/contato', $data);
        echo view('admin/includes/footer', $data);
    }

    public function departamento_agronomico()
    {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        helper(['form']);

        $session = \Config\Services::session();
        
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(27);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/pages.js').'?v='.filemtime('_assets/admin/js/pages.js').'"></script>'
        );

        $data['page'] = 'pages-departamento-agronomico';
        $data['footer_dependencies'] = $footer_dependencies;
        $data['page_data'] = $page_data;
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/pages/departamento-agronomico', $data);
        echo view('admin/includes/footer', $data);
    }

    public function copercana_60_anos()
    {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        helper(['form']);

        $session = \Config\Services::session();
        
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(29);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/pages.js').'?v='.filemtime('_assets/admin/js/pages.js').'"></script>'
        );

        $data['page'] = 'pages-copercana-60-anos';
        $data['footer_dependencies'] = $footer_dependencies;
        $data['page_data'] = $page_data;
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/pages/copercana-60-anos', $data);
        echo view('admin/includes/footer', $data);
    }

    public function soucooperado()
    {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        helper(['form']);

        $session = \Config\Services::session();
        
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(30);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $footer_dependencies = array(
            '<script src="'.base_url('_assets/admin/js/pages.js').'?v='.filemtime('_assets/admin/js/pages.js').'"></script>'
        );

        $data['page'] = 'pages-soucooperado';
        $data['footer_dependencies'] = $footer_dependencies;
        $data['page_data'] = $page_data;
        $data['session'] = $session;
        $data['logged_user'] = $this->ionAuth->user();
         $data['ion_auth'] = $this->ionAuth;
        
        echo view('admin/includes/header', $data);
        echo view('admin/pages/soucooperado', $data);
        echo view('admin/includes/footer', $data);
    }

    public function update_page($page_id) {
        if (!$this->ionAuth->loggedIn()) {
			return redirect()->to('/auth/login');
		} else if (!$this->ionAuth->isAdmin()) {
            return redirect()->to('/admin');
        }

        $session = \Config\Services::session();
        $request = \Config\Services::request();

        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id($page_id);

        if(!isset($page) || empty($page) || !$page) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $title = $page->title;
        $definition = array();
        $url = $page->url;
        $view = $page->view;
        $status = $page->status;

        foreach($request->getPost() as $key => $val) {
            $definition[$key] = $val;
        }

        if ($files = $this->request->getFiles()) {
            $date = date('Ymd');

            foreach ($files as $key => $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $random_name = $file->getRandomName();
                    $file_path = "uploads/pages/$date/$random_name";

                    if (!is_dir(PUBLIC_PATH."/uploads/pages/$date")) {
                        mkdir(PUBLIC_PATH."/uploads/pages/$date", 0777, TRUE);
                    }

                    $file->move("uploads/pages/$date", $random_name);

                    $definition[$key] = $file_path;
                }
            }
        }

        $definition = json_encode($definition);

        $pageModel->update_page($page_id, $title, $definition, $url, $view, $status);
        $message = "Página atualizada com sucesso!";
        $success = true;

        $response = array(
            'message' => $message,
            'success' => $success
        );

        $session->setFlashdata('response', $response);

        return redirect()->to('/admin/pages/'.$url);
    }

    public function delete_file($page_id, $file_key) {
        $session = \Config\Services::session();

        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id($page_id);

        if(!isset($page) || empty($page) || !$page) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $title = $page->title;
        $definition = $page->definition;
        $url = $page->url;
        $view = $page->view;
        $status = $page->status;

        $definition = (array)json_decode($definition);
        $definition[$file_key] = "";

        $definition = json_encode($definition);

        $pageModel->update_page($page_id, $title, $definition, $url, $view, $status);
        $message = "Página atualizada com sucesso!";
        $success = true;

        $response = array(
            'message' => $message,
            'success' => $success
        );

        $session->setFlashdata('response', $response);

        return redirect()->to('/admin/pages/'.$url);
    }

    public function make_cover($file = "") {
        $uri = current_url(true);
        $segments = $uri->getSegments();
        $segments = array_slice($segments, 3);

        $file_path = "";

        foreach($segments as $key => $segment) {
            $file_path .= $segment;

            if($key < count($segments) - 1) $file_path .= "/";
        }

        if(empty($file_path)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
            $w = 243;
            $h = 350;

            $im = new \Imagick();
            try {
                $im->setResolution(144, 144);     //set the resolution of the resulting jpg
                $im->readImage($file_path.'[0]');    //[0] for the first page
                $im->scaleImage($w, 0);
                $im->cropImage($w, $h, 0, 0);
                $im->setImageFormat('jpg');
                $im->setInterlaceScheme(\Imagick::INTERLACE_PLANE);
                header('Content-Type: image/jpeg');
                echo $im;
            } catch (\Exception $e) {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }

		return null;
	}
}
