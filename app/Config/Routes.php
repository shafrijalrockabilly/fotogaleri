<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'AppController::home');
$routes->get("hello", "AppController::hello");
$routes->get("home", "AppController::home");

$routes->get('/(:num)', 'AppController::home2/$1');
$routes->post("add_album", "AppController::add_album");
$routes->post("proses_tambah_album",
             "AppController::proses_tambah_album");

$routes->get("menu", "AppController::menu");
$routes->get("tambah_foto",
             "AppController::tambah_foto");
$routes->post("proses_tambah_foto",
             "AppController::proses_tambah_foto");

$routes->get("data_foto", "AppController::data_foto"); 

$routes->get("preview/(:num)", "AppController::preview/$1"); 
$routes->get("foto/(:num)/hapus", "AppController::hapus_foto/$1");

$routes->get("foto/(:num)/edit",
    "AppController::edit_foto/$1");

$routes->post("proses_edit_foto",
    "AppController::proses_edit_foto");

$routes->get("tambah_komentar", "AppController::data_foto"); 

$routes->post("proses_tambah_komentar", "AppController::proses_tambah_komentar");

$routes->post("like/(:num)", "AppController::like/$1");
    
$routes->get("register",
    "RegisterController::register");
$routes->post("proses_register",
    "RegisterController::proses_register");
$routes->get("login",
    "LoginController::login");
$routes->post("proses_login",
    "LoginController::proses_login");
$routes->get("logout",
     "AppController::logout");



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
