<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::login');

$routes->match(['get', 'post'], 'login', 'Auth::login');
$routes->get('logout', 'Auth::logout');

$routes->get('buku', 'Buku::index');
$routes->match(['get', 'post'], 'buku/create', 'Buku::create');
$routes->match(['get', 'post'], 'buku/edit/(:num)', 'Buku::edit/$1');
$routes->get('buku/delete/(:num)', 'Buku::delete/$1');
