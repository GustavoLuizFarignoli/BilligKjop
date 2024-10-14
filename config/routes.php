<?php
    return [
        "GET|/api"                 => BilligKjop\Controller\IndexController::class,
        "GET|/api/register_produto" => BilligKjop\Controller\RegistroProdutoController::class,
        "GET|/api/register_usuario" => BilligKjop\Controller\RegistroUsuarioController::class,
        "GET|/api/register_endereco" => BilligKjop\Controller\RegistroEnderecoController::class,
        "GET|/api/get/produto"      => BilligKjop\Controller\Get\GetProdutoController::class,
        "GET|/api/get/usuarios"     => BilligKjop\Controller\Get\GetUsuariosController::class,
        "POST|/api/post/produto"    => BilligKjop\Controller\Post\PostProdutoController::class,
        "POST|/api/post/usuario"    => BilligKjop\Controller\Post\PostUsuarioController::class,
        "POST|/api/post/endereco"   => BilligKjop\Controller\Post\PostEnderecoController::class,
        "POST|/api/login"           => BilligKjop\Controller\Post\LoginController::class,
        "PUT|/api/put/usuario"      => BilligKjop\Controller\Put\PutUsuarioController::class,
        "DELETE|/api/delete/usuario"   => BilligKjop\Controller\Delete\DeleteUsuarioController::class
    ];