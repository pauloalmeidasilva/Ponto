<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Locais
$routes->group('locais', static function ($routes) {
    $routes->get('/', 'LocalController::index');
    $routes->get('novo', 'LocalController::create');
    $routes->post('salvar', 'LocalController::store');
    $routes->get('editar/(:num)', 'LocalController::edit/$1');
    $routes->post('atualizar/(:num)', 'LocalController::update/$1');
    $routes->get('excluir/(:num)', 'LocalController::delete/$1');
});

// Servidores
$routes->group('servidores', static function ($routes) {
    $routes->get('/', 'ServidorController::index');
    $routes->get('novo', 'ServidorController::create');
    $routes->post('salvar', 'ServidorController::store');
    $routes->get('editar/(:num)', 'ServidorController::edit/$1');
    $routes->post('atualizar/(:num)', 'ServidorController::update/$1');
    $routes->get('excluir/(:num)', 'ServidorController::delete/$1');
});

// Folha de Ponto
$routes->group('folha', static function ($routes) {
    $routes->get('/', 'FolhaController::index');
    $routes->post('imprimir', 'FolhaController::imprimir');
});
