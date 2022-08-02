<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::home', ['as' => 'home']);
// $routes->get('/home', 'Home::home', ['as' => 'home']);

$routes->group('', ['filter' => 'role:admin'], function($routes) {
    $routes->group('/rayon', function ($routes) {
        $routes->get('', 'Rayon::index', ['as' => 'rayon']);
        $routes->get('new', 'Rayon::new', ['as' => 'new-rayon']);
        $routes->post('', 'Rayon::create', ['as' => 'create-rayon']);
        $routes->get('(.*)/edit', 'Rayon::edit/$1', ['as' => 'edit-rayon']);
        $routes->post('(.*)', 'Rayon::update/$1', ['as' => 'update-rayon']);
        $routes->get('(.*)/delete', 'Rayon::delete/$1', ['as' => 'delete-rayon']);
    });
    
    $routes->group('/rombel', function ($routes) {
        $routes->get('', 'Rombel::index', ['as' => 'rombel']);
        $routes->get('new', 'Rombel::new', ['as' => 'new-rombel']);
        $routes->post('', 'Rombel::create', ['as' => 'create-rombel']);
        $routes->get('(.*)/edit', 'Rombel::edit/$1', ['as' => 'edit-rombel']);
        $routes->post('(.*)', 'Rombel::update/$1', ['as' => 'update-rombel']);
        $routes->get('(.*)/delete', 'Rombel::delete/$1', ['as' => 'delete-rombel']);
    });
    
    $routes->group('/student', function ($routes) {
        $routes->get('', 'Student::index', ['as' => 'student']);
        $routes->get('new', 'Student::new', ['as' => 'new-student']);
        $routes->post('', 'Student::create', ['as' => 'create-student']);
        $routes->get('(.*)/edit', 'Student::edit/$1', ['as' => 'edit-student']);
        $routes->post('(.*)', 'Student::update/$1', ['as' => 'update-student']);
        $routes->get('(.*)/delete', 'Student::delete/$1', ['as' => 'delete-student']);
    });
    
    $routes->group('/penerbit', function ($routes) {
        $routes->get('', 'Penerbit::index', ['as' => 'penerbit']);
        $routes->get('new', 'Penerbit::new', ['as' => 'new-penerbit']);
        $routes->post('', 'Penerbit::create', ['as' => 'create-penerbit']);
        $routes->get('(.*)/edit', 'Penerbit::edit/$1', ['as' => 'edit-penerbit']);
        $routes->post('(.*)', 'Penerbit::update/$1', ['as' => 'update-penerbit']);
        $routes->get('(.*)/delete', 'Penerbit::delete/$1', ['as' => 'delete-penerbit']);
    });

    $routes->group('/book', function ($routes) {
        $routes->get('', 'Buku::index', ['as' => 'book']);
        $routes->get('new', 'Buku::new', ['as' => 'new-book']);
        $routes->post('', 'Buku::create', ['as' => 'create-book']);
        $routes->get('(.*)/edit', 'Buku::edit/$1', ['as' => 'edit-book']);
        $routes->post('(.*)', 'Buku::update/$1', ['as' => 'update-book']);
        $routes->get('(.*)/delete', 'Buku::delete/$1', ['as' => 'delete-book']);
    });
    
    $routes->group('/peminjam', function ($routes) {
        $routes->get('', 'Peminjam::index', ['as' => 'peminjam']);
        $routes->get('(.*)/edit', 'Peminjam::edit/$1', ['as' => 'edit-peminjam']);
        $routes->post('(.*)', 'Peminjam::update/$1', ['as' => 'update-peminjam']);
        $routes->get('(.*)/delete', 'Peminjam::delete/$1', ['as' => 'delete-peminjam']);
    });
});

$routes->group('', ['filter' => 'login'], function($routes) {
    $routes->get('/pinjam', 'Peminjam::new', ['as' => 'new-peminjam']);
    $routes->post('/pinjam', 'Peminjam::create', ['as' => 'create-peminjam']);
});

$routes->group('', ['filter' => 'role:student'], function($routes) {
    $routes->get('/books', 'Siswa::books', ['as' => 'student-books']);
});

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
