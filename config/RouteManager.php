<?php
namespace Config;
use BilligKjop\Controller\Error404Controller;

class RouteManager
{ 
    protected array $routes;
    
    public function __construct()
    {
        $this->routes = require_once 'config/routes.php';
        $this->initializeControllerByUrlKey(urlKey: $this->getUrlKeyPath());
    }

    public function getUrlKeyPath(): string
    {
        $path = parse_url(url: $_SERVER['REQUEST_URI'], component: PHP_URL_PATH);
        $httpMethod = $_SERVER['REQUEST_METHOD'];
        $key = "$httpMethod|$path";
        return $key;
    }

    public function initializeControllerByUrlKey(string $urlKey): void
    {
        $routeExists = array_key_exists(key: $urlKey, array: $this->routes);
        if ($routeExists) {
                $controllerClass = $this->routes[$urlKey];
                $controllerClass::index();
                exit();
        }
        Error404Controller::index();
    }
}