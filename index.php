<?php
    require_once 'vendor/autoload.php';
    $routes = require_once 'config/routes.php';
    use Billig\Controller\{Error404Controller, RegistroController};
    use Billig\Conexao;
    
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $serverMethod = $_SERVER['REQUEST_METHOD'];
    $key = "$serverMethod|$path";

    if (array_key_exists($key, $routes)) {
        $controllerClass = new $routes[$key]();
        $controllerClass::index();
    } else {  
        exit('Não deu boa');
    }
    
    /*$con = Conexao::getInstance();
    echo "Index";*/
?>