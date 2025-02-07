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
    $router->add('GET', '/logout', 'Front\AuthController@logout');
    $router->add('GET', '/article/{id}/edit', 'Front\ArticleController@edit');
    $router->add('POST', '/article/{id}/edit', 'Front\ArticleController@edit');
    $router->add('POST', '/article/{id}/archive', 'Front\ArticleController@archive');
    // Back Office Routes
    $router->add('GET' , '/admin/dashboard', 'Back\DashboardController@index');
    $router->add('GET' , '/admin/users', 'Back\userController@index');
};