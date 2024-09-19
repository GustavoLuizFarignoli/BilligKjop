<?php
    return [
        "GET|/register_produto" => BilligKjop\Controller\RegistroProdutoController::class,
        "GET|/register_usuario" => BilligKjop\Controller\RegistroUsuarioController::class,
        "GET|/get/produto" => BilligKjop\Controller\Get\GetProdutoController::class,
        "POST|/post/produto" => BilligKjop\Controller\Post\PostProdutoController::class,
        "POST|/post/usuario" => BilligKjop\Controller\Post\PostUsuarioController::class,
    ];