<?php

namespace App\Core;

use App\Controllers\ErrorController;

class Router {
    private $routes = [];
    private $twig;
    
    public function __construct($twig) {
        $this->twig = $twig;
    }
    
    public function add($method, $path, $controller){
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller
        ];
    }

    public function dispatch(){
        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        
        foreach($this->routes as $route){
           if($route['method'] === $method && $this->matchPath($route['path'], $path)){
                [$controller, $action] = explode('@', $route['controller']);
                $controllerClass = "App\\Controllers\\" . $controller;
                $controllerInstance = new $controllerClass($this->twig);
                return $controllerInstance->$action();
           }
        }
        
        // If no route matches, show 404 error
        $errorController = new ErrorController($this->twig);
        return $errorController->notFound();
    }
    
    private function matchPath($routePath, $requestPath) {
        // Convert route parameters like {id} to regex pattern
        $pattern = preg_replace('/\{([^}]+)\}/', '([^/]+)', $routePath);
        $pattern = "@^" . $pattern . "$@D";
        return preg_match($pattern, $requestPath) === 1;
    }
}