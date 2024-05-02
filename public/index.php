<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;
use App\Core\Request;

$router = new Router();

$router->route('/', [HomeController::class, 'index']);
$router->route('/user', [UserController::class, 'index']);

$request = new Request();
$router->dispatch($request);
?>