<?php

namespace App\Controllers;
use CodeIgniter\I18n\Time;

class Home extends BaseController
{
    public function __construct()
	{
        $generalModel = model('App\Models\GeneralModel', false);
		$this->general = $generalModel->get_by_id(1);

        $this->save_access();
	}

    public function index()
    {
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(1);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $seo = array(
            'title' => 'Conheça a Copercana: Evolução do agronegócio Brasileiro',
            'description' => 'Conheça as principais frente de uma das maiores responsáveis pela revolução em todo o agronegócio de nosso país, com diversas frentes de atuação.',
            'keywords' => '',
            'publisher' => 'https://suave.ppg.br',
            'robots' => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
            'canonical' => base_url()
        );

        $header_dependencies = array(
            '<link rel="stylesheet" href="'. base_url("_assets/vendor/slick/slick.css").'">',
            '<link rel="stylesheet" href="'. base_url("_assets/vendor/slick/slick-theme.css").'">'
        );

        $footer_dependencies = array(
            '<script src="'. base_url("_assets/vendor/slick/slick.js").'" ></script>',
            '<script src="'. base_url("_assets/js/home.js").'?v='. filemtime("_assets/js/home.js").'" ></script>'
        );

        $bannerModel = model('App\Models\BannerModel', false);
        $banners = $bannerModel->get_all_active_by_page_id(1);

        $postModel = model('App\Models\PostModel', false);
        $posts = $postModel->get_all_published(0, 5);

        $offerModel = model('App\Models\OfferModel', false);
        $offers = $offerModel->get_all_active();

        $data = array(
            'page' => 'home',
            'header_dependencies' => $header_dependencies,
            'footer_dependencies' => $footer_dependencies,
            'seo' => $seo,
            'posts' => $posts,
            'offers' => $offers,
            'banners' => $banners,
            'page_data' => $page_data,
            'general' => $this->general
        );

        if(isset($page_data) && isset($page_data->show_quotation_carousel) && $page_data->show_quotation_carousel == 1) {
            $data['quotation_list'] = true;
        }

        echo view('includes/header', $data);
        echo view('home', $data);
        echo view('includes/footer', $data);
    }

    public function institucional()
    {
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(2);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $seo = array(
            'title' => 'Unindo agricultores com visão em desenvolvimento! Quem somos',
            'description' => 'A copercana nasceu com a necessidade de unir os agricultores da região e promover a defesa de seus interesses. Clique aqui e saiba quem somos.',
            'keywords' => '',
            'publisher' => 'https://suave.ppg.br',
            'robots' => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
            'canonical' => base_url("institucional")
        );

        $testimonialModel = model('App\Models\TestimonialModel', false);
        $testimonials = $testimonialModel->get_all();

        $header_dependencies = array(
            '<link rel="stylesheet" href="'. base_url("_assets/vendor/slick/slick.css").'">',
            '<link rel="stylesheet" href="'. base_url("_assets/vendor/slick/slick-theme.css").'">'
        );

        $footer_dependencies = array(
            '<script src="'. base_url("_assets/vendor/slick/slick.js").'" ></script>',
            '<script src="'. base_url("_assets/js/institucional.js").'?v='. filemtime("_assets/js/institucional.js").'" ></script>'
        );

        $data = array(
            'page' => 'institucional',
            'seo' => $seo,
            'header_dependencies' => $header_dependencies,
            'footer_dependencies' => $footer_dependencies,
            'page_data' => $page_data,
            'testimonials' => $testimonials,
            'general' => $this->general
        );

        if(isset($page_data) && isset($page_data->show_quotation_carousel) && $page_data->show_quotation_carousel == 1) {
            $data['quotation_list'] = true;
        }

        echo view('includes/header', $data);
        echo view('institucional', $data);
        echo view('includes/footer', $data);
    }

    public function esg() {
        return redirect()->to('/institucional/sustentabilidade');
    }

    public function sustentabilidade()
    {
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(3);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $seo = array(
            'title' => 'A Copercana preza pela transparência e bons costumes. Confira!',
            'description' => 'Tendo como pilar, a ética, transparência e respeito pelos seus cooperados, a copercana trabalha pelo crescimento sustentável e econômico das regiões.',
            'keywords' => '',
            'publisher' => 'https://suave.ppg.br',
            'robots' => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
            'canonical' => base_url("institucional/sustentabilidade")
        );

        $data = array(
            'page' => 'sustentabilidade',
            'parent_page' => 'institucional',
            'seo' => $seo,
            'page_data' => $page_data,
            'general' => $this->general
        );

        if(isset($page_data) && isset($page_data->show_quotation_carousel) && $page_data->show_quotation_carousel == 1) {
            $data['quotation_list'] = true;
        }

        echo view('includes/header', $data);
        echo view('sustentabilidade', $data);
        echo view('includes/footer', $data);
    }

    public function cooperativismo()
    {
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(4);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $seo = array(
            'title' => 'Entenda mais sobre o cooperativismo e suas vantagens!',
            'description' => 'Entenda aqui, quais as vantagens de ser um cooperado, e porque esse modelo de negócios movimenta números excelentes ao redor do mundo. Saiba mais aqui.',
            'keywords' => '',
            'publisher' => 'https://suave.ppg.br',
            'robots' => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
            'canonical' => base_url("institucional/cooperativismo")
        );

        $data = array(
            'page' => 'cooperativismo',
            'parent_page' => 'institucional',
            'seo' => $seo,
            'page_data' => $page_data,
            'general' => $this->general
        );

        if(isset($page_data) && isset($page_data->show_quotation_carousel) && $page_data->show_quotation_carousel == 1) {
            $data['quotation_list'] = true;
        }

        echo view('includes/header', $data);
        echo view('cooperativismo', $data);
        echo view('includes/footer', $data);
    }

    public function politica_privacidade()
    {
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(5);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $seo = array(
            'title' => 'Conheça a Copercana:Evolução do agronegócio Brasileiro',
            'description' => 'Conheça as principais frente de uma das maiores responsáveis pela revolução em todo o agronegócio de nosso país, com diversas frentes de atuação.',
            'keywords' => '',
            'publisher' => 'https://suave.ppg.br',
            'robots' => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
            'canonical' => base_url("institucional/politica-de-privacidade")
        );

        $data = array(
            'page' => 'politica-de-privacidade',
            'parent_page' => 'institucional',
            'seo' => $seo,
            'page_data' => $page_data,
            'general' => $this->general
        );

        if(isset($page_data) && isset($page_data->show_quotation_carousel) && $page_data->show_quotation_carousel == 1) {
            $data['quotation_list'] = true;
        }

        echo view('includes/header', $data);
        echo view('politica-de-privacidade', $data);
        echo view('includes/footer', $data);
    }

    public function autocenter()
    {
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(6);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $seo = array(
            'title' => 'Serviços automotivos exclusivos, qualidade e eficiência! Confira.',
            'description' => 'Oferecemos serviços automotivos aos nossos cooperados e clientes, prezando sempre pela qualidade, comodidade e eficiência. Conheça nossas condições.',
            'keywords' => '',
            'publisher' => 'https://suave.ppg.br',
            'robots' => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
            'canonical' => base_url("servicos/autocenter")
        );

        $unitModel = model('App\Models\UnitModel', false);
        $units = $unitModel->get_all_by_type('autocenter');

        $data = array(
            'page' => 'autocenter',
            'parent_page' => 'servicos',
            'seo' => $seo,
            'page_data' => $page_data,
            'units' => $units,
            'general' => $this->general
        );

        if(isset($page_data) && isset($page_data->show_quotation_carousel) && $page_data->show_quotation_carousel == 1) {
            $data['quotation_list'] = true;
        }

        echo view('includes/header', $data);
        echo view('autocenter', $data);
        echo view('includes/footer', $data);
    }

    public function centro_eventos()
    {
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(7);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $seo = array(
            'title' => 'Centro de eventos copercana, um espaço completo | Confira',
            'description' => 'Conheça o centro de eventos Copercana, uma estrutura completa para organização e planejamento de festas, eventos e muito mais, venha conhecer nosso espaço.',
            'keywords' => '',
            'publisher' => 'https://suave.ppg.br',
            'robots' => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
            'canonical' => base_url("servicos/centro-de-eventos")
        );

        $header_dependencies = array(
            '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.11/css/lightgallery.css">',
            '<link rel="stylesheet" href="'. base_url("_assets/vendor/slick/slick.css").'">',
            '<link rel="stylesheet" href="'. base_url("_assets/vendor/slick/slick-theme.css").'">'
        );

        $footer_dependencies = array(
            '<script src="https://maps.googleapis.com/maps/api/js?libraries=places&amp;key=AIzaSyBsD8KY5fUIb8-58f_MkpAJ0tRUsGVcloM"></script>',
            '<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.11/js/lightgallery-all.min.js"></script>',
            '<script src="'. base_url("_assets/vendor/slick/slick.js").'" ></script>',
            '<script src="'. base_url("_assets/js/centro-de-eventos.js").'?v='. filemtime("_assets/js/centro-de-eventos.js").'" ></script>'
        );

        $galleryModel = model('App\Models\GalleryModel', false);
        $gallery = $galleryModel->get_all();

        $data = array(
            'page' => 'centro-de-eventos',
            'parent_page' => 'servicos',
            'header_dependencies' => $header_dependencies,
            'footer_dependencies' => $footer_dependencies,
            'seo' => $seo,
            'page_data' => $page_data,
            'gallery' => $gallery,
            'general' => $this->general
        );

        if(isset($page_data) && isset($page_data->show_quotation_carousel) && $page_data->show_quotation_carousel == 1) {
            $data['quotation_list'] = true;
        }

        echo view('includes/header', $data);
        echo view('centro-de-eventos', $data);
        echo view('includes/footer', $data);
    }

    public function distribuidora_combustiveis()
    {
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(8);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $seo = array(
            'title' => 'Conheça a Copercana Distribuidora de Combustíveis sua tecnologia',
            'description' => 'Localizada no interior da cidade de São Paulo, oferecendo uma estrutura moderna e garantindo agilidade, clique aqui e conheça toda nossa estrutura.',
            'keywords' => '',
            'publisher' => 'https://suave.ppg.br',
            'robots' => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
            'canonical' => base_url("servicos/distribuidora-de-combustiveis")
        );

        $fuelFormModel = model('App\Models\FuelFormModel', false);
        $fuel_forms = $fuelFormModel->get_all();

        $data = array(
            'page' => 'distribuidora-de-combustiveis',
            'parent_page' => 'servicos',
            'seo' => $seo,
            'page_data' => $page_data,
            'fuel_forms' => $fuel_forms,
            'general' => $this->general
        );

        if(isset($page_data) && isset($page_data->show_quotation_carousel) && $page_data->show_quotation_carousel == 1) {
            $data['quotation_list'] = true;
        }

        echo view('includes/header', $data);
        echo view('distribuidora-de-combustiveis', $data);
        echo view('includes/footer', $data);
    }

    public function ferragem_magazine()
    {
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(9);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $seo = array(
            'title' => 'Saiba mais sobre nossas lojas de Ferragens e o Magazine Copercana',
            'description' => 'Copercana possui mais de 20 lojas de ferragens e 2 em minas gerais, além de sua magazine com uma grande variedade de produtos para o lar, confira já!',
            'keywords' => '',
            'publisher' => 'https://suave.ppg.br',
            'robots' => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
            'canonical' => base_url("servicos/ferragem-magazine")
        );

        $unitModel = model('App\Models\UnitModel', false);
        $units = $unitModel->get_all_by_type('magazine');

        $data = array(
            'page' => 'ferragem-magazine',
            'parent_page' => 'servicos',
            'seo' => $seo,
            'page_data' => $page_data,
            'units' => $units,
            'general' => $this->general
        );

        if(isset($page_data) && isset($page_data->show_quotation_carousel) && $page_data->show_quotation_carousel == 1) {
            $data['quotation_list'] = true;
        }

        echo view('includes/header', $data);
        echo view('ferragem-magazine', $data);
        echo view('includes/footer', $data);
    }

    public function postos_combustiveis()
    {
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(10);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $seo = array(
            'title' => 'Conheça a rede de combustíveis Copercana! Qualidade e ótimo preço',
            'description' => 'A rede tem por objetivo oferecer produtos e serviços de qualidade e procedência com preços competitivos, para satisfazer os desejos de todos.',
            'keywords' => '',
            'publisher' => 'https://suave.ppg.br',
            'robots' => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
            'canonical' => base_url("servicos/postos-de-combustiveis")
        );

        $unitModel = model('App\Models\UnitModel', false);
        $units = $unitModel->get_all_by_type('gas-station');

        $data = array(
            'page' => 'postos-de-combustiveis',
            'parent_page' => 'servicos',
            'seo' => $seo,
            'page_data' => $page_data,
            'units' => $units,
            'general' => $this->general
        );

        if(isset($page_data) && isset($page_data->show_quotation_carousel) && $page_data->show_quotation_carousel == 1) {
            $data['quotation_list'] = true;
        }

        echo view('includes/header', $data);
        echo view('postos-de-combustiveis', $data);
        echo view('includes/footer', $data);
    }

    public function copercana_solar()
    {
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(11);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $seo = array(
            'title' => 'A Copercana também trabalha com energia solar! Saiba mais',
            'description' => 'Separamos aqui as principais vantagens de trabalhar com energia solar e seu custo x benefício. Você vai poder tirar todas as suas dúvidas, clique aqui e não perca tempo.',
            'keywords' => '',
            'publisher' => 'https://suave.ppg.br',
            'robots' => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
            'canonical' => base_url("servicos/copercana-solar")
        );

        $data = array(
            'page' => 'copercana-solar',
            'parent_page' => 'servicos',
            'seo' => $seo,
            'page_data' => $page_data,
            'general' => $this->general
        );

        if(isset($page_data) && isset($page_data->show_quotation_carousel) && $page_data->show_quotation_carousel == 1) {
            $data['quotation_list'] = true;
        }

        echo view('includes/header', $data);
        echo view('copercana-solar', $data);
        echo view('includes/footer', $data);
    }

    public function copercana_seguros()
    {
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(12);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $seo = array(
            'title' => 'Conheça a Copercana Seguros e faça já o seu!',
            'description' => 'Com a Copercana Seguros também temos tudo pensado para você, com planos especiais e uma estrutura sólida para garantir seu patrimônio e bem-estar.',
            'keywords' => 'Seguro,Seguro de vida,Seguro Patrimonial',
            'publisher' => 'https://suave.ppg.br',
            'robots' => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
            'canonical' => base_url("servicos/copercana-seguros")
        );

        $unitModel = model('App\Models\UnitModel', false);
        $units = $unitModel->get_all_by_type('insurance');

        $data = array(
            'page' => 'copercana-seguros',
            'parent_page' => 'servicos',
            'seo' => $seo,
            'page_data' => $page_data,
            'units' => $units,
            'general' => $this->general
        );

        if(isset($page_data) && isset($page_data->show_quotation_carousel) && $page_data->show_quotation_carousel == 1) {
            $data['quotation_list'] = true;
        }

        echo view('includes/header', $data);
        echo view('copercana-seguros', $data);
        echo view('includes/footer', $data);
    }

    public function supermercados()
    {
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(13);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $seo = array(
            'title' => 'Lojas bem equipadas, com visual moderno e com ótimas vantagens',
            'description' => 'Conheça nossos supermercados, com o compromisso de buscar as melhores condições de compra junto aos parceiros fornecedores, buscamos fortalecer cada vez mais a marca, confira nossas ofertas.',
            'keywords' => '',
            'publisher' => 'https://suave.ppg.br',
            'robots' => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
            'canonical' => base_url("servicos/supermercados")
        );

        $header_dependencies = array(
            '<link rel="stylesheet" href="'. base_url("_assets/vendor/slick/slick.css").'">',
            '<link rel="stylesheet" href="'. base_url("_assets/vendor/slick/slick-theme.css").'">'
        );

        $footer_dependencies = array(
            '<script src="'. base_url("_assets/vendor/slick/slick.js").'" ></script>',
            '<script src="'. base_url("_assets/js/supermercados.js").'?v='. filemtime("_assets/js/supermercados.js").'" ></script>'
        );

        $unitModel = model('App\Models\UnitModel', false);
        $units = $unitModel->get_all_by_type('supermarket');

        $offerModel = model('App\Models\OfferModel', false);
        $offers = $offerModel->get_all_active();

        $data = array(
            'header_dependencies' => $header_dependencies,
            'footer_dependencies' => $footer_dependencies,
            'page' => 'supermercados',
            'parent_page' => 'servicos',
            'seo' => $seo,
            'page_data' => $page_data,
            'units' => $units,
            'offers' => $offers,
            'general' => $this->general
        );

        if(isset($page_data) && isset($page_data->show_quotation_carousel) && $page_data->show_quotation_carousel == 1) {
            $data['quotation_list'] = true;
        }

        echo view('includes/header', $data);
        echo view('supermercados', $data);
        echo view('includes/footer', $data);
    }

    public function unidade_graos()
    {
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(14);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $seo = array(
            'title' => 'Unidades de Grãos Copercana, saiba tudo aqui',
            'description' => 'A Copercana possui duas Unidades de Grãos que trabalham com projetos de controle de pragas, armazenamento e distribuição de grãos, como amendoim e soja.',
            'keywords' => 'Grãos,Controle de Pragas,Distribuição de grãos',
            'publisher' => 'https://suave.ppg.br',
            'robots' => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
            'canonical' => base_url("servicos/unidade-de-graos")
        );

        $unitModel = model('App\Models\UnitModel', false);
        $units = $unitModel->get_all_by_type('grain-unit');

        $data = array(
            'page' => 'unidade-de-graos',
            'parent_page' => 'servicos',
            'seo' => $seo,
            'page_data' => $page_data,
            'units' => $units,
            'general' => $this->general
        );

        if(isset($page_data) && isset($page_data->show_quotation_carousel) && $page_data->show_quotation_carousel == 1) {
            $data['quotation_list'] = true;
        }

        echo view('includes/header', $data);
        echo view('unidade-de-graos', $data);
        echo view('includes/footer', $data);
    }

    public function laboratorio_solos()
    {
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(23);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $seo = array(
            'title' => 'Análises de Solos da Copercana, atuando ao lado do produtor',
            'description' => 'A análise do solo é uma técnica de grande importância na agricultura, sendo importante e confiável para o conhecimento do estado nutricional, saiba mais.',
            'keywords' => 'Analise de solos,Controle de Pragas,Distribuição de grãos',
            'publisher' => 'https://suave.ppg.br',
            'robots' => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
            'canonical' => base_url("servicos/laboratorio-de-solos")
        );

        $data = array(
            'page' => 'laboratorio-de-solos',
            'parent_page' => 'servicos',
            'seo' => $seo,
            'page_data' => $page_data,
            'general' => $this->general
        );

        if(isset($page_data) && isset($page_data->show_quotation_carousel) && $page_data->show_quotation_carousel == 1) {
            $data['quotation_list'] = true;
        }

        echo view('includes/header', $data);
        echo view('laboratorio-de-solos', $data);
        echo view('includes/footer', $data);
    }

    public function tecnologia_bioas()
    {
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(24);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $seo = array(
            'title' => 'Copercana e a Tecnologia de Bioanálise de Solo (BioAs)',
            'description' => 'O ativo BioAS é uma tecnologia que agrega o componente biológico às análises de rotina de solos.  BioAS também envolve o cálculo de Índices de Qualidade.',
            'keywords' => 'Bioanalise,Bioanalise resultado,Analise de solo',
            'publisher' => 'https://suave.ppg.br',
            'robots' => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
            'canonical' => base_url("servicos/laboratorio-de-solos/tecnologia-bioas")
        );

        $data = array(
            'page' => 'tecnologia-bioas',
            'parent_page' => 'servicos',
            'seo' => $seo,
            'page_data' => $page_data,
            'general' => $this->general
        );

        if(isset($page_data) && isset($page_data->show_quotation_carousel) && $page_data->show_quotation_carousel == 1) {
            $data['quotation_list'] = true;
        }

        echo view('includes/header', $data);
        echo view('tecnologia-bioas', $data);
        echo view('includes/footer', $data);
    }

    public function departamento_agronomico()
    {
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(27);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $seo = array(
            'title' => 'Departamento Agronômico e comercialização de insumos agrícolas',
            'description' => 'Encontre um dos escritórios do Departamento Agronômico da Copercana. Clique aqui e tire todas as suas dúvidas',
            'keywords' => 'Insumos Agricolas,Insumos agricolas,agronomia',
            'publisher' => 'https://suave.ppg.br',
            'robots' => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
            'canonical' => base_url("servicos/departamento-agronomico")
        );

        $unitModel = model('App\Models\UnitModel', false);
        $units = $unitModel->get_all_by_type('agronomic-department');

        $data = array(
            'page' => 'departamento-agronomico',
            'parent_page' => 'servicos',
            'seo' => $seo,
            'page_data' => $page_data,
            'units' => $units,
            'general' => $this->general
        );

        if(isset($page_data) && isset($page_data->show_quotation_carousel) && $page_data->show_quotation_carousel == 1) {
            $data['quotation_list'] = true;
        }

        echo view('includes/header', $data);
        echo view('departamento-agronomico', $data);
        echo view('includes/footer', $data);
    }

    public function assessoria_imprensa()
    {
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(15);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $seo = array(
            'title' => 'Conheça nossa assessoria de imprensa - Copercana',
            'description' => 'A assessoria de imprensa é um dos instrumentos de comunicação desenvolvidos para as organizações, sendo inerente às atividades da área de comunicação.',
            'keywords' => 'Assessoria de Imprensa,O que é assessoria de imprensa?,agronomia',
            'publisher' => 'https://suave.ppg.br',
            'robots' => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
            'canonical' => base_url("comunicacao/assessoria-de-imprensa")
        );

        $data = array(
            'page' => 'assessoria-de-imprensa',
            'parent_page' => 'comunicacao',
            'seo' => $seo,
            'page_data' => $page_data,
            'general' => $this->general
        );

        if(isset($page_data) && isset($page_data->show_quotation_carousel) && $page_data->show_quotation_carousel == 1) {
            $data['quotation_list'] = true;
        }

        echo view('includes/header', $data);
        echo view('assessoria-de-imprensa', $data);
        echo view('includes/footer', $data);
    }

    public function revista_canavieiros()
    {
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(16);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $seo = array(
            'title' => 'Canavieiros é o meio de comunicação para cooperados da Copercana',
            'description' => 'A Canavieiros é o meio de comunicação para cooperados e associados do Sistema Copercana, clique aqui e fique por dentro de todas as vantagens desse canal.',
            'keywords' => 'Comunicação,Comunicação Copercana,Comunicação digital',
            'publisher' => 'https://suave.ppg.br',
            'robots' => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
            'canonical' => base_url("comunicacao/revista-canavieiros")
        );

        $header_dependencies = array(
            '<link rel="stylesheet" href="'. base_url("_assets/vendor/slick/slick.css").'">',
            '<link rel="stylesheet" href="'. base_url("_assets/vendor/slick/slick-theme.css").'">'
        );

        $footer_dependencies = array(
            '<script src="'. base_url("_assets/vendor/slick/slick.js").'" ></script>',
            '<script src="'. base_url("_assets/js/revista.js").'?v='. filemtime("_assets/js/revista.js").'" ></script>'
        );

        $magazineModel = model('App\Models\MagazineModel', false);
        $magazines = $magazineModel->get_all_active(0, 12);

        $data = array(
            'header_dependencies' => $header_dependencies,
            'footer_dependencies' => $footer_dependencies,
            'page' => 'revista-canavieiros',
            'parent_page' => 'comunicacao',
            'seo' => $seo,
            'page_data' => $page_data,
            'magazines' => $magazines,
            'general' => $this->general
        );

        if(isset($page_data) && isset($page_data->show_quotation_carousel) && $page_data->show_quotation_carousel == 1) {
            $data['quotation_list'] = true;
        }

        echo view('includes/header', $data);
        echo view('revista-canavieiros', $data);
        echo view('includes/footer', $data);
    }

    public function radio_copercana()
    {
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(17);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $seo = array(
            'title' => 'Radio Copercana - Ouça no Rádio ou APP',
            'description' => 'Ouça Rádio Copercana no seu celular ou tablet. Para ouvir essa rádio, sugerimos que você instale o aplicativo RadiosNet, entre e confira!',
            'keywords' => 'Rádio,Rádio Online,agronomia',
            'publisher' => 'https://suave.ppg.br',
            'robots' => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
            'canonical' => base_url("comunicacao/radio-copercana")
        );

        $data = array(
            'page' => 'radio-copercana',
            'parent_page' => 'comunicacao',
            'seo' => $seo,
            'page_data' => $page_data,
            'general' => $this->general
        );

        if(isset($page_data) && isset($page_data->show_quotation_carousel) && $page_data->show_quotation_carousel == 1) {
            $data['quotation_list'] = true;
        }

        echo view('includes/header', $data);
        echo view('radio-copercana', $data);
        echo view('includes/footer', $data);
    }

    public function redes_sociais()
    {
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(18);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $seo = array(
            'title' => 'Copercana',
            'description' => '',
            'keywords' => '',
            'publisher' => 'https://suave.ppg.br',
            'robots' => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
            'canonical' => base_url("comunicacao/redes-sociais")
        );

        $data = array(
            'page' => 'redes-sociais',
            'parent_page' => 'comunicacao',
            'seo' => $seo,
            'page_data' => $page_data,
            'general' => $this->general
        );

        if(isset($page_data) && isset($page_data->show_quotation_carousel) && $page_data->show_quotation_carousel == 1) {
            $data['quotation_list'] = true;
        }

        echo view('includes/header', $data);
        echo view('redes-sociais', $data);
        echo view('includes/footer', $data);
    }

    public function indicacoes()
    {
        $render_registration = $this->check_registration();
        if($render_registration) return $render_registration;

        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(19);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $seo = array(
            'title' => 'Copercana',
            'description' => '',
            'keywords' => '',
            'publisher' => 'https://suave.ppg.br',
            'robots' => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
            'canonical' => base_url('comunicacao/indicacoes')
        );

        $indicationModel = model('App\Models\IndicationModel', false);

        $pager = \Config\Services::pager();

        $page = (($this->request->getVar('page') !== null) ? (int)$this->request->getVar('page') : 1 ) - 1;
        $limit = 10;
        $total = $indicationModel->get_total_active();

        $indications = $indicationModel->get_all_active(($page * $limit), $limit);
        
        $data = array(
            'page' => 'indicacoes',
            'indications' => $indications,
            'parent_page' => 'comunicacao',
            'pagination' => $pager->makeLinks($page + 1,$limit,$total,'bootstrap_full'),
            'seo' => $seo,
            'page_data' => $page_data,
            'general' => $this->general
        );

        if(isset($page_data) && isset($page_data->show_quotation_carousel) && $page_data->show_quotation_carousel == 1) {
            $data['quotation_list'] = true;
        }

        echo view('includes/header', $data);
        echo view('indicacoes', $data);
        echo view('includes/footer', $data);
    }

    public function cadastro()
    {
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(20);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $seo = array(
            'title' => 'Fique de olho em nossas atualizações de Vagas - Copercana',
            'description' => 'Fique de olho em nossas vagas, e mantenha sempre o seu curriculum atualizado. Confira mais novidades aqui',
            'keywords' => 'Banco de vagas,Vagas de emprego,Empregos',
            'publisher' => 'https://suave.ppg.br',
            'robots' => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
            'canonical' => base_url("trabalhe-conosco/cadastro")
        );

        $data = array(
            'page' => 'cadastro',
            'parent_page' => 'trabalhe-conosco',
            'seo' => $seo,
            'page_data' => $page_data,
            'general' => $this->general
        );

        if(isset($page_data) && isset($page_data->show_quotation_carousel) && $page_data->show_quotation_carousel == 1) {
            $data['quotation_list'] = true;
        }

        echo view('includes/header', $data);
        echo view('cadastro', $data);
        echo view('includes/footer', $data);
    }

    public function jovem_aprendiz()
    {
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(21);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $seo = array(
            'title' => 'Aprendiz Legal, tenha acesso ao nosso banco de vagas - Copercana',
            'description' => 'Trabalhe com a Copercana. Diversas oportunidades de emprego para você que quer permanecer em evolução. Confira nossas vagas',
            'keywords' => 'Aprendiz legal,Vagas de aprendiz,o que é um aprendiz legal',
            'publisher' => 'https://suave.ppg.br',
            'robots' => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
            'canonical' => base_url("trabalhe-conosco/jovem-aprendiz")
        );

        $data = array(
            'page' => 'jovem-aprendiz',
            'parent_page' => 'trabalhe-conosco',
            'seo' => $seo,
            'page_data' => $page_data,
            'general' => $this->general
        );

        if(isset($page_data) && isset($page_data->show_quotation_carousel) && $page_data->show_quotation_carousel == 1) {
            $data['quotation_list'] = true;
        }

        echo view('includes/header', $data);
        echo view('jovem-aprendiz', $data);
        echo view('includes/footer', $data);
    }

    public function vagas_disponiveis()
    {
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(22);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $seo = array(
            'title' => 'Copercana',
            'description' => '',
            'keywords' => '',
            'publisher' => 'https://suave.ppg.br',
            'robots' => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
            'canonical' => base_url("trabalhe-conosco/vagas-disponiveis")
        );

        $jobModel = model('App\Models\JobModel', false);
        $jobs = $jobModel->get_all_active();

        $data = array(
            'page' => 'vagas-disponiveis',
            'parent_page' => 'trabalhe-conosco',
            'seo' => $seo,
            'page_data' => $page_data,
            'jobs' => $jobs,
            'general' => $this->general
        );

        if(isset($page_data) && isset($page_data->show_quotation_carousel) && $page_data->show_quotation_carousel == 1) {
            $data['quotation_list'] = true;
        }

        echo view('includes/header', $data);
        echo view('vagas-disponiveis', $data);
        echo view('includes/footer', $data);
    }

    public function vaga($id)
    {
        $jobModel = model('App\Models\JobModel', false);

        $job = $jobModel->get_active_by_id($id);

        if(!isset($job) || empty($job) || !$job) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(22);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $seo = array(
            'title' => 'Copercana',
            'description' => '',
            'keywords' => '',
            'publisher' => 'https://suave.ppg.br',
            'robots' => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
            'canonical' => base_url("trabalhe-conosco/vagas-disponiveis/".$id)
        );

        $data = array(
            'page' => 'vagas-disponiveis',
            'parent_page' => 'trabalhe-conosco',
            'job' => $job,
            'seo' => $seo,
            'page_data' => $page_data,
            'general' => $this->general
        );

        if(isset($page_data) && isset($page_data->show_quotation_carousel) && $page_data->show_quotation_carousel == 1) {
            $data['quotation_list'] = true;
        }

        echo view('includes/header', $data);
        echo view('vaga', $data);
        echo view('includes/footer', $data);
    }

    public function noticias()
    {
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(25);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $seo = array(
            'title' => 'Copercana',
            'description' => '',
            'keywords' => '',
            'publisher' => 'https://suave.ppg.br',
            'robots' => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
            'canonical' => base_url('noticias')
        );

        $postModel = model('App\Models\NewsModel', false);

        $pager = \Config\Services::pager();

        $page = (($this->request->getVar('page') !== null) ? (int)$this->request->getVar('page') : 1 ) - 1;
        $limit = 9;
        $total = $postModel->get_total_published();

        $posts = $postModel->get_all_published(($page * $limit), $limit);
        
        $data = array(
            'page' => 'noticias',
            'posts' => $posts,
            'pagination' => $pager->makeLinks($page + 1,$limit,$total,'bootstrap_full'),
            'seo' => $seo,
            'page_data' => $page_data,
            'general' => $this->general
        );

        if(isset($page_data) && isset($page_data->show_quotation_carousel) && $page_data->show_quotation_carousel == 1) {
            $data['quotation_list'] = true;
        }

        echo view('includes/header', $data);
        echo view('noticias', $data);
        echo view('includes/footer', $data);
    }

    public function noticia($slug)
    {
        $postModel = model('App\Models\NewsModel', false);

        $post = $postModel->get_published_by_slug($slug);

        if(!isset($post) || empty($post) || !$post) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(25);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $postModel = model('App\Models\NewsModel', false);
        $posts = $postModel->get_others_published($post->id, 0, 4);

        $seo = array(
            'title' => isset($post->page_title) && !empty($post->page_title) ? $post->page_title : $post->title,
            'description' => isset($post->page_description) && !empty($post->page_description) ? $post->page_description : $post->excerpt,
            'keywords' => isset($post->page_tags) && !empty($post->page_tags) ? $post->page_tags : '',
            'publisher' => 'https://suave.ppg.br',
            'robots' => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
            'canonical' => base_url('noticias/'.$post->slug),
            'share_thumb' => base_url($post->cover),
            'type' => 'article'
        );
        
        $header_dependencies = array(
            '<link rel="stylesheet" href="'. base_url("_assets/css/ckeditor-defaults.css") .'">'
        );

        $data = array(
            'page' => 'noticias',
            'header_dependencies' => $header_dependencies,
            'page_data' => $page_data,
            'post' => $post,
            'posts' => $posts,
            'seo' => $seo,
            'general' => $this->general
        );

        if(isset($page_data) && isset($page_data->show_quotation_carousel) && $page_data->show_quotation_carousel == 1) {
            $data['quotation_list'] = true;
        }

        echo view('includes/header', $data);
        echo view('noticia', $data);
        echo view('includes/footer', $data);
    }

    public function blog()
    {
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(28);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $seo = array(
            'title' => 'Copercana',
            'description' => '',
            'keywords' => '',
            'publisher' => 'https://suave.ppg.br',
            'robots' => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
            'canonical' => base_url('blog')
        );

        $postModel = model('App\Models\BlogModel', false);

        $pager = \Config\Services::pager();

        $page = (($this->request->getVar('page') !== null) ? (int)$this->request->getVar('page') : 1 ) - 1;
        $limit = 9;
        $total = $postModel->get_total_published();

        $posts = $postModel->get_all_published(($page * $limit), $limit);
        
        $data = array(
            'page' => 'blog',
            'posts' => $posts,
            'pagination' => $pager->makeLinks($page + 1,$limit,$total,'bootstrap_full'),
            'seo' => $seo,
            'page_data' => $page_data,
            'general' => $this->general
        );

        if(isset($page_data) && isset($page_data->show_quotation_carousel) && $page_data->show_quotation_carousel == 1) {
            $data['quotation_list'] = true;
        }

        echo view('includes/header', $data);
        echo view('blog', $data);
        echo view('includes/footer', $data);
    }

    public function categoria($slug)
    {
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(28);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $categoryModel = model('App\Models\CategoryModel', false);
        $current_category = $categoryModel->get_by_slug($slug);

        if(!isset($current_category) || empty($current_category) || !$current_category) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $seo = array(
            'title' => 'Copercana',
            'description' => '',
            'keywords' => '',
            'publisher' => 'https://suave.ppg.br',
            'robots' => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
            'canonical' => base_url('blog/'.$current_category->slug)
        );

        $postModel = model('App\Models\BlogModel', false);

        $pager = \Config\Services::pager();

        $page = (($this->request->getVar('page') !== null) ? (int)$this->request->getVar('page') : 1 ) - 1;
        $limit = 9;
        $total = $postModel->get_total_published_by_category($current_category->id);

        $posts = $postModel->get_all_published_by_category($current_category->id, ($page * $limit), $limit);
        
        $data = array(
            'page' => 'blog',
            'posts' => $posts,
            'pagination' => $pager->makeLinks($page + 1,$limit,$total,'bootstrap_full'),
            'seo' => $seo,
            'page_data' => $page_data,
            'current_category' => $current_category,
            'general' => $this->general
        );

        if(isset($page_data) && isset($page_data->show_quotation_carousel) && $page_data->show_quotation_carousel == 1) {
            $data['quotation_list'] = true;
        }

        echo view('includes/header', $data);
        echo view('blog', $data);
        echo view('includes/footer', $data);
    }

    public function post($category, $slug)
    {
        $categoryModel = model('App\Models\CategoryModel', false);
        $current_category = $categoryModel->get_by_slug($category);

        if(!isset($current_category) || empty($current_category) || !$current_category) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $postModel = model('App\Models\BlogModel', false);

        $post = $postModel->get_published_by_category_and_slug($current_category->id, $slug);

        if(!isset($post) || empty($post) || !$post) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(28);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $postModel = model('App\Models\BlogModel', false);
        $posts = $postModel->get_others_published($post->id, 0, 4);

        $seo = array(
            'title' => isset($post->page_title) && !empty($post->page_title) ? $post->page_title : $post->title,
            'description' => isset($post->page_description) && !empty($post->page_description) ? $post->page_description : $post->excerpt,
            'keywords' => isset($post->page_tags) && !empty($post->page_tags) ? $post->page_tags : '',
            'publisher' => 'https://suave.ppg.br',
            'robots' => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
            'canonical' => base_url('blog/'.$current_category->slug.'/'.$post->slug),
            'share_thumb' => base_url($post->cover),
            'type' => 'article'
        );
        
        $header_dependencies = array(
            '<link rel="stylesheet" href="'. base_url("_assets/css/ckeditor-defaults.css") .'">'
        );

        $data = array(
            'page' => 'blog',
            'header_dependencies' => $header_dependencies,
            'page_data' => $page_data,
            'post' => $post,
            'posts' => $posts,
            'seo' => $seo,
            'general' => $this->general
        );

        if(isset($page_data) && isset($page_data->show_quotation_carousel) && $page_data->show_quotation_carousel == 1) {
            $data['quotation_list'] = true;
        }

        echo view('includes/header', $data);
        echo view('post', $data);
        echo view('includes/footer', $data);
    }

    public function contato()
    {
        $pageModel = model('App\Models\PageModel', false);
        $page = $pageModel->get_by_id(26);
        $page_data = null;

        if(isset($page->definition) && !empty($page->definition)) {
            $page_data = json_decode($page->definition);
        }

        $seo = array(
            'title' => 'Fale Conosco: Tire suas dúvidas sobre a Copercana e nossos serviços',
            'description' => 'A seção de contato é onde o você irá encontrar informações de contato da nossa empresa, como telefone, WhatsApp, e-mail, etc',
            'keywords' => 'Fale Conosco,contato',
            'publisher' => 'https://suave.ppg.br',
            'robots' => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
            'canonical' => base_url("contato")
        );

        $header_dependencies = array(
            '<script src="https://www.google.com/recaptcha/api.js" async defer></script>'
        );
        
        $footer_dependencies = array(
            '<script src="'. base_url("_assets/js/jquery.mask.min.js").'" ></script>',
            '<script src="'. base_url("_assets/js/masks.js").'" ></script>'
        );

        $session = \Config\Services::session();
        
        $data = array(
            'page' => 'contato',
            'header_dependencies' => $header_dependencies,
            'footer_dependencies' => $footer_dependencies,
            'session' => $session,
            'seo' => $seo,
            'page_data' => $page_data,
            'general' => $this->general
        );

        if(isset($page_data) && isset($page_data->show_quotation_carousel) && $page_data->show_quotation_carousel == 1) {
            $data['quotation_list'] = true;
        }

        echo view('includes/header', $data);
        echo view('contato', $data);
        echo view('includes/footer', $data);
    }

    public function busca()
    {

        $seo = array(
            'title' => 'Copercana',
            'description' => '',
            'keywords' => '',
            'publisher' => 'https://suave.ppg.br',
            'robots' => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
            'canonical' => base_url("busca")
        );


        $header_dependencies = array(
            '<script type="text/javascript" async="" src="https://cse.google.com/cse.js?cx=05e0ae7e6d2974484"></script>'
        );

        $footer_dependencies = array(
            '<script src="'. base_url("_assets/vendor/slick/slick.js").'" ></script>',
            '<script src="'. base_url("_assets/js/home.js").'?v='. filemtime("_assets/js/home.js").'" ></script>'
        );

        $search_term = $this->request->getVar('q');
        $search_term = htmlentities($search_term);

        $data = array(
            'page' => 'busca',
            'header_dependencies' => $header_dependencies,
            'footer_dependencies' => $footer_dependencies,
            'seo' => $seo,
            'quotation_list' => true,
            'search_term' => $search_term,
            'general' => $this->general
        );


        echo view('includes/header', $data);
        echo view('busca', $data);
        echo view('includes/footer', $data);
    }

    public function cotacoes() {
        return $this->get_quotation_list();
    }

    private function check_registration() {

        $uri = current_url(true);

        $session = \Config\Services::session();
        $session->setFlashdata('income_url', (string)$uri);

        $subdata = null;
        helper('cookie');

        $cookie = get_cookie('subdata');
        
        if(isset($cookie) && !empty($cookie)) {
            list($encrypted_data, $iv) = explode('::', $cookie, 2);
            $subdata = openssl_decrypt($encrypted_data, 'aes-256-cbc', 'hpvao0xA3bs07H2YBbxdcVbxi4HCk8BS', 0, $iv);
            $subdata = json_decode(base64_decode($subdata));
        }

        if(isset($this->general) && isset($this->general->require_registration_during_event) && $this->general->require_registration_during_event == 1 && $subdata == null) {

            if(isset($this->general->event_start_date) && !empty($this->general->event_start_date)) {
                $is_event_ocurring = false;

                $today = new Time('now');
                $event_start_date = Time::createFromFormat('Y-m-d H:i:s', $this->general->event_start_date, 'America/Sao_Paulo');
                $event_end_date = Time::createFromFormat('Y-m-d H:i:s', $this->general->event_end_date, 'America/Sao_Paulo');

                $event_start_date_is_valid = $this->general->event_start_date != '0000-00-00 00:00:00' && checkdate($event_start_date->getMonth(), $event_start_date->getDay(), $event_start_date->getYear());
                $event_end_date_is_valid = $this->general->event_end_date != '0000-00-00 00:00:00' && checkdate($event_end_date->getMonth(), $event_end_date->getDay(), $event_end_date->getYear());
                
                if(
                    (($today->isAfter($event_start_date) || $today->equals($event_start_date)) && $event_start_date_is_valid) && 
                    ($today->isBefore($event_end_date) || $today->equals($event_end_date) || !$event_end_date_is_valid)
                ) $is_event_ocurring = true;
                
                $segments = $uri->getSegments();
                $is_registration_page = FALSE;
        
                foreach($segments as $segment) {
                   if($segment === 'cadastro') $is_registration_page = TRUE;
                }
    
                if(!$is_registration_page && $is_event_ocurring) return redirect()->to('/cadastro');
            }
        } 

        return null;
    }

    private function save_access() {
        $session = \Config\Services::session();
        $uri = current_url(true);

        helper('cookie');
        $cookie = get_cookie('subdata');

        $subscribe_id = null;
        $session_id = session_id();
        $page = (string)$uri;
        
        if(isset($cookie) && !empty($cookie)) {
            list($encrypted_data, $iv) = explode('::', $cookie, 2);
            $subdata = openssl_decrypt($encrypted_data, 'aes-256-cbc', 'hpvao0xA3bs07H2YBbxdcVbxi4HCk8BS', 0, $iv);
            $subdata = json_decode(base64_decode($subdata));
            $subscribe_id = $subdata->subscribe_id;
        }

        $accessModel = model('App\Models\AccessModel', false);
        $accessModel->add($subscribe_id, $session_id, $page);
        
        if($subscribe_id) $accessModel->update_subscribe_id_by_session_id($session_id, $subscribe_id);
    }

    private function get_selic() {
        $url = "https://www.bcb.gov.br/api/servico/sitebcb/historicotaxasjuros";
        
        $htmlContent = file_get_contents($url);

        $curlSession = curl_init();
        curl_setopt($curlSession, CURLOPT_URL, $url);
        curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);
        
        $jsonData = curl_exec($curlSession);
        $jsonData = json_decode($jsonData);
        curl_close($curlSession);

        $selic = $jsonData->conteudo[0]->MetaSelic;
        return $selic."%";
    }

    private function get_cdi() {
        $url = "https://www2.cetip.com.br/ConsultarTaxaDi/ConsultarTaxaDICetip.aspx";
        
        $htmlContent = file_get_contents($url);

        $curlSession = curl_init();
        curl_setopt($curlSession, CURLOPT_URL, $url);
        curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);
        
        $jsonData = curl_exec($curlSession);
        $jsonData = json_decode($jsonData);
        curl_close($curlSession);

        $cdi = $jsonData->taxa;
        return str_replace(",", ".", $cdi)."%";
    }

    private function get_usdbrl() {
        $url = "https://economia.awesomeapi.com.br/last/USD-BRL";
        
        $htmlContent = file_get_contents($url);

        $curlSession = curl_init();
        curl_setopt($curlSession, CURLOPT_URL, $url);
        curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);
        
        $jsonData = curl_exec($curlSession);
        $jsonData = json_decode($jsonData);
        curl_close($curlSession);

        $brl = round((($jsonData->USDBRL->ask + $jsonData->USDBRL->bid) / 2), 4);
        return "R$ ".$brl;
    }

    private function get_quotation_list () {
        try {
        $url = "https://www.cepea.esalq.usp.br/br/widgetproduto.js.php?fonte=arial&tamanho=10&largura=400px&corfundo=dbd6b2&cortexto=333333&corlinha=ede7bf&id_indicador%5B%5D=53&id_indicador%5B%5D=103&id_indicador%5B%5D=104";
        
        $htmlContent = file_get_contents($url);

        $curlSession = curl_init();
        curl_setopt($curlSession, CURLOPT_URL, $url);
        curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);
        
        $jsonData = curl_exec($curlSession);
        curl_close($curlSession);
        
        $DOM = new \DOMDocument();
	    $DOM->loadHTML('<?xml encoding="utf-8" ?>' . $htmlContent);

        $Header = $DOM->getElementsByTagName('th');
        $Detail = $DOM->getElementsByTagName('td');
        

        foreach($Header as $NodeHeader) 
        {
            $aDataTableHeaderHTML[] = trim($NodeHeader->textContent);
        }

        $i = 0;
        $j = 0;
        foreach($Detail as $sNodeDetail) 
        {
            $aDataTableDetailHTML[$j][] = trim($sNodeDetail->textContent);
            $i = $i + 1;
            $j = $i % count($aDataTableHeaderHTML) == 0 ? $j + 1 : $j;
        }

        array_shift($aDataTableDetailHTML);

        $list = "<ul class='quotation-list'>";
        $list .= "<li class='quotation-list__item'><strong>Dólar</strong>&nbsp;".$this->get_usdbrl()."</li>";
        $list .= "<li class='quotation-list__item'><strong>SELIC</strong>&nbsp;".$this->get_selic()."</li>";
        $list .= "<li class='quotation-list__item'><strong>CDI</strong>&nbsp;".$this->get_cdi()."</li>";

        foreach($aDataTableDetailHTML as $row) {
            $list .= "<li class='quotation-list__item'>";
            $list .= "<strong>".(explode(" - ", $row[1])[0])."</strong>&nbsp;";
            $list .= $row[2];
            $list .= "&nbsp;|&nbsp;";
            $list .= $row[0];
            $list .= "</li>";
        }

        $list .= "</ul>";

        return $list;
        } catch (\Exception $e) {
            return "";
        }
    }
    
}
