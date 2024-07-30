<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('', ['filter' => 'cors'], static function (RouteCollection $routes): void {

    $routes->get('categoria', 'CategoriaController::index');
    $routes->get('categoria/(:num)', 'CategoriaController::show/$1');
    $routes->post('categoria', 'CategoriaController::create');
    $routes->options('categoria','CategoriaController::handleOptions');

    $routes->put('categoria/(:num)', 'CategoriaController::update/$1');
    $routes->options('categoria/(:num)','CategoriaController::handleOptions');

    $routes->delete('categoria/(:num)', 'CategoriaController::delete/$1');
    $routes->options('categoria/(:num)','CategoriaController::handleOptions');

    // Para productos
    $routes->get('producto', 'ProductoController::index');
    $routes->get('producto/(:num)', 'ProductoController::show/$1');
    $routes->post('producto', 'ProductoController::create');
    $routes->options('producto','ProductoController::handleOptions');

    $routes->put('producto/(:num)', 'ProductoController::update/$1');
    $routes->options('producto/(:num)','ProductoController::handleOptions');
    
    $routes->delete('producto/(:num)', 'ProductoController::delete/$1');
    $routes->options('productoa/(:num)','ProductoController::handleOptions');
});
