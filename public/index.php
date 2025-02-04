<?php
require_once __DIR__ .'/../vendor/autoload.php';
require_once __DIR__ .'/../app/config/routes.php';

use App\Core\Router;

$router = new Router();

require_once __DIR__ .'/../app/config/routes.php';

$router->dispatch();