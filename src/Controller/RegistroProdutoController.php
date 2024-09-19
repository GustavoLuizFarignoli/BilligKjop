<?php
namespace BilligKjop\Controller;
use BilligKjop\Singleton\LoginSingleton;

class RegistroProdutoController extends Controller
{ 
    public static function index(): void
    {
        if (LoginSingleton::HasIstance() != null) {
            require "View/create_product.html";
        } else {
            echo "Você precisa estar logado para acessar essa página";
            //implementar para enviar para home
        }
    }
}
