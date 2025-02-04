<?php

namespace App\Core;
class Router {
    private $routes = [];
    
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
           if($route['method'] === $method && $route['path'] === $path){
            [$controller , $action] = explode('@' , $route['controller']);
            $controllerInstance = new $controller();
            return $controllerInstance->$action();
           }
        }
        header("HTTP/1.0 404 Not Found");
        return "404 Not Found";
    }
}