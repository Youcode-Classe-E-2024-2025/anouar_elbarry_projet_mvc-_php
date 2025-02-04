<?php

use App\Core\Router;

$router = new Router();

// Fron Office Routes
$router->add('GET', '/', 'Front\HomeController@index');
$router->add('GET', '/articles', 'Front\ArticleController@index');
$router->add('GET', '/article{id}', 'Front\ArticleController@show');
// Back Office Routes
$routes->add('GET' , '/admin/dashboard', 'Back\DashboardController@index');
$routes->add('GET' , '/admin/users', 'Back\userController@index');