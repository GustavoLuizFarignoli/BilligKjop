<?php
    require "config/Conexao.php";
    $routes = require "config/routes.php";
    require "Controller/Error404Controller.php";
    
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $serverMethod = $_SERVER['REQUEST_METHOD'];
    $key = "$serverMethod|$path";

    if (array_key_exists($key, $routes)) {
        $controllerClass = new $routes[$key]();
        $controllerClass::index();
    } else {
        Error404Controller::index();
    }
    
    exit();
    /*$con = Conexao::getInstance();
    echo "Index";*/
?>