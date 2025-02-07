<?php

use App\Core\Router;

return function($router) {
    // Fron Office Routes
    $router->add('GET', '/', 'Front\HomeController@index');
    $router->add('GET', '/auth', 'Front\AuthController@index');
    $router->add('POST', '/auth/register', 'Front\AuthController@register');
    $router->add('POST', '/auth/login', 'Front\AuthController@login');
    $router->add('GET', '/articles', 'Front\ArticleController@index');
    $router->add('POST', '/author/create', 'Front\ArticleController@create');
    $router->add('GET', '/article/{id}', 'Front\ArticleController@show');
    $router->add('GET', '/author/dashboard', 'Front\ArticleController@dashboard');
    // Back Office Routes
    // $routes->add('GET' , '/admin/dashboard', 'Back\DashboardController@index');
    // $routes->add('GET' , '/admin/users', 'Back\userController@index');
};