<?php
    use Config\RouteManager;
    require_once 'vendor/autoload.php';
    // Permitir requisições de qualquer origem (para testes) * ou especificar o domínio da sua aplicação
    header("Access-Control-Allow-Origin: *"); // NÃO PRECISA MAIS INSERIR URL PERSONALIZADA AQUI!

    // Permitir os métodos HTTP necessários, como POST, GET, OPTIONS, DELETE, PUT
    header("Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT");

    // Permitir certos cabeçalhos, como Content-Type
    header("Access-Control-Allow-Headers: Content-Type, Authorization, x-xsrf-token, x_csrf-token, Cache-Control, X-Requested-With");

    // Tratar a requisição OPTIONS (preflight), que o navegador envia antes da requisição principal
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
        http_response_code(200);
        exit();
    }
    new RouteManager();