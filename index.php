<?php

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'src/autoload.php';    

use Helper\Router;

$router = new Router();

$router->post('/add-product', 'Controller\ProductController::addProduct');
$router->get('/add-product', 'Controller\ProductController::addProduct');
$router->get('/', 'Controller\ProductController::getProducts');
$router->get('/api/product', 'Controller\ProductController::getProductBySku');
$router->delete('/delete-product', 'Controller\ProductController::deleteProduct');

$router->resolve();
