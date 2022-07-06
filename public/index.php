<?php

require_once __DIR__.'/../vendor/autoload.php';

use app\Utility\Database;
use app\Router;
use app\controllers\PageController;

$database = new Database();
$database->getInstance();
$conn = $database->getConnection();

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$router = new Router($database);

$router->get('/', [PageController::class, 'pasien']);
// $router->post('/', [PageController::class, 'login']);
// $router->get('/login', [PageController::class, 'login']);
// $router->post('/login', [PageController::class, 'login']);
// $router->get('/register', [PageController::class, 'register']);
// $router->post('/register', [PageController::class, 'register']);
$router->get('/pasien', [PageController::class, 'pasien']);
$router->get('/pasien/create', [PageController::class, 'create']);
$router->post('/pasien/create', [PageController::class, 'create']);
$router->get('/pasien/update', [PageController::class, 'update']);
$router->post('/pasien/update', [PageController::class, 'update']);
$router->post('/pasien/delete', [PageController::class, 'delete']);

$router->resolve();