<?php
namespace BilligKjop\Controller;
use BilligKjop\Singleton\LoginSingleton;

class RegistroProdutoController extends Controller
{ 
    public static function index(): void
    {
        //require "View/create_product.html";
        if (self::IsLogged(2)) {
            $login = $_SESSION['login'];
            require "View/create_product.html";
        } 
    }
}
