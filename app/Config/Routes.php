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


/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */
// Home
$routes->get('/', 'Home::index');
// Books
$routes->get('/books/create', 'Books::create');
$routes->get('/books/details/(:num)', 'Books::details/$1');
$routes->get('/books/delete/(:num)', 'Books::delete/$1');
$routes->get('/books/books_table', 'Books::books_table');
$routes->post('/books/store', 'Books::store');
// Authors
$routes->get('/authors', 'Authors::index');
$routes->get('/authors/details/(:num)', 'Authors::details/$1');
$routes->get('/authors/delete/(:num)', 'Authors::delete/$1');
$routes->get('/authors/authors_table', 'Authors::authors_table');
$routes->get('/authors/create', 'Authors::create');
$routes->post('/authors/store', 'Authors::store');


if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
