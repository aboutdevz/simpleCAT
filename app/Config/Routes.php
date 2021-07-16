<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
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
$session = \Config\Services::session();

if ( $session->has('credential') ) $routes->get('/','Home::index');
if ( $session->has('credential') ) $routes->get('Login/','Home::index');

if( !$session->has('credential') ) $routes->get('/','Login::index');
if( !$session->has('credential') ) $routes->get('Dashboard/','Login::index');
if( !$session->has('credential') ) $routes->get('Hasil/','Login::index');
if( !$session->has('credential') ) $routes->get('Home/','Login::index');
if( !$session->has('credential') ) $routes->get('Logout/','Login::index');
if( !$session->has('credential') ) $routes->get('Selesai/','Login::index');
if( !$session->has('credential') ) $routes->get('Soal/','Login::index');




// if ( $session->credential['role'] == "mahasiswa" ) $routes->add('Login/','Home::index');
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
