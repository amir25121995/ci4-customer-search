<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

$routes->get('/', 'CustomerController::index');
$routes->get('customer/searchSuggestions', 'CustomerController::searchSuggestions');


$routes->post('customer/storeContact', 'CustomerController::storeContact');
$routes->post('customer/storeAddress', 'CustomerController::storeAddress');


