<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/institucional', 'Home::institucional');
$routes->get('/esg', 'Home::esg');
$routes->get('/ESG', 'Home::esg');

$routes->get('/institucional/sustentabilidade', 'Home::sustentabilidade');
$routes->get('/institucional/cooperativismo', 'Home::cooperativismo');
$routes->get('/institucional/politica-de-privacidade', 'Home::politica_privacidade');

$routes->get('/servicos/auto-center', 'Home::autocenter');
$routes->get('/servicos/centro-de-eventos', 'Home::centro_eventos');
$routes->get('/servicos/distribuidora-de-combustiveis', 'Home::distribuidora_combustiveis');
$routes->get('/servicos/ferragem-magazine', 'Home::ferragem_magazine');
$routes->get('/servicos/posto-de-combustivel', 'Home::postos_combustiveis');
$routes->get('/servicos/copercana-solar', 'Home::copercana_solar');
$routes->get('/servicos/seguros', 'Home::copercana_seguros');
$routes->get('/servicos/supermercado', 'Home::supermercados');
$routes->get('/servicos/unidade-de-graos', 'Home::unidade_graos');
$routes->get('/servicos/laboratorio-de-solos', 'Home::laboratorio_solos');
$routes->get('/servicos/laboratorio-de-solos/tecnologia-bioas', 'Home::tecnologia_bioas');
$routes->get('/servicos/departamento-agronomico', 'Home::departamento_agronomico');

$routes->get('/comunicacao/assessoria-de-imprensa', 'Home::assessoria_imprensa');
$routes->get('/comunicacao/revista-canavieiros', 'Home::revista_canavieiros');
$routes->get('/comunicacao/radio-copercana', 'Home::radio_copercana');
$routes->get('/comunicacao/redes-sociais', 'Home::redes_sociais');
$routes->get('/comunicacao/indicacoes', 'Home::indicacoes');

$routes->get('/trabalhe-conosco/jovem-aprendiz', 'Home::jovem_aprendiz');
$routes->get('/trabalhe-conosco/vagas-disponiveis', 'Home::vagas_disponiveis');
$routes->get('/trabalhe-conosco/vagas-disponiveis/(:any)', 'Home::vaga/$1');
$routes->get('/trabalhe-conosco/cadastro', 'Home::cadastro');

$routes->get('/talentos', 'Home::talentos');

$routes->get('/copercana-60-anos', 'Home::copercana_60_anos');
$routes->get('/soucooperado', 'Home::soucooperado');

$routes->get('/noticias', 'Home::noticias');
$routes->get('/noticias/(:any)', 'Home::noticia/$1');

$routes->get('/blog', 'Home::blog');
$routes->get('/blog/(:any)/(:any)', 'Home::post/$1/$2');
$routes->get('/blog/(:any)', 'Home::categoria/$1');

$routes->get('/contato', 'Home::contato');
$routes->get('/cotacoes', 'Home::cotacoes');
$routes->get('/info', 'Home::info');

$routes->get('/busca', 'Home::busca');

/* Landing Pages */

$routes->get('/metamorfose', 'Landing_Pages::metamorfose');

/* Fim - Landing Page */

$routes->post('/post/upload_image', 'Admin_Post::upload_image');
$routes->get('/admin', 'Admin::index');

$routes->group('auth', ['namespace' => 'App\Controllers'], function ($routes) {
	$routes->add('login', 'Auth::login');
	$routes->get('logout', 'Auth::logout');
	$routes->add('forgot_password', 'Auth::forgot_password');
	$routes->get('/', 'Auth::index');
	$routes->get('reset_password/(:hash)', 'Auth::reset_password/$1');
	$routes->post('reset_password/(:hash)', 'Auth::reset_password/$1');
});

$routes->group('admin', function ($routes) {
    $routes->get('/', 'Admin_Banners::index');
    
    $routes->group('banners', function ($routes) {
        $routes->get('/', 'Admin_Banners::index');
        $routes->get('add_new', 'Admin_Banners::add_new');
        $routes->get('edit/(:any)', 'Admin_Banners::edit/$1');
        $routes->post('add_banner', 'Admin_Banners::add_banner');
        $routes->post('update_banner/(:any)', 'Admin_Banners::update_banner/$1');
        $routes->get('remove_desktop_picture/(:any)', 'Admin_Banners::remove_desktop_picture/$1');
        $routes->get('remove_mobile_picture/(:any)', 'Admin_Banners::remove_mobile_picture/$1');
        $routes->get('delete/(:any)', 'Admin_Banners::delete/$1');
    });

    $routes->group('news', function ($routes) {
        $routes->get('/', 'Admin_News::index');
        $routes->get('add_new', 'Admin_News::add_new');
        $routes->get('edit/(:any)', 'Admin_News::edit/$1');
    });

    $routes->group('blog', function ($routes) {
        $routes->get('/', 'Admin_Blog::index');
        $routes->get('add_new', 'Admin_Blog::add_new');
        $routes->get('edit/(:any)', 'Admin_Blog::edit/$1');

        $routes->get('categories', 'Admin_Blog::categories');
        $routes->get('add_new_category', 'Admin_Blog::add_new_category');
        $routes->get('edit_category/(:any)', 'Admin_Blog::edit_category/$1');
    });

    $routes->group('post', function ($routes) {
        $routes->post('add_post', 'Admin_Post::add_post');
        $routes->post('update_post/(:any)', 'Admin_Post::update_post/$1');
        $routes->post('upload_image', 'Admin_Post::upload_image');
        $routes->get('remove_cover/(:any)', 'Admin_Post::remove_cover/$1');
        $routes->get('delete/(:any)', 'Admin_Post::delete/$1');

        $routes->post('add_category', 'Admin_Post::add_category');
        $routes->post('update_category/(:any)', 'Admin_Post::update_category/$1');
        $routes->get('delete_category/(:any)', 'Admin_Post::delete_category/$1');
    });

    $routes->group('offers', function ($routes) {
        $routes->get('/', 'Admin_Offers::index');
        $routes->get('add_new', 'Admin_Offers::add_new');
        $routes->get('edit/(:any)', 'Admin_Offers::edit/$1');
        $routes->post('add_offer', 'Admin_Offers::add_offer');
        $routes->post('update_offer/(:any)', 'Admin_Offers::update_offer/$1');
        $routes->get('delete/(:any)', 'Admin_Offers::delete/$1');
        $routes->get('remove_file/(:any)', 'Admin_Offers::remove_file/$1');
        $routes->get('make_cover/(:any)', 'Admin_Offers::make_cover/$1');
    });

    $routes->group('magazines', function ($routes) {
        $routes->get('/', 'Admin_Magazines::index');
        $routes->get('add_new', 'Admin_Magazines::add_new');
        $routes->get('edit/(:any)', 'Admin_Magazines::edit/$1');
        $routes->post('add_magazine', 'Admin_Magazines::add_magazine');
        $routes->post('update_magazine/(:any)', 'Admin_Magazines::update_magazine/$1');
        $routes->get('delete/(:any)', 'Admin_Magazines::delete/$1');
        $routes->get('remove_file/(:any)', 'Admin_Magazines::remove_file/$1');
        $routes->get('make_cover/(:any)', 'Admin_Magazines::make_cover/$1');
    });

    $routes->group('indications', function ($routes) {
        $routes->get('/', 'Admin_Indications::index');
        $routes->get('add_new', 'Admin_Indications::add_new');
        $routes->get('edit/(:any)', 'Admin_Indications::edit/$1');
        $routes->post('add_indication', 'Admin_Indications::add_indication');
        $routes->post('update_indication/(:any)', 'Admin_Indications::update_indication/$1');
        $routes->get('delete/(:any)', 'Admin_Indications::delete/$1');
        $routes->get('remove_file/(:any)', 'Admin_Indications::remove_file/$1');
        $routes->get('remove_cover/(:any)', 'Admin_Indications::remove_cover/$1');
        $routes->get('make_cover/(:any)', 'Admin_Indications::make_cover/$1');
    });

    $routes->group('files', function ($routes) {
        $routes->get('/', 'Admin_Files::index');
        $routes->get('add_new', 'Admin_Files::add_new');
        $routes->get('edit/(:any)', 'Admin_Files::edit/$1');
        $routes->post('add_file', 'Admin_Files::add_file');
        $routes->post('update_file/(:any)', 'Admin_Files::update_file/$1');
        $routes->get('delete/(:any)', 'Admin_Files::delete/$1');
        $routes->get('remove_file/(:any)', 'Admin_Files::remove_file/$1');
        $routes->get('remove_cover/(:any)', 'Admin_Files::remove_cover/$1');
        $routes->get('make_cover/(:any)', 'Admin_Files::make_cover/$1');
    });

    $routes->group('testimonials', function ($routes) {
        $routes->get('/', 'Admin_Testimonials::index');
        $routes->get('add_new', 'Admin_Testimonials::add_new');
        $routes->get('edit/(:any)', 'Admin_Testimonials::edit/$1');
        $routes->post('add_testimonial', 'Admin_Testimonials::add_testimonial');
        $routes->post('update_testimonial/(:any)', 'Admin_Testimonials::update_testimonial/$1');
        $routes->get('delete/(:any)', 'Admin_Testimonials::delete/$1');
        $routes->get('remove_picture/(:any)', 'Admin_Testimonials::remove_picture/$1');
    });

    $routes->group('fuel_forms', function ($routes) {
        $routes->get('/', 'Admin_Fuel_Forms::index');
        $routes->get('add_new', 'Admin_Fuel_Forms::add_new');
        $routes->get('edit/(:any)', 'Admin_Fuel_Forms::edit/$1');
        $routes->post('add_form', 'Admin_Fuel_Forms::add_form');
        $routes->post('update_form/(:any)', 'Admin_Fuel_Forms::update_form/$1');
        $routes->get('delete/(:any)', 'Admin_Fuel_Forms::delete/$1');
        $routes->get('remove_file/(:any)', 'Admin_Fuel_Forms::remove_file/$1');
        $routes->get('make_cover/(:any)', 'Admin_Fuel_Forms::make_cover/$1');
    });

    $routes->group('events_galleries', function ($routes) {
        $routes->get('/', 'Admin_Events_Galleries::index');
        $routes->get('add_new', 'Admin_Events_Galleries::add_new');
        $routes->get('edit/(:any)', 'Admin_Events_Galleries::edit/$1');
        $routes->post('add_gallery', 'Admin_Events_Galleries::add_gallery');
        $routes->post('update_gallery/(:any)', 'Admin_Events_Galleries::update_gallery/$1');
        $routes->get('delete/(:any)', 'Admin_Events_Galleries::delete/$1');
        $routes->get('remove_cover/(:any)', 'Admin_Events_Galleries::remove_cover/$1');
        $routes->get('delete_picture/(:any)/(:any)', 'Admin_Events_Galleries::delete_picture/$1/$2');
    });

    $routes->group('galleries', function ($routes) {
        $routes->get('edit/(:any)', 'Admin_Galleries::edit/$1');
        $routes->post('update_gallery/(:any)', 'Admin_Galleries::update_gallery/$1');
        $routes->get('delete_picture/(:any)/(:any)', 'Admin_Galleries::delete_picture/$1/$2');
    });

    $routes->group('jobs', function ($routes) {
        $routes->get('/', 'Admin_Jobs::index');
        $routes->get('add_new', 'Admin_Jobs::add_new');
        $routes->get('edit/(:any)', 'Admin_Jobs::edit/$1');
        $routes->post('add_job', 'Admin_Jobs::add_job');
        $routes->post('update_job/(:any)', 'Admin_Jobs::update_job/$1');
        $routes->get('delete/(:any)', 'Admin_Jobs::delete/$1');

        $routes->get('roles', 'Admin_Jobs::roles');
        $routes->get('add_new_role', 'Admin_Jobs::add_new_role');
        $routes->get('edit_role/(:any)', 'Admin_Jobs::edit_role/$1');
        $routes->post('add_role', 'Admin_Jobs::add_role');
        $routes->post('update_role/(:any)', 'Admin_Jobs::update_role/$1');
        $routes->get('delete_role/(:any)', 'Admin_Jobs::delete_role/$1');
    });

    $routes->group('users', function ($routes) {
        $routes->get('/', 'Admin_Users::index');
        $routes->get('add_new', 'Admin_Users::add_new');
        $routes->get('edit/(:any)', 'Admin_Users::edit/$1');
        $routes->post('add_user', 'Admin_Users::add_user');
        $routes->post('change_password', 'Admin_Users::change_password');
        $routes->post('change_password/(:any)', 'Admin_Users::change_password/$1');
        $routes->post('update_user/(:any)', 'Admin_Users::update_user/$1');
        $routes->get('delete/(:any)', 'Admin_Users::delete/$1');
        $routes->get('remove_picture/(:any)', 'Admin_Users::remove_picture/$1');
    });

    $routes->group('contacts', function ($routes) {
        $routes->get('/', 'Admin_Contacts::index');
        $routes->get('see_more/(:any)', 'Admin_Contacts::see_more/$1');
        $routes->get('delete/(:any)', 'Admin_Contacts::delete/$1');
        $routes->post('bulk_delete', 'Admin_Contacts::bulk_delete');
        $routes->get('see_more_cooperated/(:any)', 'Admin_Contacts::see_more_cooperated/$1');
        $routes->get('delete_cooperated/(:any)', 'Admin_Contacts::delete_cooperated/$1');
        $routes->post('update_cooperated/(:any)', 'Admin_Contacts::update_cooperated/$1');
        $routes->post('bulk_delete_cooperated', 'Admin_Contacts::bulk_delete_cooperated');
    });

    $routes->group('general', function ($routes) {
        $routes->get('/', 'Admin_General::index');
        $routes->post('update_general/(:any)', 'Admin_General::update_general/$1');
    });

    $routes->group('videos', function ($routes) {
        $routes->get('/', 'Admin_Videos::index');
        $routes->get('add_new', 'Admin_Videos::add_new');
        $routes->get('edit/(:any)', 'Admin_Videos::edit/$1');
        $routes->post('add_video', 'Admin_Videos::add_video');
        $routes->post('update_video/(:any)', 'Admin_Videos::update_video/$1');
        $routes->get('delete/(:any)', 'Admin_Videos::delete/$1');
    });

    $routes->group('pages', function ($routes) {
        $routes->get('home', 'Admin_Pages::home');
        $routes->get('institucional', 'Admin_Pages::institucional');
        $routes->get('sustentabilidade', 'Admin_Pages::sustentabilidade');
        $routes->get('cooperativismo', 'Admin_Pages::cooperativismo');
        $routes->get('politica-de-privacidade', 'Admin_Pages::politica_privacidade');
        $routes->get('autocenter', 'Admin_Pages::autocenter');
        $routes->get('centro-de-eventos', 'Admin_Pages::centro_eventos');
        $routes->get('distribuidora-de-combustiveis', 'Admin_Pages::distribuidora_combustiveis');
        $routes->get('ferragem-magazine', 'Admin_Pages::ferragem_magazine');
        $routes->get('postos-de-combustiveis', 'Admin_Pages::postos_combustiveis');
        $routes->get('copercana-solar', 'Admin_Pages::copercana_solar');
        $routes->get('copercana-seguros', 'Admin_Pages::copercana_seguros');
        $routes->get('departamento-agronomico', 'Admin_Pages::departamento_agronomico');
        $routes->get('unidade-de-graos', 'Admin_Pages::unidade_graos');
        $routes->get('supermercados', 'Admin_Pages::supermercados');

        $routes->get('assessoria-de-imprensa', 'Admin_Pages::assessoria_imprensa');
        $routes->get('revista-canavieiros', 'Admin_Pages::revista_canavieiros');
        $routes->get('radio-copercana', 'Admin_Pages::radio_copercana');
        $routes->get('redes-sociais', 'Admin_Pages::redes_sociais');
        $routes->get('indicacoes', 'Admin_Pages::indicacoes');
        $routes->get('cadastro', 'Admin_Pages::cadastro');
        $routes->get('jovem-aprendiz', 'Admin_Pages::jovem_aprendiz');
        $routes->get('vagas-disponiveis', 'Admin_Pages::vagas_disponiveis');
        $routes->get('laboratorio-de-solos', 'Admin_Pages::laboratorio_solos');
        $routes->get('tecnologia-bioas', 'Admin_Pages::tecnologia_bioas');
        $routes->get('noticias', 'Admin_Pages::noticias');
        $routes->get('blog', 'Admin_Pages::blog');
        $routes->get('contato', 'Admin_Pages::contato');
        $routes->get('soucooperado', 'Admin_Pages::soucooperado');
        $routes->get('copercana-60-anos', 'Admin_Pages::copercana_60_anos');

        $routes->post('update_page/(:any)', 'Admin_Pages::update_page/$1');
        $routes->get('delete_file/(:any)/(:any)', 'Admin_Pages::delete_file/$1/$2');
        $routes->get('make_cover/(:any)', 'Admin_Pages::make_cover/$1');
    });

    $routes->group('units', function ($routes) {
        $routes->group('autocenter', function ($routes) {
            $routes->get('/', 'Admin_Units::autocenter');
            $routes->get('add_new', 'Admin_Units::autocenter_add_new');
            $routes->get('edit/(:any)', 'Admin_Units::autocenter_edit/$1');
        });

        $routes->group('agronomic-department', function ($routes) {
            $routes->get('/', 'Admin_Units::agronomic_department_unit');
            $routes->get('add_new', 'Admin_Units::agronomic_department_add_new');
            $routes->get('edit/(:any)', 'Admin_Units::agronomic_department_edit/$1');
        });


        $routes->group('magazine', function ($routes) {
            $routes->get('/', 'Admin_Units::magazine');
            $routes->get('add_new', 'Admin_Units::magazine_add_new');
            $routes->get('edit/(:any)', 'Admin_Units::magazine_edit/$1');
        });

        $routes->group('grain-unit', function ($routes) {
            $routes->get('/', 'Admin_Units::grain_unit');
            $routes->get('add_new', 'Admin_Units::grain_unit_add_new');
            $routes->get('edit/(:any)', 'Admin_Units::grain_unit_edit/$1');
        });

        $routes->group('gas-station', function ($routes) {
            $routes->get('/', 'Admin_Units::gas_station');
            $routes->get('add_new', 'Admin_Units::gas_station_add_new');
            $routes->get('edit/(:any)', 'Admin_Units::gas_station_edit/$1');
        });

        $routes->group('supermarket', function ($routes) {
            $routes->get('/', 'Admin_Units::supermarket');
            $routes->get('add_new', 'Admin_Units::supermarket_add_new');
            $routes->get('edit/(:any)', 'Admin_Units::supermarket_edit/$1');
        });

        $routes->group('insurance', function ($routes) {
            $routes->get('/', 'Admin_Units::insurance');
            $routes->get('add_new', 'Admin_Units::insurance_add_new');
            $routes->get('edit/(:any)', 'Admin_Units::insurance_edit/$1');
        });

        $routes->post('add_unit', 'Admin_Units::add_unit');
        $routes->post('update_unit/(:any)', 'Admin_Units::update_unit/$1');

        $routes->get('(:any)/delete/(:any)', 'Admin_Units::delete/$1/$2');
        $routes->get('remove_picture/(:any)/(:any)', 'Admin_Units::remove_picture/$1/$2');
    });

});

$routes->post('api/banners/increment_click/(:any)', 'Api_Banners::increment_click/$1');
$routes->post('api/banners/save_order', 'Api_Banners::save_order');
$routes->post('api/pictures/save_order', 'Api_Pictures::save_order');
$routes->post('api/datatables/news', 'Api_Datatables::news');
$routes->post('api/datatables/blog', 'Api_Datatables::blog');
$routes->post('api/datatables/blog/categories', 'Api_Datatables::blog_categories');
$routes->post('api/datatables/contacts', 'Api_Datatables::contacts');
$routes->post('api/datatables/cooperated_contacts', 'Api_Datatables::cooperated_contacts');
$routes->post('api/datatables/users', 'Api_Datatables::users');
$routes->post('api/datatables/offers', 'Api_Datatables::offers');
$routes->post('api/datatables/magazines', 'Api_Datatables::magazines');
$routes->post('api/datatables/indications', 'Api_Datatables::indications');
$routes->post('api/datatables/files', 'Api_Datatables::files');
$routes->post('api/datatables/testimonials', 'Api_Datatables::testimonials');
$routes->post('api/datatables/fuel_forms', 'Api_Datatables::fuel_forms');
$routes->post('api/datatables/units/(:any)', 'Api_Datatables::units/$1');
$routes->post('api/datatables/jobs', 'Api_Datatables::jobs');
$routes->post('api/datatables/jobs/roles', 'Api_Datatables::jobs_roles');
$routes->post('api/datatables/events_galleries', 'Api_Datatables::events_galleries');
$routes->post('api/datatables/videos', 'Api_Datatables::videos');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
