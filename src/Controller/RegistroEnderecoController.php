<?php
namespace BilligKjop\Controller;

class RegistroEnderecoController extends Controller
{ 
    public static function index(): void
    {
        if (self::IsLogged(0)) {
            $login = $_SESSION['login'];
            require "View/create_endereco.html";
        } 
    }
}