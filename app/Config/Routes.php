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
$routes->setDefaultController('Absensi');
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
$routes->get('/', 'Absensi::index');
$routes->get('/absensi', 'Absensi::index');
$routes->get('/absensi/all', 'Absensi::all');
$routes->get('/absensi/add', 'Absensi::add');
$routes->post('/absensi/create', 'Absensi::create');
$routes->get('/absensi/edit/(:num)', 'Absensi::edit/$1');
$routes->post('/absensi/update/(:num)', 'Absensi::update/$1');
$routes->get('/absensi/delete/(:num)', 'Absensi::delete/$1');

$routes->get('/rekap', 'Rekap::index');
$routes->get('/rekap/kelas/(:num)', 'Rekap::rekapKelas/$1');


$routes->get('/siswa', 'Siswa::index');
$routes->get('/siswa/kelas/(:num)', 'Siswa::siswaKelas/$1');
$routes->post('/siswa/create', 'Siswa::create');
$routes->post('/siswa/update/(:num)', 'Siswa::update/$1');
$routes->get('/siswa/delete/(:num)', 'Siswa::delete/$1');
$routes->get('/siswa/naikKelas', 'Siswa::naikKelas');

$routes->get('/semester', 'Semester::index');
$routes->post('/semester/create', 'Semester::create');
$routes->post('/semester/changeActive', 'Semester::changeActive');
$routes->post('/semester/update/(:num)', 'Semester::update/$1');
$routes->get('/semester/delete/(:num)', 'Semester::delete/$1');



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
