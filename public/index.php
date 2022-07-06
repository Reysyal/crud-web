<?php

require_once __DIR__.'/../vendor/autoload.php';

use app\Database;
use app\Router;
use app\controllers\PageController;

$database = new Database();
$database->getInstance();
$conn = $database->getConnection();

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$router = new Router($database);

$router->get('/', [PageController::class, 'login']);
$router->get('/products', [PageController::class, 'products']);
$router->get('/products/create', [PageController::class, 'create']);
$router->post('/products/create', [PageController::class, 'create']);
$router->get('/products/update', [PageController::class, 'update']);
$router->post('/products/update', [PageController::class, 'update']);
$router->post('/products/delete', [PageController::class, 'delete']);

$router->resolve();