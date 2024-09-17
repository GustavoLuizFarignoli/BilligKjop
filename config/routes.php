<?php
    return [
        "GET|/register" => BilligKjop\Controller\RegistroController::class,
        "GET|/get/produto" => BilligKjop\Controller\Get\GetProdutoController::class,
        "POST|/post/produto" => BilligKjop\Controller\Post\PostProdutoController::class,
    ];