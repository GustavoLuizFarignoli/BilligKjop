<?php
    return [
        "GET|/"                 => BilligKjop\Controller\IndexController::class,
        "GET|/register_produto" => BilligKjop\Controller\RegistroProdutoController::class,
        "GET|/register_usuario" => BilligKjop\Controller\RegistroUsuarioController::class,
        "GET|/register_endereco" => BilligKjop\Controller\RegistroEnderecoController::class,
        "GET|/get/produto"      => BilligKjop\Controller\Get\GetProdutoController::class,
        "GET|/get/usuarios"     => BilligKjop\Controller\Get\GetUsuariosController::class,
        "GET|/login"            => BilligKjop\Controller\LoginController::class,
        "POST|/post/produto"    => BilligKjop\Controller\Post\PostProdutoController::class,
        "POST|/post/usuario"    => BilligKjop\Controller\Post\PostUsuarioController::class,
        "POST|/post/endereco"   => BilligKjop\Controller\Post\PostEnderecoController::class,
        "POST|/login"           => BilligKjop\Facades\Facade_Login::class
    ];