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
           $params = [];
           if($route['method'] === $method && $this->matchPath($route['path'], $path, $params)){
                [$controller, $action] = explode('@', $route['controller']);
                $controllerClass = "App\\Controllers\\" . $controller;
                $controllerInstance = new $controllerClass($this->twig);
                return $controllerInstance->$action(...$params);
           }
        }
        
        // If no route matches, show 404 error
        $errorController = new ErrorController($this->twig);
        return $errorController->notFound();
    }
    
    private function matchPath($routePath, $requestPath, &$params) {
        // Convert route parameters like {id} to regex pattern and capture parameter names
        $pattern = preg_replace_callback('/\{([^}]+)\}/', function($matches) {
            return '([^/]+)';
        }, $routePath);
        
        $pattern = "@^" . $pattern . "$@D";
        
        if (preg_match($pattern, $requestPath, $matches)) {
            // Get parameter names from route path
            preg_match_all('/\{([^}]+)\}/', $routePath, $paramNames);
            
            // Skip the first match (full string match)
            array_shift($matches);
            
            // Combine parameter names with their values
            foreach ($matches as $index => $value) {
                if (isset($paramNames[1][$index])) {
                    $params[] = $value;
                }
            }
            
            return true;
        }
        
        return false;
    }
}