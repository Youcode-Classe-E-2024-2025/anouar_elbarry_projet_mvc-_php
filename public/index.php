<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
// Initialize Twig and get the environment
$twig = require_once __DIR__ . '/../app/bootstrap.php';

// Create Router with Twig
$router = new App\Core\Router($twig);

// Configure routes
$routeConfig = require_once __DIR__ . '/../app/config/routes.php';
$routeConfig($router);

// Dispatch the request
$router->dispatch();