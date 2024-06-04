<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
// $routes->get('/', function () {
//     return redirect()->to('login');
// });
$routes->addRedirect('/', 'login');

$routes->get('/dashboard', 'Dashboard::index');

service('auth')->routes($routes);
