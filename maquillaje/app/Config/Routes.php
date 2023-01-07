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
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

//http://localhost:8080/api/
$routes->group('api', ['namespace' => 'App\Controllers\API'], function($routes){

    //http://localhost:8080/api/productosUtilizar
    $routes->get('productosUtilizar', 'ProductosUtilizar::index');
    //http://localhost:8080/api/productosUtilizar/create
    $routes->post('productosUtilizar/create', 'ProductosUtilizar::create');
    //http://localhost:8080/api/productosUtilizar/update
    $routes->put('productosUtilizar/update/(:num)', 'ProductosUtilizar::update/$1');
    //http://localhost:8080/api/productosUtilizar/delete
    $routes->delete('productosUtilizar/delete/(:num)', 'ProductosUtilizar::delete/$1');



 
    //http://localhost:8080/api/paqueteMakeup
    $routes->get('paqueteMakeup', 'PaqueteMakeup::index');
    //http://localhost:8080/api/paqueteMakeup/create
    $routes->post('paqueteMakeup/create', 'PaqueteMakeup::create');
     //http://localhost:8080/api/paqueteMakeup/update
     $routes->put('paqueteMakeup/update/(:num)', 'PaqueteMakeup::update/$1');
     //http://localhost:8080/api/paqueteMakeup/delete
     $routes->delete('paqueteMakeup/delete/(:num)', 'PaqueteMakeup::delete/$1');
 



    //http://localhost:8080/api/planUsuario
    $routes->get('planUsuario', 'PlanUsuario::index');
    //http://localhost:8080/api/planUsuario/create
    $routes->post('planUsuario/create', 'PlanUsuario::create');
    //http://localhost:8080/api/planUsuario/update
    $routes->put('planUsuario/update/(:num)', 'PlanUsuario::update/$1');
    //http://localhost:8080/api/planUsuario/delete
    $routes->delete('planUsuario/delete/(:num)', 'PlanUsuario::delete/$1');




    //http://localhost:8080/api/usuarios
    $routes->get('usuarios', 'Usuarios::index');
    //http://localhost:8080/api/usuarios/create
    $routes->post('usuarios/create', 'Usuarios::create');
    //http://localhost:8080/api/usuarios/update
    $routes->put('usuarios/update/(:num)', 'Usuarios::update/$1');
    //http://localhost:8080/api/usuarios/delete
    $routes->delete('usuarios/delete/(:num)', 'Usuarios::delete/$1');

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
