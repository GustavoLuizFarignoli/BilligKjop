<?php
    use Config\Conexao;
    use BilligKjop\Controller\Error404Controller;
    require_once 'vendor/autoload.php';
    $routes = require_once 'config/routes.php';
    
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $httpMethod = $_SERVER['REQUEST_METHOD'];
    $key = "$httpMethod|$path";

    if (array_key_exists($key, $routes)) {
        if (class_exists($routes[$key])) {
            $controllerClass = $routes[$key];
            $controllerClass::index();
        } else {
            exit('Classe não encontrada!');
        }
        
    } else {
        Error404Controller::index();
    }
    
    /*
    echo "Index";*/